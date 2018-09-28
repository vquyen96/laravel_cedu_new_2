@extends('backend.master')
@section('title','Home')
@section('main')


    <link rel="stylesheet" type="text/css" href="css/course.css">
    <div>
        <div>
            <h3 class="col-md-6 col-sm-6 col-xs-12">Quản lý khóa học</h3>
            <div class="col-md-6 col-sm-6 col-xs-12 accountBtnAdd">
                <a href="{{asset('admin/course/add')}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-plus"></span>
                    Thêm khóa học mới
                </a>
            </div>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    @if (Auth::user()->level < 3 || Auth::user()->level == 5 )
                        <th>Duyệt Nhanh</th>
                    @else
                        <th>Trạng thái</th>
                    @endif
                    <th class="tableOption">Tùy Chọn</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td class="tableCourseImg">
                            <a href="{{asset('admin/course/edit/'.$item->cou_id)}}" style="background: url('{{ file_exists(storage_path('app/course/resized100-'.$item->cou_img)) ? asset('lib/storage/app/course/resized100-'.$item->cou_img) : 'img/album-default.png'}}') no-repeat center /cover;">

                                {{-- <img class="" src="{{ file_exists(storage_path('app/course/resized100-'.$item->cou_img)) ? asset('lib/storage/app/course/resized100-'.$item->cou_img) : 'img/album-default.png'}}"> --}}
                            </a>
                        </td>
                        <td class="tableTD">
                            <a href="{{asset('admin/course/edit/'.$item->cou_id)}}">
                                {{$item->cou_name}}
                            </a>
                        </td>
                        <td class="tableTD">
                            <a href="{{asset('admin/course/edit/'.$item->cou_id)}}">
                                {{number_format($item->cou_price,0,',','.')}} VND
                            </a>
                        </td>
                        @if (Auth::user()->level < 3 || Auth::user()->level == 5 )
                            <td class="tableTD">

                                @if ($item->cou_status == 1)
                                    <a href="{{asset('admin/course/take_down/'.$item->cou_id)}}" onclick="return confirm('Bạn có chắc chắn muốn gỡ xuống khóa học: {{$item->cou_name}} ?')" class="btn_UpDown">
                                        Gỡ Xuống
                                    </a>
                                @else
                                    <a href="{{asset('admin/course/take_up/'.$item->cou_id)}}" onclick="return confirm('Bạn có chắc chắn muốn duyệt khóa học: {{$item->cou_name}} ?')" class="btn_UpDown">
                                        Duyệt
                                    </a>
                                @endif
                            </td>
                        @else
                            <td class="tableTD">
                                @if ($item->cou_status == 1)
                                    Đang đăng
                                @else
                                    Chờ
                                @endif
                            </td>
                        @endif
                        <td>
                            <a href="{{asset('admin/course/edit/'.$item->cou_id)}}" class="btn btn-primary">Chi tiết</a>
                            {{--
                                <a href="{{asset('admin/course/delete/'.$item->cou_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger">Xóa</a>
                                 --}}

                        </td>
                    </tr>
                @endforeach
            </table>
            {{$items->links()}}
        </div>
    </div>

@stop