<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponUsedByUser extends Model
{
    protected $table = 'coupon_used_by_users';
    protected $fillable = ['mobile','coupon_code'];
}
