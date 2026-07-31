@extends('layouts.public')
@section('title', 'Dokumen Publik')

@section('content')
    <section class="pt-12 pb-20 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1">Dokumen Publik</h2>
                <p class="text-emerald-600 italic text-sm">Pusat unduhan dokumen resmi Dinas Pertanian Kabupaten Grobogan</p>
                {{-- <div class="w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-3"></div> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                {{-- SIDEBAR --}}
                <div class="md:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-24">
                        <div class="bg-gradient-to-r from-emerald-800 to-emerald-700 px-4 py-3">
                            <h3 class="text-white font-semibold text-sm"><i class="fas fa-folder-tree mr-2"></i> Kategori
                            </h3>
                        </div>
                        <ul class="flex flex-col divide-y divide-gray-100" id="sidebar-menu">
                            {{-- Tombol "Semua" --}}
                            <li>
                                <button onclick="filterDokumen('semua', this)"
                                    class="w-full text-left px-5 py-3 text-sm font-semibold text-emerald-700 bg-emerald-50 border-l-4 border-emerald-600 menu-btn transition-colors">
                                    <i class="fas fa-layer-group mr-2 text-xs"></i>Semua Dokumen
                                </button>
                            </li>

                            {{-- Tombol kategori dinamis --}}
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
                        <h3 class="text-md font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100 flex items-center">
                            <i class="fas fa-file-lines text-emerald-600 mr-2"></i> Daftar Dokumen
                        </h3>

                        <div class="space-y-2">
                            {{-- Looping Dokumen --}}
                            @forelse ($dokumen as $doc)
                                {{-- Kita gunakan strtoupper agar konsisten dengan data di database --}}
                                <div class="doc-item flex flex-col sm:flex-row sm:items-center justify-between gap-2 p-3 border border-gray-100 rounded-lg hover:shadow-md hover:border-emerald-100 transition bg-gray-50/60 hover:bg-white group"
                                    data-kategori="{{ strtoupper($doc->kategori) }}">

                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="bg-red-50 p-2 rounded-md text-red-500 flex-shrink-0">
                                            <i class="fas fa-file-pdf text-lg"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="font-semibold text-gray-800 text-sm truncate">
                                                {{ $doc->uraian }}</h4>
                                            <p class="text-[10px] text-gray-400 mt-0.5">
                                                <i
                                                    class="far fa-calendar mr-1 text-emerald-400"></i>{{ $doc->created_at->format('d F Y') }}
                                                <span class="mx-1">·</span>
                                                <span
                                                    class="uppercase font-semibold text-emerald-600">{{ $doc->kategori }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <a href="{{ asset('storage/dokumen/' . $doc->file) }}" target="_blank"
                                        class="flex-shrink-0 inline-flex items-center justify-center bg-emerald-600 text-white px-3 py-1.5 rounded-md text-[11px] font-bold hover:bg-emerald-700 transition shadow-sm mt-2 sm:mt-0">
                                        <i class="fas fa-download mr-1"></i> Download
                                    </a>
                                </div>
                            @empty
                                <div class="text-center py-12 text-gray-400">
                                    <i class="fas fa-folder-open fa-3x mb-3 text-gray-200"></i>
                                    <p class="text-sm">Belum ada dokumen yang diunggah.</p>
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

            // Styling tombol aktif
            let allButtons = document.querySelectorAll('.menu-btn');
            allButtons.forEach(btn => {
                btn.classList.remove('bg-emerald-50', 'text-emerald-700', 'border-emerald-600');
                btn.classList.add('text-gray-600', 'border-transparent');
            });
            clickedElement.classList.remove('text-gray-600', 'border-transparent');
            clickedElement.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-600');
        }
    </script>
@endsection
