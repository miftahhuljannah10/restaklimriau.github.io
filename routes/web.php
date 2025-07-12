<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\UrlController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\MetadataAlatController;
use App\Http\Controllers\Admin\TarifPNBPController;
use App\Http\Controllers\Admin\FeedbackQuestionController;
use App\Http\Controllers\Admin\FeedbackResponseController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\BeritaArtikelController;
use App\Http\Controllers\Admin\KategoriBeritaArtikelController;
use App\Http\Controllers\Admin\MediaBuletinController;
use App\Http\Controllers\Admin\AlatCurahHujanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\KlasifikasiSuratController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\BukuTamuController;
use App\Http\Controllers\Masyarakat\BeritaController;
use App\Http\Controllers\Admin\PegawaiDashboardController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Masyarakat\ProfilPerusahaanController;
use App\Http\Controllers\Masyarakat\CekKetersediaanDataController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Masyarakat\BuletinController;
use App\Http\Controllers\Masyarakat\KontakController;
use App\Models\Alat;

// Public Routes
Route::get('/', [HomeController::class, 'index']);

// Static Pages
Route::get('/artikel', function () {
    return view('masyarakat.artikel');
});
Route::get('/artikel-detail', function () {
    return view('masyarakat.artikel-detail');
});
Route::get('/form-layanan', function () {
    return view('masyarakat.form-layanan');
});
Route::get('/iklim-terapan', function () {
    return view('masyarakat.iklim-terapan');
});
Route::get('/layanan', function () {
    return view('masyarakat.layanan');
})->name('layanan.utama');
Route::get('/media', function () {
    return view('masyarakat.media');
});
Route::get('/produk', function () {
    return view('masyarakat.produk');
});
Route::get('/profil-detail', function () {
    return view('masyarakat.profil-detail');
});
Route::get('/tarif-pnbp', function () {
    return view('masyarakat.tarif-pnbp');
});
Route::get('/perubahan-iklim', function () {
    return view('masyarakat.perubahan-iklim');
});
Route::get('/informasi-iklim', function () {
    return view('masyarakat.informasi-iklim');
});
Route::get('/kualitas-udara', function () {
    return view('masyarakat.kualitas-udara');
});
Route::get('/cuaca', function () {
    return view('masyarakat.cuaca');
});

// Dynamic Public Routes
Route::get('/profil', [ProfilPerusahaanController::class, 'index'])->name('profil');
Route::get('/cek-ketersediaan-data', [CekKetersediaanDataController::class, 'index'])
    ->name('cek-ketersediaan-data.index');
Route::get('/masyarakat/detail-alat/{nomor_pos}', [CekKetersediaanDataController::class, 'show'])
    ->name('cek-ketersediaan-data.show');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/kategori/{kategori}', [BeritaController::class, 'category'])->name('berita.category');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/buletin', [BuletinController::class, 'index'])->name('buletin.index');

