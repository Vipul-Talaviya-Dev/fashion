<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'control-panel','as' => 'admin.'], function () {
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('check', 'LoginController@check')->name('check');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('forgot-password', 'LoginController@forgotPassword')->name('forgotPassword');
    Route::post('forgotPasswordCheck', 'LoginController@forgotPasswordCheck')->name('forgotPasswordCheck');

    Route::group(['middleware' => 'adminAuth'], function () {
        // Dashboard Controller
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('contacts', 'DashboardController@contacts')->name('contacts');
        Route::get('app-content', 'DashboardController@appContent')->name('appContent');
        Route::post('app-content', 'DashboardController@appContentUpdate')->name('appContentUpdate');

        Route::get('reset-password', 'DashboardController@resetPassword')->name('resetPassword');
        Route::post('change-password', 'DashboardController@changePassword')->name('changePassword');

        // Category Controller
        Route::get('categories', 'CategoryController@index')->name('categories');
        Route::get('category/add', 'CategoryController@add')->name('category.add');
        Route::post('category/create', 'CategoryController@create')->name('category.create');
        Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('category/{id}/update', 'CategoryController@update')->name('category.update');
        // Brand Controller
        Route::get('brands', 'BrandController@index')->name('brands');
        Route::get('brand/add', 'BrandController@add')->name('brand.add');
        Route::post('brand/create', 'BrandController@create')->name('brand.create');
        Route::get('brand/{id}/edit', 'BrandController@edit')->name('brand.edit');
        Route::post('brand/{id}/update', 'BrandController@update')->name('brand.update');
        Route::get('brand/{id}/delete', 'BrandController@delete')->name('brand.delete');

        //Offer controller
        Route::get('offers', 'OfferController@index')->name('offers');
        Route::get('offer/add', 'OfferController@add')->name('offer.add');
        Route::post('offer/create', 'OfferController@create')->name('offer.create');
        Route::get('offer/{id}/edit', 'OfferController@edit')->name('offer.edit');
        Route::post('offer/{id}/update', 'OfferController@update')->name('offer.update');
        Route::get('offer/{id}/delete', 'OfferController@delete')->name('offer.delete');

        // Size Controller
        Route::get('sizes', 'SizeController@index')->name('sizes');
        Route::get('size/add', 'SizeController@add')->name('size.add');
        Route::post('size/create', 'SizeController@create')->name('size.create');
        Route::get('size/{id}/edit', 'SizeController@edit')->name('size.edit');
        Route::post('size/{id}/update', 'SizeController@update')->name('size.update');
        Route::get('size/{id}/delete', 'SizeController@delete')->name('size.delete');

        // ProductType Controller
        Route::get('productType', 'ProductTypeController@index')->name('productTypes');
        Route::get('productType/add', 'ProductTypeController@add')->name('productType.add');
        Route::post('productType/create', 'ProductTypeController@create')->name('productType.create');
        Route::get('productType/{id}/edit', 'ProductTypeController@edit')->name('productType.edit');
        Route::post('productType/{id}/update', 'ProductTypeController@update')->name('productType.update');
        Route::get('productType/{id}/delete', 'ProductTypeController@delete')->name('productType.delete');

        // Banner Controller
        Route::get('banners', 'BannerController@index')->name('banners');
        Route::get('banner/add', 'BannerController@add')->name('banner.add');
        Route::post('banner/create', 'BannerController@create')->name('banner.create');
        Route::get('banner/{id}/edit', 'BannerController@edit')->name('banner.edit');
        Route::post('banner/{id}/update', 'BannerController@update')->name('banner.update');
        Route::get('banner/{id}/delete', 'BannerController@delete')->name('banner.delete');

        // Window Image Controller
        Route::get('windowImages', 'WindowImageController@index')->name('windowImages');
        Route::get('windowImage/add', 'WindowImageController@add')->name('windowImage.add');
        Route::post('windowImage/create', 'WindowImageController@create')->name('windowImage.create');
        Route::get('windowImage/{id}/edit', 'WindowImageController@edit')->name('windowImage.edit');
        Route::post('windowImage/{id}/update', 'WindowImageController@update')->name('windowImage.update');
        Route::get('windowImage/{id}/delete', 'WindowImageController@delete')->name('windowImage.delete');

        // Color Controller
        Route::get('colors', 'ColorController@index')->name('colors');
        Route::get('color/add', 'ColorController@add')->name('color.add');
        Route::post('color/create', 'ColorController@create')->name('color.create');
        Route::get('color/{id}/edit', 'ColorController@edit')->name('color.edit');
        Route::post('color/{id}/update', 'ColorController@update')->name('color.update');
        Route::get('color/{id}/delete', 'ColorController@delete')->name('color.delete');

        // Product Controller
        Route::get('products', 'ProductController@index')->name('products');
        Route::get('product/add', 'ProductController@add')->name('product.add');
        Route::post('product/create', 'ProductController@create')->name('product.create');
        Route::get('product/{id}/edit', 'ProductController@edit')->name('product.edit');
        Route::post('product/{id}/update', 'ProductController@update')->name('product.update');

        Route::get('product/{id}/variations', 'ProductVariationController@index')->name('product.variations');
        Route::get('product/{id}/variation/add', 'ProductVariationController@variationInsert')->name('product.variationInsert');
        Route::post('product/{id}/variation/create', 'ProductVariationController@variationCreate')->name('product.variationCreate');
        Route::get('product/{id}/variation/edit', 'ProductVariationController@variationEdit')->name('product.variationEdit');
        Route::post('product/{id}/variation/update', 'ProductVariationController@variationUpdate')->name('product.variationUpdate');

        // Order Controller
        Route::get('orders', 'OrderController@index')->name('orders');
        Route::get('order/{id}/detail', 'OrderController@orderDetail')->name('orderDetail');
        Route::post('order/{id}/statusChange', 'OrderController@statusChange')->name('statusChange');
        Route::get('order/{id}/invoice', 'OrderController@invoice')->name('invoice');
        Route::get('returnOrders', 'OrderController@returnOrders')->name('returnOrders');
        Route::get('returnOrders/{id}/statusChange', 'OrderController@returnOrderStatusChange')->name('returnOrderStatusChange');

        // User
        Route::get('users', 'UserController@index')->name('users');
        Route::get('user/add', 'UserController@add')->name('user.add');
        Route::post('user/create', 'UserController@create')->name('user.create');
        Route::post('user/change-status', 'UserController@changeStatus')->name('user.changeStatus');

        // Sub Admin Controller
        Route::get('subAdmins', 'SubAdminController@index')->name('subAdmins');
        Route::get('subAdmin/add', 'SubAdminController@add')->name('subAdmin.add');
        Route::post('subAdmin/create', 'SubAdminController@create')->name('subAdmin.create');
        Route::get('subAdmin/{id}/edit', 'SubAdminController@edit')->name('subAdmin.edit');
        Route::post('subAdmin/{id}/update', 'SubAdminController@update')->name('subAdmin.update');
        Route::get('subAdmin/delete', 'SubAdminController@delete')->name('subAdmin.delete');

        // ContentController
        Route::get('content/{id}/edit', 'ContentController@edit')->name('content.edit');
        Route::post('content/{id}/update', 'ContentController@update')->name('content.update');

        Route::get('contactImportDownloadExcel', 'ContactController@contactImportDownloadExcel')->name('contactImportDownloadExcel');
        Route::get('contact/import', 'ContactController@index')->name('contantImportForm');
        Route::post('contact/import', 'ContactController@upload')->name('contantImport');

    });
});

Route::group(['namespace' => 'Admin', 'as' => 'api.'], function () {
    Route::post('subCategory', 'ProductController@subCategory')->name('subCategory');
});