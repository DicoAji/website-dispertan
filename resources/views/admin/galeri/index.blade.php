@extends('layouts.admin')
@section('title', 'Galeri Foto')
@section('header', 'Galeri Foto')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 font-bold text-lg">Manajemen Galeri Foto</h3>
            <button onclick="toggleModal('modalTambahGaleri')"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                <i class="fas fa-plus mr-2"></i> Tambah Foto
            </button>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
        @endif

        {{-- Menampilkan error validasi umum jika ada --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase border-b">
                        <th class="px-6 py-4">Tanggal Diunggah</th>
                        <th class="px-6 py-4">Nama Kegiatan</th>
                        <th class="px-6 py-4">Foto</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($galeri as $g)
                        <tr>
                            <td class="px-6 py-4 text-sm">{{ $g->created_at ? $g->created_at->format('d/m/Y') : '-' }}</td>
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $g->kegiatan }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/galeri/' . $g->file) }}" alt="{{ $g->kegiatan }}"
                                    class="h-16 w-24 object-cover rounded shadow-sm border">
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition"
                                        title="Hapus Foto">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                                <i class="fas fa-images fa-3x mb-3 text-gray-300"></i>
                                <p>Belum ada foto di dalam galeri.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah Foto --}}
    <div id="modalTambahGaleri" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50 transition-opacity"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Unggah Foto Baru</h3>
                    <button onclick="toggleModal('modalTambahGaleri')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex flex-col">
                            <label class="text-sm font-semibold text-gray-700 mb-1">Nama Kegiatan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="kegiatan" placeholder="Contoh: Panen Raya Bersama Bupati..."
                                required
                                class="border border-gray-300 p-2.5 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-semibold text-gray-700 mb-1">File Foto <span
                                    class="text-red-500">*</span></label>
                            <input type="file" name="file" accept="image/jpeg, image/png, image/jpg" required
                                class="border border-gray-300 p-2 rounded-lg text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                            <span class="text-xs text-gray-500 mt-1"><i class="fas fa-info-circle mr-1"></i> Format: JPG,
                                JPEG, PNG. Maksimal ukuran file: 2 MB.</span>

                            {{-- Menampilkan pesan error khusus input file --}}
                            @error('file')
                                <span class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3 border-t pt-4">
                        <button type="button" onclick="toggleModal('modalTambahGaleri')"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold transition">Batal</button>
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-semibold transition shadow-md">
                            <i class="fas fa-upload mr-1"></i> Unggah Foto
                        </button>
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
