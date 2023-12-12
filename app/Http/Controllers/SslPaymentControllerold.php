<?php

namespace App\Http\Controllers;

use App\BillingDetail;
use App\Order;
use App\Product;
use App\SslPayment;
use Illuminate\Http\Request;

class SslPaymentController extends Controller
{
    public function process($order_id){
        $order = Order::with('order_details','customer','shipping_detail')->where('id', $order_id)->first()->toArray();
        $products_ids = array();
        foreach ($order['order_details'] as $product){
            array_push($products_ids,$product['product_id']);
        }
        $products = Product::with('categories')->whereIn('id',$products_ids)->get()->toArray();
        $num_of_item = count($products);
        $product_names = [];
        $product_categories = [];
        foreach ($products as $item) {
            $product_names[] = $item['title'];
            foreach ($item['categories'] as $category){
                $product_categories[] = $category['name'];
                break;
            }
        }
        $product_categories = array_unique($product_categories);
        if (!$order) {
            session()->flash('message', 'Please try again.');
            return;
        }

//                  $ = $order->address->first();
//                  $shipping_address = $order->address1->first();


        $post_data = [
            'store_id'         => 'Pizzahutbdlive',
            'store_passwd'     => '5FD89DA9E05DA80735',
            'total_amount'     => $order['order_total'],
            'currency'         => 'BDT',
            'tran_id'          => $order_id,
            'success_url'      => 'https://m.pizzahutbd.com/' . 'order-process/sslcommerz/success',
            'fail_url'         => 'https://m.pizzahutbd.com/' . 'order-process/sslcommerz/fail',
            'cancel_url'       => 'https://m.pizzahutbd.com/' . 'order-process/sslcommerz/cancel',
            'ipn_url'          => 'https://www.pizzahutbd.com/sslcommerz/ipn',
            'emi_option' => 0,

            'cus_name'         => $order['customer']['first_name'].' '.$order['customer']['last_name'],
            'cus_email'        => $order['customer']['email_address'],

            'cus_add1'         => $order['customer']['address'],
            'cus_add2'         => $order['customer']['address'],
            'cus_city'         => 'Dhaka',
            'cus_state'        => 'Bangladesh',
            'cus_postcode'     => '5678',
            'cus_country'      => 'Bangladesh',

            'cus_phone'        => $order['customer']['phone_number'] ,


            'ship_name'        => $order['shipping_detail']['name'],

            'ship_add1'        => $order['customer']['address'],
            'ship_add2'        => $order['customer']['address'],
            'ship_city'        => 'Dhaka',
            'ship_state'       => 'Bangladesh',
            'ship_postcode'    => '5678',
            'ship_country'     => 'Bangladesh',
            'shipping_method'  => 'Courier',
            'num_of_item'  => $num_of_item,

            'product_name'     => substr(implode(', ',$product_categories), 0, 256),
            'product_category' => substr(implode( ', ',$product_names), 0, 100),
            'product_profile'  => "physical-goods",

            'value_a'          => $order_id,
        ];

        # REQUEST SEND TO SSLCOMMERZ
//        $direct_api_url = config('lwSystem.ssl_commerz_api');
        // $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v4/api.php";
        $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php";

        $handle = curl_init();

        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC

        $content = curl_exec($handle );
        $code    = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($code == 200 && !(curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = json_decode($content);
        } else {
            curl_close( $handle);
            abort(404);
        }
        $sslcz = $sslcommerzResponse;
        if(isset($sslcz->GatewayPageURL) && $sslcz->GatewayPageURL!="" ) {
            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
//            echo "<script>window.location.href = '". $sslcz->GatewayPageURL."';</script>";
//            echo "<meta http-equiv='refresh' content='0;url=".$sslcz->GatewayPageURL."'>";
            header("Location: ". $sslcz->GatewayPageURL);
            exit;
        } else {
            echo "JSON Data parsing error!";
        }

    }

    public function success(Request $request) {
        $val_id=urlencode($request->val_id);
        $store_id='Pizzahutbdlive';
        $store_passwd='5FD89DA9E05DA80735';
        // $requested_url =  ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");
        $requested_url =  ("https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

        $result = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($code == 200 && !( curl_errno($handle))) {
            $result = json_decode($result);

            if ($result->status === 'VALID' || $result->status=='VALIDATED') {
                $order = Order::findOrFail($result->value_a);
                $ssl = new SslPayment();
                $ssl->order_id = $order->id;
                $ssl->amount = $result->amount;
                $ssl->bank_tran_id = $result->bank_tran_id;
                $ssl->card_brand = $result->card_brand;
                $ssl->card_issuer = $result->card_issuer;
                $ssl->card_issuer_country_code = $result->card_issuer_country_code;
                $ssl->card_no = $result->card_no;
                $ssl->card_type = $result->card_type;
                $ssl->status = $result->status;
                $ssl->store_amount = $result->store_amount;
                $ssl->tran_date = $result->tran_date;
                $ssl->tran_id = $result->tran_id;
                $ssl->val_id = $result->val_id;
                $ssl->save();
                $order->activate();
                $billing =  BillingDetail::where('order_id',$order->id)->first();
                $billing->payment_status = "Paid";
                $billing->save();
                return redirect()->route('complete-order', ['order_id' => $order->id]);
            }

            abort(403);
        }
    }
    public function fail(Request $request) {
        return redirect()->route('/')->with('message', 'Payment Problem, Please Try Again.');
    }

    public function cancel(Request $request) {
        return redirect()->route('/')->with('message', 'Payment Problem, Please Try Again.');
    }
    
     public function desktop_success(Request $request) {
        $val_id=urlencode($request->val_id);
        $store_id='testbox';
        // $store_id='Pizzahutbdlive';
        // $store_passwd='5FD89DA9E05DA80735';
        $store_passwd='qwerty';
        $requested_url =  ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");
        // $requested_url =  ("https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

        $result = curl_exec($handle);

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($code == 200 && !( curl_errno($handle))) {
            $result = json_decode($result);

            if ($result->status === 'VALID' || $result->status=='VALIDATED') {
                $order = Order::findOrFail($result->value_a);
                $ssl = new SslPayment();
                $ssl->order_id = $order->id;
                $ssl->amount = $result->amount;
                $ssl->bank_tran_id = $result->bank_tran_id;
                $ssl->card_brand = $result->card_brand;
                $ssl->card_issuer = $result->card_issuer;
                $ssl->card_issuer_country_code = $result->card_issuer_country_code;
                $ssl->card_no = $result->card_no;
                $ssl->card_type = $result->card_type;
                $ssl->status = $result->status;
                $ssl->store_amount = $result->store_amount;
                $ssl->tran_date = $result->tran_date;
                $ssl->tran_id = $result->tran_id;
                $ssl->val_id = $result->val_id;
                $ssl->save();
                $order->activate();
               $billing =  BillingDetail::where('order_id',$order->id)->first();
               $billing->payment_status = "Paid";
               $billing->save();
                return redirect()->route('complete-order', ['order_id' => $order->id]);
            }

            abort(403);
        }
    }
}
