<div class="form-group">
	<div class="row">
        <div class="col-6">
        	<label for="nm_razao_social" class="control-label">Consulta<span class="text-danger">*</span></label>
            <input id="ds_consulta" type="text" class="form-control" name="ds_consulta" value="{{ old('ds_consulta') }}" autofocus maxlength="100">
       		<input type="hidden" id="cd_consulta" name="cd_consulta" value="">
       		<input type="hidden" id="descricao_consulta" name="descricao_consulta" value="">
       		<input type="hidden" id="consulta_atendimento_id" name="consulta_atendimento_id" value="">
       		<input type="hidden" id="consulta_id" name="consulta_id" value="">
        </div>
        <div class="col-2">
            <label for="vl_consulta" class="control-label">Preço (R$)<span class="text-danger">*</span></label>
            <input id="vl_consulta" type="text" class="form-control mascaraMonetaria" name="vl_consulta" value="{{ old('vl_consulta') }}"  maxlength="15">
        </div>
        <div class="col-3">
        	<div style="height: 30px;"></div>
            <button type="button" class="btn btn-primary" onclick="addLinhaConsulta();"><i class="mdi mdi-content-save"></i> Salvar</button>
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
					<th width="100">Valor (R$)</th>
					<th width="10">Ação</th>
				</tr>
    			@foreach( $precoconsultas as $consulta )
    				<tr id="tr-{{$consulta->id}}">
    					<td>{{$consulta->id}}</td>
    					<td>{{$consulta->consulta->cd_consulta}} <input type="hidden" class="consulta_id" value="{{ $consulta->consulta->id }}"></td>
    					<td>{{$consulta->ds_preco}}</td>
    					<td>{{$consulta->vl_atendimento}}</td>
    					<td>
    						<a href="#" onclick="loadDataConsulta(this)" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaConsulta(this, '{{ $consulta->ds_preco }}', '{{ $consulta->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Remover</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
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
    });
	
    function addLinhaConsulta() {
		if( $('#consulta_id').val().length == 0 ) return false;
		if( $('#ds_consulta').val().length == 0 ) return false;
		if( $('#vl_consulta').val().length == 0 ) return false;
		if( $('#clinica_id').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosProcedimentos");

		var atendimento_id = $('#consulta_atendimento_id').val();
		var consulta_id = $('#consulta_id').val();
		var ds_consulta = $('#ds_consulta').val();
		var vl_consulta = $('#vl_consulta').val();
		var clinica_id = $('#clinica_id').val();

		jQuery.ajax({
			type: 'POST',
			url: '{{ Request::url() }}/add-precificacao-consulta',
			data: {
				'atendimento_id': atendimento_id,
				'consulta_id': consulta_id,
				'ds_consulta': ds_consulta,
				'vl_consulta': vl_consulta,
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
		                 <td>'+atendimento.consulta.cd_consulta+'</td>\
		                 <td>'+atendimento.ds_preco+'</td>\
		                 <td>'+atendimento.vl_atendimento+'</td>\
		                 <td>\
		                 	<a href="#" onclick="loadDataConsulta(this)" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>\
		                 	<a onclick="delLinhaConsulta(this, '+atendimento.ds_preco+', '+atendimento.id+')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Remover</a>\
		                 </td>\
		                 </tr>';
	                	$('#tblPrecosConsultas  > tbody > tr:first').after($tr);
	            	} else {
	            		$('#tr-'+atendimento.id).find('td:nth-child(2)').html(atendimento.consulta.cd_consulta);
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

    function loadDataConsulta(element) {

    	var atendimento_id = $(element).parent().parent().find('td:nth-child(1)').html();
    	var consulta_id = $(element).parent().parent().find('input.consulta_id').val();
    	var cd_consulta = $(element).parent().parent().find('td:nth-child(2)').html();
    	var ds_preco = $(element).parent().parent().find('td:nth-child(3)').html();
    	var vl_atendimento = $(element).parent().parent().find('td:nth-child(4)').html();

    	$('#consulta_atendimento_id').val(atendimento_id);
    	$('#consulta_id').val(consulta_id);
    	$('#ds_consulta').val(ds_preco);
    	$('#cd_consulta').val(cd_consulta);
    	$('#vl_consulta').val(vl_atendimento);
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
</script>