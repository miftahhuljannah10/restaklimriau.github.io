@props(['icon', 'name', 'route' => '#', 'active' => false])

<li>
    <a href="{{ $route }}"
       class="flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-150 cursor-pointer
              {{ $active ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
        <i data-lucide="{{ $icon }}" class="w-5 h-5 flex-shrink-0"></i>
        <span x-show="!$parent.collapsed" class="transition-all duration-200">{{ $name }}</span>
    </a>
</li>
