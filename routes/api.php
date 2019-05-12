<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//public route

Route::post('/auth/login','Auth\LoginController@login');


// protected route
Route::middleware([])->group(function () {

    Route::prefix('auth')->group(function (){

        Route::post('logout','Auth\LoginController@logout');
        Route::post('refresh','Auth\LoginController@refresh');

    });

    Route::prefix('cms')->group(function (){

        Route::get('users','CMS\UserController@index');

    });


    Route::get('me','UserController@me');
//    Route::apiResource('media',MediaController::class);

});


//Route::prefix('mall')->group(function (){
//    Route::apiResource('products',ProductController::class);
//    Route::get('products/{id}/categories','ProductController@listCategories')->where('id', '[0-9]+');
//    Route::put('products/{id}/categories','ProductController@attachCategories')->where('id', '[0-9]+');;
//    Route::get('products/{id}/images','ProductController@listImage')->where('id', '[0-9]+');;
//    Route::post('products/{id}/images','ProductController@attachImage')->where('id', '[0-9]+');;
//    Route::get('categories/tree','ProductCategoryController@listAll')->where('id', '[0-9]+');;
//    Route::apiResource('categories',ProductCategoryController::class);
//
//
//});

