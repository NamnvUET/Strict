-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 23, 2017 lúc 04:24 PM
-- Phiên bản máy phục vụ: 5.7.18-0ubuntu0.16.04.1
-- Phiên bản PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `strict`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(4) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`banner_id`, `title`, `description`, `created_at`, `updated_at`, `image`) VALUES
(10, 'STRICT BANNER 3', 'LOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOLLOL', '2017-06-20 10:02:09', '2017-06-20 10:02:09', '.././uploads/banners/Mks.600.1733213.jpg'),
(12, 'STRICT BANNER 3', '<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3', '2017-06-19 09:56:16', '2017-06-19 09:56:16', '.././uploads/banners/foot_image.jpg'),
(13, 'STRICT BANNER 1', 'STRICT STRICT STRICT STRICT STRICT STRICT STRICT', '2017-06-23 06:54:51', '2017-06-23 06:54:51', '.././uploads/banners/banner.jpg'),
(14, 'STRICT BANNER 4', ' STRICT STRICT STRICT STRICT STRICT STRICT STRICT STRICT ', '2017-06-23 06:54:39', '2017-06-23 06:54:39', '.././uploads/banners/index.png'),
(15, 'STRICT BANNER 5', 'STRICT STRICT STRICT', '2017-06-23 08:01:01', '2017-06-23 08:01:01', '.././uploads/banners/14484986_748572701950098_7376815884708209819_ndell.jpg'),
(16, 'STRICT BANNER 6', 'STRICT STRICT STRICT', '2017-06-23 08:01:22', '2017-06-23 08:01:22', '.././uploads/banners/index.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_message`
--

CREATE TABLE `contact_message` (
  `message_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `is_subcribe` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_message`
--

INSERT INTO `contact_message` (`message_id`, `fullname`, `email`, `message`, `is_subcribe`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Đình Mạnh', 'apsoafdivj ewogfiudjkkdegrefdvoegirhbf', 'Đây là test message 1', 0, '2017-06-16 07:52:07', '2017-06-16 09:08:36'),
(2, 'Nguyễn Đình Mạnh', 'apsoafdivj ewogfiudjkkdegrefdvoegirhbf', 'eufiwkjglrhthrgweuivdhbfjgnktjh3rgopeiufovdfbhjkr egrhtguwejiobginh9urgiewjvkdbjgrg', 0, '2017-06-16 08:15:08', '2017-06-16 09:08:36'),
(3, 'Nguyễn Đình Mạnh', 'apsoafdivj ewogfiudjkkdegrefdvoegirhbf', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, '2017-06-16 09:08:17', '2017-06-16 09:08:36'),
(4, 'CCS_CN96', 'nguyenvannamk59@gmail.com', '$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe$is_subcribe', 1, '2017-06-16 10:07:30', '2017-06-16 10:07:30'),
(5, 'Nguyễn Đình Mạnh', 'vcl@gmail.com', '<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3', 1, '2017-06-16 10:08:41', '2017-06-16 10:08:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showcases`
--

CREATE TABLE `showcases` (
  `showcase_id` int(8) NOT NULL,
  `showcase_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `showcase_description` text COLLATE utf8_unicode_ci NOT NULL,
  `showcase_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `showcase_home` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `showcases`
--

INSERT INTO `showcases` (`showcase_id`, `showcase_name`, `showcase_description`, `showcase_image`, `showcase_home`, `created_at`, `updated_at`) VALUES
(4, 'Portfolio 1', 'Đây là showcase 1', '.././uploads/showcases/image1.jpg', 'http://showcase1.com', '2017-06-15 10:02:00', '2017-06-20 10:03:55'),
(5, 'Portfolio 2', 'Đây là showcase 2', '.././uploads/showcases/image2.jpg', 'http://showcase2.com', '2017-06-15 10:02:34', '2017-06-15 10:02:34'),
(7, 'Portfolio 4', 'Đây là Showcase 4', '.././uploads/showcases/image5.jpg', 'http://showcase4.com', '2017-06-15 10:03:33', '2017-06-15 10:03:33'),
(8, 'Portfolio 5', 'Đây là showcase 5', '.././uploads/showcases/image2.jpg', 'http://showcase5.com', '2017-06-15 10:04:04', '2017-06-15 10:04:04'),
(9, 'Portfolio 6', 'Đây là showcase 6', '.././uploads/showcases/image6.jpg', 'http://showcase6.com', '2017-06-15 10:04:37', '2017-06-15 10:04:37'),
(10, 'Portfolio test', 'TEST TEST TEST', '.././uploads/showcases/14484986_748572701950098_7376815884708209819_ndell.jpg', 'http://GG.com', '2017-06-15 10:17:40', '2017-06-20 10:05:16'),
(11, 'wgrjvai', 'wrga', '.././uploads/showcases/Mks.600.1733213.jpg', 'EFVARG', '2017-06-15 10:28:24', '2017-06-15 10:28:24'),
(12, 'Portfolio 7', '<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3<3', '.././uploads/showcases/1.jpg', 'http://homepage7.com', '2017-06-19 10:28:23', '2017-06-19 10:28:23'),
(13, 'Portfolio 13', 'Đây Showcase 13', '.././uploads/showcases/ft_image55.jpg', 'http://ggg.com', '2017-06-22 09:55:22', '2017-06-22 09:55:22'),
(14, 'ff', 'ff', '.././uploads/showcases/ft_image22.jpg', 'http://gggggggg.com', '2017-06-22 09:55:44', '2017-06-22 09:55:44'),
(15, 'Portfolio 15', 'fffffff', '.././uploads/showcases/ft_image5.jpg', 'http://ggggggghhhhg.com', '2017-06-22 09:56:03', '2017-06-22 09:56:03'),
(16, 'TEST 16', 'wygifjekdv;l', '.././uploads/showcases/index.png', 'http://GGggff.com', '2017-06-23 07:49:02', '2017-06-23 07:49:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_links`
--

CREATE TABLE `social_links` (
  `social_network` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_links`
--

INSERT INTO `social_links` (`social_network`, `link`, `created_at`, `updated_at`) VALUES
('facebook', 'http://facebook.com/fewiwjfe', '2017-06-19 07:10:52', '2017-06-22 08:56:38'),
('google-plus', 'htpp://google.com', '2017-06-19 08:27:30', '2017-06-19 08:27:30'),
('linkedin', 'http://linkedin.com', '2017-06-19 08:29:37', '2017-06-19 08:29:37'),
('pinterest', 'http://pinterest.com', '2017-06-19 08:39:36', '2017-06-19 08:39:36'),
('tumblr', 'http://tumblr.com', '2017-06-20 06:47:37', '2017-06-20 06:47:37'),
('twitter', 'www.facebook.com/NamNguyenVank59', '2017-06-19 07:10:52', '2017-06-19 07:10:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subpages`
--

CREATE TABLE `subpages` (
  `subpage_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_publish` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subpages`
--

INSERT INTO `subpages` (`subpage_id`, `title`, `icon`, `content`, `created_at`, `updated_at`, `is_publish`) VALUES
(2, 'Optimized for all devices', '.././uploads/subpage_icon/icon3.jpg', 'STRICT has been designed to be fully responsive on all devices', '2017-06-19 08:58:17', '2017-06-19 08:58:17', 1),
(3, 'Cefdi 2', '.././uploads/subpage_icon/icon2.jpg', 'STRICT has been designed to be fully responsive on all devices', '2017-06-19 08:59:55', '2017-06-20 10:20:51', 0),
(4, 'Icon 4', '.././uploads/subpage_icon/icon1.jpg', 'Gờ gờ', '2017-06-19 09:14:52', '2017-06-19 09:14:52', 1),
(5, 'GGWP', '.././uploads/subpage_icon/icon2.jpg', 'gờ gờ 2', '2017-06-19 09:15:10', '2017-06-19 09:15:10', 1),
(6, 'giưeifwejifeqf', '.././uploads/subpage_icon/icon3.jpg', 'qGREIOWFOEGIGEEJGWJ', '2017-06-19 09:15:53', '2017-06-19 09:15:53', 1),
(8, 'Icon 5', '.././uploads/subpage_icon/close.png', 'STRIC icon 5', '2017-06-23 08:49:29', '2017-06-23 08:49:41', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
(1, 'Nam Nguyen Van', '123456'),
(2, 'CCS_CN96', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Chỉ mục cho bảng `showcases`
--
ALTER TABLE `showcases`
  ADD PRIMARY KEY (`showcase_id`);

--
-- Chỉ mục cho bảng `social_links`
--
ALTER TABLE `social_links`
  ADD UNIQUE KEY `social_network` (`social_network`);

--
-- Chỉ mục cho bảng `subpages`
--
ALTER TABLE `subpages`
  ADD PRIMARY KEY (`subpage_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `showcases`
--
ALTER TABLE `showcases`
  MODIFY `showcase_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `subpages`
--
ALTER TABLE `subpages`
  MODIFY `subpage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
