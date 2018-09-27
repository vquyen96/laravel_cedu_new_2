@extends('backend.master')
@section('title','Home')
@section('main')


    <link rel="stylesheet" type="text/css" href="css/account.css">
    <div>
        <div>
            <h3 class="col-md-6 col-sm-6 col-xs-12">Danh sách Cộng tác viên</h3>
        </div>
        <div>
            <table class="table table-hover">
                <tr>

                    <th>Ảnh đại diện</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mã giới thiệu</th>
                    <th>Lợi nhuận</th>
                    <th>Tổng doanh thu</th>
                    <th>Gắn bó</th>
                    <th>Tuỳ chọn</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td class="tableAcountImg">
                            <img src="{{ file_exists(storage_path('app/avatar/resized50-'.$item->img)) ? asset('lib/storage/app/avatar/resized50-'.$item->img) : ($item->provider_id != null ? $item->img : 'img/no-avatar.jpg') }}">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            @if($item->aff != null)
                                {{$item->aff->aff_code}}
                            @endif
                        </td>
                        <td><b style="color: #e33;">{{number_format($item->total_profit,0,',','.')}} <b></td>
                        <td>
                            <b style="color: #e33;">{{number_format($item->total_sale,0,',','.')}} <b>
                        </td>
                        <td>
                            {{ $item->aff != null ? time_format($item->aff->created_at) : ''}}
                        </td>
                        <td>
                            <a href="{{asset('admin/affiliate/detail/'.$item->id)}}" class="btn btn-primary">Chi tiết</a>

                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td><b>Tổng</b></td>
                    <td colspan="3">
                        Còn lại: <b style="color: #393;">{{number_format($total_sale - $total_profit,0,',','.')}} <b>
                    </td>

                    <td><b style="color: #e33;">{{number_format($total_profit,0,',','.')}} <b></td>
                    <td><b style="color: #e33;">{{number_format($total_sale ,0,',','.')}} <b></td>
                    <td></td>
                </tr>
            </table>
            {{$items->links()}}
        </div>
    </div>

@stop