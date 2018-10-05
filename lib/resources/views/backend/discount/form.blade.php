@extends('backend.master')
@section('title', isset($dis->id) ? 'Chỉnh sửa' : 'Thêm mới')
@section('main')

    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.min.css"/>


    <div>
        <div>
            <h3 class="">Thêm mới mã giảm giá</h3>
        </div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="dis[name]" placeholder="VD: Nhân dịp sinh nhật " required value="{{ $dis->name }}">
                        </div>
                        <div class="form-group">
                            <label>Mã giảm giá</label>
                            <input type="text" class="form-control" name="dis[code]" placeholder="VD: SN_16051999" required value="{{ $dis->code }}">
                        </div>
                        <div class="form-group">
                            <label>Tỷ lệ</label>
                            <input type="number" class="form-control" name="dis[percent]" placeholder="VD: 20" required value="{{ $dis->percent }}">
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày chạy</label>
                                    <input type="text" class="form-control" name="dis[created_at]" placeholder="VD: 2018/10/05 09:53:05" required value="{{ $dis->created_at }}">
                                </div>
                                <div id="created_at"></div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày dừng</label>
                                    <input type="text" class="form-control" name="dis[timeout]" placeholder="VD: 2018/10/05 09:53:05" required value="{{ $dis->timeout }}">
                                </div>
                                <div id="timeout"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Thêm mới">
                    <a href="{{asset('admin/discount')}}" class="btn btn-warning"> Quay lại</a>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>

@stop
@section('script')
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function logEvent(type, date) {
                $("<div class='log__entry'/>").hide().html("<strong>"+type + "</strong>: "+date).prependTo($('#eventlog')).show(200);
            }
            $('#clearlog').click(function() {
                $('#eventlog').html('');
            });

            $('#created_at').datetimepicker({
                //date: new Date(),
                viewMode: 'YMDHMS',
                onDisplayUpdate: function() {
                    logEvent('onDisplayUpdate', this.getDisplayDate());
                },
                //date selection event
                onDateChange: function() {
                    logEvent('onDateChange', this.getValue());

                    // $('#date-text1-1').text(this.getText());
                    $('input[name="dis[created_at]"]').val(this.getText());
                    // $('#date-value1-1').text(this.getValue());
                },
                //clear button click event
                onClear: function() {
                    logEvent('onClear', this.getValue());
                },
                //ok button click event
                onOk: function() {
                    console.log(this.getValue());
                    logEvent('onOk', this.getValue());
                },
                //close button click event
                onClose: function() {
                    logEvent('onClose', this.getValue());
                },
                //today button click event
                onToday: function() {
                    logEvent('onToday', this.getValue());
                },
            });
            $('#timeout').datetimepicker({
                //date: new Date(),
                viewMode: 'YMDHMS',
                onDisplayUpdate: function() {
                    logEvent('onDisplayUpdate', this.getDisplayDate());
                },
                //date selection event
                onDateChange: function() {
                    logEvent('onDateChange', this.getValue());

                    // $('#date-text1-1').text(this.getText());
                    $('input[name="dis[timeout]"]').val(this.getText());
                    // $('#date-value1-1').text(this.getValue());
                },
                //clear button click event
                onClear: function() {
                    logEvent('onClear', this.getValue());
                },
                //ok button click event
                onOk: function() {
                    console.log(this.getValue());
                    logEvent('onOk', this.getValue());
                },
                //close button click event
                onClose: function() {
                    logEvent('onClose', this.getValue());
                },
                //today button click event
                onToday: function() {
                    logEvent('onToday', this.getValue());
                },
            });
        });
    </script>
@stop