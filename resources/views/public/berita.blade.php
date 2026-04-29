@extends('layouts.public')
@section('title', 'Berita')

@section('content')
    <section class="pt-12 pb-16">
        <div class="container mx-auto px-4 max-w-7xl space-y-10">

            {{-- Header Judul --}}
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Berita dan Publikasi</h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>

            {{-- Mengambil Data Berita dari Database --}}
            @php
                $berita = \App\Models\Berita::orderBy('tanggal_berita', 'desc')->get();
            @endphp

            {{-- Grid Konten Berita --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if (isset($berita) && $berita->count() > 0)
                    {{-- Saya menghapus take(6) agar di halaman ini semua berita muncul.
                         Jika ingin dibatasi, Anda bisa tambahkan kembali menjadi $berita->take(6) --}}
                    @foreach ($berita as $b)
                        <article
                            class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group flex flex-col h-full">

                            {{-- Gambar Berita --}}
                            <a href="{{ url('/berita/' . $b->id) }}"
                                class="block relative h-52 overflow-hidden flex-shrink-0">
                                <img src="{{ asset('storage/berita/' . $b->foto_berita) }}" alt="{{ $b->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                            </a>

                            {{-- Isi Konten --}}
                            <div class="p-6 flex flex-col flex-grow">
                                <a href="{{ url('/berita/' . $b->id) }}" class="flex-grow">
                                    <h3
                                        class="font-bold text-lg mb-4 line-clamp-2 leading-snug group-hover:text-emerald-700 transition-colors">
                                        {{ $b->judul }}
                                    </h3>
                                </a>

                                {{-- Meta (Tanggal & Tombol Baca) --}}
                                <div
                                    class="flex items-center justify-between text-sm mt-auto pt-4 border-t border-gray-100">
                                    <span class="text-xs md:text-sm text-gray-500 pointer-events-none">
                                        <i class="fa fa-calendar-o mr-1"></i>
                                        {{ \Carbon\Carbon::parse($b->tanggal_berita)->translatedFormat('d F Y') }}
                                    </span>

                                    <a href="{{ url('/berita/' . $b->id) }}"
                                        class="text-emerald-700 font-bold hover:text-emerald-800 flex items-center">
                                        Baca <i class="fa fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>

                        </article>
                    @endforeach
                @else
                    {{-- Tampilan jika berita masih kosong --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                        <i class="fas fa-newspaper fa-3x text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">Belum ada berita yang diterbitkan saat ini.</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
