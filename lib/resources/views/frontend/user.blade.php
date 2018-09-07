@extends('frontend.master')
@section('title','Bạn')
@section('main')
<link rel="stylesheet" type="text/css" href="css/user.css">
<script>
window.onload = function () {

	var chartSpLine_month = new CanvasJS.Chart("chartSpLine_month", {
		animationEnabled: true,  
		title:{
			text: "Doanh thu theo Tháng"
		},
		axisY: {
			title: "Doanh thu theo VNĐ",
			valueFormatString: "",
			suffix: "",
			prefix: ""
		},
		axisX: {
			title: "",
			valueFormatString: "DD/MM",
			suffix: "",
			prefix: ""
		},
		data: [{
			type: "splineArea",
			color: "rgba(40, 77, 169, 0.7)",
			markerSize: 5,
			xValueFormatString: "DD/MM/YYYY",
			yValueFormatString: "",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 30; $i++)
					<?php $count = 0 ?>
					@foreach ($orderDe as $item)
						@if (date_format($item->order->created_at,"Y-m-d") == date_format($date,"Y-m-d") && $item->order->ord_status == 0)
							<?php $count += $item->orderDe_price?>
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
		});
	chartSpLine_month.render();
	var chartSpLine_year = new CanvasJS.Chart("chartSpLine_year", {
		animationEnabled: true,  
		title:{
			text: "Doanh thu theo Năm"
		},
		axisY: {
			title: "Doanh thu theo VNĐ",
			valueFormatString: "",
			suffix: "",
			prefix: ""
		},
		axisX: {
			title: "",
			valueFormatString: "MM/YYYY",
			suffix: "",
			prefix: ""
		},
		data: [{
			type: "splineArea",
			color: "rgba(40, 77, 169, 0.7)",
			markerSize: 5,
			xValueFormatString: "MM/YYYY",
			yValueFormatString: "",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 12; $i++)
					<?php $count = 0 ?>
					@foreach ($orderDe as $item)
						@if (date_format($item->order->created_at,"Y-m") == date_format($date,"Y-m") && $item->order->ord_status == 0)
							<?php $count += $item->orderDe_price?>
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 months"));?>
				@endfor
			]
		}]
		});
	chartSpLine_year.render();
	var chartLine = new CanvasJS.Chart("chartline", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Biểu đồ cộng tác"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Số học viên mua khóa học",
			crosshair: {
				enabled: true
			}
		},
		toolTip:{
			shared:true
		},  
		legend:{
			cursor:"pointer",
			verticalAlign: "bottom",
			horizontalAlign: "left",
			dockInsidePlotArea: true,
			itemclick: toogleDataSeries
		},
		data: [{
			type: "line",
			showInLegend: true,
			name: "Người đặt mua",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 30; $i++)
					<?php $count = 0 ?>
					@foreach ($orderDe as $item)
						@if (date_format($item->order->created_at,"Y-m-d") == date_format($date,"Y-m-d"))
							<?php $count++?>
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "line",
			showInLegend: true,
			name: "Người thanh toán",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 30; $i++)
					<?php $count = 0 ?>
					@foreach ($orderDe as $item)
						@if (date_format($item->order->created_at,"Y-m-d") == date_format($date,"Y-m-d") && $item->order->ord_status == 0)
							<?php $count++?>
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
	});
	chartLine.render();
	var chart = new CanvasJS.Chart("chartCỉcle", {
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		exportEnabled: true,
		animationEnabled: true,
		title: {
			text: "Tỷ lệ các loại khóa học bán được"
		},
		data: [{
			type: "pie",
			startAngle: 25,
			toolTipContent: "<b>{label}</b>: {y}%",
			showInLegend: "true",
			legendText: "{label}",
			indexLabelFontSize: 16,
			indexLabel: "{label} - {y}%",
			dataPoints: [
				
			 	@for ($i = 0; $i < $group->count(); $i++)
			 		<?php $count = 0; $total = 0;?>
		 			@foreach ($orderDe as $item)
		 				@if ($item->course->group->gr_id == $group[$i]->gr_id && $item->order->ord_status == 0)
		 					<?php $count++ ?>
		 				@endif
		 				@if ($item->order->ord_status == 0)
		 					<?php $total++ ?>
		 				@endif
		 			@endforeach
		 			@if ($count != 0)
		 				{ y: {{($count/$total)*100}}, label: "{{$group[$i]->gr_name}}" },
		 			@endif
		 		@endfor	
			]
		}]
	});
	chart.render();

	function toogleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else{
			e.dataSeries.visible = true;
		}
		chart.render();
	}
}
</script>
<div class="container user">
	@if(Auth::user()->level == 8)
	<div class="dashboard">
		<div  href="{{ asset('admin/order') }}" class="item earnings">
			<div  class="icon green">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Tổng thu Nhập</p>
				<div class="contentNum">
					{{number_format($total_price,0,',','.')}} đ
				</div>
			</div>
		</div>

		<div href="{{ asset('admin/') }}" class="item student">
			<div class="icon red">
				<i class="fa fa-line-chart" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Thu nhập tháng {{$month_now}}</p>
				<div class="contentNum">
					{{number_format($total_month_now,0,',','.')}} đ
				</div>
			</div>
		</div>
		<div href="{{ asset('admin/') }}" class="item rating">
			<div  class="icon yell">
				<i class="fa fa-pie-chart" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Thu nhập tháng {{$month}}</p>
				<div class="contentNum">
					{{number_format($total_month,0,',','.')}} đ
				</div>
			</div>
		</div>
		<div class="item course">
			<div class="icon blue">
				<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>

				@if ($acc_req != null)
					<i class="fa fa-check-square-o" aria-hidden="true"></i>
				@endif
				Yêu cầu rút tiền
				</p>
				<div class="contentNum">
					{{number_format($total_month,0,',','.')}} đ
				</div>
				
			</div>
		</div>
		<form method="post" action="{{ asset('acc_req') }}">
			<input type="hidden" name="acc_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="amount" value="{{$total_month}}">
			<input type="submit" name="sbm" value="gui" style="display: none;" id="sbm">
			{{csrf_field()}}
		</form>
		
	</div>
	<div class="row ">
		<div class="col-md-12">
			<div class="btnShow showChart">
				Thống kê
			</div>
		</div>
	</div>
	<div class="row userChart">
		<div></div>
		<div class="col-md-12">
			<div class="chart chartSpLine">
				<div>
					<div class="btnHideChart">
						<i class="fa fa-caret-up" aria-hidden="true"></i>
					</div>
					<div class="btnChangeChart">
						1 năm >>>
					</div>
					<div id="chartSpLine_month"></div>
					<div id="chartSpLine_year"></div>
				</div>
					
			</div>
		</div>
		<div class="col-md-6">
			<div class="chart"><div id="chartCỉcle" style="height: 370px; width: 100%; margin: 0px auto;"></div></div>
		</div>
		<div class="col-md-6">
			<div class="chart">
				<div id="chartline" style="height: 370px; width: auto; margin: 0px auto;"></div>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="btnShow showTable">
				Danh sách khóa học đã bán được
			</div>
		</div>
	</div>
	<div class="row userTableChart">
		<div class="col-md-12">
			<div class="btnHideTable">
				<i class="fa fa-caret-up" aria-hidden="true"></i>
			</div>
			<div class="userTable">
				<h3>Danh sách khóa học đã bán được</h3>
				<table class="table table-hover">
					<tr>
						<th>Tên học sinh</th>
						<th>Ảnh khóa học</th>
						<th>Tên khóa học</th>
						<th>Giá</th>
						<th>Trạng thái</th>
						<th>Thời gian</th>
					</tr>
					@foreach($orderDeTable as $item)
					<tr>
						<td>
							{{$item->order->acc->name}}
						</td>	
						<td class="tableCourseImg">
							<img class="" src="{{asset('lib/storage/app/course/'.$item->course->cou_img)}}">
						</td>
						<td class="tableTD">
							{{$item->course->cou_name}}
						</td>
						<td class="tableTD">
							{{number_format($item->course->cou_price,0,',','.')}} VND
						</td>
						<td>@if($item->order->ord_status == 0) Xong @else Chưa @endif</td>
						<td> 
							{{$item->created_at->format('h:m d/m/Y')}}
						</td>
					</tr>
					@endforeach
				</table>
				
			</div>
		</div>
	</div>
	@endif

	<div class="row userCourse">
		@foreach($user->order as $order)
			@foreach ($order->orderDe as $item)
				@if ($item->code != null)
					<div class="col-md-3 col-sm-4 col-xs-6">
						<a href="{{asset('courses/detail/'.$item->course->cou_slug.'.html')}}" class="courseItem">
							<div class="courseImg">
								<img src="{{asset('lib/storage/app/course/resized-'.$item->course->cou_img)}}">

									@if($item->code->code_status == 0)
										<div class="courseWait">
											<div class="courseWaitContent">
												Đang chờ kích hoạt
											</div>
										</div>
									@endif
								
							</div>
							<div class="courseContent">
								<h4>{{cut_string($item->course->cou_name,60)}}</h4>
								<div class="courseTeacher">
									<img src="{{asset('lib/storage/app/avatar/resized-'.$item->course->tea->img)}}">
									<span>{{$item->course->tea->name}}</span>
								</div>
							</div>
						</a>
					</div>
				@endif
			@endforeach
				
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="btnShow showDetail">
				Hồ sơ
			</div>
		</div>
	</div>
	<div class="row userDetail">
		<div class="btnHideDetail">
			<i class="fa fa-caret-up" aria-hidden="true"></i>
		</div>
		<div class="col-md-4 userAva">
			<div class="userAvaImg">
				<img style="cursor: pointer;" id="avatarImg" class="cssInput thumbnail tableImgAvatar" width="s%" src="{{asset('lib/storage/app/avatar/'.Auth::user()->img)}}">
				<div class="userAvaHover" id="avatar">
	        		Thay đổi ảnh
	        	</div>
	        	
			</div>
        	
        	
		</div>
		<div class="col-md-8 userInfo">
			<div class="userInfoTitle">
				<h4>Thông tin cơ bản</h4>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group row">
					    <label class="formName col-md-3 col-xs-5">Tên của bạn</label>
					    <div class="inputGr col-md-9 col-xs-7">
					    	<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Tên của bạn" required>
					    </div>
					    
					</div>
					
				  	<div class="form-group row">
					    <label class="formName  col-md-3 col-xs-5">Mật khẩu</label>
					    <div class="inputGr col-md-9 col-xs-7">
					    	<a class="btn btn-primary btnChangePass">Thay đổi mật khẩu</a>
				    		<input type="password" class="form-control" name="password" placeholder="Mật khẩu của bạn">
					    </div>
					</div>
		  			
					<div class="form-group row">
						<label  class="formName col-md-3 col-xs-5">Giới thiệu bản thân</label>
						<div class="inputGr col-md-9 col-xs-7">
							<textarea class="form-control ckeditor" rows="5" name="content" placeholder="Mục tiêu sống">{!! Auth::user()->content!!}</textarea>
						</div>
					</div>
				  	<div class="form-group row">
				    	<input type="submit" class="btn btn-warning" value="Lưu thay đổi">
				  	</div>
				  	{{csrf_field()}}
				</form>
			</div>
		</div>
	</div>
	@if(Auth::user()->level == 8)
	<div class="row">
		<div class="col-md-12">
			<div class="btnShow showTableLink">
				Lấy link chia sẻ khóa học
			</div>
		</div>
	</div>
	<div class="row userTableLink">
		<div class="col-md-12">
			<div class="btnHideTableLink">
				<i class="fa fa-caret-up" aria-hidden="true"></i>
			</div>
			<div class="userTable link">
				<h3>Lấy link chia sẻ</h3>
				<table class="table table-hover">
					<tr>
						<th>Ảnh khóa học</th>
						<th>Tên khóa học</th>
						<th>Giá</th>
						<th>Link</th>
					</tr>
					@foreach($course as $item)
					<tr>
						<td class="tableCourseImg">
							<img class="" src="{{asset('lib/storage/app/course/'.$item->cou_img)}}">
						</td>
						<td class="tableTD">
							{{$item->cou_name}}
						</td>
						<td class="tableTD">
							{{number_format($item->cou_price,0,',','.')}} VND
							@if($item->cou_sale != 0)
							<br>
							<div class="courseSale">
								{{$item->cou_sale}} %
							</div>
							@endif
						</td>
						<td> 
							<a href="{{ asset('share/'.$item->cou_slug) }}" class="btn btn-danger">
								Lấy link
							</a>
						</td>
					</tr>
					@endforeach
				</table>
				
			</div>
		</div>
	</div>
	@endif
</div>


@stop

@section('script')

<script type="text/javascript" src="js/canvasjs.min.js"></script>
{{-- <script type="text/javascript" src="js/croppie.min.js"></script> --}}
<script type="text/javascript" src="js/croppie.js"></script>

<script type="text/javascript" src="js/user.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $('.item.course').click(function(){
            $('#sbm').click();
        });
    });
</script>
@stop