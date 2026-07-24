@extends('layouts.admin')

@section('title', 'Manajemen Permohonan')
@section('header', 'Daftar Permohonan Informasi')

@section('content')
    <div class="max-w-7xl mx-auto">
        {{-- Notifikasi --}}
        @if (session('success'))
            <div
                class="mb-4 p-3 bg-emerald-50 text-emerald-800 border-l-4 border-emerald-500 rounded-lg shadow-sm text-sm font-bold">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Data Permohonan --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50">
                <h3 class="font-bold text-gray-800">Daftar Permohonan Masuk</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3 text-start">Tgl Masuk</th>
                            <th class="px-6 py-3 text-start">Nama Pemohon</th>
                            <th class="px-6 py-3 text-start">Kategori</th>
                            <th class="px-6 py-3 text-start">Status</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($permohonan as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $item->nama_lengkap }}<br>
                                    <span class="text-xs text-gray-400">{{ $item->no_telepon }}</span>
                                </td>
                                <td class="px-6 py-4 capitalize">{{ $item->kategori_permohonan }}</td>
                                <td class="px-6 py-4">
                                    @if ($item->status == 'Selesai')
                                        <span
                                            class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full">
                                            <i class="fas fa-check-circle mr-1"></i> Selesai
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">
                                            <i class="fas fa-clock mr-1"></i> Belum Ditindak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex items-center justify-center gap-3">
                                    {{-- Tombol Lihat Detail & Tindak --}}
                                    <button onclick="lihatDetail({{ json_encode($item) }})"
                                        class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition-colors text-xs">
                                        <i class="fas fa-eye mr-1"></i> Lihat & Tindak
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.permohonan.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Data ini akan dihapus permanen. Yakin?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg font-semibold hover:bg-red-600 hover:text-white transition-colors text-xs">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">Belum ada permohonan
                                    masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL & TINDAK LANJUT --}}
    <div id="modalDetail"
        class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
            <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-gray-800">Detail Permohonan & Tindak Lanjut</h3>
                <button onclick="toggleModal('modalDetail')" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <div class="p-6 overflow-y-auto flex-1 text-sm text-gray-700 space-y-4">
                {{-- Data Diri Readonly --}}
                <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <div><span class="text-xs text-gray-500 block">Nama Lengkap</span> <strong id="dt_nama"></strong>
                    </div>
                    <div><span class="text-xs text-gray-500 block">NIK</span> <strong id="dt_nik"></strong></div>
                    <div class="col-span-2"><span class="text-xs text-gray-500 block">Alamat</span> <span
                            id="dt_alamat"></span></div>
                    <div><span class="text-xs text-gray-500 block">No. Telepon</span> <span id="dt_telp"></span></div>
                    <div><span class="text-xs text-gray-500 block">Email</span> <span id="dt_email"></span></div>
                    <div><span class="text-xs text-gray-500 block">Pekerjaan</span> <span id="dt_kerja"></span></div>
                    <div><span class="text-xs text-gray-500 block">Kategori</span> <span id="dt_kat"
                            class="capitalize"></span></div>
                </div>

                {{-- Rincian Readonly --}}
                <div class="bg-blue-50/50 p-4 rounded-lg border border-blue-100 space-y-3">
                    <div><span class="text-xs text-gray-500 font-bold uppercase block mb-1">Rincian Informasi</span>
                        <p id="dt_rincian" class="italic"></p>
                    </div>
                    <div><span class="text-xs text-gray-500 font-bold uppercase block mb-1">Tujuan Penggunaan</span>
                        <p id="dt_tujuan" class="italic"></p>
                    </div>
                    <div><span class="text-xs text-gray-500 font-bold uppercase block mb-1">Cara Memperoleh</span> <span
                            id="dt_cara" class="font-semibold uppercase text-blue-700"></span></div>
                </div>

                {{-- Link Download Berkas --}}
                <div class="flex gap-4">
                    <a href="#" id="link_ktp" target="_blank"
                        class="px-4 py-2 bg-emerald-100 text-emerald-700 rounded-lg text-xs font-bold hover:bg-emerald-200 transition">
                        <i class="fas fa-id-card mr-1"></i> Lihat KTP
                    </a>
                    <a href="#" id="link_berkas" target="_blank"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-200 transition hidden">
                        <i class="fas fa-file-alt mr-1"></i> Berkas Pendukung
                    </a>
                </div>

                <hr>

                {{-- Form Update Status --}}
                <form id="formStatus" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="font-bold text-gray-800 block mb-2 text-base">Ubah Status Tindak Lanjut:</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer p-3 border rounded-lg hover:bg-gray-50 flex-1">
                            <input type="radio" name="status" id="status_belum" value="Belum Ditindak"
                                class="w-4 h-4 text-emerald-600">
                            <span class="font-medium">Belum Ditindak</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer p-3 border rounded-lg hover:bg-gray-50 flex-1">
                            <input type="radio" name="status" id="status_selesai" value="Selesai"
                                class="w-4 h-4 text-emerald-600">
                            <span class="font-medium text-emerald-700">Selesai</span>
                        </label>
                    </div>
            </div>

            <div class="p-6 border-t bg-gray-50 flex justify-end gap-3">
                <button type="button" onclick="toggleModal('modalDetail')"
                    class="px-5 py-2 text-sm font-bold text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-lg transition">Batal</button>
                <button type="submit"
                    class="px-5 py-2 text-sm font-bold bg-emerald-600 text-white hover:bg-emerald-700 rounded-lg transition shadow-sm">Simpan
                    Status</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function lihatDetail(data) {
            // Set Text Data (Read Only)
            document.getElementById('dt_nama').innerText = data.nama_lengkap;
            document.getElementById('dt_nik').innerText = data.nik;
            document.getElementById('dt_alamat').innerText = data.alamat;
            document.getElementById('dt_telp').innerText = data.no_telepon;
            document.getElementById('dt_email').innerText = data.email;
            document.getElementById('dt_kerja').innerText = data.pekerjaan;
            document.getElementById('dt_kat').innerText = data.kategori_permohonan;
            document.getElementById('dt_rincian').innerText = data.rincian_informasi;
            document.getElementById('dt_tujuan').innerText = data.tujuan_penggunaan;
            document.getElementById('dt_cara').innerText = data.cara_memperoleh;

            // Set Link Download
            document.getElementById('link_ktp').href = '/storage/permohonan/ktp/' + data.foto_ktp;

            const btnBerkas = document.getElementById('link_berkas');
            if (data.berkas_pendukung) {
                btnBerkas.classList.remove('hidden');
                btnBerkas.href = '/storage/permohonan/berkas/' + data.berkas_pendukung;
            } else {
                btnBerkas.classList.add('hidden');
            }

            // Set Form Action Route untuk Ubah Status
            document.getElementById('formStatus').action = "/admin/permohonan/status/" + data.id;

            // Set Radio Button Status aktif
            if (data.status === 'Selesai') {
                document.getElementById('status_selesai').checked = true;
            } else {
                document.getElementById('status_belum').checked = true;
            }

            toggleModal('modalDetail');
        }
    </script>
@endsection
