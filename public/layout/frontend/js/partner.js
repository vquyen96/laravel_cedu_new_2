$(document).ready(function(){
	window.onscroll = function(){
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            $('.headerTiny').slideDown();
        } else {
            $('.headerTiny').slideUp();
        }
		if (document.body.scrollTop > 1550 || document.documentElement.scrollTop > 1550) {
        	$('.mapItem.mapMidTop').css({"top": "6%","left": "41%"});
	    }
	    if (document.body.scrollTop > 1700 || document.documentElement.scrollTop > 1700) {
	    	
	    	setTimeout(function(){
	    		$('.mapItem.mapLeftTop').css({"top": "26%","left": "15.5%"});
        		$('.mapItem.mapRightTop').css({"top": "26%","right": "15.5%"});
	    	},100);
        	
	    }
	    if (document.body.scrollTop > 1800 || document.documentElement.scrollTop > 1800) {
        	$('.mapItem.mapLeft').css({"top": "46%","left": "-8%"});
        	$('.mapItem.mapRight').css({"top": "46%","right": "-8%"});

        	$('.mapItem.mapLeftBot').css({"top": "72%","left": "15.5%"});
        	$('.mapItem.mapRightBot').css({"top": "72%","right": "15.5%"});
        	setTimeout(function(){
	    		$('.mapItem.mapMidBot').css({"top": "72%","left": "41%"});
	    	},300);
	    }
	   
	};
	if (document.body.scrollTop > 1550 || document.documentElement.scrollTop > 1550) {
			
    	$('.mapItem.mapMidTop').css({"top": "6%","left": "41%"});
    }
    if (document.body.scrollTop > 1700 || document.documentElement.scrollTop > 1700) {
	    	
    	setTimeout(function(){
    		$('.mapItem.mapLeftTop').css({"top": "26%","left": "15.5%"});
    		$('.mapItem.mapRightTop').css({"top": "26%","right": "15.5%"});
    	},100);
    	
    }
    if (document.body.scrollTop > 1800 || document.documentElement.scrollTop > 1800) {
    	$('.mapItem.mapLeft').css({"top": "46%","left": "-8%"});
    	$('.mapItem.mapRight').css({"top": "46%","right": "-8%"});

    	$('.mapItem.mapLeftBot').css({"top": "72%","left": "15.5%"});
    	$('.mapItem.mapRightBot').css({"top": "72%","right": "15.5%"});
    	setTimeout(function(){
    		$('.mapItem.mapMidBot').css({"top": "72%","left": "41%"});
    	},300);
    }





    $(document).on('click', ".teacherItem", function(){
        var content = $(this).find(".teacherContent").html();
        var name = $(this).find(".teacherName").text();
        var img = $(this).find(".teacherImg").text();
        $('.teacherDetailRight').html(content);
        $('.teacherDetailImg img').attr('src',img);
        $('.teacherDetailName h4').html(name);
    });
});
	