<script>
    $(function(){
        $( "#ds_consulta" ).autocomplete({
        	  source: function( request, response ) {
        	        $.ajax( {
        	          url: "/consultas/consulta/"+$('#ds_consulta').val(),
        	          dataType: "json",
        	          success: function( data ) {
        	            response( data );
        	          }
        	        } );
        	      },
        	  minLength: 5,
        	  select: function(event, ui) {
           	      $('input[name="consulta_id"]').val(ui.item.id);
        	  }
        });
    });
	
    function addLinhaConsulta() {
		if( $('#consulta_id').val().length == 0 ) return false;
		if( $('#ds_consulta').val().length == 0 ) return false;
		if( $('#vl_consulta').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosConsultas");
        var linha = table.insertRow(-1);
        var cell1 = linha.insertCell(0);
        var cell2 = linha.insertCell(1);
        var cell3 = linha.insertCell(2);
        var cell4 = linha.insertCell(3);
        
        cell1.innerHTML = $('#consulta_id').val() + '<input type="hidden" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#consulta_id').val() + '">';
        cell2.innerHTML = $('#ds_consulta').val() + '<input type="hidden" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#ds_consulta').val() + '">';
        cell3.innerHTML = '<input type="text" class="form-control mascaraMonetaria" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#vl_consulta').val() + '">';
        cell4.innerHTML = '<button type="button" class="btn ti-trash" onclick="delLinhaConsulta(this)"> Remover</button>';

        $(".mascaraMonetaria").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

    	
        $('#vl_consulta').val(null);
        $('#consulta_id').val(null);
        $('#ds_consulta').val(null);
    }
	
    function delLinhaConsulta(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tblPrecosConsultas").deleteRow(i);
    }
</script>

<div class="form-group">
	<div class="row">
		<form name="formPrecificacaoConsultas">
            <div class="col-4 ui-widget">
                <label for="nm_razao_social" class="col-4 control-label">Consulta<span class="text-danger">*</span></label>
                <input id="ds_consulta" type="text" class="form-control" name="ds_consulta" value="{{ old('ds_consulta') }}" autofocus maxlength="100">
           		<input type="hidden" name="consulta_id" id="consulta_id" value="">
            </div>
            <div class="col-2">
                <label for="vl_consulta" class="col-6 control-label">Preço<span class="text-danger">*</span></label>
                <input id="vl_consulta" type="text" class="form-control mascaraMonetaria" name="vl_consulta" value="{{ old('vl_consulta') }}"  maxlength="10">
            </div>
            <div class="col-3 col-offset-3">
            	<br>
                <button type="button" class="btn btn-primary" onclick="addLinhaConsulta();">Adicionar</button>
            </div>
        </form>
	</div>
	
	<br>
	
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecosConsultas" name="tblPrecosConsultas" class="table table-striped table-bordered table-doutorhj">
        		<thead>
        			<tr>
    					<th>Id</th>
    					<th>Consulta</th>
    					<th>Valor</th>
    					<th>Ação</th>
    				</tr>
        		</thead>
        		<tbody>
    				@if( old('precosConsultas') != null )
        				@foreach( old('precosConsultas') as $id => $arConsulta )
        				<tr>
        					<th>{{$id}}<input type="hidden" name="precosConsultas[{{$id}}][]" value="{{$id}}"></th>
        					<th>{{$arConsulta[1]}}<input type="hidden" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[1]}}"></th>
        					<th><input type="text" class="form-control mascaraMonetaria" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[2]}}"></th>
        					<th><button type="button" class="btn ti-trash" onclick="delLinhaConsulta(this)"> Remover</button></th>
        				</tr>
        				@endforeach
    				@endif
    			</tbody>
            </table>
        </div>
	</div>
</div>
