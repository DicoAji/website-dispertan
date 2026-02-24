@extends('layouts.public')

@section('title', 'Pegawai')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">
            {{-- Header Halaman --}}
            <div class="text-center  mt-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Pegawai</h2>
                <p class="text-green-600 font-medium italic">Pegawai {{ $profile->nama_opd ?? 'Dinas Pertanian' }}</p>
                <div class="h-1 w-20 bg-green-500 mx-auto mt-4 rounded-full"></div>
            </div>

            {{-- Filter Pencarian --}}
            <div class="max-w-3xl mx-auto  p-3 bg-green-50 rounded-full shadow-md">
                <div class="flex items-center">
                    <label for="simple-search" class="sr-only">Cari Pegawai</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-white border border-gray-50 text-gray-900 text-sm rounded-full focus:ring-green-500 focus:border-green-500 block w-full pl-6 pr-12 p-3"
                            placeholder="Cari berdasarkan nama, nip, atau jabatan..." />
                    </div>
                    <div class="p-3 ml-2 text-sm font-medium text-white bg-green-700 rounded-full border border-green-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Grid Pegawai (Hanya SATU Loop Utama) --}}
            <div id="container-pegawai" class="grid  mt-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">
                @forelse($pegawai as $p)
                    @php
                        // Tentukan foto default berdasarkan gender dari database
                        $foto_default =
                            strtolower($p->gender) == 'p' ? 'foto_default_perempuan.png' : 'foto_default_laki.png';
                    @endphp

                    <div class="item-pegawai bg-white shadow rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300 group"
                        data-search="{{ strtolower($p->nama_lengkap . ' ' . $p->nip . ' ' . $p->jabatan) }}">

                        {{-- Foto Pegawai --}}
                        <div class="aspect-[1/1] overflow-hidden bg-gray-200">
                            <img src="{{ $p->foto && $p->foto !== 'default.jpg' ? asset('storage/pegawai/' . $p->foto) : asset('storage/foto/default/' . $foto_default) }}"
                                alt="{{ $p->nama_lengkap }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                onerror="this.onerror=null;this.src='{{ asset('storage/foto/default/' . $foto_default) }}'">
                        </div>

                        {{-- Detail Pegawai --}}
                        <div class="p-3 text-center">
                            <h4
                                class="font-bold text-gray-900 text-xs md:text-sm leading-tight mb-1 group-hover:text-green-700">
                                {{ $p->nama_lengkap }}
                            </h4>
                            <p class="text-green-600 text-[10px] md:text-xs font-semibold leading-tight uppercase">
                                {{ $p->jabatan }}
                            </p>
                            @if ($p->nip)
                                <p class="text-gray-400 text-[9px] md:text-[10px] mt-2 tracking-tighter">
                                    NIP. {{ $p->nip }}
                                </p>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 text-gray-400">
                        <i class="fas fa-user-friends fa-3x mb-3"></i>
                        <p>Data pegawai belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            {{-- Notifikasi Jika Hasil Tidak Ditemukan --}}
            <div id="no-results" class="hidden text-center py-20 text-gray-500">
                <i class="fas fa-search fa-3x mb-4 text-gray-200"></i>
                <p>Pegawai tidak ditemukan.</p>
            </div>
        </div>
    </section>

    {{-- Script Filter --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('simple-search');
            const items = document.querySelectorAll('.item-pegawai');
            const noResults = document.getElementById('no-results');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let hasResults = false;

                items.forEach(item => {
                    const searchData = item.getAttribute('data-search');

                    if (searchData.includes(searchTerm)) {
                        item.classList.remove('hidden');
                        item.classList.add('block');
                        hasResults = true;
                    } else {
                        item.classList.add('hidden');
                        item.classList.remove('block');
                    }
                });

                if (hasResults) {
                    noResults.classList.add('hidden');
                } else {
                    noResults.classList.remove('hidden');
                }
            });
        });
    </script>
@endsection
