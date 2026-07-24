<?php

namespace App\Http\Controllers;

use App\Models\Ppid;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PpidController extends Controller
{
    // ==========================================
    // UNTUK TAMPILAN PUBLIK
    // ==========================================
    public function publicIndex()
    {
        $profile = Profile::first();

        // Menghitung jumlah dokumen per kategori untuk ditampilkan di kotak/kartu
        $countBerkala = Ppid::where('kategori', 'Informasi Berkala')->count();
        $countSetiapSaat = Ppid::where('kategori', 'Informasi Setiap Saat')->count();
        $countSertaMerta = Ppid::where('kategori', 'Informasi Serta Merta')->count();
        $countDikecualikan = Ppid::where('kategori', 'Informasi Dikecualikan')->count();

        return view('public.ppid', compact('profile', 'countBerkala', 'countSetiapSaat', 'countSertaMerta', 'countDikecualikan'));
    }

    // ==========================================
    // UNTUK HALAMAN ADMIN (MANAJEMEN DATA)
    // ==========================================
    public function index()
    {
        $ppid = Ppid::orderBy('id', 'desc')->get();
        return view('admin.ppid.index', compact('ppid'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'link' => 'nullable|string|max:255', // Validasi link
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,zip,rar|max:10240', // Maksimal 10MB
        ]);

        $ppid = new Ppid();
        $ppid->nama = $request->nama;
        $ppid->kategori = $request->kategori;
        $ppid->link = $request->link; // Menyimpan link

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_ppid_' . $file->hashName();
            $file->move(public_path('storage/ppid'), $namaFile);
            $ppid->file = $namaFile;
        }

        $ppid->save();

        return redirect()->back()->with('success', 'Dokumen PPID berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $ppid = Ppid::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'link' => 'nullable|string|max:255', // Validasi link
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,zip,rar|max:10240',
        ]);

        $ppid->nama = $request->nama;
        $ppid->kategori = $request->kategori;
        $ppid->link = $request->link; // Memperbarui link

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($ppid->file && File::exists(public_path('storage/ppid/' . $ppid->file))) {
                File::delete(public_path('storage/ppid/' . $ppid->file));
            }

            $file = $request->file('file');
            $namaFile = time() . '_ppid_' . $file->hashName();
            $file->move(public_path('storage/ppid'), $namaFile);
            $ppid->file = $namaFile;
        }

        $ppid->save();

        return redirect()->back()->with('success', 'Dokumen PPID berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ppid = Ppid::findOrFail($id);

        // Hapus file fisik
        if ($ppid->file && File::exists(public_path('storage/ppid/' . $ppid->file))) {
            File::delete(public_path('storage/ppid/' . $ppid->file));
        }

        $ppid->delete();
        return redirect()->back()->with('success', 'Dokumen PPID berhasil dihapus!');
    }

    public function showKategori($kategori)
    {
        $profile = \App\Models\Profile::first();

        // Kembalikan format URL (misal %20) menjadi spasi normal
        $kategoriName = urldecode($kategori);

        // Ambil data dokumen yang kategorinya sesuai dengan yang diklik
        $dokumen = \App\Models\Ppid::where('kategori', $kategoriName)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.ppid_kategori', compact('profile', 'kategoriName', 'dokumen'));
    }
}
