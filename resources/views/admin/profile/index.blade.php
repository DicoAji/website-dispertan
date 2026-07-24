@extends('layouts.admin')

@section('title', 'Profil Dinas')
@section('header', 'Profil Dinas Pertanian')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        @if (session('success'))
            <div id="notif-success"
                class="flex items-center p-4 mb-2 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm transition-opacity duration-500">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-xl text-[#3C7245]"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-bold text-[#17331D]">Berhasil!</p>
                    <p class="text-xs text-[#234D2C]">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-auto text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        {{-- HERO --}}
        <div
            class="rounded-2xl overflow-hidden shadow-lg relative bg-gradient-to-br from-[#17331D] via-[#234D2C] to-[#3C7245]">
            <i class="fas fa-wheat-awn absolute text-white/10 text-[90px] -right-3 -top-4 rotate-[18deg]"></i>
            <div class="relative p-6 md:p-8">
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#E8C077] mb-2">
                    Profil Organisasi Perangkat Daerah
                </p>
                <h2 class="text-white text-xl md:text-2xl font-semibold mb-5 max-w-xl">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian' }}
                </h2>

                <div class="flex flex-wrap gap-x-8 gap-y-3 mb-6">
                    <div class="flex items-center text-white/90 text-sm">
                        <i class="fas fa-envelope mr-2 text-[#E8C077]"></i>
                        {{ $profile->email }}
                    </div>
                    <div class="flex items-center text-white/90 text-sm">
                        <i class="fas fa-phone mr-2 text-[#E8C077]"></i>
                        {{ $profile->telp }}
                    </div>
                    <div class="flex items-center text-white/90 text-sm max-w-sm">
                        <i class="fas fa-location-dot mr-2 flex-shrink-0 text-[#E8C077]"></i>
                        {{ $profile->alamat }}
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ $profile->facebook }}" target="_blank"
                        class="flex items-center justify-center w-9 h-9 rounded-full bg-white/15 text-white hover:bg-white/25 hover:-translate-y-0.5 transition-all">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="{{ $profile->instagram }}" target="_blank"
                        class="flex items-center justify-center w-9 h-9 rounded-full bg-white/15 text-white hover:bg-white/25 hover:-translate-y-0.5 transition-all">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="{{ $profile->youtube }}" target="_blank"
                        class="flex items-center justify-center w-9 h-9 rounded-full bg-white/15 text-white hover:bg-white/25 hover:-translate-y-0.5 transition-all">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- SEJARAH --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl p-6">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-book-open"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Rekam Jejak</p>
                    <h3 class="text-base font-semibold text-[#4A3728]">Sejarah</h3>
                </div>
            </div>
            <div class="h-[3px] w-12 rounded-full bg-gradient-to-r from-[#C68A2E] to-[#E8C077] mb-5"></div>
            <div class="text-gray-600 leading-relaxed text-sm pl-[54px]">
                @if ($profile->sejarah)
                    {!! nl2br($profile->sejarah) !!}
                @else
                    <p class="text-gray-400 italic">Uraian sejarah belum diisi</p>
                @endif
            </div>
        </div>

        {{-- VISI --}}
        <div class="bg-[#F6F2E6] border border-[#E4DAC0] rounded-2xl p-6 relative overflow-hidden">
            <i class="fas fa-seedling absolute text-[70px] -right-2 -bottom-3 text-[#234D2C]/10"></i>
            <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-2">Arah Pembangunan</p>
            <div class="relative">
                <span class="text-4xl text-[#E8C077] leading-none absolute -left-2 -top-4">&ldquo;</span>
                <p class="italic leading-relaxed text-sm md:text-base pl-7 pr-4 text-[#4A3728]">
                    {{ $profile->visi }}
                </p>
            </div>
        </div>

        {{-- MISI --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl p-6">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-list-check"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Langkah Strategis</p>
                    <h3 class="text-base font-semibold text-[#4A3728]">Misi</h3>
                </div>
            </div>
            <div class="h-[3px] w-12 rounded-full bg-gradient-to-r from-[#C68A2E] to-[#E8C077] mb-5"></div>
            <div class="text-gray-600 leading-relaxed text-sm pl-[54px]">
                {!! nl2br($profile->misi) !!}
            </div>
        </div>

        {{-- STRUKTUR ORGANISASI, MAKLUMAT PELAYANAN  (1 BARIS) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
            {{-- STRUKTUR ORGANISASI --}}
            <div class="bg-white border border-[#E7E1D2] rounded-2xl p-6 h-full">
                <div class="flex items-center space-x-3 mb-2">
                    <div
                        class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Susunan Kelembagaan</p>
                        <h3 class="text-sm font-semibold text-[#4A3728]">Struktur Organisasi</h3>
                    </div>
                </div>
                <div class="h-[3px] w-12 rounded-full bg-gradient-to-r from-[#C68A2E] to-[#E8C077] mb-6"></div>
                <div class="bg-[#F6F2E6] rounded-xl p-4 flex justify-center overflow-hidden">
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

            {{-- MAKLUMAT PELAYANAN --}}
            <div class="bg-white border border-[#E7E1D2] rounded-2xl p-6 h-full">
                <div class="flex items-center space-x-3 mb-2">
                    <div
                        class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-scroll"></i>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Komitmen Layanan</p>
                        <h3 class="text-sm font-semibold text-[#4A3728]">Maklumat Pelayanan</h3>
                    </div>
                </div>
                <div class="h-[3px] w-12 rounded-full bg-gradient-to-r from-[#C68A2E] to-[#E8C077] mb-6"></div>
                <div class="bg-[#F6F2E6] rounded-xl p-4 flex justify-center overflow-hidden">
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

        {{-- TUGAS DAN FUNGSI (1 BARIS: KIRI FILE, KANAN URAIAN) --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl p-6">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-file-contract"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Kewenangan</p>
                    <h3 class="text-sm font-semibold text-[#4A3728]">Tugas dan Fungsi</h3>
                </div>
            </div>
            <div class="h-[3px] w-12 rounded-full bg-gradient-to-r from-[#C68A2E] to-[#E8C077] mb-6"></div>

            <div class="flex flex-col md:flex-row gap-6 items-start">
                {{-- KIRI: FILE / IKON --}}
                <div class="w-full md:w-48 flex-shrink-0">
                    <div class="bg-[#F6F2E6] rounded-xl p-6 flex flex-col items-center justify-center text-center h-full">
                        @if ($profile->tugas_fungsi)
                            <i class="fas fa-file-pdf fa-3x mb-3 text-[#C68A2E]"></i>
                            <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}" target="_blank"
                                class="inline-flex items-center px-4 py-1.5 rounded-lg font-bold text-xs bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors">
                                <i class="fas fa-external-link-alt mr-2"></i> Buka Dokumen
                            </a>
                        @else
                            <i class="fas fa-file-circle-xmark fa-3x mb-2 text-gray-300"></i>
                            <p class="text-xs text-gray-400">Belum diunggah</p>
                        @endif
                    </div>
                </div>

                {{-- KANAN: URAIAN --}}
                <div class="flex-1">
                    @if ($profile->narasi_tugas_fungsi)
                        <div class="text-gray-600 leading-relaxed text-sm">
                            {!! nl2br($profile->narasi_tugas_fungsi) !!}
                        </div>
                    @else
                        <p class="text-gray-400 italic text-sm">Uraian tugas dan fungsi belum diisi</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-2">
            <button onclick="toggleModal('modalEditProfile')"
                class="px-8 py-3 rounded-xl font-bold shadow-lg flex items-center bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors">
                <i class="fas fa-edit mr-2"></i> Perbarui Data Profil
            </button>
        </div>
    </div>

    {{-- MODAL EDIT PROFILE --}}
    <div id="modalEditProfile" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-6 transform transition-all">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-1">Perbarui</p>
                        <h3 class="text-base font-semibold text-[#4A3728]">Edit Profil Dinas</h3>
                    </div>
                    <button type="button" onclick="toggleModal('modalEditProfile')"
                        class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-h-[70vh] overflow-y-auto px-1 pb-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama OPD</label>
                            <input type="text" name="nama_opd" value="{{ $profile->nama_opd }}" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Sejarah</label>
                            <textarea name="sejarah" rows="6"
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-2 focus:ring-[#234D2C] focus:outline-none">{{ $profile->sejarah }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Visi</label>
                            <input type="text" name="visi" value="{{ $profile->visi }}" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Misi</label>
                            <textarea name="misi" rows="5" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-2 focus:ring-[#234D2C] focus:outline-none">{{ $profile->misi }}</textarea>
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

                        {{-- Input Narasi Tugas dan Fungsi --}}
                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Narasi Tugas dan
                                Fungsi</label>
                            <textarea name="narasi_tugas_fungsi" rows="4"
                                class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-2 focus:ring-[#234D2C] focus:outline-none">{{ $profile->narasi_tugas_fungsi }}</textarea>
                        </div>

                        {{-- Input PDF Tugas dan Fungsi --}}
                        <div class="md:col-span-2 mt-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Update File Tugas dan
                                Fungsi (PDF)</label>
                            @if ($profile->tugas_fungsi)
                                <div class="mb-2">
                                    <p class="text-[10px] font-bold mb-1 flex items-center text-[#234D2C]">
                                        <i class="fas fa-file-pdf mr-1 text-[#C68A2E]"></i> File saat ini:
                                        {{ $profile->tugas_fungsi }}
                                    </p>
                                    <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}"
                                        target="_blank"
                                        class="inline-block px-3 py-1 text-[10px] font-bold rounded hover:opacity-80 transition border bg-[#F6F2E6] text-[#234D2C] border-[#E4DAC0]">
                                        <i class="fas fa-external-link-alt mr-1"></i> Lihat Dokumen PDF
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="tugas_fungsi" accept=".pdf"
                                class="w-full text-sm pointer-events-auto text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Format: PDF. Maks: 5MB</p>
                        </div>

                        {{-- Input Gambar Maklumat Pelayanan --}}
                        <div class="md:col-span-2 border-t pt-4 mt-2">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Update Maklumat Pelayanan
                                (Gambar)</label>
                            @if ($profile->maklumat_layanan)
                                <div class="mb-2">
                                    <p class="text-[10px] font-bold mb-1 flex items-center text-[#234D2C]">
                                        <i class="fas fa-image mr-1"></i> File saat ini: {{ $profile->maklumat_layanan }}
                                    </p>
                                    <img src="{{ asset('storage/profil_dinas/' . $profile->maklumat_layanan) }}"
                                        alt="Preview Maklumat"
                                        class="h-20 w-auto rounded border border-gray-200 shadow-sm">
                                </div>
                            @endif
                            <input type="file" name="maklumat_layanan" accept="image/*"
                                class="w-full text-sm pointer-events-auto text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Format: JPG, PNG, JPEG.</p>
                        </div>


                    </div>

                    <div class="mt-8 flex justify-end space-x-3 border-t pt-5">
                        <button type="button" onclick="toggleModal('modalEditProfile')"
                            class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-200 transition">Batal</button>
                        <button type="submit"
                            class="px-5 py-2.5 rounded-lg text-sm font-bold shadow-lg transition bg-[#234D2C] text-white hover:bg-[#17331D]">Simpan
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

        // Auto-close notifikasi dalam 4 detik (opacity dikontrol via inline style, tanpa CSS tambahan)
        setTimeout(function() {
            let notif = document.getElementById('notif-success');
            if (notif) {
                notif.style.opacity = "0";
                setTimeout(() => notif.remove(), 500);
            }
        }, 4000);
    </script>
@endsection
