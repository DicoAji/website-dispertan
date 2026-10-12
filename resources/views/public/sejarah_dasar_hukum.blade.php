@extends('layouts.public')
@section('title', 'Sejarah dan Dasar Hukum')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl space-y-6 md:space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                {{-- <div
                    class="inline-flex items-center justify-center w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-emerald-700 text-white text-base md:text-lg mb-2 md:mb-3 shadow-sm">
                    <i class="fas fa-book-open"></i>
                </div>
                <p class="text-[10px] md:text-[11px] font-bold tracking-widest uppercase text-emerald-600 mb-1">Rekam Jejak Kelembagaan</p> --}}

                <h2 class="text-xl md:text-3xl font-bold text-gray-900">Sejarah dan Dasar Hukum</h2>
                <p class="text-gray-400 text-[11px] md:text-sm italic mt-1 md:mt-2">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- KONTEN SEJARAH --}}
            {{-- Padding disesuaikan jadi p-4 untuk mobile, dan mt-4 agar ikon tidak menabrak header di layar sempit --}}
            <div
                class="relative bg-white rounded-xl md:rounded-2xl shadow-md border border-gray-100 p-4 sm:p-6 md:p-10 mt-4 md:mt-0">

                {{-- Ikon kutipan diperkecil (w-8 h-8) dan digeser ke kiri (left-4) di mobile --}}
                <div
                    class="absolute -top-4 md:-top-5 left-4 md:left-8 w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-emerald-700 text-white flex items-center justify-center shadow-md text-xs md:text-base">
                    <i class="fas fa-quote-left"></i>
                </div>

                {{-- Ukuran font teks sejarah diperkecil jadi text-[12px] di mobile --}}
                <div class="prose max-w-none text-[12px] md:text-sm text-gray-700 leading-relaxed pt-2 md:pt-3">
                    @if ($profile->sejarah)
                        {!! nl2br(e($profile->sejarah)) !!}
                    @else
                        <div class="text-center py-10 md:py-16 text-gray-400 not-prose">
                            <i class="fas fa-book fa-2x md:fa-3x mb-3 md:mb-4 text-gray-200"></i>
                            <p class="italic text-[11px] md:text-sm">Uraian sejarah belum diisi.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
