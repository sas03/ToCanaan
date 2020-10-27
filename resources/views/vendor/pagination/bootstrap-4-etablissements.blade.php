@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        <li class="page-arrow" id="page-prev"><</li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                  

                  <li class="page-num" num_page="{{ $page }}">{{ $page }}</li>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-arrow" id="page-next">></li>{{-- &raquo; --}}
        @else
            <li class="page-arrow disabled">></li>
        @endif
    </ul>
@endif
