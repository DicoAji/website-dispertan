@extends('layouts.public')
@section('title', 'Tugas dan Fungsi')


@section('content')
    <div class="space-y-8">
        <div class="max-w-5xl mx-auto px-4">
            {{-- Header Halaman --}}
            <div class="text-center   mb-3">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Tugas dan Fungsi</h2>
                <p class="text-green-600 font-medium italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>
            <div class="p-4 md:p-8  shadow-lg border">
                @if ($profile && $profile->tugas_fungsi)
                    {{-- Info Dokumen --}}
                    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between border-b pb-4 gap-4">
                        <h2 class="text-md  text-gray-700 flex items-center">
                            <i class="fas fa-file-pdf text-red-500 mr-2 text-2xl"></i>
                            {{ $profile->tugas_fungsi }}
                        </h2>
                        <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}" download
                            class="inline-flex items-center px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-md">
                            <i class="fas fa-download mr-2"></i> Unduh PDF
                        </a>
                    </div>

                    {{-- Container Pratinjau PDF --}}
                    <div class="relative w-full  overflow-hidden bg-gray-100 border border-gray-300 shadow-inner"
                        style="height: 800px;">
                        {{-- Menggunakan PDF.js Viewer (Mozilla) --}}
                        <iframe
                            src="https://mozilla.github.io/pdf.js/web/viewer.html?file={{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}"
                            class="w-full h-full border-none">
                        </iframe>
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
@endsection
