$(document).ready(function() {
	$(".mascaraData").inputmask({
        mask: ["99/99/9999"],
        keepStatic: true
    });
	
	$(".mascaraMonetaria").maskMoney({prefix:'', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
	
	$(".mascaraTelefone").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999"],
        keepStatic: true
    });
	
	$(".mascaraCNPJ").inputmask({
	    mask: ['99.999.999/9999-99'],
	    keepStatic: true
	});
	
	$(".mascaraCPF").inputmask({
		mask: ['999.999.999-99'],
		keepStatic: true
	});
	
	$('.input-daterange-datepicker').daterangepicker({
	    buttonClasses: ['btn', 'btn-sm'],
	    applyClass: 'btn-secondary',
	    cancelClass: 'btn-primary'
	});
	
	$('.input-daterange-timepicker').daterangepicker({
	    timePicker: true,
	    format: 'DD/MM/YYYY h:mm A',
	    timePickerIncrement: 30,
	    timePicker12Hour: true,
	    timePickerSeconds: false,
	    buttonClasses: ['btn', 'btn-sm'],
	    applyClass: 'btn-secondary',
	    cancelClass: 'btn-primary'
	});
	
	$('.input-limit-datepicker').daterangepicker({
	    format		  : 'DD/MM/YYYY',
	    buttonClasses : ['btn', 'btn-sm'],
	    applyClass    : 'btn-secondary',
	    cancelClass   : 'btn-primary',
	    dateLimit     : { days: 6 }
	});
	
	jQuery('#datepicker-autoclose').datepicker({
	    autoclose: true,
	    todayHighlight: true
	});
	
	$(".mascaraCEP").inputmask({
		mask: ['99.999-999'],
		keepStatic: true
	});
	
	var items = [
		{label:"Agenda", value:"agenda"},
		{label:"Clientes", value:"clientes"},
		{label:"Clinicas", value:"clinicas"},
		{label:"Profissionais", value:"profissionals"},
	    ];
	
	$( "#main-search" ).autocomplete({
  	  source: items,
  	  minLength : 3,
  	  select: function(event, ui) {
  		  window.location.href = '/'+ui.item.value;
  	  }
  });
});

function numberToReal(numero) {
	
	var c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = numero < 0 ? "-" : "", i = parseInt(numero = Math.abs(+numero || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(numero - i).toFixed(c).slice(2) : "");
}