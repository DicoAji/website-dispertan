@extends('layouts.admin')
@section('title', 'Data SKM')
@section('header', 'Manajemen SKM')


@section('content')
    <div class="p-6">
        {{-- Header & Tombol Tambah --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen SKM</h2>
                <p class="text-sm text-gray-500">Survei Kepuasan Masyarakat - Dinas Pertanian</p>
            </div>
            <button onclick="toggleModal('modal-tambah')"
                class="bg-green-600 text-white px-5 py-2 rounded-xl hover:bg-green-700 shadow-md transition flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Laporan
            </button>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-xl shadow-sm">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- Tabel Data --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">No</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Tahun</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">Triwulan</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">File Laporan</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($skms as $index => $s)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-800">{{ $s->tahun }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold">
                                    {{ $s->triwulan }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <a href="{{ asset('storage/skm/' . $s->file) }}" target="_blank"
                                    class="flex items-center text-green-600 hover:text-green-800 font-medium">
                                    <i class="fas fa-file-pdf mr-2"></i> Lihat PDF
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex justify-center space-x-4">
                                    <button
                                        onclick="editSkm({{ $s->id }}, '{{ $s->tahun }}', '{{ $s->triwulan }}', '{{ $s->file }}')"
                                        class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fas fa-edit mr-1"></i> Ubah
                                    </button>
                                    <form action="{{ route('skm.destroy', $s->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus laporan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center text-gray-400">
                                <i class="fas fa-poll-h fa-3x mb-3 text-gray-200"></i>
                                <p>Belum ada data survei kepuasan masyarakat.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div id="modal-tambah" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">
            <div
                class="px-6 py-4 border-b border-gray-100 bg-green-50 flex justify-between items-center text-green-800 font-bold">
                <span>Unggah Laporan SKM Baru</span>
                <button onclick="toggleModal('modal-tambah')" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <form action="{{ route('skm.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-1">Tahun</label>
                    <input type="number" name="tahun" value="{{ date('Y') }}"
                        class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-green-500" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Triwulan</label>
                    <select name="triwulan"
                        class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="Triwulan I">Triwulan I</option>
                        <option value="Triwulan II">Triwulan II</option>
                        <option value="Triwulan III">Triwulan III</option>
                        <option value="Triwulan IV">Triwulan IV</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">File PDF Laporan</label>
                    <input type="file" name="file" accept=".pdf" class="w-full text-sm" required>
                </div>
                <div class="pt-4 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-tambah')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="modal-edit" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <div
                class="px-6 py-4 border-b border-gray-100 bg-blue-50 flex justify-between items-center text-blue-800 font-bold">
                <span>Ubah Laporan SKM</span>
                <button onclick="toggleModal('modal-edit')" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold mb-1">Tahun</label>
                    <input type="number" id="edit-tahun" name="tahun"
                        class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Triwulan</label>
                    <select id="edit-triwulan" name="triwulan"
                        class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="Triwulan I">Triwulan I</option>
                        <option value="Triwulan II">Triwulan II</option>
                        <option value="Triwulan III">Triwulan III</option>
                        <option value="Triwulan IV">Triwulan IV</option>
                    </select>
                </div>
                <div id="preview-file-lama" class="p-3 bg-gray-50 rounded-lg border text-xs text-gray-600 italic">
                    File saat ini: <span id="nama-file-lama" class="font-bold"></span>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Ganti File PDF (Opsional)</label>
                    <input type="file" name="file" accept=".pdf" class="w-full text-sm">
                </div>
                <div class="pt-4 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modal-edit')"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function editSkm(id, tahun, triwulan, fileName) {
            const form = document.getElementById('form-edit');
            document.getElementById('edit-tahun').value = tahun;
            document.getElementById('edit-triwulan').value = triwulan;
            document.getElementById('nama-file-lama').innerText = fileName;

            form.action = '/admin/skm/' + id;
            toggleModal('modal-edit');
        }
    </script>
@endsection
