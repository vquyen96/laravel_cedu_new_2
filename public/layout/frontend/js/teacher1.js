$(document).ready(function(){
	$('#slide_course .item:first').attr('class','item active');
	$('#slide_course ol li:first').attr('class','active');

	setTimeout(function(){
        $('.masterError').fadeOut();
    },3000);
});