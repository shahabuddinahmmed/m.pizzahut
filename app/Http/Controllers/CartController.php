<?php

namespace App\Http\Controllers;

use App\Category;
use App\Deal;
use App\Helpers\HelperClass;
use App\HomePageSelect;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCard(Request $request){
        Session::put('discount',0);
        Session::put('couponApplied',0);
        Session::forget('used');
        if(Session::has('cart_last_activity')  && (time() - Session::get('cart_last_activity') > 7200 )){
            Cart::destroy();
        }
        if($request->product_id){
            $product = Product::find($request->product_id);
        }elseif ($request->deal_id){
            $product = Deal::find($request->deal_id);
        }
        if($request->product_virtual_id){
            if(Session::has('MaxProductID')){
                $max_product_id = Session::get('MaxProductID');
                $max_product_id = (int)$max_product_id + 1;
                Session::put('MaxProductID',$max_product_id);
                $product_id = $max_product_id . $request->product_id;
            }else{
                $max_product_id = Product::max('id');
                Session::put('MaxProductID',$max_product_id.'00');
                $product_id = $max_product_id . '00' . $request->product_id;
            }
        }elseif ($request->product_size_id){
            $product_id = $request->product_size_id;
        }
        else{
            $product_id = $request->product_id;
        }

        if($product){
//            return $product->sd;
            $sd = 0;
            $product_raw_price = 0;
            if($product->sd){
                $sd = (int)$request->product_sd;
                if($request->product_raw_price){
                    $product_raw_price = (int)$request->product_raw_price;
                }else{
                    $product_raw_price = (int)$request->product_price;
                }
            }
            if($sd>1){
                $isSDActive = 1;
            }else{
                $isSDActive = 0;
            }
            $vat = $this->findVAT($request->product_price);
            $sd = $this->findSd($request->product_price);
            $cart = Cart::add([
                'id'=>$product_id,
                'name'=>$request->product_name,
                'price'=>$request->product_price,
                'qty'=>$request->product_qty,
                'options'=>[
                    'image'=>$product->image,
                    'product_id'=>$request->product_id,
                    'deal_id'=>$request->deal_id,
                    'short_description'=>$request->product_short_description,
                    'product_raw_price'=>$product_raw_price,
                    'sd'=>$sd,
                    'vat' => $vat,
                ]
            ]);
            $carts = Cart::content();
            Session::put('cart_last_activity',time());
            $this->resetSession();
            if($request->redirect_page){
//                echo $request->redirect_page;
                echo view('front.cart.ajax-update-card-details',['carts'=>$carts]);
            }else{
                echo view('front.includes.ajax-cart',['carts'=>$carts]);
            }
        }else{
            echo 'Product Not Available';
        }
    }

    public function showCart(){
        $selectHomePage = HomePageSelect::find(1);
        $carts = Cart::content();
        $ingredients = Category::where('name','=','recommendation')->first()->products()->published()->get();
        return view('front.cart.view-cart',['carts'=>$carts,'ingredients'=>$ingredients,'selectHomePage'=>$selectHomePage]);

    }
    public function deleteCart(Request $request){
        Session::put('discount',0);
        Session::put('couponApplied',0);
        Session::forget('used');
        $cart = Cart::content()->where('rowId',$request->rowId);
        if($cart->isNotEmpty()){
            Cart::remove($request->rowId);
        }
        $carts = Cart::content();
        $this->resetSession();
        if($request->redirect_page){
            echo view('front.cart.ajax-update-card-details',['carts'=>$carts]);
        }else{
            echo view('front.includes.ajax-cart',['carts'=>$carts]);
        }
//        return redirect('cart/show');
    }
    public function updateCard(Request $request){
        Session::put('discount',0);
        Session::put('couponApplied',0);
        Session::forget('used');
        $cart = Cart::content()->where('rowId',$request->rowId);
        if($cart->isNotEmpty()){
            Cart::update($request->rowId,$request->qty);
        }
        return redirect('cart/show');
    }
    public function updateCardAjax(Request $request){
        Session::put('discount',0);
        Session::put('couponApplied',0);
        Session::forget('used');
        $cart = Cart::content()->where('rowId',$request->rowId);
        if($cart->isNotEmpty()){
            if($request->qty > 0){
                $this->updateCartWithSD($request->rowId,$request->qty);
            }else{
                Cart::remove($request->rowId);
            }
        }
        $carts = Cart::content();
        $this->resetSession();
        if($request->redirect_page){
            echo view('front.cart.ajax-update-card-details',['carts'=>$carts]);
        }else{
            echo view('front.includes.ajax-cart',['carts'=>$carts]);
        }

    }
    protected function resetSession($isSDActive=1){
        $totalSD = 0;
        $taxTotal = 0;
        $carts = Cart::content();
        foreach ($carts as $cart){
//            if($cart->options->deal_id != null){
//                $qty = 1;
//            }else{
//                $qty = (int)$cart->qty;
//            }
            $single_vat = (int)$this->findVAT($cart->price);
            $totalSD += $this->findSd($isSDActive,$cart->price,$single_vat) *(int)$cart->qty;
            $taxTotal += $single_vat*(int)$cart->qty;
        }


//            foreach ($carts as $cart) {
//                $totalSD += round((int)$cart->options->sd);
//            }

        $cartSubTotal = round(str_replace(",","",Cart::subtotal()),2);
//        $taxTotal = round(($cartSubTotal + $totalSD)*.15);
//        $cartTotal = round(str_replace(",","",Cart::total()),2);
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
//        $grandTotal = number_format($cartSubTotal + $totalSD + $taxTotal+$delivery_charge+$dc_vat);
        $grandTotal = number_format($cartSubTotal+$delivery_charge+$dc_vat);
//        $grandTotal = number_format($cartSubTotal);
        Session::put('grandTotal',$grandTotal);
        Session::put('totalPrice',Cart::subtotal());
        Session::put('totalTax',$taxTotal);
        Session::put('totalSD',$totalSD);
        Session::put('sdAndVat',$total_vat_sd);
        Session::put('cart_subtotal',$cartSubTotal);
        Session::put('couponApplied',0);
    }

    function redirectAfterCoupon(){
        $selectHomePage = HomePageSelect::find(1);
        $carts = Cart::content();
        $ingredients = Category::where('name','=','recommendation')->first()->products()->published()->get();;
        return view('front.cart.view-cart',['carts'=>$carts,'ingredients'=>$ingredients,'selectHomePage'=>$selectHomePage]);
    }

//    public function findSd($isSDActive=1,$productPrice=0){
//        if($isSDActive){
//            $sd = (int)$productPrice*0.10;
//        }else{
//            $sd = 0;
//        }
//        return $sd;
//    }

    public function updateCartWithSD($rowId,$qty){
        $cart = Cart::get($rowId);
        $sd = $cart->options->sd;
        $vat_per_product = round($this->findVAT($cart->price));
        $vat = round($vat_per_product*$qty);
        $price = $cart->options->product_raw_price;
        if($sd>0){
            $newSD = round($this->findSd(1,$price,$vat_per_product)*$qty);
        }else{
            $newSD = 0;
        }
        $option = array(
            "image" => $cart->options->image,
            "product_id" => $cart->options->product_id,
            "deal_id" => $cart->options->deal_id,
            "short_description" => $cart->options->short_description,
            "product_raw_price" => $cart->options->product_raw_price,
            "sd" => $sd,
            "vat" => $vat,
        );
        Cart::update(
            $rowId, [
            'qty'=>$qty,
            'options' => $option
        ]);

        return true;
    }

    public function findSd($isSDActive=1,$productPrice=0,$vat=0){
        if($isSDActive){
//            $sd = round($productPrice*0.10);
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
}
