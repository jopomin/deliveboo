<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


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
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('/', 'HomeController@index')->name('guest.homepage');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.homepage');
    Route::get('/user', 'UserController@index')->name('admin.users.index');
    Route::resource('/orders', OrderController::class)->names([
        'index' => 'admin.orders.index',
        'store' => 'admin.orders.store',
        'show' => 'admin.orders.show',
        'edit' => 'admin.orders.edit',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
        'create' => 'admin.orders.create'
    ]);
    Route::resource('/products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'store' => 'admin.products.store',
        'show' => 'admin.products.show',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
        'create' => 'admin.products.create'
    ]);
    Route::resource('/categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'create' => 'admin.categories.create'
    ]);
});

Route::get('/products/{id}', 'ProductController@index')->name('products_index');
Route::get('/products/{id}', 'ProductController@show')->name('product_details');
Route::get('/restaurant', 'UserController@index')->name('restaurant_list');
Route::get('/restaurant/{id}', 'UserController@show')->name('restaurants_details');

Route::get('cart/{id}', 'ProductController@cart')->name('cart');
Route::get('update-cart/{id}', 'ProductController@updatecart')->name('updatecart');
Route::get('remove-cart/{id}', 'ProductController@removecart')->name('removecart');
Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('add_to_cart');
Route::get('cartReset', 'ProductController@resetCart')->name('reset_cart');

