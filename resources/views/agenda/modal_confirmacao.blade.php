<script>
    $(function(){
		function acaoConfirmar(){
			$.ajax({
		        url : 'agenda/confirmar/'+$('#ticketConfirmacao').val(),
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
			
			dialogConfirmacao.dialog( "close" ); 
		}

		function acaoNaoConfirmado(){

		}
        
        dialogConfirmacao = $( "#dialog-confirmar" ).dialog({
            autoOpen : false,
            height	 : 400,
            width	 : 698,
            modal	 : true,
            buttons	 : {
            	"Confirmado" : acaoConfirmar,
            	"Não Confirmado" : acaoNaoConfirmado,
                Fechar	  : function() { dialogConfirmacao.dialog( "close" ); }
            },
            close: function() { dialogConfirmacao.dialog( "close" ); }
        });


		
        $( "#confirmacao" ).button().on( "click", function() {
        	$('#confClinica').html("<b>" + $(this).attr('prestador')   + "</b>");
        	$('#confPaciente').html("<b>" + $(this).attr('nm-paciente') + "</b>");
        	$('#confDtconsulta').html("<b>" + $(this).attr('data-hora')   + "</b>");
			$('#confTicket').val($(this).attr('ticket'));
        	
			dialogConfirmacao.dialog( "open"  );
        });
   });
</script>

<div id="dialog-confirmar" title="Confirmar Consulta">
    <div class="row">
        <div class="col-10">
            <label for="clinica">Clínica:
                <div id="confClinica"></div>
                <input type="hidden" id="confTicket" name="confTicket" value="">
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-10">
            <label for="paciente">Paciente:
                <div id="confPaciente"></div>
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-10">
            <label for="paciente">Consulta:
                <div id="confDtconsulta"></div>
            </label>
        </div>
    </div>
</div>