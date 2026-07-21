@extends('layouts.public')
@section('title', 'Dokumen Publik')

@section('content')
    <section class="pt-12 pb-20 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Inovasi Daerah</h2>
                <p class="text-gray-500">Pusat unduhan dokumen resmi Dinas Pertanian Kabupaten Grobogan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                {{-- SIDEBAR --}}
                <div class="md:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-24">
                        <div class="bg-emerald-700 px-4 py-2">
                            <h3 class="text-white font-semibold text-md"><i class="fas fa-list-ul mr-2"></i> Kategori</h3>
                        </div>
                        <ul class="flex flex-col divide-y divide-gray-100" id="sidebar-menu">
                            {{-- Tombol "Semua" --}}
                            <li>
                                <button onclick="filterDokumen('semua', this)"
                                    class="w-full text-left px-5 py-2.5 text-sm font-semibold text-emerald-700 bg-emerald-50 border-l-4 border-emerald-600 menu-btn">
                                    Semua Dokumen
                                </button>
                            </li>

                            {{-- Tombol kategori dinamis --}}
                            @foreach ($kategoriList as $kategori)
                                <li>
                                    <button onclick="filterDokumen('{{ strtoupper($kategori) }}', this)"
                                        class="w-full text-left px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-emerald-50 hover:text-emerald-700 transition-colors menu-btn">
                                        {{ $kategori }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- KONTEN --}}
                <div class="md:col-span-3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:p-8 min-h-[500px]">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-3">Daftar Dokumen</h2>
                        <div class="space-y-3">
                            {{-- Looping Dokumen --}}
                            @forelse ($dokumen as $doc)
                                {{-- Kita gunakan strtoupper agar konsisten dengan data di database --}}
                                <div class="doc-item flex flex-col sm:flex-row sm:items-center justify-between p-3 border border-gray-100 rounded-lg hover:shadow-md transition bg-gray-50 hover:bg-white group"
                                    data-kategori="{{ strtoupper($doc->kategori) }}">

                                    <div class="flex items-center gap-4">
                                        <div class="bg-red-100 p-2 rounded-lg text-red-500">
                                            <i class="fas fa-file-pdf text-xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 text-sm md:text-base">{{ $doc->uraian }}
                                            </h4>
                                            <p class="text-[11px] text-gray-400">
                                                Diunggah: {{ $doc->created_at->format('d F Y') }} | {{ $doc->kategori }}
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/dokumen/' . $doc->file) }}" target="_blank"
                                        class="bg-emerald-100 text-emerald-700 px-5 py-2.5 rounded-lg text-xs font-bold hover:bg-emerald-600 hover:text-white transition">
                                        <i class="fas fa-download mr-1"></i> Download
                                    </a>
                                </div>
                            @empty
                                <div class="text-center py-20 text-gray-400">
                                    <i class="fas fa-folder-open fa-4x mb-4 text-gray-200"></i>
                                    <p>Belum ada dokumen yang diunggah.</p>
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
                btn.classList.remove('bg-emerald-50', 'text-emerald-700', 'border-l-4', 'border-emerald-600');
                btn.classList.add('text-gray-600');
            });
            clickedElement.classList.remove('text-gray-600');
            clickedElement.classList.add('bg-emerald-50', 'text-emerald-700', 'border-l-4', 'border-emerald-600');
        }
    </script>
@endsection
