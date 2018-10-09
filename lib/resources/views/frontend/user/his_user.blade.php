@extends('frontend.master')
@section('title','Lịch sử giao dịch')
@section('main')
    <link rel="stylesheet" type="text/css" href="css/user/top_user.css">
    <link rel="stylesheet" type="text/css" href="css/user/his_user.css">

    <div class="instruction">

        <div class="instruction_body">
            <a href="{{ asset('') }}" class="instruction_item">
                Trang chủ
            </a>
            <a class="instruction_item">
                >
            </a>
            <a href="{{ asset('user') }}" class="instruction_item">
                Thông tin cá nhân
            </a>


        </div>

    </div>
    <div class="main_body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h1>Lịch sử giao dịch</h1>
                        <p>Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất</p>
                    </div>
                    <div id="list">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><p class="tieu-de">#</p></th>
                                <th><p class="tieu-de">Mã đơn hàng</p></th>
                                <th><p class="tieu-de">Giá</p></th>
                                {{--<th><p class="tieu-de">Giảm giá</p></th>--}}
                                <th><p class="tieu-de">Chờ thanh toán</p></th>
                                <th><p class="tieu-de">Trạng thái</p></th>
                                <th><p class="tieu-de">Hình thức</p></th>
                                <th><p class="tieu-de">Ngày</p></th>
                                <th><p class="tieu-de">Thao tác</p></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $key=>$order)
                                <tr>
                                    <td >
                                        <p>{{$key+1}}</p>
                                    </td>
                                    <td class="orderCode">
                                        <p>{{ $order->ord_code }}</p>
                                    </td>
                                    <td class="orderPrice">
                                        <p>{{number_format($order->ord_total_price,0,',','.')}} VND</p>
                                    </td>
                                    {{--<td>--}}
                                        {{--<p>{{  $order->ord_discount == null ? '0' : $order->ord_discount}}</p>--}}
                                    {{--</td>--}}
                                    <td>
                                        <p>{{ (time() - strtotime($order->created_at)) < 7200 && $order->ord_payment == 4 && $order->ord_status == 1 ? gmdate("H:i:s", 7200 - (time() - strtotime($order->created_at))) : '0' }}</p>
                                    </td>
                                    <td>
                                        <p> {{ $order->ord_status == 0 ? 'Xong' : ($order->ord_status == -1 ? ($order->ord_payment == 4 ? 'Hết thời gian' : 'Hủy') : 'Chờ')  }}</p>
                                    </td>
                                    <td>
                                        <p>{{ order_payment($order->ord_payment) }}</p>
                                    </td>
                                    <td>
                                        <p>{{$order->created_at->format('d-m-Y H:i:s')}}</p>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-blue btn_detail" value="{{ $order->ord_id }}">Xem chi tiết</button>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal_detail">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
@section('script')
<script src="js/user/his_user.js"></script>
@stop