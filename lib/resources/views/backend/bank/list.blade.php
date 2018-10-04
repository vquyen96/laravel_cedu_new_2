@extends('backend.master')
@section('title','Home')
@section('main')


    <link rel="stylesheet" type="text/css" href="css/account.css">
    <div>
        <div>
            <h3 class="col-md-6 col-sm-6 col-xs-12">
                Quản lý tài khoản ngân hàng
                <a href="{{asset('admin/bank/add')}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span>
                    Thêm mới
                </a>

            </h3>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Tên Ngân Hàng</th>
                    <th>Số tài khoản</th>
                    <th>Chủ tài khoản</th>
                    <th class="tableOption">Tùy Chọn</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td class="tableNewsImg">
                            <img src="{{ file_exists(storage_path('app/bank/resized200-'.$item->img)) ? asset('lib/storage/app/bank/resized200-'.$item->img) : 'img/album-default.png'}}">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->acc_num}}</td>
                        <td>{{ $item->acc_name }}</td>
                        <td>
                            <a href="{{asset('admin/bank/edit/'.$item->id)}}" class="btn btn-primary">Sửa</a>
                            <a href="{{asset('admin/bank/delete/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
                            
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$items->links()}}
        </div>
    </div>

@stop