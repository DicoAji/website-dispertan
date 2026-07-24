<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    // Menampilkan halaman form permohonan publik
    public function create()
    {
        $profile = Profile::first();
        return view('public.permohonan', compact('profile'));
    }

    // Menyimpan data permohonan dari masyarakat
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:25',
            'email' => 'required|email|max:255',
            'pekerjaan' => 'required|string|max:100',
            'kategori_permohonan' => 'required|in:perorangan,organisasi,pelajar',
            'rincian_informasi' => 'required|string',
            'tujuan_penggunaan' => 'required|string',
            'cara_memperoleh' => 'required|in:ambil langsung,email,kurir,pos,fax',
            'foto_ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB
            'berkas_pendukung' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Maksimal 5MB
        ], [
            'foto_ktp.required' => 'Foto KTP wajib diunggah.',
            'foto_ktp.image' => 'File KTP harus berupa gambar (JPG/PNG).',
            'foto_ktp.max' => 'Ukuran foto KTP tidak boleh lebih dari 2 MB.',
        ]);

        $data = $request->except(['foto_ktp', 'berkas_pendukung']);

        // Upload Foto KTP
        if ($request->hasFile('foto_ktp')) {
            $fileKtp = $request->file('foto_ktp');
            $namaKtp = time() . '_ktp_' . $fileKtp->hashName();
            $fileKtp->move(public_path('storage/permohonan/ktp'), $namaKtp);
            $data['foto_ktp'] = $namaKtp;
        }

        // Upload Berkas Pendukung (Opsional)
        if ($request->hasFile('berkas_pendukung')) {
            $fileBerkas = $request->file('berkas_pendukung');
            $namaBerkas = time() . '_berkas_' . $fileBerkas->hashName();
            $fileBerkas->move(public_path('storage/permohonan/berkas'), $namaBerkas);
            $data['berkas_pendukung'] = $namaBerkas;
        }

        Permohonan::create($data);

        return redirect()->route('public.permohonan.create')->with('success', 'Permohonan informasi Anda berhasil dikirim! Tim PPID kami akan segera memprosesnya.');
    }
    public function index()
    {
        $permohonan = Permohonan::orderBy('created_at', 'desc')->get();
        return view('admin.permohonan.index', compact('permohonan'));
    }

    // Mengubah status permohonan (Tindak Lanjut)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Belum Ditindak,Selesai'
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->status;
        $permohonan->save();

        return redirect()->back()->with('success', 'Status tindak lanjut berhasil diperbarui!');
    }

    // Menghapus data permohonan
    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // Hapus file fisik KTP dan Berkas dari server jika ada
        if ($permohonan->foto_ktp && \Illuminate\Support\Facades\File::exists(public_path('storage/permohonan/ktp/' . $permohonan->foto_ktp))) {
            \Illuminate\Support\Facades\File::delete(public_path('storage/permohonan/ktp/' . $permohonan->foto_ktp));
        }
        if ($permohonan->berkas_pendukung && \Illuminate\Support\Facades\File::exists(public_path('storage/permohonan/berkas/' . $permohonan->berkas_pendukung))) {
            \Illuminate\Support\Facades\File::delete(public_path('storage/permohonan/berkas/' . $permohonan->berkas_pendukung));
        }

        $permohonan->delete();
        return redirect()->back()->with('success', 'Data permohonan berhasil dihapus secara permanen!');
    }
}
