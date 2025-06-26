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

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('masyarakat.index');
});
Route::get('/artikel', function () {    
    return view('masyarakat.artikel');
});
Route::get('/artikel-detail', function () {
    return view('masyarakat.artikel-detail');
});
Route::get('/berita', function () {
    return view('masyarakat.berita');
});
Route::get('/berita-detail', function () {
    return view('masyarakat.berita-detail');
});
Route::get('/buletin', function () {
    return view('masyarakat.buletin');
});
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

// layanan publik
Route::get('/layanan', function () {
    return view('masyarakat.layanan');
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
        // List all berita or artikel
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

    Route::resource('/admin/kecamatan', KecamatanController::class);
    Route::resource('/admin/metadata-alat', MetadataAlatController::class);
    Route::post('/admin/metadata-alat/import-csv', [MetadataAlatController::class, 'importCsv'])->name('metadata-alat.import-csv');

    Route::resource('/admin/tarif-pnbp', TarifPNBPController::class);

    Route::prefix('/admin/feedback')->name('admin.feedback.')->group(function () {
        Route::resource('questions', FeedbackQuestionController::class);
        Route::resource('responses', FeedbackResponseController::class)->only(['index', 'show', 'destroy']);
    });

    Route::patch('/admin/feedback/questions/{question}/toggle', [FeedbackQuestionController::class, 'toggle'])
        ->name('admin.feedback.questions.toggle');
});

// // Public Feedback Routes
// Public Feedback Routes
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
