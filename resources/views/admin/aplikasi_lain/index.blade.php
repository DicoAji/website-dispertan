@extends('layouts.admin')

@section('title', 'Aplikasi Lain')
@section('header', 'Manajemen Aplikasi Lain')

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div
                class="mb-4 p-3 bg-emerald-50 text-emerald-800 border-l-4 border-emerald-500 rounded-lg shadow-sm text-sm font-bold flex items-center">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Error Validasi --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-800 border-l-4 border-red-500 rounded-lg shadow-sm text-sm font-bold">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tabel Data --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-white">
                <h3 class="font-bold text-gray-800">Daftar Link Aplikasi Lain</h3>
                <button onclick="toggleModal('modalTambah')"
                    class="bg-emerald-600 text-white text-xs font-bold py-2 px-4 rounded-lg hover:bg-emerald-700 transition shadow-sm flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Aplikasi
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Aplikasi</th>
                            <th class="px-6 py-3">Logo / SVG</th>
                            <th class="px-6 py-3">Link / Tautan</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($aplikasi as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-bold text-gray-800">{{ $item->nama_aplikasi }}</td>
                                <td class="px-6 py-4">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-50 border border-gray-200 flex items-center justify-center p-1 overflow-hidden">
                                        @if ($item->logo)
                                            <img src="{{ asset('storage/aplikasi/' . $item->logo) }}" alt="Logo"
                                                class="w-full h-full object-contain">
                                        @else
                                            <span class="text-[10px] text-gray-400">No Image</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $item->link }}" target="_blank"
                                        class="text-blue-600 hover:underline flex items-center text-xs font-semibold">
                                        {{ Str::limit($item->link, 30) }} <i class="fas fa-external-link-alt ml-1"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-4 flex items-center justify-center gap-3">
                                    <button onclick="editAplikasi({{ json_encode($item) }})"
                                        class="w-8 h-8 flex items-center justify-center rounded-lg text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white transition-colors">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.aplikasi_lain.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus aplikasi ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg text-red-600 bg-red-50 hover:bg-red-600 hover:text-white transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">Belum ada data
                                    aplikasi lain.</td>
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
        <div class="bg-white rounded-xl w-full max-w-md shadow-2xl transform transition-all">
            <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50 rounded-t-xl">
                <h3 class="font-bold text-gray-800">Tambah Aplikasi Baru</h3>
                <button onclick="toggleModal('modalTambah')" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <form action="{{ route('admin.aplikasi_lain.store') }}" method="POST" enctype="multipart/form-data"
                class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Nama Aplikasi <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_aplikasi" required placeholder="Contoh: SIMPEG"
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Upload Logo / SVG <span
                                class="text-red-500">*</span></label>
                        <input type="file" name="logo" accept=".jpg,.jpeg,.png,.svg" required
                            class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:text-emerald-700 file:font-semibold border border-gray-300 rounded-lg p-1">
                        <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG, atau SVG (Maksimal 2MB).</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Link / URL <span
                                class="text-red-500">*</span></label>
                        <input type="url" name="link" required placeholder="https://..."
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" onclick="toggleModal('modalTambah')"
                        class="px-5 py-2 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</button>
                    <button type="submit"
                        class="px-5 py-2 text-sm font-bold bg-emerald-600 text-white hover:bg-emerald-700 rounded-lg shadow-sm transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="modalEdit" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-md shadow-2xl transform transition-all">
            <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50 rounded-t-xl">
                <h3 class="font-bold text-gray-800">Edit Aplikasi</h3>
                <button onclick="toggleModal('modalEdit')" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <form id="formEditAplikasi" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Nama Aplikasi <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_aplikasi" id="edit_nama" required
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Ganti Logo / SVG
                            (Opsional)</label>
                        <input type="file" name="logo" accept=".jpg,.jpeg,.png,.svg"
                            class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 file:font-semibold border border-gray-300 rounded-lg p-1">
                        <p class="text-[10px] text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah logo.</p>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Link / URL <span
                                class="text-red-500">*</span></label>
                        <input type="url" name="link" id="edit_link" required
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" onclick="toggleModal('modalEdit')"
                        class="px-5 py-2 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition">Batal</button>
                    <button type="submit"
                        class="px-5 py-2 text-sm font-bold bg-blue-600 text-white hover:bg-blue-700 rounded-lg shadow-sm transition">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function editAplikasi(data) {
            document.getElementById('formEditAplikasi').action = "/admin/aplikasi-lain/" + data.id;

            document.getElementById('edit_nama').value = data.nama_aplikasi;
            document.getElementById('edit_link').value = data.link;

            toggleModal('modalEdit');
        }
    </script>
@endsection
