@extends('layouts.master')

@section('title', 'DoutorHoje: Relatórios')

@push('scripts')

@endpush

@section('container')
<div class="container-fluid">

	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Relatórios de Auditoria</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Painel Administrativo</li>
				</ol>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('pacientes-detalhado-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="row">
						<div class="form-group col-md-3 offset-md-3">
                       		<label for="parte_lista" class="text-primary">Selecione o mês INICIO</label>
                       		<input type="text" class="input-mes-inicio form-control cvx-datepicker col-md-8" name="mes_inicio" autocomplete="off">
                        </div>
                        <div class="form-group col-md-3">
                       		<label for="parte_lista" class="text-primary">Selecione o mês FIM</label>
                       		<input type="text" class="input-mes-fim form-control cvx-datepicker col-md-8" name="mes_fim" autocomplete="off">
                        </div>
					</div>
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-secondary btn-lg waves-effect waves-light" ><i class="mdi mdi-cloud-print-outline"></i> Gerar Lista Detalhada de Pacientes</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('consultas-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success btn-lg waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Consultas</button>
					</div>
				</form>
			</div>
		</div>	
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('pacientes-ativos-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-primary btn-lg waves-effect waves-light" ><i class="mdi mdi-cloud-print-outline"></i> Gerar Lista de Pacientes Ativos</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('prestadores-ativos-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					<div class="form-group text-center m-b-0">
						<div class="checkbox checkbox-primary form-check-inline">
							<input type="checkbox" id="inlineCheckboxTodos" name="inlineCheckboxTodos" value="todos" onclick="$('.inlineCheckbox').prop('checked', false)">
							<label for="inlineCheckboxTodos" class="text-primary"> Todos </label>
						</div>
						<div class="checkbox checkbox-default form-check-inline">
							<input type="checkbox" id="inlineCheckboxNovos" class="inlineCheckbox" name="inlineCheckboxNovos" value="novos">
							<label for="inlineCheckboxNovos"> Novos </label>
						</div>
						<div class="checkbox checkbox-default form-check-inline">
							<input type="checkbox" id="inlineCheckboxAtivos" class="inlineCheckbox" name="inlineCheckboxAtivos" value="ativos">
							<label for="inlineCheckboxAtivos"> Ativos </label>
						</div>
						<div class="checkbox checkbox-default form-check-inline">
							<input type="checkbox" id="inlineCheckboxInativos" class="inlineCheckbox" name="inlineCheckboxInativos" value="inativos" re>
							<label for="inlineCheckboxInativos"> Inativos </label>
						</div>
					</div>
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-primary btn-lg waves-effect waves-light" ><i class="mdi mdi-stethoscope"></i> Gerar Lista de Prestadores</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('consultas-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="row">
						<div class="form-group col-md-4 offset-md-4">
                       		<label for="parte_lista" class="text-primary">Selecione a parte que dejesa emitir</label>
                            <select id="sg_estado" name="parte_lista" class="form-control" required>
                                <option></option>
                                @for ($i = 0; $i < $num_arquivos_consulta; $i++)
                                    <option value="{{ $i }}" >Parte 0{{ ($i+1) }}</option>
                                @endfor
                            </select>
                        </div>
					</div>
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success btn-lg waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Consultas</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('exames-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="row">
						<div class="form-group col-md-4 offset-md-4">
                       		<label for="parte_lista" class="text-primary">Selecione a parte que dejesa emitir</label>
                            <select id="sg_estado" name="parte_lista" class="form-control" required>
                                <option></option>
                                @for ($i = 0; $i < $num_arquivos_proced; $i++)
                                    <option value="{{ $i }}" >Parte 0{{ ($i+1) }}</option>
                                @endfor
                            </select>
                        </div>
					</div>
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success btn-lg waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Exames</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@push('scripts')
    
	<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.inlineCheckbox').click(function(){
				$('#inlineCheckboxTodos').prop('checked', false);
			});

            var startDate = new Date();
            var FromEndDate = new Date();

            jQuery('.input-mes-inicio').datepicker({
                autoclose: true,
                minViewMode: 1,
                format: 'M/yyyy',
                language: 'pt-BR'
            }).on('changeDate', function(selected){
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('.input-mes-fim').datepicker('setStartDate', startDate);
                }); 

            jQuery('.input-mes-fim').datepicker({
                autoclose: true,
                minViewMode: 1,
                format: 'M/yyyy',
                language: 'pt-BR'
            }).on('changeDate', function(selected){
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('.input-mes-inicio').datepicker('setEndDate', FromEndDate);
                });
        });
	</script>
@endpush
@stack('scripts')
@endsection
