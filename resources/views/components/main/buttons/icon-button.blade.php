@props(['icon', 'variant' => 'primary', 'size' => 'md', 'tooltip' => null, 'href' => null, 'type' => 'button'])

@php
    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white',
        'success' => 'bg-green-600 hover:bg-green-700 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        'info' => 'bg-cyan-600 hover:bg-cyan-700 text-white',
        'light' => 'bg-gray-100 hover:bg-gray-200 text-gray-800',
    ];

    $sizes = [
        'xs' => 'p-1 text-xs',
        'sm' => 'p-1.5 text-sm',
        'md' => 'p-2 text-base',
        'lg' => 'p-3 text-lg',
        'xl' => 'p-4 text-xl',
    ];

    $classes = $variants[$variant] . ' ' . $sizes[$size];
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }} @if ($href) href="{{ $href }}" @endif
    @if (!$href) type="{{ $type }}" @endif
    class="inline-flex items-center justify-center rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 hover:shadow-md transform hover:-translate-y-0.5 {{ $classes }}"
    @if ($tooltip) title="{{ $tooltip }}" @endif {{ $attributes }}>

    <i class="{{ $icon }}"></i>

    @if ($slot->isNotEmpty())
        <span class="sr-only">{{ $slot }}</span>
    @endif
    </{{ $tag }}>
