-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 10, 2023 lúc 03:58 AM
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
-- Cơ sở dữ liệu: `cludmed`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title_vi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title_vi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title_vi`, `title_en`, `sub_title_vi`, `sub_title_en`, `description_vi`, `description_en`, `slug`, `image`, `icon`, `id_category`, `is_deleted`, `updated_at`, `created_at`) VALUES
(2, 'Premium accommodation', 'Premium accommodation', 'in the most beautiful places​', 'in the most beautiful places​', '&lt;div&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '&lt;div&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', 'premium-accommodation', 'https___nsmed_esap_2023_regional_IMG_MMAC_F122_038_2023-06-03-12.webp', 'png-transparent-computer-icons-sport-icon-design-spor-text-hand-logo_2023-06-06-14.png', 9, 0, '2023-06-03 23:46:30', '2023-06-03 12:37:11'),
(3, 'Sports activities', 'Sports activities', 'with lessons​', 'with lessons​', NULL, NULL, 'sports-activities', 'https___nsmed_esap_2023_regional_IMG_RDPC_B119_077_2023-06-03-12.webp', 'png-transparent-computer-icons-sport-icon-design-spor-text-hand-logo_2023-06-06-14.png', 9, 0, '2023-06-03 12:38:42', '2023-06-03 12:38:15'),
(4, 'Expert childcare', 'Expert childcare', 'from 4 to 17 years​​', 'from 4 to 17 years​​', NULL, NULL, 'expert-childcare', 'https___nsmed_esap_2023_regional_IMG_IXTC_D122_026_2023-06-03-12.webp', 'png-transparent-computer-icons-sport-icon-design-spor-text-hand-logo_2023-06-06-14.png', 9, 0, '2023-06-06 14:10:33', '2023-06-03 12:39:28'),
(5, 'Full board', 'Full board', 'gourmet cuisine​​', 'gourmet cuisine​​', NULL, NULL, 'full-board', 'https___nsmed_esap_2023_regional_IMG_CARC_F121_079_2023-06-03-12.webp', 'png-transparent-computer-icons-sport-icon-design-spor-text-hand-logo_2023-06-06-14.png', 9, 0, '2023-06-03 12:45:21', '2023-06-03 12:45:21'),
(6, 'All day', 'All day', 'open bar', 'open bar', NULL, NULL, 'all-day', 'https___nsmed_esap_2023_regional_IMG_CARC_F121_155_2023-06-03-12.webp', 'png-transparent-computer-icons-sport-icon-design-spor-text-hand-logo_2023-06-06-14.png', 9, 0, '2023-06-03 12:46:13', '2023-06-03 12:46:13'),
(7, 'Daily entertainment &', 'Daily entertainment &', 'theme parties​', 'theme parties​', NULL, NULL, 'daily-entertainment', 'https___nsmed_esap_2020_252_RWD_HP-blocks_all-inclusive_thumb_entertainment_2023-06-03-12.webp', 'png-transparent-computer-icons-sport-icon-design-spor-text-hand-logo_2023-06-06-14.png', 9, 0, '2023-06-03 12:46:33', '2023-06-03 12:46:33'),
(8, 'Beach & Sun Holiday', 'Beach & Sun Holiday', NULL, NULL, NULL, NULL, 'beach-sun-holiday', 'https___nsmed_esap_2023_regional_IMG_ALBC_EC_A122_078_2023-06-03-13.webp', NULL, 10, 0, '2023-06-03 13:27:11', '2023-06-03 13:27:11'),
(9, 'Snow & Ski Holidays​', 'Snow & Ski Holidays​', NULL, NULL, NULL, NULL, 'snow-ski-holidays', 'https___nsmed_esap_2023_regional_IMG_LROC_C119_004_2023-06-03-13.webp', NULL, 10, 0, '2023-06-03 13:40:22', '2023-06-03 13:27:41'),
(10, 'Family Holidays', 'Family Holidays', NULL, NULL, NULL, NULL, 'family-holidays', 'https___nsmed_esap_2023_regional_IMG_PHUC_K122_007_2023-06-03-13.webp', NULL, 10, 0, '2023-06-03 13:28:02', '2023-06-03 13:28:02'),
(11, 'Couple Holidays​', 'Couple Holidays​', NULL, NULL, NULL, NULL, 'couple-holidays', 'https___nsmed_esap_2023_regional_IMG_QCHC_F122_072_2023-06-03-13.webp', NULL, 10, 0, '2023-06-03 13:28:18', '2023-06-03 13:28:18'),
(12, 'Club Med Blog​', 'Club Med Blog​', NULL, NULL, NULL, NULL, 'club-med-blog', 'https___nsmed_esap_2023_regional_IMG_ARPC_F122_005_2023-06-03-13.webp', NULL, 10, 0, '2023-06-03 13:28:37', '2023-06-03 13:28:37'),
(13, 'Exclusive Collection', 'Exclusive Collection', NULL, NULL, '&lt;p&gt;&lt;img style=&quot;width: 300px;&quot; src=&quot;data:image/jpeg;base64,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&quot; data-filename=&quot;https___ns.clubmed.com_esap_2020_252_RWD_HP-blocks_all-inclusive_thumb_entertainment.jpg&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL, 'exclusive-collection', 'https___nsmed_esap_2023_regional_IMG_LIFT_SUN_EC_L119_019_2023-06-03-13.webp', NULL, 10, 0, '2023-06-03 18:22:33', '2023-06-03 13:28:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title_vi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `parent` tinyint(1) DEFAULT '0',
  `slug` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title_vi`, `title_en`, `description_vi`, `description_en`, `parent`, `slug`, `type`, `is_deleted`, `updated_at`, `created_at`) VALUES
