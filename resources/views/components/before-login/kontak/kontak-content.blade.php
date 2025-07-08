{{--
Contoh pemanggilan dinamis dari view utama:
@include('components.before-login.kontak.kontak-content', [
    'title' => 'Hubungi Kami',
    'contacts' => [
        [
            'type' => 'Lokasi',
            'icon' => 'fas fa-map-marker-alt',
            'bg' => 'bg-sky-500',
            'label' => 'Lokasi',
            'value' => 'Jl. Unggas, Kelurahan Simpang Tiga',
            'link' => 'https://maps.app.goo.gl/VuHTCyppfqrvZgv59',
        ],
        [
            'type' => 'Email',
            'icon' => 'fas fa-envelope',
            'bg' => 'bg-blue-500',
            'label' => 'Email',
            'value' => 'staklim.riau@bmkg.go.id',
            'link' => 'mailto:staklim.riau@bmkg.go.id',
        ],
        // ...tambahkan kontak lain sesuai kebutuhan
    ],
    'operational' => [
        [ 'day' => 'Senin - Kamis', 'time' => '08:00 - 16:00 WIB' ],
        [ 'day' => 'Jumat', 'time' => '08:00 - 16:30 WIB' ],
    ]
])
--}}
<!-- Kontak Content Section Dinamis -->
<section class="py-8 bg-gradient-to-br from-blue-50 to-white">
  <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
    <h2 class="text-center text-3xl font-bold gradient-text mb-10">{{ $title ?? 'Hubungi Kami' }}</h2>

    <!-- Contact Cards Dinamis -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach(($contacts ?? []) as $contact)
        <a href="{{ $contact['link'] ?? '#' }}" @if(!empty($contact['link'])) target="_blank" @endif class="group block bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-6">
          <div class="flex items-center gap-4">
            <div class="{{ $contact['bg'] ?? 'bg-sky-500' }} rounded-full w-16 h-16 flex items-center justify-center">
              <i class="{{ $contact['icon'] ?? 'fas fa-info-circle' }} text-white text-3xl"></i>
            </div>
            <div>
              <h3 class="text-xl font-semibold text-slate-800 group-hover:text-sky-500">{{ $contact['label'] ?? '' }}</h3>
              <p class="text-slate-600 text-sm">{{ $contact['value'] ?? '' }}</p>
            </div>
          </div>
        </a>
      @endforeach
    </div>

    <!-- Jam Operasional Dinamis -->
    <div class="mt-10 bg-white rounded-xl shadow-lg p-6">
      <h3 class="text-xl font-semibold text-slate-800 mb-4">Jam Operasional</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <h4 class="font-medium text-slate-800 mb-2">Hari Kerja</h4>
          <ul class="space-y-1 text-slate-600">
            @foreach(($operational ?? []) as $op)
              <li class="flex justify-between">
                <span>{{ $op['day'] }}</span>
                <span>{{ $op['time'] }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
