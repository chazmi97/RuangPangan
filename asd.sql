-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for aduh
CREATE DATABASE IF NOT EXISTS `aduh` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `aduh`;

-- Dumping structure for table aduh.friendships
CREATE TABLE IF NOT EXISTS `friendships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requester` int(11) DEFAULT NULL,
  `user_requested` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table aduh.friendships: ~16 rows (approximately)
/*!40000 ALTER TABLE `friendships` DISABLE KEYS */;
INSERT INTO `friendships` (`id`, `requester`, `user_requested`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 5, 1, '2018-05-09 07:49:09', '2018-05-09 07:49:09'),
	(2, 5, 2, 1, '2018-05-09 07:49:58', '2018-05-09 07:49:58'),
	(3, 2, 7, 1, '2018-05-09 08:04:39', '2018-05-09 08:04:39'),
	(4, 10, 9, 1, '2018-05-09 08:17:14', '2018-05-09 08:17:14'),
	(5, 10, 8, NULL, '2018-05-09 08:17:18', '2018-05-09 08:17:18'),
	(6, 5, 7, 1, '2018-05-10 02:14:01', '2018-05-10 02:14:01'),
	(8, 3, 1, 1, '2018-05-10 03:20:34', '2018-05-10 03:20:34'),
	(9, 6, 3, 1, '2018-05-10 11:25:54', '2018-05-10 11:25:54'),
	(10, 3, 4, NULL, '2018-05-10 11:41:50', '2018-05-10 11:41:50'),
	(11, 3, 5, NULL, '2018-05-10 11:41:52', '2018-05-10 11:41:52'),
	(12, 3, 6, 1, '2018-05-10 11:41:53', '2018-05-10 11:41:53'),
	(13, 1, 3, 1, '2018-05-10 11:42:29', '2018-05-10 11:42:29'),
	(14, 1, 4, NULL, '2018-05-10 11:42:31', '2018-05-10 11:42:31'),
	(15, 1, 6, 1, '2018-05-10 11:42:33', '2018-05-10 11:42:33'),
	(16, 6, 1, NULL, '2018-05-10 12:37:54', '2018-05-10 12:37:54'),
	(17, 6, 4, NULL, '2018-05-10 12:37:55', '2018-05-10 12:37:55');
/*!40000 ALTER TABLE `friendships` ENABLE KEYS */;

-- Dumping structure for table aduh.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aduh.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(18, '2014_10_12_000000_create_users_table', 1),
	(19, '2014_10_12_100000_create_password_resets_table', 1),
	(20, '2018_04_25_002600_create_profile_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table aduh.notifcations
CREATE TABLE IF NOT EXISTS `notifcations` (
  `id` int(11) DEFAULT NULL,
  `user_logged` int(11) DEFAULT NULL,
  `user_hero` int(11) DEFAULT NULL,
  `status` binary(50) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table aduh.notifcations: ~2 rows (approximately)
/*!40000 ALTER TABLE `notifcations` DISABLE KEYS */;
INSERT INTO `notifcations` (`id`, `user_logged`, `user_hero`, `status`, `note`, `created_at`, `updated_at`) VALUES
	(1, 6, 3, '1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', NULL, '2018-05-10 12:23:27', '2018-05-10 12:23:27'),
	(NULL, 3, 1, '1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'Terima permintaanTeman', '2018-05-10 17:39:43', '2018-05-10 17:39:43');
/*!40000 ALTER TABLE `notifcations` ENABLE KEYS */;

-- Dumping structure for table aduh.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aduh.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table aduh.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aduh.profiles: ~5 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `user_id`, `city`, `country`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'bogor', 'jaw-barat', 'ini tentang saya.', NULL, NULL, NULL),
	(3, 3, 'Tanggerang', 'Banten', 'Assalamualaikum', NULL, NULL, NULL),
	(4, 4, NULL, NULL, NULL, NULL, '2018-05-10 03:37:29', '2018-05-10 03:37:29'),
	(5, 5, NULL, NULL, NULL, NULL, '2018-05-10 11:24:55', '2018-05-10 11:24:55'),
	(6, 6, NULL, NULL, NULL, NULL, '2018-05-10 11:25:37', '2018-05-10 11:25:37');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- Dumping structure for table aduh.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table aduh.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `gender`, `slug`, `pic`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'demo', 'Laki-Laki', 'demo', 'a.jpg', 'demo@gmail.com', '$2y$10$c.Qrl6/F1DYvDTOZBIASbeaSP4GxKPI3nQd6nWO.y/Qel8ohhjqpW', 'NLo7zQVC9hOxqZ2SVZqc4lfYsf7n6OtS2aRtxY3GarattOOfwXvsIH9dvj4x', '2018-05-10 03:11:41', '2018-05-10 03:11:41'),
	(2, 'putra', 'Laki-Laki', 'putra', 'a.jpg', 'putra@gmail.com', '$2y$10$bUDztzqhruVfr301DJYsKOwk8L.uomZaBqLK2KP3scuux5Wt0LT9O', NULL, '2018-05-10 03:11:57', '2018-05-10 03:11:57'),
	(3, 'Faiz Muchazmi', 'Laki-Laki', 'faiz-muchazmi', 'Gambar-Kartun-Boboi-Boy-Untuk-Diwarnai.jpg', 'faizmuchazmi@gmail.com', '$2y$10$bVDXxvB5y3zMXFsywvK64OxrT7865qFAYGelm90UmaCdQJHQhhvhK', 'o3brDgeMr7whFaUIkYVEcBYU4sVzKv7GT9gYQZY576dY4Oft0LvSj3I0km2r', '2018-05-10 03:18:05', '2018-05-10 03:18:05'),
	(4, 'Faizah  kuncoromurti', 'Laki-Laki', 'faizah-kuncoromurti', 'a.jpg', 'faizahkuncoro@gmail.com', '$2y$10$YL4Ayl/Cf2Bs6h.f8uhTH.Ipp4Rp29PYQ/UwBBysvJqTaQHo7TvBi', NULL, '2018-05-10 03:37:29', '2018-05-10 03:37:29'),
	(6, 'Faishal Hanin', 'Laki-Laki', 'faishal-hanin', 'a.jpg', 'hanin@gmail.com', '$2y$10$X98rP7dALGrhD2iT0..tVunBDdsjEgWJMMhGAa00a.D0FS1dDjKxe', 'xQxpRnpkzPN5WTgc8Qb5krxyC0vB975BEbKpPkLkdYaPhCqWd3EBRWC6nxpe', '2018-05-10 11:25:37', '2018-05-10 11:25:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
