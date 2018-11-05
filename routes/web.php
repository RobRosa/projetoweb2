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
	'uses' 	=> 'CartController@setCart',
	'as'	=> 'cart.add'
]);

Route::get('/myCart', [
	'uses'	=> 'CartController@getCart',
	'as'	=> 'cart.myCart'
]);

Route::get('/checkout', [
	'uses' 	=> 'CheckoutController@getCheckout',
	'as'	=> 'checkout.index'
])->middleware('auth');

Route::post('/checkout/validation', [
	'uses'	=> 'CheckoutController@validationCheckout',
	'as'	=> 'checkout.validation'
])->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/update', 'HomeController@showUpdate')->name('editProfile');

Route::get('/perfil', 'PerfilController@index')->middleware('auth');

Route::resource('product','ProductController');