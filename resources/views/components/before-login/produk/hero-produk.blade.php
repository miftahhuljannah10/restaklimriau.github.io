<!-- Hero Artikel Section Component -->
<section class="w-full h-[340px] sm:h-[380px] md:h-[420px] relative overflow-hidden bg-gradient-to-br from-white via-slate-100 to-blue-50">
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
        <h1 class="gradient-text text-3xl sm:text-4xl md:text-5xl font-bold font-montserrat mb-4 md:mb-6 text-center drop-shadow-lg animate-slide-up">
            {{ $title ?? 'Judul Produk' }}
        </h1>
        <!-- Hero Subtitle -->
        <p class="text-slate-700 text-base sm:text-lg md:text-xl lg:text-2xl font-normal font-montserrat text-center max-w-4xl mx-auto mb-8 md:mb-10 drop-shadow-md animate-fade-in">
           {{ $description ?? 'Deskripsi produk belum diisi.' }}
        </p>
        <!-- Optional Image -->
        @if(!empty($image))
            <img src="{{ $image }}" alt="Hero Image" class="mx-auto mb-6 max-h-32 animate-float">
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
            <button class="absolute right-0 top-0 h-12 w-28 bg-sky-500 rounded-r-full text-white text-base md:text-lg font-medium font-montserrat hover:bg-sky-600 transition-colors" onclick="searchArtikel()">
                Cari
            </button>
        </div>
        @endif
    </div>
</section>
<style>
@keyframes cloud-float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-18px); }
}
.animate-cloud-float { animation: cloud-float 7s ease-in-out infinite; }
@keyframes sun-pulse {
  0%, 100% { filter: drop-shadow(0 0 0 #fde047); }
  50% { filter: drop-shadow(0 0 24px #fde047); }
}
.animate-sun-pulse { animation: sun-pulse 3s ease-in-out infinite; }
@keyframes sun-rays {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}
.animate-sun-rays { animation: sun-rays 2.5s ease-in-out infinite; }
@keyframes sun-move {
  0% { transform: translateY(0) scale(1); }
  30% { transform: translateY(-10px) scale(1.04); }
  60% { transform: translateY(6px) scale(0.98); }
  100% { transform: translateY(0) scale(1); }
}
.animate-sun-move { animation: sun-move 7s ease-in-out infinite, sun-pulse 3s ease-in-out infinite; }
@keyframes rain {
  0% { opacity: 0.7; transform: translateY(0); }
  80% { opacity: 1; }
  100% { opacity: 0.1; transform: translateY(18px); }
}
.animate-rain line {
  animation: rain 1.6s linear infinite;
}
.animate-rain line:nth-child(2) { animation-delay: 0.4s; }
.animate-rain line:nth-child(3) { animation-delay: 0.8s; }
.animate-rain line:nth-child(4) { animation-delay: 1.2s; }
@keyframes slide-up {
  0% { opacity: 0; transform: translateY(40px); }
  100% { opacity: 1; transform: translateY(0); }
}
@keyframes fade-in {
  0% { opacity: 0; }
  100% { opacity: 1; }
}
@keyframes slide-in-right {
  0% { opacity: 0; transform: translateX(40px); }
  100% { opacity: 1; transform: translateX(0); }
}
.animate-slide-up { animation: slide-up 0.8s cubic-bezier(0.4,0,0.2,1) both; }
.animate-fade-in { animation: fade-in 1.2s cubic-bezier(0.4,0,0.2,1) both; }
.animate-slide-in-right { animation: slide-in-right 1s cubic-bezier(0.4,0,0.2,1) both; }
.animate-float { animation: float 3s ease-in-out infinite; }
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
</style>
