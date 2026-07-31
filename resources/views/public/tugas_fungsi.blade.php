@extends('layouts.public')
@section('title', 'Tugas dan Fungsi')

@section('content')
    <section class="pt-12 pb-20 bg-gray-50">
        <div class="space-y-8">
            <div class="max-w-4xl mx-auto px-4 space-y-8">

                {{-- HEADER --}}
                <div class="text-center">
                    {{-- <div
                        class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-700 text-white text-lg mb-3 shadow-sm">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-emerald-600 mb-1">Kewenangan</p> --}}
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Tugas dan Fungsi</h2>
                    <p class="text-gray-400 text-sm italic mt-1">
                        {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                    </p>
                </div>

                {{-- Kotak Konten Utama --}}
                <div class="p-6 md:p-8 bg-white shadow-md border border-gray-100 rounded-2xl">

                    {{-- 2. Menampilkan Info Dokumen PDF --}}
                    @if ($profile && $profile->tugas_fungsi)
                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between bg-emerald-50/60 rounded-xl p-4 {{ $profile->narasi_tugas_fungsi ? ' ' : '' }} gap-4">
                            <h2 class="text-sm text-gray-700 flex items-center font-semibold">
                                <i class="fas fa-file-pdf text-red-500 mr-3 text-2xl"></i>
                                Dokumen Tugas dan Fungsi
                            </h2>
                            <a href="{{ asset('storage/profil_dinas/' . $profile->tugas_fungsi) }}"
                                download="Tugas dan Fungsi Dinas Pertanian Kab. Grobogan.pdf"
                                class="inline-flex items-center justify-center px-6 py-2.5 bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-bold transition-colors shadow-md rounded-full flex-shrink-0">
                                <i class="fas fa-download mr-2"></i> Unduh PDF
                            </a>
                        </div>


                        {{-- 3. Tampilan jika keduanya (Narasi & PDF) kosong --}}
                    @elseif (!$profile || (!$profile->narasi_tugas_fungsi && !$profile->tugas_fungsi))
                        <div class="text-center py-20 text-gray-400">
                            <i class="fas fa-file-circle-xmark fa-4x mb-4 text-gray-200"></i>
                            <p class="text-lg">Informasi tugas dan fungsi belum tersedia.</p>
                        </div>
                    @endif

                    {{-- 1. Menampilkan Narasi --}}
                    @if ($profile && $profile->narasi_tugas_fungsi)
                        <div class="text-gray-700 mt-5 leading-relaxed text-sm text-justify">
                            {!! nl2br($profile->narasi_tugas_fungsi) !!}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
@endsection
