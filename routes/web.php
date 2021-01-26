<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('welcome'));
});

Auth::routes();

Route::get('home', 'CategoryController@index')->name('welcome');
Route::post('cart/{id}', 'TransactionController@addToCart')->name('addToCart');

Route::middleware('auth')->group(function (){
    Route::get('change-password','ChangePasswordController@show')->name('showChangePassword');
    Route::post('change-password','ChangePasswordController@change')->name('changePassword');
});

Route::prefix('category')->group(function (){
    Route::get('/', 'CategoryController@manageCategory')->name('manageCategory');
    Route::middleware('manager')->group(function (){
        Route::get('update/{id}', 'CategoryController@edit')->name('categoryEdit');
        Route::patch('{id}','CategoryController@update')->name('categoryUpdate');
        Route::delete('{id}', 'CategoryController@delete')->name('categoryDelete');
    });
    Route::get('{id}','CategoryController@getProductByCategory')->name('home');
});

Route::prefix('product')->group(function (){
    Route::get('search','ProductController@search')->name('productSearch');
    Route::middleware('manager')->group(function (){
        Route::get('update/{id}','ProductController@showUpdatePage')->name('showUpdateProduct');
        Route::patch('update{id}','ProductController@update')->name('productUpdate');
        Route::get('add','ProductController@showStorePage')->name('showProductStore');
        Route::post('add','ProductController@store')->name('productStore');
        Route::delete('{id}','ProductController@softDelete')->name('productDelete');
    });
    Route::get('{id}','ProductController@get')->name('productGet');
});

Route::middleware('user')->group(function() {
    Route::prefix('cart')->group(function() {
        Route::get('', 'TransactionController@cart')->name('userCart');
        Route::patch('update/{id}', 'TransactionController@changeCartItemQty')->name('updateCartContent');
    });

    Route::prefix('transaction')->group(function() {
        Route::get('history', 'TransactionController@transactionHistory')->name('history');
        Route::get('history/{id}', 'TransactionController@transactionDetail')->name('transactionDetail');   
        Route::post('checkout', 'TransactionController@checkout')->name('checkout');
    });
});
