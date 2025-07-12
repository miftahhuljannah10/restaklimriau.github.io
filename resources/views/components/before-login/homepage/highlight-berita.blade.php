<div class="w-screen bg-gray-100 py-4 relative left-1/2 right-1/2 -mx-[50vw] ml-[-50vw] mr-[-50vw] mt-12">
    <div class="max-w-7xl mx-auto px-2 md:px-8">
        <div class="highlight-berita p-6 mb-4">
            <div class="flex items-center gap-3 mb-6">
                <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 shadow">
                    <i class="fa fa-bolt text-sky-500 text-2xl"></i>
                </span>
                <h2 class="text-3xl font-extrabold gradient-text tracking-tight font-montserrat drop-shadow">Highlight Berita</h2>
            </div>
            @if(isset($highlightBerita) && count($highlightBerita) > 0)
                {{-- Card besar di atas --}}
                <div class="group bg-white border border-gray-100 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col md:flex-row overflow-hidden mb-6">
                    <div class="relative w-full md:w-2/5 h-56 md:h-72 overflow-hidden bg-gray-100 flex items-center justify-center">
                        @if(isset($highlightBerita[0]->gambar))
                            <img src="{{ asset($highlightBerita[0]->gambar) }}" alt="{{ $highlightBerita[0]->judul }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        @else
                            <img src="{{ asset('assets/images/berita2.png') }}" alt="No Image" class="object-cover w-full h-full opacity-60">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent pointer-events-none"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <span class="text-stone-500 text-sm font-semibold font-montserrat mb-2">Berita</span>
                        <a href="{{ url('berita/'.$highlightBerita[0]->id) }}" class="text-black text-2xl font-bold font-montserrat mb-2 line-clamp-2 block group-hover:text-sky-600 transition-colors">
                            {{ $highlightBerita[0]->judul }}
                        </a>
                        <p class="text-gray-600 text-base line-clamp-4 mb-4 font-inter">{{ Str::limit($highlightBerita[0]->isi, 180) }}</p>
                        <a href="{{ url('berita/'.$highlightBerita[0]->id) }}" class="mt-auto inline-flex items-center gap-1 text-sky-600 hover:text-sky-800 font-bold transition-colors font-nunito text-sm">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                {{-- Card kecil di bawah --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach(array_slice($highlightBerita, 1, 3) as $berita)
                        <div class="group bg-white border border-gray-100 rounded-3xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">
                            <div class="relative w-full h-40 rounded-t-3xl overflow-hidden bg-gray-100 flex items-center justify-center">
                                @if(isset($berita->gambar))
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                @else
                                    <img src="{{ asset('assets/images/berita2.png') }}" alt="No Image" class="object-cover w-full h-full opacity-60">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent pointer-events-none"></div>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <span class="text-stone-500 text-sm font-semibold font-montserrat mb-2">Berita</span>
                                <a href="{{ url('berita/'.$berita->id) }}" class="text-black text-xl font-semibold font-montserrat mb-2 line-clamp-2 block group-hover:text-sky-600 transition-colors">
                                    {{ $berita->judul }}
                                </a>
                                <p class="text-gray-600 text-sm line-clamp-3 mb-4 font-inter">{{ Str::limit($berita->isi, 100) }}</p>
                                <a href="{{ url('berita/'.$berita->id) }}" class="mt-auto inline-flex items-center gap-1 text-sky-600 hover:text-sky-800 font-bold transition-colors font-nunito text-sm">Baca Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic">Tidak ada berita highlight saat ini.</p>
            @endif
        </div>
    </div>
</div>
