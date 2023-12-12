<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $category_id = '2,10,11,12,15';
        $category_ids = explode(',', $category_id);
        View::share('menus', Category::whereIn('id',$category_ids)
        ->orderByRaw("FIELD(id,2,12,10,11,15)")
        ->get());
         $current = url()->current();
        $url_arr = explode('/',$current);
        if(isset($url_arr[5]) && $url_arr['4']=='categories'){
            $active_link = ['link'=>$url_arr[3], 'cat'=>$url_arr[5]];
        }elseif(isset($url_arr[3])){
            if($url_arr[3]=='pizza'){
                $active_link =  ['link'=>$url_arr[3], 'cat'=>2];
            }else {
                $active_link = ['link' => $url_arr[3], 'cat' => 0];
            }
        }else {
            $active_link = ['link' => '', 'cat' => 0];
        }
        View::share('active_link', $active_link);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
