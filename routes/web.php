<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ProductsController@index')->name('/');

//****************************Product management***************************************//

//Route::get('/',[
//    'uses'=>'ProductsController@index',
//    'as'=>'/'
//]);
// Route::get('clear_cache', function () {

    // \Artisan::call('cache:clear');
    // \Artisan::call('route:clear');
// });

//     dd("Cache is cleared");


Route::get('/search-location/{type}',[
    'uses'=>'ProductsController@detectLocation',
    'as'=>'search-location'
]);

Route::get('/location/save',[
    'uses'=>'ProductsController@saveLocation',
    'as'=>'save-location'
]);

Route::get('/all-stores/{storeTags}',[
    'uses'=>'ProductsController@allStores',
    'as'=>'all-stores'
]);

Route::get('/stores/save/{storeID}',[
    'uses'=>'ProductsController@saveStore',
    'as'=>'save-store'
]);

Route::resource('stores', 'StoresController');
Route::resource('store-filter', 'StoreFilterController');
Route::resource('store-search', 'StoreSearchController');

Route::get('/category-product/{id}',[
    'uses'=>'ProductsController@categoryProduct',
    'as'=>'category-product'
]);

Route::get('/pasta/all',[
    'uses'=>'ProductsController@allPasta',
    'as'=>'all-pasta'
]);

Route::get('/appetisers/all',[
    'uses'=>'ProductsController@allAppetisers',
    'as'=>'all-appetisers'
]);

Route::get('/drinks/all',[
    'uses'=>'ProductsController@allDrinks',
    'as'=>'all-drinks'
]);

Route::get('/deals/all',[
    'uses'=>'ProductsController@allDeals',
    'as'=>'all-deals'
]);

Route::get('/desserts/all',[
    'uses'=>'ProductsController@allDesserts',
    'as'=>'all-desserts'
]);

Route::get('/pizza/all',[
    'uses'=>'ProductsController@allPizza',
    'as'=>'all-pizza'
]);

// Edit by Shahab start
Route::get('/rice/all',[
    'uses'=>'ProductsController@allRice',
    'as'=>'all-rice'
]);
// Edit by Shahab end

Route::get('/pizza/categories/{id}',[
    'uses'=>'ProductsController@categoryWisePizza',
    'as'=>'category-pizza'
]);

Route::get('/deals/{id}',[
    'uses'=>'ProductsController@dealsDetail',
    'as'=>'deals-detail'
]);

Route::get('deals-selection',[
    'uses'=>'ProductsController@dealsSelection',
    'as'=>'deals-selection'
]);

Route::get('/product-details/{id}',[
    'uses'=>'ProductsController@ajaxProductDetails',
    'as'=>'product-details'
]);

//****************************Cart management***************************************//


Route::post('cart/add-to-card',[
    'uses'=>'CartController@addToCard',
    'as'=>'add-to-card'
]);

Route::post('cart/update-cart-product',[
    'uses'=>'CartController@updateCard',
    'as'=>'update-cart-product'
]);

Route::post('cart/update/{id}',[
    'uses'=>'CartController@updateCardAjax',
    'as'=>'update-cart'
]);

Route::post('cart/delete-cart-product/{id}',[
    'uses'=>'CartController@deleteCart',
    'as'=>'delete-cart-product'
]);

Route::get('cart/show',[
    'uses'=>'CartController@showCart',
    'as'=>'cart'
]);

//****************************Checkout management***************************************//
Route::get('rec-cart/{id}/{size}',[
    'uses'=>'CheckoutController@add_rec_cart',
    'as'=>'rec_cart'
]);

Route::get('checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'checkout'
]);

Route::post('/order/save',[
    'uses'=>'CheckoutController@saveOrderInfo',
    'as'=>'save-order'
]);


//****************************Customer management***************************************//

Route::get('/customer/registration/form',[
    'uses'=>'CustomerController@customerRegistrationForm',
    'as'=>'register-customer'
]);
Route::post('/customer/otp/send',[
    'uses'=>'CustomerController@sendOtpToCustomer',
    'as'=>'send-otp-to-customer'
]);

Route::get('/customer/otp/verification',[
    'uses'=>'CustomerController@verifyCustomerOTP',
    'as'=>'verify-customer-otp'
]);

Route::post('/customer/save',[
    'uses'=>'CustomerController@saveCustomer',
    'as'=>'save-customer'
]);

