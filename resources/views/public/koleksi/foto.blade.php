@extends('layouts.public')
@section('title', 'Galeri Foto')

@section('content')
    <section class="pt-12 pb-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Galeri Foto Kegiatan</h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>

            @if (isset($foto) && count($foto) > 0)
                {{-- Grid 1 kolom (mobile), 2 kolom (tablet), 4 kolom (desktop) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($foto as $item)
                        {{-- Kartu Foto --}}
                        <div
                            class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">

                            {{-- Area Gambar --}}
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ asset('storage/galeri/' . $item->file) }}" alt="{{ $item->kegiatan }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>

                            {{-- Area Informasi --}}
                            <div class="p-4">
                                <h3 class="text-sm font-bold text-gray-800 line-clamp-1 mb-1">{{ $item->kegiatan }}</h3>
                                <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold">
                                    {{ $item->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 text-gray-400">
                    <i class="fas fa-camera fa-3x mb-4"></i>
                    <p>Belum ada foto yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
