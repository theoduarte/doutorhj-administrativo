@extends('layouts.master')

@section('title', 'Gestão de Clientes')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Lista de Clientes</a></li>
					<li class="breadcrumb-item active">Detalhes do Cliente</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Cliente</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código</td>
							<td width="75%">{{ $pacientes->id }}</td>
						</tr>
						<tr>
							<td>Nome</td>
							<td>{{$pacientes->nm_primario}} {{$pacientes->nm_secundario}}</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>{{$pacientes->user->email}}</td>
						</tr>
						<tr>
							<td>Sexo</td>
							<td>{{( $pacientes->cs_sexo == 'F' ) ? 'Feminino' : 'Masculino'}}</td>
						</tr>
						<tr>
							<td>Nascimento</td>
							<td>{{$pacientes->dt_nascimento}}</td>
						</tr>
						@if ( $pacientes->especialidade != null )
						<tr>
							<td>Especialidade</td>
							<td>{{$pacientes->especialidade->cd_especialidade}} - {{$pacientes->especialidade->ds_especialidade}}</td>
						</tr>
						@endif
						@if ( $pacientes->cargo != null )
						<tr>
							<td>Profissão</td>
							<td>{{$pacientes->cargo->cd_cargo}} - {{$pacientes->cargo->ds_cargo}}</td>
						</tr>
						@endif
						@foreach( $pacientes->documentos as $documento )
						<tr>
							<td>Documento</td>
							<td>{{$documento->tp_documento}} - {{$documento->te_documento}}</td>
						</tr>
						@endforeach 
						@foreach ( $pacientes->contatos as $contato )
						<tr>
							<td>Contato</td>
							<td>   
             	 			@switch( $contato->tp_contato )
            	 				@case('FR')  Fixo Residencial   @Break
            	 				@case('FC')  Fixo Comercial     @Break
            	 				@case('CP')  Celular Pessoal    @Break
            	 				@case('CC')  Celular Comercial  @Break
            	 				@case('FX')  FAX  				@Break
                	 		@endswitch
							-
							{{$contato->ds_contato}}</td>
						</tr>
						@endforeach 
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('clientes.edit', $pacientes->user->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('clientes.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection