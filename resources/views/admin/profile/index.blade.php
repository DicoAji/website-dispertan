@extends('layouts.admin')

@section('title', 'Profil Dinas')
@section('header', 'Profil Dinas Pertanian')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        @if (session('success'))
            <div id="notif-success"
                class="flex items-center p-4 mb-6 bg-green-50 border-l-4 border-green-500 rounded-r-xl shadow-sm animate-fade-in">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-bold text-green-800">Berhasil!</p>
                    <p class="text-xs text-green-700">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-auto text-green-500 hover:text-green-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-green-700 p-8 text-white">
                <div class="flex items-center space-x-4">
                    <div class="bg-white p-3 rounded-xl shadow-inner flex items-center justify-center">
                        <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" alt="Logo Grobogan"
                            class="h-12 w-auto object-contain">
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold">{{ $profile->nama_opd }}</h2>
                        <p class="text-green-100 flex items-center italic">
                            <i class="fas fa-map-marker-alt mr-2"></i> Kabupaten Grobogan
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 space-y-4">
                    <h3 class="text-lg font-bold text-gray-800 border-b pb-2">Informasi Umum</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase">Email / Username</p>
                            <p class="text-gray-700 font-medium">{{ $profile->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-bold uppercase">Telepon</p>
                            <p class="text-gray-700 font-medium">{{ $profile->telp }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-xs text-gray-400 font-bold uppercase">Alamat Kantor</p>
                            <p class="text-gray-700 leading-relaxed">{{ $profile->alamat }}</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <h3 class="text-lg font-bold text-gray-800 border-b pb-2">Media Sosial</h3>
                    <div class="flex flex-col space-y-2">
                        <a href="{{ $profile->facebook }}" target="_blank"
                            class="flex items-center p-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 transition text-sm font-semibold">
                            <i class="fab fa-facebook-f w-6 text-center"></i> Facebook
                        </a>
                        <a href="{{ $profile->instagram }}" target="_blank"
                            class="flex items-center p-2 rounded-lg bg-pink-50 text-pink-700 hover:bg-pink-100 transition text-sm font-semibold">
                            <i class="fab fa-instagram w-6 text-center"></i> Instagram
                        </a>
                        <a href="{{ $profile->youtube }}" target="_blank"
                            class="flex items-center p-2 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 transition text-sm font-semibold">
                            <i class="fab fa-youtube w-6 text-center"></i> YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
            <div class="flex items-center space-x-3 mb-2">
                <div class="bg-orange-100 p-2 rounded-lg">
                    <i class="fas fa-lightbulb text-orange-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Visi</h3>
            </div>
            <p class="text-gray-600 italic leading-relaxed text-center py-2 text-lg">
                "{{ $profile->visi }}"
            </p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
            <div class="flex items-center space-x-3 mb-4">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <i class="fas fa-list-check text-blue-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Misi</h3>
            </div>
            <div class="text-gray-600 leading-relaxed text-sm">
                {!! nl2br($profile->misi) !!}
            </div>
        </div>


        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
            <div class="flex items-center space-x-3 mb-6">
                <div class="bg-purple-100 p-2 rounded-lg">
                    <i class="fas fa-sitemap text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Struktur Organisasi</h3>
            </div>
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex justify-center overflow-hidden">
                @if ($profile->struktur_organisasi)
                    <img src="{{ asset('storage/struktur_organisasi/' . $profile->struktur_organisasi) }}"
                        alt="Struktur Organisasi"
                        class="max-w-full h-auto rounded-lg shadow-md hover:scale-[1.01] transition-transform duration-300">
                @else
                    <div class="text-center py-10 text-gray-400">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <p>Foto struktur organisasi belum diunggah</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6  h-full items-center">
            <div class=" bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        {{-- Ikon dokumen yang sesuai dengan konteks Tugas dan Fungsi --}}
                        <i class="fas fa-file-contract text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Tugas dan Fungsi</h3>
                </div>

                <div
                    class="bg-gray-50 rounded-xl p-6 border border-gray-100 flex flex-col items-center justify-center text-center">
                    @if ($profile->tugas_fungsi)
                        {{-- Menampilkan ikon PDF besar karena file bukan format gambar --}}
                        <i class="fas fa-file-pdf text-red-500 fa-4x mb-4"></i>
                        <p class="text-sm font-medium text-gray-700 mb-4">Dokumen Tugas dan Fungsi tersedia dalam format PDF
                        </p>

                        {{-- Link untuk membuka file PDF dari folder profil_dinas --}}
                        <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}" target="_blank"
                            class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md font-bold text-sm">
                            <i class="fas fa-external-link-alt mr-2"></i> Buka Dokumen PDF
                        </a>
                    @else
                        <div class="text-center py-10 text-gray-400">
                            <i class="fas fa-file-circle-xmark fa-3x mb-3"></i>
                            <p>Dokumen tugas dan fungsi belum diunggah</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class=" bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-green-100 p-2 rounded-lg">
                        <i class="fas fa-scroll text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Maklumat Pelayanan</h3>
                </div>

                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex justify-center overflow-hidden">
                    @if ($profile->maklumat_layanan)
                        <img src="{{ asset('storage/profil_dinas/' . $profile->maklumat_layanan) }}"
                            alt="Maklumat Pelayanan"
                            class="max-w-full h-auto rounded-lg shadow-md hover:scale-[1.01] transition-transform duration-300">
                    @else
                        <div class="text-center py-10 text-gray-400">
                            <i class="fas fa-image fa-3x mb-3"></i>
                            <p>Gambar maklumat pelayanan belum diunggah</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="flex justify-end pt-4">
            <button onclick="toggleModal('modalEditProfile')"
                class="bg-green-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-green-700 transition shadow-lg shadow-green-200 flex items-center">
                <i class="fas fa-edit mr-2"></i> Perbarui Data Profil
            </button>
        </div>
    </div>

    <div id="modalEditProfile" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl p-6 transform transition-all">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <h3 class="text-xl font-bold text-gray-800">Edit Profil Dinas</h3>
                    <button onclick="toggleModal('modalEditProfile')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-[70vh] overflow-y-auto px-1">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama OPD</label>
                            <input type="text" name="nama_opd" value="{{ $profile->nama_opd }}" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-green-500">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Visi</label>
                            <input type="text" name="visi" value="{{ $profile->visi }}" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-green-500">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Misi</label>
                            <textarea name="misi" rows="5" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-green-500">{{ $profile->misi }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Email / Username</label>
                            <input type="text" name="email" value="{{ $profile->email }}" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Telepon</label>
                            <input type="text" name="telp" value="{{ $profile->telp }}" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Alamat Kantor</label>
                            <textarea name="alamat" rows="2" required class="w-full rounded-lg border-gray-300 p-2.5 border">{{ $profile->alamat }}</textarea>
                        </div>
                        {{-- <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Foto Struktur
                                Organisasi</label>
                            <input type="file" name="struktur_organisasi"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700 border rounded-lg p-1">
                        </div> --}}
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link Facebook</label>
                            <input type="url" name="facebook" value="{{ $profile->facebook }}"
                                class="w-full rounded-lg border-gray-300 p-2.5 border">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link Instagram</label>
                            <input type="url" name="instagram" value="{{ $profile->instagram }}"
                                class="w-full rounded-lg border-gray-300 p-2.5 border">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link YouTube</label>
                            <input type="url" name="youtube" value="{{ $profile->youtube }}"
                                class="w-full rounded-lg border-gray-300 p-2.5 border">
                        </div>
                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Update Tugas dan Fungsi
                                (PDF)</label>

                            {{-- Menampilkan Status File Saat Ini dari storage/profil_dinas --}}
                            @if ($profile->tugas_fungsi)
                                <div class="mb-2">
                                    <p class="text-[10px] text-blue-600 font-bold mb-1 flex items-center">
                                        <i class="fas fa-file-pdf mr-1 text-red-500"></i> File saat ini:
                                        {{ $profile->tugas_fungsi }}
                                    </p>
                                    <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}"
                                        target="_blank"
                                        class="inline-block px-3 py-1 bg-blue-50 text-blue-700 text-[10px] font-bold rounded hover:bg-blue-100 transition border border-blue-200">
                                        <i class="fas fa-external-link-alt mr-1"></i> Lihat Dokumen PDF
                                    </a>
                                </div>
                            @endif

                            <input type="file" name="tugas_fungsi" accept=".pdf"
                                class="w-full text-sm pointer-events-auto text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 border rounded-lg p-1">
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Format: PDF. Maks: 5MB</p>
                        </div>
                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Update Maklumat Pelayanan
                                (Gambar)</label>

                            {{-- Menampilkan Preview File Saat Ini dari storage/profil_dinas --}}
                            @if ($profile->maklumat_layanan)
                                <div class="mb-2">
                                    <p class="text-[10px] text-green-600 font-bold mb-1 flex items-center">
                                        <i class="fas fa-image mr-1"></i> File saat ini: {{ $profile->maklumat_layanan }}
                                    </p>
                                    <img src="{{ asset('storage/profil_dinas/' . $profile->maklumat_layanan) }}"
                                        alt="Preview Maklumat"
                                        class="h-20 w-auto rounded border border-gray-200 shadow-sm">
                                </div>
                            @endif

                            <input type="file" name="maklumat_layanan" accept="image/*"
                                class="w-full text-sm pointer-events-auto text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-50 file:text-green-700 border rounded-lg p-1">
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Format: JPG, PNG, JPEG. </p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3 border-t pt-5">
                        <button type="button" onclick="toggleModal('modalEditProfile')"
                            class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-200 transition">Batal</button>
                        <button type="submit"
                            class="bg-green-600 text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-green-700 shadow-lg transition">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk Buka/Tutup Modal
        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        // Auto-close notifikasi dalam 4 detik
        setTimeout(function() {
            let notif = document.getElementById('notif-success');
            if (notif) {
                notif.style.transition = "opacity 0.5s";
                notif.style.opacity = "0";
                setTimeout(() => notif.remove(), 500);
            }
        }, 4000);
    </script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.4s ease-out forwards;
        }
    </style>
@endsection
