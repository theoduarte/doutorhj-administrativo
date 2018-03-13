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
                    @foreach ($cargos as $cargo)
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
          			  $('#te_endereco').val(null);
          			  $('#te_bairro').val(null);
          			  $('#nm_cidade').val(null);
          			  $('#sg_estado').val(null);
          			  $('#cd_cidade_ibge').val(null);
                  }
            	});
            });
        });
    </script>

    @if($errors->any())
        <div class="col-12 alert alert-danger">
        @foreach ($errors->all() as $error)
        	<div class="col-5">{{ $error }}</div>
        @endforeach
        </div>
    @endif

	{!! csrf_field() !!}
    <div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
        <label for="nm_razao_social" class="col-3 control-label">Razão Social<span class="text-danger">*</span></label>
        <div class="col-5">
            <input id="nm_razao_social" type="text" class="form-control" name="nm_razao_social" value="{{ old('nm_razao_social') }}" required  maxlength="100" autofocus>
        </div>	
    </div>
    
    <div class="form-group{{ $errors->has('nm_fantasia') ? ' has-error' : '' }}">
        <label for="nm_fantasia" class="col-3 control-label">Nome Fantasia<span class="text-danger">*</span></label>
        <div class="col-5">
            <input id="nm_fantasia" type="text" class="form-control" name="nm_fantasia" value="{{ old('nm_fantasia') }}" required  maxlength="100">
        </div>	
    </div>						
    
    <div class="col-12">
    	<h4>Dados Pessoais do Responsável</h4>
        <div class="form-group{{ $errors->has('nm_primario') ? ' has-error' : '' }}">
        	<div class="row">
                <label for="nm_primario" class="col-12 control-label">Nome / Sobrenome<span class="text-danger">*</span></label>
                <div class="col-2">
                    <input id="nm_primario" type="text" class="form-control" name="nm_primario" value="{{ old('nm_primario') }}" required  maxlength="50">
                </div>	
                <div class="col-3">
                    <input id="nm_secundario" type="text" class="form-control" name="nm_secundario" value="{{ old('nm_secundario') }}" required  maxlength="50">
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('cs_sexo') ? ' has-error' : '' }}">
        <label for="cs_sexo" class="col-3 control-label">Sexo<span class="text-danger">*</span></label>
        <div class="col-2">
    		<select id="cs_sexo" class="form-control" name="cs_sexo" value="{{ old('cs_sexo') }}" required >
    			<option value="" selected="selected"></option>
    			<option value="M" {{(old('cs_sexo') == 'M' ? 'selected' : '')}}>MASCULINO</option>
    			<option value="F" {{(old('cs_sexo') == 'F' ? 'selected' : '')}}>FEMININO</option>
    		</select>
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('dt_nascimento') ? ' has-error' : '' }}">
        <label for="dt_nascimento" class="col-3 control-label">Data de Nascimento<span class="text-danger">*</span></label>
    
        <div class="col-2">
            <input id="dt_nascimento" type="text" class="form-control mascaraData" name="dt_nascimento" value="{{ old('dt_nascimento') }}" required >
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('ds_cargo') ? ' has-error' : '' }}">
        <label for="ds_cargo" class="col-3 control-label">Cargo<span class="text-danger">*</span></label>
    	
        <div class="col-5">
      		<div class="ui-widget">
              <input  type="text" class="form-control" id="ds_cargo" name="ds_cargo" value="{{ old('ds_cargo') }}">
              <input type="hidden" id="cargo_id" name="cargo_id" value="{{ old('cargo_id') }}">
            </div>	
        </div>
    </div>
    	
    <div class="col-10">
    	<h4>Documentação</h4>
        <div class="form-group{{ $errors->has('tp_documento') ? ' has-error' : '' }}">
            <div class="row">
                <label for="tp_documento" class="col-12 control-label">Informe um documento do Responsável<span class="text-danger">*</span></label>
                <div class="col-2">
        			<select id="tp_documento" name="tp_documento" class="form-control">
        				<option></option>
        				<option value="CNH" {{(old('tp_documento') == 'CNH' ? 'selected' : '')}}>CNH</option>
        				<option value="RG"  {{(old('tp_documento') == 'RG'  ? 'selected' : '')}}>RG</option>
        				<option value="CPF" {{(old('tp_documento') == 'CPF' ? 'selected' : '')}}>CPF</option>
        				<option value="TRE" {{(old('tp_documento') == 'TRE' ? 'selected' : '')}}>Título de Eleitor</option>
        			</select>
                </div> 
                <div class="col-3">
        			<input id="te_documento" type="text" placeholder="" class="form-control" name="te_documento" value="{{ old('te_documento') }}" required >                               
                </div> 
            </div>
        </div>
    
        <div class="form-group{{ $errors->has('nr_cnpj') ? ' has-error' : '' }}">
        	<div class="row">
                <label for="nr_cnpj" class="col-12 control-label">CNPJ / Inscrição Estadual<span class="text-danger">*</span></label>
                <div class="col-3">
                    <input id="nr_cnpj" type="text" class="form-control" name="nr_cnpj" value="{{ old('nr_cnpj') }}" required >
                </div>
    			<div class="col-2">
                	<input id="nr_insc_estadual" type="text" class="form-control" name="nr_insc_estadual" value="{{ old('nr_insc_estadual') }}">
            	</div>
            </div>
        </div>
    </div>
    	
    <div class="col-12">
    	<h4>Contato</h4>
        <div class="form-group{{ $errors->has('tp_contato1') ? ' has-error' : '' }}">
            <div class="row">
                <label for="tp_contato1" class="col-12 control-label">Telefone Obrigatório<span class="text-danger">*</span></label>
                <div class="col-2">
    				<select id="tp_contato1" name="tp_contato1" class="form-control">
    					<option value="" selected="selected"></option>
    					<option value="FC" {{(old('tp_contato1') == 'FC' ? 'selected' : '')}}>Telefone Comercial</option>
    					<option value="CC" {{(old('tp_contato1') == 'CC' ? 'selected' : '')}}>Celular Comercial</option>
    					<option value="FX" {{(old('tp_contato1') == 'FX' ? 'selected' : '')}}>FAX</option>
    				</select>
                </div> 
    	        <div class="col-2">
    				<input id="ds_contato1" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato1" value="{{ old('ds_contato1') }}" required >
                </div>
            </div>
        </div>
        <div class="form-group{{ $errors->has('tp_contato2') ? ' has-error' : '' }}">
            <div class="row">
                <label for="tp_contato2" class="col-12 control-label">Telefone</label>
                <div class="col-2">
    				<select id="tp_contato2" name="tp_contato2" class="form-control">
    					<option value="" selected="selected"></option>
    					<option value="FC" {{(old('tp_contato1') == 'FC' ? 'selected' : '')}}>Telefone Comercial</option>
    					<option value="CC" {{(old('tp_contato1') == 'CC' ? 'selected' : '')}}>Celular Comercial</option>
    					<option value="FX" {{(old('tp_contato1') == 'FX' ? 'selected' : '')}}>FAX</option>
    				</select>
                </div> 
    	        <div class="col-2">
    				<input id="ds_contato2" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato2" value="{{ old('ds_contato2') }}" >
                </div>
            </div>
        </div>
        <div class="form-group{{ $errors->has('tp_contato3') ? ' has-error' : '' }}">
            <div class="row">
                <label for="tp_contato3" class="col-12 control-label">Telefone</label>
                <div class="col-2">
    				<select id="tp_contato3" name="tp_contato3" class="form-control">
    					<option value="" selected="selected"></option>
    					<option value="FC" {{(old('tp_contato1') == 'FC' ? 'selected' : '')}}>Telefone Comercial</option>
    					<option value="CC" {{(old('tp_contato1') == 'CC' ? 'selected' : '')}}>Celular Comercial</option>
    					<option value="FX" {{(old('tp_contato1') == 'FX' ? 'selected' : '')}}>FAX</option>
    				</select>
                </div> 
    	        <div class="col-2">
    				<input id="ds_contato3" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato3" value="{{ old('ds_contato3') }}" >
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-10">
    	<h4>Endereço Comercial</h4>
    </div>
    
    <div class="form-group{{ $errors->has('nr_cep') ? ' has-error' : '' }}">
        <label for="nr_cep" class="col-3 control-label">CEP<span class="text-danger">*</span></label>
    
        <div class="col-2">
            <input id="nr_cep" type="text" class="form-control mascaraCep consultaCep" name="nr_cep" value="{{ old('nr_cep') }}" required  maxlength="9">
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
        <label for="sg_logradouro" class="col-3 control-label">Logradouro<span class="text-danger">*</span></label>
        <div class="col-2">
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
        <label for="te_endereco" class="col-3 control-label">Endereço<span class="text-danger">*</span></label>
    	
        <div class="col-7">
            <input id="te_endereco" type="text" class="form-control" name="te_endereco" value="{{ old('te_endereco') }}" required  maxlength="200">
        </div>
    </div>	
    
    <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
        <label for="nr_logradouro" class="col-3 control-label">Número<span class="text-danger">*</span></label>
    
        <div class="col-2">
            <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ old('nr_logradouro') }}" required  maxlength="50">
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
        <label for="te_complemento" class="col-3 control-label">Complemento</label>
    
        <div class="col-6">
     		<textarea rows="3" cols="53" id="te_complemento" name="te_complemento"  maxlength="1000">{{ old('te_complemento') }}</textarea>
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
        <label for="te_bairro" class="col-3 control-label">Bairro<span class="text-danger">*</span></label>
    
        <div class="col-3">
            <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ old('te_bairro') }}" required  maxlength="50">
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
        <label for="nm_cidade" class="col-3 control-label">Cidade<span class="text-danger">*</span></label>
    
        <div class="col-3">
            <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="{{ old('nm_cidade') }}" required  maxlength="50" readonly>
    		<input id="cd_cidade_ibge" type="hidden" name="cd_cidade_ibge" value="{{ old('cd_ibge_cidade') }}">
        </div>
    </div>
    
    <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
        <label for="sg_estado" class="col-3 control-label">Estado<span class="text-danger">*</span></label>
        <div class="col-3">
    		<select id="sg_estado" name="sg_estado" class="form-control" disabled>
    			<option></option>
                @foreach ($estados as $json)
    				<option value="{{ $json->sg_estado }}" {{(old('sg_estado') == $json->sg_estado ? 'selected' : '')}}>{{ $json->ds_estado }}</option>
                @endforeach
    		</select>
        </div>
    </div>
    
    <div class="col-10">
    	<h4>Dados de Acesso</h4>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-3 control-label">E-mail<span class="text-danger">*</span></label>
        <div class="col-4">
            <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{ old('email') }}" required  maxlength="50">
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-3 control-label">Senha<span class="text-danger">*</span></label>
        <div class="col-2">
            <input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{ old('password') }}" required  maxlength="50">
        </div>
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password_confirmation" class="col-3 control-label">Repita a Senha<span class="text-danger">*</span></label>
    
        <div class="col-2">
            <input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{ old('password_confirmation') }}" required  maxlength="50">
        </div>
    </div>
    <div class="form-group">
        <div class="col-12 col-offset-3">
            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
        </div>
    </div>