<?php

namespace App\Http\Controllers\Api;

use App\BillingDetail;
use App\Category;
use App\Deal;
use App\Delivery;
use App\Helpers\HelperClass;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ShippingDetail;
use App\SslPayment;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class MobileAppApiController extends Controller
{
    public function customerLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric|digits:11',
            'email' => 'email|required',
            'user_name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $customer = Customer::where('phone_number',$request->phone_number)->first();
        if($customer){
            $customer->first_name        = $request->user_name;
            $customer->email_address     = $request->email;
            $customer->device_token      = $request->device_token;
            $customer->save();
            $token = JWTAuth::fromUser($customer);
        }else{
            Customer::create([
                'first_name'   => $request->user_name,
                'phone_number' => $request->phone_number,
                'email_address'=> $request->email,
                'device_token' => $request->device_token,
            ]);
            $customer = Customer::where('phone_number',$request->phone_number)->first();
            $token = JWTAuth::fromUser($customer);
        }


        return Response::json(compact('customer','token'));

    }

    public function category($storeId){

        $today = date('w');
        $store = Store::where('id', '=', $storeId)->first();
        if($store) {
            $deals = Deal::leftJoin('deals_stores', 'deals.id', '=', 'deals_stores.deal_id')
                ->leftJoin('stores', 'deals_stores.store_id', '=', 'stores.id')
                ->where('stores.id', '=', $storeId)
                ->whereRaw('FIND_IN_SET(' . $today . ',day_selection)')
                ->select('deals.*')->orderBy('deal_order')->get();

            $category_id = '4,6,7,8,9,32,10,11,55,56';
            $category_ids = explode(',', $category_id);
            $all_pizza = Product::published()->with(['addons', 'ingredients'])
                ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                ->where('stores.id', '=', $storeId)
                ->whereIn('categories.id', $category_ids)
                ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                ->orderByRaw("FIELD(category_id,9,6,56,4,7,8,10,11,32,55)")
                ->get();

            $all_pasta = Product::published()->with(['ingredients'])
                ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                ->where('stores.id', '=', $storeId)
                ->where('categories.parent_id', '=', 3)
                ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                ->get();

            $appetisers = Product::published()->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                ->where('stores.id', '=', $storeId)
                ->where('categories.parent_id', '=', 14)
                ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                ->get();

            $drinks = Product::leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                ->where('stores.id', '=', $storeId)
                ->where('categories.parent_id', '=', 42)
                ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                ->get();

            return Response::json(compact('deals', 'all_pizza', 'all_pizza', 'appetisers', 'drinks'));
        }else{
            return Response::json('error','No store found');
        }
    }

    public function stores(){
        $stores = Store::all();
        return Response::json(compact('stores'));
    }

    public function productByCategoryName($name,$storeId){
        $today = date('w');
        $store = Store::where('id', '=', $storeId)->first();
        if($store) {
            if ($name == 'pizza') {
                $category = 'Pizza';
                $category_id = '4,6,7,8,9,32,10,11,55,56,57,61';
                $category_ids = explode(',', $category_id);
                $products = Product::published()->with(['addons', 'ingredients'])
                    ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                    ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                    ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                    ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                    ->where('stores.id', '=', $storeId)
                    ->whereIn('categories.id', $category_ids)
                    ->select('categories.id as category_id', 'stores.name as store_name', 'categories.name as category_name', 'products.*')
                    ->orderByRaw("FIELD(category_id,57,6,4,56,7,8,9,10,11,32,55,61)")
                    ->get();
                return Response::json(compact('products', 'category'));

            } elseif ($name == 'deal') {
                $category = 'Deals';
                $productData = $deals = Deal::leftJoin('deals_stores', 'deals.id', '=', 'deals_stores.deal_id')
                    ->leftJoin('stores', 'deals_stores.store_id', '=', 'stores.id')
                    ->where('stores.id', '=', $storeId)
                    ->whereRaw('FIND_IN_SET(' . $today . ',day_selection)')
                    ->select('deals.*')->orderBy('deal_order')->get();
                $products = array();
                foreach ($productData  as $deal){
                    if($deal->pizza_count!=0 || $deal->pizza_count!=null) {
                        $cateId = json_decode($deal->pizza_selection);
                        $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);
                        if ($dealNotProducts == true) {
                            if ($deal->deal_type == 1) {
                                $deal_product_type = 'variant_price_deal';
                            } else {
                                if (Str::contains($deal->title, 'Sundays') || Str::contains($deal->title, 'BOGO')) {
                                    $deal_product_type = 'spacial_deal';
                                } elseif (Str::contains($deal->title, 'Double')) {
                                    $deal_product_type = 'discount_deal';
                                } elseif (Str::contains($deal->title, 'Pan 4 All') || Str::contains($deal->title, 'PAN 4 All')) {
                                    $deal_product_type = 'pan4all_deal';
                                } elseif (strcasecmp($deal->title, 'wow') == 0) {
                                    $deal_product_type = 'wow';
                                } else {
                                    $deal_product_type = 'deal_detail';
                                }
                            }
                        } else {
                            $deal_product_type = 'deal-products';
                        }
                    }else{
                        $deal_product_type = "combo_deal";
                    }

                    $array = [
                        'id' => $deal->id,
                        'title' => $deal->title,
                        'price' => $deal->price,
                        'sd' => $deal->sd,
                        'short_description' => $deal->short_description,
                        'pizza_count' => $deal->pizza_count,
                        'pizza_size' => $deal->pizza_size,
                        'pizza_selection' => $deal->pizza_selection,
                        'select_deals' => $deal->select_deals,
                        'long_description_header' => $deal->long_description_header,
                        'long_description' => $deal->long_description,
                        'image' => $deal->image,
                        'is_deleted' => $deal->is_deleted,
                        'deal_type' => $deal->deal_type,
                        'deal_order' => $deal->deal_order,
                        'deal_detail_type' => $deal_product_type,
                    ];
                    array_push($products,$array);
                }
//                dd($productsArray);

                return Response::json(compact('products', 'category'));
            } elseif ($name == 'pasta') {
                $category = 'Pasta';
                $products = Product::published()->with(['ingredients'])
                    ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                    ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                    ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                    ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                    ->where('stores.id', '=', $storeId)
                    ->where('categories.parent_id', '=', 3)
                    ->select('categories.id as category_id', 'stores.name as store_name', 'categories.name as category_name', 'products.*')
                    ->get();
                return Response::json(compact('products', 'category'));
            } elseif ($name == "appetisers") {
                $category = 'Appetisers';
                $products = Product::published()->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                    ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                    ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                    ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                    ->where('stores.id', '=', $storeId)
                    ->where('categories.parent_id', '=', 14)
                    ->select('categories.id as category_id', 'stores.name as store_name', 'categories.name as category_name', 'products.*')
                    ->get();
                return Response::json(compact('products', 'category'));
            } elseif ($name == 'drinks') {
                $category = 'Drinks';
                $products = Product::leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                    ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                    ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                    ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                    ->where('stores.id', '=', $storeId)
                    ->where('categories.parent_id', '=', 42)
                    ->select('categories.id as category_id', 'stores.name as store_name', 'categories.name as category_name', 'products.*')
                    ->get();
                return Response::json(compact('products', 'category'));
            } else {
                $category = ' ';
                $products = ' ';
                return Response::json(compact('products', 'category'));
            }
        }else{
            $category = ' ';
            $products = ' ';
            return Response::json(compact('products', 'category'));
        }
    }

    public function toDeals(){
        $today = date('w');
        $topDeals  = Deal::whereRaw('FIND_IN_SET(' . $today . ',day_selection)')->where('select_deals', '1')->orderBy('deal_order', 'asc')->take(4)->get();
        $top_deals = array();
        foreach ($topDeals as $deal) {
            if($deal->pizza_count!=0 || $deal->pizza_count!=null) {
                $cateId = json_decode($deal->pizza_selection);
                $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);
                if ($dealNotProducts == true) {
                    if ($deal->deal_type == 1) {
                        $deal_product_type = 'variant_price_deal';
                    } else {
                        if (Str::contains($deal->title, 'Sundays') || Str::contains($deal->title, 'BOGO')) {
                            $deal_product_type = 'spacial_deal';
                        } elseif (Str::contains($deal->title, 'Double')) {
                            $deal_product_type = 'discount_deal';
                        } elseif (Str::contains($deal->title, 'Pan 4 All') || Str::contains($deal->title, 'PAN 4 All')) {
                            $deal_product_type = 'pan4all_deal';
                        } elseif (strcasecmp($deal->title, 'wow') == 0) {
                            $deal_product_type = 'wow';
                        } else {
                            $deal_product_type = 'deal_detail';
                        }
                    }
                } else {
                    $deal_product_type = 'deal-products';
                }
            }else{
                $deal_product_type = 'combo_deal';
            }
                $data = array(
                    'id' => $deal->id,
                    'title' => $deal->title,
                    'price' => $deal->price,
                    'sd' => $deal->sd,
                    'short_description' => $deal->short_description,
                    'pizza_count' => $deal->pizza_count,
                    'pizza_size' => $deal->pizza_size,
                    'pizza_selection' => $deal->pizza_selection,
                    'select_deals' => $deal->select_deals,
                    'long_description_header' => $deal->long_description_header,
                    'long_description' => $deal->long_description,
                    'image' => $deal->image,
                    'is_deleted' => $deal->is_deleted,
                    'deal_type' => $deal->deal_type,
                    'deal_order' => $deal->deal_order,
                    'deal_detail_type' => $deal_product_type,
                );
                array_push($top_deals, $data);
            }


        return Response::json(compact('top_deals'));
    }

    public  function dealDetails($id,$store_deal_id){
        $store_id = $store_deal_id;
        $today = date('w');

        $deal_availability = Deal::leftJoin('deals_stores', 'deals.id', '=', 'deals_stores.deal_id')
            ->leftJoin('stores', 'deals_stores.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $store_id)
            ->where('deals.id',$id)
            ->whereRaw('FIND_IN_SET(' . $today . ',day_selection)')
            ->first();
        if(!$deal_availability){
          return Response::json(['error'=>'deal not available']);
        }
        $deal = Deal::findOrFail($id);
        if($deal->pizza_count==0 || $deal->pizza_count== null){
            $deal_type = 'combo_deal';
            $products = [];
            return Response::json(compact('deal_type','deal','products'));
        }
        if($deal->deal_type){
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 4)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $favorite_lien_pizza = $query->get();

            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 8)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $supreme_lien_pizza = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 9)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $super_supreme_pizza = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 6)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $veg_delight = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 36)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $cheesy_bites_supreme = $query->get();
            $golden_surprise_supreme = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 54)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $golden_surprise_supreme = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 35)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $cheesy_bites_fav = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 37)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $golden_surprise_fav = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 32)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $thin_crust = $query->get();
            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 55)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $crown = $query->get();
            $deal_type = 'variant_price_deal';

            return Response::json(compact('deal_type','deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites_supreme', 'golden_surprise_supreme','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown'));

