<?php

namespace App\Http\Controllers;

use App\Addon;
use App\BKash;
use App\Category;
use App\Coupon;
use App\Customer;
use App\CustomerDetail;
use App\CustomerLocation;
use App\HomePageSelect;
use App\LocationLog;
use App\PopupImage;
use App\Deal;
use App\Helpers\HelperClass;
use App\Ingredient;
use App\Product;
use App\Store;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;


class ProductsController extends Controller
{

    public function index()
    {
        if (Session::has('StoreID')){
            $store_id = Session::get('StoreID');
            $delivery_charge = HelperClass::storeDeliveryChargeById($store_id);
//            dd($delivery_charge);
//            100 = 7.5;
//            1 = 7.5/100;
//            50 = (7.5*50)/100;
            $d_vat = (15*$delivery_charge)/100;
            Session::put('delivery_charge',$delivery_charge);
            Session::put('dc_vat',$d_vat);
        }else{
            $store_id = false;
        }


        //Banner
        $banner = DB::table('home_page_banners')->where('name','mobile_banner')->first();
        if($banner){
            $mobile_banner =  $banner->image;
        }else{
            $mobile_banner =  null;
        }


//        if(Session::has('accessToken')){
//            Session::forget('accessToken');
//        }

        BKash::setPartnerServices();
//        Session::put('Mode','Delivery');
//        $categories = Category::where('publication_status',1)->orderBy('id','asc')->take(3)->get();
//        $products = Product::where('publication_status',1)->
//        orderBy('id','desc')->take(6)->get();
        $today = date('w');
        if($store_id==false) {
            $slectDeals = Deal::whereRaw('FIND_IN_SET(' . $today . ',day_selection)')->where('select_deals', '1')->orderBy('deal_order', 'asc')->take(4)->get();
        }else{
            $slectDeals = DB::table('deals')
                ->join('deals_stores','deals.id','=','deals_stores.deal_id')
                ->where('deals_stores.store_id',$store_id)
                ->whereRaw('FIND_IN_SET(' . $today . ',deals.day_selection)')
                ->orderBy('deals.deal_order', 'asc')
                ->take(4)
                ->select('deals.id as id','deals.image as image')
                ->get();
        }
        $homeSelect = HomePageSelect::find(1);
        $popupImageData = PopupImage::find(1);
        if($popupImageData->is_active){
            if (Cookie::has('isPopUpActive')) {
                $isPopUpActive = false;
            } else {
                Cookie::queue(Cookie::make('isPopUpActive', '1', 0));
                $isPopUpActive = true;
            }
        }else{
            $isPopUpActive = false;
        }
        $is_call_center = Customer::is_call_center();
        $recent_searches = HelperClass::recent_location();
        $is_customer_exist = Session::has('CustomerMobile');
        return view('front.home.home-content', compact(['isPopUpActive', 'recent_searches', 'is_call_center', 'is_customer_exist', 'homeSelect', 'slectDeals', 'popupImageData','mobile_banner'])
        );
    }

    public function detectLocation($mode)
    {
        if ($mode == 'delivery') {
            Session::put('Mode', 'Delivery');
        } else {
            Session::put('Mode', 'Take-Away');
        }
        return view('front.location.search-location', ['mode' => $mode]);
    }

