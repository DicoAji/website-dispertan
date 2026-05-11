@extends('layouts.public')

@section('title', 'Galeri Foto')
@section('content')

    <section class="pt-12">
        <div class="container mx-auto px-4 max-w-7xl space-y-8">

            <div class="text-center  ">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Galeri dan Foto</h2>
                <p class="text-green-600  italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>
            @if (count($koleksiFoto) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                    @foreach ($koleksiFoto as $foto)
                        {{-- Card Foto --}}
                        <div
                            class="group relative overflow-hidden rounded-xl shadow-md border border-gray-100 bg-white cursor-pointer hover:shadow-xl transition-all duration-300">

                            {{-- Area Gambar --}}
                            <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                                {{-- Menggunakan asset() untuk memanggil file gambar asli dari storage --}}
                                <img src="{{ asset('storage/galeri/' . $foto->file) }}" alt="{{ $foto->kegiatan }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                                {{-- Overlay gelap + Icon saat di Hover --}}
                                <div
                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <div class="bg-white/20 p-3 rounded-full backdrop-blur-sm">
                                        <i class="fas fa-search-plus text-white text-2xl"></i>
                                    </div>
                                </div>
                            </div>

                            {{-- Informasi Foto --}}
                            <div class="p-4 border-t border-gray-50">
                                <h3 class="font-bold text-gray-800 text-lg line-clamp-1 group-hover:text-green-600 transition-colors"
                                    title="{{ $foto->kegiatan }}">
                                    {{ $foto->kegiatan }}
                                </h3>

                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                {{-- ... (kode kosong tetap sama) ... --}}
            @endif
        </div>
    </section>
@endsection
