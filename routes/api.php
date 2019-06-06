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

Route::post('/media',['uses'=>'Media\MediaController@store','desc'=>'Upload Media']);
Route::get('/media',['uses'=>'Media\MediaController@index','desc'=>'List Media']);


Route::post('/auth/login','Auth\LoginController@login');


// protected route
Route::middleware(['auth:api'])->group(function () {

    Route::prefix('auth')->group(function (){

        Route::post('logout','Auth\LoginController@logout');
        Route::post('refresh','Auth\LoginController@refresh');

    });

    // Current Login user info
    Route::get('me','CMS\UserController@me');


    // Access control
    Route::prefix('acl')->group(function (){

        //User
        Route::get('users',['uses'=>'Acl\UserController@index','desc'=>'List user'])->name('user.index');
        Route::post('users',['uses'=>'Acl\UserController@store','desc'=>'Create user'])->name('user.create');
        Route::get('users/{id}',['uses'=>'Acl\UserController@show','desc'=>'View user detail'])->where('id', '[0-9]+')->name('user.view');
        Route::put('users/{id}',['uses'=>'Acl\UserController@update','desc'=>'Update user'])->where('id', '[0-9]+')->name('user.edit');
        Route::delete('users/{id}',['uses'=>'Acl\UserController@destroy','desc'=>'Delete User'])->where('id', '[0-9]+')->name('user.delete');

        //Role
        Route::get('roles',['uses'=>'Acl\RoleController@index','desc'=>'List role'])->name('role.index');
        Route::post('roles',['uses'=>'Acl\RoleController@store','desc'=>'Create role'])->name('role.create');
        Route::get('roles/{id}',['uses'=>'Acl\RoleController@show','desc'=>'View role detail'])->where('id', '[0-9]+')->name('role.view');
        Route::put('roles/{id}',['uses'=>'Acl\RoleController@update','desc'=>'Update role'])->where('id', '[0-9]+')->name('role.edit');
        Route::delete('roles/{id}',['uses'=>'Acl\RoleController@destroy','desc'=>'Delete role'])->where('id', '[0-9]+')->name('role.delete');

        //Permission
        Route::get('permissions',['uses'=>'Acl\PermissionController@index','desc'=>'List permission'])->name('permission.index');
        Route::post('permissions',['uses'=>'Acl\PermissionController@store','desc'=>'Create permission'])->name('permission.create');
        Route::get('permissions/{id}',['uses'=>'Acl\PermissionController@show','desc'=>'View permission detail'])->where('id', '[0-9]+')->name('permission.view');
        Route::put('permissions/{id}',['uses'=>'Acl\PermissionController@update','desc'=>'Update permission'])->where('id', '[0-9]+')->name('permission.edit');
        Route::delete('permissions/{id}',['uses'=>'Acl\PermissionController@destroy','desc'=>'Delete permission'])->where('id', '[0-9]+')->name('permission.delete');

    });

    // CMS
    Route::prefix('cms')->group(function (){

        //Menu
        Route::get('menus',['uses'=>'CMS\MenuController@index','desc'=>'List menu'])->name('menu.index');
        Route::post('menus',['uses'=>'CMS\MenuController@store','desc'=>'Create menu'])->name('menu.create');
        Route::get('menus/{id}',['uses'=>'CMS\MenuController@show','desc'=>'View menu detail'])->where('id', '[0-9]+')->name('menu.view');
        Route::put('menus/{id}',['uses'=>'CMS\MenuController@update','desc'=>'Update menu'])->where('id', '[0-9]+')->name('menu.edit');
        Route::delete('menus/{id}',['uses'=>'CMS\MenuController@destroy','desc'=>'Delete menu'])->where('id', '[0-9]+')->name('menu.delete');

    });




});



