@extends('layouts.master')

@section('title', 'Doutor HJ: Adicionar Endereço')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('enderecos.index') }}">Lista de Cargos</a></li>
					<li class="breadcrumb-item active">Adicionar Endereço</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Endereço</h4>
				
				<form action="{{ route('enderecos.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="te_endereco">Logradouro<span class="text-danger">*</span></label>
						<input type="text" id="te_endereco" class="form-control" name="te_endereco" required placeholder="Logradouro"  >
					</div>
					
					<div class="row">
						<div class="col-sm-12 col-md-2">
                            <div class="form-group{{ $errors->has('nr_cep') | $errors->has('cd_cidade_ibge') ? ' has-error' : '' }}">
                                <label for="nr_cep" class="control-label">CEP<span class="text-danger">*</span></label>
                                <input id="nr_cep" type="text" class="form-control mascaraCEP consultaCep" name="nr_cep" value="{{ old('nr_cep') }}" required  maxlength="10">
                            </div>
                        </div>
						<div class="col-sm-12 col-md-3">
        					<div class="form-group {{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
                                <label for="sg_logradouro" class="control-label">Tipo de Logradouro<span class="text-danger">*</span></label>
                                <select id="sg_logradouro" name="sg_logradouro" class="form-control" required>
                                    <option value="" selected="selected"></option>
                                    <option value="Aeroporto" @if ( old('sg_logradouro') == 'Aeroporto') selected="selected" @endif>Aeroporto</option>
                                    <option value="Alameda" @if ( old('sg_logradouro') == 'Alameda') selected="selected" @endif>Alameda</option>
                                    <option value="Área" @if ( old('sg_logradouro') == 'Área') selected="selected" @endif>Área</option>
                                    <option value="Avenida" @if ( old('sg_logradouro') == 'Avenida') selected="selected" @endif>Avenida</option>
                                    <option value="Campo" @if ( old('sg_logradouro') == 'Campo') selected="selected" @endif>Campo</option>
                                    <option value="Chácara" @if ( old('sg_logradouro') == 'Chácara') selected="selected" @endif>Chácara</option>
                                    <option value="Colônia" @if ( old('sg_logradouro') == 'Colônia') selected="selected" @endif>Colônia</option>
                                    <option value="Condomínio" @if ( old('sg_logradouro') == 'Condomínio') selected="selected" @endif>Condomínio</option>
                                    <option value="Conjunto" @if ( old('sg_logradouro') == 'Conjunto') selected="selected" @endif>Conjunto</option>
                                    <option value="Distrito" @if ( old('sg_logradouro') == 'Distrito') selected="selected" @endif>Distrito</option>
                                    <option value="Esplanada" @if ( old('sg_logradouro') == 'Esplanada') selected="selected" @endif>Esplanada</option>
                                    <option value="Estação" @if ( old('sg_logradouro') == 'Estação') selected="selected" @endif>Estação</option>
                                    <option value="Estrada" @if ( old('sg_logradouro') == 'Estrada') selected="selected" @endif>Estrada</option>
                                    <option value="Favela" @if ( old('sg_logradouro') == 'Favela') selected="selected" @endif>Favela</option>
                                    <option value="Feira" @if ( old('sg_logradouro') == 'Feira') selected="selected" @endif>Feira</option>
                                    <option value="Jardim" @if ( old('sg_logradouro') == 'Jardim') selected="selected" @endif>Jardim</option>
                                    <option value="Ladeira" @if ( old('sg_logradouro') == 'Ladeira') selected="selected" @endif>Ladeira</option>
                                    <option value="Lago" @if ( old('sg_logradouro') == 'Lago') selected="selected" @endif>Lago</option>
                                    <option value="Lagoa" @if ( old('sg_logradouro') == 'Lagoa') selected="selected" @endif>Lagoa</option>
                                    <option value="Largo" @if ( old('sg_logradouro') == 'Aeroporto') selected="selected" @endif>Largo</option>
                                    <option value="Loteamento" @if ( old('sg_logradouro') == 'Loteamento') selected="selected" @endif>Loteamento</option>
                                    <option value="Morro" @if ( old('sg_logradouro') == 'Morro') selected="selected" @endif>Morro</option>
                                    <option value="Núcleo" @if ( old('sg_logradouro') == 'Núcleo') selected="selected" @endif>Núcleo</option>
                                    <option value="Parque" @if ( old('sg_logradouro') == 'Parque') selected="selected" @endif>Parque</option>
                                    <option value="Passarela" @if ( old('sg_logradouro') == 'Passarela') selected="selected" @endif>Passarela</option>
                                    <option value="Pátio" @if ( old('sg_logradouro') == 'Pátio') selected="selected" @endif>Pátio</option>
                                    <option value="Praça" @if ( old('sg_logradouro') == 'Praça') selected="selected" @endif>Praça</option>
                                    <option value="Quadra" @if ( old('sg_logradouro') == 'Quadra') selected="selected" @endif>Quadra</option>
                                    <option value="Recanto" @if ( old('sg_logradouro') == 'Recanto') selected="selected" @endif>Recanto</option>
                                    <option value="Residencial" @if ( old('sg_logradouro') == 'Residencial') selected="selected" @endif>Residencial</option>
                                    <option value="Rodovia" @if ( old('sg_logradouro') == 'Rodovia') selected="selected" @endif>Rodovia</option>
                                    <option value="Rua" @if ( old('sg_logradouro') == 'Rua') selected="selected" @endif>Rua</option>
                                    <option value="Setor" @if ( old('sg_logradouro') == 'Setor') selected="selected" @endif>Setor</option>
                                    <option value="Sítio" @if ( old('sg_logradouro') == 'Sítio') selected="selected" @endif>Sítio</option>
                                    <option value="Travessa" @if ( old('sg_logradouro') == 'Travessa') selected="selected" @endif>Travessa</option>
                                    <option value="Trecho" @if ( old('sg_logradouro') == 'Trecho') selected="selected" @endif>Trecho</option>
                                    <option value="Trevo" @if ( old('sg_logradouro') == 'Trevo') selected="selected" @endif>Trevo</option>
                                    <option value="Vale" @if ( old('sg_logradouro') == 'Vale') selected="selected" @endif>Vale</option>
                                    <option value="Vereda" @if ( old('sg_logradouro') == 'Vereda') selected="selected" @endif>Vereda</option>
                                    <option value="Via" @if ( old('sg_logradouro') == 'Via') selected="selected" @endif>Via</option>
                                    <option value="Viaduto" @if ( old('sg_logradouro') == 'Viaduto') selected="selected" @endif>Viaduto</option>
                                    <option value="Viela" @if ( old('sg_logradouro') == 'Viela') selected="selected" @endif>Viela</option>
                                    <option value="Vila" @if ( old('sg_logradouro') == 'Vila') selected="selected" @endif>Vila</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-1">
                            <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
                                <label for="nr_logradouro" class="control-label">Número<span class="text-danger">*</span></label>
                                <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ old('nr_logradouro') }}" required  maxlength="50">
                            </div>
                        </div>
						<div class="col-sm-12 col-md-6">
                            <div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
                                <label for="te_bairro" class="control-label">Bairro<span class="text-danger">*</span></label>
                                <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ old('te_bairro') }}" required  maxlength="50">
                            </div>
                        </div>
                    </div>
					
					<div class="row">
    					<div class="col-sm-6 col-md-8">
        					<div class="form-group">
        						<label for="te_complemento_logradouro">Complemento<span class="text-danger">*</span></label>
        						<input type="text" id="te_complemento_logradouro" class="form-control" name="te_complemento_logradouro" required placeholder="Complemento" >
        					</div>
        				</div>
    					
    					<div class="col-sm-3 col-md-2">
                            <div class="form-group{{ $errors->has('nr_latitude_gps') ? ' has-error' : '' }}">
                                <label for="nr_latitude_gps" class="control-label">Latitude<span class="text-danger">*</span></label>
                                <input id="nr_latitude_gps" type="text" class="form-control" name="nr_latitude_gps" value="{{ old('nr_latitude_gps') }}" required  maxlength="50">
                                <!-- onkeypress="onlyNumbers(event)" -->
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-2">
                            <div class="form-group{{ $errors->has('nr_longitute_gps') ? ' has-error' : '' }}">
                                <label for="nr_longitute_gps" class="control-label">Longitude<span class="text-danger">*</span></label>
                                <input id="nr_longitute_gps" type="text" class="form-control" name="nr_longitute_gps" value="{{ old('nr_longitute_gps') }}" required  maxlength="50">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                    	<div class="col-sm-12 col-md-8">
                            <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                                <label for="cidade_id" class="control-label">Cidade<span class="text-danger">*</span></label>
                                <select id="cidade_id" name="cidade_id" class="form-control">
                                    <option></option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade->id }}" uf="{{ $cidade->estado->sg_estado }}" @if ( old('cidade_id') == $cidade->id) selected="selected" @endif >{{ $cidade->nm_cidade }} - {{ $cidade->estado->sg_estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                 
                    	<div class="col-sm-12 col-md-4">
                            <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                                <label for="sg_estado" class="control-label">UF<span class="text-danger">*</span></label>
                                <input type="text" id="sg_estado" class="form-control" placeholder="Estado" readonly >
                            </div>
                        </div>
                    </div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('enderecos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	
    $( "#cidade_id" ).change(function() {
        var uf = $('option:selected', this).attr('uf');
        $('#sg_estado').val(uf);
    });
    
});

</script>
@endsection