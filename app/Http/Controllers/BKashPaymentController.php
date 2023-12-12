<?php

namespace App\Http\Controllers;

use App\BillingDetail;
use App\BKash;
use App\BkashPayment;
use App\Customer;
use App\Order;
use App\ShippingDetail;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BKashPaymentController extends Controller
{
    private $bkash;

    public function __construct(BKash $bkash)
    {
        $this->bkash = $bkash;
    }
//    private $base_URL = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta';
//    private $tokenize_app_key = '7epj60ddf7id0chhcm3vkejtab';
//    private $tokenize_app_secret = '18mvi27h9l38dtdv110rq5g603blk0fhh5hg46gfb27cp2rbs66f';
//    private $tokenize_username = 'sandboxTokenizedUser01';
//    private $tokenize_pass = 'sandboxTokenizedUser12345';

    public function index(){

    }

    public function tokenizeCheckout(){
        if (Session::has('orderID')){
            $order_id = Session::get('orderID');
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
                        if($customer)
                            $bkash_agreement_id = $customer->bkash_agreement_id;
                        else
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
//                                if ($shipping->payment_status == 'Paid') {
//                                    return redirect()->route('/')->with('message', 'Your bKash Payment is already DONE');
//                                }else{
                                return view('front.checkout.bkash.tokenize',compact(['order','customer','bkash']));
//                                }
                            }else{
                                return redirect()->route('/')->with('message', 'Your Payment is not bKash.');
                            }
                        }
//                        $is_call_center = Customer::is_call_center();
//                        $store_number = $store->contact_number;
//                        return view('front.checkout.complete-order', compact(['is_call_center', 'order_id', 'store_number']));
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

    public function getGrantToken(){
        if(Session::has('id_token')){
            $expires_in = Session::get('expires_in');
            if($expires_in < time()){
                if($this->getRefreshToken() != 'true'){
                    return $this->getRefreshToken();
                }
            }
            return 'true';
        }else{
            $request_data = array(
                'app_key'=>$this->bkash->getTokenizeAppKey(),
                'app_secret'=>$this->bkash->getTokenizeAppSecret()
            );
            $url = curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/token/grant");
            $request_data_json=json_encode($request_data);
            curl_setopt($url,CURLOPT_HTTPHEADER, $this->getTokenHeader());
            curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
            curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $data = curl_exec($url);
//            Log::info('getGrantToken: '.$data);
            curl_close($url);
            $decoded_data = json_decode($data);
            $checkResponse = $this->checkErrorCode($decoded_data);
//            return $checkResponse;
            if($checkResponse != 'true'){
                return $checkResponse;
            }else{
                if(isset($decoded_data->refresh_token))
                    Session::put('refresh_token',$decoded_data->refresh_token);
                if(isset($decoded_data->id_token)){
                    Session::put('id_token',$decoded_data->id_token);
                    Session::put('expires_in',time() + (50 * 60));
                    return 'true';
                }
            }
        }
    }

    public function getRefreshToken(){
        $request_data = array(
            'app_key'=>$this->bkash->getTokenizeAppKey(),
            'app_secret'=>$this->bkash->getTokenizeAppSecret(),
            'refresh_token'=>Session::get('refresh_token')
        );
        $url = curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/token/refresh");
        $request_data_json=json_encode($request_data);
        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getTokenHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $data = curl_exec($url);
//        Log::info('getRefreshToken: '.$data);
        curl_close($url);
        $decoded_data = json_decode($data);


        $checkResponse = $this->checkErrorCode($decoded_data);
//            return $checkResponse;
        if($checkResponse != 'true'){
            return $checkResponse;
        }else{
            if(isset($decoded_data->refresh_token))
                Session::put('refresh_token',$decoded_data->refresh_token);
            if(isset($decoded_data->id_token)){
                Session::put('id_token',$decoded_data->id_token);
                Session::put('expires_in',time() + (50 * 60));
                return 'true';
            }
        }
    }

    protected function getCustomer(){
        $order_id = Session::get('orderID');
        $order = Order::find($order_id);
        if($order){
            if(isset($order->customer_id))
                return $order->customer;
        }else{
            return '';
        }
    }

    public function createAgreement(){//        payerReference

        if($this->getGrantToken() != 'true'){
            return $this->getGrantToken();
        }
        if($this->getOrderID() != 'true'){
            return $this->getOrderID();
        }
        $customer = $this->getCustomer();
        if($customer){
            $payerReference = $customer->phone_number;
        }else{
            $payerReference = 'PizzaHut';
        }
        $callbackURL = route('bkash_agreement_callback_url'); //'http://localhost/callback.php'; //

//        $request_data = array(
//            'payerReference'=>$payerReference,
//            'callbackURL'=>$callbackURL
//        );

        $createagreementbody=array(
            'mode' => '0000',
            'payerReference'=>$payerReference,
            'callbackURL'=>$callbackURL
//        ,
//            'amount' => $amount,
//            'currency'=>$currency,
//            'intent'=>'sale',
//            'merchantInvoiceNumber'=>$invoice
        );


        $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/create");
        $createagreementbodyx=json_encode($createagreementbody);

        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $createagreementbodyx);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($url, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($url);
        if (curl_errno($url)) {
            $error_msg = curl_error($url);
        }
        curl_close ($url);
        if (isset($error_msg)) {
            Log::info('createAgreement error: ' . $error_msg);
            return $this->statusAgreement();
        }else{
//            Log::info('createAgreement: '.$data);
            $decoded_data = json_decode($data);
            $checkResponse = $this->checkErrorCode($decoded_data);
            if($checkResponse != 'true'){
                return $checkResponse;
            }else{
                if(isset($decoded_data->bkashURL)){
                    Session::put('agreementPaymentID',$decoded_data->paymentID);   //AG9SUQL1578549543663
                    return redirect()->away($decoded_data->bkashURL);
                }
                else{
                    return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                }
            }
        }



//{
//    "statusCode": "0000",
//  "statusMessage": "Successful",
//  "paymentID": "AGSRCU01578551845880",
//  "payerReference": "01682855342",
//  "bkashURL": "https://sandbox.payment.bkash.com/redirect/tokenized/?paymentID=AGSRCU01578551845880&hash=3I3tnHzI*wrss8j9ZCg0h5hnYp33J2zSOHZ40EnoKPhbUPsL5pKAAuPseZZsgKygJW9P0HZ)PdjZi2.T)Ps)dDFk2tkN)kZ1G9iQ1578551845996&mode=0000&apiVersion=v1.2.0-beta",
//  "agreementCreateTime": "2020-01-09T12:37:25:994 GMT+0600",
//  "agreementStatus": "Initiated",
//  "callbackURL": "http://localhost/callback.php",
//  "successCallbackURL": "http://localhost/callback.php?paymentID=AGSRCU01578551845880&execute=Agreement&status=success",
//  "failureCallbackURL": "http://localhost/callback.php?paymentID=AGSRCU01578551845880&execute=Agreement&status=failure",
//  "cancelledCallbackURL": "http://localhost/callback.php?paymentID=AGSRCU01578551845880&execute=Agreement&status=cancel"
//}


    }

    public function bKashAgreementResponse(){
//        Array ( [paymentID] => AGRPD4B1579068393221 [execute] => Agreement [status] => success [apiVersion] => 1.2.0-beta )
        $payment_id = Input::get('paymentID');
        $status = Input::get('status');
        if($status == 'success'){
            return $this->executeAgreement($payment_id);
//            $online_payment = BkashPayment::where('paymentID','=',$payment_id)->first();
//            if($online_payment){
//                $billing_details = BillingDetail::where('order_id', '=', $online_payment->transaction_id)->first();
//                $billing_details->payment_status = 'Paid';
//                $billing_details->save();
//                return redirect()->route('complete-order', ['order_id' => $online_payment->transaction_id]);
//            }
        }elseif ($status == 'failure'){
            return redirect()->route('tokenize_checkout')->with('message', 'Your bKash Agreement Creation has been Failed');
        }elseif ($status == 'cancel'){
            return redirect()->route('tokenize_checkout')->with('message', 'Your bKash Agreement Creation has been Cancelled');
        }


//{
//  "statusCode": "0000",
//  "statusMessage": "Successful",
//  "paymentID": "AGSRCU01578551845880",
//  "agreementID": "TokenizedMerchant0192Q28DG1578551981796",
//  "payerReference": "01682855342",
//  "agreementExecuteTime": "2020-01-09T12:39:41:796 GMT+0600",
//  "agreementStatus": "Completed",
//  "customerMsisdn": "01709639679"
//}



//        Array
//        (
//            [paymentID] => AGSRCU01578551845880
//            [execute] => Agreement
//        [status] => success
//        [apiVersion] => 1.2.0-beta
//)

//{
//    "statusCode": "2054",
//  "statusMessage": "Agreement execution pre-requisite hasn't been met"
//}


    }

    public function executeAgreement($paymentID){
        $request_data = array(
            'paymentID'=>$paymentID
        );
        $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/execute");
        $createagreementbodyx=json_encode($request_data);

        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $createagreementbodyx);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($url, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($url);
        if (curl_errno($url)) {
            $error_msg = curl_error($url);
        }
        curl_close ($url);
        if (isset($error_msg)) {
            Log::info('executeAgreement error: ' . $error_msg);
            return $this->paymentStatus();
        }else{
//            Log::info('executeAgreement: '.$data);
            $decoded_data = json_decode($data);
            $checkResponse = $this->checkErrorCode($decoded_data);
            if($checkResponse != 'true'){
                return $checkResponse;
            }else{
                if($decoded_data->agreementStatus == 'Completed'){
                    Session::put('agreementID',$decoded_data->agreementID);   //TokenizedMerchant0192Q28DG1578551981796
                    $customer = $this->getCustomer();
                    if($customer){
                        $customer->bkash_msisdn = $decoded_data->customerMsisdn;
                        $customer->bkash_agreement_id = $decoded_data->agreementID;
                        $customer->save();
                    }
                    return redirect()->route('tokenize_checkout')->with('message', 'Your Agreement ID: '.$decoded_data->agreementID.' successfully created.');
                } else{
                    return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                }
            }
        }
    }

    public function statusAgreement(){

        $customer = $this->getCustomer();
        if($customer) {
            $bkash_agreement_id = $customer->bkash_agreement_id;
            if ($bkash_agreement_id) {
                if($this->getGrantToken() != 'true'){
                    return $this->getGrantToken();
                }
                $request_data = array(
                    'agreementID'=>$bkash_agreement_id
                );
                $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/agreement/status");
                $createpaybodyx=json_encode($request_data);

                curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
                curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
                curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
                curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $data = curl_exec($url);
//                Log::info('statusAgreement: '.$data);
                curl_close($url);
                $decoded_data = json_decode($data);
                $checkResponse = $this->checkErrorCode($decoded_data);
                if($checkResponse != 'true'){
                    return $checkResponse;
                }else{
                    if($decoded_data->agreementStatus == 'Completed'){
                        return redirect()->route('tokenize_checkout')->with('message', 'Your '.$decoded_data->agreementStatus.' Agreement ID: '.$decoded_data->agreementID);
                    }elseif ($decoded_data->agreementStatus == 'Initiated'){
                        return redirect()->route('tokenize_checkout')->with('message', 'Your '.$decoded_data->agreementStatus.' Agreement ID: '.$decoded_data->agreementID);
                    }
                    else{
                        return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                    }
                }

            }else{
                return redirect()->route('tokenize_checkout')->with('message','Already Canceled');
            }
        }
        else{
            return redirect()->route('tokenize_checkout')->with('message','Already Canceled');
        }


//  "statusCode": "0000",
//  "statusMessage": "Successful",
//  "agreementID": "TokenizedMerchant01GDKWWXS1578809528568",
//  "paymentID": "AGX08V31578808822962",
//  "agreementStatus": "Cancelled",
//  "agreementCreateTime": "2020-01-12T12:00:23:019 GMT+0600",
//  "agreementExecuteTime": "2020-01-12T12:12:08:568 GMT+0600",
//  "agreementVoidTime": "2020-01-12T14:37:56:969 GMT+0600",
//  "payerReference": "01682855342",
//  "customerMsisdn": "01709639679"

    }

    public function managePayment(){
        return view('front.checkout.bkash.manage-payment');
    }

    public function cancelAgreement(){
        if($this->getGrantToken() != 'true'){
            return $this->getGrantToken();
        }
        $customer = $this->getCustomer();
        if($customer){
            $bkash_agreement_id = $customer->bkash_agreement_id;
            if($bkash_agreement_id){
                $request_data = array(
                    'agreementID'=>$bkash_agreement_id
                );
                $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/agreement/cancel");
                $createpaybodyx=json_encode($request_data);

                curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
                curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
                curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
                curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                $data = curl_exec($url);
//                Log::info('cancelAgreement: '.$data);
                curl_close($url);
                $decoded_data = json_decode($data);
                $checkResponse = $this->checkErrorCode($decoded_data);
                if($checkResponse != 'true'){
                    return $checkResponse;
                }else{
                    if($decoded_data->agreementStatus == 'Cancelled'){
                        $customer->bkash_msisdn = '';
                        $customer->bkash_agreement_id = '';
                        $customer->save();
                        return redirect()->route('tokenize_checkout')->with('message', 'Your Agreement ID: '.$decoded_data->agreementID . ' Cancel Successfully');
                    } else{
                        return redirect()->route('tokenize_checkout',['message'=>'Unknown Error']);
                    }
                }
            }else{
                return redirect()->route('tokenize_checkout',['message'=>'Already Canceled']);
            }
        }else{
            return redirect()->route('tokenize_checkout',['message'=>'Registration First']);
        }


//  "statusCode": "0000",
//  "statusMessage": "Successful",
//  "agreementID": "TokenizedMerchant01GDKWWXS1578809528568",
//  "paymentID": "AGX08V31578808822962",
//  "agreementStatus": "Cancelled",
//  "agreementCreateTime": "2020-01-12T12:00:23:019 GMT+0600",
//  "agreementExecuteTime": "2020-01-12T12:12:08:568 GMT+0600",
//  "agreementVoidTime": "2020-01-12T14:37:56:969 GMT+0600",
//  "payerReference": "01682855342",
//  "customerMsisdn": "01709639679"

    }

    public function paymentUsingAgreement(){        //agreementIdForPayment
        $order_id = Session::get('orderID');

        if($this->getGrantToken() != 'true'){
            return $this->getGrantToken();
        }
        if($this->getOrderID() != 'true'){
            return $this->getOrderID();
        }
        $order_id = Session::get('orderID');
        $order = Order::find($order_id);
        if($order){
//            $payment = BkashPayment::where('transaction_id','=',$order_id)->first();
//            if($payment){
//                if($payment->paymentID){
//                }else{
//                }
//            }else{
            $amount=$order->order_total;
            $invoice=$order->id;



            $callbackURL = route('bkash_payment_agreement_callback_url'); //'http://localhost/callback.php';//
            $currency = 'BDT';
            $customer = $this->getCustomer();
            if($customer){
                $agreementID = $customer->bkash_agreement_id;
            }else{
                $payerReference = '';
            }

//        $withAgreement = array(
//            'mode'=>'0001',
//            'agreementID' => $agreementID
//        );
//        $withoutAgreement = array(
//            'mode'=>'0011',
//            'agreementID' => $agreementID
//        );

            $createpaybody=array(
                'mode'=>'0001',
                'agreementID' => $agreementID,
                'callbackURL'=>$callbackURL,
                'amount'=>$amount,
                'currency'=>$currency,
                'intent'=>'sale',
                'merchantInvoiceNumber'=>$invoice,
            );

//		$url=curl_init("$baseURL/checkout/payment/create");
            $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/create");

            $createpaybodyx=json_encode($createpaybody);

            curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
            curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
            curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($url, CURLOPT_TIMEOUT, 30);
            $data = curl_exec($url);
            if (curl_errno($url)) {
                $error_msg = curl_error($url);
            }
            curl_close($url);
            if (isset($error_msg)) {
                Log::info('paymentUsingAgreement error: ' . $error_msg);
                return $this->paymentStatus();
            }else{
//                    Log::info('paymentUsingAgreement: '.$data);
                $decoded_data = json_decode($data);
                $checkResponse = $this->checkErrorCode($decoded_data);
                if($checkResponse != 'true'){
                    return $checkResponse;
                }else{
                    if(isset($decoded_data->paymentID)){
                        Session::put('paymentID',$decoded_data->paymentID);   //TR0001RB1578809003997
                        $payment = BkashPayment::where('transaction_id','=',$order_id)->first();
                        if($payment){
                            $online_payment = BkashPayment::find($payment->id);
                        }else{
                            $online_payment = new BkashPayment();
                        }
                        $online_payment->transaction_id = $decoded_data->merchantInvoiceNumber;
                        $online_payment->amount = $decoded_data->amount;
                        $online_payment->paymentID = $decoded_data->paymentID;
                        $online_payment->currency = $decoded_data->currency;
                        if(isset($decoded_data->agreementID))
                            $online_payment->agreementID = $decoded_data->agreementID;
                        $timestamp = substr($decoded_data->paymentCreateTime,0,19);      //"2019-08-06T12:19:25:593 GMT+0600"                           // "2020-01-07T11:55:34"
                        $mysql     = date_format(date_create($timestamp),'Y-m-d H:i:s');
                        $online_payment->created_time = $mysql;//date("m-d-y H:i:s",$time);// $time->format('m-d-y H:i:s');
                        if ($online_payment->save()) {
//                                        Session::put('paymentID',$get_data->paymentID);
                            if(isset($decoded_data->bkashURL)){
                                return redirect()->away($decoded_data->bkashURL);
                            }
                            else{
                                return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                            }
                        }
                    }else{
                        return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                    }
                }
            }
//            }
        }
    }

    public function bKashAgreementPaymentResponse(){
//        Array
//        (
//            [paymentID] => PAYFF2G41578811482287
//            [execute] => Payment
//        [status] => success
//        [apiVersion] => 1.2.0-beta
//)

        $payment_id = Input::get('paymentID');
        $status = Input::get('status');
        if($status == 'success'){
            return $this->executeUsingAgreement($payment_id);
//            return redirect()->route('tokenize_checkout')->with('message', 'Successfully DONE - Your bKash Payment using Agreement');
        }elseif ($status == 'failure'){
            return redirect()->route('/fail-url')->with('message', 'Your bKash Payment has been Failed');
        }elseif ($status == 'cancel'){
            return redirect()->route('/cancel-url')->with('message', 'Your bKash Payment has been Cancelled');
        }
    }

    public function executeUsingAgreement($paymentID){
        if($this->getGrantToken() != 'true'){
            return $this->getGrantToken();
        }


//        {
//            "statusCode": "0000",
//  "statusMessage": "Successful",
//  "paymentID": "TR0001W31579082781926",
//  "agreementID": "TokenizedMerchant01D2X7F7G1579074177346",
//  "payerReference": "01709639679",
//  "customerMsisdn": "01709639679",
//  "trxID": "7AF901TZ8V",
//  "amount": "1",
//  "transactionStatus": "Completed",
//  "paymentExecuteTime": "2020-01-15T16:07:58:930 GMT+0600",
//  "currency": "BDT",
//  "intent": "sale",
//  "merchantInvoiceNumber": "1111"
//}


//        $paymentID = Session::get('paymentID');

        $request_data = array(
            'paymentID'=>$paymentID
        );

        $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/execute");

        $createpaybodyx=json_encode($request_data);

        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($url, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($url);
        if (curl_errno($url)) {
            $error_msg = curl_error($url);
        }
        curl_close ($url);
        if (isset($error_msg)) {
            Log::info('executeUsingAgreement error: ' . $error_msg);
            return $this->paymentStatus();
        }else{
//            Log::info('executeUsingAgreement: '.$data);
            $decoded_data = json_decode($data);
            $checkResponse = $this->checkErrorCode($decoded_data);
            if($checkResponse != 'true'){
                return $checkResponse;
            }else{
                if($decoded_data->transactionStatus == 'Completed'){
                    $bkash_payment = BkashPayment::where('paymentID','=',$paymentID)->first();
                    $bkash_payment->trxID = $decoded_data->trxID;
                    if ($bkash_payment->save()) {
//                        $billing_details = BillingDetail::where('order_id', '=', $bkash_payment->transaction_id)->first();
//                        $billing_details->payment_status =  'Paid';
//                        $billing_details->save();
                        $order = Order::findOrFail($bkash_payment->transaction_id);
                        $order->updatePaymentStatus('Paid');
                        $this->removeCache();
                        return redirect()->route('complete-order', ['order_id' => $bkash_payment->transaction_id]);
                    }else{
                        Session::put('trxID',$decoded_data->trxID);   //7AF901TZ8V
                        return redirect()->route('tokenize_checkout')->with('message', 'Payment Done. Your trxID: '.$decoded_data->trxID);
                    }
                } else{
                    return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                }
            }
        }
    }

    protected function removeCache()
    {
        Session::forget('orderID');
        Session::forget('id_token');
        Session::forget('expires_in');
        Session::forget('refresh_token');
        Session::forget('agreementPaymentID');
        Session::forget('agreementID');
        Session::forget('paymentID');
        Session::forget('trxID');
    }

    public function checkoutOnly(){
        if($this->getGrantToken() != 'true'){
            return $this->getGrantToken();
        }
        if($this->getOrderID() != 'true'){
            return $this->getOrderID();
        }
        $amount='1';
        $invoice='1111';
        $payerReference = '01709639679';
        $callbackURL = route('bkash_payment_agreement_callback_url'); //'http://localhost/callback.php';//
        $currency = 'BDT';
        $agreementID = Session::get('agreementID');
        $withAgreement = array(
            'mode'=>'0001',
            'agreementID' => $agreementID
        );
        $withoutAgreement = array(
            'mode'=>'0011',
            'agreementID' => $agreementID
        );

        $createpaybody=array(
            'mode'=>'0011',
//            'agreementID' => $agreementID,
            'payerReference'=>$payerReference,
            'callbackURL'=>$callbackURL,
            'amount'=>$amount,
            'currency'=>$currency,
            'intent'=>'sale',
            'merchantInvoiceNumber'=>$invoice,
        );

        $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/create");

        $createpaybodyx=json_encode($createpaybody);

        curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
        curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $data=curl_exec($url);
        curl_close($url);
        $decoded_data = json_decode($data);
        $checkResponse = $this->checkErrorCode($decoded_data);
        if($checkResponse != 'true'){
            return $checkResponse;
        }else {
            if (isset($decoded_data->paymentID)) {
                Session::put('paymentID', $decoded_data->paymentID);   //TR0001RB1578809003997
                $online_payment = new BkashPayment();
                $online_payment->transaction_id = $decoded_data->merchantInvoiceNumber;
                $online_payment->amount = $decoded_data->amount;
                $online_payment->paymentID = $decoded_data->paymentID;
                $online_payment->currency = $decoded_data->currency;
                if (isset($decoded_data->agreementID))
                    $online_payment->agreementID = $decoded_data->agreementID;
                $timestamp = substr($decoded_data->paymentCreateTime, 0, 19);      //"2019-08-06T12:19:25:593 GMT+0600"                           // "2020-01-07T11:55:34"
                $mysql = date_format(date_create($timestamp), 'Y-m-d H:i:s');
                $online_payment->created_time = $mysql;//date("m-d-y H:i:s",$time);// $time->format('m-d-y H:i:s');
                if ($online_payment->save()) {
//                                        Session::put('paymentID',$get_data->paymentID);
                    if (isset($decoded_data->bkashURL)) {
                        return redirect()->away($decoded_data->bkashURL);
                    } else {
                        return redirect()->route('print_error_notice', ['message' => 'Unknown Error']);
                    }
                }
            } else {
                return redirect()->route('print_error_notice', ['message' => 'Unknown Error']);
            }
        }
    }

    public function paymentStatus(){

        $order_id = Session::get('orderID');
        $order = Order::find($order_id);
        if($order) {
            $payment = BkashPayment::where('transaction_id', '=', $order_id)->first();
            if ($payment) {
                if(isset($payment->paymentID)) {
                    if($this->getGrantToken() != 'true'){
                        return $this->getGrantToken();
                    }
                    $paymentID = $payment->paymentID;
                    $request_data = array(
                        'paymentID'=>$paymentID
                    );
                    $url=curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/payment/status");
                    $createpaybodyx=json_encode($request_data);

                    curl_setopt($url,CURLOPT_HTTPHEADER, $this->getHeader());
                    curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
                    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    $data = curl_exec($url);
//                    Log::info('paymentStatus: '.$data);
                    curl_close($url);
                    $decoded_data = json_decode($data);
                    $checkResponse = $this->checkErrorCode($decoded_data);
                    if($checkResponse != 'true'){
                        return $checkResponse;
                    }else{
                        if(isset($decoded_data->transactionStatus)){
                            if($decoded_data->transactionStatus == 'Completed'){
                                return redirect()->route('tokenize_checkout')->with('message', 'transactionStatus: '.$decoded_data->transactionStatus.'. trxID ID: '.$decoded_data->trxID);
                            }elseif ($decoded_data->transactionStatus == 'Initiated'){
                                return redirect()->route('tokenize_checkout')->with('message', 'transactionStatus: '.$decoded_data->transactionStatus.'. verificationStatus: '.$decoded_data->verificationStatus);
                            } else{
                                return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                            }
                        }else{
                            if($decoded_data->agreementStatus == 'Completed'){
                                return redirect()->route('tokenize_checkout')->with('message', 'Your '.$decoded_data->agreementStatus.' Agreement ID: '.$decoded_data->agreementID);
                            }elseif ($decoded_data->agreementStatus == 'Initiated'){
                                return redirect()->route('tokenize_checkout')->with('message', 'Your '.$decoded_data->agreementStatus.' Agreement ID: '.$decoded_data->agreementID);
                            }
                            else{
                                return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
                            }

                        }

                    }
                }else{
                    return redirect()->route('tokenize_checkout')->with('message', 'You didn\'t payment yet');
                }
            }else{
                return redirect()->route('tokenize_checkout')->with('message', 'You didn\'t payment yet');
            }
        }else{
            return redirect()->route('tokenize_checkout')->with('message', 'You didn\'t payment yet');
        }


//  "statusCode": "0000",
//  "statusMessage": "Successful",
//  "paymentID": "TR0001RB1578809003997",
//  "mode": "0001",
//  "paymentCreateTime": "2020-01-12T12:03:24:060 GMT+0600",
//  "paymentExecuteTime": "2020-01-12T12:13:20:155 GMT+0600",
//  "amount": "1",
//  "currency": "BDT",
//  "intent": "sale",
//  "merchantInvoice": "1111",
//  "trxID": "7AC401TT1O",
//  "transactionStatus": "Completed",
//  "verificationStatus": "Complete",
//  "payerReference": "01682855342",
//  "agreementID": "TokenizedMerchant01KXXIMO41578560144612",
//  "agreementStatus": "Completed",
//  "agreementCreateTime": "2020-01-09T14:38:58:438 GMT+0600",
//  "agreementExecuteTime": "2020-01-09T14:55:44:612 GMT+0600"

    }

    public function searchTransactionAPI(){
        $order_id = Session::get('orderID');
        $order = Order::find($order_id);
        if($order) {
            $payment = BkashPayment::where('transaction_id', '=', $order_id)->first();
            if ($payment) {
                if ($payment->trxID) {
                    if ($this->getGrantToken() != 'true') {
                        return $this->getGrantToken();
                    }

                    $trxID = $payment->trxID;

                    $request_data = array(
                        'trxID' => $trxID
                    );
                    $url = curl_init("{$this->bkash->getBaseURL()}/tokenized/checkout/general/searchTransaction");
                    $createpaybodyx = json_encode($request_data);

                    curl_setopt($url, CURLOPT_HTTPHEADER, $this->getHeader());
                    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($url, CURLOPT_POSTFIELDS, $createpaybodyx);
                    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                    curl_setopt($url, CURLOPT_TIMEOUT, 30);
                    $data = curl_exec($url);
                    if (curl_errno($url)) {
                        $error_msg = curl_error($url);
                    }
                    curl_close ($url);
                    if (isset($error_msg)) {
                        Log::info('Curl error: ' . $error_msg);
                    }else{
//                        Log::info('searchTransactionAPI: ' . $data);
//                    curl_close($url);
                        $decoded_data = json_decode($data);
                        $checkResponse = $this->checkErrorCode($decoded_data);
                        if ($checkResponse != 'true') {
                            return $checkResponse;
                        } else {
                            return $data;
                        }
                    }

                } else {
                    return redirect()->route('tokenize_checkout')->with('message', 'You payment is not Completed');
                }
            }else{
                return redirect()->route('tokenize_checkout')->with('message', 'You didn\'t payment yet');
            }
        }else{
            return redirect()->route('tokenize_checkout')->with('message', 'You didn\'t payment yet');
        }
    }

    protected function checkErrorCode($get_access_token){
//        $get_access_token = json_decode($data);
        if(isset($get_access_token->statusCode)){
            if($get_access_token->statusCode == '0000'){
                return 'true';
            } else{
                return redirect()->route('tokenize_checkout')->with('message', $this->makeFullMessage($get_access_token->statusMessage));
            }
        }elseif(isset($get_access_token->errorCode)){
            $message = $get_access_token->errorMessage;
            return redirect()->route('tokenize_checkout')->with('message', $this->makeFullMessage($get_access_token->errorMessage));
//            return redirect()->route('print_error_notice',compact(['message']));
        }elseif(isset($get_access_token->message)){
            $message = $get_access_token->message;
            return redirect()->route('tokenize_checkout')->with('message', $this->makeFullMessage($get_access_token->message));
//            return redirect()->route('print_error_notice',compact(['message']));
        }
        else{
            return redirect()->route('tokenize_checkout')->with('message', $this->makeFullMessage('Unknown Error'));
//            return redirect()->route('print_error_notice',['message'=>'Unknown Error']);
        }
    }

    private function makeFullMessage($message){
        return "Your Payment Has Been Failed Due To:\n ".$message;
    }

    public function printErrorNotice(){
        //        {
//            "statusMessage": "Username does not exist",
//  "statusCode": "9999"
//}
//        return $data;
        $error_message = Input::get('message');
        return view('front.checkout.bkash.error-message',compact(['error_message']));
    }

    protected function getTokenHeader(){
        $header = array(
            'Content-Type:application/json',
            "username:".$this->bkash->getTokenizeUsername(),
            "password:".$this->bkash->getTokenizePass()
        );
        return $header;
    }
    protected function getHeader(){
        $header=array(
            'Content-Type:application/json',
            'authorization:'.Session::get('id_token'),
            "x-app-key:".$this->bkash->getTokenizeAppKey());
        return $header;
    }

    protected function getOrderID(){
        if(Session::has('orderID')){
            return 'true';
        }else{
            return redirect()->route('/')->with('message', 'bKash Session Time Out. Please Try Again.');
        }
    }
}
