<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['middleware' => 'auth', function () {
    return view('home.index');
}]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/* Password Reset */
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


/* Ruta Ventas */

Route::get('ventas/', 'VentaController@index');
Route::get('ventas/new', 'VentaController@create');

/* Ruta Pedidos */
Route::get('pedidos/', 'PedidoController@index');
Route::get('pedidos/new', 'PedidoController@create');
Route::post('pedidos/new', 'PedidoController@store');
Route::post('pedidos/buscar/', 'PedidoController@search');




/* Ruta Compras */

Route::get('compras/', 'CompraController@index');
Route::get('compras/new', 'CompraController@create');
Route::post('compras/new', 'CompraController@store');
Route::get('compras/edit/{id}', 'CompraController@edit');
Route::post('compras/edit/{id}', 'CompraController@update');
Route::post('compras/buscar/', 'CompraController@search');
Route::post('compras/filter/', 'CompraController@filter');

/* Ruta Bodegas */

Route::get('bodegas/', 'BodegaController@index');
Route::get('bodegas/edit/{id}', 'BodegaController@edit');
Route::post('bodegas/edit/{id}', 'BodegaController@update');
Route::post('bodegas/filter/', 'BodegaController@filter');


/* Ruta Empaques */

Route::get('empaques/', 'EmpaqueController@index');
Route::get('empaques/edit/{id}', 'EmpaqueController@edit');
Route::post('empaques/edit/{id}', 'EmpaqueController@update');
Route::post('empaques/filter/', 'EmpaqueController@filter');

