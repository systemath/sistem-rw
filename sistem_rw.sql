-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2026 at 08:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_rw`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `aktivitas` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `aktivitas`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 1, 'Menambahkan warga baru: Budi', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 02:36:25'),
(2, 1, 'Mencoba melakukan import data warga', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 02:36:52'),
(3, 1, 'Mencoba melakukan import data warga', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 02:37:20'),
(4, 1, 'Mencoba melakukan import data warga', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:25:44'),
(5, 1, 'Menambahkan kategori berita: Kebersihan', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:31:12'),
(6, 1, 'Menambahkan berita baru: Pembersihan Saluran Penghubung', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:32:40'),
(7, 1, 'Menambahkan pengumuman baru: Pendaftaran Ketua RT/RW', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:34:32'),
(8, 1, 'Menambahkan kategori galeri: Kebersihan', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:34:56'),
(9, 1, 'Menambahkan foto galeri baru: Gotong Royong', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:35:25'),
(10, 1, 'Menambahkan FAQ baru', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-14 03:38:58'),
(11, 1, 'Mengupdate berita: Pembersihan Saluran Penghubung', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 13:27:29'),
(12, 1, 'Mengupdate pengumuman: Pendaftaran Ketua RT/RW', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 13:29:06'),
(13, 1, 'Mengupdate foto galeri: Gotong Royong', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 13:31:01'),
(14, 1, 'Mengupdate foto galeri: Gotong Royong', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 13:31:23'),
(15, 1, 'Mengupdate foto galeri: Gotong Royong', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 13:31:39'),
(16, 1, 'Mengupdate data warga: Budi', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-17 05:34:09'),
(17, 1, 'Mengupdate data warga: Budi', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-17 05:36:09'),
(18, 1, 'Mengupdate data warga: Budi', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-17 05:37:56'),
(19, 1, 'Menambahkan warga baru: Tiara', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-17 05:44:26'),
(20, 1, 'Mengupdate data warga: Tiara', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-17 05:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `isi` text NOT NULL,
  `tanggal_publish` date NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `status_publish` enum('publish','draft') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `kategori_id`, `judul`, `slug`, `thumbnail`, `isi`, `tanggal_publish`, `penulis`, `status_publish`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pembersihan Saluran Penghubung', 'pembersihan-saluran-penghubung', 'f7dad4102578fe383a3ef28609b4d130.jpeg', '<p>Petugas PPSU Kelurahan Jelambar, bersama dengan Satpel Sumber Daya Air Kecamatan Grogol Petamburan, melaksanakan kegiatan pengurasan saluran penghubung di Jalan Lambar Baru Raya RT 002 RW 009.&nbsp;</p>\r\n\r\n<p>Menurut Lurah Jelambar, Pradista Machdala Putra, kegiatan yang melibatkan sebanyak 45 orang petugas gabungan ini berlangsung selama lima jam dan berhasil mengangkat sekitar 1000 karung lumpur.</p>\r\n\r\n<p>Dikatakan Pradista, pengurasan saluran ini dilaksanakan sebagai respons terhadap kondisi saluran yang mengalami pendangkalan akibat penumpukan lumpur, sampah, dan material lainnya yang menghambat aliran air.</p>\r\n\r\n<p>&quot;Pengurasan saluran bertujuan untuk menjaga kelancaran aliran air dan mencegah terjadinya genangan serta banjir di lingkungan permukiman,&quot; katanya, Minggu (3/5).</p>\r\n\r\n<p>Pradista menjelaskan bahwa kegiatan ini juga menjadi momentum untuk meningkatkan kesadaran warga tentang pentingnya menjaga kebersihan lingkungan. Ia mengimbau masyarakat tidak membuang sampah sembarangan ke dalam saluran air.</p>\r\n\r\n<p>&ldquo;Hasil dari pengurasan saluran penghubung ini diharapkan mampu memperlancar sistem drainase lingkungan, mengurangi potensi genangan saat hujan turun, serta menciptakan lingkungan yang lebih bersih, sehat, dan nyaman,&rdquo; ungkapnya. (Kontri)&nbsp;</p>\r\n', '2026-05-14', 'Administrator', 'publish', '2026-05-14 03:32:40', '2026-05-14 03:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'Website apa ini?', 'Website ini dipakai untuk warga RW 011 jika mereka membutuhkan layanan pengajuan surat atau melakukan pengaduan.');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text,
  `tanggal_upload` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `kategori_id`, `judul`, `foto`, `deskripsi`, `tanggal_upload`, `created_at`) VALUES
(1, 1, 'Gotong Royong', '4808a58f78d3f7f40c3891003da95313.jpg', 'Gotong Royong bersama', '2026-05-14', '2026-05-14 03:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama_kategori`, `slug`) VALUES
(1, 'Kebersihan', 'kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id`, `nama_kategori`) VALUES
(1, 'Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_pesan`
--

CREATE TABLE `kontak_pesan` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontak_pesan`
--

INSERT INTO `kontak_pesan` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'Budi', 'budi@gmail.com', 'pengaduan', '2026-05-14 03:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `judul_pengaduan` varchar(255) NOT NULL,
  `kategori_pengaduan` varchar(50) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `foto_bukti` varchar(255) DEFAULT NULL,
  `status` enum('pending','diproses','selesai','ditolak') NOT NULL DEFAULT 'pending',
  `tanggapan_admin` text,
  `foto_tindak_lanjut` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `user_id`, `judul_pengaduan`, `kategori_pengaduan`, `isi_pengaduan`, `foto_bukti`, `status`, `tanggapan_admin`, `foto_tindak_lanjut`, `created_at`, `updated_at`) VALUES
(1, 2, 'Tanaman Dirusak', 'Kebersihan', 'Tanaman di depan gedung dirusak', '2c17c31749e7646aa4b4ad72f3a52df5.jpg', 'selesai', 'sedang diperbaiki', 'd6e5b92293cc161a3a2a240cfebfb034.jpeg', '2026-05-14 02:52:18', '2026-05-13 19:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_publish` date NOT NULL,
  `status_publish` enum('publish','draft') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `gambar`, `tanggal_publish`, `status_publish`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Ketua RT/RW', 'Pendaftaran Ketua RT/RW ', '58c057bfe9d4f29639378acbd4145b28.jpg', '2026-05-14', 'publish', '2026-05-14 03:34:32', '2026-05-14 03:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar`
--

CREATE TABLE `surat_pengantar` (
  `id` int NOT NULL,
  `warga_id` int NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `keperluan` text NOT NULL,
  `keterangan` text,
  `file_persyaratan` varchar(255) DEFAULT NULL,
  `status` enum('menunggu','diproses','ditolak','selesai') NOT NULL DEFAULT 'menunggu',
  `file_surat_jadi` varchar(255) DEFAULT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_pengantar`
--

INSERT INTO `surat_pengantar` (`id`, `warga_id`, `nomor_surat`, `jenis_surat`, `keperluan`, `keterangan`, `file_persyaratan`, `status`, `file_surat_jadi`, `tanggal_pengajuan`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Surat Usaha', 'untuk usaha', '', 'ddd263b2b89eb5a5f13e65acd4baa869.jpg', 'selesai', '6fcf99fd5892913dfa34b10d1c85b7a9.pdf', '2026-05-14', '2026-05-14', '2026-05-14 02:53:37', '2026-05-14 03:04:39'),
(2, 1, '1', 'Surat Domisili', 'domisili', 'domisili', 'fbc619b41321f6986295f0bdbe5beec1.jpg', 'selesai', '28632d86cfabab9952327e6f3a271e48.pdf', '2026-05-14', '2026-05-14', '2026-05-14 04:12:53', '2026-05-14 04:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','warga') NOT NULL,
  `status_akun` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `force_password_change` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `role`, `status_akun`, `force_password_change`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@mail.com', '$2y$10$esAure..3RMENPCctmwbLu5.snKLAwdsEfDRQlqbaf.qzjMRCBKkS', 'admin', 'aktif', 0, '2026-05-17 07:34:18', '2026-05-12 12:16:04', '2026-05-17 07:34:18'),
(2, 'Budi', '1111111111111111', 'budi@gmail.com', '$2y$10$yF5djxXXDSP3nYfORDJstu0vycaI99ZCmiWrLGXCB447Pj.dRnL/2', 'warga', 'aktif', 0, '2026-05-17 07:34:06', '2026-05-14 02:36:25', '2026-05-17 07:34:06'),
(3, 'Tiara', '2222222222222222', 'tiara@gmail.com', '$2y$10$HA.U9tFQ6oJLVTSUiWzBlOVtEa8p5LsnAzWEJB5s0VJr6tfJxDUpq', 'warga', 'aktif', 0, '2026-05-17 05:45:26', '2026-05-17 05:44:26', '2026-05-17 05:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `status_perkawinan` varchar(30) DEFAULT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(20) DEFAULT 'WNI',
  `status_warga` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `user_id`, `nik`, `no_kk`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_perkawinan`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `no_hp`, `pekerjaan`, `kewarganegaraan`, `status_warga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 2, '1111111111111111', '1111111111111111', 'Budi', 'Jakarta', '1991-01-17', 'L', 'Islam', 'Belum Kawin', 'Jl. Jakarta', '001', '011', '', '', '', '', '', '081234567890', 'Pengusaha', 'WNI', 'Tetap', '6c80a914e26c9d84842c96c3bebc9f64.jpg', '2026-05-14 02:36:25', '2026-05-17 05:34:09'),
(2, 3, '2222222222222222', '1234567890123456', 'Tiara', 'Jakarta', '1993-06-01', 'P', 'Islam', 'Belum Kawin', 'Jakarta', '001', '011', '', '', '', '', '', '081234567890', 'Wiraswasta', 'WNI', 'Tetap', NULL, '2026-05-17 05:44:26', '2026-05-17 05:44:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak_pesan`
--
ALTER TABLE `kontak_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak_pesan`
--
ALTER TABLE `kontak_pesan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_berita` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_galeri` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD CONSTRAINT `surat_pengantar_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
