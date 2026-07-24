<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\PopupAd;

class PublicController extends Controller
{

    public function index()
    {
        // 1. Ambil Popup
        $popup = PopupAd::find(1);

        // 2. Ambil Header
        $header = PopupAd::find(2);

        // 3. Ambil Berita (disamakan dengan logika di route lama agar tidak rusak)
        $berita = Berita::latest()->take(6)->get();

        // 4. Ambil Profile
        $profile = Profile::first();

        // 5. Ambil Data Aplikasi Lain untuk ditampilkan di atas Kontak
        $aplikasiLain = \App\Models\AplikasiLain::orderBy('id', 'desc')->get();

        // 6. Kirim semuanya ke view 'public.index'
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
