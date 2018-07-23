<script>
    $(function(){
        function acaoConfirmar(){
            $.ajax({
                url : 'agenda/confirmar/'+$('#confTicket').val()+'/20',
                beforeSend : function(){

                },
                success: function(response){

                }
            }).done(function(msg){
                swal({   title : 'Solicitação Concluída!',
                        text  : 'Cancelamento de consulta efetuado.',
                        type  : 'success',
                        confirmButtonClass : 'btn btn-confirm mt-2' 
                }).then(function () {
                    dialogConfirmacao.dialog( "close" );
                    location.reload();
                });
            }).fail(function(jqXHR, textStatus, msg){

            });            
        }

        function acaoNaoConfirmado(){
            $.ajax({
                url : 'agenda/confirmar/'+$('#confTicket').val()+'/30',
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
                });
            }).fail(function(jqXHR, textStatus, msg){

            });

            location.reload();
            dialogConfirmacao.dialog( "close" );
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



        $( ".confirmacao" ).button().on( "click", function() {            

            console.log( 'title: ' + $(this).attr('title'));

            $('.ticket').val($(this).attr('ticket'));
            $('#confClinica').html("<b>" + $(this).attr('prestador')   + "</b>");
            $('#confPaciente').html("<b>" + $(this).attr('nm-paciente') + "</b>");
            $('#confProfissional').html("<b>" + $(this).attr('nm-profissional') + "</b>");
            $('#confEspecialidade').html("<b>" + $(this).attr('especialidade') + "</b>");
            $('#confAtendimento').html("<b>" + $(this).attr('atendimento') + "</b>");
            $('#confDtconsulta').html("<b>" + $(this).attr('data-hora')   + "</b>");
            $('#confValorConsulta').html("<b>" + $(this).attr('valor-consulta')   + "</b>");
            $('#ui-id-4').text($(this).attr('title'));

            type = $(this).attr('type');
            $('.spanConsulta').text(type + ':');

            $('#confTicket').val($(this).attr('ticket'));            

            dialogConfirmacao.dialog( "open"  );
        });
    });
</script>
<div id="dialog-confirmar" title="Confirmar Consulta">
    <div class="row">
        <div class="col-12">
            <label for="clinica">
                Clínica:
                <div id="confClinica"></div>
                <input type="hidden" id="confTicket" name="confTicket" value="">
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="paciente">
                Profissional:
                <div id="confProfissional"></div>
            </label>
        </div>
        <div class="col-6">
            <label for="paciente">
                Paciente:
                <div id="confPaciente"></div>
            </label>
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">
            <label for="divDtHora">
                Especialidade:
                <div id="confEspecialidade"></div>
            </label>
        </div>

        <div class="col-6">
            <label for="divConsulta">
                <span class="spanConsulta">Consulta/Exame:</span>
                <div id="confAtendimento"></div>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="divDtHora">
                Data/Hora:
                <div id="confDtconsulta"></div>
            </label>
        </div>
        <div class="col-4">
            <label for="divValorConsulta">
                Valor Pago (R$):
                <div id="confValorConsulta"></div>
            </label>
        </div>
    </div>
    
</div>