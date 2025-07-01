<!-- Komponen Detail Produk Modern dan Responsive -->
<div class="bg-white py-10 font-montserrat">
    <div class="container mx-auto px-6 md:px-16">
        <!-- Judul dan Meta -->
        <div class="mb-8 border-b pb-4">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $judul }}</h2>
            <div class="flex flex-wrap items-center text-gray-500 space-x-4 text-sm">
                <span><i class="fa-solid fa-calendar-days mr-1"></i> {{ $tanggal }}</span>
                <span><i class="fa fa-list-alt mr-1"></i> {{ $kategori }}</span>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Grafik/Visualisasi -->
            <div class="lg:w-2/3 w-full">
                <div class="rounded-lg shadow overflow-hidden bg-gray-50">
                    <iframe frameborder="0" marginheight="0" marginwidth="0" title="Data Visualization" allowtransparency="true" allowfullscreen="true" class="w-full h-[400px] md:h-[600px]" src="{{ $iframe }}"></iframe>
                </div>
            </div>
            <!-- Deskripsi dan Info Samping -->
            <div class="lg:w-1/3 w-full flex flex-col gap-6 mt-8 lg:mt-0">
                <div class="text-justify  text-gray-700 leading-relaxed">
                    <p class="mb-4">{!! $deskripsi !!}</p>
                    <ul class="space-y-2">
                        @foreach($kriteria as $item)
                            <li class="flex items-center"><span class="inline-block w-8 h-4 bg-gradient-to-r {{ $item['warna'] }} rounded mr-2"></span> <span>{{ $item['teks'] }}</span></li>
                        @endforeach
                    </ul>
                    <p class="mt-4">{!! $keterangan_bawah !!}</p>
                </div>
                <!-- Kartu Informasi -->
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex flex-col md:flex-row md:justify-between gap-4">
                        <div>
                            <div class="text-xs text-gray-500">Topik</div>
                            <div class="font-semibold text-gray-700 flex items-center"><i class="fas fa-book mr-2"></i> {{ $topik }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Sumber Data</div>
                            <div class="font-semibold text-gray-700 flex items-center"><i class="fas fa-chart-area mr-2"></i> {{ $sumber }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
