<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriFotoController extends Controller
{
    public function index()
    {
        $galeri = GaleriFoto::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }
    public function showArtikel()
    {
        $artikel = \App\Models\GaleriFoto::where('kategori', 'artikel')->latest()->get();
        $profile = \App\Models\Profile::first(); // Tambahkan baris ini
        return view('public.koleksi.artikel', compact('artikel', 'profile')); // Tambahkan 'profile'
    }

    public function showFoto()
    {
        $foto = \App\Models\GaleriFoto::where('kategori', 'foto')->latest()->get();
        $profile = \App\Models\Profile::first(); // Tambahkan baris ini
        return view('public.koleksi.foto', compact('foto', 'profile')); // Tambahkan 'profile'
    }

    public function showVideo()
    {
        $video = \App\Models\GaleriFoto::where('kategori', 'video')->latest()->get();
        $profile = \App\Models\Profile::first(); // Tambahkan baris ini
        return view('public.koleksi.video', compact('video', 'profile')); // Tambahkan 'profile'
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan'  => 'required|string|max:255',
            'kategori'  => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'file'      => 'required|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
        ]);

        $file = $request->file('file');
        $namaFile = time() . '_' . $file->hashName();
        $tujuanUpload = public_path('storage/galeri');
        $file->move($tujuanUpload, $namaFile);

        GaleriFoto::create([
            'kegiatan'  => $request->kegiatan,
            'kategori'  => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'file'      => $namaFile,
        ]);

        return redirect()->back()->with('success', 'File berhasil ditambahkan ke galeri.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan'  => 'required|string|max:255',
            'kategori'  => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'file'      => 'nullable|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
        ]);

        $galeri = GaleriFoto::findOrFail($id);

        if ($request->hasFile('file')) {
            $pathLama = public_path('storage/galeri/' . $galeri->file);
            if (File::exists($pathLama)) {
                File::delete($pathLama);
            }

            $file = $request->file('file');
            $namaFile = time() . '_' . $file->hashName();
            $tujuanUpload = public_path('storage/galeri');
            $file->move($tujuanUpload, $namaFile);

            $galeri->file = $namaFile;
        }

        $galeri->kegiatan  = $request->kegiatan;
        $galeri->kategori  = $request->kategori;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->back()->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = GaleriFoto::findOrFail($id);

        $pathFile = public_path('storage/galeri/' . $galeri->file);
        if (File::exists($pathFile)) {
            File::delete($pathFile);
        }

        $galeri->delete();

        return redirect()->back()->with('success', 'File berhasil dihapus.');
    }
    public function showByCategory($kategori)
    {
        // Pastikan kategori yang diinput valid
        $kategoriValid = ['artikel', 'foto', 'video'];

        if (!in_array($kategori, $kategoriValid)) {
            abort(404);
        }

        // Ambil data berdasarkan kategori
        $koleksiFoto = \App\Models\GaleriFoto::where('kategori', $kategori)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.galeri_foto', compact('koleksiFoto', 'kategori'));
    }
}
