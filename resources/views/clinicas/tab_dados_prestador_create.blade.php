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

@if($errors->any())
    <div class="col-12 alert alert-danger">
        @foreach ($errors->all() as $error)<div class="col-5">{{ $error }}</div>@endforeach
    </div>
@endif

{!! csrf_field() !!}
<div class="row">
	<div class="col-md-6">
	
		<h4>Dados Cadastrais da Clínica</h4>
		
		<div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
            <label for="nm_razao_social" class="col-3 control-label">Razão Social<span class="text-danger">*</span></label>
            <div class="col-8">
                <input id="nm_razao_social" type="text" class="form-control" name="nm_razao_social" required  maxlength="100" autofocus>
            </div>	
        </div>
        
        <div class="form-group{{ $errors->has('nm_fantasia') ? ' has-error' : '' }}">
            <label for="nm_fantasia" class="col-3 control-label">Nome Fantasia<span class="text-danger">*</span></label>
            <div class="col-8">
                <input id="nm_fantasia" type="text" class="form-control" name="nm_fantasia" required  maxlength="100">
            </div>	
        </div>
        
        <div class="form-group{{ $errors->has('nr_cnpj') ? ' has-error' : '' }}"> 
            <label for="nr_cnpj" class="col-12 control-label">CNPJ / Inscrição Estadual<span class="text-danger">*</span></label>
            <div class="col-8">
            	<input type="hidden" name="tp_documento" value="CNPJ">
                <input type="text" id="te_documento" class="form-control mascaraCNPJ" name="te_documento" required >
                <input type="hidden" id="cnpj_id" name="cnpj_id" >
            </div>
        </div>
        
         <div class="form-group{{ $errors->has('tp_contato') ? ' has-error' : '' }}">
            <label for="tp_contato" class="col-12 control-label">Telefone<span class="text-danger">*</span></label>
            <div class="row">
            	<div class="col-md-4">
    				<select id="tp_contato" name="tp_contato" class="form-control">
    					<option value="FC">Telefone Comercial</option>
    					<option value="CC">Celular Comercial</option>
    					<option value="FX">FAX</option>
    				</select>
                </div>
    	        <div class="col-md-4">
    				<input type="text" id="ds_contato" placeholder="" class="form-control mascaraTelefone" name="ds_contato" required >
    				<input type="hidden" id="contato_id" name="contato_id" >
                </div>
            </div>
        </div>
        
	</div>
	<div class="col-md-6">
	
		<h4>Dados Pessoais do Responsável</h4>
		
        <div class="form-group{{ $errors->has('name_responsavel') ? ' has-error' : '' }}">
        	<div class="row">
                <label for="name_responsavel" class="col-12 control-label">Nome<span class="text-danger">*</span></label>
                <div class="col-8">
                    <input id="name_responsavel" type="text" class="form-control" name="name_responsavel" required  maxlength="50">
                </div>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('cpf_responsavel') ? ' has-error' : '' }}">
            <div class="row">
                <label for="cpf_responsavel" class="col-12 control-label">CPF<span class="text-danger">*</span></label>
                <div class="col-8">
                    <input id="cpf_responsavel" type="text" class="form-control mascaraCPF" name="cpf_responsavel" required  maxlength="14">
                </div>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('telefone_responsavel') ? ' has-error' : '' }}">
            <div class="row">
                <label for="telefone_responsavel" class="col-12 control-label">Telefone<span class="text-danger">*</span></label>
                <div class="col-8">
                    <input id="telefone_responsavel" type="text" class="form-control" name="telefone_responsavel" required  maxlength="20">
                </div>
            </div>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
    	<hr>
    </div>
</div>

<div class="col-10">
	<h4>Endereço Comercial</h4>
</div>

