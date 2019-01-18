<style type="text/css">
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


<form action="{{ route('clinicas.update', $prestador->id) }}" method="post">
    <input type="hidden" name="_method" value="PUT">
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
            
            <div class="row">
                <div class="col-sm-5 col-md-5">
    		        <div class="form-group {{ $errors->has('te_documento') ? ' has-error' : '' }}">
    		        	 @foreach( $documentosclinica as $documento )
    		                <label for="nr_cnpj" class="col-12 control-label">CPF / CNPJ<span class="text-danger">*</span></label>
    		                <div class="col-12">
    		                	<input type="hidden" name="tp_documento" value="{{ $prestador->documentos->first()->tp_documento }}">
    		                    <input id="te_documento_{{$documento->id}}" type="text" class="form-control mascaraCNPJCPF" value="{{ $prestador->documentos->first()->te_documento }}" onkeyup="$('#te_documento_no_mask').val($(this).val().replace(/[^\d]+/g,''))" required readonly >
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
    		            	<label for="nr_cnpj" class="col-12 control-label">CPF / CNPJ<span class="text-danger">*</span></label>
    		                <div class="col-4">
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
    		   	</div>
    		   	<div class="col-sm-3 col-md-3">
    		   		<div class="form-group{{ $errors->has('tp_prestador') ? ' has-error' : '' }}">
    		   			<label for="tp_prestador" class="control-label">Tipo Prestador<span class="text-danger">*</span></label>
    		   			<div class="col-12">
    		   				<select id="tp_prestador" name="tp_prestador" class="form-control" readonly>
    		   					<option value="CLI" @if ( $prestador->tp_prestador == 'CLI') selected="selected"  @endif>Clínica</option>
    		   					<option value="LAB" @if ( $prestador->tp_prestador == 'LAB') selected="selected"  @endif>Laboratório</option>
								<option value="AUT" @if ( $prestador->tp_prestador == 'AUT') selected="selected"  @endif>Autônomo</option>
    		   				</select>
    		   				@if ($errors->has('tp_prestador'))
    		   					<span class="help-block text-danger">
    	                        	<strong>{{ $errors->first('tp_prestador') }}</strong>
    	                        </span>
    	                    @endif
    	               </div>
    	           	</div>
    	      	</div>
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
            
            <div class="form-group{{ $errors->has('obs_procedimento') ? ' has-error' : '' }}">
                <div class="row">
                    <label for="obs_procedimento" class="col-12 control-label">Observação para Exames/Procedimentos</label>
                    <div class="col-8">
                        <textarea rows="1" cols="10" id="obs_procedimento" class="form-control" name="obs_procedimento" value="{{ old('obs_procedimento') }}">{{$prestador->obs_procedimento}}</textarea>
                        @if ($errors->has('obs_procedimento'))
                        <span class="help-block text-danger">
                        	<strong>{{ $errors->first('obs_procedimento') }}</strong>
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
    	<div class="col-md-2">
    		<div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                <label for="sg_estado" class="col-3 control-label">Estado<span class="text-danger">*</span></label>
                <select id="sg_estado" name="sg_estado" class="form-control">
        			<option></option>
                    @foreach ($estados as $uf)
        				<option value="{{ $uf->sg_estado }}" {{ (!$prestador->enderecos->isEmpty() && !is_null($prestador->enderecos->first()->cidade) && $prestador->enderecos->first()->cidade->sg_estado == $uf->sg_estado ? 'selected' : '')}}>{{ $uf->ds_estado }}</option>
                    @endforeach
        		</select>
            </div>
    	</div>
    	<div class="col-md-4">
            <div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
                <label for="nm_cidade" class="col-3 control-label">Cidade<span class="text-danger">*</span></label>

                <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="@if(!$prestador->enderecos->isEmpty() && !is_null($prestador->enderecos->first()->cidade_id)) {{ $prestador->enderecos->first()->cidade->nm_cidade }} @endif" required  maxlength="50">
                <input id="cd_cidade_ibge" type="hidden" name="cd_cidade_ibge" value="@if(!$prestador->enderecos->isEmpty() && !is_null($prestador->enderecos->first()->cidade_id)) {{ $prestador->enderecos->first()->cidade->cd_ibge }} @endif">
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

    <div class="row">
        <div class="col-md-10">
        	<h4>Lista de Filiais</h4>
        </div>
        <div class="col-md-2 text-right" style="margin-bottom: 10px;">
        	<button type="button" class="btn btn-outline-primary btn-rounded btn-sm w-md waves-effect waves-light" onclick="addFilial(this)"><i class="mdi mdi-map-marker-plus"></i> Adicionar Filial</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
    			<tr>
    				<th style="width: 30px; text-align: center;">
    				#
    				</th>
    				<th style="width: 40px; text-align: center;" data-toggle="tooltip" data-placement="right" title="É a Unidade Matriz">
    				M
    				</th>
    				<th>
    					<div class="row">
    						<div class="col-md-2">
    							<label for="filial_nm_nome_fantasia" class="control-label"><strong>Unidade</strong><span class="text-danger">*</span></label>
    						</div>
    						<div class="col-md-1">
    							<label for="filial_cep" class="control-label"><strong>CEP</strong><span class="text-danger">*</span></label>
    						</div>
    						<div class="col-md-2">
    							<label for="filial_endereco" class="control-label"><strong>Endereço</strong><span class="text-danger">*</span></label>
    						</div>
    						<div class="col-md-1">
    							<label for="filial_nr_logradouro" class="control-label"><strong>Número</strong><span class="text-danger">*</span></label>
    						</div>
    						<div class="col-md-1">
    							<label for="filial_te_bairro" class="control-label"><strong>Bairro</strong><span class="text-danger">*</span></label>
    						</div>
    						<div class="col-md-1">
    							<label for="filial_nr_latitude" class="control-label"><strong>Latitude</strong><span class="text-danger">*</span></label>
    						</div>
    						<div class="col-md-1">
    							<label for="filial_nr_longitute" class="control-label"><strong>Longitude</strong><span class="text-danger">*</span></label>
    						</div>
                            <div class="col-md-1">
                                <label for="filial_sg_estado" class="control-label"><strong>UF</strong><span class="text-danger">*</span></label>
                            </div>
    						<div class="col-md-2">
    							<label for="filial_nm_cidade" class="control-label"><strong>Cidade</strong><span class="text-danger">*</span></label>
    						</div>
    					</div>
    				</th>
    				<th style="width: 20px; text-align: center;">
    				(+)
    				</th>
    				<th style="width: 20px; text-align: center;">
    				(-)
    				</th>
    			</tr>
    			<tbody id="list-all-filiais">
    			@for ($i = 0; $i < sizeof($list_filials); $i++)
    			<tr>
    				<td class="num_filial text-center">{{$i+1}}</td>
    				<td data-toggle="tooltip" data-placement="right" title="Unidade Matriz" class="text-center">
    					<div class="checkbox checkbox-primary">
    						<input type="checkbox" id="filial_eh_matriz_{{$i}}" class="filial_eh_matriz" name="filial_eh_matriz" @if( $list_filials[$i]->eh_matriz == 'S' ) checked="checked" @endif>
    						<label for="filial_eh_matriz_{{$i}}"></label>
    					</div>
    				</td>
    				<td>
    					<div class="row">
    						<div class="col-md-2">
    							<input type="text" class="form-control nm_nome_fantasia" value="{{ $list_filials[$i]->nm_nome_fantasia }}" maxlength="250">
    							<input type="hidden" class="filial_id" value="{{ $list_filials[$i]->id }}">
    						</div>
    						<div class="col-md-1">
    							<input type="text" class="form-control  mascaraCEP consultaCepFilial filial_cep" value="{{ $list_filials[$i]->endereco->nr_cep }}" maxlength="10">
    						</div>
    						<div class="col-md-2">
    							<input type="text" class="form-control filial_endereco" value="{{ $list_filials[$i]->endereco->te_endereco }}" maxlength="250">
    							<input type="hidden"  class="filial_endereco_id" value="{{ $list_filials[$i]->endereco->id }}" >
    							<i class="cvx-cep-filial cvx-input-loading cvx-no-loading fa fa-spin fa-circle-o-notch"></i>
    						</div>
    						<div class="col-md-1">
    							<input type="text" class="form-control filial_nr_logradouro" value="{{ $list_filials[$i]->endereco->nr_logradouro }}" maxlength="10">
    						</div>
    						<div class="col-md-1">
    							<input type="text" class="form-control filial_te_bairro" value="{{ $list_filials[$i]->endereco->te_bairro }}" maxlength="250">
    						</div>
    						<div class="col-md-1">
    							<input type="text" class="form-control filial_nr_latitude" value="{{ $list_filials[$i]->endereco->nr_latitude_gps }}">
    						</div>
    						<div class="col-md-1">
    							<input type="text" class="form-control filial_nr_longitute" value="{{ $list_filials[$i]->endereco->nr_longitute_gps }}">
    						</div>
    						<div class="col-md-1">
    							<select class="form-control filial_sg_estado">
    								<option></option>
    								<option value="AC" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'AC' ) selected="selected" @endif >AC</option>
    								<option value="AL" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'AL' ) selected="selected" @endif >AL</option>
    								<option value="AP" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'AP' ) selected="selected" @endif >AP</option>
    								<option value="AM" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'AM' ) selected="selected" @endif >AM</option>
    								<option value="BA" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'BA' ) selected="selected" @endif >BA</option>
    								<option value="CE" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'CE' ) selected="selected" @endif >CE</option>
    								<option value="DF" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'DF' ) selected="selected" @endif >DF</option>
    								<option value="ES" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'ES' ) selected="selected" @endif >ES</option>
    								<option value="GO" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'GO' ) selected="selected" @endif >GO</option>
    								<option value="MA" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'MA' ) selected="selected" @endif >MA</option>
    								<option value="MT" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'MT' ) selected="selected" @endif >MT</option>
    								<option value="MS" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'MS' ) selected="selected" @endif >MS</option>
    								<option value="MG" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'MG' ) selected="selected" @endif >MG</option>
    								<option value="PA" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'PA' ) selected="selected" @endif >PA</option>
    								<option value="PB" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'PB' ) selected="selected" @endif >PB</option>
    								<option value="PR" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'PR' ) selected="selected" @endif >PR</option>
    								<option value="PE" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'PE' ) selected="selected" @endif >PE</option>
    								<option value="PI" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'PI' ) selected="selected" @endif >PI</option>
    								<option value="RJ" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'RJ' ) selected="selected" @endif >RJ</option>
    								<option value="RN" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'RN' ) selected="selected" @endif >RN</option>
    								<option value="RS" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'RS' ) selected="selected" @endif >RS</option>
    								<option value="RO" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'RO' ) selected="selected" @endif >RO</option>
    								<option value="RR" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'RR' ) selected="selected" @endif >RR</option>
    								<option value="SC" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'SC' ) selected="selected" @endif >SC</option>
    								<option value="SP" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'SP' ) selected="selected" @endif >SP</option>
    								<option value="SE" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'SE' ) selected="selected" @endif >SE</option>
    								<option value="TO" @if( $list_filials[$i]->endereco->cidade->sg_estado == 'TO' ) selected="selected" @endif >TO</option>
    							</select>
    						</div>
                            <div class="col-md-2">
                                <input type="text" class="form-control filial_nm_cidade" value="{{ $list_filials[$i]->endereco->cidade->nm_cidade }}" maxlength="80">
                                <input type="hidden" class="filial_cd_cidade_ibge" value="{{ $list_filials[$i]->endereco->cidade->cd_ibge }}">
                            </div>
                                			
    					</div>
    					
    					<div class="row">
    						<div class="col-md-3">
    							<div class="form-inline" >
    								<div class="form-group">
    									<label for="nr_cnpj" class="control-label">CPF / CNPJ<span class="text-danger">*</span></label>
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
                				</div>
    						</div>
    						<div class="col-md-2">
    							<div class="form-inline" >
    								<div class="form-group">
    									<label for="tp_contato" class="control-label">Tipo</label>
    									<select id="tp_contato_{{$obContato->id}}" name="tp_contato_{{$obContato->id}}" class="form-control">
				        					<option value="FC" @if( $obContato->tp_contato == 'FC' ) selected='selected' @endif >Telefone Comercial</option>
				        					<option value="CC" @if( $obContato->tp_contato == 'CC' ) selected='selected' @endif >Celular Comercial</option>
				        					<option value="FX" @if( $obContato->tp_contato == 'FX' ) selected='selected' @endif >FAX</option>
				        				</select>
    								</div>
    							</div>
    						</div>
    						<div class="col-md-3">
    							<div class="form-inline" >
    								<div class="form-group">
    									<label for="tp_contato" class="control-label">Telefone<span class="text-danger">*</span></label>
    									<input id="ds_contato_{{ $obContato->id }}" type="text" placeholder="" class="form-control mascaraTelefone" name="ds_contato_{{ $obContato->id }}" value="{{ $obContato->ds_contato }}" required >
				        				<input type="hidden" id="contato_id" name="contato_id" value="{{ $obContato->id }}" >
    								</div>
    							</div>
    						</div>
    					</div>
    				</td>
    				<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Salvar Filial" onclick="salvarFilial(this)" style="margin-top: 2px;"><i class="mdi mdi-content-save"></i></button></td>
    				<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Filial" onclick="removerFilial(this)" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td>
    			</tr>
    			@endfor
    			</tbody>
    		</table>
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
        <div class="col-md-2">
            <div class="form-group">
                <label><input type="checkbox" name="change-password" value="1"> Alterar a senha ?</label>
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

    <select id="filial_sg_estado" class="form-control" style="display: none;">
    	<option></option>
    	@foreach ($estados as $uf)
    	<option value="{{ $uf->sg_estado }}" >{{ $uf->sg_estado }}</option>
    	@endforeach
    </select>
