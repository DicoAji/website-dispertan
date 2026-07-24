<?php

namespace App\Http\Controllers;

use App\Models\AplikasiLain;
use Illuminate\Http\Request;

class AplikasiLainController extends Controller
{
    // Menampilkan halaman daftar aplikasi lain
    public function index()
    {
        $aplikasi = AplikasiLain::orderBy('id', 'desc')->get();
        return view('admin.aplikasi_lain.index', compact('aplikasi'));
    }

    // Menyimpan data aplikasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'link' => 'required|url|max:255',
        ]);

        AplikasiLain::create($request->all());

        return redirect()->back()->with('success', 'Aplikasi berhasil ditambahkan!');
    }

    // Memperbarui data aplikasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'link' => 'required|url|max:255',
        ]);

        $aplikasi = AplikasiLain::findOrFail($id);
        $aplikasi->update($request->all());

        return redirect()->back()->with('success', 'Aplikasi berhasil diperbarui!');
    }

    // Menghapus data aplikasi
    public function destroy($id)
    {
        $aplikasi = AplikasiLain::findOrFail($id);
        $aplikasi->delete();

        return redirect()->back()->with('success', 'Aplikasi berhasil dihapus!');
    }
}
