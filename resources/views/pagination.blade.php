@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item"> <a href="#" class='page-link disabled'><span>Previous</span></a></li>
        @else
            <li class='page-item'><a class='page-link' href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item">a<a href="#" class='page-link disabled'> <span >{{ $element }}</span></a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item"><a href="#" class='disabled page-link'> <span>{{ $page }}</span></a></li>
                    @else
                        <li class='page-item'><a class='page-link' href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class='page-item'><a class='page-link' href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li class="disabled page-item"><a href="#" class='page-link disabled'> <span>Next</span></a></li>
        @endif
    </ul>
@endif
