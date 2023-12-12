<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

//    public function delivery_mode(){
//        return $this->morphedTo();
//
//    }

    public function delivery(){
        return $this->hasOne('App\Delivery');
    }
}
