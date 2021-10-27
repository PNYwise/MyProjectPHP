-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 07:48 AM
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
-- Database: `mylaravel`
--

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
(3, '2021_03_17_114303_create_products_table', 2),
(4, '2021_03_18_065900_create_products_table', 3),
(5, '2021_03_20_161532_create_transactions_table', 4),
(6, '2021_03_20_164534_create_transactions_table', 5),
(7, '2021_03_21_045320_create_transactions_table', 6),
(8, '2021_03_27_040721_create_details_table', 7),
(9, '2021_03_27_042107_create_details_table', 8);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nm_product`, `type`, `jumlah`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'PS3', 'P0013', 10, 2500, '', '2021-03-18 07:03:09', '2021-03-20 01:19:33'),
(2, 'PS5', 'P0025', 8, 10000, NULL, '2021-03-18 10:45:57', '2021-03-20 08:11:09'),
(8, 'PS4', 'P0034', 10, 5000, NULL, '2021-03-22 23:27:13', '2021-03-22 23:27:28'),
(12, 'PS2', 'P0042', 5, 4000, NULL, '2021-04-15 20:57:34', '2021-04-15 20:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `ahir` time NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `nota`, `kasir`, `tanggal`, `mulai`, `ahir`, `total`, `created_at`, `updated_at`) VALUES
(3, 'N140420210001', 'lazarus', '2021-04-14', '10:34:00', '14:34:00', 20000, '2021-04-13 20:34:56', '2021-04-13 20:34:56'),
(4, 'N14042021$04s', 'lazarus', '2021-04-14', '11:31:00', '15:31:00', 20000, '2021-04-13 21:31:58', '2021-04-13 21:31:58'),
(5, 'N140420210005', 'lazarus', '2021-04-14', '11:48:00', '19:48:00', 20000, '2021-04-13 21:49:33', '2021-04-13 21:49:33'),
(6, 'N140420210006', 'bunayya', '2021-04-14', '13:58:00', '16:58:00', 15000, '2021-04-13 23:58:50', '2021-04-13 23:58:50'),
(7, 'N140420210007', 'bunayya', '2021-04-14', '14:59:00', '16:59:00', 20000, '2021-04-14 00:59:42', '2021-04-14 00:59:42'),
(8, 'N140420210008', 'bunayya', '2021-04-14', '15:03:00', '17:03:00', 20000, '2021-04-14 01:03:07', '2021-04-14 01:03:07'),
(9, 'N140420210009', 'bunayya', '2021-04-14', '15:04:00', '19:04:00', 40000, '2021-04-14 01:04:51', '2021-04-14 01:04:51'),
(10, 'N140420210010', 'bunayya', '2021-04-14', '15:06:00', '16:06:00', 10000, '2021-04-14 01:06:42', '2021-04-14 01:06:42'),
(11, 'N140420210011', 'bunayya', '2021-04-14', '15:07:00', '20:07:00', 50000, '2021-04-14 01:07:39', '2021-04-14 01:07:39'),
(12, 'N150420210012', 'bunayya', '2021-04-15', '10:46:00', '11:46:00', 10000, '2021-04-14 20:46:06', '2021-04-14 20:46:06'),
(13, 'N150420210013', 'bunayya', '2021-04-15', '10:47:00', '12:47:00', 10000, '2021-04-14 20:48:04', '2021-04-14 20:48:04'),
(14, 'N150420210014', 'lazarus', '2021-04-15', '10:58:00', '11:58:00', 5000, '2021-04-14 20:58:33', '2021-04-14 20:58:33'),
(15, 'N150420210015', 'lazarus', '2021-04-15', '11:28:00', '13:28:00', 10000, '2021-04-14 21:28:33', '2021-04-14 21:28:33'),
(16, 'N150420210016', 'lazarus', '2021-04-15', '15:56:00', '20:56:00', 25000, '2021-04-15 01:56:58', '2021-04-15 01:56:58'),
(17, 'N150420210017', 'lazarus', '2021-04-15', '15:59:00', '17:59:00', 10000, '2021-04-15 01:59:09', '2021-04-15 01:59:09'),
(18, 'N150420210018', 'lazarus', '2021-04-15', '16:01:00', '17:01:00', 5000, '2021-04-15 02:01:45', '2021-04-15 02:01:45'),
(19, 'N150420210019', 'lazarus', '2021-04-15', '16:02:00', '17:02:00', 5000, '2021-04-15 02:02:44', '2021-04-15 02:02:44'),
(20, 'N150420210020', 'lazarus', '2021-04-15', '16:04:00', '17:04:00', 10000, '2021-04-15 02:04:42', '2021-04-15 02:04:42'),
(21, 'N150420210021', 'lazarus', '2021-04-15', '17:36:00', '21:36:00', 35000, '2021-04-15 03:36:28', '2021-04-15 03:36:28'),
(22, 'N150420210022', 'lazarus', '2021-04-15', '17:37:00', '04:37:00', 90000, '2021-04-15 03:37:34', '2021-04-15 03:37:34'),
(23, 'N160420210023', 'lazarus', '2021-04-16', '04:22:00', '05:22:00', 5000, '2021-04-15 14:22:18', '2021-04-15 14:22:18'),
(24, 'N160420210024', 'lazarus', '2021-04-16', '04:56:00', '08:56:00', 35000, '2021-04-15 14:56:53', '2021-04-15 14:56:53'),
(25, 'N160420210025', 'bunayya', '2021-04-16', '09:24:00', '11:24:00', 8000, '2021-04-15 19:24:53', '2021-04-15 19:24:53'),
(26, 'N160420210026', 'lazarus', '2021-04-16', '10:58:00', '15:58:00', 20000, '2021-04-15 20:58:49', '2021-04-15 20:58:49'),
(27, 'N160420210027', 'lazarus', '2021-04-16', '11:00:00', '14:00:00', 15000, '2021-04-15 21:00:04', '2021-04-15 21:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelfon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `namalengkap`, `about`, `alamat`, `email`, `notelfon`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bunayya', NULL, NULL, NULL, 'bunayya12345@gmail.com', NULL, NULL, NULL, '$2y$10$yy0MYdepNfKDK24x9zYGJuVw2ECMKw3JG0aF/Upyzw1PjOfeRvqoK', 'WwjjMbMK1Pto8QPysEiSxBENM75zNV1gBPtBPtXuiHXGuQCdiABJmlLA7F0O', '2021-03-15 04:53:50', '2021-03-15 04:53:50'),
(2, 'lazarus', 'Lazarus Wahyu Ahmed Anggoro', 'Im straight ', 'Jl. Raya Utara no 89 Sutojayan Blitar', 'lasarus12345@gmail.com', '089111111111', NULL, NULL, '$2y$10$mTFG2lChkMCfUlRMCNpwN.qX9o8ozTgyFBuY17FdjQK.Vc6aMuZA.', 'ILIQanXJOvSnyQ1Sd2eAkanIBMhbnGGlyDeoeUUlFtb8swZToEJrN9SbEo0J', '2021-03-16 03:21:31', '2021-03-16 03:21:31'),
(3, 'Reza', NULL, NULL, 'anjing banget1', 'reza123@gmail.com', NULL, NULL, NULL, '$2y$10$gsC3.sKdNvTFhmBJp.FKt.rJ6syg61HRUdnEPmbYJ1DeyFOU5hblG', NULL, '2021-03-19 02:54:05', '2021-03-19 02:54:05'),
(4, 'Stefanny andrea seva yunisa', NULL, NULL, NULL, 'andrea@gmail.com', NULL, NULL, NULL, '$2y$10$AAdSaIZU1544PDcXwyknKOkxJLZ6/fBFWU4ze3tUd5G99idO00LjO', NULL, '2021-03-19 03:07:52', '2021-03-19 03:07:52');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
