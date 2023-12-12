<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Coupon;

class CouponMobileEmail extends Model
{
    protected $table   = 'coupon_mobile_emails';
    protected $fillable = ['coupon_id','mobile','email'];

    public function coupons(){
        return $this->belongsTo(Coupon::class,'coupon_id');
    }

}
