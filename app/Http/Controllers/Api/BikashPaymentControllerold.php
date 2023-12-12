<?php

namespace App\Http\Controllers\Api;

use App\BillingDetail;
use App\BkashPayment;
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
        $this->base_url = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta';
        // Live
        //$this->base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta';
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
        // $order_id = 1;


        $website_url = URL::to("/");

        $body_data = array(
            'mode' => '0011',
            'payerReference' => ' ',
            'callbackURL' => $website_url.'/bkash/callback',
            'amount' => $request->amount ? $request->amount : 10,
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
        $bkash->transactionStatus  = $decoded_response->transactionStatus;
        $bkash->save();

        return response()->json(['url'=>json_decode($response)->bkashURL]);

        // return redirect((json_decode($response)->bkashURL));
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
//        dd($res_array);

        if(isset($res_array['trxID'])){
            $bkash = BkashPayment::where('paymentID',$paymentID)->first();
            $bkash->trxID = $res_array['trxID'];
            $bkash->amount = $res_array['amount'];
            $bkash->created_time = $res_array['paymentExecuteTime'];
            $bkash->transactionStatus = $res_array['transactionStatus'];
            $bkash->save();
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
            $bkash->transactionStatus = $res_array['transactionStatus'];
            $bkash->save();

            if($res_array['transactionStatus']=='Completed'){
                $order = Order::findOrFaile($bkash->transaction_id);
                $order->active();
                $billing =  BillingDetail::where('order_id',$order->id)->first();
                $billing->payment_status = "Paid";
                $billing->save();
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


    public function insertData($response, $order_id){
        $bkash = new BkashPayment();
        $bkash->transaction_id = $order_id;
        $bkash->amount = $response['amount'];
        $bkash->paymentID = $response['paymentID'];
        $bkash->trxID = $response['trxID'];
        $bkash->currency = $response['currency'];
        $bkash->created_time = $response['paymentExecuteTime'];
        $bkash->save();
        if($response['transactionStatus']=='Completed'){
            $order = Order::findOrFail($order_id);
            $order->updatePaymentStatus('Paid');
        }
    }


}
