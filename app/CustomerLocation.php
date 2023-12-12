<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer','id','customer_id');
    }
    public function setLocation($location,$store,$mode){
        $customer_id = Customer::getUserID();
        $this->customer_id = $customer_id;
        $this->location = $location;
        $this->store = $store;
        $this->mode = $mode;
//            return $customer_location;
        if($this->save()){
            self::deleteOldLocation($customer_id);
        }
    }
    public static function deleteOldLocation($customer_id){
        $customer = Customer::find($customer_id);
        $count = $customer->customer_locations->count();
//                $count = CustomerLocation::where('customer_id','=',$customer_id)->count();
        if($count>2){
            $ids = [];
            $deleteUs = self::where('customer_id','=',$customer_id)->latest()->take($count)->skip(2)->get();
            foreach($deleteUs as $deleteMe){
                $ids[] = $deleteMe->id;
            }
            self::destroy($ids);
        }
    }
}
