<?php

namespace App\Http\Controllers;


use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil semua data pegawai dari database
        $pegawai = Pegawai::all();

        // Mengirim data ke view
        return view('admin.pegawai.index', compact('pegawai'));
    }

    // TAMBAH
    public function store(Request $request)
    {
    $request->validate([
        'nip' => 'required|size:18|unique:pegawai,nip',
        'nama_lengkap' => 'required|string|max:150',
        'jabatan' => 'required|string|max:100',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');

        // Membuat nama file: nama-pegawai-timestamp.ekstensi
        $nama_bersih = Str::slug($request->nama_lengkap);
        $filename = $nama_bersih . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('storage/foto'), $filename);
        $data['foto'] = $filename;
    } else {
        $data['foto'] = 'default.jpg';
    }

    \App\Models\Pegawai::create($data);

    return redirect()->route('pegawai.index')->with('success', 'Pegawai ' . $request->nama_lengkap . ' berhasil ditambahkan!');
    }


    // HAPUS
    public function destroy($nip)
    {
        // Cari pegawai berdasarkan NIP
        $pegawai = \App\Models\Pegawai::findOrFail($nip);

        // Hapus file foto dari storage jika bukan foto default
        if ($pegawai->foto != 'default.jpg' && file_exists(public_path('storage/foto/' . $pegawai->foto))) {
            unlink(public_path('storage/foto/' . $pegawai->foto));
        }

        // Hapus data dari database
        $pegawai->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus!');
    }

    // EDIT
    public function update(Request $request, $nip)
    {
    $request->validate([
        'nama_lengkap' => 'required|string|max:150',
        'jabatan' => 'required|string|max:100',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    $pegawai = \App\Models\Pegawai::findOrFail($nip);
    $data = $request->only(['nama_lengkap', 'jabatan']);

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($pegawai->foto != 'default.jpg' && file_exists(public_path('storage/foto/' . $pegawai->foto))) {
            unlink(public_path('storage/foto/' . $pegawai->foto));
        }

        $file = $request->file('foto');

        // Rename sesuai nama baru
        $nama_bersih = Str::slug($request->nama_lengkap);
        $filename = $nama_bersih . '-' . time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('storage/foto'), $filename);
        $data['foto'] = $filename;
    }

    $pegawai->update($data);

    return redirect()->route('pegawai.index')->with('success', 'Data ' . $request->nama_lengkap . ' berhasil diperbarui!');
    }



}
