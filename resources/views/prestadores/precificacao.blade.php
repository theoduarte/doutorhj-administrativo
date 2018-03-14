<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
    * html .ui-autocomplete {
        height: 200px;
    }
</style>

<script>
    $(function(){
        $( "#ds_consulta" ).autocomplete({
        	  source: function( request, response ) {
        	        $.ajax( {
        	          url: "/procedimentos/consulta/"+$('#ds_consulta').val(),
        	          dataType: "json",
        	          success: function( data ) {
        	            response( data );
        	          }
        	        } );
        	      },
        	  minLength: 5,
        	  select: function(event, ui) {
           	      $('input[name="procedimento_id"]').val(ui.item.id);
        	  }
        });
    });
	
    function addLinha() {
		if( $('#procedimento_id').val().length == 0 ) return false;
		if( $('#ds_consulta').val().length == 0 ) return false;
		if( $('#vl_atendimento').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecos");
        var linha = table.insertRow(-1);
        var cell1 = linha.insertCell(0);
        var cell2 = linha.insertCell(1);
        var cell3 = linha.insertCell(2);
        var cell4 = linha.insertCell(3);
        
        cell1.innerHTML = $('#procedimento_id').val()+'<input type="hidden" name="precosProcedimentos['+$('#procedimento_id').val()+'][]" value="'+$('#procedimento_id').val()+'">';
        cell2.innerHTML = $('#ds_consulta').val()    +'<input type="hidden" name="precosProcedimentos['+$('#procedimento_id').val()+'][]" value="'+$('#ds_consulta').val()+'">';
        cell3.innerHTML = $('#vl_atendimento').val() +'<input type="hidden" name="precosProcedimentos['+$('#procedimento_id').val()+'][]" value="'+$('#vl_atendimento').val()+'">';
        cell4.innerHTML = '<button type="button" class="btn ti-trash" onclick="delLinha(this)"> Remover</button>';

        $('#vl_atendimento').val(null);
        $('#procedimento_id').val(null);
        $('#ds_consulta').val(null);
    }
	
    function delLinha(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tblPrecos").deleteRow(i);
    }
</script>

<div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
	<div class="row">
		<form name="formPrecificacaoConsultas">
            <label for="nm_razao_social" class="col-12 control-label">Procedimento<span class="text-danger">*</span></label>
            <div class="col-6 ui-widget">
                <input id="ds_consulta" type="text" class="form-control" name="ds_consulta" value="{{ old('ds_consulta') }}" autofocus maxlength="100">
           		<input type="hidden" name="procedimento_id" id="procedimento_id" value="">
            </div>
            <label for="vl_atendimento" class="col-12 control-label">Preço<span class="text-danger">*</span></label>
            <div class="col-2">
                <input id="vl_atendimento" type="text" class="form-control mascaraMonetaria" name="vl_atendimento" value="{{ old('vl_atendimento') }}"  maxlength="10">
            </div>
            <div class="col-3 col-offset-3">
                <button type="button" class="btn btn-primary" onclick="javascript:addLinha();">
                    Adicionar
                </button>
            </div>
        </form>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecos" name="tblPrecos" class="table table-striped table-bordered table-doutorhj">
        		<tbody>
        			<tr>
    					<th>ID</th>
    					<th>PROCEDIMENTO</th>
    					<th>VALOR</th>
    					<th>AÇÃO</th>
    				</tr>
    			</tbody>
            </table>
        </div>
	</div>
</div>
