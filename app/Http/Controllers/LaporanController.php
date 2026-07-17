<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan; // Panggil model Laporan yang sudah dibuat

class LaporanController extends Controller
{
    /**
     * Menyimpan data laporan dari form ke database.
     */
    /**
     * Menampilkan daftar laporan di halaman admin.
     */
    public function index()
    {
        // Mengambil semua data laporan dari database, diurutkan dari yang paling baru
        $laporans = \App\Models\Laporan::latest()->get();

        // Mengembalikan tampilan ke halaman admin/laporan/index.blade.php beserta datanya
        return view('admin.laporan.index', compact('laporans'));
    }
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'pengaduan' => 'required|string',
        ]);

        // 2. Simpan data ke dalam tabel laporan
        Laporan::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'pengaduan' => $request->pengaduan,
        ]);

        // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan Anda berhasil dikirim!');
    }
    /**
     * Menghapus data laporan dari database.
     */
    public function destroy($id)
    {
        // Cari data laporan berdasarkan ID
        $laporan = \App\Models\Laporan::findOrFail($id);

        // Hapus data
        $laporan->delete();

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data laporan berhasil dihapus!');
    }
}
