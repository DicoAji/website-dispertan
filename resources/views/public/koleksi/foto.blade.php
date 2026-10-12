@extends('layouts.public')
@section('title', 'Galeri Foto')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-16 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-3 sm:px-4 max-w-7xl">

            {{-- HEADER --}}
            <div class="text-center mb-6 md:mb-8">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-1">Galeri Foto Kegiatan</h2>
                <p class="text-emerald-600 italic text-xs md:text-sm">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
                <div class="w-10 md:w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-2 md:mt-3"></div>
            </div>

            @if (isset($foto) && count($foto) > 0)
                {{-- Grid: 2 kolom di mobile, 3 di tablet, 4 di desktop --}}
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
                    @foreach ($foto as $item)
                        @php
                            $imageUrl = asset('storage/galeri/' . $item->file);
                        @endphp

                        {{-- Kartu Foto --}}
                        <div
                            class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col">

                            {{-- Area Gambar (Bisa diklik untuk memperbesar) --}}
                            <div class="aspect-square overflow-hidden bg-gray-100 cursor-pointer relative"
                                onclick="openLightbox('{{ $imageUrl }}', '{{ addslashes($item->kegiatan) }}')">
                                <img src="{{ $imageUrl }}" alt="{{ $item->kegiatan }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                <div
                                    class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white">
                                    <i class="fas fa-search-plus text-xl drop-shadow-md"></i>
                                </div>
                            </div>

                            {{-- Area Informasi --}}
                            <div class="p-2.5 sm:p-4 flex flex-col justify-between flex-grow">
                                <h3 class="text-xs sm:text-sm font-bold text-gray-800 line-clamp-1 mb-1">
                                    {{ $item->kegiatan }}</h3>
                                <p class="text-[9px] sm:text-[10px] text-gray-400 uppercase tracking-wider font-semibold">
                                    {{ $item->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 text-gray-400">
                    <i class="fas fa-camera fa-3x mb-3 text-gray-200"></i>
                    <p class="text-xs md:text-sm">Belum ada foto yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- MODAL LIGHTBOX (Pop-up Gambar Ukuran Penuh) --}}
    <div id="lightboxModal"
        class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-3 md:p-6"
        onclick="closeLightbox()">
        <div class="relative max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl flex flex-col max-h-[90vh]"
            onclick="event.stopPropagation()">

            {{-- Tombol Close --}}
            <button onclick="closeLightbox()"
                class="absolute top-3 right-3 z-10 w-9 h-9 bg-black/50 hover:bg-black/70 text-white rounded-full flex items-center justify-center transition">
                <i class="fas fa-times text-lg"></i>
            </button>

            {{-- Gambar Utama Modal --}}
            <div class="overflow-auto bg-black flex items-center justify-center max-h-[75vh]">
                <img id="lightboxImg" src="" alt="" class="max-w-full max-h-[75vh] object-contain">
            </div>

            {{-- Keterangan / Judul Foto --}}
            <div class="p-4 bg-white border-t border-gray-100 flex items-center justify-between">
                <h4 id="lightboxTitle" class="font-bold text-gray-800 text-xs sm:text-sm md:text-base line-clamp-1"></h4>
                <span class="text-[10px] md:text-xs text-gray-400 font-semibold uppercase tracking-wider">Preview
                    Galeri</span>
            </div>
        </div>
    </div>

    {{-- Script Lightbox --}}
    <script>
        function openLightbox(url, title) {
            const modal = document.getElementById('lightboxModal');
            const img = document.getElementById('lightboxImg');
            const titleEl = document.getElementById('lightboxTitle');

            img.src = url;
            titleEl.textContent = title;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // Mencegah background ikut scroll
        }

        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Mengembalikan scroll body
        }

        // Tutup modal dengan tombol ESC keyboard
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeLightbox();
            }
        });
    </script>
@endsection
