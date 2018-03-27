@extends('layouts.master')

@section('title', 'Gestão de Profissionais')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('profissionais.index') }}">Lista de Profissionais</a></li>
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
							<td width="75%">{{ $profissionais->id }}</td>
						</tr>
						<tr>
							<td>Nome</td>
							<td>{{$profissionais->nm_primario}} {{$profissionais->nm_secundario}}</td>
						</tr>
						<tr>
							<td>Sexo</td>
							<td>{{( $profissionais->cs_sexo == 'F' ) ? 'Feminino' : 'Masculino'}}</td>
						</tr>
						<tr>
							<td>Nascimento</td>
							<td>{{$profissionais->dt_nascimento}}</td>
						</tr>
						@if ( $profissionais->especialidade != null )
						<tr>
							<td>Especialidade</td>
							<td>{{$profissionais->especialidade->cd_especialidade}} - {{$profissionais->especialidade->ds_especialidade}}</td>
						</tr>
						@endif
						@foreach( $profissionais->documentos as $documento )
						<tr>
							<td>Documento</td>
							<td>{{$documento->tp_documento}} - {{$documento->te_documento}}</td>
						</tr>
						@endforeach 
						@foreach ( $profissionais->contatos as $contato )
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
							<td>{{$profissionais->enderecos->first()->nr_cep}}</td>
						</tr>
						<tr>
							<td>Logradouro</td>
							<td>{{$profissionais->enderecos->first()->sg_logradouro}}</td>
						</tr>
						<tr>
							<td>Endereço</td>
							<td>{{ $profissionais->enderecos->first()->te_endereco }}</td>
						</tr>
						<tr>
							<td>Número</td>
							<td>{{$profissionais->enderecos->first()->nr_logradouro}}</td>
						</tr>
						<tr>
							<td>Complemento</td>
							<td>{{ $profissionais->enderecos->first()->te_complemento }}</td>
						</tr>
						<tr>
							<td>Bairro</td>
							<td>{{ $profissionais->enderecos->first()->te_bairro }}</td>
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
							<td>{{$profissionais->user->email}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('profissionais.edit', $profissionais->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('profissionais.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection