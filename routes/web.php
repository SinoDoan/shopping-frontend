<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/category/{slug}/{id}', [
    'as'=>'category.product',
    'uses'=>'CategoryController@index'
]);
Route::get('/add-to-cart/{id}', [
    'as'=>'addToCart',
    'uses'=>'CartController@addToCart'
]);
Route::get('/show-cart', [
    'as'=>'showCart',
    'uses'=>'CartController@index'
]);
Route::get('/update-cart', [
    'as'=>'updateCart',
    'uses'=>'CartController@updateCart'
]);
Route::get('/delete-cart', [
    'as'=>'deleteCart',
    'uses'=>'CartController@deleteCart'
]);
Route::get('/product-detail/{id}', [
    'as'=>'product.detail',
    'uses'=>'ProductController@index'
]);

//check-out
Route::post('/login-customer', [
    'as'=>'login_customer',
    'uses'=>'CheckoutController@login_customer'
]);
Route::get('/login-checkout', [
    'as'=>'login_checkout',
    'uses'=>'CheckoutController@login_checkout'
]);
Route::get('/logout-checkout', [
    'as'=>'logout_checkout',
    'uses'=>'CheckoutController@logout_checkout'
]);
Route::post('/add-customer', [
    'as'=>'addCustomer',
    'uses'=>'CheckoutController@add_customer'
]);
Route::get('/checkout', [
    'as'=>'checkout',
    'uses'=>'CheckoutController@checkout'
]);

Route::post('/save-checkout-customer', [
    'as'=>'saveCheckoutCustomer',
    'uses'=>'CheckoutController@save_checkout_customer'
]);
Route::get('/payment', [
    'as'=>'payment',
    'uses'=>'CheckoutController@payment'
]);
Route::post('/order-place/{subTotal}', [
    'as'=>'orderPlace',
    'uses'=>'CheckoutController@order_place'
]);
