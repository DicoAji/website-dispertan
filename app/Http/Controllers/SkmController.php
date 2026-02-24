<?php

namespace App\Http\Controllers;

use App\Models\Skm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkmController extends Controller
{
    public function index()
    {
        $skms = Skm::orderBy('tahun', 'desc')->orderBy('triwulan', 'asc')->get();
        return view('admin.skm.index', compact('skms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'triwulan' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file = 'SKM_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/skm'), $nama_file);

            Skm::create([
                'tahun' => $request->tahun,
                'triwulan' => $request->triwulan,
                'file' => $nama_file,
            ]);
        }

        return redirect()->back()->with('success', 'Laporan SKM berhasil diunggah!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'triwulan' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $skm = Skm::findOrFail($id);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ganti file baru
            if (File::exists(public_path('storage/skm/' . $skm->file))) {
                File::delete(public_path('storage/skm/' . $skm->file));
            }

            $file = $request->file('file');
            $nama_file = 'SKM_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/skm'), $nama_file);
            $skm->file = $nama_file;
        }

        $skm->update([
            'tahun' => $request->tahun,
            'triwulan' => $request->triwulan,
        ]);

        return redirect()->back()->with('success', 'Data SKM berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $skm = Skm::findOrFail($id);

        // Pastikan file fisik terhapus agar tidak jadi sampah di server
        if (File::exists(public_path('storage/skm/' . $skm->file))) {
            File::delete(public_path('storage/skm/' . $skm->file));
        }

        $skm->delete();
        return redirect()->back()->with('success', 'Data SKM berhasil dihapus!');
    }
}
