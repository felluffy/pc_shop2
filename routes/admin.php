<?php

Route::group(['prefix'  =>  'admin'], function () {

    //Admin Section
    Route::get('login', 'Admin\LoginController@showLogin')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');


        //announcements
        Route::group(['prefix' => 'announcements'], function () {
            Route::get('/', 'Admin\AnnouncementController@index')->name('admin.announcements.index');
            Route::post('/store', 'Admin\AnnouncementController@store')->name('admin.announcements.store');
            Route::get('/create', 'Admin\AnnouncementController@create')->name('admin.announcements.create');
            Route::get('/{id}/edit', 'Admin\AnnouncementController@edit')->name('admin.announcements.edit');
            Route::post('/update', 'Admin\AnnouncementController@update')->name('admin.announcements.update');
            Route::get('/{id}/delete', 'Admin\AnnouncementController@delete')->name('admin.announcements.delete');
        });

        //Categories Section
        Route::group(['prefix'  =>   'categories'], function () {

            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
        });

        //Users section
        Route::group(['prefix'  =>   'users'], function () {

            Route::get('/', 'Admin\UserController@index')->name('admin.users.index');
            Route::get('/create', 'Admin\UserController@create')->name('admin.users.create');
            Route::post('/store', 'Admin\UserController@store')->name('admin.users.store');
            Route::get('/{id}/edit', 'Admin\UserController@edit')->name('admin.users.edit');
            Route::post('/update', 'Admin\UserController@update')->name('admin.users.update');
            Route::get('/{id}/delete', 'Admin\UserController@delete')->name('admin.users.delete');
        });

        //attributes section
        Route::group(['prefix'  =>   'attributes'], function () {

            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');

            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix'  =>   'brands'], function () {

            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');
        });

        Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::post('/delete', 'Admin\ProductController@delete')->name('admin.products.delete');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
            Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');
        });
    });
});
