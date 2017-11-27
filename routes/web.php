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

Route::get('/welcome', 'WelcomeController@index')->name('welcome');

Route::group(['prefix'=>'categorias', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'categorias',           'uses'=>'CategoriasController@index']);
    Route::get('create',        ['as'=>'categorias.create',    'uses'=>'CategoriasController@create']);
    Route::get('{id}/destroy',  ['as'=>'categorias.destroy',   'uses'=>'CategoriasController@destroy']);
    Route::get('{id}/edit',     ['as'=>'categorias.edit',      'uses'=>'CategoriasController@edit']);
    Route::put('{id}/update',   ['as'=>'categorias.update',    'uses'=>'CategoriasController@update']);
    Route::post('store',        ['as'=>'categorias.store',     'uses'=>'CategoriasController@store']);
});

Route::group(['prefix'=>'produtos', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'produtos',           'uses'=>'ProdutosController@index']);
    Route::get('create',        ['as'=>'produtos.create',    'uses'=>'ProdutosController@create']);
    Route::get('{id}/destroy',  ['as'=>'produtos.destroy',   'uses'=>'ProdutosController@destroy']);
    Route::get('{id}/edit',     ['as'=>'produtos.edit',      'uses'=>'ProdutosController@edit']);
    Route::put('{id}/update',   ['as'=>'produtos.update',    'uses'=>'ProdutosController@update']);
    Route::post('store',        ['as'=>'produtos.store',     'uses'=>'ProdutosController@store']);
    Route::get('{id}/image',    ['as'=>'produtos.image',     'uses'=>'ProdutosController@image']);
});

Route::group(['prefix'=>'caixas', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'caixas',           'uses'=>'CaixasController@index']);
    Route::get('create',        ['as'=>'caixas.create',    'uses'=>'CaixasController@create']);
    Route::get('{id}/destroy',  ['as'=>'caixas.destroy',   'uses'=>'CaixasController@destroy']);
    Route::get('{id}/edit',     ['as'=>'caixas.edit',      'uses'=>'CaixasController@edit']);
    Route::put('{id}/update',   ['as'=>'caixas.update',    'uses'=>'CaixasController@update']);
    Route::post('store',        ['as'=>'caixas.store',     'uses'=>'CaixasController@store']);
});

Route::group(['prefix'=>'pedidos', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'pedidos',           'uses'=>'PedidosController@index']);
    Route::get('create',        ['as'=>'pedidos.create',    'uses'=>'PedidosController@create']);
    Route::get('{id}/destroy',  ['as'=>'pedidos.destroy',   'uses'=>'PedidosController@destroy']);
    Route::get('{id}/edit',     ['as'=>'pedidos.edit',      'uses'=>'PedidosController@edit']);
    Route::put('{id}/update',   ['as'=>'pedidos.update',    'uses'=>'PedidosController@update']);
    Route::post('store',        ['as'=>'pedidos.store',     'uses'=>'PedidosController@store']);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
