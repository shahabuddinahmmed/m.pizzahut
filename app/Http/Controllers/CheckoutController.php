<?php

namespace App\Http\Controllers;

use App\BillingDetail;
use App\BKash;
use App\BkashPayment;
use App\Customer;
use App\Deal;
use App\Delivery;
use App\Helpers\HelperClass;
use App\Mail\FeedbackMail;
use App\Mail\SuccessOrderMail;
use App\OnlinePayment;
use App\HomePageSelect;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ShippingDetail;
use App\Store;
use App\Recommend;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class CheckoutController extends Controller
{
    private $merchant_token = "/epBlWfVZXDN7XRid/62lxZBB4cp5l9DKj0tV4FNDVoz4/+LeeZpJZ0S/OIIuSPb";

    public function index()
    {
        
        if(Session::has('cart_last_activity')  && (time() - Session::get('cart_last_activity') > 7200 )){
            Cart::destroy();
            return redirect('/');
        }
        if (Session::has('StoreID')) {
            $storeID = Session::get('StoreID');
            $store = Store::find($storeID);
            if($store){
                if($store->isNotOpen()){
                    return $store->HandleErrorMessage();
                }else{
                    $hours = $store->setOrderTime();
                    $delivery_day = $store->deliveryDay();
                    $delivery_date = $store->deliveryDate();
                    $default_datetime = array_keys($hours)[0];
                    $default_time = array_values($hours)[0];
                }
            }else{
                return redirect()->route('/')->with('message', ' Search Your Location First');
            }
//        return Session::get('CustomerName');
//            $is_partner_service = BKash::isPartnerServices();
            if(Session::has('bkashClient')){
                $is_partner_service = Session::has('bkashClient');
            }else{
                $is_partner_service = BKash::isPartnerServices();
            }


            $selectHomePage = HomePageSelect::find(1);
            $mode = Session::get('Mode');
            if (Session::has('UserId')) {
                $customer = Customer::find(Session::get('UserId'));
                if ($customer) {
                    if($customer->callCenterMakeOrder()){
                        return redirect()->route('/')->with('message', 'Call Center Agent can\'t Buy');
                    }
                }


                $newStr = str_replace(',', '', Cart::subtotal());
//                Session::put('grandTotal',intval($newStr));
//            return Session::get('grandTotal');

                if (Cart::count() > 0) {
                    if ($selectHomePage->selected_value == 1) {
                        $back = route('all-pizza');
                    } elseif ($selectHomePage->selected_value == 2) {
                        $back = route('all-pasta');
                    } elseif ($selectHomePage->selected_value == 3) {
                        $back = route('all-appetisers');
                    } elseif ($selectHomePage->selected_value == 4) {
                        $back = route('all-deals');
                    } elseif ($selectHomePage->selected_value == 5) {
                        $back = route('all-drinks');
                    }
                    $amount = Cart::subtotal();
                    $recommend = Recommend::where('status',1)
                        ->with('related')
                        ->where('start_price','<=',$amount)
                        // ->where('end_price','>=',$amount)
                        ->first();
                    return view('front.checkout.checkout', compact('is_partner_service','back', 'mode', 'store', 'hours', 'delivery_date', 'default_time', 'default_datetime', 'delivery_day', 'customer', 'selectHomePage','recommend'));
                }

            } else {
                return redirect()->route('login-guest')->with('message', 'First Verify Your Mobile Number');
            }
        }
        else{
            return redirect()->route('/')->with('message', ' Search Your Location First');
        }
    }

    public function saveOrderInfo(Request $request)
    {
        
        $store_id = Session::get('StoreID');
        $store = Store::findOrfail($store_id);
        if($store->isNotOpen()){
            return $store->HandleErrorMessage();
        }else{
            if($request->session()->has('used')){
                $request->session()->forget('used');
            }

            if(Session::has('bkashClient')) {
                $old_data = [];
            }else{
                $old_data = Order::whereBetween('updated_at', [now()->subMinutes(2), now()])->pluck('customer_id')->toArray();
            }
            $customer_id = Session::get('CustomerId');
            if(!in_array($customer_id,$old_data)){              // Check Duplicate Order
                if(Session::has('discount')){
                    $discount = Session::get('discount');
                    $request->session()->forget('discount');
                }else{
                    $discount = 0;
                }
                $total_price_vat_sd = round(str_replace(",", "", Session::get('totalPrice')), 2);
                $total_tax = round(str_replace(",", "", Session::get('totalTax')));
                $total_sd = round(str_replace(",", "", Session::get('totalSD')));
                $total_price = round($total_price_vat_sd - ($total_sd+$total_tax));
                $delivery_charge = round(str_replace(",", "", Session::get('delivery_charge')));
                $dc_vat = round(str_replace(",", "", Session::get('dc_vat')));
                $grand_total = round(str_replace(",", "", Session::get('grandTotal')));
                $order_type = Session::get('Mode');
                $mobileNumber = Session::get('CustomerMobile');
                if (strval($grand_total) > 0) {                 // Check Total Price is greater than 0
                    if ($order_type) {
                        $order = new Order();
                        $order->total_tax = strval($total_tax);
                        $order->total_sd = strval($total_sd);
                        $order->total_price = strval($total_price);
                        $order->discount    = $discount;
                        $order->delivery_charge = strval($delivery_charge);
                        $order->delivery_vat = strval($dc_vat);
                        $order->order_total = strval($grand_total);
                        $order->order_type = $order_type;
                        $order->order_time = $request->order_time;
                        $order->store_id = $store_id;
                        $order->app_type = 2;
                        if ($customer_id) {
                            $customer = Customer::find($customer_id);
                            if ($customer->is_call_center) {
                                $customerDetails = Customer::where('phone_number', '=', $mobileNumber)->get()->first();
                                $customerDetails->first_name = $request->name;
                                $customerDetails->email_address = $request->email;
                                $customerDetails->address = $request->address_details;
                                $customerDetails->save();
                                $order->customer_id = $customerDetails->id;
                            } else {
                                $customer->first_name = $request->name;
                                $customer->email_address = $request->email;
                                $customer->address = $request->address_details;
                                $customer->save();
                                $order->customer_id = $customer_id;
                            }
                        }
                        if ($order->save()) {
                            $cartProducts = Cart::content();
                            if ($cartProducts) {
                                foreach ($cartProducts as $cartProduct) {
                                    $product_price = $this->main_price($cartProduct->price);
                                    $orderDetails = new OrderDetail();
                                    $orderDetails->order_id = $order->id;
                                    $orderDetails->product_description = $cartProduct->options->short_description;
                                    $orderDetails->product_name = $cartProduct->name;
                                    $orderDetails->product_price = $product_price;
                                    $orderDetails->product_quantity = $cartProduct->qty;
                                    if ($orderDetails->save()) {
                                        if ($cartProduct->options->product_id) {
                                            $product = Product::find($cartProduct->options->product_id);
                                            if ($product)
                                                $product->order_details()->save($orderDetails);

                                        } elseif ($cartProduct->options->deal_id) {
                                            $deal = Deal::find($cartProduct->options->deal_id);
                                            if ($deal)
                                                $deal->order_details()->save($orderDetails);
                                        }
                                    }
                                }
                            }
                            //****************Shipping Detail******************//


                            $shipping = new ShippingDetail();
                            $shipping->name = $request->name;
                            $shipping->email = $request->email;
                            $shipping->mobile = $request->mobile;
                            if ($order->shipping_detail()->save($shipping)) {
                                //dd($order_type);
                                if ($order_type == 'Delivery') {
                                    $delivery_mode = Session::get('Location');
                                    $delivery = new Delivery();
                                    $delivery->delivering_to = $delivery_mode;
                                    $delivery->address_details = $request->address_details;
                                    $delivery->additional_information = $request->additional_information;
                                    $delivery->shipping_detail_id = $shipping->id;
                                    $delivery->save();
                                }
                            }
                            //****************Billing Detail******************//

                            $payment_type = $request->payment_type;
                            $billing_details = new BillingDetail();
                            $billing_details->payment_type = $payment_type;
                            if ($order->billing_detail()->save($billing_details)) {
                                $is_call_center = Customer::is_call_center();
                                if(!Session::has('bkashClient')){
                                    $this->removeCache($is_call_center);
                                }
                                if ($payment_type == 'Cash') {
                                    $order->activate();
                                    return redirect()->route('complete-order', ['order_id' => $order->id]);
                                } elseif ($payment_type == 'Online') {
                                    $cart_final = array(
                                        'amount' => strval($grand_total),
                                        'extra' => "",
                                        'notify_mobile' => $mobileNumber,
                                        'notify_email' => $request->email,
                                        'cancel_url' => route('/cancel-url'),
                                        'transactionid' => strval($order->id),
                                        'fail_url' => route('/fail-url'),
                                        'token' => $this->merchant_token,
                                        'success_url' => route('/success-url')
                                    );
                                    $json = json_encode($cart_final);
                                    $url_encode_data = urlencode($json);
                                    $url = "https://ecom.aamrainfotainment.com/msp/PUBLIC_API/AccessToken.jsp?data={$url_encode_data}";
                                    $ch = curl_init();
                                    $timeout = 30;
                                    curl_setopt($ch, CURLOPT_URL, $url);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                                    $data = curl_exec($ch);
                                    curl_close($ch);
                                    $get_access_token = json_decode($data);
                                    if(isset($get_access_token->access_token)){
                                        $access_token_url = "https://ecom.aamrainfotainment.com/msp/payment2.jsp?atoken=" . urlencode($get_access_token->access_token);
                                        return redirect()->away($access_token_url);
                                    }else{
                                        Log::error($url);
                                        Log::error('Order ID(OR00'.$order->id.'): '.$data);
                                        return redirect()->route('/')->with('message', 'Payment Problem, Please Try Again.');
                                    }
//                            header('Location: ' . $access_token_url);
//                            exit();

                                } elseif ($payment_type == 'bKash') {
//                                    return redirect()->route('bkash_checkout_payment', ['order_id' => $order->id]);
                                    if(Session::has('bkashClient')) {
                                        Session::put('orderID',$order->id);
                                        return redirect()->route('bkash_checkout_payment');
                                    }else{
                                        Session::put('orderID',$order->id);
                                        return redirect()->route('tokenize_checkout');
                                    }
                                }elseif ($payment_type == 'SSL'){
                                    $payment = new SslPaymentController();
                                    $payment->process($order->id);
                                }
                            }else{
                                Order::destroy($order->id);
                                return redirect()->route('/')->with('message', 'Order Deleted. Please, try again.');
                            }

                        } else {
                            return redirect()->route('/')->with('message', 'Please,  Add your order again.');
                        }
                    } else {
                        return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
                    }
                } else {
                    return redirect()->route('/')->with('message', 'Order Price must be greater than 0.Please,  Set Your Order Again.');
                }
            }else{
                return redirect()->route('/')->with('message', 'Please,  Order again.');
            }
        }

    }

    public function cancelMessage()
    {
        $is_partner_service = BKash::isPartnerServices();
        return view('front.checkout.cancel-message',compact(['is_partner_service']));
    }

    public function failMessage()
    {
        $is_partner_service = BKash::isPartnerServices();
        return view('front.checkout.fail-message',compact(['is_partner_service']));
    }

    public function onlinePaymentResponse()
    {
        //https://test.pizzahutbd.com/customer/checkout/success_url?return_token=6FmRCOFE9SYgzTgTmFHHz9x2dOyFlsOo8Tnw52gGi2CBH1RjB5mFmAmCx7BlRmH%2F;
        $return_token = Input::get('return_token');
        $payment_final = array(
            'return_token' => "" . $return_token . "",
            'token' => "" . $this->merchant_token . ""
        );

        $json = json_encode($payment_final);

        $url_encode_data = urlencode($json);

        $url = "http://ecom.aamrainfotainment.com/msp/PUBLIC_API/TokenInfo.jsp?data={$url_encode_data}";
        $ch = curl_init();
        $timeout = 30;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($ch);
        curl_close($ch);

//        $get_data = file_get_contents($url);
//        return $get_data;
//        $get_data = $data;
        $get_data = json_decode($data);


        $get_data2 = '{
                          "transaction_id": "157",
                          "amount_charge": null,
                          "amount": "1",
                          "bank_transaction_id": "AAMRAPIZZAHUT42201561970805495",
                          "data": {
                            "return_token": "6FmRCOFE9SYgzTgTmFHHz9x2dOyFlsOo8Tnw52gGi2CBH1RjB5mFmAmCx7BlRmH/",
                            "token": "/epBlWfVZXDN7XRid/62lxZBB4cp5l9DKj0tV4FNDVoz4/+LeeZpJZ0S/OIIuSPb"
                          },
                          "ip": "68.183.98.229",
                          "amount_bank": null,
                          "amount_payable": null,
                          "access_token": "2zvA9ekohdTUIOjuKWR7HSrmuvJKTBkp9+QcUOTjI7XAilMnB3sSbaz2eSorKubn",
                          "success": true,
                          "domain": "https://pizzahutbd.com/",
                          "bank_transaction_details": {
                            "txn_amt": "1.00",
                            "cur": "BDT",
                            "ipg_txn_id": "AAMRAPIZZAHUT42201561970805495",
                            "bank_ref_id": "425518",
                            "acc_no": "467922XXXXXX6802",
                            "name": "ZIAUL KARIM",
                            "action": "SaleTxn",
                            "lang": "eng",
                            "txn_status": "ACCEPTED",
                            "mer_txn_id": "4133460673868145"
                          },
                          "bank_name": "BRAC",
                          "time": "2019-07-01 14:48:30.474",
                          "hit_count": "14",
                          "request_data": {
                            "amount": "1",
                            "extra": "",
                            "notify_mobile": "01714103945",
                            "notify_email": "ziaul.1976@gmail.com",
                            "cancel_url": "https://test.pizzahutbd.com/customer/checkout/cancel_url",
                            "transactionid": "157",
                            "fail_url": "https://test.pizzahutbd.com/customer/checkout/fail_url",
                            "token": "/epBlWfVZXDN7XRid/62lxZBB4cp5l9DKj0tV4FNDVoz4/+LeeZpJZ0S/OIIuSPb",
                            "success_url": "https://test.pizzahutbd.com/customer/checkout/success_url"
                          },
                          "status": "SUCCESS"
                        }';
//        $get_data = json_decode($get_data2);
//        $get_data = response()->json($get_data2);
//        return $get_data->status;
        if(isset($get_data->success)){
            if ($get_data->success == false) {
                return redirect('/customer/checkout/fail_url');
            } elseif ($get_data->status == 'SUCCESS') {
//                $online_payment = new OnlinePayment();
//                $online_payment->transaction_id = $get_data->transaction_id;
//                $online_payment->amount = $get_data->amount;
//                $online_payment->bank_transaction_id = $get_data->bank_transaction_id;
//                $online_payment->ip = $get_data->ip;
//                $online_payment->domain = $get_data->domain;
//                $online_payment->banktransactionid = $get_data->bank_transaction_details->ipg_txn_id;
//                $online_payment->transactionid = $get_data->bank_transaction_details->bank_ref_id;
//                $online_payment->bank_name = $get_data->bank_name;
//                $time = strtotime($get_data->time);
//                $online_payment->created_time = $get_data->time;//date("m-d-y H:i:s",$time);// $time->format('m-d-y H:i:s');;
//                if ($online_payment->save()) {
                $order = Order::findOrFail($get_data->transaction_id);
                $order->updatePaymentStatus('Paid');

//                $billing_details = BillingDetail::where('order_id', '=', $online_payment->transaction_id)->first();
//                $billing_details->payment_status = 'Paid';
//                $billing_details->save();
                return redirect()->route('complete-order', ['order_id' => $get_data->transaction_id]);
//                }
//            return redirect('/customer/checkout/success_notice');
            } else {
                return redirect('/customer/checkout/cancel_url');
            }
        }else{
            Log::error($url);
            Log::error('TokenInfo Error: '.$data);
            return redirect('/customer/checkout/cancel_url');
        }


    }

    public function bKashPaymentResponse(){
        $payment_id = Input::get('paymentID');
        $status = Input::get('status');
        if($status == 'success'){
            $online_payment = BkashPayment::where('paymentID','=',$payment_id)->first();
            if($online_payment){
                $billing_details = BillingDetail::where('order_id', '=', $online_payment->transaction_id)->first();
                $billing_details->payment_status = 'Paid';
                $billing_details->save();
                return redirect()->route('complete-order', ['order_id' => $online_payment->transaction_id]);
            }
        }elseif ($status == 'failure'){
            return redirect('/customer/checkout/fail_url');
        }elseif ($status == 'cancel'){
            return redirect('/customer/checkout/cancel_url');
        }


//{
//    "statusCode": "0000",
//  "statusMessage": "Successful",
//  "paymentID": "TR0000MK1577949689278",
//  "bkashURL": "https://sandbox.payment.bkash.com/redirect/tokenized/?paymentID=TR0000MK1577949689278&hash=A5S4Ndz3Ca3lNd9nwyq.hS!zpNiTIt5ekbKDm._8cjECN!fM_xQ!GisdW3OydIs*uVRGNScN-jeAYUz6UO9IV4ovIf4bknNQwZ6i1577949689406&mode=0000&apiVersion=v1.2.0-beta",
//  "callbackURL": "http://localhost/callback.php",
//  "successCallbackURL": "http://localhost/callback.php?paymentID=TR0000MK1577949689278&status=success",
//  "failureCallbackURL": "http://localhost/callback.php?paymentID=TR0000MK1577949689278&status=failure",
//  "cancelledCallbackURL": "http://localhost/callback.php?paymentID=TR0000MK1577949689278&status=cancel",
//  "payerReference": "01682855342",
//  "agreementStatus": "Initiated",
//  "agreementCreateTime": "2020-01-02T13:21:29:406 GMT+0600"
//}


//Array
//(
//    [paymentID] => TR0011W01577955293646
//    [status] => success
//    [apiVersion] => 1.2.0-beta
//)

    }

    public function completeOrder()
    {
        $order_id = Input::get('order_id');
        if ($order_id) {
            $order = Order::find($order_id);
            $customer = Customer::where('id',$order->customer_id)->first();
            if(Session::has('bkashClient')) {
                $isBkashCheckout = 1;
                $is_call_center = Customer::is_call_center();
                $this->removeCache($is_call_center);
            }else{
                $isBkashCheckout = 0;
            }
            if ($order) {
                $store_id = $order->store_id;
                if ($store_id) {
                    $store = Store::find($store_id);
                    if ($store) {
                        $shipping = ShippingDetail::where('order_id', '=', $order_id)->get()->last();
                        if ($shipping) {
                            if ($shipping->email) {
                                if(HelperClass::is_production()){
                                    if(!$order->send_notification){
                                        try{
                                            if($this->sendMailByMailer($order, $store, $shipping)){
                                                Log::notice('Send Mail: '.$order->id);
                                            }
                                            else{
                                                Log::notice('Error E-mail Address: '.$shipping->email);
                                            }
                                        }
                                        catch(\Exception $e){
                                            $message = $e->getMessage();
                                            Log::error($message);
                                            // Never reached
                                            $this->sendMailUsingAPI($order, $store, $shipping);
                                            Log::notice('sendMailUsingAPI');
                                        }
                                        $this->sendSMS($order, $store, $shipping);
                                        $this->sendTransMail($order->customer_id,$order_id);
                                        try{
                                            $order->send_notification = 1;
                                            $order->save();
                                        }
                                        catch(\Exception $e){
                                            $message = $e->getMessage();
                                            Log::error($message);
                                        }
//                                        $this->triggerNotice($order_id, $store_id);
                                    }
                                }
                            }
                        }
                        $is_partner_service = BKash::isPartnerServices();
                        $is_call_center = Customer::is_call_center();
                        $store_number = $store->contact_number;
                        return view('front.checkout.complete-order', compact(['is_partner_service','is_call_center', 'order_id', 'store_number','isBkashCheckout','customer','order']));
                    } else {
                        return redirect()->route('/')->with('message', 'Search Your Location Again');
                    }
                } else {
                    return redirect()->route('/')->with('message', 'Search Your Location Again');
                }
            } else {
                return redirect()->route('/')->with('message', 'Please Order Again');
            }
        } else {
            return redirect()->route('/')->with('message', 'Please Order Again');

        }
    }

