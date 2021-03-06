<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'LoginController@logout')->name('logout')->redirectAfterLogout=('/login');

Route::group(['prefix'=>'categorias', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'categorias',           'uses'=>'CategoriasController@index']);
    Route::get('create',        ['as'=>'categorias.create',    'uses'=>'CategoriasController@create']);
    Route::get('{id}/destroy',  ['as'=>'categorias.destroy',   'uses'=>'CategoriasController@destroy']);
    Route::get('{id}/edit',     ['as'=>'categorias.edit',      'uses'=>'CategoriasController@edit']);
    Route::put('{id}/update',   ['as'=>'categorias.update',    'uses'=>'CategoriasController@update']);
    Route::post('store',        ['as'=>'categorias.store',     'uses'=>'CategoriasController@store']);
});

Route::group(['prefix'=>'users', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'users',           'uses'=>'UsersController@index']);
    Route::get('create',        ['as'=>'users.create',    'uses'=>'UsersController@create']);
    Route::get('{id}/deletar',  ['as'=>'users.deletar',   'uses'=>'UsersController@deletar']);
    Route::get('{id}/edit',     ['as'=>'users.edit',      'uses'=>'UsersController@edit']);
    Route::put('{id}/atualizar',['as'=>'users.atualizar', 'uses'=>'UsersController@atualizar']);
    Route::post('salvar',       ['as'=>'users.salvar',    'uses'=>'UsersController@salvar']);
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
    Route::get('',              ['as'=>'caixas',                'uses'=>'CaixasController@index']);
    Route::get('create',        ['as'=>'caixas.create',         'uses'=>'CaixasController@create']);
    Route::get('{id}/destroy',  ['as'=>'caixas.destroy',        'uses'=>'CaixasController@destroy']);
    Route::get('{id}/edit',     ['as'=>'caixas.edit',           'uses'=>'CaixasController@edit']);
    Route::put('{id}/update',   ['as'=>'caixas.update',         'uses'=>'CaixasController@update']);
    Route::post('store',        ['as'=>'caixas.store',          'uses'=>'CaixasController@store']);
    Route::post('pdfview',      array('as'=>'caixas.pdfview',   'uses'=>'CaixasController@pdfview'));
//    Route::get('{id}/pdfview',       array('as'=>'pdfview',     'uses'=>'CaixasController@pdfview'));

});


Route::group(['prefix'=>'pedidos', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'pedidos',           'uses'=>'PedidosController@index']);
    Route::get('create',        ['as'=>'pedidos.create',    'uses'=>'PedidosController@create']);
    Route::get('refresh',       ['as'=>'pedidos.refresh',   'uses'=>'PedidosController@refresh']);
    Route::get('/autocomplete', array('as'=>'autocomplete','uses'=>'PedidosController@autocomplete'));
    Route::get('{id}/destroy',  ['as'=>'pedidos.destroy',   'uses'=>'PedidosController@destroy']);
    Route::get('{id}/edit',     ['as'=>'pedidos.edit',      'uses'=>'PedidosController@edit']);
    Route::put('{id}/update',   ['as'=>'pedidos.update',    'uses'=>'PedidosController@update']);
    Route::post('store',        ['as'=>'pedidos.store',     'uses'=>'PedidosController@store']);
    Route::post('adicionar',    ['as'=>'pedidos.adicionar', 'uses'=>'PedidosController@adicionar']);
    Route::post('concluir',     ['as'=>'pedidos.concluir',  'uses'=>'PedidosController@concluir']);
    Route::delete('remover',    ['as'=>'pedidos.remover',   'uses'=>'PedidosController@remover']);
    Route::delete('cancelar',   ['as'=>'pedidos.cancelar',  'uses'=>'PedidosController@cancelar']);
});

Route::group(['prefix'=>'clientes', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'clientes',           'uses'=>'ClientesController@index']);
    Route::get('create',        ['as'=>'clientes.create',    'uses'=>'ClientesController@create']);
    Route::get('{id}/destroy',  ['as'=>'clientes.destroy',   'uses'=>'ClientesController@destroy']);
    Route::get('{id}/edit',     ['as'=>'clientes.edit',      'uses'=>'ClientesController@edit']);
    Route::put('{id}/update',   ['as'=>'clientes.update',    'uses'=>'ClientesController@update']);
    Route::post('store',        ['as'=>'clientes.store',     'uses'=>'ClientesController@store']);
    Route::post('store2',       ['as'=>'clientes.store2',    'uses'=>'ClientesController@store2']);
});

Route::group(['prefix'=>'compras', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'compras',           'uses'=>'ComprasController@index']);
    Route::get('create',        ['as'=>'compras.create',    'uses'=>'ComprasController@create']);
    Route::get('{id}/destroy',  ['as'=>'compras.destroy',   'uses'=>'ComprasController@destroy']);
    Route::get('{id}/edit',     ['as'=>'compras.edit',      'uses'=>'ComprasController@edit']);
    Route::put('{id}/update',   ['as'=>'compras.update',    'uses'=>'ComprasController@update']);
    Route::post('store',        ['as'=>'compras.store',     'uses'=>'ComprasController@store']);
});

Route::group(['prefix'=>'fornecedors', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'fornecedors',           'uses'=>'FornecedorsController@index']);
    Route::get('create',        ['as'=>'fornecedors.create',    'uses'=>'FornecedorsController@create']);
    Route::get('{id}/destroy',  ['as'=>'fornecedors.destroy',   'uses'=>'FornecedorsController@destroy']);
    Route::get('{id}/edit',     ['as'=>'fornecedors.edit',      'uses'=>'FornecedorsController@edit']);
    Route::put('{id}/update',   ['as'=>'fornecedors.update',    'uses'=>'FornecedorsController@update']);
    Route::post('store',        ['as'=>'fornecedors.store',     'uses'=>'FornecedorsController@store']);
});

Route::group(['prefix'=>'relatorios', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'relatorios',                   'uses'=>'RelatoriosController@index']);
    Route::get('create',        ['as'=>'relatorios.create',            'uses'=>'RelatoriosController@create']);
    Route::post('produtomais',  ['as'=>'relatorios.produtomais',       'uses'=>'RelatoriosController@produtomais']);
    Route::post('prodcat',      ['as'=>'relatorios.prodcat',           'uses'=>'RelatoriosController@prodcat']);
    Route::post('climais',      ['as'=>'relatorios.climais',           'uses'=>'RelatoriosController@climais']);
    Route::post('cx',           ['as'=>'relatorios.cx',                'uses'=>'RelatoriosController@cx']);
    Route::post('pdfview',      array('as'=>'relatorios.pdfview',      'uses'=>'RelatoriosController@pdfview'));
    Route::post('tot_entradas', array('as'=>'relatorios.tot_entradas', 'uses'=>'RelatoriosController@tot_entradas'));
    Route::put('{id}/update',   ['as'=>'relatorios.update',            'uses'=>'RelatoriosController@update']);
    Route::post('store',        ['as'=>'relatorios.store',             'uses'=>'RelatoriosController@store']);
    Route::get('{id}/image',    ['as'=>'relatorios.image',             'uses'=>'RelatoriosController@image']);
});

Route::group(['prefix'=>'dashboard', 'where'=>['id'=>'[0-9]+']], function () {
    Route::get('',              ['as'=>'dashboard',                   'uses'=>'DashboardController@index']);
});

Auth::routes();