</form>

<script type="text/javascript">
$(document).ready(function () {
	
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

    $(".filial_eh_matriz").change(function() {
        $(".filial_eh_matriz").prop('checked', false);
        $(this).prop('checked', true);
    });

    $('#list-all-filiais').on('change', '.filial_sg_estado', function() {
        var uf = $(this).val();
        if ( !uf ) return false;

        var cvx_cep_filial = $(this).parent().parent();

        cvx_cep_filial.find(".filial_nm_cidade").val('');
        cvx_cep_filial.find(".filial_cd_cidade_ibge").val('');

        var instance = cvx_cep_filial.find( ".filial_nm_cidade" ).autocomplete( "instance" );
        if( instance ) {
            cvx_cep_filial.find( ".filial_nm_cidade" ).autocomplete('destroy');
        }
        
        cvx_cep_filial.find( ".filial_nm_cidade" ).autocomplete({
            source: function(request, response) {
            $.getJSON(
                    "/consulta-cidade",
                    { term: request.term, uf: uf }, 
                    response
                );
            },
            select: function (event, ui) {
                $(this).parent().parent().find(".filial_cd_cidade_ibge").val( ui.item.cd_ibge );
            },
            delay: 500,
            minLength: 2
        });
    });
    
});

function addFilial(input) {

  	var num_elements = $('#list-all-filiais tr').length;
  	var filial_sg_estado = $('#filial_sg_estado').html();
  	num_elements++;

  	var content = '<tr> \
  	  		<td class="num_filial">'+num_elements+'</td> \
  	  		<td data-toggle="tooltip" data-placement="right" title="É a Unidade Matriz" class="text-center"> \
				<div class="checkbox checkbox-primary"> \
					<input type="checkbox" id="filial_eh_matriz_'+num_elements+'" class="filial_eh_matriz" name="filial_eh_matriz"> \
					<label for="filial_eh_matriz_'+num_elements+'"></label> \
				</div> \
			</td> \
    		<td> \
    			<div class="row"> \
    				<div class="col-md-2"> \
    					<input type="text" class="form-control nm_nome_fantasia" maxlength="250" > \
    					<input type="hidden" class="filial_id" > \
    				</div> \
    				<div class="col-md-1"> \
                        <input type="text" class="form-control  mascaraCEP consultaCepFilial filial_cep" maxlength="10" > \
    				</div> \
    				<div class="col-md-2"> \
    					<input type="text"  class="form-control filial_endereco" maxlength="250" > \
    					<input type="hidden"  class="filial_endereco_id" > \
    					<i class="cvx-cep-filial cvx-input-loading cvx-no-loading fa fa-spin fa-circle-o-notch"></i> \
    				</div> \
    				<div class="col-md-1"> \
    					<input type="text" class="form-control filial_nr_logradouro" maxlength="10" > \
    				</div> \
    				<div class="col-md-1"> \
    					<input type="text" class="form-control filial_te_bairro" maxlength="250" > \
    				</div> \
    				<div class="col-md-1"> \
                        <input type="text" class="form-control filial_nr_latitude" > \
                    </div> \
    				<div class="col-md-1"> \
    					<input type="text" class="form-control filial_nr_longitute" > \
    				</div> \
    				<div class="col-md-1"> \
    					<select class="form-control filial_sg_estado">'+filial_sg_estado+'</select> \
    				</div> \
                    <div class="col-md-2"> \
                        <input type="text" class="form-control filial_nm_cidade" maxlength="80" > \
                        <input type="hidden" class="filial_cd_cidade_ibge" > \
                    </div> \
    			</div> \
    		</td> \
    		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Salvar Filial" onclick="salvarFilial(this)" style="margin-top: 2px;"><i class="mdi mdi-content-save"></i></button></td> \
    		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Filial" onclick="removerFilial(this)" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
    	</tr>';
   
	$('#list-all-filiais').append(content);

	$('#list-all-filiais').find(".consultaCepFilial:last" ).blur(function() {

		if($(this).val().length <= 3) { return false; }

		var cvx_cep_filial = $(this).parent().parent();
		cvx_cep_filial.find('.cvx-cep-filial').removeClass('cvx-no-loading');
    	
    	var nr_cep = $(this).val();
    	jQuery.ajax({
    		type: 'GET',
    	  	url: '/consulta-cep/cep/'+nr_cep,
    	  	data: {
				'_token': laravel_token
			},
			timeout: 15000,
			success: function (result) {
				
				cvx_cep_filial.find('.cvx-cep-filial').addClass('cvx-no-loading');

				if( result != null) {
					var json = JSON.parse(result.endereco);

					cvx_cep_filial.find('.filial_endereco').val(json.logradouro);
					cvx_cep_filial.find('.filial_te_bairro').val(json.bairro);
					cvx_cep_filial.find('.filial_nm_cidade').val(json.cidade);
					//$('#sg_logradouro').val(json.tp_logradouro);
					cvx_cep_filial.find('.filial_sg_estado').val(json.estado);
					cvx_cep_filial.find('.filial_cd_cidade_ibge').val(json.ibge);
					cvx_cep_filial.find('.filial_nr_latitude').val(json.latitude);
					cvx_cep_filial.find('.filial_nr_longitute').val(json.longitude);
					
				} else {
					cvx_cep_filial.find('.filial_endereco').val('');
					cvx_cep_filial.find('.filial_te_bairro').val('');
					cvx_cep_filial.find('.filial_nm_cidade').val('');
					//$('#sg_logradouro').prop('selectedIndex',0);
					cvx_cep_filial.find('.filial_sg_estado').val('');
					cvx_cep_filial.find('.filial_cd_cidade_ibge').val('');
					cvx_cep_filial.find('.filial_nr_latitude').val('');
					cvx_cep_filial.find('.filial_nr_longitute').val('');
				}
            },
            error: function (result) {
            	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
            	cvx_cep_filial.find('.cvx-cep-filial').addClass('cvx-no-loading');
            }
    	});
	}).inputmask({
		mask: ['99.999-999'],
		keepStatic: true
	});

	$(".filial_eh_matriz").change(function() {
        $(".filial_eh_matriz").prop('checked', false);
        $(this).prop('checked', true);
    });



	//$(content).find(".consultaCepFilial" ).trigger('input');

	/* $(".mascaraCEP").inputmask({
		mask: ['99.999-999'],
		keepStatic: true
	}); */
}

function salvarFilial(input) {

	var ct_element = $(input).parent().parent();

	var filial_id 	 			= ct_element.find('.filial_id').val();
	var filial_eh_matriz 	 	= ct_element.find('.filial_eh_matriz').is(":checked");
	var nm_nome_fantasia 	 	= ct_element.find('.nm_nome_fantasia').val();
	var filial_cep 			 	= ct_element.find('.filial_cep').val();
	var filial_endereco 	 	= ct_element.find('.filial_endereco').val();
	var filial_nr_logradouro 	= ct_element.find('.filial_nr_logradouro').val();
	var filial_te_bairro 	 	= ct_element.find('.filial_te_bairro').val();
	var filial_nr_latitude 	 	= ct_element.find('.filial_nr_latitude').val();
	var filial_nr_longitute  	= ct_element.find('.filial_nr_longitute').val();
	var filial_nm_cidade  	 	= ct_element.find('.filial_nm_cidade').val();
	var filial_cd_cidade_ibge 	= ct_element.find('.filial_cd_cidade_ibge').val();
	var filial_sg_estado 		= ct_element.find('.filial_sg_estado').val();
	var endereco_id 	 		= ct_element.find('.filial_endereco_id').val();
	var clinica_id 				= $('#clinica_id').val();
	
    if(nm_nome_fantasia.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "O Nome de fantasia da Filial é campo obrigatório!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_cep.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "O CEP da Filial é campo obrigatório!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_endereco.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "O Endereço da Filial é campo obrigatório!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_nr_logradouro.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "O Número do logradouro da Filial é campo obrigatório!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_te_bairro.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "O nome do Bairro da Filial é campo obrigatório!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_nr_latitude.length == 0 | filial_nr_longitute.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "A Latitude e a Longitude da Filial são campos obrigatórios!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_nm_cidade.length == 0 | filial_cd_cidade_ibge.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "O nome do cidade e o Código do IBGE são campos obrigatórios!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    if(filial_sg_estado.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "A UF da Filial é campo obrigatório!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }

    $(input).find('i').removeClass('mdi mdi-content-save').addClass('fa fa-spin fa-spinner');

    var nm_nome_fantasia 	 	= ct_element.find('.nm_nome_fantasia').val();
	var filial_cep 			 	= ct_element.find('.filial_cep').val();
	var filial_endereco 	 	= ct_element.find('.filial_endereco').val();
	var filial_nr_logradouro 	= ct_element.find('.filial_nr_logradouro').val();
	var filial_te_bairro 	 	= ct_element.find('.filial_te_bairro').val();
	var filial_nr_latitude 	 	= ct_element.find('.filial_nr_latitude').val();
	var filial_nr_longitute  	= ct_element.find('.filial_nr_longitute').val();
	var filial_nm_cidade  	 	= ct_element.find('.filial_nm_cidade').val();
	var filial_cd_cidade_ibge 	= ct_element.find('.filial_cd_cidade_ibge').val();
	var filial_sg_estado 		= ct_element.find('.filial_sg_estado').val();
	var eh_matriz				= 'N';

	if(filial_eh_matriz) {
		eh_matriz = 'S';
	}

    jQuery.ajax({
		type: 'POST',
	  	url: '/add-filial',
	  	data: {
		  	'filial_id': filial_id,
		  	'filial_eh_matriz': eh_matriz,
			'nm_nome_fantasia': nm_nome_fantasia,
			'filial_cep': filial_cep,
			'filial_endereco': filial_endereco,
			'filial_nr_logradouro': filial_nr_logradouro,
			'filial_te_bairro': filial_te_bairro,
			'filial_nr_latitude': filial_nr_latitude,
			'filial_nr_longitute': filial_nr_longitute,
			'filial_nm_cidade': filial_nm_cidade,
			'filial_cd_cidade_ibge': filial_cd_cidade_ibge,
			'filial_sg_estado': filial_sg_estado,
			'clinica_id': clinica_id,
			'endereco_id': endereco_id,
			'_token': laravel_token
		},
		success: function (result) {

			if( result.status) {
				var endereco_id = result.endereco_id;
				var filial_id 	= result.filial_id;

				ct_element.find('.filial_id').val(filial_id)
				ct_element.find('.filial_endereco_id').val(endereco_id)
				
				swal({
                    title: 'DoutorHoje',
                    text: result.mensagem,
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    confirmButtonText: 'OK'
                }).then(function () {
                    window.location.reload(false); 
                });
				
			} else {
				$.Notification.notify('error','top right', 'DoutorHoje', result.mensagem);
			}

			$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('mdi mdi-content-save');
        },
        error: function (result) {
        	$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('mdi mdi-content-save');
        	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
        }
	});
}

