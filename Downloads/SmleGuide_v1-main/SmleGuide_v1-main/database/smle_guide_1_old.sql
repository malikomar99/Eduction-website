-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(13, '2025_05_08_093239_create_dataflow_cases_table', 4);

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
('DLdfrz8siNKNYSjK40hO9C7gMxxHmk6l7wWwVWvk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFB4QWZUTHlwT2RkMk92MGpVc2gyTnVUWlVpVFFVWXV0dVZYcTJhWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749971158),
('I4MQauGJ2dJSeKyer3CpRU2DclwJBqeEfiYA9bxb', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibUdNbUhpall6ME55S3NHYVBORFl0ZDc5emNHcUF2VHNjcjhqMlpzbCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGF0YWZsb3cvZWRpdC80Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1747835989),
('k2Q62iCj0udupDwKSP2fI3PmsXbv8nnPLA9AG1br', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM3VoUFdSdjlndXFmeGVGZ2xLaWp5engxN1FnMjgxMWMybWF0Rmw3diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93aWRnZXRzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749986846),
('OW2B6OskT4w0f3SwH17cHS0MFLC0f5gaZkD788GB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUVhyTmwxZXAzRGJ0ZU5aV2dqbzdUeVJZc3RtYkFxWHRrMW03MkR2WCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkZFNlcnZpY2UiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2F1dGgvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748180386);

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
  `role` enum('Admin','Student','Teacher') NOT NULL DEFAULT 'Student',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `email`, `email_verified_at`, `mobile`, `country`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr', 'Zain Ul Abidin', 'admin@smleguide.com', NULL, NULL, NULL, 'Student', '$2y$12$Q4EX/WVJ85eZq6ZY1BRqt.RrAmP5UsB2F9o/IlzysrvEGSjZRkEcO', NULL, '2025-04-23 08:16:19', '2025-04-23 08:16:19'),
(2, 'Dr', 'Zain Ul Abidin', '1admin@smleguide.com', NULL, NULL, NULL, 'Student', '$2y$12$ysq6aHdfbweisj8OlQH9pOTXIxcgh6sj8T9FdK8cR/MX0pIl0la1O', NULL, '2025-04-23 08:29:43', '2025-04-23 08:29:43'),
(3, 'Dr', 'Zain Ul Abidin', '2admin@smleguide.com', NULL, '0542391545', 'Saudi Arabia', 'Student', '$2y$12$gArXJvZlmNkmtbyk6kY2LuJLP3Yk750HO..OA/iWU0NaDxKkwdlgW', NULL, '2025-04-23 08:31:30', '2025-04-23 08:31:30'),
(4, 'Dr', 'Zain Ul Abidin', 'zain@zain1.com', NULL, '0542391555', 'Saudi Arabia', 'Student', '$2y$12$FqIbFt9z5rOLC2qRXUPBUOVJogeIOIpoMJTcSLP6/OKP2T5W5gdF2', NULL, '2025-05-07 06:37:15', '2025-05-07 06:37:15');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
