-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2026 pada 08.48
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
-- Struktur dari tabel `aplikasi_lain`
--

CREATE TABLE `aplikasi_lain` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aplikasi_lain`
--

INSERT INTO `aplikasi_lain` (`id`, `nama_aplikasi`, `logo`, `link`, `created_at`, `updated_at`) VALUES
(1, 'PPID Grobogan', '1784875155_logo_ySbUY4vQw4JzrkbXPTxAhFAGcBeb8O6lIP46kKq0.svg', 'https://ppid.grobogan.go.id', '2026-07-23 23:05:00', '2026-07-23 23:39:15'),
(2, 'Lapor', '1784875140_logo_L5jHdSCrXtETQEva5L4bqBO9IXyzdzwWorQPsZZY.svg', 'https://www.lapor.go.id', '2026-07-23 23:05:33', '2026-07-23 23:39:00'),
(3, 'Sidamba', '1784875127_logo_bS0v3CxPG6A6w2mMgINpTRPUUObIi9nMck9sFPgk.svg', 'http://sidamba.dpupr.grobogan.go.id', '2026-07-23 23:05:54', '2026-07-23 23:38:47'),
(4, 'Silakip Grobogan', '1784875110_logo_gdkL1ObIGSkAu7zpUj61cmZZW42bXrEOPANhWFwH.svg', 'http://www.silakip.grobogan.go.id', '2026-07-23 23:06:20', '2026-07-23 23:38:30');

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
  `tahun` year(4) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `file_dinas`
--

INSERT INTO `file_dinas` (`id`, `uraian`, `file`, `tahun`, `kategori`, `created_at`, `updated_at`) VALUES
(3, 'Rencana Kerja 2026', '1778243570_RENJA DISPERTAN 2026.pdf', '2026', 'RENJA', '2026-04-01 19:31:48', '2026-07-23 20:02:04'),
(4, 'LKjIP 2025', '1776342402_LKjIP DINAS PERTANIAN TAHUN 2025.pdf', '2025', 'LKJIP', '2026-04-16 05:26:42', '2026-07-23 20:02:40'),
(16, 'Renstra 2025-2029', '1784860634_1784163915_RESTRA_DISPERTAN_2025_2029_compressed.pdf', '2025', 'RENSTRA', '2026-07-23 19:37:14', '2026-07-23 20:03:01'),
(17, 'Renstra 2021-2026', '1784860767_1718316102_2. PERUBAHAN_RENSTRA_2021-2026_DINAS_PERTANIAN.pdf', '2021', 'RENSTRA', '2026-07-23 19:39:27', '2026-07-23 19:59:07'),
(18, 'Rencana Kerja 2024', '1784860831_1718316202_4. RENJA DISPERTAN TAHUN 2024.pdf', '2024', 'RENJA', '2026-07-23 19:40:31', '2026-07-23 19:40:31'),
(19, 'Rencana Kerja 2023', '1784860878_1718316270_3. RENJA DISPERTAN TAHUN 2023.pdf', '2023', 'RENJA', '2026-07-23 19:41:18', '2026-07-23 19:58:52'),
(20, 'DPA Penetapan 2024', '1784861052_1718316525_DPA Penetapan TA 2024_compressed.pdf', '2024', 'DPA', '2026-07-23 19:44:12', '2026-07-23 19:44:12'),
(21, 'LKJIP 2023', '1784861155_1718316716_22. LKjIP_DINAS_PERTANIAN_TAHUN_2023_FIX_.pdf', '2023', 'LKJIP', '2026-07-23 19:45:55', '2026-07-23 19:46:08'),
(22, 'IKU', '1784861261_1718316800_17. Kertas Kerja IKU Dispertan.pdf', '2026', 'IKU', '2026-07-23 19:47:41', '2026-07-23 19:47:41'),
(23, 'Perjanjian Kinerja 2023', '1784861392_1718317472_8. Perjanjian Kinerja_DISPERTAN_2023_compressed.pdf', '2023', 'PERJA', '2026-07-23 19:49:52', '2026-07-23 19:49:52'),
(24, 'Perjanjian Kinerja 2024', '1784861549_1718317553_9. Perjanjian Kinerja_DISPERTAN_2024_compressed.pdf', '2024', 'PERJA', '2026-07-23 19:52:29', '2026-07-23 19:52:29'),
(25, 'LKJIP 2024', '1784861590_1748241187_LKjIP DINAS PERTANIAN TAHUN 2024.pdf', '2024', 'LKJIP', '2026-07-23 19:53:10', '2026-07-23 19:53:10'),
(26, 'Perjanjian Kinerja 2025', '1784861682_1750042455_PK Dispertan 2025_compressed.pdf', '2025', 'PERJA', '2026-07-23 19:54:42', '2026-07-23 19:54:42'),
(27, 'Rencana Kerja 2025', '1784861734_1750042688_RENJA_DISPERTAN_2025_FINISH1-1 (1).pdf', '2025', 'RENJA', '2026-07-23 19:55:34', '2026-07-23 19:55:40'),
(28, 'Perjanjian Kinerja 2026', '1784861871_1784787336_PK Dispertan 2026_compressed.pdf', '2026', 'PERJA', '2026-07-23 19:57:51', '2026-07-23 19:57:51'),
(29, 'Standar Pelayanan dan SOP', '1784862776_standar pelayanan dan SOP.pdf', '2022', 'SOP', '2026-07-23 20:12:56', '2026-07-23 20:12:56'),
(30, 'Neraca 2024', '1784862874_Neraca 1.pdf', '2024', 'NERACA', '2026-07-23 20:14:34', '2026-07-23 20:14:34'),
(31, 'LRA 2024', '1784862911_LRA 1 (1).pdf', '2024', 'LRA', '2026-07-23 20:15:11', '2026-07-23 20:15:11'),
(32, 'CALK 2024', '1784862975_CALK Full.pdf', '2024', 'CALK', '2026-07-23 20:16:15', '2026-07-23 20:16:15'),
(33, 'Aset dan Inventaris 2021', '1784863035_3 d. aset dan inventaris 2021.pdf', '2021', 'Aset Inventaris', '2026-07-23 20:17:15', '2026-07-23 20:17:15'),
(34, 'Laporan PPID 2021', '1784863145_Laporan PPID Th 2021.pdf', '2021', 'PPID', '2026-07-23 20:19:05', '2026-07-23 20:19:05'),
(35, 'Form Pengajuan Keberatan', '1784863231_Form_Pengajuan_Keberatan.pdf', '2026', 'Lain-lain', '2026-07-23 20:20:31', '2026-07-23 20:20:31'),
(36, 'DPA Penetapan 2026', '1784866944_SKPD.pdf', '2026', 'DPA', '2026-07-23 21:22:24', '2026-07-23 21:22:24'),
(37, 'DPA Pergeseran 2 2026', '1784867000_Rekap SKPD.pdf', '2026', 'DPA', '2026-07-23 21:23:20', '2026-07-23 21:23:20'),
(38, 'LRA Smt 1 2026', '1784867236_lra-dinas-pertanian-kab-grobogan per semester 1 2026.pdf', '2026', 'LRA', '2026-07-23 21:27:16', '2026-07-23 21:27:16'),
(39, 'CALK 2025', '1784867738_CALK BAB I PENDAHULUAN-merged.pdf', '2025', 'CALK', '2026-07-23 21:35:38', '2026-07-23 21:35:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_fotos`
--

