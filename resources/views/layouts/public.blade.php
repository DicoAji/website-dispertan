<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ 'Dispertan Grobogan' }} | @yield('title') </title>

    <link rel="icon" type="image/png" href="{{ asset('storage/logo/lambang_grobogan.png') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>

    <style type="text/tailwindcss">
        @layer components {
            .nav-link {
                @apply text-gray-700 hover:text-emerald-700 font-medium transition-colors duration-200 px-3 py-2;
            }

            .mobile-card {
                @apply bg-white p-4 rounded-2xl border border-emerald-50 shadow-sm flex flex-col items-center text-center min-w-[140px];
            }

            .btn-primary {
                @apply bg-emerald-700 text-white px-6 py-2 rounded-full font-semibold hover:bg-emerald-800 transition-all shadow-md;
            }

            .btn-secondary {
                @apply inline-flex items-center px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold transition shadow-md rounded-full;
            }
        }

        /* Custom scrollbar for horizontal scrolling */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Sembunyikan scrollbar untuk Chrome, Safari dan Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Sembunyikan scrollbar untuk IE, Edge dan Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-800 relative">

    @include('layouts.partials.public-header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.public-footer')

    @php
        // Mengambil data dari tabel menu_layanan langsung di layout
        $menuLayanan = \App\Models\MenuLayanan::all();

        // Daftar warna gradasi untuk tombol (akan diulang jika menu lebih dari jumlah warna ini)
        $fabColors = [
            'from-red-500 to-rose-600 hover:shadow-red-500/50 border-red-400/50',
            'from-blue-500 to-indigo-600 hover:shadow-blue-500/50 border-blue-400/50',
            'from-emerald-500 to-teal-600 hover:shadow-emerald-500/50 border-emerald-400/50',
            'from-orange-500 to-amber-600 hover:shadow-orange-500/50 border-orange-400/50',
            'from-purple-500 to-fuchsia-600 hover:shadow-purple-500/50 border-purple-400/50',
        ];
    @endphp

    {{-- FLOATING ACTION BUTTON (Selalu muncul di pojok kanan bawah) --}}
    <div class="fixed bottom-6 right-6 z-[9999] flex flex-col items-end">

        {{-- Menu Item (Secara default tersembunyi dengan scale-0) --}}
        <div id="fabMenu"
            class="flex flex-col gap-3 mb-4 origin-bottom scale-0 opacity-0 transition-all duration-300 pointer-events-none items-end">

            @foreach ($menuLayanan as $index => $menu)
                @php
                    // Logika URL: Prioritaskan file, jika tidak ada gunakan link
                    $url = '#';
                    $target = '_self';

                    if ($menu->file) {
                        $url = asset('storage/menu_layanan/' . $menu->file);
                        $target = '_blank';
                    } elseif ($menu->link) {
                        $url = url($menu->link);
                        // Buka di tab baru jika link eksternal (http/https)
                        if (str_starts_with($menu->link, 'http')) {
                            $target = '_blank';
                        }
                    }

                    // Ambil kelas warna berdasarkan urutan index (modulo agar warna berulang jika menu banyak)
                    $colorClass = $fabColors[$index % count($fabColors)];
                @endphp

                <a href="{{ $url }}" target="{{ $target }}"
                    class="group transform transition-transform duration-300 hover:-translate-x-2">
                    <div
                        class="px-6 py-2.5 bg-gradient-to-r {{ $colorClass }} text-white font-bold text-sm tracking-widest rounded-full shadow-lg border min-w-[120px] text-center flex items-center justify-center uppercase">
                        {{ $menu->nama }}
                    </div>
                </a>
            @endforeach

        </div>

        {{-- Tombol Utama --}}
        <button id="fabMainBtn"
            class="w-14 h-14 bg-emerald-600 text-white rounded-full shadow-[0_0_20px_rgba(5,150,105,0.4)] hover:bg-emerald-700 hover:scale-105 transition-all duration-300 flex items-center justify-center text-2xl relative z-10 focus:outline-none">
            <i class="fas fa-headset transition-transform duration-300" id="fabIcon"></i>
        </button>
    </div>
    {{-- END FLOATING ACTION BUTTON --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        // Script Header
        const menuBtn = document.getElementById("menuBtn");
        const mobileMenu = document.getElementById("mobileMenu");
        const menuIcon = menuBtn.querySelector("i");

        if (menuBtn && mobileMenu && menuIcon) {
            menuBtn.addEventListener("click", () => {
                mobileMenu.classList.toggle("hidden");
                if (mobileMenu.classList.contains("hidden")) {
                    menuIcon.classList.remove("fa-times");
                    menuIcon.classList.add("fa-bars");
                } else {
                    menuIcon.classList.remove("fa-bars");
                    menuIcon.classList.add("fa-times");
                }
            });
        }

        // Script Floating Action Button
        const fabMainBtn = document.getElementById('fabMainBtn');
        const fabMenu = document.getElementById('fabMenu');
        const fabIcon = document.getElementById('fabIcon');

        if (fabMainBtn) {
            fabMainBtn.addEventListener('click', () => {
                // Cek apakah menu sedang tertutup
                const isClosed = fabMenu.classList.contains('scale-0');

                if (isClosed) {
                    // Buka menu
                    fabMenu.classList.remove('scale-0', 'opacity-0', 'pointer-events-none');
                    fabMenu.classList.add('scale-100', 'opacity-100', 'pointer-events-auto');
                    // Putar ikon dan ganti jadi tanda silang
                    fabIcon.classList.remove('fa-headset');
                    fabIcon.classList.add('fa-times', 'rotate-90');
                } else {
                    // Tutup menu
                    fabMenu.classList.remove('scale-100', 'opacity-100', 'pointer-events-auto');
                    fabMenu.classList.add('scale-0', 'opacity-0', 'pointer-events-none');
                    // Kembalikan ikon awal
                    fabIcon.classList.remove('fa-times', 'rotate-90');
                    fabIcon.classList.add('fa-headset');
                }
            });
        }
    </script>
</body>

</html>
