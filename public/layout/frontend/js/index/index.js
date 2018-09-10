$(document).ready(function(){
	$('.headerDropdown').click(function(){
		$(this).find('.headerItemDropdown').slideToggle();
	});

	$('.iconSearchHead').click(function(){
		$(this).parent().submit();
	});
});