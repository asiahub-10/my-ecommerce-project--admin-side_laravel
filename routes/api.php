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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('demo', function () {
    return 'Hello Api';
});

//==========================================
//     CATEGORY
//==========================================

Route::get('/all-published-category', [
    'uses'  =>  'ApiController@allPublishedCategory',
    'as'    =>  'all-published-category'
]);

Route::get('/category-product-by-id/{id}', [
    'uses'  =>  'ApiController@productByCategoryId',
    'as'    =>  'category-product-by-id'
]);

Route::get('/category-by-id/{id}', [
    'uses'  =>  'ApiController@categoryById',
    'as'    =>  'category-by-id'
]);

//==========================================
//     BRAND
//==========================================

Route::get('/all-published-brand', [
    'uses'  =>  'ApiController@allPublishedBrand',
    'as'    =>  'all-published-brand'
]);

Route::get('/brand-by-id/{id}', [
    'uses'  =>  'ApiController@brandById',
    'as'    =>  'brand-by-id'
]);

Route::get('/brand-product-by-id/{id}', [
    'uses'  =>  'ApiController@productByBrandId',
    'as'    =>  'brand-product-by-id'
]);

//==========================================
//     PRODUCT
//==========================================

Route::get('/all-published-product', [
    'uses'  =>  'ApiController@allPublishedProduct',
    'as'    =>  'all-published-product'
]);

Route::get('/all-published-product-id', [
    'uses'  =>  'ApiController@allPublishedProductId',
    'as'    =>  'all-published-product-id'
]);

Route::get('/product-by-id/{id}', [
    'uses'  =>  'ApiController@productById',
    'as'    =>  'product-by-id'
]);

Route::get('/all-product', [
    'uses'  =>  'ApiController@allProduct',
    'as'    =>  'all-product'
]);

//==========================================
//     CUSTOMER
//==========================================

Route::post('/registration', [
    'uses'  =>  'CustomerController@newRegister',
    'as'    =>  'registration'
]);

Route::get('/email-check/{email}', [
    'uses'  =>  'CustomerController@emailCheck',
    'as'    =>  'email-check'
]);

Route::post('/login', [
    'uses'  =>  'CustomerController@customerLogin',
    'as'    =>  'login'
]);

Route::post('/logout/{id}', [
    'uses'  =>  'CustomerController@customerLogout',
    'as'    =>  'logout'
]);

Route::post('/visitor-password-check/{password}', [
    'uses'  =>  'CustomerController@visitorPasswordCheck',
    'as'    =>  'visitor-password-check'
]);

//==========================================
//     CHECKOUT
//==========================================

Route::post('/get-customer-id', [
    'uses'  =>  'CheckoutController@getCustomerId',
    'as'    =>  'get-customer-id'
]);

Route::post('/get-returning-customer-id/{email}/{password}', [
    'uses'  =>  'CheckoutController@getReturningCustomerId',
    'as'    =>  'get-returning-customer-id'
]);

Route::get('/customer-by-id/{id}', [
    'uses'  =>  'CheckoutController@customerById',
    'as'    =>  'get-customer-by-id'
]);

//Route::get('/get-id/{email}', [
//    'uses'  =>  'CheckoutController@getId',
//    'as'    =>  'get-id'
//]);


//==========================================
//     ORDER
//==========================================

Route::post('confirm-order', [
    'uses'  =>  'OrderController@confirmOrder',
    'as'    =>  'get-confirm-order'
]);

//Route::post('shipping-info', [
//    'uses'  =>  'ShippingController@shippingInfo',
//    'as'    =>  'get-shipping-info'
//]);
//
//Route::post('edited-shipping-info', [
//    'uses'  =>  'ShippingController@editedShippingInfo',
//    'as'    =>  'get-edited-shipping-info'
//]);


//==========================================
//     REVIEW
//==========================================

Route::post('customer-review', [
    'uses'  =>  'ReviewController@customerReviewSave',
    'as'    =>  'save-customer-review'
]);

Route::get('get-review/{id}', [
    'uses'  =>  'ReviewController@getCustomerReview',
    'as'    =>  'get-customer-review'
]);

//==========================================
//     SLIDER
//==========================================

Route::get('slider', [
    'uses'  =>  'SliderController@getSlider',
    'as'    =>  'get-slider'
]);

//==========================================
//     Best Sales
//==========================================

Route::get('best-sale', [
    'uses'  =>  'BestSaleController@getBestSale',
    'as'    =>  'get-best-sale'
]);

//==========================================
//     Offers
//==========================================

Route::get('offer', [
    'uses'  =>  'OfferController@getOffer',
    'as'    =>  'get-all-offer'
]);













