@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard Utama')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="flex items-center p-4 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm">
                <i class="fas fa-check-circle text-lg text-[#3C7245] mr-3"></i>
                <p class="text-sm text-[#234D2C] font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Banner Selamat Datang --}}
        <div
            class="relative rounded-2xl shadow-lg p-6 md:p-7 flex items-center justify-between text-white overflow-hidden bg-gradient-to-br from-[#17331D] via-[#234D2C] to-[#3C7245]">
            <i class="fas fa-tractor absolute text-white/10 text-[110px] -right-3 -bottom-6"></i>

            <div class="relative z-10">
                <p class="text-[11px] font-bold tracking-widest uppercase text-[#E8C077] mb-1">Panel Admin</p>
                <h3 class="text-lg font-semibold">Halo, {{ auth()->user()->name ?? 'Admin' }}!</h3>
                <p class="text-white/70 text-sm mt-0.5">Siap mengelola data DISPERTAN hari ini?</p>
            </div>
        </div>

        {{-- Grid Rekapan Data --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            @php
                $stats = [
                    [
                        'title' => 'Total Berita',
                        'count' => $totalBerita ?? 0,
                        'icon' => 'fas fa-newspaper',
                    ],
                    [
                        'title' => 'Total Dokumen',
                        'count' => $totalDokumen ?? 0,
                        'icon' => 'fas fa-folder-open',
                    ],
                    [
                        'title' => 'Total Galeri',
                        'count' => $totalGaleri ?? 0,
                        'icon' => 'fas fa-images',
                    ],
                    [
                        'title' => 'Total Laporan',
                        'count' => $totalLaporan ?? 0,
                        'icon' => 'fas fa-clipboard-list',
                    ],
                ];
            @endphp

            @foreach ($stats as $stat)
                <div
                    class="group bg-white p-5 rounded-2xl border border-[#E7E1D2] hover:shadow-md transition-all duration-300 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest">{{ $stat['title'] }}</p>
                        <h4 class="text-2xl font-bold text-[#4A3728] mt-1">
                            {{ $stat['count'] }}
                        </h4>
                    </div>
                    <div
                        class="w-11 h-11 flex items-center justify-center bg-[#F6F2E6] text-[#234D2C] rounded-xl transition-transform group-hover:scale-110 flex-shrink-0">
                        <i class="{{ $stat['icon'] }} text-lg"></i>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- KARTU PENGATURAN POPUP, HEADER & MENU LAYANAN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            {{-- Kartu Popup --}}
            <div class="bg-white rounded-2xl border border-[#E7E1D2] p-5 flex flex-col items-start justify-between gap-4">
                <div class="flex items-center gap-4 w-full">
                    <div
                        class="bg-[#F6F2E6] text-[#234D2C] w-10 h-10 flex items-center justify-center rounded-lg flex-shrink-0">
                        <i class="fas fa-bullhorn text-sm"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-[#4A3728]">Pengaturan Pop-up</h4>
                        <p class="text-[11px] text-gray-400 font-medium mt-0.5">
                            Status:
                            @if (isset($popup) && $popup->gambar)
                                <span class="text-[#3C7245] font-bold">Tersedia</span>
                            @else
                                <span class="text-red-500 font-bold">Belum ada gambar</span>
                            @endif
                        </p>
                    </div>
                </div>
                <button type="button" onclick="openPopupModal()"
                    class="w-full bg-[#F6F2E6] hover:bg-[#234D2C] hover:text-white text-[#234D2C] text-xs font-bold py-2 px-4 rounded-lg transition-all flex items-center justify-center gap-2">
                    <i class="fas fa-edit"></i> Update Pop-up
                </button>
            </div>

            {{-- Kartu Header --}}
            <div class="bg-white rounded-2xl border border-[#E7E1D2] p-5 flex flex-col items-start justify-between gap-4">
                <div class="flex items-center gap-4 w-full">
                    <div
                        class="bg-[#F6F2E6] text-[#234D2C] w-10 h-10 flex items-center justify-center rounded-lg flex-shrink-0">
                        <i class="fas fa-image text-sm"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-[#4A3728]">Pengaturan Header</h4>
                        <p class="text-[11px] text-gray-400 font-medium mt-0.5">
                            Status:
                            @if (isset($header) && $header->gambar)
                                <span class="text-[#3C7245] font-bold">Terpasang</span>
                            @else
                                <span class="text-red-500 font-bold">Gambar Default</span>
                            @endif
                        </p>
                    </div>
                </div>
                <button type="button" onclick="openHeaderModal()"
                    class="w-full bg-[#F6F2E6] hover:bg-[#234D2C] hover:text-white text-[#234D2C] text-xs font-bold py-2 px-4 rounded-lg transition-all flex items-center justify-center gap-2">
                    <i class="fas fa-edit"></i> Update Header
                </button>
            </div>

            {{-- Kartu Menu Layanan --}}
            <div class="bg-white rounded-2xl border border-[#E7E1D2] p-5 flex flex-col items-start justify-between gap-4">
                <div class="flex items-center gap-4 w-full">
                    <div
                        class="bg-[#F6F2E6] text-[#234D2C] w-10 h-10 flex items-center justify-center rounded-lg flex-shrink-0">
                        <i class="fas fa-layer-group text-sm"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-[#4A3728]">Menu Layanan (FAB)</h4>
                        <p class="text-[11px] text-gray-400 font-medium mt-0.5">Kelola tombol pintasan</p>
                    </div>
                </div>
                <button type="button" onclick="openManageMenuModal()"
                    class="w-full bg-[#F6F2E6] hover:bg-[#234D2C] hover:text-white text-[#234D2C] text-xs font-bold py-2 px-4 rounded-lg transition-all flex items-center justify-center gap-2">
                    <i class="fas fa-cogs"></i> Kelola Menu
                </button>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MODAL FORM UPDATE HEADER --}}
        {{-- ========================================== --}}
        <div id="headerModal"
            class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity opacity-0 duration-300">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300"
                id="headerModalContent">
                <div class="bg-[#234D2C] px-5 py-3 flex justify-between items-center text-white">
                    <div>
                        <h3 class="text-sm font-semibold"><i class="fas fa-image mr-2"></i>Update Background Header</h3>
                    </div>
                    <button type="button" onclick="closeHeaderModal()" class="text-white/70 hover:text-white"><i
                            class="fas fa-times"></i></button>
                </div>
                <form action="{{ route('admin.header.update') }}" method="POST" enctype="multipart/form-data"
                    class="p-5">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div
                            class="w-full h-32 border-2 border-dashed border-[#E7E1D2] rounded-lg overflow-hidden flex items-center justify-center bg-[#F6F2E6] relative">
                            @if (isset($header) && $header->gambar)
                                <img src="{{ asset('storage/background/' . $header->gambar) }}"
                                    class="w-full h-full object-cover">
                            @else
                                <p class="text-[10px] text-gray-400">Belum ada gambar</p>
                            @endif
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Upload Gambar Baru</label>
                            <input type="file" name="gambar" accept=".jpg,.jpeg,.png" required
                                class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                        </div>
                    </div>
                    <div class="mt-5 flex justify-end gap-2 border-t pt-4">
                        <button type="button" onclick="closeHeaderModal()"
                            class="px-4 py-1.5 text-xs font-bold text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                        <button type="submit"
                            class="px-4 py-1.5 text-xs font-bold bg-[#234D2C] text-white rounded-lg hover:bg-[#17331D]">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MODAL FORM UPDATE POPUP --}}
        {{-- ========================================== --}}
        <div id="popupModal"
            class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity opacity-0 duration-300">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 overflow-hidden transform scale-95 transition-transform duration-300"
                id="popupModalContent">
                <div class="bg-[#234D2C] px-5 py-3 flex justify-between items-center text-white">
                    <div>
                        <p class="text-[10px] font-bold tracking-widest uppercase text-[#E8C077]">Perbarui</p>
                        <h3 class="text-sm font-semibold"><i class="fas fa-edit mr-2"></i>Update Pop-up</h3>
                    </div>
                    <button type="button" onclick="closePopupModal()" class="text-white/70 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form action="{{ route('admin.popup.update') }}" method="POST" enctype="multipart/form-data"
                    class="p-5">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div
                            class="w-full h-32 border-2 border-dashed border-[#E7E1D2] rounded-lg overflow-hidden flex items-center justify-center bg-[#F6F2E6] relative">
                            @if (isset($popup) && $popup->gambar)
                                <img src="{{ asset('storage/popup/' . $popup->gambar) }}"
                                    class="w-full h-full object-contain">
                            @else
                                <p class="text-[10px] text-gray-400">Belum ada gambar</p>
                            @endif
                        </div>

                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Kegiatan</label>
                                <input type="text" name="kegiatan" value="{{ $popup->kegiatan ?? '' }}"
                                    placeholder="Nama Kegiatan"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-[#234D2C]">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Gambar</label>
                                <input type="file" name="gambar" accept=".jpg,.jpeg,.png"
                                    class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 flex justify-end gap-2 border-t pt-4">
                        <button type="button" onclick="closePopupModal()"
                            class="px-4 py-1.5 text-xs font-bold text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                        <button type="submit"
                            class="px-4 py-1.5 text-xs font-bold bg-[#234D2C] text-white rounded-lg hover:bg-[#17331D]">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MODAL MANAJEMEN MENU LAYANAN (LIST DATA) --}}
        {{-- ========================================== --}}
        <div id="modalManageMenu"
            class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity opacity-0 duration-300">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 overflow-hidden transform scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]"
                id="modalManageMenuContent">

                <div class="bg-[#234D2C] px-5 py-3 flex justify-between items-center text-white flex-shrink-0">
                    <div>
                        <h3 class="text-sm font-semibold"><i class="fas fa-layer-group mr-2"></i>Kelola Menu Layanan</h3>
                    </div>
                    <button type="button" onclick="closeManageMenuModal()" class="text-white/70 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="p-5 flex-shrink-0 flex justify-between items-center border-b border-gray-100">
                    <p class="text-xs text-gray-500">Daftar menu melayang yang tampil di halaman publik.</p>
                    <button type="button" onclick="openAddMenuModal()"
                        class="px-4 py-2 bg-[#234D2C] hover:bg-[#17331D] text-white text-xs font-bold rounded-lg shadow-md transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Tambah Menu
                    </button>
                </div>

                <div class="p-5 overflow-y-auto space-y-3">
                    @if (isset($menuLayanan) && $menuLayanan->count() > 0)
                        @foreach ($menuLayanan as $menu)
                            <div
                                class="bg-gray-50 border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 hover:shadow-sm transition-shadow">
                                <div>
                                    <h4 class="font-bold text-[#234D2C]">{{ $menu->nama }}</h4>
                                    <div class="text-[11px] text-gray-500 mt-1 flex flex-col gap-0.5">
                                        @if ($menu->link)
                                            <p><i class="fas fa-link mr-1"></i> {{ $menu->link }}</p>
                                        @endif
                                        @if ($menu->file)
                                            <p><i class="fas fa-file-pdf mr-1 text-[#C68A2E]"></i> {{ $menu->file }}</p>
                                        @endif
                                        @if (!$menu->link && !$menu->file)
                                            <p class="text-red-400 italic"><i class="fas fa-exclamation-circle mr-1"></i>
                                                Link dan File kosong</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 w-full sm:w-auto">
                                    <button type="button"
                                        onclick="openEditMenuModal({{ $menu->id }}, '{{ addslashes($menu->nama) }}', '{{ $menu->link }}')"
                                        class="px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white border border-blue-200 rounded-lg text-[11px] font-bold transition-colors flex-1 sm:flex-none text-center">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <form action="{{ route('admin.menu_layanan.destroy', $menu->id) }}" method="POST"
                                        class="flex-1 sm:flex-none"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white border border-red-200 rounded-lg text-[11px] font-bold transition-colors text-center">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-6">
                            <p class="text-sm text-gray-400 italic">Belum ada menu yang ditambahkan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MODAL TAMBAH MENU LAYANAN --}}
        {{-- ========================================== --}}
        <div id="modalAddMenu"
            class="fixed inset-0 z-[60] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity opacity-0 duration-300">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden transform scale-95 transition-transform duration-300"
                id="modalAddMenuContent">
                <div class="bg-[#234D2C] px-5 py-3 flex justify-between items-center text-white">
                    <h3 class="text-sm font-semibold"><i class="fas fa-plus mr-2"></i>Tambah Menu Layanan</h3>
                    <button type="button" onclick="closeAddMenuModal()" class="text-white/70 hover:text-white"><i
                            class="fas fa-times"></i></button>
                </div>
                <form action="{{ route('admin.menu_layanan.store') }}" method="POST" enctype="multipart/form-data"
                    class="p-5">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Menu <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama" required placeholder="Contoh: WBS"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-[#234D2C]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link URL</label>
                            <input type="url" name="link" placeholder="https://..."
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-[#234D2C]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Atau Upload File</label>
                            <input type="file" name="file" accept=".pdf,.png,.jpg,.jpeg"
                                class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-2 border-t pt-4">
                        <button type="button" onclick="closeAddMenuModal()"
                            class="px-4 py-1.5 text-xs font-bold text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                        <button type="submit"
                            class="px-4 py-1.5 text-xs font-bold bg-[#234D2C] text-white rounded-lg hover:bg-[#17331D]">Simpan
                            Menu</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MODAL EDIT MENU LAYANAN --}}
        {{-- ========================================== --}}
        <div id="modalEditMenu"
            class="fixed inset-0 z-[60] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity opacity-0 duration-300">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden transform scale-95 transition-transform duration-300"
                id="modalEditMenuContent">
                <div class="bg-[#234D2C] px-5 py-3 flex justify-between items-center text-white">
                    <h3 class="text-sm font-semibold"><i class="fas fa-edit mr-2"></i>Edit Menu Layanan</h3>
                    <button type="button" onclick="closeEditMenuModal()" class="text-white/70 hover:text-white"><i
                            class="fas fa-times"></i></button>
                </div>
                <form id="formEditMenu" method="POST" enctype="multipart/form-data" class="p-5">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama Menu <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="editMenuNama" required
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-[#234D2C]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Link URL</label>
                            <input type="url" name="link" id="editMenuLink" placeholder="https://..."
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-[#234D2C]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Timpa File (Kosongkan jika
                                tidak diganti)</label>
                            <input type="file" name="file" accept=".pdf,.png,.jpg,.jpeg"
                                class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:bg-[#F6F2E6] file:text-[#234D2C] border rounded-lg p-1">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-2 border-t pt-4">
                        <button type="button" onclick="closeEditMenuModal()"
                            class="px-4 py-1.5 text-xs font-bold text-gray-600 hover:bg-gray-100 rounded-lg">Batal</button>
                        <button type="submit"
                            class="px-4 py-1.5 text-xs font-bold bg-[#234D2C] text-white rounded-lg hover:bg-[#17331D]">Update
                            Menu</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    {{-- Javascript untuk Animasi Semua Modal --}}
    <script>
        // --- Modal Header ---
        const hModal = document.getElementById('headerModal');
        const hContent = document.getElementById('headerModalContent');

        function openHeaderModal() {
            hModal.classList.remove('hidden');
            setTimeout(() => {
                hModal.classList.remove('opacity-0');
                hContent.classList.remove('scale-95');
            }, 10);
        }

        function closeHeaderModal() {
            hModal.classList.add('opacity-0');
            hContent.classList.add('scale-95');
            setTimeout(() => {
                hModal.classList.add('hidden');
            }, 300);
        }

        // --- Modal Popup ---
        const pModal = document.getElementById('popupModal');
        const pContent = document.getElementById('popupModalContent');

        function openPopupModal() {
            pModal.classList.remove('hidden');
            setTimeout(() => {
                pModal.classList.remove('opacity-0');
                pContent.classList.remove('scale-95');
            }, 10);
        }

        function closePopupModal() {
            pModal.classList.add('opacity-0');
            pContent.classList.add('scale-95');
            setTimeout(() => {
                pModal.classList.add('hidden');
            }, 300);
        }

        // --- Modal Kelola Menu (List) ---
        const modalManageMenu = document.getElementById('modalManageMenu');
        const modalManageMenuContent = document.getElementById('modalManageMenuContent');

        function openManageMenuModal() {
            modalManageMenu.classList.remove('hidden');
            setTimeout(() => {
                modalManageMenu.classList.remove('opacity-0');
                modalManageMenuContent.classList.remove('scale-95');
            }, 10);
        }

        function closeManageMenuModal() {
            modalManageMenu.classList.add('opacity-0');
            modalManageMenuContent.classList.add('scale-95');
            setTimeout(() => {
                modalManageMenu.classList.add('hidden');
            }, 300);
        }

        // --- Modal Tambah Menu ---
        const modalAddMenu = document.getElementById('modalAddMenu');
        const modalAddMenuContent = document.getElementById('modalAddMenuContent');

        function openAddMenuModal() {
            closeManageMenuModal(); // Tutup modal list sementara
            setTimeout(() => {
                modalAddMenu.classList.remove('hidden');
                setTimeout(() => {
                    modalAddMenu.classList.remove('opacity-0');
                    modalAddMenuContent.classList.remove('scale-95');
                }, 10);
            }, 300);
        }

        function closeAddMenuModal() {
            modalAddMenu.classList.add('opacity-0');
            modalAddMenuContent.classList.add('scale-95');
            setTimeout(() => {
                modalAddMenu.classList.add('hidden');
                openManageMenuModal(); // Buka kembali list
            }, 300);
        }

        // --- Modal Edit Menu ---
        const modalEditMenu = document.getElementById('modalEditMenu');
        const modalEditMenuContent = document.getElementById('modalEditMenuContent');

        function openEditMenuModal(id, nama, link) {
            closeManageMenuModal(); // Tutup modal list sementara

            // Isi nilai form
            document.getElementById('editMenuNama').value = nama;
            document.getElementById('editMenuLink').value = link;

            // Set URL Action Form dynamically
            document.getElementById('formEditMenu').action = `/admin/menu-layanan/${id}`;

            setTimeout(() => {
                modalEditMenu.classList.remove('hidden');
                setTimeout(() => {
                    modalEditMenu.classList.remove('opacity-0');
                    modalEditMenuContent.classList.remove('scale-95');
                }, 10);
            }, 300);
        }

        function closeEditMenuModal() {
            modalEditMenu.classList.add('opacity-0');
            modalEditMenuContent.classList.add('scale-95');
            setTimeout(() => {
                modalEditMenu.classList.add('hidden');
                openManageMenuModal(); // Buka kembali list
            }, 300);
        }
    </script>
@endsection