function removerFilial(input) {

	var nome_filial = $(input).parent().parent().find('input.nm_nome_fantasia').val();
	var ct_element = $(input).parent().parent();
	var filial_id = ct_element.find('.filial_id').val();

	if(filial_id.length == 0) {

    	swal({
	            title: 'DoutorHoje: Alerta!',
	            text: "Nenhuma Filial foi selecionada!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );

    	$(input).parent().parent().remove();
        return false;
    }
	
	var mensagem = 'Tem certeza que deseja remover a Filial: '+nome_filial;
    swal({
        title: mensagem,
        text: "O Registro será removido da lista",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-confirm mt-2',
        cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar'
    }).then(function () {

    	$(input).find('i').removeClass('ion-trash-a').addClass('fa fa-spin fa-spinner');

    	jQuery.ajax({
    		type: 'POST',
    	  	url: '/delete-filial',
    	  	data: {
    		  	'filial_id': filial_id,
    			'_token': laravel_token
    		},
    		success: function (result) {

    			if( result.status) {
    				
    				swal({
                        title: 'DoutorHoje',
                        text: result.mensagem,
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function () {
                        window.location.reload(false); 
                    });
    				
    			} else {
    				$.Notification.notify('error','top right', 'DoutorHoje', result.mensagem);
    			}

    			$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
            },
            error: function (result) {
            	$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
            	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
            }
    	});

    	$(input).parent().parent().css('background-color', '#ffbfbf');
		$(input).parent().parent().fadeOut(400, function(){
	    	$(input).parent().parent().remove();
	
	    	var i = 1;
	
	    	$('.num_filial').each(function(index){
	        	$(this).html(index+1);
	        });
	    });
    	
        swal({
                title: 'Concluído !',
                text: "A Filial foi excluída com sucesso",
                type: 'success',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }
        );
    });
}
</script>