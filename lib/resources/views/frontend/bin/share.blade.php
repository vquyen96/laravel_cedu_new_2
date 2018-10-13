@extends('frontend.master')
@section('title','Bạn')
@section('main')
<link rel="stylesheet" type="text/css" href="css/share.css">

<div class="container">
	<div class="col-md-12">
		<div class="share">
			<div class="shareHead">
				<a href="{{ asset('/') }}"> Home</a>/
				<a href="{{ asset('user') }}">Lấy link khoán học</a>
			</div>
			<h1 class="page-header"> 
				<i class="fa fa-link" aria-hidden="true"></i> 
				Lấy link Affiliate khóa học 
			</h1>
			<table class="table table-hover">
				<tr>
					<td class="tableCourseImg">
						<img src="{{ asset('lib/storage/app/course/'.$course->cou_img) }}">
					</td>
					<td>
						<div class="courseName">
							{{$course->cou_name}}
						</div>
						
						<a href="{{ asset('teacher/'.$course->tea->email) }}" class="tableCourseTeacherImg">
							<img src="{{ asset('lib/storage/app/avatar/'.$course->tea->img) }}">
							{{$course->tea->name}}
						</a>
						<div class="courseItemStar">
							@for($i=0;$i<5;$i++)
								@if($course->cou_star > $i)
									<i class="fa fa-star starActive" aria-hidden="true"></i>
								@else
									<i class="fa fa-star" aria-hidden="true"></i>
								@endif
							@endfor
						</div>
					</td>
					<td>
						{{number_format($course->cou_price,0,',','.')}} VND
							
					</td>
					@if($course->cou_sale != 0)
					<td>
						<div class="courseSale">
							{{$course->cou_sale}} %
						</div>
					</td>
					@endif
				</tr>
			</table>
			<form method="POST">
                <div class="form-group">
                    <div class="leftForm">
                         <b><p><i class="fa fa-share-alt" aria-hidden="true"></i> Link Affiliate</p></b>
                    </div><!--end leftForm-->
                    <div class="inputCopied">
                    	Đã copy
                    </div>
      
	                <input name="link" class="form-control linkCopy" id="linkaff" type="text" value="{{ asset('courses/detail/'.$course->cou_slug.'.html?aff='.$acc->aff->aff_code) }}" data-clipboard-action="copy" data-clipboard-target="#linkaff"> 
	                <span>Khách sẽ được giảm giá theo chính sách trên ceduvn.com</span>
                            
                           
                                 <br>
                    <div style="clear:both;"></div>
                </div>
            </form>
            <form method="POST">
                <div class="form-group">
                    <div class="leftForm">
                         <b><p><i class="fa fa-share-alt" aria-hidden="true"></i> Link Đăng kí học</p></b>
                    </div><!--end leftForm-->
                    <div class="inputCopied">
                    	Đã copy
                    </div>
      
	                <input name="link" class="form-control linkCopy" id="linkcart" type="text" value="{{asset('cart/buy/'.$course->cou_slug.'?aff='.$acc->aff->aff_code)}}" data-clipboard-action="copy" data-clipboard-target="#linkaff"> 
	                <span>Khách sẽ được giảm giá theo chính sách trên ceduvn.com</span>
                            
                           
                                 <br>
                    <div style="clear:both;"></div>
                </div>
            </form>
            <form method="POST">
                <div class="form-group">
                    <div class="leftForm">
                         <b><p><i class="fa fa-share-alt" aria-hidden="true"></i> Link Cedu</p></b>
                    </div><!--end leftForm-->
                    <div class="inputCopied">
                    	Đã copy
                    </div>
      
	                <input name="link" class="form-control linkCopy" id="linkhome" type="text" value="{{ asset('?aff='.$acc->aff->aff_code) }}" data-clipboard-action="copy" data-clipboard-target="#linkaff"> 
	                <span>Khách sẽ được giảm giá theo chính sách trên ceduvn.com</span>
                            
                           
                                 <br>
                    <div style="clear:both;"></div>
                </div>
            </form>
		</div>
	</div>
</div>
@stop

@section('script')
{{-- <script type="text/javascript" src="js/share.js"></script> --}}
<script type="text/javascript">
	$(document).on('click', ".linkCopy", function() {
		var target = $(this);
    	target.prev().css('display', 'block');
    	console.log($(this).prev());
		target.select();
		document.execCommand("copy");
		setTimeout(function(){
			$('.inputCopied').hide();
		}, 1000);
		// alert("Đã copy link: " + copyText.value);

    });
</script>
@stop