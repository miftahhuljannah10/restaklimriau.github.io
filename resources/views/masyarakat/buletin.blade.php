@extends('welcome')

@section('title', 'Buletin - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Buletin Klimatologi dan Meteorologi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Buletin, Meteorologi, Cuaca, Iklim">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.hero-media', [
        'title' => 'Buletin',
        'description' =>
            'Buletin berkala yang berisi informasi meteorologi, klimatologi, dan geofisika serta analisis cuaca dan iklim wilayah Riau.',
        'showSearch' => true,
        'searchPlaceholder' => 'Ketikkan Buletin',
        'searchRing' => 'focus:ring-sky-300',
        'searchId' => 'buletin-search',
    ])
    <section class="w-full py-12 md:py-16 lg:py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <button onclick="history.back()"
                    class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>
            <!-- Buletin Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" id="buletin-grid">
                @forelse($buletinList as $buletin)
                    @include('components.before-login.media.buletin-card', [
                        'id' => 'buletin-' . $buletin->id,
                        'image' => $buletin->image ? asset($buletin->image) : asset('assets/images/buletin2.png'),
                        'edisi' => $buletin->edisi,
                        'judul' => $buletin->judul,
                        'penulis' => $buletin->penulis,
                        'tanggal' => $buletin->created_at ? $buletin->created_at->format('d F Y') : '',
                        'link' => $buletin->link,
                    ])
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        Belum ada buletin.
                    </div>
                @endforelse
            </div>
            <!-- Pagination Dummy -->
            <div class="mt-8 flex justify-center">
                <!-- ...pagination as before... -->
            </div>
        </div>
    </section>
@endsection
