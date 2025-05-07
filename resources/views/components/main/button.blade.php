@props(['variant' => 'primary'])
@props(['type' => 'button'])
@props(['p' => 'px-6 py-2'])

@php
    $buttonVariant = '';

    switch ($variant) {
        case 'secondary':
            $buttonVariant = 'bg-secondary-500 hover:bg-secondary-600';
            break;
        case 'danger':
            $buttonVariant = 'bg-red-500 hover:bg-red-600';
            break;
        case 'success':
            $buttonVariant = 'bg-green-500 hover:bg-green-600';
            break;
        case 'warning':
            $buttonVariant = 'bg-yellow-500 hover:bg-yellow-600';
            break;
        default:
            $buttonVariant = 'bg-primary-500 hover:bg-primary-600';
            break;
    }
@endphp

<button @if ($type != 'button') type="{{ $type }}" @endif
    {{ $attributes->merge(['class' => 'font-semibold flex items-center justify-center text-white rounded-md  transition-all duration-75 ease-in-out' . ' ' . $buttonVariant . ' ' . $p]) }}>
    {{ $slot }}
</button>
