@extends('layouts.admin')
@section('title', 'Manajemen Galeri')
@section('header', 'Manajemen Galeri')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Dokumentasi</p>
                <h3 class="text-base font-semibold text-[#4A3728]">Manajemen Galeri &amp; Publikasi</h3>
            </div>
            <button onclick="toggleModal('modalTambahGaleri')"
                class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors shadow-sm">
                <i class="fas fa-plus mr-2 text-xs"></i> Tambah Data
            </button>
        </div>

        @if (session('success'))
            <div class="flex items-center p-4 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm">
                <i class="fas fa-check-circle text-lg text-[#3C7245] mr-3"></i>
                <p class="text-sm text-[#234D2C]">{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 bg-red-50 border-l-4 border-red-400 text-red-700 rounded-r-xl">
                <ul class="list-disc pl-5 text-sm space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- LIST GALERI --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl overflow-hidden">
            @forelse($galeri as $g)
                @php $ext = pathinfo($g->file, PATHINFO_EXTENSION); @endphp
                <div
                    class="flex items-center gap-4 px-5 py-4 {{ !$loop->last ? 'border-b border-[#E7E1D2]' : '' }} hover:bg-[#F6F2E6]/50 transition-colors">

                    @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
                        <img src="{{ asset('storage/galeri/' . $g->file) }}"
                            class="h-14 w-20 object-cover rounded-lg border border-[#E7E1D2] flex-shrink-0">
                    @else
                        <div
                            class="h-14 w-20 flex items-center justify-center bg-[#F6F2E6] text-[#C68A2E] rounded-lg border border-[#E7E1D2] flex-shrink-0">
                            <i class="fas fa-file-{{ strtolower($ext) == 'pdf' ? 'pdf' : 'alt' }} text-lg"></i>
                        </div>
                    @endif

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1 flex-wrap">
                            <p class="text-sm font-semibold text-[#4A3728] truncate">{{ $g->kegiatan }}</p>
                            <span
                                class="bg-[#F6F2E6] text-[#234D2C] text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wide flex-shrink-0">
                                {{ $g->kategori }}
                            </span>
                        </div>
                        <div class="flex items-center gap-x-3 text-xs text-gray-400">
                            <span class="inline-flex items-center">
                                <i class="fas fa-calendar mr-1.5 text-[#C68A2E]"></i>{{ $g->created_at->format('d/m/Y') }}
                            </span>
                            @if ($g->deskripsi)
                                <span class="truncate max-w-[220px]" title="{{ $g->deskripsi }}">{{ $g->deskripsi }}</span>
                            @endif
                        </div>
                    </div>

                    <a href="{{ asset('storage/galeri/' . $g->file) }}" target="_blank"
                        class="hidden sm:inline-flex items-center text-xs font-semibold text-[#234D2C] hover:text-[#17331D] flex-shrink-0">
                        <i class="fas fa-eye mr-1.5"></i> Lihat
                    </a>

                    <button type="button"
                        onclick="editGaleri({{ $g->id }}, '{{ addslashes($g->kegiatan) }}', '{{ $g->kategori }}', '{{ addslashes($g->deskripsi) }}')"
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-[#F6F2E6] hover:text-[#234D2C] transition-colors flex-shrink-0">
                        <i class="fas fa-edit text-sm"></i>
                    </button>

                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST"
                        onsubmit="return confirm('Hapus?')" class="flex-shrink-0">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-14 text-gray-400">
                    <i class="fas fa-images fa-2x mb-3"></i>
                    <p class="text-sm">Belum ada data.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div id="modalTambahGaleri" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-[#E7E1D2] bg-[#F6F2E6] flex justify-between items-center">
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-0.5">Publikasi Baru</p>
                    <h3 class="font-semibold text-sm text-[#4A3728]">Tambah Data Galeri</h3>
                </div>
                <button type="button" onclick="toggleModal('modalTambahGaleri')"
                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">&times;</button>
            </div>

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Judul <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="kegiatan" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Kategori <span
                                class="text-red-500">*</span></label>
                        <select id="tambah-kategori" name="kategori" required onchange="toggleVideoInput('tambah')"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]">
                            <option value="">Pilih</option>
                            <option value="foto">Foto</option>
                            <option value="artikel">Artikel</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div>
                        <label id="label-deskripsi-tambah"
                            class="block text-xs font-bold text-gray-500 uppercase mb-1">Deskripsi</label>
                        <textarea id="tambah-deskripsi" name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">File <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="file" accept=".jpeg, .png, .jpg, .pdf, .doc, .docx" required
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modalTambahGaleri')"
                        class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">Batal</button>
                    <button type="submit"
                        class="bg-[#234D2C] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#17331D] shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="modalEditGaleri" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-[#E7E1D2] bg-[#F6F2E6] flex justify-between items-center">
                <div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-0.5">Perbarui</p>
                    <h3 class="font-semibold text-sm text-[#4A3728]">Ubah Data Galeri</h3>
                </div>
                <button type="button" onclick="toggleModal('modalEditGaleri')"
                    class="text-gray-400 hover:text-gray-600 text-xl leading-none">&times;</button>
            </div>

            <form id="formEditGaleri" action="" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Judul</label>
                        <input type="text" id="edit-kegiatan" name="kegiatan" required
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Kategori</label>
                        <select id="edit-kategori" name="kategori" required onchange="toggleVideoInput('edit')"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]">
                            <option value="foto">Foto</option>
                            <option value="artikel">Artikel</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div>
                        <label id="label-deskripsi-edit"
                            class="block text-xs font-bold text-gray-500 uppercase mb-1">Deskripsi</label>
                        <textarea id="edit-deskripsi" name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-2.5 text-sm outline-none focus:ring-2 focus:ring-[#234D2C]"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ganti File</label>
                        <input type="file" name="file" accept=".jpeg, .png, .jpg, .pdf, .doc, .docx"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modalEditGaleri')"
                        class="bg-gray-100 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">Batal</button>
                    <button type="submit"
                        class="bg-[#234D2C] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#17331D] shadow-md">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function toggleVideoInput(mode) {
            const kat = document.getElementById(mode + '-kategori').value;
            const label = document.getElementById('label-deskripsi-' + mode);
            const input = document.getElementById(mode + '-deskripsi');
            if (kat === 'video') {
                label.innerHTML = 'Link Video (URL) <span class="text-red-500">*</span>';
                input.placeholder = 'Contoh: https://youtube.com/watch?v=...';
            } else {
                label.innerHTML = 'Deskripsi Singkat';
                input.placeholder = 'Masukkan deskripsi...';
            }
        }

        function editGaleri(id, kegiatan, kategori, deskripsi) {
            const form = document.getElementById('formEditGaleri');
            form.action = '/admin/galeri/' + id;
            document.getElementById('edit-kegiatan').value = kegiatan;
            document.getElementById('edit-kategori').value = kategori;
            document.getElementById('edit-deskripsi').value = deskripsi;
            toggleVideoInput('edit');
            toggleModal('modalEditGaleri');
        }
    </script>
@endsection
