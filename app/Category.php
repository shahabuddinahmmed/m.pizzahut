<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product','products_categories','category_id','product_id');
    }

    public function children()
    {
        return $this->hasMany('app\Category','parent_id');
    }
}
