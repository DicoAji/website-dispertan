@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

    {{-- <section id="indicators-carousel" class="relative w-full" data-carousel="static">
        <div class="relative h-128 overflow-hidden rounded-base md:h-[500px]">

            <div class="absolute inset-0 h-full w-full hidden duration-700 ease-in-out bg-center bg-cover"
                style="background-image: url('{{ asset('storage/corausel/lahan.png') }}')" data-carousel-item="active">
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center z-20 w-full px-4">
                    <h2 class="text-3xl sm:text-4xl font-bold md:text-5xl">
                        Selamat Datang
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
    </section> --}}

    {{-- section hero section --}}
    <section class="relative bg-cover bg-center bg-no-repeat  -mt-16 py-4"
        style="background-image: url('{{ asset('storage/background/bg-hero.png') }}');">
        <div class="absolute inset-0"></div>

        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                <div class="flex flex-col items-start text-left z-10">
                    <h1 class="text-4xl md:text-6xl lg:text-6xl font-extrabold text-white  leading-tight">
                        <span class="bold text-2xl md:text-2xl font-semibold   mb-2">Selamat Datang di</span> <br>
                        <span class="bold ">Website Resmi</span>
                        <span class="bold text-yellow-400">Dinas Pertanian</span>
                        <span class="bold text-3xl md:text-4xl mt-2 ">Kabupaten Grobogan</span>
                    </h1>

                    <p class="mt-6 text-lg  text-white max-w-lg leading-relaxed">
                        Unlock smarter farming with tailored agri-solutions that boost yields, preserve resources, and
                        secure food futures.
                    </p>

                    <a href="#"
                        class="mt-8 inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                        GET STARTED
                    </a>
                </div>

                <div class="relative flex justify-center z-10 mt-16 md:mt-0">
                    <img src="/storage/background/pak_kukuh.png" alt="Pak Kukuh"
                        class="relative bottom-0 z-10 w-full max-w-sm lg:max-w-md object-contain drop-shadow-2xl">
                    <div class="absolute -bottom-8  md:-bottom-12 z-20 bg-white  shadow-2xl p-5 md:p-6 w-11/12 max-w-md">
                        <div class="flex flex-row items-center justify-around divide-x-2 divide-gray-100">

                            <div class="flex-1 px-2 md:px-4 text-center">
                                <h3 class="text-3xl font-extrabold text-gray-900">96%</h3>
                                <p class="text-xs md:text-sm text-gray-500 mt-1 font-medium leading-snug">
                                    Verified customer delight rating
                                </p>
                            </div>
                            <div class="flex-1 px-2 md:px-4 text-center">
                                <h3 class="text-3xl font-extrabold text-gray-900">12 +</h3>
                                <p class="text-xs md:text-sm text-gray-500 mt-1 font-medium leading-snug">
                                    Years of boosting agri-innovation
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- STATISTIK -->
    {{-- <section class="relative py-6 bg-center bg-cover bg-no-repeat"
        style="background-image: url('{{ asset('storage/logo/bg-statistik.png') }}')">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 text-center">
                <div class="shadow-sm  text-2xl flex flex-row items-center justify-center gap-2 transition ">
                    <p class="font-semibold text-white counter" data-target="20">
                        0
                    </p>
                    <p class="text-white text-xl font-semibold tracking-wider">
                        kali hari ini
                    </p>
                </div>
                <div class="shadow-sm  text-2xl flex flex-row items-center justify-center gap-2 transition ">
                    <p class="font-semibold text-white counter" data-target="1500000">
                        0
                    </p>
                    <p class="text-white text-xl font-semibold tracking-wider">
                        Bulan Ini
                    </p>
                </div>

                <div class="shadow-sm  text-2xl flex flex-row items-center justify-center gap-2 transition ">
                    <p class="font-semibold text-white counter" data-target="15000">
                        0
                    </p>
                    <p class="text-white text-xl font-semibold tracking-wider">
                        Tahun Ini
                    </p>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- BERITA --}}
    <section class=" bg-white mt-24" id="berita">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="">
                <div class="text-center flex flex-col items-center border-b-3 ">
                    <h2 class="text-lg md:text-4xl font-bold text-gray-800 text-center uppercase">Berita Terbaru</h2>
                    <p class="text-green-600 font-medium">Informasi terkini seputar pertanian di Grobogan</p>
                    </divc>
                </div>
                <div class="text-end  ">
                    <a href="{{ url('/berita') }}" class="underline text-blue-600  items-center hover:font-bold transition">
                        Lihat Semua Berita <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-4  mt-6">
                    @if (isset($berita) && $berita->count() > 0)
                        @foreach ($berita->take(6) as $b)
                            <div
                                class="group flex flex-col border  overflow-hidden shadow-sm hover:shadow-md transition p-3">
                                <a href="{{ url('/berita/' . $b->id) }}" class="flex flex-col h-full">
                                    {{-- Container Gambar: w-full agar mengikuti kolom grid --}}
                                    <div class="w-full h-40 md:h-52 overflow-hidden  shadow-md mb-4">
                                        <img src="{{ asset('storage/berita/' . $b->foto_berita) }}"
                                            alt="{{ $b->judul }}"
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

    <!-- PROF TANI -->
    <section class="mt-24 bg-gray-100 py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8  ">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center ">
                <div class="space-y-4 md:space-y-6">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-gray-800 leading-tight uppercase">
                        Profesor Tani
                    </h3>
                    <p class="text-gray-600 leading-relaxed ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales, nulla ac pellentesque
                        finibus, velit diam consequat ex, in hendrerit sem ante nec nisl. Mauris sit amet turpis vel
                        lacus
                        dapibus lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        cubilia
                        curae; Sed ut perspiciatis unde omnis iste natus error sit voluptatem.
                    </p>
                    <div class="">
                        <a href="https://profesortani.com/" target="_blank"
                            class="inline-block px-5 py-3 bg-yellow-400 text-white shadow-lg hover:bg-amber-500 transition duration-300 uppercase tracking-wider text-sm">
                            Kunjungi
                        </a>
                    </div>
                </div>
                <div
                    class="w-full aspect-video p-2  shadow-sm border border-gray-200 rounded-lg hover:shadow-md transition ">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/jJ0Q9Uq_97o"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>



    <section class="pengaduan  bg-center py-6  mt-12">
        <div class="relative max-w-4xl mx-auto px-4">
            <div class="text-center mb-4">
                <h2 class="text-3xl md:text-4xl font-bold uppercase text-emerald-900">Unit Pengaduan / LAPOR!</h2>
                <p class="mt-2 ">Sampaikan keluhan atau aspirasi Anda secara langsung kepada kami</p>
            </div>

            <div class="bg-white p-6 md:p-10 shadow-2xl rounded-3xl">
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="">
                        <input type="text" name="nama" required
                            class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500"
                            placeholder="Nama Lengkap">

                    </div>
                    <input type="number" name="telp" required
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500"
                        placeholder="Nomor WhatsApp / HP">
                    <textarea name="pengaduan" rows="4" required
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:ring-green-500 focus:border-green-500"
                        placeholder="Tuliskan aduan atau laporan Anda secara detail..."></textarea>

                    <button type="submit"
                        class="w-full py-4 bg-green-950 text-white font-bold rounded-xl hover:bg-green-800 transition duration-300 shadow-lg shadow-green-200 uppercase tracking-widest">
                        Kirim Laporan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-20" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-16 uppercase tracking-tight">Hubungi Kami
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div
                        class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-blue-50 p-4 rounded-2xl text-blue-600 mb-4">
                            <i class="fas fa-map-marker-alt text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Alamat Kantor</h4>
                        <p class="text-gray-700 text-sm leading-relaxed">{{ $profile->alamat }}</p>
                    </div>

                    <div
                        class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-green-50 p-4 rounded-2xl text-green-600 mb-4">

                            <i class="fa-solid fa-phone text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Telp</h4>
                        <p class="text-gray-700 font-bold text-lg">{{ $profile->telp }}</p>
                    </div>

                    <div
                        class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-red-50 p-4 rounded-2xl text-red-600 mb-4">
                            <i class="fas fa-envelope text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Email Resmi</h4>
                        <p class="text-gray-700 font-medium">{{ $profile->email }}</p>
                    </div>

                    <div
                        class="bg-white p-8 shadow-sm border border-gray-100 rounded-xl flex flex-col items-start hover:shadow-md transition">
                        <div class="bg-orange-50 p-4 rounded-2xl text-orange-600 mb-4">
                            <i class="fas fa-clock text-2xl"></i>
                        </div>
                        <h4 class="text-xs font-bold uppercase text-gray-400 tracking-widest mb-2">Jam Operasional</h4>
                        <p class="text-gray-700 text-sm">Senin - Jumat: 07:15 - 15:30 WIB</p>
                    </div>
                </div>

                <div class="md:col-span-1 bg-white shadow-xl rounded-xl overflow-hidden minh[400px] border-4 border-white">
                    <iframe
                        src="https://maps.google.com/maps?width=600&height=400&hl=en&q=dinas%20pertanian%20grobogan&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                        width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
