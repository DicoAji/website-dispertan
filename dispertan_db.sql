-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2026 pada 06.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispertan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal_berita` date NOT NULL,
  `foto_berita` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal_berita`, `foto_berita`, `deskripsi`, `created_at`, `updated_at`) VALUES
(12, 'Selamat memperingati Hari Krida Pertanian 21 Juni 2025', '2026-04-16', '1776316199_berita1 (1).png', 'Hari ini, kita memperingati perjuangan dan dedikasi para petani Indonesia.\r\nMereka yang setiap hari menanam asa, memanen harapan, dan menjaga ketahanan pangan negeri.\r\nMari kita dukung sektor pertanian dengan semangat inovasi, kolaborasi, dan keberlanjutan.\r\nKarena dari benih yang bermutu, tumbuh negeri yang maju.', '2026-04-15 22:09:59', '2026-04-15 22:09:59'),
(13, 'Grobogan Gelar Panen Raya Jagung Serentak Kuartal II, Produksi Capai 800 Ribu Ton per Tahun', '2026-04-16', '1776316379_berita2.png', 'GROBOGAN, Suaramerdeka.com - Pemerintah Kabupaten Grobogan menggelar kegiatan Panen Raya Jagung Serentak Kuartal II Tahun 2025 di Desa Tambakselo, Kecamatan Wirosari, Rabu 5 Juni 2025.\r\nKegiatan ini menjadi simbol keberhasilan Grobogan dalam mempertahankan predikat sebagai lumbung pangan Provinsi Jawa Tengah, sekaligus penghasil jagung terbesar di Indonesia.', '2026-04-15 22:12:59', '2026-04-15 22:12:59'),
(14, 'Panen Raya, Harga Gabah di Grobogan Masih Tembus Rp 7.100 /kg', '2026-04-16', '1776316543_ilustrasi-panen-padi-di-kabupaten-grobogan-jawa-te-20260213101410.jpg', 'Murianews, Grobogan – Memasuki puncak musim panen raya pertama di tahun 2026, harga gabah di tingkat petani Kabupaten Grobogan, Jawa Tengah masih menggembirakan. Saat ini, harga Gabah Kering Panen (GKP) menyentuh angka Rp 710.000 per kwintalnya atau Rp 7.100 per kilogram.\r\n\r\nKepala Bidang Tanaman Pangan Dinas Pertanian Grobogan, Cahyo Mulyadi, menyampaikan, harga gabah petani Grobogan tersebut tergolong stabil. Dan masih tetap menguntungkan bagi para petani di tengah melimpahnya pasokan gabah.\r\n\r\nMenurutnya, di Kabupaten Grobogan luas panen pada bulan Februari ini diperkirakan mencapai sekitar 25 ribu hektare. Luasan itu tersebar di berbagai wilayah kecamatan se Kabupaten Grobogan.\r\n\r\nArtikel ini telah tayang di Murianews.com dengan judul \"Panen Raya, Harga Gabah di Grobogan Masih Tembus Rp 7.100 /kg\", Klik untuk baca: https://berita.murianews.com/saiful-anwar/460470/panen-raya-harga-gabah-di-grobogan-masih-tembus-rp-7-100-kg .', '2026-04-15 22:15:43', '2026-04-15 22:15:43'),
(16, 'Berita 4', '2026-07-16', '1784188392_Petani-Grobogan.jpg', 'Petani di Sukorejo Grobogan dapat Bantuan 13.625 Kg Benih Padi', '2026-07-16 00:53:12', '2026-07-16 00:53:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `uraian`, `deskripsi`, `kategori`, `file`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Uraian pekerjaan bidang Kebun 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Perkebunan', NULL, 'bidang/perkebunan/1777178420_img_mar.jpeg', '2026-04-25 21:40:20', NULL),
(3, 'Uraian pekerjaan bidang pangan 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Tanaman Pangan', 'bidang/tanaman_pangan/1777186828_file_BILLING_CODE_1770621296.pdf', 'bidang/tanaman_pangan/1777186828_img_instagram_com_deanadhaa.jpg', '2026-04-26 00:00:28', NULL),
(4, 'uraian pekerjaan bidang psp', 'agdjhagdjha', 'PSP', 'bidang/psp/1777193981_file_BILLING_CODE_1770710391.pdf', NULL, '2026-04-26 01:59:41', NULL),
(5, 'uraian pekerjaan bidang hortikultura', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Hortikultura', 'bidang/hortikultura/1777194030_file_BILLING_CODE_1770710321.pdf', 'bidang/hortikultura/1777194030_img_2.jpg', '2026-04-26 02:00:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_dinas`
--

CREATE TABLE `file_dinas` (
  `id` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `file_dinas`
--

INSERT INTO `file_dinas` (`id`, `uraian`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Standar Pelayanan Dinas Pertanian Kabupaten Grobogan', '1771909356_SOP_compressed.pdf', '2026-02-23 21:33:14', '2026-02-23 23:43:49'),
(2, 'SOP Pelayanan', '1771915384_19. Perbup 78 Th 2021 SOTK Dispertan Hsl PB blm td tgn.pdf', '2026-02-23 23:43:04', '2026-04-16 05:41:51'),
(3, 'Rencana Kerja Dinas Pertanian 2026', '1778243570_RENJA DISPERTAN 2026.pdf', '2026-04-01 19:31:48', '2026-05-08 05:32:50'),
(4, 'LKjIP DINAS PERTANIAN TAHUN 2025', '1776342402_LKjIP DINAS PERTANIAN TAHUN 2025.pdf', '2026-04-16 05:26:42', '2026-04-16 05:26:42'),
(5, 'Program Kegiatan (dummy)', '1776392657_Program Kegiatan.pdf', '2026-04-16 19:24:17', '2026-04-16 19:24:17'),
(6, 'Target Capaian dummy', '1776392966_Target Capaian.pdf', '2026-04-16 19:29:26', '2026-04-16 19:29:26'),
(7, 'Inovasi Daerah dummy', '1776392998_Inovasi Daerah.pdf', '2026-04-16 19:29:58', '2026-04-16 19:29:58'),
(8, 'Standar Pelayanan Dummy', '1776393326_Standar Pelayanan.pdf', '2026-04-16 19:35:26', '2026-04-16 19:35:26'),
(9, 'Informasi OPT dan Perkiraan Iklim dummy', '1777434517_Informasi OPT dan Perkiraan Iklim.pdf', '2026-04-28 20:48:37', '2026-04-29 00:39:36'),
(10, 'Penyuluhan dan Artikel Teknis dummy', '1777434830_Penyuluhan dan Artikel Teknis.pdf', '2026-04-28 20:53:50', '2026-04-29 00:39:42'),
(11, 'Renstra dinas dummy', '1777448366_Rensra Dinas.pdf', '2026-04-29 00:39:26', '2026-04-29 00:39:49'),
(12, 'RTP/SPIP dummy', '1777448595_RTPSPIP.pdf', '2026-04-29 00:43:15', '2026-04-29 00:43:22'),
(13, 'Rencana Aksi OPD dummy', '1777448648_Rencana Aksi OPD.pdf', '2026-04-29 00:44:08', '2026-04-29 00:44:08'),
(14, 'SOP Bidang Dummy', '1777448678_SOP bidang.pdf', '2026-04-29 00:44:38', '2026-04-29 00:44:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_fotos`
--

CREATE TABLE `galeri_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri_fotos`
--

INSERT INTO `galeri_fotos` (`id`, `kegiatan`, `file`, `created_at`, `updated_at`) VALUES
(1, 'foto kegiatan 1', '1778465632_Y172XTS0bYo9dExPpgGIzsWNCkXG32PYXmDl727N.jpg', '2026-05-10 19:13:52', '2026-05-10 19:13:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_kegiatan`
--

CREATE TABLE `kalender_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kalender_kegiatan`
--

INSERT INTO `kalender_kegiatan` (`id`, `nama_kegiatan`, `kategori`, `tanggal`, `waktu`, `lokasi`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Jadwal Kegiatan', 'Penyuluhan', '2026-04-29', '09.00 WIB', 'Aula Dinas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pengaduan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `nama`, `telp`, `pengaduan`, `created_at`, `updated_at`) VALUES
(1, 'DICO AJI PRASETYO', '8098809808', 'hallo admin', '2026-07-12 20:48:55', '2026-07-12 20:48:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu`, `link`, `file`, `created_at`, `updated_at`) VALUES
(3, 'Profesor Tani', 'https://profesortani.com/', NULL, '2026-07-12 21:19:22', '2026-07-12 21:19:22'),
(4, 'Taksi Tani', 'https://taksi-alsintan-grobogan.lovable.app/', NULL, '2026-07-16 00:47:22', '2026-07-16 00:47:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(18) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tingkat` tinyint(4) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_lengkap`, `jabatan`, `tingkat`, `foto`, `created_at`, `updated_at`, `gender`) VALUES
('196902161990032003', 'NUR AFIFAH', 'Analis Tata Usaha', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:13:59', 'p'),
('197106251994032005', 'SITI SUYANTI, S.P, M.M', 'Penelaah Teknis Kebijakan', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:27', 'p'),
('197502062025212007', 'WAHYU SULISTIOWATI, S.Sos.', 'Penata Layanan Operasional', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:24', 'p'),
('197503192008012003', 'MARYATI, S.E., M.M.', 'Penelaah Teknis Kebijakan', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:13:54', 'p'),
('197510252009021003', 'TAUFIQ BUDI PRASETYO, S.P, M.E', 'Kepala Bidang Perkebunan & Plt Sekretaris', 2, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:12:29', 'l'),
('197511142010012008', 'PROBO WINDASTUTI, S.E., Akt. M.M.', 'Kepala Sub Bagian Umum', 3, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:13:23', 'p'),
('197605122006041018', 'SETYO WICAKSONO, S.E., M.M', 'Kepala Sub Bagian Keuangan', 3, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:13:28', 'l'),
('197707142005011005', 'CAHYO MULYADI, S.P.', 'Kepala Bidang Tanaman Pangan', 2, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:13:11', 'l'),
('198204052010012017', 'WIWIT RAHMAWATI, STP', 'Kepala Sub Bagian Perencanaan', 3, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:13:42', 'p'),
('198204232010011016', 'PUJIYONO, STP', 'Kepala Bidang Holtikultura & Plt Kepala Bidang PSP', 2, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:12:54', 'l'),
('198410012011011003', 'SURONO, STP', 'Kepala UPTD Balai Benih Pertanian Kelas', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:06', 'l'),
('198510282023212028', 'MUYA CANDRANIA, S.TP', 'Analis Pasar Hasil Pertanian Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:32', 'p'),
('198612102009021004', 'WAKID MUTOWAL, S.TP, M.Sc.', 'Kepala Dinas', 1, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:12:03', 'l'),
('198905272020121003', 'MUCHAMAD GHOFURUDIN, S.Kom', 'Pranata Komputer Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:09', 'l'),
('199007152020122014', 'MUSHON NIFAH, A.Md', 'Pengelola Data dan Informasi', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:36', 'p'),
('199103212023211017', 'FIRDAUS TRI LUTFI, S.TP.', 'Analis Pasar Hasil Pertanian Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:39', 'l'),
('199109262020121016', 'HASAN RANJANI, A.Md', 'Pengelola Data dan Informasi', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:41', 'l'),
('199111092023211011', 'NGUDI AJI JAKA YUWANA, S.T.P.', 'Analis Pasar Hasil Pertanian Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:44', 'l'),
('199501092025051001', 'HIMAWAN KUNCORO, S.Kom.', 'Analis Sumber Daya Manusia Aparatur Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:47', 'l'),
('199509022024212010', 'SEPT ANGGRAENI, A.Md.A.B', 'Arsiparis Terampil', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:49', 'p'),
('199612132020122002', 'PUSPITASARI, S.P', 'Pengawas Benih Tanaman Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:52', 'l'),
('199709172020122016', 'LIYA ASTUTI, S.Ak', 'Penelaah Teknis Kebijakan', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:55', 'p'),
('199904242024211003', 'LUTFI PRASETYO AJI, S.TP.', 'Pengawas Mutu Hasil Pertanian Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:57', NULL),
('200112122025051002', 'DICO AJI PRASETYO, S.Kom.', 'Pranata Komputer Ahli Pertama', 4, 'default.jpg', '2026-02-21 09:42:53', '2026-07-17 03:14:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama_opd` varchar(255) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `struktur_organisasi` varchar(255) DEFAULT 'struktur_organisasi_dispertan_grobogan.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `maklumat_layanan` varchar(255) DEFAULT NULL,
  `tugas_fungsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama_opd`, `visi`, `misi`, `sejarah`, `alamat`, `email`, `telp`, `facebook`, `instagram`, `youtube`, `struktur_organisasi`, `created_at`, `updated_at`, `maklumat_layanan`, `tugas_fungsi`) VALUES
(1, 'Dinas Pertanian Kabupaten Grobogan', 'Menuju Grobogan Maju, Sejahtera dan Berkelanjutan', 'Menguatkan pertumbuhan dan daya saing ekonomi masyarakat berbasis sektor unggulan <br> \r\nMengurangi kemiskinan dan pengangguran <br>\r\nMeningkatkan kualitas sumber daya manusia yang sehat, cerdas, dan berbudaya <br> \r\nMembangun infrastruktur yang handal dan merata, serta meningkatkan ketangguhan wilayah dan lingkungan hidup yang berkualitas <br>\r\nMeningkatkan kualitas tata kelola pemerintahan dan pelayanan publik dengan penguatan reformasi birokrasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Jl. Pangeran Diponegoro No.20, 58114, Area Sawah, Kalongan, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 5811', '@dispertan_grobogan', '(0292) 421478', 'https://www.facebook.com/dinaspertaniankabupatengrobogan', 'https://www.instagram.com/dispertan_grobogan/', 'https://www.youtube.com/channel/UCsrzepHBJH06Dxbtr3E2zeA', 'struktur-1771744736.png', '2026-02-22 04:44:47', '2026-07-13 00:29:30', 'maklumat-1776052028.jpg', 'tugas-fungsi-1778242529.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skms`
--

CREATE TABLE `skms` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `triwulan` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skms`
--

INSERT INTO `skms` (`id`, `tahun`, `triwulan`, `file`, `created_at`, `updated_at`) VALUES
(2, '2026', 'Triwulan II', 'SKM_1771916665_BILLING_CODE_1771816650.pdf', '2026-02-24 00:04:25', '2026-02-24 00:04:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dico Aji', 'dicoaji12@gmail.com', NULL, '$2y$12$6zBXEoMMEbimoAJx8OqLHOPdMkVIbXyI7O1vdsz.9lFyh0WzZUuzq', NULL, '2026-06-10 21:02:05', '2026-06-10 21:02:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file_dinas`
--
ALTER TABLE `file_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_fotos`
--
ALTER TABLE `galeri_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kalender_kegiatan`
--
ALTER TABLE `kalender_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `skms`
--
ALTER TABLE `skms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_dinas`
--
ALTER TABLE `file_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `galeri_fotos`
--
ALTER TABLE `galeri_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kalender_kegiatan`
--
ALTER TABLE `kalender_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `skms`
--
ALTER TABLE `skms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
