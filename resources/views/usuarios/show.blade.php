@extends('layouts.master')

@section('title', 'Gestão de Usuários')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Lista de Cargos</a></li>
					<li class="breadcrumb-item active">Detalhes do Cargo</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				@if ( $objGenerico->user->tp_user == 'PAC' )
					<h4 class="header-title m-t-0 m-b-20">Detalhes do Paciente</h4>
				@elseif( $objGenerico->user->tp_user == 'PRO' )
					<h4 class="header-title m-t-0 m-b-20">Detalhes do Profissional</h4>
				@endif
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código</td>
							<td width="75%">{{ $objGenerico->id }}</td>
						</tr>
						<tr>
							<td>Primeiro Nome</td>
							<td>{{$objGenerico->nm_primario}}</td>
						</tr>
						<tr>
							<td>Sobrenome</td>
							<td>{{$objGenerico->nm_secundario}}</td>
						</tr>
						<tr>
							<td>Sexo</td>
							<td>{{( $objGenerico->cs_sexo == 'F' ) ? 'Feminino' : 'Masculino'}}</td>
						</tr>
						<tr>
							<td>Nascimento</td>
							<td>{{$objGenerico->dt_nascimento}}</td>
						</tr>
						@if ( !empty($objGenerico->especialidades->cd_especialidade) )
						<tr>
							<td>Especialidade</td>
							<td>{{$objGenerico->especialidades->cd_especialidade}}-$objGenerico->especialidades->ds_especialidade</td>
						</tr>
						@endif
						@if ( !empty($objGenerico->cargo->cd_cargo) )
						<tr>
							<td>Profissão</td>
							<td>{{$objGenerico->cargo->cd_cargo}} | {{$objGenerico->cargo->ds_cargo}}</td>
						</tr>
						@endif
						@foreach( $objGenerico->documentos as $documento )
						<tr>
							<td>Documento</td>
							<td>{{$documento->tp_documento}} | {{$documento->te_documento}}</td>
						</tr>
						@endforeach 
						@foreach ( $objGenerico->contatos as $contato )
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
						<tr>
							<td>CEP</td>
							<td>{{$objGenerico->enderecos->first()->nr_cep}}</td>
						</tr>
						<tr>
							<td>Logradouro</td>
							<td>{{$objGenerico->enderecos->first()->sg_logradouro}}</td>
						</tr>
						<tr>
							<td>Endereço</td>
							<td>{{ $objGenerico->enderecos->first()->te_endereco }}</td>
						</tr>
						<tr>
							<td>Número</td>
							<td>{{$objGenerico->enderecos->first()->nr_logradouro}}</td>
						</tr>
						<tr>
							<td>Complemento</td>
							<td>{{ $objGenerico->enderecos->first()->te_complemento }}</td>
						</tr>
						<tr>
							<td>Bairro</td>
							<td>{{ $objGenerico->enderecos->first()->te_bairro }}</td>
						</tr>
						<tr>
							<td>Cidade</td>
							<td>{{$cidade->nm_cidade}}</td>
						</tr>
						<tr>
							<td>Estado</td>
							<td>{{$cidade->ds_estado}}</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>{{$objGenerico->user->email}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('usuarios.edit', $objGenerico->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('usuarios.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection