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
					<th class="text-left" style="width: 400px;">Locais Disponíveis</th>
					<th width="300">Nomes Populares</th>
					<th width="100">Vl. Com. (R$)</th>
					<th width="100">Vl. NET (R$)</th>
					<th width="10">Ação</th>
				</tr>
    			@foreach( $precoprocedimentos as $atendimento )
    				<tr id="tr-{{$atendimento->id}}">
    					<td>{{$atendimento->id}} <input type="hidden" class="procedimento_id" value="{{ $atendimento->procedimento->id }}"> <input type="hidden" class="profissional_id" value="{{ $atendimento->profissional->id }}"></td>
    					<td><a href="{{ route('procedimentos.show', $atendimento->procedimento->id) }}" title="Exibir" class="btn-link text-primary"><i class="ion-search"></i> {{$atendimento->procedimento->cd_procedimento}}</a></td>
    					<td>{{$atendimento->ds_preco}}</td>
    					<!-- <td>@if($atendimento->profissional->cs_status == 'A') {{$atendimento->profissional->nm_primario.' '.$atendimento->profissional->nm_secundario.' ('.$atendimento->profissional->documentos()->first()->tp_documento.': '.$atendimento->profissional->documentos->first()->te_documento.')' }} @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA PROFISSIONAL SELECIONADO</span> @endif</td> -->
    					<td>@if( isset($atendimento->filials) && sizeof($atendimento->filials) > 0 ) <ul class="list-profissional-especialidade">@foreach($atendimento->filials as $filial) <li><i class="mdi mdi-check"></i> @if($filial->eh_matriz == 'S') (Matriz) @endif {{ $filial->nm_nome_fantasia }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA FILIAL SELECIONADA</span>  @endif</td>
    					<td>@if( isset($atendimento->procedimento->tag_populars) && sizeof($atendimento->procedimento->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($atendimento->procedimento->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="ion-close-circled"></i></span>  @endif</td>
    					<td>{{$atendimento->getVlComercialAtendimento()}}</td>
    					<td>{{$atendimento->getVlNetAtendimento()}}</td>
    					<td>
    						<a onclick="loadDataProcedimento(this, {{ $atendimento->id }})" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaProcedimento(this, '{{ $atendimento->ds_preco }}', '{{ $atendimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Excluir</a>
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
                <!-- 
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nm_profissional_edit" class="control-label">Profissional</label>
                            <select id="proced_profissional_id" class="form-control" name="proced_profissional_id">
                            	<option value="">--- NENHUM PROFISSIONAL SELECIONADO ----</option>
        			            @foreach($list_profissionals as $profissional)
        			            <option value="{{ $profissional->id }}">{{ $profissional->nm_primario.' '.$profissional->nm_secundario.' ('.$profissional->documentos->first()->tp_documento.': '.$profissional->documentos->first()->te_documento.')' }}</option>
        			            @endforeach
        		            </select>
                        </div>
                    </div>
                </div>  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="atendimento_filial" class="control-label">Locais de Atendimento</label>
                            <select id="atendimento_filial" class="select2 select2-multiple" name="atendimento_filial" multiple="multiple" multiple data-placeholder="Selecione ...">
                            	@foreach($list_filials as $filial)
								<option value="{{ $filial->id }}">@if($filial->eh_matriz == 'S') (Matriz) @endif {{ $filial->nm_nome_fantasia }}</option>
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

        $('#con-close-modal').find("#filial_profissional").trigger('change.select2');

        $('#btn-save-profissional-procedimento').click(function(){

			var atendimento_id = $('#atendimento_id_edit').val();
			var ds_atendimento = $('#ds_procedimento_edit').val();
			var vl_com_atendimento = $('#vl_com_atendimento_edit').val();
			var vl_net_atendimento = $('#vl_net_atendimento_edit').val();
			//var proced_profissional_id = $('#proced_profissional_id').val();

			var atendimento_filial = new Array();
			$('#atendimento_filial :selected').each(function(i, selected) {
				atendimento_filial[i] = $(selected).val();
			});
			
			if( ds_atendimento.length == 0 ) { $('#ds_procedimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; } 
			if( vl_com_atendimento.length == 0 ) { $('#vl_com_atendimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( vl_net_atendimento.length == 0 ) { $('#vl_net_atendimento_edit').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			//if( proced_profissional_id.length == 0 ) { $('#proced_profissional_id').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Nenhum Profissional Selecionado</strong></span>'); return false; }
			
			jQuery.ajax({
				type: 'POST',
				url: '{{ Request::url() }}/edit-precificacao-atendimento',
				data: {
					'atendimento_id': atendimento_id,
					'ds_atendimento': ds_atendimento,
					'vl_com_atendimento': vl_com_atendimento,
					'vl_net_atendimento': vl_net_atendimento,
					//'profissional_id': proced_profissional_id,
					'atendimento_filial': atendimento_filial,
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

    function loadDataProcedimento(element, atendimento_id) {

    	var cd_procedimento = $(element).parent().parent().find('td:nth-child(2)').html();

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
			            	$('#proced_profissional_id').prop("selectedIndex", index);
			            	nao_tem_atendimento = false;
			            }
			        });

			        if(nao_tem_atendimento) {
			        	$('#proced_profissional_id').prop("selectedIndex", 0);
			        }

			        cd_procedimento = atendimento.procedimento.cd_procedimento;
			        $('#cd_procedimento_edit').val(cd_procedimento);

			        //--realiza o carregamento dos locais onde o atendimento esta disponivel-------------
			        $('#profissional-procedimento-modal').find("#atendimento_filial option:selected").prop("selected", false);
			        for(var i = 0; i < atendimento.filials.length > 0; i++) {

			        	$('#profissional-procedimento-modal').find("#atendimento_filial option").each(function(){
			            	if($(this).val() == atendimento.filials[i].id) {
				            	$(this).prop("selected", true);
			            	}
			            });
			        }

			        $('#profissional-procedimento-modal').find("#atendimento_filial").trigger('change.select2');
	                 
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
		
    	var ds_procedimento = $(element).parent().parent().find('td:nth-child(3)').html();
    	var nm_profissional = $(element).parent().parent().find('td:nth-child(4)').html();
    	var vl_com_atendimento = $(element).parent().parent().find('td:nth-child(6)').html();
    	var vl_net_atendimento = $(element).parent().parent().find('td:nth-child(7)').html();

    	$('#profissional-procedimento-modal').find('input.form-control').val('');
    	$('#profissional-procedimento-modal').find('select.form-control').prop('selectedIndex',0);

		$('#atendimento_id_edit').val(atendimento_id);
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

    
</script>