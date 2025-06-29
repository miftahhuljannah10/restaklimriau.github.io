<!-- Hero Artikel Section Component -->
<section class="w-full h-[340px] sm:h-[380px] md:h-[420px] relative overflow-hidden bg-gradient-to-br from-bmkg-blue via-bmkg-light-blue to-bmkg-cyan">
    <!-- Matahari animasi di kiri atas, bergerak pelan -->
    <svg class="absolute left-6 top-6 w-32 h-32 z-0 animate-sun-move" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="60" cy="60" r="28" fill="#FDE047" />
        <g stroke="#FDE047" stroke-width="6" stroke-linecap="round" class="animate-sun-rays">
            <line x1="60" y1="10" x2="60" y2="0" />
            <line x1="60" y1="110" x2="60" y2="120" />
            <line x1="10" y1="60" x2="0" y2="60" />
            <line x1="110" y1="60" x2="120" y2="60" />
            <line x1="25" y1="25" x2="15" y2="15" />
            <line x1="95" y1="25" x2="105" y2="15" />
            <line x1="25" y1="95" x2="15" y2="105" />
            <line x1="95" y1="95" x2="105" y2="105" />
        </g>
    </svg>
    <!-- Awan hujan animasi di kanan atas -->
    <svg class="absolute right-6 top-10 w-44 h-24 opacity-90 animate-cloud-float" viewBox="0 0 200 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Cloud -->
        <ellipse cx="50" cy="40" rx="50" ry="20" fill="#e0f2fe" />
        <ellipse cx="120" cy="40" rx="40" ry="18" fill="#bae6fd" />
        <ellipse cx="170" cy="45" rx="30" ry="12" fill="#7dd3fc" />
        <!-- highlight -->
        <ellipse cx="80" cy="35" rx="12" ry="5" fill="#fff" fill-opacity="0.7" />
        <!-- Rain drops -->
        <g class="animate-rain">
            <line x1="60" y1="60" x2="60" y2="75" stroke="#38bdf8" stroke-width="3" stroke-linecap="round"/>
            <line x1="90" y1="62" x2="90" y2="77" stroke="#0ea5e9" stroke-width="3" stroke-linecap="round"/>
            <line x1="110" y1="58" x2="110" y2="73" stroke="#38bdf8" stroke-width="3" stroke-linecap="round"/>
            <line x1="140" y1="64" x2="140" y2="79" stroke="#0ea5e9" stroke-width="3" stroke-linecap="round"/>
        </g>
    </svg>
    <!-- Hero Content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full px-4">
        <!-- Hero Title -->
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold font-montserrat mb-4 md:mb-6 text-center drop-shadow-lg animate-slide-up text-white">
            {{ $title ?? 'Judul Produk' }}
        </h1>
        <!-- Hero Subtitle -->
        <p class="text-white text-base sm:text-lg md:text-xl lg:text-2xl font-normal font-montserrat text-center max-w-4xl mx-auto mb-8 md:mb-10 drop-shadow-md animate-fade-in">
           {{ $description ?? 'Deskripsi produk belum diisi.' }}
        </p>
        <!-- Optional Image -->
        @if(!empty($image))
            <img src="{{ $image }}" alt="Hero Image" class="mx-auto mb-6 max-h-32">
        @endif
        <!-- Search Bar -->
        @if(!empty($showSearch))
        <div class="w-full max-w-md relative animate-slide-in-right">
            <input
                type="text"
                placeholder="{{ $searchPlaceholder ?? 'Cari produk...' }}"
                class="w-full h-12 pl-6 pr-24 rounded-full text-stone-500 text-sm md:text-base font-medium font-montserrat shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-400 bg-white"
                id="{{ $searchId ?? 'produk-search' }}"
            >
            <button class="absolute right-0 top-0 h-12 w-28 bg-sky-500 rounded-r-full text-white text-base md:text-lg font-medium font-montserrat hover:bg-sky-600 transition-colors shadow-lg border-2 border-white" onclick="searchArtikel()">
                Cari
            </button>
        </div>
        @endif
    </div>
</section>
