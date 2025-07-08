@extends('welcome')

@section('title', 'Berita - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Berita Terkini Klimatologi dan Meteorologi - BMKG Stasiun Klimatologi Riau">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Berita, Meteorologi, Cuaca, Iklim">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.media.hero-media', [
        'title' => 'Berita',
        'description' => 'Buletin adalah publikasi yang mengangkat perkembangan suatu topik atau aspek tertentu dan diterbitkan atau dipublikasikan secara teratur',
        'showSearch' => true,
        'searchPlaceholder' => 'Ketikkan Berita',
        'searchRing' => 'focus:ring-sky-300',
        'searchId' => 'berita-search'
    ])

    <section class="w-full py-12 md:py-16 lg:py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <div class="mb-6">
                <button onclick="history.back()" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-medium font-montserrat">Kembali</span>
                </button>
            </div>

            <!-- Berita Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8" id="berita-grid">
                @forelse($beritaList as $berita)
                    @include('components.before-login.media.berita-card', $berita)
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada berita</h3>
                        <p class="mt-1 text-sm text-gray-500">Berita terbaru akan ditampilkan di sini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Dummy -->
            <div class="mt-8 flex justify-center">
                <nav class="inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span>&lt;</span>
                    </a>
                    <a href="#" class="z-10 bg-sky-600 border-sky-600 text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                    <a href="#" class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                    <a href="#" class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                    <a href="#" class="bg-white border-gray-300 text-gray-700 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">4</a>
                    <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span>&gt;</span>
                    </a>
                </nav>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('berita-search');
        const beritaGrid = document.getElementById('berita-grid');
        const beritaCards = beritaGrid.querySelectorAll('.berita-card');

        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            let foundItems = 0;

            beritaCards.forEach(card => {
                const title = card.querySelector('.berita-title').textContent.toLowerCase();
                const kategori = card.querySelector('.berita-kategori').textContent.toLowerCase();

                if (title.includes(searchTerm) || kategori.includes(searchTerm)) {
                    card.style.display = '';
                    foundItems++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show no results message if needed
            const noResultsEl = document.getElementById('no-search-results');
            if (foundItems === 0 && searchTerm !== '') {
                if (!noResultsEl) {
                    const noResults = document.createElement('div');
                    noResults.id = 'no-search-results';
                    noResults.className = 'col-span-full text-center py-8';
                    noResults.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak ada hasil</h3>
                        <p class="mt-1 text-sm text-gray-500">Coba kata kunci lain</p>
                    `;
                    beritaGrid.appendChild(noResults);
                }
            } else if (noResultsEl) {
                noResultsEl.remove();
            }
        });
    });
</script>
@endsection
