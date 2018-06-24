<div class="form-group">
	<div class="row">
        <div class="col-8">
			<div class="row">
		        <div class="col-10">
		        	<label for="nm_razao_social" class="control-label">Consulta<span class="text-danger">*</span></label>
		            <input id="ds_consulta" type="text" class="form-control" name="ds_consulta" value="{{ old('ds_consulta') }}" placeholder="Informe a Descrição da Consulta para buscar" autofocus maxlength="100">
		       		<input type="hidden" id="cd_consulta" name="cd_consulta" value="">
		       		<input type="hidden" id="descricao_consulta" name="descricao_consulta" value="">
		       		<input type="hidden" id="consulta_atendimento_id" name="consulta_atendimento_id" value="">
		       		<input type="hidden" id="consulta_id" name="consulta_id" value="">
		        </div>
		        <div class="col-2">
		            <label for="vl_com_consulta" class="control-label">Valor Comercial (R$)<span class="text-danger">*</span></label>
		            <input id="vl_com_consulta" type="text" class="form-control mascaraMonetaria" name="vl_com_consulta" value="{{ old('vl_com_consulta') }}"  maxlength="15">
		        </div>
			</div>
			
			<div class="row">
		        <div class="col-10">
		        	<label for="nm_profissional" class="control-label">Profissional<span class="text-danger">*</span></label>
		            <select id="list_profissional_consulta" class="select2 select2-multiple" name="list_profissional_consulta" multiple="multiple" multiple data-placeholder="Selecione ...">
			            @foreach($list_profissionals as $profissional)
			            <option value="{{ $profissional->id }}">{{ $profissional->nm_primario.' '.$profissional->nm_secundario.' ('.$profissional->documentos->first()->tp_documento.': '.$profissional->documentos->first()->te_documento.')' }}</option>
			            @endforeach
		            </select>
		       		<input type="hidden" id="consulta_profissional_id" name="consulta_profissional_id" value="">
		        </div>
		        <div class="col-2">
		            <label for="vl_net_consulta" class="control-label">Valor NET (R$)<span class="text-danger">*</span></label>
		            <input id="vl_net_consulta" type="text" class="form-control mascaraMonetaria" name="vl_net_consulta" value="{{ old('vl_net_consulta') }}"  maxlength="15">
		        </div>
			</div>
		</div>
		<div class="col-2">
			<div style="height: 60px;"></div>
		    <button type="button" class="btn btn-primary" onclick="addLinhaConsulta();"><i class="mdi mdi-content-save"></i> Salvar</button>
		    <a onclick="limparConsulta()" class="btn btn-icon btn-danger" title="Limpar Consulta"><i class="mdi mdi-close"></i> Limpar</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecosConsultas" name="tblPrecosConsultas" class="table table-striped table-bordered table-doutorhj">
        		<tr>
					<th width="12">Id</th>
					<th width="80">Código</th>
					<th width="380">Consulta</th>
					<th width="300">Profissional</th>
					<th width="100">Vl. Com. (R$)</th>
					<th width="100">Vl. NET (R$)</th>
					<th width="10">Ação</th>
				</tr>
    			@foreach( $precoconsultas as $atendimento )
    				<tr id="tr-{{$atendimento->id}}">
    					<td>{{$atendimento->id}} <input type="hidden" class="consulta_id" value="{{ $atendimento->consulta->id }}"> <input type="hidden" class="profissional_id" value="{{ $atendimento->profissional->id }}"></td>
    					<td>{{$atendimento->consulta->cd_consulta}}</td>
    					<td>{{$atendimento->ds_preco}}</td>
    					<td>@if($atendimento->profissional->cs_status == 'A') {{$atendimento->profissional->nm_primario.' '.$atendimento->profissional->nm_secundario.' ('.$atendimento->profissional->documentos()->first()->tp_documento.': '.$atendimento->profissional->documentos->first()->te_documento.')' }} @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA PROFISSIONAL SELECIONADO</span> @endif</td>
    					<td>{{$atendimento->getVlComercialAtendimento()}}</td>
    					<td>{{$atendimento->getVlNetAtendimento()}}</td>
    					<td>
    						<a onclick="loadTagConsulta(this, {{ $atendimento->id }}, '{{$atendimento->ds_preco}}')" class="btn btn-icon waves-effect btn-success btn-sm m-b-5" data-toggle="tooltip" data-placement="left" title="Nomes Populares"><i class="mdi mdi-tag-multiple"></i> Tags</a>
    						<a onclick="loadDataAtendimento(this, {{ $atendimento->id }})" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaConsulta(this, '{{ $atendimento->ds_preco }}', '{{ $atendimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Excluir</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
        </div>
	</div>
</div>
<div id="profissional-consulta-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ProfissionalConsultaModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-consulta-title-modal">DrHoje: Editar Consulta</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cd_consulta_edit" class="control-label">Código sa Consulta</label>
                            <input type="text" id="cd_consulta_edit" class="form-control" name="cd_consulta_edit" placeholder="Código da Consulta" readonly="readonly">
                            <input type="hidden" id="consulta_id_edit" name="consulta_id_edit" >
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="ds_consulta_edit" class="control-label">Descrição</label>
                            <input type="text" id="ds_consulta_edit" class="form-control" name="ds_consulta_edit" placeholder="Descrição da Consulta">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nm_profissional_consulta_edit" class="control-label">Profissional</label>
                            <!-- <input type="text" id="nm_profissional_consulta_edit" class="form-control" name="nm_profissional_consulta_edit" placeholder="Nome do Profissional" readonly="readonly"> -->
                            <select id="consult_profissional_id" class="form-control" name="consult_profissional_id">
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
                    	<label for="vl_com_consulta_edit" class="control-label">Valor Comercial (R$)</label>
                    	<input type="text" id="vl_com_consulta_edit" class="form-control mascaraMonetaria" name="vl_com_consulta_edit" placeholder="Valor Comercial">
                    </div>
                    <div class="col-md-6">
                    	<label for="vl_net_consulta_edit" class="control-label">Valor Net (R$)</label>
                    	<input type="text" id="vl_net_consulta_edit" class="form-control mascaraMonetaria" name="vl_net_consulta_edit" placeholder="Valor Net">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-save-profissional-consulta" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save"></i> Salvar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="mdi mdi-cancel"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div id="tags-populares-consulta-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tagsConsultaModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -10%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-profisisonal-title-modal">DrHoje: Lista de Nomes Populares</h4>
            </div>
            <div class="modal-body" style="padding: 0px;">
            	<div id="accordion_consulta" role="tablist" aria-multiselectable="true">
            		<div class="card">
            			<div class="card-header cvx-card-header cvx-card-header-consulta" role="tab" id="headingOneConsulta">
            				<h5 class="mb-0 mt-0">
            					<a class="collapsed" data-toggle="collapse" data-parent="#accordion_consulta" href="#collapseOneConsulta" aria-expanded="false" aria-controls="collapseOneConsulta"><i></i> ADICIONAR NOME POPULAR</a>
            				</h5>
            			</div>
            			<div id="collapseOneConsulta"  class="collapse" role="tabpanel" aria-labelledby="headingOneConsulta">
            				<div class="card-body" style="padding-bottom: 0px;">
            					<div class="row">
            						<div class="col-md-12">
            							<div class="form-group">
            								<input type="text" id="cs_tag_consulta" class="form-control" maxlength="150" placeholder="Informe um Nome Popular e clique em Salvar">
            								<input type="hidden" id="ct_consulta_tag_id" >
            								<input type="hidden" id="tag_consulta_atendimento_id" >
            								<input type="hidden" id="tag_consulta_tipo_atendimento" value="consult" >
            							</div>
            						</div>
            					</div>
            					<div class="row">
            						<div class="col-md-12">
            							<div class="modal-footer">
            							<button type="button" class="btn btn-sm btn-secondary waves-effect waves-light" onclick="$('#cs_tag_consulta').val('');$('#ct_consulta_tag_id').val('');"><i class="mdi mdi-tag-plus"></i> Nova Tag</button>
							                <button type="button" id="btn-save-tag-consulta" class="btn btn-sm btn-primary waves-effect waves-light" onclick="addConsultaTagPopular(this)"><i class="mdi mdi-content-save"></i> Salvar</button>
							            </div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            		
            		<div class="card">
            			<div class="card-header cvx-card-list" role="tab" id="headingTwoConsulta">
            				<h5 class="mb-0 mt-0">
            					<a data-toggle="collapse" data-parent="#accordion_consulta" href="#collapseTwoConsulta" aria-expanded="true" aria-controls="collapseTwoConsulta"><i class="ion-clipboard"></i> NOME POPULARES PARA: <br><strong><span id="tag_consulta"></span></strong></a>
            				</h5>
            			</div>
            			<div id="collapseTwoConsulta" class="collapse show" role="tabpanel" aria-labelledby="headingTwoConsulta">
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
            									<tbody id="list-all-tags-populares-consulta"></tbody>
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
		
        $( "#ds_consulta" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	    	  url: "/consultas/consulta/"+$('#ds_consulta').val(),
        	          dataType : "json",
        	          success  : function( data ) {
        	            response( data );
        	          }
        	      });
        	  },
        	  minLength : 3,
        	  select: function(event, ui) {
            	  arConsulta = ui.item.id.split(' | ')
            	  
           	      $('input[name="consulta_id"]').val(arConsulta[0]);
           	      $('input[name="cd_consulta"]').val(arConsulta[1]);
           	   	  $('input[name="descricao_consulta"]').val(arConsulta[2]);
        	  }
        });

        $( "#nm_profissional_consulta" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	    	  type: 'POST',
        	    	  url: '{{ Request::url() }}/list-profissional',
        	          dataType : "json",
        	          data: {
            	          'clinica_id': $('#clinica_id').val(),
            	          'nm_profissional': $('#nm_profissional_consulta').val(),
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
        		  $('#consulta_profissional_id').val(profissional_id);
        	  }
        });

        $('#btn-save-profissional-consulta').click(function(){

			var atendimento_id = $('#consulta_id_edit').val();
			var ds_atendimento = $('#ds_consulta_edit').val();
			var vl_com_atendimento = $('#vl_com_consulta_edit').val();
			var vl_net_atendimento = $('#vl_net_consulta_edit').val();
			var consult_profissional_id = $('#consult_profissional_id').val();
			
			if( ds_atendimento.length == 0 ) { $('#ds_procedimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; } 
			if( vl_com_atendimento.length == 0 ) { $('#vl_com_atendimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( vl_net_atendimento.length == 0 ) { $('#vl_net_atendimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( consult_profissional_id.length == 0 ) { $('#consult_profissional_id').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Nenhum Profissional Selecionado</strong></span>'); return false; }
			
			jQuery.ajax({
				type: 'POST',
				url: '{{ Request::url() }}/edit-precificacao-atendimento',
				data: {
					'atendimento_id': atendimento_id,
					'ds_atendimento': ds_atendimento,
					'vl_com_atendimento': vl_com_atendimento,
					'vl_net_atendimento': vl_net_atendimento,
					'profissional_id': consult_profissional_id,
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
	
    function addLinhaConsulta() {
        
    	if( $('#consulta_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Falha ao Selecionar a Consulta. Por favor, tente novamente.'); return false; }
		if( $('#ds_consulta').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Falha ao Selecionar a Consulta. Por favor, tente novamente.'); return false; }
		if( $('#vl_com_consulta').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Valor Comercial informado não é válido. Por favor, tente novamente.'); return false; }
		if( $('#vl_net_consulta').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Valor NET informado não é válido. Por favor, tente novamente.'); return false; }
		
		//if( $('#consulta_profissional_id').val().length == 0 ) return false;
		
		var list_profissional_consulta = new Array();
		$('#list_profissional_consulta :selected').each(function(i, selected) {
			list_profissional_consulta[i] = $(selected).val();
		});
		
		if( list_profissional_consulta.length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Nenhum Profissional Selecionado!. Por favor, tente novamente.'); return false; }
		if( $('#clinica_id').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosConsultas");

		var atendimento_id = $('#consulta_atendimento_id').val();
		var consulta_id = $('#consulta_id').val();
		//var consulta_profissional_id = $('#consulta_profissional_id').val();
		
		var ds_consulta = $('#descricao_consulta').val();
		var vl_com_consulta = $('#vl_com_consulta').val();
		var vl_net_consulta = $('#vl_net_consulta').val();
		var clinica_id = $('#clinica_id').val();

		jQuery.ajax({
			type: 'POST',
			url: '{{ Request::url() }}/add-precificacao-consulta',
			data: {
				'atendimento_id': atendimento_id,
				'consulta_id': consulta_id,
				//'consulta_profissional_id': consulta_profissional_id,
				'list_profissional_consulta': list_profissional_consulta,
				'ds_consulta': ds_consulta,
				'vl_com_consulta': vl_com_consulta,
				'vl_net_consulta': vl_net_consulta,
				'clinica_id': clinica_id,
				'_token': laravel_token
			},
            success: function (result) {
	            if(result.status) {

	            	//var atendimento = JSON.parse(result.atendimento);
	            	
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

		            $('#consult_profissional_id option').each(function(index){
			            if($(this).val() == atendimento.profissional_id) {
			            	$('#consult_profissional_id').prop("selectedIndex", index);
			            	nao_tem_atendimento = false;
			            }
			        });

			        if(nao_tem_atendimento) {
			        	$('#consult_profissional_id').prop("selectedIndex", 0);
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

    	var cd_consulta = $(element).parent().parent().find('td:nth-child(2)').html();
    	var ds_consulta = $(element).parent().parent().find('td:nth-child(3)').html();
    	var nm_profissional = $(element).parent().parent().find('td:nth-child(4)').html();
    	var vl_com_atendimento = $(element).parent().parent().find('td:nth-child(5)').html();
    	var vl_net_atendimento = $(element).parent().parent().find('td:nth-child(6)').html();

    	$('#profissional-consulta-modal').find('input.form-control').val('');
    	$('#profissional-consulta-modal').find('select.form-control').prop('selectedIndex',0);

		$('#consulta_id_edit').val(atendimento_id);
		$('#cd_consulta_edit').val(cd_consulta);
		$('#ds_consulta_edit').val(ds_consulta);
		$('#nm_profissional_consulta_edit').val(nm_profissional);
		$('#vl_com_consulta_edit').val(vl_com_atendimento);
    	$('#vl_net_consulta_edit').val(vl_net_atendimento);
		 
		$("#profissional-consulta-modal").modal();
    }

    function limparConsulta() {
    	$('#consulta_atendimento_id').val('');
		$('#consulta_id').val('');
		//$('#consulta_profissional_id').val('');
		$('#ds_consulta').val('');
		$('#nm_profissional_consulta').val('');
		$('#vl_com_consulta').val('');
		$('#vl_net_consulta').val('');
    }
	
    function delLinhaConsulta(element, atendimento_nome, atendimento_id) {

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
    			url: '{{ Request::url() }}/delete-consulta',
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

	function loadTagConsulta(element, atendimento_id, nome_consulta) {
        
		$('#tag_consulta').html(nome_consulta);
		$('#tag_consulta_atendimento_id').val(atendimento_id);

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

		            $('#list-all-tags-populares-consulta').empty();
		            
		            for(var i = 0; i < num_tags; i++) {

			            var index = i+1;
			            var tag_id = list_tag_popular[i].id;
			            var cs_tag = list_tag_popular[i].cs_tag;
			            
		            	var content_item = '<tr> \
			      	  		<td class="num_filial">'+tag_id+'</td> \
			        		<td>'+cs_tag+'</td> \
			        		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editConsltaTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
			        		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removerConsultaTagPopular(this, '+"'"+cs_tag+"'"+', '+tag_id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
			        	</tr>';

		            	 $('#list-all-tags-populares-consulta').append(content_item);
		            	    
		            }

		            $('#cs_tag_consulta').val('');
		            $("#tags-populares-consulta-modal").modal();
	                 
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

	function addConsultaTagPopular(input) {
        
		if( $('#cs_tag_consulta').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'O Nome popular é campo obrigatório. Por favor, tente novamente.'); return false; }
		if( $('#tag_consulta_atendimento_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Atendimento não localizado. Por favor, tente novamente.'); return false; }

		$(input).html('<i class="fa fa-spin fa-spinner"></i> Enviando...');
		
		var cs_tag = $('#cs_tag_consulta').val();
		var tag_id = $('#ct_consulta_tag_id').val();
		var tag_atendimento_id = $('#tag_consulta_atendimento_id').val();
		var tag_tipo_atendimento = $('#tag_consulta_tipo_atendimento').val();
		
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

		            $('#list-all-tags-populares-consulta').empty();
		            
		            for(var i = 0; i < num_tags; i++) {

			            var index = i+1;
			            var tag_id = list_tag_popular[i].id;
			            var cs_tag = list_tag_popular[i].cs_tag;
			            
		            	var content_item = '<tr> \
			      	  		<td class="num_filial">'+tag_id+'</td> \
			        		<td>'+cs_tag+'</td> \
			        		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editConsltaTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
			        		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removerConsultaTagPopular(this, '+"'"+cs_tag+"'"+', '+tag_id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
			        	</tr>';

		            	 $('#list-all-tags-populares-consulta').append(content_item);
		            	    
		            }

		            $('#ct_consulta_tag_id').val('');
		            $('#cs_tag_consulta').val('');

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

	function editConsltaTagPopular(element) {

    	var ct_tag_id = $(element).parent().parent().find('td:nth-child(1)').html();
    	var cs_tag = $(element).parent().parent().find('td:nth-child(2)').html();

    	$('#ct_consulta_tag_id').val(ct_tag_id);
    	$('#cs_tag_consulta').val(cs_tag);

    	if($('.cvx-card-header-consulta').find('a').hasClass('collapsed')) {
			$('.cvx-card-header-consulta').find('a').trigger("click");
    	}
    }

	function removerConsultaTagPopular(input, cs_tag, tag_id) {

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