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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', function () {
    return view('dashboard');
})->name('home');
Auth::routes();

//Rotas do cadastro de fornecedores
Route::get('/fornecedores', 'FornecedoresController@index')->name('fornecedores');
Route::post('/fornecedores/inserir', 'FornecedoresController@store')->name('CadastroFornecedor');
Route::get('/fornecedores/{id}', 'FornecedoresController@index')->name('MostrarFornecedor');
Route::get('/fornecedores/{id}/editar', 'FornecedoresController@edit')->name('EditarFornecedor');
Route::post('/fornecedores/{id}', 'FornecedoresController@update')->name('AtualizarFornecedor');
Route::delete('/fornecedores/{id}/apagar', 'FornecedoresController@destroy')->name('ApagarFornecedor');

//Rotas do cadastro de produtos
Route::get('/produtos', 'ProdutosController@index')->name('produtos');
Route::post('/produtos/inserir', 'ProdutosController@store')->name('CadastroProduto');
Route::get('/produtos/{id}', 'ProdutosController@index')->name('MostrarProduto');
Route::get('/produtos/{id}/editar', 'ProdutosController@edit')->name('EditarProduto');
Route::post('/produtos/{id}', 'ProdutosController@update')->name('AtualizarProduto');
Route::delete('/produtos/{id}/apagar', 'ProdutosController@destroy')->name('ApagarProduto');

//Rotas do cadastro de usuarios
Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
Route::post('/usuarios/inserir', 'UsuariosController@store')->name('CadastroUsuario');
Route::get('/usuarios/{id}', 'UsuariosController@index')->name('MostrarUsuario');
Route::get('/usuarios/{id}/editar', 'UsuariosController@edit')->name('EditarUsuario');
Route::post('/usuarios/{id}', 'UsuariosController@update')->name('AtualizarUsuario');
Route::delete('/usuarios/{id}/apagar', 'UsuariosController@destroy')->name('ApagarUsuario');

//Rotas do cadastro de clientes
Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::post('/clientes/inserir', 'ClientesController@store')->name('CadastroCliente');
Route::get('/clientes/{id}', 'ClientesController@index')->name('MostrarCliente');
Route::get('/clientes/{id}/editar', 'ClientesController@edit')->name('EditarCliente');
Route::post('/clientes/{id}', 'ClientesController@update')->name('AtualizarCliente');
Route::delete('/clientes/{id}/apagar', 'ClientesController@destroy')->name('ApagarCliente');

//Rotas de vendas
Route::get('/vendas', 'VendasController@index')->name('vendas');
Route::get('/vendas/lista', 'VendasController@lista')->name('ListaVenda');
Route::get('/vendas/nota', 'VendasController@nota')->name('NotaVenda');
Route::post('/vendas/inserir', 'VendasController@store')->name('pedidoVenda');
Route::get('/vendas/{id}', 'VendasController@index')->name('MostrarVenda');
Route::get('/vendas/{id}/editar', 'VendasController@edit')->name('EditarVenda');
Route::post('/vendas/{id}', 'VendasController@update')->name('AtualizarVenda');
Route::delete('/vendas/{id}/apagar', 'VendasController@destroy')->name('ApagarVenda');



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


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




