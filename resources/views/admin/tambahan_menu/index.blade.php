@extends('layouts.admin')
@section('title', 'Tambahan Menu')
@section('header', 'Tambahan Menu')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Navigasi Situs</p>
                <h3 class="text-base font-semibold text-[#4A3728]">Daftar Menu Tambahan</h3>
            </div>
            <button onclick="toggleModal('modalTambahMenu')"
                class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors shadow-sm">
                <i class="fas fa-plus mr-2 text-xs"></i> Tambah Menu
            </button>
        </div>

        @if (session('success'))
            <div class="flex items-center p-4 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm">
                <i class="fas fa-check-circle text-lg text-[#3C7245] mr-3"></i>
                <p class="text-sm text-[#234D2C]">{{ session('success') }}</p>
            </div>
        @endif

        {{-- LIST MENU --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl overflow-hidden">
            @forelse($menus as $m)
                <div
                    class="flex items-center gap-4 px-5 py-4 {{ !$loop->last ? 'border-b border-[#E7E1D2]' : '' }} hover:bg-[#F6F2E6]/50 transition-colors">

                    <div
                        class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bars"></i>
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-[#4A3728] truncate">{{ $m->menu }}</p>
                        <div class="mt-1">
                            @if ($m->link)
                                <span class="inline-flex items-center text-xs text-[#3C7245] italic truncate max-w-full">
                                    <i class="fas fa-link mr-1.5"></i>{{ $m->link }}
                                </span>
                            @elseif($m->file)
                                <span class="inline-flex items-center text-xs text-[#C68A2E] font-medium">
                                    <i class="fas fa-file-pdf mr-1.5"></i>{{ $m->file }}
                                </span>
                            @else
                                <span class="text-xs text-gray-400">-</span>
                            @endif
                        </div>
                    </div>

                    <form action="{{ route('admin.tambahan_menu.destroy', $m->id) }}" method="POST"
                        onsubmit="return confirm('Hapus menu ini?')" class="flex-shrink-0">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-14 text-gray-400">
                    <i class="fas fa-bars fa-2x mb-3"></i>
                    <p class="text-sm">Belum ada menu tambahan.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Modal Tambah Menu --}}
    <div id="modalTambahMenu" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-1">Navigasi Baru</p>
                        <h3 class="text-base font-semibold text-[#4A3728]">Tambah Menu Baru</h3>
                    </div>
                    <button type="button" onclick="toggleModal('modalTambahMenu')"
                        class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

                <form action="{{ route('admin.tambahan_menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Menu</label>
                            <input type="text" name="menu" placeholder="Contoh: Dokumen Kerja" required
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link Eksternal
                                (Opsional)</label>
                            <input type="url" name="link" placeholder="https://google.com/..."
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]">
                            <p class="text-[10px] text-gray-400 mt-1">*Kosongkan jika ingin menggunakan upload file.</p>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Atau Upload File
                                (Opsional)</label>
                            <input type="file" name="file"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                            <p class="text-[10px] text-red-500 mt-1">*Gunakan salah satu: Link atau File.</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3 border-t pt-5">
                        <button type="button" onclick="toggleModal('modalTambahMenu')"
                            class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">Batal</button>
                        <button type="submit"
                            class="bg-[#234D2C] text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-[#17331D] shadow-md">Simpan
                            Menu</button>
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
