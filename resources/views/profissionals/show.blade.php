@extends('layouts.master')

@section('title', 'Gestão de profissionals')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('profissionals.index') }}">Lista de profissionals</a></li>
					<li class="breadcrumb-item active">Detalhes do Profissional</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Profissional</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código</td>
							<td width="75%">{{ $profissionals->id }}</td>
						</tr>
						<tr>
							<td>Nome</td>
							<td>{{$profissionals->nm_primario}} {{$profissionals->nm_secundario}}</td>
						</tr>
						<tr>
							<td>Sexo</td>
							<td>{{( $profissionals->cs_sexo == 'F' ) ? 'Feminino' : 'Masculino'}}</td>
						</tr>
						<tr>
							<td>Nascimento</td>
							<td>{{$profissionals->dt_nascimento}}</td>
						</tr>
						@if ( $profissionals->especialidades != null )
						
						<tr>
							<td>Especialidade</td>
							<td>
								@foreach($profissionals->especialidades as $especialidade)
									{{$especialidade->cd_especialidade}} - {{$especialidade->ds_especialidade.' '}}
								@endforeach
							</td>
						</tr>
						@endif
						@foreach( $profissionals->documentos as $documento )
						<tr>
							<td>Documento</td>
							<td>{{$documento->tp_documento}} - {{$documento->te_documento}}</td>
						</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('profissionals.edit', $profissionals->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('profissionals.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection