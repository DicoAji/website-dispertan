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
            'sejarah'  => 'nullable|string',
            'visi'     => 'required|string',
            'misi'     => 'required|string',
            'email'    => 'required|string|max:100',
            'telp'     => 'required|string|max:20',
            'alamat'   => 'required|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube'  => 'nullable|url',
            'struktur_organisasi' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'maklumat_layanan'    => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'sop_pelayanan'       => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            'tugas_fungsi'        => 'nullable|mimes:pdf|max:5120',
            'narasi_tugas_fungsi' => 'nullable|string',
        ]);

        // 2. Ambil data profil
        $profile = Profile::first() ?? new Profile();

        $data = $request->all();

        // Folder penyimpanan tunggal agar rapi
        $destinationPath = public_path('storage/profil_dinas');

        // Buat folder jika belum ada
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // --- 3. Penanganan Struktur Organisasi ---
        if ($request->hasFile('struktur_organisasi')) {
            $file = $request->file('struktur_organisasi');

            // Hapus file lama jika ada
            if ($profile->struktur_organisasi && File::exists($destinationPath . '/' . $profile->struktur_organisasi)) {
                File::delete($destinationPath . '/' . $profile->struktur_organisasi);
            }

            $filename = 'struktur-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['struktur_organisasi'] = $filename;
        }


        // --- Penanganan Unggah Maklumat Pelayanan (Gambar) ---
        if ($request->hasFile('maklumat_layanan')) {
            $file = $request->file('maklumat_layanan');

            // Path folder penyimpanan utama (profil_dinas)
            $destinationPath = public_path('storage/profil_dinas');

            // Buat folder jika belum ada
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Hapus file lama jika ada di database dan fisik file tersedia
            if ($profile->maklumat_layanan) {
                $oldFilePath = $destinationPath . '/' . $profile->maklumat_layanan;
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Beri nama file baru
            $filename = 'maklumat-' . time() . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder tujuan
            $file->move($destinationPath, $filename);

            // Simpan nama file ke dalam array data untuk update database
            $data['maklumat_layanan'] = $filename;
        }


        // --- Penanganan Unggah SOP Pelayanan (Gambar) ---
        if ($request->hasFile('sop_pelayanan')) {
            $file = $request->file('sop_pelayanan');

            // Hapus file lama jika ada di database dan fisik file tersedia
            if ($profile->sop_pelayanan) {
                $oldFilePath = $destinationPath . '/' . $profile->sop_pelayanan;
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }

            // Beri nama file baru
            $filename = 'sop-' . time() . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder tujuan
            $file->move($destinationPath, $filename);

            // Simpan nama file ke dalam array data untuk update database
            $data['sop_pelayanan'] = $filename;
        }


        // --- 5. Penanganan Tugas dan Fungsi (PDF) ---
        if ($request->hasFile('tugas_fungsi')) {
            $file = $request->file('tugas_fungsi');

            if ($profile->tugas_fungsi && File::exists($destinationPath . '/' . $profile->tugas_fungsi)) {
                File::delete($destinationPath . '/' . $profile->tugas_fungsi);
            }

            $filename = 'tugas-fungsi-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $data['tugas_fungsi'] = $filename;
        }

        // 6. Eksekusi simpan
        $profile->fill($data);
        $profile->save();

        return redirect()->back()->with('success', 'Profil Dinas, Maklumat Pelayanan, dan Tugas Fungsi berhasil diperbarui!');
    }
}
