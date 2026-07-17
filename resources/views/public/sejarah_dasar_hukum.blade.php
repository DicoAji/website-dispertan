@extends('layouts.public')
@section('title', 'Sejarah dan Dasar Hukum')

@section('content')
    <section class="pt-12">
        <div class="container mx-auto px-4 max-w-7xl space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Sejarah dan Dasar Hukum</h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>
            <div class="p-4 md:p-8 shadow-lg border rounded-lg bg-white mt-8">
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    @if ($profile->sejarah)
                        {!! nl2br(e($profile->sejarah)) !!}
                    @else
                        <p class="text-gray-400 italic text-center">Uraian sejarah belum diisi.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
