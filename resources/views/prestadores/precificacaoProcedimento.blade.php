<script>
    $(function(){
        $( "#ds_procedimento" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	          url: "/procedimentos/consulta/"+$('#ds_procedimento').val(),
        	          dataType: "json",
        	          success: function( data ) {
        	            response( data );
        	          }
        	      });
        	  },
        	  minLength: 5,
        	  select: function(event, ui) {
           	      $('input[name="procedimento_id"]').val(ui.item.id);
        	  }
        });
    });
	
    function addLinhaProcedimento() {
		if( $('#procedimento_id').val().length == 0 ) return false;
		if( $('#ds_procedimento').val().length == 0 ) return false;
		if( $('#vl_procedimento').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosProcedimentos");
        var linha = table.insertRow(-1);
        var cell1 = linha.insertCell(0);
        var cell2 = linha.insertCell(1);
        var cell3 = linha.insertCell(2);
        var cell4 = linha.insertCell(3);
        
        cell1.innerHTML = $('#procedimento_id').val() + '<input type="hidden" name="precosProcedimentos[' + $('#procedimento_id').val() + '][]" value="' + $('#procedimento_id').val() + '">';
        cell2.innerHTML = $('#ds_procedimento').val() + '<input type="hidden" name="precosProcedimentos[' + $('#procedimento_id').val() + '][]" value="' + $('#ds_procedimento').val() + '">';
        cell3.innerHTML = $('#vl_procedimento').val() + '<input type="hidden" name="precosProcedimentos[' + $('#procedimento_id').val() + '][]" value="' + $('#vl_procedimento').val() + '">';
        cell4.innerHTML = '<button type="button" class="btn ti-trash" onclick="delLinhaProcedimento(this)"> Remover</button>';

        $('#vl_procedimento').val(null);
        $('#procedimento_id').val(null);
        $('#ds_procedimento').val(null);
    }
	
    function delLinhaProcedimento(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tblPrecosProcedimentos").deleteRow(i);
    }
</script>

<div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
	<div class="row">
        <div class="col-4">
        	<label for="ds_procedimento" class="col-6 control-label">Procedimento<span class="text-danger">*</span></label>
            <input id="ds_procedimento" type="text" class="form-control" name="ds_procedimento" value="{{ old('ds_procedimento') }}" autofocus maxlength="100">
       		<input type="hidden" name="procedimento_id" id="procedimento_id" value="">
        </div>
        <div class="col-2">
            <label for="vl_procedimento" class="col-2 control-label">Preço<span class="text-danger">*</span></label>
            <input id="vl_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_procedimento" value="{{ old('vl_procedimento') }}"  maxlength="10">
        </div>
        <div class="col-3">
        	<br>
            <button type="button" class="btn btn-primary" onclick="addLinhaProcedimento();">Adicionar</button>
        </div>
	</div>
	<br>
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecosProcedimentos" name="tblPrecosProcedimentos" class="table table-striped table-bordered table-doutorhj">
        		<tbody>
        			<tr>
    					<th>Id</th>
    					<th>Procedimento</th>
    					<th>Valor</th>
    					<th>Ação</th>
    				</tr>
    				@if( old('precosProcedimentos') != null )
        				@foreach( old('precosProcedimentos') as $id => $arProcedimento )
        				<tr>
        					<th>{{$id}}<input type="hidden" name="precosProcedimentos[{{$id}}][]" value="{{$id}}"></th>
        					<th>{{$arProcedimento[1]}}<input type="hidden" name="precosProcedimentos[{{$id}}][]" value="{{$arProcedimento[1]}}"></th>
        					<th>{{$arProcedimento[2]}}<input type="hidden" name="precosProcedimentos[{{$id}}][]" value="{{$arProcedimento[2]}}"></th>
        					<th><button type="button" class="btn ti-trash" onclick="delLinhaProcedimento(this)"> Remover</button></th>
        				</tr>
        				@endforeach
    				@endif
    			</tbody>
            </table>
        </div>
	</div>
</div>
