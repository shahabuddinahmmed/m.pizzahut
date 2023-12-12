<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    
    protected $fillable = ['title','price_personal','price_medium','price_family','sd','is_only_deal','image','short_description','long_description','device_dependency','publication_status'];
    
    public function scopePublished($query)
    {
        return $query->where('products.publication_status',1);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','products_categories','product_id','category_id');
    }

    public static function allByParentID($category_id)
    {
        $products = DB::table('products')
            ->join('products_categories',function ($q){
                $q->on('products.id','=','products_categories.product_id');
            })
            ->join('categories',function ($q){
                $q->on('products_categories.category_id','=','categories.id');
            })
            ->where('categories.parent_id','=',$category_id)
            ->select('categories.id as category_id','categories.name as category_name','products.*')
            ->orderBy('categories.parent_id')
            ->get();
        return $products;
    }


    public function addons()
    {
        return $this->morphedByMany('App\Addon', 'product_element');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function ingredients()
    {
        return $this->morphedByMany('App\Ingredient', 'product_element');
    }

    public function order_details()
    {
        return $this->hasOne('App\OrderDetail','product_id','id');

    }

    public function product_size(){
        return $this->hasMany('App\ProductSize');
    }
}
