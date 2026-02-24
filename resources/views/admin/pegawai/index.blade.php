@extends('layouts.admin')

@section('title', 'Data Pegawai')
@section('header', 'Manajemen Pegawai')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-gray-700 font-bold text-lg">Daftar Pegawai</h3>
        <button onclick="toggleModal()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Pegawai
        </button>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <div>
                    <p class="font-bold">Berhasil!</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b">
                    <th class="px-6 py-4 font-semibold">No</th>
                    <th class="px-6 py-4 font-semibold">Foto</th>
                    <th class="px-6 py-4 font-semibold">Nama / NIP</th>
                    <th class="px-6 py-4 font-semibold">Jabatan</th>
                    <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($pegawai as $key => $p)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $key + 1 }}</td>
                    <td class="px-6 py-4">
                        <img class="h-10 w-10 rounded-lg object-cover border border-gray-200"
                             src="{{ $p->foto == 'default.jpg' ? 'https://ui-avatars.com/api/?name='.$p->nama_lengkap.'&background=random' : asset('storage/foto/'.$p->foto) }}"
                             alt="Foto">
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-gray-800">{{ $p->nama_lengkap }}</div>
                        <div class="text-xs text-gray-500">{{ $p->nip }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $p->jabatan }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-3">
                            <button onclick="openEditModal({{ json_encode($p) }})" class="text-blue-500 hover:text-blue-700 transition">
                                <i class="fas fa-edit"></i>
                            </button>

                            <form action="{{ route('pegawai.destroy', $p->nip) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $p->nama_lengkap }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modalTambah" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-md p-6">
            <div class="flex justify-between items-center mb-5 border-b pb-3">
                <h3 class="text-xl font-bold text-green-800">Tambah Pegawai Baru</h3>
                <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </div>

            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">NIP (18 Karakter)</label>
                        <input type="text" name="nip" maxlength="18" required class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" required class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Jabatan</label>
                        <input type="text" name="jabatan" required class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Foto Profil</label>
                        <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-50 file:text-green-700">
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal()" class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold">Batal</button>
                    <button type="submit" class="bg-green-600 text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-green-700 shadow-lg shadow-green-200">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalEdit" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-md p-6">
            <div class="flex justify-between items-center mb-5 border-b pb-3">
                <h3 class="text-xl font-bold text-blue-800">Edit Data Pegawai</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </div>

            <form id="formEdit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">NIP (Tidak dapat diubah)</label>
                        <input type="text" id="edit_nip" disabled class="w-full rounded-lg border-gray-200 bg-gray-100 p-2.5 border text-gray-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="edit_nama" required class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Jabatan</label>
                        <input type="text" name="jabatan" id="edit_jabatan" required class="w-full rounded-lg border-gray-300 p-2.5 border focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ganti Foto Profil (Opsional)</label>
                        <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700">
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-200">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleModal() {
        document.getElementById('modalTambah').classList.toggle('hidden');
    }
    function openEditModal(pegawai) {
    const modal = document.getElementById('modalEdit');
    const form = document.getElementById('formEdit');

    // Set data ke dalam input
    document.getElementById('edit_nip').value = pegawai.nip;
    document.getElementById('edit_nama').value = pegawai.nama_lengkap;
    document.getElementById('edit_jabatan').value = pegawai.jabatan;

    // Set action form secara dinamis ke route update
    form.action = `/admin/pegawai/${pegawai.nip}`;

    modal.classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('modalEdit').classList.add('hidden');
    }
</script>
@endsection
