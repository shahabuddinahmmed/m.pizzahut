<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealStore extends Model
{
    protected $table = 'deals_stores';
    protected $fillable = ['store_id','deal_id'];
}
