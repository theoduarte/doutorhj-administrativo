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
		            <select id="list_profissional_procedimento" class="select2 select2-multiple" name="list_profissional_procedimento" multiple="multiple" multiple data-placeholder="Selecione ...">
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
    					<td>{{$procedimento->id}} <input type="hidden" class="procedimento_id" value="{{ $procedimento->procedimento->id }}"> <input type="hidden" class="profissional_id" value="{{ $procedimento->profissional->id }}"></td>
    					<td>{{$procedimento->procedimento->cd_procedimento}}</td>
    					<td>{{$procedimento->ds_preco}}</td>
    					<td>@if($procedimento->profissional->cs_status == 'A') {{$procedimento->profissional->nm_primario.' '.$procedimento->profissional->nm_secundario.' ('.$procedimento->profissional->documentos()->first()->tp_documento.': '.$procedimento->profissional->documentos->first()->te_documento.')' }} @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA PROFISSIONAL SELECIONADO</span> @endif</td>
    					<td>{{$procedimento->getVlComercialAtendimento()}}</td>
    					<td>{{$procedimento->getVlNetAtendimento()}}</td>
    					<td>
    						<a onclick="loadTags(this, {{ $procedimento->id }}, '{{$procedimento->ds_preco}}')" class="btn btn-icon waves-effect btn-success btn-sm m-b-5" data-toggle="tooltip" data-placement="left" title="Nomes Populares"><i class="mdi mdi-tag-multiple"></i> Tags</a>
    						<a onclick="loadDataAtendimento(this, {{ $procedimento->id }})" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaProcedimento(this, '{{ $procedimento->ds_preco }}', '{{ $procedimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Excluir</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
        </div>
	</div>
</div>
<div id="profissional-procedimento-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ProfissionalProcedimentoModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-atendimento-title-modal">DrHoje: Editar Procedimento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cd_procedimento_edit" class="control-label">Código do Procedimento</label>
                            <input type="text" id="cd_procedimento_edit" class="form-control" name="cd_procedimento_edit" placeholder="Código do Procedimento" readonly="readonly">
                            <input type="hidden" id="atendimento_id_edit" name="atendimento_id_edit" >
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ds_procedimento_edit" class="control-label">Descrição</label>
                            <input type="text" id="ds_procedimento_edit" class="form-control" name="ds_procedimento_edit" placeholder="Descrição do Procedimento">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nm_profissional_edit" class="control-label">Profissional</label>
                            <!-- <input type="text" id="nm_profissional_edit" class="form-control" name="nm_profissional_edit" placeholder="Nome do Profissional" > -->
                            <select id="proced_profissional_id" class="form-control" name="nm_profissional_edit">
                            	<option value="">--- NENHUM PROFISSIONAL SELECIONADO ----</option>
        			            @foreach($list_profissionals as $profissional)
        			            <option value="{{ $profissional->id }}">{{ $profissional->nm_primario.' '.$profissional->nm_secundario.' ('.$profissional->documentos->first()->tp_documento.': '.$profissional->documentos->first()->te_documento.')' }}</option>
        			            @endforeach
        		            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    	<label for="vl_com_atendimento_edit" class="control-label">Valor Comercial (R$)</label>
                    	<input type="text" id="vl_com_atendimento_edit" class="form-control mascaraMonetaria" name="vl_com_atendimento_edit" placeholder="Valor Comercial">
                    </div>
                    <div class="col-md-6">
                    	<label for="vl_net_atendimento_edit" class="control-label">Valor Net (R$)</label>
                    	<input type="text" id="vl_net_atendimento_edit" class="form-control mascaraMonetaria" name="vl_net_atendimento_edit" placeholder="Valor Net">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-save-profissional-procedimento" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save"></i> Salvar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="mdi mdi-cancel"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="tags-populares-procedimento-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tagsModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -10%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-profisisonal-title-modal">DrHoje: Lista de Nomes Populares</h4>
            </div>
            <div class="modal-body" style="padding: 0px;">
            	<div id="accordion" role="tablist" aria-multiselectable="true">
            		<div class="card">
            			<div class="card-header cvx-card-header cvx-card-header-procedimento" role="tab" id="headingOne">
            				<h5 class="mb-0 mt-0">
            					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i></i> ADICIONAR NOME POPULAR</a>
            				</h5>
            			</div>
            			<div id="collapseOne"  class="collapse" role="tabpanel" aria-labelledby="headingOne">
            				<div class="card-body" style="padding-bottom: 0px;">
            					<div class="row">
            						<div class="col-md-12">
            							<div class="form-group">
            								<input type="text" id="cs_tag" class="form-control" maxlength="150" placeholder="Informe um Nome Popular e clique em Salvar">
            								<input type="hidden" id="ct_tag_id" >
            								<input type="hidden" id="tag_atendimento_id" >
            								<input type="hidden" id="tag_tipo_atendimento" value="proced" >
            							</div>
            						</div>
            					</div>
            					<div class="row">
            						<div class="col-md-12">
            							<div class="modal-footer">
            							<button type="button" class="btn btn-sm btn-secondary waves-effect waves-light" onclick="$('#cs_tag').val('');$('#ct_tag_id').val('');"><i class="mdi mdi-tag-plus"></i> Nova Tag</button>
							                <button type="button" id="btn-save-tag" class="btn btn-sm btn-primary waves-effect waves-light" onclick="addTagPopular(this)"><i class="mdi mdi-content-save"></i> Salvar</button>
							            </div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            		
            		<div class="card">
            			<div class="card-header cvx-card-list" role="tab" id="headingTwo">
            				<h5 class="mb-0 mt-0">
            					<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="ion-clipboard"></i> NOME POPULARES PARA: <br><strong><span id="tag_procedimento"></span></strong></a>
            				</h5>
            			</div>
            			<div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
            				<div class="card-body" style="padding: 0px;">
            					<div class="row">
            						<div class="col-md-12">
            							<div class="form-group">
            								<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
            									<tr>
            										<th style="width: 20px; text-align: center;"><i class="ion-pound"></i></th>
            										<th>Nome Popular</th>
            										<th style="width: 40px;">(+)</th>
            										<th style="width: 40px;">(-)</th>
            									</tr>
            									<tbody id="list-all-tags-populares"></tbody>
            								</table>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
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

        $('#btn-save-profissional-procedimento').click(function(){

			var atendimento_id = $('#atendimento_id_edit').val();
			var ds_atendimento = $('#ds_procedimento_edit').val();
			var vl_com_atendimento = $('#vl_com_atendimento_edit').val();
			var vl_net_atendimento = $('#vl_net_atendimento_edit').val();
			var proced_profissional_id = $('#proced_profissional_id').val();
			
			if( ds_atendimento.length == 0 ) { $('#ds_procedimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; } 
			if( vl_com_atendimento.length == 0 ) { $('#vl_com_atendimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( vl_net_atendimento.length == 0 ) { $('#vl_net_atendimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( proced_profissional_id.length == 0 ) { $('#proced_profissional_id').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Nenhum Profissional Selecionado</strong></span>'); return false; }
			
			jQuery.ajax({
				type: 'POST',
				url: '{{ Request::url() }}/edit-precificacao-atendimento',
				data: {
					'atendimento_id': atendimento_id,
					'ds_atendimento': ds_atendimento,
					'vl_com_atendimento': vl_com_atendimento,
					'vl_net_atendimento': vl_net_atendimento,
					'profissional_id': proced_profissional_id,
					'_token': laravel_token
				},
	            success: function (result) {
		            if(result.status) {
			            		            	
		            	 swal({
		                     title: 'DrHoje',
		                     text: result.mensagem,
		                     type: 'success',
		                     confirmButtonClass: 'btn btn-confirm mt-2',
		                     confirmButtonText: 'OK'
		                 }).then(function () {
		                	 $('.modal').removeClass('in').attr("aria-hidden","true").off('click.dismiss.modal').removeClass('show');
		                     $('.modal').css("display", "none");
		                     $('.modal-backdrop').remove();
		                     $('body').removeClass('modal-open');
		                     window.location.reload(false); 
		                 });
		                 
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
		});
    });
	
    function addLinhaProcedimento() {
        
		if( $('#procedimento_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Falha ao Selecionar Procedimento. Por favor, tente novamente.'); return false; }
		if( $('#ds_procedimento').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Falha ao Selecionar Procedimento. Por favor, tente novamente.'); return false; }
		if( $('#vl_com_procedimento').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Valor Comercial informado não é válido. Por favor, tente novamente.'); return false; }
		if( $('#vl_net_procedimento').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Valor NET informado não é válido. Por favor, tente novamente.'); return false; }
		//if( $('#atendimento_profissional_id').val().length == 0 ) return false;
		
		var list_profissional_procedimento = new Array();
		$('#list_profissional_procedimento :selected').each(function(i, selected) {
			list_profissional_procedimento[i] = $(selected).val();
		});
		
		if( list_profissional_procedimento.length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Nenhum Profissional Selecionado!. Por favor, tente novamente.'); return false; }
		if( $('#clinica_id').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosProcedimentos");

		var atendimento_id = $('#atendimento_id').val();
		var procedimento_id = $('#procedimento_id').val();
		//var atendimento_profissional_id = $('#atendimento_profissional_id').val();
		
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
				//'atendimento_profissional_id': atendimento_profissional_id,
				'list_profissional_procedimento': list_profissional_procedimento,
				'ds_procedimento': ds_procedimento,
				'vl_com_procedimento': vl_com_procedimento,
				'vl_net_procedimento': vl_net_procedimento,
				'clinica_id': clinica_id,
				'_token': laravel_token
			},
            success: function (result) {
	            if(result.status) {

	            	swal({
	                     title: 'DrHoje',
	                     text: result.mensagem,
	                     type: 'success',
	                     confirmButtonClass: 'btn btn-confirm mt-2',
	                     confirmButtonText: 'OK'
	                 }).then(function () {
	                	 $('.modal').removeClass('in').attr("aria-hidden","true").off('click.dismiss.modal').removeClass('show');
	                     $('.modal').css("display", "none");
	                     $('.modal-backdrop').remove();
	                     $('body').removeClass('modal-open');
	                     window.location.reload(false); 
	                 });

	            	//var atendimento = JSON.parse(result.atendimento);

	            	//$.Notification.notify('success','top right', 'DrHoje', result.mensagem);

	            	/* if(atendimento_id == '') {
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
	        		$('#vl_net_procedimento').val(''); */
	                 
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

    function loadDataAtendimento(element, atendimento_id) {

    	jQuery.ajax({
			type: 'POST',
			url: '/load-data-atendimento',
			data: {
				'atendimento_id': atendimento_id,
				'_token': laravel_token
			},
            success: function (result) {
                
	            if(result.status) {

		            var atendimento = JSON.parse(result.atendimento);
		            var nao_tem_atendimento = true;

		            $('#proced_profissional_id option').each(function(index){
			            if($(this).val() == atendimento.profissional_id) {
			            	//$(this).attr('selected','selected');
			            	$('#proced_profissional_id').prop("selectedIndex", index);
			            	nao_tem_atendimento = false;
			            }
			        });

			        if(nao_tem_atendimento) {
			        	$('#proced_profissional_id').prop("selectedIndex", 0);
			        }
	                 
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

    	var cd_procedimento = $(element).parent().parent().find('td:nth-child(2)').html();
    	var ds_procedimento = $(element).parent().parent().find('td:nth-child(3)').html();
    	var nm_profissional = $(element).parent().parent().find('td:nth-child(4)').html();
    	var vl_com_atendimento = $(element).parent().parent().find('td:nth-child(5)').html();
    	var vl_net_atendimento = $(element).parent().parent().find('td:nth-child(6)').html();

    	$('#profissional-procedimento-modal').find('input.form-control').val('');
    	$('#profissional-procedimento-modal').find('select.form-control').prop('selectedIndex',0);

		$('#atendimento_id_edit').val(atendimento_id);
		$('#cd_procedimento_edit').val(cd_procedimento);
		$('#ds_procedimento_edit').val(ds_procedimento);
		$('#nm_profissional_edit').val(nm_profissional);
		$('#vl_com_atendimento_edit').val(vl_com_atendimento);
    	$('#vl_net_atendimento_edit').val(vl_net_atendimento);
		 
		$("#profissional-procedimento-modal").modal();
    }

    function limparProcedimento() {
    	$('#atendimento_id').val('');
		$('#procedimento_id').val('');
		//$('#atendimento_profissional_id').val('');
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

    function loadTags(element, atendimento_id, nome_procedimento) {
        
		$('#tag_procedimento').html(nome_procedimento);
		$('#tag_atendimento_id').val(atendimento_id);

		jQuery.ajax({
			type: 'POST',
			url: '/load-tag-popular',
			data: {
				'tag_atendimento_id': atendimento_id,
				'_token': laravel_token
			},
            success: function (result) {
                
	            if(result.status) {

		            var list_tag_popular = JSON.parse(result.list_tag_popular);

		            var num_tags = list_tag_popular.length;

		            $('#list-all-tags-populares').empty();
		            
		            for(var i = 0; i < num_tags; i++) {

			            var index = i+1;
			            var tag_id = list_tag_popular[i].id;
			            var cs_tag = list_tag_popular[i].cs_tag;
			            
		            	var content_item = '<tr> \
			      	  		<td class="num_filial">'+tag_id+'</td> \
			        		<td>'+cs_tag+'</td> \
			        		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
			        		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removerTagPopular(this, '+"'"+cs_tag+"'"+', '+tag_id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
			        	</tr>';

		            	 $('#list-all-tags-populares').append(content_item);
		            	    
		            }

		            $('#cs_tag').val('');
		            $("#tags-populares-procedimento-modal").modal();
	                 
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

	function addTagPopular(input) {
        
		if( $('#cs_tag').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'O Nome popular é campo obrigatório. Por favor, tente novamente.'); return false; }
		if( $('#tag_atendimento_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Atendimento não localizado. Por favor, tente novamente.'); return false; }

		$(input).html('<i class="fa fa-spin fa-spinner"></i> Enviando...');
		
		var cs_tag = $('#cs_tag').val();
		var tag_id = $('#ct_tag_id').val();
		var tag_atendimento_id = $('#tag_atendimento_id').val();
		var tag_tipo_atendimento = $('#tag_tipo_atendimento').val();
		
		jQuery.ajax({
			type: 'POST',
			url: '/add-tag-popular',
			data: {
				'tag_id': tag_id,
				'cs_tag': cs_tag,
				'tag_atendimento_id': tag_atendimento_id,
				'tipo_atendimento': tag_tipo_atendimento,
				'_token': laravel_token
			},
            success: function (result) {

            	$(input).html('<i class="mdi mdi-content-save"></i> Salvar');
                
	            if(result.status) {

	            	var list_tag_popular = JSON.parse(result.list_tag_popular);

		            var num_tags = list_tag_popular.length;

		            $('#list-all-tags-populares').empty();
		            
		            for(var i = 0; i < num_tags; i++) {

			            var index = i+1;
			            var tag_id = list_tag_popular[i].id;
			            var cs_tag = list_tag_popular[i].cs_tag;
			            
		            	var content_item = '<tr> \
			      	  		<td class="num_filial">'+tag_id+'</td> \
			        		<td>'+cs_tag+'</td> \
			        		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
			        		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removerTagPopular(this, '+"'"+cs_tag+"'"+', '+tag_id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
			        	</tr>';

		            	 $('#list-all-tags-populares').append(content_item);
		            	    
		            }

		            $('#ct_tag_id').val('');
		            $('#cs_tag').val('');

		            $.Notification.notify('success','top right', 'DrHoje', result.mensagem);
	                 
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
            	$(input).html('<i class="mdi mdi-content-save"></i> Salvar');
            	
                swal(({
    	            title: "Oops",
    	            text: "Falha na operação!",
    	            type: 'error',
    	            confirmButtonClass: 'btn btn-confirm mt-2'
    			}));
            }
		});
    }

	function editTagPopular(element) {

    	var ct_tag_id = $(element).parent().parent().find('td:nth-child(1)').html();
    	var cs_tag = $(element).parent().parent().find('td:nth-child(2)').html();

    	$('#ct_tag_id').val(ct_tag_id);
    	$('#cs_tag').val(cs_tag);

    	if($('.cvx-card-header-procedimento').find('a').hasClass('collapsed')) {
//     		$('.cvx-card-header').find('a').removeClass('collapsed');
//     		$('.cvx-card-header').find('a').attr('aria-expanded, 'false');
			$('.cvx-card-header-procedimento').find('a').trigger("click");
    	}
    }

	function removerTagPopular(input, cs_tag, tag_id) {

		if(tag_id.length == 0) {

	    	swal({
		            title: 'DoctorHoje: Alerta!',
		            text: "Nenhum Nome popular foi selecionado!",
		            type: 'warning',
		            confirmButtonClass: 'btn btn-confirm mt-2'
		        }
		    );
	        return false;
	    }
		
		var mensagem = 'Tem certeza que deseja remover o Nome popular: '+cs_tag;
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
	    	  	url: '/delete-tag-popular',
	    	  	data: {
	    		  	'tag_id': tag_id,
	    			'_token': laravel_token
	    		},
	    		success: function (result) {

	    			if( result.status) {
	    				
	    				swal({
	                        title: 'DoctorHoje',
	                        text: result.mensagem,
	                        type: 'success',
	                        confirmButtonClass: 'btn btn-confirm mt-2',
	                        confirmButtonText: 'OK'
	                    }).then(function () {
	                    	$(input).parent().parent().css('background-color', '#ffbfbf');
	            			$(input).parent().parent().fadeOut(400, function(){
	            		    	$(input).parent().parent().remove();
	            		    });
	            	    	
	            	        /* swal({
	            	                title: 'Concluído !',
	            	                text: "O Nome Popular foi excluído com sucesso",
	            	                type: 'success',
	            	                confirmButtonClass: 'btn btn-confirm mt-2'
	            	            }
	            	        ); */
	                    });
	    				
	    			} else {
	    				$.Notification.notify('error','top right', 'DoctorHoje', result.mensagem);
	    			}

	    			$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
	            },
	            error: function (result) {
	            	$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
	            	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
	            }
	    	});
	    });
	}
</script>