@extends('layouts.public')
@section('title', 'Struktur Organisasi')

@section('content')
    <section class="pt-12 pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-5xl space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                {{-- <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-700 text-white text-lg mb-3 shadow-sm">
                    <i class="fas fa-sitemap"></i>
                </div> --}}
                {{-- <p class="text-[11px] font-bold tracking-widest uppercase text-emerald-600 mb-1">Susunan Kelembagaan</p> --}}
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Struktur Organisasi</h2>
                <p class="text-gray-400 text-sm italic mt-1">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Kontainer Bagan --}}
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-8">
                @if ($profile && $profile->struktur_organisasi)
                    <div class="relative group flex flex-col items-center justify-center bg-gray-50 rounded-xl p-4">
                        <img src="{{ asset('storage/struktur_organisasi/' . $profile->struktur_organisasi) }}"
                            alt="Bagan Struktur Organisasi"
                            class="max-w-full h-auto rounded-lg shadow-sm transition-transform duration-500 group-hover:scale-[1.01]"
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
