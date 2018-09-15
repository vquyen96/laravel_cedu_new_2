@extends('frontend.master')
@section('title','Lấy link khóa học')
@section('main')
<link rel="stylesheet" type="text/css" href="css/aff/share.css">
	<div class="instruction">
        <div class="instruction_body">
            <a href="{{ asset('') }}" class="instruction_item">
                Trang chủ
            </a>
            <a class="instruction_item">
                >
            </a>
            <a href="{{ asset('courses') }}" class="instruction_item">
                Khoá học
            </a>
            <a class="instruction_item">
                >
            </a>
            <a href="{{ asset('aff/share/'.$course->cou_slug) }}" class="instruction_item">
                {{ $course->cou_name }}
            </a>
        </div>
    </div>
    <div class="main_body">
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
					<div class="share">
						<h1> 
							<i class="fa fa-link" aria-hidden="true"></i> 
							Lấy link Affiliate khóa học 
						</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="courseItem">
						<a href="{{ asset('courses/detail/'.$course->cou_slug.'.html') }}" class="courseItemImg" style="background: url('{{ asset('lib/storage/app/course/'.$course->cou_img) }}') no-repeat center /cover ;">
							@if ($course->cou_sale != 0)
								<div class="courseItemSale">
									{{$course->cou_sale}}%
								</div>
								
							@endif
						</a>
					
						<div class="courseItemRight">
							<a href="{{ asset('courses/detail/'.$course->cou_slug.'.html') }}" class="courseItemRightTitle">
								{{ $course->cou_name }}
							</a>
							<div class="courseItemRightInfo">
								20 bài
								<i class="fa fa-circle" aria-hidden="true"></i> 
								{{gmdate("H:i", $course->cou_video)}}p 
								<i class="fa fa-circle" aria-hidden="true"></i>
								{{time_format($course->updated_at)}}
								<i class="fa fa-circle" aria-hidden="true"></i>
								{{level_format($course->cou_level)}}
							</div>
							<div class="courseItemRightSummary">
								{{ cut_string('Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất. Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất', 120) }}
							</div>
							<div class="courseItemRightPrice">
								<span class="courseItemRightOldPrice">
									@if ($course->cou_price_old != null)
										<del>{{number_format($course->cou_price_old,0,',','.')}} đ</del>
									@endif
								</span>
								<span class="courseItemRightNewPrice">
									{{number_format($course->cou_price,0,',','.')}}
								</span>
								
								<div class="courseItemStar">
									@for($i=0;$i<5;$i++)
										@if($course->cou_star > $i)
											<i class="fa fa-star starActive" aria-hidden="true"></i>
										@else
											<i class="fa fa-star" aria-hidden="true"></i>
										@endif
									@endfor
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="getLink">
						<div class="form-group">
		                    <div class="titleCopied">
		                        <i class="fa fa-share-alt" aria-hidden="true"></i> Link khóa học
		                    </div>
		                    <div class="inputCopied">
		                    	Đã copy
		                    </div>
		      
			                <input name="link" class="form-control linkCopy" id="linkaff" type="text" value="{{ asset('courses/detail/'.$course->cou_slug.'.html?aff='.$acc->aff->aff_code) }}" data-clipboard-action="copy" data-clipboard-target="#linkaff" > 
			                <span class="noteCopied">Khách sẽ được giảm giá theo chính sách trên ceduvn.com</span>
		                            
		                           
		                                 <br>
		                    <div style="clear:both;"></div>
		                </div>
		                <div class="form-group">
		                    <div class="titleCopied">
		                        <i class="fa fa-share-alt" aria-hidden="true"></i> Link thêm vào giỏ hàng
		                    </div>
		                    <div class="inputCopied">
		                    	Đã copy
		                    </div>
		      
			                <input name="link" class="form-control linkCopy" id="linkcart" type="text" value="{{asset('cart/buy/'.$course->cou_slug.'?aff='.$acc->aff->aff_code)}}" data-clipboard-action="copy" data-clipboard-target="#linkaff"> 
			                <span class="noteCopied">Khách sẽ được giảm giá theo chính sách trên ceduvn.com</span>
		                            
		                           
		                                 <br>
		                    <div style="clear:both;"></div>
		                </div>
		                <div class="form-group">
		                    <div class="titleCopied">
		                        <i class="fa fa-share-alt" aria-hidden="true"></i> Link trang chủ
		                    </div>
		                    <div class="inputCopied">
		                    	Đã copy
		                    </div>
		      
			                <input name="link" class="form-control linkCopy" id="linkhome" type="text" value="{{ asset('?aff='.$acc->aff->aff_code) }}" data-clipboard-action="copy" data-clipboard-target="#linkaff"> 
			                <span class="noteCopied">Khách sẽ được giảm giá theo chính sách trên ceduvn.com</span>
		                            
		                           
		                                 <br>
		                    <div style="clear:both;"></div>
		                </div>
					</div>
				</div>
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