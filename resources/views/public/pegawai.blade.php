@extends('layouts.public')

@section('title', 'Pegawai')

@section('content')
    <section class="pt-12 pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                {{-- <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-700 text-white text-lg mb-3 shadow-sm">
                    <i class="fas fa-users"></i>
                </div>
                <p class="text-[11px] font-bold tracking-widest uppercase text-emerald-600 mb-1">Sumber Daya Manusia</p> --}}
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Daftar Pegawai</h2>
                <p class="text-gray-400 text-sm italic mt-1">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- Filter Pencarian --}}
            <div class="max-w-3xl mx-auto p-2 bg-white rounded-full shadow-md border border-gray-100">
                <div class="flex items-center">
                    <label for="simple-search" class="sr-only">Cari Pegawai</label>
                    <div class="relative w-full">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-sm"></i>
                        <input type="text" id="simple-search"
                            class="bg-transparent border-0 text-gray-900 text-sm rounded-full focus:ring-0 block w-full pl-11 pr-4 py-3"
                            placeholder="Cari berdasarkan nama, atau jabatan..." />
                    </div>
                    <div class="p-3 mr-1 text-sm font-medium text-white bg-emerald-700 rounded-full flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Grid Pegawai (Hanya SATU Loop Utama) --}}
            <div id="container-pegawai" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6">

                {{-- Tambahkan sortBy('tingkat') di sini agar terurut dari 1, 2, 3, ke 4 --}}
                @forelse($pegawai->sortBy('tingkat') as $p)
                    @php
                        // Tentukan foto default berdasarkan gender dari database
                        $foto_default =
                            strtolower($p->gender) == 'p' ? 'foto_default_perempuan.png' : 'foto_default_laki.png';
                    @endphp

                    <div class="item-pegawai bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group"
                        data-search="{{ strtolower($p->nama_lengkap . ' ' . $p->nip . ' ' . $p->jabatan) }}">

                        {{-- Foto Pegawai --}}
                        <div class="aspect-[1/1] overflow-hidden bg-gray-100">
                            <img src="{{ $p->foto && $p->foto !== 'default.jpg' ? asset('storage/pegawai/' . $p->foto) : asset('storage/foto/default/' . $foto_default) }}"
                                alt="{{ $p->nama_lengkap }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                onerror="this.onerror=null;this.src='{{ asset('storage/foto/default/' . $foto_default) }}'">
                        </div>

                        {{-- Detail Pegawai --}}
                        <div class="p-3 text-center">
                            <h4
                                class="font-bold text-gray-900 text-xs md:text-sm leading-tight mb-1 group-hover:text-emerald-700 transition-colors">
                                {{ $p->nama_lengkap }}
                            </h4>
                            <p class="text-emerald-600 text-[10px] md:text-xs font-semibold leading-tight uppercase">
                                {{ $p->jabatan }}
                            </p>
                            @if ($p->nip)
                                {{-- <p class="text-gray-400 text-[9px] md:text-[10px] mt-2 tracking-tighter">
                        NIP. {{ $p->nip }}
                    </p> --}}
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
