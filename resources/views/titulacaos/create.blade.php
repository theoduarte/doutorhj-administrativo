@extends('layouts.master')

@section('title', 'Titulações de Especialidades Médicas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('titulacaos.index') }}">Lista de Titulações</a></li>
					<li class="breadcrumb-item active">Adicionar Titulação</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Titulação</h4>
				
				<form action="{{ route('titulacaos.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<label for="titulo">Título de especialista em<span class="text-danger">*</span></label>
								<input type="text" id="titulo" class="form-control" name="titulo" required placeholder="Título" maxlength="200"  >
							</div>
							<div class="col-md-4">
								<label for="tempo_formacao">Tempo Formação(em meses)<span class="text-danger">*</span></label>
								<input type="number" id="tempo_formacao" class="form-control" name="tempo_formacao" required placeholder="Tempo de Formação (em meses)" min="0"  >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="amb">AMB<span class="text-danger">*</span></label>
						<textarea id="amb" class="form-control" name="amb" rows="3" cols="4" placeholder="Associação Médica Brasileira"></textarea>
					</div>
					
					<div class="form-group">
						<label for="cnrm">CNRM<span class="text-danger">*</span></label>
						<textarea id="cnrm" class="form-control" name="cnrm" rows="3" cols="4" placeholder="Comissão Nacional de Residência Médica "></textarea>
					</div>
					
					<?php /* 
					<div class="form-group">
						<select id="requisito_titulacao" class="select2 select2-multiple" name="requisito_titulacao" multiple="multiple" multiple data-placeholder="Selecione ...">
                        @foreach($list_requisitos as $reqt)
						<option value="{{ $reqt->id }}">{{ $reqt->titulo }}</option>
						@endforeach  
                        </select>
                    </div>
                    */
                    ?>
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('titulacaos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection