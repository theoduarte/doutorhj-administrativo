@extends('layouts.master')

@section('title', 'Doutor HJ: Editar Logradouros')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('logradouros.index') }}">Lista de Logradouros</a></li>
					<li class="breadcrumb-item active">Editar Logradouro</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Logradouro</h4>
				
				<form action="{{ route('logradouros.update', $logradouro->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="te_logradouro">Logradouro<span class="text-danger">*</span></label>
						<input type="text" id="te_logradouro" class="form-control" name="te_logradouro" value="{{ $logradouro->te_logradouro }}" required placeholder="Logradouro"  >
					</div>
					
					<div class="row">
						<div class="col-sm-12 col-md-2">
                            <div class="form-group{{ $errors->has('nr_cep') | $errors->has('cd_cidade_ibge') ? ' has-error' : '' }}">
                                <label for="nr_cep" class="control-label">CEP<span class="text-danger">*</span></label>
                                <input id="nr_cep" type="text" class="form-control mascaraCEP consultaCep" name="nr_cep" value="{{ $logradouro->nr_cep }}" required  maxlength="10">
                            </div>
                        </div>
						<div class="col-sm-12 col-md-3">
        					<div class="form-group {{ $errors->has('tp_logradouro') ? ' has-error' : '' }}">
                                <label for="tp_logradouro" class="control-label">Tipo de Logradouro<span class="text-danger">*</span></label>
                                <select id="tp_logradouro" name="tp_logradouro" class="form-control" required>
                                    <option value="" selected="selected"></option>
                                    <option value="Aeroporto" @if ( $logradouro->tp_logradouro == 'Aeroporto') selected="selected" @endif>Aeroporto</option>
                                    <option value="Alameda" @if ( $logradouro->tp_logradouro == 'Alameda') selected="selected" @endif>Alameda</option>
                                    <option value="Área" @if ( $logradouro->tp_logradouro == 'Área') selected="selected" @endif>Área</option>
                                    <option value="Avenida" @if ( $logradouro->tp_logradouro == 'Avenida') selected="selected" @endif>Avenida</option>
                                    <option value="Campo" @if ( $logradouro->tp_logradouro == 'Campo') selected="selected" @endif>Campo</option>
                                    <option value="Chácara" @if ( $logradouro->tp_logradouro == 'Chácara') selected="selected" @endif>Chácara</option>
                                    <option value="Colônia" @if ( $logradouro->tp_logradouro == 'Colônia') selected="selected" @endif>Colônia</option>
                                    <option value="Condomínio" @if ( $logradouro->tp_logradouro == 'Condomínio') selected="selected" @endif>Condomínio</option>
                                    <option value="Conjunto" @if ( $logradouro->tp_logradouro == 'Conjunto') selected="selected" @endif>Conjunto</option>
                                    <option value="Distrito" @if ( $logradouro->tp_logradouro == 'Distrito') selected="selected" @endif>Distrito</option>
                                    <option value="Esplanada" @if ( $logradouro->tp_logradouro == 'Esplanada') selected="selected" @endif>Esplanada</option>
                                    <option value="Estação" @if ( $logradouro->tp_logradouro == 'Estação') selected="selected" @endif>Estação</option>
                                    <option value="Estrada" @if ( $logradouro->tp_logradouro == 'Estrada') selected="selected" @endif>Estrada</option>
                                    <option value="Favela" @if ( $logradouro->tp_logradouro == 'Favela') selected="selected" @endif>Favela</option>
                                    <option value="Feira" @if ( $logradouro->tp_logradouro == 'Feira') selected="selected" @endif>Feira</option>
                                    <option value="Jardim" @if ( $logradouro->tp_logradouro == 'Jardim') selected="selected" @endif>Jardim</option>
                                    <option value="Ladeira" @if ( $logradouro->tp_logradouro == 'Ladeira') selected="selected" @endif>Ladeira</option>
                                    <option value="Lago" @if ( $logradouro->tp_logradouro == 'Lago') selected="selected" @endif>Lago</option>
                                    <option value="Lagoa" @if ( $logradouro->tp_logradouro == 'Lagoa') selected="selected" @endif>Lagoa</option>
                                    <option value="Largo" @if ( $logradouro->tp_logradouro == 'Aeroporto') selected="selected" @endif>Largo</option>
                                    <option value="Loteamento" @if ( $logradouro->tp_logradouro == 'Loteamento') selected="selected" @endif>Loteamento</option>
                                    <option value="Morro" @if ( $logradouro->tp_logradouro == 'Morro') selected="selected" @endif>Morro</option>
                                    <option value="Núcleo" @if ( $logradouro->tp_logradouro == 'Núcleo') selected="selected" @endif>Núcleo</option>
                                    <option value="Parque" @if ( $logradouro->tp_logradouro == 'Parque') selected="selected" @endif>Parque</option>
                                    <option value="Passarela" @if ( $logradouro->tp_logradouro == 'Passarela') selected="selected" @endif>Passarela</option>
                                    <option value="Pátio" @if ( $logradouro->tp_logradouro == 'Pátio') selected="selected" @endif>Pátio</option>
                                    <option value="Praça" @if ( $logradouro->tp_logradouro == 'Praça') selected="selected" @endif>Praça</option>
                                    <option value="Quadra" @if ( $logradouro->tp_logradouro == 'Quadra') selected="selected" @endif>Quadra</option>
                                    <option value="Recanto" @if ( $logradouro->tp_logradouro == 'Recanto') selected="selected" @endif>Recanto</option>
                                    <option value="Residencial" @if ( $logradouro->tp_logradouro == 'Residencial') selected="selected" @endif>Residencial</option>
                                    <option value="Rodovia" @if ( $logradouro->tp_logradouro == 'Rodovia') selected="selected" @endif>Rodovia</option>
                                    <option value="Rua" @if ( $logradouro->tp_logradouro == 'Rua') selected="selected" @endif>Rua</option>
                                    <option value="Setor" @if ( $logradouro->tp_logradouro == 'Setor') selected="selected" @endif>Setor</option>
                                    <option value="Sítio" @if ( $logradouro->tp_logradouro == 'Sítio') selected="selected" @endif>Sítio</option>
                                    <option value="Travessa" @if ( $logradouro->tp_logradouro == 'Travessa') selected="selected" @endif>Travessa</option>
                                    <option value="Trecho" @if ( $logradouro->tp_logradouro == 'Trecho') selected="selected" @endif>Trecho</option>
                                    <option value="Trevo" @if ( $logradouro->tp_logradouro == 'Trevo') selected="selected" @endif>Trevo</option>
                                    <option value="Vale" @if ( $logradouro->tp_logradouro == 'Vale') selected="selected" @endif>Vale</option>
                                    <option value="Vereda" @if ( $logradouro->tp_logradouro == 'Vereda') selected="selected" @endif>Vereda</option>
                                    <option value="Via" @if ( $logradouro->tp_logradouro == 'Via') selected="selected" @endif>Via</option>
                                    <option value="Viaduto" @if ( $logradouro->tp_logradouro == 'Viaduto') selected="selected" @endif>Viaduto</option>
                                    <option value="Viela" @if ( $logradouro->tp_logradouro == 'Viela') selected="selected" @endif>Viela</option>
                                    <option value="Vila" @if ( $logradouro->tp_logradouro == 'Vila') selected="selected" @endif>Vila</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-1">
                            <div class="form-group{{ $errors->has('nr_ddd') ? ' has-error' : '' }}">
                                <label for="nr_ddd" class="control-label">DDD<span class="text-danger">*</span></label>
                                <input id="nr_ddd" type="text" class="form-control" name="nr_ddd" value="{{ $logradouro->nr_ddd }}" required  maxlength="3">
                            </div>
                        </div>
						<div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
                                <label for="te_bairro" class="control-label">Bairro<span class="text-danger">*</span></label>
                                <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ $logradouro->te_bairro }}" required  maxlength="50">
                            </div>
                        </div>
                    </div>
					
					<div class="row">
    					<div class="col-sm-12 col-md-2">
                            <div class="form-group{{ $errors->has('altitude') ? ' has-error' : '' }}">
                                <label for="altitude" class="control-label">Altitude<span class="text-danger">*</span></label>
                                <input id="altitude" type="text" class="form-control" name="altitude" value="{{ $logradouro->altitude }}" required  maxlength="50">
                            </div>
                        </div>
    					
    					<div class="col-sm-3 col-md-2">
                            <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                                <label for="latitude" class="control-label">Latitude<span class="text-danger">*</span></label>
                                <input id="latitude" type="text" class="form-control" name="latitude" value="{{ $logradouro->latitude }}" required  maxlength="50">
                                <!-- onkeypress="onlyNumbers(event)" -->
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-2">
                            <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                                <label for="longitude" class="control-label">Longitude<span class="text-danger">*</span></label>
                                <input id="longitude" type="text" class="form-control" name="longitude" value="{{ $logradouro->longitude }}" required  maxlength="50">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    	<div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                                <label for="cidade_id" class="control-label">Cidade<span class="text-danger">*</span></label>
                                <select id="cidade_id" name="cidade_id" class="form-control">
                                    <option></option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade->id }}" uf="{{ $cidade->estado->sg_estado }}" ibge="{{ $cidade->cd_ibge }}" @if ( $logradouro->cidade_id == $cidade->id) selected="selected" @endif >{{ $cidade->nm_cidade }} - {{ $cidade->estado->sg_estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group{{ $errors->has('cd_ibge') ? ' has-error' : '' }}">
                                <label for="cd_ibge" class="control-label">Cód. IBGE<span class="text-danger">*</span></label>
                                <input type="text" id="cd_ibge" class="form-control" name="cd_ibge" value="{{ $logradouro->cd_ibge }}" placeholder="Cód. IBGE" readonly >
                            </div>
                        </div>
                                  
                    	<div class="col-sm-12 col-md-2">
                            <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                                <label for="sg_estado" class="control-label">UF<span class="text-danger">*</span></label>
                                <input type="text" id="sg_estado" class="form-control" name="sg_estado" value="{{ $logradouro->sg_estado }}" placeholder="UF" readonly >
                            </div>
                        </div>
                    </div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('logradouros.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection