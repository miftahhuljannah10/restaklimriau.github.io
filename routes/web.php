<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\UrlController;


use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:pemimpin'])->group(function () {
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
});
