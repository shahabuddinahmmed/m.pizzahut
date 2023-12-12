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
use App\ProductStore;
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
    public function sendLoginSMS(Request $request){
        $validator = Validator::make($request->all(), [
            'body' => 'required',
            'msisdn' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if($this->aesDecrypt($request->body) &&  $this->aesDecrypt($request->msisdn) ){
            $msisdn = $this->aesDecrypt($request->msisdn);
            $sms = $this->aesDecrypt($request->body);
            $this->sendSMS($sms,$msisdn);
            $success = 1;
            return Response::json(compact('success'));
        }else{
            $success = 0;
            return Response::json(compact('success'));
        }


    }
    public function customerLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required',
            'user_name' => 'required',
            'email' => 'required',
            'verification' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $test = ['name'=>$this->aesDecrypt($request->user_name),'email'=>$this->aesDecrypt($request->email),'token'=>$this->aesDecrypt($request->device_token)];
      
        $name = $this->aesDecrypt($request->user_name);
        $email = $this->aesDecrypt($request->email);
        $d_token = $this->aesDecrypt($request->device_token);
        
        if($this->aesDecrypt($request->user_name)!= '0' &&  $this->aesDecrypt($request->email)!= '0' && $this->aesDecrypt($request->device_token)!='0' && $this->aesDecrypt($request->verification)  ){
            if($this->aesDecrypt($request->verification) == 'otp_verified'){
                $customer = Customer::where('phone_number',$this->aesDecrypt($request->phone_number))->first();
                if($customer){
                    $customer->first_name        = $this->aesDecrypt($request->user_name);
                    $customer->email_address     = $this->aesDecrypt($request->email);
                    $customer->device_token      = $this->aesDecrypt($request->device_token);
                    $customer->save();

                    $token = JWTAuth::fromUser($customer);

                }else{
                    Customer::create([
                        'first_name'   => $this->aesDecrypt($request->user_name),
                        'phone_number' => $this->aesDecrypt($request->phone_number),
                        'email_address'=> $this->aesDecrypt($request->email),
                        'device_token' => $this->aesDecrypt($request->device_token),
                    ]);
                    $customer = Customer::where('phone_number',$this->aesDecrypt($request->phone_number))->first();
                    $token = JWTAuth::fromUser($customer);
                }
                return Response::json(compact('customer','token'));
            }else{
                $succuss = 0;
                return Response::json(compact('succuss'));
            }
            
        }else{
            $succuss = 0;
            return Response::json(compact('succuss'));
        }


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

            $category_id = '4,6,7,8,9,32,10,11,55,56,57';
            $category_ids = explode(',', $category_id);
            $all_pizza = Product::published()->with(['addons', 'ingredients'])
                ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                ->where('stores.id', '=', $storeId)
                ->whereIn('categories.id', $category_ids)
                ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                ->orderByRaw("FIELD(category_id,6,56,4,7,8,9,10,11,32,55,57)")
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
                $category_id = '4,6,7,8,9,32,10,11,55,56,57';
                $category_ids = explode(',', $category_id);
                $products = Product::published()->with(['addons', 'ingredients'])
                    ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                    ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                    ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                    ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                    ->where('stores.id', '=', $storeId)
                    ->where('products.is_only_deal', '=', 0)
                    ->whereIn('categories.id', $category_ids)
                    ->select('categories.id as category_id', 'stores.name as store_name', 'categories.name as category_name', 'products.*')
                    ->orderByRaw("FIELD(category_id,6,4,56,7,8,9,10,11,32,55,57)")
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
                        $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12]);
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
                $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12]);
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
        $cateId = json_decode($deal->pizza_selection);
        $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6,7,8,9,10,11,12]);
        if($dealNotProducts==true) {
            if ($deal->deal_type == 1) {
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 4)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $favorite_lien_pizza = $query->get();

                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 8)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $supreme_lien_pizza = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 9)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $super_supreme_pizza = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 6)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $veg_delight = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 36)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $cheesy_bites_supreme = $query->get();
                $golden_surprise_supreme = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 54)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $golden_surprise_supreme = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 35)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $cheesy_bites_fav = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 37)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $golden_surprise_fav = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 32)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $thin_crust = $query->get();
                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 55)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $crown = $query->get();

                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 56)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $kabab_crust = $query->get();

                $query = Product::published()->
                leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                    ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                    ->where('deal_product_prices.deal_id', '=', $deal->id)
                    ->where('deal_product_prices.category_id', '=', 57)
                    ->where('deal_product_prices.status', '=', 1);
                if ($deal->pizza_size == 1) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_family as price');
                } elseif ($deal->pizza_size == 2) {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_medium as price');
                } else {
                    $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
                }
                $battle_of_beef = $query->get();
                $deal_type = 'variant_price_deal';

                return Response::json(compact('deal_type', 'deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites_supreme', 'golden_surprise_supreme', 'golden_surprise_fav', 'cheesy_bites_fav', 'thin_crust', 'crown','kabab_crust','battle_of_beef'));

