-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 29, 2022 lúc 06:03 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cid18`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `button_ring`
--

DROP TABLE IF EXISTS `button_ring`;
CREATE TABLE IF NOT EXISTS `button_ring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_top` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_bottom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `button_ring`
--

INSERT INTO `button_ring` (`id`, `name`, `icon`, `text`, `color_bg`, `color_text`, `status`, `position`, `css_top`, `css_left`, `css_right`, `css_bottom`, `font`, `type`, `link`, `updated_at`, `created_at`) VALUES
(6, 'Kinh doanh 1', '<i class=\"fa fa-envelope-open-text\"></i>', 'cskh.webbox@gmail.com', '#c41e1e', '#ffffff', 'on', 'right', NULL, NULL, NULL, NULL, '9', 'tell', 'http://gmail.com', '2022-03-24 08:42:41', '2020-07-03 07:01:23'),
(8, 'Kinh doanh 2', '<i class=\"fa fa-phone-volume\"></i>', '0966 130 168', '#f4ab33', '#ffffff', 'on', 'right', NULL, NULL, NULL, NULL, NULL, 'tell', 'tel:0966130168', '2022-03-24 08:42:41', '2020-07-17 14:45:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` int(11) DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat`
--

DROP TABLE IF EXISTS `cat`;
CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_type_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `canon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `index_meta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cat`
--

INSERT INTO `cat` (`id`, `name`, `name_en`, `img`, `url`, `des`, `post_type_id`, `parent_id`, `title_seo`, `des_seo`, `key_seo`, `status`, `theme_id`, `canon`, `type`, `des_en`, `title_seo_en`, `des_seo_en`, `key_seo_en`, `orderby`, `index_meta`, `created_at`, `updated_at`) VALUES
(80, 'Sự kiện', 'Event', '', 'su-kien', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 18:31:22', '2022-03-15 18:31:22'),
(45, 'Dự án', 'Project', '', 'du-an', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2021-05-23 17:19:30', '2021-05-23 17:19:30'),
(75, 'Thiết kế thi công công trình gỗ', 'Design and construction of wood works', 'nha_o_Trieu.jpeg', 'thiet-ke-thi-cong-cong-trinh-go', NULL, NULL, 70, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 18:17:24', '2022-03-15 18:17:43'),
(76, 'Sản xuất chế biến gỗ', 'Wood processing production', 'cbiengomg.jpeg', 'san-xuat-che-bien-go', NULL, NULL, 70, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 18:16:59', '2022-03-15 18:16:59'),
(78, 'Dự án sinh thái nghỉ dưỡng', 'Eco-resort project', 'da-sinh-thai3.jpeg', 'du-an-sinh-thai-nghi-duong', NULL, NULL, 70, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 18:16:17', '2022-03-15 18:18:07'),
(70, 'Lĩnh vực hoạt động', 'Field of activity', '', 'linh-vuc-hoat-dong', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 17:23:48', '2022-03-15 17:23:48'),
(71, 'Video', 'Video', '', 'video', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 17:26:57', '2022-03-15 17:26:57'),
(72, 'Tuyển dụng', NULL, '', 'tuyen-dung', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 17:43:21', '2022-03-15 17:43:21'),
(73, 'Hình ảnh', NULL, '', 'hinh-anh', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 17:43:29', '2022-03-15 17:43:29'),
(74, 'Dự án nổi bật', 'Hot Project', '', 'du-an-noi-bat', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 18:12:42', '2022-03-15 18:12:42'),
(79, 'Đầu tư bất động sản', 'Real estate investment', 'dtubdsmg1.jpeg', 'dau-tu-bat-dong-san', NULL, NULL, 70, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2022-03-15 18:15:58', '2022-03-15 18:17:55'),
(69, 'Tin tức', 'News', '', 'tin-tuc', NULL, NULL, 0, NULL, NULL, NULL, 'on', NULL, 'off', NULL, NULL, NULL, NULL, NULL, NULL, 'INDEX, FOLLOW', '2021-06-07 09:14:27', '2021-06-07 09:14:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `img`, `name`, `tel`, `email`, `post_id`, `review`, `status`, `updated_at`, `created_at`) VALUES
(3, 'This projecter is great. I got it for Christmas from my mom and have used it almost everyday!! It makes for good movie nights and gaming days!! I would give it 10 stars if I could! It comes with everything you need to hook up a computer, phone or gaming console! Don’t be fooled by the great price. T', '', 'thi', '0987654', NULL, 1, '4', 'on', '2020-08-03 02:05:16', '2020-08-03 00:55:49'),
(4, 'Good stuff! Easy setup, easy to use. I’ve been using it to project Twitch streams onto the wall of my gaming room, and I’m super happy with it. Fan is audible, but built in speakers are robust.', '', 'Nguyễn Văn Tuấn', '65', NULL, 1, '3', 'on', '2020-08-03 02:06:53', '2020-08-03 00:57:59'),
(5, 'Awesome mini projector that exceeded my expectations. I initially bought it to play a movie for my son’s 5th birthday party. Now I use it for just about anything. Great picture quality. Great for movie night with the family.', '', 'Lưu Quang Huy', '65', NULL, 1, '5', 'on', '2020-08-03 02:07:15', '2020-08-03 01:00:14'),
(6, 'My friend gave me this projector for my birthday and I was amazed when he said it was only 90bucks! It\'s quality exceeds expectations for it\'s price. I only sit the projector ten feet away and it covers the whole wall. In dim conditions it is very nice and bright. I love it.', NULL, 'Phạm thị Hà', '324', NULL, 1, '1', 'on', '2020-08-03 02:07:58', '2020-08-03 01:25:19'),
(7, 'Good Budget Projector. I bought it to use primarily with art projects, to help with tracing images onto other surfaces. It\'s good so far. I haven\'t used it extensively, but it\'s pretty good so far. I just need to buy an HDMI to micro USB converter to see how the smartphone connection works.', NULL, '45435', '345435', NULL, 1, '5', 'on', '2020-08-03 02:08:08', '2020-08-03 01:25:57'),
(8, '43543', NULL, '45435', '345435', NULL, 1, '3', 'on', '2020-08-03 01:28:44', '2020-08-03 01:28:44'),
(9, '43543', NULL, '45435', '345435', NULL, 1, '2', 'on', '2020-08-03 01:28:58', '2020-08-03 01:28:58'),
(12, 'Good Budget Projector. I bought it to use primarily with art projects, to help with tracing images onto other surfaces. It\'s good so far. I haven\'t used it extensively, but it\'s pretty good so far. I just need to buy an HDMI to micro USB converter to see how the smartphone connection works.', NULL, 'Phạm hoàng thi', '098765432', NULL, 2, '4', 'on', '2020-08-03 02:25:50', '2020-08-03 02:25:50'),
(13, 'Good stuff! Easy setup, easy to use. I’ve been using it to project Twitch streams onto the wall of my gaming room, and I’m super happy with it. Fan is audible, but built in speakers are robust.', NULL, 'Nguyễn Văn Tuân', '0987654321', NULL, 2, '1', 'off', '2020-08-03 02:26:23', '2020-08-03 02:26:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `value`, `title`, `name`, `type`, `parent_id`, `style`, `required`, `updated_at`, `created_at`) VALUES
(1, '45', 'id giao diện webbox', 'theme_webbox', 'theme_id', 6, 'text', 'required', '2020-04-13 16:31:47', '0000-00-00 00:00:00'),
(2, '', 'Tên miền', 'domain', 'domain', 0, 'title', NULL, '2020-04-13 11:27:01', '0000-00-00 00:00:00'),
(3, '46', 'id trang chủ webbox', 'theme_home_id', 'theme_id', 6, 'text', 'required', '2020-04-13 16:31:40', '0000-00-00 00:00:00'),
(4, '47', 'id danh mục webbox', 'theme_cat_id', 'theme_id', 6, 'text', 'required', '2020-04-13 16:31:41', '0000-00-00 00:00:00'),
(5, '48', 'id bài viết webbox', 'theme_post_id', 'theme_id', 6, 'text', 'required', '2020-04-13 16:31:43', '0000-00-00 00:00:00'),
(6, '', 'Giao diện webbox', 'theme_id', 'theme_id', 0, 'title', NULL, '2020-04-13 11:01:54', '0000-00-00 00:00:00'),
(7, 'http://localhost:8080/land/public', 'Tên miền', '', 'domain', 2, 'text', NULL, '2020-04-13 11:27:34', '0000-00-00 00:00:00'),
(11, NULL, 'Mail', 'mail', 'mail', 0, 'title', NULL, '2020-04-13 08:29:30', '2020-04-13 08:29:30'),
(12, NULL, 'Thanh toán', 'pay', 'pay', 0, 'title', NULL, '2020-04-13 09:22:50', '2020-04-13 09:22:50'),
(13, '<div><strong>- Ng&acirc;n h&agrave;ng Vietcombank</strong><br />- Số t&agrave;i khoản: 0491000026886<br />- Chủ t&agrave;i khoản: Pham Hoang thi<br />- Chi nh&aacute;nh: Thăng Long</div>', 'Ngân hàng vietcombank', 'pay_vietcombank', 'pay', 12, 'editor', NULL, '2020-04-14 12:24:05', '2020-04-13 09:27:46'),
(14, NULL, 'Liên hệ', 'contact', 'contact', 0, 'title', NULL, '2020-04-14 13:09:05', '2020-04-14 13:09:05'),
(15, '<div class=\"footer-tell\"><strong>C&ocirc;ng ty TNHH WebUX | MST 0108181640</strong></div>\r\n<div class=\"footer-tell\">&nbsp;</div>\r\n<div class=\"footer-tell\"><span>- </span><strong>Hotline:</strong> 0966 130 168</div>\r\n<div class=\"footer-info-mod\"><span> - </span><strong>Email:</strong> cskh.webbox@gmail.com</div>\r\n<div class=\"footer-info-mod\"><span>- </span><strong>Zalo:</strong> 0966 130 168</div>\r\n<div class=\"footer-info-mod\">- <strong>Website:</strong> <a href=\"http://webbox.vn\" rel=\"follow\">webbox.vn</a></div>\r\n<div class=\"footer-info-mod\"><span> - <strong>Địa chỉ:</strong> Tầng 6 t&ograve;a nh&agrave; MD Complex, số 68, Nguyễn Cơ Thạch,Nam Từ Li&ecirc;m, H&agrave; Nội</span></div>', 'Thông tin đầy đủ', 'contact_full', 'contact', 14, 'editor', NULL, '2020-04-14 21:22:50', '2020-04-14 13:13:50'),
(16, '<p>Ch&agrave;o bạn</p>', 'Nội dung mail', 'mailContent', 'mail', 0, 'text', '', '2022-04-06 09:06:14', '0000-00-00 00:00:00'),
(17, '', 'Ngày hiện tại', 'date_current', 'mail', 0, 'text', '', '2022-04-06 09:06:19', '0000-00-00 00:00:00'),
(18, 'Báo giá', 'Nội dung mail', 'mailTitle', 'mail', 0, 'text', '', '2022-04-06 09:06:18', '0000-00-00 00:00:00'),
(19, 'off', 'Bật gửi mail', 'mailSendStatus', 'mail', 0, 'text', '', '2022-04-14 15:26:28', '0000-00-00 00:00:00'),
(20, 'cid18hotmail@gmail.com', 'Địa chỉ email', 'mailAddress', 'mail', 0, 'text', '', '2022-04-14 15:03:26', '0000-00-00 00:00:00'),
(21, 'Congty18', 'Mật khẩu Email', 'mailPass', 'mail', 0, 'text', '', '2022-04-14 14:36:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `def` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` int(255) DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `file`
--

INSERT INTO `file` (`id`, `name`, `icon`, `link`, `post_id`, `updated_at`, `created_at`) VALUES
(7, 'logo a cường-3.pdf', NULL, NULL, NULL, '2020-08-02 17:58:37', '2020-08-02 17:58:37'),
(9, 'logo a cường-5.pdf', NULL, NULL, 28, '2020-08-02 19:11:11', '2020-08-02 19:11:11'),
(10, 'logo a cường-6.pdf', NULL, NULL, 28, '2020-08-02 19:11:11', '2020-08-02 19:11:11'),
(11, 'LEISURE_3_detailed_user_manual_V1.01_EN.pdf', NULL, NULL, 2, '2020-08-02 20:15:55', '2020-08-02 20:15:55'),
(12, 'LEISURE_3_detailed_user_manual_V1.01_EN.pdf', NULL, NULL, 1, '2020-08-04 00:22:54', '2020-08-04 00:22:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custome_email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noti` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_send_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_receive_admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `form`
--

INSERT INTO `form` (`id`, `name`, `email`, `custome_email`, `status`, `code`, `noti`, `created_at`, `updated_at`, `full_name`, `tel`, `email_send_admin`, `email_receive_admin`, `request`, `care`, `button`, `title`, `des`) VALUES
(12, 'Liên hệ', 'on', NULL, 'on', NULL, NULL, NULL, '2020-08-03 09:50:08', 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huyen`
--

DROP TABLE IF EXISTS `huyen`;
CREATE TABLE IF NOT EXISTS `huyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=678 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `huyen`
--

INSERT INTO `huyen` (`id`, `name`, `url`, `tinh_id`, `updated_at`, `created_at`) VALUES
(1, 'A Lưới', 'a-luoi', 57, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(2, 'An Biên', 'an-bien', 33, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(3, 'An Dương', 'an-duong', 26, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(4, 'An Khê', 'an-khe', 21, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(5, 'An Lão', 'an-lao', 8, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(6, 'An Minh', 'an-minh', 33, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(7, 'An Nhơn', 'an-nhon', 8, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(8, 'An Phú', 'an-phu', 1, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(9, 'Anh Sơn', 'anh-son', 41, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(10, 'Ayun Pa', 'ayun-pa', 21, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(11, 'Ân Thi', 'an-thi', 31, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(12, 'Ba Bể', 'ba-be', 3, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(13, 'Ba Chẽ', 'ba-che', 49, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(14, 'Ba Đình', 'ba-dinh', 27, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(15, 'Ba Đồn', 'ba-don', 46, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(16, 'Ba Tơ', 'ba-to', 48, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(17, 'Ba Tri', 'ba-tri', 7, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(18, 'Ba Vì', 'ba-vi', 27, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(19, 'Bà Rịa', 'ba-ria', 6, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(20, 'Bá Thước', 'ba-thuoc', 56, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(21, 'Bác Ái', 'bac-ai', 43, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(22, 'TP Bạc Liêu', 'tp-bac-lieu', 4, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(23, 'Bạch Long Vĩ', 'bach-long-vi', 26, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(24, 'Bạch Thông', 'bach-thong', 3, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(25, 'Bảo Lạc', 'bao-lac', 14, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(26, 'Bảo Lâm', 'bao-lam', 36, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(27, 'Bảo Lộc', 'bao-loc', 36, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(28, 'Bảo Thắng', 'bao-thang', 38, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(29, 'Bảo Yên', 'bao-yen', 38, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(30, 'Bát Xát', 'bat-xat', 38, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(31, 'Bàu Bàng', 'bau-bang', 9, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(32, 'Bắc Bình', 'bac-binh', 11, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(33, 'TP Bắc Giang', 'tp-bac-giang', 2, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(34, 'Bắc Hà', 'bac-ha', 38, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(35, 'TP Bắc Kạn', 'tp-bac-kan', 3, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(36, 'Bắc Mê', 'bac-me', 22, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(37, 'TP Bắc Ninh', 'tp-bac-ninh', 5, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(38, 'Bắc Quang', 'bac-quang', 22, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(39, 'Bắc Sơn', 'bac-son', 37, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(40, 'Bắc Tân Uyên', 'bac-tan-uyen', 9, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(41, 'Bắc Trà My', 'bac-tra-my', 47, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(42, 'Bắc Từ Liêm', 'bac-tu-liem', 27, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(43, 'Bắc Yên', 'bac-yen', 52, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(44, 'Bến Cát', 'ben-cat', 9, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(45, 'Bến Cầu', 'ben-cau', 53, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(46, 'Bến Lức', 'ben-luc', 39, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(47, 'TP Bến Tre', 'tp-ben-tre', 7, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(48, 'Biên Hòa', 'bien-hoa', 19, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(49, 'Bỉm Sơn', 'bim-son', 56, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(50, 'Bình Chánh', 'binh-chanh', 30, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(51, 'Bình Đại', 'binh-dai', 7, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(52, 'Bình Gia', 'binh-gia', 37, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(53, 'Bình Giang', 'binh-giang', 25, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(54, 'Bình Liêu', 'binh-lieu', 49, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(55, 'Bình Long', 'binh-long', 10, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(56, 'Bình Lục', 'binh-luc', 23, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(57, 'Bình Minh', 'binh-minh', 61, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(58, 'Bình Sơn', 'binh-son', 48, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(59, 'Bình Tân', 'binh-tan', 61, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(60, 'Bình Thạnh', 'binh-thanh', 30, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(61, 'Bình Thủy', 'binh-thuy', 13, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(62, 'Bình Xuyên', 'binh-xuyen', 62, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(63, 'Bố Trạch', 'bo-trach', 46, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(64, 'Bù Đăng', 'bu-dang', 10, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(65, 'Bù Đốp', 'bu-dop', 10, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(66, 'Bù Gia Mập', 'bu-gia-map', 10, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(67, 'Buôn Đôn', 'buon-don', 16, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(68, 'Buôn Hồ', 'buon-ho', 16, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(69, 'Buôn Ma Thuột', 'buon-ma-thuot', 16, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(70, 'TP Cà Mau', 'tp-ca-mau', 12, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(71, 'Cai Lậy', 'cai-lay', 58, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(72, 'Cái Bè', 'cai-be', 58, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(73, 'Cái Nước', 'cai-nuoc', 12, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(74, 'Cái Răng', 'cai-rang', 13, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(75, 'Cam Lâm', 'cam-lam', 32, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(76, 'Cam Lộ', 'cam-lo', 50, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(77, 'Cam Ranh', 'cam-ranh', 32, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(78, 'Can Lộc', 'can-loc', 24, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(79, 'Càng Long', 'cang-long', 59, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(80, 'TP Cao Bằng', 'tp-cao-bang', 14, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(81, 'Cao Lãnh', 'cao-lanh', 20, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(82, 'Cao Lộc', 'cao-loc', 37, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(83, 'Cao Phong', 'cao-phong', 29, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(84, 'Cát Hải', 'cat-hai', 26, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(85, 'Cát Tiên', 'cat-tien', 36, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(86, 'Cẩm Giàng', 'cam-giang', 25, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(87, 'Cẩm Khê', 'cam-khe', 44, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(88, 'Cẩm Lệ', 'cam-le', 15, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(89, 'Cẩm Mỹ', 'cam-my', 19, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(90, 'Cẩm Phả', 'cam-pha', 49, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(91, 'Cẩm Thủy', 'cam-thuy', 56, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(92, 'Cẩm Xuyên', 'cam-xuyen', 24, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(93, 'Cần Đước', 'can-duoc', 39, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(94, 'Cần Giờ', 'can-gio', 30, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(95, 'Cần Giuộc', 'can-giuoc', 39, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(96, 'Cầu Giấy', 'cau-giay', 27, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(97, 'Cầu Kè', 'cau-ke', 59, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(98, 'Cầu Ngang', 'cau-ngang', 59, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(99, 'Châu Đốc', 'chau-doc', 1, '2020-07-31 12:01:41', '2020-07-31 12:01:41'),
(100, 'Châu Đức', 'chau-duc', 6, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(101, 'Châu Phú', 'chau-phu', 1, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(102, 'Châu Thành', 'chau-thanh', 59, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(103, 'Châu Thành A', 'chau-thanh-a', 28, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(104, 'Chi Lăng', 'chi-lang', 37, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(105, 'Chí Linh', 'chi-linh', 25, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(106, 'Chiêm Hóa', 'chiem-hoa', 60, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(107, 'Chợ Đồn', 'cho-don', 3, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(108, 'Chợ Gạo', 'cho-gao', 58, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(109, 'Chợ Lách', 'cho-lach', 7, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(110, 'Chợ Mới', 'cho-moi', 1, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(111, 'Chơn Thành', 'chon-thanh', 10, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(112, 'Chư Păh', 'chu-pah', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(113, 'Chư Prông', 'chu-prong', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(114, 'Chư Pưh', 'chu-puh', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(115, 'Chư Sê', 'chu-se', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(116, 'Chương Mỹ', 'chuong-my', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(117, 'Con Cuông', 'con-cuong', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(118, 'Cô Tô', 'co-to', 49, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(119, 'Côn Đảo', 'con-dao', 6, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(120, 'Cồn Cỏ', 'con-co', 50, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(121, 'Cờ Đỏ', 'co-do', 13, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(122, 'Cù Lao Dung', 'cu-lao-dung', 51, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(123, 'Củ Chi', 'cu-chi', 30, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(124, 'Cư Kuin', 'cu-kuin', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(125, 'Cư Jút', 'cu-jut', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(126, 'Cư M\'gar', 'cu-mgar', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(127, 'Cửa Lò', 'cua-lo', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(128, 'Dầu Tiếng', 'dau-tieng', 9, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(129, 'Di Linh', 'di-linh', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(130, 'Dĩ An', 'di-an', 9, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(131, 'Diên Khánh', 'dien-khanh', 32, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(132, 'Diễn Châu', 'dien-chau', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(133, 'Duy Tiên', 'duy-tien', 23, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(134, 'Duy Xuyên', 'duy-xuyen', 47, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(135, 'Duyên Hải', 'duyen-hai', 59, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(136, 'Dương Kinh', 'duong-kinh', 26, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(137, 'Dương Minh Châu', 'duong-minh-chau', 53, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(138, 'Đa Krông', 'da-krong', 50, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(139, 'Đà Bắc', 'da-bac', 29, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(140, 'Đà Lạt', 'da-lat', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(141, 'Đạ Huoai', 'da-huoai', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(142, 'Đạ Tẻh', 'da-teh', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(143, 'Đại Lộc', 'dai-loc', 47, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(144, 'Đại Từ', 'dai-tu', 55, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(145, 'Đắk Đoa', 'dak-doa', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(146, 'Đak Pơ', 'dak-po', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(147, 'Đan Phượng', 'dan-phuong', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(148, 'Đắk Glei', 'dak-glei', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(149, 'Đắk Glong', 'dak-glong', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(150, 'Đắk Hà', 'dak-ha', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(151, 'Đắk Mil', 'dak-mil', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(152, 'Đắk R\'lấp', 'dak-rlap', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(153, 'Đắk Song', 'dak-song', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(154, 'Đắk Tô', 'dak-to', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(155, 'Đầm Dơi', 'dam-doi', 12, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(156, 'Đầm Hà', 'dam-ha', 49, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(157, 'Đam Rông', 'dam-rong', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(158, 'Đất Đỏ', 'dat-do', 6, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(159, 'Điện Bàn', 'dien-ban', 47, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(160, 'TP Điện Biên', 'tp-dien-bien', 18, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(161, 'Điện Biên Đông', 'dien-bien-dong', 18, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(162, 'Điện Biên Phủ', 'dien-bien-phu', 18, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(163, 'Đình Lập', 'dinh-lap', 37, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(164, 'Định Hóa', 'dinh-hoa', 55, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(165, 'Định Quán', 'dinh-quan', 19, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(166, 'Đoan Hùng', 'doan-hung', 44, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(167, 'Đô Lương', 'do-luong', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(168, 'Đồ Sơn', 'do-son', 26, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(169, 'Đông Anh', 'dong-anh', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(170, 'Đông Giang', 'dong-giang', 47, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(171, 'Đông Hà', 'dong-ha', 50, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(172, 'Đông Hải', 'dong-hai', 4, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(173, 'Đông Hòa', 'dong-hoa', 45, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(174, 'Đông Hưng', 'dong-hung', 54, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(175, 'Đông Sơn', 'dong-son', 56, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(176, 'Đông Triều', 'dong-trieu', 49, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(177, 'Đồng Hới', 'dong-hoi', 46, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(178, 'Đồng Hỷ', 'dong-hy', 55, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(179, 'Đồng Phú', 'dong-phu', 10, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(180, 'Đồng Văn', 'dong-van', 22, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(181, 'Đồng Xoài', 'dong-xoai', 10, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(182, 'Đồng Xuân', 'dong-xuan', 45, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(183, 'Đống Đa', 'dong-da', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(184, 'Đơn Dương', 'don-duong', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(185, 'Đức Cơ', 'duc-co', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(186, 'Đức Hòa', 'duc-hoa', 39, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(187, 'Đức Huệ', 'duc-hue', 39, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(188, 'Đức Linh', 'duc-linh', 11, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(189, 'Đức Phổ', 'duc-pho', 48, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(190, 'Đức Thọ', 'duc-tho', 24, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(191, 'Đức Trọng', 'duc-trong', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(192, 'Ea H\'leo', 'ea-hleo', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(193, 'Ea Kar', 'ea-kar', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(194, 'Ea Súp', 'ea-sup', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(195, 'Gia Bình', 'gia-binh', 5, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(196, 'Gia Lâm', 'gia-lam', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(197, 'Gia Lộc', 'gia-loc', 25, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(198, 'Gia Nghĩa', 'gia-nghia', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(199, 'Gia Viễn', 'gia-vien', 42, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(200, 'Giá Rai', 'gia-rai', 4, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(201, 'Giang Thành', 'giang-thanh', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(202, 'Giao Thủy', 'giao-thuy', 40, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(203, 'Gio Linh', 'gio-linh', 50, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(204, 'Giồng Riềng', 'giong-rieng', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(205, 'Giồng Trôm', 'giong-trom', 7, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(206, 'Gò Công', 'go-cong', 58, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(207, 'Gò Công Đông', 'go-cong-dong', 58, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(208, 'Gò Công Tây', 'go-cong-tay', 58, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(209, 'Gò Dầu', 'go-dau', 53, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(210, 'Gò Quao', 'go-quao', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(211, 'Gò Vấp', 'go-vap', 30, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(212, 'Hà Đông', 'ha-dong', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(213, 'TP Hà Giang', 'tp-ha-giang', 22, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(214, 'Hà Quảng', 'ha-quang', 14, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(215, 'Hà Tiên', 'ha-tien', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(216, 'TP Hà Tĩnh', 'tp-ha-tinh', 24, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(217, 'Hà Trung', 'ha-trung', 56, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(218, 'Hạ Hòa', 'ha-hoa', 44, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(219, 'Hạ Lang', 'ha-lang', 14, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(220, 'Hạ Long', 'ha-long', 49, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(221, 'Hai Bà Trưng', 'hai-ba-trung', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(222, 'Hải An', 'hai-an', 26, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(223, 'Hải Châu', 'hai-chau', 15, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(224, 'TP Hải Dương', 'tp-hai-duong', 25, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(225, 'Hải Hà', 'hai-ha', 49, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(226, 'Hải Hậu', 'hai-hau', 40, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(227, 'Hải Lăng', 'hai-lang', 50, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(228, 'Hàm Tân', 'ham-tan', 11, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(229, 'Hàm Thuận Bắc', 'ham-thuan-bac', 11, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(230, 'Hàm Thuận Nam', 'ham-thuan-nam', 11, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(231, 'Hàm Yên', 'ham-yen', 60, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(232, 'Hậu Lộc', 'hau-loc', 56, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(233, 'Hiệp Đức', 'hiep-duc', 47, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(234, 'Hiệp Hòa', 'hiep-hoa', 2, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(235, 'Hoa Lư', 'hoa-lu', 42, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(236, 'Hòa An', 'hoa-an', 14, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(237, 'TP Hoà Bình', 'tp-hoa-binh', 29, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(238, 'Hòa Thành', 'hoa-thanh', 53, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(239, 'Hòa Vang', 'hoa-vang', 15, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(240, 'Hoài Ân', 'hoai-an', 8, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(241, 'Hoài Đức', 'hoai-duc', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(242, 'Hoài Nhơn', 'hoai-nhon', 8, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(243, 'Hoàn Kiếm', 'hoan-kiem', 27, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(244, 'Hoàng Mai', 'hoang-mai', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(245, 'Hoàng Sa', 'hoang-sa', 15, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(246, 'Hoàng Su Phì', 'hoang-su-phi', 22, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(247, 'Hoằng Hóa', 'hoang-hoa', 56, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(248, 'Hóc Môn', 'hoc-mon', 30, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(249, 'Hòn Đất', 'hon-dat', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(250, 'Hớn Quản', 'hon-quan', 10, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(251, 'Hội An', 'hoi-an', 47, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(252, 'Hồng Bàng', 'hong-bang', 26, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(253, 'Hồng Dân', 'hong-dan', 4, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(254, 'Hồng Lĩnh', 'hong-linh', 24, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(255, 'Hồng Ngự', 'hong-ngu', 20, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(256, 'Huế', 'hue', 57, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(257, 'Hưng Hà', 'hung-ha', 54, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(258, 'Hưng Nguyên', 'hung-nguyen', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(259, 'TP Hưng Yên', 'tp-hung-yen', 31, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(260, 'Hương Khê', 'huong-khe', 24, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(261, 'Hương Sơn', 'huong-son', 24, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(262, 'Hương Thủy', 'huong-thuy', 57, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(263, 'Hương Trà', 'huong-tra', 57, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(264, 'Hướng Hóa', 'huong-hoa', 50, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(265, 'Hữu Lũng', 'huu-lung', 37, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(266, 'Ia Grai', 'ia-grai', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(267, 'Ia H\'Drai', 'ia-hdrai', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(268, 'Ia Pa', 'ia-pa', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(269, 'K\'Bang', 'kbang', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(270, 'Kế Sách', 'ke-sach', 51, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(271, 'Khánh Sơn', 'khanh-son', 32, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(272, 'Khánh Vĩnh', 'khanh-vinh', 32, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(273, 'Khoái Châu', 'khoai-chau', 31, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(274, 'Kiên Hải', 'kien-hai', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(275, 'Kiên Lương', 'kien-luong', 33, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(276, 'Kiến An', 'kien-an', 26, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(277, 'Kiến Thụy', 'kien-thuy', 26, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(278, 'Kiến Xương', 'kien-xuong', 54, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(279, 'Kiến Tường', 'kien-tuong', 39, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(280, 'Kim Bảng', 'kim-bang', 23, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(281, 'Kim Bôi', 'kim-boi', 29, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(282, 'Kim Động', 'kim-dong', 31, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(283, 'Kim Sơn', 'kim-son', 42, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(284, 'Kim Thành', 'kim-thanh', 25, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(285, 'Kinh Môn', 'kinh-mon', 25, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(286, 'Kon Plông', 'kon-plong', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(287, 'Kon Rẫy', 'kon-ray', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(288, 'TP Kon Tum', 'tp-kon-tum', 34, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(289, 'Kông Chro', 'kong-chro', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(290, 'Krông Ana', 'krong-ana', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(291, 'Krông Bông', 'krong-bong', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(292, 'Krông Búk', 'krong-buk', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(293, 'Krông Năng', 'krong-nang', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(294, 'Krông Nô', 'krong-no', 17, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(295, 'Krông Pa', 'krong-pa', 21, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(296, 'Krông Pắk', 'krong-pak', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(297, 'Kỳ Anh', 'ky-anh', 24, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(298, 'Kỳ Sơn', 'ky-son', 41, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(299, 'La Gi', 'la-gi', 11, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(300, 'Lạc Dương', 'lac-duong', 36, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(301, 'Lạc Sơn', 'lac-son', 29, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(302, 'Lạc Thủy', 'lac-thuy', 29, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(303, 'TP Lai Châu', 'tp-lai-chau', 35, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(304, 'Lai Vung', 'lai-vung', 20, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(305, 'Lang Chánh', 'lang-chanh', 56, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(306, 'Lạng Giang', 'lang-giang', 2, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(307, 'TP Lạng Sơn', 'tp-lang-son', 37, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(308, 'TP Lào Cai', 'tp-lao-cai', 38, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(309, 'Lắk', 'lak', 16, '2020-07-31 12:01:42', '2020-07-31 12:01:42'),
(310, 'Lâm Bình', 'lam-binh', 60, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(311, 'Lâm Hà', 'lam-ha', 36, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(312, 'Lâm Thao', 'lam-thao', 44, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(313, 'Lấp Vò', 'lap-vo', 20, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(314, 'Lập Thạch', 'lap-thach', 62, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(315, 'Lê Chân', 'le-chan', 26, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(316, 'Lệ Thủy', 'le-thuy', 46, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(317, 'Liên Chiểu', 'lien-chieu', 15, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(318, 'Long Biên', 'long-bien', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(319, 'Long Điền', 'long-dien', 6, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(320, 'Long Hồ', 'long-ho', 61, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(321, 'Long Khánh', 'long-khanh', 19, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(322, 'Long Mỹ', 'long-my', 28, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(323, 'Long Phú', 'long-phu', 51, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(324, 'Long Thành', 'long-thanh', 19, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(325, 'Long Xuyên', 'long-xuyen', 1, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(326, 'Lộc Bình', 'loc-binh', 37, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(327, 'Lộc Hà', 'loc-ha', 24, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(328, 'Lộc Ninh', 'loc-ninh', 10, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(329, 'Lục Nam', 'luc-nam', 2, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(330, 'Lục Ngạn', 'luc-ngan', 2, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(331, 'Lục Yên', 'luc-yen', 63, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(332, 'Lương Sơn', 'luong-son', 29, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(333, 'Lương Tài', 'luong-tai', 5, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(334, 'Lý Nhân', 'ly-nhan', 23, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(335, 'Lý Sơn', 'ly-son', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(336, 'Mai Châu', 'mai-chau', 29, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(337, 'Mai Sơn', 'mai-son', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(338, 'Mang Thít', 'mang-thit', 61, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(339, 'Mang Yang', 'mang-yang', 21, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(340, 'M\'Đrăk', 'mdrak', 16, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(341, 'Mèo Vạc', 'meo-vac', 22, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(342, 'Mê Linh', 'me-linh', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(343, 'Minh Hóa', 'minh-hoa', 46, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(344, 'Minh Long', 'minh-long', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(345, 'Mỏ Cày Bắc', 'mo-cay-bac', 7, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(346, 'Mỏ Cày Nam', 'mo-cay-nam', 7, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(347, 'Móng Cái', 'mong-cai', 49, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(348, 'Mộ Đức', 'mo-duc', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(349, 'Mộc Châu', 'moc-chau', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(350, 'Mộc Hóa', 'moc-hoa', 39, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(351, 'Mù Cang Chải', 'mu-cang-chai', 63, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(352, 'Mường Ảng', 'muong-ang', 18, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(353, 'Mường Chà', 'muong-cha', 18, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(354, 'Mường Khương', 'muong-khuong', 38, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(355, 'Mường La', 'muong-la', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(356, 'Mường Lát', 'muong-lat', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(357, 'Mường Lay', 'muong-lay', 18, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(358, 'Mường Nhé', 'muong-nhe', 18, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(359, 'Mường Tè', 'muong-te', 35, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(360, 'Mỹ Đức', 'my-duc', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(361, 'Mỹ Hào', 'my-hao', 31, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(362, 'Mỹ Lộc', 'my-loc', 40, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(363, 'Mỹ Tho', 'my-tho', 58, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(364, 'Mỹ Tú', 'my-tu', 51, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(365, 'Mỹ Xuyên', 'my-xuyen', 51, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(366, 'Na Hang', 'na-hang', 60, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(367, 'Na Rì', 'na-ri', 3, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(368, 'Nam Đàn', 'nam-dan', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(369, 'TP Nam Định', 'tp-nam-dinh', 40, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(370, 'Nam Đông', 'nam-dong', 57, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(371, 'Nam Giang', 'nam-giang', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(372, 'Nam Sách', 'nam-sach', 25, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(373, 'Nam Trà My', 'nam-tra-my', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(374, 'Nam Trực', 'nam-truc', 40, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(375, 'Nam Từ Liêm', 'nam-tu-liem', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(376, 'Năm Căn', 'nam-can', 12, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(377, 'Nậm Pồ', 'nam-po', 18, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(378, 'Nậm Nhùn', 'nam-nhun', 35, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(379, 'Nga Sơn', 'nga-son', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(380, 'Ngã Bảy', 'nga-bay', 28, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(381, 'Ngã Năm', 'nga-nam', 51, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(382, 'Ngân Sơn', 'ngan-son', 3, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(383, 'Nghi Lộc', 'nghi-loc', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(384, 'Nghi Sơn', 'nghi-son', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(385, 'Nghi Xuân', 'nghi-xuan', 24, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(386, 'Nghĩa Đàn', 'nghia-dan', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(387, 'Nghĩa Hành', 'nghia-hanh', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(388, 'Nghĩa Hưng', 'nghia-hung', 40, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(389, 'Nghĩa Lộ', 'nghia-lo', 63, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(390, 'Ngọc Hiển', 'ngoc-hien', 12, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(391, 'Ngọc Hồi', 'ngoc-hoi', 34, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(392, 'Ngọc Lặc', 'ngoc-lac', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(393, 'Ngô Quyền', 'ngo-quyen', 26, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(394, 'Ngũ Hành Sơn', 'ngu-hanh-son', 15, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(395, 'Nguyên Bình', 'nguyen-binh', 14, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(396, 'Nha Trang', 'nha-trang', 32, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(397, 'Nhà Bè', 'nha-be', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(398, 'Nho Quan', 'nho-quan', 42, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(399, 'Nhơn Trạch', 'nhon-trach', 19, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(400, 'Như Thanh', 'nhu-thanh', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(401, 'Như Xuân', 'nhu-xuan', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(402, 'TP Ninh Bình', 'tp-ninh-binh', 42, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(403, 'Ninh Giang', 'ninh-giang', 25, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(404, 'Ninh Hải', 'ninh-hai', 43, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(405, 'Ninh Hòa', 'ninh-hoa', 32, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(406, 'Ninh Kiều', 'ninh-kieu', 13, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(407, 'Ninh Phước', 'ninh-phuoc', 43, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(408, 'Ninh Sơn', 'ninh-son', 43, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(409, 'Nông Cống', 'nong-cong', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(410, 'Nông Sơn', 'nong-son', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(411, 'Núi Thành', 'nui-thanh', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(412, 'Ô Môn', 'o-mon', 13, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(413, 'Pác Nặm', 'pac-nam', 3, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(414, 'Phan Rang-Tháp Chàm', 'phan-rang-thap-cham', 43, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(415, 'Phan Thiết', 'phan-thiet', 11, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(416, 'Phong Điền', 'phong-dien', 13, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(417, 'Phong Thổ', 'phong-tho', 35, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(418, 'Phổ Yên', 'pho-yen', 55, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(419, 'Phú Bình', 'phu-binh', 55, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(420, 'Phú Giáo', 'phu-giao', 9, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(421, 'Phú Hòa', 'phu-hoa', 45, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(422, 'Phú Lộc', 'phu-loc', 57, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(423, 'Phú Lương', 'phu-luong', 55, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(424, 'Phú Mỹ', 'phu-my', 6, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(425, 'Phú Nhuận', 'phu-nhuan', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(426, 'Phú Ninh', 'phu-ninh', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(427, 'Phú Quý', 'phu-quy', 11, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(428, 'Phú Quốc', 'phu-quoc', 33, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(429, 'Phú Riềng', 'phu-rieng', 10, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(430, 'Phú Tân', 'phu-tan', 12, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(431, 'Phú Thiện', 'phu-thien', 21, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(432, 'TP Phú Thọ', 'tp-phu-tho', 44, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(433, 'Phú Vang', 'phu-vang', 57, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(434, 'Phú Xuyên', 'phu-xuyen', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(435, 'Phù Cát', 'phu-cat', 8, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(436, 'Phù Cừ', 'phu-cu', 31, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(437, 'Phù Mỹ', 'phu-my', 8, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(438, 'Phù Ninh', 'phu-ninh', 44, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(439, 'Phù Yên', 'phu-yen', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(440, 'Phủ Lý', 'phu-ly', 23, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(441, 'Phúc Thọ', 'phuc-tho', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(442, 'Phúc Yên', 'phuc-yen', 62, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(443, 'Phụng Hiệp', 'phung-hiep', 28, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(444, 'Phước Long', 'phuoc-long', 4, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(445, 'Phước Sơn', 'phuoc-son', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(446, 'Pleiku', 'pleiku', 21, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(447, 'Quan Hóa', 'quan-hoa', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(448, 'Quan Sơn', 'quan-son', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(449, 'Quản Bạ', 'quan-ba', 22, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(450, 'Quang Bình', 'quang-binh', 22, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(451, 'Quảng Điền', 'quang-dien', 57, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(452, 'Quảng Hòa', 'quang-hoa', 14, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(453, 'TP Quảng Ngãi', 'tp-quang-ngai', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(454, 'Quảng Ninh', 'quang-ninh', 46, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(455, 'Quảng Trạch', 'quang-trach', 46, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(456, 'TP Quảng Trị', 'tp-quang-tri', 50, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(457, 'Quảng Yên', 'quang-yen', 49, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(458, 'Quảng Xương', 'quang-xuong', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(459, 'Quận 1', 'quan-1', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(460, 'Quận 2', 'quan-2', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(461, 'Quận 3', 'quan-3', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(462, 'Quận 4', 'quan-4', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(463, 'Quận 5', 'quan-5', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(464, 'Quận 6', 'quan-6', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(465, 'Quận 7', 'quan-7', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(466, 'Quận 8', 'quan-8', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(467, 'Quận 9', 'quan-9', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(468, 'Quận 10', 'quan-10', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(469, 'Quận 11', 'quan-11', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(470, 'Quận 12', 'quan-12', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(471, 'Quế Phong', 'que-phong', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(472, 'Quế Sơn', 'que-son', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(473, 'Quế Võ', 'que-vo', 5, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(474, 'Quy Nhơn', 'quy-nhon', 8, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(475, 'Quốc Oai', 'quoc-oai', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(476, 'Quỳ Châu', 'quy-chau', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(477, 'Quỳ Hợp', 'quy-hop', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(478, 'Quỳnh Lưu', 'quynh-luu', 41, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(479, 'Quỳnh Nhai', 'quynh-nhai', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(480, 'Quỳnh Phụ', 'quynh-phu', 54, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(481, 'Rạch Giá', 'rach-gia', 33, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(482, 'Sa Đéc', 'sa-dec', 20, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(483, 'Sa Pa', 'sa-pa', 38, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(484, 'Sa Thầy', 'sa-thay', 34, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(485, 'Sầm Sơn', 'sam-son', 56, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(486, 'Si Ma Cai', 'si-ma-cai', 38, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(487, 'Sìn Hồ', 'sin-ho', 35, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(488, 'Sóc Sơn', 'soc-son', 27, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(489, 'TP Sóc Trăng', 'tp-soc-trang', 51, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(490, 'Sông Cầu', 'song-cau', 45, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(491, 'Sông Công', 'song-cong', 55, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(492, 'Sông Hinh', 'song-hinh', 45, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(493, 'Sông Lô', 'song-lo', 62, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(494, 'Sông Mã', 'song-ma', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(495, 'Sốp Cộp', 'sop-cop', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(496, 'Sơn Động', 'son-dong', 2, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(497, 'Sơn Dương', 'son-duong', 60, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(498, 'Sơn Hà', 'son-ha', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(499, 'Sơn Hòa', 'son-hoa', 45, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(500, 'TP Sơn La', 'tp-son-la', 52, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(501, 'Sơn Tây', 'son-tay', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(502, 'Sơn Tịnh', 'son-tinh', 48, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(503, 'Sơn Trà', 'son-tra', 15, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(504, 'Tam Bình', 'tam-binh', 61, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(505, 'Tam Dương', 'tam-duong', 62, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(506, 'Tam Đảo', 'tam-dao', 62, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(507, 'Tam Điệp', 'tam-diep', 42, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(508, 'Tam Đường', 'tam-duong', 35, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(509, 'Tam Kỳ', 'tam-ky', 47, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(510, 'Tam Nông', 'tam-nong', 44, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(511, 'Tánh Linh', 'tanh-linh', 11, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(512, 'Tân An', 'tan-an', 39, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(513, 'Tân Biên', 'tan-bien', 53, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(514, 'Tân Bình', 'tan-binh', 30, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(515, 'Tân Châu', 'tan-chau', 53, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(516, 'Tân Hiệp', 'tan-hiep', 33, '2020-07-31 12:01:43', '2020-07-31 12:01:43'),
(517, 'Tân Hồng', 'tan-hong', 20, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(518, 'Tân Hưng', 'tan-hung', 39, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(519, 'Tân Kỳ', 'tan-ky', 41, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(520, 'Tân Lạc', 'tan-lac', 29, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(521, 'Tân Phú', 'tan-phu', 30, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(522, 'Tân Phú Đông', 'tan-phu-dong', 58, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(523, 'Tân Phước', 'tan-phuoc', 58, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(524, 'Tân Sơn', 'tan-son', 44, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(525, 'Tân Thạnh', 'tan-thanh', 39, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(526, 'Tân Trụ', 'tan-tru', 39, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(527, 'Tân Uyên', 'tan-uyen', 35, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(528, 'Tân Yên', 'tan-yen', 2, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(529, 'Tây Giang', 'tay-giang', 47, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(530, 'Tây Hòa', 'tay-hoa', 45, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(531, 'Tây Hồ', 'tay-ho', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(532, 'TP Tây Ninh', 'tp-tay-ninh', 53, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(533, 'Tây Sơn', 'tay-son', 8, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(534, 'Thạch An', 'thach-an', 14, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(535, 'Thạch Hà', 'thach-ha', 24, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(536, 'Thạch Thành', 'thach-thanh', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(537, 'Thạch Thất', 'thach-that', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(538, 'TP Thái Bình', 'tp-thai-binh', 54, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(539, 'Thái Hòa', 'thai-hoa', 41, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(540, 'TP Thái Nguyên', 'tp-thai-nguyen', 55, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(541, 'Thái Thụy', 'thai-thuy', 54, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(542, 'Than Uyên', 'than-uyen', 35, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(543, 'Thanh Ba', 'thanh-ba', 44, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(544, 'Thanh Bình', 'thanh-binh', 20, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(545, 'Thanh Chương', 'thanh-chuong', 41, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(546, 'Thanh Hà', 'thanh-ha', 25, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(547, 'TP Thanh Hóa', 'tp-thanh-hoa', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(548, 'Thanh Khê', 'thanh-khe', 15, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(549, 'Thanh Liêm', 'thanh-liem', 23, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(550, 'Thanh Miện', 'thanh-mien', 25, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(551, 'Thanh Oai', 'thanh-oai', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(552, 'Thanh Sơn', 'thanh-son', 44, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(553, 'Thanh Thủy', 'thanh-thuy', 44, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(554, 'Thanh Trì', 'thanh-tri', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(555, 'Thanh Xuân', 'thanh-xuan', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(556, 'Thạnh Hóa', 'thanh-hoa', 39, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(557, 'Thạnh Phú', 'thanh-phu', 7, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(558, 'Thạnh Trị', 'thanh-tri', 51, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(559, 'Tháp Mười', 'thap-muoi', 20, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(560, 'Thăng Bình', 'thang-binh', 47, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(561, 'Thiệu Hóa', 'thieu-hoa', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(562, 'Thọ Xuân', 'tho-xuan', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(563, 'Thoại Sơn', 'thoai-son', 1, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(564, 'Thống Nhất', 'thong-nhat', 19, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(565, 'Thốt Nốt', 'thot-not', 13, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(566, 'Thới Bình', 'thoi-binh', 12, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(567, 'Thới Lai', 'thoi-lai', 13, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(568, 'Thủ Dầu Một', 'thu-dau-mot', 9, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(569, 'Thủ Đức', 'thu-duc', 30, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(570, 'Thủ Thừa', 'thu-thua', 39, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(571, 'Thuận An', 'thuan-an', 9, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(572, 'Thuận Bắc', 'thuan-bac', 43, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(573, 'Thuận Châu', 'thuan-chau', 52, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(574, 'Thuận Nam', 'thuan-nam', 43, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(575, 'Thuận Thành', 'thuan-thanh', 5, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(576, 'Thủy Nguyên', 'thuy-nguyen', 26, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(577, 'Thường Tín', 'thuong-tin', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(578, 'Thường Xuân', 'thuong-xuan', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(579, 'Tiên Du', 'tien-du', 5, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(580, 'Tiền Hải', 'tien-hai', 54, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(581, 'Tiên Lãng', 'tien-lang', 26, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(582, 'Tiên Lữ', 'tien-lu', 31, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(583, 'Tiên Phước', 'tien-phuoc', 47, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(584, 'Tiên Yên', 'tien-yen', 49, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(585, 'Tiểu Cần', 'tieu-can', 59, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(586, 'Tịnh Biên', 'tinh-bien', 1, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(587, 'Trà Bồng', 'tra-bong', 48, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(588, 'Trà Cú', 'tra-cu', 59, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(589, 'Trà Ôn', 'tra-on', 61, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(590, 'TP Trà Vinh', 'tp-tra-vinh', 59, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(591, 'Trạm Tấu', 'tram-tau', 63, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(592, 'Tràng Định', 'trang-dinh', 37, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(593, 'Trảng Bàng', 'trang-bang', 53, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(594, 'Trảng Bom', 'trang-bom', 19, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(595, 'Trấn Yên', 'tran-yen', 63, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(596, 'Trần Đề', 'tran-de', 51, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(597, 'Trần Văn Thời', 'tran-van-thoi', 12, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(598, 'Tri Tôn', 'tri-ton', 1, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(599, 'Triệu Phong', 'trieu-phong', 50, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(600, 'Triệu Sơn', 'trieu-son', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(601, 'Trùng Khánh', 'trung-khanh', 14, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(602, 'Trực Ninh', 'truc-ninh', 40, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(603, 'Trường Sa', 'truong-sa', 32, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(604, 'Tủa Chùa', 'tua-chua', 18, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(605, 'Tuần Giáo', 'tuan-giao', 18, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(606, 'Tu Mơ Rông', 'tu-mo-rong', 34, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(607, 'Tuy An', 'tuy-an', 45, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(608, 'Tuy Đức', 'tuy-duc', 17, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(609, 'Tuy Hòa', 'tuy-hoa', 45, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(610, 'Tuy Phong', 'tuy-phong', 11, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(611, 'Tuy Phước', 'tuy-phuoc', 8, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(612, 'Tuyên Hóa', 'tuyen-hoa', 46, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(613, 'TP Tuyên Quang', 'tp-tuyen-quang', 60, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(614, 'Tư Nghĩa', 'tu-nghia', 48, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(615, 'Tứ Kỳ', 'tu-ky', 25, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(616, 'Từ Sơn', 'tu-son', 5, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(617, 'Tương Dương', 'tuong-duong', 41, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(618, 'U Minh', 'u-minh', 12, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(619, 'U Minh Thượng', 'u-minh-thuong', 33, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(620, 'Uông Bí', 'uong-bi', 49, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(621, 'Ứng Hòa', 'ung-hoa', 27, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(622, 'Vạn Ninh', 'van-ninh', 32, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(623, 'Văn Bàn', 'van-ban', 38, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(624, 'Văn Chấn', 'van-chan', 63, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(625, 'Văn Giang', 'van-giang', 31, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(626, 'Văn Lãng', 'van-lang', 37, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(627, 'Văn Lâm', 'van-lam', 31, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(628, 'Văn Quan', 'van-quan', 37, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(629, 'Văn Yên', 'van-yen', 63, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(630, 'Vân Canh', 'van-canh', 8, '2020-07-31 12:01:44', '2020-07-31 12:01:44');
INSERT INTO `huyen` (`id`, `name`, `url`, `tinh_id`, `updated_at`, `created_at`) VALUES
(631, 'Vân Đồn', 'van-don', 49, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(632, 'Vân Hồ', 'van-ho', 52, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(633, 'Vị Thanh', 'vi-thanh', 28, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(634, 'Vị Thủy', 'vi-thuy', 28, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(635, 'Vị Xuyên', 'vi-xuyen', 22, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(636, 'Việt Trì', 'viet-tri', 44, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(637, 'Việt Yên', 'viet-yen', 2, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(638, 'Vinh', 'vinh', 41, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(639, 'Vĩnh Bảo', 'vinh-bao', 26, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(640, 'Vĩnh Châu', 'vinh-chau', 51, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(641, 'Vĩnh Cửu', 'vinh-cuu', 19, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(642, 'Vĩnh Hưng', 'vinh-hung', 39, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(643, 'Vĩnh Linh', 'vinh-linh', 50, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(644, 'TP Vĩnh Long', 'tp-vinh-long', 61, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(645, 'Vĩnh Lộc', 'vinh-loc', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(646, 'Vĩnh Lợi', 'vinh-loi', 4, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(647, 'Vĩnh Thạnh', 'vinh-thanh', 13, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(648, 'Vĩnh Thuận', 'vinh-thuan', 33, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(649, 'Vĩnh Tường', 'vinh-tuong', 62, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(650, 'Vĩnh Yên', 'vinh-yen', 62, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(651, 'Võ Nhai', 'vo-nhai', 55, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(652, 'Vũ Quang', 'vu-quang', 24, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(653, 'Vũ Thư', 'vu-thu', 54, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(654, 'Vụ Bản', 'vu-ban', 40, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(655, 'Vũng Liêm', 'vung-liem', 61, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(656, 'Vũng Tàu', 'vung-tau', 6, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(657, 'Xín Mần', 'xin-man', 22, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(658, 'Xuân Lộc', 'xuan-loc', 19, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(659, 'Xuân Trường', 'xuan-truong', 40, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(660, 'Xuyên Mộc', 'xuyen-moc', 6, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(661, 'Ý Yên', 'y-yen', 40, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(662, 'TP Yên Bái', 'tp-yen-bai', 63, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(663, 'Yên Bình', 'yen-binh', 63, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(664, 'Yên Châu', 'yen-chau', 52, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(665, 'Yên Dũng', 'yen-dung', 2, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(666, 'Yên Định', 'yen-dinh', 56, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(667, 'Yên Khánh', 'yen-khanh', 42, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(668, 'Yên Lạc', 'yen-lac', 62, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(669, 'Yên Lập', 'yen-lap', 44, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(670, 'Yên Minh', 'yen-minh', 22, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(671, 'Yên Mô', 'yen-mo', 42, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(672, 'Yên Mỹ', 'yen-my', 31, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(673, 'Yên Phong', 'yen-phong', 5, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(674, 'Yên Sơn', 'yen-son', 60, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(675, 'Yên Thành', 'yen-thanh', 41, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(676, 'Yên Thế', 'yen-the', 2, '2020-07-31 12:01:44', '2020-07-31 12:01:44'),
(677, 'Yên Thủy', 'yen-thuy', 29, '2020-07-31 12:01:44', '2020-07-31 12:01:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `menu_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_li` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_li` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `def` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `name_en`, `img`, `url`, `menu_type_id`, `cat_id`, `post_id`, `page_id`, `menu_type`, `parent_id`, `icon`, `class_li`, `id_li`, `class_a`, `id_a`, `attri`, `status`, `orderby`, `def`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', 'Intro', '', 'gioi-thieu.html', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 2, NULL, '2022-03-15 17:42:08', '2022-03-16 07:10:46'),
(2, 'Lĩnh vực hoạt động', 'Field of activity', '', 'linh-vuc-hoat-dong', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 3, NULL, '2022-03-15 17:42:31', '2022-03-15 17:46:03'),
(3, 'Tin tức', 'News - Event', '', 'tin-tuc', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 4, NULL, '2022-03-15 17:42:50', '2022-03-15 17:46:03'),
(4, 'Tuyển dụng', 'Recruit', '', 'tuyen-dung', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 5, NULL, '2022-03-15 17:44:09', '2022-03-15 17:46:03'),
(5, 'Hình ảnh', 'Images', '', 'hinh-anh', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 6, NULL, '2022-03-15 17:44:31', '2022-03-15 17:46:03'),
(6, 'Liên hệ', 'Contact', '', 'lien-he', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 7, NULL, '2022-03-15 17:44:44', '2022-03-15 17:46:03'),
(7, 'Trang chủ', 'Home', '', '/', 12, NULL, NULL, NULL, 'custome', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 1, NULL, '2022-03-15 17:46:00', '2022-03-15 17:46:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_type`
--

DROP TABLE IF EXISTS `menu_type`;
CREATE TABLE IF NOT EXISTS `menu_type` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_theme_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_theme_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_ul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_li` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_li` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_nav` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `def` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_nav` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `url`, `class_theme_menu`, `id_theme_menu`, `class_ul`, `id_ul`, `class_li`, `id_li`, `class_a`, `id_a`, `attri`, `status`, `class_nav`, `def`, `des`, `type`, `id_nav`, `orderby`, `created_at`, `updated_at`) VALUES
(12, 'Menu chính', 'menu_chinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, 3, NULL, '2022-03-15 18:29:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_tham_gia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_hop_dong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_lo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dien_tich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `da_gop_von` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_lai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lich_su` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sendmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `tel`, `email`, `content`, `status`, `address`, `updated_at`, `created_at`, `cmt`, `ngay_tham_gia`, `so_hop_dong`, `so_lo`, `dien_tich`, `nhom`, `da_gop_von`, `con_lai`, `lich_su`, `note`, `sendmail`) VALUES
(1, 'phạm thi', '0987654321', 'thiphamhoang@gmail.com', 'tôi cần tư vấn', 'off', '222', '2022-04-14 15:29:42', '2022-03-16 08:42:33', '111', '11', '111', '11', '11', '11', '11', '11', '11', '11', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `name`, `title`, `type`, `created_at`, `updated_at`) VALUES
(2, 'cat_view', 'Xem danh mục', 'web', NULL, '2020-07-13 16:46:39'),
(3, 'cat_edit', 'Sửa danh mục', 'web', NULL, NULL),
(4, 'post_view', 'Xem bài viết', 'web', NULL, NULL),
(5, 'post_edit', 'Sửa bài viết', 'web', NULL, NULL),
(6, 'menu_view', 'Xem menu', 'web', NULL, NULL),
(7, 'menu_edit', 'Sửa menu', 'web', NULL, NULL),
(8, 'form_view', 'Xem đăng ký', 'web', NULL, NULL),
(9, 'form_edit', 'Sửa đăng ký', 'web', NULL, NULL),
(10, 'slide_view', 'Xem slide', 'web', NULL, NULL),
(11, 'slide_edit', 'Sửa slide', 'web', NULL, NULL),
(12, 'theme_view', 'Xem giao diện', 'web', NULL, NULL),
(13, 'theme_edit', 'Sửa giao diện', 'web', NULL, NULL),
(14, 'icon_view', 'Xem biểu tượng', 'web', NULL, NULL),
(15, 'icon_edit', 'Sửa biểu tượng', 'web', NULL, NULL),
(16, 'config_view', 'Xem cấu hình', 'web', NULL, NULL),
(17, 'config_edit', 'Sửa cấu hình', 'web', NULL, NULL),
(18, 'image_map_view', 'Xem Sơ đồ', 'web', NULL, NULL),
(19, 'image_map_edit', 'Sửa sơ đồ', 'web', NULL, NULL),
(20, 'button_ring_view', 'Xem nút bấm liên hệ', 'web', NULL, NULL),
(21, 'button_ring_edit', 'Sửa nút bấm liên hệ', 'web', NULL, NULL),
(22, 'popup_view', 'Xem poup', 'web', NULL, NULL),
(23, 'popup_edit', 'Sửa poup', 'web', NULL, NULL),
(24, 'tab_view', 'Xem tab', 'web', NULL, NULL),
(25, 'tab_edit', 'Sửa tab', 'web', NULL, NULL),
(26, 'file_view', 'Xem thư viện', 'web', NULL, NULL),
(27, 'file_edit', 'Sửa thư viện', 'web', NULL, NULL),
(28, 'interest_calculator_view', 'Xem tính trả góp', 'web', NULL, NULL),
(29, 'interest_calculator_edit', 'Sửa tính trả góp', 'web', NULL, NULL),
(30, 'contact_view', 'Xem liên hệ', 'web', NULL, NULL),
(31, 'contact_edit', 'Sửa liên hệ', 'web', NULL, NULL),
(32, 'admin_user_view', 'Xem thành viên webbox', 'admin', NULL, NULL),
(33, 'admin_user_edit', 'Sửa thành viên webbox', 'admin', NULL, NULL),
(34, 'admin_permission_view', 'Xem phân quyền thành viên webbox', 'admin', NULL, NULL),
(35, 'admin_permission_edit', 'Sửa phân quyền thành viên webbox', 'admin', NULL, NULL),
(59, 'order_edit', 'Sửa đơn hàng', 'web', '2020-08-04 23:05:20', '2020-08-04 23:05:20'),
(58, 'order_view', 'Xem đơn hàng', 'web', '2020-08-04 23:05:05', '2020-08-04 23:05:05'),
(46, 'popup_regis_view', 'Xem khách hàng đăng ký', 'web', '2020-07-17 14:55:26', '2020-07-17 14:55:26'),
(47, 'popup_regis_edit', 'Sửa khách hàng đăng ký', 'web', '2020-07-17 14:55:38', '2020-07-17 14:55:38'),
(50, 'post_type_view', 'Xem loại bài viết', 'web', '2020-07-28 11:42:04', '2020-07-28 11:42:04'),
(51, 'post_type_edit', 'Sửa loại bài viết', 'web', '2020-07-28 11:42:15', '2020-07-28 11:42:15'),
(52, 'comment_view', 'Xem bình luận', 'web', '2020-07-30 03:42:59', '2020-07-30 03:42:59'),
(53, 'comment_edit', 'Sửa bình luận', 'web', '2020-07-30 03:43:09', '2020-07-30 03:43:09'),
(54, 'gift_code_view', 'Xem mã giảm giá', 'web', '2020-07-31 22:18:14', '2020-07-31 22:18:14'),
(55, 'gift_code_edit', 'Sửa mã giảm giá', 'web', '2020-07-31 22:18:24', '2020-07-31 22:18:24'),
(56, 'crawl_view', 'Xem crawl bài viết', 'web', '2020-08-03 07:15:22', '2020-08-03 07:15:22'),
(57, 'crawl_edit', 'Sửa crawl bài viết', 'web', '2020-08-03 07:15:40', '2020-08-03 07:15:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `popup`
--

DROP TABLE IF EXISTS `popup`;
CREATE TABLE IF NOT EXISTS `popup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_cookie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_deylay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `popup`
--

INSERT INTO `popup` (`id`, `img`, `name`, `des`, `status`, `status_pc`, `status_mobile`, `size`, `style`, `form_id`, `link`, `time_cookie`, `time_deylay`, `updated_at`, `created_at`) VALUES
(5, 'Cover02-9449-1563791413-6.jpg', 'Poup 1', NULL, NULL, NULL, 'd-none d-sm-block d-md-block d-lg-block d-xl-block', NULL, 'form', 7, 'http://webbox.vn', '10', '10', '2020-07-17 15:28:13', '2020-07-17 15:28:13'),
(6, 'Banner-QC2-1024x768.jpg', 'Poup 2', NULL, NULL, NULL, 'd-none d-sm-block d-md-block d-lg-block d-xl-block', 'modal-lg', 'img', 0, NULL, NULL, NULL, '2020-07-17 15:54:19', '2020-07-17 15:54:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `popup_regis`
--

DROP TABLE IF EXISTS `popup_regis`;
CREATE TABLE IF NOT EXISTS `popup_regis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `popup_regis`
--

INSERT INTO `popup_regis` (`id`, `name`, `tel`, `email`, `noti`, `status`, `updated_at`, `created_at`) VALUES
(9, '	Cao Thị	', '	0913801.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(10, '	Ngô Tuyết	', '	0909834.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(11, '	Trần Hải	', '	0266465.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(12, '	Nguyễn Duy	', '	0989695.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(13, '	Trần Công	', '	0985070.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(14, '	Lê Văn	', '	0908299.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(15, '	Nguyễn Thị Cẩm	', '	0859034.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(16, '	Lê Đức	', '	0907636.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(17, '	Vũ Hoàng	', '	0394111.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(18, '	Phan Thành	', '	0983470.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(19, '	Nguyễn Xuân	', '	0988541.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(20, '	Lê Văn	', '	0968068.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(21, '	Tô Thị Thanh	', '	0987527.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(22, '	Đào Thị Thanh	', '	0984507.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(23, '	Trần Thanh	', '	0908882.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(24, '	Vũ Thị Hồng	', '	0909560.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(25, '	Huỳnh Minh	', '	0386514.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(26, '	Nguyễn Văn	', '	0948675.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(27, '	Phạm Minh	', '	0918198.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(28, '	Phạm Thị Diệu	', '	0918853.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(29, '	Phạm Văn	', '	0903886.xxx	', '', 'đã đăng đăng ký', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(30, '	Nguyễn Văn	', '	0983104.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(31, '	Nguyễn Thị Việt	', '	0919124.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(32, '	Nguyễn Thị Cúc	', '	0909829.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(33, '	Trần Minh	', '	0913801.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(34, '	Nguyễn Minh	', '	0988152.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(35, '	Bùi Văn	', '	0989995.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(36, '	Trần Thị Kim	', '	0909714.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(37, '	Võ Thanh	', '	0938174.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(38, '	Mai Xuân	', '	0986950.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(39, '	Nguyễn Thành	', '	0933898.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(40, '	Nguyễn Hoàng	', '	0389288.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(41, '	Nguyễn Đình	', '	0943385.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(42, '	Nguyễn Thị Kim	', '	0979115.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(43, '	Phan Thị Tịnh	', '	0986306.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(44, '	Huỳnh Thị	', '	0989393.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(45, '	Trần Thị Tú	', '	0918289.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(46, '	Nguyễn T Diễm	', '	0933737.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(47, '	Đinh Thanh	', '	0982913.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(48, '	Nguyễn Thị Tuyết	', '	0908361.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(49, '	Trần Yên	', '	0909714.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(50, '	HUỲNH THANH	', '	0917410.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(51, '	LÊ VĂN	', '	0903122.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(52, '	Đăng	', '	0983118.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(53, '	Nguyễn Thị Hà	', '	0918129.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(54, '	Phan Ngọc	', '	0933484.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(55, '	Trần Trung	', '	0383874.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(56, '	Văn Ngọc	', '	0982882.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(57, '	Lê Thị Kim	', '	0908356.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(58, '	Hoàng	', '	0988805.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(59, '	Lê Thị	', '	0918740.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(60, '	Phan Đức	', '	0903119.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(61, '	Đào Thị Xuân	', '	0849848.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(62, '	Lộc	', '	0986338.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(63, '	Trần Công	', '	0908248.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(64, '	Phan Đức	', '	0326848.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(65, '	Trần Thanh	', '	0919655.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(66, '	Nguyễn Thị Kim	', '	0915066.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(67, '	Phan Thị Tịnh	', '	0903112.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(68, '	Nguyễn Văn	', '	0909151.xxx	', '', 'đã đăng liên hệ', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(69, '	Đoàn Thị Cẩm	', '	0919413.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(70, '	Nguyễn Thị Cẩm	', '	0905333.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(72, '	Phan Lâm	', '	0932024.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(73, '	Quang Ngọc	', '	0918201.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54'),
(74, '	Phạm Hoàng Ngọc	', '	0355661.xxx	', '', 'đã đăng đặt cọc', 'on', '2020-06-26 07:42:54', '2020-06-26 07:42:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `index_meta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_km` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_post_id` int(11) DEFAULT NULL,
  `code_km` int(11) DEFAULT NULL,
  `code_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `product_relate_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_type_id` int(11) NOT NULL,
  `index_product` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_code_id` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_relate` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `title_en`, `des`, `img`, `content_en`, `des_en`, `title_seo_en`, `des_seo_en`, `key_seo_en`, `url`, `content`, `user_id`, `index_meta`, `title_seo`, `des_seo`, `key_seo`, `canon`, `status`, `pin`, `view`, `created_at`, `updated_at`, `price_km`, `price`, `slide_post_id`, `code_km`, `code_product`, `file_id`, `product_relate_id`, `comment`, `review`, `post_type_id`, `index_product`, `gift_code_id`, `color`, `product_relate`, `video`, `video_2`, `orderby`) VALUES
(1, 'Dự án Khu nhà ở Minh Giang Đầm Và Giai đoạn 1', 'Tiêu đề tiếng anh', NULL, 'pcttmg1.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-khu-nha-o-minh-giang-dam-va-giai-doan-1', '<p><strong>Chủ đầu tư: C&ocirc;ng ty TNHH Minh Giang</strong><br /><br /><strong>Vị tr&iacute;, địa điểm dự án:</strong>&nbsp;X&atilde; Tiền Phong, Huyện M&ecirc; Linh, Th&agrave;nh Phố H&agrave; Nội<br /><br /><strong>Dự &aacute;n Khu nh&agrave; ở Minh Giang &ndash; Đầm V&agrave; c&oacute; tổng diện&nbsp; t&iacute;ch 25,46 ha. Vị tr&iacute; địa l&yacute; cụ thể như sau:</strong></p>\r\n<p><br />- Ph&iacute;a Bắc gi&aacute;p đường quy hoạch 48 m<br />- Ph&iacute;a Nam, Đ&ocirc;ng gi&aacute;p Đầm V&agrave;<br />- Ph&iacute;a T&acirc;y gi&aacute;p đường quốc lộ 32.</p>\r\n<p><br />Đ&acirc;y l&agrave; khu đ&ocirc; thị được quy hoạch v&agrave; x&acirc;y dựng mới đồng bộ th&agrave;nh tổ hợp ho&agrave;n chỉnh. To&agrave;n khu được chia th&agrave;nh những khu chức năng bao gồm:</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:02:17', '2022-03-15 18:13:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(2, 'Dự án Khu nhà ở du lịch sinh thái Âu Cơ', NULL, NULL, 'aucovitri.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-khu-nhà-ỏ-du-lich-sinh-thai-au-co', '<p><strong>Chủ đầu tư: C&ocirc;ng ty TNHH Minh Giang</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>- Th&ocirc;ng tin&nbsp;ph&ecirc; duy&ecirc;̣t&nbsp;quy hoạch 1/500 mời khách hàng xem tại&nbsp;<a href=\"http://baovinhphuc.com.vn/kinh-te/12755/du-an-khu-du-lich-sinh-thai-nghi-duong-au-co.html\" target=\"_blank\" rel=\"noopener\">đ&acirc;y</a></strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Vị tr&iacute;, địa điểm dự án:</strong><strong>&nbsp;</strong>X&atilde; Ngọc Thanh - Thị x&atilde; Ph&uacute;c Y&ecirc;n - Tỉnh Vĩnh Ph&uacute;c<br /><br />- Ph&iacute;a Bắc gi&aacute;p X&atilde; Thuận Thanh - Huyện Phổ Y&ecirc;n - Tỉnh Th&aacute;i Nguy&ecirc;n</p>\r\n<p>-&nbsp;Ph&iacute;a T&acirc;y gi&aacute;p thung lũng Thanh Xu&acirc;n - X&atilde; Ngọc Thanh</p>\r\n<p>- Ph&iacute;a Đ&ocirc;ng gi&aacute;p x&atilde; Minh Tr&iacute; - Huyện S&oacute;c Sơn - H&agrave; Nội</p>\r\n<p>-&nbsp;Ph&iacute;a Nam gi&aacute;p đường Nguyễn Văn Cừ</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:02:51', '2022-03-24 08:38:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(3, 'Dự án mở rộng Khu nhà ở Minh Giang - Đầm Và', NULL, NULL, 'pcttmg3.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-mo-rong-khu-nha-o-minh-giang-dam-va', '<p>&nbsp;</p>\r\n<p><strong>Chủ đầu tư: C&ocirc;ng ty TNHH Minh Giang</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>- Th&ocirc;ng tin&nbsp;ph&ecirc; duy&ecirc;̣t đi&ecirc;̀u chỉnh&nbsp;quy hoạch 1/500 mời khách hàng xem tại&nbsp;<a href=\"http://www.hacinco.com.vn/tin-thi-truong/bds/ha-noi-111ieu-chinh-tong-the-quy-hoach-chi-tiet-mo-rong-khu-nha-o-minh-giang-111am-va/\" target=\"_blank\" rel=\"noopener\">đ&acirc;y</a></strong><br /><br /><strong>Vị tr&iacute;, địa điểm dự án:</strong><strong>&nbsp;</strong>X&atilde; Tiền Phong, Huyện M&ecirc; Linh, Th&agrave;nh Phố H&agrave; Nội</p>\r\n<p><br /><strong>Khu vực 1:</strong></p>\r\n<p>&nbsp;</p>\r\n<p>-&nbsp;Ph&iacute;a Đ&ocirc;ng gi&aacute;p quốc lộ 23B.<br />-&nbsp;Ph&iacute;a T&acirc;y gi&aacute;p dự &aacute;n khu nh&agrave; ở Ba Đ&igrave;nh.</p>\r\n<p>-&nbsp;Ph&iacute;a Bắc bởi tim đường quy hoạch rộng B= 48m.</p>\r\n<p>-&nbsp;Ph&iacute;a Nam lấy hết tuyến đường quy hoạch B=24m v&agrave; ranh giới cấp đất của dự &aacute;n.&nbsp;<br />&nbsp;</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:03:11', '2022-03-23 09:21:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(4, 'Dự án Khu nhà ở Minh Giang Đầm Và (Giai đoạn 2)', NULL, NULL, 'PC cam 3 sua.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-khu-nha-o-minh-giang-dam-va-giai-doan-2', '<p><strong>Chủ đầu tư: C&ocirc;ng ty TNHH Minh Giang</strong><br />&nbsp;</p>\r\n<p><strong>-&nbsp;</strong><strong>Th&ocirc;ng tin</strong><strong>&nbsp;ph&ecirc; duy&ecirc;̣t đi&ecirc;̀u chỉnh quy hoạch 1/500 mời khách hàng xem&nbsp;tại&nbsp;<a href=\"https://moc.gov.vn/vn/tin-tuc/1184/37988/ha-noi-dieu-chinh-quy-hoach-khu-nha-o-minh-giang--dam-va.aspx\" target=\"_blank\" rel=\"noopener\">đ&acirc;y</a></strong></p>\r\n<p><br /><strong>&nbsp;Vị tr&iacute;, địa điểm dự án:</strong><strong>&nbsp;</strong>X&atilde; Tiền Phong, Huyện M&ecirc; Linh, Th&agrave;nh Phố H&agrave; Nội</p>\r\n<p><br />-&nbsp;&nbsp;&nbsp;&nbsp;Ph&iacute;a Bắc gi&aacute;p đường li&ecirc;n khu vực 48m v&agrave; Khu vực 2 dự &aacute;n mở rộng khu nh&agrave; ở Minh Giang &ndash; Đầm V&agrave;.</p>\r\n<p>-&nbsp;&nbsp;&nbsp; Ph&iacute;a Đ&ocirc;ng gi&aacute;p Dự &aacute;n khu nh&agrave; ở L&agrave;ng hoa Tiền Phong.<br />-&nbsp;&nbsp;&nbsp;&nbsp;Ph&iacute;a Nam gi&aacute;p Dự &aacute;n khu nh&agrave; ở Minh Giang &ndash; Đầm V&agrave; (Giai đoạn 1).</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;Ph&iacute;a T&acirc;y gi&aacute;p Quốc lộ 23B.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Phần bờ đầm:&nbsp;Phạm vi giới hạn như sau:</strong></p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:03:34', '2022-03-15 18:13:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(5, 'Dự án Khu nhà ở để bán tại phường Phú Diễn', NULL, NULL, 'pcttcd.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-khu-nha-o-de-ban-tai-phuong-phu-dien', '<p>&nbsp;</p>\r\n<p><strong>1.</strong>&nbsp;&nbsp;<strong>Vị tr&iacute;, địa điểm dự án:</strong>&nbsp;Phường Ph&uacute; Diễn, Quận Bắc Từ Li&ecirc;m, Th&agrave;nh Phố H&agrave; Nội.</p>\r\n<p>&nbsp;</p>\r\n<p>-&nbsp;Ph&iacute;a Đ&ocirc;ng Bắc gi&aacute;p đường quy hoạch Ho&agrave;ng Quốc Việt k&eacute;o d&agrave;i</p>\r\n<p>-&nbsp;Ph&iacute;a Đ&ocirc;ng Nam gi&aacute;p đường hiện hữu</p>\r\n<p>-&nbsp;Ph&iacute;a T&acirc;y gi&aacute;p khu d&acirc;n cư</p>\r\n<p>-&nbsp;Ph&iacute;a Đ&ocirc;ng gi&aacute;p đường Nguyễn Cơ Thạch k&eacute;o d&agrave;i</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. &nbsp;C&aacute;c chỉ ti&ecirc;u quy hoạch - kiến tr&uacute;c của dự án:</strong></p>\r\n<p>&nbsp;</p>\r\n<p>-&nbsp;Tổng diện t&iacute;ch đất sử dụng&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 28.990 &nbsp;m<sup>2</sup>;</p>\r\n<p>-&nbsp;Đất giao th&ocirc;ng li&ecirc;n khu vực&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 8.212,8 m</p>\r\n<p>-&nbsp;Đất ở thấp tầng&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 8.011 &nbsp;m<sup>2</sup>;</p>\r\n<p>-&nbsp;Đất ở cao tầng&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 6.008 m2;</p>\r\n<p>-&nbsp;Đất c&acirc;y xanh, giao th&ocirc;ng nh&oacute;m nh&agrave; ở&nbsp;&nbsp;:&nbsp;5.927,2 m<sup>2</sup>;</p>\r\n<p>-&nbsp;B&atilde;i đỗ xe tự động&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 811 m<sup>2</sup>;</p>\r\n<p>- Đất hạ tầng kỹ thuật (trạm biến &aacute;p)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 20 m<sup>2</sup>;</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:11:38', '2022-03-30 07:56:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(6, 'Tiến độ hoàn thiện chuẩn bị nghiệm thu Khu nhà liền kề Dự án Phú Diễn', NULL, NULL, '1tchtpd.jpeg', NULL, NULL, NULL, NULL, NULL, 'tien-do-hoan-thien-chuan-bi-nghiem-thu-khu-nha-lien-ke-du-an-phu-dien', '<p>Thời gian vừa qua, do ảnh hưởng bởi dịch bệnh Covid &ndash; 19, c&ocirc;ng tr&igrave;nh x&acirc;y dựng Khu nh&agrave; ở Ph&uacute; Diễn nhiều lần bị tạm dừng để thực hiện theo chỉ thị gi&atilde;n c&aacute;ch x&atilde; hội của Thủ tướng Ch&iacute;nh phủ v&agrave; UBND Th&agrave;nh phố H&agrave; Nội, n&ecirc;n dự &aacute;n bị chậm tiến độ so với mục ti&ecirc;u đề ra.</p>\r\n<p>&nbsp;</p>\r\n<p>Ngay sau khi được hoạt động trở lại, Chủ đầu tư Minh Giang Co.Ltd đ&atilde; y&ecirc;u cầu c&aacute;c đơn vị nh&agrave; thầu thi c&ocirc;ng MHDI3, Tư vấn gi&aacute;m s&aacute;t Coninco đẩy nhanh tiến độ thi c&ocirc;ng c&aacute;c hạng mục ho&agrave;n thiện như sơn, cửa, ban c&ocirc;ng, x&acirc;y cổng tường r&agrave;o, cảnh quan c&acirc;y xanh &hellip; để chuẩn bị cho việc ch&iacute;nh thức nghiệm thu c&ocirc;ng t&aacute;c thi c&ocirc;ng x&acirc;y th&ocirc; ho&agrave;n thiện mặt ngo&agrave;i d&atilde;y nh&agrave; liền kề thuộc tổ hợp dự &aacute;n Khu nh&agrave; ở để b&aacute;n Ph&uacute; Diễn.</p>\r\n<p>&nbsp;</p>\r\n<p>Với quyết t&acirc;m b&ugrave; tiến độ thời gian nghỉ dịch, c&ocirc;ng tr&igrave;nh dự kiến c&oacute; thể vẫn kịp tiến độ nghiệm thu, b&agrave;n giao đưa v&agrave;o sử dụng trước Tết Nguy&ecirc;n Đ&aacute;n.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>H&igrave;nh ảnh c&ocirc;ng trường thi c&ocirc;ng Khu nh&agrave; liền kề:</strong></p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:20:31', '2022-03-16 07:20:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(7, 'Dự án mở rộng Khu nhà ở Minh Giang - Đầm Và', NULL, NULL, 'da-sinh-thai3.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-mo-rong-khu-nha-o-minh-giang-dam-va-7', '<p><strong>Chủ đầu tư: C&ocirc;ng ty TNHH Minh Giang</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>- Th&ocirc;ng tin&nbsp;ph&ecirc; duy&ecirc;̣t đi&ecirc;̀u chỉnh&nbsp;quy hoạch 1/500 mời khách hàng xem tại&nbsp;<a href=\"http://www.hacinco.com.vn/tin-thi-truong/bds/ha-noi-111ieu-chinh-tong-the-quy-hoach-chi-tiet-mo-rong-khu-nha-o-minh-giang-111am-va/\" target=\"_blank\" rel=\"noopener\">đ&acirc;y</a></strong><br /><br /><strong>Vị tr&iacute;, địa điểm dự án:</strong><strong>&nbsp;</strong>X&atilde; Tiền Phong, Huyện M&ecirc; Linh, Th&agrave;nh Phố H&agrave; Nội</p>\r\n<p><br /><strong>Khu vực 1:</strong></p>\r\n<p>&nbsp;</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:21:08', '2022-03-24 08:38:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(8, 'Dự án Khu nhà ở Minh Giang Đầm Và Giai đoạn 1', NULL, NULL, 'PC cam 3 sua-1.jpeg', NULL, NULL, NULL, NULL, NULL, 'du-an-khu-nha-o-minh-giang-dam-va-giai-doan-1-8', '<p><strong>Chủ đầu tư: C&ocirc;ng ty TNHH Minh Giang</strong><br /><br /><strong>Vị tr&iacute;, địa điểm dự án:</strong>&nbsp;X&atilde; Tiền Phong, Huyện M&ecirc; Linh, Th&agrave;nh Phố H&agrave; Nội<br /><br /><strong>Dự &aacute;n Khu nh&agrave; ở Minh Giang &ndash; Đầm V&agrave; c&oacute; tổng diện&nbsp; t&iacute;ch 25,46 ha. Vị tr&iacute; địa l&yacute; cụ thể như sau:</strong></p>\r\n<p><br />- Ph&iacute;a Bắc gi&aacute;p đường quy hoạch 48 m<br />- Ph&iacute;a Nam, Đ&ocirc;ng gi&aacute;p Đầm V&agrave;<br />- Ph&iacute;a T&acirc;y gi&aacute;p đường quốc lộ 32.</p>\r\n<p><br />Đ&acirc;y l&agrave; khu đ&ocirc; thị được quy hoạch v&agrave; x&acirc;y dựng mới đồng bộ th&agrave;nh tổ hợp ho&agrave;n chỉnh. To&agrave;n khu được chia th&agrave;nh những khu chức năng bao gồm:</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:21:46', '2022-03-16 07:20:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(9, 'Lễ ra quân triển khai nhiệm vụ năm 2022', NULL, '<p>Ng&agrave;y 19/2/2022, tại dự &aacute;n Khu nh&agrave; ở Minh Giang Đầm V&agrave;, C&ocirc;ng ty TNHH Minh Giang đ&atilde; long trọng tổ chức Lễ ra qu&acirc;n triển khai nhiệm vụ năm 2022, với sự tham gia của to&agrave;n thể CBNV c&ocirc;ng ty.</p>', 'PC cam 3 sua-2.jpeg', NULL, NULL, NULL, NULL, NULL, 'le-ra-quan-trien-khai-nhiem-vu-nam-2022', '<p>Ng&agrave;y 19/2/2022, tại dự &aacute;n Khu nh&agrave; ở Minh Giang Đầm V&agrave;, C&ocirc;ng ty TNHH Minh Giang đ&atilde; long trọng tổ chức Lễ ra qu&acirc;n triển khai nhiệm vụ năm 2022, với sự tham gia của to&agrave;n thể CBNV c&ocirc;ng ty.</p>\r\n<p>&nbsp;</p>\r\n<p>Ph&aacute;t biểu tại buổi lễ ra qu&acirc;n đầu năm, Ban l&atilde;nh đạo c&ocirc;ng ty đ&atilde; ghi nhận v&agrave; biểu dương kết quả hoạt động sản xuất, kinh doanh của c&aacute;c ph&ograve;ng, ban, đơn vị trong thời gian qua, nhất l&agrave; c&ocirc;ng t&aacute;c duy tr&igrave;, ổn định sản xuất trong thời gian gi&atilde;n c&aacute;ch x&atilde; hội do dịch bệnh Covid 19, đề nghị to&agrave;n thể CBCNV trong c&ocirc;ng ty tăng cường sự đo&agrave;n kết, chủ động, s&aacute;ng tạo, n&acirc;ng cao chất lượng c&aacute;n bộ quản l&yacute; điều h&agrave;nh, ph&aacute;t huy thế mạnh nguồn lực từ Nh&agrave; m&aacute;y gỗ để đẩy mạnh hoạt động sản xuất kinh doanh cạnh tranh tr&ecirc;n thị trường gỗ. B&ecirc;n cạnh đ&oacute;, cần đẩy nhanh c&ocirc;ng t&aacute;c thủ tục về hồ sơ ph&aacute;p l&yacute; dự &aacute;n v&agrave; triển khai thi c&ocirc;ng x&acirc;y dựng đảm bảo đ&uacute;ng tiến độ kế hoạch sản lượng c&ocirc;ng ty giao v&agrave; tiến độ dự &aacute;n được Nh&agrave; nước ph&ecirc; duyệt.</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:35:58', '2022-03-31 08:12:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(10, 'Tiến độ hoàn thiện chuẩn bị nghiệm thu Khu nhà liền kề Dự án Phú Diễn', NULL, '<p>Thời gian vừa qua, do ảnh hưởng bởi dịch bệnh Covid &ndash; 19, c&ocirc;ng tr&igrave;nh x&acirc;y dựng Khu nh&agrave; ở Ph&uacute; Diễn nhiều lần bị tạm dừng để thực hiện theo chỉ thị gi&atilde;n c&aacute;ch x&atilde; hội của Thủ tướng Ch&iacute;nh phủ v&agrave; UBND Th&agrave;nh phố H&agrave; Nội, n&ecirc;n dự &aacute;n bị chậm tiến độ so với mục ti&ecirc;u đề ra.</p>', 'dtubdsmg1.jpeg', NULL, NULL, NULL, NULL, NULL, 'tien-do-hoan-thien-chuan-bi-nghiem-thu-khu-nha-lien-ke-du-an-phu-dien-10', '<p>Thời gian vừa qua, do ảnh hưởng bởi dịch bệnh Covid &ndash; 19, c&ocirc;ng tr&igrave;nh x&acirc;y dựng Khu nh&agrave; ở Ph&uacute; Diễn nhiều lần bị tạm dừng để thực hiện theo chỉ thị gi&atilde;n c&aacute;ch x&atilde; hội của Thủ tướng Ch&iacute;nh phủ v&agrave; UBND Th&agrave;nh phố H&agrave; Nội, n&ecirc;n dự &aacute;n bị chậm tiến độ so với mục ti&ecirc;u đề ra.</p>\r\n<p>&nbsp;</p>\r\n<p>Ngay sau khi được hoạt động trở lại, Chủ đầu tư Minh Giang Co.Ltd đ&atilde; y&ecirc;u cầu c&aacute;c đơn vị nh&agrave; thầu thi c&ocirc;ng MHDI3, Tư vấn gi&aacute;m s&aacute;t Coninco đẩy nhanh tiến độ thi c&ocirc;ng c&aacute;c hạng mục ho&agrave;n thiện như sơn, cửa, ban c&ocirc;ng, x&acirc;y cổng tường r&agrave;o, cảnh quan c&acirc;y xanh &hellip; để chuẩn bị cho việc ch&iacute;nh thức nghiệm thu c&ocirc;ng t&aacute;c thi c&ocirc;ng x&acirc;y th&ocirc; ho&agrave;n thiện mặt ngo&agrave;i d&atilde;y nh&agrave; liền kề thuộc tổ hợp dự &aacute;n Khu nh&agrave; ở để b&aacute;n Ph&uacute; Diễn.</p>\r\n<p>&nbsp;</p>\r\n<p>Với quyết t&acirc;m b&ugrave; tiến độ thời gian nghỉ dịch, c&ocirc;ng tr&igrave;nh dự kiến c&oacute; thể vẫn kịp tiến độ nghiệm thu, b&agrave;n giao đưa v&agrave;o sử dụng trước Tết Nguy&ecirc;n Đ&aacute;n.</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:36:27', '2022-05-31 02:32:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(11, 'Chế biến, sản xuất sản phẩm gỗ các công trình Biệt thự của công ty', NULL, '<p>C&ocirc;ng ty Minh Giang l&agrave; đơn vị uy t&iacute;n tr&ecirc;n thị trường về chế biến, sản xuất gỗ nhưng đồng thời cũng l&agrave; Chủ đầu tư nhiều dự &aacute;n Bất động sản</p>', '1cbgobt.jpeg', NULL, NULL, NULL, NULL, NULL, 'che-bien-san-xuat-san-pham-go-cac-cong-trinh-biet-thu-cua-cong-ty', '<p>C&ocirc;ng ty Minh Giang l&agrave; đơn vị uy t&iacute;n tr&ecirc;n thị trường về chế biến, sản xuất gỗ nhưng đồng thời cũng l&agrave; Chủ đầu tư nhiều dự &aacute;n Bất động sản tại H&agrave; Nội v&agrave; c&aacute;c tỉnh th&agrave;nh l&acirc;n cận, để đ&aacute;p ứng kịp thời kế hoạch triển khai thi c&ocirc;ng x&acirc;y dựng c&aacute;c c&ocirc;ng tr&igrave;nh Biệt thự đơn lập, song lập, liền kề tại c&aacute;c dự &aacute;n, c&ocirc;ng ty đ&atilde; giao nh&agrave; m&aacute;y kế hoạch 06 th&aacute;ng cuối năm 2021 chế biến sản xuất cung cấp cửa gỗ cho c&aacute;c dự &aacute;n Khu nh&agrave; ở Minh Đức, dự &aacute;n Mở rộng khu nh&agrave; ở Minh Giang &ndash; Đầm V&agrave;.</p>\r\n<p>&nbsp;</p>\r\n<p>Triển khai kế hoạch tr&ecirc;n, nhu cầu gỗ l&agrave; rất lớn, v&igrave; vậy ngay sau khi nhận được kế hoạch, Nh&agrave; m&aacute;y đ&atilde; tổ chức ph&acirc;n t&iacute;ch, b&oacute;c t&aacute;ch t&iacute;nh to&aacute;n khối lượng ph&ocirc;i cần, chuẩn bị nguy&ecirc;n liệu, l&ecirc;n kế hoạch chi tiết bố tr&iacute; c&aacute;c d&acirc;y chuyền tại c&aacute;c ph&acirc;n xưởng nhằm cung ứng đủ lượng ph&ocirc;i đưa v&agrave;o gia c&ocirc;ng sản phẩm theo tiến độ.</p>\r\n<p>&nbsp;</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:37:01', '2022-04-01 08:47:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(12, 'Khánh thành bàn giao Đền Cậu bé Trường sinh', NULL, '<p>rong 02 năm 2020 &ndash; 2021, dịch bệnh Covid b&ugrave;ng ph&aacute;t, c&aacute;c đợt gi&atilde;n c&aacute;ch, c&aacute;ch ly ảnh hưởng nghi&ecirc;m trọng nền kinh tế trong nước v&agrave; thế</p>', '1bts.jpeg', NULL, NULL, NULL, NULL, NULL, 'khanh-thanh-ban-giao-den-cau-be-truong-sinh', '<p>Trong 02 năm 2020 &ndash; 2021, dịch bệnh Covid b&ugrave;ng ph&aacute;t, c&aacute;c đợt gi&atilde;n c&aacute;ch, c&aacute;ch ly ảnh hưởng nghi&ecirc;m trọng nền kinh tế trong nước v&agrave; thế giới, tuy nhi&ecirc;n do c&oacute; sự chuẩn bị phương &aacute;n ứng ph&oacute; kịp thời, c&ocirc;ng ty Minh Giang vẫn đảm bảo hoạt động sản xuất, kinh doanh chế biến gỗ được duy tr&igrave; ổn định, h&agrave;ng loạt c&ocirc;ng tr&igrave;nh gỗ được ho&agrave;n th&agrave;nh, b&agrave;n giao đi v&agrave;o sử dụng tại nhiều c&aacute;c quận, huyện như quận Ho&agrave;ng Mai, quận Bắc Từ Li&ecirc;m, huyện M&ecirc; Linh, huyện Ph&uacute;c Thọ hay xa hơn nữa l&agrave; tại 1 số địa phương của tỉnh Vĩnh Ph&uacute;c.</p>\r\n<p>&nbsp;</p>\r\n<p>Trong số c&aacute;c c&ocirc;ng tr&igrave;nh đ&oacute;, c&ocirc;ng tr&igrave;nh gỗ đền thờ Cậu B&eacute; Trường Sinh tại Xu&acirc;n Đỉnh l&agrave; c&ocirc;ng tr&igrave;nh mang &yacute; nghĩa t&acirc;m linh quan trọng n&ecirc;n được c&ocirc;ng ty d&agrave;nh nhiều t&acirc;m huyết, ho&agrave;n th&agrave;nh nghiệm thu đưa v&agrave;o sử dụng vượt tiến độ chủ đầu tư đề ra với chất lượng, kỹ thuật, mĩ thuật được đ&aacute;nh gi&aacute; đạt ti&ecirc;u chuẩn.</p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:37:23', '2022-03-24 04:38:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(13, 'Video về dự án nhà đất tại Hà Nội', NULL, NULL, 'Screen Shot 2022-03-16 at 1.45.19 AM.png', NULL, NULL, NULL, NULL, NULL, 'video-ve-du-an-nha-dat-tai-ha-noi', '<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/dLY5TsY0dTY\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:45:35', '2022-03-15 18:46:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(15, 'Video về dự án đất Hồ Chí Minh', NULL, NULL, 'Screen Shot 2022-03-16 at 1-1.45-1.19 AM-1.png', NULL, NULL, NULL, NULL, NULL, 'video-ve-du-an-dat-ho-chi-minh', '<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/dLY5TsY0dTY\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:47:21', '2022-03-24 08:46:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(16, 'Video về bất động sản Đà Nẵng', NULL, NULL, 'Screen Shot 2022-03-16 at 1-2.45-2.19 AM-2.png', NULL, NULL, NULL, NULL, NULL, 'video-ve-bat-dong-san-da-nang', '<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/dLY5TsY0dTY\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-15 18:47:52', '2022-03-15 18:47:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL),
(17, 'Giới thiệu', NULL, NULL, 'nha_o_Trieu.jpeg', NULL, NULL, NULL, NULL, NULL, 'gioi-thieu', '<p>&nbsp; &nbsp; &nbsp; &nbsp; <strong>C&Ocirc;NG TY CỔ PHẦN ĐẦU TƯ PH&Aacute;T TRIỂN 18</strong> l&agrave; doanh nghiệp được th&agrave;nh lập theo Giấy chứng nhận đăng k&yacute; kinh doanh số: 2500294464 do Sở Kế hoạch v&agrave; Đầu tư Th&agrave;nh phố H&agrave; Nội cấp ng&agrave;y ... th&aacute;ng ... năm 2000.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>T&ecirc;n C&ocirc;ng ty : C&Ocirc;NG TY CỔ PHẦN ĐẦU TƯ PH&Aacute;T TRIỂN 18</strong></p>\r\n<p><strong>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vốn điều lệ:&nbsp;</strong></p>\r\n<p><strong>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Địa chỉ trụ sở ch&iacute;nh: T&ograve;a nh&agrave; LICOGI 18, Km số 9, đường Cao tốc Thăng Long Nội B&agrave;i, Thị trấn Quang Minh,&nbsp; Huyện M&ecirc; Linh, H&agrave; Nội, Việt Nam</strong></p>\r\n<p><strong>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Điện thoại: 046 2876 539</strong></p>\r\n<p><strong>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: congtyphattrien18@gmail.com</strong></p>', NULL, 'INDEX, FOLLOW', NULL, NULL, NULL, 'off', 'on', 'off', NULL, '2022-03-16 07:12:00', '2022-03-30 07:57:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'null', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_cat`
--

DROP TABLE IF EXISTS `post_cat`;
CREATE TABLE IF NOT EXISTS `post_cat` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_cat`
--

INSERT INTO `post_cat` (`id`, `post_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(6, 1, 74, NULL, NULL),
(14, 2, 74, NULL, NULL),
(12, 3, 74, NULL, NULL),
(10, 4, 74, NULL, NULL),
(44, 5, 70, NULL, NULL),
(7, 1, 45, NULL, NULL),
(43, 5, 74, NULL, NULL),
(11, 4, 45, NULL, NULL),
(13, 3, 45, NULL, NULL),
(15, 2, 45, NULL, NULL),
(60, 6, 70, NULL, NULL),
(50, 7, 70, NULL, NULL),
(55, 8, 70, NULL, NULL),
(30, 9, 69, NULL, NULL),
(29, 9, 80, NULL, NULL),
(36, 10, 69, NULL, NULL),
(35, 10, 80, NULL, NULL),
(34, 11, 69, NULL, NULL),
(33, 11, 80, NULL, NULL),
(32, 12, 69, NULL, NULL),
(31, 12, 80, NULL, NULL),
(38, 13, 71, NULL, NULL),
(41, 15, 71, NULL, NULL),
(40, 16, 71, NULL, NULL),
(66, 17, 69, NULL, NULL),
(45, 5, 75, NULL, NULL),
(46, 5, 76, NULL, NULL),
(47, 5, 78, NULL, NULL),
(48, 5, 79, NULL, NULL),
(49, 5, 45, NULL, NULL),
(51, 7, 75, NULL, NULL),
(52, 7, 76, NULL, NULL),
(53, 7, 78, NULL, NULL),
(54, 7, 79, NULL, NULL),
(56, 8, 75, NULL, NULL),
(57, 8, 76, NULL, NULL),
(58, 8, 78, NULL, NULL),
(59, 8, 79, NULL, NULL),
(61, 6, 75, NULL, NULL),
(62, 6, 76, NULL, NULL),
(63, 6, 78, NULL, NULL),
(64, 6, 79, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_type`
--

DROP TABLE IF EXISTS `post_type`;
CREATE TABLE IF NOT EXISTS `post_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feild` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_type`
--

INSERT INTO `post_type` (`id`, `name`, `url`, `feild`, `icon`, `updated_at`, `created_at`) VALUES
(1, 'Bài viết', 'bai-viet', '[\"content\",\"des\"]', '<i class=\"fa fa-pen-square\"></i>', '2020-07-28 22:41:23', '2020-07-28 22:18:11'),
(2, 'Sản phẩm', 'san-pham', '[\"content\",\"des\",\"slide_id\"]', '<i class=\"fas fa-shopping-cart\"></i>', '2021-05-23 07:59:41', '2020-07-28 22:18:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `regis`
--

DROP TABLE IF EXISTS `regis`;
CREATE TABLE IF NOT EXISTS `regis` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcc_email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ban_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custome_email` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noti` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noti_admin` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `def` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `regis`
--

INSERT INTO `regis` (`id`, `name`, `email`, `cc_email`, `bcc_email`, `ban_del`, `custome_email`, `status`, `code`, `url`, `noti`, `noti_admin`, `user_id`, `def`, `created_at`, `updated_at`) VALUES
(1, 'Liên hệ', 'info@webux.vn', '', '', NULL, '', 'on', 'MS_', 'lien_he', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Mua website', 'thiphamhoang@gmail.com', NULL, NULL, NULL, 'off', 'on', NULL, 'w_mua-website', 'Bạn đã gửi thành công', '_user_email_regis_ đăng ký mua giao diện _theme_name_', NULL, NULL, '2020-03-14 05:06:24', '2020-04-24 14:35:34'),
(6, 'Dùng thử', 'thiphamhoang@gmail.com', NULL, NULL, NULL, 'off', 'on', NULL, 'w_dung-thu', 'Bạn đã gửi thành công', NULL, NULL, NULL, '2020-03-14 03:47:49', '2020-03-14 03:47:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sidebar`
--

DROP TABLE IF EXISTS `sidebar`;
CREATE TABLE IF NOT EXISTS `sidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_vi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_jp` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_vi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_jp` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `padding` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_youtube` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sidebar`
--

INSERT INTO `sidebar` (`id`, `name`, `name_vi`, `name_jp`, `des_vi`, `des_jp`, `padding`, `img`, `link`, `css`, `updated_at`, `created_at`, `title`, `des`, `orderby`, `status`, `effect`, `content`, `form_id`, `menu_id`, `cat_id`, `type`, `video_youtube`, `count_post`) VALUES
(27, 'Products', 'Sản phẩm', '製品', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-22 08:51:56', '2021-05-21 08:56:53', NULL, NULL, 0, 'on', NULL, NULL, NULL, 17, NULL, 'menu', NULL, NULL),
(28, 'Services', 'Dịch vụ', 'サービス', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-22 08:52:17', '2021-05-21 08:57:13', NULL, NULL, 1, 'on', NULL, NULL, NULL, 18, NULL, 'menu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`name`, `css_id`, `css_class`, `status`, `type`, `des`, `updated_at`, `created_at`, `id`) VALUES
('Slide Đối tác', NULL, NULL, 'on', NULL, NULL, '2022-03-15 18:49:58', '2022-03-15 18:49:58', 4),
('Slide top', NULL, NULL, 'on', NULL, NULL, '2021-05-23 16:39:11', '2021-05-23 16:39:11', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide_img`
--

DROP TABLE IF EXISTS `slide_img`;
CREATE TABLE IF NOT EXISTS `slide_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_short` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_short` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_button` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_button_2` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `post_id_2` int(11) DEFAULT NULL,
  `orderby` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide_img`
--

INSERT INTO `slide_img` (`id`, `img`, `css_id`, `css_class`, `title`, `des`, `des_short`, `title_short`, `button`, `button_2`, `link`, `status`, `link_button`, `link_button_2`, `slide_id`, `post_id`, `post_id_2`, `orderby`, `updated_at`, `created_at`, `title_en`, `des_en`, `button_en`) VALUES
(95, '2ct1pd.jpeg', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 3, NULL, NULL, 1, '2022-03-15 17:47:38', '2022-03-15 17:47:38', NULL, NULL, NULL),
(96, 'cmnm2022.jpeg', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 3, NULL, NULL, 2, '2022-03-15 17:47:38', '2022-03-15 17:47:38', NULL, NULL, NULL),
(102, '27-shb.jpeg', NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 4, NULL, NULL, 6, '2022-03-15 18:50:13', '2022-03-15 18:50:13', NULL, NULL, NULL),
(101, 'logo-imc-hong-bang1.png', NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 4, NULL, NULL, 5, '2022-03-15 18:50:13', '2022-03-15 18:50:13', NULL, NULL, NULL),
(100, 'logo-imc-hong-bang2.png', NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 4, NULL, NULL, 4, '2022-03-15 18:50:13', '2022-03-15 18:50:13', NULL, NULL, NULL),
(99, '27-shb2.jpeg', NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 4, NULL, NULL, 3, '2022-03-15 18:50:13', '2022-03-15 18:50:13', NULL, NULL, NULL),
(98, 'mhdi2.jpeg', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 4, NULL, NULL, 2, '2022-03-15 18:50:13', '2022-03-15 18:50:13', NULL, NULL, NULL),
(97, 'mhdi.jpeg', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 4, NULL, NULL, 1, '2022-03-15 18:50:13', '2022-03-15 18:50:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tab`
--

DROP TABLE IF EXISTS `tab`;
CREATE TABLE IF NOT EXISTS `tab` (
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tab_item`
--

DROP TABLE IF EXISTS `tab_item`;
CREATE TABLE IF NOT EXISTS `tab_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderby` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_id` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tab_id` int(11) DEFAULT NULL,
  `style` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tab_item`
--

INSERT INTO `tab_item` (`id`, `orderby`, `content`, `css_id`, `css_class`, `title`, `des`, `code`, `button`, `icon`, `status`, `tab_id`, `style`, `img`, `updated_at`, `created_at`) VALUES
(20, NULL, NULL, NULL, NULL, 'Tòa S1.02', NULL, NULL, NULL, NULL, 'on', 6, 'img', 's1.02-moi-1024x665.jpg', '2020-07-17 11:08:17', '2020-07-17 11:08:17'),
(21, NULL, NULL, NULL, NULL, 'Tòa S1.03', NULL, NULL, NULL, NULL, 'on', 6, 'img', 's1-03-moi-1024x665.jpg', '2020-07-17 11:08:34', '2020-07-17 11:08:34'),
(22, NULL, NULL, NULL, NULL, 'Tòa S1.05', NULL, NULL, NULL, NULL, 'on', 6, 'img', 'mat-bang-toa-S1.05-vinhomes-smart-city-1024x768.jpg', '2020-07-17 11:08:51', '2020-07-17 11:08:51'),
(23, NULL, NULL, NULL, NULL, 'Tòa S1.06', NULL, NULL, NULL, NULL, 'on', 6, 'img', 'S1.06-1024x725.jpg', '2020-07-17 11:09:07', '2020-07-17 11:09:07'),
(24, NULL, NULL, NULL, NULL, 'Tòa S2.01', NULL, NULL, NULL, NULL, 'on', 8, 'img', 'S2.01-1024x694.jpg', '2020-07-17 11:13:05', '2020-07-17 11:13:05'),
(25, NULL, NULL, NULL, NULL, 'Tòa S2.02', NULL, NULL, NULL, NULL, 'on', 8, 'img', 'S2.02-moi-1024x665.jpg', '2020-07-17 11:13:19', '2020-07-17 11:13:19'),
(26, NULL, NULL, NULL, NULL, 'Tòa S2.03', NULL, NULL, NULL, NULL, 'on', 8, 'img', 's1-03-moi-1024x665-1.jpg', '2020-07-17 11:13:29', '2020-07-17 11:13:29'),
(27, NULL, NULL, NULL, NULL, 'Tòa S3.01', NULL, NULL, NULL, NULL, 'on', 9, 'img', 'S3.01-1024x724.jpg', '2020-07-17 11:14:07', '2020-07-17 11:14:07'),
(28, NULL, NULL, NULL, NULL, 'Tòa S3.02', NULL, NULL, NULL, NULL, 'on', 9, 'img', 'S3.02-1024x724.jpg', '2020-07-17 11:14:28', '2020-07-17 11:14:28'),
(29, NULL, NULL, NULL, NULL, 'Tòa S3.03', NULL, NULL, NULL, NULL, 'on', 9, 'img', 'S3.03-1024x693.jpg', '2020-07-17 11:15:07', '2020-07-17 11:15:07'),
(30, NULL, NULL, NULL, NULL, 'Tòa S4.01', NULL, NULL, NULL, NULL, 'on', 10, 'img', 'S4.01-1024x575.jpg', '2020-07-17 11:15:33', '2020-07-17 11:15:33'),
(31, NULL, NULL, NULL, NULL, 'Tòa S4.01', NULL, NULL, NULL, NULL, 'on', 10, 'img', 'MB-S4.02-962x1024.jpg', '2020-07-17 11:15:43', '2020-07-17 11:15:43'),
(32, NULL, NULL, NULL, NULL, 'Tòa S4.01', NULL, NULL, NULL, NULL, 'on', 10, 'img', 'MB-S4.03-953x1024.jpg', '2020-07-17 11:15:52', '2020-07-17 11:15:52'),
(33, NULL, NULL, NULL, NULL, 'Ngày 15/11/2018', NULL, NULL, NULL, NULL, 'on', 11, 'img', '1-1.jpg', '2020-07-17 19:48:15', '2020-07-17 19:48:15'),
(34, NULL, NULL, NULL, NULL, 'Ngày 15/03/2019', NULL, NULL, NULL, NULL, 'on', 11, 'img', '2-1.jpg', '2020-07-17 19:48:27', '2020-07-17 19:48:27'),
(35, NULL, NULL, NULL, NULL, 'Ngày 15/09/2019', NULL, NULL, NULL, NULL, 'on', 11, 'img', '3-1.jpg', '2020-07-17 19:48:43', '2020-07-17 19:48:43'),
(36, NULL, NULL, NULL, NULL, 'Ngày 15/01/2020', NULL, NULL, NULL, NULL, 'on', 11, 'img', '4-1.png', '2020-07-17 19:49:02', '2020-07-17 19:49:02'),
(37, NULL, NULL, NULL, NULL, 'Ngày 15/03/2020', NULL, NULL, NULL, NULL, 'on', 11, 'img', '5-1.jpg', '2020-07-17 19:49:16', '2020-07-17 19:49:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_seo_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index_meta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_seo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relate_post` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_color_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_img_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_color_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_color_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_color_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `border_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border_color_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border_color_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border_color_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_family` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_regis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_ring` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theme`
--

INSERT INTO `theme` (`id`, `title`, `title_seo_en`, `des_seo_en`, `key_seo_en`, `contact_en`, `index_meta`, `contact`, `title_seo`, `des_seo`, `key_seo`, `canon`, `type`, `style`, `status`, `favicon`, `head`, `width`, `count_post`, `order_post`, `relate_post`, `button_color`, `button_text_color`, `button_color_2`, `button_color_1`, `button_color_3`, `des_color`, `text_color`, `bg_color`, `bg_color_1`, `bg_color_2`, `bg_color_3`, `bg_img`, `bg_img_2`, `title_color`, `title_color_2`, `title_color_1`, `title_color_3`, `text_color_2`, `border_color`, `border_color_2`, `border_color_1`, `border_color_3`, `h1`, `h2`, `h3`, `h4`, `h5`, `h6`, `text_font`, `button_font`, `des_font`, `col_1`, `col_2`, `created_at`, `updated_at`, `text_family`, `title_family`, `title_font`, `des_family`, `popup`, `popup_regis`, `button_ring`, `cat_img`, `post_img`, `og_image`) VALUES
(1, 'Trang chủ', NULL, NULL, NULL, '<p>Địa chỉ: H&agrave; Nội Việt Nam</p>\r\n<p>Điện thoại: &hellip;&hellip; Fax: &hellip;&hellip;</p>\r\n<p>Email: info @ .... corp.com</p>', 'INDEX, FOLLOW', '<p><span style=\"font-weight: 400;\">Address: T&ograve;a nh&agrave; LICOGI 18, Km số 9, đường Cao tốc Thăng Long Nội B&agrave;i, Thị trấn Quang Minh, Huyện M&ecirc; Linh, H&agrave; Nội, Việt Nam</span></p>\r\n<p><span style=\"font-weight: 400;\">Tel: 046 2876 539</span></p>\r\n<p><span style=\"font-weight: 400;\">Email: </span><a href=\"about:blank\"><span style=\"font-weight: 400;\">info@....corp.com</span></a></p>', 'PHÁT TRIỂN 18', NULL, NULL, NULL, 'home', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '#f4ab33', NULL, '#f4ab33', '#ee7e33', '#ffffff', '', '', '#151223', '#13a64f', '#25a9ad', '#ee7e33', 'bgvin-3.jpg', 'bgs45.png', '#000000', '#25a9ad', '#13a64f', '#ffffff', '0', '#ffffff', '#947a7a', '#570d0d', '#9c3838', '45', '40', '40', '20', '15', '12', '14', '18', '16', NULL, NULL, NULL, '2022-03-24 08:42:41', 'arial', 'Roboto-Bold', 'Lato-Bold', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, 'Danh mục', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cat', NULL, NULL, NULL, 'old', 'container', '12', 'new', NULL, NULL, NULL, '', NULL, NULL, '', '', '0', '0', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'col-md-8', 'col-md-4', NULL, '2020-07-29 14:41:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cover (1)-1.jpg', NULL, NULL),
(5, 'Bài viết', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'post', NULL, NULL, NULL, NULL, 'container', '', NULL, 'on', NULL, NULL, '', NULL, NULL, '', '', '0', '0', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'col-md-8', 'col-md-4', NULL, '2020-07-29 15:15:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cover (1)-2.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theme_row`
--

DROP TABLE IF EXISTS `theme_row`;
CREATE TABLE IF NOT EXISTS `theme_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'container',
  `positon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_img_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_2_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des_2_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide_id` int(11) DEFAULT NULL,
  `slide_id_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `form_id_2` int(11) DEFAULT NULL,
  `tab_id` int(11) DEFAULT NULL,
  `tab_id_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `menu_id_2` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `cat_id_2` int(11) DEFAULT NULL,
  `cat_id_3` int(11) DEFAULT NULL,
  `cat_id_4` int(11) DEFAULT NULL,
  `video_youtube` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col_4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effect_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effect_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effect_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_bg` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code_2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feild` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_fanpage` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_product_id` int(11) DEFAULT NULL,
  `cat_product_id_2` int(11) DEFAULT NULL,
  `cat_list_id` int(11) DEFAULT NULL,
  `cat_list_id_2` int(11) DEFAULT NULL,
  `cat_post_id` int(11) DEFAULT NULL,
  `cat_post_id_2` int(11) DEFAULT NULL,
  `cat_post_sub_id` int(11) DEFAULT NULL,
  `cat_post_sub_id_2` int(11) DEFAULT NULL,
  `icon_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_text_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theme_row`
--

INSERT INTO `theme_row` (`id`, `name`, `type`, `width`, `positon`, `img`, `link_img`, `style`, `img_2`, `link_img_2`, `css`, `updated_at`, `created_at`, `title`, `title_2`, `des`, `des_2`, `link`, `orderby`, `status`, `effect`, `height`, `content`, `content_2`, `title_en`, `title_2_en`, `content_en`, `content_2_en`, `des_en`, `des_2_en`, `slide_id`, `slide_id_2`, `form_id`, `form_id_2`, `tab_id`, `tab_id_2`, `menu_id`, `menu_id_2`, `cat_id`, `cat_id_2`, `cat_id_3`, `cat_id_4`, `video_youtube`, `col_1`, `col_2`, `col_3`, `col_4`, `posion`, `bg`, `display`, `effect_2`, `effect_3`, `effect_4`, `img_bg`, `title_color`, `map_code`, `map_code_2`, `feild`, `facebook_fanpage`, `cat_product_id`, `cat_product_id_2`, `cat_list_id`, `cat_list_id_2`, `cat_post_id`, `cat_post_id_2`, `cat_post_sub_id`, `cat_post_sub_id_2`, `icon_text`, `icon_text_en`) VALUES
(38, 'Footer', 'custome', NULL, NULL, 'bg_footer.jpg', NULL, 'footer', 'logo80.png', NULL, NULL, '2022-04-04 10:25:10', '2020-07-28 10:17:15', 'Tòa nhà LICOGI 18, Km số 9, đường Cao tốc Thăng Long Nội Bài, Thị trấn Quang Minh, Huyện Mê Linh, Hà Nội, Việt Nam', 'congtyphattrien18@gmail.com', NULL, NULL, NULL, 9, 'on', NULL, NULL, NULL, NULL, 'Tòa nhà LICOGI 18, Km số 9, đường Cao tốc Thăng Long Nội Bài, Thị trấn Quang Minh, Huyện Mê Linh, Hà Nội, Việt Nam', 'congtyphattrien18@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'footer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"icon_text\",\"title\",\"title_2\",\"img\",\"img_2\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"1\":{\"icon\":\"<i class=\\\"fa fa-home\\\"><\\/i>\",\"text\":\"\\/\",\"text_en\":\"\\/\"},\"2\":{\"icon\":\"<i class=\\\"fa-brands fa-facebook-square\\\"><\\/i>\",\"text\":\"#\",\"text_en\":\"#\"},\"3\":{\"icon\":\"<i class=\\\"fa-brands fa-instagram\\\"><\\/i>\",\"text\":\"#\",\"text_en\":\"#\"},\"4\":{\"icon\":\"<i class=\\\"fa-brands fa-youtube\\\"><\\/i>\",\"text\":\"#\",\"text_en\":\"#\"}}', NULL),
(56, 'Menu', 'custome', NULL, NULL, '', NULL, 'menu', NULL, NULL, NULL, '2022-03-15 17:45:07', '2020-07-30 10:07:37', NULL, NULL, NULL, NULL, NULL, 2, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'head', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"menu_id\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL),
(78, 'Slide', 'custome', NULL, NULL, NULL, NULL, 'slide', NULL, NULL, NULL, '2022-03-16 07:17:32', '2021-05-23 10:47:04', NULL, NULL, NULL, NULL, NULL, 3, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'head', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"slide_id\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL),
(80, 'Lĩnh vực hoạt động', 'custome', NULL, NULL, '', NULL, 'field_of_activity', NULL, NULL, NULL, '2022-03-15 18:29:20', '2021-05-23 10:49:54', 'Lĩnh vực hoạt động', NULL, NULL, NULL, NULL, 5, 'on', NULL, NULL, NULL, NULL, 'Field of activity', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'body', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"title\",\"cat_list_id\"]', NULL, NULL, NULL, 70, NULL, NULL, NULL, NULL, NULL, 'null', NULL),
(81, 'Dự án', 'custome', NULL, NULL, NULL, NULL, 'project', NULL, NULL, NULL, '2022-03-15 18:12:55', '2021-05-23 10:51:14', 'Dự án tiêu biểu', NULL, NULL, NULL, NULL, 4, 'on', NULL, NULL, NULL, NULL, 'Outstanding project', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'body', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"title\",\"link\",\"cat_post_id\"]', NULL, NULL, NULL, NULL, NULL, 74, NULL, NULL, NULL, 'null', NULL),
(82, 'Tin tức - sự kiện', 'custome', NULL, NULL, NULL, NULL, 'news_event', NULL, NULL, NULL, '2022-03-15 18:32:43', '2021-05-23 10:51:59', 'Tin tức', 'Sự kiện', NULL, NULL, NULL, 6, 'on', NULL, NULL, NULL, NULL, 'News', 'Event', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'body', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"title\",\"title_2\",\"cat_post_id\",\"cat_post_id_2\"]', NULL, NULL, NULL, NULL, NULL, 69, 80, NULL, NULL, 'null', NULL),
(83, 'Top', 'custome', NULL, NULL, 'logo80-1.png', NULL, 'top', 'logo-1.png', NULL, NULL, '2022-04-04 10:21:00', '2022-03-15 17:18:55', NULL, NULL, NULL, NULL, NULL, 1, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'head', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"img\",\"img_2\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL),
(84, 'Video', 'custome', 'container', NULL, NULL, NULL, 'video', NULL, NULL, NULL, '2022-03-15 17:29:10', '2022-03-15 17:27:21', 'Video', NULL, NULL, NULL, NULL, 7, 'on', NULL, NULL, NULL, NULL, 'Video', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'body', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"title\",\"cat_post_id\"]', NULL, NULL, NULL, NULL, NULL, 71, NULL, NULL, NULL, 'null', NULL),
(85, 'Đối tác', 'custome', 'container', NULL, NULL, NULL, 'partner', NULL, NULL, NULL, '2022-03-15 18:51:15', '2022-03-15 17:29:07', 'Đối tác', NULL, NULL, NULL, NULL, 8, 'on', NULL, NULL, NULL, NULL, 'Partner', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'body', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"title\",\"slide_id\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL),
(86, 'Liên hệ', 'page', NULL, NULL, NULL, NULL, 'contact', NULL, NULL, NULL, '2022-03-16 08:19:02', '2022-03-16 08:09:03', 'Liên hệ', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.98839009489!2d105.81945408744359!3d21.022738704091033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1647418349267!5m2!1svi!2s\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, NULL, 10, 'on', NULL, NULL, NULL, NULL, 'Contact', NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29793.98839009489!2d105.81945408744359!3d21.022738704091033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSMOgIE7hu5lpLCBIb8OgbiBLaeG6v20sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1647418349267!5m2!1svi!2s\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'body', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"title\",\"des\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

DROP TABLE IF EXISTS `tinh`;
CREATE TABLE IF NOT EXISTS `tinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id`, `name`, `url`, `code`, `updated_at`, `created_at`) VALUES
(1, 'An Giang', 'an-giang', '90000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(2, 'Bắc Giang', 'bac-giang', '26000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(3, 'Bắc Kạn', 'bac-kan', '23000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(4, 'Bạc Liêu', 'bac-lieu', '97000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(5, 'Bắc Ninh', 'bac-ninh', '16000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(6, 'Bà Rịa-Vũng Tàu', 'ba-ria-vung-tau', '78000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(7, 'Bến Tre', 'ben-tre', '86000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(8, 'Bình Định', 'binh-dinh', '55000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(9, 'Bình Dương', 'binh-duong', '75000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(10, 'Bình Phước', 'binh-phuoc', '67000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(11, 'Bình Thuận', 'binh-thuan', '77000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(12, 'Cà Mau', 'ca-mau', '98000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(13, 'Cần Thơ', 'can-tho', '94000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(14, 'Cao Bằng', 'cao-bang', '21000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(15, 'Da Nang', 'da-nang', '50000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(16, 'Đắk Lắk', 'dak-lak', '63000 – 64000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(17, 'Đắk Nông', 'dak-nong', '65000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(18, 'Điện Biên', 'dien-bien', '32000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(19, 'Đồng Nai', 'dong-nai', '76000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(20, 'Đồng Tháp', 'dong-thap', '81000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(21, 'Gia Lai', 'gia-lai', '61000 – 62000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(22, 'Hà Giang', 'ha-giang', '20000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(23, 'Hà Nam', 'ha-nam', '18000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(24, 'Hà Tĩnh', 'ha-tinh', '45000 – 46000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(25, 'Hải Dương', 'hai-duong', '3000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(26, 'Hải Phòng', 'hai-phong', '04000 – 05000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(27, 'Hà Nội', 'ha-noi', '10000 – 14000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(28, 'Hậu Giang', 'hau-giang', '95000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(29, 'Hòa Bình', 'hoa-binh', '36000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(30, 'TP. Hồ Chí Minh', 'tp-ho-chi-minh', '70000 – 74000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(31, 'Hưng Yên', 'hung-yen', '17000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(32, 'Khánh Hòa', 'khanh-hoa', '57000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(33, 'Kiên Giang', 'kien-giang', '91000 – 92000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(34, 'Kon Tum', 'kon-tum', '60000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(35, 'Lai Châu', 'lai-chau', '30000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(36, 'Lâm Đồng', 'lam-dong', '66000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(37, 'Lạng Sơn', 'lang-son', '25000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(38, 'Lào Cai', 'lao-cai', '31000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(39, 'Long An', 'long-an', '82000 – 83000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(40, 'Nam Định', 'nam-dinh', '7000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(41, 'Nghệ An', 'nghe-an', '43000 – 44000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(42, 'Ninh Bình', 'ninh-binh', '8000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(43, 'Ninh Thuận', 'ninh-thuan', '59000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(44, 'Phú Thọ', 'phu-tho', '35000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(45, 'Phú Yên', 'phu-yen', '56000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(46, 'Quảng Bình', 'quang-binh', '47000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(47, 'Quảng Nam', 'quang-nam', '51000 – 52000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(48, 'Quảng Ngãi', 'quang-ngai', '53000 – 54000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(49, 'Quảng Ninh', 'quang-ninh', '01000 – 02000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(50, 'Quảng Trị', 'quang-tri', '48000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(51, 'Sóc Trăng', 'soc-trang', '96000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(52, 'Sơn La', 'son-la', '34000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(53, 'Tây Ninh', 'tay-ninh', '80000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(54, 'Thái Bình', 'thai-binh', '6000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(55, 'Thái Nguyên', 'thai-nguyen', '24000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(56, 'Thanh Hóa', 'thanh-hoa', '40000 – 42000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(57, 'Thừa Thiên Huế', 'thua-thien-hue', '49000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(58, 'Tiền Giang', 'tien-giang', '84000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(59, 'Trà Vinh', 'tra-vinh', '87000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(60, 'Tuyên Quang', 'tuyen-quang', '22000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(61, 'Vĩnh Long', 'vinh-long', '85000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(62, 'Vĩnh Phúc', 'vinh-phuc', '15000', '2020-07-31 11:09:53', '2020-07-31 11:09:53'),
(63, 'Yên Bái', 'yen-bai', '33000', '2020-07-31 11:09:53', '2020-07-31 11:09:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_permission`
--

DROP TABLE IF EXISTS `type_permission`;
CREATE TABLE IF NOT EXISTS `type_permission` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=230 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_permission`
--

INSERT INTO `type_permission` (`id`, `type_id`, `permission_id`, `type`, `updated_at`, `created_at`) VALUES
(118, 1, 46, 'undefined', '2020-07-17 14:58:34', '2020-07-17 14:58:34'),
(2, 1, 2, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(3, 1, 3, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(4, 1, 4, NULL, '2020-07-02 13:36:08', '2020-07-02 13:36:08'),
(5, 1, 5, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(6, 1, 6, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(7, 1, 7, NULL, '2020-07-02 13:36:08', '2020-07-02 13:36:08'),
(8, 1, 8, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(9, 1, 9, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(10, 1, 10, NULL, '2020-07-02 13:36:08', '2020-07-02 13:36:08'),
(11, 1, 11, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(12, 1, 12, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(13, 1, 13, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(14, 1, 14, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(15, 1, 15, NULL, '2020-07-02 13:36:08', '2020-07-02 13:36:08'),
(16, 1, 16, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(17, 1, 17, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(18, 1, 18, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(19, 1, 19, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(20, 1, 20, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(21, 1, 21, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(22, 1, 22, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(23, 1, 23, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(24, 1, 24, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(25, 1, 25, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(26, 1, 26, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(27, 1, 27, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(28, 1, 28, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(29, 1, 29, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(30, 1, 30, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(31, 1, 31, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(103, 1, 32, NULL, '2020-07-13 18:55:06', '2020-07-13 18:55:06'),
(33, 1, 33, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(34, 1, 34, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(35, 1, 35, NULL, '2020-07-02 17:54:23', '2020-07-02 17:54:23'),
(229, 1, 59, 'undefined', '2020-08-04 23:05:34', '2020-08-04 23:05:34'),
(228, 1, 58, 'undefined', '2020-08-04 23:05:33', '2020-08-04 23:05:33'),
(185, 1, 44, 'admin', '2020-07-25 01:18:13', '2020-07-25 01:18:13'),
(105, 1, 43, NULL, '2020-07-13 19:08:31', '2020-07-13 19:08:31'),
(104, 1, 42, NULL, '2020-07-13 19:08:30', '2020-07-13 19:08:30'),
(102, 1, 40, NULL, '2020-07-13 17:29:23', '2020-07-13 17:29:23'),
(101, 1, 37, NULL, '2020-07-13 17:29:23', '2020-07-13 17:29:23'),
(116, 1, 1, 'domain', '2020-07-16 16:19:44', '2020-07-16 16:19:44'),
(117, 1, 36, 'domain', '2020-07-16 16:19:46', '2020-07-16 16:19:46'),
(119, 1, 47, 'undefined', '2020-07-17 14:58:34', '2020-07-17 14:58:34'),
(184, 1, 48, 'domain', '2020-07-20 10:00:51', '2020-07-20 10:00:51'),
(186, 1, 45, 'admin', '2020-07-25 01:18:14', '2020-07-25 01:18:14'),
(219, 1, 49, 'domain', '2020-07-27 06:15:01', '2020-07-27 06:15:01'),
(220, 1, 50, 'undefined', '2020-07-28 11:42:27', '2020-07-28 11:42:27'),
(221, 1, 51, 'undefined', '2020-07-28 11:42:28', '2020-07-28 11:42:28'),
(222, 1, 52, 'undefined', '2020-07-30 03:43:20', '2020-07-30 03:43:20'),
(223, 1, 53, 'undefined', '2020-07-30 03:43:20', '2020-07-30 03:43:20'),
(224, 1, 55, 'undefined', '2020-07-31 22:24:40', '2020-07-31 22:24:40'),
(225, 1, 54, 'undefined', '2020-07-31 22:24:40', '2020-07-31 22:24:40'),
(226, 1, 56, 'undefined', '2020-08-03 07:15:57', '2020-08-03 07:15:57'),
(227, 1, 57, 'undefined', '2020-08-03 07:15:58', '2020-08-03 07:15:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `def` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_login` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type_id`, `status`, `tel`, `img`, `def`, `count_login`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'root', 'root@webux.vn', '$2y$10$3iwH0yvY4vueEbF0p7SRXOd8bC4CpTV1BOcucEKCghilF1orXFLfC', '1', 'on', '0966130168', 'logo_mini.png', NULL, 0, 'ZVyCNBF6km3dTyHzw9SnGjH4G3aBhuynJShQ9UE6ghLhX8yOysecErN2H0P1', '2019-11-29 06:30:40', '2019-11-29 06:30:40'),
(2, 'admin', 'admin@webux.vn', '$2y$10$Kc8obj5.u5QtAb1ZglaY0ODno3PO9ux8fE8HSzYIiocMPAMxq4rwm', '2', 'on', '09876543210', '', NULL, 0, 'ILhz7ykPKGThNSL5gjUm2ZNbF7WMTzj9ILKTJihDk2zyureyqrBJYZKDBlTV', '2020-03-04 00:47:02', '2019-11-29 06:30:40'),
(3, 'Biên tập', 'bientap@webux.vn', '$2y$10$3npR58vvqyblWtytUd9Jlu.vS9TXeiDwjjrunQCyMkI08DzZ8CQJO', '3', 'on', '098765432345', '', NULL, 0, 'HWtQ7AxIgRWisuEYr05rouZs5n4MbOiTTfw5jCNVhT3GNMCG79fnIvV5gfok', '2020-02-24 02:19:55', '2019-11-29 06:30:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_noti`
--

DROP TABLE IF EXISTS `user_noti`;
CREATE TABLE IF NOT EXISTS `user_noti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `noti` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_noti`
--

INSERT INTO `user_noti` (`id`, `user_id`, `noti`, `view`, `link`, `type`, `form_id`, `updated_at`, `created_at`) VALUES
(16, 1, '[Theme] <b>root@webux.vn</b> đăng ký mua giao diện <b>Lavender</b>', 'on', NULL, 'form', 7, '2020-04-29 01:38:56', '2020-04-21 19:21:59'),
(17, 2, '[Theme] <b>root@webux.vn</b> đăng ký mua giao diện <b>Lavender</b>', 'on', NULL, 'form', 7, '2020-04-21 19:21:59', '2020-04-21 19:21:59'),
(18, 1, '[Theme] <b>root@webux.vn</b> đăng ký mua giao diện <b>Pofo</b>', 'on', NULL, 'form', 7, '2020-04-29 01:38:56', '2020-04-21 19:24:42'),
(19, 2, '[Theme] <b>root@webux.vn</b> đăng ký mua giao diện <b>Pofo</b>', 'off', NULL, 'form', 7, '2020-04-21 19:24:42', '2020-04-21 19:24:42'),
(20, 1, '[Theme] <b>root@webux.vn</b> đăng ký mua giao diện <b> fsd</b>', 'on', NULL, 'form', 7, '2020-04-29 01:38:56', '2020-04-21 19:21:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `url`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'root', 'on', 'root', NULL, NULL),
(2, 'Admin', 'admin', 'on', 'admin', NULL, NULL),
(3, 'Biên tập', 'bien-tap', 'on', 'editor', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
