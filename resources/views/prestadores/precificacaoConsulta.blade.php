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
				  ArConsulta = ui.item.value.split(' | ')
            	  
           	      $('input[name="consulta_id"]').val(ui.item.id);
           	      $('input[name="cd_consulta"]').val(ArConsulta[1]);
           	      $('input[name="descricao"]').val(ArConsulta[2]);
        	  }
        });
    });
	
    function addLinhaConsulta() {
		if( $('#consulta_id').val().length == 0 ) return false;
		if( $('#ds_consulta').val().length == 0 ) return false;
		if( $('#vl_consulta').val().length == 0 ) return false;
        
		var table = document.getElementById("tblPrecosConsultas");
        var linha = table.insertRow(1);
        var cell1 = linha.insertCell(0);
        var cell2 = linha.insertCell(1);
        var cell3 = linha.insertCell(2);
        var cell4 = linha.insertCell(3);
        var cell5 = linha.insertCell(4);
        
        cell1.innerHTML = $('#consulta_id').val() + '<input type="hidden" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#consulta_id').val() + '">';
        cell2.innerHTML = $('#cd_consulta').val() + '<input type="hidden" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#cd_consulta').val() + '">';
        cell3.innerHTML = $('#descricao').val() + '<input type="hidden" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#descricao').val() + '">';
        cell4.innerHTML = '<input type="text" class="form-control mascaraMonetaria" name="precosConsultas[' + $('#consulta_id').val() + '][]" value="' + $('#vl_consulta').val() + '">';
        cell5.innerHTML = '<button type="button" class="btn ti-trash" onclick="delLinhaConsulta(this)"> Remover</button>';

        $(".mascaraMonetaria").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

        $('#vl_consulta').val(null);
        $('#consulta_id').val(null);
        $('#ds_consulta').val(null);
        $('#cd_consulta').val(null);
    }
	
    function delLinhaConsulta(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("tblPrecosConsultas").deleteRow(i);
    }
</script>

<div class="form-group">
	<div class="row">
		<form name="formPrecificacaoConsultas">
            <div class="col-6 ui-widget">
                <label for="nm_razao_social" class="col-4 control-label">Consulta<span class="text-danger">*</span></label>
                <input id="ds_consulta" type="text" class="form-control" name="ds_consulta" value="{{ old('ds_consulta') }}" autofocus maxlength="100">
           		<input type="hidden" name="consulta_id" id="consulta_id" value="">
           		<input type="hidden" name="cd_consulta" id="cd_consulta" value="">
           		<input type="hidden" name="descricao" id="descricao" value="">
            </div>
            <div class="col-2">
                <label for="vl_consulta" class="col-6 control-label">Preço<span class="text-danger">*</span></label>
                <input id="vl_consulta" type="text" class="form-control mascaraMonetaria" name="vl_consulta" value="{{ old('vl_consulta') }}"  maxlength="15">
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
    			<col width="12">
    			<col width="80">
    			<col width="380">
    			<col width="100">
    			<col width="10">
        		<thead>
        			<tr>
    					<th>Id</th>
    					<th>Código</th>
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
        					<th>{{$arConsulta[2]}}<input type="hidden" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[2]}}"></th>
        					<th><input type="text" class="form-control mascaraMonetaria" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[3]}}"></th>
        					<th><button type="button" class="btn ti-trash" onclick="delLinhaConsulta(this)"> Remover</button></th>
        				</tr>
        				@endforeach
    				@else
    					@if( $precoconsultas != null)
            				@foreach( $precoconsultas as $consulta )
                				<tr>
                					<th>{{$consulta->consulta->id}}		     <input type="hidden" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->consulta->id}}"></th>
                					<th>{{$consulta->consulta->cd_consulta}} <input type="hidden" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->cd_consulta}}"></th>
                					<th>{{$consulta->consulta->ds_consulta}} <input type="hidden" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->ds_preco}}"></th>
                					<th><input type="text" class="form-control mascaraMonetaria" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->vl_atendimento}}"></th>
                					<th><button type="button" class="btn ti-trash" onclick="delLinhaConsulta(this)"> Remover</button></th>
                				</tr>
            				@endforeach    			
        				@endif
        			@endif
    			</tbody>
            </table>
        </div>
	</div>
</div>
