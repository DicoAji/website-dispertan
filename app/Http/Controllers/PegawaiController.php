<?php

namespace App\Http\Controllers;


use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    public function index()
    {
        // Mengambil semua data pegawai dan mengurutkannya dari tingkat tertinggi (1) ke terendah (4)
        $pegawai = Pegawai::orderBy('tingkat', 'asc')->get();

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
            'tingkat' => 'required|in:1,2,3,4', // Validasi agar input hanya boleh angka 1, 2, 3, atau 4
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $nama_bersih = Str::slug($request->nama_lengkap);
            $filename = $nama_bersih . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('storage/foto'), $filename);
            $data['foto'] = $filename;
        } else {
            $data['foto'] = 'default.jpg';
        }

        Pegawai::create($data);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai ' . $request->nama_lengkap . ' berhasil ditambahkan!');
    }


    // HAPUS
    public function destroy($nip)
    {
        $pegawai = Pegawai::findOrFail($nip);

        if ($pegawai->foto != 'default.jpg' && file_exists(public_path('storage/foto/' . $pegawai->foto))) {
            unlink(public_path('storage/foto/' . $pegawai->foto));
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus!');
    }

    // EDIT
    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'jabatan' => 'required|string|max:100',
            'tingkat' => 'required|in:1,2,3,4', // Validasi tingkat pada saat update
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $pegawai = Pegawai::findOrFail($nip);

        // Pastikan 'tingkat' ikut diambil dari request
        $data = $request->only(['nama_lengkap', 'jabatan', 'tingkat']);

        if ($request->hasFile('foto')) {
            if ($pegawai->foto != 'default.jpg' && file_exists(public_path('storage/foto/' . $pegawai->foto))) {
                unlink(public_path('storage/foto/' . $pegawai->foto));
            }

            $file = $request->file('foto');

            $nama_bersih = Str::slug($request->nama_lengkap);
            $filename = $nama_bersih . '-' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('storage/foto'), $filename);
            $data['foto'] = $filename;
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')->with('success', 'Data ' . $request->nama_lengkap . ' berhasil diperbarui!');
    }
}
