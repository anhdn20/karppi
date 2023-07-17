-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 15, 2023 lúc 11:02 AM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

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
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` int(20) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `category_id`, `name`, `description`, `price`, `image_url`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'CURED WHITEFISH', 'Gustav highly values whitefish that graces stylishly with its flavour alone. Spiced up with radish and pickled mustard seeds, this silver-sided fish is served with a sauce prepared from fresh cucumber and jalapeño. It is based on a recipe acquired during a trip to Mexico, creating a perfect combination. Its flavour and encounter in the forests of Lapland is something Gustav will not easily forget. (LF, GF)', 16, NULL, 0, '2023-07-14 17:07:31', '2023-07-14 17:07:35'),
(2, 1, 'GAZPACHO', 'Once enjoying the throaty rumble of his motorbike as he rode through Spain, Gustav’s heart is always warmed when hearting the word ‘gazpacho’. Gazpacho, the elixir of wayfarers and adventurers traversing dusty paths, embodies simplicity, purity, and sheer perfection on a scorching summer\'s day. In Gustav\'s summer menu, this chilled tomato and bell pepper soup is served with a side of cucumber and celery salad and chive sour cream dressing. Salud! (LF, GF)', 14, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'LEMON & PEA RISOTTO', 'This verdant risotto, gracing the summer menu, holds a cherished place among Gustav\'s culinary delights, transcending the constraints of time and location. It evokes vivid recollections of a journey through the sun-soaked landscapes of Calabria, Italy, where Gustav witnessed the enchantment of asparagus gracefully added to risotto, punctuated by a delicate sprinkle of hazelnuts. As a memento from that journey, he discovered that risotto epitomised an unpretentious yet precise culinary craft. (LF, GF, available as VEG)', 15, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'AUBERGINE', 'Our host finds inspiration in crafting a delectable vegetarian masterpiece, wherein the captivating aubergine claims the spotlight. As the grill is fired up, the rhythmic dance of culinary artistry begins, delicately adorning the plate with a touch of Japan\'s cherished gift, miso, accompanied by a tangy pickled salad and the luscious embrace of sesame-infused mayonnaise. (LF, GF available as VEG)', 15, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food_category`
--