CREATE TABLE `galeri_fotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri_fotos`
--

INSERT INTO `galeri_fotos` (`id`, `kegiatan`, `file`, `kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'foto kegiatan 2', '1778465632_Y172XTS0bYo9dExPpgGIzsWNCkXG32PYXmDl727N.jpg', 'foto', 'loremm lasdajgdhaf dsafdhgasd asafhdad', '2026-05-10 19:13:52', '2026-07-19 03:51:02'),
(2, 'Artikel 1 lorem ipsum data dumy', '1784452988_ePDomQIArGq6aKoWejiNKkT1ieTHqSDF9yyu2Wn6.pdf', 'artikel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam imperdiet quam fringilla libero rutrum lobortis. Nam id vulputate odio. Cras molestie quis ante et vestibulum. Nullam viverra leo quis libero vulputate ultricies sit amet et lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas vestibulum ligula ac tortor faucibus, eget viverra elit faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum eu diam interdum, luctus velit in, vehicula erat. Aliquam dapibus mauris eget nulla faucibus, vitae commodo massa placerat. Nam luctus felis nec fermentum lobortis. Aliquam ac odio a neque suscipit mollis. Cras sit amet felis dolor. Nam consequat, nulla vitae lacinia malesuada, ipsum nibh pulvinar mi, sit amet eleifend elit velit id nulla. Cras pretium elit luctus, laoreet turpis sed, scelerisque tellus. Fusce venenatis feugiat diam, id tristique ligula pellentesque vitae.', '2026-07-19 02:17:46', '2026-07-19 02:23:08'),
(3, 'video 1', '1784455276_FhUSi4rvWx9NNKAFwafKScz2nsR0QM2peBGNbDf8.jpg', 'video', 'https://www.youtube.com/watch?v=DUSktnYQUVE&pp=ygUYZGluYXMgcGVydGFuaWFuIGdyb2JvZ2Fu', '2026-07-19 03:01:16', '2026-07-19 03:01:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `link`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Rekomendasi BBM', 'https://taksi-alsintan-grobogan.lovable.app/rekomendasi-bbm', NULL, '2026-07-21 23:25:54', '2026-07-21 23:25:54'),
(2, 'Lapor Aduan', 'http://127.0.0.1:8000/#Lapor', NULL, '2026-07-21 23:28:22', '2026-07-21 23:28:22'),
(3, 'Ngopi Tani', 'https://www.youtube.com/@dispertangrobogan/videos', NULL, '2026-07-21 23:29:21', '2026-07-21 23:29:21'),
(4, 'Seed Center', NULL, '1784783813_layanan_BpYx3hVAkrLp7TfAPr3AQsuiilqA5N78eCtiOj0n.pdf', '2026-07-22 22:16:53', '2026-07-22 22:16:53'),
(5, 'Balai Penyuluhan Pertanian', NULL, '1784783942_layanan_qTFcvhxSiaqa4MtqEW8gOiw8Cri1zjZFU802gan6.pdf', '2026-07-22 22:19:02', '2026-07-22 22:19:02'),
(6, 'Rumah Kedelai Grobogan', 'https://beta.grobogan.go.id/berita/rumah-kedelai-grobogan-harus-jadi-ikon-baru', NULL, '2026-07-23 18:47:44', '2026-07-23 18:47:44');

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
(4, 'Taksi Tani', 'https://taksi-alsintan-grobogan.lovable.app/', NULL, '2026-07-16 00:47:22', '2026-07-16 00:47:22'),
(5, 'ERDKK', 'https://e-rdkk.dispertan.grobogan.go.id/', NULL, '2026-07-23 20:43:34', '2026-07-23 20:43:34');

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
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kategori_permohonan` enum('perorangan','organisasi','pelajar') NOT NULL,
  `rincian_informasi` text NOT NULL,
  `tujuan_penggunaan` text NOT NULL,
  `cara_memperoleh` enum('ambil langsung','email','kurir','pos','fax') NOT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `berkas_pendukung` varchar(255) DEFAULT NULL,
  `status` enum('Belum Ditindak','Selesai') NOT NULL DEFAULT 'Belum Ditindak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `nama_lengkap`, `nik`, `alamat`, `no_telepon`, `email`, `pekerjaan`, `kategori_permohonan`, `rincian_informasi`, `tujuan_penggunaan`, `cara_memperoleh`, `foto_ktp`, `berkas_pendukung`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dico Aji', '12313121232132131312', 'sadasdsadadsa', '2313123131312', 'dicoaji12@gmail.com', 'Petani', 'perorangan', 'dadsadadsa', 'asdadad', 'ambil langsung', '1784866312_ktp_nlwE3cCYzVFEYiMUgGRcLqstcQRwbeXNLyobzd5C.png', NULL, 'Belum Ditindak', '2026-07-23 21:11:52', '2026-07-23 21:11:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `popup_ads`
--

CREATE TABLE `popup_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `popup_ads`
--

INSERT INTO `popup_ads` (`id`, `kegiatan`, `gambar`) VALUES
(1, 'anti korupsi', '1784519681_NiVA5rXt0UNCg2TpQ911BI0V749Zqho4NnrWRCwC.jpg'),
(2, 'Background Header', '1784689378_header_4gggoVaTXmWCxfAJyXkykstYdMGYIWrhOoqoeU4g.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppid`
--

CREATE TABLE `ppid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL COMMENT 'Berkala, Serta Merta, Setiap Saat, Dikecualikan',
  `file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ppid`
--

INSERT INTO `ppid` (`id`, `nama`, `kategori`, `file`, `link`, `created_at`, `updated_at`) VALUES
(3, 'Sejarah dan Dasar Hukum', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/sejarah-dasar-hukum', '2026-07-23 20:55:15', '2026-07-23 20:55:15'),
(4, 'Struktur Organisasi', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/struktur-organisasi', '2026-07-23 20:58:39', '2026-07-23 20:58:39'),
(5, 'Visi dan Misi', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/visimisi', '2026-07-23 20:59:03', '2026-07-23 20:59:03'),
(6, 'Tugas dan Fungsi', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/tugas-fungsi', '2026-07-23 20:59:38', '2026-07-23 20:59:38'),
(7, 'Daftar Pegawai', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/pegawai', '2026-07-23 21:00:18', '2026-07-23 21:00:18'),
(8, 'SOP Pelayanan', 'Informasi Berkala', '1784865717_ppid_DaJishwlVjGGFBW6MJOxxUNdv0W7PdB1cVNdzVGN.pdf', NULL, '2026-07-23 21:01:57', '2026-07-23 21:01:57'),
(9, 'Grobogan Siaga', 'Informasi Serta Merta', '1784865860_ppid_cYx0A95qhLo7CBff3CptU1V43tq83ttUc1JnR6nF.pdf', NULL, '2026-07-23 21:04:20', '2026-07-23 21:04:20');

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
  `tugas_fungsi` varchar(255) DEFAULT NULL,
  `narasi_tugas_fungsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama_opd`, `visi`, `misi`, `sejarah`, `alamat`, `email`, `telp`, `facebook`, `instagram`, `youtube`, `struktur_organisasi`, `created_at`, `updated_at`, `maklumat_layanan`, `tugas_fungsi`, `narasi_tugas_fungsi`) VALUES
(1, 'Dinas Pertanian Kabupaten Grobogan', 'Menuju Grobogan Maju, Sejahtera dan Berkelanjutan', 'Menguatkan pertumbuhan dan daya saing ekonomi masyarakat berbasis sektor unggulan <br> \r\nMengurangi kemiskinan dan pengangguran <br>\r\nMeningkatkan kualitas sumber daya manusia yang sehat, cerdas, dan berbudaya <br> \r\nMembangun infrastruktur yang handal dan merata, serta meningkatkan ketangguhan wilayah dan lingkungan hidup yang berkualitas <br>\r\nMeningkatkan kualitas tata kelola pemerintahan dan pelayanan publik dengan penguatan reformasi birokrasi', 'Dinas Pertanian Kabupaten Grobogan adalah salah satu Dinas Teknis di lingkungan Pemerintah Kabupaten Grobogan, yang menyelenggarakan kewenangan urusan pemerintahan di sektor pertanian. Dinas Pertanian Kabupaten Grobogan mempunyai tugas membantu Bupati dalam melaksanakan urusan pemerintahan yang menjadi kewenangan daerah dan tugas pembantuannya di bidang pertanian yaitu merumuskan kebijakan teknis perencanaan,pelaksanaan dan pengendalian teknis bidang pertanian tanaman pangan, hortikultura, dan perkebunan, memimpin dan mengkoordinasikan pelaksanaan tugas dan fungsi dinas, melaksanakan bimbingan dan pembinaan, pengelolaan administrasi, ketatausahaan, pengawasan terhadap penyelenggaraan kegiatan Balai Penyuluhan Pertanian\r\n\r\nKedudukan Dinas Pertanian Kabupaten Grobogan diatur dalam Peraturan Bupati Grobogan No. 78 Tahun 2021 tentang Kedudukan,Susunan Organisasi, Tugas Pokok, Fungsi, Uraian Tugas Jabatan danTata Kerja Dinas Pertanian Kabupaten Grobogan\r\nSecara historis nama Dinas pertanian sepanjang berdirinya senantiasa mengalami perubahan sesuai dengan situasi dan politik pemerintah saat itu. Sebelum masa reformasi Dinas pertanian berdiri sendiri dengan nama Dinas Pertanian Tanaman Pangan. \r\nSelanjutnya pada reformasi dengan diterbitkan undang-undang nomor 32 tahun 2004 tentang pemerintah daerah atau dikenal dengan otonomi daerah Dinas Pertanian tanaman pangan berubah menjadi Dinas Kehutanan, Pertanian dan Urusan Ketahanan Pangan melalui penetapan peraturan daerah nomor 6 tahun 2004. \r\nKemudian pada tahun 2009 melalui penetapan perda nomor 11 tahun 2009 berubah menjadi Dinas Pertanian, Kehutanan, Perkebunan, dan Peternakan. Selanjutnya melalui penetapan perda kabupaten Grobogan nomor 15 tahun 2016 tentang perangkat daerah yang melahirkan Dinas Pertanian sejak Februari 2017.', 'Jl. Pangeran Diponegoro No.20, 58114, Area Sawah, Kalongan, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 5811', '@dispertan_grobogan', '(0292) 421478', 'https://www.facebook.com/dinaspertaniankabupatengrobogan', 'https://www.instagram.com/dispertan_grobogan/', 'https://www.youtube.com/channel/UCsrzepHBJH06Dxbtr3E2zeA', 'struktur-1771744736.png', '2026-02-22 04:44:47', '2026-07-23 21:47:18', 'maklumat-1784868438.jpg', 'tugas-fungsi-1778242529.pdf', 'Selanjutnya berdasarkan Peraturan Bupati Grobogan Nomor 78 Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas Pokok, Fungsi dan Uraian Jabatan dan Tata Kerja Organisasi Dinas Pertanian Kabupaten Grobogan,');

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
(1, 'Dico Aji', 'dicoaji12@gmail.com', NULL, '$2y$12$6zBXEoMMEbimoAJx8OqLHOPdMkVIbXyI7O1vdsz.9lFyh0WzZUuzq', NULL, '2026-06-10 21:02:05', '2026-06-10 21:02:05'),
(2, 'Admin Dispertan', 'admin@pertanian.com', NULL, '$2y$12$RRPKohlWE0d05hPpuMEQb.3lQnvNSP2gK8OmTJE3muZBLSQq4xMNS', NULL, '2026-07-23 21:50:38', '2026-07-23 21:50:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi_lain`
--
ALTER TABLE `aplikasi_lain`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
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
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
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
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `popup_ads`
--
ALTER TABLE `popup_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ppid`
--
ALTER TABLE `ppid`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `aplikasi_lain`
--
ALTER TABLE `aplikasi_lain`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `galeri_fotos`
--
ALTER TABLE `galeri_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `popup_ads`
--
ALTER TABLE `popup_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ppid`
--
ALTER TABLE `ppid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
