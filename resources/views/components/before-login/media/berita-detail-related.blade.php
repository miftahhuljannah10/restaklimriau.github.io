<!-- Related News Component -->
<section class="w-full py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-gray-800 text-3xl font-bold font-montserrat">Berita Utama Lainnya</h2>
            <a href="/berita" class="inline-flex items-center gap-2 text-sky-500 hover:text-sky-600 transition-colors">
                <span class="text-sm font-medium font-montserrat">Lihat Semuanya</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

  <!-- Related News Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

    <!-- Related News Card 1 -->
    <article class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden h-full flex flex-col cursor-pointer hover:transform hover:scale-105" onclick="openRelatedNews('related-1')">
        <!-- Related News Image -->
        <div class="relative h-62 overflow-hidden bg-gray-100">
            <img src="/assets/images/berita2.png" alt="Related News Thumbnail" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
        </div>

        <!-- Related News Content -->
        <div class="p-5 flex flex-col flex-grow">
            <!-- Category -->
            <span class="text-sky-600 text-sm font-semibold font-montserrat mb-2">Berita Terkini</span>

            <!-- Title -->
            <h3 class="text-black text-xl font-semibold font-montserrat mb-4 line-clamp-2">
                BMKG dan Pemerintah Provinsi Riau Tingkatkan Kesiapsiagaan Hadapi Musim Kemarau 2025
            </h3>

            <!-- Spacer to push metadata to bottom -->
            <div class="flex-grow"></div>

            <!-- Author -->
            <div class="text-black text-sm font-semibold font-montserrat mb-1">
                Tim Redaksi BMKG Riau
            </div>

            <!-- Date -->
            <div class="text-stone-500 text-xs font-semibold font-montserrat">
                25 April 2025
            </div>
        </div>
    </article>

    <!-- Related News Card 2 -->
    <article class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden h-full flex flex-col cursor-pointer hover:transform hover:scale-105" onclick="openRelatedNews('related-2')">
        <!-- Related News Image -->
        <div class="relative h-62 overflow-hidden bg-gray-100">
            <img src="/assets/images/berita2.png" alt="Related News Thumbnail" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
        </div>

        <!-- Related News Content -->
        <div class="p-5 flex flex-col flex-grow">
            <!-- Category -->
            <span class="text-sky-600 text-sm font-semibold font-montserrat mb-2">Kegiatan</span>

            <!-- Title -->
            <h3 class="text-black text-xl font-semibold font-montserrat mb-4 line-clamp-2">
                Staklim Riau Gelar Rapat PMK 2025, Sinergi BMKG-Pemprov Riau Antisipasi Dampak Musim Kemarau 2025
            </h3>

            <!-- Spacer to push metadata to bottom -->
            <div class="flex-grow"></div>

            <!-- Author -->
            <div class="text-black text-sm font-semibold font-montserrat mb-1">
                Humas BMKG Riau
            </div>

            <!-- Date -->
            <div class="text-stone-500 text-xs font-semibold font-montserrat">
                25 April 2025
            </div>
        </div>
    </article>

    <!-- Related News Card 3 -->
    <article class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden h-full flex flex-col cursor-pointer hover:transform hover:scale-105" onclick="openRelatedNews('related-3')">
        <!-- Related News Image -->
        <div class="relative h-62 overflow-hidden bg-gray-100">
            <img src="/assets/images/berita2.png" alt="Related News Thumbnail" class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
        </div>

        <!-- Related News Content -->
        <div class="p-5 flex flex-col flex-grow">
            <!-- Category -->
            <span class="text-sky-600 text-sm font-semibold font-montserrat mb-2">Pengumuman</span>

            <!-- Title -->
            <h3 class="text-black text-xl font-semibold font-montserrat mb-4 line-clamp-2">
                Dukung Mitigasi Bencana Hidrometeorologi, BMKG Lakukan Pengembangan Radar Cuaca Non-polarimetrik
            </h3>

            <!-- Spacer to push metadata to bottom -->
            <div class="flex-grow"></div>

            <!-- Author -->
            <div class="text-black text-sm font-semibold font-montserrat mb-1">
                Tim Teknis BMKG
            </div>

            <!-- Date -->
            <div class="text-stone-500 text-xs font-semibold font-montserrat">
                25 April 2025
            </div>
        </div>
    </article>

</div>
    </div>
</section>

<script>
// Related news functions
function handleViewAllNews() {
    console.log('🔗 Navigating to all news...');

    if (typeof showLoadingMessage === 'function') {
        showLoadingMessage('Memuat semua berita...');
    }

    setTimeout(() => {
        try {
            window.location.href = '/berita';
        } catch (error) {
            console.error('Navigation failed:', error);
            if (typeof showErrorMessage === 'function') {
                showErrorMessage('Gagal membuka halaman. Silakan coba lagi.');
            } else {
                alert('Gagal membuka halaman. Silakan coba lagi.');
            }
        }
    }, 300);
}

function openRelatedNews(newsId) {
    console.log('Opening related news:', newsId);

    // Add visual feedback
    if (event && event.currentTarget) {
        event.currentTarget.style.transform = 'scale(0.98)';
        setTimeout(() => {
            event.currentTarget.style.transform = '';
        }, 150);
    }

    if (typeof showLoadingMessage === 'function') {
        showLoadingMessage('Memuat berita terkait...');
    }

    setTimeout(() => {
        try {
            // Navigate to berita detail page (same as main berita cards)
            window.location.href = '/berita-detail';
        } catch (error) {
            console.error('Navigation failed:', error);
            if (typeof showErrorMessage === 'function') {
                showErrorMessage('Gagal membuka berita. Silakan coba lagi.');
            } else {
                alert('Gagal membuka berita. Silakan coba lagi.');
            }
        }
    }, 300);
}

// Make functions globally available
window.handleViewAllNews = handleViewAllNews;
window.openRelatedNews = openRelatedNews;
</script>
