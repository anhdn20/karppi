-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 10, 2023 lúc 03:53 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wonlico`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actors`
--

CREATE TABLE `actors` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actor_relation`
--

CREATE TABLE `actor_relation` (
  `id` int(12) NOT NULL,
  `actor_id` int(12) DEFAULT NULL,
  `product_id` int(12) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(12) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `type` enum('bg-site','logo','top-home','slice-home','left-detail','right-detail') NOT NULL DEFAULT 'slice-home',
  `prioritize` int(12) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `date_start`, `date_end`, `type`, `prioritize`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'bgsite', 'background-anime_2023-04-15-18.jpg', '2023-03-27 00:00:00', '2023-04-29 00:00:00', 'bg-site', 1, '2023-04-15 18:02:41', '2023-04-15 18:13:42', 1),
(2, 'asd', '4_2023-04-14-17_2023-04-15-21.png', '2023-04-19 00:00:00', '2023-04-27 00:00:00', 'logo', 1, '2023-04-15 21:48:38', '2023-04-15 21:49:05', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Television', 'tv', 'tivi', 0, '2023-03-11 00:00:00', '2023-03-11 00:00:00'),
(2, 'Movies', 'moives', 'tivi', 0, '2023-03-11 00:00:00', '2023-03-11 00:00:00'),
(3, 'OVAs', 'ovas', 'tivi', 0, '2023-03-11 00:00:00', '2023-03-11 14:12:35'),
(6, 'All', 'all', 'test', 0, '2023-03-11 13:54:24', '2023-03-11 14:12:31'),
(7, 'test', 'test', '&lt;p&gt;oke chưa ạ&lt;/p&gt;', 1, '2023-04-04 22:24:56', '2023-04-04 22:31:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `channel`
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
-- Đang đổ dữ liệu cho bảng `channel`
--

INSERT INTO `channel` (`id`, `name`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'cdn', 'https://cdn-icons-png.flaticon.com/512/1383/1383676.png', 1, '2023-03-12 00:00:00', '2023-04-07 12:15:04'),
(2, 'computer', 'https://w7.pngwing.com/pngs/314/584/png-transparent-computer-icons-video-display-resolution-others-angle-text-rectangle-thumbnail.png', 1, '2023-03-12 00:00:00', '2023-04-07 12:15:03'),
(3, 'bilibili Global', 'https://u.livechart.me/streaming_service/245/logo/7be3703ea2394cf6f80065b4e07f6c10.png?style=small&format=png', 1, '2023-03-12 00:00:00', '2023-04-07 12:15:01'),
(4, 'iQIYI', 'https://u.livechart.me/streaming_service/135/logo/33e6fe00497d1fc5baf3be84cd52a2e2.png?style=small&format=png', 1, '2023-03-12 00:00:00', '2023-04-07 12:15:00'),
(5, 'test nha', 'Logo-Test_2023-04-04-22.png', 1, '2023-04-04 22:35:32', '2023-04-04 22:35:35'),
(6, 'FPT Play', 'FPT_2023-04-07-13.png', 0, '2023-04-07 12:16:16', '2023-04-07 13:31:30'),
(7, 'DANET', 'DANET_2023-04-07-17.png', 0, '2023-04-07 12:17:53', '2023-04-07 17:14:14'),
(8, 'MUSE VN', 'MUSE_2023-04-07-13.png', 0, '2023-04-07 13:31:44', '2023-04-07 13:31:44'),
(9, 'BILIBILI VN', 'BILI_2023-04-07-13.png', 0, '2023-04-07 13:32:18', '2023-04-07 13:32:18'),
(10, 'NETFLIX', 'Netflix_2023-04-07-13.png', 0, '2023-04-07 13:33:02', '2023-04-07 13:33:02'),
(11, 'IQ', 'IQU_2023-04-12-00.png', 0, '2023-04-12 00:37:27', '2023-04-12 00:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `channel_relation`
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
-- Đang đổ dữ liệu cho bảng `channel_relation`
--

INSERT INTO `channel_relation` (`id`, `channel_id`, `product_id`, `direction_url`, `type`, `is_deleted`, `created_at`, `updated_at`) VALUES
(62, 6, 12, 'https://fptplay.vn/xem-video/anh-chang-bang-gia-va-co-nang-lanh-lung-the-ice-guy-and-his-cool-female-colleague-63b53f98a3daa084f1053517', 'icon', 0, '2023-04-07 16:37:52', '2023-04-07 16:37:52'),
(63, 7, 12, 'danet.vn', 'channel', 0, '2023-04-07 16:37:52', '2023-04-07 16:37:52'),
(64, 7, 12, 'danet.vn', 'icon', 0, '2023-04-07 16:37:52', '2023-04-07 16:37:52'),
(65, 6, 11, 'https://fptplay.vn/xem-video/thien-su-nha-ben-the-angel-next-door-spoils-me-rotten-63bc4680b39be45805421f38', 'icon', 0, '2023-04-07 16:38:42', '2023-04-07 16:38:42'),
(66, 7, 11, 'danet.vn', 'channel', 0, '2023-04-07 16:38:42', '2023-04-07 16:38:42'),
(67, 7, 11, 'danet.vn', 'icon', 0, '2023-04-07 16:38:42', '2023-04-07 16:38:42'),
(68, 10, 11, 'netflix.com', 'icon', 0, '2023-04-07 16:38:42', '2023-04-07 16:38:42'),
(69, 6, 10, 'https://fptplay.vn/xem-video/tho-san-quy-chainsaw-man-640ee5f27abb45d6602e7625', 'icon', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(70, 7, 10, 'https://danet.vn/video/hoc-vien-anh-hung-5-du-cho-xuong-dia-nguc-cung-phai-cuoi-1659331010', 'channel', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(71, 7, 10, 'https://danet.vn/', 'icon', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(72, 6, 10, 'https://fptplay.vn/xem-video/hoc-vien-anh-hung-phan-6-63356a6300cb4c271c9af106', 'channel', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(73, 10, 10, 'https://www.netflix.com/vn-en/title/81215627', 'icon', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(74, 9, 10, 'https://www.bilibili.tv/', 'icon', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(75, 8, 10, 'https://www.youtube.com/channel/UCott96qGP5ADmsB_yNQMvDA', 'icon', 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(76, 6, 13, 'https://fptplay.vn/xem-video/dac-nhiem-tham-tu-phan-4-bungou-stray-dogs-season-4-63b8f37e57fda46b839fbd0c', 'icon', 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(77, 7, 13, 'https://danet.vn/video/hoc-vien-anh-hung-5-du-cho-xuong-dia-nguc-cung-phai-cuoi-1659331010', 'channel', 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(78, 7, 13, 'https://danet.vn/', 'icon', 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(79, 6, 13, 'https://fptplay.vn/xem-video/hoc-vien-anh-hung-phan-6-63356a6300cb4c271c9af106', 'channel', 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(80, 10, 13, 'https://www.netflix.com/vn/browse/genre/7424', 'icon', 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(81, 9, 13, 'https://www.bilibili.tv/', 'icon', 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(87, 6, 16, 'https://fptplay.vn/xem-video/lam-lai-cuoc-doi-relife-577a0e2217dc1352af43e88c', 'icon', 0, '2023-04-07 17:23:33', '2023-04-07 17:23:33'),
(88, 9, 16, 'bilibili.tv', 'icon', 0, '2023-04-07 17:23:33', '2023-04-07 17:23:33'),
(89, 10, 16, 'netflix.com', 'icon', 0, '2023-04-07 17:23:33', '2023-04-07 17:23:33'),
(90, 8, 16, 'https://www.youtube.com/channel/UCott96qGP5ADmsB_yNQMvDA', 'icon', 0, '2023-04-07 17:23:33', '2023-04-07 17:23:33'),
(105, 6, 9, 'https://fptplay.vn/xem-video/hoc-vien-anh-hung-phan-6-63356a6300cb4c271c9af106', 'icon', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(106, 7, 9, 'https://danet.vn/video/hoc-vien-anh-hung-5-du-cho-xuong-dia-nguc-cung-phai-cuoi-1659331010', 'channel', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(107, 7, 9, 'https://danet.vn/video/hoc-vien-anh-hung-5-du-cho-xuong-dia-nguc-cung-phai-cuoi-1659331010', 'icon', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(108, 6, 9, 'https://fptplay.vn/xem-video/hoc-vien-anh-hung-phan-6-63356a6300cb4c271c9af106', 'channel', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(109, 10, 9, 'https://about.netflix.com/vi/news/netflix-boards-my-hero-academia-feature-film-from-legendary-entertainment', 'icon', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(110, 9, 9, 'https://www.bilibili.tv/', 'icon', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(111, 8, 9, 'https://www.youtube.com/channel/UCott96qGP5ADmsB_yNQMvDA', 'icon', 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(136, 6, 15, 'https://fptplay.vn/tim-kiem/thanh%20g%C6%B0%C6%A1m%20di%E1%BB%87t%20qu%E1%BB%B7', 'icon', 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(137, 6, 15, 'https://fptplay.vn/tim-kiem/thanh%20g%C6%B0%C6%A1m%20di%E1%BB%87t%20qu%E1%BB%B7', 'channel', 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(138, 10, 15, 'https://www.netflix.com/search?q=l%C3%A0ng%20th%E1%BB%A3%20r%C3%A8n&jbv=81091393', 'icon', 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(139, 11, 15, 'https://www.iq.com/play/thanh-guom-diet-quy-lang-tho-ren-tap-1-2frny7s41kw?lang=vi_vn', 'icon', 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(140, 9, 15, 'https://www.bilibili.tv/vi/play/2079053', 'icon', 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(145, 6, 14, 'https://fptplay.vn/xem-video/lang-nu-va-hoang-tu-hac-am-wolf-girl-and-black-prince-565e562617dc130a15f4ea93', 'icon', 0, '2023-04-12 02:44:31', '2023-04-12 02:44:31'),
(146, 10, 14, 'https://www.netflix.com/vn/browse/genre/7424', 'icon', 0, '2023-04-12 02:44:31', '2023-04-12 02:44:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
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
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'theme-color', '#2c2a7e', 0, '2023-04-14 15:49:16', '2023-04-15 04:07:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `my_list`
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
-- Đang đổ dữ liệu cho bảng `my_list`
--

INSERT INTO `my_list` (`id`, `name`, `user_id`, `product_id_list`, `is_public`, `is_deleted`, `created_at`, `updated_at`) VALUES
(17, 'minh', 3, '2,3,7,9', 0, 0, '2023-04-06 16:11:09', '2023-04-07 14:14:23'),
(18, 'S1', 7, '10', 0, 0, '2023-04-10 15:09:50', '2023-04-10 15:34:34'),
(19, 'S2', 7, '', 0, 0, '2023-04-10 15:10:01', '2023-04-10 15:34:34'),
(20, 'minh', 6, '9,14,11', 0, 0, '2023-04-10 15:10:06', '2023-04-10 15:12:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `my_list_share`
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
-- Cấu trúc bảng cho bảng `note`
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
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `image`, `schedule`, `studio_id`, `season_id`, `short_description`, `avg_rating`, `title_headline`, `image_headline`, `source_headline`, `schedule_headline`, `category_id`, `website`, `twitter`, `hashtags`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'One Piece', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', '2023-03-11 00:00:00', 1, 1, 'Monkey. D. Luffy refuses to let anyone or anything stand in the way of his quest to become the king of all pirates. With a course charted for the treacherous waters of the Grand Line and beyond, this is one captain who\'ll never give up until he\'s claimed the greatest treasure on Earth: the Legendary One Piece!\r\n\r\n[Source: Funimation]', 7, 'One Piece', 'https://u.livechart.me/anime/321/poster_image/b121b16f4061e35e27b6d758b2e9503a.jpg?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:33'),
(2, 'VINLAND SAGA SEASON 2', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', '2023-03-11 00:00:00', 2, 2, 'A new millennium begins', 9.2, 'VINLAND SAGA SEASON 2', 'https://u.livechart.me/anime/10618/poster_image/105965dab085d77633713d18c74b6280.webp?style=small&format=jpg', 'youtube.com', '2023-03-13 00:00:00', 1, NULL, NULL, NULL, 1, '2023-03-11 00:00:00', '2023-04-07 13:35:22'),
(3, 'One Piece: Taose! Kaizoku Ganzack', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 8.9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/321/poster_image/b121b16f4061e35e27b6d758b2e9503a.jpg?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:35'),
(4, 'One Piece Movie 1', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 2, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:37'),
(5, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:39'),
(6, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:41'),
(7, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 9, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:43'),
(8, 'One Piece Movie 1', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', '2023-04-19 00:00:00', 1, 1, 'While Luffy and his crew of Zoro and Nami are starving on their small boat, they are attacked by a large monster. Nami is taken away, while Luffy and Zoro wash up on shore. There they meet a young girl, Medaka, and learn of the sad history of the island. The evil Pirate Ganzack has taken away all the men in the village and enslaved them, including Medaka\'s father. Now Luffy, Zoro, and Medaka must infiltrate Ganzack\'s base in order to rescue the villagers and Nami.\r\n\r\n[Source: Anime News Network]', 7, 'One Piece: Taose! Kaizoku Ganzack', 'https://u.livechart.me/anime/4028/poster_image/4c7e8fca9a52c0bdf09bbc1f0a424e13.webp?style=small&format=jpg', 'youtube.com', '2023-03-11 00:00:00', 1, 'one-piece.com', 'OPcom_info', 'ONEPIECE', 1, '2023-03-11 00:00:00', '2023-04-07 12:16:44'),
(9, 'Học Viện Anh Hùng', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', NULL, 3, 2, NULL, 9, 'Học Viện Anh Hùng', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-10 15:10:58'),
(10, 'Thợ Săn Quỷ', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', NULL, 2, 2, '&lt;br&gt;', NULL, 'Thợ Săn Quỷ', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-07 16:35:09'),
(11, 'Thiên Sứ Nhà Bên', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14_2023-04-14-16.png', NULL, 4, 2, NULL, NULL, 'Thiên Sứ Nhà Bên', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-07 14:14:20'),
(12, 'Anh Chàng Băng Giá Và Cô Nàng Lạnh Lùng', 'anh-chang-bang-gia-va-co-nang-lanh-lung-fpt-play-1672809641598_Portrait_origin_2023-04-07-14.png', NULL, 7, 2, NULL, NULL, 'Anh Chàng Băng Giá Và Cô Nàng Lạnh Lùng', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-07 16:35:42'),
(13, 'Đặc Nhiệm Thám Tử Phần 4', 'dac-nhiem-tham-tu-phan-4-fpt-play-1673052768044_Portrait_origin_2023-04-07-14.png', NULL, 3, 2, NULL, NULL, 'Bungou Stray Dogs', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-07 16:35:32'),
(14, 'Lang Nữ Và Hoàng Tử Hắc Ám', 'wolf-girl-and-black-prince17-10-2022_18g54-45_2023-04-07-16.png', NULL, 8, 19, 'Erika Shinohara đ&atilde; n&oacute;i dối về những khai th&aacute;c l&atilde;ng mạn của m&igrave;nh để kiếm được sự t&ocirc;n trọng của những người bạn mới. V&igrave; vậy, khi họ y&ecirc;u cầu một bức ảnh của &quot;bạn trai&quot;, c&ocirc; vội v&atilde; chụp một bức ảnh của một người lạ đẹp trai, người m&agrave; bạn b&egrave; của c&ocirc; nhận ra l&agrave; Kyouya Sata nổi tiếng v&agrave; tốt bụng. Bị mắc kẹt trong mạng lưới dối tr&aacute; của ch&iacute;nh m&igrave;nh v&agrave; cố gắng tr&aacute;nh sự sỉ nhục, Erika giải th&iacute;ch t&igrave;nh trạng kh&oacute; khăn của c&ocirc; với Kyouya, hy vọng anh sẽ giả vờ l&agrave; bạn trai của c&ocirc;. Nhưng Kyouya kh&ocirc;ng phải l&agrave; thi&ecirc;n thần m&agrave; anh ta xuất hiện: anh ta thực sự l&agrave; một kẻ t&agrave;n bạo c&oacute; &yacute; nghĩa, người buộc Erika phải trở th&agrave;nh &quot;con ch&oacute;&quot; của anh ta để đổi lấy b&iacute; mật của c&ocirc;.', NULL, 'Lang Nữ Và Hoàng Tử Hắc Ám', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-12 02:43:06'),
(15, 'Thanh Gươm Diệt Quỷ - Làng Thợ Rèn', 'Kimetsu_2023-04-12-00.png', NULL, 9, 2, '&lt;p&gt;&lt;br&gt;&lt;/p&gt;', NULL, '鬼滅の刃 刀鍛冶の里編', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2023-04-12 00:46:33'),
(16, 'Làm Lại Cuộc Đời', 'relife18-10-2022_09g36-45_2023-04-07-17.png', NULL, 10, 2, NULL, NULL, 'RE: Life', NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(12) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
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
-- Cấu trúc bảng cho bảng `season`
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
-- Đang đổ dữ liệu cho bảng `season`
--

INSERT INTO `season` (`id`, `name`, `slug`, `year`, `order`, `time_start`, `time_end`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Winter', 'winter-2022', '2022', 0, '2022-01-01 00:00:00', '2022-03-30 00:00:00', 0, '2023-03-11 00:00:00', '2023-04-12 00:58:23'),
(2, 'Spring', 'spring-2023', '2023', 1, '2023-04-01 00:00:00', '2023-06-30 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(3, 'Summer', 'summer-2023', '2023', 2, '2023-07-01 00:00:00', '2023-09-30 00:00:00', 0, '2023-03-11 00:00:00', '2023-04-12 00:55:39'),
(4, 'Fall', 'fall-2023', '2023', 3, '2023-10-01 00:00:00', '2023-09-30 00:00:00', 0, '2023-03-11 00:00:00', '2023-04-12 00:56:26'),
(5, 'TBA', 'tba-2023', '2023', 4, '2023-04-01 00:00:00', '2023-06-30 00:00:00', 0, '2023-03-11 00:00:00', NULL),
(6, 'Winter', 'winter-2023', '2023', 0, '2023-01-01 00:00:00', '2023-03-30 00:00:00', 0, '2023-03-11 00:00:00', '2023-04-12 00:58:54'),
(7, 'Summer', NULL, '2016', 0, '2016-04-01 00:00:00', '2016-05-31 00:00:00', 0, '2023-04-12 00:51:07', '2023-04-12 00:51:07'),
(8, 'Spring', NULL, '2022', 0, '2022-04-01 00:00:00', '2022-06-30 00:00:00', 0, '2023-04-12 00:53:26', '2023-04-12 00:53:26'),
(9, 'Summer', NULL, '2022', 0, '2022-07-01 00:00:00', '2022-09-30 00:00:00', 0, '2023-04-12 01:00:19', '2023-04-12 01:00:19'),
(10, 'Fall', NULL, '2022', 0, '2022-10-01 00:00:00', '2022-12-31 00:00:00', 0, '2023-04-12 01:02:07', '2023-04-12 01:02:07'),
(11, 'Winter', NULL, '2021', 0, '2021-01-01 00:00:00', '2020-03-31 00:00:00', 0, '2023-04-12 01:02:51', '2023-04-12 01:02:51'),
(12, 'Spring', NULL, '2021', 0, '2021-04-01 00:00:00', '2021-06-30 00:00:00', 0, '2023-04-12 01:03:45', '2023-04-12 01:03:45'),
(13, 'Summer', NULL, '2021', 0, '2021-07-01 00:00:00', '2021-09-30 00:00:00', 0, '2023-04-12 01:05:06', '2023-04-12 01:05:06'),
(14, 'Fall', NULL, '2021', 0, '2021-10-01 00:00:00', '2021-12-31 00:00:00', 0, '2023-04-12 01:05:40', '2023-04-12 01:05:40'),
(15, 'Winter', NULL, '2020', 0, '2020-01-01 00:00:00', '2020-03-31 00:00:00', 0, '2023-04-12 01:54:46', '2023-04-12 01:54:46'),
(16, 'Spring', NULL, '2020', 0, '2020-04-01 00:00:00', '2020-06-30 00:00:00', 0, '2023-04-12 02:37:00', '2023-04-12 02:37:00'),
(17, 'Summer', NULL, '2020', 0, '2020-07-01 00:00:00', '2020-09-30 00:00:00', 0, '2023-04-12 02:37:44', '2023-04-12 02:37:44'),
(18, 'Fall', NULL, '2020', 0, '2020-10-01 00:00:00', '2020-12-31 00:00:00', 0, '2023-04-12 02:39:48', '2023-04-12 02:39:48'),
(19, 'Fall', 'fall-2014', '2014', 0, '2014-10-01 00:00:00', '2014-12-31 00:00:00', 0, '2023-04-12 02:41:32', '2023-04-12 02:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `studio`
--

CREATE TABLE `studio` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `studio`
--

INSERT INTO `studio` (`id`, `name`, `description`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Toei Animation', 'TOEI Animation (Toei Animation Co., Ltd.) l&agrave; một studio hoạt h&igrave;nh Nhật Bản thuộc sở hữu của C&ocirc;ng ty TOEI.', '18_2023-04-07-13.png', 0, '2023-03-12 00:00:00', '2023-04-07 13:53:31'),
(2, 'MAPPA', 'Mappa (Mappa Co., Ltd.) l&agrave; một studio hoạt h&igrave;nh Nhật Bản được th&agrave;nh lập bởi Masao Maruyama v&agrave;o th&aacute;ng 6 năm 2011, sau khi anh rời Madhouse.', '569_2023-04-07-13.png', 0, '2023-03-12 00:00:00', '2023-04-07 13:52:32'),
(3, 'Bones', 'TABones (Bones Inc.) l&agrave; một studio hoạt h&igrave;nh Nhật Bản c&oacute; trụ sở tại Suginami, Tokyo.', '4_2023-04-07-13.png', 0, '2023-04-07 13:51:46', '2023-04-07 13:52:40'),
(4, 'Project No.9', '&lt;p&gt;project-no9.com&lt;/p&gt;&lt;p&gt;@projectNo9&lt;br&gt;&lt;/p&gt;', '439_2023-04-07-13.png', 0, '2023-04-07 13:55:31', '2023-04-07 13:55:31'),
(5, 'Wit Studio', '&lt;p&gt;witstudio.co.jp&lt;br&gt;&lt;/p&gt;', '858_2023-04-07-13.png', 0, '2023-04-07 13:59:31', '2023-04-07 13:59:31'),
(6, 'Kyoto Animation', '&lt;p&gt;Kyoto Animation (Kyoto Animation Co., Ltd.) (thường được viết tắt l&agrave; Kyoani) l&agrave; một studio hoạt h&igrave;nh Nhật Bản c&oacute; trụ sở tại Uji, tỉnh Kyoto.&lt;br&gt;&lt;/p&gt;', '2_2023-04-07-14.png', 0, '2023-04-07 14:00:47', '2023-04-07 14:00:47'),
(7, 'Zero-G', '&lt;p&gt;https://zerog2.jp/&lt;br&gt;&lt;/p&gt;', '1379_2023-04-07-14.png', 0, '2023-04-07 14:11:48', '2023-04-07 14:11:48'),
(8, 'TYO Animations', '&lt;p&gt;Tyo Animations (Tyo Animations Inc) l&agrave; t&ecirc;n c&ocirc;ng ty của C&ocirc;ng ty Yumeta (Yumeta CO., Ltd.) Từ ng&agrave;y 1 th&aacute;ng 7 năm 2009 đến ng&agrave;y 1 th&aacute;ng 12 năm 2017.&lt;br&gt;&lt;/p&gt;', '333 (1)_2023-04-07-16.png', 0, '2023-04-07 16:46:36', '2023-04-07 16:46:36'),
(9, 'ufotable', '&lt;p&gt;Ufotable l&agrave; một studio hoạt h&igrave;nh Nhật Bản c&oacute; trụ sở tại Suginami, Tokyo.&lt;br&gt;&lt;/p&gt;', '43_2023-04-07-17.png', 0, '2023-04-07 17:09:02', '2023-04-07 17:09:02'),
(10, 'TMS Entertainment', 'tms-e.co.jp', '73_2023-04-07-17.png', 0, '2023-04-07 17:21:34', '2023-04-07 17:21:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(12) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Action', 0, '2023-03-11 00:00:00', NULL),
(2, 'Adventure', 0, '2023-03-11 00:00:00', NULL),
(3, 'Superpower', 0, '2023-03-11 00:00:00', NULL),
(4, 'Shounen', 0, '2023-03-11 00:00:00', NULL),
(5, 'Fantasy', 0, '2023-03-11 00:00:00', NULL),
(6, 'Drama', 0, '2023-03-11 00:00:00', NULL),
(7, 'Comedy', 0, '2023-03-11 00:00:00', '2023-04-12 00:25:22'),
(8, 'Mystery', 0, '2023-04-12 02:46:23', '2023-04-12 02:46:23'),
(9, 'Romance', 0, '2023-04-12 02:47:02', '2023-04-12 02:47:02'),
(10, 'Game', 0, '2023-04-12 02:48:09', '2023-04-12 02:48:09'),
(11, 'Sport', 0, '2023-04-12 02:48:14', '2023-04-12 02:48:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag_relation`
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
-- Đang đổ dữ liệu cho bảng `tag_relation`
--

