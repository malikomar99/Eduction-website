-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 12:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smle_guide_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_email` varchar(255) DEFAULT NULL,
  `business_phone` varchar(255) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `business_logo` varchar(255) DEFAULT NULL,
  `payment_currency` varchar(255) DEFAULT NULL,
  `primary_color` varchar(255) DEFAULT NULL,
  `secondary_color` varchar(255) DEFAULT NULL,
  `facebook_login` tinyint(1) NOT NULL DEFAULT 0,
  `google_login` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_mode` varchar(255) NOT NULL DEFAULT '0',
  `maintenance_message` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_analytics_id` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `version_android` varchar(255) DEFAULT NULL,
  `version_ios` varchar(255) DEFAULT NULL,
  `ios_url` varchar(255) DEFAULT NULL,
  `android_url` varchar(255) DEFAULT NULL,
  `force_update` varchar(255) DEFAULT NULL,
  `update_in_seven_days` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `business_name`, `business_email`, `business_phone`, `business_address`, `business_logo`, `payment_currency`, `primary_color`, `secondary_color`, `facebook_login`, `google_login`, `maintenance_mode`, `maintenance_message`, `facebook_link`, `twitter_link`, `google_analytics_id`, `copyright_text`, `version_android`, `version_ios`, `ios_url`, `android_url`, `force_update`, `update_in_seven_days`, `created_at`, `updated_at`) VALUES
(1, 'SmleGuide', 'business@gmail.com', '1234567890', 'zain clouds', 'images/business_setting/202506191009logo-dark.png', 'PKR', '#412a2a', '#b18b8b', 0, 0, '0', 'Message', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.analytics.com/', 'copy right tet', '1.1', '1.2', 'https://www.iosurl.com/', 'https://www.androidurl.com/', '0', '0', '2025-06-19 09:48:43', '2025-06-19 05:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `priority` varchar(255) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `priority`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'First Category', 'active', '0', NULL, '2025-06-18 00:43:08', '2025-06-18 01:36:56'),
(2, 'second category', 'active', '2', NULL, '2025-06-18 00:43:30', '2025-06-18 06:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `validity_days` int(11) NOT NULL DEFAULT 180,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `priority` varchar(255) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `title`, `description`, `price`, `validity_days`, `status`, `priority`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'English', 'Description of the course', 999.50, 180, 'active', '0', NULL, '2025-06-18 00:44:04', '2025-06-18 00:44:04'),
(2, 2, 'Physics', 'Desc', 887.09, 180, 'active', '0', NULL, '2025-06-18 00:44:37', '2025-06-18 00:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_files`
--

CREATE TABLE `course_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `file_type` enum('pdf','doc','txt','inline_text','video') NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `inline_text` longtext DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_files`
--

