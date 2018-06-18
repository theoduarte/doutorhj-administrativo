@extends('layouts.master')

@section('title', 'Doctor HJ: Consultas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('consultas.index') }}">Lista de Consultas</a></li>
					<li class="breadcrumb-item active">Editar Consulta</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Consulta</h4>
				
				<form action="{{ route('consultas.update', $consulta->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="cd_consulta">Código<span class="text-danger">*</span></label>
						<input type="text" id="cd_consulta" class="form-control" name="cd_consulta" value="{{ $consulta->cd_consulta }}" required placeholder="Código da Consulta"  >
					</div>
					
					<div class="form-group">
						<label for="ds_consulta">Descrição<span class="text-danger">*</span></label>
						<input type="text" id="ds_consulta" class="form-control" name="ds_consulta" value="{{ $consulta->ds_consulta }}" required placeholder="Descrição do Consulta" >
					</div>
					
					<div class="form-group">
						<label for="especialidade_id">Especialidade</label>
						<select id="especialidade_id" class="form-control" name="especialidade_id" placeholder="Selecione a Especialidade">
						<option value="" >Selecione a Especialidade</option>
						@foreach($especialidades as $id => $titulo)
							<option value="{{ $id }}" @if( $id == $consulta->especialidade_id ) selected='selected' @endif >{{ $titulo }}</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="tipoatendimento_id">Tipo de Atendimento</label>
						<select id="tipoatendimento_id" class="form-control" name="tipoatendimento_id" placeholder="Selecione o Tipo de Especialidade">
						<option value="" >Selecione o Tipo de Especialidade</option>
						@foreach($tipo_atendimentos as $id => $titulo)
							<option value="{{ $id }}" @if( $id == $consulta->tipoatendimento_id ) selected='selected' @endif >{{ $titulo }}</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('consultas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection