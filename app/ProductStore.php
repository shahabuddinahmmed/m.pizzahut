<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    protected $table = 'products_stores';
    protected $fillable = ['store_id','product_id'];
}
