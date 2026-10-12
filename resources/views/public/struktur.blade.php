@extends('layouts.public')
@section('title', 'Struktur Organisasi')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-5xl space-y-6 md:space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900">Struktur Organisasi</h2>
                <p class="text-gray-400 text-[11px] md:text-sm italic mt-1 md:mt-2">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Kontainer Bagan --}}
            <div class="bg-white rounded-xl md:rounded-2xl shadow-md border border-gray-100 p-4 sm:p-6 md:p-8">
                @if ($profile && $profile->struktur_organisasi)
                    <div
                        class="relative group flex flex-col items-center justify-center bg-gray-50 rounded-lg md:rounded-xl p-2 md:p-4">
                        <img src="{{ asset('storage/struktur_organisasi/' . $profile->struktur_organisasi) }}"
                            alt="Bagan Struktur Organisasi"
                            class="max-w-full h-auto rounded-md md:rounded-lg shadow-sm transition-transform duration-500 group-hover:scale-[1.01]"
                            onerror="this.src='{{ asset('img/no-image.png') }}'">
                    </div>
                @else
                    <div class="text-center py-10 md:py-20 text-gray-400">
                        <i class="fas fa-sitemap fa-3x md:fa-4x mb-3 md:mb-4 text-gray-200"></i>
                        <p class="text-[12px] md:text-base italic">Bagan struktur organisasi belum diunggah.</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
