<script>
    var type = '';
    $(function(){

        $('#dialog-agendar .btn-primary').on('click', function(){
            var agendamento_id  = $('#dialog-agendar #agendamento_id').val();
            var clinica_id      = $('#dialog-agendar #clinica_id').val();
            var profissional_id = $('#dialog-agendar #profissional_id').val();
            var filial_id       = $('#dialog-agendar #filial_id').val();
            var tpPrestador     = $('#dialog-agendar #tp_prestador').val();
            var data 		    = $('#dialog-agendar #datepicker-agenda').val().length == 0 ? null : $('#dialog-agendar #datepicker-agenda').val();
            var hora 			= $('select[name="time"]').val() == null ? null : $('select[name="time"]').val();
            
            if( !agendamento_id ) return false;
            if( !clinica_id ) return false;

            if( type == 'Consulta' ) {
                if( !profissional_id ) return false;
                if( !filial_id ) return false;
                if( !data ) return false;
                if( !hora ) return false;
            }

            if ( type == 'Exame' && tpPrestador == 'CLI' ) {
                if( !filial_id ) return false;   
                if( !data ) return false;
                if( !hora ) return false;
            }

            $.ajax({
                type : "post",
                url : "/add-agendamento",
                data : $('#formConsulta').serialize(),
                beforeSend : function(){

                },
                success: function(response){

                }
            }).done(function(msg){
                swal({
                	title : 'Solicitação Concluída!',
                    text  : '',
                    type  : 'success',
                    showCancelButton: false,
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                    confirmButtonText: 'OK',
                }).then(function () {
                    $("#dialog-agendar .btn-secondary").trigger('click');
                	location.reload();
                });
                
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

            return true;
        });
        
        $( ".agendamento" ).button().on( "click", function() {
            type = $(this).attr('type');

        	$('.modal-title').text($(this).attr('title'));
            $('.spanConsulta').text(type + ':');
            
            $('#datepicker-agenda').val(null);
        	$('#time').html(null);

            $('#dialog-agendar #ticket').val($(this).attr('ticket'));
            $('#dialog-agendar #paciente').val($(this).attr('id-paciente'));
            $('#dialog-agendar #clinica_id').val($(this).attr('id-clinica'));
            $('#dialog-agendar #profissional_id').val($(this).attr('id-profissional'));
            $('#dialog-agendar #agendamento_id').val( $(this).attr('id-agendamento') );
            $('#dialog-agendar #especialidade_id').val( $(this).attr('id-especialidade') );
            $('#dialog-agendar #tp_prestador').val( $(this).attr('tp-prestador') );
            
            $('#confPaciente') .html("<b>" + $(this).attr('nm-paciente') + "</b>");
            $('#confClinica') .html("<b>" + $(this).attr('nm-clinica') + "</b>");
            $('#confDtHora')   .html("<b>" + $(this).attr('data-hora')   + "</b>");
            $('#confPrestador').html("<b>" + $(this).attr('prestador')   + "</b>");
            $('#confEspecialidade').html("<b>" + $(this).attr('especialidade')   + "</b>");
            $('#confValorAtendimento').html("<b>" + $(this).attr('valor-consulta')   + "</b>");
            $('#confProfissional') .html("<b>" + $(this).attr('nm-profissional') + "</b>");
            $('#confAtendimento').html("<b>" + $(this).attr('atendimento')   + "</b>");
            $('#confFilial').html("<b>" + $(this).attr('nm-filial')   + "</b>");
            $('#confTicket').html("<b>" + $(this).attr('ticket')   + "</b>");

            var agendamento_id      = $('#dialog-agendar #agendamento_id').val();
            var clinica_id          = $('#dialog-agendar #clinica_id').val();
            var profissional_id     = $('#dialog-agendar #profissional_id').val();
            var especialidade_id    = $('#dialog-agendar #especialidade_id').val();
            var tpPrestador         = $('#dialog-agendar #tp_prestador').val();

            var action = '/get-active-filials-by-clinica-profissional-consulta';
            var ajaxData = {'clinica_id': clinica_id, 'profissional_id': profissional_id, 'especialidade_id': especialidade_id, '_token' : laravel_token};

            console.log($('#dialog-agendar #tp_prestador').val());
            if( type == "Consulta" ) {
                action = '/get-active-filials-by-clinica-profissional-consulta';
                ajaxData = {'clinica_id': clinica_id, 'profissional_id': profissional_id, 'especialidade_id': especialidade_id, '_token' : laravel_token};
            }
            else if( type == "Exame") {
                action = '/get-active-filials-by-clinica-procedimento';
                ajaxData = {'clinica_id': clinica_id, 'especialidade_id': especialidade_id, '_token' : laravel_token};

                if( tpPrestador == 'LAB' ) {
                    $('#dialog-agendar .row.fill').find(':input').val('');
                    $('#dialog-agendar #filial_id').empty();
                    $('#dialog-agendar .row.fill').hide();

                    return;
                }
            }

            jQuery.ajax({
                type: 'GET',
                url: action,
                data: ajaxData,
                dataType: 'json',
                success: function (result) {
                    if( result != null) {
                        $('#dialog-agendar #filial_id').empty();

                        var option = '<option value="">Selecione</option>';
                        $('#dialog-agendar #filial_id').append( option );
                        for(var i=0; i < result.length; i++) {
                            option = '<option value="'+result[i].id+'">'+ ( result[i].eh_matriz == 'S' ? 'Matriz - ' : 'Filial - ' ) + result[i].nm_nome_fantasia +  '</option>';
                            $('#dialog-agendar #filial_id').append( option );
                        }

                        if( !$('#dialog-agendar #filial_id').val()  ) { return false; }
                    }
                },
                error: function (result) {
                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                },
                complete: function(){
                    $( ".select2" ).select2({
                        width: null
                    });
                }
            });
        });

		/**
		* Verifica disponibilidade de atendimento em função de clinica, 
		* profissional, data e hora.
		*/
        $('#dialog-agendar #datepicker-agenda').change(function(){
            $('#dialog-agendar #data').val( $(this).val() ) ;

            var agendamento_id  = $('#dialog-agendar #agendamento_id').val();
            var clinica_id      = $('#dialog-agendar #clinica_id').val();
            var profissional_id = $('#dialog-agendar #profissional_id').val();
            var data 		    = $(this).val().split('/');
            var ct_data_hora    = ($('#confDtHora b').html()).split(' ');
            var ct_hora         = ct_data_hora[1];

            $.ajax({
                type     : 'get',
                url 	 : '/horarios',
                data     : {agendamento_id: agendamento_id, clinica_id: clinica_id, profissional_id: profissional_id, data: data[2] + '-' + data[1] + '-' + data[0]},
                dataType : 'json',
                success  : function(horarios) {
                    $('#time').html(null);

                    $('#time').append('<option value=""></option>');

                    for( var indice = 0; indice<=horarios.length-1; indice++ ){
                        $('#time').append('<option value="' + horarios[indice].hora + '">' + horarios[indice].hora + '</option>');
                    }
                }
            });
        });
    });
</script>


<div class="modal" id="dialog-agendar">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formConsulta" name="formConsulta">
            {{ csrf_field() }}
            <input type="hidden" name="ticket" id="ticket" value="">
            <input type="hidden" name="agendamento_id" id="agendamento_id" value="">
            <input type="hidden" name="clinica_id" id="clinica_id" value="">
            <input type="hidden" name="profissional_id" id="profissional_id" value="">
            <input type="hidden" name="especialidade_id" id="especialidade_id" value="">
            <input type="hidden" name="tp_prestador" id="tp_prestador" value="">
            <input type="hidden" name="data" id="data" value="">

            <div class="row">
                <div class="col-6">
                    <label for="confPaciente">
                        Paciente:
                        <div id="confPaciente"></div>
                    </label>
                </div>
                <div class="col-6">
                    <label for="confClinica">Clínica:
                        <div id="confClinica"></div>
                    </label>
                </div>
            
                <div class="col-6">
                    <label for="confProfissional">Profissional:
                        <div id="confProfissional"></div>
                    </label>
                </div>
                <div class="col-6">
                    <label for="confTicket">Ticket:
                        <div id="confTicket"></div>
                    </label>
                </div>
                
                <div class="col-12">
                    <label for="confDtHora">
                        Especialidade:
                        <div id="confEspecialidade"></div>
                    </label>
                </div>

                <div class="col-12">
                    <label for="confAtendimento">
                        <span class="spanConsulta">Consulta/Exame:</span>
                        <div id="confAtendimento"></div>
                    </label>
                </div>
            
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

                <div class="col-4">
                    <label for="confFilial">
                        Filial:
                        <div id="confFilial"></div>
                    </label>
                </div>
            </div>
            
            <div style="height:10px;"></div>

            <div class="row fill">
                <div class="col-4">
                    <label>Agendar para:</label>
                    <input type="text" class="form-control mascaraData input-datepicker" placeholder="dd/mm/yyyy" id="datepicker-agenda">
                </div>
                <div class="col-4">
                    <label>Hora:</label>
                    <select class="form-control" id="time" name="time">
                        <option value=""></option>
                    </select>
                </div>

                <div class="col-4">
                    <label for="filial_id">Filial</label>
                    <select id="filial_id" class="form-control select2" name="filial_id"></select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dialog-update">Alterar os dados do agendamento</button>
        <button type="button" class="btn btn-primary">Agendar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>