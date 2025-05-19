<div class="w-64 bg-white shadow-md hidden lg:block">
    <div class="p-4 border-b">
        <img src="/image/logo-staklim.png" alt="Logo" class="h-12 mx-auto" />
    </div>

    <nav class="p-4 text-sm">
        <ul class="space-y-2">

            <li class="text-xs text-gray-400 uppercase px-2">Dashboard</li>
            <x-after-login.sidebar.item-icon icon="home" name="Dashboard" route="#" />

            <li class="text-xs text-gray-400 uppercase px-2">Pimpinan</li>
            <x-after-login.sidebar.item-icon icon="users" name="Manajemen Hak Akses" :route="route('users.index')" />
            <x-after-login.sidebar.item-icon icon="user" name="Akun Kepegawaian" :route="route(name: 'pegawai.index')" />

            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Produk</li>
            <x-after-login.sidebar.item-icon icon="cloud" name="Iklim Terapan" route="#" />
            <x-after-login.sidebar.item-icon icon="sun" name="Perubahan Iklim" route="#" />
            <x-after-login.sidebar.item-icon icon="info" name="Informasi Iklim" route="#" />
            <x-after-login.sidebar.item-icon icon="wind" name="Kualitas Udara" route="#" />
            <x-after-login.sidebar.item-icon icon="cloud-rain" name="Cuaca" route="#" />

            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Layanan Publik</li>
            {{-- <x-after-login.sidebar.item-icon icon="globe" name="Umum" route="#" />
            <x-after-login.sidebar.item-icon icon="building" name="Instansi" route="#" />
            <x-after-login.sidebar.item-icon icon="graduation-cap" name="Mahasiswa" route="#" /> --}}
            <x-after-login.sidebar.item-icon icon="link" name="Link Survey" :route="route('url.index', 'survey')" />
            <x-after-login.sidebar.item-icon icon="rupiah" name="Nol Rupiah" :route="route('url.index', 'nol_rupiah')" />

            <x-after-login.sidebar.item-icon icon="dollar-sign" name="Tarif PNBP" route="#" />


            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Media</li>
            <x-after-login.sidebar.item-icon icon="newspaper" name="Berita" route="#" />
            <x-after-login.sidebar.item-icon icon="book" name="Buletin" route="#" />
            <x-after-login.sidebar.item-icon icon="file-text" name="Artikel" route="#" />
            <x-after-login.sidebar.item-icon icon="file-text" name="Profile Perusahaan" route="#" />


            {{-- jika role pemimpin, maka masuk ke component sidebar pemimpin --}}
            {{-- @if (auth()->user()->role == 'pemimpin')
                <x-after-login.sidebar.pemimpin />
            @endif --}}
            {{-- jika role admin, maka masuk ke component sidebar admin --}}
            {{-- @if (auth()->user()->role == 'admin')
                <x-after-login.sidebar.admin />
            @endif --}}

        </ul>
    </nav>
</div>
