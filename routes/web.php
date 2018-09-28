<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('clinicas','ClinicaController');
    Route::resource('profissionals','ProfissionalController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('cargos','CargoController');
    Route::resource('grupo_procedimentos','GrupoProcedimentoController');
    Route::resource('procedimentos','ProcedimentoController');
    Route::resource('tipo_atendimentos','TipoatendimentoController');
    Route::resource('consultas','ConsultaController');
    Route::resource('menus','MenuController');
    Route::resource('itemmenus','ItemmenuController');
    Route::resource('perfilusers','PerfiluserController');
    Route::resource('permissaos','PermissaoController');
    Route::resource('users','UserController');
    Route::resource('agenda','AgendamentoController')->only(['index']);
    Route::resource('registro_logs','RegistroLogController');
    Route::resource('cupom_descontos','CupomDescontoController');
    Route::resource('checkups','CheckupsController');
    Route::resource('termos-condicoes','TermosCondicoesController');
    Route::resource('servico_adicionals', 'ServicoAdicionalController');
	Route::resource('precos', 'PrecoController');
    Route::resource('entidades', 'EntidadeController');
	Route::resource('planos', 'PlanoController');
	Route::resource('empresas', 'EmpresaController');
	Route::resource('representantes', 'RepresentanteController');

	Route::get('documentos/getUserByCpf/{cpf}', 'DocumentoController@getUserByCpf')->name('documentos.get-user-by-cpf');

	Route::get('representantes/{id}/showModal', 'RepresentanteController@showModal')->name('representantes.showModal');
	Route::get('representantes/createModal/{idEmpresa}', 'RepresentanteController@createModal')->name('representantes.createModal');
	Route::get('representantes/{id}/editModal', 'RepresentanteController@editModal')->name('representantes.editModal');

    Route::get('checkups-configure/{checkup}','CheckupsController@configure')->name('checkups.configure');
    Route::get('get-active-clinicas-by-especialidade','CheckupsController@getClinicasByEspecidalide')->name('get-active-clinicas-by-especialidade');
    Route::get('get-active-consultas-by-especialidade','CheckupsController@getConsultasByEspecidalide')->name('get-active-consultas-by-especialidade');
    Route::get('get-active-profissionals-by-clinica','CheckupsController@getProfissionalsByClinica')->name('get-active-profissionals-by-clinica');
    Route::get('get-atendimento-values-by-consulta','CheckupsController@getAtendimentoValuesByConsulta')->name('get-atendimento-values-by-consulta');

    Route::post('item-checkups-consulta.store/{checkup}','ItemCheckupsController@store')->name('item-checkups-consulta.store');
    Route::delete('item-checkups-consulta.destroy/{checkupId}/checkupId/{consultaId}/consultaId/{clinicas}/clinicas/{profissionals}/profissionals','ItemCheckupsController@destroy')->name('item-checkups-consulta.destroy');

    Route::post('item-checkups-exame.store/{checkup}','ItemCheckupsController@storeExame')->name('item-checkups-exame.store');
    Route::delete('item-checkups-exame.destroy/{checkupId}/checkupId/{procedimentoId}/procedimentoId/{clinicas}/clinicas','ItemCheckupsController@destroyExame')->name('item-checkups-exame.destroy');

    Route::get('get-active-procedimentos-by-grupo-procedimento','CheckupsController@getProcedimentosByGrupoProcedimento')->name('get-active-procedimentos-by-grupo-procedimento');
    Route::get('get-active-clinicas-by-procedimento','CheckupsController@getClinicasByProcedimento')->name('get-active-clinicas-by-procedimento');
    Route::get('get-active-clinicas-by-consulta','CheckupsController@getClinicasByConsulta')->name('get-active-clinicas-by-consulta');
    Route::get('get-atendimento-values-by-procedimento','CheckupsController@getAtendimentoValuesByProcedimento')->name('get-atendimento-values-by-procedimento');

    Route::get('consultas/consulta/{consulta}', 'ClinicaController@getConsultas');
    Route::get('procedimentos/consulta/{consulta}', 'ClinicaController@getProcedimentos');
    Route::post('clinicas/{clinica}/edit/list-profissional', 'ClinicaController@getProfissionals');
    Route::get('consultas/localatendimento/{consulta}', 'AgendamentoController@getLocalAtendimento');
    Route::get('agenda/profissional/{profissional}', 'AgendamentoController@getProfissional');
    Route::post('add-profissional', 'ClinicaController@addProfissionalStore');
    Route::post('view-profissional', 'ClinicaController@viewProfissionalShow');
    Route::post('delete-profissional', 'ClinicaController@deleteProfissionalDestroy');

    Route::post('add-filial', 'FilialController@addFilialStore');
    Route::post('delete-filial', 'FilialController@deleteFilialDestroy');

    Route::post('add-tag-popular', 'TagPopularController@addTagPopularStore');
    Route::get('load-tag-popular', 'TagPopularController@loadTagPopularList');
    Route::post('delete-tag-popular', 'TagPopularController@deleteTagPopularDestroy');

    Route::post('load-data-atendimento', 'AtendimentoController@loadAtendimentoShow');
	Route::get('load-data-preco/{id}', 'PrecoController@loadPrecoShow');

    Route::post('add-precificacao-consulta/{clinica}/clinica', 'ClinicaController@precificacaoConsultaStore')->name('add-precificacao-consulta');
    Route::put('edit-precificacao-consulta/{clinica}/clinica', 'ClinicaController@precificacaoConsultaUpdate')->name('edit-precificacao-consulta');
    Route::delete('delete-precificacao-consulta', 'ClinicaController@precificacaoConsultaDestroy')->name('delete-precificacao-consulta');

    Route::post('add-precificacao-procedimento/{clinica}/clinica', 'ClinicaController@precificacaoProcedimentoStore')->name('add-precificacao-procedimento');
    Route::put('edit-precificacao-procedimento/{clinica}/clinica', 'ClinicaController@precificacaoProcedimentoUpdate')->name('edit-precificacao-procedimento');
    Route::delete('delete-precificacao-procedimento', 'ClinicaController@precificacaoProcedimentoDestroy')->name('delete-precificacao-procedimento');

    Route::get('profissionais/{idClinica}', 'ProfissionalController@getProfissionaisPorClinica');

    Route::get('agenda/agendar/{a}/{b}/{c}/{d}/{e?}/{f?}/{g?}/{h?}/{i?}', 'AgendamentoController@addAgendamento');
    Route::post('add-agendamento', 'AgendamentoController@addAgendamento');
    Route::get('agenda/cancelar/{ticket}/{dtAtendimento}/{obs?}', 'AgendamentoController@addCancelamento');
    Route::get('horarios', 'AgendamentoController@getHorariosLivres');
    Route::get('agenda/confirmar/{ticket}/{cdStatus}', 'AgendamentoController@setStatus');
    Route::get('agenda/set-status-by-id/{id}/{cdStatus}', 'AgendamentoController@setStatusById');

    Route::get('notificacoes','MensagemController@getListaNotificacoes');
    Route::get('notificacoes/visualizado/{id}','MensagemController@setStatusVisualizado');

    Route::post('consulta-especialidades', 'AgendamentoController@consultaEspecialidades');
    Route::get('get-active-profissionals-by-clinica-consulta','AgendamentoController@getProfissionalsByClinicaConsulta')->name('get-active-profissionals-by-clinica-consulta');

    Route::get('get-active-filials-by-clinica-profissional-consulta','AgendamentoController@getFilialsByClinicaProfissionalConsulta')->name('get-active-filials-by-clinica-profissional-consulta');
    Route::get('get-active-filials-by-clinica-procedimento','AgendamentoController@getFilialsByClinicaProcedimento')->name('get-active-filials-by-clinica-procedimento');
    Route::post('create-new-agendamento-atendimento','AgendamentoController@createNewAgendamentoAtendimento')->name('create-new-agendamento-atendimento');
});

Route::get('consulta-cep/cep/{cep}', 'Controller@consultaCep')->name('cep');
Route::get('consulta-cidade', 'ClinicaController@consultaCidade')->name('consulta-cidade');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