    public function saveLocation()//$location, $store, $mode
    {
        $location = Input::get('location');
        $store = Input::get('store');
        $mode = Input::get('mode');
        $save = Input::get('save');
        $selectHomePage = HomePageSelect::find(1);
        //dd($selectHomePage->selected_value);
        $destinationURL = Input::get('destinationURL');
        if (Customer::getUserID() && !isset($save)) {
            $customer_location = new CustomerLocation();
            $customer_location->setLocation($location, $store, $mode);
        }
        if ($mode == 'delivery') {
            Session::put('Location', $location);
            $storeDetails = Store::where('tag', '=', $store)->first();
            if ($storeDetails) {
                Session::put('StoreID', $storeDetails->id);
                if (time() >= (strtotime($storeDetails->start_time)) && (time() <= strtotime($storeDetails->start_time))) {
                    return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
                } else {
                    Session::put('Mode', 'Delivery');
                    if ($destinationURL) {
                        return redirect($destinationURL);
                    } else {
                        if ($selectHomePage->selected_value == 1) {
                            return redirect()->route('all-pizza');
                        } elseif ($selectHomePage->selected_value == 2) {
                            return redirect()->route('all-pasta');
                        } elseif ($selectHomePage->selected_value == 3) {
                            return redirect()->route('all-appetisers');
                        } elseif ($selectHomePage->selected_value == 4) {
                            return redirect()->route('all-deals');
                        } elseif ($selectHomePage->selected_value == 5) {
                            return redirect()->route('all-drinks');
                        }
                    }
                }
            } else {
                return redirect()->route('/')->with('message', 'No Location Found');
            }
        } elseif ($mode == 'takeaway' && $location == 'false') {       // Wants to Take-Away in a Delivery Area
            $storeDetails = Store::where('tag', '=', $store)->first();
            if (time() >= (strtotime($storeDetails->start_time)) && (time() <= strtotime($storeDetails->start_time))) {
                return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
            } else {
                Session::put('Location', $storeDetails->location);
                Session::put('StoreID', $storeDetails->id);
                Session::put('Mode', 'Take-Away');
                if ($destinationURL) {
                    return redirect($destinationURL);
                } else {
                    if ($selectHomePage->selected_value == 1) {
                        return redirect()->route('all-pizza');
                    } elseif ($selectHomePage->selected_value == 2) {
                        return redirect()->route('all-pasta');
                    } elseif ($selectHomePage->selected_value == 3) {
                        return redirect()->route('all-appetisers');
                    } elseif ($selectHomePage->selected_value == 4) {
                        return redirect()->route('all-deals');
                    } elseif ($selectHomePage->selected_value == 5) {
                        return redirect()->route('all-drinks');
                    }
                }
            }
        } else {
            Session::put('Mode', 'Take-Away');
            return redirect()->route('all-stores', ['storeTags' => $store, 'destinationURL' => $destinationURL]);
        }

    }


    public function setLocationAsAgent()//$location, $store, $mode
    {
        $location = Input::get('location');
        $store = Input::get('store');
        $mode = Input::get('mode');
        $selectHomePage = HomePageSelect::find(1);
        $customer_name = Input::get('customer_name');
        $customer_email = Input::get('customer_email');
        $customer_mobile = Input::get('customer_mobile');
        $customer = Customer::where('phone_number', '=', $customer_mobile)->get()->first();
        if ($customer) {
            $customerDetail = $customer;
        } else {
            $customerDetail = new Customer();
        }
        $customerDetail->phone_number = $customer_mobile;
        $customerDetail->first_name = $customer_name;
        $customerDetail->email_address = $customer_email;
        $customerDetail->address = $location;
        if ($customerDetail->save()) {
            Session::put('CustomerMobile', $customer_mobile);
            Session::put('Location', $location);
            if ($mode == 'delivery') {
                $storeDetails = Store::where('tag', '=', $store)->first();
                if ($storeDetails) {
                    Session::put('StoreID', $storeDetails->id);
                    if (time() >= (strtotime($storeDetails->start_time)) && (time() <= strtotime($storeDetails->start_time))) {
                        return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
                    } else {
                        Session::put('Mode', 'Delivery');
                        if ($selectHomePage->selected_value == 1) {
                            return redirect()->route('all-pizza');
                        } elseif ($selectHomePage->selected_value == 2) {
                            return redirect()->route('all-pasta');
                        } elseif ($selectHomePage->selected_value == 3) {
                            return redirect()->route('all-appetisers');
                        } elseif ($selectHomePage->selected_value == 4) {
                            return redirect()->route('all-deals');
                        } elseif ($selectHomePage->selected_value == 5) {
                            return redirect()->route('all-drinks');
                        }
                    }
                } else {
                    return redirect()->route('/')->with('message', 'No Location Found');
                }
            } elseif ($mode == 'takeaway') {       // Wants to Take-Away in a Delivery Area
                $storeDetails = Store::where('tag', '=', $store)->first();
                Session::put('StoreID', $storeDetails->id);
                if (time() >= (strtotime($storeDetails->start_time)) && (time() <= strtotime($storeDetails->start_time))) {
                    return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
                } else {
                    Session::put('Mode', 'Take-Away');
                    if ($selectHomePage->selected_value == 1) {
                        return redirect()->route('all-pizza');
                    } elseif ($selectHomePage->selected_value == 2) {
                        return redirect()->route('all-pasta');
                    } elseif ($selectHomePage->selected_value == 3) {
                        return redirect()->route('all-appetisers');
                    } elseif ($selectHomePage->selected_value == 4) {
                        return redirect()->route('all-deals');
                    } elseif ($selectHomePage->selected_value == 5) {
                        return redirect()->route('all-drinks');
                    }
                }
            }

        } else {
            return redirect()->route('/')->with('message', 'Customer Can not save, Please try again');
        }
    }

