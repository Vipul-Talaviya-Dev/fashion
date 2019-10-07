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
	Route::get('mail', 'ProductController@mail');
	Route::get('invoice', 'ProductController@invoice');

	Route::get('/', 'HomeController@index')->name('index');
	Route::get('contact-us', 'HomeController@contact')->name('contact');
	Route::post('contact', 'HomeController@addContact')->name('addContact');
	Route::get('about', 'HomeController@about')->name('about');
	Route::get('faq', 'HomeController@faq')->name('faq');
	Route::get('term-condition', 'HomeController@termCondition')->name('term');
	Route::get('privacy-policy', 'HomeController@privacyPolicy')->name('privacyPolicy');
	Route::get('return-policy', 'HomeController@returnPolicy')->name('returnPolicy');
	Route::get('member-ship-policy', 'HomeController@memberShipPolicy')->name('memberShipPolicy');
	Route::get('shipping-policy', 'HomeController@shippingPolicy')->name('shippingPolicy');

	Route::get('products', 'ProductController@index')->name('products');
	Route::get('/shop/{mainCategory?}/{subCategory?}/{thirdCategory?}/{productUrl?}', 'ProductController@productDetail')->name('productDetail');
	Route::get('/shop/{mainCategory?}/{subCategory?}/{thirdCategory?}/{productUrl?}/{id}/{code}', 'ProductController@productDetailWithColor');
	Route::get('/product/add/to/cart/item', 'ProductController@addToCard')->name('addToCard');
	// Route::get('/cart', 'ProductController@cart')->name('cart');
	Route::get('/carts', 'ProductController@carts')->name('carts');
	Route::post('/cart-order-detail', 'ProductController@cartOrderDetail')->name('cartOrderDetail');
	Route::get('/login', 'LoginController@loginForm')->name('loginForm');
	Route::get('otp-expire', 'LoginController@otpExpire')->name('otpExpire');
	Route::post('/login', 'LoginController@login')->name('login');
	Route::post('resendOtp', 'LoginController@resendOtp')->name('resendOtp');
	Route::get('/social/{service}/login', 'LoginController@redirect')->name('socialLogin');
	Route::get('callback/{service}', 'LoginController@socialCallBackHandle')->name('socialCallBackHandle');
	Route::post('/signUpCheck', 'LoginController@signUpCheck')->name('signUpCheck');
	Route::post('/signUp', 'LoginController@signUp')->name('signUp');
	Route::post('forgotPassword', 'LoginController@forgotPassword')->name('forgotPassword');
	Route::post('forgotPasswordOtp', 'LoginController@forgotPasswordOtp')->name('forgotPasswordOtp');
	
	Route::get('/order-shipping', 'ProductController@orderShipping')->name('orderShipping');
	
	Route::group(['middleware' => 'userAuth'], function () {
		Route::get('reset-password', 'UserController@resetPassword')->name('resetPassword');
		Route::post('reset-password', 'UserController@changePassword')->name('changePassword');

		Route::get('new-password', 'UserController@newPassword')->name('newPassword');
		Route::post('new-password', 'UserController@changeNewPassword')->name('changeNewPassword');

		Route::post('/order-shipping-detail', 'ProductController@shippingDetail')->name('shippingDetail');
		Route::get('/my-orders', 'UserController@index')->name('myAccount');
		Route::post('orderReturn', 'UserController@orderReturn')->name('orderReturn');
		Route::get('my-profile', 'UserController@profile')->name('myProfile');
		Route::post('my-update', 'UserController@profileUpdate')->name('profileUpdate');
		Route::post('my-mobile-update', 'UserController@mobileUpdate')->name('mobileUpdate');

		Route::get('get-membership', 'UserController@getMemberShip')->name('getMemberShip');
		Route::get('check-membership-code', 'ProductController@memberShipCodeCheck')->name('memberShipCodeCheck');
		Route::get('check-offer-code', 'ProductController@promotionApply')->name('promotionApply');

		Route::get('/payment', 'ProductController@payment')->name('payment');
		Route::post('/order-place', 'ProductController@orderPlace')->name('order-place');

		Route::get('order-confirm', 'PaymentController@orderConfirm')->name('orderConfirm');
		Route::post('payment-success','PaymentController@paymentResponse')->name('paymentsuccess');
		Route::post('payment-failure','PaymentController@paymentResponse')->name('paymentfailure');
		Route::get('thanks', 'ProductController@thanks')->name('thanks');
		
		Route::get('addresses', 'AddressController@index')->name('addresses');
		Route::get('address/{id}/delete', 'AddressController@delete')->name('addressDelete');
		Route::get('address/{id}/edit', 'AddressController@edit')->name('addressEdit');
		Route::post('create-address', 'AddressController@createAddress')->name('createAddress');
	});

	Route::get('logout', 'UserController@logout')->name('logout');
});