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

Route::get('/perfil', 'HomeController@index')->name('perfil');
Route::get('/perfil/atualizar', 'HomeController@showUpdate')->name('atualizarPerfil');
Route::post('/perfil/atualizar/salvar', 'HomeController@updateSave')->name('salvaAtualizacao');

Route::get('/', 'ProductController@index');
Route::resource('product','ProductController');

Route::get('/product/{id}', 'ProductController@show');

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


Route::group([
	'prefix' 	 => 'admin',
	'middleware' => ['auth'],
], function() {
	Route::get('products/create', 'ProductController@create');
});

