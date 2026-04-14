<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BidangController extends Controller
{
    public function index($kategori)
    {
        // Mengambil data dari tabel bidang (asumsi nama tabel: bidang)
        $data = DB::table('bidang')->where('kategori', $kategori)->first();

        $title = ucwords(str_replace('-', ' ', $kategori));

        return view('admin.bidang.index', compact('data', 'kategori', 'title'));
    }

    public function update(Request $request, $kategori)
    {
        $request->validate([
            'file_pdf' => 'required|mimes:pdf|max:5120',
        ]);

        // Path penyimpanan sesuai permintaan: storage/bidang/pangan/{kategori}
        $destinationPath = public_path('storage/bidang/pangan/' . $kategori);

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Ambil data lama untuk hapus file
        $oldData = DB::table('bidang')->where('kategori', $kategori)->first();

        if ($request->hasFile('file_pdf')) {
            // Hapus file fisik lama jika ada
            if ($oldData && $oldData->file_pdf) {
                $oldFile = $destinationPath . '/' . $oldData->file_pdf;
                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $file = $request->file('file_pdf');
            $filename = 'dokumen-' . $kategori . '-' . time() . '.pdf';
            $file->move($destinationPath, $filename);

            // Simpan ke database
            DB::table('bidang')->updateOrInsert(
                ['kategori' => $kategori],
                [
                    'file_pdf' => $filename,
                    'updated_at' => now()
                ]
            );
        }

        return redirect()->back()->with('success', 'Dokumen Bidang ' . $kategori . ' berhasil diperbarui!');
    }
}
