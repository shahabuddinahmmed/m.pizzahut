<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CouponMobileEmail;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = ['code','to_date','from_date','minimum_amount','is_percentage','is_enable','value','coupon_for','mobile_status'];

    public function mobiles(){
        return $this->hasMany(CouponMobileEmail::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'coupon_products','coupon_id','product_id');
    }
    public function deals(){
        return $this->belongsToMany(Deal::class,'coupon_deals','coupon_id','deal_id');
    }
}
