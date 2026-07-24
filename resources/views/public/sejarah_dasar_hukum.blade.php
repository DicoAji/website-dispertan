@extends('layouts.public')
@section('title', 'Sejarah dan Dasar Hukum')

@section('content')
    <section class="pt-12 pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                {{-- <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-700 text-white text-lg mb-3 shadow-sm">
                    <i class="fas fa-book-open"></i>
                </div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-emerald-600 mb-1">Rekam Jejak Kelembagaan</p> --}}
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Sejarah dan Dasar Hukum</h2>
                <p class="text-gray-400 text-sm italic mt-1">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- KONTEN SEJARAH --}}
            <div class="relative bg-white rounded-2xl shadow-md border border-gray-100 p-6 md:p-10">
                <div
                    class="absolute -top-5 left-8 w-10 h-10 rounded-xl bg-emerald-700 text-white flex items-center justify-center shadow-md">
                    <i class="fas fa-quote-left"></i>
                </div>

                <div class="prose max-w-none text-gray-700 leading-relaxed pt-3">
                    @if ($profile->sejarah)
                        {!! nl2br(e($profile->sejarah)) !!}
                    @else
                        <div class="text-center py-16 text-gray-400 not-prose">
                            <i class="fas fa-book fa-3x mb-4 text-gray-200"></i>
                            <p class="italic">Uraian sejarah belum diisi.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
