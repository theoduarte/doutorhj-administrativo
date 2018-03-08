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
					<li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Lista de Usuários</a></li>
					<li class="breadcrumb-item active">Editar Usuário</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Usuários</h4>
				
				<form action="{{ route('usuarios.update', $objGenerico->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="nm_primario">Primeiro nome<span class="text-danger">*</span></label>
						<input type="text" id="nm_primario" class="form-control" name="nm_primario" value="{{$objGenerico->nm_primario}}" required placeholder="Primeiro nome"  >
					</div>
					<div class="form-group">
						<label for="nm_primario">Sobrenome<span class="text-danger">*</span></label>
						<input type="text" id="nm_secundario" class="form-control" name="nm_secundario" value="{{$objGenerico->nm_secundario}}" required placeholder=""  >	
					</div>
                    <div class="form-group">
                    	<label for="cs_sexo" class="control-label">Sexo</label>
						<select id="cs_sexo" class="form-control" name="cs_sexo" required autofocus > 
							<option value="M"  {{( $objGenerico->cs_sexo == 'M' ) ? 'selected' : ''}} >MASCULINO</option>
							<option value="F" {{( $objGenerico->cs_sexo == 'F' ) ? 'selected' : ''}} >FEMININO</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label for="dt_nascimento" class="control-label">Data de Nascimento</label>
              			<input id="dt_nascimento" type="text" class="form-control mascaraData" name="dt_nascimento" value="{{$objGenerico->dt_nascimento}}" required autofocus >
                    </div>



					@if ( !empty($objGenerico->especialidades->cd_especialidade) )
                    <div class="form-group{{ $errors->has('cd_especialidade') ? ' has-error' : '' }}">
                        <label for="cd_especialidade" class="col-md-3 control-label">Especialidade</label>
						
                        <div class="col-md-5">
                      		<div class="ui-widget">
								<select id="cd_especialidade" class="form-control" name="cd_especialidade" required autofocus>
                                    @foreach ($arEspecialidade as $json)
        								<option value="{{ $json->cd_especialidade }}" {{($objGenerico->especialidades->cd_especialidade == $json->cd_especialidade ? 'selected' : '')}}>{{ $json->ds_especialidade }}</option>
                                    @endforeach
    							</select>
                            </div>
                        </div>
                    </div>	
					@endif
					
					
					@if ( !empty($objGenerico->cargo->cd_cargo) )
                    <div class="form-group{{ $errors->has('ds_cargo') ? ' has-error' : '' }}">
                        <label for="ds_cargo" class="col-md-3 control-label">Qual a sua profissão?</label>
						
                        <div class="col-md-5">
                      	    <div class="ui-widget">
                                <input  type="text" class="form-control" id="ds_cargo" value="{{$objGenerico->cargo->cd_cargo}} | {{$objGenerico->cargo->ds_cargo}}" >
								<input type="hidden" name="cargo_id" id="cargo_id" value="{{$objGenerico->cargo->id}}">
                            </div>
                        </div>
                    </div>	
					@endif
					
						
					
					<div class="form-group">
						@foreach( $objGenerico->documentos as $documento )
							<div class="row justify-content-between">
                                    <div class="col-8">
        								<input type="hidden" name="documentos_id[]" value="{{$documento->id}}">
        					            <label for="tp_documento" class="control-label">Documento</label>
            							<select name="tp_documento[]" class="form-control">
        									@if ( trim($documento->tp_documento) != 'CRM')
            									<option value="CNH" {{ (trim($documento->tp_documento) == 'CNH') ? 'selected' : '' }}>CNH</option>
            									<option value="RG"  {{ (trim($documento->tp_documento) == 'RG' ) ? 'selected' : '' }}>RG</option>
            									<option value="CPF" {{ (trim($documento->tp_documento) == 'CPF') ? 'selected' : '' }}>CPF</option>
            									<option value="TRE" {{ (trim($documento->tp_documento) == 'TRE') ? 'selected' : '' }}>Título de Eleitor</option>
        									@elseif ( trim($documento->tp_documento) == 'CRM')
        										<option value="CRM" {{ (trim($documento->tp_documento) == 'CRM') ? 'selected' : '' }}>CRM</option>
        									@endif
        								</select>
                                    </div>
    						        <div class="col-8">
            							<input type="text" placeholder="" class="form-control" name="te_documento[]" value="{{$documento->te_documento}}" required autofocus >                                   
                                    </div> 
                                    @if ( trim($documento->tp_documento) == 'CRM')
                                    <div class="col-md-2">
            							<select id="uf_crm" name="estado_id[]" class="form-control" required autofocus>
                                            @foreach ($arEstados as $json)
                								<option value="{{ $json->id }}" {{($documento->estado_id == $json->id ? 'selected' : '')}}>{{ $json->sg_estado }}</option>
                                            @endforeach
            							</select>
                                    </div>
                                    @endif
                            </div>
                     	@endforeach           
					</div>
					
							
											
					<div class="col-md-10">
		
						@foreach ( $objGenerico->contatos as $contato )
						<div class="col-md-10">
                        	<input type="hidden" value="{{$contato->id}}" name="contato_id[]">
						    <div class="form-group{{ $errors->has('tp_contato1') ? ' has-error' : '' }}">
                                <label for="tp_contato" class="col-md-4 control-label">Telefone</label>
                                <div class="col-md-4">
        							<select name="tp_contato[]" class="form-control"  >
    									<option value="FR" {{ ($contato->tp_contato == 'FR') ? 'selected' : ''}}>Fixo Residencial</option>
    									<option value="FC" {{ ($contato->tp_contato == 'FC') ? 'selected' : ''}}>Fixo Comercial</option>
    									<option value="CP" {{ ($contato->tp_contato == 'CP') ? 'selected' : ''}}>Celular Pessoal</option>
    									<option value="CC" {{ ($contato->tp_contato == 'CC') ? 'selected' : ''}}>Celular Comercial</option>
    									<option value="FX" {{ ($contato->tp_contato == 'FX') ? 'selected' : ''}}>FAX</option>
    								</select>
                                </div> 
						        <div class="col-md-4">
        							<input type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato[]" value="{{$contato->ds_contato}}" required  autofocus>
                                </div> 
                            </div>
                        </div>
						@endforeach
					</div>


						


					
                    <div class="form-group{{ $errors->has('nr_cep') ? ' has-error' : '' }}">
                        <label for="nr_cep" class="col-md-3 control-label">CEP</label>

                        <div class="col-md-2">
                            <input id="nr_cep" type="text" class="form-control mascaraCep consultaCep" name="nr_cep" value="{{$objGenerico->enderecos->first()->nr_cep}}" required autofocus maxlength="9" >
                            <input type="hidden" name="endereco_id" value="{{$objGenerico->enderecos->first()->id}}">
                        </div>
                    </div>
					
					
					
				    <div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
                        <label for="sg_logradouro" class="col-md-3 control-label">Logradouro</label>
                        <div class="col-md-2">
							<select id="sg_logradouro" name="sg_logradouro" class="form-control" required="required"  >
								<option value="" selected="selected"></option>
                                <option value="Aeroporto" {{($objGenerico->enderecos->first()->sg_logradouro == 'Aeroporto' ? 'selected' : '')}}>Aeroporto</option>
                                <option value="Alameda" {{($objGenerico->enderecos->first()->sg_logradouro == 'Alameda' ? 'selected' : '')}}>Alameda</option>
                                <option value="Área" {{($objGenerico->enderecos->first()->sg_logradouro == 'Área' ? 'selected' : '')}}>Área</option>
                                <option value="Avenida" {{($objGenerico->enderecos->first()->sg_logradouro == 'Avenida' ? 'selected' : '')}}>Avenida</option>
                                <option value="Campo" {{($objGenerico->enderecos->first()->sg_logradouro == 'Campo' ? 'selected' : '')}}>Campo</option>
                                <option value="Chácara" {{($objGenerico->enderecos->first()->sg_logradouro == 'Chácara' ? 'selected' : '')}}>Chácara</option>
                                <option value="Colônia" {{($objGenerico->enderecos->first()->sg_logradouro == 'Colônia' ? 'selected' : '')}}>Colônia</option>
                                <option value="Condomínio" {{($objGenerico->enderecos->first()->sg_logradouro == 'Condomínio' ? 'selected' : '')}}>Condomínio</option>
                                <option value="Conjunto" {{($objGenerico->enderecos->first()->sg_logradouro == 'Conjunto' ? 'selected' : '')}}>Conjunto</option>
                                <option value="Distrito" {{($objGenerico->enderecos->first()->sg_logradouro == 'Distrito' ? 'selected' : '')}}>Distrito</option>
                                <option value="Esplanada" {{($objGenerico->enderecos->first()->sg_logradouro == 'Esplanada' ? 'selected' : '')}}>Esplanada</option>
                                <option value="Estação" {{($objGenerico->enderecos->first()->sg_logradouro == 'Estação' ? 'selected' : '')}}>Estação</option>
                                <option value="Estrada" {{($objGenerico->enderecos->first()->sg_logradouro == 'Estrada' ? 'selected' : '')}}>Estrada</option>
                                <option value="Favela" {{($objGenerico->enderecos->first()->sg_logradouro == 'Favela' ? 'selected' : '')}}>Favela</option>
                                <option value="Feira" {{($objGenerico->enderecos->first()->sg_logradouro == 'Feira' ? 'selected' : '')}}>Feira</option>
                                <option value="Jardim" {{($objGenerico->enderecos->first()->sg_logradouro == 'Jardim' ? 'selected' : '')}}>Jardim</option>
                                <option value="Ladeira" {{($objGenerico->enderecos->first()->sg_logradouro == 'Ladeira' ? 'selected' : '')}}>Ladeira</option>
                                <option value="Lago" {{($objGenerico->enderecos->first()->sg_logradouro == 'Lago' ? 'selected' : '')}}>Lago</option>
                                <option value="Lagoa" {{($objGenerico->enderecos->first()->sg_logradouro == 'Lagoa' ? 'selected' : '')}}>Lagoa</option>
                                <option value="Largo" {{($objGenerico->enderecos->first()->sg_logradouro == 'Largo' ? 'selected' : '')}}>Largo</option>
                                <option value="Loteamento" {{($objGenerico->enderecos->first()->sg_logradouro == 'Loteamento' ? 'selected' : '')}}>Loteamento</option>
                                <option value="Morro" {{($objGenerico->enderecos->first()->sg_logradouro == 'Morro' ? 'selected' : '')}}>Morro</option>
                                <option value="Núcleo" {{($objGenerico->enderecos->first()->sg_logradouro == 'Núcleo' ? 'selected' : '')}}>Núcleo</option>
                                <option value="Parque" {{($objGenerico->enderecos->first()->sg_logradouro == 'Parque' ? 'selected' : '')}}>Parque</option>
                                <option value="Passarela" {{($objGenerico->enderecos->first()->sg_logradouro == 'Passarela' ? 'selected' : '')}}>Passarela</option>
                                <option value="Pátio" {{($objGenerico->enderecos->first()->sg_logradouro == 'Pátio' ? 'selected' : '')}}>Pátio</option>
                                <option value="Praça" {{($objGenerico->enderecos->first()->sg_logradouro == 'Praça' ? 'selected' : '')}}>Praça</option>
                                <option value="Quadra" {{($objGenerico->enderecos->first()->sg_logradouro == 'Quadra' ? 'selected' : '')}}>Quadra</option>
                                <option value="Recanto" {{($objGenerico->enderecos->first()->sg_logradouro == 'Recanto' ? 'selected' : '')}}>Recanto</option>
                                <option value="Residencial" {{($objGenerico->enderecos->first()->sg_logradouro == 'Residencial' ? 'selected' : '')}}>Residencial</option>
                                <option value="Rodovia" {{($objGenerico->enderecos->first()->sg_logradouro == 'Rodovia' ? 'selected' : '')}}>Rodovia</option>
                                <option value="Rua" {{($objGenerico->enderecos->first()->sg_logradouro == 'Rua' ? 'selected' : '')}}>Rua</option>
                                <option value="Setor" {{($objGenerico->enderecos->first()->sg_logradouro == 'Setor' ? 'selected' : '')}}>Setor</option>
                                <option value="Sítio" {{($objGenerico->enderecos->first()->sg_logradouro == 'Sítio' ? 'selected' : '')}}>Sítio</option>
                                <option value="Travessa" {{($objGenerico->enderecos->first()->sg_logradouro == 'Travessa' ? 'selected' : '')}}>Travessa</option>
                                <option value="Trecho" {{($objGenerico->enderecos->first()->sg_logradouro == 'Trecho' ? 'selected' : '')}}>Trecho</option>
                                <option value="Trevo" {{($objGenerico->enderecos->first()->sg_logradouro == 'Trevo' ? 'selected' : '')}}>Trevo</option>
                                <option value="Vale" {{($objGenerico->enderecos->first()->sg_logradouro == 'Vale' ? 'selected' : '')}}>Vale</option>
                                <option value="Vereda" {{($objGenerico->enderecos->first()->sg_logradouro == 'Vereda' ? 'selected' : '')}}>Vereda</option>
                                <option value="Via" {{($objGenerico->enderecos->first()->sg_logradouro == 'Via' ? 'selected' : '')}}>Via</option>
                                <option value="Viaduto" {{($objGenerico->enderecos->first()->sg_logradouro == 'Viaduto' ? 'selected' : '')}}>Viaduto</option>
                                <option value="Viela" {{($objGenerico->enderecos->first()->sg_logradouro == 'Viela' ? 'selected' : '')}}>Viela</option>
                                <option value="Vila" {{($objGenerico->enderecos->first()->sg_logradouro == 'Vila' ? 'selected' : '')}}>Vila</option>
							</select>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('te_endereco') ? ' has-error' : '' }}">
                        <label for="te_endereco" class="col-md-3 control-label">Endereço</label>
						
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="te_endereco" value="{{ $objGenerico->enderecos->first()->te_endereco }}" required autofocus maxlength="200" >
                        </div>
                    </div>	

                    <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
                        <label for="nr_logradouro" class="col-md-3 control-label">Número</label>

                        <div class="col-md-2">
                            <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ $objGenerico->enderecos->first()->nr_logradouro }}" required autofocus maxlength="50" >
                        </div>
                    </div>
					
                    <div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
                        <label for="te_complemento" class="col-md-3 control-label">Complemento</label>

                        <div class="col-md-6">
                     		<textarea rows="5" cols="60" id="te_complemento" name="te_complemento" autofocus maxlength="1000"  >{{ $objGenerico->enderecos->first()->te_complemento }}</textarea>								
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
                        <label for="te_bairro" class="col-md-3 control-label">Bairro</label>

                        <div class="col-md-3">
                            <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ $objGenerico->enderecos->first()->te_bairro }}" required autofocus maxlength="50" readonly>
                        </div>
                    </div>
					
                    <div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
                        <label for="nm_cidade" class="col-md-3 control-label">Cidade</label>

                        <div class="col-md-3">
                            <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="{{$cidade->nm_cidade}}" required autofocus maxlength="50" readonly>
							<input type="hidden" name="cd_cidade_ibge" id="cd_cidade_ibge" value="">
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                        <label for="sg_estado" class="col-md-3 control-label">Estado</label>
                        <div class="col-md-3">
    						<select id="sg_estado" class="form-control" name="sg_estado" disabled>
                                @foreach ($arEstados as $json)
    								<option value="{{ $json->sg_estado }}" {{($cidade->sg_estado == $json->sg_estado ? 'selected' : '')}}>{{ $json->ds_estado }}</option>
                                @endforeach
    						</select>
						</div>
                    </div>
                   

					<div class="col-md-10">
						<div class="col-md-5">
							<h4>Dados de Acesso</h4>
						</div>
					</div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-3 control-label">E-mail</label>

                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{$objGenerico->users->email}}" required autofocus maxlength="50" >
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-3 control-label">Senha</label>

                        <div class="col-md-2">
                            <input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{$objGenerico->users->password}}" autofocus maxlength="50">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation" class="col-md-3 control-label">Repita a Senha</label>

                        <div class="col-md-2">
                            <input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{$objGenerico->users->password}}" autofocus maxlength="50">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="cs_status" class="col-md-3 control-label">Situação</label>
						
                        <div class="col-md-2">
                            <input type="radio" value="A" name="cs_status" @if( $objGenerico->users->cs_status == 'A' ) checked @endif autofocus style="cursor: pointer;">
                            <label for="cs_status" style="cursor: pointer;">Ativo</label>
                            <br>
                            <input type="radio" value="I" name="cs_status" @if( $objGenerico->users->cs_status == 'I' ) checked @endif autofocus style="cursor: pointer;">
                            <label for="cs_status" style="cursor: pointer;">Inativo</label>
                        </div>
                    </div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('usuarios.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection