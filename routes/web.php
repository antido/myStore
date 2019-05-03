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

/* Pages Route */
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/service', 'PagesController@service');
Route::get('/product/category/{id}', 'ProductsController@displayProductsByCategory');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* Transactions Route */
Route::get('/transactions/purchases', 'TransactionsController@purchase');
Route::get('/transactions/status', 'TransactionsController@status');
Route::get('/transactions/logs', 'TransactionsController@log');
Route::get('/transactions/map', 'TransactionsController@map');

/* Product Cart Route */
Route::get('/product/cart/{id}', 'ProductCartController@showUserCart');
Route::post('/product/add-to-cart/{id}', 'ProductCartController@storeProductToCart');
Route::delete('/product/remove-from-cart/{id}/{cartId}', 'ProductCartController@removeProductFromCart');
Route::post('/product/add-quantity/{id}/{cartId}/{qty}', 'ProductCartController@storeProductQuantity');

Route::resource('/product', 'ProductsController');
Route::resource('/profile', 'ProfileController');

/* Purchase Product Route */
Route::post('/purchase/{id}/{amount}', 'PurchaseController@finalizeProductPurchase');

