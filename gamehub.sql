-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 08:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_games`
--

CREATE TABLE `add_games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `age`, `address`, `gender`, `phone`, `profileimage`, `created_at`, `updated_at`) VALUES
(1, 'gamehub@gmail.com', '22', 'joyrampur, shorifpur, Jamalpur', 'Male', '01998615914', 'adminImages/1622298017.png', NULL, '2021-05-29 08:20:17');

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
-- Table structure for table `gamers`
--

CREATE TABLE `gamers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamers`
--

INSERT INTO `gamers` (`id`, `email`, `profile_img`, `age`, `address`, `gender`, `phone`, `n_id`, `created_at`, `updated_at`) VALUES
(10, 'gamer1@gmail.com', 'gamerImages/1623904334.jpeg', '22', 'shorifpur', 'Male', '01998615914', NULL, '2021-06-16 22:30:23', '2021-06-16 22:32:14'),
(11, 'gamer2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:33:52', '2021-06-16 22:33:52'),
(12, 'gamer3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:38:29', '2021-06-16 22:38:29'),
(13, 'gamer4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:39:51', '2021-06-16 22:39:51'),
(14, 'gamer5@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:40:54', '2021-06-16 22:40:54'),
(15, 'gamer6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:41:43', '2021-06-16 22:41:43'),
(16, 'gamer7@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:43:26', '2021-06-16 22:43:26'),
(17, 'gamer8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:44:29', '2021-06-16 22:44:29'),
(18, 'gamer9@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-16 22:45:10', '2021-06-16 22:45:10'),
(19, 'gamer10@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-17 02:56:31', '2021-06-17 02:56:31');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_05_165927_create_admins_table', 1),
(5, '2021_03_20_190347_create_organizers_table', 1),
(6, '2021_03_20_202006_create_gamers_table', 1),
(13, '2021_05_29_174234_create_tournaments_table', 2),
(35, '2021_05_29_175731_create_participates_table', 3),
(36, '2021_05_30_145432_create_rounds_table', 3),
(37, '2021_05_30_145555_create_rooms_table', 3),
(38, '2021_05_30_145704_create_play_grounds_table', 3),
(39, '2021_06_11_191137_create_add_games_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profileimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `profileimage`, `email`, `age`, `address`, `phone`, `gender`, `n_id`, `created_at`, `updated_at`) VALUES
(3, 'organizerImages/1623906762.jpeg', 'organizer1@gmail.com', NULL, NULL, NULL, 'Male', NULL, '2021-06-16 22:11:40', '2021-06-16 23:12:42'),
(4, NULL, 'organizer2@gmail.com', NULL, NULL, NULL, NULL, NULL, '2021-06-17 01:55:24', '2021-06-17 01:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `participates`
--

CREATE TABLE `participates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament` bigint(20) UNSIGNED NOT NULL,
  `organizer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gamer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participate_fee` double DEFAULT NULL,
  `organizer_bkash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gamer_bkash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_round` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participates`
--

INSERT INTO `participates` (`id`, `tournament`, `organizer_email`, `gamer_email`, `participate_fee`, `organizer_bkash`, `gamer_bkash`, `transaction_id`, `fee`, `round`, `next_round`, `created_at`, `updated_at`) VALUES
(7, 5, 'organizer1@gmail.com', 'gamer1@gmail.com', 100, NULL, '123456789', 'sdhf3247263bc', 'Approved', NULL, 1, '2021-06-16 22:30:58', '2021-06-16 22:31:41'),
(8, 5, 'organizer1@gmail.com', 'gamer2@gmail.com', 100, NULL, '1234567810', '12354ZXz2358', 'Approved', NULL, 1, '2021-06-16 22:35:08', '2021-06-16 22:39:07'),
(9, 5, 'organizer1@gmail.com', 'gamer3@gmail.com', 100, NULL, '1234567811', '12354ZXz2358', 'Approved', NULL, 1, '2021-06-16 22:38:48', '2021-06-16 22:39:14'),
(10, 5, 'organizer1@gmail.com', 'gamer4@gmail.com', 100, NULL, '12345678912', '12354ZXz2358', 'Approved', NULL, 1, '2021-06-16 22:40:11', '2021-06-16 22:49:41'),
(11, 5, 'organizer1@gmail.com', 'gamer5@gmail.com', 100, NULL, '12345678913', 'fgfdthg', 'Approved', NULL, 1, '2021-06-16 22:41:07', '2021-06-16 22:49:36'),
(12, 5, 'organizer1@gmail.com', 'gamer6@gmail.com', 100, NULL, '12345678914', 'sdhf3247263bc', 'Approved', NULL, 1, '2021-06-16 22:42:00', '2021-06-16 22:49:30'),
(13, 5, 'organizer1@gmail.com', 'gamer7@gmail.com', 100, NULL, '12345678915', '12354ZXz2358', 'Approved', NULL, 1, '2021-06-16 22:43:56', '2021-06-16 22:49:24'),
(14, 5, 'organizer1@gmail.com', 'gamer8@gmail.com', 100, NULL, '12345678916', '12354ZXz2358', 'Approved', NULL, 1, '2021-06-16 22:44:43', '2021-06-16 22:49:19'),
(15, 5, 'organizer1@gmail.com', 'gamer9@gmail.com', 100, NULL, '12345678917', '12354ZXz2358', 'Approved', '1', 1, '2021-06-16 22:45:30', '2021-06-16 22:49:13'),
(16, 9, 'organizer1@gmail.com', 'gamer10@gmail.com', 100, NULL, '34535', '45354', 'Pending', NULL, 1, '2021-06-17 03:03:18', '2021-06-17 03:03:18');

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
-- Table structure for table `play_grounds`
--

CREATE TABLE `play_grounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `round` bigint(20) UNSIGNED NOT NULL,
  `tournament` bigint(20) UNSIGNED NOT NULL,
  `room` bigint(20) UNSIGNED NOT NULL,
  `gamer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gamer_screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score_ss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `play_grounds`
--

INSERT INTO `play_grounds` (`id`, `round`, `tournament`, `room`, `gamer_email`, `gamer_screen`, `score_ss`, `created_at`, `updated_at`) VALUES
(7, 4, 5, 4, 'gamer9@gmail.com', 'https://www.youtube.com/embed/83KtLf3epMY', NULL, '2021-06-16 22:59:49', '2021-06-16 22:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `round` bigint(20) UNSIGNED NOT NULL,
  `tournament` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_start_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_screen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_player` int(11) DEFAULT NULL,
  `room_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `round`, `tournament`, `room_number`, `room_start_at`, `room_screen`, `room_id`, `room_pass`, `max_player`, `room_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '101', '23/6/21 10:30pm', 'https://www.youtube.com/embed/ojDQ_dht2Qs', '11111111111111111', '11', 0, 'End', '2021-06-08 10:42:43', '2021-06-08 12:49:57'),
(3, 1, 2, '102', '23/6/21 12:30pm', 'https://www.youtube.com/embed/sOlPhC8LJwQ', '2222222222222222222', '22', 0, 'Starting', '2021-06-08 12:41:51', '2021-06-08 13:11:26'),
(4, 4, 5, '01', '02-08-2021', 'https://www.youtube.com/embed/Q89dmlO6y6s', 'XXZZXXZZ', '123456', 4, 'Starting', '2021-06-16 22:53:19', '2021-06-16 22:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament` bigint(20) UNSIGNED NOT NULL,
  `round_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `tournament`, `round_number`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '2021-06-08 10:22:19', '2021-06-08 10:22:19'),
(4, 5, '1', '2021-06-16 22:50:50', '2021-06-16 22:50:50'),
(5, 5, '2', '2021-06-17 03:06:30', '2021-06-17 03:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tournament_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participate_fee` double DEFAULT NULL,
  `prize_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `poster`, `tournament_name`, `game_name`, `organizer`, `start_date`, `participate_fee`, `prize_description`, `t_status`, `created_at`, `updated_at`) VALUES
(2, 'tournamentsPoster/1623905293.jpeg', 'FreeFire Pro solo', 'FreeFire', 'organizer1@gmail.com', '22/12/21', 150, 'ami tumi r loloi', 'End', '2021-05-29 14:10:39', '2021-06-16 22:48:13'),
(5, 'tournamentsPoster/1623904039.jpeg', 'pubg love', 'PUBG', 'organizer1@gmail.com', '01-08-2021 12.00 pm', 100, '10k wining price for 1st place', 'Started', '2021-06-16 22:27:19', '2021-06-16 22:50:03'),
(6, 'tournamentsPoster/1623904128.jpeg', 'FIFA footbal', 'FIFA 2021', 'organizer1@gmail.com', '01-08-2021 12.00 pm', 200, 'wining price 20K  for 1st place', 'Participation', '2021-06-16 22:28:48', '2021-06-16 22:28:48'),
(7, 'tournamentsPoster/1623905182.jpeg', 'farcry', 'FARCRY', 'organizer1@gmail.com', '01-08-2021 12.00 pm', 200, 'wining price 15K for 1st place', 'Participation', '2021-06-16 22:46:22', '2021-06-16 22:46:22'),
(8, 'tournamentsPoster/1623905251.jpeg', 'call of duty', 'CALL OF DUTY', 'organizer1@gmail.com', '01-08-2021 12.00 pm', 200, 'iudshfguedrhjgfieg rueud', 'Participation', '2021-06-16 22:47:31', '2021-06-16 22:47:31'),
(9, 'tournamentsPoster/1623920490.jpeg', 'pubg lovegh', 'PUBG', 'organizer1@gmail.com', '01-08-2021 12.00 pm', 100, 'hdsfh', 'Participation', '2021-06-17 03:01:30', '2021-06-17 03:01:30');

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
  `brance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `organizer` tinyint(1) NOT NULL DEFAULT 0,
  `account` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `brance`, `admin`, `organizer`, `account`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'gamehub@gmail.com', NULL, '$2y$10$huM8vV6bngmCz16d6qPO7uSewXTTcYMaizEe7Hgv9ZDJnLAKU1I..', NULL, 1, 0, 0, NULL, '2021-05-29 07:23:53', '2021-05-29 07:23:53'),
(12, 'organizer1', 'organizer1@gmail.com', NULL, '$2y$10$SOyCnUl9qx7Hyaec2X.fIOz0ooKeIEV2PQLKx4LfP04jE9f/ppxje', NULL, 0, 1, 0, NULL, '2021-06-16 22:11:40', '2021-06-16 22:11:40'),
(13, 'gamer1', 'gamer1@gmail.com', NULL, '$2y$10$Z.zwgpMk6bmz2vsI5PraUexG1BKaoBjmOqFjZqVvK6e4MEd5tgiFm', NULL, 0, 0, 0, NULL, '2021-06-16 22:30:23', '2021-06-16 22:30:23'),
(14, 'gamer2', 'gamer2@gmail.com', NULL, '$2y$10$05sZJZI85E1CJJq5885FyucXQKZWhuERzeUD4L2tyh2WKz08dWvIK', NULL, 0, 0, 0, NULL, '2021-06-16 22:33:51', '2021-06-16 22:33:51'),
(15, 'gamer3', 'gamer3@gmail.com', NULL, '$2y$10$mQPvYgteYs.gTk5YG1T05eMMcKbC0MpjcKQXxUjqDHkd6hMJMtU0O', NULL, 0, 0, 0, NULL, '2021-06-16 22:38:29', '2021-06-16 22:38:29'),
(16, 'gamer4', 'gamer4@gmail.com', NULL, '$2y$10$P3Pkq/jHQWUrKWNfUjSsg.P8Nmjf3Fow5xIEpNUD4vSmZxw3F/u96', NULL, 0, 0, 0, NULL, '2021-06-16 22:39:51', '2021-06-16 22:39:51'),
(17, 'gamer5', 'gamer5@gmail.com', NULL, '$2y$10$SDt1OrC5S4fpwyMTU3d1tObg8Bu5D2rIVK4IrBLp8EGeCkq3rlTmi', NULL, 0, 0, 0, NULL, '2021-06-16 22:40:54', '2021-06-16 22:40:54'),
(18, 'gamer6', 'gamer6@gmail.com', NULL, '$2y$10$8RQSSu0j3LUT0e7zKNyggOvGVZ2Q9K1MFXMOxB/v0RPcjC.TAlsrS', NULL, 0, 0, 0, NULL, '2021-06-16 22:41:43', '2021-06-16 22:41:43'),
(19, 'gamer7', 'gamer7@gmail.com', NULL, '$2y$10$vf9bf9QEECdfdlRMc/w8A.YtipHwQAPRzFw.gVHKyaZDkFh64EoM6', NULL, 0, 0, 0, NULL, '2021-06-16 22:43:26', '2021-06-16 22:43:26'),
(20, 'gamer8', 'gamer8@gmail.com', NULL, '$2y$10$bzItNDN/K6Z871Vv9h/QxuSlwmFPM.rPj//NOtZoRnYKP2TGV.EeO', NULL, 0, 0, 0, NULL, '2021-06-16 22:44:28', '2021-06-16 22:44:28'),
(21, 'gamer9', 'gamer9@gmail.com', NULL, '$2y$10$MzMCgn.U2JrNngBms7N2n.jSqBqjHiJaq824j1TtFRBrqBgRWbREm', NULL, 0, 0, 0, NULL, '2021-06-16 22:45:10', '2021-06-16 22:45:10'),
(22, 'organizer2@gmail.com', 'organizer2@gmail.com', NULL, '$2y$10$sIjdluL9qbBd24BSHVXY/Onp3TcsQcqM8AoEafYuga9kR.Oxh4l.i', NULL, 0, 1, 0, NULL, '2021-06-17 01:55:24', '2021-06-17 01:55:24'),
(23, 'gamer10', 'gamer10@gmail.com', NULL, '$2y$10$rzJjNyTihq8dckVkWO7M/ODdIDroHy1HHRVKeiSb9ASwPXrDeAX8.', NULL, 0, 0, 0, NULL, '2021-06-17 02:56:30', '2021-06-17 02:56:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_games`
--
ALTER TABLE `add_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamers`
--
ALTER TABLE `gamers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gamers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizers_email_unique` (`email`);

--
-- Indexes for table `participates`
--
ALTER TABLE `participates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participates_tournament_foreign` (`tournament`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `play_grounds`
--
ALTER TABLE `play_grounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `play_grounds_round_foreign` (`round`),
  ADD KEY `play_grounds_tournament_foreign` (`tournament`),
  ADD KEY `play_grounds_room_foreign` (`room`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_round_foreign` (`round`),
  ADD KEY `rooms_tournament_foreign` (`tournament`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rounds_tournament_foreign` (`tournament`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
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
-- AUTO_INCREMENT for table `add_games`
--
ALTER TABLE `add_games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamers`
--
ALTER TABLE `gamers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `participates`
--
ALTER TABLE `participates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `play_grounds`
--
ALTER TABLE `play_grounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_tournament_foreign` FOREIGN KEY (`tournament`) REFERENCES `tournaments` (`id`);

--
-- Constraints for table `play_grounds`
--
ALTER TABLE `play_grounds`
  ADD CONSTRAINT `play_grounds_room_foreign` FOREIGN KEY (`room`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `play_grounds_round_foreign` FOREIGN KEY (`round`) REFERENCES `rounds` (`id`),
  ADD CONSTRAINT `play_grounds_tournament_foreign` FOREIGN KEY (`tournament`) REFERENCES `tournaments` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_round_foreign` FOREIGN KEY (`round`) REFERENCES `rounds` (`id`),
  ADD CONSTRAINT `rooms_tournament_foreign` FOREIGN KEY (`tournament`) REFERENCES `tournaments` (`id`);

--
-- Constraints for table `rounds`
--
ALTER TABLE `rounds`
  ADD CONSTRAINT `rounds_tournament_foreign` FOREIGN KEY (`tournament`) REFERENCES `tournaments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