Route::get('/customer/checkout/cancel_url',[
    'uses'=>'CheckoutController@cancelMessage',
    'as'=>'/cancel-url'
]);

Route::get('/customer/checkout/fail_url',[
    'uses'=>'CheckoutController@failMessage',
    'as'=>'/fail-url'
]);

Route::get('/customer/checkout/success_url',[
    'uses'=>'CheckoutController@onlinePaymentResponse',
    'as'=>'/success-url'
]);


Route::get('/customer/track/order',[
    'uses'=>'CustomerController@trackOrder',
    'as'=>'track_order'
]);

Route::get('/customer/login',[
    'uses'=>'CustomerController@customerLoginForm',
    'as'=>'login-customer'
]);

Route::get('/customer/logout',[
    'uses'=>'CustomerController@customerLogout',
    'as'=>'logout-customer'
]);
Route::post('/customer/sign-in/email',[
    'uses'=>'CustomerController@customerLoginByEmail',
    'as'=>'login-customer-by-email'
]);
Route::post('/customer/sign-in/mobile',[
    'uses'=>'CustomerController@customerLoginFormByMobile',
    'as'=>'login-customer-by-mobile'
]);

Route::post('/guest/customer/sign-in/mobile',[
    'uses'=>'CustomerController@guestCustomerLoginFormByMobile',
    'as'=>'login-guest-customer-by-mobile'
]);

Route::get('/guest/login',[
    'uses'=>'CustomerController@guestLoginForm',
    'as'=>'login-guest'
]);

Route::get('/customer/guest/otp/verification',[
    'uses'=>'CustomerController@verifyGuestCustomerOTP',
    'as'=>'verify-guest-customer-otp'
]);

Route::post('/guest/customer/save',[
    'uses'=>'CustomerController@saveGuestCustomer',
    'as'=>'save-guest-customer'
]);

//****************************bKash management***************************************//


Route::get('/bkash/agreement/callback-url',[
    'uses'=>'BKashPaymentController@bKashAgreementResponse',
    'as'=>'bkash_agreement_callback_url'
]);

Route::get('/bkash/ap-callback-url',[
    'uses'=>'BKashPaymentController@bKashAgreementPaymentResponse',
    'as'=>'bkash_payment_agreement_callback_url'
]);

Route::get('/bkash/tokenize-checkout',[
    'uses'=>'BKashPaymentController@tokenizeCheckout',
    'as'=>'tokenize_checkout'
]);

Route::get('/bkash/grant-token',[
    'uses'=>'BKashPaymentController@getGrantToken',
    'as'=>'grant_token'
]);

Route::get('/bkash/create-agreement',[
    'uses'=>'BKashPaymentController@createAgreement',
    'as'=>'create_agreement'
]);

Route::get('/bkash/execute-agreement/{paymentID}',[
    'uses'=>'BKashPaymentController@executeAgreement',
    'as'=>'execute_agreement'
]);

Route::get('/bkash/bkash-payment',[
    'uses'=>'BKashPaymentController@paymentUsingAgreement',
    'as'=>'bkash_payment'
]);

Route::get('/bkash/bkash-payment-execute/{paymentID}',[
    'uses'=>'BKashPaymentController@executeUsingAgreement',
    'as'=>'bkash_payment_execute'
]);

Route::get('/bkash/bkash-payment-without-agreement',[
    'uses'=>'BKashPaymentController@checkoutOnly',
    'as'=>'bkash_payment_without_agreement'
]);

Route::get('/bkash/bkash-payment-status',[
    'uses'=>'BKashPaymentController@paymentStatus',
    'as'=>'bkash_payment_status'
]);

Route::get('/bkash/bkash-agreement-status',[
    'uses'=>'BKashPaymentController@statusAgreement',
    'as'=>'bkash_agreement_status'
]);

Route::get('/bkash/manage-payment',[
    'uses'=>'BKashPaymentController@managePayment',
    'as'=>'manage_payment'
]);

Route::get('/bkash/bkash-agreement-cancel',[
    'uses'=>'BKashPaymentController@cancelAgreement',
    'as'=>'bkash_agreement_cancel'
]);

Route::get('/bkash/searchTransactionAPI',[
    'uses'=>'BKashPaymentController@searchTransactionAPI',
    'as'=>'search_transaction_api'
]);