<div class="row">
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('nr_cep') ? ' has-error' : '' }}">
            <label for="nr_cep" class="col-3 control-label">CEP<span class="text-danger">*</span></label>
            <input id="nr_cep" type="text" class="form-control mascaraCEP consultaCep" name="nr_cep" required  maxlength="9">
            <input type="hidden" id="endereco_id" name="endereco_id" >
        </div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
            <label for="sg_logradouro" class="col-3 control-label">Logradouro<span class="text-danger">*</span></label>
    		<select id="sg_logradouro" name="sg_logradouro" class="form-control">
    			<option value="" selected="selected"></option>
                <option value="Aeroporto">Aeroporto</option>
                <option value="Alameda">Alameda</option>
                <option value="Área">Área</option>
                <option value="Avenida">Avenida</option>
                <option value="Campo">Campo</option>
                <option value="Chácara">Chácara</option>
                <option value="Colônia">Colônia</option>
                <option value="Condomínio">Condomínio</option>
                <option value="Conjunto">Conjunto</option>
                <option value="Distrito">Distrito</option>
                <option value="Esplanada">Esplanada</option>
                <option value="Estação">Estação</option>
                <option value="Estrada">Estrada</option>
                <option value="Favela">Favela</option>
                <option value="Feira">Feira</option>
                <option value="Jardim">Jardim</option>
                <option value="Ladeira">Ladeira</option>
                <option value="Lago">Lago</option>
                <option value="Lagoa">Lagoa</option>
                <option value="Largo">Largo</option>
                <option value="Loteamento">Loteamento</option>
                <option value="Morro">Morro</option>
                <option value="Núcleo">Núcleo</option>
                <option value="Parque">Parque</option>
                <option value="Passarela">Passarela</option>
                <option value="Pátio">Pátio</option>
                <option value="Praça">Praça</option>
                <option value="Quadra">Quadra</option>
                <option value="Recanto">Recanto</option>
                <option value="Residencial">Residencial</option>
                <option value="Rodovia">Rodovia</option>
                <option value="Rua">Rua</option>
                <option value="Setor">Setor</option>
                <option value="Sítio">Sítio</option>
                <option value="Travessa">Travessa</option>
                <option value="Trecho">Trecho</option>
                <option value="Trevo">Trevo</option>
                <option value="Vale">Vale</option>
                <option value="Vereda">Vereda</option>
                <option value="Via">Via</option>
                <option value="Viaduto">Viaduto</option>
                <option value="Viela">Viela</option>
                <option value="Vila">Vila</option>
    		</select>
        </div>
	</div>
	<div class="col-md-8">
		<div class="form-group{{ $errors->has('te_endereco') ? ' has-error' : '' }}">
    		<label for="te_endereco" class="col-3 control-label">Endereço<span class="text-danger">*</span></label>
    		<input id="te_endereco" type="text" class="form-control" name="te_endereco" required  maxlength="200">
    	</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
    		<label for="nr_logradouro" class="col-3 control-label">Número<span class="text-danger">*</span></label>
    		<input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" required  maxlength="50">
		</div>
	</div>
</div>	

<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
            <label for="te_complemento" class="col-3 control-label">Complemento</label>
            <textarea rows="1" cols="10" id="te_complemento" class="form-control" name="te_complemento"  maxlength="1000"></textarea>
        </div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
    		<label for="te_bairro" class="col-3 control-label">Bairro<span class="text-danger">*</span></label>
    		<input id="te_bairro" type="text" class="form-control" name="te_bairro" required  maxlength="50">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
			<label for="nm_cidade" class="col-3 control-label">Cidade<span class="text-danger">*</span></label>

            <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" required  maxlength="50" readonly>
    		<input id="cd_cidade_ibge" type="hidden" name="cd_cidade_ibge" >
    	</div>
    </div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
            <label for="sg_estado" class="col-3 control-label">Estado<span class="text-danger">*</span></label>
            <select id="sg_estado" name="sg_estado" class="form-control" readonly>
    			<option></option>
                @foreach ($estados as $uf)
    				<option value="{{ $uf->sg_estado }}" >{{ $uf->ds_estado }}</option>
                @endforeach
    		</select>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
    	<hr>
    </div>
</div>

<div class="col-10">
	<h4>Dados de Acesso</h4>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-3 control-label">E-mail<span class="text-danger">*</span></label>
            <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" required  maxlength="50">
        </div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    		<label for="password" class="col-3 control-label">Senha<span class="text-danger">*</span></label>
    		<input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" required  maxlength="50">
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    		<label for="password_confirmation" class="control-label">Repita a Senha<span class="text-danger">*</span></label>
    		<input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" required  maxlength="50">
		</div>
	</div>
</div>

<div class="form-group">
    <div class="col-12 col-offset-3">
        
    </div>
				
	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Cadastrar</button>
		<a href="{{ route('clinicas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
	</div>
</div>

<script type="text/javascript">
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