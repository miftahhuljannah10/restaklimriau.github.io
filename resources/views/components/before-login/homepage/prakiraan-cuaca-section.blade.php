{{-- Komponen prakiraan cuaca homepage, carousel modern tanpa scroll bar, panah di tengah, 5 grid card --}}
@php
  $showCount = 5; // jumlah kartu tampil di desktop
@endphp
<div class="w-full bg-white">
  <div class="max-w-[1441px] mx-auto px-4 sm:px-6 md:px-8 lg:px-[120px]">
    {{-- Judul Prakiraan Cuaca --}}
    <div class="mb-8 md:mb-8">
      <h2 class="gradient-text text-2xl sm:text-3xl font-bold font-montserrat">
        Prakiraan Cuaca
      </h2>
    </div>
    <div class="mt-6 md:mt-10 w-full h-full relative">
      <div class="relative overflow-hidden">
        <button aria-label="Sebelumnya" id="cw-prev-slide" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-white flex justify-center items-center rounded-full border border-gray-300 shadow hover:bg-blue-50 transition disabled:opacity-50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
        </button>
        <button aria-label="Selanjutnya" id="cw-next-slide" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-white flex justify-center items-center rounded-full border border-gray-300 shadow hover:bg-blue-50 transition disabled:opacity-50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /></svg>
        </button>
        <div id="cuaca-carousel" class="flex transition-transform duration-500" style="will-change: transform;">
          @foreach($prakiraanCuacaRiau as $cuaca)
          <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/5 flex-shrink-0 px-2 mb-8"> {{-- Tambah mb-8 agar tiap card ada jarak bawah --}}
            <div class="relative flex flex-col px-6 py-5 rounded-2xl bg-gradient-to-br from-blue-200/40 to-cyan-100/40 shadow-md hover:shadow-xl hover:scale-105 transition-all duration-200 border border-white">
              <a href="/cuaca/prakiraan-cuaca/{{ $cuaca['kode'] }}" aria-label="Selengkapnya" class="absolute w-full h-full z-[5] rounded-2xl"></a>
              <div class="relative">
                <h3 class="text-xl font-semibold font-montserrat truncate">{{ $cuaca['nama'] }}</h3>
                <p class="text-sm text-gray-500 font-medium font-montserrat truncate">{{ $cuaca['waktu'] }}</p>
              </div>
              <div class="relative mt-4 flex flex-col items-center">
                {{-- Render SVG icon tanpa class tambahan agar sesuai kode asli --}}
                {!! preg_replace('/class="[^"]*"/', '', $cuaca['icon'] ?? '') !!}
                <p class="text-[32px] leading-[48px] font-bold mt-0.5 font-montserrat">{{ $cuaca['suhu'] }} °C </p>
              </div>
              <div class="relative mt-4 flex justify-between items-center">
                <p class="text-sm font-medium font-montserrat truncate max-w-[150px]">{{ $cuaca['kondisi'] }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="w-5 h-5 flex justify-center items-center bg-blue-400 rounded-full"><path d="M6.35355 2.14645C6.15829 1.95118 5.84171 1.95118 5.64645 2.14645C5.45118 2.34171 5.45118 2.65829 5.64645 2.85355L8.29289 5.5H2.5C2.22386 5.5 2 5.72386 2 6C2 6.27614 2.22386 6.5 2.5 6.5H8.29289L5.64645 9.14645C5.45118 9.34171 5.45118 9.65829 5.64645 9.85355C5.84171 10.0488 6.15829 10.0488 6.35355 9.85355L9.85355 6.35355C10.0488 6.15829 10.0488 5.84171 9.85355 5.64645L6.35355 2.14645Z" fill="white"></path></svg>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    {{-- Tambahkan jarak bawah agar card tidak mepet --}}
    <div class="pb-8"></div>
  </div>
</div>
@push('scripts')
<script>
window.addEventListener('DOMContentLoaded', function() {
    window.initPrakiraanCuacaCarousel(@json($prakiraanCuacaRiau));
});
</script>
@endpush
