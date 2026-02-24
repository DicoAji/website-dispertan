-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2026 pada 04.53
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
(8, 'Berita 1', '2026-02-23', '1771822337_WhatsApp Image 2026-02-13 at 11.46.57.jpeg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2026-02-22 21:52:17', '2026-02-22 21:52:17'),
(9, 'Berita 2', '2026-02-23', '1771828481_WhatsApp Image 2026-02-13 at 11.46.57.jpeg', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2026-02-22 23:34:41', '2026-02-22 23:34:41'),
(10, 'Berita 3', '2026-02-23', '1771828614_WhatsApp Image 2026-02-13 at 11.46.57.jpeg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2026-02-22 23:36:54', '2026-02-22 23:36:54');

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
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_lengkap`, `jabatan`, `foto`, `created_at`, `updated_at`, `gender`) VALUES
('196802271989032004', 'WINARSIH', 'Pengadministrasi Perkantoran', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:01', 'p'),
('196803251996032003', 'Ir. POERBORINI SOENOTO, M.M.', 'Kepala UPTD Laboratorium Pertanian Kelas', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:05', 'p'),
('196902161990032003', 'NUR AFIFAH', 'Analis Tata Usaha', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:08', 'p'),
('197106251994032005', 'SITI SUYANTI, S.P, M.M', 'Penelaah Teknis Kebijakan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:10', 'p'),
('197502062025212007', 'WAHYU SULISTIOWATI, S.Sos.', 'Penata Layanan Operasional', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:14', 'p'),
('197503192008012003', 'MARYATI, S.E., M.M.', 'Penelaah Teknis Kebijakan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:17', 'p'),
('197510252009021003', 'TAUFIQ BUDI PRASETYO, S.P, M.E', 'Kepala Bidang Perkebunan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:19', 'l'),
('197511142010012008', 'PROBO WINDASTUTI, S.E., Akt. M.M.', 'Kepala Sub Bagian Umum', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:25', 'p'),
('197605122006041018', 'SETYO WICAKSONO, S.E., M.M', 'Kepala Sub Bagian Keuangan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:12:29', 'l'),
('197707142005011005', 'CAHYO MULYADI, S.P.', 'Kepala Bidang Tanaman Pangan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:02', 'l'),
('198204052010012017', 'WIWIT RAHMAWATI, STP', 'Kepala Sub Bagian Perencanaan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:05', 'p'),
('198204232010011016', 'PUJIYONO, STP', 'Kepala Bidang Holtikultura', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:08', 'l'),
('198410012011011003', 'SURONO, STP', 'Kepala UPTD Balai Benih Pertanian Kelas', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:11', 'l'),
('198510282023212028', 'MUYA CANDRANIA, S.TP', 'Analis Pasar Hasil Pertanian Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:15', 'p'),
('198606132010011012', 'KUKUH PRASETYO RUSADY, S.H., M.M', 'Sekretaris', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:17', 'l'),
('198612102009021004', 'WAKID MUTOWAL, S.TP, M.Sc.', 'Kepala Bidang Penyuluhan, Sarana dan Prasarana', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:19', 'l'),
('198905272020121003', 'MUCHAMAD GHOFURUDIN, S.Kom', 'Pranata Komputer Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:22', 'l'),
('199007152020122014', 'MUSHON NIFAH, A.Md', 'Pengelola Data dan Informasi', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:25', 'p'),
('199103212023211017', 'FIRDAUS TRI LUTFI, S.TP.', 'Analis Pasar Hasil Pertanian Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:28', 'l'),
('199109262020121016', 'HASAN RANJANI, A.Md', 'Pengelola Data dan Informasi', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:32', 'l'),
('199111092023211011', 'NGUDI AJI JAKA YUWANA, S.T.P.', 'Analis Pasar Hasil Pertanian Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:36', 'l'),
('199501092025051001', 'HIMAWAN KUNCORO, S.Kom.', 'Analis Sumber Daya Manusia Aparatur Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:43', 'l'),
('199509022024212010', 'SEPT ANGGRAENI, A.Md.A.B', 'Arsiparis Terampil', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:46', 'p'),
('199612132020122002', 'PUSPITASARI, S.P', 'Pengawas Benih Tanaman Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:49', 'l'),
('199709172020122016', 'LIYA ASTUTI, S.Ak', 'Penelaah Teknis Kebijakan', 'default.jpg', '2026-02-21 09:42:53', '2026-02-23 06:13:51', 'p'),
('199904242024211003', 'LUTFI PRASETYO AJI, S.TP.', 'Pengawas Mutu Hasil Pertanian Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-21 09:42:53', NULL),
('200112122025051002', 'DICO AJI PRASETYO, S.Kom.', 'Pranata Komputer Ahli Pertama', 'default.jpg', '2026-02-21 09:42:53', '2026-02-21 09:42:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama_opd` varchar(255) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `struktur_organisasi` varchar(255) DEFAULT 'struktur_organisasi_dispertan_grobogan.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama_opd`, `visi`, `misi`, `alamat`, `email`, `telp`, `facebook`, `instagram`, `youtube`, `struktur_organisasi`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Pertanian Kabupaten Grobogan', 'Menuju Grobogan Maju, Sejahtera dan Berkelanjutan', 'Menguatkan pertumbuhan dan daya saing ekonomi masyarakat berbasis sektor unggulan <br> Mengurangi kemiskinan dan pengangguran <br>\nMeningkatkan kualitas sumber daya manusia yang sehat, cerdas, dan berbudaya <br> Membangun infrastruktur yang handal dan merata, serta meningkatkan ketangguhan wilayah dan lingkungan hidup yang berkualitas <br>\nMeningkatkan kualitas tata kelola pemerintahan dan pelayanan publik dengan penguatan reformasi birokrasi', 'Jl. Pangeran Diponegoro No.20, 58114, Area Sawah, Kalongan, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 5811', '@dispertan_grobogan', '(0292) 421478', 'https://www.facebook.com/dinaspertaniankabupatengrobogan', 'https://www.instagram.com/dispertan_grobogan/', 'https://www.youtube.com/channel/UCsrzepHBJH06Dxbtr3E2zeA', 'struktur-1771744736.png', '2026-02-22 04:44:47', '2026-02-23 05:31:29');

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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
