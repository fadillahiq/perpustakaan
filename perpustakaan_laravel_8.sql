-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 02:09 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_laravel_8`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `name`, `email`, `sex`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Madge O\'Hara V', 'hintz.trevion@example.com', 'Perempuan', '1-507-886-5587', '575 Lon Trail\nLake Orlandburgh, CA 16929-4323', '2021-07-12 05:08:04', '2021-07-12 05:08:04'),
(2, 'Susie Eichmann', 'hartmann.loyal@example.com', 'Perempuan', '305479435612', '7142 Luettgen Grove Apt. 524\nSouth Wilfordport, FL 62497', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(3, 'Chelsie Donnelly', 'powlowski.amani@example.com', 'Perempuan', '289001956690', '2867 Hintz Springs\nLake Bailee, NM 69520', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(4, 'Coleman Gottlieb', 'bret65@example.com', 'Perempuan', '239810585587', '8150 Lang Corners Suite 871\nNorth Tommie, NM 86092-8708', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(5, 'Prof. Lavon Weber III', 'shayne81@example.net', 'Perempuan', '295145801563', '61096 Bode Fork\nPort Betty, AZ 65486-4447', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(6, 'Ms. Rubie Rowe', 'pmiller@example.net', 'Laki-Laki', '287438656078', '5925 Rahsaan Summit Apt. 294\nShanymouth, CO 98814-7091', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(7, 'Reyna Hauck', 'fahey.arch@example.com', 'Laki-Laki', '295425168208', '8525 Javier Landing\nPort Leonorstad, MO 14699', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(8, 'Aurelio Smith', 'schimmel.benjamin@example.org', 'Laki-Laki', '313485423232', '26976 Alfonso Center Apt. 229\nKylerhaven, CA 00168-4514', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(9, 'Stanley Becker', 'pcole@example.com', 'Perempuan', '238084509515', '196 Gibson Cliffs Suite 236\nKshlerinville, WI 09649', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(10, 'Mr. Wilfrid Gibson', 'irma19@example.com', 'Laki-Laki', '239640321978', '345 Aubrey Ports Apt. 071\nHansenbury, LA 17398-0087', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(11, 'Callie Brown', 'chasity.gutmann@example.net', 'Laki-Laki', '246124629295', '3990 Mraz Cape\nNorth Susannaberg, SD 65708', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(12, 'Hertha Weissnat', 'evert.mcdermott@example.org', 'Laki-Laki', '330382252252', '803 Schmeler Passage Suite 464\nNew Antoninaside, SC 40671-0056', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(13, 'Dr. Autumn Ratke V', 'nicolette.kessler@example.net', 'Perempuan', '299533453838', '845 Laurence Row Suite 442\nSouth Destiny, IA 60229-6905', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(14, 'Dr. Brain Hilpert DVM', 'ahmed93@example.net', 'Laki-Laki', '311073843193', '647 Jammie Fall Suite 148\nHaagville, NJ 21361-6175', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(15, 'Kiarra Eichmann', 'beaulah.prosacco@example.com', 'Laki-Laki', '303313882999', '89575 Erling Club Suite 379\nBaileyton, AK 27486', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(16, 'Alexandro Emmerich', 'wilfred67@example.net', 'Laki-Laki', '293478774882', '82026 Jacobi Mountain\nSengerland, MS 13571-4664', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(17, 'Miss Viviane Upton', 'tremblay.telly@example.net', 'Laki-Laki', '324216418258', '2999 Hackett Run\nNorth Felipaton, PA 51141-7339', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(18, 'Deion Mante', 'andrew.fritsch@example.com', 'Laki-Laki', '259204633373', '47651 Stoltenberg Field Suite 672\nWardfurt, IA 51462', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(19, 'Lilyan Mraz', 'lauren.oreilly@example.org', 'Laki-Laki', '249705682806', '11621 Roob Pass\nWilkinsonton, MS 55091', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(20, 'Mr. Dorian Bode', 'welch.terrence@example.com', 'Perempuan', '300329838389', '63836 Mac Fall Apt. 346\nWest Melba, LA 87119-4833', '2021-07-12 05:09:32', '2021-07-12 05:09:32'),
(21, 'Miss Enola Cronin', 'renner.gia@example.net', 'Perempuan', '279407819325', '99445 Reichel Extensions Apt. 243\nNorth Maechester, MN 98090-6135', '2021-07-12 05:09:32', '2021-07-12 05:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `judul` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `id_katalog` bigint(20) UNSIGNED NOT NULL,
  `qty_stok` int(11) NOT NULL,
  `harga_pinjam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`, `created_at`, `updated_at`) VALUES
(1, 369794, 'Nella Blanda', 2019, 2, 2, 3, 17, 9622, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(2, 842818, 'Amara Shields Sr.', 2021, 3, 1, 3, 7, 5612, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(3, 909615, 'Jonatan Conn', 2021, 2, 2, 1, 11, 11203, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(4, 535252, 'Bryana Ward II', 2018, 3, 2, 2, 16, 13044, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(5, 404850, 'Cesar Quitzon', 2015, 3, 2, 3, 15, 16346, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(6, 771886, 'Ryleigh Rogahn', 2018, 1, 3, 2, 13, 6568, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(7, 745108, 'Mr. Casey Lang', 2020, 1, 2, 1, 14, 6805, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(8, 790686, 'Rowland Stamm', 2018, 1, 3, 1, 5, 18858, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(9, 273179, 'Prof. Winston Green MD', 2018, 1, 1, 3, 10, 19343, '2021-07-12 04:50:28', '2021-07-12 04:50:28'),
(10, 334973, 'Cristina Feil MD', 2020, 1, 2, 2, 17, 18520, '2021-07-12 04:50:28', '2021-07-12 04:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` bigint(20) UNSIGNED NOT NULL,
  `id_buku` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalogs`
--

CREATE TABLE `katalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalogs`
--

INSERT INTO `katalogs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Dewasa', '2021-07-12 04:50:12', '2021-07-12 04:50:12'),
(2, 'Anak - Anak', '2021-07-12 04:50:19', '2021-07-12 04:50:19'),
(3, 'Remaja', '2021-07-12 04:50:23', '2021-07-12 04:50:23');

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
(1, '2010_06_28_152901_create_anggotas_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_06_25_060932_add_last_login_to_users', 1),
(6, '2021_06_28_152902_create_penerbits_table', 1),
(7, '2021_06_28_153006_create_pengarangs_table', 1),
(8, '2021_06_28_153118_create_katalogs_table', 1),
(9, '2021_06_28_153147_create_bukus_table', 1),
(10, '2021_06_28_153211_create_peminjaman_table', 1),
(11, '2021_06_28_153212_create_detail_peminjaman_table', 1);

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbits`
--

CREATE TABLE `penerbits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penerbit` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbits`
--

