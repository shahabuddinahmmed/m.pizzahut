<?php
/**
 * Created by PhpStorm.
 * User: sanaulla
 * Date: 12/27/18
 * Time: 10:32 AM
 */

namespace App\Helpers;


use App\Category;
use App\Coupon;
use App\CouponUsedByUser;
use App\Customer;
use App\CustomerLocation;
use App\Order;
use App\OTPHistory;
use App\Store;
//use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use phpDocumentor\Reflection\Types\True_;

class HelperClass
{
    public static function timeOnly($time)
    {
        return date('h:i A', strtotime($time));
    }
    public static function dateOnly($time)
    {
        return date('Y-m-d', strtotime($time));
    }
    public static function addDate($date)
    {
        return date('Y-m-d',strtotime($date.' day'));
    }
    public static function formatDate($date)
    {
        return date('jS F\, Y ',strtotime($date));
    }
    public static function dateTime($date)
    {
        return date('d/m/Y h:i A',strtotime($date));
    }
    public static function storeName(){
        $store = Store::where('id', '=', Session::get('StoreID'))->first();
        if ($store) {
            return $store->name;
        }else{
            return false;
        }
    }
    public static function recent_location(){
        $recent_searches = [];
        if(Customer::is_call_center()){
            if(Session::has('CustomerMobile')) {
                $customer = Customer::where('phone_number','=',Session::get('CustomerMobile'))->first();
                if($customer){
//                    $customer = Customer::find(Session::get('UserId'));
                    $recent_searches = $customer->customer_locations;
                }
//            $recent_searches = CustomerLocation::where('customer_id','=',Session::get('CustomerId'))->get();
            }
        }else{
            if(Session::has('UserId')) {
                $customer = Customer::find(Session::get('UserId'));
                $recent_searches = $customer->customer_locations;
//            $recent_searches = CustomerLocation::where('customer_id','=',Session::get('CustomerId'))->get();
            }
        }

        if(Session::get('location__old') != Session::get('StoreID')){
            Session::put('location__old', Session::get('StoreID'));
            Session::put('couponApplied',0);
            Session::remove('grandTotal');
            Session::remove('totalPrice');
            Session::remove('totalTax');
            Session::remove('totalSD');
            Session::remove('sdAndVat');
            Session::remove('cart_subtotal');
            Session::remove('couponCode');
            Session::remove('code');
            Session::remove('codeMessage');
            Cart::destroy();
        }
        
        return $recent_searches;
    }
    public static function allCategory(){
        $categories = Category::where([
            'publication_status' => 1,
            'parent_id' => 0
        ])->orderBy('order', 'ASC')->get();
        return $categories;
    }
    public static function unreadNotification(){
        $unread_notifications = 0;
        if($user = Auth::user()){
            if(!$user->store->isEmpty()){
                $store_id = $user->store->first()->id;
                if($store_id > 0){
//                    $unread_notifications = Order::where([['store_id','=',$store_id],['is_readable','=',false]])->orderBy('store_id','desc')->orderBy('id','desc')->count();
                    $unread_notifications = DB::table('orders')
                        ->join('billing_details','orders.id','=','billing_details.order_id')
                        ->where([
                            ['store_id','=',$store_id],
                            ['is_readable','=',false]
                        ])->count();
                }
            }else{
                $unread_notifications = DB::table('orders')
                    ->join('billing_details','orders.id','=','billing_details.order_id')
                    ->where('is_readable','=',false)
                    ->count();
//                $unread_notifications = Order::where([['is_readable','=',false]])->orderBy('store_id','desc')->orderBy('id','desc')->count();
            }
        }
        return $unread_notifications;
    }

    public static function getStoreId(){
        $store_id = 0;
        if($user = Auth::user()){
            if(!$user->store->isEmpty()){
                $store_id = $user->store->first()->id;
            }else{
                $store_id = 100;
            }
        }
        return $store_id;
    }
    public static function getPusherKey(){
        if(App::environment() == 'local'){
            return env('PUSHER_APP_KEY');
        }else{
            return config('broadcasting.connections.pusher.key');
        }
    }
    public static function getIntegralPart($value){
        $int_value = round(str_replace(",","",$value));
        return number_format($int_value);
    }
    public static function storeDeliveryChargeById($id){
        $store = Store::where('id', '=', $id)->first();
        if ($store) {
            return $store->delivery_charge;
        }else{
            return false;
        }
    }

