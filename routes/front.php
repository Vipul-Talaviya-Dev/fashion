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
	Route::get('{mainCategory}/{subCategory}', 'ProductController@index')->name('products');
	Route::get('{mainCategory}/{subCategory}/{thirdCategory}', 'ProductController@productDetail')->name('productDetail');
	Route::get('contact-us', function () { return "Contact"; })->name('contact');
});