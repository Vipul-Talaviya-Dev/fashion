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
	Route::get('/{mainCategory}/{subCategory}/{thirdCategory?}', 'ProductController@index')->name('products');
	Route::get('/shop/{mainCategory?}/{subCategory?}/{thirdCategory?}/{productUrl?}', 'ProductController@productDetail')->name('productDetail');
	Route::get('/product/add/to/cart/item', 'ProductController@addToCard')->name('addToCard');
	Route::get('/cart', 'ProductController@cart')->name('cart');
	Route::post('/cart-order-detail', 'ProductController@cartOrderDetail')->name('cartOrderDetail');
	Route::get('/order-shipping', 'ProductController@orderShipping')->name('orderShipping');
	Route::post('/order-shipping-detail', 'ProductController@shippingDetail')->name('shippingDetail');
	
	Route::group(['middleware' => 'userAuth'], function () {
		Route::get('/payment', 'ProductController@payment')->name('payment');
	});

	Route::get('contact-us', function () { return "Contact"; })->name('contact');
});