    public static function discount($code,$mobile=null,$email=null){
        $date = Carbon::today()->toDateString();
        $coupon = DB::table('coupons')
            ->where('code',$code)
            ->whereDate('from_date','<=', $date)
            ->whereDate('to_date','>=',$date)
            ->first();
        // $total = Cart::subtotal();
        // $total = str_replace(',','',$total);
        // dd($coupon);
        $discount = 0;
        if($coupon!=null) {
            $total = HelperClass::discountOnTotal($coupon->coupon_for,$coupon->id);
            if($coupon->minimum_amount <= $total){
                $available = self::couponUsedByUser($mobile, $code, $coupon->count);
                if ($available) {
                    if ($coupon->mobile_status != 0) {
                        if ($mobile != null) {
                            $matchMobile = DB::table('coupon_mobile_emails')->where(['coupon_id' => $coupon->id, 'mobile' => $mobile])->first();
                            if ($matchMobile != null) {
                                $matched = 1;
                            } else {
                                $matched = 0;
                            }
                        } elseif ($email != null) {
                            $matchEmail = DB::table('coupon_mobile_emails')->where(['coupon_id' => $coupon->id, 'email' => $email])->first();
                            if ($matchEmail != null) {
                                $matched = 1;
                            } else {
                                $matched = 0;
                            }
                        } else {
                            $matched = 0;
                        }
                    } else {
                        $matched = 1;
                    }

                } else {
                    $matched = 0;
                }
            }else{
                $matched = 0;
            }
        }else{
            return $discount;
        }

        if($coupon->is_percentage!=2){
            if($matched==1){
                $total = HelperClass::discountOnTotal($coupon->coupon_for,$coupon->id);
                if($total>0){
                    if($coupon->is_percentage==1){
                        $discount = ($coupon->value * $total)/100;
                    }else{
                        $discount = $coupon->value;
                    }
                }
            }
        }else {
            return "Free Product(".$coupon->free_product;
        }
        return $discount;
    }
    
     public static function discountAPI($code,$mobile=null,$email=null,$carts,$cart_total){
         $data = 'Invalid Coupon';
        $date = Carbon::today()->toDateString();
        $coupon = DB::table('coupons')
            ->where('code',$code)
            ->whereDate('from_date','<=', $date)
            ->whereDate('to_date','>=',$date)
            ->first();
        $discount = 0;
        $discount_text = '';
        $type = 'money';
        $total = HelperClass::discountOnTotalAPI($coupon->coupon_for, $coupon->id, $carts, $cart_total);
        if($coupon!=null) {
            if ($total >= $coupon->minimum_amount) {
            $available = self::couponUsedByUser($mobile, $code, $coupon->count);
            if ($available) {
                if ($coupon->mobile_status != 0) {
                    if ($mobile != null) {
                        $matchMobile = DB::table('coupon_mobile_emails')->where(['coupon_id' => $coupon->id, 'mobile' => $mobile])->first();
                        if ($matchMobile != null) {
                            $matched = 1;
                        } else {
                            $matched = 0;
                        }
                    } elseif ($email != null) {
                        $matchEmail = DB::table('coupon_mobile_emails')->where(['coupon_id' => $coupon->id, 'email' => $email])->first();
                        if ($matchEmail != null) {
                            $matched = 1;
                        } else {
                            $matched = 0;
                        }
                    } else {
                        $matched = 0;
                    }
                } else {
                    $matched = 1;
                }

            } else {
                $matched = 0;
            }
            }else{
               $matched = 0; 
            }
        }else{
            $matched = 0;
        }
        
        if($matched==1){
            if($coupon->is_percentage!=2) {
                $type = 'amount';
                $total = HelperClass::discountOnTotalAPI($coupon->coupon_for, $coupon->id, $carts, $cart_total);
                if ($total > 0) {
                    if ($coupon->is_percentage == 1) {
                        $discount = ($coupon->value * $total) / 100;
                    } else {
                        $discount = $coupon->value;
                    }
                }
                $data = ['discount'=>$discount,'type'=>$type];
            }else{
                $dt = Carbon::create(2001, 9, 2, 0);
                $start_date = $dt->toDateTimeString();
                $user = Customer::where('phone_number',$mobile)->whereDate('created_at','>=',$start_date)->select('created_at')->first();
                if($user){
                    $discount_text = $coupon->free_product;
                    $type = 'free_product';
                    $data = ['discount'=>$discount,'discount_text'=>$discount_text,'type'=>$type];
                }else{
                  $data = "Invalid copon";   
                }
            }
        }else{
          $data = "Invalid copon"; 
        }
        return $data;
    }


