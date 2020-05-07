-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 04:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'your are the best developer', 3, 1, '2020-05-05 21:55:00', '2020-05-05 21:55:00'),
(2, 'i love you', 2, 1, '2020-05-05 21:58:39', '2020-05-05 21:58:39'),
(3, 'this is a good post', 1, 5, '2020-05-07 00:54:57', '2020-05-07 00:54:57');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `to_user_id`, `status`, `created_at`, `updated_at`) VALUES
(18, 5, 1, 'friends', '2020-05-06 21:34:17', '2020-05-06 21:34:24'),
(19, 1, 4, 'pending', '2020-05-06 21:43:56', '2020-05-06 21:43:56'),
(20, 2, 1, 'friends', '2020-05-06 21:46:50', '2020-05-06 21:47:08'),
(21, 5, 2, 'friends', '2020-05-06 22:06:16', '2020-05-06 22:06:38'),
(22, 2, 6, 'friends', '2020-05-06 22:07:09', '2020-05-06 22:07:49'),
(23, 5, 6, 'friends', '2020-05-06 23:59:07', '2020-05-06 23:59:17'),
(24, 1, 6, 'pending', '2020-05-07 00:42:18', '2020-05-07 00:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-05-05 21:54:26', '2020-05-05 21:54:26'),
(2, 3, 1, '2020-05-05 21:54:35', '2020-05-05 21:54:35'),
(3, 2, 1, '2020-05-05 21:58:11', '2020-05-05 21:58:11');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2020_05_04_214403_create_posts_table', 1),
(15, '2020_05_05_145948_create_comments_table', 1),
(16, '2020_05_05_195212_create_likes_table', 1),
(17, '2020_05_06_000305_create_friends_table', 2);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'hello i am laravel developer', 1, '2020-05-05 21:54:22', '2020-05-05 21:54:22'),
(2, 'hello iam diaa', 6, '2020-05-06 22:23:55', '2020-05-06 22:23:55'),
(3, 'i am asmaa mahmoud', 2, '2020-05-06 23:57:47', '2020-05-06 23:57:47'),
(4, 'hello i am banda', 5, '2020-05-06 23:59:39', '2020-05-06 23:59:39'),
(5, 'this is new post', 1, '2020-05-07 00:36:37', '2020-05-07 00:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `address`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abdelrahman sobhy', 'Abdelrahman sobhy.jpeg', 'Nasr City', '01017102408', 'abdosobhy1200@gmail.com', NULL, '$2y$10$Cpj49rc1X/w6HP7DOCoUCulyllQOo0gsNarEA0AgDxu0mvod8FPT.', NULL, '2020-05-05 21:35:47', '2020-05-05 21:35:47'),
(2, 'asmaa mahmoud', 'asmaa mahmoud.jpg', 'El Saida Zeinab', '01121104247', 'asmaa329917@gmail.com', NULL, '$2y$10$h7zk.NlDqqzHZvESioUX5u3QSbTdFM.tQNOqEea8e/izoe7NMcFA.', 'FskMkBIuu2OkLorkCG9VnNf5RTY5BACtaLMHXa4anSWvB71TqXSTXXTtqACX', '2020-05-05 21:37:00', '2020-05-05 21:37:00'),
(3, 'Hatem Said', 'Hatem Said.jpg', 'El Mazalat', '0100284785', 'hatem@hatem', NULL, '$2y$10$v4CAycKVXW.x/F7gIrZps.GrWh6/LC2Gj4X.ZS4yKyZ9fS5OyPvMq', 'CPYsz0KwrI463iygP9GcQyShWyAMd9BANM705ZLPhEvxvpOXL6xIqfu1zLwa', '2020-05-05 21:39:39', '2020-05-05 21:39:39'),
(4, 'bedo sobhy', 'bedo sobhy.jpeg', 'Nasr City', 'abdosobhy1200@gmail.com', 'abdo@2020', NULL, '$2y$10$AlIwEfPezz.sjR7qWnFpH.KQEZnQhpObG/Hl1w7uTeX9DUVIMG3EO', NULL, '2020-05-06 13:03:13', '2020-05-06 13:03:13'),
(5, 'Radwa', 'Radwa.jpg', 'saraya el oba', '0100284785', 'radwa@radwa', NULL, '$2y$10$Bg.AJwDAirJ0ELXNKfkMke8fyNSU7cHHzLDkw9pSAmg1z5X6uLnxW', 'p3TATXuX3MA1VQV47HvkiVcbd9d9khfHKm2vbheoYLUOs6BVzP9GntvjUgd9', '2020-05-06 17:01:55', '2020-05-06 17:01:55'),
(6, 'diaa el din', 'diaa el din.jpg', 'Shobra masr', '01017102408', 'diaa@diaa', NULL, '$2y$10$fMUlloduzeZDEosm7bjT3uzb70sih0ri4nUh5T7GXO90K/R9ZXt1y', NULL, '2020-05-06 17:03:22', '2020-05-06 17:03:22'),
(7, 'rana khaled', 'rana khaled.jpg', 'Awseeem', 'diaa@diaa', 'rana@rana', NULL, '$2y$10$0fcEoweJllCyHcwks9YmFua9bNz7NRg.tdUF8hvu4zPe3F0OAWZtq', NULL, '2020-05-06 17:05:19', '2020-05-06 17:05:19'),
(8, 'menna emad', 'menna emad.jpg', 'El Saida Zeinab', 'rana@rana', 'menna@menna', NULL, '$2y$10$ur7BIRpoPa2Svfpz8u5M7uyrQ/IeVOVaduUha6Hl/CylM3.Ac9S9O', NULL, '2020-05-06 17:07:00', '2020-05-06 17:07:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
