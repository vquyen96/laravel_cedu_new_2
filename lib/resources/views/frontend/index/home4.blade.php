<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="teacherTitle">
                <div class="teacherTitleLeft">
                    Giáo viên tiêu biểu
                </div>
                <div class="teacherTitleRight">
                    Những giao viên trẻ tài năng chất lương luôn tìm tòi nhưng phương pháp sáng tạo nhất để giảng dạy.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel">
                @foreach($teacher as $item)
                    <div class="owlItem">
                        <a href="{{ asset('teacher/'.$item->acc->email) }}" class="owlItemImg" style="background: url('{{ file_exists(storage_path('app/avatar/resized250-'.$item->acc->img)) ? asset('lib/storage/app/avatar/resized250-'.$item->acc->img) : ($item->acc->provider == 'facebook' ? str_replace('type=normal', 'width=1920', $item->acc->img) : ($item->acc->provider == 'google' ? str_replace('?sz=50', '', $item->acc->img) : 'img/no-avatar.jpg')) }}') no-repeat center /cover ;">
                        </a>
                        <a href="{{ asset('teacher/'.$item->acc->email) }}" class="owlItemName">
                            {{ $item->acc->name }}
                        </a>
                        <div class="owlItemContent">
                            {!! cut_string($item->acc->summary, 200) !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    var owl = $(".owl-carousel");
    owl.owlCarousel({
        loop: true,
        autoplay: false,
        items: 3,
        nav:true,
        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        animateOut: 'fadeOut'
    });
    owl.on('changed.owl.carousel',function(property){
        $(property.target).find(".owl-item").find('.owlItemImg').css({'width': '184px', 'margin': '50px auto 20px'});
        $(property.target).find(".owl-item").find('.owlItemContent').css('display', 'none');
        var current = property.item.index;
        // $(property.target).find(".owl-item").eq(current).find('.owlItemImg').css('width', '184px');
        // $(property.target).find(".owl-item").eq(current).find('.owlItemContent').css('display', 'none');

        $(property.target).find(".owl-item").eq(current+1).find('.owlItemImg').css({'width': '250px', 'margin': '0 auto 40px'});
        $(property.target).find(".owl-item").eq(current+1).find('.owlItemContent').css('display', 'block');

        // $(property.target).find(".owl-item").eq(current+2).find('.owlItemImg').css('width', '184px');
        // $(property.target).find(".owl-item").eq(current+2).find('.owlItemContent').css('display', 'none');

    });
    $('.owl-next').click();
</script>