<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LayananController extends Controller
{
    public function index()
    {
        // Mengambil semua data layanan, diurutkan dari yang terbaru
        $layanan = Layanan::orderBy('id', 'desc')->get();

        return view('admin.layanan.index', compact('layanan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120', // Maksimal 5MB
        ]);

        $layanan = new Layanan();
        $layanan->nama = $request->nama;
        $layanan->link = $request->link;

        // Cek jika ada file yang diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_layanan_' . $file->hashName();
            // Simpan ke folder public/storage/layanan
            $file->move(public_path('storage/layanan'), $namaFile);
            $layanan->file = $namaFile;
        }

        $layanan->save();

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        // Hapus file fisik dari storage jika data memiliki file
        if ($layanan->file && File::exists(public_path('storage/layanan/' . $layanan->file))) {
            File::delete(public_path('storage/layanan/' . $layanan->file));
        }

        // Hapus data dari database
        $layanan->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ]);

        $layanan->nama = $request->nama;
        $layanan->link = $request->link;

        // Jika ada file baru yang diunggah
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($layanan->file && File::exists(public_path('storage/layanan/' . $layanan->file))) {
                File::delete(public_path('storage/layanan/' . $layanan->file));
            }

            $file = $request->file('file');
            $namaFile = time() . '_layanan_' . $file->hashName();
            $file->move(public_path('storage/layanan'), $namaFile);

            $layanan->file = $namaFile;
        }

        $layanan->save();

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }
}
