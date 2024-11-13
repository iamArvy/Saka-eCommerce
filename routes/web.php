<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return App\Http\Controllers\HomeController::index();
});


// Store Routes

// No Auth Routes
Route::group([
    'as'=>'store.',
    'prefix'=>'/store',
    'namespace'=> App\Http\Controllers\Store::class
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('/product/{product}', 'ProductController@index')->name('product.show');
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
    Route::get('/contact', 'EmporiumController@contact')->name('contact');
});

// User Cart Route

Route::group([
    'as'=>'cart.',
    'prefix'=>'/cart',
    'namespace'=> App\Http\Controllers\Store::class,
    'middleware'=> ['auth', config('jetstream.auth_session')]
], function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('/add', 'CartController@add')->name('add');
    Route::post('/remove', 'CartController@remove')->name('remove');
    Route::get('/clear', 'CartController@clear')->name('clear');
    Route::post('/edit', 'CartController@edit')->name('edit');
});

// Checkout

Route::group([
    'as'=>'checkout.',
    'prefix'=>'/checkout',
    'namespace'=> App\Http\Controllers\Store::class,
    'middleware'=> ['auth', config('jetstream.auth_session')]
], function () {
    Route::get('/checkout', 'CartController@checkout')->name('get');
    Route::post('/checkout', 'OrderController@checkout')->name('post');
});

// Order

Route::group([
    'as'=>'order.',
    'prefix'=>'/order',
    'namespace'=> App\Http\Controllers\Store::class,
    'middleware'=> ['auth', config('jetstream.auth_session')]
], function () {
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('/order/{order}', 'OrderController@index')->name('product.show');
});

