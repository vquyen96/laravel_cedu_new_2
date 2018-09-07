	var myVideoPlayer = document.getElementById('my-video');
	
	var URL = window.URL || window.webkitURL;
	var video = document.getElementsByTagName('video')[0];
	var link = document.getElementById("link").textContent;
	console.log(link);
	var vid = document.getElementsByTagName('textarea');
	$('#video').attr('style','display: none');
	var url = 'http://localhost/laravel_c_edu/lib/public/uploads/';
	url += '1528420405.mp4';
	console.log(url);
	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.responseType = 'blob';
	xhr.onload = function(e) {
	  	if (this.status == 200) {
	  	  	var myObject = this.response;
	  	  	var url = URL.createObjectURL(myObject);
	  	  	console.log(url);
	  	  	video.src = url;
	  	}else{
	  		console.log(error);
	  	}
	};
	xhr.send();
	console.log(xhr);
	function onChange() {
	    var fileItem = document.getElementById('fileItem');
	    var files = fileItem.files;
	    var file = files[0];
	    $('#video').show();
	   	var url = URL.createObjectURL(file);
	   	video.src = url;
	    video.load();
	    video.onloadeddata = function() {
	    	URL.revokeObjectURL(this.src); 
	        video.play();
	        $('#duration').val(video.duration);
	        console.log(video.duration);
	    }
	}

	$('#my-video').height($('#my-video').width()*0.6);
	
