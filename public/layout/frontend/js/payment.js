$(document).ready(function(){
	var bodyHeight = $('.paymentBodyRight').css('height');
	$('.paymentBodyLeft').css('height',bodyHeight);


	$("#ship").click(function () {
	    if ($(this).is(":checked")) {
	        $(".paymentRight ").hide();
	        $(".ship").show();
	        var bodyHeight = $('.paymentBodyRight').css('height');
			$('.paymentBodyLeft').css('height',bodyHeight);
	    } 
	});
	var heightOfAtm;
	var heightOfVisa;
	var heightOfBaokim;

	$("#online").click(function () {
	    if ($(this).is(":checked")) {
	        $(".paymentRight ").hide();
	        $(".online").show();
	        var bodyHeight = $('.paymentBodyRight').css('height');
			$('.paymentBodyLeft').css('height',bodyHeight);
	    }
	    heightOfAtm = $('.tableChoose.atm').css('height');
		heightOfVisa = $('.tableChoose.visa').css('height');
		heightOfBaokim = $('.tableChoose.baokim').css('height');
		// $('.tableChoose').css('height','85px');
		
	});
	$("#office").click(function () {
	    if ($(this).is(":checked")) {
	        $(".paymentRight ").hide();
	        $(".office").show();
	        var bodyHeight = $('.paymentBodyRight').css('height');
			$('.paymentBodyLeft').css('height',bodyHeight);
	    } 
	});
	$("#card").click(function () {
	    if ($(this).is(":checked")) {
	        $(".paymentRight ").hide();
	        $(".card").show();
	        var bodyHeight = $('.paymentBodyRight').css('height');
			$('.paymentBodyLeft').css('height',bodyHeight);
	    } 
	});
	$('.choose').click(function(){
		if ($(this).is(":checked")) {
			$(".tableChoose").css('height','85px');
			$(this).next().find('.tableChoose').css('height','auto');
	    } 
	});
	// $("#paymentATM").click(function () {
	//     if ($(this).is(":checked")) {
	//         $(".tableChoose").css('height','85px');
	//         $(".tableChoose.atm").css('height','auto');
	//     } 
	// });
	// $("#paymentVISA").click(function () {
	//     if ($(this).is(":checked")) {
	//         $(".tableChoose").css('height','85px');
	//         $(".tableChoose.visa").css('height','auto');
	//     } 
	// });
	// $("#paymentBAOKIM").click(function () {
	//     if ($(this).is(":checked")) {
	//         $(".tableChoose").css('height','85px');
	//         $(".tableChoose.baokim").css('height','auto');
	//     } 
	// });
	$(".tableChoose .chooseItem").click(function (){
		$(this).parent().siblings().find('.chooseItem').css('border','1px dashed #999');
		$(this).css('border','1px dashed #33f');
		$(this).parents(".tableChoose").find(".formOnline").slideDown();
		$(this).parents(".tableChoose.baokim").css('max-height','auto');
		$(this).parents(".tableChoose").find('.inputLogoBank img').attr('src',$(this).find('img').attr('src'));
	}); 
	var xml = "<ORDERS><TOTAL>1</TOTAL><ORDER><ORDER_CODE>365987</ORDER_CODE><PAYMENT_ID>36005289</PAYMENT_ID></ORDER></ORDERS>";

	
	  xmlDoc = $.parseXML( xml ),
	  $xml = $( xmlDoc ),
	  $title = $xml.find( "ORDER_CODE" );
	  console.log($title.text());
	  // var checksum = $.md5('199bcaf8');
	  // console.log(checksum);
	//merchant_site_code: "199bcafb2d959a25cd6ab550a4c2ed88",


	
	// $(".btnCheckOrder").click(function(){
	//     $.get("https://www.nganluong.vn/checkout.php",
	//     {
	//     	merchant_site_code: "199bcafb2d959a25cd6ab550a4c2ed88",
	//     	return_url: 
	//     	param: xml,
	//     	checksum: 'checksum'
	//         // receiver: 'info@ceduvn.com',
	//         // product_name: '346897',
	//         // price: '5000',
	//         // return_url: 'http://localhost/laravel_c_edu/',
	//         // comments: 'test'
	//     },
	//     function(data, status){
	//         alert("Data: " + data + "\nStatus: " + status);
	//     });
	// });
});