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



Route::get('/', 'IndexController@index');

Route::get('product/{id}','ProductController@productDetails');

Route::get('products/{url}', 'ProductController@productList');

Route::match(['get', 'post'], 'admin', 'AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/dashboard', 'AdminController@dashboard');
    Route::get('logout', 'AdminController@logout');

    //Category routes

    Route::match(['get', 'post'], 'admin/add-category', 'CategoryController@addCategory');
    Route::get('admin/view-categories', 'CategoryController@viewCategories');
    Route::get('admin/delete-category/{id}', 'CategoryController@deleteCategory');
    Route::match(['get','post'], 'admin/edit-category/{id}', 'CategoryController@editCategory');


    // Product routes

    Route::match(['post', 'get'], 'admin/add-product', 'ProductController@addProduct');
    Route::get('admin/view-products', 'ProductController@viewProducts');
    Route::match(['post','get'] , 'admin/edit-product/{id}', 'ProductController@editProduct');
    Route::get('admin/delete-product/{id}', 'ProductController@deleteProduct');
});

Route::get('login-register', 'UserController@registerAndLogin');
Route::post('/user-register','UserController@register');
Route::post('/user-login', 'UserController@login' );
Route::get('user-logout', 'UserController@logout');



