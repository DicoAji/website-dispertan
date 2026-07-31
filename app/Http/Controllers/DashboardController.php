<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Berita;
use App\Models\FileDinas;
use App\Models\GaleriFoto;
use App\Models\Laporan;
use App\Models\PopupAd;
use App\Models\MenuLayanan;

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

        // Ambil data popup & header
        $popup = PopupAd::find(1);
        $header = PopupAd::find(2);

        // Ambil data Menu Layanan (FAB)
        $menuLayanan = MenuLayanan::all();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalDokumen',
            'totalGaleri',
            'totalLaporan',
            'popup',
            'header',
            'menuLayanan'
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

        $popup = PopupAd::find(1);
        if (!$popup) {
            $popup = new PopupAd();
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

    /**
     * Memproses form upload/simpan Header
     */
    public function updateHeader(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $header = PopupAd::find(2);
        if (!$header) {
            $header = new PopupAd();
            $header->id = 2;
            $header->kegiatan = 'Background Header';
        }

        if ($request->hasFile('gambar')) {
            if ($header->gambar && File::exists(public_path('storage/background/' . $header->gambar))) {
                File::delete(public_path('storage/background/' . $header->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_header_' . $file->hashName();
            $file->move(public_path('storage/background'), $namaFile);

            $header->gambar = $namaFile;
        }

        $header->save();

        return redirect()->back()->with('success', 'Gambar Background Header berhasil diperbarui!');
    }

    // =========================================================================
    // FITUR MENU LAYANAN (FAB) - CRUD
    // =========================================================================

    /**
     * Menyimpan Menu Layanan Baru (Create)
     */
    public function storeMenuLayanan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:5120',
        ]);

        $menu = new MenuLayanan();
        $menu->nama = $request->nama;
        $menu->link = $request->link;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_' . str_replace(' ', '_', strtolower($menu->nama)) . '_' . $file->hashName();
            $file->move(public_path('storage/menu_layanan'), $namaFile);
            $menu->file = $namaFile;
        }

        $menu->save();
        return redirect()->back()->with('success', 'Menu Layanan berhasil ditambahkan!');
    }

    /**
     * Memperbarui Satu Menu Layanan (Update)
     */
    public function updateMenuLayanan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:5120',
        ]);

        $menu = MenuLayanan::findOrFail($id);
        $menu->nama = $request->nama;
        $menu->link = $request->link;

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($menu->file && File::exists(public_path('storage/menu_layanan/' . $menu->file))) {
                File::delete(public_path('storage/menu_layanan/' . $menu->file));
            }
            // Simpan file baru
            $file = $request->file('file');
            $namaFile = time() . '_' . str_replace(' ', '_', strtolower($menu->nama)) . '_' . $file->hashName();
            $file->move(public_path('storage/menu_layanan'), $namaFile);

            $menu->file = $namaFile;
        }

        $menu->save();
        return redirect()->back()->with('success', 'Menu Layanan berhasil diperbarui!');
    }

    /**
     * Menghapus Menu Layanan (Delete)
     */
    public function destroyMenuLayanan($id)
    {
        $menu = MenuLayanan::findOrFail($id);

        // Hapus file fisik jika ada di storage
        if ($menu->file && File::exists(public_path('storage/menu_layanan/' . $menu->file))) {
            File::delete(public_path('storage/menu_layanan/' . $menu->file));
        }

        $menu->delete();
        return redirect()->back()->with('success', 'Menu Layanan berhasil dihapus!');
    }
}
