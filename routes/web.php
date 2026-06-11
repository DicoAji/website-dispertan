<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\FileDinasController;
use App\Http\Controllers\SkmController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\KalenderKegiatanController;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\TambahanMenuController;
use App\Http\Controllers\AuthController;
use App\Models\Bidang;
use App\Models\GaleriFoto;


// PUBLICC
Route::get('/', function () {
    $berita = \App\Models\Berita::latest()->take(6)->get();
    $profile = \App\Models\Profile::first();
    return view('public.index', compact('berita', 'profile'));
});
Route::get('/visimisi', function () {
    $profile = \App\Models\Profile::first();
    return view('public.visimisi', compact('profile'));
});

Route::get('/pegawai', function () {
    $pegawai = \App\Models\Pegawai::orderBy('nip', 'asc')->get();
    $profile = \App\Models\Profile::first();
    return view('public.pegawai', compact('pegawai', 'profile'));
});

Route::get('/struktur-organisasi', [PublicController::class, 'struktur']);

Route::get('/maklumat-pelayanan', function () {
    $profile = \App\Models\Profile::first();
    return view('public.maklumat', compact('profile'));
})->name('public.maklumat');

Route::get('/tugas-fungsi', function () {
    $profile = \App\Models\Profile::first();
    return view('public.tugas_fungsi', compact('profile'));
})->name('public.tugas_fungsi');

Route::get('/sejarah-dasar-hukum', function () {
    $profile = \App\Models\Profile::first();
    return view('public.sejarah_dasar_hukum', compact('profile'));
})->name('public.sejarah_dasar_hukum');

Route::get('/rencana-kerja', function () {
    $profile = \App\Models\Profile::first();
    return view('public.rencana_kerja', compact('profile'));
})->name('public.rencana_kerja');

Route::get('/lkjip', function () {
    $profile = \App\Models\Profile::first();
    return view('public.lkjip', compact('profile'));
})->name('public.lkjip');

Route::get('/sop-pelayanan', function () {
    $profile = \App\Models\Profile::first();
    return view('public.sop_pelayanan', compact('profile'));
})->name('public.sop_pelayanan');

Route::get('/program-kegiatan', function () {
    $profile = \App\Models\Profile::first();
    return view('public.program_kegiatan', compact('profile'));
})->name('public.program_kegiatan');
Route::get('/target-capaian', function () {
    $profile = \App\Models\Profile::first();
    return view('public.target_capaian', compact('profile'));
})->name('public.target_capaian');
Route::get('/inovasi-daerah', function () {
    $profile = \App\Models\Profile::first();
    return view('public.inovasi_daerah', compact('profile'));
})->name('public.inovasi_daerah');
Route::get('/standar-pelayanan', function () {
    $profile = \App\Models\Profile::first();
    return view('public.standar_pelayanan', compact('profile'));
})->name('public.standar_pelayanan');
Route::get('/informasi-opt-iklim', function () {
    $profile = \App\Models\Profile::first();
    return view('public.informasi_opt_iklim', compact('profile'));
})->name('public.informasi_opt_iklim');
// Route::get('/penyuluhan-artikel-teknis', function () {
//     $profile = \App\Models\Profile::first();
//     return view('public.penyuluhan_artikel_teknis', compact('profile'));
// })->name('public.penyuluhan_artikel_teknis');
// Route::get('/ppid', function () {
//     $profile = \App\Models\Profile::first();
//     return view('public.ppid', compact('profile'));
// })->name('public.ppid');
Route::get('/renstra_dinas', function () {
    $profile = \App\Models\Profile::first();
    return view('public.renstra_dinas', compact('profile'));
})->name('public.renstra_dinas');
Route::get('/rtp-spip', function () {
    $profile = \App\Models\Profile::first();
    return view('public.rtp_spip', compact('profile'));
})->name('public.rtp_spip');
Route::get('/rencana-aksi-opd', function () {
    $profile = \App\Models\Profile::first();
    return view('public.rencana_aksi_opd', compact('profile'));
})->name('public.rencana_aksi_opd');
Route::get('/sop-bidang', function () {
    $profile = \App\Models\Profile::first();
    return view('public.sop_bidang', compact('profile'));
})->name('public.sop_bidang');
Route::get('/peraturan-regulasi', function () {
    $profile = \App\Models\Profile::first();
    return view('public.peraturan_regulasi', compact('profile'));
})->name('public.peraturan_regulasi');
Route::get('/berita', function () {
    $profile = \App\Models\Profile::first();
    return view('public.berita', compact('profile'));
})->name('berita.index');
Route::get('/galeri-foto', function () {
    $profile = \App\Models\Profile::first();

    // Mengambil semua data foto dari database, diurutkan dari yang terbaru
    $koleksiFoto = \App\Models\GaleriFoto::latest()->get();

    return view('public.galeri_foto', compact('profile', 'koleksiFoto'));
})->name('public.galeri_foto');

