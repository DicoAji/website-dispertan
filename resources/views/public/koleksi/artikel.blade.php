@extends('layouts.public')
@section('title', 'Artikel & Wawasan Pertanian')

@section('content')
    <section class="pt-12 pb-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">

            {{-- HEADER --}}
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1">Artikel dan Wawasan Pertanian</h2>
                <p class="text-emerald-600 italic text-sm">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
                <div class="w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-3"></div>
            </div>

            <div class="flex flex-col gap-3">
                @forelse ($artikel as $item)
                    @php
                        $extension = pathinfo($item->file, PATHINFO_EXTENSION);
                        $fileUrl = asset('storage/galeri/' . $item->file);
                    @endphp

                    {{-- Baris Tunggal --}}
                    <div
                        class="flex items-center bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md hover:border-emerald-100 transition">

                        {{-- KIRI: Logo File --}}
                        <div
                            class="w-11 h-11 flex-shrink-0 flex items-center justify-center bg-emerald-50 rounded-lg text-red-500 border border-emerald-100">
                            <i class="fas fa-file-{{ strtolower($extension) == 'pdf' ? 'pdf' : 'alt' }} text-lg"></i>
                        </div>

                        {{-- TENGAH: Judul & Deskripsi --}}
                        <div class="flex-grow px-4 overflow-hidden">
                            <h3 class="text-sm font-bold text-gray-800 truncate">{{ $item->kegiatan }}</h3>
                            <p class="text-[11px] text-gray-500 truncate">{{ Str::limit($item->deskripsi, 60) }}</p>
                        </div>

                        {{-- KANAN: Tombol Download --}}
                        <a href="{{ $fileUrl }}" download
                            class="flex-shrink-0 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-bold rounded-lg shadow-sm transition">
                            <i class="fas fa-download mr-1"></i> Unduh
                        </a>
                    </div>
                @empty
                    <div class="text-center py-16 text-gray-400">
                        <i class="fas fa-newspaper fa-3x mb-4 text-gray-200"></i>
                        <p>Belum ada artikel tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
