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
            class="fixed inset-y-0 left-0 z-30 w-64 bg-green-800 text-white transform translate-x-0 shadow-xl">
            <div class="flex items-center px-6 py-5 border-b border-green-700">
                <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" alt="Logo Grobogan"
                    class="h-8 w-auto mr-3 object-contain">

                <span class="text-xl font-bold tracking-wider">DISPERTAN</span>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ url('/admin') }}"
                    class="flex items-center py-3 px-4 rounded-lg transition {{ request()->is('admin') ? 'bg-green-900 shadow-inner' : 'hover:bg-green-700' }}">
                    <i class="fas fa-home w-6"></i> Dashboard
                </a>

                <a href="{{ route('pegawai.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('pegawai.*') ? 'bg-green-900 shadow-inner' : 'hover:bg-green-700' }} transition">
                    <i class="fas fa-users w-6"></i> Data Pegawai
                </a>

                <a href="{{ route('berita.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('berita.*') ? 'bg-green-900' : 'hover:bg-green-700' }}">
                    <i class="fas fa-newspaper w-6"></i> Berita
                </a>

                <a href="{{ route('profile.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('profile.*') ? 'bg-green-900 shadow-inner' : 'hover:bg-green-700' }} transition">
                    <i class="fas fa-building w-6"></i> Profil Dinas
                </a>
                <a href="{{ route('file_dinas.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg {{ request()->is('admin/file-dinas*') ? 'bg-green-900 shadow-inner' : 'hover:bg-green-700' }} transition">
                    <i class="fas fa-folder-open w-6"></i>

                    <span class="ml-2 font-medium">File Dinas</span>
                </a>
                <a href="{{ route('skm.index') }}"
                    class="flex items-center py-3 px-4 rounded-lg {{ request()->is('admin/skm*') ? 'bg-green-900 shadow-inner' : 'hover:bg-green-700' }} transition">
                    <i class="fas fa-poll w-6"></i>
                    <span class="ml-2 font-medium">SKM (Survei)</span>
                </a>

                <a href="#" class="flex items-center py-3 px-4 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-file-alt w-6"></i> Laporan
                </a>
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
                <div class="flex items-center space-x-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs text-gray-400">Selamat Datang,</p>
                        <p class="text-sm font-bold text-gray-700">Admin Dispertan</p>
                    </div>
                    <img class="h-10 w-10 rounded-full border-2 border-green-500 shadow-sm"
                        src="https://ui-avatars.com/api/?name=Admin&background=059669&color=fff" />
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
