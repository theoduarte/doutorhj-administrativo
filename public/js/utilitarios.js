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
});