<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - Admin DISPERTAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        #sidebar,
        #main-content,
        #toggleIcon {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans overflow-hidden">
    <div class="flex h-screen">
        <div id="sidebar"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-green-900 text-white transform translate-x-0 shadow-xl flex flex-col">

            <div class="flex items-center px-6 py-5 border-b border-green-700 shrink-0">
                <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" alt="Logo Grobogan"
                    class="h-8 w-auto mr-3 object-contain">
                <span class="text-xl font-bold tracking-wider">DISPERTAN</span>
            </div>
            <nav class="pt-6 px-4 pb-6 space-y-1 flex-1 overflow-y-auto custom-scrollbar text-sm font-medium">

                <a href="{{ url('/admin') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->is('admin') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-home w-6 text-center"></i>
                    <span class="ml-2">Dashboard</span>
                </a>

                <a href="{{ route('profile.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->routeIs('profile.*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-building w-6 text-center"></i>
                    <span class="ml-2">Profil</span>
                </a>

                <a href="{{ route('admin.berita.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->is('admin/berita*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-newspaper w-6 text-center"></i>
                    <span class="ml-2">Berita</span>
                </a>

                <a href="{{ route('file_dinas.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->is('admin/file-dinas*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-folder-open w-6 text-center"></i>
                    <span class="ml-2">Dokumen</span>
                </a>

                <a href="{{ route('pegawai.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->routeIs('pegawai.*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-users w-6 text-center"></i>
                    <span class="ml-2">Pegawai</span>
                </a>

                <a href="{{ route('admin.galeri.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.galeri.*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-images w-6 text-center"></i>
                    <span class="ml-2">Galeri</span>
                </a>

                <a href="{{ route('admin.laporan.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->is('admin/laporan*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-clipboard-list w-6 text-center"></i>
                    <span class="ml-2">Laporan</span>
                </a>
                <a href="{{ route('admin.informasi.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.informasi.*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-info-circle w-6 text-center"></i>
                    <span class="ml-2">Informasi</span>
                </a>

                <a href="{{ route('admin.tambahan_menu.index') }}"
                    class="flex items-center py-2.5 px-4 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.tambahan_menu.*') ? 'bg-green-900 shadow-md text-white font-semibold' : 'text-green-50 hover:bg-green-800/80 hover:translate-x-1.5' }}">
                    <i class="fas fa-folder-plus w-6 text-center"></i>
                    <span class="ml-2">Tambahan Menu</span>
                </a>

                <style>
                    summary::-webkit-details-marker {
                        display: none;
                    }

                    .custom-scrollbar::-webkit-scrollbar {
                        width: 6px;
                    }

                    .custom-scrollbar::-webkit-scrollbar-track {
                        background: transparent;
                    }

                    .custom-scrollbar::-webkit-scrollbar-thumb {
                        background-color: #14532d;
                        border-radius: 10px;
                    }

                    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                        background-color: #064e3b;
                    }
                </style>
            </nav>
        </div>

        <div id="main-content" class="flex-1 flex flex-col min-w-0 ml-64">
            <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center border-b border-green-600">
                <div class="flex items-center">
                    <button id="menuBtn"
                        class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none z-40">
                        <i id="toggleIcon" class="fas fa-times fa-lg"></i>
                    </button>
                    <h2 class="ml-4 text-xl font-semibold text-gray-800 uppercase tracking-tight">@yield('header')</h2>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs text-gray-400">Selamat Datang,</p>
                        <p class="text-sm font-bold text-gray-700">Admin Dispertan</p>
                    </div>
                    <img class="h-10 w-10 rounded-full border-2 border-green-500 shadow-sm"
                        src="https://ui-avatars.com/api/?name=Admin&background=059669&color=fff" />
                    <a href="{{ url('/logout') }}" title="Keluar dari Sistem"
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-red-500 text-red-800 border-red-800 hover:bg-red-800 hover:text-white transition-colors duration-300 shadow-sm border ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 ml-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                    </a>

                </div>
            </header>

            <main class="p-8 overflow-y-auto bg-gray-50 flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const menuBtn = document.getElementById("menuBtn");
        const toggleIcon = document.getElementById("toggleIcon");
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("main-content");

        menuBtn.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
            if (window.innerWidth >= 768) {
                mainContent.classList.toggle("ml-64");
            }
            if (sidebar.classList.contains("-translate-x-full")) {
                toggleIcon.classList.replace('fa-times', 'fa-bars');
            } else {
                toggleIcon.classList.replace('fa-bars', 'fa-times');
            }
        });
    </script>
</body>

</html>
