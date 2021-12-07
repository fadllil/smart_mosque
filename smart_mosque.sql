-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 01:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_mosque`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_masjid`
--

CREATE TABLE `admin_masjid` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_masjid`
--

INSERT INTO `admin_masjid` (`id`, `id_user`, `id_masjid`, `no_hp`, `alamat`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '081256388506', 'Panam', 'Ketua', '2021-09-30 09:47:36', '2021-11-17 04:39:54'),
(3, 5, 2, NULL, NULL, NULL, '2021-11-24 05:32:21', '2021-11-24 05:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `imam`
--

CREATE TABLE `imam` (
  `id` bigint(20) NOT NULL,
  `id_jadwal_imam` bigint(20) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imam`
--

INSERT INTO `imam` (`id`, `id_jadwal_imam`, `jadwal`, `nama`, `created_at`, `updated_at`) VALUES
(2, 1, 'Subuh', 'Fadllil Azhiimi', '2021-11-04 09:08:53', '2021-11-04 09:08:53'),
(3, 1, 'Zuhur', 'Fadllil Azhiimi', '2021-11-04 09:09:15', '2021-11-04 09:09:15'),
(5, 1, 'Ashar', 'Fadllil Azhiimi', '2021-11-17 05:49:07', '2021-11-17 05:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `id_masjid`, `judul`, `isi`, `tanggal`, `waktu`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 1, 'Test', 'isi', '2021-11-17', '13:55:00', '-', '2021-11-17 06:55:15', '2021-11-17 06:55:15'),
(6, 2, 'test', 'abc\nisi', '2021-11-25', '12:47:00', '-', '2021-11-24 05:47:26', '2021-11-24 05:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `id_masjid`, `nama`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 'Toa', 1, '-', '2021-10-19 07:41:25', '2021-11-17 07:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_imam`
--

CREATE TABLE `jadwal_imam` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_imam`
--

INSERT INTO `jadwal_imam` (`id`, `id_masjid`, `hari`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '2021-10-04 03:43:04', '2021-10-04 04:13:32'),
(3, 1, 'Selasa', '2021-11-10 15:22:05', '2021-11-10 15:22:05'),
(4, 1, 'Rabu', '2021-11-10 15:29:51', '2021-11-10 15:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `jamaah`
--

CREATE TABLE `jamaah` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jamaah`
--

INSERT INTO `jamaah` (`id`, `id_user`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 4, '081256388506', 'Panam', '2021-11-04 06:56:08', '2021-11-24 05:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `jamaah_masjid`
--

CREATE TABLE `jamaah_masjid` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jamaah_masjid`
--

INSERT INTO `jamaah_masjid` (`id`, `id_user`, `id_masjid`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2021-11-04 06:50:30', '2021-11-04 06:50:30'),
(4, 4, 2, '2021-11-25 13:46:55', '2021-11-25 13:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` enum('Kegiatan Harian','Lainnya') NOT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `id_masjid`, `nama`, `jenis`, `waktu`, `tanggal`, `created_at`, `updated_at`) VALUES
(3, 1, 'Wirid', 'Kegiatan Harian', '18:30:00', '2021-10-18', '2021-10-18 08:14:55', '2021-11-17 06:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `id_masjid`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 1, 60000, '2021-10-22 07:43:03', '2021-11-17 08:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `masjid`
--

CREATE TABLE `masjid` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Belum Diverifikasi','Diverifikasi') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masjid`
--

INSERT INTO `masjid` (`id`, `nama`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Masjid', 'Jl Soebrantas', 'Belum Diverifikasi', '2021-09-30 08:22:17', '2021-11-27 15:45:10'),
(2, 'Masjid 2', 'Panam', 'Belum Diverifikasi', '2021-11-24 05:31:30', '2021-11-24 08:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_masjid`, `nama`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 'sedekah', 50000, '-', '2021-10-22 07:43:03', '2021-10-22 07:43:03'),
(3, 1, 'sedekah', 50000, '-', '2021-10-22 07:45:09', '2021-10-22 07:45:09'),
(4, 1, 'sedekah', 50000, '-', '2021-11-15 14:48:54', '2021-11-17 07:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `id_masjid`, `nama`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Listrik', 40000, '-', '2021-10-22 07:58:59', '2021-11-17 08:15:19'),
(2, 1, 'listrik', 50000, '-', '2021-11-15 14:58:12', '2021-11-17 08:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `id_masjid`, `nama`, `jabatan`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 1, 'Dinal', 'Ketua', 'Panam', '2021-10-04 06:57:00', '2021-10-04 06:57:00'),
(6, 1, 'Fadllil', 'Wakil', 'Panam', '2021-11-06 10:24:52', '2021-11-17 05:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `profil_masjid`
--

CREATE TABLE `profil_masjid` (
  `id` bigint(20) NOT NULL,
  `id_masjid` bigint(20) NOT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `luas_tanah` varchar(25) DEFAULT NULL,
  `status_tanah` varchar(25) DEFAULT NULL,
  `luas_bangunan` varchar(11) DEFAULT NULL,
  `tahun_berdiri` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_masjid`
--

INSERT INTO `profil_masjid` (`id`, `id_masjid`, `tipe`, `luas_tanah`, `status_tanah`, `luas_bangunan`, `tahun_berdiri`, `created_at`, `updated_at`) VALUES
(1, 1, 'Masjid Negara', '100 m2', 'status', '80 m2', '2000', '2021-11-20 17:02:22', '2021-11-27 15:44:50'),
(2, 2, 'Masjid Paripurna', '80 m2', 'Pemerintah', '100 m2', '1999', '2021-11-24 08:16:58', '2021-11-27 15:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Administrator','Masjid','Jamaah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Fadllil Azhiimi', 'fadllilazhiimi841@gmail.com', '$2y$10$CiwlGzTycgmkFbhB6qugaull2TPRQc2R8RGQca2cv8.sT3A.DQCzG', 'Administrator', '2021-08-13 00:41:29', '2021-08-13 00:41:29'),
(3, 'Dinal', 'dinal@gmail.com', '$2y$10$0SV.4CFwiD/mwXY4Y6sck.JE5L70IIEvnh3ed8DrYWZQ3lbmQTRni', 'Masjid', '2021-09-30 09:47:36', '2021-09-30 09:47:36'),
(4, 'Vina Azizah', 'vinaazizah@gmail.com', '$2y$10$p4G2sax9CKf9Y0PglBJSLOeIf.qXlUOlcqrfYG0qunNE5cYG.Q1XW', 'Jamaah', '2021-11-04 06:48:43', '2021-11-04 06:48:43'),
(5, 'riski', 'riski@gmail.com', '$2y$10$lElPgFH8iEobSbkCmzjDdOoq6FXXZ75ZTtSYem4rAYp61kylYlrDu', 'Masjid', '2021-11-24 05:32:21', '2021-11-24 05:32:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_masjid`
--
ALTER TABLE `admin_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imam`
--
ALTER TABLE `imam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_imam`
--
ALTER TABLE `jadwal_imam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jamaah_masjid`
--
ALTER TABLE `jamaah_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_masjid`
--
ALTER TABLE `profil_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_masjid`
--
ALTER TABLE `admin_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `imam`
--
ALTER TABLE `imam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal_imam`
--
ALTER TABLE `jadwal_imam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jamaah_masjid`
--
ALTER TABLE `jamaah_masjid`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil_masjid`
--
ALTER TABLE `profil_masjid`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
