$(document).ready(function(){
	var i = 10;
	var countDown = setInterval(function(){
		if(i <= 0){
			window.location="http://localhost/laravel_c_edu/";
		}
		else{
			i--;
		}
		$('.completeBodyCount').text(i+" giây");
		

	}, 1000);

	// clearInterval(countDown);
});