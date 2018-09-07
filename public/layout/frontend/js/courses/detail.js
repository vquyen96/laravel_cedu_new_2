$( document ).ready(function(){
	getRateChart();
	tagScroll();

	postRate();

});

function getRateChart (){
	var rate = $('.rateChartRightItem');
	for (var i = 0; i < rate.length; i++) {
		var rateValue = rate.eq(i).find('.rateChartRightItemValue').text();
		rateValue *= 100;
		rate.eq(i).find('.rateChartRightItemLineActive').css('width', rateValue+'%');

	}
}

function tagScroll(){
	var courseTag = $('.courseTag').offset().top;
	var footer = $('footer').offset().top;
	// console.log(courseTag);
	$( document ).scroll(function(){
		var top = $(document).scrollTop();
		// console.log(top);

		if (top > courseTag-10 && top < footer - $(window).height() + 200) {
			$('.courseTag').css('margin-top', top-courseTag+10);
		}
		
	    // console.log($(document).scrollTop());
	});
}

function postRate(){
	// $('.startLast').hover(function(){
 //    	$(this).prevAll().addClass('starActive');
	//     $(this).addClass('starActive');
	//     $(this).nextAll().removeClass('starActive'); 
	//     // var numItems = $('.startLast.starActive').length;
 //    },function(){
 //    	$(this).prevAll().removeClass('starActive');
 //    	$(this).removeClass('starActive');
 //    });

    $('.startLast').click(function(){

    	$(this).prevAll().addClass('starActive');
	    $(this).addClass('starActive');
	    $(this).nextAll().removeClass('starActive'); 
	    
    });
    $('.rateMainItemContentBtn').click(function(){
    	var star = $('.startLast.starActive').length;
    	var content = $('.rateMainItemContentBody textarea').val();
    	var cou_id = $('.cou_id').text();
    	console.log(star + '----'+ content);

    	var url = $('.currentUrl').text();
    	$.ajax({
	      method: 'POST',
	      url: url+'courses/rate',
	      data: {
	          '_token': $('meta[name="csrf-token"]').attr('content'),
	          'star': star,
	          'content' : content,
	          'cou_id' : cou_id
	      },
	      success: function () {
	      	location.reload();
	       	return true;
	      },
	      error: function () {
	      	console.log('Lỗi Server')
	        return false;
	      }
	    });
    });

}