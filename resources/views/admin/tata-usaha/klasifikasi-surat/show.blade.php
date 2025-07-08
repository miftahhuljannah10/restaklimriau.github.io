@extends('layouts.app')

@section('title', 'Detail Klasifikasi Surat')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Detail Klasifikasi Surat
                    </h2>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.tata-usaha.klasifikasi-surat.edit', $klasifikasiSurat) }}"
                           class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-800 focus:outline-none focus:border-yellow-800 focus:ring focus:ring-yellow-300 disabled:opacity-25 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('admin.tata-usaha.klasifikasi-surat.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Klasifikasi</label>
                            <div class="mt-1 bg-gray-50 rounded-md px-3 py-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $klasifikasiSurat->kode }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Klasifikasi</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">{{ $klasifikasiSurat->nama }}</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Dibuat</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">
                                {{ $klasifikasiSurat->created_at->format('d F Y H:i:s') }}
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Terakhir Diupdate</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">
                                {{ $klasifikasiSurat->updated_at->format('d F Y H:i:s') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Statistik Penggunaan -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Statistik Penggunaan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-blue-50 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-blue-900">Total Surat Keluar</p>
                                    <p class="text-2xl font-bold text-blue-600">{{ $klasifikasiSurat->suratKeluar->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-green-50 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-green-900">Status</p>
                                    <p class="text-lg font-semibold text-green-600">
                                        {{ $klasifikasiSurat->suratKeluar->count() > 0 ? 'Aktif Digunakan' : 'Belum Digunakan' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Surat Terkait -->
                @if($klasifikasiSurat->suratKeluar->count() > 0)
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Surat Keluar Terkait ({{ $klasifikasiSurat->suratKeluar->count() }} surat)</h3>
                    <div class="bg-gray-50 rounded-lg overflow-hidden">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h4 class="font-medium text-gray-700">5 Surat Terbaru</h4>
                                <a href="{{ route('admin.tata-usaha.surat-keluar.index', ['klasifikasi' => $klasifikasiSurat->id]) }}"
                                   class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            @foreach($klasifikasiSurat->suratKeluar->take(5) as $surat)
                            <div class="px-4 py-3 hover:bg-gray-100 transition-colors">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ $surat->no_surat }}</p>
                                        <p class="text-sm text-gray-600 mt-1">{{ $surat->perihal }}</p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }} •
                                            Kepada: {{ $surat->tujuan }}
                                        </p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ route('admin.tata-usaha.surat-keluar.show', $surat) }}"
                                           class="text-blue-600 hover:text-blue-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-between items-center pt-6 border-t border-gray-200">
                    <div class="flex space-x-3">
                        @if($klasifikasiSurat->suratKeluar->count() == 0)
                        <form action="{{ route('admin.tata-usaha.klasifikasi-surat.destroy', $klasifikasiSurat) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus klasifikasi surat ini?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                        @else
                        <div class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Tidak Dapat Dihapus
                        </div>
                        <p class="text-xs text-gray-500 self-center">Klasifikasi ini masih digunakan oleh {{ $klasifikasiSurat->suratKeluar->count() }} surat</p>
                        @endif
                    </div>

                    <div class="text-sm text-gray-500">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            ID: {{ $klasifikasiSurat->id }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
