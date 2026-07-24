@extends('layouts.public')
@section('title', 'Galeri Foto')

@section('content')
    <section class="pt-12 pb-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">

            {{-- HEADER --}}
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1">Galeri Foto Kegiatan</h2>
                <p class="text-emerald-600 italic text-sm">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
                <div class="w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-3"></div>
            </div>

            @if (isset($foto) && count($foto) > 0)
                {{-- Grid 1 kolom (mobile), 2 kolom (tablet), 4 kolom (desktop) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($foto as $item)
                        {{-- Kartu Foto --}}
                        <div
                            class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">

                            {{-- Area Gambar --}}
                            <div class="aspect-square overflow-hidden bg-gray-100 relative">
                                <img src="{{ asset('storage/galeri/' . $item->file) }}" alt="{{ $item->kegiatan }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                    <span class="text-white text-[10px] font-semibold inline-flex items-center gap-1">
                                        <i class="fas fa-magnifying-glass-plus"></i> Lihat
                                    </span>
                                </div>
                            </div>

                            {{-- Area Informasi --}}
                            <div class="p-4">
                                <h3 class="text-sm font-bold text-gray-800 line-clamp-1 mb-1">{{ $item->kegiatan }}</h3>
                                <p class="text-[10px] text-emerald-600 uppercase tracking-wider font-semibold">
                                    <i class="far fa-calendar mr-1"></i>{{ $item->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 text-gray-400">
                    <i class="fas fa-camera fa-3x mb-4 text-gray-200"></i>
                    <p>Belum ada foto yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
