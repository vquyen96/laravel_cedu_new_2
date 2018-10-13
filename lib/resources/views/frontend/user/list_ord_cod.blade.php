<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">{{ $order->ord_code.' -- '.number_format($order->ord_total_price) }}</h4>
</div>
<div class="modal-body">
    <div class="modalCourse">
        @foreach($orderdetail as $orderDe)
            <div class="modalCourseItem">
                <div class="modalCourseItemImg"
                     style="background: url('{{ file_exists(storage_path('app/course/resized200-'.$orderDe->course->cou_img)) ? asset('lib/storage/app/course/resized200-'.$orderDe->course->cou_img) : 'img/no_image.jpg'}}') no-repeat center /cover"></div>
                <div class="modalCourseItemContent">
                    <div class="modalCourseName">
                        {{ $orderDe->course->cou_name }}
                    </div>
                    <div class="modalCoursePrice">
                        {{ number_format($orderDe->orderDe_price) }}
                    </div>
                    <div class="modalCourseDiscount">
                        @if(isset($orderDe->dis))
                            <span>Mã giảm giá: </span>
                            <span>{{ $orderDe->dis->code }} (-{{ $orderDe->dis->percent }}%)</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modalOrder">
        <div class="modalOrderTitle">Thông tin khách hàng</div>
        <div class="modalOrderContent">
            <div class="modalOrderContentLeft">Tên khách hàng:</div>
            <div class="modalOrderContentRight">{{ $order->acc->name }} </div>
        </div>
        <div class="modalOrderContent">
            <div class="modalOrderContentLeft">Số điện thoại:</div>
            <div class="modalOrderContentRight">{{ $order->ord_phone }} </div>
        </div>
        <div class="modalOrderContent">
            <div class="modalOrderContentLeft">Địa chỉ:</div>
            <div class="modalOrderContentRight">{{ $order->ord_adress }} </div>
        </div>
        <div class="modalOrderContent {{ $order->ord_note == null ? 'd-none' : '' }}">
            <div class="modalOrderContentLeft">Ghi chú:</div>
            <div class="modalOrderContentRight">{{ $order->ord_note }} </div>
        </div>

        {{--<div class="modalOrderContent">--}}
        {{--<button type="submit" class="btn btn-blue">Gửi</button>--}}
        {{--</div>--}}
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level <= 3)
        <a href="{{ asset('admin/transfer/active/'.$order->ord_id) }}"
           onclick="return confirm('Bạn có chắc chắn muốn kích hoạt ?')" class="btn btn-success">Kích hoạt</a>
        <a href="{{ asset('admin/transfer/deny/'.$order->ord_id) }}"
           onclick="return confirm('Bạn có chắc chắn muốn từ chối ?')" class="btn btn-danger">Từ chối</a>
    @endif

    @if($order->ord_status == 1 && \Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level > 3)
        <button type="button" class="btn btn-blue btn_submit">Gửi</button>
    @endif
</div>