(3, 'Châu Á', 'Asia', NULL, NULL, 0, 'chau-a', 0, 0, '2023-06-01 21:35:54', '2023-06-01 21:35:54'),
(4, 'Châu Âu', 'Europe', NULL, NULL, 0, 'chau-au', 0, 0, '2023-06-01 21:36:23', '2023-06-01 21:36:23'),
(6, 'Việt Nam', 'Viet Nam', NULL, NULL, 3, 'viet-nam', 0, 0, '2023-06-01 21:47:02', '2023-06-01 21:47:02'),
(7, 'Thái Lan', 'Thailand', NULL, NULL, 3, 'thai-lan', 0, 0, '2023-06-01 21:51:36', '2023-06-01 21:51:27'),
(8, 'Đức', 'Germany', NULL, NULL, 4, 'duc', 0, 0, '2023-06-01 21:52:36', '2023-06-01 21:52:36'),
(9, 'Cluemed', 'Cluemed', NULL, NULL, 0, 'cluemed', 1, 0, '2023-06-03 12:18:35', '2023-06-03 12:18:35'),
(10, 'Holidays', 'Holidays', NULL, NULL, 0, 'holidays', 1, 0, '2023-06-03 13:26:44', '2023-06-03 13:26:44'),
(11, 'Most popular', 'Most popular', NULL, NULL, 0, 'most-popular', 2, 0, '2023-06-03 17:21:21', '2023-06-03 17:21:21'),
(12, 'Beach & Sun Asia', 'Beach & Sun Asia', 'a', NULL, 0, 'beach-sun-asia', 2, 0, '2023-06-15 14:54:12', '2023-06-04 22:11:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title_vi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title_vi` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title_en` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_btn_vi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_btn_en` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_direction` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('LOGO','BANNER_HOME_HEAD','BANNER_HOME_SECTION','BANNER_CONTACT','BANNER_REVIEW','BANNER_BLOG','BANNER_TOUR') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `title_vi`, `title_en`, `sub_title_vi`, `sub_title_en`, `text_btn_vi`, `text_btn_en`, `image`, `url_direction`, `type`, `is_deleted`, `updated_at`, `created_at`) VALUES
(1, 'zxc', 'xcv', 'xcv', 'xcv', 'xcv', 'xcv', 'Logo-Test_2023-06-03-10.png', 'xcv', 'LOGO', 0, '2023-06-03 10:57:37', '2023-05-31 22:59:56'),
(2, 'Premium All-Inclusive Maldives', 'Premium All-Inclusive Maldives', 'Kids under 4 stay free', 'Kids under 4 stay free', '4D3N from USD 674 /adult', '4D3N from USD 674 /adult', 'https___nsmed_esap_2023_regional_IMG_KANC_J118_028_2023-06-03-11.webp', NULL, 'BANNER_HOME_HEAD', 0, '2023-06-03 11:39:59', '2023-06-03 11:01:42'),
(3, 'Awards and Testimonials', 'Awards and Testimonials', 'What they said about us', 'What they said about us', 'Discover More', 'Discover More', 'https___nsmed_esap_2020_252_RWD_Others_immersive_img_awards_2023-06-03-11.webp', NULL, 'BANNER_HOME_SECTION', 0, '2023-06-03 11:30:45', '2023-06-03 11:26:19'),
(4, 'Liên hệ', 'Contact Us', NULL, NULL, NULL, NULL, 'https___nsmed_esap_2020_252_RWD_Others_immersive_img_awards_2023-06-03-11.webp', NULL, 'BANNER_CONTACT', 0, '2023-06-03 11:51:53', '2023-06-03 11:51:53'),
(5, 'Review', 'Review', NULL, NULL, NULL, NULL, 'https___nsmed_esap_2020_252_RWD_Others_immersive_img_awards_2023-06-03-11.webp', NULL, 'BANNER_REVIEW', 0, '2023-06-03 11:52:36', '2023-06-03 11:52:27'),
(6, 'Tin tức', 'Blog', NULL, NULL, NULL, NULL, 'https___nsmed_esap_2023_regional_IMG_KANC_J118_028_2023-06-03-11.webp', NULL, 'BANNER_BLOG', 0, '2023-06-03 11:55:34', '2023-06-03 11:55:34'),
(7, 'Tour', 'Tour', NULL, NULL, NULL, NULL, 'https___nsmed_esap_2023_regional_IMG_KANC_J118_028_2023-06-03-11.webp', NULL, 'BANNER_TOUR', 0, '2023-06-03 11:55:34', '2023-06-03 11:55:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `title_vi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_vi` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `is_deleted` tinyint(1) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `title_vi`, `title_en`, `description_vi`, `description_en`, `is_deleted`, `updated_at`, `created_at`) VALUES
(4, 'Địa điểm du lịch 2', 'Địa điểm du lịch 2', '&lt;p&gt;asd&lt;/p&gt;', '&lt;p&gt;asd&lt;/p&gt;', 0, '2023-06-03 23:06:40', '2023-05-31 23:19:36'),
(7, 'Địa điểm du lịch 1', 'Địa điểm du lịch 1', NULL, NULL, 0, '2023-06-03 23:05:24', '2023-06-03 22:18:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_gallery`
--

CREATE TABLE `review_gallery` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_review` int(11) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review_gallery`
--

INSERT INTO `review_gallery` (`id`, `path`, `id_review`, `updated_at`, `created_at`) VALUES
(10, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Caraibes___Amerique_du_Nord_Guadeloupe_La_Caravelle_310513-kcfcrxpy0o-swhr_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(11, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Ile_Maurice_La_Plantation_d_Albion_339829-5pe0xhtvr4-swhr_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(12, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Ile_Maurice_Les_Villas_d_Albion_46000-fn34mc370u-swhr_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(13, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Ile_Maurice_Les_Villas_d_Albion_276751-v9xr9vanq9-swhr (1)_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(14, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Ile_Maurice_Les_Villas_d_Albion_276751-v9xr9vanq9-swhr_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(15, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Ile_Maurice_Les_Villas_d_Albion_277039-u24iwdwpgi-swhr_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(16, 'https___nsmed_esap_2020_252_RWD_Others_immersive_img_awards_2023-06-03-23.webp', 7, '2023-06-03 23:05:24', '2023-06-03 23:05:24'),
(17, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Grand_Massif_414793-joh5d5rn6n-swhr_2023-06-03-23.webp', 4, '2023-06-03 23:06:40', '2023-06-03 23:06:40'),
(18, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-03-23.webp', 4, '2023-06-03 23:06:40', '2023-06-03 23:06:40'),
(19, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-03-23.webp', 4, '2023-06-03 23:06:40', '2023-06-03 23:06:40'),
(20, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Valmorel_200057-da2ijokor4-swhr_2023-06-03-23.webp', 4, '2023-06-03 23:06:40', '2023-06-03 23:06:40'),
(21, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_Italie_Pragelato_Sestriere_397693-i84lu8cjih-swhr_2023-06-03-23.webp', 4, '2023-06-03 23:06:40', '2023-06-03 23:06:40'),
(22, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Caraibes___Amerique_du_Nord_Guadeloupe_La_Caravelle_310513-kcfcrxpy0o-swhr_2023-06-03-23.webp', 4, '2023-06-03 23:06:40', '2023-06-03 23:06:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `title_vi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title_vi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_tab1_vi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_tab1_en` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des_tab1_vi` text COLLATE utf8_unicode_ci,
  `des_tab1_en` text COLLATE utf8_unicode_ci,
  `des_tab2_vi` text COLLATE utf8_unicode_ci,
  `des_tab2_en` text COLLATE utf8_unicode_ci,
  `des_tab3_vi` text COLLATE utf8_unicode_ci,
  `des_tab3_en` text COLLATE utf8_unicode_ci,
  `des_tab4_vi` text COLLATE utf8_unicode_ci,
  `des_tab4_en` text COLLATE utf8_unicode_ci,
  `offer_vi` text COLLATE utf8_unicode_ci,
  `offer_en` text COLLATE utf8_unicode_ci,
  `slug` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgvideo1` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgvideo2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgvideo360` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video360` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float DEFAULT '0',
  `price_discount` float DEFAULT '0',
  `tab` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `title_vi`, `title_en`, `sub_title_vi`, `sub_title_en`, `title_tab1_vi`, `title_tab1_en`, `des_tab1_vi`, `des_tab1_en`, `des_tab2_vi`, `des_tab2_en`, `des_tab3_vi`, `des_tab3_en`, `des_tab4_vi`, `des_tab4_en`, `offer_vi`, `offer_en`, `slug`, `image`, `image1`, `image2`, `pdf`, `video1`, `imgvideo1`, `video2`, `imgvideo2`, `imgvideo360`, `video360`, `price`, `price_discount`, `tab`, `tag`, `id_category`, `is_deleted`, `updated_at`, `created_at`) VALUES
(2, 'Club Med Phuket', 'Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Luxuriate in an eco-chic all-inclusive retreat', 'Luxuriate in an eco-chic all-inclusive retreat', 'Find your perfect romantic hideaway in the heart of the Maldives. At Club Med Finolhu Villas, you can enjoy the\r\nfinest experiences including panoramic views, underwater discoveries, and pampering indulgences. Allow us to propose an itinerary that is as bold, trendy, and once-in-a-lifetime as your dream getaway should be.', 'Find your perfect romantic hideaway in the heart of the Maldives. At Club Med Finolhu Villas, you can enjoy the\r\nfinest experiences including panoramic views, underwater discoveries, and pampering indulgences. Allow us to propose an itinerary that is as bold, trendy, and once-in-a-lifetime as your dream getaway should be.', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', '&lt;h3 class=&quot;my-20 font-brand text-20 text-inherit&quot; style=&quot;box-sizing: inherit; border-color: hsl(var(--color-grey-light)); --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; font-size: 1.25rem; font-weight: inherit; margin: 1.25rem 0px; font-family: Trident, Newsreader, &amp;quot;Times New Roman&amp;quot;, Times, serif;&quot;&gt;&lt;font color=&quot;#efefef&quot;&gt;Complimentary Honeymoon Package&lt;/font&gt;&lt;/h3&gt;&lt;div class=&quot;text-inherit text-14 sm:text-16&quot; style=&quot;box-sizing: inherit; border-color: hsl(var(--color-grey-light)); --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; font-size: medium; font-family: Trident, Inter, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif;&quot;&gt;&lt;p class=&quot;&quot; style=&quot;box-sizing: inherit; border-color: hsl(var(--color-grey-light)); --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;&quot;&gt;&lt;font color=&quot;#efefef&quot;&gt;Escape to paradise and create new precious moments together - without the stress and hassle of planning a honeymoon. Let us take care of everything for you.&lt;/font&gt;&lt;/p&gt;&lt;/div&gt;', '&lt;h3 class=&quot;my-20 font-brand text-20 text-inherit&quot; style=&quot;box-sizing: inherit; margin: 1.25rem 0px; font-family: Trident, Newsreader, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-weight: inherit; font-size: 1.25rem; border-color: hsl(var(--color-grey-light)); --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ;&quot;&gt;&lt;font style=&quot;&quot; color=&quot;#efefef&quot;&gt;Complimentary Honeymoon Package&lt;/font&gt;&lt;/h3&gt;&lt;div class=&quot;text-inherit text-14 sm:text-16&quot; style=&quot;box-sizing: inherit; font-size: medium; border-color: hsl(var(--color-grey-light)); --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; font-family: Trident, Inter, &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, sans-serif;&quot;&gt;&lt;p class=&quot;&quot; style=&quot;box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border-color: hsl(var(--color-grey-light)); --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ;&quot;&gt;&lt;font color=&quot;#efefef&quot;&gt;Escape to paradise and create new precious moments together - without the stress and hassle of planning a honeymoon. Let us take care of everything for you.&lt;/font&gt;&lt;/p&gt;&lt;/div&gt;', 'club-med-phuket', 'https___nsmed_esap_2022_252_WEB_20220819_MakeTravelHappen_img_phuc_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', 'https://www.youtube.com/watch?v=Nwxj3quxxNY', 'http://i3.ytimg.com/vi/Nwxj3quxxNY/hqdefault.jpg', NULL, 'http://i3.ytimg.com/vi/Nwxj3quxxNY/hqdefault.jpg', 'http://i3.ytimg.com/vi/Nwxj3quxxNY/hqdefault.jpg', 'https://www.youtube.com/watch?v=Nwxj3quxxNY', 1, 0, '0', 'With Exclusive Space', 6, 0, '2023-06-05 23:23:14', '2023-06-04 17:40:06'),
(3, 'Club Med Seychelles', 'Club Med Seychelles', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'club-med-seychelles', 'https___nsmed_esap_2023_regional_IMG_SEYC_EC_L121_060_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 1, 0, '0', 'With Exclusive Space', 7, 0, '2023-06-04 21:32:16', '2023-06-04 17:40:06'),
(4, 'Beach and Sun Holidays', 'Beach and Sun Holidays', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'beach-and-sun-holidays', 'https___nsmed_esap_2022_252_WEB_20220530_FamilyCampaign_bloc_balc_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 1, 0, '0', 'With Exclusive Space', 3, 0, '2023-06-04 21:33:11', '2023-06-04 17:40:06'),
(5, 'Kani', 'Kani', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'kani', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Maldives_Kani_Espace_Exclusive_Collection_251198-3e3m0qpor0-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 288, 0, '11', 'With Exclusive Space', 3, 0, '2023-06-04 21:25:47', '2023-06-04 17:40:06'),
(6, 'The Finolhu Villas', 'The Finolhu Villas', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'the-finolhu-villas', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Maldives_Les_Villas_de_Finolhu_171472-d0jtmfueoy-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 150, 120, '11', 'With Exclusive Space', 3, 0, '2023-06-04 21:25:59', '2023-06-04 17:40:06'),
(7, 'Seychelles', 'Seychelles', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'seychelles', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Seychelles_Seychelles_303643-staje67r62-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 300, 255, '11', 'With Exclusive Space', 4, 0, '2023-06-04 21:26:27', '2023-06-04 17:40:06'),
(8, 'Phuket', 'Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'phuket', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Thailande_Phuket_343663-quoiu0k6ie-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 200, 0, '11', 'With Exclusive Space', 4, 0, '2023-06-04 21:27:47', '2023-06-04 17:40:06'),
(9, 'Kani', 'Kani', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'kani', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Maldives_Kani_Espace_Exclusive_Collection_251198-3e3m0qpor0-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 288, 0, '12', 'With Exclusive Space', 3, 0, '2023-06-04 21:25:47', '2023-06-04 17:40:06'),
(10, 'The Finolhu Villas', 'The Finolhu Villas', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'the-finolhu-villas', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Maldives_Les_Villas_de_Finolhu_171472-d0jtmfueoy-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 150, 120, '12', 'With Exclusive Space', 3, 0, '2023-06-04 21:25:59', '2023-06-04 17:40:06'),
(11, 'Phuket', 'Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'Enjoy the cultural wonders & natural beauty at Club Med Phuket', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'qqweqwe', 'cvbdgfbdfhbg', 'asdqweqweqwe', 'phuket', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Ocean_Indien___Asie_Thailande_Phuket_343663-quoiu0k6ie-swhr_2023-06-04-21.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_90169-asafylj5g2-swhr_2023-06-04-18.webp', 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_France_Les_Appartements_Chalets_Valmorel_173896-vac7si1w1v-swhr_2023-06-04-18.webp', 'DAO-NHAT-ANH-CV-UNG-TUYEN_2023-06-04-18.pdf', '1', NULL, NULL, NULL, NULL, '1', 200, 0, '12', 'With Exclusive Space', 4, 0, '2023-06-04 21:27:47', '2023-06-04 17:40:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_gallery`
--

CREATE TABLE `tour_gallery` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tour` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_gallery`
--

INSERT INTO `tour_gallery` (`id`, `path`, `id_tour`, `updated_at`, `created_at`) VALUES
(1, 'https___nsmed_esap_2020_252_RWD_HP-blocks_all-inclusive_thumb_entertainment_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(2, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Summer_Alpes_France_La_Rosiere_365176-k3s4wrx1x9-swhr_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(5, 'https___nsmed_esap_2023_regional_IMG_ARPC_F122_005_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(7, 'https___nsmed_esap_2023_regional_IMG_CARC_F121_155_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(8, 'https___nsmed_esap_2023_regional_IMG_IXTC_D122_026_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(9, 'https___nsmed_esap_2023_regional_IMG_KANC_J118_028_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(10, 'https___nsmed_esap_2023_regional_IMG_LIFT_SUN_EC_L119_019_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(11, 'https___nsmed_esap_2023_regional_IMG_LROC_C119_004_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(12, 'https___nsmed_esap_2023_regional_IMG_MMAC_F122_038_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(13, 'https___nsmed_esap_2023_regional_IMG_PHUC_K122_007_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(14, 'https___nsmed_esap_2023_regional_IMG_QCHC_F122_072_2023-06-04-18.webp', 2, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(15, 'https___nsmed_esap_2020_252_RWD_HP-blocks_all-inclusive_thumb_entertainment_2023-06-04-18.webp', 3, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(16, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SUN_Summer_Alpes_France_La_Rosiere_365176-k3s4wrx1x9-swhr_2023-06-04-18.webp', 3, '2023-06-04 18:17:39', '2023-06-04 18:17:39'),
(17, 'https___nsmed_esap_2023_regional_IMG_ARPC_F122_005_2023-06-04-18.webp', 3, '2023-06-04 18:17:39', '2023-06-04 18:17:39');

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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review_gallery`
--
ALTER TABLE `review_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour_gallery`
--
ALTER TABLE `tour_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `review_gallery`
--
ALTER TABLE `review_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tour_gallery`
--
ALTER TABLE `tour_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
