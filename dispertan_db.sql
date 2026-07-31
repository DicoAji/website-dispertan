-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2026 pada 08.01
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
(2, 'Silakip Grobogan', '1785472071_logo_o1Nl5PTM6WyFI65V0JrWw7VgdA7ASCvwWvFS25Wb.svg', 'http://www.silakip.grobogan.go.id', '2026-07-23 23:06:20', '2026-07-30 21:27:51'),
(3, 'Lapor', '1784875140_logo_L5jHdSCrXtETQEva5L4bqBO9IXyzdzwWorQPsZZY.svg', 'https://www.lapor.go.id', '2026-07-23 23:05:33', '2026-07-23 23:39:00'),
(5, 'Portal Data Grobogan', '1785471643_logo_ytTOvdsPPsBpphvLLavXrO6n9Ksuiak5yIKxWDwi.svg', 'https://portaldata.grobogan.go.id/', '2026-07-26 19:51:33', '2026-07-30 21:20:43'),
(6, 'PPID Grobogan', '1784875155_logo_ySbUY4vQw4JzrkbXPTxAhFAGcBeb8O6lIP46kKq0.svg', 'https://ppid.grobogan.go.id', '2026-07-26 23:05:00', '2026-07-26 23:39:15'),
(7, 'Pemeritah Kab Grobogan', '1785471900_logo_matENZDpbpI39P1YheGV7iIdi6GCsNkg8BylLYIG.svg', 'https://grobogan.go.id/', '2026-07-26 19:51:51', '2026-07-30 21:25:00');

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
(17, 'Kegiatan Tanam Padi dengan Metode PM-AAS di Desa DImoro', '2026-07-24', '1784983651_1784860178_photo-collage.png (3).png', 'Kegiatan Tanam Padi dengan Metode PM-AAS di Desa DImoro\r\n\r\nKamis, 23 Juli 2026, dilaksanakan Kegiatan Tanam Padi dengan Metode PM-AAS (Pertanian Modern – Advanced Agricultural System) di lahan Desa Dimoro, Kecamatan Toroh, Kabupaten Grobogan, yang dihadiri oleh Direktur Jenderal Prasarana dan Sarana Pertanian Bapak Andi Nur Alam Syah S.TP., M.T. didampingi oleh Direktur Alat dan Mesin Pertanian Pasca Panen Bapak Muhammad Rizal Ismail, S.P, M.Si. dan Direktur Alat dan Mesin Pertanian Pra Panen Bapak Achmad Yusuf , S.TP, M.M. Acara tersebut juga dihadiri Staf Ahli Bupati Bidang Sosial, Kemasyarakatan dan Sumberdaya Manusia Bapak Kukuh Prasetyo Rusady , S.H., M.M., Kepala Dinas Pertanian Kabupaten Grobogan Bapak Wakid Mutowal, S.TP, M.Sc., Para Kepala Bidang di DInas Pertanian Kabupaten Grobogan, Camat Toroh, Serta Kepala Desa Dimoro yang diwakili oleh Sekretaris Desa Dimoro, penyuluh pertanian Kabupaten Grobogan, dan petani setempat.', '2026-07-25 05:47:31', '2026-07-25 05:47:31'),
(18, '“Aksi Bersih Sampah” Dinas Pertanian Kabupaten Grobogan', '2026-07-21', '1784983741_1784602400_WhatsApp Image 2026-07-21 at 08.45.44.jpeg', '“Aksi Bersih Sampah” Dinas Pertanian Kabupaten Grobogan\r\n\r\n“Aksi Bersih Sampah” Dinas Pertanian Kabupaten Grobogan Selasa, 21 Juli 2026\r\n\r\nDinas Pertanian Kabupaten Grobogan melaksanakan Aksi Pembersihan Lingkungan Kerja di area Rumah Kedelai Grobogan sebagai bagian dari upaya menjaga kebersihan, kenyamanan, dan fungsi fasilitas publik yang mendukung pengolahan serta pemasaran produk kedelai lokal. Kegiatan ini melibatkan pegawai Dinas Pertanian bersama Penyuluh Pertanian , dilaksanakan di lahan dan halaman Rumah Kedelai Grobogan dengan kegiatan pembersihan sampah, pemangkasan tanaman yang mengganggu, penyapuan area, pengangkutan limbah organik untuk komposting, serta penataan ulang ruang publik agar aman dan representatif untuk pengunjung', '2026-07-25 05:49:01', '2026-07-25 05:49:01'),
(19, 'Apel pagi karyawan & karyawati Dinas Pertanian Kab Grobogan, senin 20/07/2026', '2026-07-20', '1784983824_1784522615_WhatsApp Image 2026-07-20 at 07.35.13.jpeg', 'Apel pagi karyawan & karyawati Dinas Pertanian Kab Grobogan, senin 20/07/2026\r\n\r\nApel pagi karyawan & karyawati Dinas Pertanian Kab Grobogan, senin 20/07/2026', '2026-07-25 05:50:24', '2026-07-25 05:50:24'),
(20, 'Forum Perangkat Daerah Dalam Rangka Penyusunan Rencana Kerja Dinas Pertanian Tahun 2027', '2026-02-27', '1784983902_1772173361_photo-collage.png (1).png', 'Forum Perangkat Daerah Dalam Rangka Penyusunan Rencana Kerja Dinas Pertanian Tahun 2027\r\n\r\nKamis, 26 Februari 2026\r\n\r\nDinas Pertanian Kabupaten Grobogan menggelar Rapat Forum Perangkat Daerah dalam rangka Penyusunan Rencana Kerja Perangkat Daerah (RKPD) Tahun 2027 yang dirangkaikan dengan Forum Konsultasi Publik. Kegiatan ini menjadi salah satu tahapan strategis dalam proses perencanaan pembangunan daerah guna menyelaraskan arah kebijakan, program, dan kegiatan antar perangkat daerah.\r\n\r\nRapat tersebut dihadiri oleh Kepala Bidang Hortikultura, Kepala Bidang Perkebunan, serta sejumlah Organisasi Perangkat Daerah (OPD) terkait. Turut mendampingi dalam kegiatan ini perwakilan dari Perencanaan Pembangunan Riset dan Inovasi Daerah Kabupaten Grobogan (Bapperida), Kepala Dinas Perternakan dan Perikanan Kab. Grobogan, Dinas Pangan Kab. Grobogan, Dinas Koperasi, Usaha Kecil dan Menengah Kab. Grobogan, Dinas Perindustrian dan Perdagangan Kab. Grobogan, Dinas Lingkungan Hidup Kab. Grobogan, serta Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Jombang (DPMPTSP).\r\n\r\nRapat dibuka oleh Pelaksana Tugas (Plt) Kepala Dinas Pertanian Kabupaten Grobogan Bapak Kukuh Prasetyo Rusady, S.H., M.M. Dalam sambutannya, beliau menyampaikan bahwa forum ini merupakan wadah strategis untuk menyampaikan rancangan awal rencana kerja perangkat daerah sekaligus menghimpun masukan dari berbagai pemangku kepentingan.\r\n\r\n“Forum Perangkat Daerah dan Konsultasi Publik ini menjadi momentum penting untuk memastikan bahwa program dan kegiatan tahun 2027 benar-benar disusun berdasarkan kebutuhan riil masyarakat serta selaras dengan prioritas pembangunan daerah,” ujarnya.', '2026-07-25 05:51:42', '2026-07-25 05:51:42'),
(21, 'Koordinasi Percepatan Pelaksanaan Program Kegiatan Pembangunan Pertanian TA 2026', '2026-02-24', '1784983961_1771913142_MixCollage-24-Feb-2026-01-02-PM-8546.jpg', 'Koordinasi Percepatan Pelaksanaan Program Kegiatan Pembangunan Pertanian TA 2026\r\n\r\nSelasa, 24/02/2026 Plt kepala Dinas Pertanian Kabupaten Grobogan mengikuti Koordinasi Percepatan Pelaksanaan Program Kegiatan Pembangunan Pertanian TA 2026 kementerian Pertanian RI.', '2026-07-25 05:52:41', '2026-07-25 05:52:41'),
(22, 'Aksi Bersih Sampah Serentak', '2026-02-24', '1784984016_1771899728_MixCollage-24-Feb-2026-09-18-AM-4478.jpg', 'Aksi Bersih Sampah Serentak\r\n\r\nSelasa, 22 Februari 2026 Dinas Pertanian Kabupaten Grobogan dan juga semua BPP Kecamatan di Kabupaten Grobogan melakukan Aksi Bersih Sampah Serentak dalam rangka Peringatan Hari Peduli Sampah Nasional (HPSN) Tahun 2026, serta sebagai bentuk dukungan terhadap Gerakan Indonesia ASRI (Aman, Sehat, Resik, Indah).', '2026-07-25 05:53:36', '2026-07-25 05:53:36'),
(23, 'RESIK - RESIK DESA LAN KUTHA', '2026-02-13', '1784984069_1770953678_photo-collage.png.png', 'RESIK - RESIK DESA LAN KUTHA\r\n\r\nJumat, 13 Februari 2026\r\n\r\nSampah sering menimbulkan berbagai dampak negatif, antara lain pencemaran, bau tidak sedap, menyumbat saluran dan mengganggu kesehatan masyarakat maupun lingkungan, sehingga perlu kepedulian dari semua pihak dalam pengelolaan sampah, agar dapat memberikan manfaat secara ekonomi, sehat bagi masyarakat dan aman bagi lingkungan.\r\n\r\nSehubungan hal tersebut, sekaligus menindaklanjuti arahan Presiden Republik Indonesia dalam Rakornas Pemerintah Pusat dan Daerah Tahun 2026 di Sentul Jawa Barat sekaligus dalam rangka menyambut Hari Jadi Ke-300 Kabupaten Grobogan serta Peringatan Hari Peduli Sampah Nasional (HPSN) Tahun 2026.', '2026-07-25 05:54:29', '2026-07-25 05:54:29'),
(24, 'ZIARAH MAKAM KI AGENG GETAS PENDOWO', '2026-02-12', '1784984118_1770878265_WhatsApp Image 2026-02-12 at 12.58.27.jpeg', 'ZIARAH MAKAM KI AGENG GETAS PENDOWO\r\n\r\nKamis, 12 Februari 2026\r\n\r\nDalam Rangkaian Hari Jadi Kabupaten Grobogan ke - 300. Plt Dinas Pertanian Mendampingi Mendampingai, wakil bupati & forkompinda dalam rangkaian acara tersebut.', '2026-07-25 05:55:18', '2026-07-25 05:55:18'),
(25, 'DUKUNG LTT PADI, PENYULUH GROBOGAN DORONG KEAKTIFAN KELOMPOK TANI', '2025-10-22', '1784984171_1761109422_WhatsApp Image 2025-10-22 at 07.46.58.jpeg', 'DUKUNG LTT PADI, PENYULUH GROBOGAN DORONG KEAKTIFAN KELOMPOK TANI\r\n\r\nKEDUNGJATI – Dalam upaya meningkatkan produktivitas dan kemandirian petani, Pemerintah Desa Kalimaro, Kecamatan Kedungjati, Kabupaten Grobogan, Provinsi Jawa Tengah, menggelar pertemuan bersama penyuluh pertanian dan kelompok tani, Selasa (22/4/2025) di Desa Kalimaro.\r\n\r\nKegiatan ini bertujuan untuk membangun kembali semangat kebersamaan serta meningkatkan partisipasi aktif para anggota kelompok tani dalam setiap program pertanian mendukung ketahanan pangan nasional.\r\n\r\nMenteri Pertanian Andi Amran Sulaiman menegaskan bahwa peran penyuluh merupakan ujung tombak dalam keberhasilan program ketahanan dan swasembada pangan.\r\n\r\n“Penyuluh adalah penggerak utama di lapangan. Mereka yang mendampingi petani, memastikan tanam terjadi, dan melaporkan capaian secara real-time. Dukungan dan penguatan peran mereka adalah prioritas kami,” ujarnya.\r\n\r\nSementara itu, Kepala Badan Penyuluhan dan Pengembangan SDM Pertanian (BPPSDMP), Idha Widi Arsanti, turut menekankan pentingnya fungsi koordinatif dan kolaboratif yang dijalankan oleh penyuluh. Ia menyampaikan bahwa keberhasilan swasembada pangan sangat bergantung pada kecepatan aksi di lapangan serta keakuratan data yang dilaporkan.\r\n\r\nPertemuan di Desa Kalimaro, dihadiri 34 petani yang tergabung dalam kelompok tani (Poktan) Katon Rejo IV, dihadiri juga oleh perangkat desa, serta penyuluh pertanian dari Balai Penyuluhan Pertanian (BPP) Kecamatan Kedungjati.\r\n\r\nKepala Dusun Kalimaro, Ahmad Fauzi, membuka pertemuan dengan memberikan sambutan yang menekankan pentingnya sinergi antara petani, pemerintah desa, dan penyuluh pertanian.\r\n\r\nFauzi berharap, kegiatan ini menjadi langkah awal dalam membangkitkan semangat gotong royong di bidang pertanian terlebih menghadapi musim tanam (MT) II komoditas padi seluas 52 hektare mendukung program ketahanan pangan nasional.\r\n\r\n“Selama ini, banyak program bagus dari pemerintah yang belum maksimal terserap karena kurangnya komunikasi dan keaktifan kelompok tani. Mari kita bangun kembali semangat kebersamaan,” harap Fauzi.\r\n\r\nKetua Poktan Katon Rejo IV, Asrori, menyampaikan bahwa pertemuan ini sangat dibutuhkan di tengah tantangan yang dihadapi petani, mulai dari harga pupuk yang mahal hingga sulitnya mengakses informasi pertanian terbaru.\r\n\r\n“Kami merasa dihargai dan didengar. Semoga ini bukan yang terakhir, tapi awal dari komunikasi yang lebih intens antara kelompok tani dan pemerintah,” kata Asrori.\r\n\r\nSebagai koordinator penyuluh pertanian dari BPP Kedungjati, Harmoko, turut memberikan materi tentang pentingnya kelembagaan kelompok tani yang aktif dan berdaya guna.\r\n\r\n“Kelompok tani bukan hanya untuk administrasi, tapi sebagai alat perjuangan petani. Kalau aktif, permasalahan yang dihadapi akan mudah diselesaikan,” jelas Harmoko.\r\n\r\nDalam sesi tersebut, Harmoko juga menjelaskan poktan yang aktif akan mendorong perencanaan kegiatan baik on farm maupun off farm sehingga manfaatnya akan dirasakan oleh semua anggota.\r\n\r\nIa menambahkan bahwa kelompok tani harus proaktif mendukung upaya percepatan tanam padi dengan mengoptimalkan irigasi perpompaan besar dalam menambah luas tambah tanam (LTT) untuk mendukung ketahanan pangan.\r\n\r\nDiskusi juga menyoroti perlunya regenerasi petani muda, mengingat mayoritas petani di Kalimaro sudah berusia di atas 50 tahun. Hal ini menjadi perhatian serius yang perlu ditangani bersama.\r\n\r\nPertemuan ditutup dengan pembentukan tim kecil yang bertugas menyusun rencana kerja kelompok tani selama enam bulan ke depan, termasuk agenda pelatihan dan pertemuan rutin.\r\n\r\nHarmoko memastikan pihaknya akan terus mendampingi proses penyusunan rencana kerja dan membantu mengawal agar program-program berjalan sesuai rencana.\r\n\r\n“Langkah awal ini harus dijaga. Kita jangan semangatnya hanya sesaat, tapi terus menyala,” pungkas Harmoko kepada seluruh peserta pertemuan.', '2026-07-25 05:56:11', '2026-07-25 05:56:11'),
(26, 'Sosialisasi Sistem Informasi Perencanaan Pembangunan Pertanian (SIPENTA)', '2024-10-11', '1784984338_1728614647_WhatsApp Image 2024-10-10 at 11.15.05.jpeg', 'Sosialisasi Sistem Informasi Perencanaan Pembangunan Pertanian (SIPENTA)\r\n\r\nDinas Pertanian  Kabupaten Grobogan menyelenggarakan acara sosialisasi Sistem Informasi Perencanaan Pembangunan Pertanian (SIPENTA) Berbasis Usulan Kelompok Tani, yang diikuti oleh Koordinator PPL beserta operator BPP Kecamatan dan staf lingkup Dinas Pertanian Kabupaten Grobogan di Aula Dinas Pertanian Kabupaten Grobogan. (09/10)\r\n\r\nSIPENTA merupakan aksi perubahan yang digagas oleh Kepala Subbag Perencanaan Dinas Pertanian Kabupaten Grobogan, selaku peserta Pelatihan Kepemimpinan Pengawas (PKP) Angkatan IX Tahun 2024 BPSDMD Provinsi Jawa Tengah. Sebagai upaya untuk mendapatkan database berbasis usulan kelompok tani secara efektif untuk mendapatkan database usulan yang valid, akurat dan update sesuai kebutuhan dilapangan.\r\n\r\nAcara dibuka oleh Kepala Dinas Pertanian yang di wakili oleh Pujiyono, STP selaku Kepala Bidang Tanaman Pangan Dinas Pertanian sekaligus menyampaikan latar belakang dan tujuan SIPENTA.\r\n\r\nDalam sambutannya memberikan apresiasi dan dukungan penuh atas penggunaan SIPENTA yang diharapkan menjadi inovasi yang efektif untuk meningkatkan kinerja Dinas Pertanian Kabupaten Grobogan serta dapat meningkatkan pembangunan pertanian di Kabupaten Grobogan.\r\n\r\nSIPENTA diharapkan dapat tersinkronisasi dengan perencanaan dari Kementan dan Bappenas. Acara dilanjutkan demonstrasi SIPENTA oleh Wiwit selaku penggagas aksi perubahan kepada seluruh peserta sosialisasi. (Admin-Dispertan)', '2026-07-25 05:58:58', '2026-07-25 05:58:58');

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
(39, 'CALK 2025', '1784867738_CALK BAB I PENDAHULUAN-merged.pdf', '2025', 'CALK', '2026-07-23 21:35:38', '2026-07-23 21:35:38'),
(40, 'Aset dan Inventaris 2024', '1785116609_Rekap Aset Dispertan 2024.pdf', '2024', 'Aset Inventaris', '2026-07-26 18:43:29', '2026-07-26 18:43:29'),
(41, 'Aset dan Inventaris 2025', '1785116637_Rekap Aset Dispertan 2025.pdf', '2025', 'Aset Inventaris', '2026-07-26 18:43:57', '2026-07-26 18:43:57');

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
(4, 'Ngopi Tani Vol 104 - Dampak Perubahan Iklim pada Tanaman: Antisipasi Ledakan Hama dan Penyakit Baru', '1784985158_l2FZ9nZbttrifHrreYmoDpKZb6txsJ1TfDE8PJRh.png', 'video', 'https://www.youtube.com/watch?v=cY74sDu_SLU', '2026-07-22 06:12:38', '2026-07-25 06:12:38'),
(5, 'Pembukaan Grobogan Agro Expo VIII 2026', '1785116014_yZnBWw70Sdqdzr6oY0ECQknyozS643sWW185rAf8.png', 'video', 'https://www.youtube.com/watch?v=ciQL3lTpRg8&t=7400s', '2026-06-02 18:33:34', '2026-06-02 18:33:34');

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
(7, 'Standar Pelayanan', NULL, '1785135915_layanan_3r45YUoNWhotpkO1Z2tjaj6nisdf2ug5wCv5hTNc.pdf', '2026-07-27 00:05:15', '2026-07-27 00:05:15'),
(8, 'SOP BBM', NULL, '1785136016_layanan_xjLOgaSFNsRRs28pwiW798zLfD77GSMlGS5ZkmfZ.pdf', '2026-07-27 00:06:56', '2026-07-27 00:06:56'),
(9, 'Rekomendasi BBM', 'https://taksi-alsintan-grobogan.lovable.app/rekomendasi-bbm', NULL, '2026-07-27 00:07:14', '2026-07-27 00:07:14'),
(10, 'SOP PASCA PANEN', NULL, '1785136064_layanan_BeNIB4U35AJ9yVM7DszY5LHGwUmHVcu5cBfsTzTf.pdf', '2026-07-27 00:07:44', '2026-07-27 00:07:44'),
(11, 'SOP PRA PANEN', NULL, '1785136081_layanan_51BIHcV0wKYyKBiOYPolSqbOeZhSKDWUeNpyrInq.pdf', '2026-07-27 00:08:01', '2026-07-27 00:08:01'),
(13, 'Ngopi Tani', 'https://www.youtube.com/@dispertangrobogan/videos', NULL, '2026-07-30 20:36:07', '2026-07-30 20:36:07'),
(14, 'Layanan Tani Maju', NULL, '1785469855_layanan_6lO6d46tgEvnRMkhM96MZf3elNCHsQ8slIXdQGzw.jpg', '2026-07-30 20:50:55', '2026-07-30 20:50:55');

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
(5, 'ERDKK', 'https://e-rdkk.dispertan.grobogan.go.id/', NULL, '2026-07-23 20:43:34', '2026-07-23 20:43:34'),
(7, 'Rumah Kedelai Grobogan', 'https://drive.google.com/file/d/1usSdMzZT8hcr2_nKoyyWIX7hveCmvSh2/view?usp=drive_link', NULL, '2026-07-30 20:34:01', '2026-07-30 20:34:01'),
(8, 'RUT Hunter', 'https://drive.google.com/file/d/1Av_ymi7NkolzvpkUt_4Dbu-gzF4NxoGI/view?usp=drive_link', NULL, '2026-07-30 20:34:37', '2026-07-30 20:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_layanan`
--

CREATE TABLE `menu_layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL COMMENT 'Contoh: WBS, LAPOR, SKM',
  `file` varchar(255) DEFAULT NULL COMMENT 'Menyimpan nama file PDF atau Gambar',
  `link` varchar(255) DEFAULT NULL COMMENT 'Menyimpan URL tujuan jika diklik',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_layanan`
--

INSERT INTO `menu_layanan` (`id`, `nama`, `file`, `link`, `created_at`, `updated_at`) VALUES
(1, 'WBS', NULL, 'https://wise.inspektorat.grobogan.go.id/', '2026-07-30 20:22:22', '2026-07-30 20:22:22'),
(2, 'SKM TW II', '1785468215_skm_tw_ii_4v6vSerEtvkBixWIa9Zft4i0CyRcFTywB5C7hHRf.pdf', NULL, '2026-07-30 20:23:35', '2026-07-30 20:23:35');

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
(1, 'anti korupsi', '1785469312_popup_XvReUCIgjcpmN0j8XfGZwBHjDDl3T9thgE6gTm5p.jpg'),
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
(3, 'Profile Dinas Pertanian Kab. Grobogan', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/sejarah-dasar-hukum', '2026-07-23 20:55:15', '2026-07-26 20:44:30'),
(4, 'Struktur Organisasi', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/struktur-organisasi', '2026-07-23 20:58:39', '2026-07-23 20:58:39'),
(5, 'Visi dan Misi Dinas Pertanian Kab. Grobogan', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/visimisi', '2026-07-23 20:59:03', '2026-07-26 20:25:20'),
(6, 'Tugas dan Fungsi berdasarkan Perbup 78 Th 2021 SOTK Dispertan', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/tugas-fungsi', '2026-07-23 20:59:38', '2026-07-26 20:24:37'),
(7, 'Daftar Pegawai', 'Informasi Berkala', NULL, 'http://127.0.0.1:8000/pegawai', '2026-07-23 21:00:18', '2026-07-23 21:00:18'),
(8, 'SOP Pelayanan', 'Informasi Berkala', '1784865717_ppid_DaJishwlVjGGFBW6MJOxxUNdv0W7PdB1cVNdzVGN.pdf', NULL, '2026-07-23 21:01:57', '2026-07-23 21:01:57'),
(9, 'Grobogan Siaga', 'Informasi Serta Merta', '1784865860_ppid_cYx0A95qhLo7CBff3CptU1V43tq83ttUc1JnR6nF.pdf', NULL, '2026-07-23 21:04:20', '2026-07-23 21:04:20'),
(11, 'Penanggungjawab dan Pelaksana Program 2026', 'Informasi Berkala', '1785117460_ppid_jVhUoOKO96EtUVNuwxVrFKIqazvywjslcviRmBu7.pdf', NULL, '2026-07-26 18:57:40', '2026-07-26 18:57:40'),
(12, 'Laporan Akses Informasi Publik', 'Informasi Berkala', '1785122769_ppid_xtcEODJCmVEob5Gr9AU7PN5LeHJ3LOpP9P5yQjFh.pdf', NULL, '2026-07-26 20:26:09', '2026-07-26 20:26:09'),
(13, 'Laporan Keuangan Tahun 2025', 'Informasi Berkala', '1785122819_ppid_4lfCqaz7mZDmJO9CkNjUV9htlsepyRs6ZXTUKJrm.pdf', NULL, '2026-07-26 20:26:59', '2026-07-26 20:26:59'),
(14, 'Peraturan Kebijakan Publik', 'Informasi Berkala', '1785122898_ppid_9Hk0GFGL51D4JeMPQr0861fHu4E7aWdKroAk6oyD.pdf', NULL, '2026-07-26 20:28:18', '2026-07-26 20:28:18'),
(15, 'Dokumen Kebencanaan', 'Informasi Serta Merta', NULL, 'https://bpbd.grobogan.go.id/elementor-2370/', '2026-07-26 20:30:45', '2026-07-26 20:30:45'),
(16, 'Program dan Kegiatan', 'Informasi Berkala', '1785123837_ppid_hOxGdWIu8edQyowoFCtAqGoaC8TdNAwNZjSlBwgO.pdf', NULL, '2026-07-26 20:43:57', '2026-07-26 20:43:57'),
(17, 'SK PPID', 'Informasi Berkala', '1785123900_ppid_EkjjatAfH3KrS3eCRnzUTEcghtQASZuByS0Hni3V.pdf', NULL, '2026-07-26 20:45:00', '2026-07-30 22:56:12'),
(18, 'SOP PELAYANAN PUBLIK', 'Informasi Berkala', '1785123996_ppid_HrlYVXgdXaTiUEn56CRZk7FC7VNnYto3DzSlZHfu.pdf', NULL, '2026-07-26 20:46:36', '2026-07-26 20:46:36'),
(19, 'DPA Rekap Belanja TA 2026', 'Informasi Berkala', '1785124228_ppid_ooyZu6EoFGIB5zlVITZdu6DBhj5qjX0c2nIWC3i3.pdf', NULL, '2026-07-26 20:50:28', '2026-07-26 20:50:28'),
(20, 'DPPA Rekap Belanja TA 2025', 'Informasi Berkala', '1785124254_ppid_eDSZe4dij3XEC7lRO9W6yszKfbxHqtHGzal5dV6n.pdf', NULL, '2026-07-26 20:50:54', '2026-07-26 20:50:54'),
(21, 'RENCANA KINERJA TAHUNAN ( RKT ) 2026', 'Informasi Berkala', '1785124275_ppid_1FhkTnRjPJhSYm3AVuwUkMimx4azyEF8dJ8csfHg.pdf', NULL, '2026-07-26 20:51:15', '2026-07-26 20:51:15'),
(22, 'RENJA DISPERTAN 2027', 'Informasi Berkala', '1785124301_ppid_b8RL8AasMN8x9dWtHHMH7DOt1MyBj7trlfHjg70C.pdf', NULL, '2026-07-26 20:51:41', '2026-07-26 20:51:41'),
(23, 'RESTRA DINAS PERTANIAN 2025 - 2029', 'Informasi Berkala', '1785124889_ppid_r2mPeJgPpG5bXaJ5klWu18v0xrv3trSEyNsnbF7B.pdf', NULL, '2026-07-26 21:01:29', '2026-07-26 21:01:29'),
(24, 'LKjIP_DISPERTAN_2025', 'Informasi Berkala', '1785125191_ppid_0KOWJdOFReHxcnuzff3y0N8CVJu6Qqu9d4YSulS0.pdf', NULL, '2026-07-26 21:06:31', '2026-07-26 21:06:31'),
(25, 'Informasi Dikecualikan', 'Informasi Dikecualikan', '1785125269_ppid_LrRiJzNwpriCaet67sckdfbhThsUpa0ldeB4jmjk.pdf', NULL, '2026-07-26 21:07:49', '2026-07-26 21:07:49'),
(26, 'Daftar Pegawai Dinas Pertanian', 'Informasi Setiap Saat', NULL, 'http://127.0.0.1:8000/pegawai', '2026-07-26 21:08:58', '2026-07-26 21:08:58'),
(27, 'Laporan SKM-Dinas Pertanian Triwulan 1 2026', 'Informasi Setiap Saat', '1785126653_ppid_D6QsohDZeMIyLZoS0vZhz4QrvK8v6fkfJdHHF5p8.pdf', NULL, '2026-07-26 21:30:53', '2026-07-26 21:30:53'),
(28, 'Laporan SKM-Dinas Pertanian Triwulan 2 Tahun 2026', 'Informasi Setiap Saat', '1785126683_ppid_xDAmjr2s7yLrEXk6Z4ih8SuNHOP3yXLR3dXWXcF6.pdf', NULL, '2026-07-26 21:31:23', '2026-07-26 21:31:23'),
(29, 'Laporan SKM-Dinas Pertanian Triwulan 4 2025', 'Informasi Setiap Saat', '1785126702_ppid_f2axdn0cShGNWbRlibWNbbvwMhzb852vW5PkQxvV.pdf', NULL, '2026-07-26 21:31:42', '2026-07-26 21:31:42'),
(30, 'SKM Triwulan III Th 2025 Dinas Pertanian Kab. Grobogan', 'Informasi Setiap Saat', '1785126792_ppid_jFWR34Pas55UgzY5LCMAiSrkdE4TeznpkAkjsTTv.pdf', NULL, '2026-07-26 21:33:12', '2026-07-26 21:33:12'),
(31, 'BA rekon Aset TW1 2025', 'Informasi Setiap Saat', '1785126984_ppid_0fMKwErM5C8jPKuVXlbujH9n7tiKTYHmPQHcEiAL.pdf', NULL, '2026-07-26 21:36:24', '2026-07-26 21:36:24'),
(32, 'BA rekon Aset TW1 2026', 'Informasi Setiap Saat', '1785126998_ppid_Y3zZO99eKsG1qzBjzd8Ow8NGKVva3EK5ZyhMVS6x.pdf', NULL, '2026-07-26 21:36:38', '2026-07-26 21:36:38'),
(33, 'BA rekon Aset TW2 2025', 'Informasi Setiap Saat', '1785127023_ppid_EL4aqZyGboBAuXADD0zxp7Bn9w1giaQtAhDHrASM.pdf', NULL, '2026-07-26 21:37:03', '2026-07-26 21:37:03'),
(34, 'BA rekon Aset TW2 2026', 'Informasi Setiap Saat', '1785127042_ppid_ho3VSZcXV8LcHNM5fM1XLrV5Yb53d1tQQVkvRxBI.pdf', NULL, '2026-07-26 21:37:22', '2026-07-26 21:37:22'),
(35, 'BA rekon Aset TW3 2025', 'Informasi Setiap Saat', '1785127061_ppid_pms1rYPqxn5tZOitQ3FkUDIeViRPmX9okWi0o8Y0.pdf', NULL, '2026-07-26 21:37:41', '2026-07-26 21:37:41'),
(36, 'BA rekon Aset TW4 2025', 'Informasi Setiap Saat', '1785127081_ppid_SvuK9CRNEyu5IGUWP2K2TJ7QlJGMgps5pFkhfwkK.pdf', NULL, '2026-07-26 21:38:01', '2026-07-26 21:38:01'),
(37, 'SOP PPID', 'Informasi Berkala', '1785477439_ppid_3jW4j9k07N7w2PhHPtEAXesrlIsIiE7dAuo255t8.pdf', NULL, '2026-07-30 22:57:19', '2026-07-30 22:57:19'),
(38, 'Penetapan PPID Pembantu', 'Informasi Berkala', '1785477455_ppid_nRHEwDoMeJ1bWt7BALw3MrwoaBQRLoqytzi0gdfo.pdf', NULL, '2026-07-30 22:57:35', '2026-07-30 22:57:35'),
(39, 'Laporan Akses Informasi Publik', 'Informasi Berkala', '1785477474_ppid_Sv20q0QSJi0MhfYBoYGQJ6gqV5qyPWbV0mWdE0FK.pdf', NULL, '2026-07-30 22:57:54', '2026-07-30 22:57:54');

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
(1, 'Dinas Pertanian Kabupaten Grobogan', 'Menuju Grobogan Maju, Sejahtera dan Berkelanjutan', 'Menguatkan pertumbuhan dan daya saing ekonomi masyarakat berbasis sektor unggulan <br> \r\nMengurangi kemiskinan dan pengangguran <br>\r\nMeningkatkan kualitas sumber daya manusia yang sehat, cerdas, dan berbudaya <br> \r\nMembangun infrastruktur yang handal dan merata, serta meningkatkan ketangguhan wilayah dan lingkungan hidup yang berkualitas <br>\r\nMeningkatkan kualitas tata kelola pemerintahan dan pelayanan publik dengan penguatan reformasi birokrasi', 'PROFIL DINAS PERTANIAN KABUPATEN GROBOGAN\r\n\r\nA. Gambaran Umum\r\nDinas Pertanian Kabupaten Grobogan merupakan perangkat daerah di lingkungan Pemerintah Kabupaten Grobogan yang mempunyai tugas melaksanakan urusan pemerintahan daerah di bidang pertanian, meliputi tanaman pangan, hortikultura, dan perkebunan sesuai dengan ketentuan peraturan perundang-undangan. Dinas Pertanian berada di bawah dan bertanggung jawab kepada Bupati Grobogan melalui Sekretaris Daerah.\r\nKabupaten Grobogan dikenal sebagai salah satu lumbung pangan nasional dengan komoditas unggulan seperti padi, jagung, kedelai, bawang merah, semangka, dan melon. Potensi tersebut menjadikan sektor pertanian sebagai penggerak utama perekonomian daerah dan sumber penghidupan sebagian besar masyarakat.\r\n\r\nB. Program Strategis\r\n- Peningkatan produksi tanaman pangan.\r\n- Pengembangan hortikultura.\r\n- Pengembangan perkebunan.\r\n- Penyediaan sarana dan prasarana pertanian.\r\n- Penguatan penyuluhan pertanian.\r\n- Perlindungan tanaman dan pengendalian organisme pengganggu tanaman.\r\n- Pengembangan mekanisasi dan teknologi pertanian.\r\n- Pemberdayaan kelembagaan petani.\r\n\r\nC. Komitmen Pelayanan\r\nDinas Pertanian Kabupaten Grobogan berkomitmen memberikan pelayanan yang profesional, cepat, transparan, akuntabel, dan berorientasi pada kepuasan masyarakat guna mendukung terwujudnya pertanian Grobogan yang maju, mandiri, modern, dan berkelanjutan.', 'Jl. Pangeran Diponegoro No.20, 58114, Area Sawah, Kalongan, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 5811', '@dispertan_grobogan', '(0292) 421478', 'https://www.facebook.com/dinaspertaniankabupatengrobogan', 'https://www.instagram.com/dispertan_grobogan/', 'https://www.youtube.com/channel/UCsrzepHBJH06Dxbtr3E2zeA', 'struktur-1771744736.png', '2026-02-22 04:44:47', '2026-07-26 20:40:20', 'maklumat-1784868438.jpg', 'tugas-fungsi-1778242529.pdf', 'TUGAS\r\nMelaksanakan urusan pemerintahan daerah berdasarkan asas otonomi daerah dan tugas pembantuan di bidang pertanian yang meliputi tanaman pangan, hortikultura, dan perkebunan.\r\n\r\nFUNGSI\r\nDalam melaksanakan tugas tersebut, Dinas Pertanian Kabupaten Grobogan menyelenggarakan fungsi:\r\n- Perumusan kebijakan teknis di bidang tanaman pangan, hortikultura, dan perkebunan.\r\n- Pengoordinasian, pengembangan, dan fasilitasi kegiatan bidang pertanian.\r\n- Pembinaan dan pengendalian pelaksanaan program pertanian.\r\n- Monitoring, evaluasi, dan pelaporan pelaksanaan program.\r\n- Pengelolaan administrasi dan kesekretariatan.\r\n- Pembinaan Unit Pelaksana Teknis Daerah (UPTD).\r\n- Pelaksanaan tugas lain yang diberikan oleh Bupati sesuai ketentuan peraturan perundang-undangan.');

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
-- Indeks untuk tabel `menu_layanan`
--
ALTER TABLE `menu_layanan`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `galeri_fotos`
--
ALTER TABLE `galeri_fotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menu_layanan`
--
ALTER TABLE `menu_layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
