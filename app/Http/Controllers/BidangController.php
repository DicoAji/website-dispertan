<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk menghapus file fisik

class BidangController extends Controller
{
    /**
     * Menampilkan halaman form dan daftar bidang.
     */
    public function index()
    {
        // Mengambil semua data bidang dari database, diurutkan dari yang terbaru
        $bidang = Bidang::latest()->get();

        return view('admin.bidang.index', compact('bidang'));
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'uraian'    => 'required|string',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'required|string',
            'file'      => 'nullable|mimes:pdf',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        // Ambil semua data input kecuali file dan gambar
        $data = $request->except(['file', 'gambar']);

        // 2. Format nama folder secara dinamis dari input Kategori
        $folderName = strtolower(str_replace(' ', '_', $request->kategori));

        // Path dasar tujuan upload
        $destinationPath = public_path('storage/bidang/' . $folderName);

        // 3. Proses Upload File (PDF)
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = time() . '_file_' . $file->getClientOriginalName();
            $file->move($destinationPath, $nama_file);
            $data['file'] = 'bidang/' . $folderName . '/' . $nama_file;
        }

        // 4. Proses Upload Gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_img_' . $gambar->getClientOriginalName();
            $gambar->move($destinationPath, $nama_gambar);
            $data['gambar'] = 'bidang/' . $folderName . '/' . $nama_gambar;
        }

        // 5. Simpan data ke Database
        Bidang::create($data);

        return redirect()->route('admin.bidang.index')->with('success', 'Data bidang berhasil ditambahkan!');
    }

    /**
     * Menghapus data dari database dan menghapus file fisik terkait.
     */
    public function destroy($id)
    {
        // 1. Cari data berdasarkan ID
        $bidang = Bidang::findOrFail($id);

        // 2. Hapus File PDF fisik jika ada
        if ($bidang->file) {
            $filePath = public_path('storage/' . $bidang->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // 3. Hapus File Gambar fisik jika ada
        if ($bidang->gambar) {
            $gambarPath = public_path('storage/' . $bidang->gambar);
            if (File::exists($gambarPath)) {
                File::delete($gambarPath);
            }
        }

        // 4. Hapus data dari database
        $bidang->delete();

        return redirect()->route('admin.bidang.index')->with('success', 'Data bidang dan file terkait berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        // 1. Cari data yang akan diupdate
        $bidang = Bidang::findOrFail($id);

        // 2. Validasi Input
        $request->validate([
            'uraian'    => 'required|string',
            'deskripsi' => 'nullable|string',
            'kategori'  => 'required|string',
            'file'      => 'nullable|mimes:pdf',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        // Ambil semua data input kecuali file dan gambar
        $data = $request->except(['file', 'gambar']);

        // Tentukan folder berdasarkan kategori (untuk file baru jika ada)
        $folderName = strtolower(str_replace(' ', '_', $request->kategori));
        $destinationPath = public_path('storage/bidang/' . $folderName);

        // 3. Proses jika ada File PDF baru
        if ($request->hasFile('file')) {
            // Hapus file lama dari folder fisik
            if ($bidang->file) {
                $oldFilePath = public_path('storage/' . $bidang->file);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Upload file baru
            $file = $request->file('file');
            $nama_file = time() . '_file_' . $file->getClientOriginalName();
            $file->move($destinationPath, $nama_file);

            // Update path file di array data
            $data['file'] = 'bidang/' . $folderName . '/' . $nama_file;
        }

        // 4. Proses jika ada Gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari folder fisik
            if ($bidang->gambar) {
                $oldGambarPath = public_path('storage/' . $bidang->gambar);
                if (File::exists($oldGambarPath)) {
                    File::delete($oldGambarPath);
                }
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_img_' . $gambar->getClientOriginalName();
            $gambar->move($destinationPath, $nama_gambar);

            // Update path gambar di array data
            $data['gambar'] = 'bidang/' . $folderName . '/' . $nama_gambar;
        }

        // 5. Update data di database
        $bidang->update($data);

        return redirect()->route('admin.bidang.index')->with('success', 'Data bidang berhasil diperbarui!');
    }
}
