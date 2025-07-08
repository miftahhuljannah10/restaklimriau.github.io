{{--
    Search Input Component
    Komponen input search dengan fitur autocomplete

    Props:
    - placeholder: Placeholder text
    - action: Form action URL
    - method: HTTP method (default: GET)
    - name: Input name (default: search)
    - value: Current search value
    - showFilters: Boolean untuk show/hide filter toggle
--}}

@props([
    'placeholder' => 'Cari data...',
    'action' => '',
    'method' => 'GET',
    'name' => 'search',
    'value' => '',
    'showFilters' => false,
])

@php
    $value = $value ?: request($name);
@endphp

<div class="flex flex-col sm:flex-row gap-4 mb-6" x-data="{ showFilters: false }">
    {{-- Search Form --}}
    <div class="flex-1">
        <form action="{{ $action }}" method="{{ $method }}" class="relative">
            @if (strtoupper($method) !== 'GET')
                @csrf
            @endif

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <input type="text" name="{{ $name }}" value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    class="block w-full pl-10 pr-12 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                    autocomplete="off">

                @if ($value)
                    <a href="{{ request()->url() }}"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200"
                        title="Clear search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Filter & Actions --}}
    <div class="flex gap-2">
        @if ($showFilters)
            <button @click="showFilters = !showFilters"
                :class="showFilters ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
                class="px-4 py-2.5 border border-gray-300 rounded-lg font-medium transition-colors duration-200 inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span class="hidden sm:inline">Filter</span>
            </button>
        @endif

        {{-- Additional Actions Slot --}}
        {{ $actions ?? '' }}
    </div>

    {{-- Filter Panel --}}
    @if ($showFilters)
        <div x-show="showFilters" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute top-full left-0 right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg z-10 p-4"
            style="display: none;">

            <form action="{{ $action }}" method="{{ $method }}" class="space-y-4">
                @if (strtoupper($method) !== 'GET')
                    @csrf
                @endif

                {{-- Keep current search --}}
                @if ($value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endif

                {{-- Filter Content Slot --}}
                {{ $filters ?? '' }}

                {{-- Filter Actions --}}
                <div class="flex gap-2 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200">
                        Terapkan Filter
                    </button>
                    <a href="{{ request()->url() }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors duration-200">
                        Reset
                    </a>
                </div>
            </form>
        </div>
    @endif
</div>

{{-- Search Results Info --}}
@if ($value)
    <div class="mb-4 text-sm text-gray-600">
        <span>Hasil pencarian untuk: </span>
        <span class="font-semibold text-gray-900">"{{ $value }}"</span>
        {{ $slot }}
    </div>
@endif
