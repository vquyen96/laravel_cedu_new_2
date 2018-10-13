<!DOCTYPE html>
<html>
<head>
    <title>Affiliate</title>
    <base href="{{asset('public/layout/frontend')}}/">
    <link rel="shortcut icon" href="img/LOGO_CEDU1.png">
    <meta charset="utf-8">
    <meta property="og:url" 		content="http://ceduvn.com/" />
    <meta property="fb:app_id" 		content="1577563652342523" />
    <meta property="og:title" 		content="Cộng tác viên bán kháo học" />
    <meta property="og:description" content="" />
    <meta property="og:image" 		content="" />
    <meta property="og:image:type" 	content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:500|Roboto:400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font/all.css">
    <link rel="stylesheet" type="text/css" href="css/affiliate.css">
    <link rel="stylesheet" type="text/css" href="css/layout/footer.css">
</head>
<body>
<div class="masterError">
    <div class="masterErrorContent">
        @include('errors.note')
    </div>
</div>
<div class="header">
    <div class="headerLogo">
        <a href="{{ asset('') }}">
            <img src="{{asset('public/layout/frontend/img/LOGO_CEDU1.png')}}">
        </a>
    </div>
    <div class="headerMenu">
        <ul>
            <li class="headerMenu1">
                Affiliate Marketing là gì?
            </li>
            <li class="headerMenu2">
                Quy trình
            </li>
            <li class="headerMenu3">
                Lý do chọn Cedu
            </li>
            <li class="headerMenu4">
                Chương trình
            </li>
        </ul>
    </div>
    <div class="headerForm">
        <div class="headerFromMain">
            <p>ĐĂNG KÝ ĐỂ TRỞ THÀNH</p>
            <p>AFFILIATE MARKETING</p>
            <form method="post">
                @if(Auth::guest())
                    <input type="text" name="name" placeholder="Họ và tên">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Mật khẩu">
                    <input type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                @else
                    <div class="formItem"><b>Họ và tên: </b> {{Auth::user()->name}}</div>
                    <div class="formItem"><b>Email: </b> {{Auth::user()->email}}</div>
                @endif


                <input type="submit" name="sbm" value="Đăng ký">
                {{@csrf_field()}}
            </form>
        </div>
        <div class="headerFormPhone">
            <img src="{{asset('public/layout/frontend/img/tel.png')}}">
            (+84) 888 790 111
        </div>
    </div>
    <div class="headerContent">
        <span class="txt30 yell">TRỞ THÀNH ĐỐI TÁC </span>
        <span class="txt30">PHÂN PHỐI </span><br>
        <span class="txt30">KHÓA HỌC CỦA </span>
        <span class="txt30 yell">CEDU</span>
        <p>Khóa học chất lượng - Đăng ký dễ dàng - Hưởng hoa hồng hấp dẫn</p>
    </div>
</div>
<div class="about">
    <div class="aboutMain">
        <h3>Affiliate Marketing là gì?</h3>
        <div class="left">
            <div class="logo">
                <img src="{{ asset('public/layout/frontend/img/user1.png') }}">
                <p>Khách hàng</p>
            </div>
            <div class="content">
                <p>Người mua sản phẩm, dịch vụ trực tuyến của nhà cung cấp thông qua liên kết giới thiệu của các đối tác (Affiliater).</p>
            </div>
        </div>
        <div class="mid">
            <div class="logo">
                <img src="{{ asset('public/layout/frontend/img/Vector Smart Object4.png') }}">
                <p>Affiliater</p>
            </div>
            <div class="content">
                <p>Maketer, affiliater, có sở hữu website, blog hay các trang mạng xã hội muốn kiếm thêm thu nhập từ việc quảng bá các sản phẩn của nhà cung cấp.</p>
            </div>
        </div>
        <div class="right">
            <div class="logo">
                <img src="{{ asset('public/layout/frontend/img/ic_nhacungcap.png') }}">
                <p>Nhà cung cấp</p>
            </div>
            <div class="content">
                <p>Maketer, affiliater, có sở hữu website, blog hay các trang mạng xã hội muốn kiếm thêm thu nhập từ việc quảng bá các sản phẩn của nhà cung cấp</p>
            </div>
        </div>
        <div class="arrowLeft">
            <img src="{{ asset('public/layout/frontend/img/arrow_right.png') }}">
        </div>
        <div class="arrowRight">
            <img src="{{ asset('public/layout/frontend/img/arrow_left_right.png') }}">
        </div>
    </div>
