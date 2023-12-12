<?php

namespace App\Http\Controllers;

use App\BillingDetail;
use App\BkashPayment;
use App\Helpers\HelperClass;
use App\Order;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Exception;


class BKashCheckoutController extends Controller
{
    protected $username;
    protected $password;
    protected $appKey;
    protected $appSecret;
    protected $baseUrl;
    public function __construct()
    {
        if(HelperClass::is_production()){
            $this->appKey = 'mgpei1c2695bdg945r6ll2qd';
            $this->appSecret = 'agpfbfhcv6436n76e6mh9ff2pblno44iit0hbpvg8fb86te39v4';
            $this->username = 'TRANSCOMFOODSPIZZAHUT';
            $this->password = 'tR5@aN9Sc7Hu';
            $this->baseUrl = 'https://checkout.pay.bka.sh/v1.2.0-beta';
        }else{
            $this->appKey = '5nej5keguopj928ekcj3dne8p';
            $this->appSecret = '1honf6u1c56mqcivtc9ffl960slp4v2756jle5925nbooa46ch62';
            $this->username = 'testdemo';
            $this->password = 'test%#de23@msdao';
            $this->baseUrl = 'https://checkout.sandbox.bka.sh/v1.2.0-beta';
//            $this->appKey = 'mgpei1c2695bdg945r6ll2qd';
//            $this->appSecret = 'agpfbfhcv6436n76e6mh9ff2pblno44iit0hbpvg8fb86te39v4';
//            $this->username = 'TRANSCOMFOODSPIZZAHUT';
//            $this->password = 'tR5@aN9Sc7Hu';
//            $this->baseUrl = 'https://checkout.pay.bka.sh/v1.2.0-beta';
        }

    }

