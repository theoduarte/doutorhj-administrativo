@extends('layouts.master')

@section('title', 'Usuários')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Lista de Usuários</a></li>
					<li class="breadcrumb-item active">Cadastrar Usuários</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<form action="{{ route('usuarios.update', $objGenerico->id) }}" method="post">
		<input type="hidden" name="_method" value="PUT">
		{!! csrf_field() !!}
    	
    	<div class="row">
	        <div class="col-12">
                <div class="card-box col-12">
                    <h4 class="header-title m-t-0 m-b-30">Usuários</h4>
    
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#prestador" data-toggle="tab" aria-expanded="true" class="nav-link active">
                				@if(  $objGenerico->user->tp_user == 'PAC')
                					Dados do Paciente
                				@elseif(  $objGenerico->user->tp_user == 'PRO')
                					Dados do Profissional
                				@endif
                            </a>
                        </li>
                        @if(  $objGenerico->user->tp_user == 'PRO')
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
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="prestador">
                        	@include('usuarios/tab_dados_usuarios_edit')
                        </div>
                        @if(  $objGenerico->user->tp_user == 'PRO')
                            <div class="tab-pane fade" id="precificacaoProcedimento">
                             	@include('prestadores/precificacaoProcedimento')
                            </div>
                            <div class="tab-pane fade" id="precificacaoConsulta">
                             	@include('prestadores/precificacaoConsulta')
                            </div>
                        @endif
                    </div>
                </div>
       		</div>
    	</div>
   </form>
</div>
@endsection