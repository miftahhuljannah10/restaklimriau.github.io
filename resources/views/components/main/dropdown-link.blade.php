@props(['href' => '#'])

<a {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100']) }}
    href="{{ $href }}">
    {{ $slot }}
</a>
