@if ($paginator->hasPages())
    <nav aria-label="Dashboard pagination" class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mt-4">
        <div class="text-muted small">
            Showing <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            to <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            of <span class="fw-semibold">{{ $paginator->total() }}</span> results
        </div>

        <div class="d-flex align-items-center gap-2 flex-wrap">
            <ul class="pagination pagination-rounded mb-0">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link px-3"><i class="fa-solid fa-chevron-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link px-3" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </li>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link px-3">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link px-3 bg-primary border-primary text-white">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link px-3" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link px-3" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link px-3"><i class="fa-solid fa-chevron-right"></i></span>
                    </li>
                @endif
            </ul>

            <span class="text-muted small d-none d-sm-inline">Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>
        </div>
    </nav>
@endif
