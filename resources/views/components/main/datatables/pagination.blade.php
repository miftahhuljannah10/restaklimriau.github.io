{{--
    Simple Pagination Component
    Komponen pagination sederhana untuk Laravel

    Props:
    - paginator: Laravel paginator object
    - showInfo: Boolean untuk show/hide pagination info (default: true)
--}}

@props([
    'paginator' => null,
    'showInfo' => true,
])

@if ($paginator && $paginator->hasPages())
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-6 pt-4 border-t border-gray-200">
        {{-- Pagination Info --}}
        @if ($showInfo)
            <div class="text-sm text-gray-700">
                Menampilkan {{ $paginator->firstItem() }} sampai {{ $paginator->lastItem() }} dari
                {{ $paginator->total() }} data
            </div>
        @endif

        {{-- Pagination Links --}}
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    Previous
                </a>
            @endif

            {{-- Pagination Elements with safe check --}}
            @php
                $elements = $paginator->getUrlRange(1, $paginator->lastPage());
            @endphp

            @foreach ($elements as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                        class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    Next
                </a>
            @else
                <span
                    class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    Next
                </span>
            @endif
        </nav>
    </div>

    {{-- Mobile Pagination --}}
    <div class="sm:hidden flex justify-between items-center mt-4 pt-4 border-t border-gray-200">
        @if ($paginator->onFirstPage())
            <span
                class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                Previous
            </a>
        @endif

        <span class="text-sm text-gray-700">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                Next
            </a>
        @else
            <span
                class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                Next
            </span>
        @endif
    </div>
@endif
