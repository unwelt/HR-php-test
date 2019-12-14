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

Route::redirect('/', '/weather', 301);

Route::get('/weather', 'WeatherController@index')->name('weather');

Route::resource('orders', 'OrderController', [
    'only' => [
        'index', 'edit', 'update',
    ],
    'names' => [
        'index' => 'orders.index',
        'edit' => 'order.edit',
        'update' => 'order.update',
    ]
]);

Route::resource('products', 'ProductController', [
    'only' => [
        'index', 'update',
    ],
    'names' => [
        'index' => 'products.index',
        'update' => 'product.update',
    ]
]);
