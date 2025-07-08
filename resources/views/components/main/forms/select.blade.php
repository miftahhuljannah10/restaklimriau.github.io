@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => '',
    'placeholder' => 'Pilih opsi...',
    'required' => false,
    'disabled' => false,
    'multiple' => false,
    'helpText' => null,
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
        @php
            $hasError = $errors->has($name);
            $baseClasses =
                'block w-full px-4 py-3 text-base border rounded-lg shadow-sm transition-all duration-200 focus:ring-2 hover:border-gray-400 bg-white';
            $normalClasses = 'border-gray-300 focus:ring-blue-500 focus:border-blue-500';
            $errorClasses = 'border-red-500 focus:ring-red-500 focus:border-red-500';
            $selectClasses = $baseClasses . ' ' . ($hasError ? $errorClasses : $normalClasses);
        @endphp

        <select id="{{ $name }}" name="{{ $name }}{{ $multiple ? '[]' : '' }}" class="{{ $selectClasses }}"
            @if ($required) required @endif @if ($disabled) disabled @endif
            @if ($multiple) multiple @endif {{ $attributes }}>

            @if (!$multiple && $placeholder)
                <option value="">{{ $placeholder }}</option>
            @endif

            @if (is_array($options) && count($options) > 0)
                @foreach ($options as $option)
                    @if (is_array($option) && isset($option['value']) && isset($option['label']))
                        {{-- Array format: [['value' => '1', 'label' => 'Admin']] --}}
                        <option value="{{ $option['value'] }}"
                            @if ($multiple) {{ in_array($option['value'], (array) old($name, $selected)) ? 'selected' : '' }}
                            @else
                                {{ old($name, $selected) == $option['value'] ? 'selected' : '' }} @endif>
                            {{ $option['label'] }}
                        </option>
                    @else
                        {{-- Key-value format: ['1' => 'Admin'] --}}
                        @php
                            $optionValue = is_numeric($loop->index) ? $option : $loop->index;
                            $optionLabel = is_numeric($loop->index) ? $option : $option;
                        @endphp
                        <option value="{{ $optionValue }}"
                            @if ($multiple) {{ in_array($optionValue, (array) old($name, $selected)) ? 'selected' : '' }}
                            @else
                                {{ old($name, $selected) == $optionValue ? 'selected' : '' }} @endif>
                            {{ $optionLabel }}
                        </option>
                    @endif
                @endforeach
            @else
                {{ $slot }}
            @endif
        </select>

        <!-- Custom arrow for select -->
        @if (!$multiple)
            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
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
