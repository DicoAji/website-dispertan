<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\FileDinasController;
use App\Http\Controllers\SkmController;



// Route::get('/', function () {
//     return view('welcome');
// });

// PUBLICC
// Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/', function () {
    $berita = \App\Models\Berita::latest()->take(6)->get();
    // Anda harus mengambil data profil dari database
    $profile = \App\Models\Profile::first();

    return view('public.index', compact('berita', 'profile'));
});
Route::get('/visimisi', function () {
    $profile = \App\Models\Profile::first(); // Mengambil data profil pertama
    return view('public.visimisi', compact('profile'));
});

Route::get('/pegawai', function () {
    // Ambil data dari tabel pegawai
    $pegawai = \App\Models\Pegawai::orderBy('nip', 'asc')->get();

    // Kirim data profile agar footer aman dari error undefined variable
    $profile = \App\Models\Profile::first();

    return view('public.pegawai', compact('pegawai', 'profile'));
});

Route::get('/struktur-organisasi', [PublicController::class, 'struktur']);



// ADMINNNNNN
// Redirect halaman utama ke admin
Route::get('/admin', function () {
    return redirect('/admin');
});

// Route Admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route untuk melihat data pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store'); // Route simpan data
    Route::delete('/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::put('/pegawai/{nip}', [PegawaiController::class, 'update'])->name('pegawai.update');

    // Route Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Profile Dinas
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // FILE DINAS

    Route::get('/file-dinas', [FileDinasController::class, 'index'])->name('file_dinas.index');
    Route::post('/file-dinas', [FileDinasController::class, 'store'])->name('file_dinas.store');
    Route::put('/file-dinas/{id}', [FileDinasController::class, 'update'])->name('file_dinas.update');

    // SKM
    // Rute untuk SKM
    Route::get('/skm', [SkmController::class, 'index'])->name('skm.index');
    Route::post('/skm', [SkmController::class, 'store'])->name('skm.store');
    Route::put('/skm/{id}', [SkmController::class, 'update'])->name('skm.update');
    Route::delete('/skm/{id}', [SkmController::class, 'destroy'])->name('skm.destroy');
});
