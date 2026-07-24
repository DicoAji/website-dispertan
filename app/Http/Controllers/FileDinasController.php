<?php

namespace App\Http\Controllers;

use App\Models\FileDinas;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileDinasController extends Controller
{
    public function dokumen()
    {
        // Mengambil semua dokumen
        $dokumen = FileDinas::latest()->get();

        // Mengambil daftar kategori unik saja
        $kategoriList = FileDinas::select('kategori')->distinct()->pluck('kategori');

        $profile = Profile::first();
        return view('public.dokumen', compact('dokumen', 'profile', 'kategoriList'));
    }

    public function index()
    {
        $files = FileDinas::latest()->get();
        return view('admin.file_dinas.index', compact('files'));
    }

    public function store(Request $request)
    {
        // 1. Tambahkan validasi untuk tahun dan kategori
        $request->validate([
            'uraian'   => 'required',
            'tahun'    => 'required|digits:4',
            'kategori' => 'required|string|max:100',
            'file'     => 'required|mimes:pdf|max:5120',
        ], [
            'file.mimes' => 'File harus berformat PDF.',
        ]);

        $nama_file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/dokumen'), $nama_file);
        }

        // 2. Simpan tahun dan kategori ke database
        FileDinas::create([
            'uraian'   => $request->uraian,
            'tahun'    => $request->tahun,
            'kategori' => $request->kategori,
            'file'     => $nama_file
        ]);

        return redirect()->back()->with('success', 'File berhasil diunggah!');
    }

    public function update(Request $request, $id)
    {
        // 1. Tambahkan validasi untuk tahun dan kategori
        $request->validate([
            'uraian'   => 'required|string',
            'tahun'    => 'required|digits:4',
            'kategori' => 'required|string|max:100',
            'file'     => 'nullable|mimes:pdf|max:5120',
        ], [
            'uraian.required' => 'Uraian dokumen tidak boleh kosong.',
            'file.mimes'      => 'Dokumen harus berformat PDF.',
        ]);

        try {
            $fileDinas = FileDinas::findOrFail($id);

            if ($request->hasFile('file')) {
                if ($fileDinas->file && file_exists(public_path('storage/dokumen/' . $fileDinas->file))) {
                    unlink(public_path('storage/dokumen/' . $fileDinas->file));
                }

                $file = $request->file('file');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('storage/dokumen'), $nama_file);

                $fileDinas->file = $nama_file;
            }

            // 2. Update data uraian, tahun, dan kategori
            $fileDinas->uraian   = $request->uraian;
            $fileDinas->tahun    = $request->tahun;
            $fileDinas->kategori = $request->kategori;
            $fileDinas->save();

            return redirect()->route('file_dinas.index')->with('success', 'Data File Dinas berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $fileDinas = FileDinas::findOrFail($id);

            // Hapus file fisik dari storage jika ada
            if ($fileDinas->file && file_exists(public_path('storage/dokumen/' . $fileDinas->file))) {
                unlink(public_path('storage/dokumen/' . $fileDinas->file));
            }

            // Hapus data dari database
            $fileDinas->delete();

            return redirect()->route('file_dinas.index')->with('success', 'File Dinas berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus: ' . $e->getMessage());
        }
    }
}
