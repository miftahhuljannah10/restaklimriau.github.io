<!-- Visi & Misi Section Header Dinamis -->
<div class="text-center mb-10">
    <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4">
        {{ $header_title ?? 'Visi, Misi & Tugas' }}
    </h2>
    <p class="text-gray-700 text-base font-montserrat max-w-2xl mx-auto">
        {{ $header_desc ?? 'Komitmen kami dalam melayani masyarakat dengan dedikasi dan kualitas terbaik' }}
    </p>
</div>

<!-- Visi & Misi Cards Dinamis -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
    <!-- Visi -->
    <div class="glass-effect p-6 rounded-2xl card-hover animate-slide-in-left shadow-md">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-sky-500 rounded-full flex items-center justify-center mx-auto mb-4 animate-float">
                <i class="fas fa-eye text-white text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold font-montserrat text-slate-800">Visi</h3>
        </div>
        <p class="text-gray-600 font-montserrat text-sm leading-relaxed mb-4 text-justify">
            {{ $visi['deskripsi'] ?? 'Mewujudkan BMKG yang handal, tanggap, dan mampu dalam mendukung keselamatan masyarakat serta keberhasilan pembangunan nasional, dan berperan aktif di tingkat internasional.' }}
        </p>
        <div class="space-y-4">
            @foreach(($visi['detail'] ?? []) as $item)
            <div class="flex items-start">
                <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-sky-500 rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                    <i class="fas fa-check text-white text-sm"></i>
                </div>
                <p class="text-gray-600 font-montserrat text-sm leading-relaxed text-justify">
                    {{ $item }}
                </p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Misi -->
    <div class="glass-effect p-6 rounded-2xl card-hover animate-slide-in-right shadow-md">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 animate-float" style="animation-delay: 1s;">
                <i class="fas fa-bullseye text-white text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold font-montserrat text-slate-800">Misi</h3>
        </div>
        <div class="space-y-4">
            @foreach(($misi['detail'] ?? []) as $item)
            <div class="flex items-start">
                <div class="w-6 h-6 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                    <i class="fas fa-check text-white text-sm"></i>
                </div>
                <p class="text-gray-600 font-montserrat text-sm leading-relaxed text-justify">
                    {{ $item }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Tugas Section Dinamis -->
<div class="glass-effect p-6 rounded-2xl card-hover animate-fade-in shadow-md">
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 animate-float" style="animation-delay: 2s;">
            <i class="fas fa-tasks text-white text-3xl"></i>
        </div>
        <h3 class="text-2xl font-bold font-montserrat text-slate-800 mb-4">Tugas & Fungsi</h3>
    </div>

    <div class="max-w-6xl mx-auto">
        <p class="text-gray-600 font-montserrat text-sm leading-relaxed text-center mb-6">
            {{ $tugas['deskripsi'] ?? 'Berdasarkan tugas yang tertulis di Instansi Badan Meteorologi, Klimatologi, dan Geofisika (BMKG), Stasiun Klimatologi Riau bertugas melakukan pengamatan cuaca dan iklim, serta menjadi koordinator pengumpulan data curah hujan di Provinsi Riau, serta mempublikasikan informasi cuaca, iklim, dan kualitas udara di seluruh Provinsi Riau.' }}
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach(($tugas['detail'] ?? []) as $item)
            <div class="flex items-start">
                <div class="w-6 h-6 {{ $item['icon_bg'] ?? 'bg-gradient-to-br from-green-500 to-emerald-500' }} rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                    <i class="fas {{ $item['icon'] ?? 'fa-cloud-sun' }} text-white text-sm"></i>
                </div>
                <p class="text-gray-600 font-montserrat text-sm leading-relaxed text-justify">
                    {{ $item['teks'] ?? $item }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
