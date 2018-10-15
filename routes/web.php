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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin/dashboard', 'AdminController@dashboard');

    // Product routes

    Route::match(['post', 'get'], 'admin/add-product', 'ProductController@addProduct');
    Route::get('admin/view-products', 'ProductController@viewProducts');
    Route::match(['post','get'] , 'admin/edit-product/{id}', 'ProductController@editProduct');
    Route::get('admin/delete-product/{id}', 'ProductController@deleteProduct');
});

Route::group(['middleware'=>['login']], function() {
    Route::get('/', 'IndexController@index');
    Route::get('product/{id}','ProductController@productDetails');

});

Route::get('user-login', 'UserController@userLogin');
Route::get('user-register', 'UserController@userRegister');
Route::post('/user-register','UserController@register');
Route::post('/user-login', 'UserController@login' );
Route::get('user-logout', 'UserController@logout');



