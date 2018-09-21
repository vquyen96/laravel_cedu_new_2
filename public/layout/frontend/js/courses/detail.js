$( document ).ready(function(){
	getRateChart();
	tagScroll();
	postRate();
	showDetailCourse();
	showMore();
	getAff();
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

function showDetailCourse(){
	$(document).on('click', '.lessonMainPart' , function(){
		if ($(this).next().is(":hidden")) {
			$(this).find('.lessonMainPartIcon i:first-child').css('transform', 'translateY(-50%) rotate(180deg)');
		}
		else{
			$(this).find('.lessonMainPartIcon i:first-child').css('transform', 'translateY(-50%) rotate(90deg)');
		}
		$(this).next().slideToggle();
	});
}
function showMore(){
	$(document).on('click', '.btnShowMoreDescription' , function(){
		$(this).prev().css('height', '100%');
		$(this).next().css('display', 'block');
		$(this).css('display', 'none');
	});
	$(document).on('click', '.btnShowLessDescription' , function(){
		$(this).prev().prev().css('height', '0');
		$(this).prev().css('display', 'block');
		$(this).css('display', 'none');
	});
}

function getAff(){
	$(document).on('click', '.formCodeAff' , function(){
		var cou_slug = $('.cou_slug').text();
		var url = $('.currentUrl').text();
		var code = $(this).prev().val();
		console.log(code);
		$.ajax({
	      method: 'POST',
	      url: url+'courses/get_aff',
	      data: {
	          '_token': $('meta[name="csrf-token"]').attr('content'),
	          'code': code,
	      },
	      success: function (resp) {
	      	$('.get_aff').html(resp);
	      	$('.get_aff').css({'height':'auto' , 'padding': '5px 15px'});
	      	history.pushState(null, '', url+'/courses/detail/'+cou_slug+'?aff='+code);
	      	$('.courseTagContentAddCart a').attr('href', url+'cart/add/'+cou_slug+'?aff='+code);

	      	console.log(resp);
	      },
	      error: function () {
	      	console.log('Lỗi Server')
	        return false;
	      }
	    });
	});
}