    // public static function discountAPI($code,$mobile=null,$email=null,$carts,$cart_total){
    //     $date = Carbon::today()->toDateString();
    //     $coupon = DB::table('coupons')
    //         ->where('code',$code)
    //         ->whereDate('from_date','<=', $date)
    //         ->whereDate('to_date','>=',$date)
    //         ->first();
    //     $discount = 0;
    //     if($coupon!=null) {
    //         $available = self::couponUsedByUser($mobile, $code, $coupon->count);
    //         if ($available) {
    //             if ($coupon->mobile_status != 0) {
    //                 if ($mobile != null) {
    //                     $matchMobile = DB::table('coupon_mobile_emails')->where(['coupon_id' => $coupon->id, 'mobile' => $mobile])->first();
    //                     if ($matchMobile != null) {
    //                         $matched = 1;
    //                     } else {
    //                         $matched = 0;
    //                     }
    //                 } elseif ($email != null) {
    //                     $matchEmail = DB::table('coupon_mobile_emails')->where(['coupon_id' => $coupon->id, 'email' => $email])->first();
    //                     if ($matchEmail != null) {
    //                         $matched = 1;
    //                     } else {
    //                         $matched = 0;
    //                     }
    //                 } else {
    //                     $matched = 0;
    //                 }
    //             } else {
    //                 $matched = 1;
    //             }

    //         } else {
    //             $matched = 0;
    //         }
    //     }else{
    //         $matched = 0;
    //     }

    //     if($matched==1){
    //         $total = HelperClass::discountOnTotalAPI($coupon->coupon_for,$coupon->id,$carts,$cart_total);
    //         if($total>0){
    //             if($coupon->is_percentage==1){
    //                 $discount = ($coupon->value * $total)/100;
    //             }else{
    //                 $discount = $coupon->value;
    //             }
    //         }
    //     }
    //     return $discount;
    // }

    public static function discountPercentage($oldSubTotal,$discount){
        $discountPercent = ($discount *100)/$oldSubTotal;
        return $discountPercent;
    }

    public static function taxAfterCoupon($oldTax,$discountPercentage){
        $lessTax = ($discountPercentage*$oldTax)/100;
        $newTax = $oldTax - $lessTax;
        return number_format($newTax);
    }
    public static function sdAfterCoupon($oldSd,$discountPercentage){
        $lessSd = ($discountPercentage*$oldSd)/100;
        $newSd = $oldSd - $lessSd;
        return number_format($newSd);
    }

    public static function grandTotalAfterCoupon($newSubTotal=0,$newTax=0,$newSd=0){
        $grandTotal = $newSubTotal;
//        $grandTotal = $newSubTotal+$newTax+$newSd;
        return number_format($grandTotal,2);
    }

    public static function discountOnTotal($discount_for=1,$coupon_id){
        $total = 0;
        if($discount_for==1){
            $coupon = Coupon::find($coupon_id);
            $products = $coupon->products;
            foreach ($products as $product){
                $product_id[] = $product->id;
            }
            foreach (Cart::content() as $cart){
                if(in_array($cart->options->product_id,$product_id)){
                    $total = $total+$cart->price;
                }
            }
        }elseif ($discount_for==2){
            $coupon = Coupon::find($coupon_id);
            $deals = $coupon->deals;
            foreach ($deals as $deal){
                $deal_id[] = $deal->id;
            }
            foreach (Cart::content() as $cart){
                if(in_array($cart->options->deal_id,$deal_id)){
                    $total = $total+$cart->price;
                }

            }

        }elseif ($discount_for==3){
            $coupon   = Coupon::find($coupon_id);
            $deals    = $coupon->deals;
            foreach ($deals as $deal){
                $deal_id[] = $deal->id;
            }
            $products = $coupon->products;
            foreach ($products as $product){
                $product_id[] = $product->id;
            }
            foreach (Cart::content() as $cart){
                if(in_array($cart->options->product_id,$product_id) || in_array($cart->options->deal_id,$deal_id)){
                    $total = $total+$cart->price;
                }
            }
        }else{
            $strSubTotal  = Session::get('totalPrice');
            $total = (float)(str_replace(',','',$strSubTotal));
        }
        return $total;
    }

    public static function discountOnTotalAPI($discount_for=1,$coupon_id,$carts,$cart_total){
        $total = 0;
        if($discount_for==1){
            $coupon = Coupon::find($coupon_id);
            $products = $coupon->products;
            foreach ($products as $product){
                $product_id[] = $product->id;
            }
            foreach ($carts as $cart){
                if(in_array($cart['product_id'],$product_id)){
                    $total = $total+$cart['price'];
                }
            }
        }elseif ($discount_for==2){
            $coupon = Coupon::find($coupon_id);
            $deals = $coupon->deals;
            foreach ($deals as $deal){
                $deal_id[] = $deal->id;
            }
            foreach ($carts as $cart){
                if(in_array($cart['product_id'],$deal_id)){
                    $total = $total+$cart['price'];
                }

            }

        }elseif ($discount_for==3){
            $coupon   = Coupon::find($coupon_id);
            $deals    = $coupon->deals;
            foreach ($deals as $deal){
                $deal_id[] = $deal->id;
            }
            $products = $coupon->products;
            foreach ($products as $product){
                $product_id[] = $product->id;
            }
            foreach ($carts as $cart){
                if(in_array($cart['product_id'],$product_id) || in_array($cart['product_id'],$deal_id)){
                    $total = $total+$cart['price'];
                }
            }
        }else{
            $strSubTotal  = $cart_total;
            $total = (float)(str_replace(',','',$strSubTotal));
        }
        return $total;
    }

