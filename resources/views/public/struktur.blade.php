@extends('layouts.public')
@section('title', 'Struktur Organisasi')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-5xl">
            {{-- Header Halaman --}}
            <div class="text-center  mt-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Struktur Organisasi</h2>
                <p class="text-green-600 font-medium italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
                <div class="h-1 w-20 bg-green-500 mx-auto mt-4 rounded-full"></div>
            </div>

            {{-- Kontainer Bagan --}}
            <div class="bg-white p-4 md:p-8 rounded-3xl shadow-lg border border-gray-100">
                @if ($profile && $profile->struktur_organisasi)
                    <div class="relative group">
                        <img src="{{ asset('storage/struktur_organisasi/' . $profile->struktur_organisasi) }}"
                            alt="Bagan Struktur Organisasi" class="w-90 h-auto rounded-xl shadow-sm border border-gray-200"
                            onerror="this.src='{{ asset('img/no-image.png') }}'">

                        {{-- Overlay Instruksi --}}
                        <div class="mt-6 flex justify-center">
                            <a href="{{ asset('storage/struktur_organisasi/' . $profile->struktur_organisasi) }}"
                                target="_blank"
                                class="inline-flex items-center px-6 py-3 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-full transition duration-300 shadow-md">
                                <i class="fas fa-search-plus mr-2"></i>
                                Lihat Gambar Penuh / Perbesar
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-20 text-gray-400">
                        <i class="fas fa-sitemap fa-4x mb-4 text-gray-200"></i>
                        <p class="text-lg">Bagan struktur organisasi belum diunggah.</p>
                    </div>
                @endif
            </div>

            {{-- Catatan Tambahan --}}
            <div class="mt-12 bg-blue-50 p-6 rounded-2xl border-l-4 border-blue-500">
                <h4 class="text-blue-800 font-bold mb-2 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i> Informasi
                </h4>
                <p class="text-blue-700 text-sm leading-relaxed">
                    Struktur organisasi ini disusun berdasarkan Peraturan Daerah Kabupaten Grobogan untuk mendukung
                    efektivitas kinerja dalam sektor pertanian. Jika Anda memerlukan salinan resmi, silakan hubungi bagian
                    Sekretariat.
                </p>
            </div>
        </div>
    </section>
@endsection