    public function allStores($storeTags)
    {
        $user_nearest_stores = explode(',', $storeTags);
        $store_list = [];
        $distance = [];
        $j = 0;
        for ($i = 0; $i < sizeof($user_nearest_stores); $i += 2) {
            $store_list[$j]['tag'] = $user_nearest_stores[$i];
            $distance[$j] = $store_list[$j]['distance'] = $user_nearest_stores[$i + 1];
            $j++;
        }
        array_multisort($distance, SORT_ASC, $store_list);

        foreach ($store_list as $key => $value) {
            $store = Store::where('tag', '=', $value['tag'])->first();
            $store_list[$key]['id'] = $store['id'];
            $store_list[$key]['name'] = $store['name'];
            $store_list[$key]['location'] = $store['location'];
            $store_list[$key]['start_time'] = $store['start_time'];
            $store_list[$key]['end_time'] = $store['end_time'];
        }
        if ($store_list) {
            $destinationURL = Input::get('destinationURL');
            return view('front.stores.store-selection', ['stores' => $store_list, 'destinationURL' => $destinationURL]);
        } else {
            return redirect()->route('/');
        }
    }

    public function stores()
    {
        $store_list = Store::all();
        return view('front.stores.index', ['stores' => $store_list]);
    }


    public function saveStore($id)
    {
        $selectHomePage = HomePageSelect::find(1);
        $storeDetails = Store::where('id', '=', $id)->first();
        if ($storeDetails) {
            Session::put('Location', $storeDetails->location);
            if (time() >= (strtotime($storeDetails->start_time)) && (time() <= strtotime($storeDetails->start_time))) {
                return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
            } else {
                Session::put('StoreID', $id);
                Session::put('Mode', 'Take-Away');
                $destinationURL = Input::get('destinationURL');
                if ($destinationURL) {
                    return redirect($destinationURL);
                } else {
                    if ($selectHomePage->selected_value == 1) {
                        return redirect()->route('all-pizza');
                    } elseif ($selectHomePage->selected_value == 2) {
                        return redirect()->route('all-pasta');
                    } elseif ($selectHomePage->selected_value == 3) {
                        return redirect()->route('all-appetisers');
                    } elseif ($selectHomePage->selected_value == 4) {
                        return redirect()->route('all-deals');
                    } elseif ($selectHomePage->selected_value == 5) {
                        return redirect()->route('all-drinks');
                    }
                }
            }
        } else {
            return redirect()->route('/')->with('message', 'No Location Found');
        }
    }


    public function allProducts()
    {
        return view('front.stores.store-selection');
    }

