<div class="bannerHead" style="background: url('{{ asset('lib/storage/app/banner/'.$banner->ban_img) }}') no-repeat center /cover;">
    <div class="bannerHeadMain">
        <h1 class="bannerHeadMainTitle">Cedu</h1>
        <div class="bannerHeadMainContent">Thắp sáng tri thức, Chắp cánh ước mơ</div>
        <form class="formSearchBanner" method="get" action="{{asset('search/')}}">
            <input type="text" name="search" placeholder="Tìm kiếm các khóa học">
            <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</div>
