<?php



Auth::routes();

Route::get('/', 'ItemController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('create/item', 'ItemController@store');

Route::get('/cart', 'CartController@index');
Route::post('/add/cart', 'CartController@store');
