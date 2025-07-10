 <x-layouts.admin title="Beranda Pegawai" subtitle="Selamat datang di panel admin, {{ auth()->user()->name }}">
     {{-- Flash Messages --}}
     <x-main.alerts.flash-message />
     <x-main.alerts.validation-errors />

     {{-- User Profile Card --}}
     <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
         <div class="p-6">
             <h2 class="text-2xl font-bold text-gray-800 mb-4">Informasi Akun</h2>

             <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                 <div>
                     <div class="mb-4">
                         <h3 class="text-sm font-semibold text-gray-500">Nama Pengguna</h3>
                         <p class="text-lg font-medium text-gray-800">{{ $user->name }}</p>
                     </div>

                     <div class="mb-4">
                         <h3 class="text-sm font-semibold text-gray-500">Email</h3>
                         <p class="text-lg font-medium text-gray-800">{{ $user->email }}</p>
                     </div>

                     <div class="mb-4">
                         <h3 class="text-sm font-semibold text-gray-500">Role</h3>
                         <p class="text-lg font-medium text-gray-800">{{ $user->role->name ?? 'Tidak terdefinisi' }}</p>
                     </div>
                 </div>


             </div>
         </div>
     </div>

     {{-- Quick Access Cards --}}
     <h2 class="text-xl font-semibold text-gray-800 mb-4">Akses Cepat</h2>
     <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
         <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
             <div class="flex items-center mb-4">
                 <div class="bg-blue-100 p-3 rounded-full">
                     <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                     </svg>
                 </div>
                 <h3 class="text-lg font-medium text-gray-800 ml-3">Surat Masuk</h3>
             </div>
             <p class="text-gray-600 mb-4">Akses surat masuk terbaru dan daftarnya</p>
             <a href="{{ route('admin.tata-usaha.surat-masuk.index') }}"
                 class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                 Lihat Surat Masuk
                 <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M13 7l5 5m0 0l-5 5m5-5H6" />
                 </svg>
             </a>
         </div>

         <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
             <div class="flex items-center mb-4">
                 <div class="bg-green-100 p-3 rounded-full">
                     <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                     </svg>
                 </div>
                 <h3 class="text-lg font-medium text-gray-800 ml-3">Surat Keluar</h3>
             </div>
             <p class="text-gray-600 mb-4">Kelola dan lihat surat keluar terbaru</p>
             <a href="{{ route('admin.tata-usaha.surat-keluar.index') }}"
                 class="text-green-600 hover:text-green-800 font-medium flex items-center">
                 Lihat Surat Keluar
                 <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M13 7l5 5m0 0l-5 5m5-5H6" />
                 </svg>
             </a>
         </div>

         <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
             <div class="flex items-center mb-4">
                 <div class="bg-purple-100 p-3 rounded-full">
                     <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                     </svg>
                 </div>
                 <h3 class="text-lg font-medium text-gray-800 ml-3">Berita & Artikel</h3>
             </div>
             <p class="text-gray-600 mb-4">Kelola konten berita dan artikel</p>
             <a href="{{ route('admin.media.berita.index', 'berita') }}"
                 class="text-purple-600 hover:text-purple-800 font-medium flex items-center">
                 Lihat Berita & Artikel
                 <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M13 7l5 5m0 0l-5 5m5-5H6" />
                 </svg>
             </a>
         </div>
     </div>

     {{-- Recent Activity --}}
     <h2 class="text-xl font-semibold text-gray-800 mb-4">Aktivitas Terbaru</h2>
     <div class="bg-white rounded-lg shadow-md p-6 mb-8">
         <div class="space-y-4">
             <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                 <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                     <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                     </svg>
                 </div>
                 <div>
                     <p class="text-sm font-medium text-gray-900">Aktivitas terakhir Anda</p>
                     <p class="text-xs text-gray-500">
                         {{ \Carbon\Carbon::parse($lastActivity)->locale('id')->isoFormat('D MMMM YYYY, HH:mm') }}</p>
                 </div>
             </div>
         </div>
     </div>
 </x-layouts.admin>