// Product Detail
Route::get('/produk/detail-produk', function () {
    return view('masyarakat.detail-produk', [
        'judul' => 'Prakiraan Ketersediaan Air Bagi Tanaman',
        'tanggal' => '27 Oct 2022',
        'kategori' => 'Agroklimat',
        'iframe' => 'https://visklim.bmkg.go.id/views/PrakiraanKetersediaanAirBagiTanaman/DashboardPraATi?:embed=y&:showVizHome=no&:host_url=https%3A%2F%2Fvisklim.bmkg.go.id%2F&:embed_code_version=3&:tabs=no&:toolbar=yes&:animate_transition=yes&:display_static_image=yes&:display_spinner=no&:display_overlay=yes&:display_count=yes&:device=desktop&:language=en-US&Provinsi=RIAU&:loadOrderID=0',
        'deskripsi' => '<p>Perhitungan Tingkat Ketersediaan Air Tanah Bagi Tanaman (ATi) dihitung menggunakan perhitungan neraca air dengan metode <em>Thornthwaite and Mather</em>. ATi dihitung dengan persamaan ((KAT - TLP)/(KL - TLP)) x 100% dengan kriteria sebagai berikut :</p>',
        'kriteria' => [
            ['warna' => 'from-red-400 to-red-600', 'teks' => 'Sangat Kurang: 0 - 20%'],
            ['warna' => 'from-orange-400 to-orange-600', 'teks' => 'Kurang: 20 - 40%'],
            ['warna' => 'from-yellow-400 to-yellow-600', 'teks' => 'Sedang: 40 - 60%'],
            ['warna' => 'from-green-400 to-green-600', 'teks' => 'Cukup: 60 - 80%'],
            ['warna' => 'from-blue-400 to-blue-600', 'teks' => 'Sangat Cukup: 80 - 100%'],
        ],
        'keterangan_bawah' => '<p>Grafik prakiraan tingkat ketersediaan air tanah bagi tanaman terkhususnya wilayah provinsi Riau dapat di filter sesuai bulan, provinsi, kabupaten/kota dan kategori kriteria. Grafik ini juga menampilkan tingkat ketersediaan air tanah secara realtime sehingga dapat mendukung kegiatan masyarakat terkhusus di sektor pertanian di wilayah Riau.</p>',
        'topik' => 'Agroklimat',
        'sumber' => 'BMKG',
    ]);
});

// Feedback Routes
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Common Redirect
Route::get('/admin', function () {
    if (Auth::check()) {
        if (Auth::user()->role->name === 'pemimpin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.dashboard-pegawai.index');
        }
    }
    return redirect()->route('login');
})->name('admin.index');

// Admin Routes - Pemimpin Only
Route::middleware(['auth', 'role:pemimpin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/users', UserController::class);
});

