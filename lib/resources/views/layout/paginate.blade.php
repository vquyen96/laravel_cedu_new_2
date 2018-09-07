@if ($paginator->hasPages())
    <ul class="paginationCourseAll">
        {{-- Previous Page Link --}}
        {{-- @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif --}}

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class=" disabled"><a class="pageLink">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a class="pageLink">{{ $page < 10 ? '0'.$page : $page }}</a></li>
                    @else
                        <li class=""><a class="pageLink" href="{{ $url }}">{{ $page < 10 ? '0'.$page : $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="">
                <a class="pageLink" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
        @else
            <li class=" disabled">
                <a class="pageLink">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
