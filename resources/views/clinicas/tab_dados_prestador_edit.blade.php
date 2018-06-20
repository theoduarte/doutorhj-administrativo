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
                <input id="nm_razao_social" type="text" class="form-control" name="nm_razao_social" value="{{ $prestador->nm_razao_social}}" required  maxlength="150" autofocus>
            </div>	
        </div>
        
        <div class="form-group{{ $errors->has('nm_fantasia') ? ' has-error' : '' }}">
            <label for="nm_fantasia" class="col-3 control-label">Nome Fantasia<span class="text-danger">*</span></label>
            <div class="col-8">
                <input id="nm_fantasia" type="text" class="form-control" name="nm_fantasia" value="{{$prestador->nm_fantasia}}" required  maxlength="150">
            </div>	
        </div>
        
        <div class="form-group{{ $errors->has('te_documento') ? ' has-error' : '' }}">
        	 @foreach( $documentosclinica as $documento )
                <label for="nr_cnpj" class="col-12 control-label">CNPJ / Inscrição Estadual<span class="text-danger">*</span></label>
                <div class="col-8">
                	<input type="hidden" name="tp_documento" value="{{ $prestador->documentos->first()->tp_documento }}">
                    <input id="te_documento_{{$documento->id}}" type="text" class="form-control mascaraCNPJ" value="{{ $prestador->documentos->first()->te_documento }}" onkeyup="$('#te_documento_no_mask').val($(this).val().replace(/[^\d]+/g,''))" required readonly >
                    <input type="hidden" id="te_documento_no_mask" name="te_documento" value="{{ preg_replace('/[^0-9]/', '', $prestador->documentos->first()->te_documento) }}" maxlength="30" >
                    <input type="hidden" id="cnpj_id" name="cnpj_id" value="{{ $documento->id }}">
                    @if ($errors->has('te_documento'))
                    <span class="help-block text-danger">
                    	<strong>{{ $errors->first('te_documento') }}</strong>
                    </span>
                    @endif
                </div>
            @endforeach
            @if($documentosclinica->isEmpty())
            	<label for="nr_cnpj" class="col-12 control-label">CNPJ / Inscrição Estadual<span class="text-danger">*</span></label>
                <div class="col-8">
                	<input type="hidden" name="tp_documento" value="CNPJ">
                    <input id="te_documento" type="text" class="form-control mascaraCNPJ" onkeyup="$('#te_documento_no_mask').val($(this).val().replace(/[^\d]+/g,''))" required >
                    <input type="hidden" id="te_documento_no_mask" name="te_documento" maxlength="30" >
                    <input type="hidden" id="cnpj_id" name="cnpj_id">
                    @if ($errors->has('te_documento'))
                    <span class="help-block text-danger">
                    	<strong>{{ $errors->first('te_documento') }}</strong>
                    </span>
                    @endif
                </div>
            @endif
        </div>
        
         <div class="form-group{{ $errors->has('tp_contato') ? ' has-error' : '' }}">
        	@foreach ( $prestador->contatos as $obContato )                
            <label for="tp_contato" class="col-12 control-label">Telefone<span class="text-danger">*</span></label>
            <div class="row">
            	<div class="col-md-4">
    				<select id="tp_contato_{{$obContato->id}}" name="tp_contato_{{$obContato->id}}" class="form-control">
    					<option value="FC" @if( $obContato->tp_contato == 'FC' ) selected='selected' @endif >Telefone Comercial</option>
    					<option value="CC" @if( $obContato->tp_contato == 'CC' ) selected='selected' @endif >Celular Comercial</option>
    					<option value="FX" @if( $obContato->tp_contato == 'FX' ) selected='selected' @endif >FAX</option>
    				</select>
                </div>
    	        <div class="col-md-4">
    				<input id="ds_contato_{{ $obContato->id }}" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato_{{ $obContato->id }}" value="{{ $obContato->ds_contato }}" required >
    				<input type="hidden" id="contato_id" name="contato_id" value="{{ $obContato->id }}" >
                </div>
            </div>
            @endforeach
            @if($prestador->contatos->isEmpty())
            	<label for="tp_contato" class="col-12 control-label">Telefone<span class="text-danger">*</span></label>
	            <div class="row">
	            	<div class="col-md-4">
	    				<select id="tp_contato" name="tp_contato" class="form-control">
	    					<option value="FC" >Telefone Comercial</option>
	    					<option value="CC" >Celular Comercial</option>
	    					<option value="FX" >FAX</option>
	    				</select>
	                </div>
	    	        <div class="col-md-4">
	    				<input id="ds_contato" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato" required >
	    				<input type="hidden" id="contato_id" name="contato_id" >
	                </div>
	            </div>
            @endif
        </div>
        
	</div>
	<div class="col-md-6">
	
		<h4>Dados Pessoais do Responsável</h4>
		
        <div class="form-group{{ $errors->has('name_responsavel') ? ' has-error' : '' }}">
        	<div class="row">
                <label for="name_responsavel" class="col-12 control-label">Nome<span class="text-danger">*</span></label>
                <div class="col-8">
                    <input type="text"  id="name_responsavel" class="form-control" name="name_responsavel" value="{{$prestador->responsavel->user->name}}" required  maxlength="50">
                    <input type="hidden" id="responsavel_id" name="responsavel_id" value="{{$prestador->responsavel->id}}">
                </div>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('cpf_responsavel') ? ' has-error' : '' }}">
            <div class="row">
                <label for="cpf_responsavel" class="col-12 control-label">CPF<span class="text-danger">*</span></label>
                <div class="col-8">
                    <input id="cpf_responsavel" type="text" class="form-control mascaraCPF" value="{{$prestador->responsavel->cpf}}" required readonly  maxlength="14">
                    <input type="hidden" id="cpf_responsavel_no_mask" name="cpf_responsavel" value="{{ preg_replace('/[^0-9]/', '', $prestador->responsavel->cpf) }}" maxlength="14" >
                    @if ($errors->has('cpf_responsavel'))
                    <span class="help-block text-danger">
                    	<strong>{{ $errors->first('cpf_responsavel') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="form-group{{ $errors->has('telefone_responsavel') ? ' has-error' : '' }}">
            <div class="row">
                <label for="telefone_responsavel" class="col-12 control-label">Telefone<span class="text-danger">*</span></label>
                <div class="col-8">
                    <input id="telefone_responsavel" type="text" class="form-control mascaraTelefone" name="telefone_responsavel" value="{{$prestador->responsavel->telefone}}" required  maxlength="20">
                    @if ($errors->has('telefone_responsavel'))
                    <span class="help-block text-danger">
                    	<strong>{{ $errors->first('telefone_responsavel') }}</strong>
                    </span>
                    @endif
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
		<div class="form-group{{ $errors->has('nr_cep') | $errors->has('cd_cidade_ibge') ? ' has-error' : '' }}">
            <label for="nr_cep" class="col-3 control-label">CEP<span class="text-danger">*</span></label>
            <input id="nr_cep" type="text" class="form-control mascaraCEP consultaCep" name="nr_cep" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->nr_cep }} @endif" required  maxlength="10">
            
            <input type="hidden" id="endereco_id" name="endereco_id" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->id }} @endif">
            @if ($errors->has('cd_cidade_ibge'))
            <span class="help-block text-danger">
            	<strong>Cód. IBGE não Encontrado!</strong>
            </span>
            @endif
        </div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
            <label for="sg_logradouro" class="col-3 control-label">Logradouro<span class="text-danger">*</span></label>
    		<select id="sg_logradouro" name="sg_logradouro" class="form-control">
    			<option value="" selected="selected"></option>
                <option value="Aeroporto" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Aeroporto' ? 'selected' : '')}}>Aeroporto</option>
                <option value="Alameda" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Alameda' ? 'selected' : '')}}>Alameda</option>
                <option value="Área" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Área' ? 'selected' : '')}}>Área</option>
                <option value="Avenida" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Avenida' ? 'selected' : '')}}>Avenida</option>
                <option value="Campo" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Campo' ? 'selected' : '')}}>Campo</option>
                <option value="Chácara" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Chácara' ? 'selected' : '')}}>Chácara</option>
                <option value="Colônia" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Colônia' ? 'selected' : '')}}>Colônia</option>
                <option value="Condomínio" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Condomínio' ? 'selected' : '')}}>Condomínio</option>
                <option value="Conjunto" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Conjunto' ? 'selected' : '')}}>Conjunto</option>
                <option value="Distrito" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Distrito' ? 'selected' : '')}}>Distrito</option>
                <option value="Esplanada" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Esplanada' ? 'selected' : '')}}>Esplanada</option>
                <option value="Estação" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Estação' ? 'selected' : '')}}>Estação</option>
                <option value="Estrada" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Estrada' ? 'selected' : '')}}>Estrada</option>
                <option value="Favela" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Favela' ? 'selected' : '')}}>Favela</option>
                <option value="Feira" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Feira' ? 'selected' : '')}}>Feira</option>
                <option value="Jardim" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Jardim' ? 'selected' : '')}}>Jardim</option>
                <option value="Ladeira" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Ladeira' ? 'selected' : '')}}>Ladeira</option>
                <option value="Lago" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Lago' ? 'selected' : '')}}>Lago</option>
                <option value="Lagoa" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Lagoa' ? 'selected' : '')}}>Lagoa</option>
                <option value="Largo" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Largo' ? 'selected' : '')}}>Largo</option>
                <option value="Loteamento" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Loteamento' ? 'selected' : '')}}>Loteamento</option>
                <option value="Morro" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Morro' ? 'selected' : '')}}>Morro</option>
                <option value="Núcleo" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Núcleo' ? 'selected' : '')}}>Núcleo</option>
                <option value="Parque" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Parque' ? 'selected' : '')}}>Parque</option>
                <option value="Passarela" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'P -->assarela' ? 'selected' : '')}}>Passarela</option>
                <option value="Pátio" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Pátio' ? 'selected' : '')}}>Pátio</option>
                <option value="Praça" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Praça' ? 'selected' : '')}}>Praça</option>
                <option value="Quadra" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Quadra' ? 'selected' : '')}}>Quadra</option>
                <option value="Recanto" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Recanto' ? 'selected' : '')}}>Recanto</option>
                <option value="Residencial" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Residencial' ? 'selected' : '')}}>Residencial</option>
                <option value="Rodovia" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Rodovia' ? 'selected' : '')}}>Rodovia</option>
                <option value="Rua" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Rua' ? 'selected' : '')}}>Rua</option>
                <option value="Setor" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Setor' ? 'selected' : '')}}>Setor</option>
                <option value="Sítio" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Sítio' ? 'selected' : '')}}>Sítio</option>
                <option value="Travessa" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Travessa' ? 'selected' : '')}}>Travessa</option>
                <option value="Trecho" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Trecho' ? 'selected' : '')}}>Trecho</option>
                <option value="Trevo" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Trevo' ? 'selected' : '')}}>Trevo</option>
                <option value="Vale" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Vale' ? 'selected' : '')}}>Vale</option>
                <option value="Vereda" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Vereda' ? 'selected' : '')}}>Vereda</option>
                <option value="Via" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Via' ? 'selected' : '')}}>Via</option>
                <option value="Viaduto" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Viaduto' ? 'selected' : '')}}>Viaduto</option>
                <option value="Viela" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Viela' ? 'selected' : '')}}>Viela</option>
                <option value="Vila" {{(!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->sg_logradouro == 'Vila' ? 'selected' : '')}}>Vila</option>
    		</select>
        </div>
	</div>
	<div class="col-md-7">
		<div class="form-group{{ $errors->has('te_endereco') ? ' has-error' : '' }}">
    		<label for="te_endereco" class="col-3 control-label">Endereço<span class="text-danger">*</span></label>
    		<input id="te_endereco" type="text" class="form-control" name="te_endereco" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->te_endereco }} @endif" required  maxlength="200">
    		<i id="cvx-input-loading" class="cvx-input-loading cvx-no-loading fa fa-spin fa-circle-o-notch"></i>
    	</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
    		<label for="nr_logradouro" class="col-3 control-label">Número<span class="text-danger">*</span></label>
    		<input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->nr_logradouro }} @endif" required  maxlength="50">
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('nr_latitude_gps') ? ' has-error' : '' }}">
    		<label for="nr_latitude_gps" class="col-3 control-label">Latitude<span class="text-danger">*</span></label>
    		<input id="nr_latitude_gps" type="text" class="form-control" name="nr_latitude_gps" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->nr_latitude_gps }} @endif" required  maxlength="50">
    		<!-- onkeypress="onlyNumbers(event)"  -->
		</div>
	</div>
