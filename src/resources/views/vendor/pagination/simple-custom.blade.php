@if ($paginator->hasPages())
<nav class="pagination-group">
    <ul class="pagination-bar">
        {{-- Previous Page Link --}}
        <li class="pagination-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            @if ($paginator->onFirstPage())
            <span>&lt;</span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
            @endif
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        @if (is_array($element))
        @foreach ($element as $page => $url)
        <li class="pagination-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
            @if ($page == $paginator->currentPage())
            <span>{{ $page }}</span>
            @else
            <a href="{{ $url }}">{{ $page }}</a>
            @endif
        </li>
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        <li class="pagination-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">&gt;</a>
            @else
            <span>&gt;</span>
            @endif
        </li>
    </ul>
</nav>
@endif