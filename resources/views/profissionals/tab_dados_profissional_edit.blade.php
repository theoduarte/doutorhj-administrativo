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

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card-box">
				<form action="{{ route('profissionals.update', $profissionals->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
				
                    @if($errors->any())
                        <div class="col-12 alert alert-danger">
                            @foreach ($errors->all() as $error)<div class="col-5">{{$error}}</div>@endforeach
                        </div>
                    @endif
					
					<div class="form-group">
						<div class="row">
    						<div class="col-2">
        						<label for="nm_primario">Primeiro nome<span class="text-danger">*</span></label>
        						<input type="text" id="nm_primario" class="form-control" name="nm_primario" value="{{$profissionals->nm_primario}}" required placeholder="Primeiro nome"  >
    						</div>
		
    						<div class="col-4">
        						<label for="nm_primario">Sobrenome<span class="text-danger">*</span></label>
        						<input type="text" id="nm_secundario" class="form-control" name="nm_secundario" value="{{$profissionals->nm_secundario}}" required placeholder="" >
    						</div>	
						</div>	
					</div>
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                            	<label for="cs_sexo" class="control-label">Sexo<span class="text-danger">*</span></label>
        						<select id="cs_sexo" class="form-control" name="cs_sexo" required autofocus > 
        							<option value="M"  {{( $profissionals->cs_sexo == 'M' ) ? 'selected' : ''}} >MASCULINO</option>
        							<option value="F" {{( $profissionals->cs_sexo == 'F' ) ? 'selected' : ''}} >FEMININO</option>
        						</select>
    						</div>
						</div>
                    </div>
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-2">
                                <label for="dt_nascimento" class="control-label">Data de Nascimento</label>
                      			<input id="dt_nascimento" type="text" class="form-control" name="dt_nascimento" value="{{$profissionals->dt_nascimento}}" required autofocus >
                        	</div>
                    	</div>
                    </div>

										
					<div class="form-group">
						@foreach( $profissionals->documentos as $documento )
							<div class="row">
                   		        <div class="col-2">
                   		        	<input type="hidden" name="tp_documento" value="{{$documento->tp_documento}}">
    					        	<label for="te_documento" class="control-label">{{$documento->tp_documento}}</label>
        							<input type="text" placeholder="" class="form-control @if ( trim($documento->tp_documento) == 'CNPJ') mascaraCNPJ @endif" name="te_documento" value="{{$documento->te_documento}}" required autofocus >                                   
                                </div> 
                            </div>
                     	@endforeach           
					</div>
					
					
					<div class="form-group">
						<label for="especialidade">Especialidades<span class="text-danger">*</span></label>
						<select id="especialidade" name="especialidade[]" class="multi-select cvx_select_multiple" multiple="" >
						@foreach($arEspecialidade as $id => $especialidade)
						
							<option value="{{ $especialidade->id }}"
							@foreach( $profissionals->especialidades as $espProfissional )
								@if( $espProfissional->id == $especialidade->id ) {{'selected'}} @endif
							@endforeach
							>
								{{ $especialidade->ds_especialidade }}
							</option>
							
						@endforeach
						</select>
					</div>
					
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('profissionals.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
