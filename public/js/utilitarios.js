$(document).ready(function() {
	$('.mascaraData').mask('00/00/0000');
	
	$(".mascaraMonetaria").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
	
	$(".mascaraTelefone").inputmask({
        mask: ["(99) 9999-9999", "(99) 99999-9999", ],
        keepStatic: true
    });
	
	$(".mascaraCNPJ").inputmask({
	    mask: ['99.999.999/9999-99'],
	    keepStatic: true
	});
});
