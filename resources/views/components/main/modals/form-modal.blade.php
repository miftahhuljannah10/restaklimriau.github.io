{{--
    Form Modal Component
    Komponen modal untuk form input data (Create/Edit)

    Props:
    - modalId: ID unique untuk modal
    - title: Judul modal
    - submitUrl: URL untuk submit form
    - method: HTTP method (POST/PUT/PATCH)
    - size: Ukuran modal (sm, md, lg, xl, full)
    - showModal: Boolean untuk show/hide modal (Alpine.js variable)
--}}

@props([
    'modalId' => 'formModal',
    'title' => 'Form Data',
    'submitUrl' => '#',
    'method' => 'POST',
    'size' => 'lg', // sm, md, lg, xl, full
    'showModal' => 'showFormModal',
])

@php
    $sizeClasses = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'full' => 'max-w-7xl',
    ];
    $modalSize = $sizeClasses[$size] ?? $sizeClasses['lg'];
@endphp

<div x-show="{{ $showModal }}" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;"
    id="{{ $modalId }}">

    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        {{-- Background overlay --}}
        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" @click="{{ $showModal }} = false">
        </div>

        {{-- Modal panel --}}
        <div
            class="inline-block w-full {{ $modalSize }} my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-lg">
            {{-- Modal Header --}}
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white">
                        {{ $title }}
                    </h3>
                    <button @click="{{ $showModal }} = false"
                        class="text-white/80 hover:text-white transition-colors duration-200 p-1 rounded-full hover:bg-white/10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Modal Body --}}
            <form action="{{ $submitUrl }}" method="POST" enctype="multipart/form-data" x-data="{
                isSubmitting: false,
                submitForm() {
                    this.isSubmitting = true;
                    $el.submit();
                }
            }">
                @csrf
                @if (strtoupper($method) !== 'POST')
                    @method($method)
                @endif

                <div class="px-6 py-6 max-h-96 overflow-y-auto">
                    {{-- Form Content Slot --}}
                    {{ $slot }}
                </div>

                {{-- Modal Footer --}}
                <div class="bg-gray-50 px-6 py-4 flex items-center justify-between gap-3">
                    <div class="text-sm text-gray-500">
                        <span class="text-red-500">*</span> Field wajib diisi
                    </div>

                    <div class="flex gap-3">
                        <button type="button" @click="{{ $showModal }} = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            Batal
                        </button>

                        <button type="submit" @click="submitForm()" :disabled="isSubmitting"
                            :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : ''"
                            class="px-6 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 inline-flex items-center gap-2">
                            <svg x-show="isSubmitting" class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span x-text="isSubmitting ? 'Menyimpan...' : 'Simpan'">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Trigger Script (Optional - untuk digunakan jika perlu) --}}
@push('scripts')
    <script>
        // Function untuk membuka modal
        function openFormModal(modalId = '{{ $modalId }}') {
            Alpine.store('modal', {
                [modalId]: true
            });
        }

        // Function untuk menutup modal
        function closeFormModal(modalId = '{{ $modalId }}') {
            Alpine.store('modal', {
                [modalId]: false
            });
        }

        // Auto close modal after successful form submission
        @if (session('success'))
            setTimeout(() => {
                if (window.Alpine) {
                    Alpine.store('modal', {
                        '{{ $modalId }}': false
                    });
                }
            }, 1000);
        @endif
    </script>
@endpush
