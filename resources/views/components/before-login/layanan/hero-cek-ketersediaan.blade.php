<!-- Hero Section for Cek Ketersediaan Data Alat dengan animasi peta dan marker, warna dan elemen mirip hero produk -->
<section class="w-full h-[340px] sm:h-[380px] md:h-[420px] relative overflow-hidden bg-gradient-to-br from-bmkg-blue via-bmkg-light-blue to-bmkg-cyan">
    <!-- Animasi peta dan marker kiri -->
    <svg class="absolute left-8 top-8 w-44 h-44 z-0 animate-bounce-slow" viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Peta background -->
        <rect x="20" y="30" width="120" height="80" rx="18" fill="#bae6fd" stroke="#38bdf8" stroke-width="4"/>
        <!-- Sungai -->
        <path d="M40 60 Q80 90 120 60" stroke="#0ea5e9" stroke-width="4" fill="none"/>
        <!-- Marker utama -->
        <g class="animate-marker-pop">
            <circle cx="80" cy="70" r="12" fill="#f87171" stroke="#b91c1c" stroke-width="3"/>
            <rect x="75" y="82" width="10" height="18" rx="5" fill="#f87171"/>
            <circle cx="80" cy="70" r="5" fill="#fff"/>
        </g>
        <!-- Marker lain -->
        <g class="animate-marker-fade">
            <circle cx="50" cy="80" r="6" fill="#38bdf8"/>
            <circle cx="110" cy="80" r="6" fill="#38bdf8"/>
        </g>
        <!-- Animasi awan -->
        <ellipse cx="120" cy="35" rx="22" ry="10" fill="#e0f2fe" class="animate-cloud-float"/>
        <ellipse cx="135" cy="40" rx="12" ry="6" fill="#bae6fd" class="animate-cloud-float2"/>
        <!-- Animasi sinar -->
        <g class="animate-sun-rays">
            <circle cx="40" cy="40" r="8" fill="#fde047" fill-opacity="0.7"/>
            <line x1="40" y1="25" x2="40" y2="10" stroke="#fde047" stroke-width="3"/>
        </g>
    </svg>
    <!-- Animasi kanan: alat iklim (ombrometer, thermometer, anemometer) -->
    <svg class="absolute right-8 top-8 w-44 h-44 z-0" viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Ombrometer (penakar hujan) -->
        <g class="animate-ombrometer">
            <ellipse cx="50" cy="120" rx="18" ry="8" fill="#bae6fd"/>
            <rect x="32" y="90" width="36" height="30" rx="8" fill="#38bdf8"/>
            <ellipse cx="50" cy="90" rx="18" ry="8" fill="#e0f2fe"/>
            <!-- Air turun -->
            <rect x="47" y="100" width="6" height="16" rx="3" fill="#0ea5e9" class="animate-water-drop"/>
        </g>
        <!-- Thermometer -->
        <g>
            <rect x="110" y="80" width="12" height="38" rx="6" fill="#f87171"/>
            <circle cx="116" cy="122" r="10" fill="#f87171"/>
            <rect x="114" y="85" width="4" height="25" rx="2" fill="#fff"/>
        </g>
        <!-- Anemometer (alat angin) -->
        <g class="animate-anemometer">
            <circle cx="140" cy="60" r="8" fill="#38bdf8"/>
            <g class="animate-anemometer-prop">
                <rect x="139" y="44" width="2" height="16" rx="1" fill="#0ea5e9"/>
                <rect x="139" y="60" width="2" height="16" rx="1" fill="#0ea5e9" transform="rotate(90 140 68)"/>
            </g>
            <circle cx="140" cy="44" r="3" fill="#bae6fd"/>
            <circle cx="156" cy="60" r="3" fill="#bae6fd"/>
            <circle cx="140" cy="76" r="3" fill="#bae6fd"/>
            <circle cx="124" cy="60" r="3" fill="#bae6fd"/>
        </g>
    </svg>
    <!-- Hero Content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full px-4">
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold font-montserrat mb-4 md:mb-6 text-center drop-shadow-lg animate-slide-up">
            {{ $title ?? 'Cek Ketersediaan Data Alat' }}
        </h1>
        <p class="text-white text-base sm:text-lg md:text-xl lg:text-2xl font-normal font-montserrat text-center max-w-4xl mx-auto mb-8 md:mb-10 drop-shadow-md animate-fade-in">
            {{ $description ?? 'Silakan cek lokasi dan ketersediaan alat pada peta interaktif di bawah ini. Klik marker untuk info jenis alat.' }}
        </p>
        @if(!empty($image))
            <img src="{{ $image }}" alt="Hero Image" class="mx-auto mb-6 max-h-32 animate-fade-in">
        @endif
        @if(!empty($showSearch))
        <div class="w-full max-w-md relative animate-slide-in-right">
            <input
                type="text"
                placeholder="{{ $searchPlaceholder ?? 'Cari alat...' }}"
                class="w-full h-12 pl-6 pr-24 rounded-full text-stone-500 text-sm md:text-base font-medium font-montserrat shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-400 bg-white"
                id="{{ $searchId ?? 'alat-search' }}"
                onkeydown="if(event.key==='Enter'){searchAlat();}"
            >
            <button class="absolute right-0 top-0 h-12 w-28 bg-sky-500 rounded-r-full text-white text-base md:text-lg font-medium font-montserrat hover:bg-sky-600 transition-colors shadow-lg border-2 border-white" onclick="searchAlat()">
                Cari
            </button>
        </div>
        @endif
    </div>
    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .animate-bounce-slow { animation: bounce-slow 3.5s infinite; }
        @keyframes marker-pop {
            0% { transform: scale(0.7); opacity: 0; }
            60% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-marker-pop { animation: marker-pop 1.2s cubic-bezier(.68,-0.55,.27,1.55) 0.2s both; }
        @keyframes marker-fade {
            0% { opacity: 0; }
            100% { opacity: 0.7; }
        }
        .animate-marker-fade { animation: marker-fade 2s 1.1s both; }
        @keyframes cloud-float {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(12px); }
        }
        .animate-cloud-float { animation: cloud-float 5s ease-in-out infinite; }
        @keyframes cloud-float2 {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(-10px); }
        }
        .animate-cloud-float2 { animation: cloud-float2 6s ease-in-out infinite; }
        @keyframes sun-rays {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }
        .animate-sun-rays { animation: sun-rays 3s linear infinite; }
        @keyframes slide-in-right {
            0% { opacity: 0; transform: translateX(40px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in-right { animation: slide-in-right 1.2s cubic-bezier(.68,-0.55,.27,1.55) both; }
        @keyframes slide-up {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up { animation: slide-up 1.2s cubic-bezier(.68,-0.55,.27,1.55) both; }
        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .animate-fade-in { animation: fade-in 1.5s both; }
        @keyframes sun-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .animate-sun-spin { animation: sun-spin 8s linear infinite; transform-origin: 140px 40px; }
        @keyframes bird-flap {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .animate-bird-flap { animation: bird-flap 2.5s ease-in-out infinite; }
        .animate-bird-flap2 { animation: bird-flap 2.2s 0.7s ease-in-out infinite; }
        .animate-bird-flap3 { animation: bird-flap 2.8s 1.2s ease-in-out infinite; }
        @keyframes water-drop {
            0%, 100% { transform: translateY(0); opacity: 1; }
            80% { transform: translateY(18px); opacity: 0.2; }
        }
        .animate-water-drop { animation: water-drop 1.8s infinite; }
        @keyframes anemometer-prop-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .animate-anemometer-prop { animation: anemometer-prop-spin 2s linear infinite; transform-origin: 140px 60px; }
        @keyframes ombrometer-bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }
        .animate-ombrometer { animation: ombrometer-bounce 2.5s ease-in-out infinite; }
    </style>
</section>
<script>
function searchAlat() {
    const input = document.getElementById('{{ $searchId ?? 'alat-search' }}');
    if (!input) return;
    const q = input.value.trim();
    if (!q) {
        input.focus();
        input.classList.add('ring-2', 'ring-red-400');
        setTimeout(()=>input.classList.remove('ring-2','ring-red-400'), 1200);
        return;
    }
    // Implementasi pencarian alat: trigger event atau filter peta
    window.dispatchEvent(new CustomEvent('search-alat', { detail: { query: q } }));
}
</script>
