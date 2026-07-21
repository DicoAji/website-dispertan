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
        $popup = PopupAd::first();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalDokumen',
            'totalGaleri',
            'totalLaporan',
            'popup'
        ));
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

        $popup = PopupAd::first() ?? new PopupAd();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($popup->gambar && File::exists(public_path('storage/popup/' . $popup->gambar))) {
                File::delete(public_path('storage/popup/' . $popup->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->hashName();
            $file->move(public_path('storage/popup'), $namaFile);

            $popup->gambar = $namaFile;
        }

        $popup->kegiatan = $request->kegiatan;
        $popup->save();

        return redirect()->back()->with('success', 'Pop-up Ads berhasil disimpan!');
    }
}
