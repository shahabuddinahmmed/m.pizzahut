<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('bikash-data/{phone_number}/{token}','bKashController@index');
Route::post('get_token','bKashController@getToken');
Route::post('customer/login', 'Api\MobileAppApiController@customerLogin');
Route::post('send/sms', 'Api\MobileAppApiController@sendLoginSMS');
Route::get('recommend/{amount}','Api\MobileAppApiController@recommend');
Route::get('version','Api\MobileAppApiController@version_check');
Route::group(['middleware' => 'jwt.verify'], function() {
Route::get('categories/{storeId}', 'Api\MobileAppApiController@category');
Route::get('category-products/{category_name}/{store_id}', 'Api\MobileAppApiController@productByCategoryName');
Route::get('top-deals', 'Api\MobileAppApiController@toDeals');
Route::get('deals-details/{deal_id}/{store_id}', 'Api\MobileAppApiController@dealDetails');
Route::get('stores','Api\MobileAppApiController@stores');
Route::get('delivery_charge/{store_id}','Api\MobileAppApiController@deliveryCharge');
});
 Route::post('ssl-payment-status-2', 'Api\MobileAppApiController@updateSSLPaymentStatus2');
Route::group(['middleware' => 'jwt.auth'], function() {
    Route::get('bikash-data/{token}','bKashController@index'); });

Route::group(['middleware' => 'jwt.verify'], function() {
//Coupon
    Route::post('coupon', 'Api\MobileAppApiController@coupon');
//Submit order
    Route::post('order-submit', 'Api\MobileAppApiController@orderSubmit');
    Route::post('ssl-payment-status', 'Api\MobileAppApiController@updateSSLPaymentStatus');
//Mobile Banner
    Route::get('home/banner', 'Api\MobileAppApiController@banner');
    
    Route::get('order_history/{customer_id}', 'Api\MobileAppApiController@orderHistory');
    
    //Order History Product Status
    Route::get('order_history/status/{id}/{store_id}','Api\MobileAppApiController@reorderProductStatus');

});