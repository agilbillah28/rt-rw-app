<?php

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PengaturanInformasiController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\KontakController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Halaman Beranda & Kontak (untuk semua user)





// ✅ Redirect setelah login
Route::get('/redirect-user', [RedirectController::class, 'redirect'])->name('redirect.user');

// ✅ Rute Autentikasi
Route::middleware('auth')->group(function () {

    /*
    |--------------------- Admin Routes ---------------------|
    */
    Route::middleware('is_admin')->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Data Warga
        Route::get('/warga', [WargaController::class, 'adminIndex'])->name('warga.index');
        Route::get('/warga/create', [WargaController::class, 'adminCreate'])->name('warga.create');
        Route::post('/warga/store', [WargaController::class, 'adminStore'])->name('warga.store');
        Route::get('/warga/{id}', [WargaController::class, 'adminShow'])->name('warga.show');
        Route::delete('/warga/{id}', [WargaController::class, 'adminDestroy'])->name('warga.destroy');
        Route::get('/warga/download/{file}', [WargaController::class, 'download'])->name('warga.download');
        Route::get('/admin/warga/{id}/edit', [WargaController::class, 'adminEdit'])->name('warga.edit');
        Route::put('/admin/warga/{id}', [WargaController::class, 'adminUpdate'])->name('warga.update');

        // Pengumuman
        // Pengaturan Informasi (Admin)
        
        Route::resource('pengaturaninformasi', PengaturanInformasiController::class);


        // Pengajuan
        Route::get('/admin/pengajuan', [FormulirController::class, 'admin'])->name('admin.pengajuan.index');
        Route::get('/admin/pengajuan/{nama_lengkap}/{created_at}/balas', [FormulirController::class, 'showBalas'])
        ->name('admin.pengajuan.balas');

        Route::post('/admin/pengajuan/{nama_lengkap}/{created_at}/balas', [FormulirController::class, 'balas'])
        ->name('admin.pengajuan.balas.store');

       Route::get('/admin/pengaduan', [PengaduanController::class, 'admin'])->name('admin.pengaduan.index');
       Route::get('/admin/pengaduan/{id}', [PengaduanController::class, 'show'])->name('admin.pengaduan.show');
       Route::post('/admin/pengaduan/{id}/balas', [PengaduanController::class, 'balas'])->name('admin.pengaduan.balas');
       Route::delete('/admin/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');
    });

    /*
    |--------------------- Warga Routes ---------------------|
    */
    Route::middleware('is_warga')->group(function () {
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('warga.pengaduan.index');
        Route::get('/pengaduan/create', fn () => view('warga.pengaduan.create'))->name('warga.pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('warga.pengaduan.store');

        Route::get('/pengajuan', [FormulirController::class, 'index'])->name('warga.pengajuan.index');
        Route::get('/pengajuan/create', [FormulirController::class, 'create'])->name('warga.pengajuan.create'); // ✅ Route untuk halaman form create
        Route::post('/pengajuan', [FormulirController::class, 'store'])->name('warga.pengajuan.store');

       Route::get('/pendaftaran', [WargaController::class, 'index'])->name('pendaftaran');
       Route::get('/pendaftaran/create', [WargaController::class, 'create'])->name('pendaftaran.create');
       Route::post('/pendaftaran', [WargaController::class, 'store'])->name('pendaftaran.store');


       Route::get('/', [PengaturanInformasiController::class, 'beranda'])->name('beranda');
       
        Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
