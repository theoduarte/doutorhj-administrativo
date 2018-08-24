<script>
    $(document).ready(function(){
        $(".select2").select2({
            language: 'pt-BR',
            dropdownParent: $('#dialog-update')
        });
    
        $('#tipo_atendimento').change(function(){
            var tipoAtendimento = $(this).val();

            $('#dialog-update #especialidade').empty();
            $('#dialog-update #clinica_id').empty();
            $('#dialog-update #profissional_id').empty();
            $('#dialog-update #filial_id').empty();
            
            if( !tipoAtendimento ) return false;

            if( $(this).val() == 'saude' || $(this).val() == 'odonto' || $(this).val() == 'exame' ){
                $('label[for="especialidade"]').text("Especialidade ou exame");
            }else if( $(this).val() == 'checkup' ){
                $('label[for="especialidade"]').text("Check-up");
                $('label[for="local"]').text("Tipo de Check-up");
            }
            
            jQuery.ajax({
                type: 'POST',
                url: '/consulta-especialidades',
                data: {
                    'tipo_atendimento': tipoAtendimento,
                    '_token'          : laravel_token
                },
                success: function (result) {
                    if( result != null) {
                        var json = JSON.parse(result.atendimento);

                        $('#especialidade').empty();

                        if( tipoAtendimento != 'checkup' ){

                            var option = '<option value="">Selecione</option>';
                            $('#especialidade').append($(option));
                            for(var i=0; i < json.length; i++) {
                                option = '<option value="'+json[i].id+'">'+json[i].descricao+'</option>';
                                $('#especialidade').append($(option));
                            }

                            if( !$('#especialidade').val() ) { return false; }
                        } else {
                            for(var i=0; i < json.length; i++) {
                                var option = '<option value="'+json[i].id+'">'+json[i].descricao+'</option>';
                                $('#especialidade').append($(option));
                            }

                            jQuery.ajax({
                                type: 'POST',
                                url: '/consulta-tipos-checkup',
                                data: {
                                    'tipo_atendimento': tipoAtendimento,
                                    '_token': laravel_token
                                },
                                success: function (result) {
                                    if( result != null) {
                                        var json = result;
                                        
                                        $('#local_atendimento').empty();
                                        var option = '<option value="">TODOS</option>';
                                        $('#local_atendimento').append($(option));
                                        
                                        for(var i=0; i < json.length; i++) {
                                            option = '<option value="'+json[i].tipo+'">'+json[i].tipo+'</option>';
                                            $('#local_atendimento').append($(option));
                                        }

                                        if(json.length > 0) {
                                            $('#local_atendimento option[value="'+json[0].tipo+'"]').prop("selected", true);
                                        }
                                    }
                                },
                                error: function (result) {
                                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                                }
                            });
                        }
                    }
                },
                error: function (result) {
                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                }
            });
        });
    
        $('#dialog-update #especialidade').change(function(){
            var tipoAtendimento = $('#tipo_atendimento').val();
            var especialidade = $(this).val();
            var action = '/get-active-clinicas-by-consulta';
            var ajaxData = {'especialidade_id': especialidade, '_token' : laravel_token};

            
            $('#dialog-update #clinica_id').empty();
            $('#dialog-update #profissional_id').empty();
            $('#dialog-update #filial_id').empty();

            if( !tipoAtendimento ) return false;
            if( !especialidade ) return false;
            
            if( tipoAtendimento == 'saude' ) {
                action = '/get-active-clinicas-by-consulta';
                ajaxData = {'consulta_id': especialidade, '_token' : laravel_token};
            }
            else if( tipoAtendimento == 'exame' || tipoAtendimento == 'odonto') {
                action = '/get-active-clinicas-by-procedimento';
                ajaxData = {'procedimento_id': especialidade, '_token' : laravel_token};
            }

            jQuery.ajax({
                type: 'GET',
                url: action,
                data: ajaxData,
                dataType: 'json',
                success: function (result) {
                    if( result != null) {
                        $('#dialog-update #clinica_id').empty();

                        if( tipoAtendimento != 'checkup' ){

                            var option = '<option value="">Selecione</option>';
                            $('#dialog-update #clinica_id').append( option );
                            for(var i=0; i < result.length; i++) {
                                option = '<option value="'+result[i].id+'">'+result[i].nm_fantasia+'</option>';
                                $('#dialog-update #clinica_id').append( option );
                            }

                            if( !$('#dialog-update #clinica_id').val()  ) { return false; }
                        }
                    }
                },
                error: function (result) {
                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                }
            });
        });

        $('#dialog-update #clinica_id').change(function(){
            var tipoAtendimento = $('#tipo_atendimento').val();
            var especialidade = $('#dialog-update #especialidade').val();
            var clinica = $(this).val();

            $('#dialog-update #profissional_id').empty();
            $('#dialog-update #filial_id').empty();

            if( !tipoAtendimento ) return false;
            if( !especialidade ) return false;
            if( !clinica ) return false;

            if( tipoAtendimento == 'saude' ) {
                var action = '/get-active-profissionals-by-clinica-consulta';
                var ajaxData = {'clinica_id': clinica, 'especialidade_id': especialidade, '_token' : laravel_token};

                jQuery.ajax({
                    type: 'GET',
                    url: action,
                    data: ajaxData,
                    dataType: 'json',
                    success: function (result) {
                        if( result != null) {
                            $('#dialog-update #profissional_id').empty();

                            if( tipoAtendimento != 'checkup' ){

                                var option = '<option value="">Selecione</option>';
                                $('#dialog-update #profissional_id').append( option );
                                for(var i=0; i < result.length; i++) {
                                    option = '<option value="'+result[i].id+'">'+result[i].nm_primario+' '+result[i].nm_secundario+'</option>';
                                    $('#dialog-update #profissional_id').append( option );
                                }

                                if( !$('#dialog-update #profissional_id').val()  ) { return false; }
                            }
                        }
                    },
                    error: function (result) {
                        $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                    }
                });
            }
            else if( tipoAtendimento == 'exame' || tipoAtendimento == 'odonto') {
                var ajaxData = {'clinica_id': clinica, 'especialidade_id': especialidade, '_token' : laravel_token};
                var action = '/get-active-filials-by-clinica-procedimento';

                jQuery.ajax({
                    type: 'GET',
                    url: action,
                    data: ajaxData,
                    dataType: 'json',
                    success: function (result) {
                        if( result != null) {
                            $('#dialog-update #filial_id').empty();

                            if( $('#tipo_atendimento').val() != 'checkup' ){
                                var option = '<option value="">Selecione</option>';
                                $('#dialog-update #filial_id').append( option );
                                for(var i=0; i < result.length; i++) {
                                    option = '<option value="'+result[i].id+'">'+ ( result[i].eh_matriz == 'S' ? 'Matriz - ' : 'Filial - ' ) + result[i].nm_nome_fantasia +  '</option>';
                                    $('#dialog-update #filial_id').append( option );
                                }

                                if( !$('#dialog-update #filial_id').val()  ) { return false; }
                            }
                        }
                    },
                    error: function (result) {
                        $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                    }
                });
            }
        });

        $('#dialog-update #profissional_id').change(function(){
            var tipoAtendimento = $('#tipo_atendimento').val();
            var especialidade = $('#dialog-update #especialidade').val();
            var clinica = $('#dialog-update #clinica_id').val();
            var profissional = $(this).val();
            
            if( !tipoAtendimento ) return false;
            if( !especialidade ) return false;

            $('#dialog-update #filial_id').empty();

            var action = '/get-active-filials-by-clinica-profissional-consulta';
            var ajaxData = {'clinica_id': clinica, 'profissional_id': profissional, 'especialidade_id': especialidade, '_token' : laravel_token};

            
            if( tipoAtendimento == 'saude' ) {
                action = '/get-active-filials-by-clinica-profissional-consulta';
                ajaxData = {'clinica_id': clinica, 'profissional_id': profissional, 'especialidade_id': especialidade, '_token' : laravel_token};
            }
            else if( tipoAtendimento == 'exame' || tipoAtendimento == 'odonto') {
                action = '/get-active-filials-by-clinica-procedimento';
                ajaxData = {'clinica_id': clinica, 'especialidade_id': especialidade, '_token' : laravel_token};
            }

            jQuery.ajax({
                type: 'GET',
                url: action,
                data: ajaxData,
                dataType: 'json',
                success: function (result) {
                    if( result != null) {
                        $('#dialog-update #filial_id').empty();

                        if( $('#tipo_atendimento').val() != 'checkup' ){
                            var option = '<option value="">Selecione</option>';
                            $('#dialog-update #filial_id').append( option );
                            for(var i=0; i < result.length; i++) {
                                option = '<option value="'+result[i].id+'">'+ ( result[i].eh_matriz == 'S' ? 'Matriz - ' : 'Filial - ' ) + result[i].nm_nome_fantasia +  '</option>';
                                $('#dialog-update #filial_id').append( option );
                            }

                            if( !$('#dialog-update #filial_id').val()  ) { return false; }
                        }
                    }
                },
                error: function (result) {
                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                }
            });
        });

        $( "#dialog-update .btn-primary" ).button().on( "click", function() {
            var tipoAtendimento = $('#dialog-update #tipo_atendimento').val();
            var especialidade = $('#dialog-update #especialidade').val();
            var clinica = $('#dialog-update #clinica_id').val();
            var profissional = $('#dialog-update #profissional_id').val();

            if( !tipoAtendimento ) return false;
            if( !especialidade ) return false;
            if( !clinica ) return false;
            if ( tipoAtendimento == 'saude' && !profissional ) return false;

            $.ajax({
                type: 'POST',
                url: '/create-new-agendamento-atendimento',
                data: $('#formUpdate').serialize()+'&_token='+laravel_token
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
                    $("#dialog-update .btn-secondary").trigger('click');
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
   
        $( "#dialog-agendar .btn-danger" ).button().on( "click", function() {
            $('#dialog-update #agendamento_id').val( $('#dialog-agendar #agendamento_id').val() );
            $('#dialog-update #paciente').val( $('#dialog-agendar #confPaciente').text() );
            $('#dialog-update #te_ticket').val( $('#dialog-agendar #ticket').val() );
            $('#dialog-update #valor').val( $('#confValorAtendimento').text() );

            $("#dialog-agendar .btn-secondary").trigger('click');
        });
    });
</script>


<div class="modal" role="modal" id="dialog-update">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUpdate" name="formUpdate">
        <input type="hidden" name="agendamento_id" id="agendamento_id" val="">
        <div class="row">
            <div class="form-group col-6">
                <label for="paciente">Paciente</label>
                <input type="text" class="form-control" id="paciente" readonly />
            </div>

            <div class="form-group col-3">
                <label for="te_ticket">Ticket</label>
                <input type="text" class="form-control" id="te_ticket" readonly />
            </div>

            <div class="form-group col-3">
                <label for="valor">Valor Original</label>
                <input type="text" class="form-control" id="valor" readonly />
            </div>

            <div class="form-group col-12">
                <label for="tipo">Tipo de atendimento</label>
                <select id="tipo_atendimento" class="form-control" name="tipo_atendimento">
                    <option value="" disabled selected hidden>Ex.: Consulta</option>
                    @foreach($tipoAtendimentos as $tipoAtendimento)
                        <option value="{{ $tipoAtendimento->tag_value }}">{{ $tipoAtendimento->ds_atendimento }}</option>
                    @endforeach
                    @if( $hasActiveCheckup )
                        <option value="checkup">Checkups</option>
                    @endif
                </select>
            </div>
            
            <div class="form-group col-12">
                <label for="especialidade">Especialidade ou exame</label>
                <select id="especialidade" class="form-control select2" name="especialidade"></select>
            </div>

            <div class="form-group col-12">
                <label for="clinica_id">Clínica</label>
                <select id="clinica_id" class="form-control select2" name="clinica_id"></select>
            </div>

            <div class="form-group col-12">
                <label for="profissional_id">Profissional</label>
                <select id="profissional_id" class="form-control select2" name="profissional_id"></select>
            </div>

            <div class="form-group col-12">
                <label for="filial_id">Filial</label>
                <select id="filial_id" class="form-control select2" name="filial_id"></select>
            </div>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>