@extends('layouts.master')
@section('title', 'Doutor HJ: Agenda')
@section('container')

	<style>
		.ui-autocomplete {
			max-height: 200px;
			overflow-y: auto;
			overflow-x: hidden;
		}

		* html .ui-autocomplete {
			height: 200px;
		}

		.ui-dialog .ui-state-error {
			padding: .3em;
		}

		.ui-widget-header {
			border: 1px solid #dddddd;
			background: #00b0f4 !important;
			color: #ffffff;
			font-weight: bold;
		}

		.is-invalid {
			color: #dc3545;
		}
	</style>

	<script>
		$(function () {
			$("#localAtendimento").autocomplete({
				source: function (request, response) {
					$.ajax({
						url: "/consultas/localatendimento/" + $('#localAtendimento').val(),
						dataType: "json",
						success: function (data) {
							response(data);
						}
					});
				},
				minLength: 5,
				select: function (event, ui) {
					$('input[name="clinica_id"]').val(parseInt(ui.item.id));
				}
			}).change(function () {
				if ($(this).val().length == 0) {
					$('#datepicker-agenda').val(null);
					$('input[name="clinica_id"]').val(null);
				}
			});
		});

		$(window).on("load", function () {
			$("#cs_status").select2({
				multiple: true,
			});
		});
	</script>

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
							<form class="form-edit-add" action="{{ route('agenda.index') }}" method="get">
								<div class="row">
									<div class="col-6">
										<label for="localAtendimento">Razão Social do Prestador:</label>
										<input type="text" class="form-control" name="localAtendimento"
											   id="localAtendimento" value="{{old('localAtendimento')}}">
										<input type="hidden" id="clinica_id" name="clinica_id"
											   value="{{old('clinica_id')}}">
									</div>

									<div class="col-6">
										<label for="localAtendimento">Nome do Paciente:</label>
										<input type="text" class="form-control" name="nm_paciente" id="nm_paciente"
											   value="{{old('nm_paciente')}}">
									</div>
								</div>

								<div class="row">
									<div class="col-3">
										<label for="data">Data de Atendimento:<span class="text-danger"></span></label>
										<input type="text" class="form-control input-daterange" id="data" name="data"
											   value="{{ old('data') }}" autocomplete="off">
									</div>

									<div class="col-6">
										<label for="localAtendimento">Status:</label>
										<select name="cs_status[]" id="cs_status" class="form-control select2"
												placeholder="selecione o status do agendamento" multiple="multiple">
											@foreach( $status as $key => $value )
												<option value="{{ $key }}" {{ !empty(old('cs_status')) && in_array($key, old('cs_status')) ? 'selected' : null }}>{{ $value }}</option>
											@endforeach
										</select>
									</div>

									<div class="col-3">
										<div style="height: 30px;"></div>
										<button type="submit" class="btn btn-primary" id="submit"
												style="margin-right: 10px;"><i class="fa fa-search"></i> Pesquisar
										</button>
										<a href="{{ route('agenda.index') }}"
										   class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
										   title="Limpar Busca" style="margin-bottom: 0px; "><i class="ion-close"></i>
											Limpar Busca</a>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div style="height: 20px !important;"></div>
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
								@foreach($agendamentos as $agendamento)
									@foreach( $agendamento->atendimentos()->whereNull('deleted_at')->get() as $atendimento )
										@php
											$type = !empty( $atendimento->procedimento ) ? 'Exame' : 'Consulta';
										@endphp
										<tr>
											<td>{{ $agendamento->te_ticket }}</td>
											<td>{{ $atendimento->clinica->nm_razao_social }}</td>
											@if( !empty($atendimento->consulta_id) )
												<td style="text-align: left !important;">{{ $atendimento->profissional->nm_primario . ' ' . $atendimento->profissional->nm_secundario  }}</td>
											@else
												<td style="text-align: left !important;"></td>
											@endif
											<td style="text-align: left !important;">{{ $agendamento->paciente->nm_primario . ' ' . $agendamento->paciente->nm_secundario  }}</td>
											<td>{{ !empty( $agendamento->itempedidos->first()->pedido ) ? $agendamento->itempedidos->first()->pedido->dt_pagamento : null}}</td>
											<td>{{ $agendamento->dt_atendimento }}</td>
											<td>{{ $agendamento->cs_status }}</td>
											<td style="width:100px;">
												<!-- botao agendar/remarcar -->
												@if( $agendamento->cs_status == 'Pré-Agendado' 
													or $agendamento->cs_status == 'Agendado'
													and $agendamento->cs_status != 'Cancelado'
													and $agendamento->cs_status != 'Finalizado'
													and $agendamento->cs_status != 'Confirmado'
													and $agendamento->bo_remarcacao == 'N')
													<a especialidade="{{ !empty( $atendimento->procedimento ) ?
													$atendimento->procedimento->grupoprocedimento->ds_grupo :
													$atendimento->consulta->especialidade->ds_especialidade }}"
													   id-especialidade="{{ !empty( $atendimento->procedimento ) ?
														$atendimento->procedimento->id : $atendimento->consulta->id }}"
													   tp-prestador="{{ $atendimento->clinica->tp_prestador }}"
													   data-hora="{{ $agendamento->dt_atendimento }}"
													   prestador="{{ $atendimento->clinica->nm_razao_social }}"
													   nm-profissional="{{ !is_null($atendimento->profissional_id) ?  $atendimento->profissional->nm_primario . ' ' . $atendimento->profissional->nm_secundario : '' }}"
													   valor-consulta="{{ number_format( $agendamento->vl_pedido,  2, ',', '.') }}"
													   valor-pagamento="{{ number_format( $agendamento->vl_pedido,  2, ',', '.') }}"
													   id-agendamento="{{ $agendamento->id }}"
													   id-profissional="{{ $atendimento->profissional->id }}"
													   id-clinica="{{ $atendimento->clinica->id }}"
													   nm-clinica="{{ $atendimento->clinica->nm_fantasia }}"
													   id-paciente="{{ $agendamento->paciente->id }}"
													   nm-paciente="{{ $agendamento->paciente->nm_primario }} {{ $agendamento->paciente->nm_secundario }}"
													   nm-filial="{{ $agendamento->filial->eh_matriz ? 'Matriz - ' : 'Filial - ' }} {{ $agendamento->filial->nm_nome_fantasia }}"
													   ticket="{{ $agendamento->te_ticket }}"
													   type="{{ $type }}"
													   atendimento="{{ !empty( $atendimento->procedimento ) ? ($atendimento->procedimento->cd_procedimento . ' - ' . $atendimento->procedimento->ds_procedimento) : ($atendimento->consulta->cd_consulta . ' - ' . $atendimento->consulta->ds_consulta) }}"
													   data-toggle="modal"
													   data-target="#dialog-agendar"
													   class="btn btn-icon waves-effect btn-agenda-remarcar btn-sm m-b-5 agendamento"
													   id="agendamento"
													   @if( $agendamento->cs_status == 'Pré-Agendado' )
													   title="Agendar {{ $type }}"
													   @elseif( $agendamento->cs_status == 'Agendado' )
													   title="Remarcar {{ $type }}"
															@endif
													><i class="mdi mdi-calendar-plus"></i></a>
													@endif

															<!-- botao confirmar -->
													@if( $agendamento->cs_status != 'Cancelado' && $agendamento->cs_status == 'Agendado' )
														<a especialidade="{{ !empty( $atendimento->procedimento ) ?
																		 $atendimento->procedimento->grupoprocedimento->ds_grupo :
																		 $atendimento->consulta->especialidade->ds_especialidade }}"
														   nm-paciente="{{ $agendamento->paciente->nm_primario }} {{ $agendamento->paciente->nm_secundario }}"
														   data-hora="{{ $agendamento->dt_atendimento }}"
														   prestador="{{ $atendimento->clinica->nm_razao_social }}"
														   nm-profissional="{{ !is_null($atendimento->profissional_id) ? $atendimento->profissional->nm_primario . ' ' . $atendimento->profissional->nm_secundario : '' }}"
														   valor-consulta="{{ number_format( $agendamento->vl_pedido,  2, ',', '.') }}"
														   id-agendamento="{{ $agendamento->id }}"
														   id-profissional="{{ $agendamento->profissional->id }}"
														   id-clinica="{{ $atendimento->clinica->id }}"
														   id-paciente="{{ $agendamento->paciente->id }}"
														   ticket="{{ $agendamento->te_ticket }}"
														   type="{{ $type }}"
														   atendimento="{{ !empty( $atendimento->procedimento ) ? ($atendimento->procedimento->cd_procedimento . ' - ' . $atendimento->procedimento->ds_procedimento) : ($atendimento->consulta->cd_consulta . ' - ' . $atendimento->consulta->ds_consulta) }}"
														   class="btn btn-icon waves-effect btn-agenda-confirmar btn-sm m-b-5 confirmacao"
														   title="Confirmar {{ $type }}" id="confirmacao">
															<i class="mdi mdi-check"></i>
														</a>
														@endif

																<!-- botao faturar -->
														@if( $agendamento->cs_status == 'Finalizado' )
															<a especialidade="{{ !empty( $atendimento->procedimento ) ?
																		 $atendimento->procedimento->grupoprocedimento->ds_grupo :
																		 $atendimento->consulta->especialidade->ds_especialidade }}"
															   nm-paciente="{{ $agendamento->paciente->nm_primario }} {{ $agendamento->paciente->nm_secundario }}"
															   data-hora="{{ $agendamento->dt_atendimento }}"
															   prestador="{{ $atendimento->clinica->nm_razao_social }}"
															   nm-profissional="{{ !is_null($atendimento->profissional_id) ? $atendimento->profissional->nm_primario . ' ' . $atendimento->profissional->nm_secundario : '' }}"
															   valor-consulta="{{ number_format( $agendamento->vl_pedido,  2, ',', '.') }}"
															   id-agendamento="{{ $agendamento->id }}"
															   id-profissional="{{ $agendamento->profissional->id }}"
															   id-clinica="{{ $atendimento->clinica->id }}"
															   id-paciente="{{ $agendamento->paciente->id }}"
															   ticket="{{ $agendamento->te_ticket }}"
															   type="{{ $type }}"
															   atendimento="{{ !empty( $atendimento->procedimento ) ? ($atendimento->procedimento->cd_procedimento . ' - ' . $atendimento->procedimento->ds_procedimento) : ($atendimento->consulta->cd_consulta . ' - ' . $atendimento->consulta->ds_consulta) }}"
															   class="btn btn-icon waves-effect btn-agenda-faturar btn-sm m-b-5 faturamento"
															   title="Faturar {{ $type }}" id="faturamento">
																<i class="mdi mdi-file-chart"></i>
															</a>
															@endif

																	<!-- botao pagar -->
															@if( $agendamento->cs_status == 'Faturado' )
																<a especialidade="{{ !empty( $atendimento->procedimento ) ?
																		 $atendimento->procedimento->grupoprocedimento->ds_grupo :
																		 $atendimento->consulta->especialidade->ds_especialidade }}"
																   nm-paciente="{{ $agendamento->paciente->nm_primario }} {{ $agendamento->paciente->nm_secundario }}"
																   data-hora="{{ $agendamento->dt_atendimento }}"
																   prestador="{{ $atendimento->clinica->nm_razao_social }}"
																   nm-profissional="{{ !is_null($atendimento->profissional_id) ? $atendimento->profissional->nm_primario . ' ' . $atendimento->profissional->nm_secundario : ''}}"
																   valor-consulta="{{ number_format( $agendamento->vl_pedido,  2, ',', '.') }}"
																   id-agendamento="{{ $agendamento->id }}"
																   id-profissional="{{ $agendamento->profissional->id }}"
																   id-clinica="{{ $atendimento->clinica->id }}"
																   id-paciente="{{ $agendamento->paciente->id }}"
																   ticket="{{ $agendamento->te_ticket }}"
																   type="{{ $type }}"
																   atendimento="{{ !empty( $atendimento->procedimento ) ? ($atendimento->procedimento->cd_procedimento . ' - ' . $atendimento->procedimento->ds_procedimento) : ($atendimento->consulta->cd_consulta . ' - ' . $atendimento->consulta->ds_consulta) }}"
																   class="btn btn-icon waves-effect btn-agenda-pagar btn-sm m-b-5 pagamento"
																   title="Pagar {{ $type }}" id="pagamento">
																	<i class="fa fa-dollar"></i>
																</a>
																@endif

																		<!-- botao cancelar -->
																@if( $agendamento->cs_status !='Cancelado' &&
																	$agendamento->cs_status !='Faturado' &&
																	$agendamento->cs_status !='Pago' &&
																	$agendamento->cs_status !='Retorno')
																	<a especialidade="{{ !empty( $atendimento->procedimento ) ?
																		 $atendimento->procedimento->grupoprocedimento->ds_grupo :
																		 $atendimento->consulta->especialidade->ds_especialidade }}"
																	   nm-paciente="{{ $agendamento->paciente->nm_primario }} {{ $agendamento->paciente->nm_secundario }}"
																	   data-hora="{{ $agendamento->dt_atendimento }}"
																	   prestador="{{ $atendimento->clinica->nm_razao_social }}"
																	   nm-profissional="{{ !is_null($atendimento->profissional_id) ? $atendimento->profissional->nm_primario . ' ' . $atendimento->profissional->nm_secundario : ''}}"
																	   valor-consulta="{{ number_format( $agendamento->vl_pedido,  2, ',', '.') }}"
																	   id-agendamento="{{ $agendamento->id }}"
																	   id-profissional="{{ $agendamento->profissional->id }}"
																	   id-clinica="{{ $atendimento->clinica->id }}"
																	   id-paciente="{{ $agendamento->paciente->id }}"
																	   ticket="{{ $agendamento->te_ticket }}"
																	   type="{{ $type }}"
																	   atendimento="{{ !empty( $atendimento->procedimento ) ? ($atendimento->procedimento->cd_procedimento . ' - ' . $atendimento->procedimento->ds_procedimento) : ($atendimento->consulta->cd_consulta . ' - ' . $atendimento->consulta->ds_consulta) }}"
																	   class="btn btn-icon waves-effect btn-agenda-cancelar btn-sm m-b-5 cancelamento"
																	   title="Cancelar {{ $type }}" id="cancelamento">
																		<i class="mdi mdi-close"></i>
																	</a>
																@endif
											</td>
										</tr>
									@endforeach
								@endforeach
							</table>
							<tfoot>
							<div class="cvx-pagination">
							 <span class="text-primary">
								  {{ sprintf("%02d", $agendamentos->total()) }}
								 Registro(s) encontrado(s) e {{ sprintf("%02d", $agendamentos->count()) }} Registro(s) exibido(s)
							 </span>
								{!! $agendamentos->appends(request()->input())->links() !!}
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

	@include('agenda/modal_update')

@endsection