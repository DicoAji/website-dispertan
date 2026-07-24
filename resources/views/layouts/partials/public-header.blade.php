<header class="sticky top-0 z-50 bg-white shadow-sm ">
    <div class="container mx-auto px-4 h-20 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center space-x-1">
            <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" class="w-6 h-full"
                alt="Logo Dinas Pertanian Grobogan" />
            <div class="-space-y-1 border-l-2 border-green-500 pl-2 uppercase">
                <p class="text-xs font-semibold">Dinas Pertanian</p>
                <p class="text-xs font-semibold">Kabupaten Grobogan</p>
            </div>
        </a>

        <nav class="hidden md:flex items-center text-sm ">
            <a href="{{ url('/') }}"
                class="nav-link hover:text-emerald-700 font-medium px-3 py-2 transition-colors duration-200">
                Beranda
            </a>

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Profil
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="{{ url('/sejarah-dasar-hukum') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Sejarah dan Dasar Hukum</a>
                    <a href="{{ url('/visimisi') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Visi Misi</a>
                    <a href="{{ url('/struktur-organisasi') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Struktur Organisasi</a>
                    <a href="{{ route('public.tugas_fungsi') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Tugas & Fungsi</a>
                    <a href="{{ route('public.maklumat') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Maklumat Pelayanan</a>
                    <a href="{{ url('/pegawai') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Daftar Pegawai</a>
                </div>
            </div>

            {{-- <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Program
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">

                    <a href="{{ url('/program-kegiatan') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Program & Kegiatan</a>
                    <a href="{{ url('/target-capaian') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Target & Capaian</a>

                    <a href="{{ route('public.kalender_kegiatan') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Kalender Kegiatan</a>
                </div>
            </div> --}}

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Layanan
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">

                    @php

                        $layananMenu = \App\Models\Layanan::all();
                    @endphp

                    @forelse($layananMenu as $item)
                        @php
                            if (!empty($item->link)) {
                                $url = $item->link;
                                $target = '_blank';
                            } elseif (!empty($item->file)) {
                                $url = asset('storage/layanan/' . $item->file);
                                $target = '_blank';
                            } else {
                                $url = '#';
                                $target = '_self';
                            }
                        @endphp

                        <a href="{{ $url }}" target="{{ $target }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                            {{ $item->nama }}
                        </a>
                    @empty
                        <span class="block px-4 py-2 text-sm text-gray-400 italic">Belum ada layanan</span>
                    @endforelse

                </div>
            </div>


            <a href="{{ url('/dokumen') }}"
                class="nav-link flex items-center font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                Dokumen
            </a>
            <div class="relative group">
                <a href="{{ url('/ppid') }}">
                    <button
                        class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors ">
                        PPID
                    </button>
                </a>
                </a>
            </div>

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Berita
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full right-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-64 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="{{ url('/berita') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Berita</a>
                    <a href="{{ route('koleksi.artikel') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Artikel & Wawasan
                        Pertanian</a>
                    <a href="{{ route('koleksi.foto') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Galeri Foto</a>
                    <a href="{{ route('koleksi.video') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Video</a>
                </div>
            </div>

            {{-- <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Bidang/UPTD
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full right-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="{{ route('public.tanaman_pangan') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Tanaman Pangan</a>
                    <a href="{{ route('public.hortikultura') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Hortikultura</a>
                    <a href="{{ route('public.perkebunan') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Perkebunan</a>
                    <a href="{{ route('public.psp') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">PSP</a>
                    <a href="{{ route('public.uptd_balai_benih') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">UPTD Balai Benih</a>
                    <a href="{{ route('public.uptd_laboratorium') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">UPTD Laboratorium</a>
                </div>
            </div> --}}
            <div class="relative group">
                <button class="nav-link flex items-center gap-1 font-medium transition-colors duration-200 py-2">
                    Inovasi
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>

                <div
                    class="absolute hidden group-hover:block top-full right-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-64 animate-in fade-in slide-in-from-top-2 z-50">
                    @php
                        $menu_tambahan = \App\Models\Menu::all();
                    @endphp

                    @forelse($menu_tambahan as $m)
                        @php
                            // Tentukan link tujuan: jika ada 'link' pakai URL luar, jika ada 'file' arahkan ke halaman detail
                            $url_tujuan = $m->link ? $m->link : route('public.menu.show', $m->id);
                            $target = $m->link ? '_blank' : '_self';
                        @endphp

                        <a href="{{ $url_tujuan }}" target="{{ $target }}"
                            class="flex items-center justify-between px-4 py-3 hover:bg-green-50 hover:text-green-700 transition-colors border-b border-gray-50 last:border-0">
                            <span class="font-medium">{{ $m->menu }}</span>
                            @if ($m->link)
                                <i class="fas fa-external-link-alt text-[10px] opacity-50"></i>
                            @else
                                <i class="fas fa-file-download text-[10px] opacity-50"></i>
                            @endif
                        </a>
                    @empty
                        <span class="block px-4 py-2 text-sm text-gray-400 italic text-center">Belum ada menu</span>
                    @endforelse
                </div>
            </div>
        </nav>

        <div class="hidden sm:block">
            <a href="" target="_blank">
                <img src="{{ asset('storage/logo/3_abad.png') }}" alt="3 abad grobogan" class="h-10 w-auto" />
            </a>
        </div>

        <button class="md:hidden text-emerald-800 p-2 focus:outline-none" id="menuBtn">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    <nav id="mobileMenu"
        class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full left-0 top-full shadow-lg pb-4 z-50">
        <div class="flex flex-col px-6 py-4 space-y-4 max-h-[80vh] overflow-y-auto pb-10">
            <a href="{{ url('/') }}" class="text-emerald-700 font-bold hover:text-emerald-800">Beranda</a>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Profil</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="{{ url('/sejarah-dasar-hukum') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Sejarah dan
                        Dasar Hukum</a>
                    <a href="{{ url('/visimisi') }}" class="text-sm text-gray-600 hover:text-emerald-700">Visi
                        Misi</a>
                    <a href="{{ url('/struktur-organisasi') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Struktur Organisasi</a>
                    <a href="{{ route('public.tugas_fungsi') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Tugas & Fungsi</a>
                    <a href="{{ route('public.maklumat') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Maklumat Pelayanan</a>
                    <a href="{{ url('/pegawai') }}" class="text-sm text-gray-600 hover:text-emerald-700">Daftar
                        Pegawai</a>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Layanan</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">

                    @php
                        $layananMenu = \App\Models\Layanan::all();
                    @endphp

                    @forelse($layananMenu as $item)
                        @php
                            if (!empty($item->link)) {
                                $url = $item->link;
                                $target = '_blank';
                            } elseif (!empty($item->file)) {
                                $url = asset('storage/layanan/' . $item->file);
                                $target = '_blank';
                            } else {
                                $url = '#';
                                $target = '_self';
                            }
                        @endphp

                        <a href="{{ $url }}" target="{{ $target }}"
                            class="text-sm text-gray-600 hover:text-emerald-700 transition-colors">
                            {{ $item->nama }}
                        </a>
                    @empty
                        <span class="text-sm text-gray-400 italic">Belum ada layanan</span>
                    @endforelse

                </div>
            </div>

            <div class="flex flex-col">
                <a href="{{ url('/dokumen') }}">
                    <div class="text-gray-700 font-medium mb-2">Dokumen</div>
                </a>
            </div>
            <div class="flex flex-col">
                <a href="{{ url('/ppid') }}">
                    <div class="text-gray-700 font-medium mb-2">PPID</div>
                </a>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Berita</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="{{ url('/berita') }}" class="text-sm text-gray-600 hover:text-emerald-700">Berita</a>
                    <a href="{{ route('koleksi.artikel') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Artikel & Wawasan Pertanian</a>
                    <a href="{{ route('koleksi.foto') }}" class="text-sm text-gray-600 hover:text-emerald-700">Galeri
                        Foto</a>
                    <a href="{{ route('koleksi.video') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Video</a>
                </div>
            </div>

            {{-- <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Bidang/UPTD</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="{{ route('public.tanaman_pangan') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Tanaman Pangan</a>
                    <a href="{{ route('public.hortikultura') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Hortikultura</a>
                    <a href="{{ route('public.perkebunan') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Perkebunan</a>
                    <a href="{{ route('public.psp') }}" class="text-sm text-gray-600 hover:text-emerald-700">PSP</a>
                    <a href="{{ route('public.uptd_balai_benih') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">UPTD Balai Benih</a>
                    <a href="{{ route('public.uptd_laboratorium') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">UPTD Laboratorium</a>
                </div>
            </div> --}}
            <div class="flex flex-col mt-4">
                <div class="text-gray-700 font-medium mb-2">Inovasi</div>

                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    @php
                        $menu_tambahan = \App\Models\Menu::all();
                    @endphp

                    @forelse($menu_tambahan as $m)
                        @php
                            // Tentukan link tujuan: jika ada 'link' pakai URL luar, jika ada 'file' arahkan ke halaman detail
                            $url_tujuan = $m->link ? $m->link : route('public.menu.show', $m->id);
                            $target = $m->link ? '_blank' : '_self';
                        @endphp

                        <a href="{{ $url_tujuan }}" target="{{ $target }}"
                            class="flex items-center justify-between text-sm text-gray-600 hover:text-emerald-700 pr-4">
                            <span>{{ $m->menu }}</span>

                            @if ($m->link)
                                <i class="fas fa-external-link-alt text-[10px] opacity-50"></i>
                            @else
                                <i class="fas fa-file-download text-[10px] opacity-50"></i>
                            @endif
                        </a>
                    @empty
                        <span class="text-sm text-gray-400 italic">Belum ada menu</span>
                    @endforelse
                </div>
            </div>
        </div>
    </nav>
</header>
{{-- <div class="mb-16"></div> --}}
