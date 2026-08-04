-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2026 at 10:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pyramidcateringbd_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `count`, `suffix`, `icon`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Events Served', 5000, '+', 'fas fa-glass-cheers', 0, 'active', '2026-07-29 09:27:02', '2026-07-29 09:27:02'),
(2, 'Premium Menus', 150, '+', 'fas fa-utensils', 0, 'active', '2026-07-29 09:27:24', '2026-07-29 09:27:24'),
(3, 'Satisfaction Rate', 99, '%', 'fas fa-smile', 0, 'active', '2026-07-29 09:27:44', '2026-07-29 09:27:44'),
(4, 'Fast Service', 12, '-Hours', 'fas fa-clock', 0, 'active', '2026-07-29 09:28:09', '2026-07-29 09:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('published','scheduled','draft') NOT NULL DEFAULT 'draft',
  `published_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `event_type`, `event_date`, `guests`, `location`, `notes`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Motiur Rahman', NULL, '01909302126', 'Wedding Reception', '2026-07-29', 500, 'Bangladesh', 'Test', NULL, '2026-07-29 10:29:00', '2026-07-29 10:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('pyramid-catering-bd-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:83:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:12:\"view sliders\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:14:\"create sliders\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"edit sliders\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:14:\"delete sliders\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:15:\"view categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:17:\"create categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"edit categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:17:\"delete categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:8;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:9:\"view tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:9;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:11:\"create tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:10;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:9:\"edit tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:11;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:11:\"delete tags\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:12;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"view services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:13;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:15:\"create services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:14;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:13:\"edit services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:15;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"delete services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:16;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:16:\"view enlistments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:17;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:18:\"create enlistments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:18;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:16:\"edit enlistments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:19;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:18:\"delete enlistments\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:20;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:17:\"view testimonials\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:21;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:19:\"create testimonials\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:22;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:17:\"edit testimonials\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:23;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:19:\"delete testimonials\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:24;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:17:\"view achievements\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:25;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"create achievements\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:26;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:17:\"edit achievements\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:27;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:19:\"delete achievements\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:28;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:14:\"view galleries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:29;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:16:\"create galleries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:30;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:14:\"edit galleries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:31;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:16:\"delete galleries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:32;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"view teams\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:33;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"create teams\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:34;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:10:\"edit teams\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:35;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:12:\"delete teams\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:36;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"view clients\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:37;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:14:\"create clients\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:38;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:12:\"edit clients\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:39;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:14:\"delete clients\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:40;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:10:\"view blogs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:41;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:12:\"create blogs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:42;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:10:\"edit blogs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:43;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"delete blogs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:44;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:10:\"view sites\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:45;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"create sites\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:46;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:10:\"edit sites\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:47;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:12:\"delete sites\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:48;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:10:\"view users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:49;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:12:\"create users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:50;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:10:\"edit users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:51;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:12:\"delete users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:52;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:10:\"view roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:53;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:54;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:10:\"edit roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:55;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:56;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:13:\"view settings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:57;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:15:\"create settings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:58;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:13:\"edit settings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:59;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:15:\"delete settings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:60;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:14:\"view dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:61;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:10:\"view story\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:62;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:13:\"view missions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:63;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:12:\"view contact\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:64;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:13:\"view bookings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:65;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:8:\"view seo\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:66;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:17:\"view page content\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:67;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:18:\"view menu-packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:68;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:20:\"create menu-packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:69;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:18:\"edit menu-packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:70;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:20:\"delete menu-packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:71;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:20:\"view menu-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:72;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:22:\"create menu-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:73;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:20:\"edit menu-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:74;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:22:\"delete menu-categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:75;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:13:\"view packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:76;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:15:\"create packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:77;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:13:\"edit packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:78;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:15:\"delete packages\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:79;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:18:\"view package-items\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:80;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:20:\"create package-items\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:81;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:18:\"edit package-items\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:82;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:20:\"delete package-items\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"superadmin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:7:\"manager\";s:1:\"c\";s:3:\"web\";}}}', 1785908238);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Convention', 'convention', '-', 'active', '2026-07-29 09:15:09', '2026-07-29 09:18:58'),
(2, 'Weeding', 'weeding', '-', 'active', '2026-07-29 09:15:22', '2026-07-29 09:18:54'),
(3, 'Conference', 'conference', '-', 'active', '2026-07-29 09:17:49', '2026-07-29 09:19:02'),
(4, 'Seminar', 'seminar', '-', 'active', '2026-07-29 09:17:57', '2026-07-29 09:18:51'),
(5, 'Cultural Program', 'cultural-program', '-', 'active', '2026-07-29 09:18:07', '2026-07-29 09:18:47'),
(6, 'Corporate Event', 'corporate-event', '-', 'active', '2026-07-29 09:18:17', '2026-07-29 09:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enlistments`
--

CREATE TABLE `enlistments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enlistments`
--

INSERT INTO `enlistments` (`id`, `category_id`, `title`, `slug`, `description`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sena Prangon Convention', 'sena-prangon-convention', '<h2 class=\"text-text-100 mt-3 -mb-1 text-[1.125rem] font-bold\" dir=\"auto\" data-sourcepos=\"60:1-60:27;2723-2749\" style=\"color: rgb(29, 28, 28); font-family: Poppins, sans-serif; margin-block: 0.5rem 1rem; text-align: justify; text-transform: capitalize;\">Booking Shifts &amp; Timing</h2><ul class=\"[li_&amp;]:mb-0 [li_&amp;]:mt-1 [li_&amp;]:gap-1 [&amp;:not(:last-child)_ul]:pb-1 [&amp;:not(:last-child)_ol]:pb-1 list-disc flex flex-col gap-1 pl-8 mb-3\" dir=\"auto\" data-sourcepos=\"62:1-63:51;2751-2837\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 14px; margin-block: 0px; outline: 0px; vertical-align: baseline; color: rgb(29, 28, 28); font-family: Poppins, sans-serif; text-align: justify; text-transform: capitalize;\"><li class=\"font-claude-response-body whitespace-normal break-words pl-2\" data-sourcepos=\"62:1-62:36;2751-2786\" style=\"background: transparent; border: 0px; margin-block: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-weight: bolder;\">Day Shift:</span> 10:00 AM – 4:00 PM</li><li class=\"font-claude-response-body whitespace-normal break-words pl-2\" data-sourcepos=\"63:1-63:51;2787-2837\" style=\"background: transparent; border: 0px; margin-block: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-weight: bolder;\">Evening Shift:</span> 6:00 PM – 12:00 AM (midnight)</li></ul><h2 class=\"text-text-100 mt-3 -mb-1 text-[1.125rem] font-bold\" dir=\"auto\" data-sourcepos=\"65:1-65:32;2839-2870\" style=\"color: rgb(29, 28, 28); font-family: Poppins, sans-serif; margin-block: 0.5rem 1rem; text-align: justify; text-transform: capitalize;\">Seasonal Discounts &amp; Charges</h2><ul class=\"[li_&amp;]:mb-0 [li_&amp;]:mt-1 [li_&amp;]:gap-1 [&amp;:not(:last-child)_ul]:pb-1 [&amp;:not(:last-child)_ol]:pb-1 list-disc flex flex-col gap-1 pl-8 mb-3\" dir=\"auto\" data-sourcepos=\"67:1-69:199;2872-3231\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; font-size: 14px; margin-block: 0px; outline: 0px; vertical-align: baseline; color: rgb(29, 28, 28); font-family: Poppins, sans-serif; text-align: justify; text-transform: capitalize;\"><li class=\"font-claude-response-body whitespace-normal break-words pl-2\" data-sourcepos=\"67:1-67:83;2872-2954\" style=\"background: transparent; border: 0px; margin-block: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-weight: bolder;\">Ramadan discount:</span> 50% off standard rent for the Premium Hall and Grand Hall.</li><li class=\"font-claude-response-body whitespace-normal break-words pl-2\" data-sourcepos=\"68:1-68:78;2955-3032\" style=\"background: transparent; border: 0px; margin-block: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-weight: bolder;\">Online payments:</span> An additional 2% SSL (payment gateway) charge applies.</li><li class=\"font-claude-response-body whitespace-normal break-words pl-2\" data-sourcepos=\"69:1-69:199;3033-3231\" style=\"background: transparent; border: 0px; margin-block: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-weight: bolder;\">Pre-booking:</span> A provisional hold can be placed with a Tk. 5,000/- pre-booking fee; the remaining full balance must be paid within 72 hours, or the booking is subject to cancellation/suspension.</li></ul><h2 class=\"text-text-100 mt-3 -mb-1 text-[1.125rem] font-bold\" dir=\"auto\" data-sourcepos=\"71:1-71:31;3233-3263\" style=\"color: rgb(29, 28, 28); font-family: Poppins, sans-serif; margin-block: 0.5rem 1rem; text-align: justify; text-transform: capitalize;\">Catering &amp; Event Management</h2><p class=\"font-claude-response-body break-words whitespace-normal\" dir=\"auto\" data-sourcepos=\"73:1-73:366;3265-3630\" style=\"margin-block: 0px 0.9rem; color: rgb(29, 28, 28); font-family: Poppins, sans-serif; font-size: 14px; text-align: justify; text-transform: capitalize;\">Senaprangan operates on a <span style=\"font-weight: bolder;\">closed enlisted-vendor system</span> — catering and event management companies must be selected from the Army Welfare Trust’s official approved list; no outside vendor is permitted. This makes vendor selection especially important for clients, since food, décor, and hospitality are controlled through a curated panel rather than open choice.</p><p class=\"font-claude-response-body break-words whitespace-normal\" dir=\"auto\" data-sourcepos=\"75:1-75:185;3632-3816\" style=\"margin-block: 0px 0.9rem; color: rgb(29, 28, 28); font-family: Poppins, sans-serif; font-size: 14px; text-align: justify; text-transform: capitalize;\">Nuruzzaman Catering Service is proud to serve clients at Senaprangan as part of this enlisted panel, managing menus, service staff, and event-day coordination within the venue’s rules.</p><h2 class=\"text-text-100 mt-3 -mb-1 text-[1.125rem] font-bold\" dir=\"auto\" data-sourcepos=\"77:1-77:40;3818-3857\" style=\"color: rgb(29, 28, 28); font-family: Poppins, sans-serif; margin-block: 0.5rem 1rem; text-align: justify; text-transform: capitalize;\">Why Book Through Nuruzzaman Catering</h2><p class=\"font-claude-response-body break-words whitespace-normal\" dir=\"auto\" data-sourcepos=\"79:1-79:292;3859-4150\" style=\"margin-block: 0px 0.9rem; color: rgb(29, 28, 28); font-family: Poppins, sans-serif; font-size: 14px; text-align: justify; text-transform: capitalize;\">As an enlisted caterer for Senaprangan, Nuruzzaman Catering Service takes care of the food and hospitality side of your event — custom wedding, gaye holud, and corporate menus, trained waitstaff, and coordination with the venue authority — so your event runs smoothly from entry to farewell.</p>', 'Mirpur, Dhaka', 1, '2026-07-29 09:19:58', '2026-07-29 09:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'weddings',
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `category`, `image`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'weddings', 'uploads/galleries/ornate-lanterns-illuminating-iftar-dinner-table-with-dates-and-fruits-photo_6a69bfcccb615.jpg', 1, 0, '2026-07-29 08:13:20', '2026-07-29 08:54:36'),
(2, 'Test 2', 'dishes', 'uploads/galleries/cib-excellence-2022-007-scaled_6a69bfc65031f.jpg', 1, 0, '2026-07-29 08:14:01', '2026-07-29 08:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('image','video','document') NOT NULL DEFAULT 'image',
  `alt_text` varchar(255) DEFAULT NULL,
  `size` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `model_type`, `model_id`, `type`, `alt_text`, `size`, `sort_order`, `is_main`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'images (6).jpg', 'uploads/images-6_6a69beb064a1e.jpg', 'App\\Models\\Service', 2, 'image', 'Birthday Party', 12912, 0, 1, 2, '2026-07-29 08:49:52', '2026-08-04 07:37:53'),
(3, 'images (5).jpg', 'uploads/images-5_6a69bef36dcbe.jpg', 'App\\Models\\Service', 1, 'image', 'Wedding Celebrations', 38304, 0, 1, 2, '2026-07-29 08:50:59', '2026-08-04 07:38:10'),
(4, 'ABCF1-99-scaled.jpg', 'uploads/abcf1-99-scaled_6a69bf21cda83.jpg', 'App\\Models\\Service', 3, 'image', 'Corporate Events', 788673, 0, 1, 2, '2026-07-29 08:51:45', '2026-08-04 07:37:58'),
(5, 'ornate-lanterns-illuminating-iftar-dinner-table-with-dates-and-fruits-photo.jpg', 'uploads/ornate-lanterns-illuminating-iftar-dinner-table-with-dates-and-fruits-photo_6a69bf36ec3c2.jpg', 'App\\Models\\Service', 4, 'image', 'Iftar Party Catering', 34939, 0, 1, 2, '2026-07-29 08:52:06', '2026-08-04 07:38:05'),
(6, 'ABCF1-99-scaled.jpg', 'uploads/abcf1-99-scaled_6a69c5bebceda.jpg', 'App\\Models\\Enlistment', 1, 'image', 'Sena Prangon Convention', 788673, 0, 1, 2, '2026-07-29 09:19:58', '2026-07-29 09:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `name`, `slug`, `description`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Royal Kacchi Packages', 'royal-kacchi-packages', 'Authentic Shahi Kacchi Biryani & Traditional Royal Feasts', 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 'Buffet Packages', 'buffet-packages', 'Lavish Multi-Course Buffet Spreads for Big Celebrations', 2, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_package_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_no` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_package_id`, `name`, `item_no`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Royal Mutton Kacchi Biryani (Chinigura/Basmati)', 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 1, 'Royal Naan / Royal Rumali Roti', 2, 2, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 1, 'Chicken Tandoori / Roasted Chicken (1/4 Piece)', 3, 3, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(4, 1, 'Beef Bhuna', 4, 4, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(5, 1, 'Royal Zarda / Firni (In Plastic Cup With Spoon)', 5, 5, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(6, 1, 'Borhani With Plain Creamy Yogurt', 6, 6, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(7, 1, 'Plum Chutney', 7, 7, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(8, 1, 'Pea Salad', 8, 8, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(9, 1, 'Mineral Water', 9, 9, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(10, 1, 'Royal Paan Box With Tissue', 10, 10, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(11, 2, 'Royal Mutton Kacchi Biryani (Chinigura/Basmati)', 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(12, 2, 'Chicken Tandoori / Roasted Chicken (1/4 Piece)', 2, 2, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(13, 2, 'Beef Bhuna / Kofta Curry', 3, 3, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(14, 2, 'Royal Zarda / Firni (In Plastic Cup With Spoon)', 4, 4, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(15, 2, 'Borhani With Plain Creamy Yogurt', 5, 5, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(16, 2, 'Plum Chutney', 6, 6, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(17, 2, 'Pea Salad', 7, 7, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(18, 2, 'Mineral Water', 8, 8, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(19, 2, 'Royal Paan Box With Tissue', 9, 9, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(28, 4, 'Butter Rice / Fried Rice', 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(29, 4, 'Grilled Chicken / BBQ Chicken', 2, 2, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(30, 4, 'Beef Pepper Steak', 3, 3, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(31, 4, 'Chinese Vegetable Stir Fry', 4, 4, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(32, 4, 'Fresh Green Salad', 5, 5, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(33, 4, 'Soft Drinks & Juices', 6, 6, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(34, 5, 'Special Seafood Rice & Fried Rice', 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(35, 5, 'Chicken Sizzling & Roasted Wings', 2, 2, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(36, 5, 'Mutton Rezala / Beef Steak', 3, 3, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(37, 5, 'Assorted Pasta & Lasagna', 4, 4, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(38, 5, 'Gourmet Dessert & Fruit Bar', 5, 5, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(39, 5, 'Fresh Juice Bar', 6, 6, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(40, 3, 'Special Shahi Mutton Kacchi (Basmati)', 1, 1, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(41, 3, 'Shahi Chicken Roast', 2, 2, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(42, 3, 'Beef Kala Bhuna', 3, 3, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(43, 3, 'Special Jali Kabab', 4, 4, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(44, 3, 'Pashmi Firni / Zafrani Zarda', 5, 5, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(45, 3, 'Shahi Borhani & Matha', 6, 6, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(46, 3, 'Special Mix Salad & Chutney', 7, 7, '2026-07-29 09:05:00', '2026-07-29 09:05:00'),
(47, 3, 'Premium Mineral Water', 8, 8, '2026-07-29 09:05:00', '2026-07-29 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_packages`
--

CREATE TABLE `menu_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_packages`
--

INSERT INTO `menu_packages` (`id`, `menu_category_id`, `name`, `slug`, `subtitle`, `image`, `price`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'MENU-1', 'menu-1-gold-kacchi-feast', 'Gold Kacchi Feast', NULL, NULL, 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 1, 'MENU-2', 'menu-2-diamond-royal-feast', 'Diamond Royal Feast', NULL, NULL, 2, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 1, 'MENU-3', 'menu-3', 'Exclusive Royal Shahi Platter', NULL, NULL, 3, 1, '2026-07-29 08:07:35', '2026-07-29 09:05:00'),
(4, 2, 'Standard Buffet', 'standard-buffet', 'Classic Grand Buffet', NULL, NULL, 1, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(5, 2, 'Premium Buffet', 'premium-buffet', 'Luxury Buffet Experience', NULL, NULL, 2, 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_permission_tables', 1),
(5, '2025_01_11_000001_create_settings_table', 1),
(6, '2025_01_11_000002_create_seos_table', 1),
(7, '2025_01_11_000003_create_pages_table', 1),
(8, '2025_01_11_202503_media_table', 1),
(9, '2025_01_11_202504_create_attachments_table', 1),
(10, '2025_08_26_060808_create_categories_table', 1),
(11, '2025_08_26_080426_create_tags_table', 1),
(12, '2025_08_27_060809_create_services_table', 1),
(13, '2025_08_31_050526_create_testimonials_table', 1),
(14, '2025_08_31_081220_create_contacts_table', 1),
(15, '2025_08_31_081221_create_bookings_table', 1),
(16, '2025_08_31_090108_create_stories_table', 1),
(17, '2025_08_31_101835_create_teams_table', 1),
(18, '2025_08_31_190722_create_clients_table', 1),
(19, '2025_09_02_085107_create_achievements_table', 1),
(20, '2025_09_03_171314_create_enlistments_table', 1),
(21, '2025_09_12_234919_create_blog_posts_table', 1),
(22, '2025_09_12_234920_create_blog_comments_table', 1),
(23, '2025_09_12_235117_create_blog_post_tags_table', 1),
(24, '2026_03_30_051056_create_sites_table', 1),
(25, '2026_04_01_082751_create_sliders_table', 1),
(26, '2026_04_03_170338_create_visitor_records_table', 1),
(27, '2026_07_28_000001_create_galleries_table', 1),
(28, '2026_07_29_000001_create_menu_categories_table', 1),
(29, '2026_07_29_000002_create_menu_packages_table', 1),
(30, '2026_07_29_000003_create_menu_items_table', 1),
(31, '2026_08_04_000001_create_packages_table', 2),
(32, '2026_08_04_000002_create_package_items_table', 2),
(33, '2026_08_04_000003_create_package_galleries_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `image`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Basic Package', 'basic-package', 'uploads/packages/1785822457_6a717cf9a041b.jpg', 0, 1, '2026-08-04 05:38:07', '2026-08-04 06:11:59'),
(2, 'Standard Package', 'standard-package', 'uploads/packages/1785829816_6a7199b856dd4.jpg', 0, 1, '2026-08-04 07:50:16', '2026-08-04 07:50:16'),
(3, 'Premium Package', 'premium-package', 'uploads/packages/1785829864_6a7199e8402a6.jpg', 0, 1, '2026-08-04 07:51:04', '2026-08-04 07:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `package_galleries`
--

CREATE TABLE `package_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_item_id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_galleries`
--

INSERT INTO `package_galleries` (`id`, `package_item_id`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello', 'uploads/package_galleries/1785822524_6a717d3c2f900.jpg', '2026-08-04 05:48:44', '2026-08-04 05:49:03'),
(2, 1, 'Hi', 'uploads/package_galleries/1785822524_6a717d3c30797.jpg', '2026-08-04 05:48:44', '2026-08-04 05:49:03'),
(3, 1, 'Tech', 'uploads/package_galleries/1785822524_6a717d3c30dab.jpg', '2026-08-04 05:48:44', '2026-08-04 05:49:03'),
(4, 2, NULL, 'uploads/package_galleries/1785824659_6a718593cee93.jpg', '2026-08-04 06:24:19', '2026-08-04 06:24:19'),
(5, 2, NULL, 'uploads/package_galleries/1785824659_6a718593cf9dc.jpg', '2026-08-04 06:24:19', '2026-08-04 06:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `package_items`
--

CREATE TABLE `package_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_items`
--

INSERT INTO `package_items` (`id`, `package_id`, `name`, `slug`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, '✅ Basic P12 🎯 SWID Conv Hall', 'basic-p12-swid-conv-hall', 'uploads/package_items/1785822524_6a717d3c2d628.jpg', 0, '2026-08-04 05:48:44', '2026-08-04 05:48:44'),
(2, 1, 'Mini Portable Pocket Shaver', 'mini-portable-pocket-shaver', 'uploads/package_items/1785824659_6a718593cd684.jpg', 0, '2026-08-04 06:24:19', '2026-08-04 06:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', '{\"our_story\":{\"badge_text\":\"About Our Story\",\"title\":\"Catering Service\",\"sub_title\":\"Commitment to turning your special moments into delicious, unforgettable memories.\"},\"services\":{\"badge_text\":\"Our Culinary Services\",\"title\":\"Tailored Catering Solutions\",\"sub_title\":null},\"why_us\":{\"badge_text\":\"Trusted Choice\",\"title\":\"Why Choose Us?\",\"sub_title\":\"At Catering Service, we go beyond serving food \\u2014 we deliver excellence, reliability, and unforgettable experiences.\",\"description\":\"<h5 class=\\\"fw-bold font-rajdhani text-theme-primary mb-1\\\" style=\\\"font-family: Rajdhani, sans-serif; border-radius: 0px !important; color: rgb(220, 53, 69) !important;\\\">Strict Hygiene Standard<\\/h5><p class=\\\"text-muted fs-7 mb-3\\\" style=\\\"font-family: Poppins, sans-serif; font-size: 16px; border-radius: 0px !important; color: rgba(33, 37, 41, 0.75) !important;\\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.<\\/p><p class=\\\"text-muted fs-7 mb-0\\\" style=\\\"font-family: Poppins, sans-serif; font-size: 16px; border-radius: 0px !important; color: rgba(33, 37, 41, 0.75) !important;\\\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset\'s Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.<\\/p>\",\"image\":\"uploads\\/pages\\/images-6_6a69c96053e76.jpg\"},\"ceo\":{\"badge_text\":\"Leadership Message\",\"title\":\"Message From The Chairman & CEO\",\"quote\":\"\\\"\\u09b8\\u0982\\u0997\\u09cd\\u09b0\\u09be\\u09ae \\u09a5\\u09c7\\u0995\\u09c7\\u0987 \\u09b8\\u09cd\\u09ac\\u09aa\\u09cd\\u09a8\\u09c7\\u09b0 \\u09b6\\u09c1\\u09b0\\u09c1\\u0964 \\u09ac\\u09bf\\u09b6\\u09cd\\u09ac\\u09be\\u09b8 \\u09a5\\u09c7\\u0995\\u09c7\\u0987 \\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u09b7\\u09cd\\u09a0\\u09be\\u09b0 \\u0997\\u09b2\\u09cd\\u09aa\\u0964\\\"\",\"description\":\"<p><span style=\\\"font-size: 13.008px;\\\">\\u0986\\u09ae\\u09bf \\u0995\\u09cd\\u09af\\u09be\\u099f\\u09b0\\u09bf\\u09a8, \\u09aa\\u09cd\\u09b0\\u09a4\\u09bf\\u09b7\\u09cd\\u09a0\\u09be\\u09a4\\u09be \\u0993 \\u099a\\u09c7\\u09df\\u09be\\u09b0\\u09ae\\u09cd\\u09af\\u09be\\u09a8, Catering Service\\u0964 \\u0986\\u099c \\u09a5\\u09c7\\u0995\\u09c7 \\u09aa\\u09cd\\u09b0\\u09be\\u09df \\u09e9\\u09ea \\u09ac\\u099b\\u09b0 \\u0986\\u0997\\u09c7 \\u09a0\\u09be\\u0995\\u09c1\\u09b0\\u0997\\u09be\\u0981\\u0993 \\u099c\\u09c7\\u09b2\\u09be \\u09a5\\u09c7\\u0995\\u09c7 \\u0989\\u099a\\u09cd\\u099a\\u09b6\\u09bf\\u0995\\u09cd\\u09b7\\u09be\\u09b0 \\u0989\\u09a6\\u09cd\\u09a6\\u09c7\\u09b6\\u09cd\\u09af\\u09c7 \\u09a2\\u09be\\u0995\\u09be\\u09df \\u098f\\u09b8\\u09c7\\u099b\\u09bf\\u09b2\\u09be\\u09ae\\u0964 \\u0986\\u09b2\\u09cd\\u09b2\\u09be\\u09b9 \\u09a4\\u09be\\u09b2\\u09be\\u09b0 \\u0985\\u09b6\\u09c7\\u09b7 \\u09b0\\u09b9\\u09ae\\u09a4, \\u0997\\u09cd\\u09b0\\u09be\\u09b9\\u0995\\u09a6\\u09c7\\u09b0 \\u09ad\\u09be\\u09b2\\u09cb\\u09ac\\u09be\\u09b8\\u09be \\u0993 \\u099f\\u09bf\\u09ae\\u09c7\\u09b0 \\u0995\\u09a0\\u09cb\\u09b0 \\u09aa\\u09b0\\u09bf\\u09b6\\u09cd\\u09b0\\u09ae\\u09c7 \\u0986\\u09ae\\u09b0\\u09be \\u0986\\u099c\\u0995\\u09c7\\u09b0 \\u098f\\u0987 \\u0985\\u09ac\\u09b8\\u09cd\\u09a5\\u09be\\u09a8\\u09c7\\u09b0 \\u09aa\\u09c7\\u09d7\\u0981\\u099b\\u09c7\\u099b\\u09bf\\u0964<\\/span><\\/p>\",\"name\":\"\\u2014  Pro Devs Ltd\",\"designation\":\"\\u099a\\u09c7\\u09df\\u09be\\u09b0\\u09ae\\u09cd\\u09af\\u09be\\u09a8 \\u0993 \\u09ac\\u09cd\\u09af\\u09ac\\u09b8\\u09cd\\u09a5\\u09be\\u09aa\\u09a8\\u09be \\u09aa\\u09b0\\u09bf\\u099a\\u09be\\u09b2\\u0995, Catering Service\",\"image\":\"uploads\\/pages\\/a75aa9f67d43cf2adfec10f74a30b93b_6a69c87cca770.jpg\"},\"enlisted\":{\"badge_text\":\"Our Presence\",\"title\":\"Enlisted Convention Venues\",\"sub_title\":null},\"gallery\":{\"badge_text\":\"Visual Experience\",\"title\":\"Event Photo\",\"sub_title\":\"Explore authentic high-resolution glimpses of our catering setups, grand presentation, and dishes.\"},\"testimonial\":{\"badge_text\":\"Testimonials\",\"title\":\"What Our Clients Say\",\"sub_title\":\"We believe that great food creates lasting memories. The trust and appreciation of our clients motivate us to deliver exceptional catering services every time.\"},\"reserve\":{\"badge_text\":\"Book Now\",\"title\":\"Reserve Your Event Catering\",\"sub_title\":\"Contact our team now to reserve your catering service. We ensure quality food, timely delivery, and professional execution for every event.\"},\"packages\":{\"badge_text\":\"Our Packages\",\"title\":\"Packages With Image\",\"sub_title\":null}}', '2026-07-29 08:07:35', '2026-08-04 08:16:57'),
(2, 'about', 'about', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 'teams', 'teams', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(4, 'contact', 'contact', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(5, 'services', 'services', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(6, 'enlistments', 'enlistments', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(7, 'blogs', 'blogs', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(8, 'menus', 'menus', '\"This is the home page content.\"', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(9, 'packages', 'packages', '\"This is the home page content.\"', '2026-08-04 08:36:24', '2026-08-04 08:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view sliders', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 'create sliders', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 'edit sliders', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(4, 'delete sliders', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(5, 'view categories', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(6, 'create categories', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(7, 'edit categories', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(8, 'delete categories', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(13, 'view tags', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(14, 'create tags', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(15, 'edit tags', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(16, 'delete tags', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(17, 'view services', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(18, 'create services', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(19, 'edit services', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(20, 'delete services', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(21, 'view enlistments', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(22, 'create enlistments', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(23, 'edit enlistments', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(24, 'delete enlistments', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(25, 'view testimonials', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(26, 'create testimonials', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(27, 'edit testimonials', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(28, 'delete testimonials', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(29, 'view achievements', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(30, 'create achievements', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(31, 'edit achievements', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(32, 'delete achievements', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(33, 'view galleries', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(34, 'create galleries', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(35, 'edit galleries', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(36, 'delete galleries', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(37, 'view teams', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(38, 'create teams', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(39, 'edit teams', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(40, 'delete teams', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(41, 'view clients', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(42, 'create clients', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(43, 'edit clients', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(44, 'delete clients', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(45, 'view blogs', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(46, 'create blogs', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(47, 'edit blogs', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(48, 'delete blogs', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(49, 'view sites', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(50, 'create sites', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(51, 'edit sites', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(52, 'delete sites', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(53, 'view users', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(54, 'create users', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(55, 'edit users', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(56, 'delete users', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(57, 'view roles', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(58, 'create roles', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(59, 'edit roles', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(60, 'delete roles', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(61, 'view settings', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(62, 'create settings', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(63, 'edit settings', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(64, 'delete settings', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(65, 'view dashboard', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(66, 'view story', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(67, 'view missions', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(68, 'view contact', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(69, 'view bookings', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(70, 'view seo', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(71, 'view page content', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(73, 'view menu-packages', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(74, 'create menu-packages', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(75, 'edit menu-packages', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(76, 'delete menu-packages', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(77, 'view menu-categories', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(78, 'create menu-categories', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(79, 'edit menu-categories', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(80, 'delete menu-categories', 'web', '2026-07-29 09:01:21', '2026-07-29 09:01:21'),
(81, 'view packages', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(82, 'create packages', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(83, 'edit packages', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(84, 'delete packages', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(85, 'view package-items', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(86, 'create package-items', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(87, 'edit package-items', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15'),
(88, 'delete package-items', 'web', '2026-08-04 05:36:15', '2026-08-04 05:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 'admin', 'web', '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 'manager', 'web', '2026-07-29 08:07:35', '2026-07-29 09:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(23, 3),
(24, 1),
(24, 2),
(24, 3),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 2),
(26, 3),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(30, 3),
(31, 1),
(31, 2),
(31, 3),
(32, 1),
(32, 2),
(32, 3),
(33, 1),
(33, 2),
(33, 3),
(34, 1),
(34, 2),
(34, 3),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 2),
(38, 3),
(39, 1),
(39, 2),
(39, 3),
(40, 1),
(40, 2),
(40, 3),
(41, 1),
(41, 2),
(41, 3),
(42, 1),
(42, 2),
(42, 3),
(43, 1),
(43, 2),
(43, 3),
(44, 1),
(44, 2),
(44, 3),
(45, 1),
(45, 2),
(45, 3),
(46, 1),
(46, 2),
(46, 3),
(47, 1),
(47, 2),
(47, 3),
(48, 1),
(48, 2),
(48, 3),
(49, 1),
(49, 2),
(49, 3),
(50, 1),
(50, 2),
(50, 3),
(51, 1),
(51, 2),
(51, 3),
(52, 1),
(52, 2),
(52, 3),
(53, 1),
(53, 2),
(53, 3),
(54, 1),
(54, 2),
(54, 3),
(55, 1),
(55, 2),
(55, 3),
(56, 1),
(56, 2),
(56, 3),
(57, 1),
(57, 2),
(57, 3),
(58, 1),
(58, 2),
(58, 3),
(59, 1),
(59, 2),
(59, 3),
(60, 1),
(60, 2),
(60, 3),
(61, 1),
(61, 2),
(61, 3),
(62, 1),
(62, 2),
(62, 3),
(63, 1),
(63, 2),
(63, 3),
(64, 1),
(64, 2),
(64, 3),
(65, 1),
(65, 2),
(65, 3),
(66, 1),
(66, 2),
(66, 3),
(67, 1),
(67, 2),
(67, 3),
(68, 1),
(68, 2),
(68, 3),
(69, 1),
(69, 2),
(69, 3),
(70, 1),
(70, 2),
(70, 3),
(71, 1),
(71, 2),
(71, 3),
(73, 1),
(73, 2),
(73, 3),
(74, 1),
(74, 2),
(74, 3),
(75, 1),
(75, 2),
(75, 3),
(76, 1),
(76, 2),
(76, 3),
(77, 1),
(77, 2),
(77, 3),
(78, 1),
(78, 2),
(78, 3),
(79, 1),
(79, 2),
(79, 3),
(80, 1),
(80, 2),
(80, 3),
(81, 1),
(81, 2),
(81, 3),
(82, 1),
(82, 2),
(82, 3),
(83, 1),
(83, 2),
(83, 3),
(84, 1),
(84, 2),
(84, 3),
(85, 1),
(85, 2),
(85, 3),
(86, 1),
(86, 2),
(86, 3),
(87, 1),
(87, 2),
(87, 3),
(88, 1),
(88, 2),
(88, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT NULL,
  `robots` varchar(255) NOT NULL DEFAULT 'index, follow',
  `seoable_type` varchar(255) NOT NULL,
  `seoable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_title`, `og_description`, `og_image`, `twitter_card`, `robots`, `seoable_type`, `seoable_id`, `created_at`, `updated_at`) VALUES
(1, 'home - Pyramid Catering BD', 'Description for home', 'home, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 1, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 'about - Pyramid Catering BD', 'Description for about', 'about, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 2, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 'teams - Pyramid Catering BD', 'Description for teams', 'teams, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 3, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(4, 'contact - Pyramid Catering BD', 'Description for contact', 'contact, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 4, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(5, 'services - Pyramid Catering BD', 'Description for services', 'services, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 5, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(6, 'enlistments - Pyramid Catering BD', 'Description for enlistments', 'enlistments, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 6, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(7, 'blogs - Pyramid Catering BD', 'Description for blogs', 'blogs, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 7, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(8, 'menus - Pyramid Catering BD', 'Description for menus', 'menus, keyword1, keyword2', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Page', 8, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 1, '2026-07-29 08:48:40', '2026-08-04 07:38:10'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 2, '2026-07-29 08:49:52', '2026-08-04 07:37:53'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 3, '2026-07-29 08:51:45', '2026-08-04 07:37:58'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 4, '2026-07-29 08:52:06', '2026-08-04 07:38:05'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Enlistment', 1, '2026-07-29 09:19:58', '2026-07-29 09:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_menu` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `icon`, `sort_order`, `status`, `is_menu`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Celebrations', 'wedding-celebrations', '<p><span style=\"font-size: 13.008px;\">Your wedding is one of the most important days of your life, and we make it truly unforgettable. We offer complete wedding catering solutions including traditional and modern menu options, live cooking stations, dessert corners, and full-service arrangements. Our team ensures timely delivery, hygiene, and flawless execution so you can enjoy your special day without worry.</span></p>', NULL, 0, 0, 1, '2026-07-29 08:48:40', '2026-08-04 07:38:10'),
(2, 'Birthday Party', 'birthday-party', '<p><span style=\"font-size: 13.008px;\">Make birthdays extra special with customized catering services. Whether it’s a kids’ birthday or a milestone celebration, we provide themed food setups, snacks, cakes, beverages, and full-course meals tailored to your preferences. Fresh ingredients and attractive presentation make every party joyful and memorable.</span></p>', NULL, 0, 0, 1, '2026-07-29 08:49:52', '2026-08-04 07:37:53'),
(3, 'Corporate Events', 'corporate-events', '<p><span style=\"font-size: 13.008px;\">Professional catering for professional gatherings. We serve high-quality meals and refreshments for seminars, conferences, office meetings, product launches, and annual events. Our organized service, punctual delivery, and premium presentation help you impress clients and colleagues.</span></p>', NULL, 0, 0, 1, '2026-07-29 08:51:45', '2026-08-04 07:37:58'),
(4, 'Iftar Party Catering', 'iftar-party-catering', '<p><span style=\"font-size: 13.008px;\">Celebrate Ramadan with carefully prepared Iftar menus. From traditional snacks like jilapi, haleem, chotpoti, and dates to complete dinner arrangements, we ensure timely service before Maghrib. Hygienic preparation and balanced menus make your Iftar gatherings smooth and satisfying.</span></p>', NULL, 0, 0, 1, '2026-07-29 08:52:06', '2026-08-04 07:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaTV1RHk1N3BKSGxxUm5yWXdEbkprRTc3MVo2Rm9hVmNRQnpDSU1KZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvZXZlbnQtbWFuYWdlbWVudC9wdWJsaWMvcm9sZXMiO3M6NToicm91dGUiO3M6MTE6InJvbGVzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1785831605);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `alert_email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map_url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `copyright_text` text DEFAULT NULL,
  `noties` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `logo`, `favicon`, `phone`, `phone2`, `email`, `email2`, `alert_email`, `address`, `map_url`, `description`, `copyright_text`, `noties`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Pro Devs Ltd.', 'uploads/setting/1785319217_logo_green.png', 'uploads/setting/1785318981_Favicon-01.png', '01577298633', '01909302126', 'info@prodevsltd.com', 'info@prodevsltd.com', NULL, 'Mirpur 10, Dhaka, Bangladesh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15742.533782003527!2d90.3645132000699!3d23.80285485672554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d33532b3fb%3A0x2b27b0c01cb2bc0d!2sMirpur-10%2C%20Dhaka!5e1!3m2!1sen!2sbd!4v1775049339603!5m2!1sen!2sbd', 'At Pro Devs Ltd, we deliver smart ERP solutions, high-performing eCommerce websites, and custom software designed to accelerate your business growth in the digital world.', '<p>Copyright © 2026 <a href=\"https://prodevsltd.com\" class=\"text-white\">prodevsltd.com</a> All right', '12-Hour Fast Catering', 'https://www.facebook.com/', NULL, NULL, NULL, 'https://www.youtube.com/', NULL, '2026-07-29 08:07:35', '2026-07-29 10:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_up` tinyint(1) NOT NULL DEFAULT 1,
  `last_down_at` timestamp NULL DEFAULT NULL,
  `response_time_ms` int(11) DEFAULT NULL,
  `last_checked_at` timestamp NULL DEFAULT NULL,
  `alert_email` varchar(255) DEFAULT NULL,
  `is_down_notified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link_text` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `description`, `link_text`, `link_url`, `image`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Making Weddings Deliciously Memorable', 'Capable of Serving Thousands with Excellence', 'Urgent event? Our experienced team prepares and delivers fresh, hygienic food within just 12 hours.', 'Book Your Event', '/contact-us', 'uploads/sliders/cib-excellence-2022-007-scaled_6a69bcce0885c.jpg', 1, 0, '2026-07-29 08:41:50', '2026-07-29 08:41:50'),
(2, 'Exceptional Catering for Every Occasion', 'Quick Response Catering', 'From Shahi Kacchi to Royal Desserts, our catering service ensures taste, presentation, and perfection for your special day.', 'Book Your Event', '/contact-us', 'uploads/sliders/images-3_6a69bd1d01653.jpg', 1, 1, '2026-07-29 08:43:09', '2026-07-29 08:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `badge_text` varchar(255) DEFAULT NULL,
  `experience_years` varchar(255) DEFAULT NULL,
  `experience_title` varchar(255) DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery_images`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `content`, `image`, `badge_text`, `experience_years`, `experience_title`, `features`, `gallery_images`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '<h2><span style=\"font-family: Raleway, sans-serif; font-size: 14px; text-transform: capitalize;\">“our team can prepare and deliver food within just&nbsp;&nbsp;</span><span style=\"font-family: Raleway, sans-serif; text-transform: capitalize; color: rgb(0, 128, 0); font-size: 24px;\"><span style=\"font-weight: bolder;\">12</span> </span><span style=\"font-family: Raleway, sans-serif; font-size: 14px; text-transform: capitalize;\">hours, ensuring urgent events are handled efficiently without compromising quality.”</span></h2>', 'uploads/story/a75aa9f67d43cf2adfec10f74a30b93b_6a69bd71066f1.jpg', NULL, '30+', 'Years Heritage', '[{\"icon\":\"fas fa-check-circle\",\"title\":\"Large-Scale Capacity\",\"subtitle\":\"Up to 30K guests at single event\"},{\"icon\":\"fas fa-bolt\",\"title\":\"12-Hour Urgent Prep\",\"subtitle\":\"Emergency catering execution\"}]', '[\"uploads\\/story\\/gallery\\/images-6_6a69bd7106b73.jpg\",\"uploads\\/story\\/gallery\\/images-5_6a69bd710704e.jpg\",\"uploads\\/story\\/gallery\\/images-4_6a69bd710726f.jpg\"]', 1, '2026-07-29 08:44:09', '2026-07-29 08:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `api_token` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `photo_path`, `api_token`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super@gmail.com', NULL, NULL, '$2y$12$gMwNTWn68BhRYHVhEdse9OnjpWE8lNp9i43aCPq2cx9tMPe0FDQn6', NULL, NULL, 1, NULL, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(2, 'Admin User', 'admin@gmail.com', NULL, NULL, '$2y$12$VcJUzCxhgsY9tkA/yn76yOkWztSqBFvFqfJmbv0/J9h.HbOcWHvXK', NULL, NULL, 1, NULL, '2026-07-29 08:07:35', '2026-07-29 08:07:35'),
(3, 'managerUser', 'manager@gmail.com', NULL, NULL, '$2y$12$VcJVojqbWJh.umxwYjX8GORy7lWpjOEB.Ugm0Ye2ZXNURlR6iPHdm', NULL, NULL, 1, NULL, '2026-07-29 08:07:35', '2026-07-29 09:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_records`
--

CREATE TABLE `visitor_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `visit_type` varchar(255) NOT NULL DEFAULT 'page',
  `referrer_url` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_records`
--

INSERT INTO `visitor_records` (`id`, `ip_address`, `user_agent`, `device_type`, `browser`, `platform`, `page_url`, `visit_type`, `referrer_url`, `country`, `city`, `latitude`, `longitude`, `session_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'kmSk3IAr4sltd4rXcdn3pcUpy457G5O6KDnQ4Xtl', NULL, '2026-07-29 08:07:42', '2026-07-29 08:07:42'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'kmSk3IAr4sltd4rXcdn3pcUpy457G5O6KDnQ4Xtl', NULL, '2026-07-29 08:09:10', '2026-07-29 08:09:10'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/login', 'Localhost', 'Localhost', NULL, NULL, 'kmSk3IAr4sltd4rXcdn3pcUpy457G5O6KDnQ4Xtl', NULL, '2026-07-29 08:11:46', '2026-07-29 08:11:46'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:11:50', '2026-07-29 08:11:50'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:11:51', '2026-07-29 08:11:51'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:12:58', '2026-07-29 08:12:58'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:13:04', '2026-07-29 08:13:04'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:13:20', '2026-07-29 08:13:20'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:13:21', '2026-07-29 08:13:21'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:13:39', '2026-07-29 08:13:39'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:14:02', '2026-07-29 08:14:02'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:14:03', '2026-07-29 08:14:03'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:15:05', '2026-07-29 08:15:05'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:15:21', '2026-07-29 08:15:21'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:16:47', '2026-07-29 08:16:47'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:16:48', '2026-07-29 08:16:48'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:17:07', '2026-07-29 08:17:07'),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:17:16', '2026-07-29 08:17:16'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:17:40', '2026-07-29 08:17:40'),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments/create', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:17:42', '2026-07-29 08:17:42'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:18:03', '2026-07-29 08:18:03'),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:18:55', '2026-07-29 08:18:55'),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:22:21', '2026-07-29 08:22:21'),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:22:25', '2026-07-29 08:22:25'),
(25, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:25:35', '2026-07-29 08:25:35'),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:27:31', '2026-07-29 08:27:31'),
(27, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:29:51', '2026-07-29 08:29:51'),
(28, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:30:18', '2026-07-29 08:30:18'),
(29, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:30:43', '2026-07-29 08:30:43'),
(30, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:32:11', '2026-07-29 08:32:11'),
(31, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:32:23', '2026-07-29 08:32:23'),
(32, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:33:43', '2026-07-29 08:33:43'),
(33, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:33:47', '2026-07-29 08:33:47'),
(34, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:33:57', '2026-07-29 08:33:57'),
(35, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:34:36', '2026-07-29 08:34:36'),
(36, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:34:40', '2026-07-29 08:34:40'),
(37, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:34:55', '2026-07-29 08:34:55'),
(38, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:35:22', '2026-07-29 08:35:22'),
(39, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:36:25', '2026-07-29 08:36:25'),
(40, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:36:53', '2026-07-29 08:36:53'),
(41, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:37:21', '2026-07-29 08:37:21'),
(42, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:38:15', '2026-07-29 08:38:15'),
(43, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:38:17', '2026-07-29 08:38:17'),
(44, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:41:50', '2026-07-29 08:41:50'),
(45, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:43:09', '2026-07-29 08:43:09'),
(46, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:43:11', '2026-07-29 08:43:11'),
(47, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:43:14', '2026-07-29 08:43:14'),
(48, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/sliders', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:44:08', '2026-07-29 08:44:08'),
(49, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/story', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:44:09', '2026-07-29 08:44:09'),
(50, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/story', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:44:33', '2026-07-29 08:44:33'),
(51, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:44:36', '2026-07-29 08:44:36'),
(52, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/story', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:45:33', '2026-07-29 08:45:33'),
(53, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:45:34', '2026-07-29 08:45:34'),
(54, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/story', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:46:06', '2026-07-29 08:46:06'),
(55, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:46:08', '2026-07-29 08:46:08'),
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:46:18', '2026-07-29 08:46:18'),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:46:19', '2026-07-29 08:46:19'),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/create', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:46:52', '2026-07-29 08:46:52'),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:48:41', '2026-07-29 08:48:41'),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:49:08', '2026-07-29 08:49:08'),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/create', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:49:18', '2026-07-29 08:49:18'),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:49:53', '2026-07-29 08:49:53'),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/2/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:50:42', '2026-07-29 08:50:42'),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:50:52', '2026-07-29 08:50:52'),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/1/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:50:54', '2026-07-29 08:50:54'),
(66, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:51:00', '2026-07-29 08:51:00'),
(67, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/create', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:51:17', '2026-07-29 08:51:17'),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:51:46', '2026-07-29 08:51:46'),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/create', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:51:49', '2026-07-29 08:51:49'),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:52:07', '2026-07-29 08:52:07'),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services/4/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:52:11', '2026-07-29 08:52:11'),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:52:20', '2026-07-29 08:52:20'),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:52:32', '2026-07-29 08:52:32'),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:52:38', '2026-07-29 08:52:38'),
(75, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:53:25', '2026-07-29 08:53:25'),
(76, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:53:34', '2026-07-29 08:53:34'),
(77, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:53:45', '2026-07-29 08:53:45'),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:53:53', '2026-07-29 08:53:53'),
(79, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:54:13', '2026-07-29 08:54:13'),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:54:30', '2026-07-29 08:54:30'),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:54:37', '2026-07-29 08:54:37'),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:54:39', '2026-07-29 08:54:39'),
(83, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:57:14', '2026-07-29 08:57:14'),
(84, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:57:52', '2026-07-29 08:57:52'),
(85, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/galleries', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:58:06', '2026-07-29 08:58:06'),
(86, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:58:13', '2026-07-29 08:58:13'),
(87, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 08:58:14', '2026-07-29 08:58:14'),
(88, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:00:23', '2026-07-29 09:00:23'),
(89, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:24', '2026-07-29 09:01:24'),
(90, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:25', '2026-07-29 09:01:25'),
(91, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/2/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:28', '2026-07-29 09:01:28'),
(92, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:31', '2026-07-29 09:01:31'),
(93, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/1/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:33', '2026-07-29 09:01:33'),
(94, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:41', '2026-07-29 09:01:41'),
(95, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/2/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:43', '2026-07-29 09:01:43'),
(96, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:47', '2026-07-29 09:01:47'),
(97, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:50', '2026-07-29 09:01:50'),
(98, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:01:51', '2026-07-29 09:01:51'),
(99, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:02:23', '2026-07-29 09:02:23'),
(100, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:02:24', '2026-07-29 09:02:24'),
(101, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:02:26', '2026-07-29 09:02:26'),
(102, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:02:28', '2026-07-29 09:02:28'),
(103, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:02:29', '2026-07-29 09:02:29'),
(104, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:02:59', '2026-07-29 09:02:59'),
(105, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:03:55', '2026-07-29 09:03:55'),
(106, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages/4/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:04:31', '2026-07-29 09:04:31'),
(107, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages/3/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:04:44', '2026-07-29 09:04:44'),
(108, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:05:01', '2026-07-29 09:05:01'),
(109, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:05:30', '2026-07-29 09:05:30'),
(110, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menu-categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:13:57', '2026-07-29 09:13:57'),
(111, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:14:10', '2026-07-29 09:14:10'),
(112, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:15:09', '2026-07-29 09:15:09'),
(113, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:15:23', '2026-07-29 09:15:23'),
(114, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:15:44', '2026-07-29 09:15:44'),
(115, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:17:44', '2026-07-29 09:17:44'),
(116, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:17:50', '2026-07-29 09:17:50'),
(117, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:17:57', '2026-07-29 09:17:57'),
(118, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:08', '2026-07-29 09:18:08'),
(119, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:18', '2026-07-29 09:18:18'),
(120, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:37', '2026-07-29 09:18:37'),
(121, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:42', '2026-07-29 09:18:42'),
(122, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:47', '2026-07-29 09:18:47'),
(123, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:51', '2026-07-29 09:18:51'),
(124, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:55', '2026-07-29 09:18:55'),
(125, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:18:59', '2026-07-29 09:18:59');
INSERT INTO `visitor_records` (`id`, `ip_address`, `user_agent`, `device_type`, `browser`, `platform`, `page_url`, `visit_type`, `referrer_url`, `country`, `city`, `latitude`, `longitude`, `session_id`, `user_id`, `created_at`, `updated_at`) VALUES
(126, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/categories', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:19:03', '2026-07-29 09:19:03'),
(127, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:19:05', '2026-07-29 09:19:05'),
(128, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments/create', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:19:08', '2026-07-29 09:19:08'),
(129, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:19:59', '2026-07-29 09:19:59'),
(130, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:20:07', '2026-07-29 09:20:07'),
(131, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/blogs', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:21:16', '2026-07-29 09:21:16'),
(132, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/tags', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:21:18', '2026-07-29 09:21:18'),
(133, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/users', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:21:22', '2026-07-29 09:21:22'),
(134, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/users', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:22:21', '2026-07-29 09:22:21'),
(135, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:22:28', '2026-07-29 09:22:28'),
(136, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/1/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:22:33', '2026-07-29 09:22:33'),
(137, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/users', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:22:38', '2026-07-29 09:22:38'),
(138, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/users', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:23:09', '2026-07-29 09:23:09'),
(139, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:23:13', '2026-07-29 09:23:13'),
(140, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/3/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:23:15', '2026-07-29 09:23:15'),
(141, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:23:21', '2026-07-29 09:23:21'),
(142, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/3/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:23:24', '2026-07-29 09:23:24'),
(143, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/3/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:24:43', '2026-07-29 09:24:43'),
(144, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/3/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:24:59', '2026-07-29 09:24:59'),
(145, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:25:22', '2026-07-29 09:25:22'),
(146, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles/3/edit', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:25:24', '2026-07-29 09:25:24'),
(147, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/seo-pages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:25:26', '2026-07-29 09:25:26'),
(148, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/roles', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:25:27', '2026-07-29 09:25:27'),
(149, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:25:28', '2026-07-29 09:25:28'),
(150, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/achievements', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:25:57', '2026-07-29 09:25:57'),
(151, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/achievements', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:27:03', '2026-07-29 09:27:03'),
(152, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/achievements', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:27:24', '2026-07-29 09:27:24'),
(153, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/achievements', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:27:44', '2026-07-29 09:27:44'),
(154, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/achievements', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:28:09', '2026-07-29 09:28:09'),
(155, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:28:12', '2026-07-29 09:28:12'),
(156, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:29:00', '2026-07-29 09:29:00'),
(157, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:29:31', '2026-07-29 09:29:31'),
(158, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:31:41', '2026-07-29 09:31:41'),
(159, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:31:56', '2026-07-29 09:31:56'),
(160, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:35:28', '2026-07-29 09:35:28'),
(161, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:35:32', '2026-07-29 09:35:32'),
(162, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:37:43', '2026-07-29 09:37:43'),
(163, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/pages-content', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:38:50', '2026-07-29 09:38:50'),
(164, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/settings', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:40:59', '2026-07-29 09:40:59'),
(165, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/settings', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:42:08', '2026-07-29 09:42:08'),
(166, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/settings', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:43:00', '2026-07-29 09:43:00'),
(167, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:43:05', '2026-07-29 09:43:05'),
(168, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:44:18', '2026-07-29 09:44:18'),
(169, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:56:24', '2026-07-29 09:56:24'),
(170, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 09:59:54', '2026-07-29 09:59:54'),
(171, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:00:19', '2026-07-29 10:00:19'),
(172, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:01:05', '2026-07-29 10:01:05'),
(173, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:03:01', '2026-07-29 10:03:01'),
(174, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:03:05', '2026-07-29 10:03:05'),
(175, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:03:21', '2026-07-29 10:03:21'),
(176, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:04:34', '2026-07-29 10:04:34'),
(177, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:05:33', '2026-07-29 10:05:33'),
(178, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:05:38', '2026-07-29 10:05:38'),
(179, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:05:41', '2026-07-29 10:05:41'),
(180, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:05:43', '2026-07-29 10:05:43'),
(181, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-list', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:06:41', '2026-07-29 10:06:41'),
(182, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-list', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:08:41', '2026-07-29 10:08:41'),
(183, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:09:22', '2026-07-29 10:09:22'),
(184, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:11:22', '2026-07-29 10:11:22'),
(185, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/services-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:12:00', '2026-07-29 10:12:00'),
(186, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:12:45', '2026-07-29 10:12:45'),
(187, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:13:31', '2026-07-29 10:13:31'),
(188, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:15:30', '2026-07-29 10:15:30'),
(189, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:16:42', '2026-07-29 10:16:42'),
(190, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:18:22', '2026-07-29 10:18:22'),
(191, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:18:36', '2026-07-29 10:18:36'),
(192, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/enlistments-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:19:05', '2026-07-29 10:19:05'),
(193, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:19:11', '2026-07-29 10:19:11'),
(194, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:19:22', '2026-07-29 10:19:22'),
(195, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:20:04', '2026-07-29 10:20:04'),
(196, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:20:51', '2026-07-29 10:20:51'),
(197, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:21:11', '2026-07-29 10:21:11'),
(198, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:22:10', '2026-07-29 10:22:10'),
(199, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:22:36', '2026-07-29 10:22:36'),
(200, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:23:33', '2026-07-29 10:23:33'),
(201, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:24:56', '2026-07-29 10:24:56'),
(202, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:25:24', '2026-07-29 10:25:24'),
(203, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:25:35', '2026-07-29 10:25:35'),
(204, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-list', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:25:45', '2026-07-29 10:25:45'),
(205, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/enlistments-list', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:00', '2026-07-29 10:26:00'),
(206, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:01', '2026-07-29 10:26:01'),
(207, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:02', '2026-07-29 10:26:02'),
(208, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:06', '2026-07-29 10:26:06'),
(209, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/contact-us', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:10', '2026-07-29 10:26:10'),
(210, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/enlistments-details/sena-prangon-convention', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:27', '2026-07-29 10:26:27'),
(211, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:26:56', '2026-07-29 10:26:56'),
(212, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:27:20', '2026-07-29 10:27:20'),
(213, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/contact-us', 'page', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:27:35', '2026-07-29 10:27:35'),
(214, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/contact-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:27:49', '2026-07-29 10:27:49'),
(215, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/contact-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:31:02', '2026-07-29 10:31:02'),
(216, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/contact-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:47:57', '2026-07-29 10:47:57'),
(217, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:48:51', '2026-07-29 10:48:51'),
(218, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:48:52', '2026-07-29 10:48:52'),
(219, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:48:53', '2026-07-29 10:48:53'),
(220, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:51:02', '2026-07-29 10:51:02'),
(221, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'cFET5AC1VvASiNzB6s08S58voeXwNTdcPMV8SIMr', 2, '2026-07-29 10:51:04', '2026-07-29 10:51:04'),
(222, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:21:39', '2026-08-03 06:21:39'),
(223, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:22:27', '2026-08-03 06:22:27'),
(224, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:23:06', '2026-08-03 06:23:06'),
(225, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:32:24', '2026-08-03 06:32:24'),
(226, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:33:58', '2026-08-03 06:33:58'),
(227, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:34:01', '2026-08-03 06:34:01'),
(228, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:34:57', '2026-08-03 06:34:57'),
(229, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'Mobile', 'Safari', 'Mac OS', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:35:55', '2026-08-03 06:35:55'),
(230, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:36:33', '2026-08-03 06:36:33'),
(231, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:36:35', '2026-08-03 06:36:35'),
(232, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:48:35', '2026-08-03 06:48:35'),
(233, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:50:33', '2026-08-03 06:50:33'),
(234, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:50:36', '2026-08-03 06:50:36'),
(235, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:53:04', '2026-08-03 06:53:04'),
(236, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:53:07', '2026-08-03 06:53:07'),
(237, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:53:11', '2026-08-03 06:53:11'),
(238, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:53:46', '2026-08-03 06:53:46'),
(239, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:54:06', '2026-08-03 06:54:06'),
(240, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:54:08', '2026-08-03 06:54:08'),
(241, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:54:32', '2026-08-03 06:54:32'),
(242, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:54:34', '2026-08-03 06:54:34'),
(243, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:55:01', '2026-08-03 06:55:01'),
(244, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:57:40', '2026-08-03 06:57:40'),
(245, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:57:41', '2026-08-03 06:57:41'),
(246, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:58:05', '2026-08-03 06:58:05');
INSERT INTO `visitor_records` (`id`, `ip_address`, `user_agent`, `device_type`, `browser`, `platform`, `page_url`, `visit_type`, `referrer_url`, `country`, `city`, `latitude`, `longitude`, `session_id`, `user_id`, `created_at`, `updated_at`) VALUES
(247, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:58:58', '2026-08-03 06:58:58'),
(248, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 06:58:59', '2026-08-03 06:58:59'),
(249, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:00:13', '2026-08-03 07:00:13'),
(250, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:00:26', '2026-08-03 07:00:26'),
(251, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:00:28', '2026-08-03 07:00:28'),
(252, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:02:16', '2026-08-03 07:02:16'),
(253, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:02:22', '2026-08-03 07:02:22'),
(254, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:02:29', '2026-08-03 07:02:29'),
(255, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:02:34', '2026-08-03 07:02:34'),
(256, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:02:45', '2026-08-03 07:02:45'),
(257, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:05:14', '2026-08-03 07:05:14'),
(258, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:05:15', '2026-08-03 07:05:15'),
(259, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:05:25', '2026-08-03 07:05:25'),
(260, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:06:01', '2026-08-03 07:06:01'),
(261, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:06:27', '2026-08-03 07:06:27'),
(262, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:06:37', '2026-08-03 07:06:37'),
(263, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:07:05', '2026-08-03 07:07:05'),
(264, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:07:35', '2026-08-03 07:07:35'),
(265, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:07:37', '2026-08-03 07:07:37'),
(266, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:07:38', '2026-08-03 07:07:38'),
(267, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:07:51', '2026-08-03 07:07:51'),
(268, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:08:19', '2026-08-03 07:08:19'),
(269, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:09:14', '2026-08-03 07:09:14'),
(270, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:09:28', '2026-08-03 07:09:28'),
(271, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:10:19', '2026-08-03 07:10:19'),
(272, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/gallery', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:10:25', '2026-08-03 07:10:25'),
(273, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:10:26', '2026-08-03 07:10:26'),
(274, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:10:34', '2026-08-03 07:10:34'),
(275, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:11:03', '2026-08-03 07:11:03'),
(276, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:11:23', '2026-08-03 07:11:23'),
(277, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'page', 'http://localhost/event-management/public/services-details/wedding-celebrations', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:11:26', '2026-08-03 07:11:26'),
(278, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:11:30', '2026-08-03 07:11:30'),
(279, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:12:46', '2026-08-03 07:12:46'),
(280, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'hXidpaZoPOjePfeGKaFPxrjmWqZWSGydexdZWWAb', NULL, '2026-08-03 07:13:26', '2026-08-03 07:13:26'),
(281, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'pTK0yYz0R7t3stjhLNNSY6AIojUtPWivYU1FSM79', NULL, '2026-08-04 04:56:12', '2026-08-04 04:56:12'),
(282, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'pTK0yYz0R7t3stjhLNNSY6AIojUtPWivYU1FSM79', NULL, '2026-08-04 05:37:09', '2026-08-04 05:37:09'),
(283, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 05:49:42', '2026-08-04 05:49:42'),
(284, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 05:49:42', '2026-08-04 05:49:42'),
(285, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:11:50', '2026-08-04 06:11:50'),
(286, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:12:02', '2026-08-04 06:12:02'),
(287, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:17:46', '2026-08-04 06:17:46'),
(288, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:17:48', '2026-08-04 06:17:48'),
(289, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', NULL, 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:18:33', '2026-08-04 06:18:33'),
(290, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:19:14', '2026-08-04 06:19:14'),
(291, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:20:49', '2026-08-04 06:20:49'),
(292, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:20:54', '2026-08-04 06:20:54'),
(293, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:21:27', '2026-08-04 06:21:27'),
(294, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:26:32', '2026-08-04 06:26:32'),
(295, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/about-us', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:26:33', '2026-08-04 06:26:33'),
(296, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/about-us', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:26:37', '2026-08-04 06:26:37'),
(297, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:26:40', '2026-08-04 06:26:40'),
(298, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus?category=royal-kacchi-packages', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:26:54', '2026-08-04 06:26:54'),
(299, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:37:18', '2026-08-04 06:37:18'),
(300, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:39:05', '2026-08-04 06:39:05'),
(301, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:39:09', '2026-08-04 06:39:09'),
(302, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/package-gallery/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:41:17', '2026-08-04 06:41:17'),
(303, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/package-gallery/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:46:42', '2026-08-04 06:46:42'),
(304, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/package-gallery/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:46:43', '2026-08-04 06:46:43'),
(305, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 06:46:47', '2026-08-04 06:46:47'),
(306, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/package-gallery/mini-portable-pocket-shaver', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:05:11', '2026-08-04 07:05:11'),
(307, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/package-gallery/mini-portable-pocket-shaver', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:05:31', '2026-08-04 07:05:31'),
(308, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:09:49', '2026-08-04 07:09:49'),
(309, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:12:32', '2026-08-04 07:12:32'),
(310, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:14:19', '2026-08-04 07:14:19'),
(311, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:14:47', '2026-08-04 07:14:47'),
(312, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:16:08', '2026-08-04 07:16:08'),
(313, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:16:11', '2026-08-04 07:16:11'),
(314, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:17:48', '2026-08-04 07:17:48'),
(315, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:17:58', '2026-08-04 07:17:58'),
(316, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:19:08', '2026-08-04 07:19:08'),
(317, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:20:11', '2026-08-04 07:20:11'),
(318, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:22:33', '2026-08-04 07:22:33'),
(319, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:25:41', '2026-08-04 07:25:41'),
(320, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:26:54', '2026-08-04 07:26:54'),
(321, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:27:20', '2026-08-04 07:27:20'),
(322, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:28:04', '2026-08-04 07:28:04'),
(323, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:30:20', '2026-08-04 07:30:20'),
(324, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:30:21', '2026-08-04 07:30:21'),
(325, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:30:30', '2026-08-04 07:30:30'),
(326, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:31:45', '2026-08-04 07:31:45'),
(327, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:32:01', '2026-08-04 07:32:01'),
(328, '::1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'Mobile', 'Chrome', 'Linux', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:33:50', '2026-08-04 07:33:50'),
(329, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:36:17', '2026-08-04 07:36:17'),
(330, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:38:15', '2026-08-04 07:38:15'),
(331, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:39:16', '2026-08-04 07:39:16'),
(332, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:39:39', '2026-08-04 07:39:39'),
(333, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/menus', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:48:00', '2026-08-04 07:48:00'),
(334, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 07:51:18', '2026-08-04 07:51:18'),
(335, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:01:40', '2026-08-04 08:01:40'),
(336, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:02:48', '2026-08-04 08:02:48'),
(337, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:02:57', '2026-08-04 08:02:57'),
(338, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:05:14', '2026-08-04 08:05:14'),
(339, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:06:29', '2026-08-04 08:06:29'),
(340, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:06:51', '2026-08-04 08:06:51'),
(341, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:07:31', '2026-08-04 08:07:31'),
(342, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:09:25', '2026-08-04 08:09:25'),
(343, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/packages-showcase', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:09:51', '2026-08-04 08:09:51'),
(344, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:09:54', '2026-08-04 08:09:54'),
(345, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public/packages-showcase', 'page', 'http://localhost/event-management/public/', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:09:58', '2026-08-04 08:09:58'),
(346, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:11:49', '2026-08-04 08:11:49'),
(347, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:13:50', '2026-08-04 08:13:50'),
(348, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:14:22', '2026-08-04 08:14:22'),
(349, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:17:02', '2026-08-04 08:17:02'),
(350, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:17:49', '2026-08-04 08:17:49'),
(351, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'Desktop', 'Chrome', 'Windows', 'http://localhost/event-management/public', 'page', 'http://localhost/event-management/public/packages-showcase/basic-package', 'Localhost', 'Localhost', NULL, NULL, 'NB7fMaIeNOFQePrxhgDXUmpI4JJKJf1ubDb1LX1I', 2, '2026-08-04 08:18:48', '2026-08-04 08:18:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_parent_type_parent_id_index` (`parent_type`,`parent_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_post_id_foreign` (`blog_post_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`),
  ADD KEY `blog_comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_category_id_foreign` (`category_id`),
  ADD KEY `blog_posts_author_id_index` (`author_id`),
  ADD KEY `blog_posts_title_index` (`title`);

--
-- Indexes for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_post_tags_blog_post_id_foreign` (`blog_post_id`),
  ADD KEY `blog_post_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enlistments`
--
ALTER TABLE `enlistments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enlistments_slug_unique` (`slug`),
  ADD KEY `enlistments_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_created_by_foreign` (`created_by`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_type_sort_order_index` (`type`,`sort_order`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_categories_slug_unique` (`slug`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_package_id_foreign` (`menu_package_id`);

--
-- Indexes for table `menu_packages`
--
ALTER TABLE `menu_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_packages_slug_unique` (`slug`),
  ADD KEY `menu_packages_menu_category_id_foreign` (`menu_category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_slug_unique` (`slug`);

--
-- Indexes for table `package_galleries`
--
ALTER TABLE `package_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_galleries_package_item_id_foreign` (`package_item_id`);

--
-- Indexes for table `package_items`
--
ALTER TABLE `package_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_items_slug_unique` (`slug`),
  ADD KEY `package_items_package_id_foreign` (`package_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seos_seoable_type_seoable_id_index` (`seoable_type`,`seoable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sites_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor_records`
--
ALTER TABLE `visitor_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_records_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enlistments`
--
ALTER TABLE `enlistments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `menu_packages`
--
ALTER TABLE `menu_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_galleries`
--
ALTER TABLE `package_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_items`
--
ALTER TABLE `package_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitor_records`
--
ALTER TABLE `visitor_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD CONSTRAINT `blog_post_tags_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `enlistments`
--
ALTER TABLE `enlistments`
  ADD CONSTRAINT `enlistments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_package_id_foreign` FOREIGN KEY (`menu_package_id`) REFERENCES `menu_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_packages`
--
ALTER TABLE `menu_packages`
  ADD CONSTRAINT `menu_packages_menu_category_id_foreign` FOREIGN KEY (`menu_category_id`) REFERENCES `menu_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_galleries`
--
ALTER TABLE `package_galleries`
  ADD CONSTRAINT `package_galleries_package_item_id_foreign` FOREIGN KEY (`package_item_id`) REFERENCES `package_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_items`
--
ALTER TABLE `package_items`
  ADD CONSTRAINT `package_items_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitor_records`
--
ALTER TABLE `visitor_records`
  ADD CONSTRAINT `visitor_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
