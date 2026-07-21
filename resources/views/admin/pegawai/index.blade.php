@extends('layouts.admin')

@section('title', 'Data Pegawai')
@section('header', 'Manajemen Pegawai')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Sumber Daya Manusia</p>
                <h3 class="text-base font-semibold text-[#4A3728]">Daftar Pegawai</h3>
            </div>
            <button onclick="toggleModal()"
                class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold bg-[#234D2C] text-white hover:bg-[#17331D] transition-colors shadow-sm">
                <i class="fas fa-plus mr-2 text-xs"></i> Tambah Pegawai
            </button>
        </div>

        @if (session('success'))
            <div class="flex items-center p-4 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm">
                <i class="fas fa-check-circle text-lg text-[#3C7245] mr-3"></i>
                <div>
                    <p class="text-sm font-bold text-[#17331D]">Berhasil!</p>
                    <p class="text-xs text-[#234D2C]">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- LIST PEGAWAI --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl overflow-hidden">
            @forelse($pegawai as $key => $p)
                <div
                    class="flex items-center gap-4 px-5 py-4 {{ !$loop->last ? 'border-b border-[#E7E1D2]' : '' }} hover:bg-[#F6F2E6]/50 transition-colors">

                    <span class="w-6 text-xs text-gray-400 flex-shrink-0 text-center">{{ $key + 1 }}</span>

                    <img class="h-11 w-11 rounded-lg object-cover border border-[#E7E1D2] flex-shrink-0"
                        src="{{ $p->foto == 'default.jpg' ? 'https://ui-avatars.com/api/?name=' . $p->nama_lengkap . '&background=F6F2E6&color=234D2C' : asset('storage/foto/' . $p->foto) }}"
                        alt="Foto">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-[#4A3728] truncate">{{ $p->nama_lengkap }}</p>
                        <div class="flex items-center gap-x-3 text-xs text-gray-400 mt-0.5 flex-wrap">
                            <span>{{ $p->nip }}</span>
                            <span class="inline-flex items-center">
                                <i class="fas fa-id-badge mr-1.5 text-[#C68A2E]"></i>{{ $p->jabatan }}
                            </span>
                        </div>
                    </div>

                    <button onclick="openEditModal({{ json_encode($p) }})"
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:bg-[#F6F2E6] hover:text-[#234D2C] transition-colors flex-shrink-0">
                        <i class="fas fa-edit text-sm"></i>
                    </button>

                    <form action="{{ route('pegawai.destroy', $p->nip) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $p->nama_lengkap }}?')"
                        class="flex-shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-14 text-gray-400">
                    <i class="fas fa-users fa-2x mb-3"></i>
                    <p class="text-sm">Belum ada data pegawai.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <div id="modalTambah" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-1">Data Baru</p>
                        <h3 class="text-base font-semibold text-[#4A3728]">Tambah Pegawai Baru</h3>
                    </div>
                    <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

                <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">NIP (18 Karakter)</label>
                            <input type="text" name="nip" maxlength="18" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Jabatan</label>
                            <input type="text" name="jabatan" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Foto Profil</label>
                            <input type="file" name="foto"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3 border-t pt-5">
                        <button type="button" onclick="toggleModal()"
                            class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-200">Batal</button>
                        <button type="submit"
                            class="bg-[#234D2C] text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-[#17331D] shadow-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div id="modalEdit" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <div>
                        <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E] mb-1">Perbarui</p>
                        <h3 class="text-base font-semibold text-[#4A3728]">Edit Data Pegawai</h3>
                    </div>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>

                <form id="formEdit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">NIP (Tidak dapat
                                diubah)</label>
                            <input type="text" id="edit_nip" disabled
                                class="w-full rounded-lg border-gray-200 bg-gray-100 p-2.5 border text-sm text-gray-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="edit_nama" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Jabatan</label>
                            <input type="text" name="jabatan" id="edit_jabatan" required
                                class="w-full rounded-lg border-gray-300 p-2.5 border text-sm focus:ring-2 focus:ring-[#234D2C] focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Ganti Foto Profil
                                (Opsional)</label>
                            <input type="file" name="foto"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3 border-t pt-5">
                        <button type="button" onclick="closeEditModal()"
                            class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-200">Batal</button>
                        <button type="submit"
                            class="bg-[#234D2C] text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-[#17331D] shadow-lg">Update
                            Data</button>
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
