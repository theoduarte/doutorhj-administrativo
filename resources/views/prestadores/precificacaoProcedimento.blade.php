<script>
	$(function(){
        $( "#ds_procedimento" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	          url      : "/procedimentos/consulta/" + $('#ds_procedimento').val(),
        	          dataType : "json",
        	          success  : function( data ) {
        	            response( data );
        	          }
        	      });
        	  },
        	  minLength : 5,
        	  select: function(event, ui) {
        		  ArProcedimento = ui.item.value.split(' | ');
        		  
           	      $('input[name="procedimento_id"]').val(ui.item.id);
           	      $('input[name="cd_procedimento"]').val(ArProcedimento[1]);
           	      $('input[name="descricao"]').val(ArProcedimento[2]);
        	  }
        });
    });
	
    function addLinhaProcedimento() {
		if( $('#procedimento_id').val().length == 0 ) return false;
		if( $('#ds_procedimento').val().length == 0 ) return false;
		if( $('#vl_procedimento').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosProcedimentos");
        var linha = table.insertRow(1);
        var cell1 = linha.insertCell(0);
        var cell2 = linha.insertCell(1);
        var cell3 = linha.insertCell(2);
        var cell4 = linha.insertCell(3);
        var cell5 = linha.insertCell(4);
        
        cell1.innerHTML = $('#procedimento_id').val() + '<input type="hidden" name="precosProcedimentos[' + $('#procedimento_id').val()       + '][]" value="' + $('#procedimento_id').val() + '">';
        cell2.innerHTML = $('#cd_procedimento').val() + '<input type="hidden" name="precosProcedimentos[' + $('#procedimento_id').val()       + '][]" value="' + $('#cd_procedimento').val() + '">';
        cell3.innerHTML = $('#descricao').val() 	  + '<input type="hidden" name="precosProcedimentos[' + $('#procedimento_id').val()       + '][]" value="' + $('#descricao').val() 	     + '">';
        cell4.innerHTML = '<input type="text" class="form-control mascaraMonetaria" name="precosProcedimentos[' + $('#procedimento_id').val() + '][]" value="' + $('#vl_procedimento').val() + '">';
        cell5.innerHTML = '<button type="button" class="btn ti-trash" onclick="delLinhaProcedimento(this)"> Remover</button>';

    	$(".mascaraMonetaria").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
    	
        $('#vl_procedimento').val(null);
        $('#procedimento_id').val(null);
        $('#ds_procedimento').val(null);
        $('#cd_procedimento').val(null);
    }
	
    function delLinhaProcedimento(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tblPrecosProcedimentos").deleteRow(i);
    }
</script>

<div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
	<div class="row">
        <div class="col-6">
        	<label for="ds_procedimento" class="col-6 control-label">Procedimento<span class="text-danger">*</span></label>
            <input id="ds_procedimento" type="text" class="form-control" name="ds_procedimento" value="{{ old('ds_procedimento') }}" autofocus maxlength="100">
       		<input type="hidden" name="cd_procedimento" id="cd_procedimento" value="">
       		<input type="hidden" name="procedimento_id" id="procedimento_id" value="">
       		<input type="hidden" name="descricao" id="descricao" value="">
        </div>
        <div class="col-2">
            <label for="vl_procedimento" class="col-2 control-label">Preço<span class="text-danger">*</span></label>
            <input id="vl_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_procedimento" value="{{ old('vl_procedimento') }}"  maxlength="15">
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
    			<col width="12">
    			<col width="80">
    			<col width="380">
    			<col width="100">
    			<col width="10">
        		<thead>
        			<tr>
    					<th>Id</th>
    					<th>Código</th>
    					<th>Procedimento</th>
    					<th>Valor</th>
    					<th>Ação</th>
    				</tr>
    			</thead>
    			<tbody>
        			@if( old('precosProcedimentos') != null )
        				@foreach( old('precosProcedimentos') as $id => $arProcedimento )
        				<tr>
        					<th>{{$id}}				  <input type="hidden" name="precosProcedimentos[{{$id}}][]" value="{{$id}}"></th>
        					<th>{{$arProcedimento[1]}}<input type="hidden" name="precosProcedimentos[{{$id}}][]" value="{{$arProcedimento[1]}}"></th>
        					<th>{{$arProcedimento[2]}}<input type="hidden" name="precosProcedimentos[{{$id}}][]" value="{{$arProcedimento[2]}}"></th>
        					<th><input type="text" class="form-control mascaraMonetaria" name="precosProcedimentos[{{$id}}][]" value="{{$arProcedimento[3]}}"></th>
        					<th><button type="button" class="btn ti-trash" onclick="delLinhaProcedimento(this)"> Remover</button></th>
        				</tr>
        				@endforeach
    				@else
        				@if( $precoprocedimentos != null)
            				@foreach( $precoprocedimentos as $procedimento )
                				<tr>
                					<th>{{$procedimento->procedimento->id}}       		 <input type="hidden" name="precosProcedimentos[{{$procedimento->procedimento->id}}][]" value="{{$procedimento->procedimento->id}}"></th>
                					<th>{{$procedimento->procedimento->cd_procedimento}} <input type="hidden" name="precosProcedimentos[{{$procedimento->procedimento->id}}][]" value="{{$procedimento->cd_procedimento}}"></th>
                					<th>{{$procedimento->procedimento->ds_procedimento}} <input type="hidden" name="precosProcedimentos[{{$procedimento->procedimento->id}}][]" value="{{$procedimento->ds_preco}}"></th>
                					<th><input type="text" class="form-control mascaraMonetaria" name="precosProcedimentos[{{$procedimento->procedimento->id}}][]" value="{{$procedimento->vl_atendimento}}"></th>
                					<th><button type="button" class="btn ti-trash" onclick="delLinhaProcedimento(this)"> Remover</button></th>
                				</tr>
            				@endforeach  
        				@endif
    				@endif
				</tbody> 
        	</table>
        </div>
	</div>
</div>
