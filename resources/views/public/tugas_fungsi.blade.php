@extends('layouts.public')
@section('title', 'Tugas dan Fungsi')


@section('content')
    <section class="pt-12">
        <div class="space-y-8">
            <div class="max-w-6xl mx-auto px-4">
                {{-- Header Halaman --}}
                <div class="text-center   mb-3">
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">Tugas dan Fungsi</h2>
                    <p class="text-green-600  italic">
                        {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                    </p>
                </div>
                <div class="p-4 md:p-8  shadow-lg border">
                    @if ($profile && $profile->tugas_fungsi)
                        {{-- Info Dokumen --}}
                        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between border-b pb-4 gap-4">
                            <h2 class="text-md text-gray-700 flex items-center">
                                <i class="fas fa-file-pdf text-red-500 mr-2 text-2xl"></i>
                                Tugas dan Fungsi Dinas Pertanian Kab. Grobogan
                            </h2>
                            <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}"
                                download="Tugas dan Fungsi Dinas Pertanian Kab. Grobogan.pdf"
                                class="inline-flex items-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-bold transition shadow-md rounded-full">
                                <i class="fas fa-download mr-2"></i> Unduh PDF
                            </a>
                        </div>
                    @else
                        {{-- Tampilan jika data kosong --}}
                        <div class="text-center py-20 text-gray-400">
                            <i class="fas fa-file-circle-xmark fa-4x mb-4 text-gray-200"></i>
                            <p class="text-lg">Dokumen tugas dan fungsi belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </section>
@endsection
