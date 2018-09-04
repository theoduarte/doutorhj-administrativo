$(document).ready(function () {
	$(".select2").select2({
		language: 'pt-BR'
	});
	
	$('[data-toggle="tooltip"]').tooltip()
	
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

function moedaParaNumero(valor) {
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