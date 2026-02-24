<?php

namespace App\Http\Controllers;

use App\Models\Profile; // Pastikan Model dipanggil
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_opd' => 'required|string|max:255',
            'visi'     => 'required|string',
            'misi'     => 'required|string',
            'email'    => 'required|string|max:100',
            'telp'     => 'required|string|max:20',
            'alamat'   => 'required|string',
            'facebook' => 'nullable|url',
            'instagram'=> 'nullable|url',
            'youtube'  => 'nullable|url',
            'struktur_organisasi' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // 2. Ambil data profil pertama
        $profile = Profile::first();

        // Jika karena suatu alasan datanya kosong, buat baru
        if (!$profile) {
            $profile = new Profile();
        }

        $data = $request->all();

        // 3. Penanganan Unggah File Struktur Organisasi
        if ($request->hasFile('struktur_organisasi')) {
            $file = $request->file('struktur_organisasi');

            // Path folder penyimpanan
            $destinationPath = public_path('storage/struktur_organisasi');

            // Buat folder jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Hapus foto lama jika ada dan bukan file default
            if ($profile->struktur_organisasi && $profile->struktur_organisasi != 'struktur_organisasi_dispertan_grobogan.png') {
                $oldFilePath = $destinationPath . '/' . $profile->struktur_organisasi;
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Beri nama file baru (contoh: struktur-1708567890.png)
            $filename = 'struktur-' . time() . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder tujuan
            $file->move($destinationPath, $filename);

            // Simpan nama file ke dalam array data
            $data['struktur_organisasi'] = $filename;
        }

        // 4. Eksekusi Update ke Database
        $profile->fill($data);
        $profile->save();

        // 5. Kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Profil Dinas dan Struktur Organisasi berhasil diperbarui!');
    }
}