    public function checkout(){
        if (Session::get('orderID')){
            $order_id =  Session::get('orderID');
        }else{
            return redirect()->route('/')->with('message', 'Please Set You Order Again');
        }
        if ($order_id) {
            $order = Order::find($order_id);
            if ($order) {
                $store_id = $order->store_id;
                if ($store_id) {
                    if($order->customer_id){
                        $customer = $order->customer;
                        $bkash_agreement_id = '';
                    }else{
                        return redirect()->route('/')->with('message', 'Create your Account first.');
                    }
                    $store = Store::find($store_id);
                    if ($store) {
                        $shipping = BillingDetail::where('order_id', '=', $order_id)->get()->last();
                        if ($shipping) {
                            $bkash = '';
                            if ($shipping->payment_type == 'bKash') {
                                $bkash = BkashPayment::where('transaction_id','=',$order_id)->first();
                                return view('front.checkout.bkash.checkout',compact(['order','customer','bkash']));
//                                }
                            }else{
                                return redirect()->route('/')->with('message', 'Your Payment is not bKash.');
                            }
                        }
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

    protected function getTokenHeader(){
        $header = array(
            'Content-Type:application/json',
            'Accept:application/json',
            'username:'.$this->username,
            'password:'.$this->password
        );
        return $header;
    }
    protected function getHeader(){
        $header=array(
            'Content-Type:application/json',
            'Accept:application/json',
            'authorization:'.Session::get('id_token'),
            'x-app-key:'.$this->appKey
        );
        return $header;
    }

    public function getGrantToken(){
            $request_data = array(
                'app_key' => $this->appKey,
                'app_secret' => $this->appSecret
            );
            $url = curl_init("{$this->baseUrl}/checkout/token/grant");
            $request_data_json = json_encode($request_data);

            curl_setopt($url, CURLOPT_HTTPHEADER, $this->getTokenHeader());
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $request_data_json);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

            $data = curl_exec($url);
            curl_close($url);
            $decoded_data = json_decode($data);
            if (isset($decoded_data->errorMessage)) {
                Session::flash('errorMessage', $decoded_data->errorMessage);
            }
            if(isset($decoded_data->refresh_token)){
                Session::put('refresh_token', $decoded_data->refresh_token);
            }
            Session::put('id_token', $decoded_data->id_token);
            Session::put('expires_in', time() + (30));
            return 'true';

    }

    public function getRefreshToken()
    {
        $request_data = array(
            'app_key' => $this->appKey,
            'app_secret' => $this->appSecret,
            'refresh_token' => Session::get('refresh_token')
        );
        $url = curl_init("{$this->baseUrl}/checkout/token/refresh");
        $request_data_json = json_encode($request_data);
        curl_setopt($url, CURLOPT_HTTPHEADER, $this->getTokenHeader());
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $data = curl_exec($url);
        curl_close($url);
        $decoded_data = json_decode($data);
        if (isset($decoded_data->errorMessage)) {
            Session::flash('errorMessage', $decoded_data->errorMessage);
            if (isset($decoded_data->refresh_token)) {
                Session::put('refresh_token', $decoded_data->refresh_token);
            }
            if (isset($decoded_data->id_token)) {
                Session::put('id_token', $decoded_data->id_token);
                Session::put('expires_in', time() + (30));
                return 'true';
            }

        }
    }

    public function createPayment($orderId)
    {
        if ($this->getGrantToken() != 'true') {
            return $this->getGrantToken();
        }
        $order_id = $orderId;
        $order = Order::find($order_id);
        if ($order) {
            $amount = $order->order_total;
            $invoice = $order->id;
            $currency = 'BDT';
            $createpaybody = array(
                'amount' => $amount,
                'currency' => $currency,
                'intent' => 'sale',
                'merchantInvoiceNumber' => $invoice,
            );
            $url = "{$this->baseUrl}/checkout/payment/create";
            $request_data_json = json_encode($createpaybody);
            $url = curl_init($url);
            curl_setopt($url, CURLOPT_HTTPHEADER, $this->getHeader());
            curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url, CURLOPT_POSTFIELDS, $request_data_json);
            curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

            $data = curl_exec($url);
            curl_close($url);
            $json_back_data = json_decode($data);
                if (isset($json_back_data->paymentID)) {
                    $payment = BkashPayment::where('transaction_id', '=', $order_id)->first();
                    if ($payment) {
                        $bKashData = BkashPayment::find($payment->id);
                    } else {
                        $bKashData = new BkashPayment();
                    }
                    $bKashData->transaction_id = $order_id;
                    $bKashData->amount = $json_back_data->amount;
                    $bKashData->paymentID = $json_back_data->paymentID;
                    $bKashData->currency = $json_back_data->currency;
                    $bKashData->trxID = '';
                    $timestamp = substr($json_back_data->createTime, 0, 19);      //"2019-08-06T12:19:25:593 GMT+0600"                           // "2020-01-07T11:55:34"
                    $mysql = date_format(date_create($timestamp), 'Y-m-d H:i:s');
                    $bKashData->created_time = $mysql;
                    $bKashData->save();
                }

                echo $data;
            }
    }

    protected function payment($paymentId){
        try {
            return $this->executePayment($paymentId);
        }catch (Exception $exception){
            return $this->queryPayment($paymentId);
        }

    }

    protected function executePayment($paymentId){
        if ($this->getGrantToken() != 'true') {
            return $this->getGrantToken();
        }
        $data = array('paymentID'=> $paymentId);
        $json_data = json_encode($data);
        $url = "{$this->baseUrl}/checkout/payment/execute/".$paymentId;
        $url = curl_init($url);
        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $data);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $data = curl_exec($url);
        $info = curl_getinfo($url);
        curl_close($url);
        $intInfo =  (int)$info['total_time'];
        $json_back_data = json_decode($data);
        if( $intInfo >= 30 || isset($json_back_data->message) && $json_back_data->message=='Endpoint request timed out'){
            return $this->queryPayment($paymentId);
        }

            Session::put('paymentData', $json_back_data);
            if (isset($json_back_data->transactionStatus) && $json_back_data->transactionStatus = 'Completed') {
                $bkash_payment = BkashPayment::where('paymentID', '=', $paymentId)->first();
                $bkash_payment->trxID = $json_back_data->trxID;
                if ($bkash_payment->save()) {
                    $order = Order::findOrFail($bkash_payment->transaction_id);
                    $order->updatePaymentStatus('Paid');
                }
            }
            return $data;
    }

    protected function queryPayment($paymentId){
        if ($this->getGrantToken() != 'true') {
            return $this->getGrantToken();
        }
        $url = "{$this->baseUrl}/checkout/payment/query/".$paymentId;
        $url = curl_init($url);
        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($url);
        curl_close($url);
        $json_back_data = json_decode($data);
            if (isset($json_back_data->transactionStatus)) {
                if ($json_back_data->transactionStatus == 'Completed') {
                    $bkash_payment = BkashPayment::where('paymentID', '=', $paymentId)->first();
                    $bkash_payment->trxID = $json_back_data->trxID;
                    if ($bkash_payment->save()) {
                        $order = Order::findOrFail($bkash_payment->transaction_id);
                        $order->updatePaymentStatus('Paid');
                    }
                }
            }
            return $data;
    }
}
