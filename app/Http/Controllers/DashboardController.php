<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Berita;
use App\Models\FileDinas;
use App\Models\GaleriFoto;
use App\Models\Laporan;
use App\Models\PopupAd;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard beserta rekapan data
     */
    public function index()
    {
        $totalBerita = Berita::count();
        $totalDokumen = FileDinas::count();
        $totalGaleri = GaleriFoto::count();
        $totalLaporan = Laporan::count();

        // Ambil data popup pertama
        // $popup = PopupAd::first();
        $popup = \App\Models\PopupAd::find(1);
        $header = \App\Models\PopupAd::find(2);

        return view('admin.dashboard', compact('totalBerita', 'totalDokumen', 'totalGaleri', 'totalLaporan', 'popup', 'header'));
    }

    /**
     * Memproses form upload/simpan Pop-up Ads
     */
    public function updatePopup(Request $request)
    {
        $request->validate([
            'kegiatan'  => 'nullable|string|max:255',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cari ID 1, jika tidak ada buat baru dan set ID-nya 1
        $popup = \App\Models\PopupAd::find(1);
        if (!$popup) {
            $popup = new \App\Models\PopupAd();
            $popup->id = 1;
        }

        if ($request->hasFile('gambar')) {
            if ($popup->gambar && File::exists(public_path('storage/popup/' . $popup->gambar))) {
                File::delete(public_path('storage/popup/' . $popup->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_popup_' . $file->hashName();
            $file->move(public_path('storage/popup'), $namaFile);

            $popup->gambar = $namaFile;
        }

        $popup->kegiatan = $request->kegiatan;
        $popup->save();

        return redirect()->back()->with('success', 'Pop-up berhasil disimpan!');
    }
    public function updateHeader(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Cari ID 2, jika tidak ada buat baru dan set ID-nya 2
        $header = \App\Models\PopupAd::find(2);
        if (!$header) {
            $header = new \App\Models\PopupAd();
            $header->id = 2;
            $header->kegiatan = 'Background Header'; // Sebagai penanda saja di database
        }

        if ($request->hasFile('gambar')) {
            if ($header->gambar && File::exists(public_path('storage/background/' . $header->gambar))) {
                File::delete(public_path('storage/background/' . $header->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_header_' . $file->hashName();
            $file->move(public_path('storage/background'), $namaFile);

            // Masuk ke kolom yang sama yaitu 'gambar'
            $header->gambar = $namaFile;
        }

        $header->save();

        return redirect()->back()->with('success', 'Gambar Background Header berhasil diperbarui!');
    }
}
