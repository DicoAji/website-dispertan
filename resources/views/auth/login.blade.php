<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Panel Admin Dinas Pertanian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-900 flex items-center justify-center min-h-screen relative ">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 relative z-10 border border-green-100 m-4">

        <div class="text-center mb-8">
            <div class="inline-flex p-3 bg-green-100 rounded-full text-green-700 mb-3">
                <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" alt="Logo Grobogan"
                    class="h-12 w-auto object-contain">
            </div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-wide">Dinas Pertanian</h2>
            <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest font-semibold">Kabupaten Grobogan</p>
        </div>

        @if (session('sukses'))
            <div
                class="bg-green-50 border-l-4 border-green-600 text-green-800 p-4 rounded-xl mb-6 text-sm flex items-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2 flex-shrink-0" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('sukses') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div
                class="bg-red-50 border-l-4 border-red-600 text-red-800 p-4 rounded-xl mb-6 text-sm flex items-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 mr-2 flex-shrink-0" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                    placeholder="admin@dinas.go.id" required autofocus>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                    placeholder="••••••••" required>
            </div>

            <button type="submit"
                class="w-full bg-green-700 text-white font-bold py-3 px-4 rounded-xl hover:bg-green-800 active:scale-[0.99] transform transition duration-150 shadow-lg shadow-green-900/30">
                Masuk ke Panel
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun admin?
            <a href="{{ url('/register') }}"
                class="text-green-700 font-semibold hover:text-green-800 hover:underline transition duration-150">Daftar
                di sini</a>
        </p>
    </div>
</body>

</html>
