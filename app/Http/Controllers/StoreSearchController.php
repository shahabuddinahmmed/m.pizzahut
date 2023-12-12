<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerLocation;
use App\Helpers\HelperClass;
use App\HomePageSelect;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class StoreSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//$location, $store, $mode
    {
//        dd('okey');
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
            $storeDetails = Store::where('tag', '=', $store)->first();
            if ($storeDetails) {
                if (!$storeDetails->is_active) {
                    return redirect()->route('/')->with('message', $storeDetails->name . ' is close Today');
                }
//                elseif (time() < (strtotime($storeDetails->start_time)) || (time() > strtotime($storeDetails->end_time))) {
//                    return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
//                }
                else {
                    Session::put('Location', $location);
                    Session::put('StoreID', $storeDetails->id);
                    HelperClass::removeQueryCache();
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
            if (!$storeDetails->is_active) {
                return redirect()->route('/')->with('message', $storeDetails->name . ' is close Today');
            }
//            elseif (time() < (strtotime($storeDetails->start_time)) || (time() > strtotime($storeDetails->end_time))) {
//                return redirect()->route('/')->with('message', $storeDetails->name . ' open from ' . HelperClass::timeOnly($storeDetails->start_time) . ' To ' . HelperClass::timeOnly($storeDetails->end_time));
//            }
            else {
                Session::put('Location', $storeDetails->location);
                Session::put('StoreID', $storeDetails->id);
                HelperClass::removeQueryCache();
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
            return redirect()->route('store-filter.show', ['storeTags' => $store, 'destinationURL' => $destinationURL]);
        }
    }
}
