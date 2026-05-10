<?php

namespace App\Http\Controllers;

use App\Models\KalenderKegiatan;
use Illuminate\Http\Request;

class KalenderKegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = KalenderKegiatan::orderBy('tanggal', 'asc')->get();
        return view('admin.kalender.index', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kategori'      => 'required|string',
            'tanggal'       => 'required|date',
            'waktu'         => 'required|string',
            'lokasi'        => 'required|string',
            'deskripsi'     => 'nullable|string',
        ]);

        KalenderKegiatan::create($request->all());

        return redirect()->route('admin.kalender.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kegiatan = KalenderKegiatan::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'kategori'      => 'required|string',
            'tanggal'       => 'required|date',
            'waktu'         => 'required|string',
            'lokasi'        => 'required|string',
            'deskripsi'     => 'nullable|string',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('admin.kalender.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kegiatan = KalenderKegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('admin.kalender.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
