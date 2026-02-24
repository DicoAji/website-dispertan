@extends('layouts.admin')
@section('title', 'Berita')
@section('header', 'Berita')


@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-gray-700 font-bold text-lg">Manajemen Berita</h3>
        <button onclick="toggleModal('modalTambahBerita')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            <i class="fas fa-plus mr-2"></i> Tulis Berita
        </button>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase border-b">
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Foto</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($berita as $b)
                <tr>
                    <td class="px-6 py-4 text-sm">{{ $b->tanggal_berita }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $b->judul }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/berita/'.$b->foto_berita) }}" class="h-12 w-20 object-cover rounded">
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="modalTambahBerita" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6">
            <h3 class="text-xl font-bold mb-4">Buat Berita Baru</h3>
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" name="judul" placeholder="Judul Berita" required class="border p-2 rounded">
                        <input type="date" name="tanggal_berita" required class="border p-2 rounded">
                        <textarea name="deskripsi" placeholder="Isi Berita Lengkap..." rows="5" required class="border p-2 rounded"></textarea>

                        <div class="flex flex-col">
                            <label class="text-xs text-gray-500 mb-1 font-semibold">Ukuran file maksimal 1 MB</label>
                            <input type="file" name="foto_berita" class="text-sm">

                            {{-- Menampilkan pesan error jika validasi gagal --}}
                            @error('foto_berita')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal('modalTambahBerita')" class="bg-gray-200 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan Berita</button>
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