//            return view('front.deals.deal_varient_price',compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites_supreme', 'golden_surprise_supreme','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
            } else {
//        $cateId = json_decode($deal->pizza_selection);
//        $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6,7,8,9,10,11]);
//        if($dealNotProducts==true){
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
                        'deals.addon_name',
                        'deals.addon_price',
                        DB::raw('IF(deals.pizza_size=1,"Family",IF(deals.pizza_size=2,"Medium","Personal")) AS pizza_size'),
                        'deals.pizza_count',
                        'deals.long_description',
                        'deals.image'

                    )->first();
                    $deal_type = 'wow';
                    return Response::json(compact('deal_type', 'deal', 'products'));
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
                    if (in_array("12", $selected_pizza)) {
                        $battle_of_beef = Product::published()->join('products_categories', function ($q) {
                            $q->on('products.id', '=', 'products_categories.product_id');
                        })
                            ->join('categories', function ($q) {
                                $q->on('products_categories.category_id', '=', 'categories.id');
                            })
                            ->join('products_stores', function ($q) {
                                $q->on('products.id', '=', 'products_stores.product_id');
                            })
                            ->where('categories.id', '=', 57)
                            ->where('products_stores.store_id', $store_id)
                            ->select('products.*')
                            ->orderByRaw("id")
                            ->get();
                    } else {
                        $battle_of_beef = null;
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
                        'deals.image',
                        'deals.addon_name',
                        'deals.addon_price'

                    )->first();

//                dd($kabab_crust);
                    if (Str::contains($deal->title, 'Sundays') || Str::contains($deal->title, 'BOGO')) {// Only First Pizza Price will applicable
                        $deal_type = 'spacial_deal';
                        return Response::json(compact('deal_type', 'deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise', 'golden_surprise_fav', 'cheesy_bites_fav', 'thin_crust', 'crown', 'kabab_crust','battle_of_beef'));
//                    return view('front.deals.deals-detail-special', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                    } elseif (Str::contains($deal->title, 'Double')) {// First Pizza + Half of Secound Pizza Price will applicable
                        $deal_type = 'discount_deal';
                        return Response::json(compact('deal_type', 'deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise', 'golden_surprise_fav', 'cheesy_bites_fav', 'thin_crust', 'crown', 'kabab_crust','battle_of_beef'));
//                    return view('front.deals.deals-detail-discount', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                    } elseif (Str::contains($deal->title, 'Pan 4 All') || Str::contains($deal->title, 'PAN 4 All')) {// Additional Price - 23 + 39
                        $deal_type = 'pan4all_deal';
                        return Response::json(compact('deal_type', 'deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise', 'golden_surprise_fav', 'cheesy_bites_fav', 'thin_crust', 'crown', 'kabab_crust','battle_of_beef'));
//                    return view('front.deals.deals-detail-pan4all', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                    } else {
                        // Additional Price - 39 + 59
                        $deal_type = 'deal_detail';
                        return Response::json(compact('deal_type', 'deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise', 'golden_surprise_fav', 'cheesy_bites_fav', 'thin_crust', 'crown', 'kabab_crust','battle_of_beef'));
//                    return view('front.deals.deals-detail', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown']));
                    }
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
            'tax' => 'required',
            'sd' => 'required',
            'total_price' => 'required',
            'discount' => 'required',
            'grand_total' => 'required',
            'order_type' => 'required',
            'order_time' => 'required',
            'store_id'   => 'required',

            'customer_mobile_number' => 'required',
            'customer_email' => 'required',
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
        $tax = $this->aesDecrypt($request->tax);
        $sd = $this->aesDecrypt($request->sd);
        $delivery_charge = $this->aesDecrypt($request->delivery_charge);
        $d_vat = $this->aesDecrypt($request->delivery_charge_vat);
        $total_price = $this->aesDecrypt($request->total_price);
        $discount = $this->aesDecrypt($request->discount);
        $grand_total = $this->aesDecrypt($request->grand_total);
        $order_type = $this->aesDecrypt($request->order_type);
        $order_time = $this->aesDecrypt($request->order_time);
        $store_id = $this->aesDecrypt($request->store_id);
        $customer_mobile = $this->aesDecrypt($request->customer_mobile_number);
        $customer_name = $this->aesDecrypt($request->name);
        $customer_email = $this->aesDecrypt($request->email);
        $customer_address = $this->aesDecrypt($request->address_details);
        $location = $this->aesDecrypt($request->location);
        $additional_info = $this->aesDecrypt($request->additional_information);
        $payment_type = $this->aesDecrypt($request->payment_type);
        $order = new Order();
