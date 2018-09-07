$(document).ready(function(){
	var newsItemInWeek = $('.newsItem');
	for(var i = 0; i<newsItemInWeek.length; i++){
		if(i % 2){
			newsItemInWeek.eq(i).addClass("newsItemShort");
			// newsItemInWeek.eq(i).child().first().attr("class","newsItemShortImg")
		}
		else{
			newsItemInWeek.eq(i).addClass("newsItemLong");
			// newsItemInWeek.eq(i).child().first().attr("class","newsItemShortImg")
		}
		if((i+1)%3 == 0){
			newsItemInWeek.eq(i).css("display","none");
		}
	}
	
	$(".newsHeadBig").find(".item").eq(0).attr("class","item active");
});