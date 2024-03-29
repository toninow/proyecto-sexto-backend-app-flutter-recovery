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

//Route::get('/', function () {
//    return view('dashboard');
//});



Route::middleware(['auth'])->group(function () {
	
	Route::get('/', 'DashboardController@index');
	Route::get('home', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');
	Route::post('post-category-form', 'CategoryController@store');
	Route::get('create-category', 'CategoryController@create');
	Route::get('all-categories', 'CategoryController@index');
	Route::get('edit-category/{id}', 'CategoryController@edit');
	Route::post('update-category/{id}', 'CategoryController@update');
	Route::get('delete-category/{id}', 'CategoryController@destroy');
	Route::get('get-product-form', 'ProductController@create');
	Route::post('post-product-form', 'ProductController@store');
	Route::get('all-products', 'ProductController@index');
	Route::get('edit-product/{id}', 'ProductController@edit');
	Route::post('post-product-edit-form/{id}', 'ProductController@update');
	Route::get('delete-product/{id}', 'ProductController@destroy');
	Route::post('post-slider-form', 'SliderController@store');
	Route::get('get-slider-form', 'SliderController@create');
	Route::get('all-sliders', 'SliderController@index');
	Route::post('post-slider-edit-form/{id}', 'SliderController@update');
	Route::get('edit-slider/{id}', 'SliderController@edit');
	Route::get('delete-slider/{id}', 'SliderController@destroy');
	Route::get('all-orders', 'OrderController@index');	
	Route::get('order-detail/{orderId}', 'OrderController@show');	
	Route::get('approve-order-detail/{orderDetailId}', 'OrderController@orderDetail');
	Route::get('approve-order/{orderId}', 'OrderController@approveOrder');
	
	Route::get('create-restaurant', 'RestaurantController@create');
	Route::post('post-restaurant-form', 'RestaurantController@store');
	Route::get('all-restaurants', 'RestaurantController@index');
	Route::get('edit-restaurant/{id}', 'RestaurantController@edit');
	Route::post('update-restaurant/{restaurantId}', 'RestaurantController@update');
	Route::get('delete-restaurant/{restaurantId}', 'RestaurantController@destroy');
	
});

Auth::routes();

