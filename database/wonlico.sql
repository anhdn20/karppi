-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 03:53 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wonlico`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(500) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `description`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'minh', 'đẹp trai', '667a8db45bd4998ac0c5_2023-04-08-17.jpg', 0, '2023-04-08 00:00:00', '2023-04-08 17:37:38'),
(2, 'nhật anh', 'khoai bé', 'anh.png', 1, '2023-04-08 00:00:00', '2023-04-08 17:37:32'),
(3, 'riot', '<p>dâdd</p>', '667a8db45bd4998ac0c5_2023-04-08-17.jpg', 0, '2023-04-08 17:37:55', '2023-04-08 17:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `actor_relation`
--

CREATE TABLE `actor_relation` (
  `id` int(12) NOT NULL,
  `actor_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor_relation`
--

INSERT INTO `actor_relation` (`id`, `actor_id`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, NULL),
(2, 1, 8, 0, '2023-04-08 17:16:01', '2023-04-08 17:16:01'),
(3, 2, 8, 0, '2023-04-08 17:16:01', '2023-04-08 17:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `url_direction` varchar(1000) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `type` enum('logo','top-home','slice-home','left-detail','right-detail','wish-list') NOT NULL DEFAULT 'slice-home',
  `prioritize` int(12) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `url_direction`, `date_start`, `date_end`, `type`, `prioritize`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'banner home slicesss', 'z4247540219780_35988bd184edbb69c3b9eb9da3c80e54_2023-04-08-13.jpg', NULL, '2023-04-07 00:00:00', '2023-04-14 00:00:00', 'slice-home', 1, '2023-04-08 00:00:00', '2023-04-12 22:41:42', 1),
(2, 'dưqd', '667a8db45bd4998ac0c5_2023-04-08-13.jpg', NULL, '2023-04-08 13:38:00', '2023-04-26 13:38:00', 'logo', 11, '2023-04-08 13:39:01', '2023-04-14 22:03:43', 1),
(3, 'dưqd', 'aee36630289eebc0b28f_2023-04-08-13.jpg', NULL, '2023-04-08 13:41:00', '2023-04-27 13:41:00', 'top-home', 11, '2023-04-08 13:42:00', '2023-04-12 22:41:40', 1),
(5, 'slide', 'hinh-nen-slide-mo-dau-1-1536x864_2023-04-12-22.jpg', NULL, '2023-04-11 22:41:00', '2023-04-14 22:42:00', 'slice-home', 1, '2023-04-12 22:42:10', '2023-04-12 22:42:10', 0),
(6, 'slide1', 'hinh-nen-slide-mo-dau-1-1536x864_2023-04-12-22.jpg', NULL, '2023-04-11 22:42:00', '2023-04-13 22:42:00', 'slice-home', 2, '2023-04-12 22:42:28', '2023-04-12 22:42:36', 0),
(7, 'slide1', 'hinh-nen-slide-mo-dau-1-1536x864_2023-04-12-22.jpg', NULL, '2023-04-12 22:42:00', '2023-04-13 22:42:00', 'left-detail', 2, '2023-04-12 22:42:28', '2023-04-12 22:57:29', 0),
(9, 'riot', 'hinh-nen-slide-mo-dau-1-1536x864_2023-04-15-16.jpg', NULL, '2023-04-18 00:00:00', '2023-04-20 00:00:00', 'top-home', 1, '2023-04-15 16:16:47', '2023-04-15 16:17:29', 0),
(10, 'riot', 'hinh-nen-slide-mo-dau-1-1536x864_2023-04-15-16.jpg', 'https://www.facebook.com/', '2023-04-19 00:00:00', '2023-04-29 00:00:00', 'slice-home', 1, '2023-04-15 16:17:46', '2023-04-15 16:22:00', 0),
(11, 'minh', 'hinh-nen-slide-mo-dau-1-1536x864_2023-04-15-16.jpg', 'https://www.facebook.com/', '2023-03-29 00:00:00', '2023-04-21 00:00:00', 'top-home', 2, '2023-04-15 16:22:21', '2023-04-15 16:22:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Television', 'tv', 'tivi', 0, '2023-03-11 00:00:00', '2023-03-11 00:00:00'),
(2, 'Movies', 'moives', 'tivi', 0, '2023-03-11 00:00:00', '2023-03-11 00:00:00'),
(3, 'OVAs', 'ovas', 'tivi', 0, '2023-03-11 00:00:00', '2023-03-11 14:12:35'),
(6, 'All', 'all', 'test', 0, '2023-03-11 13:54:24', '2023-03-11 14:12:31'),
(7, 'test', 'test', '&lt;p&gt;oke chưa ạ&lt;/p&gt;', 1, '2023-04-04 22:24:56', '2023-04-04 22:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `name`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'banner home slice', 'aee36630289eebc0b28f_2023-04-08-13.jpg', 1, '2023-03-12 00:00:00', '2023-04-08 13:27:47'),
(2, 'computer', 'https://w7.pngwing.com/pngs/314/584/png-transparent-computer-icons-video-display-resolution-others-angle-text-rectangle-thumbnail.png', 0, '2023-03-12 00:00:00', NULL),
(3, 'bilibili Global', 'https://u.livechart.me/streaming_service/245/logo/7be3703ea2394cf6f80065b4e07f6c10.png?style=small&format=png', 0, '2023-03-12 00:00:00', NULL),
(4, 'iQIYI', 'OIP_2023-04-08-12.jpg', 0, '2023-03-12 00:00:00', '2023-04-08 12:33:59'),
(5, 'test nha', 'Logo-Test_2023-04-04-22.png', 1, '2023-04-04 22:35:32', '2023-04-04 22:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `channel_relation`
--

CREATE TABLE `channel_relation` (
  `id` int(12) NOT NULL,
  `channel_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `direction_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('icon','channel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channel_relation`
