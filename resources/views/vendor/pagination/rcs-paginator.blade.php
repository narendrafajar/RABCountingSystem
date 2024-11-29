<p class="m-0 text-muted">@lang('showing') <span>{{ ((($paginator->currentPage() - 1) * $paginator->perPage())) + 1 }}</span> @lang('to') <span>{{ (($paginator->currentPage() * $paginator->perPage()) - (floor($paginator->currentPage() / $paginator->lastPage()) * abs($paginator->total() - ($paginator->currentPage() * $paginator->perPage())))) }}</span> @lang('of') <span>{{$paginator->total()}}</span> @lang('entries')</p>
<ul class="pagination m-0 ms-auto">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
				<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
				
				@lang('pagination.previous')
			</a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="#" onclick="loadTable({{ '"' . $tablename . '"' . ', ' . $paginator->currentPage() - 1 }})">
				<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
				
				@lang('pagination.previous')
			</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="#" onclick="loadTable( {{ '"' . $tablename . '"' . ', ' . $paginator->currentPage() + 1 }} )">
                @lang('pagination.next') <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                
            </a>
        </li>
    @else
        <li class="page-item disabled" aria-disabled="true">
            <a class="page-link" href="#">
              @lang('pagination.next') <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
            </a>
        </li>
    @endif
</ul>