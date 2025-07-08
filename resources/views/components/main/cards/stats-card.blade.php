@props([
    'title',
    'value',
    'icon' => null,
    'color' => 'blue',
    'trend' => null,
    'trendType' => 'up',
    'description' => null,
    'url' => null,
    'animated' => true,
])

@php
    $colors = [
        'blue' => [
            'gradient' => 'from-blue-500 to-blue-600',
            'text' => 'text-blue-600',
            'border' => 'border-blue-200',
            'bg' => 'bg-blue-50',
        ],
        'green' => [
            'gradient' => 'from-green-500 to-green-600',
            'text' => 'text-green-600',
            'border' => 'border-green-200',
            'bg' => 'bg-green-50',
        ],
        'yellow' => [
            'gradient' => 'from-yellow-500 to-yellow-600',
            'text' => 'text-yellow-600',
            'border' => 'border-yellow-200',
            'bg' => 'bg-yellow-50',
        ],
        'red' => [
            'gradient' => 'from-red-500 to-red-600',
            'text' => 'text-red-600',
            'border' => 'border-red-200',
            'bg' => 'bg-red-50',
        ],
        'purple' => [
            'gradient' => 'from-purple-500 to-purple-600',
            'text' => 'text-purple-600',
            'border' => 'border-purple-200',
            'bg' => 'bg-purple-50',
        ],
        'indigo' => [
            'gradient' => 'from-indigo-500 to-indigo-600',
            'text' => 'text-indigo-600',
            'border' => 'border-indigo-200',
            'bg' => 'bg-indigo-50',
        ],
        'pink' => [
            'gradient' => 'from-pink-500 to-pink-600',
            'text' => 'text-pink-600',
            'border' => 'border-pink-200',
            'bg' => 'bg-pink-50',
        ],
        'gray' => [
            'gradient' => 'from-gray-500 to-gray-600',
            'text' => 'text-gray-600',
            'border' => 'border-gray-200',
            'bg' => 'bg-gray-50',
        ],
    ];

    $colorConfig = $colors[$color] ?? $colors['blue'];
@endphp

<div class="relative bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 {{ $animated ? 'transform hover:-translate-y-1' : '' }} group"
    x-data="{
        count: 0,
        target: {{ is_numeric($value) ? $value : 0 }},
        animated: {{ $animated ? 'true' : 'false' }}
    }" x-init="if (animated && target > 0) {
        let start = 0;
        let increment = target / 30;
        let timer = setInterval(() => {
            start += increment;
            count = Math.floor(start);
            if (count >= target) {
                count = target;
                clearInterval(timer);
            }
        }, 50);
    } else {
        count = target;
    }">

    <!-- Gradient Background Overlay -->
    <div
        class="absolute inset-0 bg-gradient-to-br {{ $colorConfig['gradient'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-300">
    </div>

    <!-- Main Content -->
    <div class="relative p-6">
        <div class="flex items-center justify-between">
            <!-- Left Side - Content -->
            <div class="flex-1 min-w-0">
                <!-- Title -->
                <p class="text-sm font-medium text-gray-600 truncate mb-1">{{ $title }}</p>

                <!-- Value with Animation -->
                <div class="flex items-baseline mt-2">
                    <p class="text-3xl font-bold text-gray-900 tabular-nums">
                        @if (is_numeric($value))
                            <span x-text="count.toLocaleString()"></span>
                        @else
                            {{ $value }}
                        @endif
                    </p>

                    <!-- Trend Indicator -->
                    @if ($trend)
                        <div class="ml-3 flex items-center">
                            @if ($trendType === 'up')
                                <div class="flex items-center text-green-600">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span class="text-sm font-medium">{{ $trend }}</span>
                                </div>
                            @elseif($trendType === 'down')
                                <div class="flex items-center text-red-600">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                    </svg>
                                    <span class="text-sm font-medium">{{ $trend }}</span>
                                </div>
                            @else
                                <div class="flex items-center text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4"></path>
                                    </svg>
                                    <span class="text-sm font-medium">{{ $trend }}</span>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Description -->
                @if ($description)
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">{{ $description }}</p>
                @endif
            </div>

            <!-- Right Side - Icon -->
            @if ($icon)
                <div class="flex-shrink-0 ml-4">
                    <div
                        class="w-14 h-14 bg-gradient-to-br {{ $colorConfig['gradient'] }} rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 transform group-hover:scale-110">
                        <i class="{{ $icon }} text-2xl text-white"></i>
                    </div>
                </div>
            @endif
        </div>

        <!-- Action Link -->
        @if ($url)
            <div class="mt-4 pt-4 border-t border-gray-100">
                <a href="{{ $url }}"
                    class="inline-flex items-center text-sm font-medium {{ $colorConfig['text'] }} hover:opacity-75 transition-all duration-200 group/link">
                    <span>Lihat Detail</span>
                    <svg class="ml-2 w-4 h-4 transform transition-transform duration-200 group-hover/link:translate-x-1"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>

    <!-- Animated Progress Bar (Optional) -->
    @if ($animated && is_numeric($value))
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100">
            <div class="h-full bg-gradient-to-r {{ $colorConfig['gradient'] }} transition-all duration-1000 ease-out"
                x-bind:style="'width: ' + (count / target * 100) + '%'"></div>
        </div>
    @endif

    <!-- Hover Border Effect -->
    <div
        class="absolute inset-0 border-2 border-transparent group-hover:{{ $colorConfig['border'] }} rounded-xl transition-colors duration-300 pointer-events-none">
    </div>
</div>

@push('styles')
    <style>
        .tabular-nums {
            font-variant-numeric: tabular-nums;
        }

        /* Pulse animation for icon */
        @keyframes pulse-icon {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .group:hover .icon-pulse {
            animation: pulse-icon 2s infinite;
        }
    </style>
@endpush
