<div class="flex items-center justify-between py-2">
    @if ($paginator->onFirstPage())
        <span class="py-2 px-4 bg-gray-300 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-l">Previous</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="py-2 px-4 bg-blue-500 dark:bg-blue-700 text-white dark:text-gray-200 rounded-l hover:bg-blue-600">Previous</a>
    @endif

    <div class="flex">
        @if ($paginator->currentPage() > 4)
            <a href="{{ $paginator->url(1) }}" class="py-2 px-4 bg-gray-300 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-blue-500 hover:text-white">1</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="py-2 px-4 bg-gray-300 dark:bg-gray-700 text-gray-600 dark:text-gray-300">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="py-2 px-4 bg-blue-500 dark:bg-blue-700 text-white dark:text-gray-200">{{ $page }}</span>
                        @elseif ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2)
                        <a href="{{ $url }}" class="py-2 px-4 bg-gray-300 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-blue-500 hover:text-white">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->currentPage() < $paginator->lastPage() - 3)
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="py-2 px-4 bg-gray-300 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-blue-500 hover:text-white">{{ $paginator->lastPage() }}</a>
        @endif
    </div>

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="py-2 px-4 bg-blue-500 dark:bg-blue-700 text-white dark:text-gray-200 rounded-r hover:bg-blue-600">Next</a>
    @else
        <span class="py-2 px-4 bg-gray-300 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-r">Next</span>
    @endif
</div>
