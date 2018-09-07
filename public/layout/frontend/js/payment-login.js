$(document).ready(function(){
	$('.loginHeaderBorderLeft').css({'width':'100%','right':'0'});
	$(document).on('click', ".loginHeaderItem.Left", function(){
        $('#paymentLogin').show();
        $('#paymentRegister').hide();
        $('.loginHeaderBorderLeft').css({'width':'100%','right':'0'});
        $('.loginHeaderBorderRight').css({'width':'0%','left':'0'});
	});
	$(document).on('click', ".loginHeaderItem.Right", function(){
        $('#paymentRegister').show();
        $('#paymentLogin').hide();
        $('.loginHeaderBorderLeft').css({'width':'0%','right':'0'});
        $('.loginHeaderBorderRight').css({'width':'100%','left':'0'});
	});
})