@extends('layouts.admin')

@section('title', 'Informasi')
@section('header', 'Manajemen Informasi')

@section('content')
    <div class="max-w-5xl mx-auto">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div
                class="mb-4 p-3 bg-emerald-50 text-emerald-800 border-l-4 border-emerald-500 rounded-lg shadow-sm text-sm font-bold">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Informasi --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Daftar Informasi</h3>
                <button onclick="toggleModal('modalTambah')"
                    class="bg-emerald-600 text-white text-xs font-bold py-2 px-4 rounded-lg hover:bg-emerald-700 transition shadow-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Informasi
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3 text-start">No</th>
                            <th class="px-6 py-3 text-start">Kategori</th>
                            <th class="px-6 py-3 text-start">Uraian</th>
                            <th class="px-6 py-3 text-start">File</th>
                            <th class="px-6 py-3 text-start">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($informasi as $i)
                            <tr>
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-md text-xs font-bold">
                                        {{ $i->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium">{{ $i->uraian }}</td>
                                <td class="px-6 py-4">
                                    @if (in_array(pathinfo($i->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/informasi/' . $i->file) }}"
                                            class="h-10 w-10 rounded object-cover shadow-sm">
                                    @else
                                        <a href="{{ asset('storage/informasi/' . $i->file) }}" target="_blank"
                                            class="text-red-600 font-bold hover:underline">
                                            <i class="fas fa-file-pdf mr-1"></i> PDF
                                        </a>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex items-center justify-center gap-3">
                                    <button onclick="editInformasi({{ json_encode($i) }})"
                                        class="text-blue-600 hover:text-blue-900 transition">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.informasi.destroy', $i->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">Belum ada data
                                    informasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <div id="modalTambah"
        class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-md shadow-2xl">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Tambah Informasi</h3>
                <button onclick="toggleModal('modalTambah')"><i class="fas fa-times text-gray-400"></i></button>
            </div>
            <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Kategori</label>
                        <input type="text" name="kategori" required placeholder="Contoh: Pengumuman, Surat Edaran..."
                            class="w-full mt-1 p-2 border border-gray-200 rounded-lg text-sm focus:ring-emerald-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Uraian</label>
                        <input type="text" name="uraian" required
                            class="w-full mt-1 p-2 border border-gray-200 rounded-lg text-sm focus:ring-emerald-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">File (Gambar/PDF)</label>
                        <input type="file" name="file" required
                            class="w-full mt-1 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-100 file:text-gray-700">
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-2">
                    <button type="button" onclick="toggleModal('modalTambah')"
                        class="px-4 py-2 text-sm font-bold text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-bold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="modalEdit" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-md shadow-2xl">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Edit Informasi</h3>
                <button onclick="toggleModal('modalEdit')"><i class="fas fa-times text-gray-400"></i></button>
            </div>
            <form id="formEdit" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Kategori</label>
                        <input type="text" name="kategori" id="edit_kategori" required
                            class="w-full mt-1 p-2 border border-gray-200 rounded-lg text-sm focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Uraian</label>
                        <input type="text" name="uraian" id="edit_uraian" required
                            class="w-full mt-1 p-2 border border-gray-200 rounded-lg text-sm focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">File Baru</label>
                        <input type="file" name="file" class="w-full mt-1 text-sm">
                        <p class="text-[10px] text-gray-400 mt-1 italic">*Kosongkan jika tidak mengubah file.</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-2">
                    <button type="button" onclick="toggleModal('modalEdit')"
                        class="px-4 py-2 text-sm font-bold text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-bold bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function editInformasi(data) {
            document.getElementById('formEdit').action = "/admin/informasi/" + data.id;
            document.getElementById('edit_kategori').value = data.kategori;
            document.getElementById('edit_uraian').value = data.uraian;
            toggleModal('modalEdit');
        }
    </script>
@endsection
