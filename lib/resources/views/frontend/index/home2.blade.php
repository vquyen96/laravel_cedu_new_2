@foreach($groups as $item)
    <div class="listGroupItem">
        <a href="{{ asset('courses/'.$item->gr_slug) }}" class="listGroupItemImg">
            <img src="{{ asset('lib/storage/app/group/'.$item->gr_img) }}">
        </a>
        <a href="{{ asset('courses/'.$item->gr_slug) }}" class="listGroupItemContent">
            {{ $item->gr_name }}
        </a>
    </div>
@endforeach