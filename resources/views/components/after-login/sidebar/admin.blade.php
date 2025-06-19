 <li class="text-xs text-gray-400 uppercase mt-4 px-2">Produk</li>
 <x-after-login.sidebar.item-icon icon="cloud" name="Iklim Terapan" route="#" />
 <x-after-login.sidebar.item-icon icon="sun" name="Perubahan Iklim" route="#" />
 <x-after-login.sidebar.item-icon icon="info" name="Informasi Iklim" route="#" />
 <x-after-login.sidebar.item-icon icon="wind" name="Kualitas Udara" route="#" />
 <x-after-login.sidebar.item-icon icon="cloud-rain" name="Cuaca" route="#" />

 <li class="text-xs text-gray-400 uppercase mt-4 px-2">Layanan Publik</li>
 <x-after-login.sidebar.item-icon icon="globe" name="Umum" route="#" />
 <x-after-login.sidebar.item-icon icon="building" name="Instansi" route="#" />
 <x-after-login.sidebar.item-iconicon="graduation-cap" name="Mahasiswa" route="#" />
 <x-after-login.sidebar.item-icon icon="link" name="Link Survey" route="#" />
 <x-after-login.sidebar.item-icon icon="dollar-sign" name="Tarif PNBP" route="#" />
 <x-after-login.sidebar.item-icon icon="zero" name="Nol Rupiah" route="#" />

 <li class="text-xs text-gray-400 uppercase mt-4 px-2">Feedback</li>
 <x-after-login.sidebar.item-icon
    icon="message-square"
    name="Pertanyaan"
    :route="route('admin.feedback.questions.index')"
    :active="request()->routeIs('admin.feedback.questions.*')"
/>
 <x-after-login.sidebar.item-icon
    icon="message-circle"
    name="Respon"
    :route="route('admin.feedback.responses.index')"
    :active="request()->routeIs('admin.feedback.responses.*')"
/>

 <li class="text-xs text-gray-400 uppercase mt-4 px-2">Media</li>
 {{-- berita --}}
 <x-after-login.sidebar.item-icon icon="newspaper" name="Berita" route="#" />
 {{-- buletin --}}
 <x-after-login.sidebar.item-icon icon="book" name="Buletin" route="#" />
 {{-- artikel --}}
 <x-after-login.sidebar.item-icon icon="file-text" name="Artikel" route="#" />
 {{-- profile perusahaan --}}
 <x-after-login.sidebar.item-icon icon="file-text" name="Profile Perusahaan" route="#" />