// Admin Routes - Both Pemimpin and Pegawai
Route::middleware(['auth', 'role:pemimpin,pegawai'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard-pegawai', [PegawaiDashboardController::class, 'index'])->name('admin.dashboard-pegawai.index');

    // Kontak Management
    Route::resource('/admin/kontak', App\Http\Controllers\Admin\KontakController::class)->names([
        'index' => 'admin.kontak.index',
        'create' => 'admin.kontak.create',
        'store' => 'admin.kontak.store',
        'show' => 'admin.kontak.show',
        'edit' => 'admin.kontak.edit',
        'update' => 'admin.kontak.update',
        'destroy' => 'admin.kontak.destroy',
    ]);

    // Visi Misi
    Route::prefix('admin/visimisi')->name('admin.visimisi.')->group(function () {
        Route::get('/', [VisiMisiController::class, 'index'])->name('index');
        Route::get('/create', [VisiMisiController::class, 'create'])->name('create');
        Route::post('/', [VisiMisiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [VisiMisiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [VisiMisiController::class, 'update'])->name('update');
        Route::delete('/{id}', [VisiMisiController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [VisiMisiController::class, 'show'])->name('show');
        Route::delete('/{sectionId}/item/{itemId}', [VisiMisiController::class, 'destroyItem'])->name('item.destroy');
    });

    // Produk Management
    Route::resource('/admin/produk/kategori-produk', KategoriProdukController::class)->except(['show']);
    Route::resource('/admin/pegawai', PegawaiController::class);

    // URL Management
    Route::prefix('/admin/url/{type}')->group(function () {
        Route::get('/', [UrlController::class, 'index'])->name('url.index');
        Route::get('/create', [UrlController::class, 'create'])->name('url.create');
        Route::post('/', [UrlController::class, 'store'])->name('url.store');
        Route::get('/{id}/edit', [UrlController::class, 'edit'])->name('url.edit');
        Route::put('/{id}', [UrlController::class, 'update'])->name('url.update');
        Route::delete('/{id}', [UrlController::class, 'destroy'])->name('url.destroy');
    });

    // Produk Management
    Route::prefix('/admin/produk/{type}')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });
    Route::post('/admin/produk/upload-image', [ProdukController::class, 'uploadImage'])->name('produk.upload-image');

    // Berita & Artikel Management
    Route::resource('/admin/kategori-berita-artikel', KategoriBeritaArtikelController::class)->names([
        'index' => 'admin.kategori-berita-artikel.index',
        'create' => 'admin.kategori-berita-artikel.create',
        'store' => 'admin.kategori-berita-artikel.store',
        'show' => 'admin.kategori-berita-artikel.show',
        'edit' => 'admin.kategori-berita-artikel.edit',
        'update' => 'admin.kategori-berita-artikel.update',
        'destroy' => 'admin.kategori-berita-artikel.destroy',
    ]);

    Route::get('/admin/kategori-berita-artikel/{kategoriBeritaArtikel}/berita', [KategoriBeritaArtikelController::class, 'showBerita'])
        ->name('admin.kategori-berita-artikel.berita');
    Route::get('/admin/kategori-berita-artikel/{kategoriBeritaArtikel}/artikel', [KategoriBeritaArtikelController::class, 'showArtikel'])
        ->name('admin.kategori-berita-artikel.artikel');

    Route::prefix('admin/berita')->name('admin.media.berita.')->group(function () {
        Route::get('/{type?}', [BeritaArtikelController::class, 'index'])->name('index');
        Route::get('/{type}/create', [BeritaArtikelController::class, 'create'])->name('create');
        Route::post('admin/{type}', [BeritaArtikelController::class, 'store'])->name('store');
        Route::get('/{type}/{id}', [BeritaArtikelController::class, 'show'])->name('show');
        Route::get('/{type}/{id}/edit', [BeritaArtikelController::class, 'edit'])->name('edit');
        Route::put('/{type}/{id}', [BeritaArtikelController::class, 'update'])->name('update');
        Route::delete('/{type}/{id}', [BeritaArtikelController::class, 'destroy'])->name('destroy');
        Route::patch('/{type}/{id}/toggle-featured', [BeritaArtikelController::class, 'toggleFeatured'])->name('toggle-featured');
        Route::patch('/{type}/{id}/status', [BeritaArtikelController::class, 'updateStatus'])->name('update-status');
        Route::post('/upload-image', [BeritaArtikelController::class, 'uploadImage'])->name('upload-image');
    });

    Route::resource('/admin/media/buletin', MediaBuletinController::class)->names([
        'index' => 'admin.media.buletin.index',
        'create' => 'admin.media.buletin.create',
        'store' => 'admin.media.buletin.store',
        'show' => 'admin.media.buletin.show',
        'edit' => 'admin.media.buletin.edit',
        'update' => 'admin.media.buletin.update',
        'destroy' => 'admin.media.buletin.destroy',
    ]);

    // Kecamatan & Alat Management
    Route::resource('/admin/kecamatan', KecamatanController::class);
    Route::resource('/admin/metadata-alat', MetadataAlatController::class);
    Route::post('/admin/metadata-alat/import-csv', [MetadataAlatController::class, 'importCsv'])->name('metadata-alat.import-csv');
    Route::resource('/admin/tarif-pnbp', TarifPNBPController::class);

    // Feedback Management
    Route::prefix('/admin/feedback')->name('admin.feedback.')->group(function () {
        Route::delete('responses/bulk-delete', [FeedbackResponseController::class, 'bulkDelete'])->name('responses.bulkDelete');
        Route::delete('responses/truncate', [FeedbackResponseController::class, 'truncate'])->name('responses.truncate');
        Route::resource('questions', FeedbackQuestionController::class);
        Route::resource('responses', FeedbackResponseController::class);
        Route::patch('/questions/{question}/toggle', [FeedbackQuestionController::class, 'toggle'])->name('questions.toggle');
    });

    // Alat Curah Hujan
    Route::get('/admin/alat-curah-hujan/full', [AlatCurahHujanController::class, 'full'])->name('admin.alat-curah-hujan.full');
    Route::resource('/admin/alat-curah-hujan', AlatCurahHujanController::class)->names([
        'index' => 'admin.alat-curah-hujan.index',
        'create' => 'admin.alat-curah-hujan.create',
        'store' => 'admin.alat-curah-hujan.store',
        'show' => 'admin.alat-curah-hujan.show',
        'edit' => 'admin.alat-curah-hujan.edit',
        'update' => 'admin.alat-curah-hujan.update',
        'destroy' => 'admin.alat-curah-hujan.destroy',
    ]);

    // Tata Usaha Routes
    Route::resource('/admin/tata-usaha/klasifikasi-surat', KlasifikasiSuratController::class)->names([
        'index' => 'admin.tata-usaha.klasifikasi-surat.index',
        'create' => 'admin.tata-usaha.klasifikasi-surat.create',
        'store' => 'admin.tata-usaha.klasifikasi-surat.store',
        'show' => 'admin.tata-usaha.klasifikasi-surat.show',
        'edit' => 'admin.tata-usaha.klasifikasi-surat.edit',
        'update' => 'admin.tata-usaha.klasifikasi-surat.update',
        'destroy' => 'admin.tata-usaha.klasifikasi-surat.destroy',
    ]);
    Route::post('/admin/tata-usaha/klasifikasi-surat/ajax', [KlasifikasiSuratController::class, 'addKlasifikasiAjax'])
        ->name('admin.tata-usaha.klasifikasi-surat.ajax');

    // Surat Masuk
    Route::resource('/admin/tata-usaha/surat-masuk', SuratMasukController::class)->names([
        'index' => 'admin.tata-usaha.surat-masuk.index',
        'create' => 'admin.tata-usaha.surat-masuk.create',
        'store' => 'admin.tata-usaha.surat-masuk.store',
        'show' => 'admin.tata-usaha.surat-masuk.show',
        'edit' => 'admin.tata-usaha.surat-masuk.edit',
        'update' => 'admin.tata-usaha.surat-masuk.update',
        'destroy' => 'admin.tata-usaha.surat-masuk.destroy',
    ]);
    Route::get('/admin/tata-usaha/surat-masuk/export', [SuratMasukController::class, 'export'])
        ->name('admin.tata-usaha.surat-masuk.export');
    Route::get('/admin/tata-usaha/surat-masuk/{suratMasuk}/download', [SuratMasukController::class, 'downloadScan'])
        ->name('admin.tata-usaha.surat-masuk.download');

    // Surat Keluar
    Route::resource('/admin/tata-usaha/surat-keluar', SuratKeluarController::class)->names([
        'index' => 'admin.tata-usaha.surat-keluar.index',
        'create' => 'admin.tata-usaha.surat-keluar.create',
        'store' => 'admin.tata-usaha.surat-keluar.store',
        'show' => 'admin.tata-usaha.surat-keluar.show',
        'edit' => 'admin.tata-usaha.surat-keluar.edit',
        'update' => 'admin.tata-usaha.surat-keluar.update',
        'destroy' => 'admin.tata-usaha.surat-keluar.destroy',
    ]);
    Route::get('/admin/tata-usaha/surat-keluar/export', [SuratKeluarController::class, 'export'])
        ->name('admin.tata-usaha.surat-keluar.export');
    Route::get('/admin/tata-usaha/surat-keluar/{suratKeluar}/download', [SuratKeluarController::class, 'downloadScan'])
        ->name('admin.tata-usaha.surat-keluar.download');

    // Buku Tamu
    Route::resource('/admin/buku-tamu', BukuTamuController::class)->names([
        'index' => 'admin.tata-usaha.buku-tamu.index',
        'create' => 'admin.tata-usaha.buku-tamu.create',
        'store' => 'admin.tata-usaha.buku-tamu.store',
        'show' => 'admin.tata-usaha.buku-tamu.show',
        'edit' => 'admin.tata-usaha.buku-tamu.edit',
        'update' => 'admin.tata-usaha.buku-tamu.update',
        'destroy' => 'admin.tata-usaha.buku-tamu.destroy',
    ]);
});
