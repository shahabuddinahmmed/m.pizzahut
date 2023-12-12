<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['title','short_description','price','pizza_count','pizza_size','long_description','image','addon_name','addon_price'];

    public function stores()
    {
        return $this->belongsToMany('App\Store','deals_stores','deal_id','store_id');
    }

    public function order_details()
    {
        return $this->morphOne('App\OrderDetail', 'product');
//        return $this->hasOne('App\OrderDetail','product_id','id');

    }

}