//    protected function triggerNotice($order_id, $store_id)
//    {
//        if (App::environment() == 'production') {
//            $options = array(
//                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
//                'useTLS' => true
//            );
//            $pusher = new Pusher(
//                config('broadcasting.connections.pusher.key'),
//                config('broadcasting.connections.pusher.secret'),
//                config('broadcasting.connections.pusher.app_id'),
//                $options
//            );
//        } else {
//            $options = array(
//                'cluster' => env('PUSHER_APP_CLUSTER'),
//                'useTLS' => true
//            );
//            $pusher = new Pusher(
//                env('PUSHER_APP_KEY'),
//                env('PUSHER_APP_SECRET'),
//                env('PUSHER_APP_ID'),
//                $options
//            );
//        }
//        $array['order_id'] = $order_id;
//        $pusher->trigger('pizza-channel' . $store_id, 'new-order-event', $array);
//    }

    protected function sendMailByMailer($order, $store, $shipping)
    {
        $total_amount = $order->order_total;
        $contact_number = $store->contact_number;
        $customer_name = $shipping->name;
        $orderDetails = $order->order_details;
        $to = $shipping->email; //Session::get('CustomerEmail');

//        $store_id = Session::get('StoreID');
//        $carts = Cart::content();               //Need too see

//        $store = Store::find($store_id);
        $toEmail = "sanaulla.ict@gmail.com";
        Mail::to($to)->send(new SuccessOrderMail($contact_number, $customer_name, $total_amount, $orderDetails));
//        Mail::to($to)->send(new SuccessOrderMail($store, $customer_name, $total_amount, $carts));
        if( count(Mail::failures()) > 0 ) {
            return false;
        } else {
            return true;
        }
    }

    protected function sendSMS($order, $store, $shipping)
    {
        $store_number = $store->contact_number;
        $ac_number = $store->ac_number;
        $business_solution_number = $store->business_solution_number;
        $home_service_manager = $store->home_service_number;
        $rgm_contact_number = $store->rgm_contact_number;
        $card_number = $order->id;
        $total_amount = $order->order_total;
        $customer_mobile_number = $shipping->mobile; //Session::get('CustomerMobile');
        $sms = "Thank you for ordering Pizza Hut. Your order no #OR00{$card_number} of TK. {$total_amount}/=\n" .
            "For any query Please Call ({$store_number}) and Check your email for order details.";
        $url_encode_data = urlencode($sms);     //Your%20OTP%20PIN%20Code%20is%20

        $user = "TranscomFoodAPI";
        $pass = "Tfl@2006API";
        $sid = "PIZZAHUTBDENG";
        $url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
        $param="user=$user&pass=$pass&sms[0][0]= 88$customer_mobile_number &sms[0][1]=".urlencode("$sms 1")."&sms[0][2]=123456789&sid=$sid";
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

        $param="user=$user&pass=$pass&sms[0][0]= 88$business_solution_number &sms[0][1]=".urlencode("$sms 1")."&sms[0][2]=123456789&sid=$sid";
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

        $param="user=$user&pass=$pass&sms[0][0]= 88$rgm_contact_number &sms[0][1]=".urlencode("$sms 1")."&sms[0][2]=123456789&sid=$sid";
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

        $param="user=$user&pass=$pass&sms[0][0]= 88$home_service_manager &sms[0][1]=".urlencode("$sms 1")."&sms[0][2]=123456789&sid=$sid";
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
//        $url = "https://smsportal.bangladeshinfo.com/api/send/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$customer_mobile_number}";
////        $url = "https://smsportal.bangladeshinfo.com/api/sendNonMasking/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$customer_mobile_number}";
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        $test = curl_exec($ch);
//        curl_close($ch);
//        $url = "https://smsportal.bangladeshinfo.com/api/send/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$home_service_manager}";
//        $url = "https://smsportal.bangladeshinfo.com/api/sendNonMasking/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$home_service_manager}";
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        $test = curl_exec($ch);
//        curl_close($ch);
//        $url = "https://smsportal.bangladeshinfo.com/api/send/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$ac_number}";
//        $url = "https://smsportal.bangladeshinfo.com/api/sendNonMasking/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$ac_number}";
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        $test = curl_exec($ch);
//        curl_close($ch);
//        $url = "https://smsportal.bangladeshinfo.com/api/send/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$rgm_contact_number}";
////        $url = "https://smsportal.bangladeshinfo.com/api/sendNonMasking/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$rgm_contact_number}";
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        $test = curl_exec($ch);
//        curl_close($ch);
//        $url = "https://smsportal.bangladeshinfo.com/api/send/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$business_solution_number}";
//        $url = "https://smsportal.bangladeshinfo.com/api/sendNonMasking/PIZZAHUT/4f5dedbd519bee010d97070569dea8e0/?text={$url_encode_data}&mobileNumber={$business_solution_number}";
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        $test = curl_exec($ch);
//        curl_close($ch);
        Log::notice('Send SMS: '.$customer_mobile_number);
    }

    protected function removeCache($is_call_center)
    {
        if ($is_call_center) {
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

            Session::forget('grandTotal');
            Session::forget('totalPrice');
            Session::forget('totalTax');
            Session::forget('totalSD');
            Cart::destroy();
        } else {
            Session::forget('Location');
            Session::forget('Mode');
            Session::forget('StoreID');

            Session::forget('grandTotal');
            Session::forget('totalPrice');
            Session::forget('totalTax');
            Session::forget('totalSD');
            Cart::destroy();
        }
    }


