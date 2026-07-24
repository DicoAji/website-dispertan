@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
    <main class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-7xl">

            {{-- Tombol Kembali --}}
            <div class="mb-6">
                <a href="{{ route('berita.index') }}"
                    class="inline-flex items-center text-sm font-semibold text-emerald-700 hover:text-emerald-900 transition-colors">
                    <i class="fa fa-arrow-left mr-2"></i> Kembali ke Berita
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                {{-- KONTEN UTAMA BERITA (Kiri) --}}
                <article
                    class="lg:col-span-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-6 md:p-8">

                    {{-- Kategori / Informasi OPD --}}
                    <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full mb-4">
                        {{ $profile->nama_opd ?? 'Dinas Pertanian Kab. Grobogan' }}
                    </span>

                    {{-- Judul Berita --}}
                    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-4">
                        {{ $berita->judul }}
                    </h1>

                    {{-- Tanggal Publikasi --}}
                    <div class="flex items-center text-sm text-gray-500 mb-6 pb-6 border-b border-gray-100">
                        <i class="fa fa-calendar-o mr-2 text-emerald-600"></i>
                        <span>{{ \Carbon\Carbon::parse($berita->tanggal_berita)->translatedFormat('d F Y') }}</span>
                    </div>

                    {{-- Gambar Utama --}}
                    <div class="mb-8 rounded-xl overflow-hidden shadow-md max-h-[450px] bg-gray-100">
                        <img src="{{ asset('storage/berita/' . $berita->foto_berita) }}" alt="{{ $berita->judul }}"
                            class="w-full h-full object-cover"
                            onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                    </div>

                    {{-- Deskripsi / Isi Berita --}}
                    <div class="prose prose-emerald max-w-none text-gray-700 leading-relaxed space-y-4">
                        {!! nl2br(e($berita->deskripsi)) !!}
                    </div>

                </article>

                {{-- SIDEBAR / BERITA LAINNYA (Kanan) --}}
                <aside class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="font-bold text-lg text-emerald-900 mb-4 pb-2 border-b border-gray-100">
                            Berita Lainnya
                        </h3>

                        <div class="space-y-4">
                            @forelse($beritaLainnya ?? [] as $lain)
                                <div class="flex gap-4 items-center group">
                                    <a href="{{ url('/berita/' . $lain->id) }}"
                                        class="w-20 h-16 flex-shrink-0 overflow-hidden rounded-lg shadow-sm">
                                        <img src="{{ asset('storage/berita/' . $lain->foto_berita) }}"
                                            alt="{{ $lain->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                                            onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                                    </a>
                                    <div class="min-w-0">
                                        <span class="text-[11px] text-gray-400 block mb-0.5">
                                            {{ \Carbon\Carbon::parse($lain->tanggal_berita)->translatedFormat('d M Y') }}
                                        </span>
                                        <h4
                                            class="font-semibold text-xs md:text-sm text-gray-800 line-clamp-2 leading-snug group-hover:text-emerald-700 transition-colors">
                                            <a href="{{ url('/berita/' . $lain->id) }}">{{ $lain->judul }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @empty
                                <p class="text-xs text-gray-400 italic">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>

            </div>

        </div>
    </main>
@endsection
