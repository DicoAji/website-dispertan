@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    <main>

        {{-- ========================================== --}}
        {{-- POPUP INFORMASI (Muncul otomatis saat halaman dibuka) --}}
        {{-- ========================================== --}}
        @if (isset($popup) && $popup->gambar)
            <div id="homePopup"
                class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/70 backdrop-blur-sm p-4 transition-opacity duration-300 opacity-0">
                <div id="homePopupContent"
                    class="relative w-full max-w-md transform scale-95 transition-transform duration-300">

                    {{-- Glow aksen di belakang kartu --}}
                    <div
                        class="absolute -inset-1 bg-gradient-to-br from-emerald-400 via-emerald-500 to-amber-400 rounded-[2rem] blur-lg opacity-40">
                    </div>

                    <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden ring-1 ring-white/50">

                        {{-- Label mengambang --}}
                        <div class="absolute top-4 left-4 z-10">
                            <span
                                class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm text-emerald-800 text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-sm">
                                <i class="fa-solid fa-bullhorn text-emerald-600"></i> Informasi
                            </span>
                        </div>

                        {{-- Tombol tutup --}}
                        <button type="button" onclick="closeHomePopup()"
                            class="absolute top-4 right-4 z-10 w-9 h-9 flex items-center justify-center rounded-full bg-black/50 text-white hover:bg-black/70 hover:rotate-90 transition-all duration-300">
                            <i class="fas fa-times"></i>
                        </button>

                        {{-- Gambar --}}
                        <div class="relative bg-gray-50">
                            <img src="{{ asset('storage/popup/' . $popup->gambar) }}"
                                alt="{{ $popup->kegiatan ?? 'Informasi' }}" class="w-full max-h-[65vh] object-contain">
                            <div
                                class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/30 to-transparent pointer-events-none">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        <section class="relative h-[500px] flex items-center overflow-hidden bg-emerald-900">
            <div class="absolute inset-0 opacity-40">
                <img src="{{ asset('storage/background/' . ($header->gambar ?? 'petani-tembakau.jpeg')) }}" alt="Background"
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
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    @if (isset($berita) && $berita->count() > 0)
                        @php
                            $sortedBerita = $berita->sortByDesc('tanggal_berita');
                            $beritaTerbaru = $sortedBerita->first();
                            $beritaSelanjutnya = $sortedBerita->skip(1)->take(3);
                        @endphp

                        {{-- BAGIAN KIRI: 1 Berita Utama (Overlay Text) --}}
                        @if ($beritaTerbaru)
                            <article
                                class="lg:col-span-7 relative rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group">
                                <a href="{{ url('/berita/' . $beritaTerbaru->id) }}" class="block relative h-80">
                                    <img src="{{ asset('storage/berita/' . $beritaTerbaru->foto_berita) }}"
                                        alt="{{ $beritaTerbaru->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />

                                    {{-- Overlay Gradient & Teks --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6 text-white">
                                        <span class="text-xs text-gray-300 mb-1">
                                            {{ \Carbon\Carbon::parse($beritaTerbaru->tanggal_berita)->translatedFormat('d F Y') }}
                                        </span>
                                        <h2 class="font-bold text-xl mb-2 leading-tight  transition-colors">
                                            {{ $beritaTerbaru->judul }}</h2>

                                    </div>
                                </a>
                            </article>
                        @endif

                        {{-- BAGIAN KANAN: 3 Berita Selanjutnya (Tanpa Padding Kotak) --}}
                        <div class="lg:col-span-5 flex flex-col justify-between gap-4 py-1">
                            @foreach ($beritaSelanjutnya as $b)
                                <article class="flex gap-4 items-center group">
                                    <a href="{{ url('/berita/' . $b->id) }}"
                                        class="w-32 h-24 flex-shrink-0 overflow-hidden rounded-lg shadow-sm">
                                        <img src="{{ asset('storage/berita/' . $b->foto_berita) }}"
                                            alt="{{ $b->judul }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                            onerror="this.onerror=null;this.src='{{ asset('img/no-image.png') }}'" />
                                    </a>
                                    <div class="min-w-0">
                                        <span class="text-[11px] text-gray-500">
                                            {{ \Carbon\Carbon::parse($b->tanggal_berita)->translatedFormat('d F Y') }}
                                        </span>
                                        <h3
                                            class="font-semibold text-sm leading-snug line-clamp-2 mt-1 text-gray-800 group-hover:text-emerald-700 transition-colors">
                                            <a href="{{ url('/berita/' . $b->id) }}">{{ $b->judul }}</a>
                                        </h3>
                                    </div>
                                </article>
                            @endforeach
                        </div>
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

        <section class="pengaduan  bg-center py-6" id="lapor">
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

        {{-- SECTION APLIKASI LAIN (HORIZONTAL SCROLL & HOVER EFFECT) --}}
        <section class="py-16 bg-gradient-to-b from-gray-50/50 to-white border-y border-gray-100 overflow-hidden mt-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Aplikasi Lain</h2>
                <p class="text-gray-500 mt-2">
                    Jelajahi berbagai aplikasi terkait yang mendukung ekosistem pertanian di Kabupaten Grobogan.
                </p>
            </div>

            {{-- Container Geser Kanan-Kiri --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-5 overflow-x-auto pb-6 pt-2 no-scrollbar scroll-smooth">
                    @forelse($aplikasiLain ?? [] as $app)
                        <a href="{{ $app->link }}" target="_blank"
                            class="flex flex-col items-center justify-between bg-white hover:bg-emerald-50/30 border border-gray-200/80 hover:border-emerald-300 rounded-2xl min-w-[170px] md:min-w-[190px] h-[140px] flex-shrink-0 transition-all duration-300 transform hover:-translate-y-1.5 group shadow-sm hover:shadow-xl">

                            {{-- Logo / Gambar (Hitam Putih ke Berwarna) --}}
                            <div class="w-12 h-12 md:w-14 md:h-14 flex items-center justify-center my-auto">
                                <img src="{{ asset('storage/aplikasi/' . $app->logo) }}" alt="{{ $app->nama_aplikasi }}"
                                    class="w-full h-full object-contain filter grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300">
                            </div>

                            {{-- Nama Aplikasi --}}
                            <span
                                class="text-xs md:text-sm  text-gray-700 group-hover:text-emerald-800 text-center tracking-tight transition-colors line-clamp-1 w-full mt-2">
                                {{ $app->nama_aplikasi }}
                            </span>
                        </a>
                    @empty
                        <div
                            class="w-full text-center py-8 text-gray-400 text-sm italic bg-white border border-dashed border-gray-200 rounded-2xl">
                            Belum ada tautan aplikasi lain yang ditambahkan.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        {{-- END SECTION APLIKASI LAIN --}}

        <section class="bg-gray-50 py-20" id="kontak">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold  text-emerald-900">Informasi Kontak</h2>
                <p class="text-gray-500 mt-2">
                    Hubungi kami untuk pertanyaan, saran, atau informasi lebih lanjut.
                </p>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

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

        {{-- SCRIPT: Typed.js, Suara Otomatis & Popup --}}
        <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // 1. Inisialisasi Typed.js
                var typed = new Typed('#typing-text', {
                    strings: ['Dinas Pertanian<br />Kabupaten Grobogan'],
                    typeSpeed: 60,
                    backSpeed: 40,
                    backDelay: 3000,
                    showCursor: true,
                    cursorChar: '|',
                    loop: true,
                    startDelay: 300
                });

                // 2. Fungsi Audio Otomatis (Web Speech API)
                function playWelcomeVoice() {
                    if ('speechSynthesis' in window) {
                        window.speechSynthesis.cancel(); // Hentikan jika ada suara yang sedang berjalan
                        var textToSpeech =
                            "Selamat Datang di Website Dinas Pertanian Kabupaten Grobogan. Portal resmi Dinas Pertanian Kabupaten Grobogan.";
                        var speech = new SpeechSynthesisUtterance(textToSpeech);
                        speech.lang = 'id-ID';
                        speech.rate = 0.95;
                        speech.pitch = 1;
                        window.speechSynthesis.speak(speech);
                    }
                }

                // Coba putar otomatis saat halaman dimuat (delay 1 detik)
                setTimeout(playWelcomeVoice, 1000);

                // Fallback: Putar otomatis saat ada interaksi pertama dari user (antisipasi aturan keamanan browser)
                var hasPlayedAudio = false;

                function triggerAudioOnInteraction() {
                    if (!hasPlayedAudio) {
                        playWelcomeVoice();
                        hasPlayedAudio = true;
                        // Hapus event listener agar tidak berbunyi berulang-ulang setiap kali diklik
                        window.removeEventListener('click', triggerAudioOnInteraction);
                        window.removeEventListener('scroll', triggerAudioOnInteraction);
                        window.removeEventListener('keydown', triggerAudioOnInteraction);
                    }
                }

                // Tambahkan pendeteksi interaksi pengguna
                window.addEventListener('click', triggerAudioOnInteraction);
                window.addEventListener('scroll', triggerAudioOnInteraction);
                window.addEventListener('keydown', triggerAudioOnInteraction);
            });
        </script>

        {{-- SCRIPT: Logika untuk Menutup Popup (Hanya dirender jika ada popup) --}}
        @if (isset($popup) && $popup->gambar)
            <script>
                // Gunakan fungsi langsung agar lebih stabil
                function closeHomePopup() {
                    var popup = document.getElementById('homePopup');
                    var popupContent = document.getElementById('homePopupContent');
                    if (popup) {
                        popup.classList.add('opacity-0');
                        popupContent.classList.add('scale-95');
                        setTimeout(function() {
                            popup.classList.add('hidden');
                        }, 300);
                    }
                }

                document.addEventListener('DOMContentLoaded', function() {
                    var popup = document.getElementById('homePopup');

                    // Langsung tampilkan tanpa kondisi session (sesuai testing Anda):
                    if (popup) {
                        popup.classList.remove('hidden');
                        popup.classList.add('flex');

                        // Animasi masuk
                        setTimeout(function() {
                            popup.classList.remove('opacity-0');
                            document.getElementById('homePopupContent').classList.remove('scale-95');
                        }, 100);
                    }
                });
            </script>
        @endif

    </main>
@endsection
