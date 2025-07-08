@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'rows' => 4,
    'helpText' => null,
    'maxlength' => null,
])

<div class="mb-6">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">
            {{ $label }}
            @if ($required)
                <span class="text-red-500 ml-1">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
            class="block w-full px-4 py-3 text-base border border-gray-300 rounded-lg shadow-sm transition-all duration-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 hover:border-gray-400 resize-none @error($name) border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
            @if ($required) required @endif @if ($disabled) disabled @endif
            @if ($maxlength) maxlength="{{ $maxlength }}" @endif {{ $attributes }} x-data="{
                count: {{ strlen(old($name, $value)) }},
                max: {{ $maxlength ?? 'null' }}
            }"
            x-on:input="count = $event.target.value.length">{{ old($name, $value) }}</textarea>

        @if ($maxlength)
            <div class="absolute bottom-2 right-2 text-xs text-gray-400" x-show="max">
                <span x-text="count"></span>/<span x-text="max"></span>
            </div>
        @endif
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-600 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            {{ $message }}
        </p>
    @enderror

    @if ($helpText && !$errors->has($name))
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>
