<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
});

Route::get('/products/{id}', 'ProductsController@index')->name('products_index');
Route::get('/product/{id}', 'ProductsController@show')->name('products_details');