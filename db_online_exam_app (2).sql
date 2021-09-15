-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 06:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_online_exam_app`
--

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
(3, '2021_06_03_153934_create_oex_categories_table', 2),
(4, '2021_06_03_155027_create_oex_exam_masters_table', 3),
(5, '2021_06_03_155839_create_oex_students_table', 4),
(6, '2021_06_03_184838_create_oex_portals_table', 4),
(7, '2021_06_19_170925_create_oex_exam_question_masters_table', 5),
(8, '2021_06_21_174847_create_oex_results_table', 6),
(9, '2021_06_23_170418_create_oex_student_exam_maps_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oex_categories`
--

CREATE TABLE `oex_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_categories`
--

INSERT INTO `oex_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test1', 1, '2021-06-08 13:15:27', '2021-06-08 13:15:27'),
(2, 'test2', 1, '2021-06-08 13:16:39', '2021-06-08 13:18:20'),
(3, 'test3', 1, '2021-06-08 13:35:16', '2021-06-08 13:35:16'),
(4, 'test4', 1, '2021-06-08 13:35:45', '2021-06-19 14:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_masters`
--

CREATE TABLE `oex_exam_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_masters`
--

INSERT INTO `oex_exam_masters` (`id`, `title`, `category`, `exam_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exam1', '1', '2021-07-30', '1', '2021-06-08 13:17:29', '2021-06-08 13:17:29'),
(2, 'Exam2', '2', '2021-06-23', '1', '2021-06-08 13:17:46', '2021-06-23 03:04:38'),
(3, 'Exam3', '3', '2021-06-23', '1', '2021-06-08 13:36:23', '2021-06-19 14:10:52'),
(4, 'Exam4', '4', '2021-07-06', '1', '2021-07-05 21:22:32', '2021-07-05 21:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_question_masters`
--

CREATE TABLE `oex_exam_question_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_question_masters`
--

INSERT INTO `oex_exam_question_masters` (`id`, `exam_id`, `question`, `ans`, `options`, `status`, `created_at`, `updated_at`) VALUES
(1, '3', 'Question1', 'A', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2021-06-19 14:50:18', '2021-06-20 01:35:15'),
(2, '3', 'Question2', 'B', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2021-06-19 14:50:33', '2021-06-19 14:50:33'),
(3, '3', 'Question3', 'C', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2021-06-19 14:50:48', '2021-06-19 14:50:48'),
(4, '2', 'Question1', 'Option3', '{\"option1\":\"Option1\",\"option2\":\"Option2\",\"option3\":\"Option3\",\"option4\":\"Option4\"}', '1', '2021-06-23 03:05:06', '2021-06-23 03:05:06'),
(5, '2', 'Question2', 'Option3', '{\"option1\":\"Option1\",\"option2\":\"Option2\",\"option3\":\"Option3\",\"option4\":\"Option4\"}', '1', '2021-06-23 03:05:26', '2021-06-23 03:05:26'),
(6, '2', 'Question3', 'Option1', '{\"option1\":\"Option1\",\"option2\":\"Option2\",\"option3\":\"Option3\",\"option4\":\"Option4\"}', '1', '2021-06-23 03:05:45', '2021-06-23 03:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `oex_portals`
--

CREATE TABLE `oex_portals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_portals`
--

INSERT INTO `oex_portals` (`id`, `name`, `email`, `mobile_no`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Portal1', 'abc@gmail.com', '9832245233', 'Kolkata@4', '1', '2021-06-12 01:29:55', '2021-06-12 09:50:04'),
(3, 'Portal2', 'xyz@gmail.com', '9836645266', 'Kolkata@4', '1', '2021-06-12 09:46:08', '2021-06-12 09:48:34'),
(4, 'Sujit Roy', 'sujit_roy@gmail.com', '9833344555', 'Kolkata@4', '1', '2021-06-13 02:16:15', '2021-06-13 02:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `oex_results`
--

CREATE TABLE `oex_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_json` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_results`
--

INSERT INTO `oex_results` (`id`, `exam_id`, `user_id`, `yes_ans`, `no_ans`, `result_json`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '3', '0', '{\"1\":\"YES\",\"2\":\"YES\",\"3\":\"YES\"}', '2021-06-23 13:20:56', '2021-06-23 13:20:56'),
(2, '2', '1', '1', '2', '{\"4\":\"NO\",\"5\":\"YES\",\"6\":\"NO\"}', '2021-06-23 13:26:27', '2021-06-23 13:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `oex_students`
--

CREATE TABLE `oex_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_students`
--

INSERT INTO `oex_students` (`id`, `name`, `email`, `mobile_no`, `dob`, `exam`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ARINDAM DAS', 'tcsarindam@gmail.com', '8910947015', '1980-08-08', '1', 'Kolkata@4', '1', '2021-06-11 09:53:24', '2021-06-17 01:15:43'),
(2, 'Sudeshna Bose', 'sbose1@gmail.com', '9830616654', '1981-07-12', '2', 'Kolkata@4', '1', '2021-06-11 09:54:00', '2021-06-23 03:03:56'),
(3, 'Portal_user1', 'porta1@gmail.com', '1980-08-08', '1999-01-08', '3', 'KOlkata@4', '1', '2021-06-15 10:22:59', '2021-06-15 10:22:59'),
(4, 'Portal_user2', 'porta2@gmail.com', '9836645266', '2000-10-10', '3', 'Kolkata@4', '1', '2021-06-16 12:09:05', '2021-06-19 14:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `oex_student_exam_maps`
--

CREATE TABLE `oex_student_exam_maps` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_submit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_student_exam_maps`
--

INSERT INTO `oex_student_exam_maps` (`id`, `user_id`, `exam_id`, `title`, `exam_date`, `exam_submit`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '3', 'Exam3', '2021-06-23', '1', '1', '2021-06-23 12:25:52', '2021-06-23 13:20:56'),
(2, '1', '2', 'Exam2', '2021-06-23', '1', '1', '2021-06-23 12:27:59', '2021-06-23 13:26:27'),
(3, '1', '1', 'Exam1', '2021-07-30', '0', '1', '2021-06-26 15:59:06', '2021-06-26 15:59:06'),
(4, '2', '1', 'Exam1', '2021-07-30', '0', '1', '2021-06-26 16:06:57', '2021-06-26 16:06:57');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$zuroJAW30EguCVWAstl8jO6voU0N7DFvZ1hxUKFkTJ7dffzfECDgq', 'nljLsFQaZTTt9UOf47086SxwlqGe8ytkKlW1Xlcnv7AJbvjqVgWMuEBXQiUJ', '2021-05-30 14:37:49', '2021-05-30 14:37:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_categories`
--
ALTER TABLE `oex_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_question_masters`
--
ALTER TABLE `oex_exam_question_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_portals`
--
ALTER TABLE `oex_portals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_results`
--
ALTER TABLE `oex_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_students`
--
ALTER TABLE `oex_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_student_exam_maps`
--
ALTER TABLE `oex_student_exam_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oex_categories`
--
ALTER TABLE `oex_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oex_exam_question_masters`
--
ALTER TABLE `oex_exam_question_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `oex_portals`
--
ALTER TABLE `oex_portals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oex_results`
--
ALTER TABLE `oex_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oex_students`
--
ALTER TABLE `oex_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oex_student_exam_maps`
--
ALTER TABLE `oex_student_exam_maps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
