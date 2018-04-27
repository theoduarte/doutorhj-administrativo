<div class="form-group">
	<div class="row">
        <div class="col-8">
			<div class="row">
		        <div class="col-10">
		        	<label for="ds_procedimento" class="control-label">Descrição Procedimento<span class="text-danger">*</span></label>
		            <input id="ds_procedimento" type="text" class="form-control" name="ds_procedimento" value="{{ old('ds_procedimento') }}" placeholder="Informe a Descrição do Procedimento para buscar" autofocus maxlength="100">
		       		<input type="hidden" id="cd_procedimento" name="cd_procedimento" value="">
		       		<input type="hidden" id="descricao_procedimento" name="descricao_procedimento" value="">
		       		<input type="hidden" id="atendimento_id" name="atendimento_id" value="">
		       		<input type="hidden" id="procedimento_id" name="procedimento_id" value="">
		        </div>
		        <div class="col-2">
		            <label for="vl_com_procedimento" class="control-label">Valor Comercial (R$)<span class="text-danger">*</span></label>
		            <input id="vl_com_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_com_procedimento" value="{{ old('vl_com_procedimento') }}"  maxlength="15">
		        </div>
		        <div class="col-3">
		        	
		        </div>
			</div>
			
			<div class="row">
		        <div class="col-10">
		        	<label for="nm_profissional" class="control-label">Profissional<span class="text-danger">*</span></label>
		            <!-- <input id="nm_profissional" type="text" class="form-control" name="nm_profissional" value="{{ old('nm_profissional') }}" placeholder="Informe o Nome do Profissional para buscar" maxlength="100"> -->
		            <select id="list_profissional_procedimento" class="select2 select2-multiple" name="nm_profissional" multiple="multiple" multiple data-placeholder="Selecione ...">
			            @foreach($list_profissionals as $profissional)
			            <option value="{{ $profissional->id }}">{{ $profissional->nm_primario.' '.$profissional->nm_secundario.' ('.$profissional->documentos->first()->tp_documento.': '.$profissional->documentos->first()->te_documento.')' }}</option>
			            @endforeach
		            </select>
		       		<input type="hidden" id="atendimento_profissional_id" name="atendimento_profissional_id" value="">
		        </div>
		        <div class="col-2">
		            <label for="vl_net_procedimento" class="control-label">Valor NET (R$)<span class="text-danger">*</span></label>
		            <input id="vl_net_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_net_procedimento" value="{{ old('vl_net_procedimento') }}"  maxlength="15">
		        </div>
			</div>
		</div>
		<div class="col-2">
			<div style="height: 60px;"></div>
		    <button type="button" class="btn btn-primary" onclick="addLinhaProcedimento();"><i class="mdi mdi-content-save"></i> Salvar</button>
		    <a onclick="limparProcedimento()" class="btn btn-icon btn-danger" title="Limpar Procedimento"><i class="mdi mdi-close"></i> Limpar</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecosProcedimentos" name="tblPrecosProcedimentos" class="table table-striped table-bordered table-doutorhj">
        		<tr>
					<th width="12">Id</th>
					<th width="80">Código</th>
					<th width="380">Procedimento</th>
					<th width="300">Profissional</th>
					<th width="100">Vl. Com. (R$)</th>
					<th width="100">Vl. NET (R$)</th>
					<th width="10">Ação</th>
				</tr>
    			@foreach( $precoprocedimentos as $procedimento )
    				<tr id="tr-{{$procedimento->id}}">
    					<td>{{$procedimento->id}}</td>
    					<td>{{$procedimento->procedimento->cd_procedimento}} <input type="hidden" class="procedimento_id" value="{{ $procedimento->procedimento->id }}"> <input type="hidden" class="profissional_id" value="{{ $procedimento->profissional->id }}"></td>
    					<td>{{$procedimento->ds_preco}}</td>
    					<td>{{$procedimento->profissional->nm_primario.' '.$procedimento->profissional->nm_secundario.' ('.$procedimento->profissional->documentos()->first()->tp_documento.': '.$procedimento->profissional->documentos->first()->te_documento.')' }}</td>
    					<td>{{$procedimento->getVlComercialAtendimento()}}</td>
    					<td>{{$procedimento->getVlNetAtendimento()}}</td>
    					<td>
    						<a href="#" onclick="loadDataProcedimento({{ $procedimento->id }})" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaProcedimento(this, '{{ $procedimento->ds_preco }}', '{{ $procedimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Remover</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
        </div>
	</div>
</div>
<div id="profissional-procedimento-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ProfissionalProcedimentoModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-profisisonal-title-modal">DrHoje: Adicionar Profissional</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nm_primario" class="control-label">Nome</label>
                            <input type="text" id="nm_primario" class="form-control" name="nm_primario" placeholder="Nome">
                            <input type="hidden" id="profissional_id" name="id" >
                            <input type="hidden" id="cs_status" name="cs_status" value="A">
                            <input type="hidden" id="clinica_id" name="clinica_id" value="{{ $prestador->id }}">
                            <input type="hidden" id="profisisonal-type-operation" value="add" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nm_secundario" class="control-label">Sobrenome</label>
                            <input type="text" id="nm_secundario" class="form-control" name="nm_secundario" placeholder="Sobrenome">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cs_sexo" class="control-label">Sexo</label>
                            <select id="cs_sexo" class="form-control" name="cs_sexo">
                            	<option value="M">M</option>
                            	<option value="F">F</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dt_nascimento" class="control-label">Data Nasc.</label>
                            <input type="text" id="dt_nascimento" class="form-control mascaraData" name="dt_nascimento" placeholder="Data Nasc.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tp_profissional" class="control-label">Tipo Profissional</label>
                            <select id="tp_profissional" class="form-control" name="tp_profissional">
                            	<option value="M">Médico</option>
                            	<option value="D">Dentista</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tp_documento_profissional" class="control-label">Tipo Documento</label>
                            <select id="tp_documento_profissional" class="form-control" name="tp_documento_profissional">
                            	<option value="CRM">CRM</option>
                            	<option value="CRO">CRO</option>
                            	<option value="CRF">CRF</option>
                            	<option value="CRFA">CRFA</option>
                            	<option value="CRN">CRN</option>
                            	<option value="CRP">CRP</option>
                            	<option value="CREFITO">CREFITO</option>
                            	<option value="COREN">COREN</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="te_documento_profissional" class="control-label">Nr. Documento</label>
                            <input type="text" id="te_documento_profissional" class="form-control" name="te_documento_profissional" placeholder="Nr. Documento">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="tp_especialidade" class="control-label">Especialidade</label>
                            <select id="especialidade_profissional" class="select2 select2-multiple" name="especialidade_profissional" multiple="multiple" multiple data-placeholder="Selecione ...">
                            	@foreach($list_especialidades as $especialidade)
								<option value="{{ $especialidade->id }}">{{ "($especialidade->cd_especialidade) $especialidade->ds_especialidade" }}</option>
								@endforeach  
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-save-profissional" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save"></i> Salvar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="mdi mdi-cancel"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		
        $( "#ds_procedimento" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	          url      : "/procedimentos/consulta/" + $('#ds_procedimento').val(),
        	          dataType : "json",
        	          success  : function( data ) {
        	            response( data );
        	          }
        	      });
        	  },
        	  minLength : 2,
        	  select: function(event, ui) {
        		  	arProcedimento = ui.item.id.split(' | ');
        		  
        		  	$('#procedimento_id').val(arProcedimento[0]);
     	      		$('#cd_procedimento').val(arProcedimento[1]);
     	      		$('#descricao_procedimento').val(arProcedimento[2]);
        	  }
        });

        $( "#nm_profissional" ).autocomplete({
      	  source: function( request, response ) {
      	      $.ajax( {
      	    	  type: 'POST',
      	    	  url: '{{ Request::url() }}/list-profissional',
      	          dataType : "json",
      	          data: {
          	          'clinica_id': $('#clinica_id').val(),
          	          'nm_profissional': $('#nm_profissional').val(),
          	          '_token': laravel_token
          	      },
      	          success  : function( data ) {
      	            response( data );
      	          }
      	      });
      	  },
      	  minLength : 3,
      	  select: function(event, ui) {
      		  var profissional_id = ui.item.id;
      		  $('#atendimento_profissional_id').val(profissional_id);
      	  }
      });
    });
	
    function addLinhaProcedimento() {
		if( $('#procedimento_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Falha ao Selecionar Procedimento. Por favor, tente novamente.'); return false; }
		if( $('#ds_procedimento').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Falha ao Selecionar Procedimento. Por favor, tente novamente.'); return false; }
		if( $('#vl_com_procedimento').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Valor Comercial informado não é válido. Por favor, tente novamente.'); return false; }
		if( $('#vl_net_procedimento').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Valor NET informado não é válido. Por favor, tente novamente.'); return false; }
		if( $('#atendimento_profissional_id').val().length == 0 ) return false;
		if( $('#clinica_id').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosProcedimentos");

		var atendimento_id = $('#atendimento_id').val();
		var procedimento_id = $('#procedimento_id').val();
		var atendimento_profissional_id = $('#atendimento_profissional_id').val();
		var ds_procedimento = $('#descricao_procedimento').val();
		var vl_com_procedimento = $('#vl_com_procedimento').val();
		var vl_net_procedimento = $('#vl_net_procedimento').val();
		var clinica_id = $('#clinica_id').val();

		jQuery.ajax({
			type: 'POST',
			url: '{{ Request::url() }}/add-precificacao-procedimento',
			data: {
				'atendimento_id': atendimento_id,
				'procedimento_id': procedimento_id,
				'atendimento_profissional_id': atendimento_profissional_id,
				'ds_procedimento': ds_procedimento,
				'vl_com_procedimento': vl_com_procedimento,
				'vl_net_procedimento': vl_net_procedimento,
				'clinica_id': clinica_id,
				'_token': laravel_token
			},
            success: function (result) {
	            if(result.status) {

	            	var atendimento = JSON.parse(result.atendimento);

	            	$.Notification.notify('success','top right', 'DrHoje', result.mensagem);

	            	if(atendimento_id == '') {
	            		$tr = '<tr id="tr-'+atendimento.id+'">\
		                 <td>'+atendimento.id+'</td>\
		                 <td>'+atendimento.procedimento.cd_procedimento+'<input type="hidden" class="procedimento_id" value="'+atendimento.procedimento.id+'"> <input type="hidden" class="profissional_id" value="'+atendimento.profissional.id+'"></td>\
		                 <td>'+atendimento.ds_preco+'</td>\
		                 <td>'+atendimento.profissional.nm_primario+' '+atendimento.profissional.nm_secundario+' ('+atendimento.profissional.documentos[0].tp_documento+': '+atendimento.profissional.documentos[0].te_documento+')</td>\
		                 <td>'+numberToReal(atendimento.vl_com_atendimento)+'</td>\
		                 <td>'+numberToReal(atendimento.vl_net_atendimento)+'</td>\
		                 <td>\
		                 	<a href="#" onclick="loadDataProcedimento(this)" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>\
		                 	<a onclick="delLinhaProcedimento(this, '+atendimento.ds_preco+', '+atendimento.id+')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Remover</a>\
		                 </td>\
		                 </tr>';
	                	$('#tblPrecosProcedimentos  > tbody > tr:first').after($tr);
	            	} else {
	            		$('#tr-'+atendimento.id).find('td:nth-child(2)').html(atendimento.procedimento.cd_procedimento);
	            		$('#tr-'+atendimento.id).find('td:nth-child(3)').html(atendimento.ds_preco);
	            		$('#tr-'+atendimento.id).find('td:nth-child(4)').html(atendimento.profissional.nm_primario+' '+atendimento.profissional.nm_secundario+' ('+atendimento.profissional.documentos[0].tp_documento+': '+atendimento.profissional.documentos[0].te_documento);
						$('#tr-'+atendimento.id).find('td:nth-child(5)').html(numberToReal(atendimento.vl_com_atendimento));
						$('#tr-'+atendimento.id).find('td:nth-child(6)').html(numberToReal(atendimento.vl_net_atendimento));
	            	}

	            	$('#atendimento_id').val('');
	        		$('#procedimento_id').val('');
	        		$('#atendimento_profissional_id').val('');
	        		$('#ds_procedimento').val('');
	        		$('#nm_profissional').val('');
	        		$('#vl_com_procedimento').val('');
	        		$('#vl_net_procedimento').val('');
	                 
	            } else {
	            	swal(({
        	            title: "Oops",
        	            text: result.mensagem,
        	            type: 'error',
        	            confirmButtonClass: 'btn btn-confirm mt-2'
        			}));
	            }
            },
            error: function (result) {
                swal(({
    	            title: "Oops",
    	            text: "Falha na operação!",
    	            type: 'error',
    	            confirmButtonClass: 'btn btn-confirm mt-2'
    			}));
            }
		});
    }

    function loadDataProcedimento(element) {

    	var atendimento_id = $(element).parent().parent().find('td:nth-child(1)').html();
    	var procedimento_id = $(element).parent().parent().find('input.procedimento_id').val();
    	var cd_procedimento = $(element).parent().parent().find('td:nth-child(2)').html();
    	var ds_preco = $(element).parent().parent().find('td:nth-child(3)').html();
    	var nm_profissional = $(element).parent().parent().find('td:nth-child(4)').html();
    	var profissional_id = $(element).parent().parent().find('input.profissional_id').val();
    	var vl_com_atendimento = $(element).parent().parent().find('td:nth-child(5)').html();
    	var vl_net_atendimento = $(element).parent().parent().find('td:nth-child(6)').html();

    	$('#atendimento_id').val(atendimento_id);
    	$('#procedimento_id').val(procedimento_id);
    	$('#atendimento_profissional_id').val(profissional_id);
    	$('#nm_profissional').val(nm_profissional);
    	$('#ds_procedimento').val(ds_preco);
    	$('#cd_procedimento').val(cd_procedimento);
    	$('#vl_com_procedimento').val(vl_com_atendimento);
    	$('#vl_net_procedimento').val(vl_net_atendimento);
    }

    function limparProcedimento() {
    	$('#atendimento_id').val('');
		$('#procedimento_id').val('');
		$('#atendimento_profissional_id').val('');
		$('#ds_procedimento').val('');
		$('#nm_profissional').val('');
		$('#vl_com_procedimento').val('');
		$('#vl_net_procedimento').val('');
    }
	
    function delLinhaProcedimento(element, atendimento_nome, atendimento_id) {

    	var mensagem = 'DrHoje';
        swal({
            title: mensagem,
            text: 'O Atendimento "'+atendimento_nome+'" será movido da lista',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then(function () {
            
        	jQuery.ajax({
    			type: 'POST',
    			url: '{{ Request::url() }}/delete-procedimento',
    			data: {
    				'atendimento_id': atendimento_id,
    				'_token': laravel_token
    			},
                success: function (result) {
                    
                    var atendimento = JSON.parse(result.atendimento);
                    
    	            if(result.status) {
    	            	$(element).parent().parent().remove();
    	            	$.Notification.notify('success','top right', 'DrHoje', result.mensagem);
    	            }
                },
                error: function (result) {
                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                }
    		});
    		
        });
    }
</script>