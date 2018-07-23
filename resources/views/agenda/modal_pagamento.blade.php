@php
    use App\Agendamento;
@endphp

<script>
    $(function(){
        function acaoPagar(){
            $.ajax({
                url : 'agenda/set-status-by-id/'+$('#dialog-pagar #confIdAgendamento').val()+'/' + "{{ Agendamento::PAGO }}",
                beforeSend : function(){

                },
                success: function(response){

                }
            }).done(function(msg){
                swal(
                    {
                        title : 'Solicitação Concluída!',
                        text  : 'Pagamento efetuado.',
                        type  : 'success',
                        confirmButtonClass : 'btn btn-confirm mt-2'
                    }
                ).then(function () {
                    dialogPagamento.dialog( "close" );
                    location.reload();
                });
            }).fail(function(jqXHR, textStatus, msg){

            });
        }

        dialogPagamento = $( "#dialog-pagar" ).dialog({
            autoOpen : false,
            height	 : 400,
            width	 : 698,
            modal	 : true,
            buttons	 : {
                "Pagar" : acaoPagar,
                Fechar	  : function() { dialogPagamento.dialog( "close" ); }
            },
            close: function() { dialogPagamento.dialog( "close" ); }
        });

        $( ".pagamento" ).button().on( "click", function() {
            $('#dialog-pagar #confClinica').html("<b>" + $(this).attr('prestador')   + "</b>");
            $('#dialog-pagar #confPaciente').html("<b>" + $(this).attr('nm-paciente') + "</b>");
            $('#dialog-pagar #confProfissional').html("<b>" + $(this).attr('nm-profissional') + "</b>");
            $('#dialog-pagar #confEspecialidade').html("<b>" + $(this).attr('especialidade') + "</b>");
            $('#dialog-pagar #confAtendimento').html("<b>" + $(this).attr('atendimento') + "</b>");
            $('#dialog-pagar #confValorAtendimento').html("<b>" + $(this).attr('valor-consulta')   + "</b>");

            $('#dialog-pagar #confDtHora').html("<b>" + $(this).attr('data-hora')   + "</b>");
            $('#dialog-pagar #confTicket').val($(this).attr('ticket'));
            $('#dialog-pagar #confIdAgendamento').val($(this).attr('id-agendamento'));

            dialogPagamento.dialog( "open"  );
        });
    });
</script>
<div id="dialog-pagar" title="Confirmar Pagamento">
    <div class="row">
        <div class="col-10">
            <label for="clinica">
                Clínica:
                <div id="confClinica"></div>
                <input type="hidden" id="confTicket" name="confTicket" value="">
                <input type="hidden" id="confIdAgendamento" name="confIdAgendamento" value="">
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

    <div style="height:10px;"></div>
    <div class="row">
        <div class="col-6">
            <label for="confDtHora">
                Especialidade:
                <div id="confEspecialidade"></div>
            </label>
        </div>

        <div class="col-6">
            <label for="confAtendimento">
                <span class="spanConsulta">Consulta/Exame:</span>
                <div id="confAtendimento"></div>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="confDtHora">
                Data/Hora:
                <div id="confDtHora"></div>
            </label>
        </div>
        <div class="col-4">
            <label for="confValorAtendimento">
                Valor Pago (R$):
                <div id="confValorAtendimento"></div>
            </label>
        </div>
    </div>
    
</div>