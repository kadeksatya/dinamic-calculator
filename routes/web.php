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

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TenorController;

    Route::get('/', 'HomeController@index');


    Route::get('/product', 'ProductController@index');
    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/store', 'ProductController@store');
    Route::get('/product/{id}/edit', 'ProductController@edit');
    Route::put('/product/{id}/update', 'ProductController@update');
    Route::delete('/product/{id}/delete', 'ProductController@destroy');

    Route::get('/tenor', 'TenorController@index');
    Route::get('/tenor/create', 'TenorController@create');
    Route::post('/tenor/store', 'TenorController@store');
    Route::get('/tenor/{id}/edit', 'TenorController@edit');
    Route::put('/tenor/{id}/update', 'TenorController@update');
    Route::delete('/tenor/{id}/delete', 'TenorController@destroy');
