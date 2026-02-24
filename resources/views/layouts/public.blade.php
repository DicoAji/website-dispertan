<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | {{ $profile->nama_opd ?? 'Dinas Pertanian Grobogan' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('storage/logo/lambang_grobogan.png') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('js/efek.js') }}" />
</head>
<body class="font-sans antialiased text-gray-800">

    @include('layouts.partials.public-header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.public-footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/efek.js') }}"></script>
</body>
</html>
