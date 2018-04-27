<script>
    $(function(){
		function acaoCancelar(){
			$.ajax({
		        url : 'agenda/cancelar/'+$('#ticketCancelamento').val()+'/'+$('#obs_cancelamento').val(),
		        beforeSend : function(){
			        
		        },
		        success: function(response){

		        }
		    }).done(function(msg){
				swal(
				        {
				            title : 'Solicitação Concluída!',
				            text  : 'Cancelamento de consulta efetuado.',
				            type  : 'success',
				            confirmButtonClass : 'btn btn-confirm mt-2'
				        }
				    );
		    }).fail(function(jqXHR, textStatus, msg){

		    });
			
			dialogCancelamento.dialog( "close" ); 
		}

		
        
        dialogCancelamento = $( "#dialog-cancelar" ).dialog({
            autoOpen : false,
            height	 : 400,
            width	 : 698,
            modal	 : true,
            buttons	 : {
                "Cancelar Consulta" : acaoCancelar,
                Fechar	  : function() { dialogCancelamento.dialog( "close" ); }
            },
            close: function() { dialogCancelamento.dialog( "close" ); }
        });


		
        $( ".cancelamento" ).button().on( "click", function() {
        	$('#clinica').html("<b>" + $(this).attr('prestador')   + "</b>");
        	$('#paciente').html("<b>" + $(this).attr('nm-paciente') + "</b>");
        	$('#dtconsulta').html("<b>" + $(this).attr('data-hora')   + "</b>");
			$('#ticketCancelamento').val($(this).attr('ticket'));
        	
			dialogCancelamento.dialog( "open"  );
        });
   });
</script>

<div id="dialog-cancelar" title="Cancelar Consulta">
    <div class="row">
        <div class="col-10">
            <label for="clinica">Clínica:
                <div id="clinica"></div>
                <input type="hidden" id="ticketCancelamento" name="ticketCancelamento" value="">
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-10">
            <label for="paciente">Paciente:
                <div id="paciente"></div>
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-10">
            <label for="paciente">Consulta:
                <div id="dtconsulta"></div>
            </label>
        </div>
    </div>
    
    <div style="height:10px;"></div>
    
    <div class="row">
    	<div class="col-12">    
            <label>Motivo do cancelamento:</label>
    		<textarea class="form-control" rows="3" cols="10" id="obs_cancelamento" name="obs_cancelamento"></textarea>
        </div>
    </div>
</div>