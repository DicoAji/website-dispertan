@extends('layouts.admin')

@section('title', 'Kalender Kegiatan')
@section('header', 'Manajemen Jadwal Kegiatan')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Agenda Kegiatan</h2>
            <button onclick="toggleModal('modal-tambah')"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow-md flex items-center gap-2">
                <i class="fa-solid fa-calendar-plus"></i> Tambah Kegiatan
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-nowrap">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama Kegiatan</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Kategori</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Waktu & Lokasi</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($kegiatan as $k)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm font-medium text-blue-700">
                                    {{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-gray-800">{{ $k->nama_kegiatan }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">{{ $k->kategori }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    <div class="flex flex-col">
                                        <span><i class="fa-regular fa-clock mr-1"></i> {{ $k->waktu }}</span>
                                        <span class="text-xs text-red-500"><i class="fa-solid fa-location-dot mr-1"></i>
                                            {{ $k->lokasi }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <div class="flex justify-center space-x-2">
                                        <button
                                            onclick="editKegiatan({{ $k->id }}, '{{ addslashes($k->nama_kegiatan) }}', '{{ $k->kategori }}', '{{ $k->tanggal }}', '{{ $k->waktu }}', '{{ addslashes($k->lokasi) }}', '{{ addslashes($k->deskripsi) }}')"
                                            class="text-blue-600 bg-blue-50 p-2 rounded-lg hover:bg-blue-100">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.kalender.destroy', $k->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus kegiatan ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 bg-red-50 p-2 rounded-lg hover:bg-red-100">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">Belum ada agenda kegiatan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal-tambah" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
            <div class="px-6 py-4 border-b bg-blue-50 flex justify-between items-center">
                <h3 class="font-bold text-blue-800">Tambah Agenda Baru</h3>
                <button onclick="toggleModal('modal-tambah')" class="text-gray-400 text-2xl">&times;</button>
            </div>
            <form action="{{ route('admin.kalender.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan"
                        class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kategori</label>
                        <select name="kategori"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                            required>
                            <option value="Penyuluhan">Penyuluhan</option>
                            <option value="Rapat Internal">Rapat Internal</option>
                            <option value="Event Terbuka">Event Terbuka</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Tanggal</label>
                        <input type="date" name="tanggal"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Waktu (Cth: 09:00 WIB)</label>
                        <input type="text" name="waktu"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Lokasi</label>
                        <input type="text" name="lokasi"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="2"
                        class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="toggleModal('modal-tambah')"
                        class="px-4 py-2 text-gray-500 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md">Simpan
                        Agenda</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-edit" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden">
            <div class="px-6 py-4 border-b bg-amber-50 flex justify-between items-center">
                <h3 class="font-bold text-amber-800">Ubah Agenda Kegiatan</h3>
                <button onclick="toggleModal('modal-edit')" class="text-gray-400 text-2xl">&times;</button>
            </div>
            <form id="form-edit" action="" method="POST" class="p-6 space-y-4">
                @csrf @method('PUT')
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Kegiatan</label>
                    <input type="text" id="edit-nama" name="nama_kegiatan"
                        class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-amber-500" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kategori</label>
                        <select id="edit-kategori" name="kategori"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-amber-500 bg-white"
                            required>
                            <option value="Penyuluhan">Penyuluhan</option>
                            <option value="Rapat Internal">Rapat Internal</option>
                            <option value="Event Terbuka">Event Terbuka</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Tanggal</label>
                        <input type="date" id="edit-tanggal" name="tanggal"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-amber-500" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Waktu</label>
                        <input type="text" id="edit-waktu" name="waktu"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-amber-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Lokasi</label>
                        <input type="text" id="edit-lokasi" name="lokasi"
                            class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-amber-500" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Deskripsi Singkat</label>
                    <textarea id="edit-deskripsi" name="deskripsi" rows="2"
                        class="w-full border rounded-lg p-2.5 outline-none focus:ring-2 focus:ring-amber-500"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" onclick="toggleModal('modal-edit')"
                        class="px-4 py-2 text-gray-500 hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 shadow-md">Update
                        Agenda</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }

        function editKegiatan(id, nama, kategori, tanggal, waktu, lokasi, deskripsi) {
            const form = document.getElementById('form-edit');
            form.action = '/admin/kalender/' + id;

            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-kategori').value = kategori;
            document.getElementById('edit-tanggal').value = tanggal;
            document.getElementById('edit-waktu').value = waktu;
            document.getElementById('edit-lokasi').value = lokasi;
            document.getElementById('edit-deskripsi').value = deskripsi;

            toggleModal('modal-edit');
        }
    </script>
@endsection
