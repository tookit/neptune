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

Route::get('/','Web\HomeController@index');

Route::get('/product','Web\ProductController@index');

Route::get('/product/categories','Web\ProductController@categories');

Route::get('/product/item/{slug}','Web\ProductController@view');
Route::get('/product/category/{slug}','Web\ProductController@category');

Route::get('/admin', function () {
    return view('admin');
});
