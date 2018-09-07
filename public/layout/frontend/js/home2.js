$(document).ready(function(){
	var url_string = window.location.href;
	var url = new URL(url_string);
	var aff = url.searchParams.get("aff");
	if (aff != null) {
		localStorage.setItem("aff", aff);
		localStorage.setItem("aff_created_at", $.now());
		// if (localStorage.getItem("aff_created_at") <  $.now()-604800000) {
		// 	localStorage.removeItem("aff");
		// 	localStorage.removeItem("aff_created_at");
		// }
		// else{
			
		// }
	}
	
	$('#slide_banner_head .item:first').attr('class','item active');
	$('#slide_banner_head ol li:first').attr('class','active');

	$('#carousel_left_top .item:first').attr('class','item active');
	$('#carousel_left_top ol li:first').attr('class','active');

	$('#carousel_left_bot .item:first').attr('class','item active');
	$('#carousel_left_bot ol li:first').attr('class','active');

	$('#carousel_right .item:first').attr('class','item active');
	$('#carousel_right ol li:first').attr('class','active');

	$('.banner #slide_banner_head .item .slide_item').height($('.banner #slide_banner_head .item .slide_item').width()*648/1440);
	//slide 
	var maginleftGroup = 0
	$('.menuGroupBtnItem.Left').click(function(){
		
		maginleftGroup += 290;
		$('.menuGroupLine').css('margin-left',maginleftGroup);

		if (maginleftGroup > 0) {
			setTimeout(function(){
				maginleftGroup = -1160;
				$('.menuGroupLine').css('margin-left',maginleftGroup);
			}, 200);
			
		}
			

	});
	$('.menuGroupBtnItem.Right').click(function(){
		maginleftGroup -= 290;
		$('.menuGroupLine').css('margin-left',maginleftGroup);

		if (maginleftGroup < -1160) {
			setTimeout(function(){
				maginleftGroup = 0;
				$('.menuGroupLine').css('margin-left',maginleftGroup);
			}, 200);
		}
		

	});
	var maginleftCourseFeatured = 0;
	$('.featuredTitleMainBtnItem.left').click(function(){
		
		maginleftCourseFeatured += 582;
		$('.featuredMainLine').css('margin-left',maginleftCourseFeatured);

		if (maginleftCourseFeatured > 0) {
			setTimeout(function(){
				maginleftCourseFeatured -= 2328;
				$('.featuredMainLine').css('margin-left',maginleftCourseFeatured);
			}, 200);
		}
			

	});
	$('.featuredTitleMainBtnItem.right').click(function(){
		maginleftCourseFeatured -= 582;
		$('.featuredMainLine').css('margin-left',maginleftCourseFeatured);

		if (maginleftCourseFeatured <= -2328) {
			setTimeout(function(){
				maginleftCourseFeatured = 0;
				$('.featuredMainLine').css('margin-left',maginleftCourseFeatured);
			}, 200);
		}
	});
	$('.homeCourseMainTitleItem.follow').css('color', '#000');
	$('.homeCourseMainTitleItem').click(function(){
		$('.homeCourseMainTitleItem').css('color', '#999');
		$(this).css('color', '#000');
	});
	$('.homeCourseMainTitleItem.follow').click(function(){
		$('.homeCourseMainTitleBorder').css('left','0');
		$('.homeCourseMainline').css('margin-left', '0');
	});
	$('.homeCourseMainTitleItem.new').click(function(){
		$('.homeCourseMainTitleBorder').css('left','250px');
		$('.homeCourseMainline').css('margin-left', '-1154px');
	});
	$('.homeCourseMainTitleItem.rate').click(function(){
		$('.homeCourseMainTitleBorder').css('left','500px');
		$('.homeCourseMainline').css('margin-left', '-2308px');
	});


	$('.teacherMain').height($('.teacherMain').width()*600/1440);


	var maginleftTeacher = 0;
	$('.teacherMainBtnItem.right').click(function(){
		maginleftTeacher -= 293;
		$('.teacherMainLine').css('margin-left',maginleftTeacher);

		if (maginleftTeacher < -1758) {
			setTimeout(function(){
				maginleftTeacher = 0;
				$('.teacherMainLine').css('margin-left',maginleftTeacher);
			}, 200);
		}
	});

	$('.teacherMainBtnItem.left').click(function(){
		maginleftTeacher += 293;
		$('.teacherMainLine').css('margin-left',maginleftTeacher);

		if (maginleftTeacher > 0) {
			setTimeout(function(){
				maginleftTeacher = -1758;
				$('.teacherMainLine').css('margin-left',maginleftTeacher);
			}, 200);
		}
	});


	$('.titleMain.right').css('padding-right', ($(window).width()-1142)/2);
	$('.titleMain.left').css('padding-left', ($(window).width()-1142)/2);
	$('.featuredTitleBtn').css('margin-left', ($(window).width()-1142)/2);
});