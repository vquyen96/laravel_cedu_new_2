$( document ).ready(function(){
	$('.inputEdit').click(function(){
		$('.inputText').hide();
		$('.inputMain').show();
		$('.inputButon').css('opacity', '1');
		$('.inputEdit').hide();
		$('.inputDeni').show();
	});
	$('.inputDeni').click(function(){
		$('.inputText').show();
		$('.inputMain').hide();
		$('.inputButon').css('opacity', '0');
		$('.inputEdit').show();
		$('.inputDeni').hide();
	});
	$('.btnReset').click(function(){
		$('.inputDeni').click();
	});
});