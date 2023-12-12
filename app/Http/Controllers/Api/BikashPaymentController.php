<?php

namespace App\Http\Controllers\Api;

use App\BillingDetail;
use App\BkashPayment;
use App\Models\Orders;
use App\Customer;
use App\Store;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use URL;
use Illuminate\Support\Str;

class BikashPaymentController extends Controller
{

    private $base_url;

    public function __construct()
    {
        // Sandbox
        // $this->base_url = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta';
        // Live
        $this->base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
    }

    public function authHeaders(){
        return array(
            'Content-Type:application/json',
            'Authorization:' .$this->grant(),
            'X-APP-Key:'.env('BKASH_CHECKOUT_URL_APP_KEY')
        );
    }

    public function curlWithBody($url,$header,$method,$body_data_json){
        $curl = curl_init($this->base_url.$url);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $body_data_json);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function grant()
    {
        $header = array(
            'Content-Type:application/json',
            'username:'.env('BKASH_CHECKOUT_URL_USER_NAME'),
            'password:'.env('BKASH_CHECKOUT_URL_PASSWORD')
        );
        $header_data_json=json_encode($header);

        $body_data = array('app_key'=> env('BKASH_CHECKOUT_URL_APP_KEY'), 'app_secret'=>env('BKASH_CHECKOUT_URL_APP_SECRET'));
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/token/grant',$header,'POST',$body_data_json);

        $token = json_decode($response)->id_token;

        return $token;
    }

    public function payment(Request $request)
    {
        return view('bikash.pay');
    }

    public function createPayment(Request $request)
    {

        $header =$this->authHeaders();
        $order_id = $request->order_id;
        if(!isset($request->order_id)){
            return response()->json(['error'=>'Invalid order number']);
        }
        $order = Order::where('id',$order_id)->select('order_total')->first();
        if(!$order || $order->order_total<=0){
            return response()->json(['error'=>'Invalid order number']);
        }

        $website_url = URL::to("/");

        $body_data = array(
            'mode' => '0011',
            'payerReference' => ' ',
            'callbackURL' => $website_url.'/bkash/callback',
            'amount' => $order->order_total,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => "Inv".Str::random(8) // you can pass here OrderID
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/create',$header,'POST',$body_data_json);
        $decoded_response = json_decode($response);
//        dd($decoded_response);
        $bkash = new BkashPayment();
        $bkash->transaction_id     = $order_id;
        $bkash->paymentID          = $decoded_response->paymentID;
        $bkash->amount             = $decoded_response->amount;
        $bkash->currency           = $decoded_response->currency;
        $bkash->create_desc        = $response;
        $bkash->transactionStatus  = $decoded_response->transactionStatus;
        $bkash->save();

        return response()->json(['url'=>json_decode($response)->bkashURL]);

//        return redirect((json_decode($response)->bkashURL));
    }

    public function executePayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/execute',$header,'POST',$body_data_json);

        $res_array = json_decode($response,true);

        if(isset($res_array['trxID'])){
            $bkash = BkashPayment::where('paymentID',$paymentID)->first();
            $bkash->trxID = $res_array['trxID'];
            $bkash->amount = $res_array['amount'];
            $bkash->created_time = $res_array['paymentExecuteTime'];
            $bkash->execute_desc = $response;
            $bkash->transactionStatus = $res_array['transactionStatus'];
            $bkash->save();

            if($res_array['transactionStatus']=='Completed'){
                $order = Order::where('id',$bkash->transaction_id)->first();
                $order->is_active = 1;
                $order->save();
                $billing =  BillingDetail::where('order_id',$order->id)->first();
                $billing->payment_status = "Paid";
                $billing->save();
                
                $user = Customer::where('id',$order->customer_id)->select('phone_number')->first();
                if($user!=null){
                    $mobile = $user->phone_number;
                    $sms = 'Thank you for ordering Pizza Hut. Your order no is '.$order->id.' of Tk. '.$order->order_total.'. For any query please call. **** ('.$this->storeContactById($order->store_id).')';
                    $this->sendSMS($sms,$mobile);
                }
            }
        }

        return $response;
    }

    public function queryPayment($paymentID)
    {

        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $paymentID,
        );
        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/payment/status',$header,'POST',$body_data_json);

        $res_array = json_decode($response,true);

        if(isset($res_array['trxID'])){
            // your database insert operation
            // insert $response to your db

            $bkash = BkashPayment::where('paymentID',$paymentID)->first();
            $bkash->trxID = $res_array['trxID'];
            $bkash->amount = $res_array['amount'];
            $bkash->created_time = $res_array['paymentExecuteTime'];
            $bkash->query_desc   = $response;
            $bkash->transactionStatus = $res_array['transactionStatus'];
            $bkash->save();

            if($res_array['transactionStatus']=='Completed'){
                $order = Order::where('id',$bkash->transaction_id)->first();
                $order->is_active = 1;
                $order->save();
                $billing =  BillingDetail::where('order_id',$order->id)->first();
                $billing->payment_status = "Paid";
                $billing->save();
                $user = Customer::where('id',$order->customer_id)->select('phone_number')->first();
                if($user!=null){
                    $mobile = $user->phone_number;
                    $sms = 'Thank you for ordering Pizza Hut. Your order no is '.$order->id.' of Tk. '.$order->order_total.'. For any query please call. **** ('.$this->storeContactById($order->store_id).')';
                    $this->sendSMS($sms,$mobile);
                }
            }

        }

        return $response;
    }

    public function callback(Request $request)
    {
        $allRequest = $request->all();
        if(isset($allRequest['status']) && $allRequest['status'] == 'failure'){
            return view('bikash.fail')->with([
                'response' => 'Payment Failure'
            ]);

        }else if(isset($allRequest['status']) && $allRequest['status'] == 'cancel'){
            return view('bikash.fail')->with([
                'response' => 'Payment Cancell'
            ]);

        }else{

            $response = $this->executePayment($allRequest['paymentID']);

            $arr = json_decode($response,true);

            if(array_key_exists("statusCode",$arr) && $arr['statusCode'] != '0000'){
                return view('bikash.fail')->with([
                    'response' => $arr['statusMessage'],
                ]);
            }else if(array_key_exists("message",$arr)){
                // if execute api failed to response
                sleep(1);
                $query = $this->queryPayment($allRequest['paymentID']);
                return view('bikash.success')->with([
                    'response' => $query
                ]);
            }

            return view('bikash.success')->with([
                'response' => $response
            ]);

        }

    }

    public function getRefund(Request $request)
    {
        return view('bikash.refund');
    }

    public function refundPayment(Request $request)
    {
        $header =$this->authHeaders();

        $body_data = array(
            'paymentID' => $request->paymentID,
            'amount' => $request->amount,
            'trxID' => $request->trxID,
            'sku' => 'sku',
            'reason' => 'Quality issue'
        );

        $body_data_json=json_encode($body_data);

        $response = $this->curlWithBody('/tokenized/checkout/payment/refund',$header,'POST',$body_data_json);

        // your database operation
        // save $response

        return view('bikash.refund')->with([
            'response' => $response,
        ]);
    }


 public function sendSMS($body,$mobile){
        $user = "TranscomFoodAPI";
        $pass = "Tfl@2006API";
        $sid = "PIZZAHUTBDENG";
        $url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
        $param="user=$user&pass=$pass&sms[0][0]= 88$mobile &sms[0][1]=".urlencode("$body")."&sms[0][2]=123456789&sid=$sid";
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

    }

    public function storeContactById($id){
        $store = Store::where('id',$id)->first();
        if($store){
            return $store->contact_number;
        }else{
            return null;
        }
    }

}
