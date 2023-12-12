<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Customer;
use App\CustomerDetail;
use App\Feedback;
use App\Mail\CustomerFeedbackMail;
use App\Mail\FeedbackMail;
use App\Mail\FeedBackSMSMail;
use App\Order;
use App\SendFeedBackStatus;
use App\Store;
use App\HomePageSelect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    public function customerRegistrationForm(){
        return view('front.customer.registration');
    }


    public function sendOtpToCustomer(Request $request){
        $this->validate($request, [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email_address' => 'required|string|email|max:50|unique:customers',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'required|numeric|min:5'
        ]);
//        return $request;
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = $request->password;
        $customer->phone_number = $request->phone_number;
//        $customer->address = $request->address;
//        $customer->save();
        Session::put('newCustomer',$customer);
        $new_customer =  Session::get('newCustomer');
//        return $new_customer->email_address;
//        Session::put('CustomerId',$customer->id);
//        Session::put('CustomerName',$customer->first_name);
//        $data = $customer->toArray();
//        $data =(array)$customer;

//        Mail::send('front.mails.congratulation-mail',$data, function ($message) use ($data){
//            $message->to($data['email_address']);
//            $message->subject('Confirmaiton Mail');
//        });
        if($request->phone_number){
            $this->sendOTP($request->phone_number);
        }
        return redirect()->route('verify-customer-otp');

    }

    //////////******** 4. LOGIN/REGISTER Button Customer Save Action **********//////////
    ///
    public function saveGuestCustomer(Request $request){
        $this->validate($request, [
            'otp_pin' => 'required|numeric|max:1000000'
        ],[
            'otp_pin' => 'The otp pin may not be greater than 6 digits.'
        ]);
        if(Session::has('newCustomerOTP')){
            $pin_code = Session::get('newCustomerOTP');
            if($pin_code == $request->otp_pin){
                if(Session::has('oldCustomer')){
                    $customer = Session::get('oldCustomer');
                    if($customer){
                        Session::put('UserId',$customer->id);
                        Session::put('UserName','Customer');
                        return redirect()->route('checkout')->with('message','Thanks for your Login');
                    }
                }else if(Session::has('newCustomer')){
                    $customer = Session::get('newCustomer');
                    $new_customer = new Customer();
                    $new_customer->phone_number = $customer->phone_number;
                    if($new_customer->save()){
                        Session::put('UserId',$new_customer->id);
                        Session::put('UserName','Customer');
                        if(Session::has('login-back')){
                            return redirect()->to(Session::get('login-back'));
                        }else{
                            return redirect()->route('checkout')->with('message','Thanks for your Login');
                        }
                    }
                }else{
                    return redirect()->route('register-customer');
                }
            }else{
                if($this->hasTooManyOTPAttempts()) {
                    return redirect()->route('verify-guest-customer-otp')->with('message', 'OTP Not Match. Send OTP Again. Please input the new OTP');
                }else{
                    return redirect()->route('verify-guest-customer-otp')->with('message','OTP Not Match');
                }
            }
        }else{
            return redirect()->route('register-customer')->with('message','Please Registration Again');
        }
    }

    public function saveCustomer(Request $request){
        $this->validate($request, [
            'otp_pin' => 'required|numeric|max:1000000'
        ],[
            'otp_pin' => 'The otp pin may not be greater than 6 digits.'
        ]);
        if(Session::has('newCustomerOTP')){

            $pin_code = Session::get('newCustomerOTP');
            if($pin_code == $request->otp_pin){
                if(Session::has('oldCustomer')){
                    $customer = Session::get('oldCustomer');
                    if($customer){
                        Session::put('UserId',$customer->id);
                        Session::put('UserName',$customer->first_name);
                        if(Session::has('code')){
                            return redirect()->route('front.coupon.check.login');
                        }else{
                            return redirect()->route('/')->with('message','Thanks for your Login');
                        }
//                        return redirect()->route('/')->with('message','Thanks for your Login');
                    }
                }else if(Session::has('newCustomer')){
                    $customer = Session::get('newCustomer');
                    $new_customer = new Customer();
                    $new_customer->first_name = $customer->first_name;
                    $new_customer->last_name = $customer->last_name;
                    $new_customer->email_address = $customer->email_address;
                    $new_customer->password = bcrypt($customer->password);
                    $new_customer->phone_number = $customer->phone_number;
                    if($new_customer->save()){
                        Session::put('UserId',$new_customer->id);
                        Session::put('UserName',$new_customer->first_name);
                        return redirect()->route('/')->with('message','Thanks for your Registration');
                    }
                }else{
                    return redirect()->route('register-customer');
                }
            }else{
                if($this->hasTooManyOTPAttempts()) {
                    return redirect()->route('verify-customer-otp')->with('message', 'OTP Not Match. Send OTP Again. Please input the new OTP');
                }else{
                    return redirect()->route('verify-customer-otp')->with('message','OTP Not Match');
                }
            }
        }else{
            return redirect()->route('register-customer')->with('message','Please Registration Again');
        }
    }

    protected function hasTooManyOTPAttempts(){
        if(Session::has('oldCustomer')){
            $customer = Session::get('oldCustomer');
        }else if(Session::has('newCustomer')) {
            $customer = Session::get('newCustomer');
        }
        if($customer){
            $key = $customer->phone_number;
            if ( Cache::has($key)) {
                if (Cache::get($key) >= 3) {
                    $this->sendOtp($customer->phone_number);
                    Cache::forget($key);
                    return true;
                } else {
                    Cache::increment($key);
                    return false;
                }
            }else{
                $expiresAt = Carbon::now()->addMinutes(10);
                Cache::put($key,1,$expiresAt);
                return false;
            }
        }else{
            return true;
        }
    }

    //////////******** 1. LOGIN/REGISTER Button Action **********//////////

    public function customerLoginForm(){
        $back_button = url()->previous();
        Session::put('login-back',$back_button);
        $selectHomePage = HomePageSelect::find(1);
        if(Session::has('UserId')){
            return redirect()->route('/');
        }
        return view('front.customer.login',compact('selectHomePage'));
    }
    public function callCenterLoginForm(){
        $back_button = url()->previous();
        Session::put('login-back',$back_button);
        if(Session::has('UserId')){
            return redirect()->route('/');
        }
        return view('front.customer.login-callcenter');
    }

    public function guestLoginForm(){
        $selectHomePage = HomePageSelect::find(1);
        if(Session::has('UserId')){
            return redirect()->route('/');
        }
        return view('front.customer.guest-user-login',compact('selectHomePage'));
    }



    public function customerLoginByEmail(Request $request){
        $email = $request->email_address;
        $password = $request->password;
        $customer = Customer::where(['email_address' => $email])->first();

        if ($customer)
        {
            if (Hash::check($password, $customer->password))
            {
                Session::put('UserId',$customer->id);
                Session::put('UserName',$customer->first_name);
                if(Session::has('lastUrl')){
                    $lastUrl = Session::get('lastUrl');
                    return redirect($lastUrl);
                }
                return redirect('/');
            }else{
                return redirect()->route('login-customer')->with('message','Password not match');
            }
        }else{
            return redirect()->route('login-customer')->with('message','User is not available');
        }
    }

    //////////******** 2. LOGIN/REGISTER Button Form Action **********//////////
    public function customerLoginFormByMobile(Request $request){
        $this->validate($request, [
            'phone_number' => 'required|numeric|digits:11'
        ],[
            'phone_number' => 'Please, Input a valid phone number.'
        ]);
        $phone_number = substr($request->phone_number,-11);
        $customer = Customer::where('phone_number','like','%'.$phone_number)->first();

//        return $customer;
        if($customer){
            Session::put('oldCustomer',$customer);
            $this->sendOtp($customer->phone_number);
            return redirect()->route('verify-customer-otp');
        }else{
            $customer = new Customer();
            $customer->phone_number = $request->phone_number;
            Session::put('newCustomer',$customer);
            $this->sendOtp($customer->phone_number);
            return redirect()->route('verify-guest-customer-otp');
//            return redirect()->route('register-customer')->with('message','First fill up the Registration Form');
        }
    }

    //////////******** 1. CHECKOUT Button Form Action **********//////////


    public function guestCustomerLoginFormByMobile(Request $request){
        $this->validate($request, [
            'phone_number' => 'required|numeric|digits:11'
        ],[
            'phone_number' => 'Please, Input a valid phone number.'
        ]);
        $phone_number = substr($request->phone_number,-11);
        $customer = Customer::where('phone_number','like','%'.$phone_number)->first();
        if($customer){
            Session::put('oldCustomer',$customer);
            Session::put('UserId',$customer->id);
            Session::put('UserName','Customer');
            return redirect('checkout');
            // $this->sendOtp($customer->phone_number);
            // return redirect()->route('verify-guest-customer-otp');
        }else{
            $customer = new Customer();
            $customer->phone_number = $request->phone_number;
            $customer->save();
            Session::put('newCustomer',$customer);
            Session::put('UserId',$customer->id);
            Session::put('UserName','Customer');
            return redirect('checkout');
            // Session::put('newCustomer',$customer);
            // $this->sendOtp($customer->phone_number);
            // return redirect()->route('verify-guest-customer-otp');
//            return redirect()->route('register-customer')->with('message','First fill up the Registration Form');
        }
    }

    public function verifyCustomerOTP(){
        $selectHomePage = HomePageSelect::find(1);
        return view('front.customer.check_otp',compact('selectHomePage'));

    }

    //////////******** 3. LOGIN/REGISTER Button Form OTP View **********//////////
    ///
    public function verifyGuestCustomerOTP(){
        $selectHomePage = HomePageSelect::find(1);
        return view('front.customer.check_guest_otp',compact('selectHomePage'));

    }

    public function customerFeedback(){
        $selectHomePage = HomePageSelect::find(1);
        return view('front.customer.feedback.feedback',compact('selectHomePage'));
    }

    public function onetimeFeedback(){
       /* $selectHomePage = HomePageSelect::find(1);*/
        return view('front.customer.feedback.oneTime-feedback');
    }

    public function feedbackDining(){
        $selectHomePage = HomePageSelect::find(1);
        $stores = Store::all();
        return view('front.customer.feedback.dining',compact(['stores','selectHomePage']));
    }

    public function diningInfo(){
        $selectHomePage = HomePageSelect::find(1);
        app('mathcaptcha')->reset();
        $experience_info = Input::get('experience_info', 'unsatisfactory');
        $store_id = Input::get('store_id', 1);
        if($store_id){
            $store = Store::findOrFail($store_id);
//            $store = Store::where('id','=',$store_id)->get()->first();
            return view('front.customer.feedback.dining-info',compact('store','experience_info','selectHomePage'));
        }else{
            return redirect()->route('feedback-dining')->with('message','Select Store First');
        }
    }

    public function saveDiningInfo(Request $request){
        $this->validate($request, [
            'mathcaptcha' => 'required|mathcaptcha',
            'customer_name' => 'required|string|min:2|max:30',
            'email' => 'required'
        ],[
            'mathcaptcha' => 'Enter a valid math captcha response.'
        ]);
        $feedback = new Feedback();
        $feedback->customer_name = $request->customer_name;
        $feedback->gender = $request->gender;
        $feedback->email = $request->email;
        $feedback->mobile_no = $request->mobile_no;
        $feedback->contact_time = $request->contact_time;
        $feedback->address = $request->address;
        $feedback->restaurant_address = $request->restaurant_address;
        $feedback->city = $request->city;
        $feedback->date_of_visit = $request->date_of_visit;
        $feedback->time_of_visit = $request->time_of_visit;
        $feedback->feedback = $request->feedback;
        $feedback->how_often_u_visit = $request->how_often_u_visit;
//        $feedback->security_question = $request->security_question;
        $feedback->restaurant_clean = $request->restaurant_clean;
        $feedback->service_hospitable = $request->service_hospitable;
        $feedback->receive_ordered = $request->receive_ordered;
        $feedback->restaurant_maintained = $request->restaurant_maintained;
        $feedback->food_liking = $request->food_liking;
        $feedback->served_speedily = $request->served_speedily;
        $feedback->value_for_money = $request->value_for_money;
        $feedback->visit_again = $request->visit_again;
//        return $feedback;

        if($feedback->save()){
            $feedbackImage1 = $request->file('feedbackImage1');
            $feedbackImage2 = $request->file('feedbackImage2');
            if(is_file($feedbackImage1)){
                $imageUrl = $this->imageUpload($feedbackImage1,$feedback->id);
                $feedback->image1 = $imageUrl;
                $feedback->save();
            }
            if(is_file($feedbackImage2)){
                $imageUrl = $this->imageUpload($feedbackImage2,$feedback->id);
                $feedback->image2 = $imageUrl;
                $feedback->save();
            }
            if($feedback->restaurant_clean == "no" ||
                $feedback->service_hospitable == "no" ||
                $feedback->receive_ordered == "no" ||
                $feedback->restaurant_maintained == "no" ||
                $feedback->food_liking == "no" ||
                $feedback->served_speedily == "no" ||
                $feedback->value_for_money == "no" ||
                $feedback->value_for_money == "no" ||
                $feedback->visit_again == "no"){
                $status = 'Bad';
            }else{
                $status = 'Good';
            }
            if(App::environment() == 'production'){
                if($request->store_id){
                    $this->sendMailByMailer($request->store_id,$feedback,$status);
                }
            }
            return redirect()->route('feedback')->with('message','THANKS FOR FEEDBACK. WE WILL GET IN TOUCH WITH YOU SHORTLY');
        }else{
            return redirect()->route('feedback-dining')->with('message','Something went Wrong! Please again.');
        }
    }

    public function feedbackDelivery(){
        $selectHomePage = HomePageSelect::find(1);
        $stores = Store::all();
        return view('front.customer.feedback.delivery',compact(['stores','selectHomePage']));
    }

    public function deliveryInfo(){
        $selectHomePage = HomePageSelect::find(1);
        app('mathcaptcha')->reset();
        $experience_info = Input::get('experience_info', 'unsatisfactory');
        $store_id = Input::get('store_id', 1);
        if($store_id){
            $store = Store::findOrFail($store_id);
//            $store = Store::where('id','=',$store_id)->get()->first();
            return view('front.customer.feedback.delivery-info',compact('store','experience_info','selectHomePage'));
        }else{
            return redirect()->route('feedback-delivery')->with('message','Select Store First');
        }
    }

    public function saveDeliveryInfo(Request $request){
        $this->validate($request, [
            'mathcaptcha' => 'required|mathcaptcha',
            'customer_name' => 'required|string|min:2|max:30',
            'email' => 'required'
        ],[
            'mathcaptcha' => 'Enter a valid math captcha response.'
        ]);
        $feedback = new Feedback();
        $feedback->feedback = $request->feedback;
        $feedback->customer_name = $request->customer_name;
        $feedback->email = $request->email;
        $feedback->mobile_no = $request->mobile_no;
        $feedback->contact_time = $request->contact_time;
        $feedback->address = $request->address;
        $feedback->date_of_visit = $request->date_of_visit;
        $feedback->time_of_visit = $request->time_of_visit;
        $feedback->receive_promise_time = $request->receive_promise_time;
        $feedback->food_hot = $request->food_hot;
        $feedback->hospitable = $request->hospitable;
//        $feedback->security_question = $request->security_question;
        if($feedback->save()){
            $feedbackImage1 = $request->file('feedbackImage1');
            $feedbackImage2 = $request->file('feedbackImage2');
            if(is_file($feedbackImage1)){
                $imageUrl = $this->imageUpload($feedbackImage1,$feedback->id);
                $feedback->image1 = $imageUrl;
                $feedback->save();
            }
            if(is_file($feedbackImage2)){
                $imageUrl = $this->imageUpload($feedbackImage2,$feedback->id);
                $feedback->image2 = $imageUrl;
                $feedback->save();
            }
//            return $feedback;
            $status = 'Good';
            if(App::environment() == 'production'){
                if($request->store_id){
                    $this->sendMailByMailer($request->store_id,$feedback,$status);
                }
            }
            return redirect()->route('feedback')->with('message','THANKS FOR FEEDBACK. WE WILL GET IN TOUCH WITH YOU SHORTLY');
        }else{
            return redirect()->route('feedback-delivery')->with('Something went Wrong! Please again.');
        }
    }

    protected function sendMailByMailer($store_id,$feedback,$status){
        if($feedback->email){
            Mail::to($feedback->email)
                ->send(new CustomerFeedbackMail($status));
        }
        $store = Store::find($store_id);
        if ($store) {
            $bcc = ['amit.thapa@tfl.transcombd.com','rupam.tagore@tfl.transcombd.com','zia@transcombd.com','tanjina.akter@tfl.transcombd.com','nowrin.khan@tfl.transcombd.com','manik.khan@tfl.transcombd.com','mahtab.khan@tfl.transcombd.com'];
            if($store->email){
                Mail::to($store->email)
                    ->bcc($bcc)
                    ->send(new FeedbackMail($feedback));
            }
        }
    }

    protected function sendMailUsingAPI($store_id,$to,$status){
        $store = Store::find($store_id);
        if ($store) {
            $store_email = $store->email.',';
        }else{
            $store_email = '';
        }
//        $to = 'sanaulla.ict@gmail.com';
        $from = 'pizzahutweb@tfl.transcombd.com';
        $bcc = "amit.thapa@tfl.transcombd.com,rupam.tagore@tfl.transcombd.com,zia@transcombd.com,tanjina.akter@tfl.transcombd.com,nowrin.khan@tfl.transcombd.com,manik.khan@tfl.transcombd.com,mahtab.khan@tfl.transcombd.com";
        $subject = "Customer Feedback";
        if($status == 'Good'){
            $body = "Dear Valued Customer \nThank You! For your valuable feedback. It is your love and support that keeps the brand growing.\n\nRegards\nPizza Hut Team";
        }else{
            $body = "Dear Valued Customer \nOur heartfelt apologies for letting you down.We always put you first! Therefore, someone from our team will shortly reach out to you.\n\nRegards\nPizza Hut Team";
        }
        $headers = //"From: " . $email;
            'From: '.$from."\r\n".
            'Bcc: '.$store_email . $bcc. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $url = "http://demo.aamrainfotainment.com/pizzahutbd/email.php?to=" . $to .'&headers='.urlencode($headers).'&subject='.urlencode($subject). "&body=" . urlencode($body);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
    }

    protected function imageUpload($productImage,$category_id){
        $imageName = $productImage->getClientOriginalName();
        $directory = 'attached_images/feedback/'.$category_id.'/';
        $imageUrl = $directory . $imageName;
        $productImage->move($directory, $imageName);
        return $imageUrl;
    }

    public function customerLogout(){
        Session::forget('UserId');
        Session::forget('UserName');
        Session::forget('CustomerId');
        Session::forget('CustomerName');
        Session::forget('CustomerEmail');
        Session::forget('CustomerMobile');
        Session::forget('CustomerAddress');
        Session::forget('newCustomerOTP');
        Session::forget('newCustomer');
        Session::forget('oldCustomer');
        Session::forget('Location');
        Session::forget('Mode');
        Session::forget('StoreID');

        return redirect('/');
    }

    public function trackOrder(){
        if(Session::has('UserId')){
            $selectHomePage = HomePageSelect::find(1);
            $customer_id = Session::get('UserId');
            $customer = Customer::find($customer_id);
            $orders = $customer->orders()->where('is_deleted','=',0)->orderBy('id','desc')->get();;
//            return $orders;
            return view('front.customer.track_order',['customer'=>$customer,'orders'=>$orders,'selectHomePage'=>$selectHomePage]);
        }else{
            return redirect()->route('login-customer')->with('message','Login First');
        }

    }

    public function trackRegistration(){
        if(Session::has('UserId')){
            $customer_id = Session::get('UserId');
            $customer = Customer::find($customer_id);
        }

        return view('front.customer.track_registration',['customer'=>$customer]);
    }

    protected function sendOTP($phone_number){
        $digits = 6;
        $i = 0; //counter
        $pin_code = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin_code .= mt_rand(0, 9);
            $i++;
        }
        DB::table('otp_mobile_numbers')->insert(
            ['mobile_number' => $phone_number]
        );
        Session::put('newCustomerOTP',$pin_code);
        $parent_mobile = $phone_number;
        $user = "TranscomFoodAPI";
        $pass = "22";
        $sid = "PIZZAHUTBDENG";
        $url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
        $param="user=$user&pass=$pass&sms[0][0]= 88$parent_mobile &sms[0][1]=".urlencode("Your OTP pin code is $pin_code")."&sms[0][2]=123456789&sid=$sid";
