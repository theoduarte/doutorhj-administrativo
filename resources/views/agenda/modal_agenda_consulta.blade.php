<script>
    $(function(){
        $("#profissional").autocomplete({
            source: function( request, response ) {
            	$('#time').html(null);
            	$('#datepicker-agenda').val(null);
            	
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


        
        $('#profissional_id').change(function(){
        	$('#datepicker-agenda').val(null);
        	$('#time').html(null);
        });


        
      	$('.clinica_id').change(function(){
        	$('#profissional_id').html(null);
        	$('#datepicker-agenda').val(null);
        	$('#time').html(null);
			
            
            $.ajax({
                url : "/profissionais/" + $(this).val(),
                beforeSend : function(){

                },
                success: function(response){
                    $('.profissional_id').html(null);

                    response.forEach(function(x){
                        $('.profissional_id').append('<option value="'+x.id+'">' + x.nm_primario + ' ' + x.nm_secundario +'</option>');
                    });
                }
            }).done(function(msg){

            	$('.profissional_id').val($('.profissional').val());

            	
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
        });


        function acaoAgendar(){
            clinica_id      = $('.clinica_id').val();
            profissional_id = $('.profissional_id').val();
            paciente_id     = $('.paciente').val();
            data 		    = ($('#datepicker-agenda').val().length == 0) ? null : $('#datepicker-agenda').val();
            hora 			= ($('select[name="time"]').val() == null) ? null : $('select[name="time"]').val();
            ticket 			= $('.ticket').val(); 
	            
            if ( clinica_id != null && profissional_id != null && ticket != null && paciente_id != '' ){

	            if( $('#ui-id-2').text() == 'Agendar Consulta' ){
                    
                    link = "/agenda/agendar/" + ticket + '/' + clinica_id + '/' + profissional_id + '/' + paciente_id + '/' + data + '/' + hora;
                    
                } else if( $('#ui-id-2').text() == 'Remarcar Consulta' ){
					
                	if( hora == null || data == null ){
                        swal({
                                    title: 'Preencha uma data e hora para remarcar a consulta!',
                                    text: '',
                                    type: 'error',
                                    confirmButtonClass: 'btn btn-confirm mt-2'
                             });

                        return false;
                	}
                    
                    link = "/agenda/agendar/" + ticket + '/' + clinica_id + '/' + profissional_id + '/' + paciente_id + '/' + data + '/' + hora + '/S';
                }

                $.ajax({
                    url : link,
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

                dialogAgendamento.dialog( "close" );
            }

            return true;
        }


        
        dialogAgendamento = $( "#dialog-agendar" ).dialog({
            autoOpen : false,
            height	 : 530,
            width	 : 698,
            modal	 : true,
            buttons	 : {
                "Agendar" : acaoAgendar,
                Fechar	  : function() { dialogAgendamento.dialog( "close" ); }
            },
            close: function() { dialogAgendamento.dialog( "close" ); }
        });


        
        $( ".agendamento" ).button().on( "click", function() {
        	$('#profissional_id').html(null);
        	$('#datepicker-agenda').val(null);
        	$('#time').html(null);

        	
            $('.ticket').val($(this).attr('ticket'));
            $('#divPaciente') .html("<b>" + $(this).attr('nm-paciente') + "</b>");
            $('#divDtHora')   .html("<b>" + $(this).attr('data-hora')   + "</b>");
            $('#divPrestador').html("<b>" + $(this).attr('prestador')   + "</b>");
            $('#divEspecialidade').html("<b>" + $(this).attr('especialidade')   + "</b>");
            $('#divValorConsulta').html("<b>" + $(this).attr('valor-consulta')   + "</b>");
            $('.paciente').val($(this).attr('id-paciente'));
            $('#ui-id-1, #ui-id-2').text($(this).attr('title'));
            $('.profissional').val($(this).attr('id-profissional'));
            
            dialogAgendamento.dialog( "open" );
			
            $('.clinica_id').val($(this).attr('id-clinica'));
            $('.clinica_id').change();
        });



		/**
		* Verifica disponibilidade de atendimento em função de clinica, 
		* profissional, data e hora.
		*/
        $('#datepicker-agenda').change(function(){
			var clinica_id      = $('select[name=clinica_id]').val();
			var profissional_id = $('select[name=profissional_id]').val();
            var data 		    = $(this).val().split('/');
            var ct_data_hora    = ($('#divDtHora b').html()).split(' ');
            var ct_hora         = ct_data_hora[1];
			
            
            $.ajax({
                url 	 : '/horarios/' + clinica_id + '/' + profissional_id + '/' + data[2] + '-' + data[1] + '-' + data[0],
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
<div id="dialog-agendar" title="">
	<form id="formConsulta" name="formConsulta">
		<div class="row">
			<div class="col-7">
				<label for="divPaciente">
					Paciente:
					<div id="divPaciente"></div>
				</label>
				<input type="hidden" name="paciente" class="paciente" value="">
				<input type="hidden" name="profissional" class="profissional" value="">
				<input type="hidden" name="ticket" class="ticket" value="">
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<label for="profissional_id">Clínica:</label>
				<select class="form-control clinica_id" id="clinica_id" name="clinica_id" readonly>
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
				<label for="divDtHora">
					Especialidade:
					<div id="divEspecialidade"></div>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<label for="divDtHora">
					Consulta:
					<div id="divDtHora"></div>
				</label>
			</div>
			<div class="col-3">
				<label for="divValorConsulta">
					Valor Pago (R$):
					<div id="divValorConsulta"></div>
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<label>Agendar para:</label>
				<input type="text" class="form-control mascaraData" placeholder="dd/mm/yyyy" id="datepicker-agenda">
			</div>
			<div class="col-4">
				<label>Hora:</label>
				<select class="form-control" id="time" name="time">
					<option value=""></option>
				</select>
			</div>
		</div>
	</form>
</div>