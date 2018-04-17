<div class="row u-mt-small mr-auto">
    <div class="col-md-12">

        @if ($paginator->hasPages())
            <ul class="c-pagination u-mb-medium">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li><a class="c-pagination__link" href="#"><i class="feather icon-chevron-left"></i> </a></li>
                @else
                    <li><a class="c-pagination__link" href="{{ $paginator->previousPageUrl() }}"><i class="feather icon-chevron-left"></i> </a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li><a class="c-pagination__link is-active" href="#">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li><a class="c-pagination__link is-active" href="#">{{ $page }}</a></li>
                            @else
                                <li><a class="c-pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a class="c-pagination__link" href="{{ $paginator->nextPageUrl() }}"> <i class="feather icon-chevron-right"></i> </a></li>
                @else
                    <li><a class="c-pagination__link" href=""> <i class="feather icon-chevron-right"></i> </a></li>
                @endif
            </ul>
        @endif

    </div>


</div>