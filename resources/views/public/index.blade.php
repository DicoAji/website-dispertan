@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    <main>
        <section class="relative h-[500px] flex items-center overflow-hidden bg-emerald-900">
            <div class="absolute inset-0 opacity-40">
                <img src="{{ asset('storage/background/kegiatan-bersih-bersih-rutin.jpeg') }}" alt="Background"
                    class="w-full h-full object-cover" />
            </div>
            <div class="container mx-auto px-4 relative z-10 text-white">
                <div class="w-full text-center">

                    <h1 class="text-4xl md:text-6xl font-bold  leading-tight">
                        Dinas Pertanian Kab.Grobogan
                    </h1>
                    <p class="text-lg md:text-xl mb-8 opacity-90">
                        Portal resmi Dinas Pertanian Kab.Grobogan
                    </p>
                    <div class="flex flex-wrap gap-4 W-ful text-center justify-center">
                        <a href="https://infopangan.jakarta.go.id/" class="btn-primary">Eksplore</a>
                        <a href="/ppid"
                            class="bg-white/20 backdrop-blur-md text-white px-6 py-2 rounded-full font-semibold hover:bg-white/30 transition-all border border-white/30">Info
                            Berita</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Unit Kerja</h2>
                    <p class="text-gray-500 mt-2">
                        Menjelajahi struktur penunjang ekosistem berkelanjutan.
                    </p>
                </div>

                <div class="flex overflow-x-auto gap-6 pb-6 hide-scrollbar">
                    <div class="mobile-card flex-shrink-0 w-64 p-6 bg-slate-50 border-slate-100">
                        <div
                            class="w-16 h-16 bg-slate-700 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-slate-900 text-center">
                            Sekretariat
                        </h3>
                        <p class="text-sm text-slate-700 text-center">
                            Pengelolaan administrasi dan tata kelola pelayanan internal.
                        </p>
                    </div>

                    <div class="mobile-card flex-shrink-0 w-64 p-6 bg-blue-50 border-blue-100">
                        <div
                            class="w-16 h-16 bg-blue-700 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa-solid fa-tractor"></i>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-blue-900 text-center">
                            PSP
                        </h3>
                        <p class="text-sm text-blue-700 text-center">
                            Penyuluhan serta penyediaan sarana dan prasarana pendukung.
                        </p>
                    </div>

                    <div class="mobile-card flex-shrink-0 w-64 p-6 bg-amber-50 border-amber-100">
                        <div
                            class="w-16 h-16 bg-amber-600 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-amber-900 text-center">
                            Tanaman Pangan
                        </h3>
                        <p class="text-sm text-amber-700 text-center">
                            Peningkatan produksi dan ketahanan komoditas pangan pokok.
                        </p>
                    </div>

                    <div class="mobile-card flex-shrink-0 w-64 p-6 bg-emerald-50 border-emerald-100">
                        <div
                            class="w-16 h-16 bg-emerald-700 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa fa-tree"></i>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-emerald-900 text-center">
                            Perkebunan
                        </h3>
                        <p class="text-sm text-emerald-700 text-center">
                            Pengembangan usaha dan pengelolaan hasil tanaman perkebunan.
                        </p>
                    </div>

                    <div class="mobile-card flex-shrink-0 w-64 p-6 bg-rose-50 border-rose-100">
                        <div
                            class="w-16 h-16 bg-rose-600 text-white rounded-2xl flex items-center justify-center text-3xl mb-4 mx-auto shadow-lg">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div>
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

        <section class="py-16 bg-gray-50" id="berita">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-600">Berita Terkini</h2>
                    <a href="/blogs" class="text-emerald-700 font-semibold hover:underline">Lihat Semua</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if (isset($berita) && $berita->count() > 0)
                        @foreach ($berita->take(6) as $b)
                            <article
                                class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                                <a href="{{ url('/berita/' . $b->id) }}" class="block relative h-52 overflow-hidden">
                                    <img src="{{ asset('storage/berita/' . $b->foto_berita) }}" alt="{{ $b->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                                </a>

                                <div class="p-6 flex flex-col h-full">
                                    <a href="{{ url('/berita/' . $b->id) }}">
                                        <h3 class="font-bold text-lg mb-4 line-clamp-2 leading-snug">
                                            {{ $b->judul }}
                                        </h3>
                                    </a>

                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <span class="text-xs md:text-sm text-gray-500  pointer-events-none">
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
                    @endif
                </div>
            </div>
        </section>

        <!-- PROF TANI -->
        <section class=" py-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 ">
                <div class="text-center ">
                    <h2 class="text-3xl font-bold text-gray-800 mb-1">Apa Itu “Profesor Tani”?</h2>
                    <p class="text-sm text-gray-600  leading-relaxed">
                        “Profesor Tani” juga merupakan julukan untuk petani dan penyuluh pertanian
                        (PPL) sebagai garda terdepan ketahanan pangan.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 items-center mt-12 ">
                    <div class="space-y-4 md:space-y-2">
                        <div class="w-full " data-aos="fade-up" data-aos-delay="300">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="flex flex-col">
                                    <div class="text-blue-600 text-3xl mb-3">
                                        <i class="fa-solid fa-chart-line"></i>
                                    </div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Peningkatan Usaha</h4>
                                    <p class="text-gray-600 text-sm">Peningkatan Produktivitas kerja dan pengetahuan
                                        petani.
                                    </p>
                                </div>

                                <div class="flex flex-col">
                                    <div class="text-blue-600 text-3xl mb-3">
                                        <i class="fa-solid fa-lightbulb"></i>
                                    </div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Solusi Inovatif</h4>
                                    <p class="text-gray-600 text-sm">
                                        Menerapkan solusi yang inovatif untuk mendukung kegiatan Pertanian.
                                    </p>
                                </div>

                                <div class="flex flex-col">
                                    <div class="text-blue-600 text-3xl mb-3">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Petani Ahli (Profesor Tani)
                                    </h4>
                                    <p class="text-gray-600 text-sm">
                                        Setiap petani menjadi ahli untuk bidangnya masing-masing dan saling
                                        berbagi.
                                    </p>
                                </div>

                                <div class="flex flex-col">
                                    <div class="text-blue-600 text-3xl mb-3">
                                        <i class="fa-solid fa-trophy"></i>
                                    </div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Hasil Terbaik</h4>
                                    <p class="text-gray-600 text-sm">Upaya mencapai hasil terbaik.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="w-full aspect-video p-2  shadow-sm   hover:shadow-md transition ">
                        <iframe class="w-full h-full rounded-2xl" src="https://www.youtube.com/embed/jJ0Q9Uq_97o"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="block w-full text-center justify-center">
                    <a href="https://profesortani.com/" target="_blank" class="btn-primary inline-block">
                        Kunjungi Profesor Tani
                    </a>
                </div>
            </div>
        </section>



        <section class="pengaduan  bg-center py-6  mt-12">
            <div class="relative max-w-4xl mx-auto px-4">
                <div class="text-center mb-4">
                    <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Unit Pengaduan / LAPOR!</h2>
                    <p class="mt-2 ">Sampaikan keluhan atau aspirasi Anda secara langsung kepada kami</p>
                </div>

                <div class="bg-white p-6 md:p-10 shadow-2xl rounded-3xl">
                    <form action="#" method="POST" class="space-y-4">
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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-center text-3xl md:text-4xl font-semibold text-gray-400 mb-16 tracking-tight">Hubungi
                    Kami
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

                    <div
                        class="md:col-span-1 bg-white shadow-xl rounded-xl overflow-hidden minh[400px] border-4 border-white">
                        <iframe
                            src="https://maps.google.com/maps?width=600&height=400&hl=en&q=dinas%20pertanian%20grobogan&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>



@endsection