INSERT INTO `food_category` (`id`, `name`, `description`, `image_url`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'COLD', '“Simple and delicious food made with good ingredients is something that is topical always and everywhere. This is one of the things I have learned on my journeys.”\n\n— Gustav', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'HOT', '“My favourite recipe infatuates me over and over again! It reminds me of my once-in-a-lifetime experiences and the homely feeling of the rootlessness world traveller.”\n\n— Gustav\n', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_menu`
--

# Dump of table food_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `food_menu`;

CREATE TABLE `food_menu` (
                             `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                             `name` varchar(255) DEFAULT NULL,
                             `intro` text DEFAULT NULL,
                             `description` text DEFAULT NULL,
                             `is_deleted` tinyint(11) DEFAULT 0,
                             `image_url` varchar(255) DEFAULT NULL,
                             `is_active` tinyint(4) DEFAULT 0,
                             `created_at` datetime DEFAULT current_timestamp(),
                             `updated_at` datetime DEFAULT current_timestamp(),
                             PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `food_menu` WRITE;
/*!40000 ALTER TABLE `food_menu` DISABLE KEYS */;

INSERT INTO `food_menu` (`id`, `name`, `intro`, `description`, `is_deleted`, `image_url`, `is_active`, `created_at`, `updated_at`)
VALUES
    (1,'MENU NO.13',NULL,'“THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD \r\n AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH.”\r\n\r\n- GUSTAV',0,'cloud30_2023-07-16-21.png',0,'0000-00-00 00:00:00','2023-07-17 13:24:18'),
    (2,'Menu mua',NULL,'<p><span style=\"color: rgb(43, 34, 33); font-family: brother-1816; font-size: 18px; letter-spacing: 1.7472px; text-align: center; text-transform: uppercase; white-space-collapse: preserve; background-color: rgb(219, 218, 214);\">“THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH.”</span></p>',0,'cloud30_2023-07-16-21.png',0,'2023-07-16 20:40:43','2023-07-17 13:24:18'),
    (3,'Menu muaf xuan','THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH','<h4 style=\"font-family: Agenda; letter-spacing: 0.1em; text-transform: uppercase; line-height: 1.8em; font-size: 23px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(43, 34, 33); overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">KNUT BREAD BAKED FROM GUSTAV’S SOURDOUGH</h4><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: &quot;ainslie sans condensed&quot;; line-height: 1.8em; font-style: italic; letter-spacing: 0.1em; overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">The Knut bread is named after Gustav’s grandfather and refers to a hot dish following the original recipe. Knut believed that great bread (and moustaches) makes a man. This sourdough Knut reminds Gustav of childhood moments spent with his grandfather. Way back then, the table was always set with fresh bread and toasted butter, which was one of grandfather’s special culinary delights. This speciality was actually created by accident, as a saucepan with butter was left on the stove for a little too long. The same favourable forgetfulness runs in Gustav’s genes and is evident in his cuisine.</p><h4 style=\"font-family: Agenda; letter-spacing: 0.1em; text-transform: uppercase; line-height: 1.8em; font-size: 23px; margin: 2rem 0px 15px; color: rgb(43, 34, 33); overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">TO ACCOMPANY THE BREAD</h4><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: &quot;ainslie sans condensed&quot;; line-height: 1.8em; font-style: italic; letter-spacing: 0.1em; overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">Wild garlic cream cheese (LF,GF)  5€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: &quot;ainslie sans condensed&quot;; line-height: 1.8em; font-style: italic; letter-spacing: 0.1em; overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">Feta spread (LF,GF) 6€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: &quot;ainslie sans condensed&quot;; line-height: 1.8em; font-style: italic; letter-spacing: 0.1em; overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">Chicken liver mousse and pear and port wine jam (LF,GF) 8€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: &quot;ainslie sans condensed&quot;; line-height: 1.8em; font-style: italic; letter-spacing: 0.1em; overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">Cold cuts from southern Europe (MF,GF) 11€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: &quot;ainslie sans condensed&quot;; line-height: 1.8em; font-style: italic; letter-spacing: 0.1em; overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">Selection of cheeses with compote of the day (GF)  11€</p>',0,'cloud14_2023-07-16-21.png',1,'2023-07-16 20:40:56','2023-07-17 13:24:18');

/*!40000 ALTER TABLE `food_menu` ENABLE KEYS */;
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_menu_relation`
--

CREATE TABLE `food_menu_relation` (
  `id` int(11) UNSIGNED NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('IMAGE','VIDEO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` int(3) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `url`, `type`, `priority`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'test', '1_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:39:29', '2023-07-15 17:53:02'),
(2, NULL, '2_2023-07-15-17.jpg', NULL, 'IMAGE', 1, 0, '2023-07-15 17:50:49', '2023-07-15 18:01:03'),
(3, NULL, '3_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:08', '2023-07-15 17:53:08'),
(4, NULL, '4_2023-07-15-17.jpg', NULL, 'IMAGE', 2, 0, '2023-07-15 17:53:18', '2023-07-15 18:01:22'),
(5, NULL, '5_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:24', '2023-07-15 17:53:24'),
(6, NULL, '6_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:29', '2023-07-15 17:53:29'),
(7, NULL, '7_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:35', '2023-07-15 17:53:35'),
(8, NULL, '8_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:41', '2023-07-15 17:53:41'),
(9, NULL, '9_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:47', '2023-07-15 17:53:47'),
(10, NULL, '10_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:53', '2023-07-15 17:53:53'),
(11, NULL, '11_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:53:59', '2023-07-15 17:53:59'),
(12, NULL, '12_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:54:05', '2023-07-15 17:54:05'),
(13, NULL, '13_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:54:10', '2023-07-15 17:54:10'),
(14, NULL, '14_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:54:15', '2023-07-15 17:54:15'),
(15, NULL, '15_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 1, '2023-07-15 17:54:20', '2023-07-15 17:55:23'),
(16, NULL, '15_2023-07-15-17.jpg', NULL, 'IMAGE', 0, 0, '2023-07-15 17:55:28', '2023-07-15 17:55:28'),
(17, NULL, 'https___nsmed_dream_PRODUCT_CENTER_DESTINATIONS_SNOW_Winter_Alpes_Italie_Pragelato_Sestriere_397693-i84lu8cjih-swhr_2023-07-15-17.webp', 'https://www.youtube.com/watch?v=o_lN37OAJ9U&list=RDroa8fMuYh7M', 'VIDEO', 0, 0, '2023-07-15 17:59:46', '2023-07-15 17:59:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'dev@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food_menu_relation`
--
ALTER TABLE `food_menu_relation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `food_menu_relation`
--
ALTER TABLE `food_menu_relation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
