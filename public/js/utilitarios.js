$(document).ready(function() {
	$(".mascaraData").inputmask({
        mask: ["99/99/9999"],
        keepStatic: true
    });
	
	$(".mascaraMonetaria").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
	
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
});