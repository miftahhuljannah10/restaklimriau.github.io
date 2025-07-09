{{-- Komponen prakiraan cuaca homepage, carousel modern tanpa scroll bar, panah di tengah, 5 grid card --}}
@php
    $showCount = 5; // jumlah kartu tampil di desktop
@endphp
<div class="w-full bg-white">
    <div class="max-w-[1441px] mx-auto px-4 sm:px-6 md:px-8 lg:px-[120px]">
        {{-- Judul --}}
        <div class="mb-8">
            <h2 class="gradient-text text-2xl sm:text-3xl font-bold font-montserrat">Prakiraan Cuaca</h2>
        </div>

        {{-- Carousel Container --}}
        <div class="relative mt-6 md:mt-10 w-full h-full">
            <div class="relative overflow-hidden">
                {{-- Tombol Panah --}}
                <button aria-label="Sebelumnya" id="cw-prev-slide"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-white flex justify-center items-center rounded-full border border-gray-300 shadow hover:bg-blue-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button aria-label="Selanjutnya" id="cw-next-slide"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-8 h-8 bg-white flex justify-center items-center rounded-full border border-gray-300 shadow hover:bg-blue-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                {{-- Item Cuaca --}}
                <div id="cuaca-carousel" class="flex transition-transform duration-500">
                    @foreach ($prakiraanCuacaRiau as $cuaca)
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/5 flex-shrink-0 px-2 mb-8">
                            <div
                                class="relative flex flex-col px-6 py-5 rounded-2xl bg-gradient-to-br from-blue-200/40 to-cyan-100/40 shadow-md hover:shadow-xl hover:scale-105 transition-all duration-200 border border-white">
                                <a href="/cuaca/prakiraan-cuaca/{{ $cuaca['kode'] }}"
                                    class="absolute w-full h-full z-[5] rounded-2xl"></a>
                                <div class="relative">
                                    <h3 class="text-xl font-semibold font-montserrat truncate">{{ $cuaca['nama'] }}</h3>
                                    <p class="text-sm text-gray-500 font-medium font-montserrat truncate">
                                        {{ \Carbon\Carbon::parse($cuaca['waktu'])->translatedFormat('d M Y H:i') }}
                                    </p>
                                </div>
                                <div class="relative mt-4 flex flex-col items-center">
                                    <p class="text-[32px] leading-[48px] font-bold mt-0.5 font-montserrat">
                                        {{ $cuaca['suhu'] }} °C
                                    </p>
                                </div>
                                <div class="relative mt-4 flex justify-between items-center">
                                    <p class="text-sm font-medium font-montserrat truncate max-w-[150px]">
                                        {{ $cuaca['kondisi'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <p class="text-xs text-gray-400 text-center mt-4">
                    Sumber data: <a href="https://www.bmkg.go.id" target="_blank"
                        class="underline text-blue-500">BMKG</a>
                </p>
            </div>
        </div>
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
