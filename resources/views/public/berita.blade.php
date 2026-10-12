@extends('layouts.public')
@section('title', 'Berita')

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-16 bg-gray-50">
        <div class="container mx-auto px-3 sm:px-4 max-w-7xl space-y-6 md:space-y-10">

            {{-- HEADER --}}
            <div class="text-center">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900 mb-1">Berita dan Publikasi</h2>
                <p class="text-emerald-600 italic text-xs md:text-sm">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
                <div class="w-10 md:w-12 h-1 bg-emerald-500 rounded-full mx-auto mt-2 md:mt-3"></div>
            </div>

            {{-- Mengambil Data Berita dari Database --}}
            @php
                $berita = \App\Models\Berita::orderBy('tanggal_berita', 'desc')->get();
            @endphp

            {{-- Grid Konten Berita (Diubah menjadi 2 kolom di mobile: grid-cols-2) --}}
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-8">
                @if (isset($berita) && $berita->count() > 0)
                    @foreach ($berita as $b)
                        <article
                            class="relative h-48 sm:h-64 md:h-80 rounded-xl md:rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group">

                            {{-- Gambar Berita (Background) --}}
                            <a href="{{ url('/berita/' . $b->id) }}" class="absolute inset-0 block">
                                <img src="{{ asset('storage/berita/' . $b->foto_berita) }}" alt="{{ $b->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />

                                {{-- Efek Gradasi Hitam agar teks terbaca --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent">
                                </div>
                            </a>

                            {{-- Isi Konten (Overlay di atas gambar) --}}
                            <div
                                class="absolute inset-x-0 bottom-0 p-2.5 sm:p-4 md:p-6 flex flex-col justify-end pointer-events-none">

                                {{-- Tanggal --}}
                                <span class="text-[9px] sm:text-[10px] md:text-sm text-gray-300 mb-1 md:mb-2">
                                    <i class="fa fa-calendar-o mr-1"></i>
                                    {{ \Carbon\Carbon::parse($b->tanggal_berita)->translatedFormat('d F Y') }}
                                </span>

                                {{-- Judul --}}
                                <a href="{{ url('/berita/' . $b->id) }}" class="pointer-events-auto">
                                    <h3
                                        class="font-semibold text-[11px] sm:text-xs md:text-md text-white mb-1 md:mb-3 line-clamp-2 leading-snug transition-colors">
                                        {{ $b->judul }}
                                    </h3>
                                </a>

                            </div>

                        </article>
                    @endforeach
                @else
                    {{-- Tampilan jika berita masih kosong --}}
                    <div class="col-span-full text-center py-12 md:py-16">
                        <i class="fas fa-newspaper fa-2x md:fa-3x text-gray-300 mb-3"></i>
                        <p class="text-gray-500 text-xs md:text-lg">Belum ada berita yang diterbitkan saat ini.</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
