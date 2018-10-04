<?php
	function cut_string($text, $length)
	{
	    if(strlen($text) > $length) {
	    	$text = $text.' ';
	        $text = substr($text, 0, strpos($text, ' ', $length)).'...';
	    }
	    return $text;
	}
	function cut_string_name($text, $length)
	{
	    if(strlen($text) > $length) {
	    	$text = $text.' ';
	        $text = substr($text, 0, $length).'...';
	    }
	    return $text;
	}


	/**
     * Save all images in request and resized copies of them.
     *
     * @return implode(',' , 'all images with new names');
     */

	function textTest($length){
		$text = "Đây chỉ là một đoạn text vô nghĩa , không mang chức năng gì nhiều . Cảm ơn bạn đã chú ý và đọc đoạn text này của chúng tôi. Quyến đẹp troai hân hạnh tài trợ chương trình này";
		if(strlen($text) > $length) {
	    	$text = $text.' ';
	        $text = substr($text, 0, strpos($text, ' ', $length)).'...';
	    }
	    return $text;
	}
	function saveImage($input,$resized_size,$path){

		try {
			$imgArr = [];
		    // $max_size = $resized_size;
		    if (!isset($resized_size[0])) {

		    	$resized_size = [$resized_size];
		    }
		    foreach ($input as $image) {
		    	
		        $filename = 'hs_'.date("Y-m-d").'_'.round(microtime(true)).'.'.$image->extension();
		        $image->storeAs($path,$filename);
		        $imgArr[] = $filename;

		        $image_info = getimagesize($image);
		        $width_orig  = $image_info[0];
		        $height_orig = $image_info[1];

		        $ratio = $width_orig/$height_orig;
		        // dd($resized_size);
		        // dd($resized_size);
		        foreach ($resized_size as $max_size) {
		        	$width=$max_size*1.5;
		            $height=$width/$ratio;

		            $destination_image = imagecreatetruecolor($width, $height);
			        $type_org = $image->extension();

			        switch ($type_org) {
			            case 'jpeg':
			            $orig_image = imagecreatefromjpeg($image);
			            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			            imagejpeg($destination_image, 'lib/storage/app/'.$path.'/resized'.$max_size.'-'.$filename);
			            break;

			            case 'jpg':
			            $orig_image = imagecreatefromjpeg($image);
			            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			            imagejpeg($destination_image, 'lib/storage/app/'.$path.'/resized'.$max_size.'-'.$filename);
			            break;

			            case 'png':
			            $orig_image = imagecreatefrompng($image);
			            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			            imagepng($destination_image, 'lib/storage/app/'.$path.'/resized'.$max_size.'-'.$filename);
			            break;

			            case 'gif':
			            $orig_image = imagecreatefromgif($image);
			            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			            imagegif($destination_image, 'lib/storage/app/'.$path.'/resized'.$max_size.'-'.$filename);
			            break;
			        }

		        }
		        
		    }
		    return implode(',',$imgArr);
		} catch (\Exception $e) {
			dd($e);
			return false;
		}
		    
	}

	function time_format($time){
		if ($time == null) {
			return 'lỗi';
		}
		else{
			$date = new DateTime();
			$date = strtotime(date_format($date,"Y-m-d h:m:s"));
			$time = strtotime(date_format($time,"Y-m-d h:m:s"));
			// echo $date . "----" . $time;
			// return $date.' - '.$time;
			$year = 31526000;
			$month = 2592000;
			$day = 86400;
			$hour = 3600;
			$min = 60;
			// strtotime(date_format($time,"Y-m-d")) == strtotime(date_format($date,"Y-m-d"))
			if ($time < $date-$year) {
				return round(($date-$time)/$year).' năm trước';
			}
			else if($time < $date-$month){
				return round(($date-$time)/$month).' tháng trước';
			}
			else if ($time < $date-$day) {
				return round(($date-$time)/$day).' ngày trước';
			}
			else if ($time < $date-$hour) {
				return round(($date-$time)/$hour).' giờ trước';
			}
			else if ($time < $date-$min) {
				return round(($date-$time)/$min).' phút trước';
			}
			else{
				return 'bây giờ';
			}
		}
			

	}

	function timestamp_format($timestamp){
        if (time() - $timestamp > 86400) {
            $timestamp = date('d/m/Y H:m', $timestamp);
        } else if(time() - $timestamp > 3600*24){
            $time = time() - $timestamp;
            $timestamp = round($time / (3600*24), 0, PHP_ROUND_HALF_DOWN) . ' ngày trước';
        } else {
            $time = time() - $timestamp;
            $timestamp = round($time / 3600, 0, PHP_ROUND_HALF_DOWN) . ' giờ trước';
        }
        return $timestamp;
    }


	function getUrl() {
	    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
	    $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
	    $url .= $_SERVER["REQUEST_URI"];
	    return $url;
    }

    function aff_profit($amount){
    	return ($amount*aff_discount($amount))/100;
    	
    }
    function aff_discount($amount){
    	if ($amount > 150000000) {
    		return 30;
    	}
    	if ($amount > 61000000) {
    		return 22;
    	}
    	if ($amount > 31000000) {
    		return 18;
    	}
    	if ($amount > 11000000) {
    		return 14;
    	}
    	if ($amount > 1000000) {
    		return 11;
    	}
    	else{
    		return 10;
    	}
    }

    function gender_format($gender){
    	switch ($gender) {
    		case 1:
    			return 'Nam';
    			break;
    		case 2:
    			return 'Nữ';
    			break;
    		case 3:
    			return 'Khác';
    			break;
    		
    		default:
    			return 'Lỗi';
    			break;
    	}
    }

    function level_format($level){
    	switch ($level) {
    		case 1:
    			return 'Cơ bản';
    			break;
    		case 2:
    			return 'Chuyên nghiệp';
    			break;
    		case 3:
    			return 'Tất cả trình độ';
    			break;
    		
    		default:
    			return 'Lỗi';
    			break;
    	}
    }

    function type_format($type){
    	switch ($type) {
    		case 1:
    			return 'Bài quiz';
    			break;
    		case 2:
    			return 'Giảng theo chủ đề';
    			break;
    		default:
    			return 'Lỗi';
    			break;
    	}
    }
    function order_payment($ord_payment){
    	switch ($ord_payment) {
    		case 1:
    			return 'Tại nhà';
    			break;
    		case 2:
    			return 'Ngân Lượng';
    			break;
    		case 3:
    			return 'Paypal';
    			break;
    		case 4:
    			return 'Chuyển khoản';
    			break;
    		case 5:
    			return 'Công ty';
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }
