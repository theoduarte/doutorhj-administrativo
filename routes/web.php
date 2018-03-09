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
    return view('welcome');
});

Route::group(['prefix' => 'paciente'], function()
{
    Route::get('cadastra-paciente', 'PacienteController@index');
    Route::get('autocomplete-cargos', 'PacienteController@autocompleteCargos');
    Route::get('consulta-cep/cep/{cep}', 'PacienteController@consultaCep')->name('cep');
    Route::post('gravar', 'PacienteController@gravar');
});

Route::group(['prefix' => 'profissional'], function()
{
    Route::get('cadastra-profissional', 'ProfissionalController@index');
    Route::get('autocomplete-cargos', 'ProfissionalController@autocompleteCargos');
    Route::get('consulta-cep/cep/{cep}', 'ProfissionalController@consultaCep')->name('cep');
    Route::post('gravar', 'ProfissionalController@gravar');
});

Route::group(['prefix' => 'clinica'], function()
{
    Route::get('cadastra-clinica', 'ClinicaController@index');
    Route::get('autocomplete-cargos', 'ClinicaController@autocompleteCargos');
    Route::get('consulta-cep/cep/{cep}', 'ClinicaController@consultaCep')->name('cep');
    Route::post('gravar', 'ClinicaController@gravar');
});
    

Route::resource('prestadores','PrestadoresController')->middleware('auth');
Route::resource('cargos','CargoController')->middleware('auth');
Route::resource('menus','MenuController')->middleware('auth');
Route::resource('usuarios', 'UsuariosController')->middleware('auth');
Route::resource('itemmenus','ItemmenuController')->middleware('auth');
Route::resource('perfilusers','PerfiluserController')->middleware('auth');
Route::resource('permissaos','PermissaoController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
