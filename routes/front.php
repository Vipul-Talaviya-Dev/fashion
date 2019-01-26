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

Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
	Route::get('/', 'HomeController@index')->name('index');
	Route::get('products', 'ProductController@index')->name('products');
	Route::get('/shop/{mainCategory?}/{subCategory?}/{thirdCategory?}/{productUrl?}', 'ProductController@productDetail')->name('productDetail');
	Route::get('/product/add/to/cart/item', 'ProductController@addToCard')->name('addToCard');
	Route::get('/cart', 'ProductController@cart')->name('cart');
	Route::post('/cart-order-detail', 'ProductController@cartOrderDetail')->name('cartOrderDetail');
	Route::get('/order-shipping', 'ProductController@orderShipping')->name('orderShipping');
	Route::post('/order-shipping-detail', 'ProductController@shippingDetail')->name('shippingDetail');
	
	Route::post('/login', 'LoginController@login')->name('login');
	Route::post('/signUpCheck', 'LoginController@signUpCheck')->name('signUpCheck');
	Route::post('/signUp', 'LoginController@signUp')->name('signUp');
	Route::group(['middleware' => 'userAuth'], function () {
		Route::get('/my-account', 'UserController@index')->name('myAccount');
		Route::get('/payment', 'ProductController@payment')->name('payment');
		Route::post('/order-place', 'ProductController@orderPlace')->name('order-place');
		Route::get('/thanks', 'ProductController@thanks')->name('thanks');
	});

	Route::get('contact-us', function () { return "Contact"; })->name('contact');
	Route::get('logout', 'UserController@logout')->name('logout');
});