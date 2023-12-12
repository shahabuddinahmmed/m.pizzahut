<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeAway extends Model
{
    public function shipping_detail()
    {
        return $this->morphOne('App\ShippingDetail','delivery_mode');
    }
}
