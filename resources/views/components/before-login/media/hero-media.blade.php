<!-- Hero Media Dinamis untuk Artikel, Buletin, Berita -->
<section class="w-full h-[300px] sm:h-[350px] md:h-[400px] relative overflow-hidden bg-gradient-to-br {{ $bgColor ?? 'from-sky-300 to-cyan-50' }}">
    <!-- Background Images Grid (Decorative) -->
    <div class="absolute inset-0 grid grid-cols-3 grid-rows-2 z-10">
        <div class="bg-cover bg-center" style="background-image: url('{{ $bgImage ?? 'assets/images/artikel_bg.png' }}')"></div>
        <div class="bg-cover bg-center" style="background-image: url('{{ $bgImage ?? 'assets/images/artikel_bg.png' }}')"></div>
        <div class="bg-cover bg-center" style="background-image: url('{{ $bgImage ?? 'assets/images/artikel_bg.png' }}')"></div>
        <div class="bg-cover bg-center" style="background-image: url('{{ $bgImage ?? 'assets/images/artikel_bg.png' }}')"></div>
        <div class="bg-cover bg-center" style="background-image: url('{{ $bgImage ?? 'assets/images/artikel_bg.png' }}')"></div>
        <div class="bg-cover bg-center" style="background-image: url('{{ $bgImage ?? 'assets/images/artikel_bg.png' }}')"></div>
    </div>
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-black/20 to-black/0 z-10"></div>
    <!-- Hero Content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full px-4">
        <!-- Hero Title -->
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold font-montserrat mb-4 md:mb-6 text-center drop-shadow-lg">
            {{ $title ?? 'Judul' }}
        </h1>
        <!-- Hero Subtitle -->
        <p class="text-white text-base sm:text-lg md:text-xl lg:text-2xl font-normal font-montserrat text-center max-w-4xl mx-auto mb-8 md:mb-10 drop-shadow-md">
            {{ $description ?? 'Deskripsi belum diisi.' }}
        </p>
        <!-- Search Bar -->
        @if(!empty($showSearch))
        <div class="w-full max-w-md relative">
            <input
                type="text"
                placeholder="{{ $searchPlaceholder ?? 'Ketikkan...' }}"
                class="w-full h-12 pl-6 pr-24 rounded-full text-stone-500 text-sm md:text-base font-medium font-montserrat shadow-lg focus:outline-none focus:ring-2 {{ $searchRing ?? 'focus:ring-sky-300' }} bg-white"
                id="{{ $searchId ?? 'search-bar' }}"
            >
            <button class="absolute right-0 top-0 h-12 w-28 bg-sky-500 rounded-r-full text-white text-base md:text-lg font-medium font-montserrat hover:bg-sky-600 transition-colors" onclick="searchArtikel()">
                Cari
            </button>
        </div>
        @endif
    </div>
</section>
