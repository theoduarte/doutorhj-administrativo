<div class="form-group">
	<div class="row">
        <div class="col-6">
        	<label for="ds_procedimento" class="control-label">Procedimento<span class="text-danger">*</span></label>
            <input id="ds_procedimento" type="text" class="form-control" name="ds_procedimento" value="{{ old('ds_procedimento') }}" autofocus maxlength="100">
       		<input type="hidden" id="cd_procedimento" name="cd_procedimento" value="">
       		<input type="hidden" id="descricao_procedimento" name="descricao_procedimento" value="">
       		<input type="hidden" id="atendimento_id" name="atendimento_id" value="">
       		<input type="hidden" id="procedimento_id" name="procedimento_id" value="">
        </div>
        <div class="col-2">
            <label for="vl_procedimento" class="control-label">Preço (R$)<span class="text-danger">*</span></label>
            <input id="vl_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_procedimento" value="{{ old('vl_procedimento') }}"  maxlength="15">
        </div>
        <div class="col-3">
        	<div style="height: 30px;"></div>
            <button type="button" class="btn btn-primary" onclick="addLinhaProcedimento();"><i class="mdi mdi-content-save"></i> Salvar</button>
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
					<th width="100">Valor (R$)</th>
					<th width="10">Ação</th>
				</tr>
    			@foreach( $precoprocedimentos as $procedimento )
    				<tr id="tr-{{$procedimento->id}}">
    					<td>{{$procedimento->id}}</td>
    					<td>{{$procedimento->procedimento->cd_procedimento}} <input type="hidden" class="procedimento_id" value="{{ $procedimento->procedimento->id }}"></td>
    					<td>{{$procedimento->ds_preco}}</td>
    					<td>{{$procedimento->vl_atendimento}}</td>
    					<td>
    						<a href="#" onclick="loadDataProcedimento(this)" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaProcedimento(this, '{{ $procedimento->ds_preco }}', '{{ $procedimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Remover</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
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
        	  minLength : 3,
        	  select: function(event, ui) {
        		  arProcedimento = ui.item.id.split(' | ');
        		  
           	      $('input[name="procedimento_id"]').val(arProcedimento[0]);
           	      $('input[name="cd_procedimento"]').val(arProcedimento[1]);
           	      $('input[name="descricao_procedimento"]').val(arProcedimento[2]);
        	  }
        });
    });
	
    function addLinhaProcedimento() {
		if( $('#procedimento_id').val().length == 0 ) return false;
		if( $('#ds_procedimento').val().length == 0 ) return false;
		if( $('#vl_procedimento').val().length == 0 ) return false;
		if( $('#clinica_id').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosProcedimentos");

		var atendimento_id = $('#atendimento_id').val();
		var procedimento_id = $('#procedimento_id').val();
		var ds_procedimento = $('#ds_procedimento').val();
		var vl_procedimento = $('#vl_procedimento').val();
		var clinica_id = $('#clinica_id').val();

		jQuery.ajax({
			type: 'POST',
			url: '{{ Request::url() }}/add-precificacao-procedimento',
			data: {
				'atendimento_id': atendimento_id,
				'procedimento_id': procedimento_id,
				'ds_procedimento': ds_procedimento,
				'vl_procedimento': vl_procedimento,
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
		                 <td>'+atendimento.procedimento.cd_procedimento+'</td>\
		                 <td>'+atendimento.ds_preco+'</td>\
		                 <td>'+atendimento.vl_atendimento+'</td>\
		                 <td>\
		                 	<a href="#" onclick="loadDataProcedimento(this)" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>\
		                 	<a onclick="delLinhaProcedimento(this, '+atendimento.ds_preco+', '+atendimento.id+')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Remover</a>\
		                 </td>\
		                 </tr>';
	                	$('#tblPrecosProcedimentos  > tbody > tr:first').after($tr);
	            	} else {
	            		$('#tr-'+atendimento.id).find('td:nth-child(2)').html(atendimento.procedimento.cd_procedimento);
						$('#tr-'+atendimento.id).find('td:nth-child(3)').html(atendimento.ds_preco);
						$('#tr-'+atendimento.id).find('td:nth-child(4)').html(atendimento.vl_atendimento);
	            	}
	                 
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
    	var vl_atendimento = $(element).parent().parent().find('td:nth-child(4)').html();

    	$('#atendimento_id').val(atendimento_id);
    	$('#procedimento_id').val(procedimento_id);
    	$('#ds_procedimento').val(ds_preco);
    	$('#cd_procedimento').val(cd_procedimento);
    	$('#vl_procedimento').val(vl_atendimento);
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