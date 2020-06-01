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

Route::get('/','Web\HomeController@index')->name('home');

Route::get('/about','Web\PageController@about')->name('about');
Route::get('/contact','Web\PageController@contact')->name('contact');

Route::get('/product','Web\ProductController@index')->name('product.index');

Route::get('/product/categories','Web\ProductController@categories')->name('product.categories');

Route::get('/product/item/{slug}','Web\ProductController@view')->name('product.view');
Route::get('/product/category/{slug}','Web\ProductController@category')->name('product.category');

Route::get('/admin', function () {
    return view('admin');
});