    public function categoryProduct($category_id, Request $request)
    {
        if ($category_id == 0) {
            $category_id = '2,15,11,10,12';
        }
        $category_ids = explode(',', $category_id);
        $recent_searches = HelperClass::recent_location();
//        $ingredients = Product::take(5)->where('price_family','<>','NULL')->get();
//        $ingredients = Product::join('products_categories',function ($q){
//                $q->on('products.id','=','products_categories.product_id');
//            })
//            ->join('categories',function ($q){
//                $q->on('products_categories.category_id','=','categories.id');
//            })
//            ->where('categories.parent_id','=',14)
//            ->get();
        $ingredients = $this->getAppetisers();
        $categories = HelperClass::allCategory();

//        return Session::get('Mode');
//        $category = Category::find($category_id)->children()->pluck('id')->toArray();
//        return $category;
//        $products = $category->products;
//        $products =  Product::allByParentID($category_id);
//        $product = Product::with(['addons', 'ingredients'])->get();
        $product_name = '';
        $products = Product::with(['addons', 'ingredients'])
            ->join('products_categories', function ($q) {
                $q->on('products.id', '=', 'products_categories.product_id');
            })
            ->join('categories', function ($q) {
                $q->on('products_categories.category_id', '=', 'categories.id');
            })
            ->whereIn('categories.parent_id', $category_ids)
            ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
            ->orderByRaw("FIELD(category_id,4,8,9,6,40,32)")
            ->get();
//        $ingredients = $products->first()->ingredients;
        if (count($products) > 0) {
            $last_product_name = $products->last()->category_name;
            if ($request['page'] > 1) {
                $product_name = Session::get('last_product_name');
                Session::put('last_product_name', $last_product_name);
            } else {
                $product_name = '';
                Session::put('last_product_name', $last_product_name);
            }
        }

        $carts = Cart::content();
//        return $carts;
        $store = Store::where('id', '=', Session::get('StoreID'))->first();

        if ($store) {
            if ($request->ajax()) {
                $view = view('front.category.category-product-ajax', [
                    'products' => $products,
                    'product_name' => $product_name
                ])->render();
                return response()->json(['html' => $view]);
            } else {
                return $view = view('front.category.category-product', [
                    'products' => $products,
                    'categories' => $categories,
                    'carts' => $carts,
                    'storeName' => $store->name,
                    'ingredients' => $ingredients,
                    'recent_searches' => $recent_searches
                ]);
            }
        } else {
            return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
        }

//        $products = Product::where('category_id',$category_id)
//            ->orderBy('id','asc')
//            ->paginate(3);
//        return $products;
    }

    public function ajaxProductDetails($product_id)
    {
        $product = Product::with(['addons', 'ingredients'])->find($product_id);
        echo $product;
    }

    public function allPizza()
    {
        $total_cart = Cart::count();
        $is_call_center = Customer::is_call_center();
        $store_id = Session::get('StoreID');
        if(Session::get('Mode')=='Delivery'){
            $delivery_charge = HelperClass::storeDeliveryChargeById($store_id);
//            dd($delivery_charge);
//            100 = 7.5;
//            1 = 7.5/100;
//            50 = (7.5*50)/100;
            $d_vat = (15*$delivery_charge)/100;
            Session::put('delivery_charge',$delivery_charge);
            Session::put('dc_vat',$d_vat);
        }else{
            Session::put('delivery_charge',0);
            Session::put('dc_vat',0);
        }
        HelperClass::changeGrandTotalWithMode();
        $store = Store::where('id', '=', $store_id)->first();
        if ($store) {
            $category_id = '4,6,7,8,9,32,10,11,55,56,57';
            $category_ids = explode(',', $category_id);
            $recent_searches = HelperClass::recent_location();
            $ingredients = $this->getAppetisers();
            $categories = HelperClass::allCategory();
            if (!Cache::has('products')) {
                Cache::remember('products', 5, function () use ($store_id, $category_ids) {
                    $product = Product::published()->with(['addons', 'ingredients'])
                        ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
                        ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
                        ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
                        ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
                        ->where('stores.id', '=', $store_id)
                        ->where('products.is_only_deal', '=', 0)
                        ->whereIn('categories.id', $category_ids)
                        ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
                        ->orderByRaw("FIELD(category_id,6,4,56,7,8,9,10,11,32,55,57)")
                        ->get();
                    return $product;
                });
            }
            $products = Cache::get('products');
            $carts = Cart::content();
            return $view = view('front.pizza.index',
                compact(['products', 'categories', 'carts', 'ingredients', 'recent_searches', 'is_call_center', 'total_cart'])
            );
        } else {
            return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
        }
    }

    public function getAddons()
    {
        $pizza_size = Input::get('pizza_size');
        $pizza_id = Input::get('pizza_id');
        $toppings = Product::find(4)->addons;
        $html = view('front.pizza.get_addons', compact(['toppings', 'pizza_size']))->render();
        return response()->json(compact('html'));
    }

