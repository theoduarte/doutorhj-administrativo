<script>
    $(function(){
        
        function acaoCancelar(){
			$.ajax({
                url : 'agenda/cancelar/'+$('#ticketCancelamento').val()+'/'+$('.dtAtendimento').val()+'/'+$('#obs_cancelamento').val(),
                beforeSend : function(){

                },
                success: function(response){

                }
            }).done(function(msg){
                swal({
                        title : 'Solicitação Concluída!',
                        text  : 'Cancelamento de consulta efetuado.',
                        type  : 'success',
                        confirmButtonClass : 'btn btn-confirm mt-2'
                    }).then(function () {
                        dialogCancelamento.dialog( "close" );
                        location.reload();
                    });
            }).fail(function(jqXHR, textStatus, msg){

            });
        }

        dialogCancelamento = $( "#dialog-cancelar" ).dialog({
            autoOpen : false,
            height	 : 480,
            width	 : 698,
            modal	 : true,
            buttons	 : {
                "Cancelar Consulta" : acaoCancelar,
                Fechar	  : function() { dialogCancelamento.dialog( "close" ); }
            },
            close: function() { dialogCancelamento.dialog( "close" ); }
        });



        $( ".cancelamento" ).button().on( "click", function() {
            console.log( 'title: ' + $(this).attr('title'));

            $('#clinica').html("<b>" + $(this).attr('prestador')   + "</b>");
            $('#paciente').html("<b>" + $(this).attr('nm-paciente') + "</b>");
            $('#cancProfissional').html("<b>" + $(this).attr('nm-profissional') + "</b>");
            $('#cancEspecialidade').html("<b>" + $(this).attr('especialidade') + "</b>");

            $('#dtconsulta').html("<b>" + $(this).attr('data-hora')   + "</b>");
            $('#ticketCancelamento').val($(this).attr('ticket'));
            $('#cancDivConsulta').html("<b>" + $(this).attr('atendimento')   + "</b>");
            $('#ui-id-3').text($(this).attr('title'));

            var arDtAtnd = $(this).attr('data-hora').replace('/', ' ').replace('/', ' ').split(' ');
            $('.dtAtendimento').val(arDtAtnd[2]+'-'+arDtAtnd[1]+'-'+arDtAtnd[0]+' '+arDtAtnd[3]+':00');
			
            
            dialogCancelamento.dialog( "open"  );
        });
    });
</script>


<div id="dialog-cancelar" title="Cancelar Consulta">
    <div class="row">
        <div class="col-10">
            <label for="clinica">
                Clínica:
                <div id="clinica"></div>
                <input type="hidden" id="ticketCancelamento" name="ticketCancelamento" value="">
                <input type="hidden" id="dtAtendimento" name="dtAtendimento" class="dtAtendimento" value="">
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="cancProfissional">
                Profissional:
                <div id="cancProfissional"></div>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="dtconsulta">
                Data/Hora:
                <div id="dtconsulta"></div>
            </label>
        </div>
        <div class="col-9">
            <label for="paciente">
                Paciente:
                <div id="paciente"></div>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="cancEspecialidade">
                Especialidade:
                <div id="cancEspecialidade"></div>
            </label>
        </div>
        <div class="col-9">
            <label for="cancDivConsulta">
                Consulta/Exame:
                <div id="cancDivConsulta"></div>
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