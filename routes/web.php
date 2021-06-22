<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Providers\Braintree_Configuration;
use Illuminate\Http\Request;



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
    Route::get('/customers', 'CustomerController@index')->name('admin.customers.index');
    Route::get('/user', 'UserController@index')->name('admin.users.index');
    Route::get('/user/{user}', 'UserController@edit')->name('admin.users.edit');
    Route::put('/user/{user}', 'UserController@update')->name('admin.users.update');
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
Route::delete('remove-from-cart', 'ProductController@cartdestroy')->name('delete_cart');
Route::get('cartReset', 'ProductController@resetCart')->name('reset_cart');
Route::get('order', 'OrderController@create')->name('orders.create');
Route::post('order', 'OrderController@store')->name('orders.store');



Route::get('/prova', 'ProductController@prova')->name('prova');



/* BRAINTREE */

Route::get('/payment', function () {
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('guest.orders.payment', [
        'token' => $token
    ]);
}
)->name('payment');

Route::post('/payment/checkout', function (Request $request) {
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'customer' => [
            'firstName' => 'Tony',
            'lastName' => 'Stark',
            'email' => 'tony@avengers.com',
        ],
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        $transaction = $result->transaction;

        return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
    } else {
        $errorString = "";

        foreach ($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        return back()->withErrors('An error occurred with the message: '.$result->message);
    }
});