@if ($paginator->hasPages())
    <div class="paginatoin-area section-pt animate__fadeIn animate__animated" data-animate="animate__fadeIn">

        <nav aria-label="Page navigation">
            <ul class="pagination ul-mt5 align-items-center justify-content-center pagination-box">

                {{-- First --}}
                <li class="page-item first {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $paginator->onFirstPage() ? 'javascript:void(0)' : $paginator->url(1) }}"
                        class="page-link p-0 m-0 bg-transparent border-0 lh-1">
                        First
                    </a>
                </li>

                {{-- Previous --}}
                <li class="page-item prev {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a href="{{ $paginator->previousPageUrl() ?? 'javascript:void(0)' }}"
                        class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                        aria-label="Previous">
                        <i class="ri-arrow-left-line d-block lh-1"></i>
                    </a>
                </li>

                {{-- Page Numbers --}}
                @foreach ($elements as $element)
                    {{-- Dots --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="page-item">
                                <a href="{{ $url }}"
                                    class="page-link d-flex align-items-center justify-content-center p-0 m-0 heading-weight border-0 border-radius lh-1 {{ $page == $paginator->currentPage() ? 'active' : '' }}"
                                    aria-label="Page {{ $page }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                <li class="page-item next {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a href="{{ $paginator->nextPageUrl() ?? 'javascript:void(0)' }}"
                        class="page-link icon-16 d-flex align-items-center justify-content-center p-0 m-0 bg-transparent border-0 border-radius"
                        aria-label="Next">
                        <i class="ri-arrow-right-line d-block lh-1"></i>
                    </a>
                </li>

                {{-- Last --}}
                <li class="page-item last {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                    <a href="{{ $paginator->currentPage() == $paginator->lastPage() ? 'javascript:void(0)' : $paginator->url($paginator->lastPage()) }}"
                        class="page-link p-0 m-0 bg-transparent border-0 lh-1">
                        Last
                    </a>
                </li>

            </ul>
        </nav>
    </div>
@endif
