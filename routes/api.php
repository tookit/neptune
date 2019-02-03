<?php

use Illuminate\Http\Request;

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

Route::post('/auth/login','AuthController@login');


// protected route
Route::middleware(['auth:api'])->group(function () {

    Route::post('/auth/logout','AuthController@logout');
    Route::post('/auth/refresh','AuthController@refresh');

    Route::apiResource('categories',CategoryController::class);
    Route::apiResource('users',UserController::class);
    Route::get('me','UserController@me');
});

Route::apiResource('media',MediaController::class);

Route::prefix('mall')->group(function (){
    Route::apiResource('products',ProductController::class);
    Route::apiResource('categories',ProductCategoryController::class);
    Route::get('products/{id}/categories','ProductController@listCategories');
    Route::put('products/{id}/categories','ProductController@attachCategories');
    Route::get('products/{id}/images','ProductController@listImage');
    Route::post('products/{id}/images','ProductController@attachImage');
    Route::get('categories/tree','ProductCategoryController@listAll');
    Route::apiResource('categories',ProductCategoryController::class);


});

