<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
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


Route::get('/', function () {
    return view('masyarakat.home');
});

// layanan publik
Route::get('/layanan', function () {
    return view('masyarakat.layanan.layanan-utama');
})->name('layanan.utama');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:pemimpin'])->group(function () {
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

    // Add these routes to your web.php file in the admin middleware group
    Route::prefix('admin/berita')->name('admin.media.berita.')->middleware(['auth', 'role:pemimpin'])->group(function () {

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
        Route::resource('questions', FeedbackQuestionController::class);
        Route::resource('responses', FeedbackResponseController::class)->only(['index', 'show', 'destroy']);
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
