-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 08:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wheat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frames`
--

CREATE TABLE `frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `length` double(8,2) NOT NULL,
  `width` double(8,2) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images_in_frames`
--

CREATE TABLE `images_in_frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frame_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE `lands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `replied_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`, `user_id`) VALUES
(1, '2014_10_12_000000_create_users_table', 1, 1),
(2, '2014_10_12_100000_create_password_resets_table', 1, 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1, 1),
(4, '2020_12_12_134724_create_land_table', 2, 1),
(5, '2020_12_12_134745_create_sensors_table', 2, 1),
(6, '2020_12_12_140158_create_frames_table', 3, 1),
(7, '2020_12_12_140205_create_images_table', 3, 1),
(8, '2020_12_12_140216_create_notifications_table', 3, 1),
(9, '2020_12_12_140237_create_reports_table', 4, 1),
(10, '2020_12_12_142644_create_images_in_frames_table', 4, 1),
(11, '2020_12_12_144047_add_title_to_notifications_table', 5, 1),
(12, '2020_12_12_144302_create_user_types_table', 6, 1),
(13, '2020_12_12_144500_add_type_id_to_users_table', 6, 1),
(14, '2020_12_13_114408_create_messages_table', 7, 1),
(15, '2020_12_20_230916_add_user_id_to_reset_table', 8, 1),
(16, '2020_12_20_231551_add_user_id_to_migrations_table', 8, 1),
(17, '2020_12_20_231627_add_user_id_to_failed_table', 8, 1),
(18, '2020_12_20_233745_add_replied_by_table', 9, 1),
(19, '2021_05_30_181001_create_video_table', 10, 1),
(20, '2021_05_30_182515_create_videos_table', 11, 1),
(21, '2021_06_08_134352___create_weather_table', 12, 1),
(23, '2021_06_10_192343_create_notifications_table', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1ac5590a-5a64-48ee-a4a6-0a650b1c3862', 'App\\Notifications\\TaskComplete', 'App\\User', 10, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:12:01', '2021-06-10 18:12:01'),
('2f276e75-a62b-4ec4-88da-18a6faad2700', 'App\\Notifications\\TaskComplete', 'App\\User', 10, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:14:00', '2021-06-10 18:14:00'),
('8882e5dc-f8f2-4d82-9e53-8cc54b7c7a44', 'App\\Notifications\\TaskComplete', 'App\\User', 3, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:25:01', '2021-06-10 18:25:01'),
('b0a8dcb1-cbf6-414f-927a-d104c2b6a85d', 'App\\Notifications\\TaskComplete', 'App\\User', 2, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:23:03', '2021-06-10 18:23:03'),
('df1cac34-b4d0-43a7-8a0b-ef48b5d3d49e', 'App\\Notifications\\TaskComplete', 'App\\User', 10, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:13:00', '2021-06-10 18:13:00'),
('f1972e8b-d170-4aea-a00d-f84c0f113ef1', 'App\\Notifications\\TaskComplete', 'App\\User', 1, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:10:01', '2021-06-10 18:10:01'),
('f9fa7daf-0ab6-43dc-a25a-2f2b6fc457ef', 'App\\Notifications\\TaskComplete', 'App\\User', 10, '{\"data\":\"May wheat rust happens later\"}', NULL, '2021-06-10 18:11:01', '2021-06-10 18:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `isMale` tinyint(1) NOT NULL DEFAULT 1,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `accepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `isMale`, `address`, `mobile`, `remember_token`, `created_at`, `updated_at`, `type_id`, `accepted`) VALUES
(1, 'Abanoub', 'abanoub@mail.com', NULL, '$2y$10$dbX6HZTD3zJKiEYAlx9SzeVAZF2CjBinG0gw3gljcOy6F1bNVR5h2', 1, NULL, NULL, 'c9fnBzSt734G33YmhFQ1V1TBOHEZqJKvFRWbm7ArKivL6Cuwcb973xqbDEvJ', '2020-12-16 11:08:08', '2020-12-16 11:08:08', 1, 0),
(2, 'ayhaga', 'dlangworth@example.com', NULL, '$2y$10$bePwIEVCH.eRaREPFMjHHOOO8sD5aGeydEuIhSdIhCdbnVtnVUnly', 1, NULL, NULL, NULL, '2020-12-18 14:16:26', '2020-12-18 14:16:26', 2, 0),
(3, 'ahmed', 'ahmed@ahmed.com', NULL, '$2y$10$hdHwvVBmVfG0Hwei0JiNhOlS69inpNOHKKdt3lZ7qOj/gvBAe9T7m', 1, NULL, NULL, NULL, '2020-12-18 14:20:14', '2020-12-18 14:20:14', 2, 0),
(4, 'test', 'ceo@ceo.com', NULL, '$2y$10$rZPbkSA.QH/GLGABfsBEDOW2Zi6xVK6Vo7P60znqIgTd2nOhT8V66', 1, NULL, NULL, NULL, '2020-12-18 14:21:34', '2020-12-18 14:21:34', 2, 0),
(5, 'test', 'admin@gmail.com', NULL, '$2y$10$wndaD2iauPYZZx6pTwoPD.viPmL/Mn/VtToU9.HMbuC.LVCUH64.W', 1, NULL, NULL, NULL, '2020-12-18 14:24:17', '2020-12-18 14:24:17', 2, 0),
(6, 'test', 'abanoubLamie16@gmail.com', NULL, '$2y$10$agQ1gReTF/YGFrsgu6dfpeL5dQJBU9yoUja8nPC7d9G/rAK936J0O', 1, NULL, NULL, NULL, '2020-12-18 14:26:18', '2020-12-18 14:26:18', 2, 0),
(7, 'test', 'abanoub-g-lamie@hotmail.com', NULL, '$2y$10$5cWW5RS.z7Wx3tuapl5Ed.6n6ERU.SmSlPe9iEbtzVLTsvifcuWEC', 1, NULL, NULL, NULL, '2020-12-18 14:27:35', '2020-12-18 14:27:35', 2, 0),
(8, 'ayhaga', 'ay@haga.com', NULL, '$2y$10$h9zQl5EyX6oK6kzrvO0nFuS5Ct0AohuRzyEUwZ7aJfn63EFTY.oCy', 1, NULL, NULL, NULL, '2020-12-18 14:28:11', '2020-12-18 14:28:11', 2, 0),
(9, 'ibrahim', 'ibrahim@mail.com', NULL, '$2y$10$Vi09263qnV4bbB2h27tbuuEX11EJ28cJdQiSCkvVFc78muT8nds7O', 1, NULL, NULL, NULL, '2020-12-18 14:32:39', '2020-12-18 14:32:39', 2, 0),
(10, 'nour', 'nour@mail.com', NULL, '$2y$10$QmA7fvu/K7Tztl.HQhyAf.pDUF5FbmF.NloK71jbu7EEdNKZUpEI2', 1, NULL, NULL, NULL, '2020-12-18 14:33:50', '2020-12-18 14:33:50', 2, 0),
(11, 'fawzy', 'fawzyibra@gmail.com', NULL, '$2y$10$oS02P6lp8qp6e0teuZVMPO.t6MOCYlODMkogDAsMPMGcbsg7oDOaS', 1, NULL, NULL, NULL, '2021-06-05 07:41:39', '2021-06-05 07:41:39', 2, 0),
(12, '7amada', '7amadaa@gmail.com', NULL, '$2y$10$iIl7N66jQkhd4QpOqCnZpuhi3kD4D8pD6AEihwnNOJ.arNTw3rvRW', 1, NULL, NULL, NULL, '2021-06-08 09:43:01', '2021-06-08 09:43:01', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `temprature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `humidity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wind_speed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wind_direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `temprature`, `humidity`, `wind_speed`, `wind_direction`, `created_at`, `updated_at`) VALUES
(1, '30.42', '48', '7.2', '350', '2021-06-10 18:23:03', '2021-06-10 18:23:03'),
(2, '30.42', '48', '7.2', '350', '2021-06-10 18:24:01', '2021-06-10 18:24:01'),
(3, '30.42', '48', '7.2', '350', '2021-06-10 18:25:01', '2021-06-10 18:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failed_jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frames_land_id_foreign` (`land_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_land_id_foreign` (`land_id`);

--
-- Indexes for table `images_in_frames`
--
ALTER TABLE `images_in_frames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_in_frames_frame_id_foreign` (`frame_id`),
  ADD KEY `images_in_frames_image_id_foreign` (`image_id`);

--
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lands_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_replied_by_foreign` (`replied_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `migrations_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_type_id_foreign` (`type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
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
-- AUTO_INCREMENT for table `frames`
--
ALTER TABLE `frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_in_frames`
--
ALTER TABLE `images_in_frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD CONSTRAINT `failed_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `frames`
--
ALTER TABLE `frames`
  ADD CONSTRAINT `frames_land_id_foreign` FOREIGN KEY (`land_id`) REFERENCES `lands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_land_id_foreign` FOREIGN KEY (`land_id`) REFERENCES `lands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