//            return view('front.deals.deal_varient_price',compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites_supreme', 'golden_surprise_supreme','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
        }
        $cateId = json_decode($deal->pizza_selection);
        $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6,7,8,9,10,11]);
        if($dealNotProducts==true){
            if (strcasecmp($deal->title, 'wow') == 0) {     //  Pizza Size can choose
                $products = Product::published()->
                leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                    ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                    ->where('categories.parent_id', '=', 44)
                    ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                    ->get();
                $deal = Deal::where('id', '=', $id)->select(
                    'deals.id',
                    'deals.title',
                    'deals.price',
                    'deals.short_description',
                    DB::raw('IF(deals.pizza_size=1,"Family",IF(deals.pizza_size=2,"Medium","Personal")) AS pizza_size'),
                    'deals.pizza_count',
                    'deals.long_description',
                    'deals.image'

                )->first();
                $deal_type = 'wow';
                return Response::json(compact('deal_type','deal','products'));
            } else {                                            // Pizza Size is fixed

                if (isset($deal->pizza_selection)) {
                    $selected_pizza = json_decode($deal->pizza_selection);
                } else {
                    $selected_pizza = [];
                }
                $favorite_lien_pizza = [];
                $supreme_lien_pizza = [];
                $super_supreme_pizza = [];
                $veg_delight = [];
                if (in_array("1", $selected_pizza)) {
                    $favorite_lien_pizza = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 4)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                }
                if (in_array("2", $selected_pizza)) {
                    $supreme_lien_pizza = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 8)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                }
                if (in_array("3", $selected_pizza)) {
                    $super_supreme_pizza = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 9)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                }
                if (in_array("4", $selected_pizza)) {
                    $veg_delight = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 6)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                }
                if (in_array("5", $selected_pizza)) {
                    $cheesy_bites = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 36)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $cheesy_bites = null;
                }
                if (in_array("7", $selected_pizza)) {
                    $cheesy_bites_fav = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 35)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $cheesy_bites_fav = null;
                }
                if (in_array("6", $selected_pizza)) {
                    $golden_surprise = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 54)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $golden_surprise = null;
                }
                if (in_array("8", $selected_pizza)) {
                    $golden_surprise_fav = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 37)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $golden_surprise_fav = null;
                }
                if (in_array("9", $selected_pizza)) {
                    $thin_crust = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 32)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $thin_crust = null;
                }
                if (in_array("10", $selected_pizza)) {
                    $crown = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 55)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $crown = null;
                }
                if (in_array("11", $selected_pizza)) {
                    $kabab_crust = Product::published()->join('products_categories', function ($q) {
                        $q->on('products.id', '=', 'products_categories.product_id');
                    })
                        ->join('categories', function ($q) {
                            $q->on('products_categories.category_id', '=', 'categories.id');
                        })
                        ->join('products_stores', function ($q) {
                            $q->on('products.id', '=', 'products_stores.product_id');
                        })
                        ->where('categories.id', '=', 56)
                        ->where('products_stores.store_id', $store_id)
                        ->select('products.*')
                        ->orderByRaw("id")
                        ->get();
                } else {
                    $kabab_crust = null;
                }

                $deal = Deal::where('id', '=', $id)->select(
                    'deals.id',
                    'deals.title',
                    'deals.price',
                    'deals.short_description',
                    'deals.sd',
                    DB::raw('IF(deals.pizza_size=1,"Family",IF(deals.pizza_size=2,"Medium","Personal")) AS pizza_size'),
                    'deals.pizza_count',
                    'deals.long_description', 'deals.long_description_header',
                    'deals.image'

                )->first();

