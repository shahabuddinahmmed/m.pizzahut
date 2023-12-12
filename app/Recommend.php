<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'recomendeds';
    protected $fillable = ['title','start_price','end_price','pizza_size','status'];

    public function related()
    {
        return $this->belongsToMany(Product::class,'recommend_products','recommend_id','product_id');
    }
}
