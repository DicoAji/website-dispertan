<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::orderBy('id', 'desc')->get();
        return view('admin.informasi.index', compact('informasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'nullable|string|max:255',
            'uraian'   => 'required|string|max:255',
            'file'     => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120',
            'kategori' => 'required|string|max:100',
        ]);

        $file = $request->file('file');
        $namaFile = time() . '_' . $file->hashName();
        $file->move(public_path('storage/informasi'), $namaFile);

        Informasi::create([
            'uraian'   => $request->uraian,
            'file'     => $namaFile,
            'kategori' => $request->kategori,
        ]);

        return redirect()->back()->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $request->validate([
            'uraian'   => 'required|string|max:255',
            'file'     => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:5120',
            'kategori' => 'required|string|max:100',
        ]);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($informasi->file && File::exists(public_path('storage/informasi/' . $informasi->file))) {
                File::delete(public_path('storage/informasi/' . $informasi->file));
            }

            $file = $request->file('file');
            $namaFile = time() . '_' . $file->hashName();
            $file->move(public_path('storage/informasi'), $namaFile);
            $informasi->file = $namaFile;
        }

        // Perbarui data uraian dan kategori
        $informasi->uraian = $request->uraian;
        $informasi->kategori = $request->kategori;
        $informasi->save();

        return redirect()->back()->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);

        if ($informasi->file && File::exists(public_path('storage/informasi/' . $informasi->file))) {
            File::delete(public_path('storage/informasi/' . $informasi->file));
        }

        $informasi->delete();

        return redirect()->back()->with('success', 'Informasi berhasil dihapus!');
    }
}
