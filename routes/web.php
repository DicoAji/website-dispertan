<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\FileDinasController;
use App\Http\Controllers\SkmController;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\TambahanMenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\AplikasiLainController;
use App\Models\GaleriFoto;
use App\Models\Profile;
use App\Models\FileDinas;
use App\Models\Berita;
use App\Models\Laporan;
use App\Models\PopupAd;


//------------------- PUBLICC
Route::get('/', [PublicController::class, 'index'])->name('home');

// ----------PROFILE
Route::get('/sejarah-dasar-hukum', function () {
    $profile = \App\Models\Profile::first();
    return view('public.sejarah_dasar_hukum', compact('profile'));
})->name('public.sejarah_dasar_hukum');

Route::get('/visimisi', function () {
    $profile = \App\Models\Profile::first();
    return view('public.visimisi', compact('profile'));
});

Route::get('/struktur-organisasi', [PublicController::class, 'struktur']);

Route::get('/tugas-fungsi', function () {
    $profile = \App\Models\Profile::first();
    return view('public.tugas_fungsi', compact('profile'));
})->name('public.tugas_fungsi');

Route::get('/maklumat-pelayanan', function () {
    $profile = \App\Models\Profile::first();
    return view('public.maklumat', compact('profile'));
})->name('public.maklumat');

Route::get('/pegawai', function () {
    $pegawai = \App\Models\Pegawai::orderBy('tingkat', 'asc')->get();
    $profile = \App\Models\Profile::first();
    return view('public.pegawai', compact('pegawai', 'profile'));
});
// END PROFILE
// LAYANAN
Route::get('/sop-pelayanan', function () {
    $profile = \App\Models\Profile::first();
    return view('public.sop_pelayanan', compact('profile'));
})->name('public.sop_pelayanan');
// END LAYANAN

// PPID
Route::get('/ppid', [PpidController::class, 'publicIndex'])->name('public.ppid');
// ROUTE DETAIL KATEGORI PPID (Tambahkan baris ini)
Route::get('/ppid/kategori/{kategori}', [PpidController::class, 'showKategori'])->name('public.ppid.kategori');
// END PPID

// ROUTE PERMOHONAN INFORMASI PUBLIK
Route::get('/ppid/permohonan', [PermohonanController::class, 'create'])->name('public.permohonan.create');
Route::post('/ppid/permohonan', [PermohonanController::class, 'store'])->name('public.permohonan.store');
// END ROUTE PERMOHONAN INFORMASI PUBLIK

// BERITA
Route::get('/berita', function () {
    $profile = \App\Models\Profile::first();
    return view('public.berita', compact('profile'));
})->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/koleksi/artikel', [GaleriFotoController::class, 'showArtikel'])->name('koleksi.artikel');
Route::get('/koleksi/foto', [GaleriFotoController::class, 'showFoto'])->name('koleksi.foto');
Route::get('/koleksi/video', [GaleriFotoController::class, 'showVideo'])->name('koleksi.video');
// END BERITA

// LAPORAN
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
// END LAPORAN

// DOKUMEN
Route::get('/dokumen', function () {
    $dokumen = FileDinas::latest()->get();
    $profile = Profile::first();
    $kategoriList = FileDinas::select('kategori')->distinct()->pluck('kategori');
    return view('public.dokumen', compact('dokumen', 'profile', 'kategoriList'));
});
// END DOKUMEN

// ADMINNNNNN
// RUTE LOGIN, LOGOUT & REGISTER
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister']);
// END RUTE LOGIN, LOGOUT & REGISTER

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Route Pop-up Ads
    Route::post('/popup-ads', [DashboardController::class, 'updatePopup'])->name('admin.popup.update');
    Route::post('/header-update', [DashboardController::class, 'updateHeader'])->name('admin.header.update');

    // Route untuk melihat data pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store'); // Route simpan data
    Route::delete('/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::put('/pegawai/{nip}', [PegawaiController::class, 'update'])->name('pegawai.update');

    Route::prefix('admin')->group(function () {
        // Tambahkan "admin." pada bagian name()
        Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    });

    // Route Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Profile Dinas
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan.index');
    Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update'); // <-- Tambahkan baris ini
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

    // FILE DINAS
    Route::get('/file-dinas', [FileDinasController::class, 'index'])->name('file_dinas.index');
    Route::post('/file-dinas', [FileDinasController::class, 'store'])->name('file_dinas.store');
    Route::put('/file-dinas/{id}', [FileDinasController::class, 'update'])->name('file_dinas.update');
    Route::delete('/file-dinas/{id}', [FileDinasController::class, 'destroy'])->name('file_dinas.destroy'); // <-- Tambahkan baris ini
    // PPID
    Route::get('/ppid', [PpidController::class, 'index'])->name('admin.ppid.index');
    Route::post('/ppid', [PpidController::class, 'store'])->name('admin.ppid.store');
    Route::put('/ppid/{id}', [PpidController::class, 'update'])->name('admin.ppid.update');
    Route::delete('/ppid/{id}', [PpidController::class, 'destroy'])->name('admin.ppid.destroy');

    // PERMOHONAN
    // ROUTE MANAJEMEN PERMOHONAN (ADMIN)
    Route::get('/permohonan', [\App\Http\Controllers\PermohonanController::class, 'index'])->name('admin.permohonan.index');
    Route::put('/permohonan/status/{id}', [\App\Http\Controllers\PermohonanController::class, 'updateStatus'])->name('admin.permohonan.status');
    Route::delete('/permohonan/{id}', [\App\Http\Controllers\PermohonanController::class, 'destroy'])->name('admin.permohonan.destroy');

    // SKM
    Route::get('/skm', [SkmController::class, 'index'])->name('skm.index');
    Route::post('/skm', [SkmController::class, 'store'])->name('skm.store');
    Route::put('/skm/{id}', [SkmController::class, 'update'])->name('skm.update');
    Route::delete('/skm/{id}', [SkmController::class, 'destroy'])->name('skm.destroy');

    // GaleriFoto
    Route::get('/galeri', [GaleriFotoController::class, 'index'])->name('admin.galeri.index');
    Route::post('/galeri', [GaleriFotoController::class, 'store'])->name('admin.galeri.store');
    Route::put('/galeri/{id}', [GaleriFotoController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [GaleriFotoController::class, 'destroy'])->name('admin.galeri.destroy');

    // Tambahan Menu
    Route::get('/tambahan-menu', [TambahanMenuController::class, 'index'])->name('admin.tambahan_menu.index');
    Route::post('/tambahan-menu', [TambahanMenuController::class, 'store'])->name('admin.tambahan_menu.store');
    Route::delete('/tambahan-menu/{id}', [TambahanMenuController::class, 'destroy'])->name('admin.tambahan_menu.destroy');
    // });

    // APLIKASI LAIN
    Route::get('/aplikasi-lain', [AplikasiLainController::class, 'index'])->name('admin.aplikasi_lain.index');
    Route::post('/aplikasi-lain', [AplikasiLainController::class, 'store'])->name('admin.aplikasi_lain.store');
    Route::put('/aplikasi-lain/{id}', [AplikasiLainController::class, 'update'])->name('admin.aplikasi_lain.update');
    Route::delete('/aplikasi-lain/{id}', [AplikasiLainController::class, 'destroy'])->name('admin.aplikasi_lain.destroy');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('admin.laporan.destroy');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
