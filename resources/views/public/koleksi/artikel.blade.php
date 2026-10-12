@extends('layouts.public')
@section('title', 'Artikel & Wawasan Pertanian')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">

            {{-- HEADER --}}
            <div class="text-center mb-6 md:mb-8">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-1">Artikel dan Wawasan Pertanian</h2>
                <p class="text-emerald-600 italic text-xs md:text-sm">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
                <div class="w-10 md:w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-2 md:mt-3"></div>
            </div>

            <div class="flex flex-col gap-2.5 md:gap-3">
                @forelse ($artikel as $item)
                    @php
                        $extension = pathinfo($item->file, PATHINFO_EXTENSION);
                        $fileUrl = asset('storage/galeri/' . $item->file);
                    @endphp

                    {{-- Baris Tunggal --}}
                    <div
                        class="flex items-center justify-between bg-white p-3 md:p-3.5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-emerald-100 transition group">

                        <div class="flex items-center gap-3 min-w-0">
                            {{-- KIRI: Logo File --}}
                            <div
                                class="w-9 h-9 md:w-11 md:h-11 flex-shrink-0 flex items-center justify-center bg-emerald-50 rounded-lg text-red-500 border border-emerald-100">
                                <i
                                    class="fas fa-file-{{ strtolower($extension) == 'pdf' ? 'pdf' : 'alt' }} text-base md:text-lg"></i>
                            </div>

                            {{-- TENGAH: Judul & Deskripsi --}}
                            <div class="min-w-0">
                                <h3 class="text-xs md:text-sm font-bold text-gray-800 truncate leading-snug">
                                    {{ $item->kegiatan }}</h3>
                                <p class="text-[10px] md:text-[11px] text-gray-500 truncate mt-0.5">
                                    {{ Str::limit($item->deskripsi, 60) }}</p>
                            </div>
                        </div>

                        {{-- KANAN: Tombol Download Simple & Di Samping --}}
                        <a href="{{ $fileUrl }}" download
                            class="flex-shrink-0 ml-3 inline-flex items-center justify-center bg-gray-100 text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 hover:border-emerald-200 border border-gray-200 px-3 py-1.5 rounded-md text-[11px] font-medium transition">
                            <i class="fas fa-download mr-1 text-gray-400 group-hover:text-emerald-600"></i> Unduh
                        </a>
                    </div>
                @empty
                    <div class="text-center py-12 md:py-16 text-gray-400">
                        <i class="fas fa-newspaper fa-3x mb-3 text-gray-200"></i>
                        <p class="text-xs md:text-sm">Belum ada artikel tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