INSERT INTO `tag_relation` (`id`, `tag_id`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(110, 7, 12, 0, '2023-04-07 16:37:52', '2023-04-07 16:37:52'),
(111, 6, 11, 0, '2023-04-07 16:38:42', '2023-04-07 16:38:42'),
(112, 7, 11, 0, '2023-04-07 16:38:42', '2023-04-07 16:38:42'),
(113, 3, 10, 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(114, 4, 10, 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(115, 6, 10, 0, '2023-04-07 16:40:05', '2023-04-07 16:40:05'),
(116, 3, 13, 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(117, 6, 13, 0, '2023-04-07 16:42:07', '2023-04-07 16:42:07'),
(122, 6, 16, 0, '2023-04-07 17:23:33', '2023-04-07 17:23:33'),
(123, 7, 16, 0, '2023-04-07 17:23:33', '2023-04-07 17:23:33'),
(130, 3, 9, 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(131, 4, 9, 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(132, 7, 9, 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(151, 1, 15, 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(152, 3, 15, 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(153, 5, 15, 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(156, 7, 14, 0, '2023-04-12 02:44:31', '2023-04-12 02:44:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trailer`
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
-- Đang đổ dữ liệu cho bảng `trailer`
--

INSERT INTO `trailer` (`id`, `name`, `background_image`, `video_url`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(4, '『僕のヒーローアカデミア』ヒロアカ6期PV第5弾「黒いヒーロー編」／OPテーマ：「ぼくらの」Eve／My Heroacademia 6th Season PV 05 \"Dark Hero Arc\"', NULL, 'https://www.youtube.com/watch?v=OmQNta8waA4&ab_channel=TOHOanimation%E3%83%81%E3%83%A3%E3%83%B3%E3%83%8D%E3%83%AB', 9, 0, '2023-04-10 15:05:09', '2023-04-10 15:05:09'),
(11, 'Trailer', NULL, 'https://www.youtube.com/watch?v=a9tq0aS5Zu8&ab_channel=AniplexUSA', 15, 0, '2023-04-12 00:46:33', '2023-04-12 00:46:33'),
(14, 'PV1', NULL, 'https://www.youtube.com/watch?v=uIesYTfKQWw&ab_channel=vapofficial', 14, 0, '2023-04-12 02:44:31', '2023-04-12 02:44:31'),
(15, 'PV2', NULL, 'https://www.youtube.com/watch?v=tZJPQfq2UNk&ab_channel=vapofficial', 14, 0, '2023-04-12 02:44:31', '2023-04-12 02:44:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'root', 'wonlico_admin@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, '2023-03-18 00:49:45', '2023-03-18 00:49:45'),
(3, 'minhdevtry', 'nguyenhuynhminh1108@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-03-18 07:56:19', '2023-03-18 07:56:19'),
(4, 'anhdevtry', 'anhdev@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-01 14:20:43', '2023-04-01 14:20:43'),
(5, 'anhdn42', 'anhdn42@gmail.com', NULL, '4297f44b13955235245b2497399d7a93', NULL, 0, '2023-04-10 15:05:35', '2023-04-10 15:05:35'),
(6, 'test11', 'nguyenhuynhminh11082k1@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 0, '2023-04-10 15:08:53', '2023-04-10 15:08:53'),
(7, 'VoPhong', 'hakimei.toku@gmail.com', NULL, 'fcea920f7412b5da7be0cf42b8c93759', NULL, 0, '2023-04-10 15:09:29', '2023-04-10 15:09:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_rating`
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
-- Đang đổ dữ liệu cho bảng `user_rating`
--

INSERT INTO `user_rating` (`id`, `rating_id`, `user_id`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1, 0, '2023-03-12 00:00:00', NULL),
(4, 7, 3, 8, 0, '2023-04-07 07:37:30', '2023-04-07 07:37:30'),
(5, 9, 7, 9, 0, '2023-04-10 15:10:58', '2023-04-10 15:10:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `actor_relation`
--
ALTER TABLE `actor_relation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `channel_relation`
--
ALTER TABLE `channel_relation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `my_list`
--
ALTER TABLE `my_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `my_list_share`
--
ALTER TABLE `my_list_share`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tag_relation`
--
ALTER TABLE `tag_relation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `actor_relation`
--
ALTER TABLE `actor_relation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `channel_relation`
--
ALTER TABLE `channel_relation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `my_list`
--
ALTER TABLE `my_list`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `my_list_share`
--
ALTER TABLE `my_list_share`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `note`
--
ALTER TABLE `note`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `season`
--
ALTER TABLE `season`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tag_relation`
--
ALTER TABLE `tag_relation`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT cho bảng `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
