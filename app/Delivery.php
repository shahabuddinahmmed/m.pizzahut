<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
//    public function shipping_detail()
//    {
//        return $this->morphOne('App\ShippingDetail','delivery_mode');
//    }
    public function shipping_detail()
    {
        return $this->belongsTo('App\ShippingDetail');
    }
}
