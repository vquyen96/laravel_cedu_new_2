@extends('frontend.master')
@section('title','Thông tin cá nhân')
@section('fb_title','Top khóa học hàng đầu')
@section('fb_description','Nơi cung cấp cho bạn những khóa học tốt nhất, rẻ nhất. Tạo lên một môi trường học tập trên cuộc cách mạng công nghệ 4.0')
@section('fb_image',asset('public/layout/frontend/img/dayne-topkin-60559-unsplash.png'))
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
            <a href="{{ asset('aff/dashboard') }}" class="instruction_item">
                Thống kê
            </a>
            
            
        </div>
        
    </div>
    <div class="main_body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        
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
                            {{ number_format(aff_profit($total_sale)-Auth::user()->withdrawn, 0, ',', '.') }} vnđ
                            <div class="mainBodyItemMainReq">
                                <form method="post" action="{{ asset('aff/acc_req') }}" id="acc_req">
                                    {{ csrf_field() }}
                                    <input type="text" name="acc_id" class="d-none" value="{{ Auth::user()->id }}">
                                    <input type="text" name="amount" class="d-none" value="{{ aff_profit($total_sale)-Auth::user()->withdrawn }}">
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
                            {{ number_format($amount_month, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mainBodyItemMain">
                        <div class="mainBodyItemMainTitle">
                            Tổng số khóa học đã bán
                        </div>
                        <div class="mainBodyItemMainAmount">
                            {{ number_format($total_student, 0, ',', '.') }}
                        </div>
                        <div class="mainBodyItemMainTitle">
                            Khóa học bán trong tháng
                        </div>
                        <div class="mainBodyItemMainAmount">
                            {{ number_format($student_month, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row main_bodyItem bodyItem3">
                <div class="col-md-12">
                    <div class="mainBodyItemMain">
                        <div class="mainBodyItemTitle">
                            <h3>Số liệu khóa học</h3>
                            {{-- <div class="numOfCourse">
                                Bạn có {{ $teacher->acc->course->count() }} khóa học
                            </div> --}}
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
                              <th scope="col" class="nowrap">Chia sẻ</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($courses as $key=>$item)
                            <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $item->cou_name }}</td>
                              <td class="nowrap">{{ date_format($item->updated_at, "d - m - Y") }}</td>
                              <td class="nowrap">{{ number_format($item->cou_star, 1, '.', '.') }}</td>
                              <td class="nowrap">{{ number_format($item->cou_student + $item->cou_student_fake, 0 ,',','.') }}</td>
                              <td class="nowrap">{{ number_format($item->cou_price , 0, ',', '.') }} VND</td>
                              <td  class="nowrap">
                                <a href="{{ asset('aff/share/'.$item->cou_slug) }}" class="linkCopy">
                                    Link
                                </a>
                                {{-- <div class="linkCopy" title="Copy Link">
                                    Link
                                    <div class="linkCopyAlert">
                                        Đã copy
                                    </div>
                                </div>
                                <input type="text" name="link" class="" value="{{ asset('courses/detail/'.$item->cou_slug.'.html?aff='.$acc->aff->aff_code) }}"> --}}
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
            //  text: "Doanh thu (tháng)"
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
                        @foreach ($orderDes as $orderDe)
                            @if ($orderDe->orderDe_aff_id == Auth::user()->id && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")))
                                <?php $total += $orderDe->orderDe_price?>
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
                        <?php $total = 0; $count = 0?>
                        @foreach ($orderDes as $orderDe)
                            @if ($orderDe->orderDe_aff_id == Auth::user()->id && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $orderDe->order->ord_status == 0)
                                <?php $total += $orderDe->orderDe_price?>
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
            // title:{
            //  text: "Doanh thu (3 tháng)"
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
                    
                    @for ($i = 0; $i < 90; $i++)
                        <?php $total = 0; $count = 0?>
                        @foreach ($orderDes as $orderDe)
                            @if ($orderDe->orderDe_aff_id == Auth::user()->id && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")))
                                <?php $total += $orderDe->orderDe_price?>
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
                        <?php $total = 0; $count = 0?>
                        @foreach ($orderDes as $orderDe)
                            @if ($orderDe->orderDe_aff_id == Auth::user()->id && strtotime(date_format($orderDe->order->created_at,"Y-m-d")) == strtotime(date_format($date,"Y-m-d")) && $orderDe->order->ord_status == 0)
                                <?php $total += $orderDe->orderDe_price?>
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
            // title:{
            //  text: "Doanh thu (1 năm)"
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
                        @foreach ($orderDes as $orderDe)
                            @if ($orderDe->orderDe_aff_id == Auth::user()->id && strtotime(date_format($orderDe->order->created_at,"Y-m")) == strtotime(date_format($date,"Y-m")))
                                <?php $total += $orderDe->orderDe_price?>
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
                        <?php $total = 0; $count = 0?>
                        @foreach ($orderDes as $orderDe)
                            @if ($orderDe->orderDe_aff_id == Auth::user()->id && strtotime(date_format($orderDe->order->created_at,"Y-m")) == strtotime(date_format($date,"Y-m")) && $orderDe->order->ord_status == 0)
                                <?php $total += $orderDe->orderDe_price?>
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

        $(document).on('click', ".linkCopy", function() {
            var copyText = $(this).next();
            
            copyText.select();
            var copyAlert = $(this).find('.linkCopyAlert');

            console.log(copyAlert);
            document.execCommand("copy");
            // alert('Đã copy link : '+copyText.val());
            copyAlert.css('display', 'block');
            setTimeout(function(){
                copyAlert.css('display', 'none');
            }, 2000);
        });

    });
        
    
    </script>
@stop