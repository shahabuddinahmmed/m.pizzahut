<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function addons(){
        return $this->belongsToMany('App\Addon','order_addons','order_detail_id','addon_id');
    }
}
