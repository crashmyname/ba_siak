-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2024 at 06:44 AM
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
-- Database: `siak_fuji`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailproduct`
--

CREATE TABLE `detailproduct` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `suratmasuk_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailproduct`
--

INSERT INTO `detailproduct` (`detail_id`, `suratmasuk_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-07-30 01:26:43', '2024-07-30 01:26:43'),
(2, 2, 1, '2024-07-30 01:28:40', '2024-07-30 01:28:40'),
(3, 2, 1, '2024-07-30 01:29:00', '2024-07-30 01:29:00'),
(4, 2, 1, '2024-07-30 01:29:10', '2024-07-30 01:29:10'),
(5, 2, 1, '2024-07-30 01:29:18', '2024-07-30 01:29:18'),
(6, 3, 1, '2024-08-03 01:26:43', '2024-08-03 01:26:43'),
(7, 3, 2, '2024-08-03 01:39:25', '2024-08-03 01:39:25'),
(8, 3, 2, '2024-08-03 01:41:53', '2024-08-03 01:41:53'),
(9, 6, 2, '2024-08-03 02:23:07', '2024-08-03 02:23:07'),
(10, 6, 1, '2024-08-03 02:23:12', '2024-08-03 02:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lampiransuratkeluar`
--

CREATE TABLE `lampiransuratkeluar` (
  `lampiran_id` bigint UNSIGNED NOT NULL,
  `suratkeluar_id` bigint NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2024_07_10_133123_create_product_table', 1),
(26, '2024_07_10_133245_create_suratjalan_table', 1),
(27, '2024_07_10_133258_create_suratkeluar_table', 1),
(28, '2024_07_10_133310_create_lampiransuratkeluar_table', 1),
(29, '2024_07_10_134705_add_profile_to_users_table', 1),
(30, '2024_07_11_133750_create_suratmasuk_table', 1),
(31, '2024_07_12_134640_change_tgl_terima_column_type_in_suratkeluar_table', 2),
(32, '2024_07_12_134703_change_tgl_terima_column_type_in_suratmasuk_table', 2),
(33, '2024_07_14_034736_add_berkas_to_suratmasuk_table', 3),
(34, '2024_07_14_034742_add_berkas_to_suratkeluar_table', 3),
(35, '2024_07_14_062036_add_quantity_to_suratmasuk_table', 4),
(36, '2024_07_30_073221_create_detailproduct_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` bigint UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` bigint NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `nama_supplier`, `kode_product`, `nama_product`, `jumlah`, `satuan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'PT HMI', 'HM01', 'MK00/KO1', 10, 'Unit', 'From HMI', '2024-07-11 08:55:01', '2024-07-11 08:55:01'),
(2, 'PT ABC', 'ABC01', 'ABC', 1, '1000', 'ok', '2024-08-03 01:39:09', '2024-08-03 01:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `suratjalan`
--

CREATE TABLE `suratjalan` (
  `suratjalan_id` bigint UNSIGNED NOT NULL,
  `no_suratjalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` datetime NOT NULL,
  `tgl_pembuatan` datetime NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `suratkeluar_id` bigint UNSIGNED NOT NULL,
  `no_suratkeluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`suratkeluar_id`, `no_suratkeluar`, `tgl_terima`, `tgl_pembuatan`, `no_po`, `no_invoice`, `no_faktur`, `nominal`, `keterangan`, `created_at`, `updated_at`, `berkas`) VALUES
(2, 'k124', '2024-07-14', '2024-07-14', 'kjhkhkjj7777', 'kjhkjk88899', '875858644525436', 8000, 'data ok', '2024-07-13 20:44:30', '2024-07-13 20:44:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `suratmasuk_id` bigint UNSIGNED NOT NULL,
  `no_suratmasuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`suratmasuk_id`, `no_suratmasuk`, `tgl_terima`, `tgl_pembuatan`, `no_po`, `no_invoice`, `no_faktur`, `ppn`, `keterangan`, `created_at`, `updated_at`, `berkas`, `total`) VALUES
(3, 'K129', '2024-08-03', '2024-08-03', 'K890', 'koadsiq', '12309130', '5%', 'ok', '2024-08-02 23:45:06', '2024-08-02 23:45:06', NULL, 1000),
(4, 'K128', '2024-01-01', '2024-01-01', 'kasdk', 'kdaaa', '01923019', 'asdk', 'ok', '2024-08-02 23:51:32', '2024-08-02 23:51:32', NULL, 9090),
(5, 'K1290', '2020-01-01', '2023-01-01', 'kaodak9', 'akodko99', '01923190', '5%', 'ok', '2024-08-02 23:53:33', '2024-08-03 00:00:36', 'SPK_ISS (1).pdf', 10000),
(6, 'K1296', '2024-01-01', '2024-01-01', 'KO090', 'K9090', '127.0.0.1:8000', '8%', 'barang masuk', '2024-08-03 01:59:03', '2024-08-03 01:59:03', 'SPK_ISS (1).pdf', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `profile`) VALUES
(1, 'FADLI AZKA PRAYOGI', 'user', NULL, '$2y$12$GrF6sv4RK6vLEIw1wRvNl.7DpBKa6gRprMkem3/TcmCplLe14BeFq', 'Administrator', NULL, '2024-07-12 07:34:09', '2024-07-13 09:36:51', 'Picture1.png'),
(2, 'admin', 'admin', NULL, '$2y$12$6MmV6QryvcgQvfKWFCnjmeEm/1NpiTHNvaJWaikuaoYn1GGj/s1o2', 'Administrator', NULL, '2024-07-13 09:39:24', '2024-07-13 23:47:03', 'default_profil.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailproduct`
--
ALTER TABLE `detailproduct`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lampiransuratkeluar`
--
ALTER TABLE `lampiransuratkeluar`
  ADD PRIMARY KEY (`lampiran_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `suratjalan`
--
ALTER TABLE `suratjalan`
  ADD PRIMARY KEY (`suratjalan_id`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`suratkeluar_id`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`suratmasuk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailproduct`
--
ALTER TABLE `detailproduct`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lampiransuratkeluar`
--
ALTER TABLE `lampiransuratkeluar`
  MODIFY `lampiran_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratjalan`
--
ALTER TABLE `suratjalan`
  MODIFY `suratjalan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `suratkeluar_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `suratmasuk_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