INSERT INTO `course_files` (`id`, `course_id`, `file_type`, `file_path`, `inline_text`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'doc', '[\"uploads\\/courses\\/202506190744_uploads_courses_202506190705_second_category-Physics.pdf\",\"uploads\\/courses\\/202506190744_uploads_courses_202506190705_second_category-Physics_(1).pdf\",\"uploads\\/courses\\/202506190744_PDF_Document.pdf\"]', NULL, NULL, '2025-06-18 00:45:07', '2025-06-19 02:44:47'),
(2, 2, 'inline_text', NULL, '<p>hello this is inline text for user<img src=\"data:image/png;base64,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\" data-filename=\"logoF.png\" style=\"width: 336px;\"></p>', NULL, '2025-06-18 00:45:34', '2025-06-18 00:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `dataflow`
--

CREATE TABLE `dataflow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` enum('Dr','Mr','Miss') NOT NULL DEFAULT 'Dr',
  `name` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `dataflow_email` varchar(255) NOT NULL,
  `dataflow_password` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` enum('dataflow_pending','application_submitted','application_in_progress','quality_check','report_completed_positive') NOT NULL DEFAULT 'dataflow_pending',
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataflow_cases`
--

CREATE TABLE `dataflow_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` enum('Dr','Mr','Miss') NOT NULL DEFAULT 'Dr',
  `name` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `dataflow_email` varchar(255) NOT NULL,
  `dataflow_password` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` enum('dataflow_pending','application_submitted','application_in_progress','quality_check','report_completed_positive') NOT NULL DEFAULT 'dataflow_pending',
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataflow_cases`
--

INSERT INTO `dataflow_cases` (`id`, `title`, `name`, `passport_no`, `dataflow_email`, `dataflow_password`, `service_id`, `service_name`, `status`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Zain Ul Abidin', 'rh1234567', 'zain@zzain.com', 'jijhiohjo41545', '1', 'Data Flow', 'dataflow_pending', '[\"uploads\\/files\\/1746961569_682084a1949d5.pdf\"]', '2025-05-11 08:06:09', '2025-05-11 08:06:09'),
(2, 'Dr', 'Zain Ul Abidin', 'rh1234567', 'zain@zzain.com1', 'jijhiohjo41545', '1', 'Data Flow', 'application_in_progress', '[\"uploads\\/files\\/1746963939_68208de37654f.pdf\"]', '2025-05-11 08:45:39', '2025-05-11 08:45:39'),
(3, 'Dr', 'Zain Ul Abidin', 'rh1234567', 'zain@zzain.com11', 'jijhiohjo41545', '1', 'Data Flow', 'dataflow_pending', '[\"uploads\\/files\\/1747648683_682b00ab11873.pdf\"]', '2025-05-19 06:58:03', '2025-05-19 06:58:03'),
(4, 'Dr', 'Zain Ul Abidin', 'rh1234567', 'zain@zzain.com2', 'jijhiohjo41545', '1', 'Data Flow', 'application_submitted', '[\"uploads\\/files\\/1747648742_682b00e6bec58.pdf\"]', '2025-05-19 06:59:02', '2025-05-19 06:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `login_settings`
--

CREATE TABLE `login_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_limit` int(11) NOT NULL DEFAULT 0 COMMENT '0 means infinity',
  `fcm_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_settings`
--

INSERT INTO `login_settings` (`id`, `device_limit`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, '2025-06-16 11:09:50', '2025-06-16 11:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_04_27_074148_create_services_table', 2),
(8, '2025_05_06_131750_add_title_to_users_table', 3),
(13, '2025_05_08_093239_create_dataflow_cases_table', 4),
(14, '2025_06_15_130019_create_personal_access_tokens_table', 5),
(16, '2025_06_16_083005_create_login_settings_table', 6),
(24, '2025_06_16_083006_create_categories_table', 7),
(25, '2025_06_16_124614_create_courses_table', 7),
(26, '2025_06_16_130225_create_course_files_table', 7),
(30, '2025_06_16_131355_create_user_course_purchases_table', 8),
(31, '2025_06_16_131356_create_business_settings_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 7, 'myAppToken', '984421a9431a555ddc4633b7944fcb6ba87f729e82998523e528bf30812c25f5', '[\"*\"]', NULL, NULL, '2025-06-15 08:35:35', '2025-06-15 08:35:35'),
(2, 'App\\Models\\User', 9, 'myAppToken', '5213522d8965cfc22b8a8768308ae5c27ba9005b102401828689acbd3e7258c4', '[\"*\"]', NULL, NULL, '2025-06-16 00:46:57', '2025-06-16 00:46:57'),
(13, 'App\\Models\\User', 13, 'iphone', 'b5b0b54a4c8b60554f4cdacca3d7c25f77c8636d9eaa8e309e648626de0d45cf', '[\"*\"]', NULL, NULL, '2025-06-16 05:07:41', '2025-06-16 05:07:41'),
(14, 'App\\Models\\User', 13, 'iphone', 'b2e83427fc89f975855607eda657245746809565de0a86e0cf1314fb74ef5fbd', '[\"*\"]', NULL, NULL, '2025-06-16 05:25:03', '2025-06-16 05:25:03'),
(15, 'App\\Models\\User', 13, 'iphone', '6fa961e9f433a81125cbec9d9ad09f10f7208ee62ff247436bcaf1f0674ee0ac', '[\"*\"]', NULL, NULL, '2025-06-16 05:25:30', '2025-06-16 05:25:30'),
(16, 'App\\Models\\User', 13, 'iphone v2', 'a42b2ef8ccd35d0b8318a643ff363590dda407949854c7e4f1400c526981653a', '[\"*\"]', NULL, NULL, '2025-06-16 05:27:32', '2025-06-16 05:27:32'),
(17, 'App\\Models\\User', 13, 'iphone v2', 'a8a13c5f30c18d93bab2859de8839a59bc4f2d4bdea73615d284cd91c4179654', '[\"*\"]', '2025-06-18 04:20:34', NULL, '2025-06-18 01:22:02', '2025-06-18 04:20:34'),
(18, 'App\\Models\\User', 14, 'myAppToken', '48a86f68e80617ad266dac78adc7c5dc37b3ab713efa089550a4f89c2fea81ce', '[\"*\"]', NULL, NULL, '2025-06-19 03:24:46', '2025-06-19 03:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_amount` decimal(10,2) NOT NULL,
  `discounted_amount` decimal(10,2) DEFAULT 0.00,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_amount`, `discounted_amount`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Data Flow', 1650.00, 0.00, 'Active', 'uploads/services/1746093578.jpg', '2025-05-01 06:59:38', '2025-05-01 06:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tPjBQz6GJKo0eupCQj4E7HBV2WdVK6cyRmlieb5S', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRGtlUElmNG5BRkU3aldlOUdrNGtwejcyVHBJYWNLQmx6TUFQNHN0OCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTM7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy1zZXR0aW5ncyI7fX0=', 1750327906);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` enum('Dr','Mr','Miss') NOT NULL DEFAULT 'Dr',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `login_attempt` int(11) NOT NULL DEFAULT 0,
  `role` enum('Admin','Student','Teacher') NOT NULL DEFAULT 'Student',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `email`, `email_verified_at`, `mobile`, `country`, `profile_picture`, `login_attempt`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr', 'Zain Ul Abidin', 'admin@smleguide.com', NULL, NULL, NULL, NULL, 0, 'Student', '$2y$12$Q4EX/WVJ85eZq6ZY1BRqt.RrAmP5UsB2F9o/IlzysrvEGSjZRkEcO', NULL, '2025-04-23 08:16:19', '2025-04-23 08:16:19'),
(2, 'Dr', 'Zain Ul Abidin', '1admin@smleguide.com', NULL, NULL, NULL, NULL, 0, 'Student', '$2y$12$ysq6aHdfbweisj8OlQH9pOTXIxcgh6sj8T9FdK8cR/MX0pIl0la1O', NULL, '2025-04-23 08:29:43', '2025-04-23 08:29:43'),
(3, 'Dr', 'Zain Ul Abidin', '2admin@smleguide.com', NULL, '0542391545', 'Saudi Arabia', NULL, 0, 'Student', '$2y$12$gArXJvZlmNkmtbyk6kY2LuJLP3Yk750HO..OA/iWU0NaDxKkwdlgW', NULL, '2025-04-23 08:31:30', '2025-04-23 08:31:30'),
(4, 'Dr', 'Zain Ul Abidin', 'zain@zain1.com', NULL, '0542391555', 'Saudi Arabia', NULL, 0, 'Student', '$2y$12$FqIbFt9z5rOLC2qRXUPBUOVJogeIOIpoMJTcSLP6/OKP2T5W5gdF2', NULL, '2025-05-07 06:37:15', '2025-05-07 06:37:15'),
(5, 'Mr', 'Zohaib', 'z@m.com', NULL, '0320-0163647', 'Pakistan', NULL, 0, 'Student', '$2y$12$KCjQGUdWNXk8X7pLtAcVXubLnH5ve.uf0xV0Xv2lRM22fAX6fUaxu', NULL, '2025-06-15 07:16:50', '2025-06-15 07:16:50'),
(6, 'Dr', 'zohaib', 'zohaib@mail.com', NULL, '123333', 'Pakistan', NULL, 0, 'Student', '$2y$12$ZUAZwFctBhudq2nn97NGbek3FcT4NEzk9maVn9YzvtMi3YxYJdJNC', NULL, '2025-06-15 08:28:11', '2025-06-15 08:28:11'),
(7, 'Dr', 'zohaib', 'zohaib2@mail.com', NULL, '123333', 'Pakistan', NULL, 0, 'Student', '$2y$12$WDa5vDXT0G9OhNO2XlTUUeG8koYp3OZ/iGEGdilFw5AsYW84ZAS7q', NULL, '2025-06-15 08:35:35', '2025-06-15 08:35:35'),
(8, 'Mr', 'Devin Wilkerson', 'zohaibworkspace1@gmail.com', NULL, '+1 (189) 999-2032', 'Pakistan', NULL, 0, 'Student', '$2y$12$sxO09HmWdif/5VN4po7ZRepQ4hwynoq/Ve2/ihGpKWluf95xB74qq', NULL, '2025-06-16 00:33:03', '2025-06-16 00:33:03'),
(9, 'Dr', 'zohaib', 'zohaib3@mail.com', NULL, '123333', 'Pakistan', NULL, 0, 'Student', '$2y$12$7KKZfz9wGkZ/R3fAD9MQh.Rm7.dkJ9QrAyl4W5VkBQYtDNUATPasa', NULL, '2025-06-16 00:46:57', '2025-06-16 00:46:57'),
(13, 'Dr', 'zohaib', 'zohaibworkspace@gmail.com', '2025-06-16 02:05:06', '123333', 'Pakistan', 'uploads/profile_picture/202506190824White_Logo.png', 4, 'Student', '$2y$12$0H435q9mpZ/.18pUK6CTte9Gs2vNEVQmi6bHqmohJaNlJ8s9v4v9e', NULL, '2025-06-16 02:05:06', '2025-06-18 01:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_course_purchases`
--

CREATE TABLE `user_course_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_file_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_slip` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','denied') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_course_purchases`
--

INSERT INTO `user_course_purchases` (`id`, `user_id`, `category_id`, `course_id`, `course_file_id`, `purchase_date`, `expiry_date`, `payment_method`, `payment_slip`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 2, 2, '2025-06-18 06:18:04', '2025-12-15 06:18:04', NULL, NULL, 'approved', '2025-06-18 03:09:46', '2025-06-18 06:18:04'),
(2, 13, 1, 2, 2, '2025-06-18 06:18:09', NULL, NULL, NULL, 'denied', '2025-06-18 04:20:34', '2025-06-18 06:18:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `course_files`
--
ALTER TABLE `course_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_files_course_id_foreign` (`course_id`);

--
-- Indexes for table `dataflow`
--
ALTER TABLE `dataflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataflow_cases`
--
ALTER TABLE `dataflow_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_settings`
--
ALTER TABLE `login_settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_course_purchases`
--
ALTER TABLE `user_course_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_course_purchases_user_id_foreign` (`user_id`),
  ADD KEY `user_course_purchases_category_id_foreign` (`category_id`),
  ADD KEY `user_course_purchases_course_id_foreign` (`course_id`),
  ADD KEY `user_course_purchases_course_file_id_foreign` (`course_file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_files`
--
ALTER TABLE `course_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dataflow`
--
ALTER TABLE `dataflow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dataflow_cases`
--
ALTER TABLE `dataflow_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_settings`
--
ALTER TABLE `login_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_course_purchases`
--
ALTER TABLE `user_course_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_files`
--
ALTER TABLE `course_files`
  ADD CONSTRAINT `course_files_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_course_purchases`
--
ALTER TABLE `user_course_purchases`
  ADD CONSTRAINT `user_course_purchases_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_purchases_course_file_id_foreign` FOREIGN KEY (`course_file_id`) REFERENCES `course_files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_purchases_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_course_purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