// BIDANG PUBLIC
Route::get('/tanaman-pangan', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'Tanaman Pangan')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.tanaman_pangan', compact('bidang', 'profile'));
})->name('public.tanaman_pangan');

Route::get('/hortikultura', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'Hortikultura')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.hortikultura', compact('bidang', 'profile'));
})->name('public.hortikultura');

Route::get('/perkebunan', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'Perkebunan')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.perkebunan', compact('bidang', 'profile'));
})->name('public.perkebunan');

Route::get('/psp', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'psp')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.psp', compact('bidang', 'profile'));
})->name('public.psp');

Route::get('/sekretariat', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'Sekretariat')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.sekretariat', compact('bidang', 'profile'));
})->name('public.sekretariat');

Route::get('/uptd_laboratorium', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'UPTD Laboratorium')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.uptd_laboratorium', compact('bidang', 'profile'));
})->name('public.uptd_laboratorium');

Route::get('/uptd_balai_benih', function () {
    $profile = \App\Models\Profile::first(); // <-- Panggil data profile
    $bidang = \App\Models\Bidang::where('kategori', 'UPTD Balai Benih')->latest()->get();
    // <-- Kirim kedua variabelnya
    return view('public.bidang.uptd_balai_benih', compact('bidang', 'profile'));
})->name('public.uptd_balai_benih');

Route::get('/kalender-kegiatan', function () {
    $profile = \App\Models\Profile::first();
    $kegiatan = \App\Models\KalenderKegiatan::orderBy('tanggal', 'asc')->get();

    return view('public.kalender_kegiatan', compact('profile', 'kegiatan'));
})->name('public.kalender_kegiatan');


Route::get('/layanan-informasi/{id}', function ($id) {
    $profile = \App\Models\Profile::first();
    $item = \App\Models\Menu::findOrFail($id);
    return view('public.menu_detail', compact('profile', 'item'));
})->name('public.menu.show');





// ADMINNNNNN
// Route::get('/admin', function () {
//     return redirect('/admin');
// });
// RUTE LOGIN, LOGOUT & REGISTER
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Tambahkan dua baris ini:
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister']);

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

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


    // FILE DINAS

    Route::get('/file-dinas', [FileDinasController::class, 'index'])->name('file_dinas.index');
    Route::post('/file-dinas', [FileDinasController::class, 'store'])->name('file_dinas.store');
    Route::put('/file-dinas/{id}', [FileDinasController::class, 'update'])->name('file_dinas.update');

    // SKM
    Route::get('/skm', [SkmController::class, 'index'])->name('skm.index');
    Route::post('/skm', [SkmController::class, 'store'])->name('skm.store');
    Route::put('/skm/{id}', [SkmController::class, 'update'])->name('skm.update');
    Route::delete('/skm/{id}', [SkmController::class, 'destroy'])->name('skm.destroy');

    // BIDANG
    Route::get('/bidang', [BidangController::class, 'index'])->name('admin.bidang.index');
    Route::post('/bidang', [BidangController::class, 'store'])->name('admin.bidang.store'); // Proses simpan data bidang baru
    Route::put('/bidang/{id}', [BidangController::class, 'update'])->name('admin.bidang.update');
    Route::delete('/bidang/{id}', [BidangController::class, 'destroy'])->name('admin.bidang.destroy');

    // KALENDER KEGIATAN
    Route::get('/kalender', [KalenderKegiatanController::class, 'index'])->name('admin.kalender.index');
    Route::post('/kalender', [KalenderKegiatanController::class, 'store'])->name('admin.kalender.store');
    Route::put('/kalender/{id}', [KalenderKegiatanController::class, 'update'])->name('admin.kalender.update');
    Route::delete('/kalender/{id}', [KalenderKegiatanController::class, 'destroy'])->name('admin.kalender.destroy');

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

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
