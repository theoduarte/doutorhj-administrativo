$(document).ready(function () {
	
	/*$('#tipo_atendimento').change(function(){
		var tipo_atendimento = $(this).val();
		
		if(tipo_atendimento == '') { return false; }
		
		jQuery.ajax({
    		type: 'POST',
    	  	url: '/consulta-especialidades',
    	  	data: {
				'tipo_atendimento': $(this).val(),
				'_token': laravel_token
			},
			success: function (result) {

				if( result != null) {
					var json = JSON.parse(result.atendimento);
					
					$('#tipo_especialidade').empty();
					for(var i=0; i < json.length; i++) {
						var option = '<option value="'+json[i].id+'">'+json[i].descricao+'</option>';
						$('#tipo_especialidade').append($(option));
					}
					
				}
            },
            error: function (result) {
            	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
            }
    	});
		
	});*/
	
	$(".select2").select2({
		language: 'pt-BR'
	});
	
	/*$( "#local_atendimento" ).keyup(function() {
		
		var search_term = $(this).val();
		
		if(search_term.length < 3){ return false; }
		
		var tipo_atendimento = $('#tipo_atendimento').val();
		var procedimento_id = $('#tipo_especialidade').val();
		var tipo_especialidade = $('#tipo_atendimento').val() == 'saude' | $('#tipo_atendimento').val() == 'odonto' ? 'consulta' : 'procedimento';
		
		$( "#local_atendimento" ).autocomplete({
			source: function( request, response ) {
				$.ajax( {
					type: 'POST',
					url      : "/consulta-local-atendimento",
					dataType : "json",
					data: {
						'search_term': search_term,
						'tipo_atendimento': tipo_atendimento,
						'procedimento_id': procedimento_id,
						'tipo_especialidade': tipo_especialidade,
						'_token': laravel_token
					},
					success  : function( data ) {
						response( data );
					}
				});
			},
			minLength : 3,
			select: function(event, ui) {
				arProcedimento = ui.item.id.split(' | ');
				
				$('input[name="procedimento_id"]').val(arProcedimento[0]);
				$('input[name="cd_procedimento"]').val(arProcedimento[1]);
				$('input[name="descricao_procedimento"]').val(arProcedimento[2]);
			}
		});
	});*/
	
	$( '#local_atendimento' ).autocomplete({
		type:'post',
		dataType: 'json',
		params: {
			'search_term': $(this).val(),
			'tipo_atendimento': function() { return $('#tipo_atendimento').val(); },
			'procedimento_id': function() { return $('#tipo_especialidade').val(); },
			'tipo_especialidade': function() { return $('#tipo_atendimento').val() == 'saude' | $('#tipo_atendimento').val() == 'odonto' ? 'consulta' : 'procedimento'; },
			'_token': laravel_token
		},
		minChars: 3,
		serviceUrl: "/consulta-local-atendimento",
	    onSelect: function (result) {
	    	$('#endereco_id').val(result.id);			
	    }
	});
	
});

function numberToReal(numero) {
	
	var c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = numero < 0 ? "-" : "", i = parseInt(numero = Math.abs(+numero || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(numero - i).toFixed(c).slice(2) : "");
}

function moedaParaNumero(valor)
{
    return isNaN(valor) == false ? parseFloat(valor) :   parseFloat(valor.replace("R$","").replace(".","").replace(",","."));
}

function onlyNumbers(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;

    var keychar = String.fromCharCode(key);
    //alert(keychar);
    var keycheck = /^[0-9_\b]+$/;

    if (!(key == 8 || key == 9 || key == 17 || key == 27 || key == 44 || key == 46 || key == 37 || key == 39)) {
        if (!keycheck.test(keychar)) {
            theEvent.returnValue = false;//for IE
            if (theEvent.preventDefault) {
                theEvent.preventDefault();//Firefox
            }
        }
    }
}