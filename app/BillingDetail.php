<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
