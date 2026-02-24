<header id="main-header" class="fixed w-full z-40 bg-transparent text-white transition-colors duration-300 md:shadow-md">
    <nav class="px-4 sm:px-6 lg:px-8 py-1">
        <div class="flex flex-wrap items-center justify-between mx-auto h-16">
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('storage/logo/lambang_grobogan.png') }}" class="w-8 h-full"
                    alt="Logo Dinas Pertanian Grobogan" />
                <div class="text-white -space-y-1 border-l-2 border-green-500 pl-3 uppercase">
                    <p class="text-sm font-semibold">Dinas Pertanian</p>
                    <p class="text-sm font-semibold">Kabupaten Grobogan</p>
                </div>
            </a>

            <button type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-base lg:hidden focus:outline-none focus:ring-2 focus:ring-gray-400"
                aria-controls="navbar-default" aria-expanded="false" id="mobile-menu-button">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </button>

            <div class="hidden w-full lg:block lg:w-auto" id="navbar-default">
                <div class=" hidden lg:flex items-center">
                    <a href="{{ url('/') }}"
                        class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Beranda
                    </a>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Profil
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="profile/sejarah.html" class="block px-4 py-2 text-sm hover:bg-gray-100">Sejarah dan
                                Dasar Hukum</a>
                            <a href="{{ url('/visimisi') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Visi
                                Misi</a>
                            <a href="{{ url('/struktur-organisasi') }}"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Struktur Organisasi</a>
                            <a href="profile/tugas_fungsi.html" class="block px-4 py-2 text-sm hover:bg-gray-100">Tugas
                                & Fungsi</a>
                            <a href="profile/maklumat_pelayanan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Maklumat Pelayanan</a>
                            <a href="{{ url('/pegawai') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Daftar
                                Pegawai</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Program
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="program/rencana_kerja.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Rencana Kerja</a>
                            <a href="program/program_kegiatan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Program & Kegiatan</a>
                            <a href="program/target_capaian.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Target & Capaian</a>
                            <a href="program/inovasi_daerah.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Inovasi Daerah</a>
                            <a href="program/kalender_kegiatan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Kalender Kegiatan</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Layanan Publik
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="layanan_publik/sop_pelayanan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">SOP Pelayanan</a>
                            <a href="layanan_publik/standar_pelayanan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Standar Pelayanan</a>
                            <a href="layanan_publik/formulir_permohonan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Formulir Permohonan</a>
                            <a href="layanan_publik/konsultasi_petani.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Konsultasi Petani</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Data dan Informasi
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="data_informasi/informasi_opt_iklim.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Informasi OPT & Perkiraan Iklim</a>
                            <a href="data_informasi/penyuluhan_artikel_teknis.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Penyuluhan & Artikel Teknis</a>
                        </div>
                    </div>

                    <a href="#"
                        class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium transition-colors duration-200">PPID</a>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Dokumen
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="dokumen/renstra_dinas.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Renstra Dinas</a>
                            <a href="dokumen/rka_dpa.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">RKA/DPA</a>
                            <a href="dokumen/lkjip.html" class="block px-4 py-2 text-sm hover:bg-gray-100">LKJIP</a>
                            <a href="dokumen/rtp_spip.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">RTP/SPIP</a>
                            <a href="dokumen/rencana_aksi_opd.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Rencana Aksi OPD</a>
                            <a href="dokumen/sop_bidang.html" class="block px-4 py-2 text-sm hover:bg-gray-100">SOP
                                Bidang</a>
                            <a href="dokumen/peraturan_regulasi.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Peraturan & Regulasi</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Berita dan Publikasi
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="dokumen/berita.html" class="block px-4 py-2 text-sm hover:bg-gray-100">Berita</a>
                            <a href="dokumen/artikel_wawasan_pertanian.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Artikel & Wawasan Pertanian</a>
                            <a href="dokumen/galeri_foto.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Galeri Foto</a>
                            <a href="dokumen/video.html" class="block px-4 py-2 text-sm hover:bg-gray-100">Video</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button
                            class="text-[#9BA39D] hover:bg-white hover:text-black px-3 py-2 text-sm font-medium flex items-center transition-colors duration-200">
                            Bidang/UPTD
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-60 bg-white text-black shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-y-0 group-hover:scale-y-100 origin-top z-50">
                            <a href="bidang_uptd/tanaman_pangan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Tanaman Pangan</a>
                            <a href="bidang_uptd/hortikultura.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Hortikultura</a>
                            <a href="bidang_uptd/perkebunan.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Perkebunan</a>
                            <a href="bidang_uptd/psp.html" class="block px-4 py-2 text-sm hover:bg-gray-100">PSP</a>
                            <a href="bidang_uptd/uptd_balai_benih.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">UPTD Balai Benih</a>
                            <a href="bidang_uptd/uptd_laboratorium.html"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">UPTD Laboratorium</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="lg:hidden hidden bg-[#374A37] shadow-lg border-t border-gray-700 pb-2">
        <ul class="font-medium flex flex-col p-4">
            <li>
                <a href="#" class="block py-2 px-3 text-white rounded hover:bg-[#4a5f4a]">Beranda</a>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Profil
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="profile/sejarah.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Sejarah dan Dasar
                            Hukum</a>
                    </li>
                    <li>
                        <a href="{{ url('/visimisi') }}"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Visi Misi</a>
                    </li>
                    <li>
                        <a href="{{ url('/struktur-organisasi') }}"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Struktur Organisasi</a>
                    </li>
                    <li>
                        <a href="profile/tugas_fungsi.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Tugas & Fungsi</a>
                    </li>
                    <li>
                        <a href="profile/maklumat_pelayanan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Maklumat Pelayanan</a>
                    </li>
                    <li>
                        <a href="{{ url('/pegawai') }}"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Daftar Pegawai</a>
                    </li>
                </ul>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Program
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="program/rencana_kerja.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Rencana Kerja</a>
                    </li>
                    <li>
                        <a href="program/program_kegiatan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Program & Sub Kegiatan</a>
                    </li>
                    <li>
                        <a href="program/target_capaian.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Target & Capaian</a>
                    </li>
                    <li>
                        <a href="program/inovasi_daerah.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Inovasi Daerah</a>
                    </li>
                    <li>
                        <a href="program/kalender_kegiatan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Kalender Kegiatan</a>
                    </li>
                </ul>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Layanan Publik
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="layanan_publik/sop_pelayanan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">SOP Pelayanan</a>
                    </li>
                    <li>
                        <a href="layanan_publik/standar_pelayanan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Standar Pelayanan</a>
                    </li>
                    <li>
                        <a href="layanan_publik/formulir_permohonan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Formulir Permohonan</a>
                    </li>
                    <li>
                        <a href="layanan_publik/konsultasi_petani.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Konsultasi Petani</a>
                    </li>
                </ul>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Data dan Informasi
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="data_informasi/informasi_opt_iklim.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Informasi OPT & Perkiraan
                            Iklim</a>
                    </li>
                    <li>
                        <a href="data_informasi/penyuluhan_artikel_teknis.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Penyuluhan & Artikel
                            Teknis</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="block py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a]">PPID</a>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Dokumen
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="dokumen/renstra_dinas.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Renstra Dinas</a>
                    </li>
                    <li>
                        <a href="dokumen/rka_dpa.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">RKA/DPA</a>
                    </li>
                    <li>
                        <a href="dokumen/lkjip.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">LKJIP</a>
                    </li>
                    <li>
                        <a href="dokumen/rtp_spip.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">RTP/SPIP</a>
                    </li>
                    <li>
                        <a href="dokumen/rencana_aksi_opd.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Rencana Aksi OPD</a>
                    </li>
                    <li>
                        <a href="dokumen/sop_bidang.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">SOP Bidang</a>
                    </li>
                    <li>
                        <a href="dokumen/peraturan_regulasi.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Peraturan & Regulasi</a>
                    </li>
                </ul>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Berita dan Publikasi
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="dokumen/berita.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Berita</a>
                    </li>
                    <li>
                        <a href="dokumen/artikel_wawasan_pertanian.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Artikel & Wawasan
                            Pertanian</a>
                    </li>
                    <li>
                        <a href="dokumen/galeri_foto.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Galeri Foto</a>
                    </li>
                    <li>
                        <a href="dokumen/video.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Video</a>
                    </li>
                </ul>
            </li>

            <li class="mobile-dropdown-parent">
                <button type="button"
                    class="flex justify-between items-center w-full py-2 px-3 text-gray-200 rounded hover:bg-[#4a5f4a] mobile-dropdown-button">
                    Bidang/UPTD
                    <svg class="ml-1 w-4 h-4 transform transition duration-300 mobile-dropdown-icon" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <ul class="ml-4 border-l border-gray-600 space-y-1 hidden mobile-dropdown-content">
                    <li>
                        <a href="bidang_uptd/tanaman_pangan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Tanaman Pangan</a>
                    </li>
                    <li>
                        <a href="bidang_uptd/hortikultura.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Hortikultura</a>
                    </li>
                    <li>
                        <a href="bidang_uptd/perkebunan.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">Perkebunan</a>
                    </li>
                    <li>
                        <a href="bidang_uptd/psp.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">PSP</a>
                    </li>
                    <li>
                        <a href="bidang_uptd/uptd_balai_benih.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">UPTD Balai Benih</a>
                    </li>
                    <li>
                        <a href="bidang_uptd/uptd_laboratorium.html"
                            class="block py-2 px-3 text-sm text-gray-300 hover:bg-[#4a5f4a]">UPTD Laboratorium</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
