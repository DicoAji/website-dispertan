@extends('layouts.public')
@section('title', 'Dokumen Publik')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-20 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="text-center mb-6 md:mb-10">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-1">Dokumen Publik</h2>
                <p class="text-emerald-600 italic text-xs md:text-sm">Pusat unduhan dokumen resmi Dinas Pertanian Kabupaten
                    Grobogan</p>
            </div>

            {{-- FILTER KATEGORI UNTUK MOBILE --}}
            <div class="block md:hidden mb-6 overflow-x-auto no-scrollbar pb-2">
                <div class="flex items-center gap-2 whitespace-nowrap px-1" id="mobile-sidebar-menu">
                    <button onclick="filterDokumen('semua', this)"
                        class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shadow-sm mobile-menu-btn bg-emerald-700 text-white">
                        Semua
                    </button>
                    @foreach ($kategoriList as $kategori)
                        <button onclick="filterDokumen('{{ strtoupper($kategori) }}', this)"
                            class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shadow-sm mobile-menu-btn bg-white text-gray-600 border border-gray-200">
                            {{ $kategori }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                {{-- SIDEBAR (Desktop) --}}
                <div class="hidden md:block md:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                        <div class="bg-gradient-to-r from-emerald-800 to-emerald-700 px-4 py-3">
                            <h3 class="text-white font-semibold text-sm"><i class="fas fa-folder-tree mr-2"></i> Kategori
                            </h3>
                        </div>
                        <ul class="flex flex-col divide-y divide-gray-100" id="sidebar-menu">
                            <li>
                                <button onclick="filterDokumen('semua', this)"
                                    class="w-full text-left px-5 py-3 text-sm font-semibold text-emerald-700 bg-emerald-50 border-l-4 border-emerald-600 menu-btn transition-colors">
                                    <i class="fas fa-layer-group mr-2 text-xs"></i>Semua Dokumen
                                </button>
                            </li>
                            @foreach ($kategoriList as $kategori)
                                <li>
                                    <button onclick="filterDokumen('{{ strtoupper($kategori) }}', this)"
                                        class="w-full text-left px-5 py-3 text-sm font-semibold text-gray-600 border-l-4 border-transparent hover:bg-emerald-50 hover:text-emerald-700 transition-colors menu-btn">
                                        <i class="fas fa-tag mr-2 text-xs text-gray-300"></i>{{ $kategori }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- KONTEN --}}
                <div class="md:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-5 min-h-[400px]">
                        <h3
                            class="text-sm md:text-md font-bold text-gray-800 mb-3 md:mb-4 pb-2 border-b border-gray-100 flex items-center">
                            <i class="fas fa-file-lines text-emerald-600 mr-2"></i> Daftar Dokumen
                        </h3>

                        <div class="space-y-2">
                            {{-- Looping Dokumen --}}
                            @forelse ($dokumen as $doc)
                                <div class="doc-item flex items-center justify-between gap-3 p-3 border border-gray-100 rounded-lg hover:shadow-md hover:border-emerald-100 transition bg-gray-50/60 hover:bg-white group"
                                    data-kategori="{{ strtoupper($doc->kategori) }}">

                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="bg-red-50 p-2 rounded-md text-red-500 flex-shrink-0">
                                            <i class="fas fa-file-pdf text-lg md:text-xl"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="font-semibold text-gray-800 text-xs md:text-sm truncate">
                                                {{ $doc->uraian }}</h4>
                                            <p class="text-[9px] md:text-[10px] text-gray-400 mt-0.5">
                                                <i
                                                    class="far fa-calendar mr-1 text-emerald-400"></i>{{ $doc->created_at->format('d F Y') }}
                                                <span class="mx-1">·</span>
                                                <span
                                                    class="uppercase font-semibold text-emerald-600">{{ $doc->kategori }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    {{-- Tombol Download Simple & Di Samping --}}
                                    <a href="{{ asset('storage/dokumen/' . $doc->file) }}" target="_blank"
                                        class="flex-shrink-0 inline-flex items-center justify-center bg-gray-100 text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 border border-gray-200 px-3 py-1.5 rounded-md text-[11px] font-medium transition">
                                        <i class="fas fa-download mr-1.5 text-gray-400 group-hover:text-emerald-600"></i>
                                        Unduh
                                    </a>
                                </div>
                            @empty
                                <div class="text-center py-12 text-gray-400">
                                    <i class="fas fa-folder-open fa-3x mb-3 text-gray-200"></i>
                                    <p class="text-xs md:text-sm">Belum ada dokumen yang diunggah.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function filterDokumen(kategori, clickedElement) {
            let items = document.querySelectorAll('.doc-item');

            items.forEach(item => {
                let docKategori = item.getAttribute('data-kategori').toUpperCase();
                let targetKategori = kategori.toUpperCase();

                if (targetKategori === 'SEMUA' || docKategori === targetKategori) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });

            // Styling tombol aktif untuk Desktop (Sidebar)
            let allDesktopButtons = document.querySelectorAll('.menu-btn');
            allDesktopButtons.forEach(btn => {
                btn.classList.remove('bg-emerald-50', 'text-emerald-700', 'border-emerald-600');
                btn.classList.add('text-gray-600', 'border-transparent');
            });

            // Styling tombol aktif untuk Mobile (Chips)
            let allMobileButtons = document.querySelectorAll('.mobile-menu-btn');
            allMobileButtons.forEach(btn => {
                btn.classList.remove('bg-emerald-700', 'text-white');
                btn.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-200');
            });

            let targetText = kategori.toUpperCase();

            allDesktopButtons.forEach(btn => {
                if (btn.textContent.trim().toUpperCase().includes(targetText) || (targetText === 'SEMUA' && btn
                        .textContent.trim().toUpperCase().includes('SEMUA'))) {
                    btn.classList.remove('text-gray-600', 'border-transparent');
                    btn.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-600');
                }
            });

            allMobileButtons.forEach(btn => {
                if (btn.textContent.trim().toUpperCase() === targetText) {
                    btn.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-200');
                    btn.classList.add('bg-emerald-700', 'text-white');
                }
            });
        }
    </script>
@endsection
