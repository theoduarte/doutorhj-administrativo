<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    //return view('welcome');
    return redirect('/login');
});

Route::resource('clinicas','ClinicaController')->middleware('auth');
Route::resource('profissionals','ProfissionalsController')->middleware('auth');
Route::resource('clientes', 'ClientesController')->middleware('auth');
Route::resource('cargos','CargoController')->middleware('auth');
Route::resource('menus','MenuController')->middleware('auth');
Route::resource('itemmenus','ItemmenuController')->middleware('auth');
Route::resource('perfilusers','PerfiluserController')->middleware('auth');
Route::resource('permissaos','PermissaoController')->middleware('auth');
Route::resource('agenda','AgendaController')->middleware('auth');

# rotas autocomplete
Route::get('consulta-cep/cep/{cep}', 'Controller@consultaCep')->name('cep');

Route::get('consultas/consulta/{consulta}', 'ClinicaController@getConsultas')->middleware('auth');
Route::get('procedimentos/consulta/{consulta}', 'ClinicaController@getProcedimentos')->middleware('auth');
Route::get('consultas/localatendimento/{consulta}', 'AgendaController@getLocalAtendimento')->middleware('auth');
Route::get('agenda/profissional/{profissional}', 'AgendaController@getProfissional')->middleware('auth');
Route::post('clinicas/{clinica}/edit/add-profissional', 'ClinicaController@addProfissionalStore')->middleware('auth');
Route::post('clinicas/{clinica}/edit/view-profissional', 'ClinicaController@viewProfissionalShow')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-profissional', 'ClinicaController@deleteProfissionalDestroy')->middleware('auth');
Route::post('clinicas/{clinica}/edit/add-precificacao-procedimento', 'ClinicaController@addProcedimentoPrecoStore')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-procedimento', 'ClinicaController@deleteProcedimentoDestroy')->middleware('auth');
Route::post('clinicas/{clinica}/edit/add-precificacao-consulta', 'ClinicaController@addConsultaPrecoStore')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-consulta', 'ClinicaController@deleteConsultaDestroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
