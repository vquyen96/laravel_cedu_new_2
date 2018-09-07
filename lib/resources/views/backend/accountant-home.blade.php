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
					<?php $total = 0 ?>
					@foreach ($chartOrderDe as $item)
						@if (strtotime(date_format($item->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $item->order->ord_status == 0 )
							<?php $total += $item->orderDe_price?>
						@endif
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
					<?php $total = 0 ?>
					@foreach ($chartOrderDe as $item)
						@if (strtotime(date_format($item->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $item->order->ord_status == 0 && 	$item->orderDe_aff_id != null)
							<?php $total += $item->orderDe_price?>
						@endif
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
			text: "Doanh thu ( 3tháng)"
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
				@for ($i = 0; $i < 90; $i++)
					<?php $total = 0 ?>
					@foreach ($chartOrderDe as $item)
						@if (strtotime(date_format($item->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $item->order->ord_status == 0 )
							<?php $total += $item->orderDe_price?>
						@endif
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
				@for ($i = 0; $i < 90; $i++)
					<?php $total = 0 ?>
					@foreach ($chartOrderDe as $item)
						@if (strtotime(date_format($item->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $item->order->ord_status == 0 && 	$item->orderDe_aff_id != null)
							<?php $total += $item->orderDe_price?>
						@endif
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
			text: "Doanh thu ( 1 năm)"
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
					<?php $total = 0 ?>
					@foreach ($chartOrderDe as $item)
						@if (strtotime(date_format($item->order->created_at,"Y-m")) == strtotime(date_format($date,"Y-m")) && $item->order->ord_status == 0 )
							<?php $total += $item->orderDe_price?>
						@endif
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
					<?php $total = 0 ?>
					@foreach ($chartOrderDe as $item)
						@if (strtotime(date_format($item->order->created_at,"Y-m")) == strtotime(date_format($date,"Y-m")) && $item->order->ord_status == 0 && 	$item->orderDe_aff_id != null)
							<?php $total += $item->orderDe_price?>
						@endif
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
			text: "Người dùng (tháng)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Người dùng mới",
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
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")))
							<?php $count++?>
						@endif
					@endforeach
					
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "Giáo viên",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				<?php date_add($date,date_interval_create_from_date_string(" 1 days"));?>
				@for ($i = 0; $i < 30; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")) && $item->level == 7)
							<?php $count++?>
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "Cộng tác viên",
			lineDashType: "dash",
			color: "#32569c",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				<?php date_add($date,date_interval_create_from_date_string(" 1 days"));?>
				@for ($i = 0; $i < 30; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")) && $item->level == 8)
							<?php $count++?>
						@endif
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
			text: "Người dùng ( 3 tháng)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Người dùng mới",
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
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 90; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")))
							<?php $count++?> 
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "Giáo viên",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 90; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")) && $item->level == 7)
							<?php $count++?> 
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 days"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "Cộng tác viên",
			lineDashType: "dash",
			color: "#32569c",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 90; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m-d")) < strtotime(date_format($date,"Y-m-d")) && $item->level == 8)
							<?php $count++?> 
						@endif
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
			text: "Người dùng (1 năm)"
		},
		axisX:{
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY: {
			title: "Người dùng mới",
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
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 12; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m")) < strtotime(date_format($date,"Y-m")))
							<?php $count++?> 
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 months"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "Giáo viên",
			lineDashType: "dash",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 12; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m")) < strtotime(date_format($date,"Y-m")) && $item->level == 7)
							<?php $count++?> 
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 months"));?>
				@endfor
			]
		},
		{
			type: "splineArea",
			showInLegend: true,
			name: "Cộng tác viên",
			lineDashType: "dash",
			color: "#32569c",
			dataPoints: [
				<?php $date= new DateTime(); ?>
				@for ($i = 0; $i < 12; $i++)
					<?php $count = 0 ?>
					@foreach ($account as $item)
						@if (strtotime(date_format($item->created_at,"Y-m")) < strtotime(date_format($date,"Y-m")) && $item->level == 8)
							<?php $count++?> 
						@endif
					@endforeach
					{ x: new Date('{{date_format($date,"Y-m-d")}}'), y: {{$count}} },
					<?php date_add($date,date_interval_create_from_date_string(" -1 months"));?>
				@endfor
			]
		}]
	});
	chartLine03.render();



	var chartCircle01 = new CanvasJS.Chart("chartCircle01", {
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		
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
			indexLabelFontSize: 14,
			indexLabel: "{label} - {y}%",
			dataPoints: [
				
				<?php $total = $chartOrderDe->count();?>
			 	@for ($i = 0; $i < $group->count(); $i++)
			 		<?php $count = 0;?>
		 			@foreach ($chartOrderDe as $item)
		 				@if ($item->course->group->gr_id == $group[$i]->gr_id )
		 					<?php $count++ ?>
		 				@endif
		 			@endforeach
		 			@if ($count != 0)
		 				{ y: {{($count/$total)*100}}, label: "{{$group[$i]->gr_name}}"},
		 			@endif
		 		@endfor	
			]
		}]
	});
	chartCircle01.render();

	var chartCircle02 = new CanvasJS.Chart("chartCircle02", {
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		
		animationEnabled: true,
		title: {
			text: "Tỷ lệ CTV bán được"
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
				
				<?php $total = 0; $count = 0; $count_aff = 0;?>
				@for ($i = 0; $i < $chartOrderDe->count(); $i++)
					@if ($chartOrderDe->get($i)->orderDe_aff_id == null)
						<?php $count += $chartOrderDe->get($i)->orderDe_price ;?>
					@else
						<?php $count_aff += $chartOrderDe->get($i)->orderDe_price;?>
					@endif
					<?php $total += $chartOrderDe->get($i)->orderDe_price; ?>
				@endfor
				{ y: {{($count/$total)*100}}, label: "Kinh doanh khác"},
				{ y: {{($count_aff/$total)*100}}, label: "CTV"},
			 	
			]
		}]
	});
	chartCircle02.render();

	var chartCircle03 = new CanvasJS.Chart("chartCircle03", {
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		
		animationEnabled: true,
		title: {
			text: "Tỷ lệ các loại hình thanh toán"
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
				<?php $home = 0; $nganluong = 0; $paypal = 0; $baokim = 0; $total = 0;?>
				@foreach ($chartOrderDe as $orderDe)
					@if ($orderDe->order->ord_status == 0)
						@switch($orderDe->order->ord_payment)
							@case(1)
								<?php $home += $orderDe->orderDe_price?>
								@break
							@case(2)
								<?php $nganluong += $orderDe->orderDe_price?>
								@break
							@case(3)
								<?php $paypal += $orderDe->orderDe_price?>
								@break
							@case(4)
								<?php $baokim += $orderDe->orderDe_price?>
								@break
						@endswitch
						<?php $total += $orderDe->orderDe_price ?>
					@endif
				@endforeach
				@if ($home != 0)
					{ y: {{($home/$total)*100}}, label: "Tại nhà"},
				@endif
				@if ($nganluong != 0)
					{ y: {{($nganluong/$total)*100}}, label: "Ngân lượng"},
				@endif
				@if ($paypal != 0)
					{ y: {{($paypal/$total)*100}}, label: "Paypal"},
				@endif
				@if ($baokim != 0)
					{ y: {{($baokim/$total)*100}}, label: "Bảo kim"},
				@endif
				

				
			]
		}]
	});
	chartCircle03.render();


	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		theme: "light2",
		title: {
			text: "Các loại khóa học hiện có"
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
			toolTipContent: "<img src='{{ asset('lib/storage/app/group') }}'/{url}' style='width:40px; height:20px;'> <b>{label}</b><br>Có {y} khóa<br>Chiếm {gdp}%",
			dataPoints: [
				@foreach ($group as $gr)
					<?php $count = 0;?>
		 			@foreach ($course as $item)
		 				@if ($item->group->gr_id == $gr->gr_id )
		 					<?php $count++ ?>
		 				@endif
		 			@endforeach
		 			@if ($count != 0)
		 				{ label: "{{$gr->gr_name}}", y: {{$count}}, gdp: {{number_format((($count/$course->count())*100),1)}}, url: "{{$gr->gr_img}}" },
		 			@endif
				@endforeach
				
			]
		}]
	});
	chart.render();
}
</script>
<div>

	<div class="dashboard">
		<a  href="{{ asset('admin/order') }}" class="item earnings">
			<div  class="icon green">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Tổng Thu Nhập</p>
				<div class="contentNum">
					{{number_format($total_price,0,',','.')}} đ
				</div>
				{{-- {{number_format($item->chartOrderDe->count()*$item->cou_price,0,',','.')}} --}}
			</div>
		</a>
		<a  href="{{ asset('admin/order') }}" class="item student">
			<div  class="icon green">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Thu Nhập(tháng)</p>
				<div class="contentNum">
					{{number_format($total_month,0,',','.')}} đ
				</div>
				{{-- {{number_format($item->chartOrderDe->count()*$item->cou_price,0,',','.')}} --}}
			</div>
		</a>
		{{-- <a href="{{ asset('admin/account') }}" class="item student">
			<div class="icon red">
				<i class="fa fa-users" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Số học viên</p>
				<div class="contentNum">
					{{$student}}
				</div>
			</div>
		</a> --}}
		<a href="{{ asset('admin/teacher') }}" class="item rating">
			<div  class="icon yell">
				<i class="fa fa-magic" aria-hidden="true"></i>
			</div>
			<div class="content">
				<p>Giáo viên</p>
				<div class="contentNum">
					{{$teacher}}
				</div>
			</div>
		</a>
		
	</div>
	<div class="container-fluid homeChart">
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
		<div class="row">
			<div class="col-md-6">
				<div id="chartCircle02" class="chart">
				</div>
			</div>
			<div class="col-md-6">
				
				<div id="chartCircle03" class="chart"></div>
			</div>
		</div>

	</div>
</div>

@stop
@section('script')
<script type="text/javascript" src="js/canvasjs.min.js"></script>
@stop
