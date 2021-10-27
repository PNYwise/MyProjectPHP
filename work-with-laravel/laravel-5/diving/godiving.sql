-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 10:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `godiving`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `jenis`, `satuan`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(9, 'Regulator (Mouthpiece, Octopus, Console)', 'set', 100000, NULL, '2021-06-19 21:28:10', '2021-06-19 21:28:10'),
(10, 'Sabuk + Pemberat 4kg', 'set', 30000, NULL, '2021-06-19 21:28:51', '2021-06-19 21:28:51'),
(11, 'Snorkeling Gear (Fin Open Heel/Full Foot, Boot, Masker, Snorkel )', 'set', 100000, NULL, '2021-06-19 21:29:26', '2021-06-19 21:29:26'),
(12, 'SCUBA Gear (BCD, Regulator, Pemberat 6Kg)', 'unit', 150000, NULL, '2021-06-19 21:30:11', '2021-06-27 19:12:11'),
(13, 'Instruktur (wajib bagi yang belum bersertifikat)', 'orang', 150000, 'Instruktur (wajib bagi yang belum bersertifikat).png', '2021-06-19 21:30:48', '2021-06-27 20:23:03'),
(21, 'Tabung selam', 'unit', 150000, NULL, '2021-06-27 20:26:43', '2021-06-27 20:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `idx` bigint(20) UNSIGNED NOT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `lama` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`idx`, `nota`, `id`, `lama`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 'N200620210001', 4, 4, 2, 600000, '2021-06-19 20:36:02', '2021-06-19 20:36:02'),
(2, 'N200620210002', 4, 3, 1, 450000, '2021-06-19 21:01:11', '2021-06-19 21:01:11'),
(3, 'N200620210003', 4, 3, 1, 450000, '2021-06-19 21:11:02', '2021-06-19 21:11:02'),
(4, 'N200620210004', 4, 2, 1, 300000, '2021-06-19 21:11:40', '2021-06-19 21:11:40'),
(6, 'N200620210005', 6, 5, 1, 875000, '2021-06-20 00:13:16', '2021-06-20 00:13:16'),
(7, 'N200620210005', 7, 5, 1, 750000, '2021-06-20 00:13:33', '2021-06-20 00:13:33'),
(8, 'N200620210005', 9, 5, 1, 500000, '2021-06-20 00:14:53', '2021-06-20 00:14:53'),
(9, 'N200620210006', 12, 1, 1, 50000, '2021-06-20 00:48:52', '2021-06-20 00:48:52'),
(10, 'N210620210006', 7, 8, 2, 1200000, '2021-06-21 00:18:53', '2021-06-21 00:18:53'),
(11, 'N210620210006', 13, 5, 1, 750000, '2021-06-21 00:19:05', '2021-06-21 00:19:05'),
(12, 'N280620210007', 10, 7, 4, 450000, '2021-06-28 01:45:22', '2021-06-28 01:45:22');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_06_19_032600_create_barangs_table', 2),
(4, '2021_06_19_102431_create_transaksis_table', 3),
(5, '2021_06_19_165627_create_details_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `nota`, `kasir`, `tanggal`, `mulai`, `ahir`, `total`, `created_at`, `updated_at`) VALUES
(1, 'N200620210001', 'Reza', '1970-01-01', '10:40', '14:40', 600000, '2021-06-19 20:58:48', '2021-06-19 20:58:48'),
(2, 'N200620210002', 'Reza', '1970-01-01', '11:01', '14:01', 450000, '2021-06-19 21:01:14', '2021-06-19 21:01:14'),
(3, 'N200620210003', 'Reza', '1970-01-01', '11:11', '14:11', 450000, '2021-06-19 21:11:07', '2021-06-19 21:11:07'),
(4, 'N200620210004', 'Reza', '1970-01-01', '11:11', '13:11', 300000, '2021-06-19 21:12:06', '2021-06-19 21:12:06'),
(5, 'N200620210005', 'Reza', '1970-01-01', '14:17', '05:17', 2125000, '2021-06-20 00:17:38', '2021-06-20 00:17:38'),
(6, 'N210620210006', 'Reza', '2021-06-21', '14:19', '03:19', 1950000, '2021-06-21 00:19:28', '2021-06-21 00:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reza', 'reza@gmail.com', NULL, '$2y$10$Qm/1SMU93nlYNgbhW7ua2eD0l7FkzGeHpyNgRvkSKaBZkJ2Sc9DCi', NULL, '2021-06-18 20:14:19', '2021-06-18 20:14:19'),
(2, 'aldikintil', 'aldi@gmail.com', NULL, '$2y$10$APJk3/3I1Dnp0nDVfL1PzOUoukwnMT8tmBz.Oifz0n6Ghrx2BI5u.', NULL, '2021-06-21 00:22:54', '2021-06-21 00:22:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `idx` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
