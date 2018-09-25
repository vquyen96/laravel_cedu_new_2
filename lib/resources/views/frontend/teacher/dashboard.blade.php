@extends('frontend.master')
@section('title','Thống kê')
@section('fb_title', Auth::user()->fullname)
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('lib/storage/app/avatar/'.Auth::user()->img))
@section('main')
	<link rel="stylesheet" type="text/css" href="css/teacher/dashboard.css">

	
	<div class="instruction">


		<div class="instruction_body">
			<a href="{{ asset('') }}" class="instruction_item">
				Trang chủ
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('user') }}" class="instruction_item">
				{{ Auth::user()->name }}
			</a>
			<a class="instruction_item">
				>
			</a>
			<a href="{{ asset('teacher/dashboard') }}" class="instruction_item">
				Dashboard
			</a>
			
			
		</div>
		
	</div>
	<div class="main_body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<a href="{{ asset('teacher/add') }}" class="titleBtn">
							Thêm khóa học mới
						</a>
						<h1>Thống kê</h1>
						<div class="titleContent">
							Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
						</div>
					</div>
				</div>
			</div>
			<div class="row main_bodyItem bodyItem1">
				<div class="col-md-6">
					<div class="mainBodyItemMain">
						<div class="mainBodyItemMainTitle">
							Tổng thu nhập
						</div>
						<div class="mainBodyItemMainAmount">
							{{ number_format($total_profit, 0, ',', '.') }} vnđ
						</div>
						<div class="mainBodyItemMainTitle">
							Số dư
						</div>
						<div class="mainBodyItemMainAmount">
							{{ number_format($total_profit - $teacher->acc->withdrawn, 0, ',', '.') }} vnđ
							<div class="mainBodyItemMainReq">
								<form method="post" action="{{ asset('teacher/acc_req') }}" id="acc_req">
									{{ csrf_field() }}
									<input type="text" name="acc_id" class="d-none" value="{{ Auth::user()->id }}">
									<input type="text" name="amount" class="d-none" value="{{ $total_profit - $teacher->acc->withdrawn }}">
									<input type="submit" name="sbm" value="Rút tiền" class="btnSubmitAccReq">
								</form>
							</div>
						</div>
						
					</div> 
				</div>
				<div class="col-md-3">
					<div class="mainBodyItemMain">
						<div class="mainBodyItemMainTitle">
							Tổng doanh số
						</div>
						<div class="mainBodyItemMainAmount">
							{{ number_format($total_sale, 0, ',', '.') }}
						</div>
						<div class="mainBodyItemMainTitle">
							Doanh số tháng này
						</div>
						<div class="mainBodyItemMainAmount">
							{{ number_format($month_sale, 0, ',', '.') }}
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="mainBodyItemMain">
						<div class="mainBodyItemMainTitle">
							Tổng số học sinh
						</div>
						<div class="mainBodyItemMainAmount">
							{{ number_format($total_student, 0, ',', '.') }}
						</div>
						<div class="mainBodyItemMainTitle">
							Học sinh mới trong tháng
						</div>
						<div class="mainBodyItemMainAmount">
							{{ number_format($month_student, 0, ',', '.') }}
						</div>
					</div>
				</div>

			</div>
			<div class="row main_bodyItem bodyItem2">
				<div class="col-md-8">
					<div class="mainBodyItemMain rate">
						<div class="title">
							Đánh giá của học viên
						</div>
						<div class="rateChart">
							<div class="rateChartLeft">
								<div class="rateChartLeftNum">
									{{ number_format($teacher->tea_rating, 1,'.','.') }}
									
								</div>
								<div class="rateChartLeftStar">
									@for($i=0;$i<5;$i++)
										@if($teacher->tea_rating > $i)
											<i class="fa fa-star starActive" aria-hidden="true"></i>
										@else
											<i class="fa fa-star" aria-hidden="true"></i>
										@endif
										
									@endfor
								</div>
								<div class="rateChartLeftCount">
									
									( {{ number_format($teacher->rate->count(), 0, ',', '.') }} học sinh đánh giá)
								</div>
							</div>
							<div class="rateChartRight">

								@for($i = 5; $i > 0; $i--)
								<div class="rateChartRightItem">
									<div class="rateChartRightItemLine">
										<div class="rateChartRightItemLineActive">
											
										</div>
									</div>
									<div class="rateChartRightItemNum">
										{{ $i }} <i class="fa fa-star starActive" aria-hidden="true"></i>
									</div>
									<div class="rateChartRightItemValue">
										<?php $count = 0; $total = 0?>

										@foreach($teacher->rate as $item)
											@if($item->tr_rate == $i)
												<?php $count++?>
											@endif
											<?php $total++?>
										@endforeach
										{{ $total != 0 ? $count/$total : 0}}
									</div>
								</div>
								@endfor
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="mainBodyItemMain rate detail">
						<div class="title">
							Học viên đánh giá
						</div>
						<div class="rateDetail">
							{{-- @for($j = 0; $j < 5; $j++) --}}
							@foreach($teacher->rate as $item)
							<div class="rateDetailItem">
								<div class="rateDetailItemAva" style="background: url('{{  file_exists(storage_path('app/avatar/resized50-'.$item->img)) ? asset('lib/storage/app/avatar/resized50-'.$item->img) : 'img/no-avatar.jpg' }}') no-repeat center /cover;">
									
								</div>
								<div class="rateDetailItemStar">
									@for($i=0;$i<5;$i++)
										@if($item->tr_rate > $i)
											<i class="fa fa-star starActive" aria-hidden="true"></i>
										@else
											<i class="fa fa-star" aria-hidden="true"></i>
										@endif
										
									@endfor
									{{ number_format($item->tr_rate, 1, '.', '.') }}
								</div>
							</div>
							@endforeach
							{{-- @endfor --}}
						</div>
							
					</div>
				</div>
			</div>
			<div class="row main_bodyItem bodyItem3">
				<div class="col-md-12">
					<div class="mainBodyItemMain">
						<div class="mainBodyItemTitle">
							<h3>Khóa học</h3>
							<div class="numOfCourse">
								Bạn có {{ $teacher->acc->course->count() }} khóa học
							</div>
						</div>
						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Tên khóa học</th>
						      <th scope="col">Ngày</th>
						      <th scope="col" class="nowrap">Đánh giá</th>
						      <th scope="col" class="nowrap">Học viên</th>
						      <th scope="col">Giá</th>
						      <th scope="col" class="nowrap">Trạng thái</th>

						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($teacher->acc->course as $key=>$item)
						    <tr>
						      <td>{{ $key+1 }}</td>
						      <td>{{ $item->cou_name }}</td>
						      <td class="nowrap">{{ date_format($item->updated_at, "d - m - Y") }}</td>
						      <td class="nowrap">{{ number_format($item->cou_star, 1, '.', '.') }}</td>
						      <td class="nowrap">{{ number_format($item->cou_student, 0 ,',','.') }}</td>
						      <td class="nowrap">{{ number_format($item->cou_price, 0, ',', '.') }} VND</td>
						      <td  class="nowrap">
						      	<div class="stausItem @switch($item->cou_status)
						      			@case(1)
						      				@if($item->cou_sale != 0)
						      					sale
						      				@else
						      					doing
						      				@endif
						      				@break
						      			@case(2)
						      				wait
						      				@break
						      			@case(0)
						      				stop
						      				@break
						      			@default
						      				error
						      				@break	
						      		@endswitch" >
						      		@switch($item->cou_status)
						      			@case(1)
						      				@if($item->cou_sale != 0)
						      					Sale off
						      				@else
						      					Đang bán
						      				@endif
						      				@break
						      			@case(2)
						      				Đang chờ
						      				@break
						      			@case(0)
						      				Tạm dừng
						      				@break
						      			@default
						      				Lỗi
						      				@break	
						      		@endswitch
						      	</div>
						      </td>
						    </tr>
						   	@endforeach
						  </tbody>
						</table>

					</div>
				</div>
			</div>

			<div class="row main_bodyItem bodyItem4">
				<div class="col-md-12">
					
					<div class="mainBodyItemMain">
						<div class="mainBodyItemTitle">
							<h3>Doanh Thu</h3>
							
							<div class="btndropdown">
								<div class="dropdownMain">
									<span>1 tháng</span> <i class="fas fa-angle-down"></i>
								</div>
								<div class="dropdownHide">
									<div class="dropdownItem btn1mon">
										1 tháng
									</div>
									<div class="dropdownItem btn3mon">
										3 tháng
									</div>
									<div class="dropdownItem btnYear">
										1 năm
									</div>
								</div>
							</div>
							{{-- <div class="btnChangeChartRevenuePre"> </div>
							<div class="btnChangeChartRevenueNext"> 3 tháng >></div> --}}
						</div>
						<div class="homeChartRevenue">
							
							<div id="chartRevenue01" class="chart"></div>
							<div id="chartRevenue02" class="chart"></div>
							<div id="chartRevenue03" class="chart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('script')
	<script type="text/javascript" src="js/canvasjs.min.js"></script>
	<script type="text/javascript" src="js/teacher/dashboard.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		var chartRevenue01 = new CanvasJS.Chart("chartRevenue01", {
			animationEnabled: true,
			theme: "light2",
			// title:{
			// 	text: "Doanh thu (tháng)"
			// },
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
						@foreach ($teacher->acc->course as $course)
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
						@foreach ($teacher->acc->course as $course)
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
			// title:{
			// 	text: "Doanh thu (3 tháng)"
			// },
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
						@foreach ($teacher->acc->course as $course)
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
						@foreach ($teacher->acc->course as $course)
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
			// title:{
			// 	text: "Doanh thu (1 năm)"
			// },
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
						@foreach ($teacher->acc->course as $course)
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
						@foreach ($teacher->acc->course as $course)
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

	});
		
		
	
	</script>
@stop