@extends('layouts.public') {{-- Pastikan menggunakan layout publik Anda --}}
@section('title', 'Maklumat Pelayanan') {{-- Judul halaman untuk tag <title> --}}

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl space-y-6 md:space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900">Maklumat Pelayanan</h2>
                <p class="text-gray-400 text-[11px] md:text-sm italic mt-1 md:mt-2">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Konten Utama --}}
            <div class="bg-white rounded-xl md:rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-3 sm:p-6 md:p-8 flex justify-center bg-gray-50">
                    @if ($profile && $profile->maklumat_layanan)
                        <div class="relative group">
                            <img src="{{ asset('storage/profil_dinas/' . $profile->maklumat_layanan) }}"
                                alt="Maklumat Pelayanan Dinas Pertanian"
                                class="max-w-full h-auto rounded-md md:rounded-lg shadow-sm transition-transform duration-500 group-hover:scale-[1.02]">
                        </div>
                    @else
                        <div class="py-12 md:py-20 text-center">
                            <i class="fas fa-image fa-3x md:fa-4x text-gray-200 mb-3 md:mb-4"></i>
                            <p class="text-gray-400 text-[12px] md:text-lg italic">Data maklumat pelayanan belum tersedia.
                            </p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection
