@extends('layouts.painel')

@section('content')
<h1 class="page-title">
	<i class="voyager-person"></i> Gestão de Usuários
</h1>  

<div class="panel panel-default">
    <div class="panel-body">
			<form class="form-horizontal">
                    {{ csrf_field() }}
                    <br>
					<div class="col-md-10">
						<div class="col-md-5">
							@if ( $objGenerico->users->tp_user == 'PAC' )
    							<h4>Dados do Paciente</h4>
							@elseif( $objGenerico->users->tp_user == 'PRO' )
								<h4>Dados do Profissional</h4>
							@endif
						</div>
					</div>
                
                    <div class="form-group{{ $errors->has('nm_primario') ? ' has-error' : '' }}">
                        <label for="nm_primario" class="col-md-3 control-label">Primeiro Nome</label>

                        <div class="col-md-3">
                            <input id="nm_primario" type="text" class="form-control" name="nm_primario" value="{{$objGenerico->nm_primario}}" required autofocus maxlength="50" readonly>
                        </div>	
                    </div>
					
                    <div class="form-group{{ $errors->has('nm_secundario') ? ' has-error' : '' }}">
                        <label for="nm_secundario" class="col-md-3 control-label">Sobrenome</label>
						
                        <div class="col-md-5">
                            <input id="nm_secundario" type="text" class="form-control" name="nm_secundario" value="{{$objGenerico->nm_secundario}}" required autofocus maxlength="50" readonly>
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('cs_sexo') ? ' has-error' : '' }}">
                        <label for="cs_sexo" class="col-md-3 control-label">Sexo</label>
						
                        <div class="col-md-2">
							<select id="cs_sexo" class="form-control" name="cs_sexo" required autofocus disabled> 
								<option value="M"  {{( $objGenerico->cs_sexo == 'M' ) ? 'selected' : ''}} >MASCULINO</option>
								<option value="F" {{( $objGenerico->cs_sexo == 'F' ) ? 'selected' : ''}} >FEMININO</option>
							</select>
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('dt_nascimento') ? ' has-error' : '' }}">
                        <label for="dt_nascimento" class="col-md-3 control-label">Data de Nascimento</label>

                        <div class="col-md-2">
                            <input id="dt_nascimento" type="text" class="form-control mascaraData" name="dt_nascimento" value="{{$objGenerico->dt_nascimento}}" required autofocus readonly>
                        </div>
                    </div>


					@if ( !empty($objGenerico->especialidades->cd_especialidade) )
                    <div class="form-group{{ $errors->has('cd_especialidade') ? ' has-error' : '' }}">
                        <label for="cd_especialidade" class="col-md-3 control-label">Especialidade</label>
						
                        <div class="col-md-5">
                      		<div class="ui-widget">
								<select id="cd_especialidade" class="form-control" name="cd_especialidade" required autofocus disabled>
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
                                <input  type="text" class="form-control" id="ds_cargo" value="{{$objGenerico->cargo->cd_cargo}} | {{$objGenerico->cargo->ds_cargo}}" readonly>
                            </div>
                        </div>
                    </div>	
					@endif
					
					
					
					<div class="col-md-10">
						<div class="col-md-5">
							<h4>Documentação</h4>
						</div>
						
						@foreach( $objGenerico->documentos as $documento )
    						<div class="col-md-10">
    						    <div class="form-group{{ $errors->has('tp_documento') ? ' has-error' : '' }}">
                                    <label for="tp_documento" class="col-md-4 control-label">Documento</label>
                                    <div class="col-md-4">
            							<select id="tp_documento" name="tp_documento" class="form-control" disabled>
        									<option value="CNH" {{ (trim($documento->tp_documento) == 'CNH') ? 'selected' : '' }}>CNH</option>
        									<option value="RG"  {{ (trim($documento->tp_documento) == 'RG' ) ? 'selected' : '' }}>RG</option>
        									<option value="CPF" {{ (trim($documento->tp_documento) == 'CPF') ? 'selected' : '' }}>CPF</option>
        									<option value="TRE" {{ (trim($documento->tp_documento) == 'TRE') ? 'selected' : '' }}>Título de Eleitor</option>
        									<option value="CRM" {{ (trim($documento->tp_documento) == 'CRM') ? 'selected' : '' }}>CRM</option>
        								</select>
                                    </div> 
    						        <div class="col-md-4">
            							<input id="te_documento" type="text" placeholder="" class="form-control" name="te_documento" value="{{$documento->te_documento}}" required autofocus readonly>                                   
                                    </div> 
                                </div>
                            </div>
                     	@endforeach           
					</div>



					<div class="col-md-10">
						<div class="col-md-5">
							<h4>Contato</h4>
						</div>
					
						@foreach ( $objGenerico->contatos as $contato )
						<div class="col-md-10">
						    <div class="form-group{{ $errors->has('tp_contato1') ? ' has-error' : '' }}">
                                <label for="tp_contato1" class="col-md-4 control-label">Telefone</label>
                                <div class="col-md-4">
        							<select id="tp_contato1" name="tp_contato1" class="form-control" readonly disabled>
    									<option value="FR" {{ ($contato->tp_contato == 'FR') ? 'selected' : ''}}>Fixo Residencial</option>
    									<option value="FC" {{ ($contato->tp_contato == 'FC') ? 'selected' : ''}}>Fixo Comercial</option>
    									<option value="CP" {{ ($contato->tp_contato == 'CP') ? 'selected' : ''}}>Celular Pessoal</option>
    									<option value="CC" {{ ($contato->tp_contato == 'CC') ? 'selected' : ''}}>Celular Comercial</option>
    									<option value="FX" {{ ($contato->tp_contato == 'FX') ? 'selected' : ''}}>FAX</option>
    								</select>
                                </div> 
						        <div class="col-md-4">
        							<input id="ds_contato1" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato1" value="{{$contato->ds_contato}}" required readonly autofocus>
                                </div> 
                            </div>
                        </div>
						@endforeach
						
					</div>


						

					<div class="col-md-10">
						<div class="col-md-5">
							<h4>Endereço Residencial</h4>
						</div>
					</div>
					
                    <div class="form-group{{ $errors->has('nr_cep') ? ' has-error' : '' }}">
                        <label for="nr_cep" class="col-md-3 control-label">CEP</label>

                        <div class="col-md-2">
                            <input id="nr_cep" type="text" class="form-control mascaraCep consultaCep" name="nr_cep" value="{{$objGenerico->enderecos->first()->nr_cep}}" required autofocus maxlength="9" readonly>
                        </div>
                    </div>
					
					
					
				    <div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
                        <label for="sg_logradouro" class="col-md-3 control-label">Logradouro</label>
                        <div class="col-md-2">
							<select id="sg_logradouro" name="sg_logradouro" class="form-control" required="required" readonly disabled>
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
                            <input id="te_endereco" type="text" class="form-control" name="te_endereco" value="{{ $objGenerico->enderecos->first()->te_endereco }}" required autofocus maxlength="200" readonly>
                        </div>
                    </div>	

                    <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
                        <label for="nr_logradouro" class="col-md-3 control-label">Número</label>

                        <div class="col-md-2">
                            <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ $objGenerico->enderecos->first()->nr_logradouro }}" required autofocus maxlength="50" readonly>
                        </div>
                    </div>
					
                    <div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
                        <label for="te_complemento" class="col-md-3 control-label">Complemento</label>

                        <div class="col-md-6">
                     		<textarea rows="5" cols="60" id="te_complemento" name="te_complemento" autofocus maxlength="1000" readonly disabled>{{ $objGenerico->enderecos->first()->te_complemento }}</textarea>								
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
							
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                        <label for="sg_estado" class="col-md-3 control-label">Estado</label>

                        <div class="col-md-3">
							<select id="sg_estado" class="form-control" name="sg_estado" readonly disabled>
								<option value="{{$cidade->ds_estado}}">{{$cidade->ds_estado}}</option>
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
                            <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{$objGenerico->users->email}}" required autofocus maxlength="50" readonly>
                        </div>
                    </div>
                    
					
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                            <button type="button" class="btn btn-primary" onclick="javascript:window.location='/admin/usuarios';">
                                Voltar
                            </button>
                        </div>
                    </div>
			
                </form>       
    </div>
</div>

@endsection