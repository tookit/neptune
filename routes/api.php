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




//public route


Route::post('/auth/login',['uses'=>'Auth\LoginController@login','desc'=>'Login'])->name('login');

// protected route
Route::middleware(['auth:api'])->group(function () {

    Route::prefix('auth')->group(function (){

        Route::post('logout',['uses'=>'Auth\LoginController@logout','desc'=>'Logout'])->name('logout');
        Route::post('refresh',['uses'=>'Auth\LoginController@refresh','desc'=>'Refresh token'])->name('token.refresh');

    });

    // Current Login user info
    Route::get('me',['uses'=>'Acl\UserController@me','desc'=>'View self'])->name('user.me');

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
        Route::get('menu',['uses'=>'CMS\MenuController@index','desc'=>'List menu'])->name('menu.index');
        Route::post('menu',['uses'=>'CMS\MenuController@store','desc'=>'Create menu'])->name('menu.create');
        Route::get('menu/{id}',['uses'=>'CMS\MenuController@show','desc'=>'View menu detail'])->where('id', '[0-9]+')->name('menu.view');
        Route::put('menu/{id}',['uses'=>'CMS\MenuController@update','desc'=>'Update menu'])->where('id', '[0-9]+')->name('menu.edit');
        Route::delete('menu/{id}',['uses'=>'CMS\MenuController@destroy','desc'=>'Delete menu'])->where('id', '[0-9]+')->name('menu.delete');
        //category
        Route::get('category',['uses'=>'CMS\CategoryController@index','desc'=>'List category'])->name('category.index');
        Route::post('category',['uses'=>'CMS\CategoryController@store','desc'=>'Create category'])->name('category.create');
        Route::get('category/{id}',['uses'=>'CMS\CategoryController@show','desc'=>'View category detail'])->where('id', '[0-9]+')->name('category.view');
        Route::put('category/{id}',['uses'=>'CMS\CategoryController@update','desc'=>'Update category'])->where('id', '[0-9]+')->name('category.edit');
        Route::delete('category/{id}',['uses'=>'CMS\CategoryController@destroy','desc'=>'Delete category'])->where('id', '[0-9]+')->name('category.delete');
        //post
        Route::get('post',['uses'=>'CMS\PostController@index','desc'=>'List category'])->name('post.index');
        Route::post('post',['uses'=>'CMS\PostController@store','desc'=>'Create category'])->name('post.create');
        Route::get('post/{id}',['uses'=>'CMS\PostController@show','desc'=>'View category detail'])->where('id', '[0-9]+')->name('post.view');
        Route::put('post/{id}',['uses'=>'CMS\PostController@update','desc'=>'Update category'])->where('id', '[0-9]+')->name('post.edit');
        Route::delete('post/{id}',['uses'=>'CMS\PostController@destroy','desc'=>'Delete category'])->where('id', '[0-9]+')->name('post.delete');
        //post
        Route::get('tag',['uses'=>'CMS\TagController@index','desc'=>'List tag'])->name('tag.index');
        Route::post('tag',['uses'=>'CMS\TagController@store','desc'=>'Create tag'])->name('tag.create');
        Route::get('tag/{id}',['uses'=>'CMS\TagController@show','desc'=>'View tag detail'])->where('id', '[0-9]+')->name('tag.view');
        Route::put('tag/{id}',['uses'=>'CMS\TagController@update','desc'=>'Update tag'])->where('id', '[0-9]+')->name('tag.edit');
        Route::delete('tag/{id}',['uses'=>'CMS\TagController@destroy','desc'=>'Delete tag'])->where('id', '[0-9]+')->name('tag.delete');

    });

    // Mall
    Route::prefix('mall')->group(function (){

        //category
        Route::get('category',['uses'=>'Mall\CategoryController@index','desc'=>'List category'])->name('category.index');
        Route::post('category',['uses'=>'Mall\CategoryController@store','desc'=>'Create category'])->name('category.create');
        Route::get('category/{id}',['uses'=>'Mall\CategoryController@show','desc'=>'View category detail'])->where('id', '[0-9]+')->name('category.view');
        Route::put('category/{id}',['uses'=>'Mall\CategoryController@update','desc'=>'Update category'])->where('id', '[0-9]+')->name('category.edit');
        Route::delete('category/{id}',['uses'=>'Mall\CategoryController@destroy','desc'=>'Delete category'])->where('id', '[0-9]+')->name('category.delete');
        //product
        Route::get('item',['uses'=>'Mall\ProductController@index','desc'=>'List product'])->name('product.index');
        Route::post('item',['uses'=>'Mall\ProductController@store','desc'=>'Create product'])->name('product.create');
        Route::get('item/{id}',['uses'=>'Mall\ProductController@show','desc'=>'View product detail'])->where('id', '[0-9]+')->name('product.view');
        Route::put('item/{id}',['uses'=>'Mall\ProductController@update','desc'=>'Update product'])->where('id', '[0-9]+')->name('product.edit');
        Route::delete('item/{id}',['uses'=>'Mall\ProductController@destroy','desc'=>'Delete product'])->where('id', '[0-9]+')->name('product.delete');
        Route::post('item/{id}/image',['uses'=>'Mall\ProductController@attachImage','desc'=>'Attach image for product'])->where('id', '[0-9]+')->name('product.image.attach');


    });

    // Media

    Route::prefix('media')->group(function (){

        Route::get('image',['uses'=>'Media\ImageController@index','desc'=>'List Image'])->name('media.image.list');
        Route::post('image',['uses'=>'Media\ImageController@store','desc'=>'Upload Image'])->name('media.image.upload');
        Route::get('image/{id}',['uses'=>'Media\ImageController@show','desc'=>'Get Image'])->where('id', '[0-9]+')->name('media.image.view');

    });

    // shop



});



