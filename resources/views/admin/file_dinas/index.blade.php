@extends('layouts.admin')

@section('title', 'Dokumen')
@section('header', 'Dokumen Dinas Pertanian')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Manajemen File Dinas</h2>
            <button onclick="toggleModal('modal-tambah')"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                + Tambah File
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">No</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">Uraian</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600">File</th>
                        <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($files as $index => $f)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $f->uraian }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ asset('storage/dokumen/' . $f->file) }}" target="_blank"
                                    class="text-green-600 hover:text-green-800 flex items-center">
                                    <i class="fas fa-file-pdf mr-2"></i> Lihat PDF
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex justify-center space-x-3">
                                    {{-- Link Update (Memicu Modal Edit) --}}
                                    <button
                                        onclick="editFileDinas({{ $f->id }}, '{{ $f->uraian }}', '{{ $f->file }}')"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i> Ubah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-400">Data belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal-tambah" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">
            <div class="px-6 py-4 border-b border-gray-100 bg-green-50 flex justify-between items-center">
                <h3 class="font-bold text-green-800">Unggah File Dinas</h3>
                <button onclick="toggleModal('modal-tambah')" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <form action="{{ route('file_dinas.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Uraian Dokumen</label>
                        <textarea name="uraian" class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-red-500 font-semibold mb-1">File PDF (Maks 2MB)</label>
                        <input type="file" name="file" accept=".pdf" class="w-full text-sm" required>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-tambah')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-edit" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-blue-50 flex justify-between items-center">
                <h3 class="font-bold text-blue-800">Ubah Uraian Dokumen</h3>
                <button onclick="toggleModal('modal-edit')" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Uraian Dokumen</label>
                        <textarea id="edit-uraian" name="uraian"
                            class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>

                    {{-- Bagian Menampilkan File Sebelumnya --}}
                    <div id="preview-file-lama" class="p-3 bg-blue-50 rounded-lg border border-blue-100 hidden">
                        <p class="text-[10px] font-bold text-blue-800 uppercase mb-1">File Saat Ini:</p>
                        <a id="link-file-lama" href="#" target="_blank"
                            class="text-xs text-blue-600 hover:underline flex items-center">
                            <i class="fas fa-file-pdf mr-2"></i>
                        </a>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-1">Ganti File PDF (Opsional)</label>
                        <input type="file" name="file" accept=".pdf" class="w-full text-sm">
                        <p class="text-[10px] text-gray-500 mt-1 italic">*Biarkan kosong jika tidak ingin mengubah file PDF
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-edit')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md">Update Data</button>
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

        function editFileDinas(id, uraian, fileName) {
            const form = document.getElementById('form-edit');
            const textarea = document.getElementById('edit-uraian');
            const previewContainer = document.getElementById('preview-file-lama');
            const linkPreview = document.getElementById('link-file-lama');

            // Set URL action secara dinamis
            form.action = '/admin/file-dinas/' + id;
            textarea.value = uraian;

            // Tampilkan informasi file lama jika ada
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
