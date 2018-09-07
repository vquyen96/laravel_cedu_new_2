@extends('frontend.master')
@section('title','Bạn')
@section('main')
<link rel="stylesheet" type="text/css" href="css/user_aff.css">
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
<div class="user">
	<div class="userLeft">
		<div class="userLeftItem">
			<img src="{{ asset('lib/storage/app/avatar/resized-'.Auth::user()->img) }}">
			{{Auth::user()->name}}
			<div class="userLeftItemLogo">
				
			</div>
		</div>
		<div href="{{ asset('user?page=dashboard') }}" class="userLeftItem dashboardLeft">
			<i class="fa fa-tachometer" aria-hidden="true"></i>
			Thống kê
		</div>
		<div href="{{ asset('user?page=get_link') }}" class="userLeftItem get_link">
			<i class="fa fa-link" aria-hidden="true"></i>
			Lấy link 
		</div>
		<div href="{{ asset('user?page=top10') }}" class="userLeftItem top10">
			<i class="fa fa-key" aria-hidden="true"></i>
			Top 10
		</div>
		<div href="{{ asset('user?page=history') }}" class="userLeftItem history">
			<i class="fa fa-history" aria-hidden="true"></i>
			Lịch sử giao dịch
		</div>
		<a href="{{ asset('user') }}" class="userLeftItem">
			<i class="fa fa-user" aria-hidden="true"></i>
			Thông tin cá nhân
		</a>
		<div class="userLeftBorder"></div>
		


	</div>
	<div class="userRight">
		<div class="userRightMain">
			<div class="userRightLine">
				<div class="userRightLineItem">
					<h4>Thống kê</h4>
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
						<?php $date= new DateTime(); ?>

						@if (date_format($date,"d")<=10)
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
						@endif
							
						
					</div>
					
					<div class="userChart">
						<div class="chart chartSpLine">
							<div>
								
								<div class="btnChangeChart">
									1 năm >>>
								</div>
								<div id="chartSpLine_month"></div>
								<div id="chartSpLine_year"></div>
							</div>
								
						</div>
						<div class="chart haft"><div id="chartCỉcle" style="height: 370px; width: 100%; margin: 0px auto;"></div></div>
						<div class="chart haft">
							<div id="chartline" style="height: 370px; width: auto; margin: 0px auto;"></div>
						</div>
							
					</div>
					
				</div>
				<div class="userRightLineItem">
					<h4>Lấy link chia sẻ khóa học</h4>
					
					<div class="userTableLink">
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
									<img  src="{{asset('lib/storage/app/course/'.$item->cou_img)}}"  class="tableImg" >
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
				<div class="userRightLineItem">
					<h4>Các cộng tác viên nổi bật</h4>
					
					<div class="userTableLink">
						<table class="table table-hover">
							<tr>
								<th>#</th>
								<th>Avatar</th>
								<th>Tên</th>
								<th>Số đơn</th>
								<th>Thu nhập</th>
								
							</tr>
							<?php $i = 1?>
							@foreach($aff as $item)

							<tr>
								<td>{{$i++}}</td>
								<td class="tableCourseImg">
									<img  src="{{asset('lib/storage/app/avatar/resized-'.$item->img)}}"  class="tableImg" >
									
								</td>
								<td>
									{{$item->name}}
								</td>
								<td>
									<?php $total = 0; $count = 0; ?>
									@foreach ($item->aff_orderDe as $orderDe)
										@if ($orderDe->order->ord_status == 0)
											<?php $total += $orderDe->orderDe_price; $count++ ?>
										@endif
										
									@endforeach
									{{$count}}
								</td>
								<td class="tableTD">
									
									<b style="color: #e33;">{{number_format($total,0,',','.')}} VND<b>
								</td>
								
							</tr>
							@endforeach
						</table>
					</div>
				</div>
				<div class="userRightLineItem">
					<h4>Danh sách khóa học đã bán được</h4>
					<div class="userTableHistory">
						<table class="table table-hover">
							<tr>
								<th>Học sinh</th>
								<th>Khóa học</th>
								<th>Giá</th>
								<th>Trạng thái</th>
								<th>Thời gian</th>
							</tr>
							@foreach($orderDeTable as $item)
							<tr>
								<td>
									{{$item->order->acc->name}}
								</td>	
								<td class="tableTD">
									<img class="tableImg" src="{{asset('lib/storage/app/course/'.$item->course->cou_img)}}">
									{{cut_string($item->course->cou_name, 60)}}
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
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript" src="js/canvasjs.min.js"></script>

<script type="text/javascript" src="js/user_aff.js"></script>

@stop