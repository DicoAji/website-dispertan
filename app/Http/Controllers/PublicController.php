<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Berita;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        // Mengambil data profil untuk header/footer
        $profile = \App\Models\Profile::first();

        // MENGAMBIL DATA BERITA (Terbaru berdasarkan tanggal)
        $berita = \App\Models\Berita::latest('tanggal_berita')->get();

        // Pastikan variabel 'berita' dikirim ke view
        return view('landing.index', compact('profile', 'berita'));
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