//&sms[1][0]= 88$parent_mobile &sms[1][1]=".urlencode("Test SMS
//&2")."&sms[1][2]=123456790&sid=$sid";
        $crl = curl_init();
        curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($crl,CURLOPT_URL,$url);
        curl_setopt($crl,CURLOPT_HEADER,0);
        curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($crl,CURLOPT_POST,1);
        curl_setopt($crl,CURLOPT_POSTFIELDS,$param);
        $response = curl_exec($crl);
        curl_close($crl);
//        $url = "https://smsportal.bangladeshinfo.com/api/send/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text=Your%20OTP%20PIN%20Code%20is%20{$pin_code}&mobileNumber={$parent_mobile}";
////        $url = "https://smsportal.bangladeshinfo.com/api/sendNonMasking/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text=Your%20OTP%20PIN%20Code%20is%20{$pin_code}&mobileNumber={$parent_mobile}";
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//
//        $data = curl_exec($ch);
//
//        curl_close($ch);
    }

    public function callCenterAgent(){
        $name = '';
        $email_address = '';
        $address = '';
        $mobile_number = Input::get('mobile');
        if($mobile_number){
            $customer = Customer::where('phone_number','=',$mobile_number)->get()->first();
            if($customer){
                Session::put('CustomerMobile', $mobile_number);
                Session::put('CustomerId', $customer->id);
//                $name = $customer->first_name;
//                $email_address = $customer->email_address;
//                $address = $customer->address;
            }else{
                $new_customer = new Customer();
                $new_customer->phone_number = $mobile_number;
                if($new_customer->save()){
                    Session::put('CustomerMobile', $mobile_number);
                    Session::put('CustomerId', $new_customer->id);
//                    Session::put('UserId',$new_customer->id);
//                    Session::put('UserName','Customer');
//                    return redirect()->route('checkout')->with('message','Thanks for your Mobile');
                }
            }
        }
//        $stores = Store::orderBy('name')->get();
//        return view('front.customer.callcenter-form',compact(['stores','mobile_number','name','email_address','address']));
        return redirect()->route('/');
    }

    public function saveComplain(Request $request){
//        return $request;
        $this->validate($request, [
            'mobile' => 'required',
            'details' => 'required'
        ],[
            'details' => 'Write detail complain/query.'
        ]);
        $complain = new Complain();
        $complain->mobile = $request->mobile;
        $complain->is_complain = $request->is_complain;
        $complain->details = $request->details;
        if($complain->save()){
            return view('front.customer.complete-query');
        }else{
            return redirect()->route('/')->with('message','Something went Wrong');
        }
    }
    public function complains(){
        $complains = Complain::all();
        return view('admin.complains.index',compact(['complains']));
    }
    public function feedbacks(){
        $feedbacks = Feedback::orderBy('id','desc')->get();
        return view('admin.feedbacks.index',compact(['feedbacks']));
    }
    public function updateOutlet($mode_type){
        $offDay = date('w');
        if($mode_type == 'delivery'){
            $stores = Store::where('is_delivery', '=', 1)->where('off_day','<>',$offDay)->get();
        }else{
            $stores = Store::where('off_day','<>',$offDay)->get();
        }
        $html = view('front.customer._outlets', compact('stores'))->render();
        return response()->json(compact('html'));
    }


    public function smsFeedbackEmail($orderId){
        $orderId = intval($orderId);
        $link = 0;
        $order    = Order::where('id',$orderId)->first();
        if($orderId!=null){
            $customerId = 	$order->customer_id;
            $customer = Customer::where('id',$customerId)->first();
        }else{
            $customer = null;
        }
        if($customer!=null && $order!=null){
            $link = 1;
        }
        if($link != 1){
            return view('front.mail.feedback_error_mail');
        }
        $is_send = SendFeedBackStatus::where('order_id',$orderId)->first();
        if($is_send == null) {
            return view('front.customer.feedback.oneTime-feedback',compact('customerId','orderId'));
        }else{
            return view('front.mail.feedback_error_mail');
        }
    }

    public function submitFeedbackEmail(Request $request){
        $order_id = $request->order_id;
        $is_due = $request->is_due_time;
        $is_hot = $request->is_hot;
        $comment = $request->comment;
        $order    = Order::findOrFail($order_id);
        $store = Store::findOrFail($order->store_id);
        if ($store->email) {
            $customer_id = $request->customer_id;
            $customer = Customer::findOrFail($customer_id);
            $customer_name = $customer->first_name;
            $bcc = ['amit.thapa@tfl.transcombd.com','rupam.tagore@tfl.transcombd.com','tanjina.akter@tfl.transcombd.com','nowrin.khan@tfl.transcombd.com','manik.khan@tfl.transcombd.com','mahtab.khan@tfl.transcombd.com'];
                Mail::to($store->email)
                    ->cc('zia@transcombd.com')
                    ->bcc($bcc)
                    ->send(new FeedBackSMSMail($customer_name, $order_id, $is_due, $is_hot,$comment));
                $status = new SendFeedBackStatus();
                $status->customer_id = $customer_id;
                $status->order_id   = $order_id;
                $status->is_due     = $is_due;
                $status->is_hot     = $is_hot;
                $status->comment    = $comment;
                $status->save();
                return view('front.mail.feedback_success_mail');
        }else{
            return view('front.mail.feedback_error_mail');
        }
    }
}
