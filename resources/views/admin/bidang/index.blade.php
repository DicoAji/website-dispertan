@extends('layouts.admin')

@section('title', 'Bidang')
@section('header', 'Manajemen Data Bidang')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Bidang</h2>
            <button onclick="toggleModal('modal-tambah')"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 shadow-md flex items-center gap-2 transition-colors">
                <i class="fa-solid fa-plus"></i> Tambah Data Bidang
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">ID</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Uraian</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Deskripsi</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Lampiran</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bidang as $b)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $b->id }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-normal min-w-[200px]">
                                    {{ $b->uraian }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-normal min-w-[250px]">
                                    {{ Str::limit($b->deskripsi, 50, '...') }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                        {{ $b->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-col gap-2">
                                        @if ($b->file)
                                            <a href="{{ asset('storage/' . $b->file) }}" target="_blank"
                                                class="text-red-600 hover:text-red-800 flex items-center text-xs font-medium">
                                                <i class="fas fa-file-pdf w-4"></i> PDF
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-xs">- No PDF -</span>
                                        @endif

                                        @if ($b->gambar)
                                            <a href="{{ asset('storage/' . $b->gambar) }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 flex items-center text-xs font-medium">
                                                <i class="fas fa-image w-4"></i> Gambar
                                            </a>
                                        @else
                                            <span class="text-gray-400 text-xs">- No Image -</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $b->created_at ? $b->created_at->format('d M Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex justify-center items-center space-x-3">
                                        {{-- Tombol Edit --}}
                                        <button
                                            onclick="editBidang({{ $b->id }}, '{{ addslashes($b->uraian) }}', '{{ addslashes($b->deskripsi) }}', '{{ $b->kategori }}', '{{ $b->file }}', '{{ $b->gambar }}')"
                                            class="text-blue-600 hover:text-blue-800 bg-blue-50 p-2 rounded-lg transition"
                                            title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('admin.bidang.destroy', $b->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 bg-red-50 p-2 rounded-lg transition"
                                                title="Hapus Data">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-gray-400">Data bidang belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal-tambah" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-100 bg-green-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="font-bold text-green-800">Tambah Data Bidang</h3>
                <button onclick="toggleModal('modal-tambah')"
                    class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
            </div>

            <form action="{{ route('admin.bidang.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Uraian <span class="text-red-500">*</span></label>
                        <input type="text" name="uraian"
                            class="w-full border border-gray-300 rounded-xl p-3 outline-none focus:ring-2 focus:ring-green-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-xl p-3 outline-none focus:ring-2 focus:ring-green-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kategori <span class="text-red-500">*</span></label>
                        <select name="kategori"
                            class="w-full border border-gray-300 rounded-xl p-3 outline-none focus:ring-2 focus:ring-green-500 bg-white"
                            required>
                            <option value="" disabled selected>-- Pilih Kategori --</option>
                            <option value="Tanaman Pangan">Tanaman Pangan</option>
                            <option value="Perkebunan">Perkebunan</option>
                            <option value="Hortikultura">Hortikultura</option>
                            <option value="Sekretariat">Sekretariat</option>
                            <option value="PSP">PSP</option>
                            <option value="UPTD Laboratorium">UPTD Laboratorium</option>
                            <option value="UPTD Balai Benih">UPTD Balai Benih</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">File (PDF)</label>
                            <input type="file" name="file" accept=".pdf"
                                class="w-full text-sm border border-gray-300 rounded-lg p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Gambar</label>
                            <input type="file" name="gambar" accept="image/*"
                                class="w-full text-sm border border-gray-300 rounded-lg p-2">
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-tambah')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow-md transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-edit" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-100 bg-blue-50 flex justify-between items-center sticky top-0 z-10">
                <h3 class="font-bold text-blue-800">Ubah Data Bidang</h3>
                <button onclick="toggleModal('modal-edit')"
                    class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
            </div>

            <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Uraian <span class="text-red-500">*</span></label>
                        <input type="text" id="edit-uraian" name="uraian"
                            class="w-full border border-gray-300 rounded-xl p-3 outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Deskripsi</label>
                        <textarea id="edit-deskripsi" name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-xl p-3 outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kategori <span
                                class="text-red-500">*</span></label>
                        <select id="edit-kategori" name="kategori"
                            class="w-full border border-gray-300 rounded-xl p-3 outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                            required>
                            <option value="Tanaman Pangan">Tanaman Pangan</option>
                            <option value="Perkebunan">Perkebunan</option>
                            <option value="Hortikultura">Hortikultura</option>
                            <option value="Sekretariat">Sekretariat</option>
                            <option value="PSP">PSP</option>
                            <option value="UPTD Laboratorium">UPTD Laboratorium</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t pt-4 mt-2">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Update File (PDF)</label>
                            <input type="file" name="file" accept=".pdf"
                                class="w-full text-xs border border-gray-300 rounded-lg p-2 mb-2">
                            <div id="preview-file-lama" class="hidden">
                                <p class="text-[10px] font-bold text-gray-500 mb-1">File Saat Ini:</p>
                                <a id="link-file-lama" href="#" target="_blank"
                                    class="text-[11px] text-red-600 hover:underline flex items-center break-all">
                                    <i class="fas fa-file-pdf mr-1"></i> Lihat PDF
                                </a>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-1">Update Gambar</label>
                            <input type="file" name="gambar" accept="image/*"
                                class="w-full text-xs border border-gray-300 rounded-lg p-2 mb-2">
                            <div id="preview-gambar-lama" class="hidden">
                                <p class="text-[10px] font-bold text-gray-500 mb-1">Gambar Saat Ini:</p>
                                <a id="link-gambar-lama" href="#" target="_blank"
                                    class="text-[11px] text-blue-600 hover:underline flex items-center break-all">
                                    <i class="fas fa-image mr-1"></i> Lihat Gambar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-edit')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md transition">Update
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
                setTimeout(() => {
                    modal.classList.add('opacity-100');
                }, 10);
            } else {
                modal.classList.add('hidden');
            }
        }

        function editBidang(id, uraian, deskripsi, kategori, file, gambar) {
            const form = document.getElementById('form-edit');

            // Isi nilai inputan form
            document.getElementById('edit-uraian').value = uraian;
            document.getElementById('edit-deskripsi').value = deskripsi;
            document.getElementById('edit-kategori').value = kategori;

            // Set URL action
            // Sesuaikan awalan URL ini jika route prefix Anda berbeda
            form.action = '/admin/bidang/' + id;

            // Tampilkan preview File PDF jika ada
            const previewFileContainer = document.getElementById('preview-file-lama');
            const linkFilePreview = document.getElementById('link-file-lama');
            if (file && file !== '') {
                previewFileContainer.classList.remove('hidden');
                linkFilePreview.href = '/storage/' + file;
            } else {
                previewFileContainer.classList.add('hidden');
            }

            // Tampilkan preview Gambar jika ada
            const previewGambarContainer = document.getElementById('preview-gambar-lama');
            const linkGambarPreview = document.getElementById('link-gambar-lama');
            if (gambar && gambar !== '') {
                previewGambarContainer.classList.remove('hidden');
                linkGambarPreview.href = '/storage/' + gambar;
            } else {
                previewGambarContainer.classList.add('hidden');
            }

            toggleModal('modal-edit');
        }
    </script>
@endsection
