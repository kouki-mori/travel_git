@if ($paginator->hasPages())
<div class="col2-pagewrap">
    <ul class="pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li><span class="m-prev" hidden>前へ</span></li>
        @else
        <li><a href="{{ $paginator->url(1) }}" rel="prev" class="m-prev">&laquo;</a></li>
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="m-prev">前へ</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li><span class="m-prev">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="current"><span>{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="m-prev">後へ</a></li>
        <li><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next" class="m-prev">&raquo;</a></li>
        @else
        <li><span class="m-next" hidden>後へ</span></li>
        @endif

        {{-- latest page ling --}}

    </ul>
</div>
@endif