</div>
<div class="make">
    <div class="makeTitle">
        Quy trình kiếm tiền cùng CEDU
    </div>
    <div class="makeMain">
        <div class="makeItem">
            <div class="makeItemLogo">
                <img src="{{ asset('public/layout/frontend/img/Vector Smart Object5.png')}}">
            </div>
            <div class="makeItemContent">
                <h4>01. ĐĂNG KÝ</h4>
                <p>Sau khi đăng ký thành công, sẽ có đại diện bộ phận nhân sự xác nhận qua điện thoại.</p>
            </div>
        </div>
        <div class="makeItem">
            <div class="makeItemLogo">
                <img src="{{ asset('public/layout/frontend/img/ic_link.png')}}">
            </div>
            <div class="makeItemContent">
                <h4>02. LẤY LINK</h4>
                <p>Lựa chọn khóa học bạn yêu thích. Sau đó, click link AFFILIATE dành riêng cho bạn.</p>
            </div>
        </div>
        <div class="makeItem">
            <div class="makeItemLogo">
                <img src="{{ asset('public/layout/frontend/img/Vector Smart Object1.png') }}">
            </div>
            <div class="makeItemContent">
                <h4>03. CHIA SẺ KHÓA HỌC</h4>
                <p>Chia sẽ link vừa nhận trên các website, blog hay các trang mạng xã hội.</p>
            </div>
        </div>
        <div class="makeItem">
            <div class="makeItemLogo">
                <img src="{{ asset('public/layout/frontend/img/Vector Smart Object2.png') }}">
            </div>
            <div class="makeItemContent">
                <h4>04. NHẬN HOA HỒNG</h4>
                <p>Bạn sẽ nhận được hoa hồng >=35% khi khách hàng vào link AFFILIATE của bạn để mua khóa học.</p>
            </div>
        </div>
    </div>

</div>
<div class="why">
    <div class="whyHeader">
        Lý do bạn nên chọn CEDU
    </div>
    <div class="whyMain">
        <div class="whyMainItem">
            <img src="{{ asset('public/layout/frontend/img/Vector Smart Object.png') }}">
            <div class="whyMainItemContent">
                <h3>01</h3>
                <p>Hệ thống các khóa học đa dạng, chất lượng</p>
            </div>
        </div>
        <div class="whyMainItem">
            <img src="{{ asset('public/layout/frontend/img/Vector Smart Object.png') }}">
            <div class="whyMainItemContent">
                <h3>02</h3>
                <p>Được hưởng hoa hồng lên đến 35%</p>
            </div>
        </div>
        <div class="whyMainItem">
            <img src="{{ asset('public/layout/frontend/img/Vector Smart Object.png') }}">
            <div class="whyMainItemContent">
                <h3>03</h3>
                <p>Đội ngũ tư vấn, hỗ trợ chuyên nghiệp</p>
            </div>
        </div>
    </div>
</div>
<div class="step">
    <div class="stepTitle">
        Chương trình AFFILIATE tại CEDU
    </div>
    <div class="stepContent">
        <div class="stepContentItem">

            <div class="boder"></div>
            <div class="stt">1</div>
            <div class="circle"></div>
            <p>Chương trình liên kết CEDU Affiliate cung cấp hàng nghìn link tới các khóa học với nhiều chuyên ngành khác nhau - như Luyện thi THPT Quốc gia, IT, Kỹ năng mềm... và mức hoa hồng lớn hơn 35% cho mỗi khóa học được bán thông qua quảng cáo của bạn.</p>
        </div>
        <div class="stepContentItem">

            <div class="boder"></div>
            <div class="stt">2</div>
            <div class="circle"></div>
            <p>Dữ liệu được lưu trữ trong 30 ngày. Ngay cả khi khách hàng không thực hiện mua khóa học ngay sau khi nhấp vào quảng cáo của bạn, CEDU vẫn sẽ tính doanh số bán hàng cho bạn nếu việc mua khóa học diễn ra trong vòng 30 ngày.</p>
        </div>
        <div class="stepContentItem">

            <div class="boder"></div>
            <div class="stt">3</div>
            <div class="circle"></div>
            <p>Nếu có nhiều Affiliater tiếp cận 1 khách hàng thì Affiliater cuối cùng sẽ được tính hoa hồng.</p>
        </div>
        <div class="stepContentItem">

            <div class="boder"></div>
            <div class="stt">4</div>
            <div class="circle"></div>
            <p>Thanh toán ngày 10 hàng tháng. Hạn mức thanh toán 400.000đ. Nếu Affiliater không đạt được hạn mức thì sẽ được cộng vào tháng sau. </p>
        </div>
        <div class="stepContentItem">

            <div class="boder"></div>
            <div class="stt">5</div>
            <div class="circle"></div>
            <p>Kênh nhận thanh toán hoa hồng: Paypal, Ngân lượng, thẻ ATM.</p>
        </div>
    </div>
</div>
<div class="btnScrollTop">
    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
</div>

@include('frontend/layout/footer')
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/affiliate.js"></script>
</body>
</html>