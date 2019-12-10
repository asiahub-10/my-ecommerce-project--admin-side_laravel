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

Route::get('/', function () {
    return view('admin.login.login');
});

//Route::get('/order', function () {
//    return view('front.mail.order-confirm');
//});



//============================
//          Login/Register
//============================
Route::get('/check-login-email/{email}', [
    'uses'  =>  'AdminLoginController@checkLoginEmail',
    'as'    =>  'check-login-email'
]);

Route::get('/check-login-password/{password}', [
    'uses'  =>  'AdminLoginController@checkLoginPassword',
    'as'    =>  'check-login-password'
]);
Route::get('/register/upload-image', [
    'uses'  =>  'UserProfileController@uploadProfileImage',
    'as'    =>  '/upload-image'
]);

Route::post('/profile-picture-upload', [
    'uses'  =>  'UserProfileController@saveProfilePicture',
    'as'    =>  'profile-picture-upload'
]);

Route::post('/registered', [
    'uses'  =>  'UserProfileController@completeRegistration',
    'as'    =>  'registration-complete'
]);




//============================
//          Profile
//============================
Route::get('/profile', [
    'uses'  =>  'UserProfileController@profile',
    'as'    =>  'profile'
]);

Route::post('/image-upload', [
    'uses'  =>  'UserProfileController@imageUpload',
    'as'    =>  'profile-picture'
]);

Route::get('/change-profile-image', [
    'uses'  =>  'UserProfileController@updateImage',
    'as'    =>  'change-profile-image'
]);

Route::get('/change-profile-info', [
    'uses'  =>  'UserProfileController@changeProfileInfo',
    'as'    =>  'change-profile-info'
]);

Route::post('/update-profile-info', [
    'uses'  =>  'UserProfileController@updateProfileInfo',
    'as'    =>  'update-profile-info'
]);




//============================
//          Category
//============================
Route::get('/add-category', [
    'uses'  =>  'CategoryController@index',
    'as'    =>  'add-category'
]);

Route::post('/save-category', [
    'uses'  =>  'CategoryController@saveCategory',
    'as'    =>  'save-category'
]);

Route::get('/manage-category', [
    'uses'  =>  'CategoryController@manageCategory',
    'as'    =>  'manage-category'
]);

Route::get('/edit-category/{id}', [
    'uses'  =>  'CategoryController@editCategory',
    'as'    =>  'edit-category'
]);

Route::post('/update-category', [
    'uses'  =>  'CategoryController@updateCategory',
    'as'    =>  'update-category'
]);

Route::post('/publish-category', [
    'uses'  =>  'CategoryController@publishCategory',
    'as'    =>  'publish-category'
]);

Route::post('/unpublish-category', [
    'uses'  =>  'CategoryController@unpublishCategory',
    'as'    =>  'unpublish-category'
]);

Route::post('/delete-category', [
    'uses'  =>  'CategoryController@deleteCategory',
    'as'    =>  'delete-category'
]);



//============================
//          Brand
//============================
Route::get('/add-brand', [
    'uses'      =>  'BrandController@index',
    'as'        =>  'add-brand'
]);

Route::post('/save-brand', [
    'uses'      =>  'BrandController@saveBrand',
    'as'        =>  'save-brand'
]);

Route::get('/manage-brand', [
    'uses'      =>  'BrandController@manageBrand',
    'as'        =>  'manage-brand'
]);

Route::get('/edit-brand/{id}', [
    'uses'      =>  'BrandController@editBrand',
    'as'        =>  'edit-brand'
]);

Route::post('/update-brand', [
    'uses'      =>  'BrandController@updateBrand',
    'as'        =>  'update-brand'
]);

Route::post('/publish-brand', [
    'uses'  =>  'BrandController@publishBrand',
    'as'    =>  'publish-brand'
]);

Route::post('/unpublish-brand', [
    'uses'  =>  'BrandController@unpublishBrand',
    'as'    =>  'unpublish-brand'
]);

Route::post('/delete-brand', [
    'uses'  =>  'BrandController@deleteBrand',
    'as'    =>  'delete-brand'
]);


//============================
//          Product
//============================

Route::get('/add-product', [
    'uses'  =>  'ProductController@index',
    'as'    =>  'add-product'
]);

Route::post('/save-product', [
    'uses'  =>  'ProductController@saveProduct',
    'as'    =>  'save-product'
]);

Route::get('/manage-product', [
    'uses'  =>  'ProductController@manageProduct',
    'as'    =>  'manage-product'
]);

Route::get('/edit-product/{id}', [
    'uses'  =>  'ProductController@editProduct',
    'as'    =>  'edit-product'
]);

Route::post('/update-product', [
    'uses'  =>  'ProductController@updateProduct',
    'as'    =>  'update-product'
]);

Route::post('/publish-product', [
    'uses'  =>  'ProductController@publishProduct',
    'as'    =>  'publish-product'
]);

Route::post('/unpublish-product', [
    'uses'  =>  'ProductController@unpublishProduct',
    'as'    =>  'unpublish-product'
]);

Route::post('/delete-product', [
    'uses'  =>  'ProductController@deleteProduct',
    'as'    =>  'delete-product'
]);


//============================
//          Slider
//============================

Route::get('/add-slider', [
    'uses'  =>  'SliderController@index',
    'as'    =>  'add-slider'
]);

Route::post('/save-slider', [
    'uses'  =>  'SliderController@saveSlider',
    'as'    =>  'save-slider'
]);

Route::get('/manage-slider', [
    'uses'  =>  'SliderController@manageSlider',
    'as'    =>  'manage-slider'
]);

Route::get('/edit-slider/{id}', [
    'uses'  =>  'SliderController@editSlider',
    'as'    =>  'edit-slider'
]);

Route::post('/update-slider', [
    'uses'  =>  'SliderController@updateSlider',
    'as'    =>  'update-slider'
]);

Route::post('/publish-slider', [
    'uses'  =>  'SliderController@publishSlider',
    'as'    =>  'publish-slider'
]);

Route::post('/unpublish-slider', [
    'uses'  =>  'SliderController@unpublishSlider',
    'as'    =>  'unpublish-slider'
]);

Route::post('/delete-slider', [
    'uses'  =>  'SliderController@deleteSlider',
    'as'    =>  'delete-slider'
]);


//============================
//          Order
//============================

Route::get('/manage-order', [
    'uses'  =>  'ManageOrderController@manageOrder',
    'as'    =>  'manage-orders'
]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
















