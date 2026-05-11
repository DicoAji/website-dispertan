@extends('layouts.admin')
@section('title', 'Tambahan Menu')
@section('header', 'Tambahan Menu')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-gray-700 font-bold text-lg">Daftar Menu Tambahan</h3>
            <button onclick="toggleModal('modalTambahMenu')"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                <i class="fas fa-plus mr-2"></i> Tambah Menu
            </button>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase border-b">
                        <th class="px-6 py-4">Nama Menu</th>
                        <th class="px-6 py-4">Tipe / Sumber</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($menus as $m)
                        <tr>
                            <td class="px-6 py-4 font-bold text-gray-800">{{ $m->menu }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if ($m->link)
                                    <span class="text-blue-600 italic"><i class="fas fa-link mr-1"></i>
                                        {{ $m->link }}</span>
                                @elseif($m->file)
                                    <span class="text-red-600 font-medium"><i class="fas fa-file-pdf mr-1"></i>
                                        {{ $m->file }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('admin.tambahan_menu.destroy', $m->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus menu ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-gray-400">Belum ada menu tambahan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah Menu --}}
    <div id="modalTambahMenu" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
                <h3 class="text-xl font-bold mb-4">Tambah Menu Baru</h3>
                <form action="{{ route('admin.tambahan_menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label class="text-sm font-semibold mb-1">Nama Menu</label>
                            <input type="text" name="menu" placeholder="Contoh: Dokumen Kerja" required
                                class="border p-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-semibold mb-1">Link Eksternal (Opsional)</label>
                            <input type="url" name="link" placeholder="https://google.com/..."
                                class="border p-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none text-sm">
                            <p class="text-[10px] text-gray-400 mt-1">*Kosongkan jika ingin menggunakan upload file.</p>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-semibold mb-1">Atau Upload File (Opsional)</label>
                            <input type="file" name="file" class="text-sm">
                            <p class="text-[10px] text-gray-400 mt-1 text-red-500">*Gunakan salah satu: Link atau File.</p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3 border-t pt-4">
                        <button type="button" onclick="toggleModal('modalTambahMenu')"
                            class="bg-gray-200 px-4 py-2 rounded-lg">Batal</button>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg font-bold">Simpan
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
