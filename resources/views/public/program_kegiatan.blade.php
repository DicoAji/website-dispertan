@extends('layouts.public')
@section('title', 'Program Kegiatan')

@section('content')
    <section class="pt-12">
        <div class="container mx-auto px-4 max-w-7xl space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Program & Kegiatan</h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>

            @php
                // Memanggil data langsung dari database di dalam Blade
                $lkjip = \App\Models\FileDinas::find(5);
            @endphp

            <div class="p-4 md:p-8 shadow-lg border rounded-lg bg-white mt-8">
                @if ($lkjip && $lkjip->file)
                    {{-- Info Dokumen --}}
                    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between border-b pb-4 gap-4">
                        <h2 class="text-md text-gray-700 flex items-center font-bold">
                            <i class="fas fa-file-pdf text-red-500 mr-2 text-2xl"></i>
                            {{ $lkjip->uraian ?? 'Dokumen LKJiP' }}
                        </h2>
                        <a href="{{ asset('storage/dokumen/' . $lkjip->file) }}" download
                            class="inline-flex items-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-bold transition shadow-md rounded">
                            <i class="fas fa-download mr-2"></i> Unduh PDF
                        </a>
                    </div>
                @else
                    {{-- Tampilan jika data kosong --}}
                    <div class="text-center py-20 text-gray-400">
                        <i class="fas fa-file-circle-xmark fa-4x mb-4 text-gray-200"></i>
                        <p class="text-lg">Dokumen LKJiP belum tersedia.</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
