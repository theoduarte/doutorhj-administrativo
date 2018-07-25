@php
    use App\Agendamento;
@endphp
<script>
    $(function(){
        function acaoFaturar(){
            $.ajax({
                url : 'agenda/set-status-by-id/'+$('#dialog-faturar #confIdAgendamento').val()+'/' + "{{ Agendamento::FATURADO }}",
                beforeSend : function(){

                },
                success: function(response){

                }
            }).done(function(msg){
                swal(
                    {
                        title : 'Solicitação Concluída!',
                        text  : 'Faturamento efetuado.',
                        type  : 'success',
                        confirmButtonClass : 'btn btn-confirm mt-2'
                    }
                ).then(function () {
                    dialogFaturamento.dialog( "close" );
                    location.reload();
                });
            }).fail(function(jqXHR, textStatus, msg){

            });
        }

        dialogFaturamento = $( "#dialog-faturar" ).dialog({
            autoOpen : false,
            height	 : 400,
            width	 : 698,
            modal	 : true,
            buttons	 : {
                "Faturar" : acaoFaturar,
                Fechar	  : function() { dialogFaturamento.dialog( "close" ); }
            },
            close: function() { dialogFaturamento.dialog( "close" ); }
        });

        $( ".faturamento" ).button().on( "click", function() {
            $('#dialog-faturar #confClinica').html("<b>" + $(this).attr('prestador')   + "</b>");
            $('#dialog-faturar #confPaciente').html("<b>" + $(this).attr('nm-paciente') + "</b>");
            $('#dialog-faturar #confProfissional').html("<b>" + $(this).attr('nm-profissional') + "</b>");
            $('#dialog-faturar #confEspecialidade').html("<b>" + $(this).attr('especialidade') + "</b>");
            $('#dialog-faturar #confAtendimento').html("<b>" + $(this).attr('atendimento') + "</b>");
            $('#dialog-faturar #confValorAtendimento').html("<b>" + $(this).attr('valor-consulta')   + "</b>");

            $('#dialog-faturar #confDtHora').html("<b>" + $(this).attr('data-hora')   + "</b>");
            $('#dialog-faturar #confTicket').val($(this).attr('ticket'));
            $('#dialog-faturar #confIdAgendamento').val($(this).attr('id-agendamento'));

            dialogFaturamento.dialog( "open"  );
        });
    });
</script>
<div id="dialog-faturar" title="Confirmar Faturamento">
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