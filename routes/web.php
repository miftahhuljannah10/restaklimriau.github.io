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

Route::get('/', function () {
    return view('masyarakat.index');
});

use App\Http\Controllers\AlatController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/artikel', function () {
    return view('masyarakat.artikel');
});
Route::get('/artikel-detail', function () {
    return view('masyarakat.artikel-detail');
});
// Route::get('/berita', function () {
//     return view('masyarakat.berita');
// });
// Route::get('/berita-detail', function () {
//     return view('masyarakat.berita-detail');
// });
// Route::get('/buletin', function () {
//     return view('masyarakat.buletin');
// });
Route::get('/form-layanan', function () {
    return view('masyarakat.form-layanan');
});
Route::get('/iklim-terapan', function () {
    return view('masyarakat.iklim-terapan');
});
Route::get('/kontak', function () {
    return view('masyarakat.kontak');
});
Route::get('/layanan', function () {
    return view('masyarakat.layanan');
});
Route::get('/media', function () {
    return view('masyarakat.media');
});
Route::get('/produk', function () {
    return view('masyarakat.produk');
});
Route::get('/profil', function (\Illuminate\Http\Request $request) {
    $section = $request->query('section', 'tentang');
    return view('masyarakat.profil', [
        'activeSection' => $section
    ]);
})->name('profil');
Route::get('/profil-detail', function () {
    return view('masyarakat.profil-detail');
});
Route::get('/tarif-pnbp', function () {
    return view('masyarakat.tarif-pnbp');
});
Route::get('/cek-ketersediaan-data', function () {
    return view('masyarakat.cek-ketersediaan-data');
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

// layanan publik
Route::get('/layanan', function () {
    return view('masyarakat.layanan');
})->name('layanan.utama');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Common redirect for admin area
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

// Routes only accessible by role:pemimpin
Route::middleware(['auth', 'role:pemimpin'])->group(function () {
    // Dashboard Routes - only for pemimpin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management - only for pemimpin
    Route::resource('/admin/users', UserController::class);
});

// Routes accessible by both pemimpin and pegawai roles
Route::middleware(['auth', 'role:pemimpin,pegawai'])->group(function () {
    Route::get('/admin/dashboard-pegawai', [PegawaiDashboardController::class, 'index'])->name('admin.dashboard-pegawai.index');

    // Kontak Perusahaan Management
    Route::resource('/admin/kontak', App\Http\Controllers\Admin\KontakController::class)
        ->names([
            'index' => 'admin.kontak.index',
            'create' => 'admin.kontak.create',
            'store' => 'admin.kontak.store',
            'show' => 'admin.kontak.show',
            'edit' => 'admin.kontak.edit',
            'update' => 'admin.kontak.update',
            'destroy' => 'admin.kontak.destroy',
        ]);
    // visi misi admin
    Route::prefix('admin/visimisi')->name('admin.visimisi.')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\VisiMisiController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\VisiMisiController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\Admin\VisiMisiController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\VisiMisiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\Admin\VisiMisiController::class, 'update'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\Admin\VisiMisiController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [App\Http\Controllers\Admin\VisiMisiController::class, 'show'])->name('show');
        Route::delete('/{sectionId}/item/{itemId}', [App\Http\Controllers\Admin\VisiMisiController::class, 'destroyItem'])->name('item.destroy');
    });

    // Produk Management Routes
    // Kategori Produk Management Routes with resource controller
    Route::resource('/admin/produk/kategori-produk', KategoriProdukController::class)
        ->except(['show']);
    Route::resource('/admin/users', UserController::class);
    Route::resource('/admin/pegawai', PegawaiController::class);
    Route::prefix('/admin/url/{type}')->group(function () {
        Route::get('/', [UrlController::class, 'index'])->name('url.index');
        Route::get('/create', [UrlController::class, 'create'])->name('url.create');
        Route::post('/', [UrlController::class, 'store'])->name('url.store');
        Route::get('/{id}/edit', [UrlController::class, 'edit'])->name('url.edit');
        Route::put('/{id}', [UrlController::class, 'update'])->name('url.update');
        Route::delete('/{id}', [UrlController::class, 'destroy'])->name('url.destroy');
    });

    // Produk Management Routes
    Route::prefix('/admin/produk/{type}')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    });
    Route::post('/admin/produk/upload-image', [ProdukController::class, 'uploadImage'])->name('produk.upload-image');

    // Berita dan Artikel Management Routes
    // Kategori Berita & Artikel Routes
    Route::resource('/admin/kategori-berita-artikel', KategoriBeritaArtikelController::class)
        ->names([
            'index' => 'admin.kategori-berita-artikel.index',
            'create' => 'admin.kategori-berita-artikel.create',
            'store' => 'admin.kategori-berita-artikel.store',
            'show' => 'admin.kategori-berita-artikel.show',
            'edit' => 'admin.kategori-berita-artikel.edit',
            'update' => 'admin.kategori-berita-artikel.update',
            'destroy' => 'admin.kategori-berita-artikel.destroy',
        ]);
    Route::prefix('admin/berita')->name('admin.media.berita.')->group(function () {

        Route::get('/{type?}', [BeritaArtikelController::class, 'index'])->name('index');

        // Create form
        Route::get('/{type}/create', [BeritaArtikelController::class, 'create'])->name('create');

        // Store
        Route::post('admin/{type}', [BeritaArtikelController::class, 'store'])->name('store');

        // Show
        Route::get('/{type}/{id}', [BeritaArtikelController::class, 'show'])->name('show');

        // Edit form
        Route::get('/{type}/{id}/edit', [BeritaArtikelController::class, 'edit'])->name('edit');

        // Update
        Route::put('/{type}/{id}', [BeritaArtikelController::class, 'update'])->name('update');

        // Delete
        Route::delete('/{type}/{id}', [BeritaArtikelController::class, 'destroy'])->name('destroy');

        // Toggle featured status
        Route::patch('/{type}/{id}/toggle-featured', [BeritaArtikelController::class, 'toggleFeatured'])->name('toggle-featured');

        // Update publication status
        Route::patch('/{type}/{id}/status', [BeritaArtikelController::class, 'updateStatus'])->name('update-status');

        // Upload image for CKEditor
        Route::post('/upload-image', [BeritaArtikelController::class, 'uploadImage'])->name('upload-image');
    });

    Route::resource('/admin/media/buletin', MediaBuletinController::class)
        ->names([
            'index' => 'admin.media.buletin.index',
            'create' => 'admin.media.buletin.create',
            'store' => 'admin.media.buletin.store',
            'show' => 'admin.media.buletin.show',
            'edit' => 'admin.media.buletin.edit',
            'update' => 'admin.media.buletin.update',
            'destroy' => 'admin.media.buletin.destroy',
        ]);

    Route::resource('/admin/kecamatan', KecamatanController::class);
    Route::resource('/admin/metadata-alat', MetadataAlatController::class);
    Route::post('/admin/metadata-alat/import-csv', [MetadataAlatController::class, 'importCsv'])->name('metadata-alat.import-csv');

    Route::resource('/admin/tarif-pnbp', TarifPNBPController::class);

    Route::prefix('/admin/feedback')->name('admin.feedback.')->group(function () {
        // Additional feedback response routes (MUST be before resource routes)
        Route::delete('responses/bulk-delete', [FeedbackResponseController::class, 'bulkDelete'])
            ->name('responses.bulkDelete');
        Route::delete('responses/truncate', [FeedbackResponseController::class, 'truncate'])
            ->name('responses.truncate');

        Route::resource('questions', FeedbackQuestionController::class);
        Route::resource('responses', FeedbackResponseController::class);
    });



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

    Route::resource('/admin/tata-usaha/klasifikasi-surat', KlasifikasiSuratController::class)
        ->names([
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

    // Surat Masuk Routes
    Route::resource('/admin/tata-usaha/surat-masuk', SuratMasukController::class)
        ->names([
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

    // Surat Keluar Routes
    Route::resource('/admin/tata-usaha/surat-keluar', SuratKeluarController::class)
        ->names([
            'index' => 'admin.tata-usaha.surat-keluar.index',
            'create' => 'admin.tata-usaha.surat-keluar.create',
            'store' => 'admin.tata-usaha.surat-keluar.store',
            'show' => 'admin.tata-usaha.surat-keluar.show',
            'edit' => 'admin.tata-usaha.surat-keluar.edit',
            'update' => 'admin.tata-usaha.surat-keluar.update',
            'destroy' => 'admin.tata-usaha.surat-keluar.destroy',
        ]);
    // buku tamu routes
    Route::resource('/admin/buku-tamu', BukuTamuController::class)
        ->names([
            'index' => 'admin.tata-usaha.buku-tamu.index',
            'create' => 'admin.tata-usaha.buku-tamu.create',
            'store' => 'admin.tata-usaha.buku-tamu.store',
            'show' => 'admin.tata-usaha.buku-tamu.show',
            'edit' => 'admin.tata-usaha.buku-tamu.edit',
            'update' => 'admin.tata-usaha.buku-tamu.update',
            'destroy' => 'admin.tata-usaha.buku-tamu.destroy',
        ]);

    Route::get('/admin/tata-usaha/surat-keluar/export', [SuratKeluarController::class, 'export'])
        ->name('admin.tata-usaha.surat-keluar.export');
    Route::get('/admin/tata-usaha/surat-keluar/{suratKeluar}/download', [SuratKeluarController::class, 'downloadScan'])
        ->name('admin.tata-usaha.surat-keluar.download');


    Route::patch('/admin/feedback/questions/{question}/toggle', [FeedbackQuestionController::class, 'toggle'])
        ->name('admin.feedback.questions.toggle');
});

// // Public Feedback Routes
// Public Feedback Routes
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/berita', [App\Http\Controllers\Masyarakat\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/kategori/{kategori}', [App\Http\Controllers\Masyarakat\BeritaController::class, 'category'])->name('berita.category');
Route::get('/berita/{slug}', [App\Http\Controllers\Masyarakat\BeritaController::class, 'show'])->name('berita.show');
Route::get('/buletin', [App\Http\Controllers\Masyarakat\BuletinController::class, 'index'])->name('buletin.index');
// kontak
Route::get('/kontak', [App\Http\Controllers\Masyarakat\KontakController::class, 'index'])->name('kontak.index');




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
Route::get('/masyarakat/detail-alat/{nomor_pos}', function ($nomor_pos) {
    // Ambil data alat dari database atau sumber lain secara dinamis
    // Contoh:
    // $alat = Alat::where('id_pos', $nomor_pos)->firstOrFail();
    // return view('masyarakat.detail-alat', compact('alat'));

    // Sementara, tampilkan halaman kosong atau pesan jika belum ada implementasi
    return view('masyarakat.detail-alat');
});
