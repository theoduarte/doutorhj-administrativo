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
Route::resource('grupo_procedimentos','GrupoProcedimentoController')->middleware('auth');
Route::resource('procedimentos','ProcedimentoController')->middleware('auth');
Route::resource('tipo_atendimentos','TipoatendimentoController')->middleware('auth');
Route::resource('consultas','ConsultaController')->middleware('auth');
Route::resource('menus','MenuController')->middleware('auth');
Route::resource('itemmenus','ItemmenuController')->middleware('auth');
Route::resource('perfilusers','PerfiluserController')->middleware('auth');
Route::resource('permissaos','PermissaoController')->middleware('auth');
Route::resource('users','UserController')->middleware('auth');
Route::resource('agenda','AgendamentoController')->only(['index'])->middleware('auth');
Route::resource('registro_logs','RegistroLogController')->middleware('auth');
Route::resource('cupom_descontos','CupomDescontoController')->middleware('auth');
Route::resource('checkups','CheckupsController')->middleware('auth');
Route::resource('termos-condicoes','TermosCondicoesController')->middleware('auth');

Route::get('checkups-configure/{checkup}','CheckupsController@configure')->name('checkups.configure')->middleware('auth');
Route::get('get-active-clinicas-by-especialidade','CheckupsController@getClinicasByEspecidalide')->name('get-active-clinicas-by-especialidade')->middleware('auth');
Route::get('get-active-consultas-by-especialidade','CheckupsController@getConsultasByEspecidalide')->name('get-active-consultas-by-especialidade')->middleware('auth');
Route::get('get-active-profissionals-by-clinica','CheckupsController@getProfissionalsByClinica')->name('get-active-profissionals-by-clinica')->middleware('auth');
Route::get('get-atendimento-values-by-consulta','CheckupsController@getAtendimentoValuesByConsulta')->name('get-atendimento-values-by-consulta')->middleware('auth');

Route::post('item-checkups-consulta.store/{checkup}','ItemCheckupsController@store')->name('item-checkups-consulta.store')->middleware('auth');
Route::delete('item-checkups-consulta.destroy/{checkupId}/checkupId/{consultaId}/consultaId/{clinicas}/clinicas/{profissionals}/profissionals','ItemCheckupsController@destroy')->name('item-checkups-consulta.destroy')->middleware('auth');

Route::post('item-checkups-exame.store/{checkup}','ItemCheckupsController@storeExame')->name('item-checkups-exame.store')->middleware('auth');
Route::delete('item-checkups-exame.destroy/{checkupId}/checkupId/{procedimentoId}/procedimentoId/{clinicas}/clinicas','ItemCheckupsController@destroyExame')->name('item-checkups-exame.destroy')->middleware('auth');

Route::get('get-active-procedimentos-by-grupo-procedimento','CheckupsController@getProcedimentosByGrupoProcedimento')->name('get-active-procedimentos-by-grupo-procedimento')->middleware('auth');
Route::get('get-active-clinicas-by-procedimento','CheckupsController@getClinicasByProcedimento')->name('get-active-clinicas-by-procedimento')->middleware('auth');
Route::get('get-atendimento-values-by-procedimento','CheckupsController@getAtendimentoValuesByProcedimento')->name('get-atendimento-values-by-procedimento')->middleware('auth');

Route::get('consulta-cep/cep/{cep}', 'Controller@consultaCep')->name('cep');
Route::get('consulta-cidade', 'ClinicaController@consultaCidade')->name('consulta-cidade');
Route::get('consultas/consulta/{consulta}', 'ClinicaController@getConsultas')->middleware('auth');
Route::get('procedimentos/consulta/{consulta}', 'ClinicaController@getProcedimentos')->middleware('auth');
Route::post('clinicas/{clinica}/edit/list-profissional', 'ClinicaController@getProfissionals')->middleware('auth');
Route::get('consultas/localatendimento/{consulta}', 'AgendamentoController@getLocalAtendimento')->middleware('auth');
Route::get('agenda/profissional/{profissional}', 'AgendamentoController@getProfissional')->middleware('auth');
Route::post('add-profissional', 'ClinicaController@addProfissionalStore')->middleware('auth');
Route::post('view-profissional', 'ClinicaController@viewProfissionalShow')->middleware('auth');
Route::post('delete-profissional', 'ClinicaController@deleteProfissionalDestroy')->middleware('auth');

Route::post('add-filial', 'FilialController@addFilialStore')->middleware('auth');
Route::post('delete-filial', 'FilialController@deleteFilialDestroy')->middleware('auth');

Route::post('add-tag-popular', 'TagPopularController@addTagPopularStore')->middleware('auth');
Route::get('load-tag-popular', 'TagPopularController@loadTagPopularList')->middleware('auth');
Route::post('delete-tag-popular', 'TagPopularController@deleteTagPopularDestroy')->middleware('auth');

Route::post('clinicas/{clinica}/edit/add-precificacao-procedimento', 'ClinicaController@addProcedimentoPrecoStore')->middleware('auth');
Route::post('load-data-atendimento', 'AtendimentoController@loadAtendimentoShow')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-procedimento', 'ClinicaController@deleteProcedimentoDestroy')->middleware('auth');

Route::post('clinicas/{clinica}/edit/add-precificacao-consulta', 'ClinicaController@addConsultaPrecoStore')->middleware('auth');
Route::post('clinicas/{clinica}/edit/delete-consulta', 'ClinicaController@deleteConsultaDestroy')->middleware('auth');

Route::post('clinicas/{clinica}/edit/edit-precificacao-atendimento', 'ClinicaController@editAtendimentoPrecoUpdate')->middleware('auth');
Route::get('profissionais/{idClinica}', 'ProfissionalController@getProfissionaisPorClinica')->middleware('auth');

Route::get('agenda/agendar/{a}/{b}/{c}/{d}/{e?}/{f?}/{g?}/{h?}/{i?}', 'AgendamentoController@addAgendamento')->middleware('auth');
Route::get('agenda/cancelar/{ticket}/{dtAtendimento}/{obs?}', 'AgendamentoController@addCancelamento')->middleware('auth');
Route::get('horarios/{clinica_id}/{profissional_id}/{data}', 'AgendamentoController@getHorariosLivres')->middleware('auth');
Route::get('agenda/confirmar/{ticket}/{cdStatus}', 'AgendamentoController@setStatus')->middleware('auth');
Route::get('agenda/set-status-by-id/{id}/{cdStatus}', 'AgendamentoController@setStatusById')->middleware('auth');

Route::get('notificacoes','MensagemController@getListaNotificacoes')->middleware('auth');
Route::get('notificacoes/visualizado/{id}','MensagemController@setStatusVisualizado')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