INSERT INTO `penerbits` (`id`, `nama_penerbit`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Muhamad Iqbal Fadilah', 'laku0505@gmail.com', '085155477239', 'JL. Letjen Ibrahim Adjie No.75, Kecamatan Ciomas', '2021-07-12 04:48:40', '2021-07-12 04:48:40'),
(2, 'Marcella Felicia', 'marcellafelicia@gmail.com', '081289019637', 'Cicurug Bogor', '2021-07-12 04:48:53', '2021-07-12 04:48:53'),
(3, 'Wildan Ardiansyah', 'wildanard@gmail.com', '081289019637', 'Cicurug Bogor', '2021-07-12 04:49:26', '2021-07-12 04:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengarangs`
--

CREATE TABLE `pengarangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengarang` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengarangs`
--

INSERT INTO `pengarangs` (`id`, `nama_pengarang`, `email`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Muhamad Iqbal Fadilah', 'laku0505@gmail.com', '081289019637', 'JL. Letjen Ibrahim Adjie No.75, Kecamatan Ciomas', '2021-07-12 04:49:36', '2021-07-12 04:49:36'),
(2, 'Marcella Felicia', 'marcellafelicia@gmail.com', '085155477239', 'Cicurug Bogor', '2021-07-12 04:49:50', '2021-07-12 04:49:50'),
(3, 'Wildan Ardiansyah', 'wildanard@gmail.com', '081289019637', 'Cicurug Bogor', '2021-07-12 04:50:03', '2021-07-12 04:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar-1.png',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_anggota` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `phone`, `bio`, `id_anggota`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_at`) VALUES
(1, 'Muhamad Iqbal Fadilah', 'laku0505@gmail.com', NULL, 'avatar-1.png', NULL, NULL, NULL, '$2y$10$ciGWBVQZGfXq7KpfBHtdU.VRj4h7fbT4oLU0ATNfijKxFfH.fsPRu', NULL, '2021-07-12 04:48:13', '2021-07-12 04:48:13', '2021-07-12 04:48:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_id_penerbit_foreign` (`id_penerbit`),
  ADD KEY `bukus_id_pengarang_foreign` (`id_pengarang`),
  ADD KEY `bukus_id_katalog_foreign` (`id_katalog`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_peminjaman_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `detail_peminjaman_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `katalogs`
--
ALTER TABLE `katalogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `katalogs_nama_unique` (`nama`);

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
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id_anggota_foreign` (`id_anggota`);

--
-- Indexes for table `penerbits`
--
ALTER TABLE `penerbits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengarangs`
--
ALTER TABLE `pengarangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_anggota_foreign` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalogs`
--
ALTER TABLE `katalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerbits`
--
ALTER TABLE `penerbits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengarangs`
--
ALTER TABLE `pengarangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_id_katalog_foreign` FOREIGN KEY (`id_katalog`) REFERENCES `katalogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bukus_id_penerbit_foreign` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bukus_id_pengarang_foreign` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
