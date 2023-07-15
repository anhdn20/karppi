-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 15, 2023 lúc 10:22 AM
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

CREATE TABLE `food_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(11) DEFAULT '0',
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food_menu`
--

INSERT INTO `food_menu` (`id`, `name`, `description`, `is_active`, `is_deleted`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'MENU NO.13', '“THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD \n AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH.”', 1, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('IMAGE','VIDEO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
