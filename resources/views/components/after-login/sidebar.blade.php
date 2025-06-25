<div class="w-64 bg-white shadow-md hidden lg:block">
    <div class="p-4 border-b">
        <img src="/image/logo-staklim.png" alt="Logo" class="h-12 mx-auto" />
    </div>

    <nav class="p-4 text-sm">
        <ul class="space-y-2">

            {{-- <li class="text-xs text-gray-400 uppercase px-2">Dashboard</li> --}}
            <x-after-login.sidebar.item-icon icon="layout-dashboard" name="Dashboard" route="#" />

            <li class="text-xs text-gray-400 uppercase px-2">Pimpinan</li>
            <x-after-login.sidebar.item-icon icon="users" name="Manajemen Hak Akses" :route="route('users.index')" />

            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Produk</li>

            {{-- kategori produk --}}
            <x-after-login.sidebar.item-icon icon="folder" name="Kategori Produk" :route="route('kategori-produk.index')" />
            <x-after-login.sidebar.item-icon icon="cloud" name="Iklim Terapan" :route="route('produk.index', ['type' => 'iklim_terapan'])" />
            <x-after-login.sidebar.item-icon icon="sun" name="Perubahan Iklim" :route="route('produk.index', ['type' => 'perubahan_iklim'])" />
            <x-after-login.sidebar.item-icon icon="info" name="Informasi Iklim" :route="route('produk.index', ['type' => 'informasi_iklim'])" />
            <x-after-login.sidebar.item-icon icon="wind" name="Kualitas Udara" :route="route('produk.index', ['type' => 'kualitas_udara'])" />
            <x-after-login.sidebar.item-icon icon="cloud-rain" name="Cuaca" :route="route('produk.index', ['type' => 'cuaca'])" />



            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Instrumentasi</li>
            <x-after-login.sidebar.item-icon icon="thermometer" name="Metadata Alat" :route="route('metadata-alat.index')" />
            <x-after-login.sidebar.item-icon icon="map" name="Wilayah Administrasi" :route="route('kecamatan.index')" />
            <x-after-login.sidebar.item-icon icon="cloud-rain" name="Alat Curah Hujan" :route="route('admin.alat-curah-hujan.index')" />

            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Layanan Publik</li>
            {{-- <x-after-login.sidebar.item-icon icon="globe" name="Umum" route="#" />
            <x-after-login.sidebar.item-icon icon="building" name="Instansi" route="#" />
            <x-after-login.sidebar.item-icon icon="graduation-cap" name="Mahasiswa" route="#" /> --}}
            <x-after-login.sidebar.item-icon icon="link" name="Link Survey" :route="route('url.index', 'survey')" />
            <x-after-login.sidebar.item-icon icon="dollar-sign" name="Nol Rupiah" :route="route('url.index', 'nol_rupiah')" />
            <x-after-login.sidebar.item-icon icon="receipt-text" name="Tarif PNBP" :route="route('tarif-pnbp.index')" />


            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Tata Usaha</li>
            <x-after-login.sidebar.item-icon icon="user" name="Data Kepegawaian" :route="route(name: 'pegawai.index')" />
            <x-after-login.sidebar.item-icon icon="calendar" name="Rapat" route="#" />
            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Feedback</li>
            <x-after-login.sidebar.item-icon icon="message-square" name="Pertanyaan" :route="route('admin.feedback.questions.index')"
                :active="request()->routeIs('admin.feedback.questions.*')" />
            <x-after-login.sidebar.item-icon icon="message-circle" name="Respon" :route="route('admin.feedback.responses.index')"
                :active="request()->routeIs('admin.feedback.responses.*')" />


            {{-- <li class="text-xs text-gray-400 uppercase mt-4 px-2">Media</li>
            <x-after-login.sidebar.item-icon icon="folder" name="Kategori Berita & Artikel" :route="route('admin.kategori-berita-artikel.index')"
                :active="request()->routeIs('admin.kategori-berita-artikel.*')" />
            <x-after-login.sidebar.item-icon icon="newspaper" name="Berita" route="#" />
            <x-after-login.sidebar.item-icon icon="book" name="Buletin" route="#" />
            <x-after-login.sidebar.item-icon icon="file-text" name="Artikel" route="#" />
            <x-after-login.sidebar.item-icon icon="file-text" name="Profile Perusahaan" route="#" /> --}}



            {{-- Media section --}}
            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Media</li>
            <x-after-login.sidebar.item-icon icon="folder" name="Kategori Berita & Artikel" :route="route('admin.kategori-berita-artikel.index')"
                :active="request()->routeIs('admin.kategori-berita-artikel.*')" />
            <x-after-login.sidebar.item-icon icon="newspaper" name="Berita" :route="route('admin.media.berita.index', 'berita')" :active="request()->routeIs('admin.media.berita.*') && request()->segment(3) == 'berita'" />
            <x-after-login.sidebar.item-icon icon="file-text" name="Artikel" :route="route('admin.media.berita.index', 'artikel')" :active="request()->routeIs('admin.media.berita.*') && request()->segment(3) == 'artikel'" />
            <x-after-login.sidebar.item-icon icon="book" name="Buletin" :route="route('admin.media.buletin.index')" />
            <x-after-login.sidebar.item-icon icon="file-text" name="Profile Perusahaan" route="#" />

            {{-- profile --}}
            <li class="text-xs text-gray-400 uppercase mt-4 px-2">Profile</li>
            <x-after-login.sidebar.item-icon icon="user" name="Profile" route="#" />
            <x-after-login.sidebar.item-icon icon="log-out" name="Logout" route="#" />

            {{-- jika role admin, maka masuk ke component sidebar admin --}}


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
