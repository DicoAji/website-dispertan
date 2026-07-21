@extends('layouts.public')
@section('title', 'SOP Pelayanan')

@section('content')
    <section class="pt-12">
        <div class="container  mx-auto px-4 max-w-7xl space-y-8">
            <div class="text-center  ">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">SOP Pelayanan</h2>
                <p class="text-green-600  italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- GAMBAR SOP PELAYANAN --}}
            <div class="p-4 md:p-8 shadow-lg border rounded-lg bg-white">
                @if ($profile->sop_pelayanan)
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/profil_dinas/' . $profile->sop_pelayanan) }}"
                            alt="SOP Pelayanan {{ $profile->nama_opd ?? '' }}" class="max-w-full h-auto rounded-lg shadow-md">
                    </div>
                @else
                    <div class="text-center py-20 text-gray-400">
                        <i class="fas fa-image fa-4x mb-4 text-gray-200"></i>
                        <p class="text-lg">Gambar SOP Pelayanan belum tersedia.</p>
                    </div>
                @endif
            </div>

            @php
                // Memanggil data langsung dari database di dalam Blade
                $sopPelayanan = \App\Models\FileDinas::find(1);
            @endphp

        </div>
    </section>
@endsection