--

INSERT INTO `channel_relation` (`id`, `channel_id`, `product_id`, `direction_url`, `type`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'https://one-piece.com/comicsanime/anime.html', 'icon', 0, '2023-03-12 00:00:00', NULL),
(2, 1, 2, 'https://vinlandsaga.jp/', 'icon', 0, '2023-03-12 00:00:00', NULL),
(3, 2, 2, 'https://anilist.co/anime/136430', 'icon', 0, '2023-03-12 00:00:00', NULL),
(4, 3, 1, 'https://www.bilibili.tv/media/37976/', 'channel', 0, '2023-03-12 00:00:00', NULL),
(5, 4, 1, 'https://www.iq.com/album/1qi9i4q31qs', 'channel', 0, '2023-03-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'màu đỏ', '#ff0000', 1, '2023-04-11 16:55:18', '2023-04-11 17:11:52');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_list`
--

CREATE TABLE `my_list` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `product_id_list` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_list`
--

INSERT INTO `my_list` (`id`, `name`, `user_id`, `product_id_list`, `is_public`, `is_deleted`, `created_at`, `updated_at`) VALUES
(17, 'aaa', 3, '2,1', 0, 0, '2023-04-08 13:44:16', '2023-04-08 13:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `my_list_share`
--

CREATE TABLE `my_list_share` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `user_id_share` int(12) DEFAULT NULL,
  `my_list_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(12) NOT NULL,
  `product_id` int(12) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(12) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studio_id` int(12) DEFAULT NULL,
  `season_id` int(12) DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `avg_rating` float DEFAULT NULL,
  `title_headline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_headline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_headline` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_headline` datetime DEFAULT NULL,
  `category_id` int(12) DEFAULT NULL,
  `website` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtags` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `image`, `schedule`, `studio_id`, `season_id`, `short_description`, `avg_rating`, `title_headline`, `image_headline`, `source_headline`, `schedule_headline`, `category_id`, `website`, `twitter`, `hashtags`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'One Piece', 'https://u.livechart.me/anime/321/poster_image/b121b16f4061e35e27b6d758b2e9503a.jpg?style=small&format=jpg', NULL, 1, 1, 'Monkey. D. Luffy refuses to let anyone or anything stand in the way of his quest to become the king of all pirates. With a course charted for the treacherous waters of the Grand Line and beyond, this is one captain who\'ll never give up until he\'s claimed the greatest treasure on Earth: the Legendary One Piece!\r\n\r\n[Source: Funimation]', 8.9, 'One Piece', 'https://u.livechart.me/anime/321/poster_image/b121b16f4061e35e27b6d758b2e9503a.jpg?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', NULL),
(2, 'VINLAND SAGA SEASON 2', 'https://u.livechart.me/anime/10618/poster_image/105965dab085d77633713d18c74b6280.webp?style=small&format=jpg', '2023-03-11 00:00:00', 2, 2, 'A new millennium begins', 10, 'VINLAND SAGA SEASON 2', 'https://u.livechart.me/anime/10618/poster_image/105965dab085d77633713d18c74b6280.webp?style=small&format=jpg', 'youtube.com', '2023-03-13 00:00:00', 1, NULL, NULL, NULL, 0, '2023-03-11 00:00:00', '2023-04-16 21:19:51'),
(3, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4938/poster_image/f0c39fb6d7bcb5aac913f772b1b07a52.jpg?style=small&format=jpg', '2023-04-19 00:00:00', 2, 2, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 8.9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/321/poster_image/b121b16f4061e35e27b6d758b2e9503a.jpg?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', NULL),
(4, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 2, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', NULL),
(5, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', NULL),
(6, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', NULL),
(7, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', NULL),
(8, 'One Piece Movie 1s', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 0, '2023-03-11 00:00:00', '2023-04-08 17:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(12) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '1', 0, '2023-03-12 00:00:00', NULL),
(2, '2', 0, '2023-03-12 00:00:00', NULL),
(3, '3', 0, '2023-03-12 00:00:00', NULL),
(4, '4', 0, '2023-03-12 00:00:00', NULL),
(5, '5', 0, '2023-03-12 00:00:00', NULL),
(6, '6', 0, '2023-03-12 00:00:00', NULL),
(7, '7', 0, '2023-03-12 00:00:00', NULL),
(8, '8', 0, '2023-03-12 00:00:00', NULL),
(9, '9', 0, '2023-03-12 00:00:00', NULL),
(10, '10', 0, '2023-03-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int(12) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(12) NOT NULL DEFAULT '0',
  `time_start` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `name`, `slug`, `year`, `order`, `time_start`, `time_end`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Winter', 'winter-2022', '2022', 0, '2023-01-01 00:00:00', '2023-03-31 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(2, 'Spring', 'spring-2023', '2023', 1, '2023-04-01 00:00:00', '2023-06-30 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(3, 'Summer', 'summer-2023', '2023', 2, '2023-04-01 00:00:00', '2023-06-30 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(4, 'Fall', 'fall-2023', '2023', 3, '2023-04-01 00:00:00', '2023-06-30 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(5, 'TBA', 'tba-2023', '2023', 4, '2023-04-01 00:00:00', '2023-06-30 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(6, 'Winter', 'winter-2023', '2023', 0, '2024-01-01 00:00:00', '2024-03-31 00:00:00', 0, '2023-03-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id`, `name`, `description`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Toei Animation', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', 'https://u.livechart.me/studio/124/logo/8792977088bcc305e6184fd8fa2fed38.svg?style=small&format=png', 0, '2023-03-12 00:00:00', NULL),
