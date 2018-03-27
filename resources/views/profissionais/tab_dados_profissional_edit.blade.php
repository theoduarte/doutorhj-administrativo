<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    * html .ui-autocomplete {
        height: 200px;
    }
</style>

<script>
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
        	  url: "/consulta-cep/cep/"+this.value,
        	  context: document.body
        	}).done(function(resposta) {
        	  $( this ).addClass( "done" );

        	  if( resposta != null){
            	  var json = JSON.parse(resposta);
    
      			  $('#te_endereco').val(json.logradouro);
      			  $('#te_bairro').val(json.bairro);
      			  $('#nm_cidade').val(json.cidade);
      			  $('#sg_estado').val(json.estado);
      			  $('#cd_cidade_ibge').val(json.ibge);
      			  
        	  }else{
      			  $('#cd_cidade_ibge, #sg_estado, #te_endereco, #te_bairro, #nm_cidade').val(null);
              }
        	});
        });
      } );
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card-box">
				<form action="{{ route('profissionais.update', $profissionais->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<input type="hidden" name="tp_usuario" value="{{$profissionais->user->tp_user}}">

                    @if($errors->any())
                        <div class="col-12 alert alert-danger">
                            @foreach ($errors->all() as $error)<div class="col-5">{{$error}}</div>@endforeach
                        </div>
                    @endif
					
					<div class="form-group">
						<div class="row">
    						<div class="col-2">
        						<label for="nm_primario">Primeiro nome<span class="text-danger">*</span></label>
        						<input type="text" id="nm_primario" class="form-control" name="nm_primario" value="{{$profissionais->nm_primario}}" required placeholder="Primeiro nome"  >
    						</div>
		
    						<div class="col-4">
        						<label for="nm_primario">Sobrenome<span class="text-danger">*</span></label>
        						<input type="text" id="nm_secundario" class="form-control" name="nm_secundario" value="{{$profissionais->nm_secundario}}" required placeholder="" >
    						</div>	
						</div>	
					</div>
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                            	<label for="cs_sexo" class="control-label">Sexo<span class="text-danger">*</span></label>
        						<select id="cs_sexo" class="form-control" name="cs_sexo" required autofocus > 
        							<option value="M"  {{( $profissionais->cs_sexo == 'M' ) ? 'selected' : ''}} >MASCULINO</option>
        							<option value="F" {{( $profissionais->cs_sexo == 'F' ) ? 'selected' : ''}} >FEMININO</option>
        						</select>
    						</div>
						</div>
                    </div>
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                                <label for="dt_nascimento" class="control-label">Data de Nascimento</label>
                      			<input id="dt_nascimento" type="text" class="form-control mascaraData" name="dt_nascimento" value="{{$profissionais->dt_nascimento}}" required autofocus >
                        	</div>
                    	</div>
                    </div>



					@if ( $profissionais->especialidade != null  )
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-4">
                                <label for="cd_especialidade" class="control-label">Especialidade<span class="text-danger">*</span></label>
         						<select id="cd_especialidade" class="form-control" name="cd_especialidade" required autofocus>
                                    @foreach ($arEspecialidade as $json)
        								<option value="{{ $json->cd_especialidade }}" {{($profissionais->especialidade->cd_especialidade == $json->cd_especialidade ? 'selected' : '')}}>{{ $json->ds_especialidade }}</option>
                                    @endforeach
    							</select>
                            </div>
                        </div>
                    </div>	
					@endif
					

					
					<div class="form-group">
						@foreach( $profissionais->documentos as $documento )
							<div class="row">
                                <div class="col-2">
    								<input type="hidden" name="documentos_id[]" value="{{$documento->id}}">
    					            <label for="tp_documento" class="control-label">Documento<span class="text-danger">*</span></label>
        							<select name="tp_documento[]" class="form-control">
    									@if ( trim($documento->tp_documento) != 'CRM')
        									<option value="CNPJ" {{ (trim($documento->tp_documento) == 'CNPJ') ? 'selected' : '' }}>CNPJ</option>
    									@elseif ( trim($documento->tp_documento) == 'CRM')
    										<option value="CRM" {{ (trim($documento->tp_documento) == 'CRM') ? 'selected' : '' }}>CRM</option>
    									@endif
    								</select>
                                </div>
						        <div class="col-2">
						        	<label for="te_documento[]" class="control-label">&emsp;</label>
        							<input type="text" placeholder="" class="form-control @if ( trim($documento->tp_documento) == 'CNPJ') mascaraCNPJ @endif" name="te_documento[]" value="{{$documento->te_documento}}" required autofocus >                                   
                                </div> 
                                @if ( trim($documento->tp_documento) == 'CRM')
                                <div class="col-1">
                                	<label for="estado_id[]" class="control-label">&emsp;</label>
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
					
							
											
					<div class="form-group">
						@foreach ( $profissionais->contatos as $contato )
						<div class="row">
						    <div class="col-2">
                            	<input type="hidden" value="{{$contato->id}}" name="contato_id[]">
                                <label for="tp_contato" class="control-label">Telefone<span class="text-danger">*</span></label>
                            	<select name="tp_contato[]" class="form-control">
									<option value="FR" {{ ($contato->tp_contato == 'FR') ? 'selected' : ''}}>Fixo Residencial</option>
									<option value="FC" {{ ($contato->tp_contato == 'FC') ? 'selected' : ''}}>Fixo Comercial</option>
									<option value="CP" {{ ($contato->tp_contato == 'CP') ? 'selected' : ''}}>Celular Pessoal</option>
									<option value="CC" {{ ($contato->tp_contato == 'CC') ? 'selected' : ''}}>Celular Comercial</option>
									<option value="FX" {{ ($contato->tp_contato == 'FX') ? 'selected' : ''}}>FAX</option>
								</select>
                            </div>
							<div class="col-2">
								<label for="tp_contato" class="col-md-3 control-label">&emsp;</label>
								<input type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato[]" value="{{$contato->ds_contato}}" required  autofocus>
							</div>
                        </div>
						@endforeach
					</div>
						


                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                                <label for="nr_cep" class="control-label">CEP<span class="text-danger">*</span></label>
                                <input id="nr_cep" type="text" class="form-control mascaraCep consultaCep" name="nr_cep" value="{{$profissionais->enderecos->first()->nr_cep}}" required autofocus maxlength="9" >
                                <input type="hidden" name="endereco_id" value="{{$profissionais->enderecos->first()->id}}">
                            </div>
                        </div>
                    </div>
					
					
					
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                            	<label for="sg_logradouro" class="control-label">Logradouro<span class="text-danger">*</span></label>
    							<select id="sg_logradouro" name="sg_logradouro" class="form-control" required="required"  >
    								<option value="" selected="selected"></option>
                                    <option value="Aeroporto" {{($profissionais->enderecos->first()->sg_logradouro == 'Aeroporto' ? 'selected' : '')}}>Aeroporto</option>
                                    <option value="Alameda" {{($profissionais->enderecos->first()->sg_logradouro == 'Alameda' ? 'selected' : '')}}>Alameda</option>
                                    <option value="Área" {{($profissionais->enderecos->first()->sg_logradouro == 'Área' ? 'selected' : '')}}>Área</option>
                                    <option value="Avenida" {{($profissionais->enderecos->first()->sg_logradouro == 'Avenida' ? 'selected' : '')}}>Avenida</option>
                                    <option value="Campo" {{($profissionais->enderecos->first()->sg_logradouro == 'Campo' ? 'selected' : '')}}>Campo</option>
                                    <option value="Chácara" {{($profissionais->enderecos->first()->sg_logradouro == 'Chácara' ? 'selected' : '')}}>Chácara</option>
                                    <option value="Colônia" {{($profissionais->enderecos->first()->sg_logradouro == 'Colônia' ? 'selected' : '')}}>Colônia</option>
                                    <option value="Condomínio" {{($profissionais->enderecos->first()->sg_logradouro == 'Condomínio' ? 'selected' : '')}}>Condomínio</option>
                                    <option value="Conjunto" {{($profissionais->enderecos->first()->sg_logradouro == 'Conjunto' ? 'selected' : '')}}>Conjunto</option>
                                    <option value="Distrito" {{($profissionais->enderecos->first()->sg_logradouro == 'Distrito' ? 'selected' : '')}}>Distrito</option>
                                    <option value="Esplanada" {{($profissionais->enderecos->first()->sg_logradouro == 'Esplanada' ? 'selected' : '')}}>Esplanada</option>
                                    <option value="Estação" {{($profissionais->enderecos->first()->sg_logradouro == 'Estação' ? 'selected' : '')}}>Estação</option>
                                    <option value="Estrada" {{($profissionais->enderecos->first()->sg_logradouro == 'Estrada' ? 'selected' : '')}}>Estrada</option>
                                    <option value="Favela" {{($profissionais->enderecos->first()->sg_logradouro == 'Favela' ? 'selected' : '')}}>Favela</option>
                                    <option value="Feira" {{($profissionais->enderecos->first()->sg_logradouro == 'Feira' ? 'selected' : '')}}>Feira</option>
                                    <option value="Jardim" {{($profissionais->enderecos->first()->sg_logradouro == 'Jardim' ? 'selected' : '')}}>Jardim</option>
                                    <option value="Ladeira" {{($profissionais->enderecos->first()->sg_logradouro == 'Ladeira' ? 'selected' : '')}}>Ladeira</option>
                                    <option value="Lago" {{($profissionais->enderecos->first()->sg_logradouro == 'Lago' ? 'selected' : '')}}>Lago</option>
                                    <option value="Lagoa" {{($profissionais->enderecos->first()->sg_logradouro == 'Lagoa' ? 'selected' : '')}}>Lagoa</option>
                                    <option value="Largo" {{($profissionais->enderecos->first()->sg_logradouro == 'Largo' ? 'selected' : '')}}>Largo</option>
                                    <option value="Loteamento" {{($profissionais->enderecos->first()->sg_logradouro == 'Loteamento' ? 'selected' : '')}}>Loteamento</option>
                                    <option value="Morro" {{($profissionais->enderecos->first()->sg_logradouro == 'Morro' ? 'selected' : '')}}>Morro</option>
                                    <option value="Núcleo" {{($profissionais->enderecos->first()->sg_logradouro == 'Núcleo' ? 'selected' : '')}}>Núcleo</option>
                                    <option value="Parque" {{($profissionais->enderecos->first()->sg_logradouro == 'Parque' ? 'selected' : '')}}>Parque</option>
                                    <option value="Passarela" {{($profissionais->enderecos->first()->sg_logradouro == 'Passarela' ? 'selected' : '')}}>Passarela</option>
                                    <option value="Pátio" {{($profissionais->enderecos->first()->sg_logradouro == 'Pátio' ? 'selected' : '')}}>Pátio</option>
                                    <option value="Praça" {{($profissionais->enderecos->first()->sg_logradouro == 'Praça' ? 'selected' : '')}}>Praça</option>
                                    <option value="Quadra" {{($profissionais->enderecos->first()->sg_logradouro == 'Quadra' ? 'selected' : '')}}>Quadra</option>
                                    <option value="Recanto" {{($profissionais->enderecos->first()->sg_logradouro == 'Recanto' ? 'selected' : '')}}>Recanto</option>
                                    <option value="Residencial" {{($profissionais->enderecos->first()->sg_logradouro == 'Residencial' ? 'selected' : '')}}>Residencial</option>
                                    <option value="Rodovia" {{($profissionais->enderecos->first()->sg_logradouro == 'Rodovia' ? 'selected' : '')}}>Rodovia</option>
                                    <option value="Rua" {{($profissionais->enderecos->first()->sg_logradouro == 'Rua' ? 'selected' : '')}}>Rua</option>
                                    <option value="Setor" {{($profissionais->enderecos->first()->sg_logradouro == 'Setor' ? 'selected' : '')}}>Setor</option>
                                    <option value="Sítio" {{($profissionais->enderecos->first()->sg_logradouro == 'Sítio' ? 'selected' : '')}}>Sítio</option>
                                    <option value="Travessa" {{($profissionais->enderecos->first()->sg_logradouro == 'Travessa' ? 'selected' : '')}}>Travessa</option>
                                    <option value="Trecho" {{($profissionais->enderecos->first()->sg_logradouro == 'Trecho' ? 'selected' : '')}}>Trecho</option>
                                    <option value="Trevo" {{($profissionais->enderecos->first()->sg_logradouro == 'Trevo' ? 'selected' : '')}}>Trevo</option>
                                    <option value="Vale" {{($profissionais->enderecos->first()->sg_logradouro == 'Vale' ? 'selected' : '')}}>Vale</option>
                                    <option value="Vereda" {{($profissionais->enderecos->first()->sg_logradouro == 'Vereda' ? 'selected' : '')}}>Vereda</option>
                                    <option value="Via" {{($profissionais->enderecos->first()->sg_logradouro == 'Via' ? 'selected' : '')}}>Via</option>
                                    <option value="Viaduto" {{($profissionais->enderecos->first()->sg_logradouro == 'Viaduto' ? 'selected' : '')}}>Viaduto</option>
                                    <option value="Viela" {{($profissionais->enderecos->first()->sg_logradouro == 'Viela' ? 'selected' : '')}}>Viela</option>
                                    <option value="Vila" {{($profissionais->enderecos->first()->sg_logradouro == 'Vila' ? 'selected' : '')}}>Vila</option>
    							</select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<div class="row">
                            <div class="col-4">
                            	<label for="te_endereco" class="control-label">Endereço<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="te_endereco" value="{{ $profissionais->enderecos->first()->te_endereco }}" required autofocus maxlength="200" >
                            </div>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
                    	<div class="row">
                            <div class="col-2">
                                <label for="nr_logradouro" class="control-label">Número<span class="text-danger">*</span></label>
                                <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ $profissionais->enderecos->first()->nr_logradouro }}" required autofocus maxlength="50" >
                            </div>
                        </div>
                    </div>
					
                    <div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-4">
                            	<label for="te_complemento" class="control-label">Complemento</label>
                         		<textarea rows="3" cols="60" id="te_complemento" name="te_complemento" autofocus maxlength="1000"  >{{ $profissionais->enderecos->first()->te_complemento }}</textarea>								
                            </div>
                        </div>
                    </div>
					
                    <div class="form-group">
                    	<div class="row">
                            <div class="col-2">
                                <label for="te_bairro" class="control-label">Bairro<span class="text-danger">*</span></label>
                                <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ $profissionais->enderecos->first()->te_bairro }}" required autofocus maxlength="50" readonly>
                            </div>
                        </div>
                    </div>
					
                    <div class="form-group">
                    	<div class="row">
                            <div class="col-2">
                            	<label for="nm_cidade" class="control-label">Cidade<span class="text-danger">*</span></label>
                                <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="{{$cidade->nm_cidade}}" required autofocus maxlength="50" readonly>
    							<input type="hidden" name="cd_cidade_ibge" id="cd_cidade_ibge" value="">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                            	<label for="sg_estado" class="control-label">Estado<span class="text-danger">*</span></label>
                            	<select id="sg_estado" class="form-control" name="sg_estado" disabled>
                                    @foreach ($arEstados as $json)
        								<option value="{{ $json->sg_estado }}" {{($cidade->sg_estado == $json->sg_estado ? 'selected' : '')}}>{{ $json->ds_estado }}</option>
                                    @endforeach
        						</select>
    						</div>
						</div>
					</div>
                   

                    <div class="form-group">
                    	<div class="row">
                            <div class="col-3">
                                <label for="email" class="control-label">E-mail<span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{$profissionais->user->email}}" required autofocus maxlength="50" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="row">
                            <div class="col-2">
                                <label for="password" class="control-label">Senha<span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{$profissionais->user->password}}" autofocus maxlength="50">
    
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    	<div class="row">
                            <div class="col-2">
                                <label for="password_confirmation" class="control-label">Repita a Senha<span class="text-danger">*</span></label>
                                <input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{$profissionais->user->password}}" autofocus maxlength="50">
    
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    	<div class="row">
                            <div class="col-5">
                             	<label for="cs_statusA" class="control-label">Situação<span class="text-danger">*</span></label>
                                <br>
                                <input type="radio" id="cs_statusA" value="A" name="cs_status" @if( $profissionais->user->cs_status == 'A' ) checked @endif autofocus style="cursor: pointer;">
                                <label for="cs_statusA" style="cursor: pointer;">Ativo</label>
             					<br>
                                <input type="radio" value="I" id="cs_statusI" name="cs_status" @if( $profissionais->user->cs_status == 'I' ) checked @endif autofocus style="cursor: pointer;">
                                <label for="cs_statusI" style="cursor: pointer;">Inativo</label>
                            </div>
                        </div>
                    </div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('profissionais.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