Route::get('/bkash/print-error-notice',[
    'uses'=>'BKashPaymentController@printErrorNotice',
    'as'=>'print_error_notice'
]);
//****************************Bkash Checkout Payment  management***************************************//


Route::get('/bkash/checkout/payment/',[
    'uses'=>'BKashCheckoutController@checkout',
    'as'=>'bkash_checkout_payment'
]);


Route::get('/bkash/payment/checkout/{orderID}',[
    'uses'=>'BKashCheckoutController@createPayment',
    'as'=>'bkash_checkout_create_payment'
]);

Route::get('/bkash/checkout/bkash-payment-execute/{paymentID}',[
    'uses'=>'BKashCheckoutController@payment',
    'as'=>'bkash_checkout_payment_execute'
]);
Route::get('/bkash/checkout/bkash-payment-query/{paymentID}',[
    'uses'=>'BKashCheckoutController@queryPayment',
    'as'=>'bkash_checkout_payment_query'
]);




//****************************Static Page management***************************************//



Route::get('/about/us',[
    'uses'=>'ProductsController@aboutUs',
    'as'=>'about-us'
]);


Route::get('/terms/conditions',[
    'uses'=>'ProductsController@termsConditions',
    'as'=>'terms-conditions'
]);


Route::get('/customer/oneTimeFeedback',[
    'uses'=>'CustomerController@oneTimeFeedback',
    'as'=>'oneTimeFeedback'
]);


Route::get('/customer/feedback',[
    'uses'=>'CustomerController@customerFeedback',
    'as'=>'feedback'
]);

Route::get('/customer/feedback/dining',[
    'uses'=>'CustomerController@feedbackDining',
    'as'=>'feedback-dining'
]);

Route::get('/customer/feedback/dining/info',[
    'uses'=>'CustomerController@diningInfo',
    'as'=>'dining-info'
]);

Route::post('/customer/feedback/dining/info/save',[
    'uses'=>'CustomerController@saveDiningInfo',
    'as'=>'dining-info-save'
]);

Route::get('/customer/feedback/delivery',[
    'uses'=>'CustomerController@feedbackDelivery',
    'as'=>'feedback-delivery'
]);

Route::get('/customer/feedback/delivery/info',[
    'uses'=>'CustomerController@deliveryInfo',
    'as'=>'delivery-info'
]);
Route::post('/customer/feedback/delivery/info/save',[
    'uses'=>'CustomerController@saveDeliveryInfo',
    'as'=>'delivery-info-save'
]);

Route::get('checkout/complete-order',[
    'uses'=>'CheckoutController@completeOrder',
    'as'=>'complete-order'
]);
//Coupon
Route::post('front/coupons/check','ProductsController@checkCoupon')->name('front.coupon.check');
Route::get('front/coupons/check','ProductsController@checkCouponAfterLogin')->name('front.coupon.check.login');

//Redirect  cart After Coupon

Route::get('cart/show/coupon','CartController@redirectAfterCoupon')->name('cart-coupon');
// Send Feedback Email from SMS
Route::get('feedback/{orderId}','CustomerController@smsFeedbackEmail');
Route::post('submit-feedback-email','CustomerController@submitFeedbackEmail')->name('sms-feedback-mail-send');

//location log
Route::post('insert-location-log','ProductsController@insertLog');

//bKash App
//Route::post('bkash-data','bKashController@index');

//Php artisan Clear

Route::get('clear-cache','CommandController@clearCache');
Route::get('clear-config','CommandController@clearConfig');
Route::get('jwt-secret','CommandController@jwtSecret');

//SSL route

Route::post('order-process/sslcommerz/success','SslPaymentController@success');
Route::post('desktop/order-process/sslcommerz/success','SslPaymentController@desktop_success');
Route::post('order-process/sslcommerz/fail','SslPaymentController@fail');
Route::post('order-process/sslcommerz/canel','SslPaymentController@cancel');

// Checkout (URL) User Part
Route::get('/bkash/pay', [\App\Http\Controllers\Api\BikashPaymentController::class, 'payment'])->name('url-pay');
Route::post('/bkash/create', [\App\Http\Controllers\Api\BikashPaymentController::class, 'createPayment'])->name('url-create');
Route::get('/bkash/callback', [\App\Http\Controllers\Api\BikashPaymentController::class, 'callback'])->name('url-callback');

