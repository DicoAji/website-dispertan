@extends('layouts.public')
@section('title', 'PPID')

@section('content')
    {{-- HERO SECTION --}}
    <section
        class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-emerald-900 text-white py-20 lg:py-24 overflow-hidden">
        {{-- Background Pattern Overlay (Opsional) --}}
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

        <div class="container mx-auto px-4 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-16 lg:gap-8">

                {{-- BAGIAN KIRI: Teks & Tombol --}}
                <div class="w-full lg:w-1/2 space-y-8 text-center lg:text-left relative z-20">

                    {{-- Badge --}}
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2 bg-emerald-800/40 border border-emerald-500/30 rounded-full text-emerald-300 text-xs font-bold tracking-wider uppercase backdrop-blur-sm shadow-lg">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Pejabat Pengelola Informasi
                    </div>

                    {{-- Judul dengan Gradasi Warna --}}
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-white tracking-tight">
                        Portal PPID <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-yellow-200">
                            {{ $profile->nama_opd ?? 'Dinas Pertanian' }}
                        </span>
                    </h1>

                    {{-- Deskripsi --}}
                    <p class="text-emerald-100/90 text-lg md:text-xl max-w-xl mx-auto lg:mx-0 leading-relaxed font-light">
                        Mewujudkan transparansi dan akuntabilitas publik melalui layanan informasi yang cepat, tepat, dan
                        mudah diakses oleh seluruh lapisan masyarakat.
                    </p>

                    {{-- Aksi / Tombol --}}
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="{{ route('public.permohonan.create') }}"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-emerald-500 hover:bg-emerald-400 text-white font-bold rounded-2xl shadow-[0_0_20px_rgba(16,185,129,0.4)] hover:shadow-[0_0_30px_rgba(16,185,129,0.6)] transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-file-signature mr-2.5 text-lg"></i>
                            Permohonan Informasi
                        </a>
                    </div>
                </div>

                {{-- BAGIAN KANAN: Ilustrasi Glassmorphism & Animasi --}}
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative">
                    {{-- Cahaya di belakang kotak --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-emerald-500/30 to-yellow-500/20 blur-[100px] rounded-full">
                    </div>

                    {{-- Kotak Kaca (Glass Card) --}}
                    <div
                        class="relative w-72 h-72 md:w-96 md:h-96 bg-gradient-to-br from-white/10 to-white/5 border border-white/20 rounded-[3rem] shadow-2xl backdrop-blur-md flex items-center justify-center transform rotate-3 hover:rotate-0 transition-transform duration-500">

                        {{-- Ikon Pertanian Bergerak (Bounce) --}}
                        <i
                            class="fas fa-seedling text-[100px] md:text-[140px] text-emerald-300 drop-shadow-[0_0_30px_rgba(52,211,153,0.6)] animate-[bounce_3s_infinite]"></i>

                        {{-- Floating Badge Tambahan --}}
                        <div
                            class="absolute -bottom-6 -left-6 md:-left-10 bg-white text-emerald-900 px-6 py-3.5 rounded-2xl shadow-2xl flex items-center gap-4 font-bold animate-[bounce_4s_infinite_0.5s]">
                            <div
                                class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 text-xl shadow-inner">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-0.5">Status
                                    Layanan</div>
                                <div class="text-sm md:text-base">Aktif & Responsif</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- KATEGORI INFORMASI PUBLIK --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            {{-- Section Header --}}
            <div class="mb-10">
                <div class="border-l-4 border-emerald-600 pl-4">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Kategori Informasi Publik</h2>
                    <p class="text-gray-500 text-sm mt-1.5">Akses dokumen publik sesuai dengan klasifikasi UU KIP</p>
                </div>
            </div>

            {{-- 4 Columns Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- 1. Informasi Berkala --}}
                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                    <div
                        class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i class="fas fa-calendar-alt text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi Berkala</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow leading-relaxed">
                        Informasi yang wajib disediakan dan diumumkan secara rutin atau berkala.
                    </p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                        {{-- Mengubah 0 menjadi variabel $countBerkala --}}
                        <span class="text-2xl font-bold text-gray-900">{{ $countBerkala ?? 0 }} <span
                                class="text-[10px] font-normal text-gray-400 uppercase tracking-wider">Dokumen</span></span>
                    </div>
                    <a href="{{ route('public.ppid.kategori', ['kategori' => 'Informasi Berkala']) }}"
                        class="inline-flex items-center mt-4 text-xs font-bold text-emerald-600 hover:text-emerald-700 uppercase tracking-wider">
                        Buka Dokumen <i class="fas fa-external-link-alt ml-1.5"></i>
                    </a>
                </div>

                {{-- 2. Informasi Setiap Saat --}}
                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                    <div
                        class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi Setiap Saat</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow leading-relaxed">
                        Informasi yang harus tersedia dan dapat diberikan setiap saat kepada pemohon.
                    </p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                        {{-- Mengubah 0 menjadi variabel $countSetiapSaat --}}
                        <span class="text-2xl font-bold text-gray-900">{{ $countSetiapSaat ?? 0 }} <span
                                class="text-[10px] font-normal text-gray-400 uppercase tracking-wider">Dokumen</span></span>
                    </div>
                    <a href="{{ route('public.ppid.kategori', ['kategori' => 'Informasi Setiap Saat']) }}"
                        class="inline-flex items-center mt-4 text-xs font-bold text-emerald-600 hover:text-emerald-700 uppercase tracking-wider">
                        Buka Dokumen <i class="fas fa-external-link-alt ml-1.5"></i>
                    </a>
                </div>

                {{-- 3. Informasi Serta Merta --}}
                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                    <div
                        class="w-12 h-12 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i class="fas fa-exclamation-triangle text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi Serta Merta</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow leading-relaxed">
                        Informasi yang dapat mengancam hajat hidup orang banyak dan ketertiban umum.
                    </p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                        {{-- Mengubah 0 menjadi variabel $countSertaMerta --}}
                        <span class="text-2xl font-bold text-gray-900">{{ $countSertaMerta ?? 0 }} <span
                                class="text-[10px] font-normal text-gray-400 uppercase tracking-wider">Dokumen</span></span>
                    </div>
                    <a href="{{ route('public.ppid.kategori', ['kategori' => 'Informasi Serta Merta']) }}"
                        class="inline-flex items-center mt-4 text-xs font-bold text-emerald-600 hover:text-emerald-700 uppercase tracking-wider">
                        Buka Dokumen <i class="fas fa-external-link-alt ml-1.5"></i>
                    </a>
                </div>

                {{-- 4. Informasi Dikecualikan --}}
                <div
                    class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full group">
                    <div
                        class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i class="fas fa-lock text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi Dikecualikan</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow leading-relaxed">
                        Informasi yang tidak dapat diakses publik berdasarkan UU No. 14 Tahun 2008.
                    </p>
                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                        {{-- Mengubah 0 menjadi variabel $countDikecualikan --}}
                        <span class="text-2xl font-bold text-gray-900">{{ $countDikecualikan ?? 0 }} <span
                                class="text-[10px] font-normal text-gray-400 uppercase tracking-wider">Dokumen</span></span>
                    </div>
                    <a href="{{ route('public.ppid.kategori', ['kategori' => 'Informasi Dikecualikan']) }}"
                        class="inline-flex items-center mt-4 text-xs font-bold text-emerald-600 hover:text-emerald-700 uppercase tracking-wider">
                        Buka Dokumen <i class="fas fa-external-link-alt ml-1.5"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>


@endsection
