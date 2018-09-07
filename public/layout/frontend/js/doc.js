$(document).ready(function () {
	var docItem = $('.docItem');
	docItem.eq(0).css('transform' ,'translate(0 ,-40px)');
	docItem.eq(3).css('transform' ,'translate(0 ,-40px)');
	docItem.eq(4).css('transform' ,'translate(0 ,40px)');
	docItem.eq(7).css('transform' ,'translate(0 ,40px)');
	// docItem.animate({  borderSpacing3: rotateL-=270}, {
	// 	    step: function(now,fx) {
	// 	      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
	// 	      $(this).css('-moz-transform','rotate('+now+'deg)');
	// 	      $(this).css('transform','rotate('+now+'deg)');
	// 	    },
	// 	    duration:'slow'
	// 	});	

	$('#slide_banner_head .item:first').attr('class','item active');
	$('#slide_banner_head ol li:first').attr('class','active');
	$('.banner #slide_banner_head .item .slide_item').height($('.banner #slide_banner_head .item .slide_item').width()*648/1440);
});