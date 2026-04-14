@extends('layouts.public') {{-- Pastikan menggunakan layout publik Anda --}}

@section('title', 'Maklumat Pelayanan')

@section('content')
    <div class="">
        <div class="container  mx-auto px-4 max-w-7xl space-y-8">
            {{-- Breadcrumb / Header --}}
            <div class="text-center  ">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Maklumat Pelayanan</h2>
                <p class="text-green-600 font-medium italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Konten Utama --}}
            <div class="shadow-xl overflow-hidden border border-gray-100">
                <div class="p-4 md:p-8 flex justify-center bg-white">
                    @if ($profile && $profile->maklumat_layanan)
                        <div class="relative group">
                            <img src="{{ asset('storage/profil_dinas/' . $profile->maklumat_layanan) }}"
                                alt="Maklumat Pelayanan Dinas Pertanian"
                                class="max-w-full h-auto  shadow-sm transition-transform duration-500 group-hover:scale-[1.02]">
                        </div>
                    @else
                        <div class="py-20 text-center">
                            <i class="fas fa-image fa-4x text-gray-200 mb-4"></i>
                            <p class="text-gray-400 text-lg">Data maklumat pelayanan belum tersedia.</p>
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
