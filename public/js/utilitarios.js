	$('.mascaraData').mask('00/00/0000');
	
	$('.mascaraTelefone').mask('(00) 000000000');
	
	$('.mascaraCep').mask('00000-000');
	
	$(".mascaraMonetaria").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
