@extends('layouts.master')
@section('title', 'Doutor HJ: Agenda')
@section('container')
	<style>
		.ui-autocomplete {
			max-height  : 200px;
			overflow-y  : auto;
			overflow-x  : hidden;
		}
		* html .ui-autocomplete {
			height      : 200px;AGENDA
		}
		.ui-dialog .ui-state-error {
			padding     : .3em;
		}
		.ui-widget-header {
			border      : 1px solid #dddddd;
			background  : #00b0f4 !important;
			color       : #ffffff;
			font-weight : bold;
		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title">Doutor HJ</h4>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="/agenda">Cadastros</a></li>
						<li class="breadcrumb-item active">Agenda</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="m-t-0 header-title">Agenda</h4>
					<p class="text-muted m-b-30 font-13"></p>
					<div class="row">
						<div class="col-12">
							<form class="form-edit-add" role="form" action="{{ route('agenda.index') }}" method="get">
								
								<div class="row">
									<div class="col-4">
										<label for="localAtendimento">Clínica:<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="@if(isset($_GET['localAtendimento'])) {{ $_GET['localAtendimento'] }} @endif">
										<input type="hidden" id="clinica_id" name="clinica_id" value="@if(isset($_GET['clinica_id'])) {{ $_GET['clinica_id'] }} @endif">
									</div>
									<div class="form-group">
										<div style="height: 20px;"></div>
										<label class="custom-checkbox" style="cursor: pointer;width:210px;">
											<input type="checkbox"  id="ckPreAgendada" name="ckPreAgendada"
												   value="10" @if(isset($_GET['ckPreAgendada']) && $_GET['ckPreAgendada'] =='10') checked @endif> Consultas Pré-Agendadas
										</label>
										<br>
										<label class="custom-checkbox" style="cursor: pointer;">
											<input type="checkbox" id="ckConsultasAgendadas" name="ckConsultasAgendadas"
												   value="70" @if(isset($_GET['ckConsultasAgendadas']) && $_GET['ckConsultasAgendadas'] =='70') checked @endif> Consultas Agendadas
										</label>
									</div>
									<div class="form-group">
										<div style="height: 20px;"></div>
										<label class="custom-checkbox" style="cursor: pointer;width:220px;">
											<input type="checkbox"  id="ckConsultasConfirmadas" name="ckConsultasConfirmadas"
												   value="20" @if(isset($_GET['ckConsultasConfirmadas']) && $_GET['ckConsultasConfirmadas'] =='20') checked @endif> Consultas Confirmadas
										</label>
										<br>
										<label class="custom-checkbox" style="cursor: pointer;">
											<input type="checkbox"  id="ckConsultasNaoConfirmadas" name="ckConsultasNaoConfirmadas"
												   value="30" @if(isset($_GET['ckConsultasNaoConfirmadas']) && $_GET['ckConsultasNaoConfirmadas'] =='30') checked @endif> Consultas Não Confirmadas
										</label>
									</div>
									<div class="form-group">
										<div style="height: 20px;"></div>
										<label class="custom-checkbox" style="cursor: pointer;">
											<input type="checkbox"  id="ckConsultasCanceladas" name="ckConsultasCanceladas"
												   value="60" @if(isset($_GET['ckConsultasCanceladas']) && $_GET['ckConsultasCanceladas'] =='60') checked @endif> Consultas Canceladas
										</label>
										<br>
										<label class="custom-checkbox" style="cursor: pointer;">
											<input type="checkbox"  id="ckAusencias" name="ckAusencias"
												   value="50" @if(isset($_GET['ckAusencias']) && $_GET['ckAusencias'] =='50') checked @endif > Não Compareceu
										</label>
									</div>
									<div class="form-group">
										<div style="height: 20px;"></div>
										<label class="custom-checkbox" style="cursor: pointer;">
											<input type="checkbox"  id="ckRetornoConsultas" name="ckRetornoConsultas"
												   value="80" @if(isset($_GET['ckRetornoConsultas']) && $_GET['ckRetornoConsultas'] =='80') checked @endif> Consultas de Retorno
										</label>
										<br>
										<label class="custom-checkbox" style="cursor: pointer;">
											<input type="checkbox" id="ckConsultasFinalizadas" name="ckConsultasFinalizadas"
												   value="80" @if(isset($_GET['ckConsultasFinalizadas']) && $_GET['ckConsultasFinalizadas'] =='80') checked @endif> Consultas Finalizadas
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-3">
										<label for="localAtendimento">Paciente:</label>
										<input type="text" class="form-control" name="nm_paciente" id="nm_paciente" value="@if(isset($_GET['nm_paciente'])) {{ $_GET['nm_paciente'] }} @endif">
									</div>
									<div class="col-3">
										<label for="data">Data:<span class="text-danger">*</span></label>
										<input type="text" class="form-control input-daterange-timepicker" id="data" name="data" value="@if(isset($_GET['data'])) {{ $_GET['data'] }} @endif">
									</div>
									<div class="col-1 col-lg-3">
										<div style="height: 30px;"></div>
										<button type="submit" class="btn btn-primary" id="submit" style="margin-right: 10px;"><i class="fa fa-search"></i> Pesquisar</button>
										<a href="{{ route('agenda.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca" style="margin-bottom: 0px; "><i class="ion-close"></i> Limpar Busca</a>
									</div>
									
								</div>
							</form>
						</div>
						<div style="height: 180px !important;"></div>
					</div>
					<div class="row">
						<div class="col-12">
							<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
								<tr>
									<th>Ticket</th>
									<th>Prestador</th>
									<th>Profissional</th>
									<th>Paciente</th>
									<th>Data / Hora</th>
									<th>Situação</th>
									<th>Ações</th>
								</tr>
								@foreach($agenda as $obAgenda)
									<tr>
										<td>{{$obAgenda->te_ticket}}</td>
										<td>{{$obAgenda->clinica->nm_razao_social}}</td>
										<td>{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}</td>
										<td>{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}</td>
										<td>{{$obAgenda->dt_atendimento}}</td>
										<td>{{$obAgenda->cs_status}}</td>
										<td style="width:100px;">
											
											<!-- botao agendar/remarcar -->
											@if( $obAgenda->cs_status == 'Pré-Agendado'
                                                or $obAgenda->cs_status == 'Agendado'
                                                and $obAgenda->cs_status!='Cancelado'
                                                and $obAgenda->cs_status!='Finalizado'
                                                and $obAgenda->cs_status!='Confirmado'
                                                and $obAgenda->bo_remarcacao=='N')
											
												<a especialidade  = "@foreach( $obAgenda->profissional->especialidades as $especialidade )
												{{$especialidade->ds_especialidade}}
												@endforeach
														"
												   nm-paciente    = "{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}"
												   data-hora	  = "{{$obAgenda->dt_atendimento}}"
												   prestador	  = "{{$obAgenda->clinica->nm_razao_social}}"
												   nm-profissional= "{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}"
												   valor-consulta = "{{$obAgenda->valor}}"
												   id-profissional = "{{$obAgenda->profissional->id}}"
												   id-clinica     = "{{$obAgenda->clinica->id}}"
												   id-paciente    = "{{$obAgenda->paciente->id}}"
												   ticket         = "{{$obAgenda->te_ticket}}"
												   class		  = "btn btn-icon waves-effect btn-agenda-remarcar btn-sm m-b-5 agendamento"
												   id			  = "agendamento"
												   @if( $obAgenda->cs_status == 'Pré-Agendado' )
												   		title = "Agendar Consulta"
												   @elseif( $obAgenda->cs_status == 'Agendado' )
												   		title = "Remarcar Consulta"
												   @endif
												><i class="mdi mdi-calendar-plus"></i></a>
											@endif
										    
										    <!-- botao confirmar -->
											@if( $obAgenda->cs_status!='Cancelado' and $obAgenda->cs_status=='Agendado')
												<a especialidade  = "@foreach( $obAgenda->profissional->especialidades as $especialidade )
												{{$especialidade->ds_especialidade}}
												@endforeach
														"
												   nm-paciente     = "{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}"
												   data-hora	   = "{{$obAgenda->dt_atendimento}}"
												   prestador	   = "{{$obAgenda->clinica->nm_razao_social}}"
												   nm-profissional = "{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}"
												   valor-consulta  = "{{$obAgenda->valor}}"
												   id-profissional = "{{$obAgenda->profissional->id}}"
												   id-clinica      = "{{$obAgenda->clinica->id}}"
												   id-paciente     = "{{$obAgenda->paciente->id}}"
												   ticket          = "{{$obAgenda->te_ticket}}"
												   class		   = "btn btn-icon waves-effect btn-agenda-confirmar btn-sm m-b-5 confirmacao"
												   title 		   = "Confirmar Consulta" id="confirmacao">
												   <i class="mdi mdi-check"></i>
												</a>
											@endif
											
										    <!-- botao cancelar -->
											@if( $obAgenda->cs_status!='Cancelado' and
                                            $obAgenda->cs_status!='Finalizado' and
                                            $obAgenda->cs_status!='Retorno')
												<a especialidade  = "@foreach( $obAgenda->profissional->especialidades as $especialidade )
												{{$especialidade->ds_especialidade}}
												@endforeach
														"
												   nm-paciente     = "{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}"
												   data-hora	   = "{{$obAgenda->dt_atendimento}}"
												   prestador	   = "{{$obAgenda->clinica->nm_razao_social}}"
												   nm-profissional = "{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}"
												   valor-consulta  = "{{$obAgenda->valor}}"
												   id-profissional = "{{$obAgenda->profissional->id}}"
												   id-clinica      = "{{$obAgenda->clinica->id}}"
												   id-paciente     = "{{$obAgenda->paciente->id}}"
												   ticket          = "{{$obAgenda->te_ticket}}"
												   class		   = "btn btn-icon waves-effect btn-agenda-cancelar btn-sm m-b-5 cancelamento"
												   title 		   = "Cancelar Consulta" id="cancelamento">
												   <i class="mdi mdi-close"></i>
												</a>
											@endif
										</td>
									</tr>
								@endforeach
							</table>
							
							<tfoot>
    							<div class="cvx-pagination">
                                    <span class="text-primary">
                                    	{{ sprintf("%02d", $agenda->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $agenda->count()) }} Registro(s) exibido(s)
                                    </span>
    								{!! $agenda->links() !!}
    							</div>
							</tfoot>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	@include('agenda/modal_agenda_consulta')
	@include('agenda/modal_cancelamento')
	@include('agenda/modal_confirmacao')
	
@endsection