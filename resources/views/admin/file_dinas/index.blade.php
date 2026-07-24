@extends('layouts.admin')

@section('title', 'Dokumen')
@section('header', 'Dokumen Dinas Pertanian')

@section('content')
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-lg border border-red-200">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Arsip Kedinasan</p>
                <h3 class="text-base font-semibold text-[#4A3728]">Manajemen File Dinas</h3>
            </div>
            <button onclick="toggleModal('modal-tambah')"
                class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors shadow-sm">
                <i class="fas fa-plus mr-2 text-xs"></i> Tambah File
            </button>
        </div>

        {{-- LIST DOKUMEN --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl overflow-hidden">
            @forelse($files as $index => $f)
                <div
                    class="flex items-center gap-4 px-5 py-4 {{ !$loop->last ? 'border-b border-[#E7E1D2]' : '' }} hover:bg-[#F6F2E6]/50 transition-colors">
                    <div
                        class="w-10 h-10 rounded-lg bg-[#F6F2E6] text-[#C68A2E] flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-pdf"></i>
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-[#4A3728] truncate">{{ $f->uraian }}</p>
                        <div class="flex items-center flex-wrap gap-x-3 gap-y-1 mt-1">
                            <span class="inline-flex items-center text-xs text-gray-400">
                                <i class="fas fa-calendar mr-1.5 text-[#C68A2E]"></i>{{ $f->tahun }}
                            </span>
                            <span
                                class="bg-[#F6F2E6] text-[#234D2C] text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wide">
                                {{ $f->kategori }}
                            </span>
                        </div>
                    </div>

                    <a href="{{ asset('storage/dokumen/' . $f->file) }}" target="_blank"
                        class="hidden sm:inline-flex items-center text-xs font-semibold text-[#234D2C] hover:text-[#17331D] flex-shrink-0">
                        <i class="fas fa-eye mr-1.5"></i> Lihat PDF
                    </a>

                    {{-- Tombol Edit --}}
                    <button
                        onclick="editFileDinas({{ $f->id }}, '{{ $f->uraian }}', '{{ $f->file }}', '{{ $f->tahun }}', '{{ $f->kategori }}')"
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-[#F6F2E6] hover:text-[#234D2C] transition-colors flex-shrink-0">
                        <i class="fas fa-edit text-sm"></i>
                    </button>

                    {{-- Tombol Hapus (Tambahkan ini) --}}
                    <form action="{{ route('file_dinas.destroy', $f->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')" class="flex-shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-14 text-gray-400">
                    <i class="fas fa-folder-open fa-2x mb-3"></i>
                    <p class="text-sm">Data belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <div id="modal-tambah" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="px-6 py-4 border-b border-[#E7E1D2] bg-[#F6F2E6] flex justify-between items-center">
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-0.5">Arsip Baru</p>
                    <h3 class="font-semibold text-sm text-[#4A3728]">Unggah File Dinas</h3>
                </div>
                <button onclick="toggleModal('modal-tambah')"
                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">&times;</button>
            </div>

            <form action="{{ route('file_dinas.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Uraian Dokumen</label>
                        <textarea name="uraian" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"
                            required></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Tahun</label>
                            <input type="number" name="tahun" value="{{ date('Y') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"
                                required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Kategori</label>
                            <input type="text" name="kategori" placeholder="Contoh: SOP"
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"
                                required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">File (PDF)</label>
                        <input type="file" name="file" accept=".pdf" required
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-tambah')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-semibold">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-[#234D2C] text-white rounded-lg hover:bg-[#17331D] shadow-md text-sm font-semibold">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="modal-edit" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <div class="px-6 py-4 border-b border-[#E7E1D2] bg-[#F6F2E6] flex justify-between items-center">
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-0.5">Perbarui</p>
                    <h3 class="font-semibold text-sm text-[#4A3728]">Ubah Uraian Dokumen</h3>
                </div>
                <button onclick="toggleModal('modal-edit')"
                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">&times;</button>
            </div>

            <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Uraian Dokumen</label>
                        <textarea id="edit-uraian" name="uraian" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"
                            required></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Tahun</label>
                            <input type="number" id="edit-tahun" name="tahun"
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"
                                required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Kategori</label>
                            <input type="text" id="edit-kategori" name="kategori"
                                class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"
                                required>
                        </div>
                    </div>

                    {{-- Bagian Menampilkan File Sebelumnya --}}
                    <div id="preview-file-lama" class="p-3 bg-[#F6F2E6] rounded-lg border border-[#E4DAC0] hidden">
                        <p class="text-[10px] font-bold text-[#234D2C] uppercase mb-1">File Saat Ini:</p>
                        <a id="link-file-lama" href="#" target="_blank"
                            class="text-xs text-[#234D2C] hover:underline flex items-center">
                            <i class="fas fa-file-pdf mr-2 text-[#C68A2E]"></i>
                        </a>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ganti File (opsional)</label>
                        <input type="file" name="file" accept=".pdf"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                        <p class="text-[10px] text-gray-400 mt-1 italic">*Biarkan kosong jika tidak ingin mengubah file PDF
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-edit')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-semibold">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-[#234D2C] text-white rounded-lg hover:bg-[#17331D] shadow-md text-sm font-semibold">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                // Sedikit delay agar transisi CSS (jika ada) bisa berjalan
                setTimeout(() => {
                    modal.classList.add('opacity-100');
                }, 10);
            } else {
                modal.classList.add('hidden');
            }
        }

        function editFileDinas(id, uraian, fileName, tahun, kategori) { // Pastikan parameter tahun & kategori ada
            const form = document.getElementById('form-edit');
            const textarea = document.getElementById('edit-uraian');
            const inputTahun = document.getElementById('edit-tahun'); // Ini targetnya
            const inputKategori = document.getElementById('edit-kategori'); // Ini targetnya
            const previewContainer = document.getElementById('preview-file-lama');
            const linkPreview = document.getElementById('link-file-lama');

            form.action = '/admin/file-dinas/' + id;
            textarea.value = uraian;

            // PERBAIKAN: Masukkan data ke input
            inputTahun.value = tahun;
            inputKategori.value = kategori;

            if (fileName) {
                previewContainer.classList.remove('hidden');
                linkPreview.href = '/storage/dokumen/' + fileName;
                linkPreview.innerText = fileName;
            } else {
                previewContainer.classList.add('hidden');
            }

            toggleModal('modal-edit');
        }
    </script>
@endsection
