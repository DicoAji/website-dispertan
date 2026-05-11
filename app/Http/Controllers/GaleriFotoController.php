<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk fungsi hapus file

class GaleriFotoController extends Controller
{
    public function index()
    {
        $galeri = GaleriFoto::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'file'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('file');
        // Membuat nama file yang unik agar tidak bentrok
        $namaFile = time() . '_' . $file->hashName();

        // Memindahkan file LANGSUNG ke public/storage/galeri
        $tujuanUpload = public_path('storage/galeri');
        $file->move($tujuanUpload, $namaFile);

        GaleriFoto::create([
            'kegiatan' => $request->kegiatan,
            'file'     => $namaFile,
        ]);

        return redirect()->back()->with('success', 'Foto berhasil ditambahkan ke galeri.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'file'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $galeri = GaleriFoto::findOrFail($id);

        if ($request->hasFile('file')) {
            // 1. Hapus foto lama secara fisik dari folder public
            $pathLama = public_path('storage/galeri/' . $galeri->file);
            if (File::exists($pathLama)) {
                File::delete($pathLama);
            }

            // 2. Upload foto baru
            $file = $request->file('file');
            $namaFile = time() . '_' . $file->hashName();
            $tujuanUpload = public_path('storage/galeri');
            $file->move($tujuanUpload, $namaFile);

            // 3. Update field nama file
            $galeri->file = $namaFile;
        }

        $galeri->kegiatan = $request->kegiatan;
        $galeri->save();

        return redirect()->back()->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = GaleriFoto::findOrFail($id);

        // Hapus file fisik dari folder public
        $pathFile = public_path('storage/galeri/' . $galeri->file);
        if (File::exists($pathFile)) {
            File::delete($pathFile);
        }

        $galeri->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}
