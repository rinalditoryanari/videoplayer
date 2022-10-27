-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for videoplayer
CREATE DATABASE IF NOT EXISTS `videoplayer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `videoplayer`;

-- Dumping structure for table videoplayer.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videoplayer.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table videoplayer.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videoplayer.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_10_23_120403_create_videos_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table videoplayer.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videoplayer.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table videoplayer.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videoplayer.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table videoplayer.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `def_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videoplayer.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `def_password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(5, 'BajajTron', 'User', 'Admin1@pepes.com', '2022-10-23 00:46:35', '$2y$10$273iJ9VGQsX7cy8lbaNNT.kAwEWRJuHymNUs1H2szm5oDW.VExOou', '12345678', NULL, NULL, NULL),
	(7, 'Admin', 'Admin', 'admin@pnj.ac.id', '2022-10-23 03:37:23', '$2y$10$xY90ETE/gExQruhlU.FQheI4VWybj3ZkxTASXXGJBjgfi/Wrz9cDm', '12345678', NULL, NULL, NULL),
	(10, 'Bukan BajajTron', 'User', 'pguidenrr@forbes.com', '2022-10-23 03:37:23', '$2y$10$8T/N74wYT0M59SJRJBHDyu0epGwrdKEt8rbHQHgn0jmZfZYAQ1Cmu', '12345678', NULL, '2022-10-23 04:48:53', '2022-10-23 04:54:09'),
	(11, 'Admin 2', 'Admin', 'admin2@admin.com', '2022-10-23 04:55:13', '$2y$10$w3X43mgXggPMBE1PzDa7C.BweO6y7G.hAUGH.uIh/EXg93Y5xcobC', 'admin', NULL, NULL, NULL),
	(12, 'Admin dito', 'Admin', 'admin@admin.com', '2022-10-23 07:08:54', '$2y$10$m2SEeoGkr0eU4gvl2.8HvewZV9GkV9MH8YQizyOymeMqdBuNN66Hy', '12345678', NULL, NULL, '2022-10-25 08:31:41'),
	(13, 'Rinaldito Ahmad Ryanari', 'User', 'admin@admin.coms', '2022-10-24 05:54:39', '$2y$10$g7u6ghXm62lFxfI1lNftdefhkZ6s6AD/0/DXoJg448LzFm58RXRf6', '12345678', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table videoplayer.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table videoplayer.videos: ~3 rows (approximately)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT IGNORE INTO `videos` (`id`, `title`, `description`, `category`, `link_video`, `link_thumbnail`, `created_at`, `updated_at`) VALUES
	(2, 'Jihyo Fancam', '<p>Twice</p>', 'News', 'videos/V37HGSdL0n97JLhJVDnPBNQqQ85A8C15wMgrIvZpUEHhU0gS1aYykzsXTQOMTyMWNjrxYGpWJyeBctXdytYsAOC3ICbKjGaKWtUk.mp4', 'images/V37HGSdL0n97JLhJVDnPBNQqQ85A8C15wMgrIvZpUEHhU0gS1aYykzsXTQOMTyMWNjrxYGpWJyeBctXdytYsAOC3ICbKjGaKWtUk.png', '2022-10-23 14:14:36', '2022-10-26 02:08:30'),
	(3, 'Karina', '<p>asdasdasd</p>', 'Political', 'videos/zZxNiqxVVPdnWAy5vZoPijfLgHO8IbXQm5anPWBBMTxQv3TSFeLyCJDM1C8yp08qfwsTtTXqZoEzXfVKeBpRGbsKF6qvmkze5BJ8.mp4', 'images/zZxNiqxVVPdnWAy5vZoPijfLgHO8IbXQm5anPWBBMTxQv3TSFeLyCJDM1C8yp08qfwsTtTXqZoEzXfVKeBpRGbsKF6qvmkze5BJ8.png', '2022-10-26 03:38:33', '2022-10-26 03:38:33'),
	(4, 'fvgbhjnmk', '<p>ghbjnkml,</p>', 'Tech', 'videos/2EM5MgPVOtIeWvpR4hMmZ7tBrURYf3cNnAntbaE2i267KoLNjYGIKIHCXs5t6unLuGUebFd1AoJc4F3D8H9relySv4hiMpfWvRa1.mp4', 'images/2EM5MgPVOtIeWvpR4hMmZ7tBrURYf3cNnAntbaE2i267KoLNjYGIKIHCXs5t6unLuGUebFd1AoJc4F3D8H9relySv4hiMpfWvRa1.png', '2022-10-26 04:05:40', '2022-10-26 04:05:40');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