//                dd($kabab_crust);
                if (Str::contains($deal->title, 'Sundays') || Str::contains($deal->title, 'BOGO')) {// Only First Pizza Price will applicable
                    $deal_type = 'spacial_deal';
                    return Response::json(compact('deal_type','deal','favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust'));
//                    return view('front.deals.deals-detail-special', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                } elseif (Str::contains($deal->title, 'Double')) {// First Pizza + Half of Secound Pizza Price will applicable
                    $deal_type = 'discount_deal';
                    return Response::json(compact('deal_type','deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust'));
//                    return view('front.deals.deals-detail-discount', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                } elseif (Str::contains($deal->title, 'Pan 4 All') || Str::contains($deal->title, 'PAN 4 All')) {// Additional Price - 23 + 39
                    $deal_type = 'pan4all_deal';
                    return Response::json(compact('deal_type','deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust'));
//                    return view('front.deals.deals-detail-pan4all', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                } else {
                    // Additional Price - 39 + 59
                    $deal_type = 'deal_detail';
                    return Response::json(compact('deal_type','deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust'));
//                    return view('front.deals.deals-detail', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                }
            }
        }else{
            $category_id = $cateId[0];
            $products = Product::published()->join('products_categories', function ($q) {
                $q->on('products.id', '=', 'products_categories.product_id');
            })
                ->join('categories', function ($q) {
                    $q->on('products_categories.category_id', '=', 'categories.id');
                })
                ->where('categories.id', '=', $category_id)
                ->select('products.*')
                ->orderByRaw("id")
                ->get();
            $deal_type = 'deal-products';
            return Response::json(compact('deal_type','deal','products'));
//            return view('front.deals.deal-products', compact(['deal','products']));
        }
    }

    public function orderSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tax' => 'required|numeric',
            'sd' => 'required|numeric',
            'total_price' => 'required|numeric',
            'discount' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'order_type' => 'required|string',
            'order_time' => 'required|date_format:Y-m-d H:i:s',
            'store_id'   => 'required|integer',

            'customer_mobile_number' => 'required|numeric|digits:11',
            'customer_email' => 'email|required',
            'name' => 'required',
            'address_details' => 'required',

            'cart' => 'required',
            'location' => 'required',
            'payment_type' => 'required',
            'additional_information' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $order = new Order();
        $order->total_tax = strval($request->tax);
        $order->total_sd = strval($request->sd);
        $order->total_price = strval($request->total_price);
        $order->discount = $request->discount;
        $order->order_total = strval($request->grand_total);
        $order->order_type = $request->order_type;
        $order->order_time = $request->order_time;
        $order->store_id = $request->store_id;
        $order->app_type = 1;

        $customerDetails = Customer::where('phone_number', '=', $request->customer_mobile_number)->get()->first();
        $customerDetails->first_name = $request->name;
        $customerDetails->email_address = $request->email;
        $customerDetails->address = $request->address_details;
        $customerDetails->save();
        $order->customer_id = $customerDetails->id;

        if ($order->save()) {
//            $cartProducts = json_decode($request->cart);
            $cartProducts = $request->cart;
            if ($cartProducts) {
                foreach ($cartProducts as $cartProduct) {
                    $orderDetails = new OrderDetail();
                    $orderDetails->order_id = $order->id;
                    $orderDetails->product_description = $cartProduct['short_description'];
                    $orderDetails->product_name = $cartProduct['name'];
                    $orderDetails->product_price = $cartProduct['price'];
                    $orderDetails->product_quantity = $cartProduct['qty'];
                    if ($orderDetails->save()) {
                        if ($cartProduct['type']== 'product') {
                            $product = Product::find($cartProduct['product_id']);
                            if ($product)
                                $product->order_details()->save($orderDetails);

                        } elseif ($cartProduct['type']== 'deal') {
                            $deal = Deal::find($cartProduct['product_id']);
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
            $shipping->mobile = $request->customer_mobile_number;
            if ($order->shipping_detail()->save($shipping)) {
                if ($request->order_type == 'Delivery') {
                    $delivery_mode = $request->location;
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
            if($payment_type=='SSL'){
                $order->activate();
                $pgwadata =  $request->pgw_data;
//                $pgwadata = json_decode($pgwadata);
                $ssl = new SslPayment();
                $ssl->order_id = $order->id;
                $ssl->amount = $pgwadata['amount'];
                $ssl->bank_tran_id = $pgwadata['bank_tran_id'];
                $ssl->card_brand = $pgwadata['card_brand'];
                $ssl->card_issuer = $pgwadata['card_issuer'];
                $ssl->card_issuer_country_code = $pgwadata['card_issuer_country_code'];
                $ssl->card_no = $pgwadata['card_no'];
                $ssl->card_type = $pgwadata['card_type'];
                $ssl->status = $pgwadata['status'];
                $ssl->store_amount = $pgwadata['store_amount'];
                $ssl->tran_date = $pgwadata['tran_date'];
                $ssl->tran_id = $pgwadata['tran_id'];
                $ssl->val_id = $pgwadata['val_id'];
                $ssl->save();
            }
            $billing_details = new BillingDetail();
            $billing_details->payment_type = $payment_type;
            if ($order->billing_detail()->save($billing_details)) {
                $is_call_center = Customer::is_call_center();
                if ($payment_type == 'Cash') {
                    $order->activate();
                    return response()->json(['orderStatus'=>'Successful','orderID'=>$order->id,'paymentType'=>'Cash','PaymentSatus'=>'Pending']);
                } elseif ($payment_type == 'Online') {
                    return response()->json(['orderStatus'=>'Pending','orderID'=>$order->id,'paymentType'=>'Online','PaymentSatus'=>'Pending']);
                }elseif($payment_type == 'SSL'){
                    return response()->json(['orderStatus'=>'Pending','orderID'=>$order->id,'paymentType'=>'SSL','PaymentSatus'=>'Success']);
                } elseif ($payment_type == 'bKash') {
                    return response()->json(['orderStatus'=>'Pending','orderID'=>$order->id,'paymentType'=>'bkash','PaymentSatus'=>'Pending']);
                }
            } else {
                Order::destroy($order->id);
                return response()->json(['message'=>'Order Deleted. Please try again']);
            }

        }
    }


    public function coupon(Request $request){
        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required',
            'mobile'      => 'required|numeric|digits:11',
            'email'       => 'required|email',
            'carts'       => 'required',
            'cart_total'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $code = $request->coupon_code;
        $mobile = $request->mobile;
        $email  = $request->email;
        $carts = $request->carts;
        $cart_total = $request->cart_total;
        $discount = HelperClass::discountAPI($code, $mobile, $email,$carts,$cart_total);
        return response()->json(['discount'=>$discount]);
    }

    public function banner(){
        $banner = DB::table('home_page_banners')->where('name','mobile_banner')->first();
        if($banner){
            $mobile_banner =  $banner->image;
        }else{
            $mobile_banner =  null;
        }
        $url = 'https://pizzahutbd.com/'.$mobile_banner;

        return response()->json(['banner_url'=>$url]);
    }

}
