@extends('backend.master')
@section('title','Home')
@section('main')
    <link rel="stylesheet" href="css/transfer.css">
    <div>
        <div>
            <h3 class="col-md-6 col-sm-6 col-xs-12">Quản lý đơn hàng</h3>

        </div>
        <div>
            <table class="table table-hover orderTable" >
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Hóa đơn</th>
                    <th class="tableOption">Trạng thái</th>
                    <th>Ngày</th>
                    <th class="">Tùy chọn</th>
                </tr>
                @foreach($items as $item)
                    <tr
                        @switch($item->ord_status)
                            @case(-2)
                                class="warning"
                                @break
                            @case(-1)
                                class="danger"
                                @break
                            @case(0)
                                class=""
                                @break
                            @case(1)
                                class="success"
                                @break
                        @endswitch
                    >
                        <td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}">{{$item->acc->name}}</a></td>
                        <td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}">{{$item->acc->email}}</a></td>

                        <td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}">{{$item->ord_phone}}</a></td>
                        <td class="tableTD"><a href="{{asset('admin/order/detail/'.$item->ord_id)}}"><b style="color: #e33;">{{number_format($item->ord_total_price,0,',','.')}} VND </b></a></td>

                        <td>
                            @switch($item->ord_status)
                                @case(-2)
                                Chờ kích hoạt
                                @break
                                @case(-1)
                                Từ chối
                                @break
                                @case(0)
                                Đã hoàn thành
                                @break
                                @case(1)
                                Chờ thanh toán
                                @break
                                @case(2)
                                Đang giao hàng
                                @break
                            @endswitch
                        </td>
                        <td>{{$item->created_at->format('d-m-Y H:i:s')}}</td>
                        <td>
                            <button class="btn btn-success btn_detail" value="{{ $item->ord_id }}">Xem</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$items->links()}}
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
    <script>
        $(document).ready(function(){
            $(document).on('click', '.btn_detail', function () {
                var id_order = $(this).attr('value');
                var url = $('.currentUrl').text();

                $.ajax({
                    method: 'POST',
                    url: url+'user/list_orderdetail',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id_order': id_order,
                    },
                    success: function (resp) {
                        $('#modal_detail .modal-content').html(resp);
                        $('#modal_detail').modal();
                    },
                    error: function () {
                        console.log('error');
                    }
                });

            })

            $(document).on('click', '.btn_submit', function () {
                $('#form_transfer').submit();
            })
        });
    </script>


@stop