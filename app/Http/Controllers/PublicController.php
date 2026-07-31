<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\PopupAd;
use App\Models\AplikasiLain;

class PublicController extends Controller
{

    public function index()
    {
        // 1. Ambil Popup
        $popup = PopupAd::find(1);

        // 2. Ambil Header
        $header = PopupAd::find(2);

        // 3. PERBAIKAN: Ambil 4 Berita, urutkan berdasarkan 'tanggal_berita' paling baru
        $berita = Berita::orderBy('tanggal_berita', 'desc')->take(4)->get();

        // 4. Ambil Profile
        $profile = Profile::first();

        // 5. Ambil Data Aplikasi Lain
        $aplikasiLain = AplikasiLain::orderBy('id', 'desc')->get();

        // 6. Kirim semuanya ke view
        return view('public.index', compact('popup', 'header', 'berita', 'profile', 'aplikasiLain'));
    }
    public function visimisi()
    {
        $profile = Profile::first();
        return view('public.visimisi', compact('profile'));
    }
    public function pegawai()
    {
        $profile = \App\Models\Profile::first();

        // Ubah 'id' menjadi 'nip' karena kolom 'id' tidak ada di tabel pegawai Anda
        $pegawai = \App\Models\Pegawai::orderBy('nip', 'asc')->get();

        return view('public.pegawai', compact('pegawai', 'profile'));
    }
    public function struktur()
    {
        $profile = \App\Models\Profile::first();
        return view('public.struktur', compact('profile'));
    }
}