///////////////////////////// Extra Code ///////////////////////////////////////////


    protected function sendMail()
    {
//        $user = Customer::find(8);
//        Mail::send('front.customer.mail', ['user' => $user], function ($m) use ($user) {
//            $m->from('no-reply@pizzahutbd.com', 'PizzaHut');
//
//            $m->to($user->email_address, $user->first_name)->subject('Your Reminder!');
//        });


        $store_id = Session::get('StoreID');
        $customer_name = Session::get('CustomerName');
        $email = 'pizzahutweb@tfl.transcombd.com';
        $store = Store::find($store_id);
        if ($store) {
            $contact_number = $store->contact_number;
        }
        $total_amount = Session::get('grandTotal');
        $carts = Cart::content();


        $to = Session::get('CustomerEmail');//'sanaulla.ict@gmail.com';
        $subject = "Thank you for ordering Pizza Hut";
        $body = "Dear Mr./Ms. $customer_name \r\n
Thank you for ordering Pizza Hut. You have ordered\r\n";
        foreach ($carts as $cart) {
            $full_name = $cart->name;
            $position = strpos($full_name, '<br/>');
            $name = substr($full_name, 0, $position);
            $body .= "$name \t= TK. " . $cart->price * $cart->qty . "\r\n";
        }
        $body .= "Total \t\t= TK. $total_amount \r\n
For any query Please Call ($contact_number) \r\n
Regards \r\n
Pizza Hut Team";
        $headers = "From: " . $email;
//        return $body;
        mail($to, $subject, $body, $headers);
    }

    protected function sendMailUsingSMTP()
    {
        $comment = 'Hi, This test feedback.';
        $toEmail = "sanaulla.ict@gmail.com";
        Mail::to($toEmail)->send(new FeedbackMail($comment));
        return 'Email has been sent to ' . $toEmail;
    }

    protected function sendMailUsingAPI($order, $store, $shipping)
    {
        $total_amount = $order->order_total;
        $contact_number = $store->contact_number;
        $customer_name = $shipping->name;
        $orderDetails = $order->order_details;
        $to = $shipping->email; //Session::get('CustomerEmail');

        $email = 'pizzahutweb@tfl.transcombd.com';



//        $store_id = Session::get('StoreID');
//        $customer_name = Session::get('CustomerName');
//        $store = Store::find($store_id);
//        if ($store) {
//            $contact_number = $store->contact_number;
//        }
//        $total_amount = Session::get('grandTotal');
//        $carts = Cart::content();
//        $to = Session::get('CustomerEmail');//'sanaulla.ict@gmail.com';
        $subject = "Thank you for ordering Pizza Hut";
        $body = "Dear Mr./Ms. $customer_name \r\n
Thank you for ordering Pizza Hut. You have ordered\r\n";
        foreach ($orderDetails as $cart) {
            $full_name = $cart->product_name;
            $position = strpos($full_name, '<br/>');
            $name = substr($full_name, 0, $position);
            $body .= "$name \t= TK. " . $cart->product_price * $cart->product_quantity . "\r\n";
        }
        $body .= "Total \t\t= TK. $total_amount \r\n
For any query Please Call ($contact_number) \r\n
Regards \r\n
Pizza Hut Team";
        $headers = "From: " . $email;
        $url = "https://usercard.bdhonda.com/email.php?to=" . $to . "&body=" . urlencode($body);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
    }
    
    public function main_price($price){
        $vat = ($price*5)/105;
        $new_price = $price - $vat;
        $sd = ($new_price*10)/110;
        return round($price-($vat+$sd));
    }
    
    public function add_rec_cart($id,$size=0){
        $product = Product::where('id',$id)->first();
        $size_name = '';
        if($size==0){
            $product_price = $product->price_personal;
            $size_name = '<br/>'.'Size - Personal';
        }elseif ($size==1){
            $product_price = $product->price_medium;
            $size_name = '<br/>'.'Size - Medium';
        }else{
            $product_price = $product->price_family;
            $size_name = '<br/>'.'Size - Family';
        }
        $product_qty  = 1;
        $product_raw_price_d = 0;
        if($product_price != 0  && $product_qty != 0) {
            $product_price = (float)$product_price;
            $product_raw_price_d = (float)$product_raw_price_d;
            $product_qty = (int)$product_qty;
            if (Session::has('MaxProductID')) {
                $max_product_id = Session::get('MaxProductID');
                $max_product_id = (int)$max_product_id + 1;
                Session::put('MaxProductID', $max_product_id);
                $product_id = $max_product_id . $product->id;
            } else {
                $max_product_id = Product::max('id');
                Session::put('MaxProductID', $max_product_id . '00');
                $product_id = $max_product_id . '00' . $product->id;
            }


            if ($product) {
                $sd = 0;
                $product_raw_price = 0;
                if ($product->sd) {
                    $sd = (int)$product->sd;
                    if ($product_raw_price_d) {
                        $product_raw_price = (int)$product_raw_price_d;
                    } else {
                        $product_raw_price = (int)$product_price;
                    }
                }

                if ($sd > 0) {
                    $isSDActive = 1;
                } else {
                    $isSDActive = 0;
                }
                $vat = $this->findVAT($product_price);
                $sd = $this->findSd($isSDActive,$product_price,$vat);
                // Add by Sanaulla
                $sd1 = ($isSDActive==1) ? (( 10 * $product_price) / 100) : 0;
                $vat1 = ( 5 * ($product_price + $sd1)) / 100;
                $product_price_vat_sd = round($product_price + $vat1 + $sd1);

                $cart = Cart::add([
                    'id' => $product_id,
                    'name' => $product->title.$size_name,
                    'price' => $product_price_vat_sd,
                    'qty' => $product_qty,
                    'options' => [
                        'image' => $product->image,
                        'product_id' => $product->id,
                        'deal_id' => 0,
                        'short_description' => $product->short_description,
                        'product_raw_price' => $product_raw_price,
                        'sd' => $sd,
                        'vat' => $vat,
                    ]
                ]);

                $total = $this->resetSession();
                Session::put('totalPrice',Cart::subtotal());
                return response()->json(['total'=>$total]);

            } else {
                return response()->json(['error'=>1]);
            }
        }else{
            return response()->json(['error'=>1]);
        }

    }

    public function findSd($isSDActive=1,$productPrice=0,$vat=0){
        if($isSDActive){
            $price  = $productPrice - $vat;
            $sd = round((10*$price)/110);
        }else{
            $sd = 0;
        }
        return $sd;
    }
    public function findVAT($price){
        $vat = ((5*$price)/105);
        return $vat;
    }

    protected function resetSession($isSDActive=1){
        $totalSD = 0;
        $taxTotal = 0;
        $carts = Cart::content();
        foreach ($carts as $cart){
            $single_vat = (int)$this->findVAT($cart->price);
            $totalSD += $this->findSd($isSDActive,$cart->price,$single_vat) *(int)$cart->qty;
            $taxTotal += $single_vat*(int)$cart->qty;
        }

        $cartSubTotal = round(str_replace(",","",Cart::subtotal()),2);
        if(Session::get('Mode')=='Delivery') {
            if ($cartSubTotal > 0) {
                if (Session::has('delivery_charge')) {
                    $delivery_charge = HelperClass::storeDeliveryChargeById(Session::get('StoreID'));
                    $d_vat = (5 * $delivery_charge) / 100;
                    Session::put('delivery_charge', $delivery_charge);
                    Session::put('dc_vat', $d_vat);

                    $delivery_charge = Session::get('delivery_charge');
                    $dc_vat = Session::get('dc_vat');
                } elseif (Session::has('StoreID')) {
                    $delivery_charge = HelperClass::storeDeliveryChargeById(Session::get('StoreID'));
                    $d_vat = (5 * $delivery_charge) / 100;
                    Session::put('delivery_charge', $delivery_charge);
                    Session::put('dc_vat', $d_vat);
                }
            } else {
                $delivery_charge = 0;
                $dc_vat = 0;
            }
        }else{
            $delivery_charge = 0;
            $dc_vat = 0;
        }
        $total_vat_sd = $totalSD+$taxTotal;
        $grandTotal = number_format(round($cartSubTotal+$delivery_charge+$dc_vat));
        Session::put('grandTotal',$grandTotal);
        Session::put('totalPrice',Cart::subtotal());
        Session::put('totalTax',$taxTotal);
        Session::put('totalSD',$totalSD);
        Session::put('sdAndVat',$total_vat_sd);
        Session::put('cart_subtotal',$cartSubTotal);
        return $grandTotal;
    }
     public function sendTransMail($customer_id,$order_id){
        $customer = Customer::where('id',$customer_id)->first();
        if($customer) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://emailapi.netcorecloud.net/v5/mail/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"confirmation@pizzahutbd.com\",\"name\":\"Order confirmation\"},\"subject\":\"Your Order number : #OR00$order_id\",\"content\":[{\"type\":\"html\",\"value\":\"Hello $customer->first_name, Your order is confirmed.\"}],\"personalizations\":[{\"to\":[{\"email\":\"$customer->email_address\",\"name\":\"$customer->first_name\"}]}]}",
                CURLOPT_HTTPHEADER => array(
                    "api_key: 114394eea9231ecebd1c2543571c2362",
                    "content-type: application/json"
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

        }
    }


}
