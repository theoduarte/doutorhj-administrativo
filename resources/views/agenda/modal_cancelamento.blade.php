<!-- Modal Cancelamento -->
<div id="dialog-form" title="Agendar Consulta">
    <form id="formCancelaConsulta" name="formCancelaConsulta">
    	<div class="row">
            <div class="col-10">
                <label for="divPrestador">Prestador:
                    <input type="hidden" id="idClinica" name="idClinica" value="">
                    <div id="divPrestador"></div>
                </label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-7">
    			<label for="divPaciente">Paciente:<div id="divPaciente"></div></label>
            </div>
        </div>
    	
    	<div class="row">
            <div class="col-12">
                <label for="profissional_id">Profissional:</label>
            	<select class="form-control" id="profissional_id" name="profissional_id">
            		<option value=""></option>
            	</select>
            </div>
        </div>
        
        <div style="height:10px;"></div>
        
		<div class="row">
		    <div class="col-4">
    			<label for="divDtHora">Possibilidades:<div id="divDtHora"></div></label>
            </div>
		</div>
		
		<div class="row">
        	<div class="col-3">    
                <label>Agendar para:</label>
				<input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose">
            </div>
        	<div class="col-3">
                <label>Hora:</label>
				<input class="form-control" type="time" name="time">
            </div>
        </div>
    </form>
</div>