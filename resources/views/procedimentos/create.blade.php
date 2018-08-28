@extends('layouts.master')

@section('title', 'Doutor HJ: Procedimentos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('procedimentos.index') }}">Lista de Procedimentos</a></li>
					<li class="breadcrumb-item active">Adicionar Procedimento</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Procedimento</h4>
				
				<form action="{{ route('procedimentos.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="cd_procedimento">Código<span class="text-danger">*</span></label>
						<input type="text" id="cd_procedimento" class="form-control" name="cd_procedimento" required placeholder="Código do Procedimento" maxlength="10" required  >
					</div>
					
					<div class="form-group">
						<label for="ds_procedimento">Descrição<span class="text-danger">*</span></label>
						<input type="text" id="ds_procedimento" class="form-control" name="ds_procedimento" required placeholder="Descrição do Procedimento" required >
					</div>
					
					<div class="form-group">
						<label for="tipoatendimento_id">Tipo de Atendimento</label>
						<select id="tipoatendimento_id" class="form-control" name="tipoatendimento_id" placeholder="Selecione o Tipo de Especialidade" >
						<option value="" >Selecione o Tipo de Especialidade</option>
						@foreach($tipo_atendimentos as $id => $titulo)
							<option value="{{ $id }}" >{{ $titulo }}</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="grupoprocedimento_id">Grupo de Procedimentos</label>
						<select id="grupoprocedimento_id" class="form-control" name="grupoprocedimento_id" placeholder="Selecione a Grupo de Procedimento" >
						<option value="" >Selecione a Grupo de Procedimento</option>
						@foreach($grupo_atendimentos as $id => $titulo)
							<option value="{{ $id }}" >{{ $titulo }}</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('procedimentos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection