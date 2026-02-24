<footer class="bg-slate-900 text-white pt-16 pb-8">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            {{-- Kolom 1: Identitas --}}
            <div>
                <div class="text-lg font-bold border-l-4 border-green-500 pl-4">
                    <h3 class="uppercase">Dinas Pertanian</h3>
                    <h3 class="text-green-400">Kabupaten Grobogan</h3>
                </div>
                <div class="text-gray-400 text-sm mt-4 space-y-3">
                    <p class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-green-500"></i>
                        {{ $profile->alamat ?? 'Jl. Contoh No. 123, Purwodadi' }}
                    </p>
                    <p><i class="fas fa-phone mr-3 text-green-500"></i> {{ $profile->telp }}</p>
                    <p><i class="fas fa-envelope mr-3 text-green-500"></i> {{ $profile->email }}</p>
                </div>
            </div>

            {{-- Kolom 2: Link Cepat (Navigasi) --}}
            <div>
                <h4 class="text-sm font-semibold mb-6 uppercase tracking-wider">Navigasi</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="{{ url('/') }}" class="hover:text-green-400 transition">Beranda</a></li>
                    <li><a href="{{ url('/visimisi') }}" class="hover:text-green-400 transition">Visi & Misi</a></li>
                    <li><a href="#" class="hover:text-green-400 transition">Struktur Organisasi</a></li>
                    <li><a href="#" class="hover:text-green-400 transition">Kontak Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Media Sosial --}}
            <div>
                <h4 class="text-sm font-semibold mb-6 uppercase tracking-wider">Media Sosial</h4>
                <div class="flex space-x-3">
                    <a href="{{ $profile->facebook }}" target="_blank"
                        class="w-10 h-10 flex items-center justify-center bg-slate-800 rounded-lg text-white hover:bg-blue-600 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $profile->instagram }}" target="_blank"
                        class="w-10 h-10 flex items-center justify-center bg-slate-800 rounded-lg text-white hover:bg-pink-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ $profile->youtube }}" target="_blank"
                        class="w-10 h-10 flex items-center justify-center bg-slate-800 rounded-lg text-white hover:bg-red-600 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <p class="mt-6 text-xs text-gray-500 leading-relaxed">
                    Ikuti akun media sosial resmi kami untuk mendapatkan informasi terbaru seputar pertanian di
                    Kabupaten Grobogan.
                </p>
            </div>
        </div>

        <div class="mt-12 pt-6 border-t border-slate-800 text-center">
            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} {{ $profile->nama_opd ?? 'Dinas Pertanian' }}. Seluruh Hak Cipta Dilindungi.
            </p>
        </div>
    </div>
</footer>