(2, 'MAPPA', 'MAPPA', 'https://u.livechart.me/studio/67/logo/b5d64d052f607e976c8dc90b8b43cb25.png?style=small&format=png', 0, '2023-03-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Action', 0, '2023-03-11 00:00:00', NULL),
(2, 'Adventure', 0, '2023-03-11 00:00:00', NULL),
(3, 'Superpower', 0, '2023-03-11 00:00:00', NULL),
(4, 'Shounen', 0, '2023-03-11 00:00:00', NULL),
(5, 'Fantasy', 0, '2023-03-11 00:00:00', NULL),
(6, 'Drama', 0, '2023-03-11 00:00:00', NULL),
(7, 'Comedy', 0, '2023-03-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_relation`
--

CREATE TABLE `tag_relation` (
  `id` int(12) NOT NULL,
  `tag_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_relation`
--

INSERT INTO `tag_relation` (`id`, `tag_id`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2023-03-11 00:00:00', NULL),
(2, 2, 1, 0, NULL, NULL),
(3, 3, 1, 0, NULL, NULL),
(4, 4, 1, 0, NULL, NULL),
(5, 5, 1, 0, NULL, NULL),
(6, 6, 1, 0, NULL, NULL),
(7, 1, 2, 0, '2023-03-11 00:00:00', NULL),
(8, 2, 2, 0, NULL, NULL),
(9, 3, 2, 0, NULL, NULL),
(10, 4, 2, 0, NULL, NULL),
(11, 5, 2, 0, NULL, NULL),
(12, 1, 8, 0, '2023-04-08 17:16:01', '2023-04-08 17:16:01'),
(13, 2, 8, 0, '2023-04-08 17:16:01', '2023-04-08 17:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`id`, `name`, `background_image`, `video_url`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'one piece', 'https://i.ytimg.com/vi/fuLiZKQ4TCw/maxresdefault.jpg', 'https://www.youtube.com/embed/fuLiZKQ4TCw?origin=www.livechart.me&rel=0&autoplay=1&api=postMessage&enablejsapi=1', 1, 0, '2023-03-12 00:00:00', NULL),
(2, 'one pieces', 'https://i.ytimg.com/vi/fuLiZKQ4TCw/maxresdefault.jpg', 'https://www.youtube.com/embed/fuLiZKQ4TCw?origin=www.livechart.me&rel=0&autoplay=1&api=postMessage&enablejsapi=1', 1, 0, '2023-03-12 00:00:00', NULL),
(3, 'one piecesadsa', 'https://i.ytimg.com/vi/fuLiZKQ4TCw/maxresdefault.jpg', 'https://www.youtube.com/embed/fuLiZKQ4TCw?origin=www.livechart.me&rel=0&autoplay=1&api=postMessage&enablejsapi=1', 1, 0, '2023-03-12 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `birthday`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'riot', 'trinhhdp@fpt.com.vn', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, '2023-03-18 00:49:45', '2023-03-18 00:49:45'),
(3, 'minhdevtry', 'nguyenhuynhminh1108@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-03-18 07:56:19', '2023-03-18 07:56:19'),
(4, 'minhdevtry', 'anhdev@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-01 14:20:43', '2023-04-01 14:20:43'),
(5, 'riotâ', 'nguyenhuynhminh1108aa@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-11 17:27:44', '2023-04-11 17:27:44'),
(6, 'minh', 'nguyenhuynhminh1108d@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-11 17:29:13', '2023-04-11 17:29:13'),
(7, 'minhdevtry', 'nguyenhuynhminh1108z@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-11 17:30:08', '2023-04-11 17:30:08'),
(8, 'dqwdwq', 'nguyenhuynhminh1108qqq@gmail.com', '2023-04-06', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-11 17:30:56', '2023-04-11 17:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE `user_rating` (
  `id` int(12) NOT NULL,
  `rating_id` int(12) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_rating`
--

INSERT INTO `user_rating` (`id`, `rating_id`, `user_id`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1, 0, '2023-03-12 00:00:00', NULL),
(12, 10, 3, 2, 0, '2023-04-16 21:19:51', '2023-04-16 21:19:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actor_relation`
--
ALTER TABLE `actor_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_relation`
--
ALTER TABLE `channel_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
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
-- Indexes for table `my_list`
--
ALTER TABLE `my_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_list_share`
--
ALTER TABLE `my_list_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_relation`
--
ALTER TABLE `tag_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actor_relation`
--
ALTER TABLE `actor_relation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `channel_relation`
--
ALTER TABLE `channel_relation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `my_list`
--
ALTER TABLE `my_list`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `my_list_share`
--
ALTER TABLE `my_list_share`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag_relation`
--
ALTER TABLE `tag_relation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
