<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    //
    public function products()
    {
        return $this->morphToMany('App\Tag', 'product_element');
    }

}
