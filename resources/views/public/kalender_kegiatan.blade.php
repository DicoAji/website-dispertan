@extends('layouts.public')

@section('title', 'Kalender Kegiatan')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-1">Kalender Kegiatan</h2>
            <p class="text-green-600 italic">
                Jadwal agenda dan kegiatan rutin Dinas Pertanian Kabupaten Grobogan.
            </p>

        </div>

        <div class="bg-white p-6 md:p-10 rounded-2xl shadow-sm border border-gray-100">
            <ol class="relative border-l-2 border-emerald-200 ml-3 md:ml-6">

                @forelse ($kegiatan as $k)
                    <li class="mb-10 ml-8 md:ml-12 group">
                        <span
                            class="absolute flex items-center justify-center w-10 h-10 bg-emerald-100 rounded-full -left-5 ring-4 ring-white group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <i class="fa-solid fa-calendar-days text-emerald-600 group-hover:text-white"></i>
                        </span>

                        <div
                            class="bg-gray-50 rounded-xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-2 gap-2">
                                <h3 class="text-xl font-bold text-gray-800">{{ $k->nama_kegiatan }}</h3>

                                {{-- Logika otomatis untuk warna label berdasarkan Kategori --}}
                                @php
                                    $badgeColor = match ($k->kategori) {
                                        'Penyuluhan' => 'bg-blue-100 text-blue-800',
                                        'Rapat Internal' => 'bg-amber-100 text-amber-800',
                                        'Event Terbuka' => 'bg-purple-100 text-purple-800',
                                        default => 'bg-emerald-100 text-emerald-800',
                                    };
                                @endphp
                                <span class="{{ $badgeColor }} text-xs font-medium px-3 py-1 rounded-full w-fit">
                                    {{ $k->kategori }}
                                </span>
                            </div>

                            <div
                                class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-6 text-sm text-gray-600 mb-4 font-medium">
                                <div class="flex items-center text-emerald-700">
                                    <i class="fa-regular fa-clock mr-2"></i>
                                    {{ \Carbon\Carbon::parse($k->tanggal)->translatedFormat('d F Y') }}, {{ $k->waktu }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-solid fa-location-dot mr-2 text-red-500"></i>
                                    {{ $k->lokasi }}
                                </div>
                            </div>

                            <p class="text-gray-600 leading-relaxed text-sm md:text-base whitespace-pre-line">
                                {{ $k->deskripsi ?? 'Tidak ada deskripsi rincian untuk agenda ini.' }}
                            </p>
                        </div>
                    </li>
                @empty
                    <div class="text-center py-10 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                        <i class="fa-regular fa-calendar-xmark text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500 font-medium">Belum ada jadwal kegiatan saat ini.</p>
                    </div>
                @endforelse

            </ol>
        </div>
    </div>
@endsection
