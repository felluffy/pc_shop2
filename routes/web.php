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
Auth::routes();
//Route::view('/', 'site.pages.homepage');
Route::get('/', 'Site\HomepageController@index')->name('homepage');
//Route::get('/user', 'site.pages.homepage');
Route::group(['prefix'  =>  'user'], function () {
    Route::get('/', 'Site\UserController@index')->name('user.profile.index');
    Route::post('/update', 'Site\UserController@update')->name('user.profile.update');
});
Route::get('/search', 'Site\HomepageController@search');
Route::get('/category/{name}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{name}', 'Site\ProductController@show')->name('product.show');
Route::get('/announcements', 'Site\AnnouncementController@index')->name('site.announcements.index');
Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::post('/contract/mail', 'Site\HomepageController@mail')->name('contract.mail');

Route::get('/history', function()
{
    return view('site.pages.history');
})->name('site.history');

Route::get('/about', function()
{
    return view('site.pages.about');
})->name('site.about');


Route::get('/contract', function()
{
    return view('site.pages.contract');
})->name('site.contract');


require 'admin.php';