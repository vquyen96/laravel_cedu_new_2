@extends('backend.master')
@section('title','Home')
@section('main')


    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

    <div>
        <div class="dashboard">
            <a href="{{ asset('admin/course/student/'.$item->cou_id)}}" class="item student">
                <div class="icon red">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="content">
                    <p>Số học viên</p>
                    {{$item->orderDe->count()}}
                </div>
            </a>
            <a href="{{ asset('admin/rating/detail/'.$item->cou_id) }}" class="item rating">
                <div class="icon yell">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <div class="content">
                    <p>Đánh giá</p>
                    {{$item->cou_star}}
                </div>
            </a>
            <a href="{{ asset('admin/course/detail/'.$item->cou_id) }}" class="item course">
                <div class="icon blue">
                    <i class="fa fa-book" aria-hidden="true"></i>
                </div>
                <div class="content">
                    <p>Số bài học</p>
                    {{$lesson}}
                </div>
            </a>
            <a href="{{ asset('admin') }}" class="item earnings">
                <div class="icon green">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="content">
                    <p>Thu Nhập</p>
                    {{number_format($item->orderDe->count()*$item->cou_price,0,',','.')}}
                </div>
            </a>
        </div>
        <div class="bodyHeader">
            <span class="title">Chỉnh sửa khóa học</span>
            <a href="{{asset('admin/course/detail/'.$item->cou_id)}}" class="btn btn-success">Thêm bài giảng</a>
            @if (Auth::user()->level < 6 && Auth::user()->level != 3)
                @if ($item->cou_status == 0)
                    <a href="{{ asset('admin/course/take_up/'.$item->cou_id) }}" class="btnDown">Đăng lên</a>
                @else
                    <a href="{{ asset('admin/course/take_down/'.$item->cou_id) }}" class="btnDown">Gỡ xuống</a>
                @endif


            @endif

            <a href="{{asset('admin/course/delete/'.$item->cou_id)}}" class="btnRemove" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên khóa học</label>
                            <input type="text" class="form-control" name="cou_name" value="{{$item->cou_name}}" placeholder="Tên của bạn" required>
                        </div>
                        @if (Auth::user()->level <3 || Auth::user()->level == 5)
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <input type="number" class="form-control" name="cou_featured" value="{{$item->cou_featured}}" placeholder="1-9" required>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Giá chính thức</label>
                            <input type="text" class="form-control" name="cou_price" value="{{$item->cou_price}}" placeholder="300000" required>
                        </div>

                        @if(Auth::user()->level < 7)
                            <div class="form-group">
                                <label>Giá chưa sale</label>
                                <input type="text" class="form-control" name="cou_price_old" value="{{$item->cou_price_old}}" placeholder="600000" >
                            </div>
                            <div class="form-group">
                                <label>Sale</label>
                                <input type="text" class="form-control" name="cou_sale" placeholder="VD: 15%" value="{{$item->cou_sale}}">
                            </div>
                        @else
                            <b>Sale : {{$item->cou_sale}}%</b>
                        @endif
                        <div class="form-group">
                            <label>Cấp độ</label>
                            <select class="form-control" name="cou_level">
                                <option @if($item->cou_level == "1") selected @endif value="1">Tất cả</option>
                                <option @if($item->cou_level == "2") selected @endif value="2">Cơ bản</option>
                                <option @if($item->cou_level == "3") selected @endif value="3">Chuyên nghiệp</option>
                            </select>

                        </div>
                        @if(Auth::user()->level < 7)
                            <div class="form-group">
                                <label>Số học viên thêm</label>
                                <input type="number" class="form-control" name="cou_student_fake" value="{{$item->cou_student_fake}}">
                            </div>
                            {{-- <div class="form-group">
                              <label>Số học viên</label>
                              <input type="number" class="form-control" name="cou_student" value="{{$item->cou_student}}">
                            </div> --}}
                        @else
                            <b>Sỗ học viên : {{$item->cou_student}}</b>
                        @endif
                        {{-- <div class="form-group">
                          <label>Tag</label>
                          <input type="text" class="form-control" name="cou_tag" required placeholder="VD: #Ngoại ngữ #Giao tiếp-+
                          " value="{{$item->cou_tag}}">
                        </div> --}}
                        <div class="form-group">
                            <label>Lĩnh vực</label>
                            <select class="form-control" name="cou_gr_id" id="group">
                                @foreach($group as $gr)
                                    <option value="{{$gr->gr_id}}" @if($gr->gr_id == $item->cou_gr_id) selected @endif>{{$gr->gr_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chuyên mục</label>
                            <select class="form-control" name="cou_gr_child_id" id="group_child">
                                @foreach($group_child as $gr)
                                    <option value="{{$gr->gr_id}}" {{ $gr->gr_id == $item->cou_gr_child_id ? 'selected' : '' }}>{{$gr->gr_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::user()->level < 3 || Auth::user()->level == 5)
                            <div class="form-group">
                                <label>Giáo viên</label>
                                <select class="form-control" name="cou_tea_id">
                                    @foreach($tea as $teacher)
                                        <option value="{{$teacher->id}}" @if($teacher->id == $item->cou_tea_id) selected @endif>{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- @else
                                <label>Giáo viên: </label>{{$item->tea->name}}
       --}}				  	@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>Ảnh</label>
                        <input id="img" type="file" name="img" class="cssInput " onchange="changeImg(this)" style="display: none!important;">
                        <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail" width="100%" src="{{asset('lib/storage/app/course/'.$item->cou_img)}}">
                    </div>
                </div>


                <div class="form-group">
                    <label>Chi tiết</label>
                    <textarea class="form-control ckeditor" rows="5" name="content">{{$item->cou_content}}</textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('content',{
                            language:'vi',
                            filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        });
                    </script>

                </div>
                <div class="form-group">

                    <input type="submit" class="btn btn-success" value="Thay đổi">
                    <a href="{{asset('admin/course')}}" class="btn btn-warning"> Quay lại</a>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        <div class="videoContentTitle">
            Chi tiết bài học
        </div>
        <div class="videoContent">
            <?php $video = 0 ?>
            @foreach($item->part as $part)
                <h4>
                    {{$part->part_name}}
                    <a href="{{ asset('admin/course/part/edit/'.$item->cou_id.'/'.$part->part_id) }}" class="btnEditPart">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </h4>
                {{-- {{$item->lesson->count()}} --}}
                @foreach($part->lesson as $lesson)
                    <a href="{{asset('admin/course/part/lesson/edit/'.$item->cou_id.'/'.$part->part_id.'/'.$lesson->les_id)}}">
                        <div class="videoItem">
                            <div class="videoItemBtnPlay">
                                <img src="img/ic_Play-button_b1.png">
                            </div>
                            <div class="videoItemTitle">
                                {{$lesson->les_name}}
                            </div>
                            <div class="videoItemTime">
                                {{$lesson->les_video_duration}}
                            </div>
                        </div>
                    </a>
                    <?php $video++ ?>
                @endforeach
            @endforeach
        </div>


        <div class="videoContentTitle">
            Tài liệu
        </div>
        <div class="editDocument">
            <ul>
                @foreach ($docs as $doc)
                    @if ($doc->doc_les_id == null)
                        <li class="document">
                            <a href="{{ asset('teacher/destroy_doc/'.$doc->doc_id) }}"  onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <div class="doc_name">
                                {{ $doc->doc_name}}
                            </div>
                            <i class="fas fa-edit edit_document" >
                                <div class="d-none action_form">
                                    {{asset('teacher/editdoc/'.$doc->doc_id)}}
                                </div>
                                <div class="d-none doc_form">{{ $doc->doc_link }}</div>
                            </i>

                        </li>
                    @endif

                @endforeach

            </ul>
            <div class="addDocument" >
                <i class="fas fa-plus" data-toggle="modal" data-target="#myModal2"></i>
                Thêm tài liệu
                <div class="d-none action_form">
                    {{asset('teacher/doc/'.$item->cou_id)}}
                </div>
            </div>
        </div>
    </div>

    {{--MODAL TẠO TÀI LIỆU--}}
    <div class="modal fade"	 id="modal_add_doc">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-title">
                    Tài liệu
                </div>
                <form method="post" enctype="multipart/form-data" class="form_add_doc" >
                    {{ csrf_field() }}
                    <div class="form_group">
                        <label>Tên tài liệu</label>
                        <div class="form_item">
                            <div class="input">
                                <input type="text" name="doc_name"  placeholder="Tên tài liệu">
                            </div>
                        </div>
                    </div>
                    <div class="form_group">
                        <label>File tài liệu</label>
                        <div class="form_item">
                            <div class="inputFile">
                                Chọn file
                                <input id="upload_doc" type="file" name="file" class="cssInput" onchange="Prevew_document()">
                            </div>
                        </div>
                    </div>
                    <div class="show_doc">
                        <iframe id="viewer_doc" frameborder="0" scrolling="no" width="100%" height="600"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-miss" data-dismiss="modal">Không</button>
                        <button type="submit" class="btn-create">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END TẠO TÀI LIỆU --}}


@stop
@section('script')
    <script>
        var url = $('.currentUrl').text();
        $('.addDocument').click(function(){
            var action = $(this).find('.action_form').text();
            $('.form_add_doc').attr('action', action);
            $('#modal_add_doc').modal();
            $('#viewer_doc').hide();
        });

        $('.edit_document').click(function(){
            var action = $(this).find('.action_form').text();
            var doc_name = $(this).prev().text();
            var doc_link = $(this).find('.doc_form').text();
            console.log(doc_link);

            doc_name = doc_name.trim();
            console.log(doc_name);
            $('input[name="doc_name"]').val(doc_name);
            $('.form_add_doc').attr('action', action);
            $('#modal_add_doc').modal();

            $('#viewer_doc').attr('src', url+'/lib/storage/app/doc/' + doc_link );
            $('#viewer_doc').show();
        });
        function Prevew_document() {
            pdffile=document.getElementById("upload_doc").files[0];
            var extension = pdffile.name.split('.').pop();
            if (extension == 'pdf') {
                pdffile_url=URL.createObjectURL(pdffile);
                $('#viewer_doc').attr('src',pdffile_url);
                $('#viewer_doc').show();
            }
        }

    </script>
@stop