    public function allPasta()
    {
        $total_cart = Cart::count();
        $is_call_center = Customer::is_call_center();
        $store_id = Session::get('StoreID');
        $recent_searches = HelperClass::recent_location();
        $ingredients = $this->getAppetisers();
        $categories = HelperClass::allCategory();
        //$popupImageData = PopupImage::find(1);
        $products = Product::published()->with(['ingredients'])
            ->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
            ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
            ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
            ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $store_id)
            ->where('categories.parent_id', '=', 3)
            ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
            ->get();

        if (count($products) > 0) {
            $last_product_name = $products->last()->category_name;
            Session::put('last_product_name', $last_product_name);
        }

        $carts = Cart::content();
        $store = Store::where('id', '=', Session::get('StoreID'))->first();

        if ($store) {
            return $view = view('front.pasta.index',
                compact(['products', 'categories', 'carts', 'ingredients', 'recent_searches', 'is_call_center', 'total_cart'])
            );
        } else {
            return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
        }
    }

    public function allAppetisers()
    {
        $total_cart = Cart::count();
        $is_call_center = Customer::is_call_center();
        $store_id = Session::get('StoreID');
        $recent_searches = HelperClass::recent_location();
        $ingredients = $this->getAppetisers();
        $categories = HelperClass::allCategory();
        $products = Product::published()->leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
            ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
            ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
            ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $store_id)
            ->where('categories.parent_id', '=', 14)
            ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
            ->get();
        if (count($products) > 0) {
            $last_product_name = $products->last()->category_name;
            $product_name = '';
            Session::put('last_product_name', $last_product_name);
        }

        $carts = Cart::content();
        $store = Store::where('id', '=', Session::get('StoreID'))->first();

        if ($store) {
            return $view = view('front.appetisers.index',
                compact(['products', 'categories', 'carts', 'ingredients', 'recent_searches', 'is_call_center', 'total_cart'])
            );
        } else {
            return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
        }
    }

    public function allDrinks()
    {
        $total_cart = Cart::count();
        $is_call_center = Customer::is_call_center();
        $store_id = Session::get('StoreID');
        $recent_searches = HelperClass::recent_location();
        $ingredients = $this->getAppetisers();
        $categories = HelperClass::allCategory();
        //$popupImageData = PopupImage::find(1);
        $products = Product::leftJoin('products_categories', 'products.id', '=', 'products_categories.product_id')
            ->leftJoin('categories', 'products_categories.category_id', '=', 'categories.id')
            ->leftJoin('products_stores', 'products.id', '=', 'products_stores.product_id')
            ->leftJoin('stores', 'products_stores.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $store_id)
            ->where('categories.parent_id', '=', 42)
            ->select('categories.id as category_id', 'categories.name as category_name', 'products.*')
            ->get();
        if (count($products) > 0) {
            $last_product_name = $products->last()->category_name;
            $product_name = '';
            Session::put('last_product_name', $last_product_name);
        }

        $carts = Cart::content();
        $store = Store::where('id', '=', Session::get('StoreID'))->first();

        if ($store) {
            return $view = view('front.appetisers.index',
                compact(['products', 'categories', 'carts', 'ingredients', 'recent_searches', 'is_call_center', 'total_cart'])
            );
        } else {
            return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
        }
    }

    public function allDeals()
    {
        $store_id = Session::get('StoreID');
        if(Session::get('Mode')=='Delivery'){
            $delivery_charge = HelperClass::storeDeliveryChargeById($store_id);
//            dd($delivery_charge);
//            100 = 7.5;
//            1 = 7.5/100;
//            50 = (7.5*50)/100;
            $d_vat = (15*$delivery_charge)/100;
            Session::put('delivery_charge',$delivery_charge);
            Session::put('dc_vat',$d_vat);
        }else{
            Session::put('delivery_charge',0);
            Session::put('dc_vat',0);
        }
        HelperClass::changeGrandTotalWithMode();
        $total_cart = Cart::count();
        $is_call_center = Customer::is_call_center();
        $recent_searches = HelperClass::recent_location();
        $categories = HelperClass::allCategory();
        $today = date('w');
        $products = Deal::leftJoin('deals_stores', 'deals.id', '=', 'deals_stores.deal_id')
            ->leftJoin('stores', 'deals_stores.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $store_id)
            ->whereRaw('FIND_IN_SET(' . $today . ',day_selection)')
            ->select('deals.*')->orderBy('deal_order')->get();
        $store = Store::where('id', '=', Session::get('StoreID'))->first();
        $carts = Cart::content();
        $ingredients = $this->getAppetisers();
        if ($store) {
            return $view = view('front.deals.index',
                compact(['products', 'categories', 'carts', 'ingredients', 'recent_searches', 'is_call_center', 'total_cart'])
            );

        } else {
            return redirect()->route('/')->with('message', 'Please,  Set Your Location Again.');
        }
    }

    public function dealsDetail($id)
    {
        $store_id = Session::get('StoreID');
        $today = date('w');

        $deal_availability = Deal::leftJoin('deals_stores', 'deals.id', '=', 'deals_stores.deal_id')
            ->leftJoin('stores', 'deals_stores.store_id', '=', 'stores.id')
            ->where('stores.id', '=', $store_id)
            ->where('deals.id',$id)
            ->whereRaw('FIND_IN_SET(' . $today . ',day_selection)')
            ->first();
        if(!$deal_availability){
            return $this->back();
        }
        $deal = Deal::findOrFail($id);
        if($deal->pizza_count==0  || $deal->pizza_count ==null ){
            return view('front.deals.combo-deal',compact('deal'));
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

            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 56)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $kabab_crust = $query->get();

            $query = Product::published()->
            leftJoin('deal_product_prices', 'products.id', '=', 'deal_product_prices.product_id')
                ->leftJoin('categories', 'deal_product_prices.category_id', '=', 'categories.id')
                ->where('deal_product_prices.deal_id', '=', $deal->id)
                ->where('deal_product_prices.category_id', '=', 57)
                ->where('deal_product_prices.status', '=', 1);
            if($deal->pizza_size==1) {
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_family as price');
            }elseif($deal->pizza_size==2){
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id','deal_product_prices.price_medium as price');
            }else{
                $query->select('categories.id as category_id', 'categories.name as category_name', 'products.title as title', 'products.image as image', 'products.id as product_id', 'deal_product_prices.price_personal as price');
            }
            $battle_beef = $query->get();

            return view('front.deals.deal_varient_price',compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites_supreme', 'golden_surprise_supreme','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust','battle_beef']));
        }
        $cateId = json_decode($deal->pizza_selection);
        $dealNotProducts = in_array($cateId[0], [1, 2, 3, 4, 5, 6,7,8,9,10,11,12]);
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
                return view('front.deals.deals-detail-wow', compact(['deal', 'products']));
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

                if (in_array("6", $selected_pizza)) {
                    $golden_surprise  = Product::published()->join('products_categories', function ($q) {
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
                    $battle_beef = Product::published()->join('products_categories', function ($q) {
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
                    $battle_beef = null;
                }

                $deal = Deal::where('id', '=', $id)->select(
                    'deals.id',
                    'deals.title',
                    'deals.price',
                    'deals.short_description',
                    DB::raw('IF(deals.pizza_size=1,"Family",IF(deals.pizza_size=2,"Medium","Personal")) AS pizza_size'),
                    'deals.pizza_count',
                    'deals.long_description', 'deals.long_description_header',
                    'deals.image'

                )->first();

                if (Str::contains($deal->title, 'Sundays') || Str::contains($deal->title, 'BOGO')) {         // Only First Pizza Price will applicable
                    return view('front.deals.deals-detail-special', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust','battle_beef']));
                } elseif (Str::contains($deal->title, 'Double')) {                                                  // First Pizza + Half of Secound Pizza Price will applicable
                    return view('front.deals.deals-detail-discount', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','kabab_crust','battle_beef']));
                } elseif (Str::contains($deal->title, 'Pan 4 All')) {                                               // Additional Price - 23 + 39
                    return view('front.deals.deals-detail-pan4all', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','kabab_crust','battle_beef']));
                } else {
                    // Additional Price - 39 + 59
                    return view('front.deals.deals-detail', compact(['deal', 'favorite_lien_pizza', 'supreme_lien_pizza', 'super_supreme_pizza', 'veg_delight', 'cheesy_bites', 'golden_surprise','golden_surprise_fav','cheesy_bites_fav','thin_crust','crown','kabab_crust','battle_beef']));
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
            return view('front.deals.deal-products', compact(['deal','products']));
        }
    }

    public function dealsSelection()
    {
        return view('front.deals.deals-selection');
    }

    public function aboutUs()
    {
        return view('front.static-pages.about-us');

    }

    public function termsConditions()
    {
        return view('front.static-pages.terms-conditions');

    }

    public function back()
    {
        return back();
    }

    protected function getAppetisers()
    {
        return Category::where('name', '=', 'recommendation')->first()->products()->published()->get();
    }

    public function checkCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);
        $used = Session::get('used');
        $code = $request->code;
        $customerId = Customer::getUserID();

        if ($customerId != null) {
            if ($used == null) {
                $customer = Customer::find($customerId);
                $mobile = $customer->phone_number;
                $email = $customer->email_address;
                $withStrTotal = Session::get('grandTotal');
                $tax = Session::get('totalTax');
                $sd = Session::get('totalSD');
                $strSubTotal  = Session::get('totalPrice');
                $total = (float)(str_replace(',','',$withStrTotal));
                $subTotal = (float)(str_replace(',','',$strSubTotal));
                $discount = HelperClass::discount($code, $mobile, $email);
                if ($discount > 0) {
                    $discountPercent = HelperClass::discountPercentage($subTotal,$discount);
                    $newSubTotal   = $subTotal - $discount;
                    $newTax        = HelperClass::taxAfterCoupon($tax,$discountPercent);
                    $newSd         = HelperClass::sdAfterCoupon($sd,$discountPercent);
                    $newGrandTotal = HelperClass::grandTotalAfterCoupon($newSubTotal,$newTax,$newSd);
                    Session::put('discount',$discount);
                    Session::put('totalTax', $newTax);
                    Session::put('totalSD', $newSd);
                    Session::put('grandTotal', $newGrandTotal);
                    Session::put('used', 1);
                    $message = "Your Coupon Discount adjusted in the total";

                } else {
                    $message = "Your Coupon is invalid";
                }
            } else {
                $message = "Coupon Already Used!!";
            }
            return redirect()->back()->with('alert-success', $message);
        } else {
            Session::put('code',$code);
            return redirect()->route('login-customer');
        }
    }

    public function checkCouponAfterLogin(){
        $used = Session::get('used');
        $code = Session::get('code');
        $customerId = Customer::getUserID();
        if ($customerId != null) {
            if ($used == null) {
                $customer = Customer::find($customerId);
                $mobile = $customer->phone_number;
                $email = $customer->email_address;
                $withStrTotal = Session::get('grandTotal');
                $tax = Session::get('totalTax');
                $sd = Session::get('totalSD');
                $strSubTotal  = Session::get('totalPrice');
                $subTotal = (float)(str_replace(',','',$strSubTotal));
                $total = (float)(str_replace(',','',$withStrTotal));
                $discount = HelperClass::discount($code, $mobile, $email);
                if ($discount > 0) {
                    $discountPercent = HelperClass::discountPercentage($subTotal,$discount);
                    $newSubTotal   = $subTotal - $discount;
                    $newTax        = HelperClass::taxAfterCoupon($tax,$discountPercent);
                    $newSd         = HelperClass::sdAfterCoupon($sd,$discountPercent);
                    $newGrandTotal = HelperClass::grandTotalAfterCoupon($newSubTotal,$newTax,$newSd);

                    Session::put('discount',$discount);
                    Session::put('totalTax', $newTax);
                    Session::put('totalSD', $newSd);
                    Session::put('grandTotal', $newGrandTotal);
                    Session::put('used', 1);
                    $message = "Your Coupon Discount adjusted in the total";

                } else {
                    $message = "Your Coupon is invalid";
                }
            } else {
                $message = "Coupon Already Used!!";
            }
            Session::forget('code');
            return redirect()->route('all-pizza')->with('alert-success', $message);
        }
    }

    public function insertLog(Request $request){
        $log = new LocationLog();
        $log->user_id = 0;
        $log->location = $request->loc;
        $log->latitude  = $request->lat;
        $log->longitude = $request->long;
        $log->save();
        return response()->json(array('success'=> 'successfully insert'), 200);
    }
}
