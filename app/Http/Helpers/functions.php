<?php

function getStoreNameById($id){
    $store = DB::table('stores')->where('id',$id)->first();
    $name = '';
    if($store){
        $name = $store->name;
    }

    return $name;

}

function getNewOrder($store_id){
    $date = date("Y-m-d H:i:s");
    $startTime = date("Y-m-d 07:00:00");
    if(session()->get('start') == null){
        session()->put('start',$startTime);
        $start = session()->get('start');
    }else{
        $start = session()->get('start');
    }
//    $time = strtotime($date);
//    $time = $time - (2 * 60);
//    $old_date = date("Y-m-d H:i:s", $time);
//    $agoDate = date('Y-m-d 00:00:00', strtotime('-1 day', strtotime($date)));
    if($store_id!=0) {
        $new_orders = DB::table('orders')->where('store_id', $store_id)->whereBetween('created_at', [$start, $date])->count();
    }else{
        $new_orders = DB::table('orders')->whereBetween('created_at', [$start, $date])->count();
    }
    $audio = false;
    if($new_orders!=0){
        $audio = true;
    }
    session()->put('start',$date);
    return $audio;
}

function getStoreByUserId($user_id){
    $store = DB::table('user_stores')->where('user_id',$user_id)->first();
    if($store){
        return $store->store_id;
    }else{
        return 0;
    }
}

function getBikashPaymentByOrderId($orderId){
    $bkashPayment = DB::table('bkash_payments')->where('transaction_id',$orderId)->first();
    if($bkashPayment){
        return $bkashPayment->id;
    }else{
        return false;
    }

}

function getProductNameById($id){
    $product = DB::table('products')->where('id',$id)->first();
    if($product) {
        return $product->title;
    }else{
        return null;
    }
}
function getCategoryNameById($id){
    $category = DB::table('categories')->where('id',$id)->first();
    return $category->name;
}

function getRefundIsCompleted($orderId){
    $refund =  DB::table('b_kash_refunds')->where('order_id',$orderId)->first();
    if($refund){
        return $refund;
    }else{
        return 0;
    }
}

function getHomeBanner(){
    $banner = DB::table('home_page_banners')->where('name','desktop_banner')->first();
    if($banner){
        return $banner->image;
    }else{
        return null;
    }

}

function getNewOrderCount($store_id){
    $date = date("Y-m-d H:i:s");
    $startTime = date("Y-m-d 07:00:00");
    if(session()->get('start_count') == null){
        session()->put('start_count',$startTime);
        $start = session()->get('start_count');
    }else{
        $start = session()->get('start_count');
    }
//    dd(array('start'=>$start,'date'=>$date));
//    dd($start);
//    dd($start);
//    $time = strtotime($date);
//    $time = $time - (2 * 60);
//    $old_date = date("Y-m-d H:i:s", $time);
//    $agoDate = date('Y-m-d 00:00:00', strtotime('-1 day', strtotime($date)));
    if($store_id!=0) {
        $new_orders = DB::table('orders')->where('store_id', $store_id)->whereBetween('created_at', [$start, $date])->count();
    }else{
        $new_orders = DB::table('orders')->whereBetween('created_at', [$start, $date])->count();
    }
    session()->put('start_count',$date);
    return $new_orders;
}

function get_show_price($price,$sd_status=1){
    $sd = 0;
    if($sd_status==1){
        $sd =  (10*$price) / 100;
    }
    $price_with_sd = $price+$sd;
    $vat = (5*$price_with_sd) / 100;
    return round($price + $vat +$sd);
}

function active_link(){
    $current = url()->current();
    $url_arr = explode('/',$current);
    if(isset($url_arr[5]) & $url_arr['4']=='categories'){
        return ['link'=>$url_arr[3], 'cat'=>$url_arr[5]];
    }
    if(isset($url_arr[3])){
        if($url_arr[3]=='pizza'){
            return ['link'=>$url_arr[3], 'cat'=>2];
        }
        return ['link'=>$url_arr[3], 'cat'=>0];
    }
    return ['link'=>'', 'cat'=>0];
}

function getProductCategory($id,$type='App\Product'){
    //app = 14
    //drink = 42
    //pasta = 3
    //Pizza = 2;
    $cat = '';
    if($type=='App\Product') {
        $product = \App\Product::where('id',$id)->first();
        foreach ($product->categories as $category){
            if($category->parent_id==3){
                $cat = 'pasta';
            }elseif($category->parent_id==14){
                $cat = 'appetisers';
            }elseif($category->parent_id==42){
                $cat = 'drinks';
            }else{
                $cat = 'pizza';
            }
        }

        return $cat;

    }else{
        return 'deals';
    }

}

function getProductImage($id,$type='App\Product'){
    if($type=='App\Product') {
        $img = \App\Product::where('id', $id)->select('image')->first();
    }else{
        $img = \App\Deal::where('id',$id)->select('image')->first();
    }
    if($img){
        return $img->image;
    }else{
        return '';
    }
}

