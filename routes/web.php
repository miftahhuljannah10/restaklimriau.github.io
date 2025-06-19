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

use Illuminate\Support\Facades\Auth;


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




    Route::resource('/admin/kecamatan', KecamatanController::class);
    Route::resource('/admin/metadata-alat', MetadataAlatController::class);
    Route::post('/admin/metadata-alat/import-csv', [MetadataAlatController::class, 'importCsv'])->name('metadata-alat.import-csv');

    Route::resource('/admin/tarif-pnbp', TarifPNBPController::class);

    Route::prefix('/admin/feedback')->name('admin.feedback.')->group(function () {
        Route::resource('questions', FeedbackQuestionController::class);
        Route::resource('responses', FeedbackResponseController::class)->only(['index', 'show', 'destroy']);
    });

    // berita artikel
    Route::resource('/admin/berita-artikel', BeritaArtikelController::class)
        ->except(['show']);

    Route::patch('/admin/feedback/questions/{question}/toggle', [FeedbackQuestionController::class, 'toggle'])
        ->name('admin.feedback.questions.toggle');
});

// // Public Feedback Routes
// Public Feedback Routes
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
