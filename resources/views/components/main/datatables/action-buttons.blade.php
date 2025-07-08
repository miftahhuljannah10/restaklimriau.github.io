{{--
    DataTable Action Buttons Component
    Komponen tombol aksi untuk tabel data (View, Edit, Delete)

    Props:
    - viewUrl: URL untuk melihat detail data
    - editUrl: URL untuk edit data
    - deleteAction: Action/route untuk delete
    - itemId: ID item yang akan diproses
    - itemName: Nama item (untuk konfirmasi delete)
    - canView: Boolean untuk izin view (default: true)
    - canEdit: Boolean untuk izin edit (default: true)
    - canDelete: Boolean untuk izin delete (default: true)
--}}

@props([
    'viewUrl' => null,
    'editUrl' => null,
    'deleteAction' => null,
    'itemId' => null,
    'itemName' => 'item ini',
    'canView' => true,
    'canEdit' => true,
    'canDelete' => true,
    'size' => 'sm', // sm, md, lg
])

@php
    $sizeClasses = [
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-3 py-1.5 text-sm',
        'lg' => 'px-4 py-2 text-base',
    ];
    $iconSizes = [
        'sm' => 'w-3 h-3',
        'md' => 'w-4 h-4',
        'lg' => 'w-5 h-5',
    ];
    $baseClass = $sizeClasses[$size] ?? $sizeClasses['sm'];
    $iconClass = $iconSizes[$size] ?? $iconSizes['sm'];
@endphp

<div class="flex items-center gap-1" x-data="{ showDeleteConfirm: false }">
    {{-- View Button --}}
    @if ($canView && $viewUrl)
        <a href="{{ $viewUrl }}"
            class="{{ $baseClass }} bg-blue-500 hover:bg-blue-600 text-white rounded-md transition-colors duration-200 inline-flex items-center gap-1 group"
            title="Lihat Detail">
            <svg class="{{ $iconClass }} group-hover:scale-110 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            @if ($size !== 'sm')
                <span class="hidden sm:inline">Lihat</span>
            @endif
        </a>
    @endif

    {{-- Edit Button --}}
    @if ($canEdit && $editUrl)
        <a href="{{ $editUrl }}"
            class="{{ $baseClass }} bg-amber-500 hover:bg-amber-600 text-white rounded-md transition-colors duration-200 inline-flex items-center gap-1 group"
            title="Edit Data">
            <svg class="{{ $iconClass }} group-hover:scale-110 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            @if ($size !== 'sm')
                <span class="hidden sm:inline">Edit</span>
            @endif
        </a>
    @endif

    {{-- Delete Button --}}
    @if ($canDelete && $deleteAction && $itemId)
        <button @click="showDeleteConfirm = true"
            class="{{ $baseClass }} bg-red-500 hover:bg-red-600 text-white rounded-md transition-colors duration-200 inline-flex items-center gap-1 group"
            title="Hapus Data">
            <svg class="{{ $iconClass }} group-hover:scale-110 transition-transform duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            @if ($size !== 'sm')
                <span class="hidden sm:inline">Hapus</span>
            @endif
        </button>

        {{-- Delete Confirmation Modal --}}
        <div x-show="showDeleteConfirm" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">

            {{-- Background Overlay --}}
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="showDeleteConfirm = false">
            </div>

            {{-- Modal Container --}}
            <div class="flex min-h-full items-center justify-center p-4">
                {{-- Modal Panel --}}
                <div x-show="showDeleteConfirm" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-xl bg-white px-6 py-6 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-8"
                    @click.stop>

                    {{-- Close Button --}}
                    <button @click="showDeleteConfirm = false"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 rounded-full p-2 hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    {{-- Header Section --}}
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-gray-900">Konfirmasi Hapus</h3>
                            <p class="text-sm text-gray-500 mt-1">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>

                    {{-- Content Section --}}
                    <div class="mb-8">
                        <p class="text-gray-700 text-base leading-relaxed">
                            Apakah Anda yakin ingin menghapus
                            <span
                                class="font-semibold text-gray-900 bg-gray-100 px-2 py-1 rounded">{{ $itemName }}</span>?
                        </p>
                        <p class="text-sm text-red-600 mt-3 bg-red-50 p-3 rounded-lg border border-red-200">
                            ⚠️ Data yang sudah dihapus tidak dapat dikembalikan lagi.
                        </p>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-3 justify-end">
                        <button @click="showDeleteConfirm = false"
                            class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200 shadow-sm">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </button>

                        <form action="{{ $deleteAction }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 py-3 text-sm font-medium text-white bg-red-600 border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200 shadow-sm">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Ya, Hapus Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
