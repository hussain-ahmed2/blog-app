@if ($paginator->hasPages())
    <nav class="flex items-center justify-between w-full text-slate-700">
        <div class="flex justify-between flex-1 sm:hidden">
            <ul class="flex justify-center items-center w-full space-x-8">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="cursor-default opacity-50" aria-disabled="true">
                        <span class="">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="">
                        <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="">
                        <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="cursor-default opacity-50" aria-disabled="true">
                        <span class="">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="hidden sm:flex items-center justify-between w-full">
            <div class="">
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="font-medium">
                <ul class="flex items-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="cursor-default opacity-50" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="text-2xl page" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="">
                            <a class="text-2xl page" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="cursor-default opacity-50" aria-disabled="true"><span class="">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="text-cyan-600 page active-page" aria-current="page"><span class="">{{ $page }}</span></li>
                                @else
                                    <li class=""><a class="page" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="">
                            <a class="text-2xl page" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="cursor-default opacity-50 page" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="text-2xl" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
