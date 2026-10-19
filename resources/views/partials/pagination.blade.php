@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="my-4">

        {{-- Mobiilivaade: ainult eelmine ja järgmine --}}
        <div class="join grid grid-cols-2 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="join-item btn btn-outline btn-disabled" aria-disabled="true">{!! __('pagination.previous') !!}</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="join-item btn btn-outline">{!! __('pagination.previous') !!}</a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn btn-outline">{!! __('pagination.next') !!}</a>
            @else
                <span class="join-item btn btn-outline btn-disabled" aria-disabled="true">{!! __('pagination.next') !!}</span>
            @endif
        </div>

        {{-- Suurem ekraan: kokkuvõte ja lehekülgede numbrid --}}
        <div class="hidden sm:flex items-center justify-between gap-2">
            <p class="text-sm opacity-70">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>

            <div class="join">
                @if ($paginator->onFirstPage())
                    <span class="join-item btn btn-disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">&laquo;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="join-item btn" aria-label="{{ __('pagination.previous') }}">&laquo;</a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="join-item btn btn-disabled" aria-disabled="true">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="join-item btn btn-active" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="join-item btn" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn" aria-label="{{ __('pagination.next') }}">&raquo;</a>
                @else
                    <span class="join-item btn btn-disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">&raquo;</span>
                @endif
            </div>
        </div>
    </nav>
@endif