</div>	

<div class="row">
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
            <label for="te_complemento" class="col-3 control-label">Complemento</label>
            <textarea rows="1" cols="10" id="te_complemento" class="form-control" name="te_complemento"  maxlength="1000">@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->te_complemento }} @endif</textarea>
        </div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
    		<label for="te_bairro" class="col-3 control-label">Bairro<span class="text-danger">*</span></label>
    		<input id="te_bairro" type="text" class="form-control" name="te_bairro" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->te_bairro }} @endif" required  maxlength="250">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
			<label for="nm_cidade" class="col-3 control-label">Cidade<span class="text-danger">*</span></label>

            <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->cidade->nm_cidade }} @endif" required  maxlength="50" readonly>
    		<input id="cd_cidade_ibge" type="hidden" name="cd_cidade_ibge" value="@if(!$prestador->enderecos->isEmpty()) {{ $prestador->enderecos->first()->cidade->cd_ibge }} @endif">
    	</div>
    </div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
            <label for="sg_estado" class="col-3 control-label">Estado<span class="text-danger">*</span></label>
            <select id="sg_estado" name="sg_estado" class="form-control" disabled>
    			<option></option>
                @foreach ($estados as $uf)
    				<option value="{{ $uf->sg_estado }}" {{ (!$prestador->enderecos->isEmpty() && $prestador->enderecos->first()->cidade->sg_estado == $uf->sg_estado ? 'selected' : '')}}>{{ $uf->ds_estado }}</option>
                @endforeach
    		</select>
        </div>
	</div>
	<div class="col-md-1">
		<div class="form-group{{ $errors->has('nr_longitute_gps') ? ' has-error' : '' }}">
    		<label for="nr_longitute_gps" class="col-3 control-label">Longitude<span class="text-danger">*</span></label>
    		<input id="nr_longitute_gps" type="text" class="form-control" name="nr_longitute_gps" value="@if(!$prestador->enderecos->isEmpty()) {{$prestador->enderecos->first()->nr_longitute_gps}} @endif" required  maxlength="50">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
    	<hr>
    </div>
</div>

<div class="col-10">
	<h4>Lista de Filiais</h4>
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
            <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{ $user->email }}" required readonly  maxlength="50">
            <input type="hidden" id="responsavel_user_id" name="responsavel_user_id" value="{{ $user->id }}" >
            @if ($errors->has('email'))
            <span class="help-block text-danger">
            	<strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    		<label for="password" class="col-3 control-label">Senha<span class="text-danger">*</span></label>
    		<input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{ $user->password }}" required  maxlength="50">
    		@if ($errors->has('password'))
            <span class="help-block text-danger">
            	<strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    		<label for="password_confirmation" class="control-label">Repita a Senha<span class="text-danger">*</span></label>
    		<input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{ $user->password }}" required  maxlength="50">
    		@if ($errors->has('password_confirmation'))
            <span class="help-block text-danger">
            	<strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
		</div>
	</div>
</div>

<div class="form-group">
    <div class="col-12 col-offset-3">
        
    </div>
				
	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Alterar</button>
		<a href="{{ route('clinicas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
	</div>
</div>

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
    });
</script>