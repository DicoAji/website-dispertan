@extends('layouts.public')
@section('title', 'Koleksi Video')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-16 bg-gray-50">
        <div class="container mx-auto px-3 sm:px-4 max-w-7xl">

            {{-- HEADER --}}
            <div class="text-center mb-6 md:mb-8">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-1">Video Kegiatan</h2>
                <p class="text-emerald-600 italic text-xs md:text-sm">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
                <div class="w-10 md:w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-2 md:mt-3"></div>
            </div>

            {{-- Grid Video: 2 kolom di mobile, 1 kolom ke bawah untuk tablet/desktop (atau tetap sesuaikan kebutuhan) --}}
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
                @forelse ($video as $item)
                    {{-- Kartu Video (Layout vertikal agar pas di 2 kolom mobile) --}}
                    <div
                        class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col overflow-hidden group">

                        {{-- Thumbnail --}}
                        <div class="w-full aspect-video overflow-hidden bg-gray-100 relative cursor-pointer"
                            onclick="window.open('{{ $item->deskripsi }}', '_blank')">
                            <img src="{{ asset('storage/galeri/' . $item->file) }}" alt="Thumbnail"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            {{-- Overlay Play --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/10 transition">
                                <div
                                    class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center bg-white/90 rounded-full shadow-lg">
                                    <i class="fas fa-play text-red-600 text-xs md:text-sm ml-0.5"></i>
                                </div>
                            </div>
                        </div>

                        {{-- Konten & Tombol --}}
                        <div class="p-3 flex flex-col justify-between flex-grow">
                            <div>
                                <h3 class="text-xs md:text-sm font-semibold text-gray-800 mb-1 line-clamp-2 leading-snug">
                                    {{ $item->kegiatan }}</h3>
                                <div class="flex items-center text-[10px] md:text-xs text-gray-400 gap-2 mb-3">
                                    <span><i
                                            class="fas fa-calendar-alt mr-1 text-emerald-500"></i>{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            {{-- Tombol Tonton (Simple & Tidak Mencolok) --}}
                            <a href="{{ $item->deskripsi }}" target="_blank"
                                class="w-full inline-flex items-center justify-center bg-gray-100 text-gray-700 hover:bg-red-50 hover:text-red-600 hover:border-red-200 border border-gray-200 px-3 py-1.5 rounded-md text-[11px] font-medium transition">
                                <i class="fas fa-play mr-1.5 text-gray-400 group-hover:text-red-600"></i> Tonton Video
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-400">
                        <i class="fas fa-video fa-3x mb-3 text-gray-200"></i>
                        <p class="text-xs md:text-sm">Belum ada video tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
