<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::orderBy('tanggal_berita', 'desc')->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_berita' => 'required|date',
            'deskripsi' => 'required',
            'foto_berita' => 'nullable|image|mimes:jpg,jpeg,png|max:1024', // Maksimal 1MB
        ], [
            // Pesan kustom jika validasi gagal
            'foto_berita.max' => 'Gagal menambahkan berita! Ukuran foto tidak boleh lebih dari 1 MB.',
            'foto_berita.image' => 'File yang diunggah harus berupa gambar.',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_berita')) {
            $file = $request->file('foto_berita');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/berita'), $nama_file);
            $data['foto_berita'] = $nama_file;
        }

        \App\Models\Berita::create($data);

        return redirect()->back()->with('success', 'Berita berhasil disimpan!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Path menuju folder public/storage/berita
        $filePath = public_path('storage/berita/' . $berita->foto_berita);

        if ($berita->foto_berita && file_exists($filePath)) {
            unlink($filePath);
        }

        $berita->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }
}
