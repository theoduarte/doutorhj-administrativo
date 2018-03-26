@extends('layouts.master')

@section('title', 'Doutor HJ: Agenda')

@section('container')

<style>
    .ui-autocomplete {
        max-height : 200px;
        overflow-y : auto;
        overflow-x : hidden;
    }
    
    * html .ui-autocomplete {
        height     : 200px;
    }

    .ui-dialog .ui-state-error {
        padding: .3em; 
    }
</style>

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

        function addUser() {
        	window.alert("OK!");
        
        	return true;
        }
 
        dialog = $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 600,
            modal: true,
            buttons: {
                "Create an account": addUser,
                Cancel: function() {
                	dialog.dialog( "close" );
                }
            },
            close: function() {
            	dialog.dialog( "close" ); 
            }
        });
	
        $( "#remarcar-consulta" ).button().on( "click", function() {
        	$('#divPaciente') .html("<b>"+$(this).attr('nm-paciente')+"</b>");
        	$('#divDtHora')   .html("<b>"+$(this).attr('data-hora')+"</b>");
        	$('#divPrestador').html("<b>"+$(this).attr('prestador')+"</b>");
            
          	dialog.dialog( "open" );
        });
   });
</script>


<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Agenda</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Agenda</h4>
				<p class="text-muted m-b-30 font-13"></p>
				
				<div class="row">
					<div class="col-12">
                    	<form class="form-edit-add" role="form" action="{{ route('agenda.index') }}" method="get" enctype="multipart/form-data">
                    		{{ csrf_field() }}
        					
                			<div class="row">
                				<div class="col-4">
            				        <label for="localAtendimento">Prestador:<span class="text-danger">*</span></label>
    								<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="">
    								<input type="hidden" id="clinica_id" name="clinica_id" value="">
                                </div>
								<div class="form-group">
									<div style="height: 20px;"></div>
									<label class="custom-checkbox" style="cursor: pointer;width:180px;">
                    					<input type="checkbox" id="ckConsultasConfirmadas" name="ckConsultasConfirmadas" 
                    						value="consultas_confirmadas" @if(old('ckConsultasConfirmadas')=='consultas_confirmadas') checked @endif> Consultas Confirmadas 
                                    </label>
                    				<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasConfirmar" name="ckConsultasConfirmar" 
                    						value="consultas_confirmar" @if(old('ckConsultasConfirmar')=='consultas_confirmar') checked @endif> Consultas a Confirmar 
                                    </label>
                                </div>
                				
                                <div class="form-group">
                                	<div style="height: 20px;"></div>
                                	<label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasConsumadas" name="ckConsultasConsumadas" 
                    						value="consultas_consumadas" @if(old('ckConsultasConsumadas')=='consultas_consumadas') checked @endif> Consultas Consumadas 
                                    </label>
                    				<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasCanceladas" name="ckConsultasCanceladas" 
                    						value="consultas_canceladas" @if(old('ckConsultasCanceladas')=='consultas_canceladas') checked @endif> Consultas Canceladas 
                                    </label>
                                </div>
            				</div>
            				<div class="row">
								<div class="col-4">
            				        <label for="localAtendimento">Paciente:</label>
    								<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="">
    								<input type="hidden" id="clinica_id" name="clinica_id" value="">
                                </div>            					
    							
                				<div style="width: 210px !important;">
            				        <label for="data">Data:<span class="text-danger">*</span></label>
        							<input type="text" class="form-control input-daterange-timepicker" id="data" name="data" value="">                
                                </div>

                				<div class="col-1 col-lg-3">
            				        <div style="height: 30px;"></div>
                					<button type="submit" class="btn btn-primary" id="submit">Pesquisar</button>
                                </div>
            				</div>
            			</form>
					</div>
    				
    				<div style="height: 180px !important;"></div>
				</div>
            	<div class="row">
            		<div class="col-12">
    					<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
        					<tr>
        						<th>Ticket</th>
        						<th>Prestador</th>
        						<th>@sortablelink('nm_primario', 'Paciente')</th>
        						<th>@sortablelink('dt_consulta_primaria', 'Data / Hora')</th>
        						<th>Situação</th>
        						<th>Ações</th>
        					</tr>
                            @foreach($agenda as $obAgenda)
                            <tr>
                            	<td>C034938</td>
                            	<td>{{$obAgenda->clinica->nm_razao_social}}</td>
                            	<td>{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}</td>
                            	<td>{{$obAgenda->dt_consulta_primaria}}</td>
                            	<td>Confirmado</td>
                            	<td>
                            		<a id-paciente    = "{{$obAgenda->paciente->id}}" 
                            		   id-agendamento = "{{$obAgenda->id}}" 	
                            		   nm-paciente    = "{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}" 
                            		   data-hora	  = "{{$obAgenda->dt_consulta_primaria}}"
                            		   prestador	  = "{{$obAgenda->clinica->nm_razao_social}}" 
                            		   
                            		   class		  = "btn btn-icon waves-effect btn-primary btn-sm m-b-5" 
                            		   title		  = "Remarcar" id ="remarcar-consulta"><i class="mdi mdi-eye"></i></a>
                            	</td>
                            </tr>
                            @endforeach
    					</table>
                        <tfoot>
                        	<div class="cvx-pagination">
                        		<span class="text-primary">
                        			{{ sprintf("%02d", $agenda->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $agenda->count()) }} Registro(s) exibido(s)
                        		</span>
                        		{!! $agenda->links() !!}
                        	</div>
                        </tfoot>
            		</div>
            	</div>
           	</div>
       </div>
	</div>
</div>

<div id="dialog-form" title="Remarcar Consulta">
    <form id="formRemarcaConsulta" name="formRemarcaConsulta">
    	<div class="row">
            <div class="col-10">
                <label for="divPrestador">Prestador:
                    <input type="hidden" id="idPaciente" name="idPaciente" value="">
                    <div id="divPrestador"></div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-7">
    			<label for="divPaciente">Paciente:<div id="divPaciente"></div></label>
            </div>
            <div class="col-4">
    			<label for="divDtHora">Consulta:<div id="divDtHora"></div></label>
            </div>
        </div>
		<br>
		<br>
		<div class="row">
        	<div class="col-3">    
                <label>Remarcar para:</label>
				<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
            </div>
        	<div class="col-3">    
                <label>Hora:</label>
				<input class="form-control" type="time" name="time">
            </div>
        </div>
    </form>
</div>
 
@endsection