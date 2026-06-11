<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-900 flex items-center justify-center min-h-screen relative  py-8">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 relative z-10 border border-green-100 m-4">
        <div class="text-center mb-8">
            <div class="inline-flex p-3 bg-green-100 rounded-full text-green-700 mb-3">
                <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" alt="Logo Grobogan"
                    class="h-12 w-auto object-contain">
            </div>
            <h2 class="text-2xl font-bold text-gray-800 tracking-wide">Dinas Pertanian</h2>
            <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest font-semibold">Kabupaten Grobogan</p>
        </div>

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                    placeholder="Masukkan nama Anda" required autofocus>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                    placeholder="admin@dinas.go.id" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Kata Sandi</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                    placeholder="Minimal 8 karakter" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Ulangi Kata
                    Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition duration-200"
                    placeholder="Ketik ulang kata sandi" required>
            </div>

            <button type="submit"
                class="w-full bg-green-700 text-white font-bold py-3 px-4 rounded-xl hover:bg-green-800 active:scale-[0.99] transform transition duration-150 shadow-lg shadow-green-900/30">
                Daftar Akun Baru
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Sudah memiliki akun?
            <a href="{{ url('/login') }}"
                class="text-green-700 font-semibold hover:text-green-800 hover:underline transition duration-150">Masuk
                di sini</a>
        </p>
    </div>
</body>

</html>
