@props([
    'variant' => 'primary',
    'size' => 'md',
    'loading' => false,
    'loadingText' => 'Loading...',
    'icon' => null,
])

@php
    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-white',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 focus:ring-gray-500 text-white',
        'success' => 'bg-green-600 hover:bg-green-700 focus:ring-green-500 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500 text-white',
    ];

    $sizes = [
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-6 py-3 text-base',
        'lg' => 'px-8 py-4 text-lg',
    ];

    $classes = $variants[$variant] . ' ' . $sizes[$size];
@endphp

<button type="submit"
    class="inline-flex items-center justify-center font-medium rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $classes }} {{ $loading ? 'opacity-75 cursor-not-allowed' : 'hover:shadow-lg transform hover:-translate-y-0.5' }}"
    {{ $loading ? 'disabled' : '' }} {{ $attributes }} x-data="{ loading: @js($loading) }"
    @click="loading = true; setTimeout(() => loading = false, 3000)">

    <span x-show="!loading" class="flex items-center">
        @if ($icon)
            <i class="{{ $icon }} mr-2"></i>
        @endif
        {{ $slot }}
    </span>

    <span x-show="loading" class="flex items-center">
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-current" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        {{ $loadingText }}
    </span>
</button>
