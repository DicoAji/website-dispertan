@extends('layouts.admin')
@section('title', 'Berita')
@section('header', 'Berita')


@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        @if (session('success'))
            <div class="flex items-center p-4 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm">
                <i class="fas fa-check-circle text-lg text-[#3C7245] mr-3"></i>
                <p class="text-sm text-[#234D2C]">{{ session('success') }}</p>
            </div>
        @endif

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Publikasi</p>
                <h3 class="text-base font-semibold text-[#4A3728]">Manajemen Berita</h3>
            </div>
            <button onclick="toggleModal('modalTambahBerita')"
                class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors shadow-sm">
                <i class="fas fa-plus mr-2 text-xs"></i> Tulis Berita
            </button>
        </div>

        {{-- LIST BERITA --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl overflow-hidden">
            @forelse($berita as $b)
                <div
                    class="flex items-center gap-4 px-5 py-4 {{ !$loop->last ? 'border-b border-[#E7E1D2]' : '' }} hover:bg-[#F6F2E6]/50 transition-colors">
                    <img src="{{ asset('storage/berita/' . $b->foto_berita) }}"
                        class="h-14 w-20 object-cover rounded-lg border border-[#E7E1D2] flex-shrink-0">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-[#4A3728] truncate">{{ $b->judul }}</p>
                        <div class="flex items-center text-xs text-gray-400 mt-1">
                            <i class="fas fa-calendar-days mr-1.5 text-[#C68A2E]"></i>
                            {{ \Carbon\Carbon::parse($b->tanggal_berita)->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <form action="{{ route('berita.destroy', $b->id) }}" method="POST"
                        onsubmit="return confirm('Hapus berita ini?')" class="flex-shrink-0">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-14 text-gray-400">
                    <i class="fas fa-newspaper fa-2x mb-3"></i>
                    <p class="text-sm">Belum ada berita yang dipublikasikan</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- MODAL TAMBAH BERITA --}}
    <div id="modalTambahBerita" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-6">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-1">Publikasi Baru</p>
                        <h3 class="text-base font-semibold text-[#4A3728]">Buat Berita Baru</h3>
                    </div>
                    <button type="button" onclick="toggleModal('modalTambahBerita')"
                        class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Judul Berita</label>
                            <input type="text" name="judul" placeholder="Judul Berita" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Tanggal Berita</label>
                            <input type="date" name="tanggal_berita" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Isi Berita</label>
                            <textarea name="deskripsi" placeholder="Isi Berita Lengkap..." rows="5" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none"></textarea>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-xs font-bold text-gray-500 uppercase mb-1">Foto Berita</label>
                            <input type="file" name="foto_berita"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Ukuran file maksimal 5 MB</p>

                            {{-- Menampilkan pesan error jika validasi gagal --}}
                            @error('foto_berita')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3 border-t pt-5">
                        <button type="button" onclick="toggleModal('modalTambahBerita')"
                            class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-200 transition">Batal</button>
                        <button type="submit"
                            class="px-5 py-2.5 rounded-lg text-sm font-bold shadow-lg transition bg-[#234D2C] text-white hover:bg-[#17331D]">Simpan
                            Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }
    </script>
@endsection
