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
Route::get('/vipul', function() {
	return view('user.email.order-place');
});
Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
	Route::get('/', 'HomeController@index')->name('index');
	Route::get('contact-us', 'HomeController@contact')->name('contact');
	Route::post('contact', 'HomeController@addContact')->name('addContact');

	Route::get('products', 'ProductController@index')->name('products');
	Route::get('/shop/{mainCategory?}/{subCategory?}/{thirdCategory?}/{productUrl?}', 'ProductController@productDetail')->name('productDetail');
	Route::get('/shop/{mainCategory?}/{subCategory?}/{thirdCategory?}/{productUrl?}/{id}/{code}', 'ProductController@productDetailWithColor');
	Route::get('/product/add/to/cart/item', 'ProductController@addToCard')->name('addToCard');
	// Route::get('/cart', 'ProductController@cart')->name('cart');
	Route::get('/carts', 'ProductController@carts')->name('carts');
	Route::post('/cart-order-detail', 'ProductController@cartOrderDetail')->name('cartOrderDetail');
	Route::get('/login', 'LoginController@loginForm')->name('loginForm');
	Route::post('/login', 'LoginController@login')->name('login');
	Route::post('/signUpCheck', 'LoginController@signUpCheck')->name('signUpCheck');
	Route::post('/signUp', 'LoginController@signUp')->name('signUp');
	
	Route::get('/order-shipping', 'ProductController@orderShipping')->name('orderShipping');
	
	Route::group(['middleware' => 'userAuth'], function () {
		Route::post('/order-shipping-detail', 'ProductController@shippingDetail')->name('shippingDetail');
		Route::get('/my-account', 'UserController@index')->name('myAccount');
		Route::get('my-profile', 'UserController@profile')->name('myProfile');
		Route::post('my-update', 'UserController@profileUpdate')->name('profileUpdate');

		Route::get('get-membership', 'UserController@getMemberShip')->name('getMemberShip');
		Route::get('check-membership-code', 'ProductController@memberShipCodeCheck')->name('memberShipCodeCheck');

		Route::get('/payment', 'ProductController@payment')->name('payment');
		Route::post('/order-place', 'ProductController@orderPlace')->name('order-place');
		Route::get('/thanks', 'ProductController@thanks')->name('thanks');
		
		Route::get('addresses', 'AddressController@index')->name('addresses');
		Route::get('address/{id}/delete', 'AddressController@delete')->name('addressDelete');
		Route::get('address/{id}/edit', 'AddressController@edit')->name('addressEdit');
		Route::post('create-address', 'AddressController@createAddress')->name('createAddress');
	});

	Route::get('logout', 'UserController@logout')->name('logout');
});