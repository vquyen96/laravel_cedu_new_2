@extends('backend.master')
@section('title','Home')
@section('main')


    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

    <div>
        <div>
            <h3 class="">Thêm mới tài khoản ngân hàng</h3>
        </div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên tóm tắt</label>
                            <input type="text" class="form-control" name="bank[nickname]" placeholder="VD: ACB " required value="{{ $bank->nickname }}">
                        </div>
                        <div class="form-group">
                            <label>Tên ngân hàng</label>
                            <input type="text" class="form-control" name="bank[name]" placeholder="VD:  NGÂN HÀNG TMCP Á CHÂU (Phòng giáo dịch Linh Đàm – Chinh nhánh Hà Nội)" required value="{{ $bank->name }}">
                        </div>
                        <div class="form-group">
                            <label>Số tài khoản</label>
                            <input type="text" class="form-control" name="bank[acc_num]" placeholder="VD: 1321510" required value="{{ $bank->acc_num }}">
                        </div>
                        <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input type="text" class="form-control" name="bank[acc_name]" placeholder="VD: Đoàn Công Chung" required value="{{ $bank->acc_name }}">
                        </div>
                        
                    </div>

                    <div class="form-group col-md-6">
                        <label>Ảnh</label>
                        <input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
                        <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail tableImgAvatar" width="s%" src="{{ $bank->img == '' ? 'img/album-default.png' : asset('lib/storage/app/bank/'.$bank->img) }}">
                    </div>
                </div>



                <div class="form-group">

                    <input type="submit" class="btn btn-success" value="Thêm mới">
                    <a href="{{asset('admin/account')}}" class="btn btn-warning"> Quay lại</a>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>

@stop