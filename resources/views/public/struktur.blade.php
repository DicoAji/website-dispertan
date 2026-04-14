@extends('layouts.public')
@section('title', 'Struktur Organisasi')

@section('content')
    <section class=" ">
        <div class="container mx-auto px-4 max-w-5xl space-y-8">
            {{-- Header Halaman --}}
            <div class="text-center ">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Struktur Organisasi</h2>
                <p class="text-green-600 font-medium italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Kontainer Bagan --}}
            <div class="">
                @if ($profile && $profile->struktur_organisasi)
                    <div class="relative group flex flex-col items-center justify-center ">
                        <img src="{{ asset('storage/struktur_organisasi/' . $profile->struktur_organisasi) }}"
                            alt="Bagan Struktur Organisasi" class="w-90 h-auto border p-4 border-gray-200"
                            onerror="this.src='{{ asset('img/no-image.png') }}'">
                    </div>
                @else
                    <div class="text-center py-20 text-gray-400">
                        <i class="fas fa-sitemap fa-4x mb-4 text-gray-200"></i>
                        <p class="text-lg">Bagan struktur organisasi belum diunggah.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
