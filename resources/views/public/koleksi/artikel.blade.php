@extends('layouts.public')
@section('title', 'Artikel & Wawasan Pertanian')

@section('content')
    <section class="pt-12 pb-16">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Artikel dan Wawasan Pertanian</h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>
            <div class="flex flex-col gap-2"> {{-- gap-2 untuk jarak antar baris yang rapat --}}
                @forelse ($artikel as $item)
                    @php
                        $extension = pathinfo($item->file, PATHINFO_EXTENSION);
                        $fileUrl = asset('storage/galeri/' . $item->file);
                    @endphp

                    {{-- Baris Tunggal --}}
                    <div
                        class="flex items-center bg-white p-3 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">

                        {{-- KIRI: Logo File (Kecil) --}}
                        <div
                            class="w-10 h-10 flex-shrink-0 flex items-center justify-center bg-gray-50 rounded text-red-500 border border-gray-200">
                            <i class="fas fa-file-{{ strtolower($extension) == 'pdf' ? 'pdf' : 'alt' }} text-lg"></i>
                        </div>

                        {{-- TENGAH: Judul & Deskripsi --}}
                        <div class="flex-grow px-4 overflow-hidden">
                            <h3 class="text-sm font-bold text-gray-800 truncate">{{ $item->kegiatan }}</h3>
                            <p class="text-[11px] text-gray-500 truncate">{{ Str::limit($item->deskripsi, 60) }}</p>
                        </div>

                        {{-- KANAN: Tombol Download --}}
                        <a href="{{ $fileUrl }}" download
                            class="flex-shrink-0 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-bold rounded shadow-sm transition">
                            Unduh
                        </a>
                    </div>
                @empty
                    <p class="text-center text-gray-400 py-10">Belum ada artikel tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
