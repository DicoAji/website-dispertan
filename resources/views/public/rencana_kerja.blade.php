@extends('layouts.public')
@section('title', 'Rencana Kerja')

@section('content')
    <div class="">
        <div class="container  mx-auto px-4 max-w-7xl space-y-8">
            <div class="text-center  ">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Rencana Kerja</h2>
                <p class="text-green-600 font-medium italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Tambahkan disini --}}
            {{-- Tambahkan disini --}}
            @php
                // Memanggil data langsung dari database di dalam Blade
                $rencanaKerja = \App\Models\FileDinas::find(3);
            @endphp

            <div class="p-4 md:p-8 shadow-lg border rounded-lg bg-white mt-8">
                @if ($rencanaKerja && $rencanaKerja->file)
                    {{-- Info Dokumen --}}
                    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between border-b pb-4 gap-4">
                        <h2 class="text-md text-gray-700 flex items-center font-bold">
                            <i class="fas fa-file-pdf text-red-500 mr-2 text-2xl"></i>
                            {{ $rencanaKerja->judul ?? 'Dokumen Rencana Kerja' }}
                        </h2>
                        <a href="{{ asset('storage/file_dinas/' . $rencanaKerja->file) }}" download
                            class="inline-flex items-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-bold transition shadow-md rounded">
                            <i class="fas fa-download mr-2"></i> Unduh PDF
                        </a>
                    </div>

                    {{-- Container Pratinjau PDF --}}
                    <div class="relative w-full overflow-hidden bg-gray-100 border border-gray-300 shadow-inner rounded"
                        style="height: 800px;">

                        {{-- Menggunakan Viewer Bawaan Browser --}}
                        <iframe src="{{ asset('storage/file_dinas/' . $rencanaKerja->file) }}"
                            class="w-full h-full border-none">
                        </iframe>

                    </div>
                @else
                    {{-- Tampilan jika data kosong --}}
                    <div class="text-center py-20 text-gray-400">
                        <i class="fas fa-file-circle-xmark fa-4x mb-4 text-gray-200"></i>
                        <p class="text-lg">Dokumen rencana kerja belum tersedia.</p>
                    </div>
                @endif
            </div>

            {{-- Navigasi Kembali --}}
            <div class="mt-10 text-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center text-gray-500 hover:text-green-600 transition font-bold group">
                    <i class="fas fa-arrow-left mr-2 transition-transform group-hover:-translate-x-1"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
@endsection
