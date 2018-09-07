
$(document).ready(function(){
	var url_string = window.location.href;
	var url = new URL(url_string);

	var widthHeadMenu = $('.mainMenu').css('width');
	window.onscroll = function(){
		if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
			$('.headerTiny').slideDown();
            $('.btnScrollTop').css('bottom','20px');
        	$('.mainMenu').css({'position':'fixed','top':'47px','z-index':'9','width':widthHeadMenu, 'box-shadow': 'rgb(162, 162, 162) 7px 7px 20px'});
	    } else {
	        $('.headerTiny').slideUp();
            $('.btnScrollTop').css('bottom','-120px');
        	$('.mainMenu').css({'position':'unset','top':'0','z-index':'9','width': '100%'});
	    }
	};
	if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    	$('.headMenu').css({'position':'fixed','top':'47px','z-index':'9','width':widthHeadMenu, 'box-shadow': 'rgb(162, 162, 162) 7px 7px 20px'});
    } else {
    	$('.headMenu').css({'position':'unset','top':'0','z-index':'9','width': '100%'});
    }




	var slider = document.getElementById("myRange");
	var output = document.getElementById("slidePrice");
	// output.innerHTML = (slider.value*10000).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");

	// slider.oninput = function() {
	//   output.innerHTML = (this.value*10000).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	// }
	
	if(url_string.split('/').reverse()[0].substring(0, 7) == "courses"){
		$(document).on('click', "#courseMostBuy", function() {
			$('.mainMenu .active').removeClass("active");
			$('#courseMostBuy').addClass("active");
			$('.couserLine').css('margin-left', 0);
		});
		$(document).on('click', "#courseMostNew", function() {
			$('.mainMenu .active').removeClass("active");
			$('#courseMostNew').addClass("active");
			$('.couserLine').css('margin-left', -854);
		});
		$(document).on('click', "#courseMostRate", function() {
			$('.mainMenu .active').removeClass("active");
			$('#courseMostRate').addClass("active");
			$('.couserLine').css('margin-left', -1708);
		});
		$(document).on('click', "#courseMostSale", function() {
			$('.mainMenu .active').removeClass("active");
			$('#courseMostSale').addClass("active");
			$('.couserLine').css('margin-left', -2562);
		});
	}
	var price = url.searchParams.get("price");	
	if (price == null) {
		price = 800000;
	}
	var slider = document.getElementById('slider');
 	var slidePrice = document.getElementById('slidePrice');
	noUiSlider.create(slider, {
		start: [ price ],
		connect: [true, false],
		padding: [ 100000, 0 ],
		step: 10000,
		range: {
			'min': 0,
			'max': 2000000
		}
			
	});

	
	slider.noUiSlider.on('update', function( values, handle ) {
		slidePrice.innerHTML = Math.round(values[handle]).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	});
	
	
	
	var tag = url.searchParams.get("tag");
	var level = url.searchParams.get("level");
	$(document).on('click', ".customPriceBtn", function() {
		
		if(tag != null){
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level="+level+"&tag="+tag;
			var url = $('#urlPage').val();
			window.location=url+para;
		}
		else{
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level="+level;
			var url = $('#urlPage').val();
			window.location=url+para;
		}
			
	});
	$(document).on('click', ".btnLevelAll", function() {
		
		if(tag != null){
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level=all&tag="+tag;
			var url = $('#urlPage').val();
			window.location=url+para;
		}
		else{
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level=all";
			var url = $('#urlPage').val();
			window.location=url+para;
		}
			
	});
	$(document).on('click', ".btnLevelBasic", function() {
		
		if(tag != null){
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level=basic&tag="+tag;
			var url = $('#urlPage').val();
			window.location=url+para;
		}
		else{
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level=basic";
			var url = $('#urlPage').val();
			window.location=url+para;
		}
	});
	$(document).on('click', ".btnLevelMaster", function() {
		if(tag != null){
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level=master&tag="+tag;
			var url = $('#urlPage').val();
			
			window.location=url+para;
		}
		else{
			var para = "/?price="+ Math.round(slider.noUiSlider.get())+"&level=master";
			var url = $('#urlPage').val();
			window.location=url+para;
		}
	});
	
	
});
	

function btnTag(value){
	var url_string = window.location.href;
	var url = new URL(url_string);
	var level = url.searchParams.get("level");
	if(level != null){
		var para = "/?price="+ slider.noUiSlider.get()+"&tag="+value+"&level="+level;
		var url = $('#urlPage').val();
		window.location=url+para;
	}
	else{
		var para = "/?price="+ slider.noUiSlider.get()+"&tag="+value;
		var url = $('#urlPage').val();
		window.location=url+para;
	}
		
}
function btnRemove(value){
	var url_string = window.location.href;
	var url = new URL(url_string);
	var level = url.searchParams.get("level");
	var price = url.searchParams.get("price");
	var tag = url.searchParams.get("tag");
	switch(value){
		case level:
			var para = "/?price="+ slider.noUiSlider.get()+"&tag="+tag;
			var url = $('#urlPage').val();
			window.location=url+para;
			break;
		case price:
			var para = "/?level="+level+"&tag="+tag;
			var url = $('#urlPage').val();
			window.location=url+para;
			break;
		case tag:
			var para = "/?price="+ slider.noUiSlider.get()+"&level="+level;
			var url = $('#urlPage').val();
			window.location=url+para;
			break;
		
	}


	// var slider = document.getElementById('slider');

	// noUiSlider.create(slider, {
	// 	start: [20, 80],
	// 	connect: true,
	// 	range: {
	// 		'min': 0,
	// 		'max': 100
	// 	}
	// });

}