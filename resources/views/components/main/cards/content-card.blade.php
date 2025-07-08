@props([
    'title' => null,
    'subtitle' => null,
    'footer' => null,
    'padding' => 'normal', // tight, normal, loose
    'shadow' => 'normal', // none, sm, normal, lg, xl
    'rounded' => 'lg',
    'border' => true,
])

@php
    $paddings = [
        'tight' => 'p-4',
        'normal' => 'p-6',
        'loose' => 'p-8',
    ];

    $shadows = [
        'none' => '',
        'sm' => 'shadow-sm',
        'normal' => 'shadow-lg',
        'lg' => 'shadow-xl',
        'xl' => 'shadow-2xl',
    ];

    $paddingClass = $paddings[$padding] ?? $paddings['normal'];
    $shadowClass = $shadows[$shadow] ?? $shadows['normal'];
    $borderClass = $border ? 'border border-gray-200' : '';
@endphp

<div
    class="bg-white rounded-{{ $rounded }} {{ $shadowClass }} {{ $borderClass }} overflow-hidden hover:shadow-xl transition-shadow duration-300">
    @if ($title || $subtitle)
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            @if ($title)
                <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
            @endif
            @if ($subtitle)
                <p class="mt-1 text-sm text-gray-600">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="{{ $paddingClass }}">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            {{ $footer }}
        </div>
    @endif
</div>
