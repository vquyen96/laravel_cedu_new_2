
$('.editComStar i').hover(function(){
	    $(this).prevAll().addClass('starActive');
	    $(this).addClass('starActive');
	    $(this).nextAll().removeClass('starActive'); 
	    var numItems = $('.starActive').length;
		$('#star').val(numItems);
	});