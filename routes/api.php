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
Route::middleware(['auth:api'])->group(function () {

    Route::prefix('auth')->group(function (){

        Route::post('logout','Auth\LoginController@logout');
        Route::post('refresh','Auth\LoginController@refresh');

    });

    Route::prefix('cms')->group(function (){

//        Route::get('users','CMS\UserController@index');
        Route::get('users',['uses'=>'CMS\UserController@index','desc'=>'List user'])->name('user.index');
        Route::post('users',['uses'=>'CMS\UserController@store','desc'=>'Create user'])->name('user.create');
        Route::get('users/{id}',['uses'=>'CMS\UserController@show','desc'=>'View user detail'])->where('id', '[0-9]+')->name('user.view');
        Route::put('users/{id}',['uses'=>'CMS\UserController@store','desc'=>'Update user'])->where('id', '[0-9]+')->name('user.edit');
        Route::delete('users/{id}',['uses'=>'CMS\UserController@destroy','desc'=>'Delete User'])->where('id', '[0-9]+')->name('user.delete');

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

