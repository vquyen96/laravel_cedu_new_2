@extends('backend.master')
@section('title','Home')
@section('main')



<script type="text/javascript">
window.onload = function () {
	var chartRevenue01 = new CanvasJS.Chart("chartRevenue01", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Doanh thu (tháng)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "(VNĐ)",
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
			type: "splineArea",
			showInLegend: true,
			name: "Tổng",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				
				<?php $date= new DateTime(); ?>
				
				@for ($i = 0; $i < 30; $i++)
					<?php $total = 0; $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")))
								<?php $total += $orderDe->orderDe_price?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$total}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "CTV",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				
				@for ($i = 0; $i < 30; $i++)
					<?php $total = 0; $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $orderDe->orderDe_aff_id != null)
								<?php $total += $orderDe->orderDe_price?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$total}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
	});
	chartRevenue01.render();
	var chartRevenue02 = new CanvasJS.Chart("chartRevenue02", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Doanh thu (3 tháng)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "(VNĐ)",
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
			type: "splineArea",
			showInLegend: true,
			name: "Tổng",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				
				<?php $date= new DateTime(); ?>
				
				@for ($i = 0; $i < 60; $i++)
					<?php $total = 0; $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")))
								<?php $total += $orderDe->orderDe_price?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$total}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "CTV",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				
				@for ($i = 0; $i < 60; $i++)
					<?php $total = 0; $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $orderDe->orderDe_aff_id != null)
								<?php $total += $orderDe->orderDe_price?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$total}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
	});
	chartRevenue02.render();

	var chartRevenue03 = new CanvasJS.Chart("chartRevenue03", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Doanh thu (1 năm)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "(VNĐ)",
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
			type: "splineArea",
			showInLegend: true,
			name: "Tổng",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 12; $i++)
					<?php $total = 0; $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m")) == strtotime(date_format($date,"Y-m")))
								<?php $total += $orderDe->orderDe_price?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$total}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 months"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "CTV",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 12; $i++)
					<?php $total = 0; $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m")) == strtotime(date_format($date,"Y-m")) && $orderDe->orderDe_aff_id != null)
								<?php $total += $orderDe->orderDe_price?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$total}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 months"));?>
				@endfor
			]
		}]
	});
	chartRevenue03.render();



	

	function toogleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else{
			e.dataSeries.visible = true;
		}
		chart.render();
	}

	var chartLine01 = new CanvasJS.Chart("chartLine01", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Tổng số học viên (1 tháng)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Số học viên",
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
			type: "splineArea",
			showInLegend: true,
			name: "Tất cả",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				<?php $date= new DateTime(); $total = 0;?>
				<?php date_add($date,date_interval_create_from_date_string(" 1 days"));?>
				@for ($i = 0; $i < 30; $i++)
					<?php $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")))
								<?php $count++?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
	});
	chartLine01.render();

	var chartLine02 = new CanvasJS.Chart("chartLine02", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Tổng số học viên (3 tháng)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Số học viên",
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
			type: "splineArea",
			showInLegend: true,
			name: "Tất cả",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				<?php $date= new DateTime(); $total = 0;?>
				<?php date_add($date,date_interval_create_from_date_string(" 1 days"));?>
				@for ($i = 0; $i < 90; $i++)
					<?php $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")))
								<?php $count++?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
	});
	chartLine02.render();
	
	var chartLine03 = new CanvasJS.Chart("chartLine03", {
		animationEnabled: true,
		theme: "light2",
		title:{
			text: "Tổng số học viên (1 năm)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Số học viên",
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
			type: "splineArea",
			showInLegend: true,
			name: "Tất cả",
			markerType: "square",
			xValueFormatString: "DD MMM, YYYY",
			color: "#F08080",
			dataPoints: [
				<?php $date= new DateTime(); $total = 0;?>
				<?php date_add($date,date_interval_create_from_date_string(" 1 days"));?>
				@for ($i = 0; $i < 365; $i++)
					<?php $count = 0?>
					@foreach ($acc->course as $course)
						@foreach ($course->orderDe as $orderDe)
							@if ($orderDe->order->ord_status == 0 && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")))
								<?php $count++?>
							@endif
						@endforeach
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		}]
	});
	chartLine03.render();
	

	



	var chartCircle01 = new CanvasJS.Chart("chartCircle01", {
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		
		animationEnabled: true,
		title: {
			text: "Tỷ lệ các loại khóa học"
		},
		data: [{
			type: "pie",
			startAngle: 25,
			toolTipContent: "<b>{label}</b>: {y}%",
			showInLegend: "true",
			legendText: "{label}",
			indexLabelFontSize: 14,
			indexLabel: "{label} - {y}%",
			dataPoints: [
				<?php $total = $acc->course->count() ?>
				@foreach ($groups as $gr)
					<?php $count = 0;?>
		 			@foreach ($acc->course as $item)
		 				@if ($item->group->gr_id == $gr->gr_id )
		 					<?php $count++ ?>
		 				@endif
		 			@endforeach
		 			@if ($count != 0)
		 				{ y: {{($count/$total)*100}}, label: "{{$gr->gr_name}}"},
		 				
		 			@endif
				@endforeach


				
			]
		}]
	});
	chartCircle01.render();


	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		theme: "light2",
		title: {
			text: "Số lượng học viên"
		},
		axisX: {
			interval: 1
		},
		axisY: {
			title: "Số lượng",
			scaleBreaks: {
				type: "wavy",
				customBreaks: [{
					startValue: 80,
					endValue: 210
					},
					{
						startValue: 230,
						endValue: 600
					}
			]}
		},
		data: [{
			type: "bar",
			toolTipContent: "<img src='{{ asset('lib/storage/app/course') }}'/{url}' style='width:40px; height:20px;'> <b>{label}</b><br>Có {y} học viên <br>Chiếm {gdp}%",
			dataPoints: [
				@foreach ($acc->course as $course)
					<?php $count = 0?>
					@foreach ($course->orderDe as $orderDe)
						@if ($orderDe->orderDe_status == 0)
							<?php $count++ ?>
						@endif
					@endforeach
					{ label: "{{$course->cou_name}}", y: {{$count}}, gdp: {{number_format((($count/$student)*100),1)}}, url: "{{$course->cou_img}}" },
				@endforeach
				
				
			]
		}]
	});
	chart.render();

	
}
</script>
<div>
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
		<form method="post" action="{{ asset('admin/acc_req') }}">
			<input type="hidden" name="acc_id" value="{{Auth::user()->id}}">
			<input type="hidden" name="amount" value="{{$total_month}}">
			<input type="submit" name="sbm" value="gui" style="display: none;" id="sbm">
			{{csrf_field()}}
		</form>
		
	</div>
	<div class="container-fluid homeChart">
		<div class="row">
			<div class="col-md-6 courseStudent">
				<h3>Số lượng học viên
					(<span class="star">
						{{$student}} 
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>)
				</h3>
				<ul>
					@foreach ($acc->course as $cou)
						<li>
							<div class="rateImg">
								<img src="{{ asset('lib/storage/app/course/'.$cou->cou_img) }}">
							</div>
							<span class="rateSlide"></span>
							<span class="rateValue">
								<?php $student = 0;?>
								@foreach ($cou->orderDe as $orderDe)
									@if ($orderDe->order->ord_status == 0)
										<?php $student++ ;?>
									@endif
								@endforeach
								{{$student}} <i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-6 courseRateRight">
				<h3>Đánh giá của học sinh 
					(<span class="star">
						{{$teacher->tea_rating}} 
						<i class="fa fa-star" aria-hidden="true"></i>
					</span>)
				</h3>
				<ul>
					@for ($j = 5; $j > 0 ; $j-- )
						<li>
							<span class="rateName">
								{{$j}} <i class="fa fa-star" aria-hidden="true"></i>
							</span>
							<span class="rateSlide"></span>
							<span class="rateValue">
								@for($i = 0,$star = 0; $i<$teacher->rate->count(); $i++)
									@if($teacher->rate->get($i)->tr_rate == $j)
										<?php $star++?>
									@endif
								@endfor
								{{$star}} <i class="fa fa-user" aria-hidden="true"></i>
							</span>
						</li>
					@endfor
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="homeChartAccount">
					<div class="btnChangeChartAccountPre"> </div>
					<div class="btnChangeChartAccountNext"> 3 tháng >></div>
					<div id="chartLine01" class="chart"></div>
					<div id="chartLine02" class="chart"></div>
					<div id="chartLine03" class="chart"></div>
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div id="chartCircle01" class="chart">
				</div>
			</div>
			<div class="col-md-6">
				<div id="chartContainer" class="chart"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="homeChartRevenue">
					<div class="btnChangeChartRevenuePre"> </div>
					<div class="btnChangeChartRevenueNext"> 3 tháng >></div>
					<div id="chartRevenue01" class="chart"></div>
					<div id="chartRevenue02" class="chart"></div>
					<div id="chartRevenue03" class="chart"></div>
				</div>
				
			</div>
		</div>

	</div>
</div>

@stop
@section('script')
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $('.item.course').click(function(){
            $('#sbm').click();
        });
    });
</script>
@stop
