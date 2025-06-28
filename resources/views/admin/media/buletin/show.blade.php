@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl">Detail Buletin</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Informasi lengkap tentang buletin
                </p>
            </div>
            <div class="mt-4 flex-shrink-0 flex md:mt-0 md:ml-4 space-x-2">
                <a href="{{ route('admin.media.buletin.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <a href="{{ route('admin.media.buletin.edit', $buletin) }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="p-0 sm:p-6">
                <!-- Feature Section -->
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
                    <!-- Left Column - Image -->
                    <div class="lg:col-span-3">
                        <div class="relative h-96 overflow-hidden rounded-lg mb-4 bg-gray-100">
                            <img src="{{ $buletin->image }}" alt="{{ $buletin->judul }}" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $buletin->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $buletin->status == 'published' ? 'Dipublikasikan' : 'Draft' }}
                                </span>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h1 class="text-2xl font-bold text-gray-900">{{ $buletin->judul }}</h1>
                            @if($buletin->edisi)
                                <p class="mt-1 text-lg text-gray-600">Edisi: {{ $buletin->edisi }}</p>
                            @endif
                            <div class="mt-4 flex items-center text-gray-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ $buletin->penulis }}</span>
                                <span class="mx-2">•</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $buletin->created_at->format('d F Y') }}</span>
                            </div>

                            <!-- Link Button -->
                            @if($buletin->link)
                                <div class="mt-6">
                                    <a href="{{ $buletin->link }}" target="_blank" 
                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Lihat Buletin Lengkap
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right Column - Details & Actions -->
                    <div class="lg:col-span-2">
                        <div class="bg-white overflow-hidden shadow-sm rounded-lg divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Buletin</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Detail dan metadata buletin</p>
                            </div>
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <dl class="grid grid-cols-1 gap-y-4">
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">ID Buletin</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $buletin->id }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $buletin->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ $buletin->status == 'published' ? 'Dipublikasikan' : 'Draft' }}
                                            </span>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Penulis</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $buletin->penulis }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">URL Gambar</dt>
                                        <dd class="mt-1 text-sm text-gray-900 truncate">
                                            <a href="{{ $buletin->image }}" target="_blank" class="text-blue-600 hover:underline truncate block">
                                                {{ $buletin->image }}
                                            </a>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Link Buletin</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($buletin->link)
                                                <a href="{{ $buletin->link }}" target="_blank" class="text-blue-600 hover:underline truncate block">
                                                    {{ $buletin->link }}
                                                </a>
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Tanggal Dibuat</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $buletin->created_at->format('d F Y H:i') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">Terakhir Diupdate</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $buletin->updated_at->format('d F Y H:i') }}</dd>
                                    </div>
                                </dl>
                            </div>
                            <div class="px-4 py-4 sm:px-6 flex justify-between">
                                <a href="{{ route('admin.media.buletin.edit', $buletin) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    Edit Buletin
                                </a>
                                <form action="{{ route('admin.media.buletin.destroy', $buletin) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buletin ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500">Hapus Buletin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection