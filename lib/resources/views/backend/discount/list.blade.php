@extends('backend.master')
@section('title','Mã giảm giá')
@section('main')


    <link rel="stylesheet" type="text/css" href="css/account.css">
    <div>
        <div>
            <h3 class="col-md-6 col-sm-6 col-xs-12">
                Quản lý mã giảm giá
                <a href="{{asset('admin/discount/add')}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span>
                    Thêm mới
                </a>

            </h3>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Tên</th>
                    <th>Mã giảm giá</th>
                    <th>Tỷ lệ</th>
                    <th>Ngày chạy</th>
                    <th>Ngày dừng</th>
                    <th class="tableOption">Tùy Chọn</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->code }}</td>
                        <td>{{ $item->percent }}%</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->timeout }}</td>
                        <td>
                            <a href="{{asset('admin/discount/edit/'.$item->id)}}" class="btn btn-primary">Sửa</a>
                            <a href="{{asset('admin/discount/delete/'.$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
                @endforeach
            </table>
            {{$items->links()}}
        </div>
    </div>

@stop