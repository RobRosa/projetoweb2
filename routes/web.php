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
Auth::routes();

Route::get('/', 'ProductController@index');

Route::get('/cart/{id}', [
	'uses' 	=> 'ProductController@setCart',
	'as'	=> 'product.cart'
]);

Route::get('/myCart', [
	'uses'	=> 'ProductController@getCart',
	'as'	=> 'product.myCart'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'PerfilController@index')->middleware('auth');

Route::resource('product','ProductController');