    public static function couponUsedByUser($mobile,$coupon,$count){
        $used =  CouponUsedByUser::where('mobile',$mobile)->where('coupon_code',$coupon)->count();
        if($count!=0 || $count != null){
            if($used>=$count){
                return false;
            }else{
                $data = array('mobile'=>$mobile,'coupon_code'=>$coupon);
                CouponUsedByUser::create($data);
                return true;
            }
        }else{
            return true;
        }
    }



    public static function removeQueryCache(){
        if(Cache::has('products')){
            Cache::forget('products');
        };
    }

//    public static function changeGrandTotalWithMode(){
//        if(Session::has('discount')){
//            $discount = Session::get('discount');
//        }else{
//            $discount = 0;
//        }
//        if(Session::has('grandTotal')) {
//            if (Session::has('Mode')) {
//                if (Session::get('Mode') == 'Delivery') {
//                    $cart_total = Session::get('cart_subtotal');
//                    $total_tax = Session::get('totalTax');
//                    $total_sd = Session::get('totalSD');
//                    $total_dc = Session::get('delivery_charge');
//                    $total_dcv = Session::get('dc_vat');
//                    $grandTotal = ($cart_total + $total_tax + $total_sd + $total_dc + $total_dcv) - $discount;
//                    Session::put('grandTotal', $grandTotal);
//                } else {
//                    Session::put('delivery_charge', 0);
//                    Session::put('dc_vat', 0);
//                    $cart_total = Session::get('cart_subtotal');
//                    $total_tax = Session::get('totalTax');
//                    $total_sd = Session::get('totalSD');
//                    $total_dc = 0;
//                    $total_dcv = 0;
//                    $grandTotal = ($cart_total + $total_tax + $total_sd + $total_dc + $total_dcv) - $discount;
//                    Session::put('grandTotal', $grandTotal);
//                }
//            }
//        }
//    }

    public static function changeGrandTotalWithMode(){
        if(Session::has('discount')){
            $discount = Session::get('discount');
        }else{
            $discount = 0;
        }

        if(Session::has('grandTotal')) {
            if (Session::has('Mode')) {
                if (Session::get('Mode') == 'Delivery') {
                    $cart_total = Session::get('cart_subtotal');
                    $total_tax = Session::get('totalTax');
                    $total_sd = Session::get('totalSD');
                    $total_dc = Session::get('delivery_charge');
                    $total_dcv = Session::get('dc_vat');
                    $grandTotal = number_format(($cart_total + $total_dc + $total_dcv) - $discount);
                    Session::put('grandTotal', $grandTotal);
                } else {
                    Session::put('delivery_charge', 0);
                    Session::put('dc_vat', 0);
                    $cart_total = Session::get('cart_subtotal');
                    $total_tax = Session::get('totalTax');
                    $total_sd = Session::get('totalSD');
                    $total_dc = 0;
                    $total_dcv = 0;
                    $grandTotal = number_format(($cart_total + $total_dc + $total_dcv) - $discount);
                    Session::put('grandTotal', $grandTotal);
                }
            }
        }
    }

    public static function updateOTPHistory($phone){
        $otp = OTPHistory::where('mobile',$phone)->orderBy('id','desc')->first();
        $otp->success_status = 1;
        $success = $otp->save();
        if($success){
            return true;
        }else{
            return false;
        }
    }
    public static function countOTPHistory($phone_number,$ip){
       $count_number =  OTPHistory::where(['mobile'=>$phone_number,'success_status'=>0])->whereDate('created_at', '=', date('Y-m-d'))->count();
       $count_ip =  OTPHistory::where(['ip'=>$ip,'success_status'=>0])->whereDate('created_at', '=', date('Y-m-d'))->count();
       if($count_ip<=5){
           if($count_number<=5){
               return true;
           }else{
               return false;
           }
       }else{
           return false;
       }
    }

    public static function insertOTPHistory($phone_number,$ip){
        $otp_history = new OTPHistory();
        $otp_history->mobile = $phone_number;
        $otp_history->ip     = $ip;
        $success = $otp_history->save();
        if($success){
            return true;
        }else{
            return false;
        }

    }

    public static function is_production(){
        if(App::environment() == 'production' && (request()->getHost() == 'pizzahutbd.com' || request()->getHost() == 'm.pizzahutbd.com')){
            return true;
        }else{
            return false;
        }

    }
}
