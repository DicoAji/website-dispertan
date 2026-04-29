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
    </style>

</head>

<body class="font-sans antialiased text-gray-800">

    @include('layouts.partials.public-header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.public-footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script>
        // script header
        const menuBtn = document.getElementById("menuBtn");
        const mobileMenu = document.getElementById("mobileMenu");
        const menuIcon = menuBtn.querySelector("i");

        menuBtn.addEventListener("click", () => {
            // Toggle menu
            mobileMenu.classList.toggle("hidden");

            // Ubah ikon dari 'burger' ke 'silang (x)'
            if (mobileMenu.classList.contains("hidden")) {
                menuIcon.classList.remove("fa-times");
                menuIcon.classList.add("fa-bars");
            } else {
                menuIcon.classList.remove("fa-bars");
                menuIcon.classList.add("fa-times");
            }
        });
    </script>
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/efek.js') }}"></script> --}}
</body>

</html>
