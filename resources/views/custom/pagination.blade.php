<div class="d-flex align-items-center justify-content-between py-2">
    @if ($paginator->onFirstPage())
        <span class="py-2 px-4 bg-gray-300 text-gray-600 rounded-start">Previous</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="py-2 px-4 bg-primary text-white rounded-start hover:bg-primary-dark">Previous</a>
    @endif

    <div class="d-flex">
        @if ($paginator->currentPage() > 4)
            <a href="{{ $paginator->url(1) }}" class="py-2 px-4 bg-gray-300 text-gray-600 hover:bg-primary hover:text-white">1</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="py-2 px-4 bg-gray-300 text-gray-600">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="py-2 px-4 bg-primary text-white">{{ $page }}</span>
                    @elseif ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                        <a href="{{ $url }}" class="py-2 px-4 bg-gray-300 text-gray-600 hover:bg-primary hover:text-white">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->currentPage() < $paginator->lastPage() - 3)
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="py-2 px-4 bg-gray-300 text-gray-600 hover:bg-primary hover:text-white">{{ $paginator->lastPage() }}</a>
        @endif
    </div>

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="py-2 px-4 bg-primary text-white rounded-end hover:bg-primary-dark">Next</a>
    @else
        <span class="py-2 px-4 bg-gray-300 text-gray-600 rounded-end">Next</span>
    @endif
</div>
