-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 04:17 PM
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
-- Database: `parewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `band_id` varchar(25) NOT NULL,
  `nama_band` varchar(255) DEFAULT NULL,
  `deskripsi_band` text DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `sample_video` varchar(255) DEFAULT NULL,
  `no_whatsapp` varchar(25) DEFAULT NULL,
  `foto_band` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status_band` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`band_id`, `nama_band`, `deskripsi_band`, `genre`, `sample_video`, `no_whatsapp`, `foto_band`, `link`, `status_band`, `create_date`, `id`) VALUES
('1', 'Linkin Park', 'mantaplah pokoknya', 'Jazz', 'CGHlZglJKuE', '082284745760', 'uploads/bands/photos/INR95ge3SlpGubU75XGYV2n77ygRzZKCEGvXtpU3.jpg', 'spotify/bringmethehorizon', 'accept', '2024-12-13 05:58:50', 1),
('3', 'Against The Current', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae vestibulum nulla. Aliquam nulla nisl, lacinia ac leo vel, tincidunt dignissim nulla. In eu elementum massa. Nunc quis ante viverra, vulputate lacus ut, suscipit tortor. Donec non nunc augue. Nam lobortis non dolor vel eleifend. In hac habitasse platea dictumst. Donec tempor, nisi ut semper egestas, risus neque facilisis odio, a commodo augue urna sed magna. Donec et dui ac metus eleifend molestie et sit amet orci. Curabitur volutpat scelerisque tortor quis lobortis.\r\n\r\nEtiam in est dignissim, placerat tortor sed, malesuada mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque a sem odio. Curabitur sapien lacus, facilisis id feugiat sit amet, tempor quis nibh. Proin enim lorem, mattis rutrum libero ut, tristique aliquet nisl. Curabitur tincidunt et eros non cursus. Pellentesque vestibulum dignissim ipsum interdum venenatis. Donec sapien nibh, tristique quis lorem sed, commodo scelerisque orci. Ut posuere auctor mi. Mauris fringilla quis erat eu aliquam. Vestibulum elit massa, convallis rutrum arcu id, consequat lacinia augue. Vestibulum velit urna, pharetra a volutpat id, bibendum non odio.', 'Pop Indir', 'CGHlZglJKuE', '082284745760', 'uploads/bands/photos/Ul1CUBlUHcIM3L2A0Sxr4LlI6hAXWtxQL6Mvvm5P.jpg', 'spotify/bringmethehorizon', 'accept', '2024-12-14 15:40:17', 3),
('4', 'Evanescence', 'meow meow meow meow meow meow meow meowmeow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meow meowv', 'RNB', 'CGHlZglJKuE', '082284745760', 'uploads/bands/photos/cpxKNOQNxh1YiAAfF2vGICYPm40DpT2RVIb43xDu.jpg', 'spotify/bringmethehorizon', 'pending', '2024-12-14 15:43:24', 4),
('7', 'Bring Me The Horizon', 'haloo kami Bring Me The Horizon', 'RNB', 'CGHlZglJKuE', '082284745760', 'uploads/bands/photos/p94D5HNhdjJHfSmjCwKWjRhHoYRVpHQC2sNuMKjq.jpg', 'spotify/bringmethehorizon', 'accept', '2024-12-24 15:03:05', 7);

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
-- Table structure for table `jadwal_band`
--

CREATE TABLE `jadwal_band` (
  `tanggal` date NOT NULL,
  `band_id` varchar(25) NOT NULL,
  `status_jadwal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_band`
--

INSERT INTO `jadwal_band` (`tanggal`, `band_id`, `status_jadwal`) VALUES
('2024-12-15', '1', 'admin_accepted'),
('2024-12-18', '4', 'accepted'),
('2024-12-23', '3', 'sent'),
('2024-12-24', '7', 'admin_accepted'),
('2024-12-25', '1', 'admin_accepted'),
('2024-12-26', '1', 'canceled'),
('2024-12-27', '7', 'accepted');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `performance_id` varchar(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `rating_averange` float DEFAULT NULL,
  `total_review` int(11) DEFAULT NULL,
  `band_id` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`performance_id`, `title`, `video`, `rating_averange`, `total_review`, `band_id`, `tanggal`) VALUES
('2024-12-23 00:00:00', 'Against The Current Tampil Kece', 'uploads/bands/videos/rSjin0Qj5HXb4rzfETAVnBxb8gJ8qGsQl9xTvf7U.mp4', 4, 10, '3', NULL),
('2024-12-24 00:00:00', 'Bring Me The Horizon tampil kece', 'uploads/bands/videos/AGAkmNs4eN6HCLqWde00I70TE6hYxmJpYllRUCPW.mp4', NULL, NULL, '7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `performance_value`
--

CREATE TABLE `performance_value` (
  `performance_id` varchar(25) DEFAULT NULL,
  `id` bigint(20) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_value`
--

INSERT INTO `performance_value` (`performance_id`, `id`, `rating`, `review`) VALUES
('2024-12-23 00:00:00', 1, 5, 'mantapp kali boss'),
('2024-12-23 00:00:00', 7, 4, 'kerennn');

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
('xlAVkILf8y5uMck0prqFFTwpxGKtuctZi5NtWDHc', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRlJTME12ODliTzZvZWZxcElFYWR6WGhZR21NUEpBbnVTUVlBdWhzQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1735053255);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rani', 'ramadhani@gmail.com', NULL, '$2y$12$QN8HVnr36rnWYALbXi9cY.92BXYsb4qHwziuVegpHqyX.cb0DkdCu', NULL, '2024-12-12 18:52:53', '2024-12-12 18:52:53'),
(2, 'Ghina Anfasha Nurhadi', 'ghinaanfasha@gmail.com', NULL, '$2y$12$icsaZPKdNvHcvPJzE6l55eQ/hQFJ9yC3nzGzli3fZpD3kLCcYEvU6', NULL, '2024-12-12 23:00:03', '2024-12-12 23:00:03'),
(3, 'Mikasa Ackerman', 'mikasa@gmail.com', NULL, '$2y$12$lgKXYCRu.Q8nyLOXzjcMDeGNiC8EYqUMazCEbimSOBMNTsMYhE.Hy', NULL, '2024-12-14 08:20:20', '2024-12-14 08:20:20'),
(4, 'Annin Carista', 'annincarista@gmail.com', NULL, '$2y$12$p5kFVkItHw6CbdWV14V3CuUb43uU5yofxc5TpZ5Krx8bB6uzvEjwu', NULL, '2024-12-14 08:41:48', '2024-12-14 08:41:48'),
(5, 'Admin', 'admin@parewa.com', NULL, '$2y$12$4gGUCdGaTXKDap4LALkymut.4rXQjOI/OUoUjMrfU0oeHQKrUNi2a', NULL, '2024-12-23 07:17:51', '2024-12-23 07:17:51'),
(6, 'Yosano Akiko', 'yosano@gmail.com', NULL, '$2y$12$P.TCVjqvB/7NfOjoae9n4OW6KZfY/ePM/3SRzpD.ZCIieLIgJuDw2', NULL, '2024-12-24 02:03:49', '2024-12-24 02:03:49'),
(7, 'Nurul Afani', 'nurul@gmail.com', NULL, '$2y$12$kHEPNLhxqo.vY5G/HYtDDO6/BIue/lVDqCTOb1heBNwdVDrY0Oxli', NULL, '2024-12-24 07:59:33', '2024-12-24 07:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` varchar(25) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`band_id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_band`
--
ALTER TABLE `jadwal_band`
  ADD PRIMARY KEY (`tanggal`,`band_id`);

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
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`performance_id`),
  ADD KEY `band_id` (`band_id`,`tanggal`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_band`
--
ALTER TABLE `jadwal_band`
  ADD CONSTRAINT `jadwal_band_ibfk_1` FOREIGN KEY (`band_id`) REFERENCES `band` (`band_id`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`band_id`,`tanggal`) REFERENCES `jadwal_band` (`band_id`, `tanggal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
