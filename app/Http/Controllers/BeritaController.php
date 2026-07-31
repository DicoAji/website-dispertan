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
            'foto_berita' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // Maksimal 5MB
        ], [
            // Pesan kustom jika validasi gagal
            'foto_berita.max' => 'Gagal menambahkan berita! Ukuran foto tidak boleh lebih dari 5 MB.',
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
    public function show($id)
    {
        // Ambil berita berdasarkan ID, jika tidak ada akan memunculkan error 404
        $berita = Berita::findOrFail($id);
        // Ambil profil instansi (jika dibutuhkan di layout/view)
        $profile = \App\Models\Profile::first();
        // Ambil berita lain untuk rekomendasi/sidebar (opsional, misal 3 berita terbaru selain berita yang sedang dibuka)
        $beritaLainnya = Berita::where('id', '!=', $id)->orderBy('tanggal_berita', 'desc')->take(3)->get();
        return view('public.detail_berita', compact('berita', 'profile', 'beritaLainnya'));
    }
}
