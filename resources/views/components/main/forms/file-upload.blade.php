
@props([
    'name',
    'label' => null,
    'accept' => null,
    'multiple' => false,
    'required' => false,
    'disabled' => false,
    'helpText' => null,
    'preview' => false,
    'maxSize' => '2MB'
])

<div class="mb-6" x-data="fileUpload()">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500 ml-1">*</span>
            @endif
        </label>
    @endif

    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200"
         :class="{ 'border-blue-400 bg-blue-50': isDragOver }"
         @drop.prevent="handleDrop"
         @dragover.prevent="isDragOver = true"
         @dragleave.prevent="isDragOver = false">

        <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <div class="flex text-sm text-gray-600">
                <label for="{{ $name }}" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                    <span>Upload file</span>
                    <input id="{{ $name }}"
                           name="{{ $name }}{{ $multiple ? '[]' : '' }}"
                           type="file"
                           class="sr-only"
                           @if($accept) accept="{{ $accept }}" @endif
                           @if($multiple) multiple @endif
                           @if($required) required @endif
                           @if($disabled) disabled @endif
                           x-on:change="handleFileSelect"
                           {{ $attributes }}>
                </label>
                <p class="pl-1">atau drag and drop</p>
            </div>

            <p class="text-xs text-gray-500">
                @if($accept)
                    {{ strtoupper(str_replace(['image/', 'application/', '.'], '', $accept)) }}
                @endif
                up to {{ $maxSize }}
            </p>
        </div>
    </div>

    <!-- File Preview -->
    <div x-show="files.length > 0" class="mt-4 space-y-2">
        <template x-for="(file, index) in files" :key="index">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <template x-if="file.type.startsWith('image/')">
                            <img :src="file.preview" class="h-10 w-10 rounded object-cover">
                        </template>
                        <template x-if="!file.type.startsWith('image/')">
                            <div class="h-10 w-10 bg-gray-200 rounded flex items-center justify-center">
                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </template>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900" x-text="file.name"></p>
                        <p class="text-sm text-gray-500" x-text="formatFileSize(file.size)"></p>
                    </div>
                </div>
                <button type="button"
                        class="text-red-500 hover:text-red-700 transition-colors duration-200"
                        @click="removeFile(index)">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </template>
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-600 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            {{ $message }}
        </p>
    @enderror

    @if($helpText && !$errors->has($name))
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
</div>

<script>
function fileUpload() {
    return {
        files: [],
        isDragOver: false,

        handleFileSelect(event) {
            this.processFiles(event.target.files);
        },

        handleDrop(event) {
            this.isDragOver = false;
            this.processFiles(event.dataTransfer.files);
        },

        processFiles(fileList) {
            Array.from(fileList).forEach(file => {
                if ({{ $preview ? 'true' : 'false' }} && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        file.preview = e.target.result;
                        this.files.push(file);
                    };
                    reader.readAsDataURL(file);
                } else {
                    this.files.push(file);
                }
            });
        },

        removeFile(index) {
            this.files.splice(index, 1);
        },

        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    }
}
</script>
