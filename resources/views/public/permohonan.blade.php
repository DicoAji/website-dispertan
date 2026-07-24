@extends('layouts.public')
@section('title', 'Form Permohonan Informasi Publik')

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 max-w-4xl">

            {{-- Tombol Kembali --}}
            <div class="mb-6">
                <a href="{{ route('public.ppid') }}"
                    class="inline-flex items-center text-sm font-semibold text-emerald-700 hover:text-emerald-900 transition-colors">
                    <i class="fa fa-arrow-left mr-2"></i> Kembali ke Menu PPID
                </a>
            </div>

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-emerald-50 text-emerald-800 border-l-4 border-emerald-500 rounded-xl shadow-sm text-sm font-bold flex items-center gap-3">
                    <i class="fas fa-check-circle text-lg"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            {{-- Validasi Error --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 text-red-800 border-l-4 border-red-500 rounded-xl shadow-sm text-sm">
                    <span class="font-bold block mb-1">Terjadi kesalahan pengisian form:</span>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Card Form --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8 bg-emerald-900 text-white">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-emerald-800 rounded-xl flex items-center justify-center text-emerald-300 text-xl font-bold shadow-inner">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold">Formulir Permohonan Informasi Publik</h1>
                            <p class="text-emerald-100 text-xs md:text-sm mt-0.5">Silakan isi data diri dan rincian
                                informasi yang Anda butuhkan dengan benar.</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('public.permohonan.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-6 md:p-8 space-y-6">
                    @csrf

                    <h2 class="text-sm font-bold uppercase tracking-wider text-emerald-800 border-b pb-2">1. Identitas
                        Pemohon</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                placeholder="Sesuai KTP"
                                class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">NIK <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nik" value="{{ old('nik') }}" required
                                placeholder="Nomor Induk Kependudukan" maxlength="20"
                                class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Alamat Lengkap <span
                                class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="3" required placeholder="Alamat domisili saat ini"
                            class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">No. Telepon / WhatsApp <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" required
                                placeholder="08xxxxxxxxxx"
                                class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Email Aktif <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="contoh@email.com"
                                class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Pekerjaan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required
                                placeholder="PNS / Swasta / Petani / Mahasiswa"
                                class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Kategori Pemohon <span
                                class="text-red-500">*</span></label>
                        <select name="kategori_permohonan" required
                            class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition bg-white">
                            <option value="">-- Pilih Kategori Pemohon --</option>
                            <option value="perorangan" {{ old('kategori_permohonan') == 'perorangan' ? 'selected' : '' }}>
                                Perorangan</option>
                            <option value="organisasi" {{ old('kategori_permohonan') == 'organisasi' ? 'selected' : '' }}>
                                Organisasi / Kelompok</option>
                            <option value="pelajar" {{ old('kategori_permohonan') == 'pelajar' ? 'selected' : '' }}>Pelajar
                                / Mahasiswa</option>
                        </select>
                    </div>

                    <hr class="border-gray-100 pt-2">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-emerald-800">2. Rincian Informasi &
                        Penggunaan</h2>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Rincian Informasi Yang
                            Dibutuhkan <span class="text-red-500">*</span></label>
                        <textarea name="rincian_informasi" rows="4" required
                            placeholder="Jelaskan secara spesifik dokumen atau data informasi yang ingin Anda minta..."
                            class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">{{ old('rincian_informasi') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Tujuan Penggunaan Informasi
                            <span class="text-red-500">*</span></label>
                        <textarea name="tujuan_penggunaan" rows="3" required
                            placeholder="Untuk keperluan apa informasi ini akan digunakan..."
                            class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">{{ old('tujuan_penggunaan') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Cara Memperoleh Salinan
                            Informasi <span class="text-red-500">*</span></label>
                        <select name="cara_memperoleh" required
                            class="w-full p-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition bg-white">
                            <option value="">-- Pilih Cara Memperoleh --</option>
                            <option value="ambil langsung"
                                {{ old('cara_memperoleh') == 'ambil langsung' ? 'selected' : '' }}>Mengambil Langsung
                            </option>
                            <option value="email" {{ old('cara_memperoleh') == 'email' ? 'selected' : '' }}>Email
                                (Elektronik)</option>
                            <option value="kurir" {{ old('cara_memperoleh') == 'kurir' ? 'selected' : '' }}>Kurir</option>
                            <option value="pos" {{ old('cara_memperoleh') == 'pos' ? 'selected' : '' }}>Pos</option>
                            <option value="fax" {{ old('cara_memperoleh') == 'fax' ? 'selected' : '' }}>Faksimili (Fax)
                            </option>
                        </select>
                    </div>

                    <hr class="border-gray-100 pt-2">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-emerald-800">3. Berkas Lampiran</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Upload Foto KTP <span
                                    class="text-red-500">*</span></label>
                            <input type="file" name="foto_ktp" accept=".jpg,.jpeg,.png" required
                                class="w-full text-sm file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:bg-emerald-50 file:text-emerald-700 file:font-semibold hover:file:bg-emerald-100 border border-gray-300 rounded-xl p-1.5 transition">
                            <p class="text-[11px] text-gray-400 mt-1.5">Format: JPG, PNG (Maksimal 2 MB)</p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 uppercase mb-2">Berkas Pendukung
                                (Opsional)</label>
                            <input type="file" name="berkas_pendukung" accept=".pdf,.doc,.docx"
                                class="w-full text-sm file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:bg-gray-100 file:text-gray-700 file:font-semibold hover:file:bg-gray-200 border border-gray-300 rounded-xl p-1.5 transition">
                            <p class="text-[11px] text-gray-400 mt-1.5">Format: PDF, Word (Maksimal 5 MB)</p>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end">
                        <button type="submit"
                            class="px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center gap-2">
                            <i class="fas fa-paper-plane"></i> Kirim Permohonan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
