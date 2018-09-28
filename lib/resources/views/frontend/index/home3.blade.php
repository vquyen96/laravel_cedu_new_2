<div class="container">
    <div class="row courseHead">
        <div class="col-md-4">
            <div class="courseTitle">
                <div class="courseTitleBig">
                    Khóa học
                </div>
                <div class="courseTitleSmail">
                    Chúng tôi cung cấp cho các bạn những khoá học đa dạng và chất lượng nhất
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="courseSelect">
                <select class="form-control" name="course" id="select_course">
                    <option value="1">Các khoá học mới nhất</option>
                    <option value="2">Các khoá học được quan tâm</option>
                    <option value="3">Các khoá học đánh giá cao nhất</option>
                </select>
            </div>
        </div>

    </div>
    <div class="row courseMain">
        @foreach($courses as $item)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseMainItem">
                    <div class="courseMainItemImg" style="background: url('{{ file_exists(storage_path('app/course/resized360-'.$item->cou_img)) ? asset('lib/storage/app/course/resized360-'.$item->cou_img) : 'img/no_image.jpg'}}') no-repeat center /cover;">
                        @if ($item->cou_sale != 0)
                            <div class="courseMainItemSale">
                                {{$item->cou_sale}}%
                            </div>

                        @endif
                        <div class="courseMainItemPrice">
                            {{number_format($item->cou_price,0,',','.')}}
                            <span class="courseMainItemTime">
										<i class="fa fa-circle" aria-hidden="true"></i>
                                {{time_format($item->updated_at)}}
									</span>

                        </div>

                    </div>
                    <div class="courseMainItemName">
                        {{cut_string($item->cou_name , 100)}}
                    </div>
                    <div class="courseMainItemTeacher">
                        <div class="courseMainItemTeacherAva" style="background: url('{{ file_exists(storage_path('app/avatar/resized50-'.$item->tea->img)) ? asset('lib/storage/app/avatar/resized50-'.$item->tea->img) : ($item->tea->provider_id != null ? $item->tea->img : 'img/no-avatar.jpg') }}') no-repeat center /cover;">
                        </div>
                        <div class="courseMainItemTeacherName">
                            {{ $item->tea->name }}
                        </div>
                        <div class="courseMainItemStar">
                            @for($i=0;$i<5;$i++)
                                @if($item->cou_star > $i)
                                    <i class="fa fa-star starActive" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endif
                            @endfor
                        </div>
                    </div>

                </a>
            </div>
        @endforeach
        <div class="loadingCourse">
            <img>
        </div>
    </div>
</div>