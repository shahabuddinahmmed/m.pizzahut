<?php

namespace App\Http\Controllers;

use App\Helpers\HelperClass;
use App\HomePageSelect;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('admin.stores.create',compact(['stores']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $selectHomePage = HomePageSelect::find(1);
        if ($store) {
            Session::put('Location', $store->location);
//            return $store;
            if (!$store->is_active) {
                return redirect()->route('/')->with('message', $store->name . ' is close Today');
            }
//            elseif (time() < (strtotime($store->start_time)) || (time() > strtotime($store->end_time))) {
//                return redirect()->route('/')->with('message', $store->name . ' open from ' . HelperClass::timeOnly($store->start_time) . ' To ' . HelperClass::timeOnly($store->end_time));
//            }
            else {
                Session::put('StoreID', $store->id);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
//        $stores = Store::all();
        return view('admin.stores.edit',compact(['store']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
//        return $request;
        Store::where('id',$store->id)
            ->update([
//                'tag'=>$request->tag,
                'name'=>$request->name,
                'contact_number'=>$request->contact_number,
                'home_service_number'=>$request->home_service_number,
                'ac_number'=>$request->ac_number,
                'business_solution_number'=>$request->business_solution_number  ,
                'rgm_contact_number'=>$request->rgm_contact_number,
                'email'=>$request->email,
                'location'=>$request->location,
                'start_time'=>$request->start_time,
                'end_time'=>$request->end_time,
                'is_active'=>$request->is_active
            ]);
        return redirect('stores')->with('alert-success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
