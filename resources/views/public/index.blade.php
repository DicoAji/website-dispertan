@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

    <section id="indicators-carousel" class="relative w-full" data-carousel="static">
        <div class="relative h-96 overflow-hidden rounded-base md-h-135">

            <div class="absolute inset-0 h-full w-full hidden duration-700 ease-in-out bg-center bg-cover"
                style="background-image: url('{{ asset('storage/corausel/lahan.png') }}')" data-carousel-item="active">
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-20 w-full px-4">
                    <h2 class="text-3xl sm:text-4xl font-bold md:text-5xl">
                        Menuju Indonesia Swasembada Pangan
                    </h2>
                    <p class="text-xs md:text-lg max-w-2xl mx-auto opacity-60">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>

            <div class="absolute inset-0 h-full w-full hidden duration-700 ease-in-out bg-center bg-cover"
                style="background-image: url('{{ asset('storage/corausel/tugu_simpang_lima.png') }}')" data-carousel-item>
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-20 w-full px-4">
                    <h2 class="text-3xl sm:text-4xl font-bold md:text-5xl">
                        Menuju Indonesia Swasembada Pangan
                    </h2>
                    <p class="text-xs md:text-lg max-w-2xl mx-auto opacity-60">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>

            <div class="absolute inset-0 h-full w-full hidden duration-700 ease-in-out bg-center bg-cover"
                style="background-image: url('{{ asset('storage/corausel/lahan.png') }}')" data-carousel-item>
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-20 w-full px-4">
                    <h2 class="text-3xl sm:text-4xl font-bold md:text-5xl">
                        Menuju Indonesia Swasembada Pangan
                    </h2>
                    <p class="text-xs md:text-lg max-w-2xl mx-auto opacity-60">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>

            <div class="absolute inset-0 h-full w-full hidden duration-700 ease-in-out bg-center bg-cover"
                style="background-image: url('{{ asset('storage/corausel/tugu_simpang_lima.png') }}')" data-carousel-item>
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-20 w-full px-4">
                    <h2 class="text-3xl sm:text-4xl font-bold md:text-5xl">
                        Menuju Indonesia Swasembada Pangan
                    </h2>
                    <p class="text-xs md:text-lg max-w-2xl mx-auto opacity-60">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>
        </div>

        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
            <button type="button" class="w-2 h-2 rounded-full bg-white" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-2 h-2 rounded-full bg-white/50" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-2 h-2 rounded-full bg-white/50" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
            <button type="button" class="w-2 h-2 rounded-full bg-white/50" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
        </div>

        <button type="button"
            class="absolute top-0 inset-s-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded bg-black/20 group-hover:bg-black/40">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded bg-black/20 group-hover:bg-black/40">
                <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m9 5 7 7-7 7" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </section>

    <!-- STATISTIK -->
    <section class="bg-primary-light py-5">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 text-center">
                <div
                    class="bg-green-50 p-3 md:p-5 shadow-sm  border border-green-100 flex flex-col justify-center transition hover:scale-105">
                    <p class="md:text-5xl text-2xl font-bold text-green-700 counter" data-target="20">
                        0
                    </p>
                    <p class="text-green-600 mt-1 text-[10px] md:text-xs font-bold uppercase tracking-wider">
                        Varietas Unggulan
                    </p>
                </div>

                <div
                    class="bg-blue-50 p-3 md:p-5 shadow-sm  border border-blue-100 flex flex-col justify-center transition hover:scale-105">
                    <p class="md:text-5xl text-2xl font-bold text-blue-700 counter" data-target="1500000">
                        0
                    </p>
                    <p class="text-blue-600 mt-1 text-[10px] md:text-xs font-bold uppercase tracking-wider">
                        Hektar Lahan
                    </p>
                </div>

                <div
                    class="bg-amber-50 p-3 md:p-5 shadow-sm border border-amber-100 flex flex-col justify-center transition hover:scale-105">
                    <p class="md:text-5xl text-2xl font-bold text-amber-700 counter" data-target="15000">
                        0
                    </p>
                    <p class="text-amber-600 mt-1 text-[10px] md:text-xs font-bold uppercase tracking-wider">
                        Kelompok Tani
                    </p>
                </div>

                <div
                    class="bg-indigo-50 p-3 md:p-5 shadow-sm border border-indigo-100 flex flex-col justify-center transition hover:scale-105">
                    <p class="md:text-5xl text-2xl font-bold text-indigo-700 counter" data-target="1200000">
                        0
                    </p>
                    <p class="text-indigo-600 mt-1 text-[10px] md:text-xs font-bold uppercase tracking-wider">
                        Ton Hasil Panen
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PROF TANI -->
    <section class="py-12 md:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- <h2 class="text-center text-lg md:text-4xl font-bold text-primary-dark mb-8 md:mb-12 uppercase tracking-tight">
            Pelayanan Dinas
            </h2> --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="space-y-4 md:space-y-6">
                    <h3 class="text-2xl md:text-4xl font-extrabold text-gray-800 leading-tight">
                        Profesor Tani
                    </h3>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales, nulla ac pellentesque
                        finibus, velit diam consequat ex, in hendrerit sem ante nec nisl. Mauris sit amet turpis vel lacus
                        dapibus lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                        curae; Sed ut perspiciatis unde omnis iste natus error sit voluptatem.
                    </p>
                    <div class="pt-2">
                        <a href="https://profesortani.com/" target="_blank"
                            class="inline-block px-8 py-3 bg-green-700 text-white font-bold rounded-lg shadow-lg hover:bg-green-800 transition duration-300 uppercase tracking-wider text-sm">
                            Kunjungi Profesor Tani
                        </a>
                    </div>
                </div>
                <div class="w-full aspect-video rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/jJ0Q9Uq_97o"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    {{-- BERITA --}}
    <section class="py-16 bg-white" id="berita">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 uppercase">Berita Terbaru</h2>
                    <p class="text-green-600 font-medium">Informasi terkini seputar pertanian di Grobogan</p>
                </div>
                <a href="{{ url('/berita') }}"
                    class=" md:flex items-center text-green-600 font-bold hover:text-green-800 transition">
                    SEMUA BERITA <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                @if (isset($berita) && $berita->count() > 0)
                    @foreach ($berita->take(6) as $b)
                        {{-- take(6) lebih cocok untuk grid 3 dan 2 agar barisnya genap --}}
                        <div class="group flex flex-col">
                            <a href="{{ url('/berita/' . $b->id) }}" class="flex flex-col h-full">
                                {{-- Container Gambar: w-full agar mengikuti kolom grid --}}
                                <div class="w-full h-40 md:h-52 overflow-hidden rounded-xl shadow-md mb-4">
                                    <img src="{{ asset('storage/berita/' . $b->foto_berita) }}" alt="{{ $b->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                        onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                                </div>

                                <article class="flex flex-col flex-grow">
                                    <span class="text-xs md:text-sm text-green-600 font-medium mb-1">
                                        {{ \Carbon\Carbon::parse($b->tanggal_berita)->translatedFormat('d F Y') }}
                                    </span>

                                    <h4
                                        class="text-sm md:text-lg font-bold text-gray-800 line-clamp-2 mb-2 group-hover:text-green-700 transition-colors">
                                        {{ $b->judul }}
                                    </h4>

                                    <p class="text-gray-600 line-clamp-2 text-xs md:text-sm leading-relaxed">
                                        {{ Str::words(strip_tags($b->deskripsi), 12, '...') }}
                                    </p>
                                </article>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{--
    <section class="pengaduan py-20 bg-cover bg-center bg-fixed relative" style="background-image: url('{{ asset('img/bg-petani.jpg') }}')">
        <div class="absolute inset-0 bg-green-900/80"></div>
        <div class="relative max-w-4xl mx-auto px-4 z-10">
            <div class="text-center mb-10 text-white">
                <h2 class="text-3xl md:text-4xl font-bold uppercase">Unit Pengaduan / LAPOR!</h2>
                <p class="mt-2 text-green-100">Sampaikan keluhan atau aspirasi Anda secara langsung kepada kami</p>
            </div>

            <div class="bg-white p-6 md:p-10 shadow-2xl rounded-3xl">
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="nama" required class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500" placeholder="Nama Lengkap">
                        <input type="email" name="email" required class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500" placeholder="Alamat Email">
                    </div>
                    <input type="number" name="telp" required class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500" placeholder="Nomor WhatsApp / HP">
                    <textarea name="pengaduan" rows="4" required class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500" placeholder="Tuliskan aduan atau laporan Anda secara detail..."></textarea>

                    <button type="submit" class="w-full py-4 bg-green-700 text-white font-bold rounded-xl hover:bg-green-800 transition duration-300 shadow-lg shadow-green-200 uppercase tracking-widest">
                        Kirim Laporan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-20" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-16 uppercase tracking-tight">Hubungi Kami</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-3xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-blue-50 p-4 rounded-2xl text-blue-600 mb-4">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Alamat Kantor</h4>
                        <p class="text-gray-700 text-sm leading-relaxed">{{ $profile->alamat }}</p>
                    </div>

                    <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-3xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-green-50 p-4 rounded-2xl text-green-600 mb-4">
                            <i class="fab fa-whatsapp text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">WhatsApp / Telp</h4>
                        <p class="text-gray-700 font-bold text-lg">{{ $profile->telp }}</p>
                    </div>

                    <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-3xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-red-50 p-4 rounded-2xl text-red-600 mb-4">
                            <i class="fas fa-envelope text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Email Resmi</h4>
                        <p class="text-gray-700 font-medium">{{ $profile->email }}</p>
                    </div>

                    <div class="bg-white p-8 shadow-sm border border-gray-100 rounded-3xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-orange-50 p-4 rounded-2xl text-orange-600 mb-4">
                            <i class="fas fa-clock text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Jam Operasional</h4>
                        <p class="text-gray-700 text-sm">Senin - Jumat: 07:15 - 15:30 WIB</p>
                    </div>
                </div>

                <div class="md:col-span-1 bg-white shadow-xl rounded-3xl overflow-hidden minh[400px] border-4 border-white">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.528342718107!2d110.9161864!3d-7.0645601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70900000000000%3A0x0!2zN8KwMDMnNTIuNCJTIDExMMKwNTQnNTguMyJF!5e0!3m2!1sid!2sid!4v1620000000000!5m2!1sid!2sid"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
