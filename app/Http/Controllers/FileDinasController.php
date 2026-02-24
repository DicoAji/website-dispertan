<?php

namespace App\Http\Controllers;

use App\Models\FileDinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileDinasController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru agar yang baru diupload ada di posisi paling atas
        $files = FileDinas::latest()->get();
        return view('admin.file_dinas.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required',
            'file' => 'required|mimes:pdf|max:2048',

        ], [
            'file.mimes' => 'File harus berformat PDF.',
            'file.max' => 'Ukuran file maksimal 2 MB.'
        ]);

        $nama_file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/dokumen'), $nama_file);
        }

        FileDinas::create([
            'uraian' => $request->uraian,
            'file' => $nama_file
        ]);

        return redirect()->back()->with('success', 'File berhasil diunggah!');
    }

    public function update(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'uraian' => 'required|string|max:255',
            'file'   => 'nullable|mimes:pdf|max:2048', // Maksimal 5MB, nullable jika tidak ingin ganti file
        ], [
            'uraian.required' => 'Uraian dokumen tidak boleh kosong.',
            'file.mimes'      => 'Dokumen harus berformat PDF.',
            'file.max'        => 'Ukuran dokumen maksimal adalah 2MB.'
        ]);

        try {
            // 2. Cari data berdasarkan ID
            $fileDinas = \App\Models\FileDinas::findOrFail($id);

            if ($request->hasFile('file')) {
                // Hapus file fisik yang lama dari storage agar tidak menumpuk
                if ($fileDinas->file && file_exists(public_path('storage/dokumen/' . $fileDinas->file))) {
                    unlink(public_path('storage/dokumen/' . $fileDinas->file));
                }

                // Proses upload file baru
                $file = $request->file('file');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('storage/dokumen'), $nama_file);

                // Update nama file di database
                $fileDinas->file = $nama_file;
            }

            // 4. Update data uraian
            $fileDinas->uraian = $request->uraian;
            $fileDinas->save();

            // 5. Notifikasi Sukses
            return redirect()->route('file_dinas.index')->with('success', 'Data File Dinas berhasil diperbarui!');
        } catch (\Exception $e) {
            // 6. Notifikasi Gagal jika terjadi error sistem
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
