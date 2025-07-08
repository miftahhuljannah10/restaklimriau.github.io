{{--
    Stat Card Component
    Komponen kartu statistik untuk dashboard

    Props:
    - title: Judul statistik
    - value: Nilai statistik
    - icon: Nama icon
    - color: Warna tema (blue, green, red, purple, yellow, indigo, emerald)
    - description: Deskripsi tambahan
    - trend: Trend naik/turun (optional)
    - trendValue: Nilai trend (optional)
--}}

@props([
    'title',
    'value',
    'icon' => 'chart-bar',
    'color' => 'blue',
    'description' => '',
    'trend' => null,
    'trendValue' => null,
])

@php
    $colorClasses = [
        'blue' => 'bg-blue-500 text-blue-50',
        'green' => 'bg-green-500 text-green-50',
        'red' => 'bg-red-500 text-red-50',
        'purple' => 'bg-purple-500 text-purple-50',
        'yellow' => 'bg-yellow-500 text-yellow-50',
        'indigo' => 'bg-indigo-500 text-indigo-50',
        'emerald' => 'bg-emerald-500 text-emerald-50',
    ];

    $iconClass = $colorClasses[$color] ?? $colorClasses['blue'];

    $icons = [
        'users' =>
            'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z',
        'badge-check' =>
            'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
        'newspaper' =>
            'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z',
        'document-text' =>
            'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        'inbox-in' =>
            'M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4',
        'paper-airplane' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8',
        'book-open' =>
            'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
        'chart-bar' =>
            'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
    ];

    $iconPath = $icons[$icon] ?? $icons['chart-bar'];
@endphp

<div
    class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 {{ $iconClass }} rounded-lg flex items-center justify-center shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $iconPath }}"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">{{ $title }}</dt>
                        <dd class="text-2xl font-bold text-gray-900">{{ number_format($value) }}</dd>
                        @if ($description)
                            <p class="text-xs text-gray-500 mt-1">{{ $description }}</p>
                        @endif
                    </div>
                </div>
            </div>

            @if ($trend && $trendValue)
                <div class="flex items-center ml-2">
                    @if ($trend === 'up')
                        <div class="flex items-center text-green-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 17l9.2-9.2M17 17V7H7"></path>
                            </svg>
                            <span class="text-xs font-medium">{{ $trendValue }}%</span>
                        </div>
                    @elseif($trend === 'down')
                        <div class="flex items-center text-red-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 7l-9.2 9.2M7 7v10h10"></path>
                            </svg>
                            <span class="text-xs font-medium">{{ $trendValue }}%</span>
                        </div>
                    @else
                        <div class="flex items-center text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14">
                                </path>
                            </svg>
                            <span class="text-xs font-medium">{{ $trendValue }}%</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
