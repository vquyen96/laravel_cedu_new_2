$(document).ready(function() {
	//Lấy url 
	var url_string = window.location.href;
	var url = new URL(url_string);

	var widthHeadMenu = $('.courseImg img').css('width');
	var widthCourseParameter = $('.courseParameter').css('width');
	window.onscroll = function(){
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
			$('.headerTiny').slideDown();
            $('.btnScrollTop').css('bottom','20px');
        	$('.headMenu').css({'position':'fixed','top':'47px','z-index':'9','width':widthHeadMenu, 'box-shadow': '0px 1px 3px #0003, 0 0 1px #0001'});
        	$('.courseParameter').css({'position':'fixed','top':'67px','z-index':'9','width':widthCourseParameter, 'box-shadow': '0px 1px 3px #0003, 0 0 1px #0001'});
	    } else {
	        $('.headerTiny').slideUp();
            $('.btnScrollTop').css('bottom','-120px');
        	$('.headMenu').css({'position':'unset','top':'0','z-index':'9','width': '100%'});
        	$('.courseParameter').css({'position':'unset','top':'0','z-index':'9','width': 'auto'});
	    }
	    if (document.body.scrollTop > ($("footer").offset().top-650) || document.documentElement.scrollTop > ($("footer").offset().top-650)) {
	    	$(".courseParameter").hide();
	    }
	    else{
	    	
	    	$(".courseParameter").show();
	    }
	};
	if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    	$('.headMenu').css({'position':'fixed','top':'47px','z-index':'9','width':widthHeadMenu, 'box-shadow': '0px 1px 3px #0003, 0 0 1px #0001'});
    	$('.courseParameter').css({'position':'fixed','top':'67px','z-index':'9','width':widthCourseParameter, 'box-shadow': '0px 1px 3px #0003, 0 0 1px #0001'});
    } else {
    	$('.headMenu').css({'position':'unset','top':'0','z-index':'9','width': '100%'});
    	$('.courseParameter').css({'position':'unset','top':'0','z-index':'9','width': 'auto'});
    }
    
    $(document).on('click', ".btnGetLink", function() {
    	$(this).css('margin-left', '300px');
    	var copyText = document.getElementById("aff");
		copyText.select();
		document.execCommand("copy");
		$('.alertCopy').show();
		setTimeout(function(){
			$('.alertCopy').hide();
		}, 2000);
    });

	var countBtnContent = 0;
	var heightCourseDetailTrue = $('.courseDetail .courseContent').css('height');
	$('.courseDetail .courseContent').animate({height: '200px'});

	var heightCourseVideoTrue = $('.videoDetail .videoContent').css('height');
	$('.videoDetail .videoContent').animate({height: '200px'});


	var aff = url.searchParams.get("aff");
	if (aff != null) {
		localStorage.setItem("aff", aff);
		localStorage.setItem("aff_created_at", $.now());
		
		
	}else{
		if (localStorage.getItem("aff_created_at") != null && localStorage.getItem("aff_created_at") <  $.now()-604800000) {
			localStorage.removeItem("aff");
			localStorage.removeItem("aff_created_at");
		}
		else{
			
		}
	}
	$(document).on('click', "#courseHeader", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseHeader').addClass("active");
		$('html, body').animate({
	      scrollTop: 177.7777862548828
	    }, 800);
	});
	$(document).on('click', "#courseDetail", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseDetail').addClass("active");
		$('html, body').animate({
	      scrollTop: $(".courseDetail").offset().top-120
	    }, 800);
	    $('.courseDetail .btnSeeMore .btnSeeMoreText').text('Ẩn bớt');
		$('.courseDetail .courseContent').animate({height: heightCourseDetailTrue});
		$('.courseDetail .btnSeeMore i').animate({  borderSpacing: 0}, {
		    step: function(now,fx) {
		      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
		      $(this).css('-moz-transform','rotate('+now+'deg)');
		      $(this).css('transform','rotate('+now+'deg)');
		    },
		    duration:'slow'
		});
		countBtnContent = 1;
	});
	$(document).on('click', "#courseVideo", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseVideo').addClass("active");
		$('html, body').animate({
	      scrollTop: $(".videoDetail").offset().top-120
	    }, 800);
	    $('.videoDetail .videoBtnSeeMore .videoBtnSeeMoreText').text('Ẩn bớt');
		$('.videoDetail .videoContent').animate({height: heightCourseVideoTrue});
		$('.videoDetail .videoBtnSeeMore i').animate({  borderSpacing: 0}, {
		    step: function(now,fx) {
		      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
		      $(this).css('-moz-transform','rotate('+now+'deg)');
		      $(this).css('transform','rotate('+now+'deg)');
		    },
		    duration:'slow'
		});
		countBtnVideo = 1;
	});
	$(document).on('click', "#courseRating", function() {
		$('.headMenu .active').removeClass("active");
		$('#courseRating').addClass("active");
		$('html, body').animate({
	      scrollTop: $(".courseRate").offset().top-120
	    }, 800);
	    $('.courseRate .comBtnSeeMore .comBtnSeeMoreText').text('Ẩn bớt');
		$('.courseRate .rateComment').animate({height: 50+numOfCom*110+'px'});
		$('.courseRate .comBtnSeeMore i').animate({  borderSpacing: 0}, {
		    step: function(now,fx) {
		      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
		      $(this).css('-moz-transform','rotate('+now+'deg)');
		      $(this).css('transform','rotate('+now+'deg)');
		    },
		    duration:'slow'
		});
		countBtnCom = 1;

	});

	//btnSeeContent
	$('.btnSeeMore').click(function(){
		if (countBtnContent == 1) {
			$('.courseDetail .courseContent').animate({height: '200px'});
			$('.courseDetail .btnSeeMore .btnSeeMoreText').text('Xem thêm');
			$('.courseDetail .btnSeeMore i').animate({  borderSpacing: 180}, {
			    step: function(now,fx) {
			      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			      $(this).css('-moz-transform','rotate('+now+'deg)');
			      $(this).css('transform','rotate('+now+'deg)');
			    },
			    duration:'slow'
			});

			countBtnContent = 0;
			
		}
		else{
			// var heightOfCourseDetail = $('.courseDetail .courseContent').html();
			// console.log(heightOfCourseDetail.length);
			$('.courseDetail .btnSeeMore .btnSeeMoreText').text('Ẩn bớt');
			$('.courseDetail .courseContent').animate({height: heightCourseDetailTrue});
			$('.courseDetail .btnSeeMore i').animate({  borderSpacing: 0}, {
			    step: function(now,fx) {
			      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			      $(this).css('-moz-transform','rotate('+now+'deg)');
			      $(this).css('transform','rotate('+now+'deg)');
			    },
			    duration:'slow'
			});
			countBtnContent = 1;
			
		}
		
	});

 	//btnSeeVideo
	var countBtnVideo = 0;
	$('.videoDetail .videoBtnSeeMore').click(function(){
		if (countBtnVideo == 1) {
			$('.videoDetail .videoContent').animate({height: '200px'});
			$('.videoDetail .videoBtnSeeMore .videoBtnSeeMoreText').text('Xem thêm');
			$('.videoDetail .videoBtnSeeMore i').animate({  borderSpacing: 180}, {
			    step: function(now,fx) {
			      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			      $(this).css('-moz-transform','rotate('+now+'deg)');
			      $(this).css('transform','rotate('+now+'deg)');
			    },
			    duration:'slow'
			});
			
			countBtnVideo = 0;
			
		}
		else{
			$('.videoDetail .videoBtnSeeMore .videoBtnSeeMoreText').text('Ẩn bớt');
			$('.videoDetail .videoContent').animate({height: heightCourseVideoTrue});
			$('.videoDetail .videoBtnSeeMore i').animate({  borderSpacing: 0}, {
			    step: function(now,fx) {
			      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			      $(this).css('-moz-transform','rotate('+now+'deg)');
			      $(this).css('transform','rotate('+now+'deg)');
			    },
			    duration:'slow'
			});
			countBtnVideo = 1;
			
		}
		
	});


	//rateSlide 
	var star = $('.courseRateRight .rateValue');
	
	var maxStar = 0;
	for(var i = 0; i<star.length ; i++){
		if (maxStar < Number(star.eq(i).text())) {
			maxStar = Number(star.eq(i).text());
		}
	}
	var listRate = $('.courseRateRight ul li');
	for(var i = 0; i < listRate.length ; i++){
		var starValue = listRate.eq(i).children('.rateValue').text();
		listRate.eq(i).children('.rateSlide').animate({width: (starValue/maxStar)*75+'%'});
		// css('width',(starValue/maxStar)*75+'%');

	}
	//endRateSlide

	//btnSeemoreCom
	var numOfCom = $('.comItem').length;
	console.log(numOfCom);
	var countBtnCom = 0;
	if (numOfCom>2) {
		$('.courseRate .rateComment').animate({height: 50+2*110+'px'});
		$('.courseRate .comBtnSeeMore').click(function(){
			if (countBtnCom == 1) {
				$('.courseRate .rateComment').animate({height: 50+2*110+'px'});
				$('.courseRate .comBtnSeeMore .comBtnSeeMoreText').text('Xem thêm');
				$('.courseRate .comBtnSeeMore i').animate({  borderSpacing: 180}, {
				    step: function(now,fx) {
				      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
				      $(this).css('-moz-transform','rotate('+now+'deg)');
				      $(this).css('transform','rotate('+now+'deg)');
				    },
				    duration:'slow'
				});
				countBtnCom = 0;
			}
			else{
				$('.courseRate .comBtnSeeMore .comBtnSeeMoreText').text('Ẩn bớt');
				$('.courseRate .rateComment').animate({height: 50+numOfCom*110+'px'});
				$('.courseRate .comBtnSeeMore i').animate({  borderSpacing: 0}, {
				    step: function(now,fx) {
				      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
				      $(this).css('-moz-transform','rotate('+now+'deg)');
				      $(this).css('transform','rotate('+now+'deg)');
				    },
				    duration:'slow'
				});
				countBtnCom = 1;
			}
		});
	}
		
});