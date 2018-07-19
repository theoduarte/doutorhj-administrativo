@extends('layouts.master')
@section('title', 'Doctor HJ: Agenda')
@section('container')
	
	<style>
		.ui-autocomplete {
			max-height  : 200px;
			overflow-y  : auto;
			overflow-x  : hidden;
		}
		* html .ui-autocomplete {
			height      : 200px;
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
	
	<script>
        $(function(){
        	jQuery('#datepicker-agenda').datepicker({
        	    autoclose: true,
        	    todayHighlight: true,
        	    format:'dd/mm/yyyy',
        		language: 'pt-BR'
        	});

        	
            $("#localAtendimento").autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url : "/consultas/localatendimento/"+$('#localAtendimento').val(),
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 5,
                select: function(event, ui) {
                    $('input[name="clinica_id"]').val(parseInt(ui.item.id));
                }
            }).change(function(){
                if( $(this).val().length == 0 ){
                	$('#datepicker-agenda').val(null);
                	$('input[name="clinica_id"').val(null);
                }
            });
        });
		
        $( window ).on( "load", function() {
            window.setTimeout(function(){
            	$('.calendar-time').hide();
            }, 1000);
        });
	</script>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title">Doctor HJ</h4>
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
							<form class="form-edit-add" action="{{ route('agenda.index') }}" method="get">
								<div class="row">
									<div class="col-4">
										<label for="localAtendimento">Razão Social do Prestador:</label>
										<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="{{old('localAtendimento')}}">
										<input type="hidden" id="clinica_id" name="clinica_id" value="{{old('clinica_id')}}">
									</div>
									<div class="col-3">
										<label for="localAtendimento">Nome do Paciente:</label>
										<input type="text" class="form-control" name="nm_paciente" id="nm_paciente" value="{{old('nm_paciente')}}">
									</div>
									<div style="width:13em !important;">
										<label for="data">Data de Atendimento:<span class="text-danger">*</span></label>
										<input type="text" class="form-control input-daterange-timepicker" id="data" name="data" value="{old('data')}}" required>
									</div>
									<div class="col-1 col-lg-3">
										<div style="height: 30px;"></div>
										<button type="submit" class="btn btn-primary" id="submit" style="margin-right: 10px;"><i class="fa fa-search"></i> Pesquisar</button>
										<a href="{{ route('agenda.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca" style="margin-bottom: 0px; "><i class="ion-close"></i> Limpar Busca</a>
									</div>
								</div>
							</form>
						</div>
						<div style="height: 100px !important;">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
							    <colgroup>
									<col width="100">
									<col width="250">
									<col width="250">
									<col width="250">
									<col width="100">
									<col width="100">
									<col width="5">
									<col width="5">
                                </colgroup>
								<tr>
									<th>@sortablelink('te_ticket', 'Ticket')</th>
									<th>@sortablelink('clinica.nm_razao_social', 'Prestador')</th>
									<th>Profissional</th>
									<th>Paciente</th>
									<th>Dt.Pagamento</th>
									<th>@sortablelink('dt_atendimento', 'Dt.Atendimento')</th>
									<th>@sortablelink('cs_status', 'Situação')</th>
									<th>Ações</th>
								</tr>
								@foreach($agenda as $obAgenda)
									<tr>
										<td>{{$obAgenda->te_ticket}}</td>
										<td>{{$obAgenda->clinica->nm_razao_social}}</td>
										<td style="text-align: left !important;">{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}</td>
										<td style="text-align: left !important;">{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}</td>
										<td>{{$obAgenda->itempedidos->first()->pedido->dt_pagamento}}</td>
										<td>{{$obAgenda->dt_atendimento}}</td>
										<td >{{$obAgenda->cs_status}}</td>
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
												   valor-consulta = "{{$obAgenda->valor_total}}"
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
                                                   data-hora       = "{{$obAgenda->dt_atendimento}}"
                                                   prestador       = "{{$obAgenda->clinica->nm_razao_social}}"
                                                   nm-profissional = "{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}"
                                                   valor-consulta  = "{{$obAgenda->valor}}"
                                                   id-profissional = "{{$obAgenda->profissional->id}}"
                                                   id-clinica      = "{{$obAgenda->clinica->id}}"
                                                   id-paciente     = "{{$obAgenda->paciente->id}}"
                                                   ticket          = "{{$obAgenda->te_ticket}}"
                                                   class           = "btn btn-icon waves-effect btn-agenda-confirmar btn-sm m-b-5 confirmacao"
                                                   title           = "Confirmar Consulta" id="confirmacao">
                                                   <i class="mdi mdi-check"></i>
                                                </a>
                                            @endif
                                            
                                            <!-- botao faturar -->
                                            @if( $obAgenda->cs_status == 'Finalizado' )
                                                <a especialidade  = "@foreach( $obAgenda->profissional->especialidades as $especialidade ){{$especialidade->ds_especialidade}}@endforeach"
                                                   nm-paciente     = "{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}"
                                                   data-hora       = "{{$obAgenda->dt_atendimento}}"
                                                   prestador       = "{{$obAgenda->clinica->nm_razao_social}}"
                                                   nm-profissional = "{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}"
                                                   valor-consulta  = "{{$obAgenda->valor}}"
                                                   id-profissional = "{{$obAgenda->profissional->id}}"
                                                   id-clinica      = "{{$obAgenda->clinica->id}}"
                                                   id-paciente     = "{{$obAgenda->paciente->id}}"
                                                   id-agendamento  = "{{$obAgenda->id}}"
                                                   ticket          = "{{$obAgenda->te_ticket}}"
                                                   class           = "btn btn-icon waves-effect btn-agenda-faturar btn-sm m-b-5 faturamento"
                                                   title           = "Faturar Consulta" id="faturamento">
                                                   <i class="mdi mdi-file-chart"></i>
                                                </a>
                                            @endif
                                            
                                            <!-- botao pagar -->
                                            @if( $obAgenda->cs_status == 'Faturado' )
                                                <a especialidade  = "@foreach( $obAgenda->profissional->especialidades as $especialidade ){{$especialidade->ds_especialidade}}@endforeach"
                                                   nm-paciente     = "{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}"
                                                   data-hora       = "{{$obAgenda->dt_atendimento}}"
                                                   prestador       = "{{$obAgenda->clinica->nm_razao_social}}"
                                                   nm-profissional = "{{$obAgenda->profissional->nm_primario}} {{$obAgenda->profissional->nm_secundario}}"
                                                   valor-consulta  = "{{$obAgenda->valor}}"
                                                   id-profissional = "{{$obAgenda->profissional->id}}"
                                                   id-clinica      = "{{$obAgenda->clinica->id}}"
                                                   id-paciente     = "{{$obAgenda->paciente->id}}"
                                                   id-agendamento  = "{{$obAgenda->id}}"
                                                   ticket          = "{{$obAgenda->te_ticket}}"
                                                   class           = "btn btn-icon waves-effect btn-agenda-pagar btn-sm m-b-5 pagamento"
                                                   title           = "Pagar" id="pagamento">
                                                   <i class="fa fa-dollar"></i>
                                                </a>
                                            @endif
                                            
                                            <!-- botao cancelar -->
											@if( $obAgenda->cs_status!='Cancelado' &&
                                                 $obAgenda->cs_status!='Finalizado' &&
                                                 $obAgenda->cs_status!='Faturado' &&
                                                 $obAgenda->cs_status!='Pago' &&
                                                 $obAgenda->cs_status!='Retorno')
												<a especialidade  = "
																	 @foreach( $obAgenda->profissional->especialidades as $especialidade )
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
    								{!! $agenda->appends(request()->input())->links() !!}
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

    @include('agenda/modal_faturamento')

    @include('agenda/modal_pagamento')
	
@endsection