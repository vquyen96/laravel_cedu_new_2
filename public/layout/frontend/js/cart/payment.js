$(document).ready(function(){
	$('.paymentRightShow').click(function(){
		$(this).next().slideToggle();
	});
	
	$('.buttonSubmit.transfer').click(function () {
		$('.paymentRightForm').slideToggle();
		$('.paymentRightChooce').slideToggle();
    })
	$('.bank').click(function(){
		$('input[name="bank"]').val($(this).attr('value'));
		$('#form_transfer').submit();
	});
});