<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StoreFilterController extends Controller
{
    public function index(){
        $store_list = Store::all();
        $all_store = [];
        foreach ($store_list as $key=>$store){
            $all_store [$key]['id'] = $store->id;
            $all_store [$key]['name'] = $store->name;
            $all_store [$key]['location'] = $store->location;
            $all_store [$key]['business_solution_number'] = $store->business_solution_number;
            $all_store [$key]['timing'] = $store->storeActivity();
        }
//        return $all_store;
        return view('front.stores.index', ['stores' => $all_store]);

    }
    public function show($storeTags){
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
            $store_list[$key]['timing'] = $store->storeActivity();
//            $store_list[$key]['start_time'] = $store['start_time'];
//            $store_list[$key]['end_time'] = $store['end_time'];
        }
        if ($store_list) {
            $destinationURL = Input::get('destinationURL');
                return view('front.stores.store-selection', ['stores' => $store_list, 'destinationURL' => $destinationURL]);
        } else {
            return redirect()->route('/');
        }
    }
}
