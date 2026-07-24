<?php

namespace App\Http\Controllers;

use App\Models\AplikasiLain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AplikasiLainController extends Controller
{
    public function index()
    {
        $aplikasi = AplikasiLain::orderBy('id', 'desc')->get();
        return view('admin.aplikasi_lain.index', compact('aplikasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'logo' => 'required|file|mimes:jpg,jpeg,png,svg|max:2048', // Mendukung gambar dan SVG max 2MB
            'link' => 'required|url|max:255',
        ]);

        $namaLogo = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $namaLogo = time() . '_logo_' . $file->hashName();
            $file->move(public_path('storage/aplikasi'), $namaLogo);
        }

        AplikasiLain::create([
            'nama_aplikasi' => $request->nama_aplikasi,
            'logo' => $namaLogo,
            'link' => $request->link,
        ]);

        return redirect()->back()->with('success', 'Aplikasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpg,jpeg,png,svg|max:2048',
            'link' => 'required|url|max:255',
        ]);

        $aplikasi = AplikasiLain::findOrFail($id);
        $aplikasi->nama_aplikasi = $request->nama_aplikasi;
        $aplikasi->link = $request->link;

        if ($request->hasFile('logo')) {
            // Hapus file logo lama jika ada
            if ($aplikasi->logo && File::exists(public_path('storage/aplikasi/' . $aplikasi->logo))) {
                File::delete(public_path('storage/aplikasi/' . $aplikasi->logo));
            }

            $file = $request->file('logo');
            $namaLogo = time() . '_logo_' . $file->hashName();
            $file->move(public_path('storage/aplikasi'), $namaLogo);
            $aplikasi->logo = $namaLogo;
        }

        $aplikasi->save();

        return redirect()->back()->with('success', 'Aplikasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $aplikasi = AplikasiLain::findOrFail($id);

        // Hapus file fisik dari folder
        if ($aplikasi->logo && File::exists(public_path('storage/aplikasi/' . $aplikasi->logo))) {
            File::delete(public_path('storage/aplikasi/' . $aplikasi->logo));
        }

        $aplikasi->delete();

        return redirect()->back()->with('success', 'Aplikasi berhasil dihapus!');
    }
}
