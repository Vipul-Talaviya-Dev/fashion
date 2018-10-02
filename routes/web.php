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

Route::group(['namespace' => 'Admin', 'as' => 'user.'], function () {
	Route::get('/', function () { return view('user.index');})->name('index');
	Route::get('{mainCategory}/{subCategory}', function () { return "subCategory"; })->name('subCategoryUrl');
	Route::get('{mainCategory}/{subCategory}/{thirdCategory}', function () { return "thirdCategory"; })->name('thirdCategoryUrl');
	Route::get('contact-us', function () { return "Contact"; })->name('contact');
});
