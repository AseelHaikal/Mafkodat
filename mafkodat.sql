-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 06:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mafkodat`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`)),
  `photo` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `user_id`, `details`, `photo`, `status_id`, `category_id`, `type_id`, `place`, `description`, `is_active`, `date`, `created_at`, `updated_at`) VALUES
(8, 1, '{\"category\":\"\\u0647\\u0627\\u062a\\u0641\",\"color\":\"\\u0627\\u062d\\u0645\\u0631\",\"model\":\"\\u0646\\u0648\\u0643\\u064a\\u0627\"}', NULL, 1, 4, 1, 'صنعاء', 'هاتف نوكيا مع المحفظة', 1, '2021-05-21', '2021-05-20 20:36:21', '2021-05-21 14:52:12'),
(15, 1, '{\"_method\":\"PATCH\",\"name\":\"Aseel\",\"age\":\"12\",\"gender\":\"\\u0630\\u0643\\u0631\"}', 'assets/img/announcements/xvWTkWHbjRKdp5VB6EgcZHLjsTW5XGqz1kDyyZXR.png', 2, 2, 1, 'تعز', 'يعاني من امراض', 1, '2021-05-21', '2021-05-18 23:15:08', '2021-05-23 01:06:32'),
(17, 1, '{\"_method\":\"PATCH\"}', NULL, 1, 5, 2, 'تعز', 'فلوس', 0, '2021-05-21', '2021-05-19 16:58:52', '2021-05-23 16:12:16'),
(18, 1, '{\"category\":\"\\u0645\\u0644\\u0643\\u064a\\u0629 \\u0645\\u0646\\u0632\\u0644\"}', NULL, 1, 1, 1, 'صنعاء', 'ملكية منزل', 1, '2021-05-23', '2021-05-23 16:03:52', '2021-05-23 16:05:19'),
(19, 1, '{\"category\":\"\\u0645\\u0644\\u0643\\u064a\\u0629 \\u0627\\u0631\\u0636\"}', NULL, 1, 1, 2, 'الحديدة', 'ملكية ارض', 0, '2021-05-23', '2021-05-23 16:05:58', '2021-05-23 16:05:58'),
(20, 1, '{\"_method\":\"PATCH\",\"name\":\"\\u0641\\u0627\\u0637\\u0645\\u0629\",\"age\":\"8\",\"gender\":\"\\u0627\\u0646\\u062b\\u0649\"}', 'assets/img/announcements/CkytBMCrOvoiAOhip5Fv0VS8M03fgMmC3eOZl2Ng.png', 1, 2, 2, 'ذمار', 'وصف', 1, '2021-05-23', '2021-05-23 16:07:57', '2021-05-23 18:06:33'),
(21, 1, '{\"category\":\"\\u062d\\u0642\\u064a\\u0628\\u0629 \\u064a\\u062f\",\"color\":\"\\u0627\\u062d\\u0645\\u0631\",\"shape\":\"\\u0635\\u063a\\u064a\\u0631\"}', NULL, 1, 3, 2, 'المكلا', 'حقيبة يد صغيرة وبداخلها فلوس', 0, '2021-05-23', '2021-05-23 16:09:27', '2021-05-23 16:09:27'),
(22, 1, '{\"category\":\"\\u062d\\u0642\\u064a\\u0628\\u0629 \\u0645\\u062f\\u0631\\u0633\\u064a\\u0629\",\"color\":\"\\u0627\\u0633\\u0648\\u062f\",\"shape\":\"\\u0643\\u0628\\u064a\\u0631\"}', NULL, 1, 3, 1, 'الحديدة', 'حقيبة مدرسية', 0, '2021-05-23', '2021-05-23 16:10:27', '2021-05-23 16:10:27'),
(23, 1, '{\"category\":\"\\u0644\\u0627\\u0628\\u062a\\u0648\\u0628\",\"color\":\"\\u0641\\u0636\\u064a\",\"model\":\"Dell\"}', NULL, 1, 4, 2, 'اب', 'لابتوب dell', 0, '2021-05-23', '2021-05-23 16:11:41', '2021-05-23 16:11:41'),
(24, 1, '[]', NULL, 1, 5, 1, 'الضالع', 'صندوق', 0, '2021-05-23', '2021-05-23 16:12:56', '2021-05-23 16:12:56'),
(25, 1, '[]', NULL, 1, 5, 1, 'الحديدة', 'wqe', 0, '2021-05-24', '2021-05-23 18:44:18', '2021-05-23 18:44:18'),
(27, 1, '{\"model\":\"dd\",\"color\":\"red\",\"category\":\"dd\"}', NULL, 1, 4, 2, 'تعز', 'sss', 0, '2021-05-24', '2021-05-23 22:02:57', '2021-05-23 22:02:57'),
(28, 1, '{\"_method\":\"PATCH\",\"category\":\"dd\",\"color\":\"red\",\"model\":\"dd\"}', 'assets/img/announcements/wXEqxwD4cHoEdFhfOVk1LCC15id8brr1d6WVdu3V.png', 1, 4, 2, 'عدن', 'sss', 0, '2021-05-24', '2021-05-23 22:09:36', '2021-05-24 00:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `announcements_categories`
--

CREATE TABLE `announcements_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements_categories`
--

INSERT INTO `announcements_categories` (`id`, `name`) VALUES
(1, 'documents'),
(2, 'childrens'),
(3, 'bags'),
(4, 'electronics'),
(5, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `announcements_types`
--

CREATE TABLE `announcements_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements_types`
--

INSERT INTO `announcements_types` (`id`, `name`) VALUES
(1, 'lost'),
(2, 'found'),
(3, 'request');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_status`
--

CREATE TABLE `announcement_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement_status`
--

INSERT INTO `announcement_status` (`id`, `name`) VALUES
(1, 'searching'),
(2, 'deliverd');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `is_active`, `user_id`, `announcement_id`, `created_at`, `updated_at`) VALUES
(3, 'i found him', 1, 1, 15, '2021-05-22 16:08:53', '2021-05-23 18:07:47'),
(4, 'i found him', 1, 1, 15, '2021-05-22 17:00:01', '2021-05-22 21:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `compliants`
--

CREATE TABLE `compliants` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_11_01_223704_create_sessions_table', 1),
(7, '2021_05_15_153546_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('saleem@gmail.com', '$2y$10$1T/r8SySd3kQoK6EMC0LrOBS8IbcrPEuPLeW1tAOxAFfvjihp.BZ6', '2021-05-11 20:37:27'),
('superAdmin@gmail.com', '$2y$10$L0F1q5VrqpKpmI4hFgCfsuZeQzmeOtHWN72eL.Ap5w1cFUDcsmQ6q', '2021-05-23 10:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'role-create', 'web', NULL, NULL),
(3, 'role-edit', 'web', NULL, NULL),
(4, 'role-list', 'web', NULL, NULL),
(5, 'role-delete', 'web', NULL, NULL),
(6, 'user-list', 'web', NULL, NULL),
(7, 'user-create', 'web', NULL, NULL),
(8, 'user-edit', 'web', NULL, NULL),
(9, 'user-delete', 'web', NULL, NULL),
(10, 'announcement-list', 'web', NULL, NULL),
(11, 'announcement-create', 'web', NULL, NULL),
(12, 'announcement-edit', 'web', NULL, NULL),
(13, 'announcement-delete', 'web', NULL, NULL),
(14, 'compliant-list', 'web', NULL, NULL),
(15, 'compliant-create', 'web', NULL, NULL),
(16, 'compliant-edit', 'web', NULL, NULL),
(17, 'compliant-delete', 'web', NULL, NULL),
(18, 'comment-list', 'web', NULL, NULL),
(19, 'comment-create', 'web', NULL, NULL),
(20, 'comment-edit', 'web', NULL, NULL),
(21, 'comment-delete', 'web', NULL, NULL),
(22, 'create', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', NULL, NULL),
(3, 'Admin', 'web', '2021-05-17 22:08:36', '2021-05-17 22:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gAkKUJzKKB1p93stBs5AdyxNRcdAvZSFtUfuw6RJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXR0aW5ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJhOTRUajNGVWc4VzdZa3FjRzZTbFkwaFhNWFo5cUR5UDRxd3E0Q2xrIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL2t3SGh6bkl2SHVIREprMWl5UUlBT2FCbmZWbWN1aW9SVzZzeE1mOEFSaE12UW9NUkl2dHkiO30=', 1621827313),
('R3piCvrcgloxShqfWgpbLmWdhl1gGSidujDQ178k', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia1VKcVViOUdQcWJZQ1ZKNnV6T2R1YWlWeHdhbTByR1ZTUzBmSEFSYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYW5ub3VuY2VtZW50L2V4cGlyZWQvNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkL2t3SGh6bkl2SHVIREprMWl5UUlBT2FCbmZWbWN1aW9SVzZzeE1mOEFSaE12UW9NUkl2dHkiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1621831425);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `website_logo` varchar(255) NOT NULL,
  `website_favicon` varchar(255) NOT NULL,
  `announcement_expire_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_logo`, `website_favicon`, `announcement_expire_period`) VALUES
(1, 'Mafkodat', 'assets/img/settings/s8pIc0i99D2QqEjNhPsmHjOwHdNUK2onrVdPmJJF.png', 'assets/img/settings/gRI72GNOlC2MUV5YTYXPCWVvbmvbJpTswSPvFR4q.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(14) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `country`, `city`, `email_verified_at`, `password`, `is_active`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 77333737, 'superAdmin@gmail.com', 'Yemen', 'Sanaa', NULL, '$2y$10$/kwHhznIvHuHDJk1iyQIAOaBnfVmcuioRW6sxMf8ARhMvQoMRIvty', 1, NULL, NULL, NULL, NULL, 'assets/img/users/l2ZP9QdNFaQntlthS6ksTIZUHLwpDzln882wefrF.png', '2021-05-11 20:07:04', '2021-05-23 11:12:15'),
(5, 'Maher', 777666555, 'Maher@gmail.com', 'Yemen', 'Taiz', NULL, '$2y$10$J8t4tqgh3Bv5F/zMaGxUoO0xObdTVVwVPWOB2royxvAxK90xU.CCK', 1, NULL, NULL, NULL, NULL, NULL, '2021-05-17 20:15:00', '2021-05-23 15:55:27'),
(8, 'aseel', 77777777, 'aseel2@email.com', NULL, NULL, NULL, '$2y$10$KX86Ajz9K9IVV5JipoVTouQ3l8Pqs.ES5KmrMXpfO6CelxUrH4Vee', 1, NULL, NULL, NULL, NULL, NULL, '2021-05-21 11:31:32', '2021-05-23 15:49:35'),
(9, 'saeed', 733333333, 'saeed@gmail.com', 'yemen', 'sanaa', NULL, '$2y$10$/kwHhznIvHuHDJk1iyQIAOaBnfVmcuioRW6sxMf8ARhMvQoMRIvty', 0, NULL, NULL, NULL, NULL, NULL, '2021-05-21 11:43:53', '2021-05-22 23:10:30'),
(10, 'noor', 773773773, 'noora@gmail.com', NULL, NULL, NULL, '$2y$10$/kwHhznIvHuHDJk1iyQIAOaBnfVmcuioRW6sxMf8ARhMvQoMRIvty', 1, NULL, NULL, NULL, NULL, NULL, '2021-05-23 23:47:16', '2021-05-23 23:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories foriegn id` (`category_id`),
  ADD KEY `status foriegn id` (`status_id`),
  ADD KEY `type` (`type_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `announcements_categories`
--
ALTER TABLE `announcements_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements_types`
--
ALTER TABLE `announcements_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_status`
--
ALTER TABLE `announcement_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement` (`announcement_id`);

--
-- Indexes for table `compliants`
--
ALTER TABLE `compliants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `announcements_categories`
--
ALTER TABLE `announcements_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announcements_types`
--
ALTER TABLE `announcements_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcement_status`
--
ALTER TABLE `announcement_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `compliants`
--
ALTER TABLE `compliants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `categories foriegn id` FOREIGN KEY (`category_id`) REFERENCES `announcements_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `status foriegn id` FOREIGN KEY (`status_id`) REFERENCES `announcement_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `announcements_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `announcement` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
