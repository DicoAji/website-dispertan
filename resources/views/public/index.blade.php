@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    <main>
        <section class="relative h-[500px] flex items-center overflow-hidden bg-emerald-900">
            <div class="absolute inset-0 opacity-40">
                <img src="{{ asset('storage/background/petani-tembakau.jpeg') }}" alt="Background"
                    class="w-full h-full object-cover" />
            </div>
            <div class="container mx-auto px-4 relative z-10 text-white">
                <div class="w-full text-center">
                    <span
                        class="items-center gap-2 rounded-full border-amber-200 bg-emerald-400 px-3 py-1 text-xs font-bold tracking-wider uppercase mb-4 inline-flex">
                        Selamat Datang di Website
                    </span>

                    <h1
                        class="text-white  text-4xl md:text-6xl mb-3 uppercase font-extrabold leading-tight drop-shadow-lg min-h-[90px] md:min-h-[140px]">
                        <span id="typing-text"></span>
                    </h1>

                    <p class="text-lg md:text-xl mb-8 opacity-90 delay-700">
                        Portal resmi Dinas Pertanian Kab.Grobogan
                    </p>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50" id="berita">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between mb-8">
                    <div class="">
                        <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Berita Terkini!</h2>
                        <p class="text-gray-500 mt-1">
                            Berikut adalah beberapa berita terbaru dari Dinas Pertanian Kab.Grobogan
                        </p>
                    </div>
                    <a href="/berita"
                        class="inline-block bg-gradient-to-r from-emerald-500 to-emerald-700 text-white font-semibold px-6 py-2.5 rounded-full border-2 border-emerald-300 shadow-[0_0_15px_rgba(52,211,153,0.6)] hover:shadow-[0_0_25px_rgba(52,211,153,0.9)] hover:from-emerald-400 hover:to-emerald-600 hover:border-emerald-200 transition-all duration-300">
                        Lihat Semua
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if (isset($berita) && $berita->count() > 0)
                        {{-- Mengurutkan berdasarkan tanggal terbaru lalu mengambil 3 berita --}}
                        @foreach ($berita->sortByDesc('tanggal_berita')->take(3) as $b)
                            <article
                                class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                                <a href="{{ url('/berita/' . $b->id) }}" class="block relative h-52 overflow-hidden">
                                    <img src="{{ asset('storage/berita/' . $b->foto_berita) }}" alt="{{ $b->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                                </a>

                                <div class="p-6 flex flex-col h-full">
                                    <a href="{{ url('/berita/' . $b->id) }}">
                                        <h3 class="font-semibold text-md mb-4 line-clamp-2 leading-snug">
                                            {{ $b->judul }}
                                        </h3>
                                    </a>

                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span class="text-xs md:text-sm text-gray-500  pointer-events-none">
                                            {{ \Carbon\Carbon::parse($b->tanggal_berita)->translatedFormat('d F Y') }}
                                        </span>

                                        <a href="{{ url('/berita/' . $b->id) }}"
                                            class="text-emerald-700 underline hover:text-emerald-800 flex items-center">
                                            Baca <i class="fa fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Unit Kerja</h2>
                    <p class="text-gray-500 mt-2">
                        Menjelajahi struktur penunjang ekosistem berkelanjutan.
                    </p>
                </div>

                <div class="flex overflow-x-auto gap-6 pb-6 hide-scrollbar">
                    <div
                        class="group relative overflow-hidden mobile-card flex-shrink-0 transition duration-300 hover:-translate-y-2 w-64 p-4 bg-slate-200 border border-slate-100 rounded-xl">
                        <span
                            class="absolute bottom-0 left-1/2 w-0 h-1 bg-slate-700 transition-all duration-300 -translate-x-1/2 group-hover:w-full"></span>
                        {{-- <div
                            class="w-16 h-16 bg-slate-700 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa fa-briefcase"></i>
                        </div> --}}

                        <h3 class="font-bold text-xl mb-2 text-slate-900 text-center">
                            Sekretariat
                        </h3>

                        <p class="text-sm text-slate-700 text-center">
                            Pengelolaan administrasi dan tata kelola pelayanan internal.
                        </p>
                    </div>

                    <div
                        class="group relative overflow-hidden mobile-card flex-shrink-0 transition duration-300 hover:-translate-y-2 w-64 p-4 bg-blue-200 border border-blue-100 rounded-xl">
                        <span
                            class="absolute bottom-0 left-1/2 w-0 h-1 bg-blue-700 transition-all duration-300 -translate-x-1/2 group-hover:w-full"></span>

                        {{-- <div
                            class="w-16 h-16 bg-blue-700 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa-solid fa-tractor"></i>
                        </div> --}}
                        <h3 class="font-bold text-xl mb-2 text-blue-900 text-center">
                            PSP
                        </h3>
                        <p class="text-sm text-blue-700 text-center">
                            Penyuluhan serta penyediaan sarana dan prasarana pendukung.
                        </p>
                    </div>

                    <div
                        class="group relative overflow-hidden mobile-card flex-shrink-0 transition duration-300 hover:-translate-y-2 w-64 p-4 bg-amber-200 border border-amber-100 rounded-xl">
                        <span
                            class="absolute bottom-0 left-1/2 w-0 h-1 bg-amber-600 transition-all duration-300 -translate-x-1/2 group-hover:w-full"></span>

                        {{-- <div
                            class="w-16 h-16 bg-amber-600 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa-solid fa-seedling"></i>
                        </div> --}}
                        <h3 class="font-bold text-xl mb-2 text-amber-900 text-center">
                            Tanaman Pangan
                        </h3>
                        <p class="text-sm text-amber-700 text-center">
                            Peningkatan produksi dan ketahanan komoditas pangan pokok.
                        </p>
                    </div>

                    <div
                        class="group relative overflow-hidden mobile-card flex-shrink-0 transition duration-300 hover:-translate-y-2 w-64 p-4 bg-emerald-200 border border-emerald-100 rounded-xl">
                        <span
                            class="absolute bottom-0 left-1/2 w-0 h-1 bg-emerald-700 transition-all duration-300 -translate-x-1/2 group-hover:w-full"></span>

                        {{-- <div
                            class="w-16 h-16 bg-emerald-700 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa fa-tree"></i>
                        </div> --}}
                        <h3 class="font-bold text-xl mb-2 text-emerald-900 text-center">
                            Perkebunan
                        </h3>
                        <p class="text-sm text-emerald-700 text-center">
                            Pengembangan usaha dan pengelolaan hasil tanaman perkebunan.
                        </p>
                    </div>

                    <div
                        class="group relative overflow-hidden mobile-card flex-shrink-0 transition duration-300 hover:-translate-y-2 w-64 p-4 bg-rose-200 border border-rose-100 rounded-xl">
                        <span
                            class="absolute bottom-0 left-1/2 w-0 h-1 bg-rose-600 transition-all duration-300 -translate-x-1/2 group-hover:w-full"></span>

                        {{-- <div
                            class="w-16 h-16 bg-rose-600 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div> --}}
                        <h3 class="font-bold text-xl mb-2 text-rose-900 text-center">
                            Hortikultura
                        </h3>
                        <p class="text-sm text-rose-700 text-center">
                            Budidaya sayuran, buah-buahan, serta tanaman hias dan obat.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pengaduan  bg-center py-6">
            <div class="relative max-w-4xl mx-auto px-4">
                <div class="text-center mb-4">
                    <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Unit Pengaduan / LAPOR!</h2>
                    <p class="mt-2 ">Sampaikan keluhan atau aspirasi Anda secara langsung kepada kami</p>
                </div>

                <div class="bg-white p-6 md:p-10 shadow-2xl rounded-3xl">
                    @if (session('success'))
                        <div
                            class="p-4 mb-5 text-center text-sm font-semibold text-emerald-900 bg-emerald-100/80 border border-emerald-200 rounded-full shadow-lg shadow-emerald-100/50">
                            <i class="fa-solid fa-circle-check text-emerald-600 mr-2 text-base align-middle"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('laporan.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="">
                            <input type="text" name="nama" required
                                class="block w-full px-4 py-3 rounded-full border-gray-200 focus:ring-green-500 focus:border-green-500"
                                placeholder="Nama Lengkap">

                        </div>
                        <input type="number" name="telp" required
                            class="block w-full px-4 py-3 rounded-full border-gray-200 focus:ring-green-500 focus:border-green-500"
                            placeholder="Nomor WhatsApp / HP">
                        <textarea name="pengaduan" rows="4" required
                            class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500"
                            placeholder="Tuliskan aduan atau laporan Anda secara detail..."></textarea>

                        <button type="submit" class="btn-primary w-full"
                            class="w-full py-4 bg-green-950 text-white font-bold rounded-xl hover:bg-green-800 transition duration-300 shadow-lg shadow-green-200 uppercase tracking-widest">
                            Kirim Laporan Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="bg-gray-50 py-20" id="kontak">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Informasi Kontak</h2>
                <p class="text-gray-500 mt-2">
                    Hubungi kami untuk pertanyaan, saran, atau informasi lebih lanjut.
                </p>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                {{-- Menggunakan lg:grid-cols-5 agar 5 elemen terbagi rata dalam 1 baris --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    {{-- Kotak 1: Alamat --}}
                    <div
                        class=" p-6 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition h-full">
                        <div class="bg-blue-50 p-2 rounded-2xl text-blue-600 mb-4">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Alamat Kantor</h4>
                        <small class="text-gray-700  leading-relaxed">{{ $profile->alamat }}</small>
                    </div>

                    {{-- Kotak 2: Telp --}}
                    <div
                        class="p-6 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition h-full">
                        <div class="bg-green-50 p-2 rounded-2xl text-green-600 mb-4">
                            <i class="fa-solid fa-phone text-xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Telp</h4>
                        <small class="text-gray-700 text-md">{{ $profile->telp }}</small>
                    </div>

                    {{-- Kotak 3: Email --}}
                    <div
                        class="p-6 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition h-full">
                        <div class="bg-red-50 p-2 rounded-2xl text-red-600 mb-4">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Email</h4>
                        <small class="text-gray-700 text-md">{{ $profile->email }}</small>
                    </div>



                    {{-- Kotak 5: Peta --}}
                    <div class=" shadow-xl rounded-xl overflow-hidden border-4 border-white h-full min-h-[250px]">
                        <iframe
                            src="https://maps.google.com/maps?width=600&height=400&hl=en&q=dinas%20pertanian%20grobogan&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>

                </div>
            </div>
        </section>

        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var typed = new Typed('#typing-text', {
                    strings: ['Dinas Pertanian<br />Kabupaten Grobogan'],
                    typeSpeed: 60, // Kecepatan mengetik
                    backSpeed: 40, // Kecepatan menghapus teks (biasanya lebih cepat dari mengetik)
                    backDelay: 3000, // Jeda teks terdiam setelah selesai diketik (3 detik) sebelum dihapus
                    showCursor: true,
                    cursorChar: '|',
                    loop: true, // Mengubah ini menjadi true agar mengetik terus-menerus
                    startDelay: 300
                });
            });
        </script>
    </main>




@endsection
