@extends('layouts.admin')

@section('title', 'Manajemen PPID')
@section('header', 'Data Dokumen PPID')

@section('content')
    <div class="max-w-6xl mx-auto">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div
                class="mb-4 p-3 bg-emerald-50 text-emerald-800 border-l-4 border-emerald-500 rounded-lg shadow-sm text-sm font-bold">
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

        {{-- Tabel Data PPID --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800">Daftar Dokumen Informasi Publik</h3>
                <button onclick="toggleModal('modalTambah')"
                    class="bg-emerald-600 text-white text-xs font-bold py-2 px-4 rounded-lg hover:bg-emerald-700 transition shadow-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Dokumen
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3 text-start">No</th>
                            <th class="px-6 py-3 text-start">Nama Dokumen</th>
                            <th class="px-6 py-3 text-start">Kategori</th>
                            <th class="px-6 py-3 text-start">Link</th>
                            <th class="px-6 py-3 text-start">File</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($ppid ?? [] as $item)
                            <tr>
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $badgeColor = match ($item->kategori) {
                                            'Informasi Berkala' => 'bg-blue-100 text-blue-800',
                                            'Informasi Setiap Saat' => 'bg-emerald-100 text-emerald-800',
                                            'Informasi Serta Merta' => 'bg-orange-100 text-orange-800',
                                            'Informasi Dikecualikan' => 'bg-red-100 text-red-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 text-[11px] font-bold rounded-full {{ $badgeColor }}">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->link)
                                        <a href="{{ $item->link }}" target="_blank"
                                            class="text-blue-600 hover:underline flex items-center gap-1">
                                            <i class="fas fa-external-link-alt text-xs"></i> Buka Link
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->file)
                                        <a href="{{ asset('storage/ppid/' . $item->file) }}" target="_blank"
                                            class="text-emerald-600 font-bold hover:underline">
                                            <i class="fas fa-file-download mr-1"></i> Unduh
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex items-center justify-center gap-3">
                                    <button onclick="editPpid({{ json_encode($item) }})"
                                        class="text-blue-600 hover:text-blue-900 transition">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.ppid.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-400 italic">Belum ada dokumen
                                    PPID.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH PPID --}}
    <div id="modalTambah"
        class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-md shadow-2xl transform transition-all">
            <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50 rounded-t-xl">
                <h3 class="font-bold text-gray-800">Tambah Dokumen PPID</h3>
                <button onclick="toggleModal('modalTambah')" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <form action="{{ route('admin.ppid.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Nama Dokumen <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" required placeholder="Contoh: Laporan Keuangan 2026"
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Kategori <span
                                class="text-red-500">*</span></label>
                        <select name="kategori" required
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Informasi Berkala">Informasi Berkala</option>
                            <option value="Informasi Setiap Saat">Informasi Setiap Saat</option>
                            <option value="Informasi Serta Merta">Informasi Serta Merta</option>
                            <option value="Informasi Dikecualikan">Informasi Dikecualikan</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Link Tautan (Opsional)</label>
                        <input type="url" name="link" placeholder="Contoh: https://grobogan.go.id/dokumen"
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">File Pendukung</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx,.zip,.rar"
                            class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:text-emerald-700 file:font-semibold hover:file:bg-emerald-100 border border-gray-300 rounded-lg p-1 transition">
                        <p class="text-[10px] text-gray-400 mt-1 italic">*Format diizinkan: PDF, Word, ZIP, RAR (Maks 10MB).
                        </p>
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

    {{-- MODAL EDIT PPID --}}
    <div id="modalEdit" class="fixed inset-0 z-50 hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-xl w-full max-w-md shadow-2xl transform transition-all">
            <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50 rounded-t-xl">
                <h3 class="font-bold text-gray-800">Edit Dokumen PPID</h3>
                <button onclick="toggleModal('modalEdit')" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <form id="formEditPpid" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Nama Dokumen <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="edit_nama" required
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Kategori <span
                                class="text-red-500">*</span></label>
                        <select name="kategori" id="edit_kategori" required
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            <option value="Informasi Berkala">Informasi Berkala</option>
                            <option value="Informasi Setiap Saat">Informasi Setiap Saat</option>
                            <option value="Informasi Serta Merta">Informasi Serta Merta</option>
                            <option value="Informasi Dikecualikan">Informasi Dikecualikan</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Link Tautan (Opsional)</label>
                        <input type="url" name="link" id="edit_link"
                            class="w-full p-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase mb-1 block">Ganti File (Opsional)</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx,.zip,.rar"
                            class="w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 file:font-semibold hover:file:bg-blue-100 border border-gray-300 rounded-lg p-1 transition">
                        <p class="text-[10px] text-gray-400 mt-1 italic">*Kosongkan jika tidak ingin mengubah file.</p>
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

        function editPpid(data) {
            document.getElementById('formEditPpid').action = "/admin/ppid/" + data.id;

            document.getElementById('edit_nama').value = data.nama;
            document.getElementById('edit_kategori').value = data.kategori;
            document.getElementById('edit_link').value = data.link || '';

            toggleModal('modalEdit');
        }
    </script>
@endsection
