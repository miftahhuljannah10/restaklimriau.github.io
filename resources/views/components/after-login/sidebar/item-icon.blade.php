@props(['icon', 'name', 'route' => '#'])

@php
    // Jika $route adalah string biasa (tanpa titik), anggap itu URL penuh, bukan nama route
    $isActive = Str::startsWith($route, 'http') ? request()->url() === $route : request()->routeIs($route);
@endphp

<li>
    <a href="{{ $route }}"
        class="flex items-center gap-3 px-4 py-2 rounded-md transition-all
              {{ $isActive ? 'bg-blue-100 text-blue-700 font-medium' : 'text-gray-600 hover:text-blue-600 hover:bg-blue-100' }}">

        <i data-lucide="{{ $icon }}" class="w-4 h-4"></i>
        <span>{{ $name }}</span>
    </a>
</li>
