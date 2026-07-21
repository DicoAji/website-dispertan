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
        // Pastikan variabel $popup dikirim ke view
        $popup = \App\Models\PopupAd::first();

        // Pastikan $berita juga dikirim agar tidak error
        $berita = \App\Models\Berita::all();
        $profile = \App\Models\Profile::first();

        return view('index', compact('popup', 'berita', 'profile'));
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
