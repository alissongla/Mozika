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

Route::get('/fornecedores', function(){
	return view('cadastros/fornecedores');
})->name('fornecedores');
Route::post('/fornecedores/inserir', 'FornecedoresController@store')->name('CadastroFornecedor');

Route::get('/produtos', function(){
	return view('cadastros/produtos');
})->name('produtos');


Route::get('/usuarios', function(){
	return view('cadastros/usuarios');
})->name('usuarios');
Route::post('/usuarios/inserir', 'UsuariosController@store')->name('CadastroUsuario');

Route::get('/clientes', function(){
	return view('cadastros/clientes');
})->name('clientes');
Route::post('/clientes/inserir', 'ClientesController@store')->name('CadastroCliente');



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