//        $order->total_tax = strval($request->tax);
//        $order->total_sd = strval($request->sd);
//        $order->total_price = strval($request->total_price);
//        $order->discount = $request->discount;
//        $order->order_total = strval($request->grand_total);
//        $order->order_type = $request->order_type;
//        $order->order_time = $request->order_time;
//        $order->store_id = $request->store_id;
        $order->total_tax = strval($tax);
        $order->total_sd = strval($sd);
        $order->total_price = strval($total_price);
        $order->discount = $discount;
        $order->order_total = strval($grand_total);
        $order->delivery_charge = strval($delivery_charge);
        $order->delivery_vat = strval($d_vat);
        $order->order_type = $order_type;
        $order->order_time = $order_time;
        $order->store_id = $store_id;
        $order->app_type = 1;

        $customerDetails = Customer::where('phone_number', '=', $customer_mobile)->get()->first();
        $customerDetails->first_name = $customer_name;
        $customerDetails->email_address = $customer_email;
        $customerDetails->address = $customer_address;
        $customerDetails->save();
        $order->customer_id = $customerDetails->id;

        if ($order->save()) {
//            $cartProducts = json_decode($request->cart);
            $cartProducts = $request->cart;
            if ($cartProducts) {
                foreach ($cartProducts as $cartProduct) {
                    $short_desc = $this->aesDecrypt($cartProduct['short_description']);
                    $name = $this->aesDecrypt($cartProduct['name']);
                    $price = $this->aesDecrypt( $cartProduct['price']);
                    $qty = $this->aesDecrypt( $cartProduct['qty']);
                    $type = $this->aesDecrypt($cartProduct['type']);
                    $id = $this->aesDecrypt($cartProduct['product_id']);
                    $orderDetails = new OrderDetail();
                    $orderDetails->order_id = $order->id;
                    $orderDetails->product_description =  $short_desc;
                    $orderDetails->product_name = $name;
                    $orderDetails->product_price = $price;
                    $orderDetails->product_quantity = $qty;
                    if ($orderDetails->save()) {
                        if ($type== 'product') {
                            $product = Product::find($id);
                            if ($product)
                                $product->order_details()->save($orderDetails);

                        } elseif ($type== 'deal') {
                            $deal = Deal::find($id);
                            if ($deal)
                                $deal->order_details()->save($orderDetails);
                        }
                    }
                }
            }


            //****************Shipping Detail******************//


            $shipping = new ShippingDetail();
            $shipping->name = $customer_name;
            $shipping->email = $customer_email;
            $shipping->mobile = $customer_mobile;
            if ($order->shipping_detail()->save($shipping)) {
                if ($order_type == 'Delivery') {
                    $delivery_mode = $location;
                    $delivery = new Delivery();
                    $delivery->delivering_to = $delivery_mode;
                    $delivery->address_details = $customer_address;
                    $delivery->additional_information = $additional_info;
                    $delivery->shipping_detail_id = $shipping->id;
                    $delivery->save();
                }
            }

            //****************Billing Detail******************//

            $payment_type = $payment_type;
            if($payment_type=='SSL'){
                
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
            $sms = 'Thank you for ordering Pizza Hut. Your order no is '.$order->id.' of Tk. '.$order->order_total.'. For any query please call. **** ('.$this->storeContactById($store_id).')';
            if($payment_type != 'SSL') {
                $this->sendSMS($sms, $customer_mobile);
            }
            // $this->sendSMS($sms,$customer_mobile);
            if ($order->billing_detail()->save($billing_details)) {
                $is_call_center = Customer::is_call_center();
                if ($payment_type == 'Cash') {
                    $order->activate();
                    return response()->json(['orderStatus'=>'Successful','orderID'=>$order->id,'paymentType'=>'Cash','PaymentSatus'=>'Pending']);
                } elseif ($payment_type == 'Online') {
                    return response()->json(['orderStatus'=>'Successful','orderID'=>$order->id,'paymentType'=>'Online','PaymentSatus'=>'Pending']);
                }elseif($payment_type == 'SSL'){
                    return response()->json(['orderStatus'=>'Successful','orderID'=>$order->id,'paymentType'=>'SSL','PaymentSatus'=>'Pending']);
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
    public function deliveryCharge($store_id){
        $charge = Store::where('id',$store_id)->first();
        if($charge){
            $d_charge =  $charge->delivery_charge;
            return response()->json(['delivery_charge'=>$d_charge]);
        }else{
            $error = "No store is found";
            return response()->json(['error'=>$error]);
        }
    }

    public function aesDecrypt($string){
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'mIdZpOmbz+2uHGJb/tZ1PWkmdiN6Qixt7lBTbyih9rU=';
        $secret_iv = 'X+P502PxEwmm0oSPRGvGYg==';
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, base64_decode($secret_key), 1, base64_decode($secret_iv));
        return $output;
    }

    public function sendSMS($body,$mobile){
        $user = "TranscomFoodAPI";
        $pass = "o54=8P96";
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
    
     public function updateSSLPaymentStatus(Request $request){
       $order_id = $request->order_id;
        $status   = $request->status;
        $order = Order::find($order_id);
        $payment = SslPayment::where('order_id',$order_id)->first();
        $payment->status = $status;
        $payment->save();
        $billing =  BillingDetail::where('order_id',$order->id)->first();
        if($status== 'VALID'){
            $billing->payment_status = "Paid";
            $billing->save();
            $order->activate();
             $sms = 'Thank you for ordering Pizza Hut. Your order no is '.$order->id.' of Tk. '.$order->order_total.'. For any query please call. **** ('.$this->storeContactById($order->store_id).')';
            $phone = $this->getCustomerMobile($order->customer_id);
            $this->sendSMS($sms, $phone);
        }
        return response()->json(['orderStatus'=>'Success','orderID'=>$order->id,'paymentType'=>'SSL','PaymentSatus'=>$status]);

    }

    public function getCustomerMobile($id){
        $cus = Customer::where('id',$id)->first();
        return $cus->phone_number;
    }
    
    public function orderHistory($id){
       $orders =  Order::with('order_details')->where('customer_id',$id)->orderBY('id','desc')->get();
       return response()->json(['orders'=>$orders]);
    }
    
    public function reorderProductStatus($order_id,$store_id){
        $unavailable_product = [];
        $unavailable_deal = [];
        $today = date('w');
       $products = OrderDetail::where('order_id',$order_id)->get();
      foreach ($products as $product){
          if($product->product_type=='App\Product'){
              $isTrue =   ProductStore::where(['store_id'=>$store_id,'product_id'=>$product->product_id])->first();
              if(!$isTrue){
                 array_push($unavailable_product,$product->product_id);
              }
          }else{
              $isDeal = Deal::leftJoin('deals_stores', 'deals.id', '=', 'deals_stores.deal_id')
                  ->leftJoin('stores', 'deals_stores.store_id', '=', 'stores.id')
                  ->where('stores.id', '=', $store_id)
                  ->whereRaw('FIND_IN_SET(' . $today . ',day_selection)')
                  ->where('deals.id',$product->product_id)
                  ->select('deals.*')->first();
              if(!$isDeal){
                  array_push($unavailable_deal,$product->product_id);
              }
          }
      }

        return response()->json(['product_id'=>$unavailable_product,'deals'=>$unavailable_deal]);
    }


}
