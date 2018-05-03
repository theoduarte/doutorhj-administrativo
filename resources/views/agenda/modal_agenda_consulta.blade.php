<script>
    $(function(){
        $("#localAtendimento").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url : "/consultas/localatendimento/"+$('#localAtendimento').val(),
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 5,
            select: function(event, ui) {
                $('input[name="clinica_id"]').val(parseInt(ui.item.id));
            }
        });


        
        $("#profissional").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url : "/agenda/profissional/" + $('#profissional').val(),
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 5,
            select: function(event, ui) {
    	        $('input[name="profissional_id"]').val(parseInt(ui.item.id));
            }
        });


		
		$('.clinica_id').change(function(){
			$.ajax({
		        url : "/profissionais/" + $(this).val(),
		        beforeSend : function(){
			        
		        },
		        success: function(response){
					$('.profissional_id').html(null);

					response.forEach(function(x){
						$('.profissional_id').append('<option value="'+x.id+'">'+x.id+' - '+ x.nm_primario + ' '+ x.nm_secundario +'</option>');
		            });
		        }
		    }).done(function(msg){
		    		$('.profissional_id').val($('#agendamento').attr('id-profissional'));
		    }).fail(function(jqXHR, textStatus, msg){
		         window.alert(msg);
		    });
		});
        


		function acaoAgendar(){
			clinica_id = $('.clinica_id').val();
			profissional_id = $('.profissional_id').val();
			paciente_id = $('.paciente').val();
			data = $('#datepicker-autoclose').val();
			hora = $('select[name="time"]').val();
			ticket = $('.ticket').val();

			
			if ( clinica_id != null && profissional_id != null && data != null && hora != '' ){
        			if( $('#agendamento').attr('title') == 'Agendar Consulta' ){
        				link = "/agenda/agendar/" + ticket + '/' + clinica_id + '/' + profissional_id + '/' + paciente_id + '/' + data + '/' + hora;
        			}else{
        				link = "/agenda/agendar/" + ticket + '/' + clinica_id + '/' + profissional_id + '/' + paciente_id + '/' + data + '/' + hora + '/S';
        			}

        			$.ajax({
    			        url : link,
    			        beforeSend : function(){
    				        
    			        },
    			        success: function(response){

    			        }
    			    }).done(function(msg){
    					swal(
    					        {
    					            title : 'Solicitação Concluída!',
    					            text  : '',
    					            type  : 'success',
    					            confirmButtonClass : 'btn btn-confirm mt-2'
    					        }
    					    );
    			    }).fail(function(jqXHR, textStatus, msg){
    					swal(
    					        {
    					            title: 'Um erro inesperado ocorreu!',
    					            text: '',
    					            type: 'error',
    					            confirmButtonClass: 'btn btn-confirm mt-2'
    					        }
    					    );
    			    });


        			location.reload();
					dialogAgendamento.dialog( "close" ); 
 
			}else{
					swal(
				        {
				            title: 'Preencha todos os campos!',
				            text: '',
				            type: 'error',
				            confirmButtonClass: 'btn btn-confirm mt-2'
				        }
				    );
			}

			return true;
		}
		
        
        dialogAgendamento = $( "#dialog-agendar" ).dialog({
            autoOpen : false,
            height	 : 470,
            width	 : 698,
            modal	 : true,
            buttons	 : {
                "Agendar" : acaoAgendar,
                Fechar	  : function() { dialogAgendamento.dialog( "close" ); }
            },
            close: function() { dialogAgendamento.dialog( "close" ); }
        }); 
		
		
        $( "#agendamento" ).button().on( "click", function() {
        	$('.ticket').val($(this).attr('ticket'));
        	$('#divPaciente') .html("<b>" + $(this).attr('nm-paciente') + "</b>");
        	$('#divDtHora')   .html("<b>" + $(this).attr('data-hora')   + "</b>");
        	$('#divPrestador').html("<b>" + $(this).attr('prestador')   + "</b>");
        	$('#divEspecialidade').html("<b>" + $(this).attr('especialidade')   + "</b>");
        	$('#divValorConsulta').html("<b>" + $(this).attr('valor-consulta')   + "</b>");
			$('.paciente').val($(this).attr('id-paciente'));
			$('#ui-id-1, #ui-id-2').text($('#agendamento').attr('title'));
			
        	dialogAgendamento.dialog( "open"  );

        	$('.clinica_id').val($(this).attr('id-clinica'));
        	$('.clinica_id').change();
        });
		
		
    	$('#datepicker-autoclose').change(function(){
			var data = $(this).val().split('/');
        	
        	$.ajax({
        	    url 	 : '/horarios/' + data[2]+'-'+data[1]+'-'+data[0],
        	    dataType : 'json',
        	    success  : function(horarios) {
        	    	$('#time').html(null);

        	        for( var indice = 0; indice<=horarios.length-1; indice++ ){
        	        	$('#time').append('<option value="' + horarios[indice].hora + '">' + horarios[indice].hora + '</option>');
        	        }
        	    }
        	});
    	});
   });
</script>

<div id="dialog-agendar" title="">
    <form id="formConsulta" name="formConsulta">
        <div class="row">
            <div class="col-7">
    			<label for="divPaciente">Paciente:<div id="divPaciente"></div></label>
    			<input type="hidden" name="paciente" class="paciente" value="">
    			<input type="hidden" name="ticket" class="ticket" value="">
            </div>
        </div>
		
    	<div class="row">
            <div class="col-12">
                <label for="profissional_id">Clínica:</label>
            	<select class="form-control clinica_id" id="clinica_id" name="clinica_id">
            		@foreach($clinicas as $clinica)
            			<option value="{{$clinica->id}}">{{$clinica->nm_razao_social}}</option>
            		@endforeach
            	</select>
            </div>
        </div>
            	
		<div style="height:10px;"></div>
            	
    	<div class="row">
            <div class="col-12">
                <label for="profissional_id">Profissional:</label>
            	<select class="form-control profissional_id" id="profissional_id" name="profissional_id">
            		<option value=""></option>
            	</select>
            </div>
        </div>
        
        <div style="height:10px;"></div>
        
		<div class="row">
		    <div class="col-12">
    			<label for="divDtHora">Especialidade:<div id="divEspecialidade"></div></label>
            </div>
		</div>
		<div class="row">
			<div class="col-3">
    			<label for="divDtHora">Consulta:<div id="divDtHora"></div></label>
            </div>
		    <div class="col-2">
    			<label for="divDtHora">Valor Pago:<div id="divValorConsulta"></div></label>
            </div>
        	<div class="col-3">    
                <label>Agendar para:</label>
				<input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose">
            </div>
        	<div class="col-4">
                <label>Hora:</label>
    			<select class="form-control" id="time" name="time">
    			</select>
            </div>
		</div>
    </form>
</div>