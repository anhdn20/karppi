-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 20, 2023 lúc 03:44 PM
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
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `key_config` enum('ADDRESS','HOME_TITLE_SECTION','HOME_DESCRIPTION_SECTION','URL_FACEBOOK','URL_INSTAGRAM','HOME_QUOTE_1','HOME_QUOTE_2','EMAIL','PHONE','IFRAME_MAP','RESTAURANT','URL_REDIRECT_MAP') COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `key_config`, `value`, `created_at`, `updated_at`) VALUES
(1, 'ADDRESS', 'KOSKIKATU 12 96200 ROVANIEMI 1', NULL, '2023-07-17 21:54:51'),
(2, 'HOME_TITLE_SECTION', 'GUSTAV, THE WANDERER', NULL, NULL),
(3, 'HOME_DESCRIPTION_SECTION', 'Mr. Gustav is a gentle grandfather, whose beard tickles as he hugs. He never says no for angling with his grandchildren and encourages them for yet another pancake. Gustav had a soul of a wanderer already way before travelling became somewhat fashionable. His voyages have made him quite a storyteller, and from the travels he always returned with a chest full of recipes. The passing days have not faded Gustav’s curiosity for globetrotting, even if made him more composed. A delightful drink, scrumptious food and beloved people around are what truly matters to Gustav. Therefore, he joyfully puts great effort into creating delicacies to his pals, generated with decades of uncompromising experience.', NULL, NULL),
(4, 'URL_FACEBOOK', '#', NULL, NULL),
(5, 'URL_INSTAGRAM', '#', NULL, NULL),
(6, 'HOME_QUOTE_1', '“FOOD PREPARED WITH SIMPLE BUT HIGH-QUALITY INGREDIENTS IS FASHIONABLE, ALWAYS AND EVERYWHERE. THAT’S WHAT I LEARNT DURING MY JOURNEYS.”', NULL, NULL),
(7, 'HOME_QUOTE_2', '“THE TRUE VIRTUE OF COOKING IS CURIOUSITY.”', NULL, NULL),
(8, 'EMAIL', 'INFO@GUSTAVKITCHENBAR.FI', NULL, NULL),
(9, 'PHONE', '+358 400 421244', NULL, NULL),
(10, 'RESTAURANT', 'Karppi', NULL, NULL),
(11, 'IFRAME_MAP', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251433.92538431016!2d105.47473429453122!3d10.045294399999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08802e47b3083%3A0x5b6e5a03285c9576!2zVmluY29tIFBsYXphIEjDuW5nIFbGsMahbmc!5e0!3m2!1svi!2s!4v1685022180928!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, NULL),
(12, 'URL_REDIRECT_MAP', 'https://www.google.com/maps/@9.7598942,105.6044849,12z?hl=vi-VN&entry=ttu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `category_id`, `name`, `description`, `price`, `image_url`, `is_deleted`, `created_at`, `updated_at`) VALUES
(15, 1, 'CURED WHITEFISH', 'Gustav highly values whitefish that graces stylishly with its flavour alone. Spiced up with radish and pickled mustard seeds, this silver-sided fish is served with a sauce prepared from fresh cucumber and jalapeño. It is based on a recipe acquired during a trip to Mexico, creating a perfect combination. Its flavour and encounter in the forests of Lapland is something Gustav will not easily forget.  (LF, GF)', 16, NULL, 0, '2023-07-20 22:32:14', '2023-07-20 22:32:14'),
(16, 1, 'GAZPACHO', 'Once enjoying the throaty rumble of his motorbike as he rode through Spain, Gustav’s heart is always warmed when hearting the word ‘gazpacho’. Gazpacho, the elixir of wayfarers and adventurers traversing dusty paths, embodies simplicity, purity, and sheer perfection on a scorching summer\'s day. In Gustav\'s summer menu, this chilled tomato and bell pepper soup is served with a side of cucumber and celery salad and chive sour cream dressing. Salud!  (LF, GF)', 14, NULL, 0, '2023-07-20 22:33:20', '2023-07-20 22:33:20'),
(17, 1, 'BURRATA', 'Gustav learnt how to prepare the mozzarella burrata on one of his many trips to Italy. This creamy and flavoursome delight is handsomely accompanied by capers, lovingly marinated fennel, a generous splash of olive oil, aioili, and a sun-kissed, grilled salad.   (LF,GF)', 15, NULL, 0, '2023-07-20 22:33:37', '2023-07-20 22:33:37'),
(18, 1, 'STEAK TARTARE', 'When Gustav decided to enhance the classic tartare with perfectly tangy pickled pear, crunchy peanuts, and a touch of sweet chili, he was reminded once again why curiosity is the highest virtue of culinary art.  (LF,GF)', 16, NULL, 0, '2023-07-20 22:33:58', '2023-07-20 22:33:58'),
(19, 6, 'LEMON & PEA RISOTTO', 'This verdant risotto, gracing the summer menu, holds a cherished place among Gustav\'s culinary delights, transcending the constraints of time and location. It evokes vivid recollections of a journey through the sun-soaked landscapes of Calabria, Italy, where Gustav witnessed the enchantment of asparagus gracefully added to risotto, punctuated by a delicate sprinkle of hazelnuts. As a memento from that journey, he discovered that risotto epitomised an unpretentious yet precise culinary craft.  (LF, GF, available as VEG)', 15, NULL, 0, '2023-07-20 22:34:41', '2023-07-20 22:34:41'),
(20, 6, 'AUBERGINE', 'Our host finds inspiration in crafting a delectable vegetarian masterpiece, wherein the captivating aubergine claims the spotlight. As the grill is fired up, the rhythmic dance of culinary artistry begins, delicately adorning the plate with a touch of Japan\'s cherished gift, miso, accompanied by a tangy pickled salad and the luscious embrace of sesame-infused mayonnaise. (LF, GF available as VEG)', 15, NULL, 0, '2023-07-20 22:35:33', '2023-07-20 22:35:56'),
(21, 6, 'PAN-FRIED PIKE-PERCH', 'Gustav holds the belief that this nourishing and delectable pan-fried pike-perch evokes a sense of enchantment, particularly on a warm summer’s day. As he hums away in the kitchen, Gustav gracefully adds new potatoes and asparagus into the culinary symphony. Gracefully enhancing the ensemble is a velvety hollandaise sauce infused with the essence of yuzu fruit.  (LF,GF)', 17, NULL, 0, '2023-07-20 22:35:50', '2023-07-20 22:36:00'),
(22, 6, 'ENTRECÔTE', 'Grilling, like life itself, is a skill honed with care and mastery. Endowed with the wisdom bestowed by an Argentinian barbecue chef, Gustav gracefully assembles the pinnacle of summer’s meaty delight with meticulous devotion and boundless affection. The entrecôte is adorned with seasoned butter, accompanied by truffle-infused potatoes and grilled salad. Oh, what summertime splendor!  (LF, GF)', 32, NULL, 0, '2023-07-20 22:36:58', '2023-07-20 22:36:58'),
(23, 4, 'PUFF PANCAKE', 'Gustav’s grandchildren’s favourite dessert ignites an exuberant whirlwind within the most cynical of dessert connoisseurs: Finnish puff pancake, prepared using the family’s treasured recipe, served with white chocolate, strawberry jelly, and rosemary-infused ice cream. The memories of triumphant fishing expeditions and the essence of summertime linger ever so close, awaiting to be relished with just a spoonful.  (LF,GF)', 10, NULL, 0, '2023-07-20 22:37:30', '2023-07-20 22:37:35'),
(24, 4, 'RHUBARB PUDDING', 'Born from a spontaneous moment, on a sun-drenched summer\'s day, as Gustav’s neighbor shouted over the fence, offering a bundle of freshly plucked rhubarb, exclaiming, “Create something delightful from these!”. Embracing the invitation with fervour, our host swiftly embarked on the culinary quest, conjuring a luscious rhubarb pudding complemented by ginger granita alongside coconut ice cream. The neighbour loved it as well – enough to have a second helping.  (LF, GF)', 10, NULL, 0, '2023-07-20 22:37:51', '2023-07-20 22:37:51'),
(25, 4, 'CHOCOLATE CAKE', 'This classic dessert has graced our tables since time immemorial. The chocolate cake, baked to perfection, is a velvety delight that ensures holistic satisfaction. While the cake could easily stand alone as a masterpiece on the plate, Gustav, driven by his perpetual quest for culinary excellence, crafts a luscious thick sauce of salty caramel, harmoniously paired with his homemade vanilla ice cream.  (LF, GF)', 10, NULL, 0, '2023-07-20 22:39:19', '2023-07-20 22:39:19'),
(26, 10, 'FRIED FISH OF THE DAY', 'with french fries or potato puree', 3.9, NULL, 0, '2023-07-20 22:40:00', '2023-07-20 22:41:26'),
(27, 10, 'MEATBALLS', 'with french fries or potato puree', 3.9, NULL, 0, '2023-07-20 22:40:25', '2023-07-20 22:41:21'),
(28, 10, 'ICE CREAM', 'vanilla, rosemary or coconut', 3, NULL, 0, '2023-07-20 22:41:53', '2023-07-20 22:41:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` text,
  `menu_id` int(11) DEFAULT '0',
  `image_url` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food_category`
--

INSERT INTO `food_category` (`id`, `name`, `description`, `menu_id`, `image_url`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'COLD', '“Simple and delicious food made with good ingredients is something that is topical always and everywhere. This is one of the things I have learned on my journeys.”\r\n\r\n— Gustav', 3, NULL, 0, '2023-07-14 17:07:35', '2023-07-20 22:31:26'),
(4, 'SWEET', '“Because a meal without dessert is like a grandfather without a moustache.”', 3, NULL, 0, '2023-07-16 13:31:23', '2023-07-20 22:31:17'),
(6, 'HOT', '“My favourite recipe infatuates me over and over again! It reminds me of my once-in-a-lifetime experiences and the homely feeling of the rootlessness world traveller.”\r\n\r\n— Gustav', 3, NULL, 0, '2023-07-16 21:09:05', '2023-07-16 21:09:05'),
(10, 'KIDS', 'Children’s menu is available only with a dining group', 3, NULL, 0, '2023-07-20 22:39:38', '2023-07-20 22:42:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `intro` text,
  `description` text,
  `is_deleted` tinyint(11) DEFAULT '0',
  `image_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food_menu`
--

INSERT INTO `food_menu` (`id`, `name`, `intro`, `description`, `is_deleted`, `image_url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'MENU NO.14', 'THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH', '“THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD \r\n AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH.”\r\n\r\n- GUSTAV', 0, 'cloud30_2023-07-16-21.png', 0, '2023-07-14 17:07:35', '2023-07-20 22:30:34'),
(2, 'Menu mua', NULL, '<p style=\"text-align: left;\"><span style=\"color: rgb(43, 34, 33); font-family: Impact; font-size: 18px; letter-spacing: 1.7472px; text-align: center; text-transform: uppercase; white-space-collapse: preserve; background-color: rgb(219, 218, 214);\">“THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH.”</span><span style=\"font-family: Impact;\">﻿</span></p>', 0, 'cloud30_2023-07-16-21.png', 0, '2023-07-16 20:40:43', '2023-07-17 13:58:14'),
(3, 'MENU NO.13', 'THERE’S VERY LITTLE DIFFERENCE BETWEEN CREATING FOOD AND ART. PERHAPS THIS IS WHY I LOVE THEM BOTH SO MUCH', '<h4 style=\"font-family: Agenda; letter-spacing: 0.1em; text-transform: uppercase; line-height: 1.8em; font-size: 23px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; color: rgb(43, 34, 33); overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">KNUT BREAD BAKED FROM GUSTAV’S SOURDOUGH</h4><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: \" ainslie=\"\" sans=\"\" condensed\";=\"\" line-height:=\"\" 1.8em;=\"\" font-style:=\"\" italic;=\"\" letter-spacing:=\"\" 0.1em;=\"\" overflow-wrap:=\"\" break-word;=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(219,=\"\" 218,=\"\" 214);=\"\" text-align:=\"\" center;\"=\"\">The Knut bread is named after Gustav’s grandfather and refers to a hot dish following the original recipe. Knut believed that great bread (and moustaches) makes a man. This sourdough Knut reminds Gustav of childhood moments spent with his grandfather. Way back then, the table was always set with fresh bread and toasted butter, which was one of grandfather’s special culinary delights. This speciality was actually created by accident, as a saucepan with butter was left on the stove for a little too long. The same favourable forgetfulness runs in Gustav’s genes and is evident in his cuisine.</p><h4 style=\"font-family: Agenda; letter-spacing: 0.1em; text-transform: uppercase; line-height: 1.8em; font-size: 23px; margin: 2rem 0px 15px; color: rgb(43, 34, 33); overflow-wrap: break-word; white-space-collapse: preserve; background-color: rgb(219, 218, 214); text-align: center;\">TO ACCOMPANY THE BREAD</h4><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: \" ainslie=\"\" sans=\"\" condensed\";=\"\" line-height:=\"\" 1.8em;=\"\" font-style:=\"\" italic;=\"\" letter-spacing:=\"\" 0.1em;=\"\" overflow-wrap:=\"\" break-word;=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(219,=\"\" 218,=\"\" 214);=\"\" text-align:=\"\" center;\"=\"\">Wild garlic cream cheese (LF,GF)  5€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: \" ainslie=\"\" sans=\"\" condensed\";=\"\" line-height:=\"\" 1.8em;=\"\" font-style:=\"\" italic;=\"\" letter-spacing:=\"\" 0.1em;=\"\" overflow-wrap:=\"\" break-word;=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(219,=\"\" 218,=\"\" 214);=\"\" text-align:=\"\" center;\"=\"\">Feta spread (LF,GF) 6€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: \" ainslie=\"\" sans=\"\" condensed\";=\"\" line-height:=\"\" 1.8em;=\"\" font-style:=\"\" italic;=\"\" letter-spacing:=\"\" 0.1em;=\"\" overflow-wrap:=\"\" break-word;=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(219,=\"\" 218,=\"\" 214);=\"\" text-align:=\"\" center;\"=\"\">Chicken liver mousse and pear and port wine jam (LF,GF) 8€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: \" ainslie=\"\" sans=\"\" condensed\";=\"\" line-height:=\"\" 1.8em;=\"\" font-style:=\"\" italic;=\"\" letter-spacing:=\"\" 0.1em;=\"\" overflow-wrap:=\"\" break-word;=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(219,=\"\" 218,=\"\" 214);=\"\" text-align:=\"\" center;\"=\"\">Cold cuts from southern Europe (MF,GF) 11€</p><p class=\"sqsrte-small\" style=\"margin-top: 1rem; margin-right: 0px; margin-left: 0px; font-size: 15px; color: rgb(43, 34, 33); font-family: \" ainslie=\"\" sans=\"\" condensed\";=\"\" line-height:=\"\" 1.8em;=\"\" font-style:=\"\" italic;=\"\" letter-spacing:=\"\" 0.1em;=\"\" overflow-wrap:=\"\" break-word;=\"\" white-space-collapse:=\"\" preserve;=\"\" background-color:=\"\" rgb(219,=\"\" 218,=\"\" 214);=\"\" text-align:=\"\" center;\"=\"\">Selection of cheeses with compote of the day (GF)  11€</p>', 0, '1W4A0041_2023-07-20-21.jpg', 1, '2023-07-16 20:40:56', '2023-07-20 22:30:26');

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
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_direction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('LOGO','BANNER_HOME_HEAD','BANNER_HOME_SECTION_1','BANNER_HOME_SECTION_2','BANNER_HOME_SECTION_3','BANNER_MENU_SECTION') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `title`, `image`, `url_direction`, `type`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Gustav_logo_valmis-19_2023-07-17-21.png', NULL, 'LOGO', 0, '2023-07-17 21:05:32', '2023-07-17 21:07:42'),
(2, NULL, 'Gustav_logo_valmis-16_2023-07-17-21.png', NULL, 'BANNER_HOME_HEAD', 0, '2023-07-17 21:08:44', '2023-07-17 21:08:44'),
(3, NULL, 'Gustav_logo_valmis-04_2023-07-17-21.png', NULL, 'BANNER_HOME_SECTION_1', 0, '2023-07-17 21:08:53', '2023-07-17 21:08:53'),
(4, NULL, 'asd_2023-07-17-21.jpg', NULL, 'BANNER_HOME_SECTION_2', 0, '2023-07-17 21:09:06', '2023-07-17 21:28:47'),
(5, NULL, 'Gustav_ravintola_rovaniemi_8_2023-07-17-21.jpg', NULL, 'BANNER_HOME_SECTION_3', 0, '2023-07-17 21:09:16', '2023-07-17 21:09:16'),
(6, NULL, '1W4A0041_2023-07-17-21.jpg', NULL, 'BANNER_MENU_SECTION', 0, '2023-07-17 21:10:06', '2023-07-17 21:10:06');

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
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
