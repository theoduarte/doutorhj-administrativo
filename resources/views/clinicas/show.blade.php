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
					<li class="breadcrumb-item"><a href="{{ route('clinicas.index') }}">Lista de Prestadores</a></li>
					<li class="breadcrumb-item active">Cadastrar Prestador</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<input type="hidden" name="_method" value="PUT">
	{!! csrf_field() !!}
	
	<div class="row">
        <div class="col-12">
            <div class="card-box col-12">
                <h4 class="header-title m-t-0 m-b-30">Clínicas</h4>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#prestador" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            Dados da Clínica
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
                            Precificação de Consultas
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="prestador">
                    	@include('clinicas/tab_dados_prestador_show')
                    </div>
                    <div class="tab-pane fade" id="precificacaoProcedimento">
                        @include('clinicas/precificacaoProcedimentoShow')
                    </div>
                    <div class="tab-pane fade" id="precificacaoConsulta">
                     	@include('clinicas/precificacaoConsultaShow')
                    </div>
                    <div class="tab-pane fade" id="corpoClinico">
                     	@include('clinicas/tab_corpo_clinico')
                    </div>
                </div>
            </div>
   		</div>
	</div>
</div>
@endsection