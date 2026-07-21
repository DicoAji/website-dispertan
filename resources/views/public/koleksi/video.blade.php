@extends('layouts.public')
@section('title', 'Koleksi Video')

@section('content')
    <section class="pt-12 pb-16">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Video Kegiatan</h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>

            <div class="flex flex-col gap-6">
                @forelse ($video as $item)
                    {{-- Pembungkus utama: flex-col pada mobile, flex-row pada desktop --}}
                    <div
                        class="flex flex-col md:flex-row items-center bg-white p-3 rounded-md border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">

                        {{-- KIRI: Thumbnail (Lebar penuh pada mobile, w-40 pada desktop) --}}
                        <div
                            class="w-full md:w-40 h-48 md:h-24 flex-shrink-0 overflow-hidden bg-gray-100 relative group cursor-pointer">
                            <img src="{{ asset('storage/galeri/' . $item->file) }}" alt="Thumbnail"
                                class="w-full h-full object-cover rounded-md transition-transform duration-500 group-hover:scale-110">
                            {{-- Overlay Play --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/10 transition">
                                <div class="w-10 h-10 flex items-center justify-center bg-white/90 rounded-full shadow-lg">
                                    <i class="fas fa-play text-red-600 text-sm ml-1"></i>
                                </div>
                            </div>
                        </div>

                        {{-- TENGAH: Judul & Info --}}
                        <div class="flex-grow w-full px-0 md:px-6 py-4 md:py-0">
                            <h3 class="text-lg font-bold text-gray-800 mb-1 leading-tight">{{ $item->kegiatan }}</h3>
                            <div class="flex items-center text-xs text-gray-500 gap-4">
                                <span><i class="fas fa-calendar-alt mr-1"></i>
                                    {{ $item->created_at->format('d M Y') }}</span>
                                <span class="px-2 py-0.5 bg-red-50 text-red-600 font-bold rounded">Video</span>
                            </div>
                        </div>

                        {{-- KANAN: Tombol Link Video (Lebar penuh pada mobile) --}}
                        <a href="{{ $item->deskripsi }}" target="_blank"
                            class="w-full md:w-auto justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md shadow-md transition-all hover:scale-105 flex items-center gap-2">
                            <i class="fas fa-external-link-alt"></i> Tonton
                        </a>
                    </div>
                @empty
                    <div class="text-center py-20 text-gray-400">
                        <i class="fas fa-video fa-3x mb-4"></i>
                        <p>Belum ada video tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
