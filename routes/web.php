<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::resource('prestadores','PrestadoresController')->middleware('auth');
Route::resource('cargos','CargoController')->middleware('auth');
Route::resource('menus','MenuController')->middleware('auth');
Route::resource('usuarios', 'UsuariosController')->middleware('auth');
Route::resource('itemmenus','ItemmenuController')->middleware('auth');
Route::resource('perfilusers','PerfiluserController')->middleware('auth');
Route::resource('permissaos','PermissaoController')->middleware('auth');
Route::get('consulta-cep/cep/{cep}', 'Controller@consultaCep')->name('cep');
Route::get('procedimentos/consulta/{consulta}', 'PrestadoresController@getProcedimentos')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
