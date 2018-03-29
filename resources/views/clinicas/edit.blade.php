@extends('layouts.master')

@section('title', 'Clínicas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('clinicas.index') }}">Lista de Clínicas</a></li>
					<li class="breadcrumb-item active">Cadastrar Clínicas</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<form action="{{ route('clinicas.update', $prestador->id) }}" method="post">
		<input type="hidden" name="_method" value="PUT">
		{!! csrf_field() !!}
    	
    	<div class="row">
	        <div class="col-12">
                <div class="card-box col-12">
                    <h4 class="header-title m-t-0 m-b-30">Clínicas</h4>
    
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#prestador" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                Dados do Prestador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#precificacaoProcedimento" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Precificação de Procedimentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#precificacaoConsulta" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Precificação de Consultas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#corpoClinico" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Corpo Clínico
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="prestador">
                        	@include('clinicas/tab_dados_prestador_edit')
                        </div>
                        <div class="tab-pane fade" id="precificacaoProcedimento">
                         	@include('clinicas/precificacaoProcedimento')
                        </div>
                        <div class="tab-pane fade" id="precificacaoConsulta">
                         	@include('clinicas/precificacaoConsulta')
                        </div>
                        <div class="tab-pane fade" id="corpoClinico">
                         	@include('clinicas/tab_corpo_clinico')
                        </div>
                    </div>
                </div>
       		</div>
    	</div>
   </form>
</div>
@push('scripts')
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#btn-save-profissional').click(function(){

			var clinica_id = $('#clinica_id').val();
			var nm_primario = $('#nm_primario').val();
			var nm_secundario = $('#nm_secundario').val();
			var cs_sexo = $('#cs_sexo').val();
			var dt_nascimento = $('#dt_nascimento').val();
			var cs_status = $('#cs_status').val();
			var especialidade_id = $('#tp_especialidade').val();
			var tp_profissional = $('#tp_profissional').val();
			
			jQuery.ajax({
				type: 'POST',
				url: '{{ Request::url() }}/add-profissional',
				data: {
					'clinica_id': clinica_id,
					'nm_primario': nm_primario,
					'nm_secundario': nm_secundario,
					'cs_sexo': cs_sexo,
					'dt_nascimento': dt_nascimento,
					'cs_status': cs_status,
					'especialidade_id': especialidade_id,
					'tp_profissional': tp_profissional,
					'_token': laravel_token
				},
	            success: function (result) {
	                swal("Saved", "This resource was added to your list of saved resources", "success")
	            },
	            error: function (result) {
	                swal(({
        	            title: "Oops",
        	            text: "We ran into an issue trying to save this resource",
        	            type: 'error',
        	            confirmButtonClass: 'btn btn-confirm mt-2'
        			}));
	            }
			});
		});
	});
	</script>
    @endpush
@endsection