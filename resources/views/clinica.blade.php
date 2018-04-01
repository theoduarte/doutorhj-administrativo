@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
    /* IE 6 doesn't support max-height
    * we use height instead, but this forces the menu to always be this tall
    */
    * html .ui-autocomplete {
        height: 200px;
    }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js"></script>
  <script src="/js/utilitarios.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">CADASTRO DE CLÍNICA</div>
				
                <div class="panel-body" style="height:auto;min-height: 241px;">
                    <form class="form-horizontal" method="POST" action="/clinica/gravar">
                        {{ csrf_field() }}


                        @if ($errors->any())
    						<div class="col-md-12 alert alert-danger">
    							<div class="col-md-5">
    								<h4>Verifique seus dados e tente novamente!</h4>
    							</div>
    						</div>
                        @endif


						<div class="col-md-10">
							<div class="col-md-5">
								<h4>Clínica</h4>
							</div>
						</div>
                        
                        
                        <div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
                            <label for="nm_razao_social" class="col-md-3 control-label">Razão Social</label>
	
                            <div class="col-md-6">
                                <input id="nm_razao_social" type="text" class="form-control" name="nm_razao_social" value="{{ old('nm_razao_social') }}" required autofocus maxlength="100">

                                @if ($errors->has('nm_razao_social'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_razao_social') }}</strong>
                                    </span>
                                @endif
                            </div>	
                        </div>


                        <div class="form-group{{ $errors->has('nm_fantasia') ? ' has-error' : '' }}">
                            <label for="nm_fantasia" class="col-md-3 control-label">Nome Fantasia</label>
							
                            <div class="col-md-6">
                                <input id="nm_fantasia" type="text" class="form-control" name="nm_fantasia" value="{{ old('nm_fantasia') }}" required autofocus maxlength="100">

                                @if ($errors->has('nm_fantasia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_fantasia') }}</strong>
                                    </span>
                                @endif
                            </div>	
                        </div>						
						
						<div class="col-md-10">
							<div class="col-md-5">
								<h4>Dados Pessoais do Responsável</h4>
							</div>
						</div>

                        <div class="form-group{{ $errors->has('nm_primario') ? ' has-error' : '' }}">
                            <label for="nm_primario" class="col-md-3 control-label">Primeiro Nome</label>
	
                            <div class="col-md-3">
                                <input id="nm_primario" type="text" class="form-control" name="nm_primario" value="{{ old('nm_primario') }}" required autofocus maxlength="50">

                                @if ($errors->has('nm_primario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_primario') }}</strong>
                                    </span>
                                @endif
                            </div>	
                        </div>



                        <div class="form-group{{ $errors->has('nm_secundario') ? ' has-error' : '' }}">
                            <label for="nm_secundario" class="col-md-3 control-label">Sobrenome</label>
							
                            <div class="col-md-5">
                                <input id="nm_secundario" type="text" class="form-control" name="nm_secundario" value="{{ old('nm_secundario') }}" required autofocus maxlength="50">
								
                                @if ($errors->has('nm_secundario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_secundario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('cs_sexo') ? ' has-error' : '' }}">
                            <label for="cs_sexo" class="col-md-3 control-label">Sexo</label>
							
                            <div class="col-md-2">
								<select id="cs_sexo" class="form-control" name="cs_sexo" value="{{ old('cs_sexo') }}" required autofocus>
									<option value="" selected="selected"></option>
									<option value="M" {{(old('cs_sexo') == 'M' ? 'selected' : '')}}>MASCULINO</option>
									<option value="F" {{(old('cs_sexo') == 'F' ? 'selected' : '')}}>FEMININO</option>
								</select>
								
                                @if ($errors->has('cs_sexo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cs_sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('dt_nascimento') ? ' has-error' : '' }}">
                            <label for="dt_nascimento" class="col-md-3 control-label">Data de Nascimento</label>

                            <div class="col-md-2">
                                <input id="dt_nascimento" type="text" class="form-control mascaraData" name="dt_nascimento" value="{{ old('dt_nascimento') }}" required autofocus>
								
                                @if ($errors->has('dt_nascimento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dt_nascimento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


  
                        <div class="form-group{{ $errors->has('ds_cargo') ? ' has-error' : '' }}">
                            <label for="ds_cargo" class="col-md-3 control-label">Cargo</label>
							
                            <div class="col-md-5">
                          		<div class="ui-widget">
                                  <input  type="text" class="form-control" id="ds_cargo" value="{{ old('ds_cargo') }}">
                                  <input type="hidden" name="cargo_id" id="cargo_id" value="{{ old('cargo_id') }}">
                                </div>	
                        
                                @if ($errors->has('ds_cargo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ds_cargo') }}</strong>
                                    </span>
                                @endif
                        		
                                @if ($errors->has('cargo_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cargo_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
							

							
						<div class="col-md-10">
							<div class="col-md-5">
								<h4>Documentação</h4>
							</div>
							
    						<div class="col-md-10">
    						    <div class="form-group{{ $errors->has('tp_documento') ? ' has-error' : '' }}">
                                    <label for="tp_documento" class="col-md-4 control-label">Informe um documento do Responsável</label>
                                    <div class="col-md-4">
            							<select id="tp_documento" name="tp_documento" class="form-control">
        									<option></option>
        									<option value="CNH" {{(old('tp_documento') == 'CNH' ? 'selected' : '')}}>CNH</option>
        									<option value="RG"  {{(old('tp_documento') == 'RG'  ? 'selected' : '')}}>RG</option>
        									<option value="CPF" {{(old('tp_documento') == 'CPF' ? 'selected' : '')}}>CPF</option>
        									<option value="TRE" {{(old('tp_documento') == 'TRE' ? 'selected' : '')}}>Título de Eleitor</option>
        								</select>
                                    </div> 
    						        <div class="col-md-4">
            							<input id="te_documento" type="text" placeholder="" class="form-control" name="te_documento" value="{{ old('te_documento') }}" required autofocus>
                                        @if ($errors->has('te_documento'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('te_documento') }}</strong>
                                            </span>
                                        @endif                                    
                                    </div> 
                                </div>
                                <div class="form-group{{ $errors->has('nr_cnpj') ? ' has-error' : '' }}">
                                    <label for="nr_cnpj" class="col-md-4 control-label">CNPJ</label>
        
                                    <div class="col-md-6">
                                        <input id="nr_cnpj" type="text" class="form-control" name="nr_cnpj" value="{{ old('nr_cnpj') }}" required autofocus>
        								
                                        @if ($errors->has('nr_cnpj'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nr_cnpj') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('nr_insc_estadual') ? ' has-error' : '' }}">
                                    <label for="nr_insc_estadual" class="col-md-4 control-label">Inscrição Estadual</label>
        
                                    <div class="col-md-3">
                                        <input id="nr_insc_estadual" type="text" class="form-control" name="nr_insc_estadual" value="{{ old('nr_insc_estadual') }}" required autofocus>
        								
                                        @if ($errors->has('nr_insc_estadual'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nr_insc_estadual') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
						</div>



							
						<div class="col-md-10">
							<div class="col-md-5">
								<h4>Contato</h4>
							</div>
						
    						<div class="col-md-10">
    						    <div class="form-group{{ $errors->has('tp_contato1') ? ' has-error' : '' }}">
                                    <label for="tp_contato1" class="col-md-4 control-label">Telefone Obrigatório</label>
                                    <div class="col-md-4">
            							<select id="tp_contato1" name="tp_contato1" class="form-control">
        									<option value="" selected="selected"></option>
        									<option value="FC" {{(old('tp_contato1') == 'FC' ? 'selected' : '')}}>Telefone Comercial</option>
        									<option value="CC" {{(old('tp_contato1') == 'CC' ? 'selected' : '')}}>Celular Comercial</option>
        									<option value="FX" {{(old('tp_contato1') == 'FX' ? 'selected' : '')}}>FAX</option>
        								</select>
                                    </div> 
    						        <div class="col-md-4">
            							<input id="ds_contato1" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato1" value="{{ old('ds_contato1') }}" required autofocus>
                                    </div> 
                                </div>
                            </div>
							
    						<div class="col-md-10">
    						    <div class="form-group{{ $errors->has('tp_contato2') ? ' has-error' : '' }}">
                                    <label for="tp_contato2" class="col-md-4 control-label">Telefone Opcional</label>
                                    <div class="col-md-4">
            							<select id="tp_contato2" name="tp_contato2" class="form-control">
        									<option value="" selected="selected"></option>
        									<option value="FR" {{(old('tp_contato2') == 'FR' ? 'selected' : '')}}>Fixo Residencial</option>
        									<option value="FC" {{(old('tp_contato2') == 'FC' ? 'selected' : '')}}>Fixo Comercial</option>
        									<option value="CP" {{(old('tp_contato2') == 'CP' ? 'selected' : '')}}>Celular Pessoal</option>
        									<option value="CC" {{(old('tp_contato2') == 'CC' ? 'selected' : '')}}>Celular Comercial</option>
        									<option value="FX" {{(old('tp_contato2') == 'FX' ? 'selected' : '')}}>FAX</option>
        								</select>
                                    </div> 
    						        <div class="col-md-4">
            							<input id="ds_contato2" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato2" value="{{ old('ds_contato2') }}" autofocus>
                                    </div> 
                                </div>
                            </div>
							
    						<div class="col-md-10">
    						    <div class="form-group{{ $errors->has('tp_contato3') ? ' has-error' : '' }}">
                                    <label for="tp_contato3" class="col-md-4 control-label">Telefone Opcional</label>
                                    <div class="col-md-4">
            							<select id="tp_contato3" name="tp_contato3" class="form-control">
        									<option value="" selected="selected"></option>
        									<option value="FR" {{(old('tp_contato3') == 'FR' ? 'selected' : '')}}>Fixo Residencial</option>
        									<option value="FC" {{(old('tp_contato3') == 'FC' ? 'selected' : '')}}>Fixo Comercial</option>
        									<option value="CP" {{(old('tp_contato3') == 'CP' ? 'selected' : '')}}>Celular Pessoal</option>
        									<option value="CC" {{(old('tp_contato3') == 'CC' ? 'selected' : '')}}>Celular Comercial</option>
        									<option value="FX" {{(old('tp_contato3') == 'FX' ? 'selected' : '')}}>FAX</option>
        								</select>
                                    </div>
    						        <div class="col-md-4">
            							<input id="ds_contato3" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato3" value="{{ old('ds_contato3') }}" autofocus>
                                    </div> 
                                </div>
                            </div>
    					</div>



							

						<div class="col-md-10">
							<div class="col-md-5">
								<h4>Endereço Comercial</h4>
							</div>
						</div>
						
                        <div class="form-group{{ $errors->has('nr_cep') ? ' has-error' : '' }}">
                            <label for="nr_cep" class="col-md-3 control-label">CEP</label>

                            <div class="col-md-2">
                                <input id="nr_cep" type="text" class="form-control mascaraCep consultaCep" name="nr_cep" value="{{ old('nr_cep') }}" required autofocus maxlength="9">
								
                                @if ($errors->has('nr_cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nr_cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						
					    <div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
                            <label for="sg_logradouro" class="col-md-3 control-label">Logradouro</label>
                            <div class="col-md-2">
    							<select id="sg_logradouro" name="sg_logradouro" class="form-control">
									<option value="" selected="selected"></option>
                                    <option value="Aeroporto" {{(old('sg_logradouro') == 'Aeroporto' ? 'selected' : '')}}>Aeroporto</option>
                                    <option value="Alameda" {{(old('sg_logradouro') == 'Alameda' ? 'selected' : '')}}>Alameda</option>
                                    <option value="Área" {{(old('sg_logradouro') == 'Área' ? 'selected' : '')}}>Área</option>
                                    <option value="Avenida" {{(old('sg_logradouro') == 'Avenida' ? 'selected' : '')}}>Avenida</option>
                                    <option value="Campo" {{(old('sg_logradouro') == 'Campo' ? 'selected' : '')}}>Campo</option>
                                    <option value="Chácara" {{(old('sg_logradouro') == 'Chácara' ? 'selected' : '')}}>Chácara</option>
                                    <option value="Colônia" {{(old('sg_logradouro') == 'Colônia' ? 'selected' : '')}}>Colônia</option>
                                    <option value="Condomínio" {{(old('sg_logradouro') == 'Condomínio' ? 'selected' : '')}}>Condomínio</option>
                                    <option value="Conjunto" {{(old('sg_logradouro') == 'Conjunto' ? 'selected' : '')}}>Conjunto</option>
                                    <option value="Distrito" {{(old('sg_logradouro') == 'Distrito' ? 'selected' : '')}}>Distrito</option>
                                    <option value="Esplanada" {{(old('sg_logradouro') == 'Esplanada' ? 'selected' : '')}}>Esplanada</option>
                                    <option value="Estação" {{(old('sg_logradouro') == 'Estação' ? 'selected' : '')}}>Estação</option>
                                    <option value="Estrada" {{(old('sg_logradouro') == 'Estrada' ? 'selected' : '')}}>Estrada</option>
                                    <option value="Favela" {{(old('sg_logradouro') == 'Favela' ? 'selected' : '')}}>Favela</option>
                                    <option value="Feira" {{(old('sg_logradouro') == 'Feira' ? 'selected' : '')}}>Feira</option>
                                    <option value="Jardim" {{(old('sg_logradouro') == 'Jardim' ? 'selected' : '')}}>Jardim</option>
                                    <option value="Ladeira" {{(old('sg_logradouro') == 'Ladeira' ? 'selected' : '')}}>Ladeira</option>
                                    <option value="Lago" {{(old('sg_logradouro') == 'Lago' ? 'selected' : '')}}>Lago</option>
                                    <option value="Lagoa" {{(old('sg_logradouro') == 'Lagoa' ? 'selected' : '')}}>Lagoa</option>
                                    <option value="Largo" {{(old('sg_logradouro') == 'Largo' ? 'selected' : '')}}>Largo</option>
                                    <option value="Loteamento" {{(old('sg_logradouro') == 'Loteamento' ? 'selected' : '')}}>Loteamento</option>
                                    <option value="Morro" {{(old('sg_logradouro') == 'Morro' ? 'selected' : '')}}>Morro</option>
                                    <option value="Núcleo" {{(old('sg_logradouro') == 'Núcleo' ? 'selected' : '')}}>Núcleo</option>
                                    <option value="Parque" {{(old('sg_logradouro') == 'Parque' ? 'selected' : '')}}>Parque</option>
                                    <option value="Passarela" {{(old('sg_logradouro') == 'Passarela' ? 'selected' : '')}}>Passarela</option>
                                    <option value="Pátio" {{(old('sg_logradouro') == 'Pátio' ? 'selected' : '')}}>Pátio</option>
                                    <option value="Praça" {{(old('sg_logradouro') == 'Praça' ? 'selected' : '')}}>Praça</option>
                                    <option value="Quadra" {{(old('sg_logradouro') == 'Quadra' ? 'selected' : '')}}>Quadra</option>
                                    <option value="Recanto" {{(old('sg_logradouro') == 'Recanto' ? 'selected' : '')}}>Recanto</option>
                                    <option value="Residencial" {{(old('sg_logradouro') == 'Residencial' ? 'selected' : '')}}>Residencial</option>
                                    <option value="Rodovia" {{(old('sg_logradouro') == 'Rodovia' ? 'selected' : '')}}>Rodovia</option>
                                    <option value="Rua" {{(old('sg_logradouro') == 'Rua' ? 'selected' : '')}}>Rua</option>
                                    <option value="Setor" {{(old('sg_logradouro') == 'Setor' ? 'selected' : '')}}>Setor</option>
                                    <option value="Sítio" {{(old('sg_logradouro') == 'Sítio' ? 'selected' : '')}}>Sítio</option>
                                    <option value="Travessa" {{(old('sg_logradouro') == 'Travessa' ? 'selected' : '')}}>Travessa</option>
                                    <option value="Trecho" {{(old('sg_logradouro') == 'Trecho' ? 'selected' : '')}}>Trecho</option>
                                    <option value="Trevo" {{(old('sg_logradouro') == 'Trevo' ? 'selected' : '')}}>Trevo</option>
                                    <option value="Vale" {{(old('sg_logradouro') == 'Vale' ? 'selected' : '')}}>Vale</option>
                                    <option value="Vereda" {{(old('sg_logradouro') == 'Vereda' ? 'selected' : '')}}>Vereda</option>
                                    <option value="Via" {{(old('sg_logradouro') == 'Via' ? 'selected' : '')}}>Via</option>
                                    <option value="Viaduto" {{(old('sg_logradouro') == 'Viaduto' ? 'selected' : '')}}>Viaduto</option>
                                    <option value="Viela" {{(old('sg_logradouro') == 'Viela' ? 'selected' : '')}}>Viela</option>
                                    <option value="Vila" {{(old('sg_logradouro') == 'Vila' ? 'selected' : '')}}>Vila</option>
								</select>
                            </div>
                        </div>
  

                        <div class="form-group{{ $errors->has('te_endereco') ? ' has-error' : '' }}">
                            <label for="te_endereco" class="col-md-3 control-label">Endereço</label>
							
                            <div class="col-md-7">
                                <input id="te_endereco" type="text" class="form-control" name="te_endereco" value="{{ old('te_endereco') }}" required autofocus maxlength="200">

                                @if ($errors->has('te_endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('te_endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>	

                        <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
                            <label for="nr_logradouro" class="col-md-3 control-label">Número</label>

                            <div class="col-md-2">
                                <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ old('nr_logradouro') }}" required autofocus maxlength="50">

                                @if ($errors->has('nr_logradouro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nr_logradouro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
                            <label for="te_complemento" class="col-md-3 control-label">Complemento</label>

                            <div class="col-md-6">
                         		<textarea rows="5" cols="60" id="te_complemento" name="te_complemento" autofocus maxlength="1000">{{ old('te_complemento') }}</textarea>
								

                                @if ($errors->has('te_complemento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('te_complemento') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
                            <label for="te_bairro" class="col-md-3 control-label">Bairro</label>

                            <div class="col-md-3">
                                <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ old('te_bairro') }}" required autofocus maxlength="50">
                               
                                @if ($errors->has('te_bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('te_bairro') }}</strong>
                                    </span>
                                @endif	
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
                            <label for="nm_cidade" class="col-md-3 control-label">Cidade</label>

                            <div class="col-md-3">
                                <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="{{ old('nm_cidade') }}" required autofocus maxlength="50" readonly>
 								<input id="cd_ibge_cidade" type="hidden" name="cd_ibge_cidade" value="{{ old('cd_ibge_cidade') }}">
                                @if ($errors->has('nm_cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_cidade') }}</strong>
                                    </span>
                                @endif	
                                @if ($errors->has('cd_ibge_cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cd_ibge_cidade') }}</strong>
                                    </span>
                                @endif	
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                            <label for="sg_estado" class="col-md-3 control-label">Estado</label>

                            <div class="col-md-3">
								
    							<select id="sg_estado" class="form-control" name="sg_estado" disabled>
    								<option></option>
                                    @foreach ($arEstados as $json)
        								<option value="{{ $json->sg_estado }}" {{(old('sg_estado') == $json->sg_estado ? 'selected' : '')}}>{{ $json->ds_estado }}</option>
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
                                <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{ old('email') }}" required autofocus maxlength="50">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Senha</label>

                            <div class="col-md-2">
                                <input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{ old('password') }}" required autofocus maxlength="50">

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
                                <input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus maxlength="50">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
						
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$( function() {
        $( function() {
            var availableTags = [
                @foreach ($arCargos as $cargo)
                    '{{ $cargo->id ." | ". $cargo->ds_cargo }}',
                @endforeach
            ];

            
            $( "#ds_cargo" ).autocomplete({
              source: availableTags,
              select: function (event, ui) {
                  var id_cargo = ui.item.value.split(' | ');
                  $("#cargo_id").val(id_cargo[0]); 	
              },
              delay: 500,
              minLength: 4 
            });
        });

  	  
        
        $( "#nr_cep" ).blur(function() { 
        	$.ajax({
        	  url: "/paciente/consulta-cep/cep/"+this.value,
        	  context: document.body
        	}).done(function(resposta) {
        	  $( this ).addClass( "done" );

        	  if( resposta != null){
            	  var json = JSON.parse(resposta);
    
      			  $('#te_endereco').val(json.logradouro);
      			  $('#te_bairro').val(json.bairro);
      			  $('#nm_cidade').val(json.cidade);
      			  $('#sg_estado').val(json.estado);
      			  $('#cd_ibge_cidade').val(json.ibge);
      			  
        	  }else{
      			  $('#te_endereco').val(null);
      			  $('#te_bairro').val(null);
      			  $('#nm_cidade').val(null);
      			  $('#sg_estado').val(null);
      			  $('#cd_ibge_cidade').val(null);
              }
        	});
        });
  } );


</script>
@endsection