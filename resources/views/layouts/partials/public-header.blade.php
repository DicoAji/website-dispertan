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
                    <a href="profile/sejarah.html"
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

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Program
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="{{ url('/rencana-kerja') }}"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Rencana Kerja</a>
                    <a href="program/program_kegiatan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Program & Kegiatan</a>
                    <a href="program/target_capaian.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Target & Capaian</a>
                    <a href="program/inovasi_daerah.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Inovasi Daerah</a>
                    <a href="program/kalender_kegiatan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Kalender Kegiatan</a>
                </div>
            </div>

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Layanan
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="layanan_publik/sop_pelayanan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">SOP Pelayanan</a>
                    <a href="layanan_publik/standar_pelayanan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Standar Pelayanan</a>
                    <a href="layanan_publik/formulir_permohonan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Formulir Permohonan</a>
                    <a href="layanan_publik/konsultasi_petani.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Konsultasi Petani</a>
                    <a href="layanan_publik/konsultasi_petani.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Taksi Tani</a>
                </div>
            </div>

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Informasi
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full left-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-60 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="data_informasi/informasi_opt_iklim.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Informasi OPT & Perkiraan
                        Iklim</a>
                    <a href="data_informasi/penyuluhan_artikel_teknis.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Penyuluhan & Artikel
                        Teknis</a>
                    <a href="data_informasi/ppid.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">PPID</a>
                </div>
            </div>

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Dokumen
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full right-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="dokumen/renstra_dinas.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Renstra Dinas</a>
                    <a href="dokumen/rka_dpa.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">RKA/DPA</a>
                    <a href="dokumen/lkjip.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">LKJIP</a>
                    <a href="dokumen/rtp_spip.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">RTP/SPIP</a>
                    <a href="dokumen/rencana_aksi_opd.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Rencana Aksi OPD</a>
                    <a href="dokumen/sop_bidang.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">SOP Bidang</a>
                    <a href="dokumen/peraturan_regulasi.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Peraturan & Regulasi</a>
                </div>
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
                    <a href="dokumen/berita.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Berita</a>
                    <a href="dokumen/artikel_wawasan_pertanian.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Artikel & Wawasan
                        Pertanian</a>
                    <a href="dokumen/galeri_foto.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Galeri Foto</a>
                    <a href="dokumen/video.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Video</a>
                </div>
            </div>

            <div class="relative group">
                <button
                    class="nav-link flex items-center gap-1 font-medium hover:text-emerald-700 px-3 py-2 transition-colors duration-200">
                    Bidang/UPTD
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full right-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="bidang_uptd/tanaman_pangan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Tanaman Pangan</a>
                    <a href="bidang_uptd/hortikultura.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Hortikultura</a>
                    <a href="bidang_uptd/perkebunan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">Perkebunan</a>
                    <a href="bidang_uptd/psp.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">PSP</a>
                    <a href="bidang_uptd/uptd_balai_benih.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">UPTD Balai Benih</a>
                    <a href="bidang_uptd/uptd_laboratorium.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700">UPTD Laboratorium</a>
                </div>
            </div>
            <div class="relative group">
                <button class="nav-link flex items-center gap-1 font-medium transition-colors duration-200">
                    Tambahan
                    <i
                        class="fa fa-chevron-down text-[10px] transition-transform duration-200 group-hover:rotate-180"></i>
                </button>
                <div
                    class="absolute hidden group-hover:block top-full right-0 bg-white border border-gray-100 shadow-xl rounded-lg py-2 w-56 animate-in fade-in slide-in-from-top-2 z-50">
                    <a href="bidang_uptd/tanaman_pangan.html"
                        class="block px-4 py-2 hover:bg-emerald-50 hover:text-emerald-700"></a>
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
                    <a href="profile/sejarah.html" class="text-sm text-gray-600 hover:text-emerald-700">Sejarah dan
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
                <div class="text-gray-700 font-medium mb-2">Program</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="{{ url('/rencana-kerja') }}"
                        class="text-sm text-gray-600 hover:text-emerald-700">Rencana Kerja</a>
                    <a href="program/program_kegiatan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Program & Kegiatan</a>
                    <a href="program/target_capaian.html" class="text-sm text-gray-600 hover:text-emerald-700">Target
                        & Capaian</a>
                    <a href="program/inovasi_daerah.html" class="text-sm text-gray-600 hover:text-emerald-700">Inovasi
                        Daerah</a>
                    <a href="program/kalender_kegiatan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Kalender Kegiatan</a>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Layanan </div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="layanan_publik/sop_pelayanan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">SOP Pelayanan</a>
                    <a href="layanan_publik/standar_pelayanan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Standar Pelayanan</a>
                    <a href="layanan_publik/formulir_permohonan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Formulir Permohonan</a>
                    <a href="layanan_publik/konsultasi_petani.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Konsultasi Petani</a>
                    <a href="layanan_publik/konsultasi_petani.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Taksi Tani</a>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Informasi</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="data_informasi/informasi_opt_iklim.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Informasi OPT & Perkiraan Iklim</a>
                    <a href="data_informasi/penyuluhan_artikel_teknis.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Penyuluhan & Artikel Teknis</a>
                    <a href="data_informasi/ppid.html" class="text-sm text-gray-600 hover:text-emerald-700">PPID</a>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Dokumen</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="dokumen/renstra_dinas.html" class="text-sm text-gray-600 hover:text-emerald-700">Renstra
                        Dinas</a>
                    <a href="dokumen/rka_dpa.html" class="text-sm text-gray-600 hover:text-emerald-700">RKA/DPA</a>
                    <a href="dokumen/lkjip.html" class="text-sm text-gray-600 hover:text-emerald-700">LKJIP</a>
                    <a href="dokumen/rtp_spip.html" class="text-sm text-gray-600 hover:text-emerald-700">RTP/SPIP</a>
                    <a href="dokumen/rencana_aksi_opd.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Rencana Aksi OPD</a>
                    <a href="dokumen/sop_bidang.html" class="text-sm text-gray-600 hover:text-emerald-700">SOP
                        Bidang</a>
                    <a href="dokumen/peraturan_regulasi.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Peraturan & Regulasi</a>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Berita</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="dokumen/berita.html" class="text-sm text-gray-600 hover:text-emerald-700">Berita</a>
                    <a href="dokumen/artikel_wawasan_pertanian.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Artikel & Wawasan Pertanian</a>
                    <a href="dokumen/galeri_foto.html" class="text-sm text-gray-600 hover:text-emerald-700">Galeri
                        Foto</a>
                    <a href="dokumen/video.html" class="text-sm text-gray-600 hover:text-emerald-700">Video</a>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Bidang/UPTD</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="bidang_uptd/tanaman_pangan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Tanaman Pangan</a>
                    <a href="bidang_uptd/hortikultura.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Hortikultura</a>
                    <a href="bidang_uptd/perkebunan.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">Perkebunan</a>
                    <a href="bidang_uptd/psp.html" class="text-sm text-gray-600 hover:text-emerald-700">PSP</a>
                    <a href="bidang_uptd/uptd_balai_benih.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">UPTD Balai Benih</a>
                    <a href="bidang_uptd/uptd_laboratorium.html"
                        class="text-sm text-gray-600 hover:text-emerald-700">UPTD Laboratorium</a>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-gray-700 font-medium mb-2">Tambahan</div>
                <div class="flex flex-col pl-4 border-l-2 border-emerald-100 space-y-3">
                    <a href="" class="text-sm text-gray-600 hover:text-emerald-700"></a>
                </div>
            </div>
        </div>
    </nav>
</header>
{{-- <div class="mb-16"></div> --}}
