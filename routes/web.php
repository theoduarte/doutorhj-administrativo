<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::resource('clinicas','ClinicaController')->middleware('auth');
Route::resource('profissionals','ProfissionalController')->middleware('auth');
Route::resource('clientes', 'ClienteController')->middleware('auth');
Route::resource('cargos','CargoController')->middleware('auth');
Route::resource('procedimentos','ProcedimentoController')->middleware('auth');
Route::resource('consultas','ConsultaController')->middleware('auth');
Route::resource('menus','MenuController')->middleware('auth');
Route::resource('itemmenus','ItemmenuController')->middleware('auth');
Route::resource('perfilusers','PerfiluserController')->middleware('auth');
Route::resource('permissaos','PermissaoController')->middleware('auth');
Route::resource('agenda','AgendamentoController')->only(['index'])->middleware('auth');
Route::resource('registro_logs','RegistroLogController')->middleware('auth');
Route::resource('cupom_descontos','CupomDescontoController')->middleware('auth');

Route::get('consulta-cep/cep/{cep}', 'Controller@consultaCep')->name('cep');
Route::get('consultas/consulta/{consulta}', 'ClinicaController@getConsultas')->middleware('auth');
Route::get('procedimentos/consulta/{consulta}', 'ClinicaController@getProcedimentos')->middleware('auth');
Route::post('clinicas/{clinica}/edit/list-profissional', 'ClinicaController@getProfissionals')->middleware('auth');
Route::get('consultas/localatendimento/{consulta}', 'AgendamentoController@getLocalAtendimento')->middleware('auth');
Route::get('agenda/profissional/{profissional}', 'AgendamentoController@getProfissional')->middleware('auth');
Route::post('add-profissional', 'ClinicaController@addProfissionalStore')->middleware('auth');
Route::post('view-profissional', 'ClinicaController@viewProfissionalShow')->middleware('auth');
Route::post('delete-profissional', 'ClinicaController@deleteProfissionalDestroy')->middleware('auth');
Route::post('clinicas/{clinica}/edit/add-precificacao-procedimento', 'ClinicaController@addProcedimentoPrecoStore')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-procedimento', 'ClinicaController@deleteProcedimentoDestroy')->middleware('auth');
Route::post('clinicas/{clinica}/edit/add-precificacao-consulta', 'ClinicaController@addConsultaPrecoStore')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-consulta', 'ClinicaController@deleteConsultaDestroy')->middleware('auth');
Route::post('clinicas/{clinica}/edit/edit-precificacao-atendimento', 'ClinicaController@editAtendimentoPrecoUpdate')->middleware('auth');
Route::get('profissionais/{idClinica}', 'ProfissionalController@getProfissionaisPorClinica')->middleware('auth');
Route::get('agenda/agendar/{a}/{b}/{c}/{d}/{e}/{f}/{g}/{h}/{i?}', 'AgendamentoController@addAgendamento')->middleware('auth');
Route::get('agenda/cancelar/{ticket}/{obs?}', 'AgendamentoController@addCancelamento')->middleware('auth');
Route::get('horarios/{data}', 'AgendamentoController@getHorariosLivres')->middleware('auth');
Route::get('agenda/confirmar/{ticket}/{cdStatus}', 'AgendamentoController@setStatus')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
