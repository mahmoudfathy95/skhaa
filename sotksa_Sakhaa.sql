-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2020 at 04:57 AM
-- Server version: 10.3.25-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sotksa_Sakhaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT '',
  `about_ar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT '',
  `about_main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `branch_id`, `about`, `about_ar`, `about_main_image`, `created_at`, `updated_at`) VALUES
(1, 5, 'about', 'من نحن', 'about/564059900.png', NULL, '2020-11-10 20:43:03'),
(2, 14, '', '', NULL, '2020-11-12 19:51:05', '2020-11-12 19:51:05'),
(3, 15, '', '', NULL, '2020-11-12 19:55:59', '2020-11-12 19:55:59'),
(4, 16, '', '', NULL, '2020-11-12 20:04:10', '2020-11-12 20:04:10'),
(5, 17, '', '', NULL, '2020-11-12 20:04:58', '2020-11-12 20:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_shipping` varchar(27) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vat` varchar(27) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `longtitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `city_id`, `street`, `street_description`, `branch_name`, `branch_name_ar`, `branch_email`, `branch_phone`, `free_shipping`, `vat`, `longtitude`, `lat`, `created_at`, `updated_at`) VALUES
(5, 4, 'الشارع', 'وصف الشارع', 'al hawmdya', 'الحوامدية', 'mohamedelhamooly@gmail.com', '01097131363', '40', '15', '39.1925', '21.4858', '2020-11-10 02:20:54', '2020-11-10 02:20:54'),
(6, 4, 'street', 'street description', 'فرع البديعة- طريق المدينة', 'فرع البديعة- طريق المدينة', 'badia_showroom@wataniaagri.com', '0102547893', '0', '15', '46.630348563194275', '24.592421907684074', NULL, NULL),
(7, 4, 'street', 'street description', 'فرع المحمدية- شارع التخصصي', 'فرع المحمدية- شارع التخصصي', 'mohammadia_showroom@wataniaagri.com', '0102547893', '0', '15', '46.653742598045454', '24.72420703453236', NULL, NULL),
(8, 4, 'street', 'street description', 'فرع العليا - شارع العروبة', 'فرع العليا - شارع العروبة', 'olaya_showroom@wataniaagri.com', '0102547893', '0', '15', '46.6790896654129', '24.715443306374016', NULL, NULL),
(9, 4, 'street', 'street description', 'الروضة 2 - عبدالرحمن الغافقي', 'الروضة 2 - عبدالرحمن الغافقي', 'rawda2_showroom111@wataniaagri.com', '0102547893', '0', '15', '46.766049357760735', '24.728407941843916', NULL, NULL),
(10, 4, 'street', 'street description', 'فرع الروضة1 - الحسن بن علي', 'فرع الروضة1 - الحسن بن علي', 'rawda1_showroom@wataniaagri.com', '0102547893', '0', '15', '46.753148316312924', '24.742454013422652', NULL, NULL),
(11, 4, 'street', 'street description', 'فرع الربوة -طريق عمر بن عبدالعزيز', 'فرع الربوة -طريق عمر بن عبدالعزيز', 'rabwa_showroom@wataniaagri.com', '0102547893', '0', '15', '46.77768554678995', '24.692718482738815', NULL, NULL),
(12, 4, 'street', 'street description', 'الروضة 2 - عبدالرحمن الغافقي', 'الروضة 2 - عبدالرحمن الغافقي', 'rawda2_showroom@wataniaagri.com', '0102547893', '0', '15', '46.750357300043106', '24.740795620720007', NULL, NULL),
(13, 4, 'street', 'street description', 'الياسمين - أبو بكر الصديق', 'الياسمين - أبو بكر الصديق', 'yasmin_showroom@wataniaagri.com', '0102547893', '0', '15', '46.64672936358452', '24.858302979160943', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_name_ar`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Khodar', 'خضار', 'categories/663968404.png', NULL, '2020-11-10 03:35:47'),
(2, 'Fawakh', 'فواكة', 'categories/1151407904.png', NULL, '2020-11-10 03:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_name_ar`, `shipping_amount`, `created_at`, `updated_at`) VALUES
(4, 'Gada', 'جدة', '0', '2020-11-10 02:12:53', '2020-11-10 02:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `firebase_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `image`, `email`, `phone`, `city_id`, `code`, `password`, `status`, `firebase_token`, `api_token`, `created_at`, `updated_at`) VALUES
(5, 'mahmoud', 'fathy', NULL, 'mahmoud@email.comw', '557149990', 4, NULL, NULL, 1, 'f9o8HaAmMIA:APA91bGbpk5jHTJ56FVv2qdH-_Lfb7nCDni9i-SkguO1KNwGZXW4QnVGYZJPzJly9reFpkYb9yJx_uaUGfepunvTrLWf67aMz7UBZy783Qw4wy1b-5GUJSaszdg8580kh9auf39fnV1_', '9b7cb513bbf053bda30459fa03d6419197284f7015ac3f68da1f69505953eb27', '2020-10-15 17:57:03', '2020-11-24 17:22:34'),
(6, NULL, NULL, NULL, NULL, '789422222', NULL, NULL, NULL, 1, '557149990', 'b8fcb77013198fb5dfc514411808e5d81aa1eeed33cf742efec4022793785b55', '2020-10-20 19:22:42', '2020-10-20 19:24:56'),
(7, NULL, NULL, NULL, NULL, '151515', NULL, NULL, NULL, 1, '557149990', 'fd278bc8bded19287807f405b5cb014b86e0b554068ef3c6c95f1ae625dc4288', '2020-10-20 19:30:07', '2020-10-20 19:30:28'),
(8, NULL, NULL, NULL, NULL, '58455212121', NULL, '3650', NULL, 1, NULL, '2af7dd4b9be2dce68c426627cab67b7c9ba43c8579acc548a28e16459dc92a72', '2020-11-04 10:24:56', '2020-11-04 10:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `client_addresses`
--

CREATE TABLE `client_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_addresses`
--

INSERT INTO `client_addresses` (`id`, `client_id`, `city_id`, `zone_id`, `type`, `street`, `description`, `long`, `lat`, `branch_id`, `created_at`, `updated_at`) VALUES
(8, 5, 4, NULL, 2, '6636 Thaghr Al Maha, Al Balad District, Jeddah 22238 3714, Saudi Arabia', 'test', '39.192290268838406', '21.48261402506042', 5, '2020-11-12 00:36:54', '2020-11-12 00:36:54'),
(9, 5, 4, NULL, 12, '3969، الاندلس، الرياض 13212 7161، السعودية', 'hjd', '46.79383926093578', '24.740576684113062', 9, '2020-11-25 14:21:56', '2020-11-25 14:21:56'),
(10, 5, 4, NULL, 1, 'testaddress2', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:44:45', '2020-11-25 14:44:45'),
(11, 5, 4, NULL, 1, 'testaddress3', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:46:33', '2020-11-25 14:46:33'),
(12, 5, 4, NULL, 1, 'testaddress3', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:47:35', '2020-11-25 14:47:35'),
(13, 5, 4, NULL, 1, 'testaddress4', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:48:03', '2020-11-25 14:48:03'),
(14, 5, 4, NULL, 1, 'testaddress4', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:48:34', '2020-11-25 14:48:34'),
(15, 5, 4, NULL, 1, 'testaddress4', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:49:25', '2020-11-25 14:49:25'),
(16, 5, 4, NULL, 1, 'testaddress4', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:50:12', '2020-11-25 14:50:12'),
(17, 5, 4, NULL, 1, 'testaddress5', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:50:29', '2020-11-25 14:50:29'),
(18, 5, 4, NULL, 1, 'testaddress6', 'descrpionhere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:50:34', '2020-11-25 14:50:34'),
(19, 5, 4, NULL, 1, 'testaddress6', 'descrpionhhughyugbere', '46.630348563194275', '24.592421907684074', 6, '2020-11-25 14:50:45', '2020-11-25 14:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `name`, `review`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'comment', 'name', 4, 6, '2020-11-10 19:16:05', '2020-11-10 19:16:05'),
(3, 'comment', 'name', 5, 6, '2020-11-12 00:32:35', '2020-11-12 00:32:35'),
(4, 'comment', 'name', 5, 18, '2020-11-16 22:07:52', '2020-11-16 22:07:52'),
(5, 'comment', 'name', 1, 18, '2020-11-22 13:19:34', '2020-11-22 13:19:34'),
(6, 'comment', 'name', 2, 20, '2020-11-24 07:01:43', '2020-11-24 07:01:43'),
(7, 'comment', 'name', 5, 19, '2020-11-24 17:40:54', '2020-11-24 17:40:54'),
(8, 'comment', 'name', 4, 189, '2020-11-24 18:04:23', '2020-11-24 18:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `name_ar`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'email', 'ايميل', 'email@email.com', 'contact/1611393863.png', '2020-11-23 14:29:39', '2020-11-23 19:29:39'),
(2, 'tel', 'تليفون', '25978225', 'contact/579387258.png', '2020-11-23 14:37:23', '2020-11-23 19:34:02'),
(3, 'fb', 'فيسبوك', 'facebook.com', 'contact/2121786405.png', '2020-11-23 19:35:12', '2020-11-23 19:35:12'),
(4, 'twitter', 'تويتر', 'twitter.com', 'contact/1052054251.png', '2020-11-23 19:36:02', '2020-11-23 19:36:02'),
(5, 'insta', 'انستا', 'instagram.com', 'contact/91144751.png', '2020-11-23 19:36:35', '2020-11-23 19:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `value`, `type`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(2, '147896', '5', 'value', '2020-11-18', '2020-11-28', '2020-11-10 16:56:24', '2020-11-12 20:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `value`, `type`, `product_id`, `created_at`, `updated_at`) VALUES
(8, '7', 1, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_addresses`
--

CREATE TABLE `favorite_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorite_addresses`
--

INSERT INTO `favorite_addresses` (`id`, `address_id`, `client_id`, `created_at`, `updated_at`) VALUES
(41, 9, 5, '2020-11-25 14:27:12', '2020-11-25 14:27:12');

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
(3, '2020_10_01_131126_laratrust_setup_tables', 1),
(4, '2020_10_01_131636_create_cities_table', 1),
(5, '2020_10_01_131717_create_branches_table', 1),
(6, '2020_10_01_131817_create_categories_table', 1),
(7, '2020_10_01_131918_create_sub_categories_table', 1),
(8, '2020_10_01_132010_create_products_table', 1),
(9, '2020_10_06_160206_create_user_branches_table', 2),
(11, '2020_10_07_182320_create_offers_table', 3),
(22, '2020_10_13_184906_create_myoffers_table', 4),
(23, '2020_10_13_185321_create_newproducts_table', 4),
(24, '2020_10_14_192527_create_offerssliders_table', 4),
(25, '2020_10_14_192821_create_ouroffers_table', 4),
(32, '2020_10_14_204206_create_clients_table', 5),
(33, '2020_10_16_230828_create_zones_table', 6),
(34, '2020_10_16_232144_create_client_addresses_table', 7),
(35, '2020_10_16_232451_create_favorite_addresses_table', 8),
(36, '2020_10_25_174011_create_orders_table', 9),
(37, '2020_10_25_175259_create_orderproducts_table', 9),
(38, '2020_10_25_182754_create_coupons_table', 10),
(39, '2020_10_25_193634_create_discounts_table', 11),
(42, '2020_10_27_102514_create_order_status_types_table', 12),
(43, '2020_10_27_103004_create_order_statuses_table', 12),
(44, '2020_10_27_103453_add_status_columns_to_orders', 13),
(45, '2020_10_27_103746_create_order_histories_table', 14),
(46, '2020_10_27_150044_create_units_table', 15),
(47, '2020_10_28_115646_create_notifications_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `myoffers`
--

CREATE TABLE `myoffers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newproducts`
--

CREATE TABLE `newproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `new_products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '[]',
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newproducts`
--

INSERT INTO `newproducts` (`id`, `user_id`, `city_id`, `branch_id`, `new_products`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 1, 4, 6, '[\"459\",\"460\",\"461\",\"462\"]', 19, NULL, NULL, '2020-11-15 16:54:20'),
(8, 1, 4, 7, '[\"675\",\"676\",\"676\",\"677\"]', 20, NULL, NULL, NULL),
(9, 1, 4, 8, '[\"891\",\"892\",\"893\",\"894\"]', 21, NULL, NULL, NULL),
(10, 1, 4, 9, '[\"1107\",\"1108\",\"1109\",\"1110\"]', 22, NULL, NULL, NULL),
(11, 1, 4, 10, '[\"1323\",\"1324\",\"1325\",\"1326\"]', 23, NULL, NULL, NULL),
(12, 1, 4, 11, '[\"1539\",\"1540\",\"1541\",\"1542\"]', 24, NULL, NULL, NULL),
(13, 1, 4, 12, '[\"1755\",\"1756\",\"1757\",\"1758\"]', 25, NULL, NULL, NULL),
(14, 1, 4, 13, '[\"1971\",\"1972\",\"1973\",\"1974\"]', 26, NULL, NULL, NULL),
(15, 1, NULL, NULL, '[]', 189, NULL, '2020-11-21 16:53:26', '2020-11-21 16:53:26'),
(16, 1, NULL, NULL, '[]', 33, NULL, NULL, NULL),
(17, 1, NULL, NULL, '[]', 18, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `product_id`, `order_id`, `client_id`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 5, 'Your Order Number6', 'fknjkfn', 1, '2020-10-28 11:25:30', '2020-10-28 11:25:30'),
(2, NULL, NULL, 5, 'Your Order Number6', 'pending', 1, '2020-10-28 11:26:46', '2020-10-28 11:26:46'),
(3, NULL, NULL, 5, 'Your Order Number6', 'fknjkfn', 1, '2020-10-28 11:27:37', '2020-10-28 11:27:37'),
(4, NULL, NULL, 5, 'Your Order Number 6', 'pending', 1, '2020-10-28 11:28:17', '2020-10-28 11:28:17'),
(5, NULL, NULL, 5, 'Your Order Number 6', 'fknjkfn', 1, '2020-10-28 11:28:59', '2020-10-28 11:28:59'),
(6, NULL, NULL, 5, 'Your Order Number 6', 'pending', 1, '2020-10-28 11:34:45', '2020-10-28 11:34:45'),
(7, NULL, NULL, 5, 'Your Order Number 6', 'fknjkfn', 1, '2020-10-28 12:29:38', '2020-10-28 12:29:38'),
(8, NULL, NULL, 5, 'Your Order Number 6', 'pending', 1, '2020-10-28 12:30:18', '2020-10-28 12:30:18'),
(9, NULL, NULL, 5, 'Your Order Number 6', 'fknjkfn', 1, '2020-10-28 12:30:50', '2020-10-28 12:30:50'),
(10, NULL, NULL, 5, 'Your Order Number 6', 'pending', 1, '2020-10-28 12:31:00', '2020-10-28 12:31:00'),
(11, NULL, NULL, 5, 'Your Order Number 6', 'fknjkfn', 1, '2020-10-28 12:43:22', '2020-10-28 12:43:22'),
(12, NULL, NULL, 5, 'Your Order Number 17', 'fknjkfn', 1, '2020-11-11 01:28:47', '2020-11-11 01:28:47'),
(13, NULL, NULL, 5, 'Your Order Number 17', 'pending', 1, '2020-11-11 01:31:17', '2020-11-11 01:31:17'),
(14, NULL, 30, 5, 'Your Order Number 30', 'arrived', 1, '2020-11-24 06:35:55', '2020-11-24 06:35:55'),
(15, NULL, 31, 5, 'Your Order Number 31', 'تم التوصيل', 1, '2020-11-24 06:41:48', '2020-11-24 06:41:48'),
(16, NULL, 31, 5, 'Your Order Number 31', 'يتم التجهيز', 1, '2020-11-24 06:42:18', '2020-11-24 06:42:18'),
(17, NULL, 31, 5, 'Your Order Number 31', 'تم التوصيل', 1, '2020-11-24 06:44:51', '2020-11-24 06:44:51'),
(18, NULL, 30, 5, 'Your Order Number 30', 'يتم التجهيز', 1, '2020-11-24 06:46:03', '2020-11-24 06:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `single_or_multi` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`offer_products`)),
  `offer_main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_from` date NOT NULL,
  `offer_to` date NOT NULL,
  `offer_details` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `offer_details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `user_id`, `city_id`, `branch_id`, `single_or_multi`, `offer_name`, `offer_name_ar`, `offer_products`, `offer_main_image`, `offer_from`, `offer_to`, `offer_details`, `offer_details_ar`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 5, '1', 'عرض2', 'عرض1', '[\"18\",\"19\",\"20\"]', 'offers/1648867845.png', '2020-11-11', '2020-11-19', 'عرض1 عرض1', 'عرض1 عرض1', '2020-11-10 14:59:09', '2020-11-21 15:13:27'),
(4, 1, 4, 5, '1', 'عرض1', 'عرض2', '[\"25\",\"26\",\"27\"]', 'offers/805153671.png', '2020-11-09', '2020-11-20', '', '', '2020-11-10 15:01:50', '2020-11-10 15:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `offerssliders`
--

CREATE TABLE `offerssliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offerssliders`
--

INSERT INTO `offerssliders` (`id`, `user_id`, `city_id`, `branch_id`, `slider_name`, `slider_name_ar`, `type`, `parent`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'offerssliders/1056451734.png', NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'offerssliders/258656934.png', NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'offerssliders/1791605518.png', NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'offerssliders/1056451734.png', NULL, NULL),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'offerssliders/1605970162120code.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`id`, `product_id`, `quantity`, `order_id`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(74, 20, '1', 28, '16', '7', '2020-11-24 06:07:29', '2020-11-24 06:07:29'),
(75, 21, '1', 28, '23', '0', '2020-11-24 06:07:29', '2020-11-24 06:07:29'),
(76, 18, '1', 29, '32', '0', '2020-11-24 06:09:58', '2020-11-24 06:09:58'),
(77, 18, '1', 30, '32', '0', '2020-11-24 06:33:46', '2020-11-24 06:33:46'),
(78, 19, '1', 31, '16', '0', '2020-11-24 06:37:10', '2020-11-24 06:37:10'),
(79, 18, '3', 32, '32', '0', '2020-11-24 18:23:18', '2020-11-24 18:23:18'),
(80, 19, '3', 32, '16', '0', '2020-11-24 18:23:18', '2020-11-24 18:23:18'),
(81, 20, '1', 32, '16', '7', '2020-11-24 18:23:18', '2020-11-24 18:23:18'),
(82, 27, '1', 32, '5', '0', '2020-11-24 18:23:18', '2020-11-24 18:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subTotal` double NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_status_type_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `order_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shipping`, `subTotal`, `discount`, `total`, `address_id`, `payment`, `client_id`, `branch_id`, `coupon`, `city`, `street`, `street_description`, `notes`, `created_at`, `updated_at`, `order_status_type_id`, `order_status_id`) VALUES
(28, '0', 37.85, '5', 32.85, NULL, 'الدفع عند الاستلام', 5, 5, '147896', NULL, NULL, NULL, NULL, '2020-11-24 06:07:29', '2020-11-24 06:07:29', 1, 1),
(29, '0', 36.8, '0', 36.8, NULL, 'الدفع عند الاستلام', 5, 6, '', NULL, NULL, NULL, NULL, '2020-11-24 06:09:58', '2020-11-24 06:09:58', 1, 1),
(30, '0', 36.8, '5', 31.8, NULL, 'الدفع عند الاستلام', 5, 6, '147896', NULL, NULL, NULL, NULL, '2020-11-24 06:33:46', '2020-11-24 06:46:03', 2, 1),
(31, '0', 18.4, '0', 18.4, NULL, 'الدفع عند الاستلام', 5, 6, '', NULL, NULL, NULL, NULL, '2020-11-24 06:37:10', '2020-11-24 06:44:51', 1, 2),
(32, '0', 182.75, '0', 182.75, 8, 'الدفع عند الاستلام', 5, 5, '', NULL, '6636 Thaghr Al Maha, Al Balad District, Jeddah 22238 3714, Saudi Arabia', 'test', NULL, '2020-11-24 18:23:18', '2020-11-24 18:23:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `order_id`, `order_status_id`, `comment`, `created_at`, `updated_at`) VALUES
(19, 30, 2, 'comment', '2020-11-24 06:35:55', '2020-11-24 06:35:55'),
(20, 31, 2, 'comment', '2020-11-24 06:41:48', '2020-11-24 06:41:48'),
(21, 31, 1, 'comment', '2020-11-24 06:42:18', '2020-11-24 06:42:18'),
(22, 31, 2, 'comment', '2020-11-24 06:44:51', '2020-11-24 06:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `order_status_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_translations`
--

CREATE TABLE `order_status_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_translations`
--

INSERT INTO `order_status_translations` (`id`, `order_status_id`, `name`, `name_ar`, `locale`) VALUES
(1, 1, 'يتم التجهيز', 'يتم التجهيز', ''),
(2, 2, 'تم التوصيل', 'تم التوصيل', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_types`
--

CREATE TABLE `order_status_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_types`
--

INSERT INTO `order_status_types` (`id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL),
(2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_type_translations`
--

CREATE TABLE `order_status_type_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_type_translations`
--

INSERT INTO `order_status_type_translations` (`id`, `order_status_type_id`, `name`, `name_ar`, `locale`) VALUES
(1, 1, 'استلام من الفرع', 'استلام من الفرع', 'en'),
(2, 2, 'توصيل', 'توصيل', '');

-- --------------------------------------------------------

--
-- Table structure for table `ouroffers`
--

CREATE TABLE `ouroffers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `single_or_multi` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `ouroffer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ouroffer_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ouroffer_products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ouroffer_main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ouroffers`
--

INSERT INTO `ouroffers` (`id`, `user_id`, `city_id`, `branch_id`, `single_or_multi`, `ouroffer_name`, `ouroffer_name_ar`, `ouroffer_products`, `ouroffer_main_image`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 5, '1', 'عرض السلة', 'عرض السلة', '[\"18\",\"19\",\"20\",\"21\",\"22\"]', 'ouroffers/739361232.png', '2020-11-10 03:33:30', '2020-11-14 15:45:11'),
(20, 1, NULL, NULL, '1', NULL, NULL, '[\"19\"]', NULL, '2020-11-21 01:53:18', '2020-11-21 01:53:18');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `product_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_unit` bigint(20) UNSIGNED NOT NULL,
  `discount` tinyint(1) NOT NULL DEFAULT 0,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '[]',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `city_id`, `branch_id`, `user_id`, `category_id`, `subcategory_id`, `product_name`, `product_name_ar`, `product_price`, `total_quantity`, `product_number`, `barcode`, `product_unit`, `discount`, `views`, `product_details`, `product_details_ar`, `product_main_image`, `product_images`, `created_at`, `updated_at`) VALUES
(18, 4, 5, 1, 1, 1, 'Flour With Bran 5 kg', 'دقيق بالنخالة 5 كجم', 32, '98', '1', '6281062511237', 1, 0, '16', 'Flour With Bran 5 kg', 'دقيق بالنخالة 5 كجم', 'products/05-2020/3616.132204.jpg', '[]', '2020-05-12 21:58:23', '2020-11-23 16:02:05'),
(19, 4, 5, 1, 1, 2, 'Flour With Bran 2 kg', 'دقيق بالنخالة 2كجم', 16, '100', '1', '6281062511244', 1, 0, '7', 'Flour With Bran 2 kg', 'دقيق بالنخالة 2كجم', 'products/05-2020/1971.555633.jpg', '[]', '2020-05-13 07:38:33', '2020-11-24 18:25:01'),
(20, 4, 5, 1, 1, 2, 'Wheat Flour Dark 2kg', 'دقيق أسمر 2 كجم', 16, '100', '1', '6281062511664', 1, 1, '8', 'Wheat Flour Dark 2kg', 'دقيق أسمر 2 كجم', 'products/05-2020/12.239097.jpg', '[]', '2020-05-13 07:40:34', '2020-11-24 18:22:31'),
(21, 4, 5, 1, 1, 2, 'Wheat Flour Dark 3kg', 'دقيق أسمر 3 كجم', 23, '100', '1', '6281062544129', 1, 0, '1', 'Wheat Flour Dark 3kg', 'دقيق أسمر 3 كجم', 'products/06-2020/2160.003534.jfif', '[]', '2020-05-13 08:09:17', '2020-11-16 22:06:26'),
(22, 4, 5, 1, 1, 1, 'TOMATO PACK ORG 1KG', 'طماطم عضوي 1 كيلو', 17, '99', '1', '710535213447', 1, 0, '0', 'TOMATO PACK ORG 1KG', 'طماطم عضوي 1 كيلو', 'products/05-2020/2293.878708.jpg', '[]', '2020-05-13 11:23:42', '2020-11-16 13:22:48'),
(23, 4, 5, 1, 1, 2, 'TOMATO BOX HYDROPONIC  3.5 kg', 'كرتون طماطم  زراعة مائية  3.5 كيلو', 42, '100', '1', '710535213515', 1, 0, '3', 'TOMATO BOX HYDROPONIC  3.5 kg', 'كرتون طماطم  زراعة مائية  3.5 كيلو', 'products/05-2020/102.930669.jpg', '[\"products/05-2020/1454.604316.jpg\"]', '2020-05-13 11:25:19', '2020-11-24 17:40:37'),
(24, 4, 5, 1, 2, 3, 'CUCUMBER BOX HYDROPONIC  3kg', 'كرتون خيار زراعة مائية 3كيلو', 19, '100', '1', '710535213522', 1, 0, '1', 'CUCUMBER BOX HYDROPONIC  3kg', 'كرتون خيار زراعة مائية 3كيلو', 'products/05-2020/955.71556.jpg', '[]', '2020-05-13 11:26:29', '2020-11-24 06:58:27'),
(25, 4, 5, 1, 1, 2, 'CUCUMBER ORG 500GM', 'خيار عضوي 500جرام', 8, '100', '1', '710535213423', 1, 0, '0', 'CUCUMBER ORG 500GM', 'خيار عضوي 500جرام', 'products/05-2020/1437.018432.jpg', '[]', '2020-05-13 11:27:25', '2020-10-11 21:26:44'),
(26, 4, 5, 1, 1, 2, 'CHERRY TOMATO PACK 250g', 'علبة طماطم  شري 250غ', 8, '100', '1', '710535213478', 1, 0, '0', 'CHERRY TOMATO PACK 250g', 'علبة طماطم  شري 250غ', 'products/05-2020/2463.588104.jpg', '[]', '2020-05-13 11:28:44', '2020-10-11 21:26:25'),
(27, 4, 5, 1, 1, 2, 'ARUGULA ORG 200 GM', 'جرجير عضوي 200 جرام', 5, '100', '1', '710535622188', 1, 0, '1', 'ARUGULA ORG 200 GM', 'جرجير عضوي 200 جرام', 'products/05-2020/1602.489408.jpg', '[]', '2020-05-13 11:29:47', '2020-11-24 18:22:51'),
(28, 4, 5, 1, 1, 2, 'PARSELY ORG 200 GM', 'بقدونس عضوي 200 جرام', 6, '100', '1', '710535622201', 1, 0, '0', 'PARSELY ORG 200 GM', 'بقدونس عضوي 200 جرام', 'products/05-2020/3264.35234.png', '[]', '2020-05-13 11:31:18', '2020-10-11 21:29:04'),
(29, 4, 5, 1, 1, 2, 'CORIANDER ORG 200 GM', 'كزبرة عضوي 200 جرام', 5, '100', '1', '710535622157', 1, 0, '0', 'CORIANDER ORG 200 GM', 'كزبرة عضوي 200 جرام', 'products/05-2020/2332.226226.jpg', '[]', '2020-05-13 11:32:23', '2020-09-01 00:30:50'),
(30, 4, 5, 1, 1, 2, 'LEEK ORG 200 GM', 'كراث عضوي 200 جرام', 6, '100', '1', '710535622126', 1, 0, '0', 'LEEK ORG 200 GM', 'كراث عضوي 200 جرام', 'products/05-2020/1067.324602.jpg', '[]', '2020-05-13 11:33:11', '2020-10-11 21:28:19'),
(31, 4, 5, 1, 1, 2, 'MINT ORG 200 GM', 'نعناع عضوي بلدي 200 جرام', 6, '100', '1', '710535622195', 1, 0, '0', 'MINT ORG 200 GM', 'نعناع عضوي بلدي 200 جرام', 'products/05-2020/315.438563.jpg', '[]', '2020-05-13 11:34:02', '2020-10-11 21:28:45'),
(32, 4, 5, 1, 1, 2, 'ONION GREEN ORG 200GM', 'بصل أخضر عضوي 200 جرام', 6, '100', '1', '710535622102', 1, 0, '0', 'ONION GREEN ORG 200GM', 'بصل أخضر عضوي 200 جرام', 'products/05-2020/75.869415.jpg', '[]', '2020-05-13 11:34:44', '2020-08-09 00:41:08'),
(33, 4, 5, 1, 1, 2, 'RADISH ORG 200 GM', 'فجل عضوي 200 جرام', 8, '100', '1', '710535622263', 1, 0, '1', 'RADISH ORG 200 GM', 'فجل عضوي 200 جرام', 'products/05-2020/3476.867072.jpg', '[]', '2020-05-13 11:35:40', '2020-11-24 01:56:25'),
(34, 4, 5, 1, 1, 2, 'CARROTS ORGANIC', 'جزر عضوي 1 كيلو', 13, '100', '1', '710535212003', 1, 0, '0', 'CARROTS ORGANIC', 'جزر عضوي1 كيلو', 'products/05-2020/1829.094645.jpg', '[]', '2020-05-13 11:36:53', '2020-08-09 00:41:03'),
(35, 4, 5, 1, 1, 2, 'PUMPKIN AMERICAN 2KG', 'قرع امريكي 2 كيلو', 22, '100', '1', '6700904273107', 1, 0, '0', 'PUMPKIN AMERICAN 2KG', 'قرع امريكي 2 كيلو', 'products/05-2020/2542.91749.jpg', '[]', '2020-05-13 11:37:47', '2020-08-09 00:41:00'),
(36, 4, 5, 1, 1, 2, 'GREEN BEANS 1KG/BOX', 'فاصوليا 1 كيلو', 21, '100', '1', '6700904273088', 1, 0, '0', 'GREEN BEANS 1KG/BOX', 'فاصوليا 1 كيلو', 'products/05-2020/227.449235.jpg', '[]', '2020-05-13 11:39:17', '2020-10-11 21:30:00'),
(37, 4, 5, 1, 1, 2, 'EGG PLANT ORG 1.5KG/BOX', 'باذنجان عضوي  1.5كيلو', 12, '100', '1', '6700904273089', 1, 0, '0', 'EGG PLANT 1.5KG/BOX', 'باذنجان 1.5كيلو', 'products/05-2020/1786.280094.jpg', '[]', '2020-05-13 11:40:53', '2020-08-29 17:21:29'),
(38, 4, 5, 1, 1, 2, 'Flour With Bran 3 kg', 'دقيق بالنخالة 3 كجم', 23, '100', '1', '6281062544136', 1, 0, '0', 'Flour With Bran 3 kg', 'دقيق بالنخالة 3 كجم', 'products/06-2020/1002.634236.jfif', '[]', '2020-06-02 04:53:15', '2020-08-09 00:40:51'),
(39, 4, 5, 1, 1, 2, 'WHITE FLOUR ORG 3 KG', 'دقيق أبيض 3 كجم', 17, '100', '1', '6281062544112', 1, 0, '0', 'WHITE FLOUR ORG 3 KG', 'دقيق أبيض 3 كجم', 'products/06-2020/1710.634948.jpg', '[]', '2020-06-02 04:59:00', '2020-08-31 19:20:32'),
(40, 4, 5, 1, 1, 2, 'SAMOLINA ORG 1 KG', 'سميد عضوي 1 كجم', 17, '100', '1', '6281062542576', 1, 0, '0', 'SAMOLINA ORG 1 KG', 'سميد عضوي 1 كجم', 'products/06-2020/1022.416373.jpg', '[]', '2020-06-02 05:03:30', '2020-08-09 00:40:21'),
(41, 4, 5, 1, 1, 2, 'WATER PLS BOT 330ML', 'مياه شرب 330 مل', 1, '100', '1', '6281062542996', 1, 0, '0', 'WATER PLS BOT 330ML', 'مياه شرب 330 مل', 'products/06-2020/2386.355748.jpg', '[]', '2020-06-02 05:07:04', '2020-08-09 00:40:18'),
(42, 4, 5, 1, 1, 2, 'WATER PLS BOTT 20*330', 'مياه شرب 330 مل * 20', 14, '100', '1', '6281062546475', 1, 0, '0', 'WATER PLS BOTT 20*330', 'مياه شرب 330 مل * 20', 'products/06-2020/1546.01253.jpg', '[]', '2020-06-02 05:10:22', '2020-08-09 00:40:16'),
(47, 4, 5, 1, 1, 2, 'SHEEP & GOAT  MILK 1 LTR/ LF', 'حليب غنم وماعز 1 لتر قليل الدسم', 8, '100', '1', '6281062539583', 1, 0, '0', 'SHEEP & GOAT  MILK 1 LTR/ LF', 'حليب غنم وماعز 1 لتر قليل الدسم', 'products/06-2020/240.35808.jpg', '[]', '2020-06-02 05:24:26', '2020-08-27 03:11:53'),
(48, 4, 5, 1, 1, 2, 'Camel Milk 1 Ltr', 'حليب خلفات 1 ليتر', 16, '100', '1', '6281062510537', 1, 0, '0', 'Camel Milk 1 Ltr', 'حليب خلفات 1 ليتر', 'products/06-2020/172.992491.jpg', '[]', '2020-06-02 05:29:57', '2020-08-09 00:39:58'),
(49, 4, 5, 1, 1, 2, 'Soft Labneh 180 gm', 'لبنة طرية 180 جم', 5, '100', '1', '6281062510902', 1, 0, '0', 'Soft Labneh 180 gm', 'لبنة طرية 180 جم', 'products/06-2020/416.798.jpg', '[]', '2020-06-02 05:32:14', '2020-08-09 00:39:53'),
(50, 4, 5, 1, 1, 2, 'Haloom Cheese 1 Kg', 'جبن حلوم 1 كجم', 35, '100', '1', '6281062510766', 1, 0, '0', 'Haloom Cheese 1 Kg', 'جبن حلوم 1 كجم', 'products/06-2020/3953.64095.jpg', '[]', '2020-06-02 05:36:08', '2020-08-09 00:39:33'),
(51, 4, 5, 1, 1, 2, 'Soft Cheese 1 Kg', 'جبنة طرية 1 كجم', 41, '100', '1', '6281062510773', 1, 0, '1', 'Soft Cheese 1 Kg', 'جبنة طرية 1 كجم', 'products/06-2020/3613.79628.jpg', '[]', '2020-06-02 05:38:57', '2020-11-16 22:06:15'),
(52, 4, 5, 1, 1, 2, 'OLIVE OIL CAN ORG 3L', 'زيت زيتون عضوي 3 لتر', 121, '100', '1', '6281062511053', 1, 0, '0', 'OLIVE OIL CAN ORG 3L', 'زيت زيتون عضوي 3 لتر', 'products/06-2020/671.449856.jpg', '[]', '2020-06-02 05:46:52', '2020-10-08 20:38:35'),
(53, 4, 5, 1, 1, 2, 'OLIVE OIL ORG 2 LT', 'زيت زيتون عضوي 2 لتر', 81, '100', '1', '6281062541470', 1, 0, '0', 'OLIVE OIL ORG 2 LT', 'زيت زيتون عضوي 2 لتر', 'products/06-2020/816.996524.jpg', '[]', '2020-06-02 05:48:58', '2020-10-08 20:38:47'),
(54, 4, 5, 1, 1, 2, 'OLIVE OIL BOT ORG250', 'زيت زيتون عضوي 250 مل', 16, '100', '1', '6281062526422', 1, 0, '0', 'OLIVE OIL BOT ORG250', 'زيت زيتون عضوي 250 مل', 'products/06-2020/124.786494.jpg', '[]', '2020-06-02 05:49:57', '2020-08-09 00:39:22'),
(55, 4, 5, 1, 1, 2, 'OLIVE OIL BOT ORG500', 'زيت زيتون عضوي 500 مل', 26, '100', '1', '6281062526309', 1, 0, '0', 'OLIVE OIL BOT ORG500', 'زيت زيتون عضوي 500 مل', 'products/06-2020/267.524973.jpg', '[]', '2020-06-02 05:51:02', '2020-08-09 00:39:19'),
(56, 4, 5, 1, 1, 2, 'OLIVE OIL SQ ORG 1LT', 'زيت زيتون عضوي 1 لتر', 42, '100', '1', '6281062541449', 1, 0, '0', 'OLIVE OIL SQ ORG 1LT', 'زيت زيتون عضوي 1 لتر', 'products/06-2020/1264.512585.jpg', '[]', '2020-06-02 05:52:23', '2020-10-08 20:39:08'),
(57, 4, 5, 1, 1, 2, 'OLIVE OIL CYL ORG 500M', 'زيت زيتون عضوي 500مل', 30, '100', '1', '6281062542736', 1, 0, '0', 'OLIVE OIL CYL ORG 500M', 'زيت زيتون عضوي 500مل', 'products/06-2020/239.224708.jpg', '[]', '2020-06-02 05:53:51', '2020-08-09 00:39:14'),
(58, 4, 5, 1, 1, 2, 'ORG PASTA 250GM', 'معكرونه عضوي 250 غرام', 10, '100', '1', '6281062516294', 1, 0, '0', 'ORG PASTA 250GM', 'معكرونه عضوي 250 غرام', 'products/06-2020/1171.748712.jpg', '[]', '2020-06-02 06:08:30', '2020-08-09 00:39:11'),
(59, 4, 5, 1, 1, 2, 'Apple Vinegar 500 ml', 'خل تفاح طبيعي 500 مل', 21, '100', '1', '6281062511671', 1, 0, '0', 'Apple Vinegar 500 ml', 'خل تفاح طبيعي 500 مل', 'products/06-2020/3385.449786.jpg', '[]', '2020-06-03 09:42:39', '2020-09-06 21:13:05'),
(60, 4, 5, 1, 1, 2, 'ORG. OATS 400 GM', 'شوفان 400 غرام', 17, '100', '1', '6281062541272', 1, 0, '0', 'ORG. OATS 400 GM', 'شوفان 400 غرام', 'products/06-2020/614.221322.jpg', '[]', '2020-06-03 09:44:27', '2020-08-09 00:38:44'),
(61, 4, 5, 1, 1, 2, 'ORG. TOMATO PASTE', 'معجون طماطم عضوي', 9, '100', '1', '6281062536414', 1, 0, '0', 'ORG. TOMATO PASTE 260GM', 'معجون طماطم عضوي - 260 ج', 'products/06-2020/1750.203301.jpg', '[]', '2020-06-03 09:45:54', '2020-08-09 00:38:41'),
(62, 4, 5, 1, 1, 2, 'DATES SYRUP ORG 350gm', 'دبس تمر عضوي 350 غرام', 14, '100', '1', '6281062541708', 1, 0, '0', 'DATES SYRUP ORG 350GM', 'دبس تمر عضوي 350 غم', 'products/06-2020/728.690339.jpg', '[]', '2020-06-03 09:47:28', '2020-09-06 23:24:02'),
(63, 4, 5, 1, 1, 2, 'DATES SYRUP ORG 900GM', 'دبس تمر عضوي 900 غم', 26, '100', '1', '6281062510247', 1, 0, '0', 'DATES SYRUP ORG 900GM', 'دبس تمر عضوي 900 غم', 'products/06-2020/23.9701.jpg', '[]', '2020-06-03 09:48:26', '2020-09-06 23:22:20'),
(64, 4, 5, 1, 1, 2, 'SUGAR ORG 2KG', 'سكر عضوي 2 كجم', 46, '100', '1', '6281062542750', 1, 0, '0', 'SUGAR ORG 2KG', 'سكر عضوي 2 كجم', 'products/06-2020/127.543478.jpg', '[]', '2020-06-03 09:51:54', '2020-10-08 20:39:30'),
(65, 4, 5, 1, 1, 2, 'SUGAR ORG 3 KG', 'سكر عضوي 3 كجم', 63, '100', '1', '6281062543399', 1, 0, '0', 'SUGAR ORG 3 KG', 'سكر عضوي 3 كجم', 'products/06-2020/3054.2135.jpg', '[]', '2020-06-03 09:52:59', '2020-10-08 20:39:46'),
(66, 4, 5, 1, 1, 2, 'ORG TOMATO KETCHUP 340GM', 'كاتشب عضوي', 12, '100', '1', '6281062536445', 1, 0, '0', 'ORG TOMATO KETCHUP 340GM', 'كاتشب عضوي 350 جرام', 'products/06-2020/932.57847.jpg', '[]', '2020-06-03 09:54:04', '2020-08-09 00:38:26'),
(67, 4, 5, 1, 1, 2, 'CHARCOAL GRILL 5 KG', 'فحم شواء 5 كغم', 33, '100', '1', '6281062542118', 1, 0, '0', 'CHARCOAL GRILL 5 KG', 'فحم شواء 5 كغم', 'products/06-2020/120.333276.jpg', '[]', '2020-06-03 09:55:11', '2020-08-09 00:38:23'),
(68, 4, 5, 1, 1, 2, 'FIREWOOD CIRCULAR 4PC', 'حطب اشعال 4 حبة دائري', 11, '100', '1', '6281062547786', 1, 0, '0', 'FIREWOOD CIRCULAR 4PC', 'حطب اشعال 4 حبة دائري', 'products/06-2020/506.631972.jpg', '[]', '2020-06-03 09:56:10', '2020-08-09 00:38:20'),
(69, 4, 5, 1, 1, 2, 'FIREWOOD CIRCULAR 12PC', 'حطب اشعال 12 حبة دائري', 31, '100', '1', '6281062546895', 1, 0, '0', 'FIREWOOD CIRCULAR 12PC', 'حطب اشعال 12 حبة دائري', 'products/06-2020/4.830828.jpg', '[]', '2020-06-03 09:57:22', '2020-08-09 00:38:18'),
(70, 4, 5, 1, 1, 2, 'Olive Pickle ORG 430gm water', 'زيتون عضوي بالماء 430جم', 9, '100', '1', '6281062511138', 1, 0, '0', 'Olive Pickle ORG 430gm water', 'زيتون عضوي بالماء 430جم', 'products/06-2020/210.937428.jpg', '[]', '2020-06-03 09:59:42', '2020-09-06 21:11:32'),
(71, 4, 5, 1, 1, 2, 'Olive Pickle 430gm Oil', 'زيتون بالزيت عضوي 430جم', 21, '100', '1', '6281062510230', 1, 0, '0', 'Olive Pickle 430gm Oil', 'زيتون بالزيت عضوي 430جم', 'products/06-2020/2842.99308.jpg', '[]', '2020-06-03 10:01:38', '2020-09-06 21:12:01'),
(72, 4, 5, 1, 1, 2, 'Oliv Pickl 2kg Water', 'زيتون عضوي بالماء 2 كيلو', 33, '100', '1', '6281062512883', 1, 0, '0', 'Oliv Pickl 2kg Water', 'زيتون عضوي مخلل بالماء 2 كيلو', 'products/06-2020/303.194852.jpg', '[]', '2020-06-03 10:03:17', '2020-10-14 21:01:35'),
(73, 4, 5, 1, 1, 2, 'CAMEL MILK SOAP', 'صابون حليب الابل', 12, '100', '1', '6281062542484', 1, 0, '0', 'CAMEL MILK SOAP 125G', 'صابون حليب الابل 125 غ', 'products/06-2020/504.12593.jpg', '[]', '2020-06-03 10:04:50', '2020-08-09 00:37:48'),
(74, 4, 5, 1, 1, 2, 'GARE SOAP 140 GM', 'صابون غار', 14, '100', '1', '6281062546369', 1, 0, '0', 'GARE SOAP 140 GM', 'صابون غار 140 غ', 'products/06-2020/282.47205.jpg', '[]', '2020-06-03 10:06:14', '2020-08-09 00:37:45'),
(75, 4, 5, 1, 1, 2, 'GARE SOAPOLIVE30G*8PC', 'صابون بزيتون الزيتون و زيت الغار', 21, '100', '1', '6281062542545', 1, 0, '0', 'GARE SOAPOLIVE30G*8PC', 'صابون بزيتون الزيتون و زيت الغار 30 غ * 8 حبات', 'products/06-2020/245.115369.jpg', '[]', '2020-06-03 10:07:35', '2020-08-09 00:37:43'),
(76, 4, 5, 1, 1, 2, 'CAMEL MILK SOAP', 'صابون بزيتون الزيتون و حليب الابل', 28, '100', '1', '6281062542538', 1, 0, '0', 'CAMELMILKSOAP30G*8PC', 'صابون بزيتون الزيتون و حليب الابل 30 غ * 8 حبة', 'products/06-2020/1038.076798.jpg', '[]', '2020-06-03 10:09:31', '2020-08-09 00:37:41'),
(77, 4, 5, 1, 1, 2, 'ROUNDED SOAP B/SEED', 'صابون حبة بركة مدور', 12, '100', '1', '6281062538630', 1, 0, '0', 'ROUNDED SOAP B/SEED 140GM', 'صابون حبة بركة مدور 140 جرام', 'products/06-2020/937.920465.jpg', '[]', '2020-06-03 10:10:42', '2020-08-09 00:37:38'),
(78, 4, 5, 1, 1, 2, 'GINGER POWDER ORG', 'زنجبيل بودرة عضوى', 14, '100', '1', '6281062539804', 1, 0, '0', 'GINGER POWDER ORG 150GM', 'زنجبيل بودرة عضوى 150 جرام', 'products/06-2020/581.074295.jpg', '[]', '2020-06-03 10:14:18', '2020-08-09 00:37:33'),
(79, 4, 5, 1, 1, 2, 'CLOVE WHOLE ORG', 'قرنفل عضوي', 19, '100', '1', '6281062543405', 1, 0, '0', 'CLOVE WHOLE ORG 100G', 'قرنفل عضوي 100 غ', 'products/06-2020/110.17872.jpg', '[]', '2020-06-03 10:16:04', '2020-08-09 00:37:30'),
(80, 4, 5, 1, 1, 2, 'BLKPEPPER WHOLE ORG', 'فلفل اسود حب', 14, '100', '1', '6281062543528', 1, 0, '0', 'BLKPEPPER WHOLE ORG 100GM', 'فلفل اسود حب 100 غرام', 'products/06-2020/1138.08584.jpg', '[]', '2020-06-03 10:17:00', '2020-08-09 00:37:12'),
(81, 4, 5, 1, 1, 2, 'NATURAL SALT 640Gm', 'ملح طعام طبيعى', 12, '100', '1', '6281062542804', 1, 0, '0', 'NATURAL SALT 640Gm', 'ملح طعام طبيعى 640 غم', 'products/06-2020/718.815576.jpg', '[]', '2020-06-03 10:17:53', '2020-08-09 00:37:09'),
(82, 4, 5, 1, 1, 2, 'ORG. MATAZEEZ 250 GM', 'مطازيز عضوي 250 غرام', 9, '100', '1', '6281062541302', 1, 0, '0', 'ORG. MATAZEEZ 250 GM', 'مطازيز عضوي 250 غرام', 'products/06-2020/530.600856.jpg', '[]', '2020-06-03 10:19:02', '2020-08-09 00:37:07'),
(83, 4, 5, 1, 1, 2, 'JEREESH ORG 1 KG', 'جريش عضوي 1كجم', 11, '100', '1', '6281062542590', 1, 0, '0', 'JEREESH ORG 1 KG', 'جريش عضوي 1كجم', 'products/06-2020/860.351232.jpg', '[]', '2020-06-03 10:20:20', '2020-08-09 00:37:04'),
(84, 4, 5, 1, 1, 2, 'JEREESH ORG 2 KG', 'جريش عضوي 2كجم', 19, '100', '1', '6281062511268', 1, 0, '0', 'JEREESH ORG 2 KG', 'جريش عضوي 2كجم', 'products/06-2020/3023.598585.jpg', '[]', '2020-06-03 10:21:29', '2020-08-31 19:12:49'),
(85, 4, 5, 1, 1, 2, 'TOMATO 2.5KG/BOX', 'كرتون طماطم 2.5 كيلو', 30, '100', '1', '6700904273085', 1, 0, '0', 'TOMATO 2.5KG/BOX', 'كرتون طماطم 2.5 كيلو', 'products/07-2020/882.784302.jpg', '[]', '2020-07-17 10:48:07', '2020-09-13 20:41:50'),
(86, 4, 5, 1, 1, 2, 'CUCUMBER 2.5KG/BOX', 'كرتون خيار 2.5كيلو', 33, '100', '1', '6700904273086', 1, 0, '0', 'CUCUMBER 2.5KG/BOX', 'كرتون خيار 2.5كيلو', 'products/07-2020/1001.550956.jpg', '[]', '2020-07-17 10:50:58', '2020-08-27 03:05:34'),
(87, 4, 5, 1, 1, 2, 'LADY FINGER (OKRA)1 K', 'بامية 1 كيلو', 25, '100', '1', '6700904273108', 1, 0, '0', 'LADY FINGER(OKRA)1 K', 'بامية 1 كيلو', 'products/07-2020/162.4365.jpg', '[]', '2020-07-17 10:53:02', '2020-10-11 21:29:44'),
(88, 4, 5, 1, 1, 2, 'SQUASH (ZUCCHINI )2KG', 'كوسه 2 كيلو', 21, '100', '1', '6700904273090', 1, 0, '0', 'SQUASH (ZUCCHINI )2KG', 'كوسه 2 كيلو', 'products/07-2020/152.328512.jpg', '[]', '2020-07-17 10:54:56', '2020-10-11 21:30:09'),
(89, 4, 5, 1, 1, 2, 'SWEET PEPPER 1.5KG/B', 'فلفل بارد اخضر 1.5 كيلو', 15, '100', '1', '6700904273091', 1, 0, '0', 'SWEET PEPPER 1.5KG/B', 'فلفل بارد اخضر 1.5 كيلو', 'products/07-2020/1325.185108.jpg', '[]', '2020-07-17 10:56:58', '2020-09-13 20:42:43'),
(90, 4, 5, 1, 1, 2, 'POTATO 2 KG', 'بطاطس 2 كيلو', 10, '100', '1', '6700904271112', 1, 0, '0', 'POTATO 2 KG', 'بطاطس 2 كيلو', 'products/07-2020/1701.95652.jpg', '[]', '2020-07-17 10:58:01', '2020-08-27 03:04:31'),
(91, 4, 5, 1, 1, 2, 'WHITE ONION 2 KG', 'بصل أبيض 2 كيلو', 22, '100', '1', '6700904271111', 1, 0, '0', 'WHITE ONION 2 KG', 'بصل أبيض 2 كيلو', 'products/07-2020/1959.37089.jpg', '[]', '2020-07-17 11:00:11', '2020-08-27 03:04:15'),
(92, 4, 5, 1, 1, 2, 'PUMPKIN AMERICAN 1KG', 'قرع امريكي 1 كيلو', 6, '100', '1', '6700904273092', 1, 0, '0', 'PUMPKIN AMERICAN 1KG', 'قرع امريكي 1 كيلو', 'products/07-2020/605.927274.jpg', '[]', '2020-07-17 11:01:59', '2020-08-27 03:03:53'),
(93, 4, 5, 1, 1, 2, 'TOMATO 0.7KG', 'طماطم نخب اول 0.7 كيلو', 10, '100', '1', '6700904273109', 1, 0, '0', 'TOMATO 0.7KG', 'طماطم نخب اول 0.7 كيلو', 'products/07-2020/2790.056568.png', '[]', '2020-07-17 11:03:22', '2020-10-11 21:30:19'),
(94, 4, 5, 1, 1, 2, 'CUCUMBER 0.7KG', 'خيار 0.7 كيلو', 7, '100', '1', '6700904273110', 1, 0, '0', 'CUCUMBER 0.7KG', 'خيار 0.7 كيلو', 'products/07-2020/69.562021.jpg', '[]', '2020-07-17 11:05:59', '2020-10-11 21:30:28'),
(95, 4, 5, 1, 1, 2, 'LADY FINGER(OKRA)0.4kg', 'بامية 0.4 كيلو', 12, '100', '1', '6700904273111', 1, 0, '0', 'LADY FINGER(OKRA)0.4kg', 'بامية 0.4 كيلو', 'products/07-2020/1024.798465.jpg', '[]', '2020-07-17 11:07:10', '2020-10-11 21:30:39'),
(96, 4, 5, 1, 1, 2, 'GREEN BEANS0.4K', 'فاصوليا عضوي 0.4 كيلو', 10, '100', '1', '6700904273112', 1, 0, '0', 'GREEN BEANS0.4K', 'فاصوليا عضوي 0.4 كيلو', 'products/07-2020/12.843072.jfif', '[]', '2020-07-17 11:08:24', '2020-10-11 21:30:52'),
(97, 4, 5, 1, 1, 2, 'EGG PLANT 0.5KG', 'باذنجان 0.5 كيلو', 6, '100', '1', '6700904273097', 1, 0, '0', 'EGG PLANT 0.5KG', 'باذنجان 0.5 كيلو', 'products/07-2020/110.270739.jfif', '[]', '2020-07-17 11:09:26', '2020-08-09 00:36:01'),
(98, 4, 5, 1, 1, 2, 'BANANA - 1KG', 'موز 1 كيلو', 9, '100', '1', '6281062546581', 1, 0, '0', 'BANANA - 1KG', 'موز 1 كيلو', 'products/07-2020/4220.1566.jpg', '[]', '2020-07-17 11:11:33', '2020-08-27 03:01:58'),
(99, 4, 5, 1, 1, 2, 'APRICOT - 1KG', 'مشمش 1كيلو', 19, '100', '1', '6281062546659', 1, 0, '0', 'APRICOT - 1KG', 'مشمش 1كيلو', 'products/07-2020/750.714816.jpg', '[]', '2020-07-17 11:13:50', '2020-08-27 03:01:24'),
(100, 4, 5, 1, 1, 2, 'PEACH - 1KG', 'خوخ 1كيلو', 13, '100', '1', '6281062546666', 1, 0, '0', 'PEACH - 1KG', 'خوخ 1كيلو', 'products/07-2020/1315.765682.jpg', '[]', '2020-07-17 11:15:17', '2020-08-27 03:00:45'),
(101, 4, 5, 1, 1, 2, 'PEACH - 2.5 KG', 'خوخ 2.5 كيلو', 21, '100', '1', '6281062548752', 1, 0, '0', 'PEACH - 2.5 KG', 'خوخ 2.5 كيلو', 'products/07-2020/449.831434.jpg', '[]', '2020-07-17 11:16:08', '2020-08-27 03:00:16'),
(102, 4, 5, 1, 1, 2, 'COCOANUTS W/COCOA 350P', 'كريمة البندق بالكاكاو العضوية', 20, '100', '1', '8008245003437', 1, 0, '0', 'COCOANUTS W/COCOA 350P', 'كريمة البندق بالكاكاو العضوية', 'products/07-2020/1936.008989.png', '[\"products/07-2020/60.364136.jpg\"]', '2020-07-17 11:20:05', '2020-08-09 00:35:27'),
(103, 4, 5, 1, 1, 2, 'BASMATI RICE WHITE ORG 5K', 'أرز  بسمتي عضوي 5كيلو', 55, '100', '1', '8964001798286', 1, 0, '0', 'BASMATI RICE WHITE ORG 5K', 'أرز  بسمتي ابيض عضوي 5كيلو', 'products/07-2020/2208.262848.jpg', '[]', '2020-07-17 11:23:28', '2020-08-09 00:35:21'),
(104, 4, 5, 1, 1, 2, 'BASMATI RICE WHITE ORG 2K', 'أرز  بسمتي ابيض عضوي 2كيلو', 24, '100', '1', '8964001798279', 1, 0, '0', 'BASMATI RICE WHITE ORG 2K', 'أرز  بسمتي ابيض عضوي 2كيلو', 'products/07-2020/736.012354.jpg', '[]', '2020-07-17 11:25:32', '2020-08-09 00:35:18'),
(105, 4, 5, 1, 1, 2, 'Green Cola Original 330ml', 'جرين كولا 330 مل', 5, '100', '1', '5206542006493', 1, 0, '0', 'Green Cola Original 330ml', 'جرين كولا 330 مل', 'products/07-2020/666.038008.jpg', '[]', '2020-07-17 11:26:42', '2020-08-09 00:35:15'),
(106, 4, 5, 1, 1, 2, 'Green cola Lemonade 330ml', 'جرين كولا ليمون 330 مل', 5, '100', '1', '5206542007476', 1, 0, '0', 'Green cola Lemonade 330ml', 'جرين كولا ليمون 330 مل', 'products/07-2020/379.567464.jpg', '[]', '2020-07-17 11:27:34', '2020-08-09 00:35:12'),
(107, 4, 5, 1, 1, 2, 'Green cola Cherry 330ml', 'جرين كولا كرز 330 مل', 5, '100', '1', '5206542007483', 1, 0, '0', 'Green cola Cherry 330ml', 'جرين كولا كرز 330 مل', 'products/07-2020/985.876465.jpg', '[]', '2020-07-17 11:28:29', '2020-08-09 00:35:09'),
(108, 4, 5, 1, 1, 2, 'Green cola Orange 330ml', 'جرين كولا برتقال 330 مل', 5, '100', '1', '5206542007469', 1, 0, '0', 'Green cola Orange 330ml', 'جرين كولا برتقال 330 مل', 'products/07-2020/2872.139898.jpg', '[]', '2020-07-17 11:29:19', '2020-08-09 00:35:06'),
(109, 4, 5, 1, 1, 2, 'Pomegranate Vinegar 500ML', 'أورجانتي خل الرمان العضوي   ½ لتر', 28, '100', '1', '8003407156181', 1, 0, '0', 'Pomegranate Vinegar 500ML', 'أورجانتي خل الرمان العضوي   ½ لتر', 'products/07-2020/412.115594.jpg', '[]', '2020-07-17 11:31:23', '2020-08-12 01:27:57'),
(110, 4, 5, 1, 1, 2, 'ORG ROLLED OATS 1KG', 'شوفان عضوى كامل 1 كيلو', 42, '100', '1', '9556124070043', 1, 0, '0', 'ORG ROLLED OATS 1KG', 'أورجانيت شوفان عضوى كامل 1 كيلو', 'products/07-2020/2164.22776.jpg', '[]', '2020-07-17 11:33:00', '2020-08-09 00:34:41'),
(111, 4, 5, 1, 1, 2, 'ORG ROLLED OATS 500GM', 'أورجان يت شوفان عضوى كامل ½ كيلو', 22, '100', '1', '9556124070029', 1, 0, '0', 'ORG ROLLED OATS 500GM', 'أورجان يت شوفان عضوى كامل ½ كيلو', 'products/07-2020/1351.728918.jpg', '[]', '2020-07-17 11:34:01', '2020-08-09 00:34:38'),
(112, 4, 5, 1, 1, 2, 'ORG INSTANT OATS 1KG', 'أورجانيت شوفان عضوى سريع التحضري 1 كيلو', 42, '100', '1', '9556124070036', 1, 0, '0', 'ORG INSTANT OATS 1KG', 'أورجانيت شوفان عضوى سريع التحضري 1 كيلو', 'products/07-2020/135.563922.jpg', '[]', '2020-07-17 11:35:13', '2020-08-09 00:34:35'),
(113, 4, 5, 1, 1, 2, 'ORG INSTANT OATS 500Gm', 'أورجانيت شوفان عضوى سريع التحضير ½ كيلو', 22, '100', '1', '9556124070012', 1, 0, '0', 'ORG INSTANT OATS 500Gm', 'أورجانيت شوفان عضوى سريع التحضير ½ كيلو', 'products/07-2020/2619.145767.jpg', '[]', '2020-07-17 11:36:02', '2020-08-09 00:34:32'),
(114, 4, 5, 1, 1, 2, 'ORG SPAGHETTI PASTA 5', 'مكرونة أسباجيتي 500جرام عضوية', 4, '100', '1', '8003740120054', 1, 0, '0', 'ORG SPAGHETTI PASTA 5', 'مكرونة أسباجيتي 500جرام عضوية', 'products/07-2020/703.909818.jpg', '[]', '2020-07-17 11:38:17', '2020-08-09 00:34:29'),
(115, 4, 5, 1, 1, 2, 'ORG PENNI RIGATE PASTA 31', 'مكرونة بني ريجاتي 500جرام عضوية', 4, '100', '1', '8003740120313', 1, 0, '0', 'ORG PENNI RIGATE PASTA 31', 'مكرونة بني ريجاتي 500جرام عضوية', 'products/07-2020/476.825216.jpg', '[]', '2020-07-17 11:39:35', '2020-08-09 00:34:27'),
(116, 4, 5, 1, 1, 2, 'ORG FUSILLI 36 PASTA 500GM', 'مكرونة فيوسيلي 500جرام عضوية', 4, '100', '1', '8003740120368', 1, 0, '0', 'ORG FUSILLI 36 PASTA 500GM', 'مكرونة فيوسيلي 500جرام عضوية', 'products/07-2020/119.328826.jpg', '[]', '2020-07-17 11:41:10', '2020-08-09 00:34:23'),
(117, 4, 5, 1, 1, 2, 'ORG WMEAL SPAGT 5 PASTA', 'مكرونة أسباجيت 500جرام قمح كامل عضوي', 10, '100', '1', '8003740125059', 1, 0, '0', 'ORG WMEAL SPAGT 5 PASTA', 'مكرونة أسباجيت 500جرام قمح كامل عضوي', 'products/07-2020/1889.551818.jpg', '[]', '2020-07-17 11:42:31', '2020-08-09 00:34:20'),
(118, 4, 5, 1, 1, 2, 'ORG WHOLEMEAL PRIGATE 31', 'مكرونة بني ريجاتي 500 جرام قمح كامل عضوي', 10, '100', '1', '8003740125318', 1, 0, '0', 'ORG WHOLEMEAL PRIGATE 31', 'مكرونة بني ريجاتي 500 جرام قمح كامل عضوي', 'products/07-2020/435.855839.jpg', '[]', '2020-07-17 11:45:37', '2020-08-09 00:34:17'),
(119, 4, 5, 1, 1, 2, 'ORG WHOLEMEAL FUS 36 PASTA', 'مكرونة فيوسيلي500جرام قمح كامل عضوي', 10, '100', '1', '8003740125363', 1, 0, '0', 'ORG WHOLEMEAL FUS 36 PASTA', 'مكرونة فيوسيلي500جرام قمح كامل عضوي', 'products/07-2020/1068.804892.jpg', '[]', '2020-07-17 11:48:53', '2020-08-09 00:34:15'),
(120, 4, 5, 1, 1, 2, 'GLUTEN FREE SPAG 5 PASTA', 'مكرونة أسباجيتي 500 جرام  خالية من جولتين', 14, '100', '1', '8003740636067', 1, 0, '0', 'GLUTEN FREE SPAG 5 PASTA', 'مكرونة أسباجيتي 500 جرام  خالية من جولتين', 'products/07-2020/880.574728.jpg', '[]', '2020-07-17 11:51:08', '2020-08-09 00:30:20'),
(121, 4, 5, 1, 1, 2, 'GLUFREE PRIGATE 31 PASTA', 'مكرونة بني ريجاتي 500جرام  خالية من جلوتين', 14, '100', '1', '8003740636166', 1, 0, '0', 'GLUFREE PRIGATE 31 PASTA', 'مكرونة بني ريجاتي 500جرام  خالية من جلوتين', 'products/07-2020/1028.747203.jpg', '[]', '2020-07-17 11:52:32', '2020-08-09 00:30:17'),
(122, 4, 5, 1, 1, 2, 'GLUFREE FUSILLI 36 PAST', 'مكرونة فيوسيلي 500جرام خالية من جلوتين', 14, '100', '1', '8003740636265', 1, 0, '0', 'GLUFREE FUSILLI 36 PAST', 'مكرونة فيوسيلي 500جرام خالية من جلوتين', 'products/07-2020/1095.860808.jpg', '[]', '2020-07-17 11:54:04', '2020-08-09 00:30:14'),
(123, 4, 5, 1, 1, 2, 'BAKED ORGVEGGI SNACK', 'سناكس بالخضروات العضوية', 14, '100', '1', '8588004638143', 1, 0, '0', 'BAKED ORGVEGGI SNACK', 'سناكس بالخضروات العضوية', 'products/07-2020/3581.91075.jpg', '[]', '2020-07-17 11:55:33', '2020-08-09 00:30:11'),
(124, 4, 5, 1, 1, 2, 'BAKED ORG POTAT CREAM ONION', 'سناكس بالبطاطس العضوية', 14, '100', '1', '8588004638136', 1, 0, '0', 'BAKED ORG POTAT CREAM ONION', 'سناكس بالبطاطس العضوية', 'products/07-2020/1362.285862.jpg', '[]', '2020-07-17 11:57:21', '2020-08-09 00:30:08'),
(125, 4, 5, 1, 1, 2, 'BAKED ORG POTATO RED PEPPER', 'سناكس البطاطس العضوية مع الفلفل الأحمر', 14, '100', '1', '8588004638112', 1, 0, '0', 'BAKED ORG POTATO RED PEPPER', 'سناكس البطاطس العضوية مع الفلفل الأحمر', 'products/07-2020/212.885393.jpg', '[]', '2020-07-17 11:58:44', '2020-08-09 00:30:05'),
(126, 4, 5, 1, 1, 2, 'COOKIES FOURR PRALIN', 'كوكيز ليمولين محشوة بالبرالين', 26, '100', '1', '3268350120886', 1, 0, '0', 'COOKIES FOURR PRALIN', 'كوكيز ليمولين محشوة بالبرالين', 'products/07-2020/3071.8446.jpg', '[]', '2020-07-17 12:00:37', '2020-09-17 00:25:32'),
(127, 4, 5, 1, 1, 2, 'FROZEN CHICKEN 1000GM', 'دجاج مجمد 1000 جرام', 17, '100', '1', '6281062350065', 1, 0, '0', 'FROZEN CHICKEN 1000GM', 'دجاج مجمد 1000 جرام', 'products/07-2020/2850.28095.jpg', '[]', '2020-07-17 12:02:22', '2020-08-09 00:29:59'),
(128, 4, 5, 1, 1, 2, 'FROZEN CHICKEN 900GM', 'دجاج مجمد 900 جرام', 14, '100', '1', '6281062350072', 1, 0, '0', 'FROZEN CHICKEN 900GM', 'دجاج مجمد 900 جرام', 'products/07-2020/312.081292.jpg', '[]', '2020-07-17 12:03:24', '2020-08-09 00:29:56'),
(129, 4, 5, 1, 1, 2, 'CHK FRANKS PLAIN 375GM', 'نقانق دجاج سادة 375جرام', 7, '100', '1', '6281062351659', 1, 0, '0', 'CHK FRANKS PLAIN 375GM', 'نقانق دجاج سادة 375جرام', 'products/07-2020/2267.199752.jpg', '[]', '2020-07-17 12:08:08', '2020-08-09 00:29:52'),
(130, 4, 5, 1, 1, 2, 'CHICKEN NUGGETS 400GM', 'قطع دجاج سادة ( ناجتس) 400جرام', 11, '100', '1', '6281062351482', 1, 0, '0', 'CHICKEN NUGGETS 400GM', 'قطع دجاج سادة ( ناجتس) 400جرام', 'products/07-2020/1537.277686.jpg', '[]', '2020-07-17 12:09:24', '2020-08-09 00:29:29'),
(131, 4, 5, 1, 1, 2, 'BROWN SUGAR ORG 1KG', 'سكر بنى عضوي 1 كجم', 13, '100', '1', '6287018650067', 1, 0, '0', 'BROWN SUGAR ORG 1KG', 'أورجانتي سكر بنى عضوي 1 كجم', 'products/07-2020/83.231624.jpg', '[]', '2020-07-17 12:11:33', '2020-08-09 00:29:25'),
(132, 4, 5, 1, 1, 2, 'CHIA SEEDS NATGR500G', 'بذور الشيا 500 غرام', 40, '100', '1', '8436542193290', 1, 0, '0', 'CHIA SEEDS NATGR500G', 'بذور الشيا 500 غرام', 'products/07-2020/1014.858528.jpg', '[]', '2020-07-17 12:13:18', '2020-08-09 00:29:21'),
(133, 4, 5, 1, 1, 2, 'NAIMI 15-18 KG', 'خروف نعيمي 15-18 كيلو', 1351, '100', '1', '6281062512142', 1, 0, '0', 'HERVY 15-18 KG - NAIM - Male FRESH CHOPPED', 'خروف نعيمي هرفي الوطنية 15-18 كيلو طازج تقطيع ثلاجة', 'products/07-2020/1847.17815.jpg', '[]', '2020-07-17 12:15:06', '2020-08-31 21:07:24'),
(136, 4, 5, 1, 1, 2, 'HALF NAIMI 7.5-9 KG', 'نصف نعيمي 7.5-9 كيلو', 676, '100', '1', '6281062512142', 1, 0, '0', 'HALF NAIM  7.5-9 KG - Male FRESH CHOPPED', 'نصف خروف نعيمي الوطنية 7.5-9 كيلو طازج تقطيع ثلاجة', 'products/07-2020/1135.322221.jpg', '[]', '2020-07-17 12:19:09', '2020-08-31 21:07:14'),
(139, 4, 5, 1, 1, 2, 'Camel Meat w-bones', 'لحم حاشي بالعظم - 1كج', 67, '100', '1', '6281062512012', 1, 0, '0', 'Camel Meat w-bones', 'لحم حاشي بالعظم - 1كج', 'products/07-2020/210.7696.jpg', '[]', '2020-07-17 12:24:54', '2020-08-09 00:28:57'),
(140, 4, 5, 1, 1, 2, 'Golden Myrrh extract 380 mg', 'عشبة المره 380 ملغ', 33, '100', '1', '941576769', 1, 0, '0', '380 mg', '380 ملغ', 'products/09-2020/714.4665.jpg', '[]', '2020-09-16 21:20:03', '2020-09-16 21:20:03'),
(141, 4, 5, 1, 1, 2, 'CINNAMON EXTRACT 0.38 GM', 'عشبة القرفه  0.38 غرام', 22, '100', '1', '941631881', 1, 0, '0', '0.38 GM', '0.38 غرام', 'products/09-2020/2002.391928.jpg', '[]', '2020-09-16 21:28:53', '2020-09-30 09:13:58'),
(142, 4, 5, 1, 1, 2, 'MINERAL WATER 1 LT', 'كيسياك مياه معدنية غازية طبيعية 1 لتر', 9, '100', '1', '3871059000016', 1, 0, '0', '1 LT', '1 لتر', 'products/09-2020/594.937296.jpg', '[]', '2020-09-16 21:43:10', '2020-09-16 21:43:10'),
(143, 4, 5, 1, 1, 2, 'MINERAL WATER 250 ML', 'كيسياك - مياه معدنية غازية طبيعية 250 مل', 5, '100', '1', '3871059000108', 1, 0, '0', '250 ML', '250 مل', 'products/09-2020/2079.844126.jpg', '[]', '2020-09-16 21:44:33', '2020-09-16 21:44:33'),
(144, 4, 5, 1, 1, 2, 'BOSNIA FOREST HONEY 900 gm', 'عسل الغابة البوسني 900 غرام', 229, '100', '1', '3872011000075', 1, 0, '0', '900 gm', '900 غرام', 'products/09-2020/133.305216.jpg', '[]', '2020-09-16 22:16:00', '2020-09-16 22:16:00'),
(145, 4, 5, 1, 1, 2, 'CURCULIND 38 GM', 'مسحوق الكركم 38 غرام', 23, '100', '1', '6285343003763', 1, 0, '0', '38 GM', '38 غرام', 'products/09-2020/98.82671.jpg', '[]', '2020-09-16 22:19:22', '2020-09-17 00:10:45'),
(146, 4, 5, 1, 1, 2, 'ORGANIC COWS MILK  UHT1 LT', 'حليب أبقار عضوي 1 لتر', 14, '100', '1', '6287007760029', 1, 0, '0', 'ORGANIC COWS MILK  UHT1 LT', 'حليب أبقار عضوي 1 لتر', 'products/09-2020/42.86615.jpg', '[]', '2020-09-16 22:23:14', '2020-09-17 00:10:22'),
(147, 4, 5, 1, 1, 2, 'ORGANIC CHIA SEEDS 500 GM', 'بذور الشيا عضوي 500 غرام', 44, '100', '1', '6287007760050', 1, 0, '0', 'ORGANIC CHIA SEEDS 500 GM', 'بذور الشيا عضوي 500 غرام', 'products/09-2020/2126.7144.jpg', '[]', '2020-09-16 22:28:36', '2020-09-16 22:28:36'),
(148, 4, 5, 1, 1, 2, 'ORGANIC STRAWBERRY JUICE 1 LT', 'عصير الفراولة باللب عضوي 1 لتر', 32, '100', '1', '6287007760098', 1, 0, '0', 'ORGANIC STRAWBERRY JUICE 1 LT', 'عصير الفراولة باللب عضوي 1 لتر', 'products/09-2020/924.48294.jpg', '[]', '2020-09-16 22:31:51', '2020-09-16 22:31:51'),
(149, 4, 5, 1, 1, 2, 'ORGANIC MANGO JUICE  1 LT', 'عصير المانجو عضوي 1 لتر', 32, '100', '1', '6287007760111', 1, 0, '0', 'ORGANIC MANGO JUICE  1 LT', 'عصير المانجو عضوي 1 لتر', 'products/09-2020/914.99661.jpg', '[]', '2020-09-16 22:39:59', '2020-09-16 22:39:59'),
(150, 4, 5, 1, 1, 2, 'ORGANIC BEETROOT JUICE 1 LT', 'عصير الشمندر عضوي 1 لتر', 37, '100', '1', '6287007760135', 1, 0, '0', 'ORGANIC BEETROOT JUICE 1 LT', 'عصير الشمندر عضوي 1 لتر', 'products/09-2020/148.328242.jpg', '[]', '2020-09-16 22:41:10', '2020-09-16 22:41:10'),
(151, 4, 5, 1, 1, 2, 'ORGANIC POMEGRANATE JUICE 1 LT', 'عصير الرمان العضوي 1 لتر', 37, '100', '1', '6287007760166', 1, 0, '0', 'ORGANIC POMEGRANATE JUICE 1 LT', 'عصير الرمان العضوي 1 لتر', 'products/09-2020/3620.026672.jpg', '[]', '2020-09-16 22:42:03', '2020-09-16 22:42:03'),
(152, 4, 5, 1, 1, 2, 'ORGANIC VEG BROTH POWDER 125GM', 'خلاصة شوربة الخضار عضوي 125غرام', 25, '100', '1', '6287007760173', 1, 0, '0', 'ORGANIC VEG BROTH POWDER 125GM', 'خلاصة شوربة الخضار عضوي 125غرام', 'products/09-2020/263.26685.jpg', '[]', '2020-09-16 22:44:41', '2020-09-17 00:09:43'),
(153, 4, 5, 1, 1, 2, 'ORGANIC CHECKIN BROTH 66 GM', 'مرقة الدجاج عضوي 66 غرام', 14, '100', '1', '6287007760180', 1, 0, '0', 'ORGANIC CHECKIN BROTH 66 GM', 'مرقة الدجاج عضوي 66 غرام', 'products/09-2020/4514.224098.jpg', '[]', '2020-09-16 22:47:34', '2020-09-16 22:47:34'),
(154, 4, 5, 1, 1, 2, 'ORGANIC VEG BROTH 66 GM', 'مكعبات مرقة الخضار عضوي 66 غرام', 14, '100', '1', '6287007760197', 1, 0, '0', 'ORGANIC VEG BROTH 66 GM', 'مكعبات مرقة الخضار عضوي 66 غرام', 'products/09-2020/1838.703907.jpg', '[]', '2020-09-16 22:50:56', '2020-09-16 22:50:56'),
(155, 4, 5, 1, 1, 2, 'ORGANIC PAPRIKA SWEET 150 GM', 'بابريكا عضوي 150 غرام', 32, '100', '1', '6287007760319', 1, 0, '0', 'ORGANIC PAPRIKA SWEET 150 GM', 'بابريكا عضوي 150 غرام', 'products/09-2020/356.162184.jpg', '[]', '2020-09-16 23:57:35', '2020-09-17 00:09:25'),
(156, 4, 5, 1, 1, 2, 'ORGANIC BROCCOLI SOUP 200 GM', 'شوربة بروكلي بالشوفان عضوي 200 غرام', 37, '100', '1', '6287007760524', 1, 0, '0', 'ORGANIC BROCCOLI SOUP 200 GM', 'شوربة بروكلي بالشوفان عضوي 200 غرام', 'products/09-2020/2.635136.png', '[]', '2020-09-17 00:00:06', '2020-09-17 00:09:16'),
(157, 4, 5, 1, 1, 2, 'ORGANIC MUSHROOM SOUP 200 GM', 'شوربة الفطر بالشوفان عضوي 200 غرام', 37, '100', '1', '6287007760531', 1, 0, '0', 'ORGANIC MUSHROOM SOUP 200 GM', 'شوربة الفطر بالشوفان عضوي 200 غرام', 'products/09-2020/1108.77732.png', '[]', '2020-09-17 00:02:14', '2020-09-17 00:09:08'),
(158, 4, 5, 1, 1, 2, 'ORGANIC BLACK SEED OIL 100 ML', 'زيت الحبة السوداء عضوي 100 مل', 64, '100', '1', '6287007760555', 1, 0, '0', 'ORGANIC BLACK SEED OIL 100 ML', 'زيت الحبة السوداء عضوي 100 مل', 'products/09-2020/2477.88172.JPG', '[]', '2020-09-17 00:04:18', '2020-09-17 00:04:18'),
(159, 4, 5, 1, 1, 2, 'ORGANIC ARGAN OIL 100 ML', 'زيت الأرقان عضوي 100 مل', 51, '100', '1', '6287007760562', 1, 0, '0', 'ORGANIC ARGAN OIL 100 ML', 'زيت الأرقان عضوي 100 مل', 'products/09-2020/3063.110967.jpg', '[]', '2020-09-17 00:05:23', '2020-09-17 00:05:23'),
(160, 4, 5, 1, 1, 2, 'ORGANIC ALMOND OIL 100 ML', 'زيت اللوز عضوي 100 مل', 64, '100', '1', '6287007760579', 1, 0, '0', 'ORGANIC ALMOND OIL 100 ML', 'زيت اللوز عضوي 100 مل', 'products/09-2020/149.437946.jpg', '[]', '2020-09-17 00:06:17', '2020-09-17 00:06:17'),
(161, 4, 5, 1, 1, 2, 'ORGANIC AVOCADO OIL 100 ML', 'زيت الأفوكادو عضوي 100 مل', 51, '100', '1', '6287007760609', 1, 0, '0', 'ORGANIC AVOCADO OIL 100 ML', 'زيت الأفوكادو عضوي 100 مل', 'products/09-2020/2745.948123.jpg', '[]', '2020-09-17 00:07:02', '2020-09-17 00:07:02'),
(162, 4, 5, 1, 1, 2, 'WHOLDURUM WHEAT MAC 500gm', 'معكرونة القمح الكامل عضوي 500 غرام', 15, '100', '1', '6287007760654', 1, 0, '0', 'WHOLDURUM WHEAT MAC 500gm', 'معكرونة القمح الكامل عضوي 500 غرام', 'products/09-2020/1116.863352.jpg', '[]', '2020-09-17 00:13:25', '2020-09-17 00:13:25'),
(163, 4, 5, 1, 1, 2, 'ORGANIC MARJORAM 100 GM', 'مردقوش عضوي 100 غرام', 28, '100', '1', '6287007760760', 1, 0, '0', 'ORGANIC MARJORAM 100 GM', 'مردقوش عضوي 100 غرام', 'products/09-2020/2153.80361.jpg', '[]', '2020-09-17 00:15:34', '2020-09-17 00:15:34'),
(164, 4, 5, 1, 1, 2, 'ORGANIC ROSEMARY 100 GM', 'إكليل الجبل عضوي 100 غرام', 30, '100', '1', '6287007760777', 1, 0, '0', 'ORGANIC ROSEMARY 100 GM', 'إكليل الجبل عضوي 100 غرام', 'products/09-2020/568.991812.jpg', '[]', '2020-09-17 00:17:22', '2020-09-17 00:17:22'),
(165, 4, 5, 1, 1, 2, 'ORGANIC CHAMOMILE 100 GM', 'بابونج عضوي 100 غرام', 30, '100', '1', '6287007760814', 1, 0, '0', 'ORGANIC CHAMOMILE 100 GM', 'بابونج عضوي 100 غرام', 'products/09-2020/1875.719292.jpg', '[]', '2020-09-17 00:19:10', '2020-09-17 00:19:10'),
(166, 4, 5, 1, 1, 2, 'ORGANIC BLACK PPEPPER WHOLE 150 GM', 'فلفل اسود حبة كاملة عضوي 150 غرام', 32, '100', '1', '6287007760852', 1, 0, '0', 'ORGANIC BLACK PPEPPER WHOLE 150 GM', 'فلفل اسود حبة كاملة عضوي 150 غرام', 'products/09-2020/340.132338.jpg', '[]', '2020-09-17 00:21:00', '2020-09-17 00:21:00'),
(167, 4, 5, 1, 1, 2, 'ORGANIC BIO BLACK PAPPER MILLED 150 GM', 'فلفل اسود مطحون عضوي 150 غرام', 32, '100', '1', '6287007760869', 1, 0, '0', 'ORGANIC BIO BLACK PAPPER MILLED 150 GM', 'فلفل اسود مطحون عضوي 150 غرام', 'products/09-2020/994.67544.jpg', '[]', '2020-09-17 00:22:39', '2020-09-17 00:22:39'),
(168, 4, 5, 1, 1, 2, 'ORGANIC CHANDLER SLICES 340 gm', 'شرائح الشمندر عضوي 340 غرام', 25, '100', '1', '6287007761019', 1, 0, '0', 'ORGANIC CHANDLER SLICES 340 gm', 'شرائح الشمندر عضوي 340 غرام', 'products/09-2020/547.7525.jpg', '[]', '2020-09-17 00:24:42', '2020-09-17 00:24:42'),
(169, 4, 5, 1, 1, 2, 'ORGANIC OLIVE OIL 500 ML', 'زيت زيتون بكر عضوي 500 مل', 30, '100', '1', '6287007761101', 1, 0, '0', 'ORGANIC OLIVE OIL 500 ML', 'زيت زيتون بكر عضوي 500 مل', 'products/09-2020/731.136052.JPG', '[]', '2020-09-17 00:26:35', '2020-09-17 00:26:35'),
(170, 4, 5, 1, 1, 2, 'ORGANIC SWEET CORN 230gm', 'ذرة حلوة عضوي 230 غرام', 21, '100', '1', '6287007761156', 1, 0, '0', 'ORGANIC SWEET CORN 230gm', 'ذرة حلوة عضوي 230 غرام', 'products/09-2020/3809.392719.png', '[]', '2020-09-17 00:28:46', '2020-09-17 00:28:46'),
(171, 4, 5, 1, 1, 2, 'ORGANIC MAYONAISE 330 GM', 'مايونيز عضوي 330 غرام', 30, '100', '1', '6287007761187', 1, 0, '0', 'ORGANIC MAYONAISE 330 GM', 'مايونيز عضوي 330 غرام', 'products/09-2020/219.486938.jpg', '[]', '2020-09-17 00:30:17', '2020-09-17 00:30:17'),
(172, 4, 5, 1, 1, 2, 'ORGANIC CACESAR DRESSING 325 GM', 'صلصة السيزر عضوي 325 غرام', 28, '100', '1', '6287007761194', 1, 0, '0', 'ORGANIC CACESAR DRESSING 325 GM', 'صلصة السيزر عضوي 325 غرام', 'products/09-2020/1838.954535.jpg', '[]', '2020-09-17 00:33:07', '2020-09-17 00:33:07'),
(173, 4, 5, 1, 1, 2, 'ORGANIC GARLIC SAUCEOR230 GM', 'صلصة الثوم عضوي230 غرام', 30, '100', '1', '6287007761200', 1, 0, '0', 'ORGANIC GARLIC SAUCEOR230 GM', 'صلصة الثوم عضوي230 غرام', 'products/09-2020/150.473179.png', '[]', '2020-09-17 00:39:06', '2020-09-17 00:39:06'),
(174, 4, 5, 1, 1, 2, 'ORGANIC MUSTARD SAUCE 200 GM', 'صلصة الخردل عضوي 200 غرام', 25, '100', '1', '6287007761217', 1, 0, '0', 'ORGANIC MUSTARD SAUCE 200 GM', 'صلصة الخردل عضوي 200 غرام', 'products/09-2020/1473.993801.png', '[]', '2020-09-17 00:42:25', '2020-09-17 00:42:25'),
(175, 4, 5, 1, 1, 2, 'ORGANIC CURRY SAUCE 230 GM', 'صلصة الكاري عضوي 230 غرام', 30, '100', '1', '6287007761224', 1, 0, '0', 'ORGANIC CURRY SAUCE 230 GM', 'صلصة الكاري عضوي 230 غرام', 'products/09-2020/531.02451.png', '[]', '2020-09-17 00:44:07', '2020-09-17 00:44:07'),
(176, 4, 5, 1, 1, 2, 'ORGANIC CARROT  PICKLES 350 gm', 'مخلل الجزر عضوي 350 غرام', 25, '100', '1', '6287007761248', 1, 0, '0', 'ORGANIC CARROT  PICKLES 350 gm', 'مخلل الجزر عضوي 350 غرام', 'products/09-2020/1030.548744.jpg', '[]', '2020-09-17 00:45:39', '2020-09-17 00:46:05'),
(177, 4, 5, 1, 1, 2, 'ORGANIC SAGE LEAVES 100 GM', 'ميرامية عضوي 100 غرام', 30, '100', '1', '6287007761279', 1, 0, '0', 'ORGANIC SAGE LEAVES 100 GM', 'ميرامية عضوي 100 غرام', 'products/09-2020/1680.416878.jpg', '[]', '2020-09-17 00:47:27', '2020-09-17 00:47:27'),
(178, 4, 5, 1, 1, 2, 'HIMALAYAN SALT 1 KG', 'ملح الهيملايا ناعم 1 كغم', 28, '100', '1', '6287007761330', 1, 0, '0', 'HIMALAYAN SALT 1 KG', 'ملح الهيملايا ناعم 1 كغم', 'products/09-2020/183.854382.jpg', '[]', '2020-09-17 01:02:23', '2020-09-17 01:02:23'),
(179, 4, 5, 1, 1, 2, 'ORGANIC APPLE CIDER VINEGAR 500 ml', 'خل التفاح إيطالي عضوي 500 مل', 28, '100', '1', '6287007761378', 1, 0, '0', 'ORGANIC APPLE CIDER VINEGAR 500 ml', 'خل التفاح إيطالي عضوي 500 مل', 'products/09-2020/313.1073.jpg', '[]', '2020-09-17 01:07:55', '2020-09-17 01:07:55'),
(180, 4, 5, 1, 1, 2, 'ORGANIC TURMERIC 150 GM', 'كركم عضوي 150 غرام', 32, '100', '1', '6287007761422', 1, 0, '0', 'ORGANIC TURMERIC 150 GM', 'كركم عضوي 150 غرام', 'products/09-2020/626.107126.jpg', '[]', '2020-09-17 01:09:44', '2020-09-17 01:09:44'),
(181, 4, 5, 1, 1, 2, 'ORGANIC GINGER POWDER 150 GM', 'زنجبيل مطحون عضوي 150 غرام', 30, '100', '1', '6287007761439', 1, 0, '0', 'ORGANIC GINGER POWDER 150 GM', 'زنجبيل مطحون عضوي 150 غرام', 'products/09-2020/421.76454.jpg', '[]', '2020-09-17 01:10:47', '2020-09-17 01:12:34'),
(182, 4, 5, 1, 1, 2, 'ORGANIC CUMIN SEEDS 150GM', 'كمون حبة كاملة عضوي 150 غرام', 32, '100', '1', '6287007761606', 1, 0, '0', 'ORGANIC CUMIN SEEDS 150GM', 'كمون حبة كاملة عضوي 150 غرام', 'products/09-2020/445.507824.jpg', '[]', '2020-09-17 01:14:26', '2020-09-17 01:19:32'),
(183, 4, 5, 1, 1, 2, 'ORGANIC CUMIN SEED POWDER 150 GM', 'كمون مطحون عضوي 150 غرام', 32, '100', '1', '6287007761613', 1, 0, '0', 'ORGANIC CUMIN SEED POWDER 150 GM', 'كمون مطحون عضوي 150 غرام', 'products/09-2020/803.978685.jpg', '[]', '2020-09-17 01:16:15', '2020-09-17 01:19:23'),
(184, 4, 5, 1, 1, 2, 'ORGANIC CHILI POWDER 150 GM', 'فلفل احمر بودرة عضوي 150 غرام', 30, '100', '1', '6287007761620', 1, 0, '0', 'ORGANIC CHILI POWDER 150 GM', 'فلفل احمر بودرة عضوي 150 غرام', 'products/09-2020/4140.865804.JPG', '[]', '2020-09-17 01:19:12', '2020-09-17 01:19:12'),
(185, 4, 5, 1, 1, 2, 'ORGANIC CUCUMBER PICKLES 680 GM', 'مخلل خيار عضوي 680 غرام', 32, '100', '1', '6287007761675', 1, 0, '0', 'ORGANIC CUCUMBER PICKLES 680 GM', 'مخلل خيار عضوي 680 غرام', 'products/09-2020/560.603879.jpg', '[]', '2020-09-17 01:21:23', '2020-09-17 01:21:23'),
(186, 4, 5, 1, 1, 2, 'ORGANIC PASTA SAUCE 350 GM', 'صلصة المعكرونة عضوي 350 غرام', 25, '100', '1', '6287007761699', 1, 0, '0', 'ORGANIC PASTA SAUCE 350 GM', 'صلصة المعكرونة عضوي 350 غرام', 'products/09-2020/125.83389.jpg', '[]', '2020-09-17 01:22:45', '2020-09-17 01:22:45'),
(187, 4, 5, 1, 1, 2, 'ORGANIC SESAME TAHINI 500 GM', 'طحينة السمسم عضوي  500 غرام', 44, '100', '1', '6287007761705', 1, 0, '0', 'ORGANIC SESAME TAHINI 500 GM', 'طحينة السمسم عضوي  500 غرام', 'products/09-2020/2530.5315.jpg', '[]', '2020-09-17 01:25:09', '2020-09-17 01:25:09'),
(188, 4, 5, 1, 1, 2, 'ORGANIC HIBISCUS 100 GM', 'كركديه عضوي 100 غرام', 30, '100', '1', '6287007761804', 1, 0, '0', 'ORGANIC HIBISCUS 100 GM', 'كركديه عضوي 100 غرام', 'products/09-2020/155.735944.jpg', '[]', '2020-09-17 01:30:04', '2020-09-17 01:30:04'),
(189, 4, 5, 1, 1, 2, 'ORGANIC CINAMON CEYLON 150GM', 'قرفة سيلانيه مطحونه عضوي 150 غرام', 32, '100', '1', '6287007761835', 1, 0, '3', 'ORGANIC CINAMON CEYLON 150GM', 'قرفة سيلانيه مطحونه عضوي 150 غرام', 'products/09-2020/2719.161781.jpg', '[]', '2020-09-17 01:32:03', '2020-11-24 18:22:26'),
(190, 4, 5, 1, 1, 2, 'ORGANIC KETCHUP 200 GM', 'كاتشب عضوي 200 غرام', 29, '100', '1', '6287007761989', 1, 0, '0', 'ORGANIC KETCHUP200 GM', 'كاتشب عضوي 200 غرام', 'products/09-2020/750.680084.jpg', '[]', '2020-09-17 01:33:39', '2020-09-17 01:33:39'),
(191, 4, 5, 1, 1, 2, 'LAND COCONUT WATER 330ML', 'ماء جوز الهند  350 مل', 14, '100', '1', '6287010580430', 1, 0, '0', 'LAND COCONUT WATER 330ML', 'ماء جوز الهند  350 مل', 'products/09-2020/846.99854.jpg', '[]', '2020-09-17 01:35:39', '2020-09-17 01:35:39'),
(192, 4, 5, 1, 1, 2, 'ORGLAND Vegetable Broth 140gm', 'عضوي خلاصة شوربة الخضار 140 غرام', 23, '100', '1', '6287010580683', 1, 0, '0', 'ORGLAND Vegetable Broth 140gm', 'خلاصة شوربة الخضار عضوي 140 غرام', 'products/09-2020/2923.88974.jpg', '[]', '2020-09-17 01:38:47', '2020-10-09 00:42:45'),
(193, 4, 5, 1, 1, 2, 'ORGLAND CHICKEN BROTH 140gm', 'عضوي خلاصة شوربة الدجاج 140 غرام', 23, '100', '1', '6287010580690', 1, 0, '0', 'ORGLAND CHICKEN BROTH 140gm', 'عضوي خلاصة شوربة الدجاج 140 غرام', 'products/09-2020/1682.90982.jpg', '[]', '2020-09-17 01:42:15', '2020-09-17 01:42:15'),
(194, 4, 5, 1, 1, 2, 'Biscuite fibre biscuit  Sugar free', 'بسكويت الحبوب الأربعة خالي من السكر', 6, '100', '1', '8410376009392', 1, 0, '0', 'Biscuite fibre biscuit  Sugar free', 'بسكويت الحبوب الأربعة خالي من السكر', 'products/09-2020/1045.975792.jpg', '[]', '2020-09-17 01:57:24', '2020-09-17 01:57:24'),
(195, 4, 5, 1, 1, 2, 'DORADAS NO FORNO', 'بسكويت بدون سكر دوردا', 9, '100', '1', '8410376009408', 1, 0, '0', 'DORADAS NO FORNO', 'بسكويت بدون سكر دوردا', 'products/09-2020/270.25544.jpg', '[]', '2020-09-17 01:58:09', '2020-09-17 01:58:09'),
(196, 4, 5, 1, 1, 2, 'MARIA DIET NATURE BISCUITS 400 GM', 'بسكويت ماريا بدون سكر  ملحى 400 غرام', 8, '100', '1', '8410376010701', 1, 0, '0', 'MARIA DIET NATURE BISCUITS 400 GM', 'بسكويت ماريا بدون سكر  ملحى 400 غرام', 'products/09-2020/892.270214.jpg', '[]', '2020-09-17 02:00:30', '2020-09-17 02:00:30'),
(197, 4, 5, 1, 1, 2, 'Minichoco Gluteen free', 'ميني شوكو خالي من الجلوتين', 9, '100', '1', '8410376017342', 1, 0, '0', 'Minichoco Gluteen free', 'ميني شوكو خالي من الجلوتين', 'products/09-2020/2463.46672.jpg', '[]', '2020-09-17 02:02:07', '2020-09-17 02:02:07'),
(198, 4, 5, 1, 1, 2, 'COKIES GLUTEN FREE', 'كوكيز خالي من الجلوتين', 8, '100', '1', '8410376017359', 1, 0, '0', 'COKIES GLUTEN FREE', 'كوكيز خالي من الجلوتين', 'products/09-2020/348.285708.jpg', '[]', '2020-09-17 02:03:02', '2020-09-17 02:03:02'),
(199, 4, 5, 1, 1, 2, 'BARQUILL DE VAINILLA', 'بسكويت ويفر فانيلا', 8, '100', '1', '8410376017694', 1, 0, '0', 'BARQUILL DE VAINILLA', 'بسكويت ويفر فانيلا', 'products/09-2020/1864.06342.jpg', '[]', '2020-09-17 02:09:02', '2020-09-17 02:09:02'),
(200, 4, 5, 1, 1, 2, 'MARIA BIO BISCUIT 350GM', 'بسكويت ماريا عضوي 350 جرام', 12, '100', '1', '8410376022476', 1, 0, '0', 'MARIA BIO BISCUIT 350GM', 'بسكويت ماريا عضوي 350 جرام', 'products/09-2020/713.671497.jpg', '[]', '2020-09-17 02:44:32', '2020-09-17 02:44:32'),
(201, 4, 5, 1, 1, 2, 'digestive Biscuite  Sugar free', 'بسكويت ديجستف خالي من السكر', 10, '100', '1', '8410376023831', 1, 0, '0', 'digestive Biscuite  Sugar free', 'بسكويت ديجستف خالي من السكر', 'products/09-2020/1043.327461.jpg', '[]', '2020-09-17 02:50:22', '2020-09-17 02:50:22'),
(202, 4, 5, 1, 1, 2, 'DAR CHOCLATE DIGESTIVE 270G', 'ديجيستيف بسكويت بالشوكلا بدون سكر محلى', 9, '100', '1', '8410376024326', 1, 0, '0', 'DAR CHOCLATE DIGESTIVE 270G', 'ديجيستيف بسكويت بالشوكلا بدون سكر محلى', 'products/09-2020/57.04781.jpg', '[]', '2020-09-17 02:51:09', '2020-09-17 02:51:09'),
(203, 4, 5, 1, 1, 2, 'RONDITAS DN 186 GM', 'بكسويت شوكلاتة دوائر بدون سكر 186 غرام', 10, '100', '1', '8410376029079', 1, 0, '0', 'RONDITAS DN 186 GM', 'بكسويت شوكلاتة دوائر بدون سكر 186 غرام', 'products/09-2020/937.6686.jpg', '[]', '2020-09-17 02:52:05', '2020-09-17 02:52:05'),
(204, 4, 5, 1, 1, 2, 'MARIA DOURADA 400GM', 'بسكويت بدون سكر ماريا حبوب الكامله  400 جم', 9, '100', '1', '8410376033649', 1, 0, '0', 'MARIA DOURADA 400GM', 'بسكويت بدون سكر ماريا حبوب الكامله  400 جم', 'products/09-2020/1861.866206.jpg', '[]', '2020-09-17 02:52:41', '2020-09-17 02:52:41'),
(205, 4, 5, 1, 1, 2, 'BIS SANDW CHOCOLA 250 gm', 'بسكويت ساندوتش بالكاكاو بدون اضافة سكر محلى', 8, '100', '1', '8410376037784', 1, 0, '0', 'BIS SANDW CHOCOLA 250 gm', 'بسكويت ساندوتش بالكاكاو بدون اضافة سكر محلى', 'products/09-2020/1770.583764.jpg', '[]', '2020-09-17 02:56:32', '2020-09-17 02:56:32'),
(206, 4, 5, 1, 1, 2, 'CHIPS CHOCO SIN GLUTEN FREE', 'كوكييز بالشوكلا خالي من الجلوتين', 7, '100', '1', '8410376037883', 1, 0, '0', 'CHIPS CHOCO SIN GLUTEN FREE', 'كوكييز بالشوكلا خالي من الجلوتين', 'products/09-2020/179.03686.jpg', '[]', '2020-09-17 02:57:55', '2020-09-17 02:57:55'),
(207, 4, 5, 1, 1, 2, 'OATS BISCUIT WITH RIC 265GM', 'بسكويت الحبوب الكاملة ومقرمشات الارز والذرة', 7, '100', '1', '8410376039375', 1, 0, '0', 'OATS BISCUIT WITH RIC 265GM', 'بسكويت الحبوب الكاملة ومقرمشات الارز والذرة', 'products/09-2020/724.912704.png', '[]', '2020-09-17 02:59:16', '2020-09-17 02:59:16'),
(208, 4, 5, 1, 1, 2, 'OATS BISCUIT TRADIZ 280GM', 'بسكويت مع رقائق الشوفان 280 جرام', 6, '100', '1', '8410376039986', 1, 0, '0', 'OATS BISCUIT TRADIZ 280GM', 'بسكويت مع رقائق الشوفان 280 جرام', 'products/09-2020/484.55727.png', '[]', '2020-09-17 03:01:16', '2020-09-17 03:01:16'),
(209, 4, 5, 1, 1, 2, 'BISC SAND WITH YOGHURT 220GM', 'بسكويت بدون اضافة سكر محشو بالزبدة  محلى', 10, '100', '1', '8410376042481', 1, 0, '0', 'BISC SAND WITH YOGHURT 220GM', 'بسكويت بدون اضافة سكر محشو بالزبدة  محلى', 'products/09-2020/612.657408.jpg', '[]', '2020-09-17 03:06:10', '2020-09-17 03:06:10'),
(210, 4, 5, 1, 1, 2, 'BISCUIT CEREALS', 'بسكويت  بدون اضافة سكر   محلى', 10, '100', '1', '8410376042498', 1, 0, '0', 'BISCUIT CEREALS', 'بسكويت  بدون اضافة سكر   محلى', 'products/09-2020/131.071326.jpg', '[]', '2020-09-17 03:07:41', '2020-09-17 03:07:41'),
(211, 4, 5, 1, 1, 2, 'OATS BISCUIT CHIP 240GM', 'كوكيز شوفان مع قطع شوكلا  240 جرام', 9, '100', '1', '8410376042504', 1, 0, '0', 'OATS BISCUIT CHIP 240GM', 'كوكيز شوفان مع قطع شوكلا  240 جرام', 'products/09-2020/839.401332.jpg', '[]', '2020-09-17 03:16:31', '2020-09-17 03:16:31'),
(212, 4, 5, 1, 1, 2, 'OATS SANDWITCH SREM 220gm', 'بسكويت شوفان محشو بالبندق 220 جرام', 8, '100', '1', '8410376042894', 1, 0, '0', 'OATS SANDWITCH SREM 220gm', 'بسكويت شوفان محشو بالبندق 220 جرام', 'products/09-2020/300.702655.jpg', '[]', '2020-09-17 21:39:32', '2020-09-17 21:39:32'),
(213, 4, 5, 1, 1, 2, 'TWIN SANDWITCHCREM 210gm', 'بسكويت كاكاو فانيلاتوين بدون سكر محلى', 10, '100', '1', '8410376044393', 1, 0, '0', 'TWIN SANDWITCHCREM 210gm', 'بسكويت كاكاو فانيلاتوين بدون سكر محلى', 'products/09-2020/116.0243.jpg', '[]', '2020-09-17 21:42:27', '2020-09-17 21:42:27'),
(214, 4, 5, 1, 1, 2, 'CRACKERS GLUTEN FREE', 'بسكويت مملح خالي من الجلوتين', 8, '100', '1', '8410376045017', 1, 0, '0', 'CRACKERS GLUTEN FREE', 'بسكويت مملح خالي من الجلوتين', 'products/09-2020/402.938025.jpg', '[]', '2020-09-17 21:43:09', '2020-09-17 21:43:09'),
(215, 4, 5, 1, 1, 2, 'DIGESTIV  GLUTEN FREE', 'بسكويت ديجيستيف خالي من الجلوتين', 7, '100', '1', '', 1, 0, '0', 'DIGESTIV  GLUTEN FREE', 'بسكويت ديجيستيف خالي من الجلوتين', 'products/09-2020/2771.42415.jpg', '[]', '2020-09-17 21:43:44', '2020-09-17 21:43:44'),
(216, 4, 5, 1, 1, 2, 'Granti Organic Apple Juice 1L', 'قرانتي عصير تفاح عضوي 1لتر', 11, '100', '1', '', 1, 0, '0', 'Granti Organic Apple Juice 1L', 'قرانتي عصير تفاح عضوي 1لتر', 'products/09-2020/1557.370656.png', '[]', '2020-09-17 21:45:34', '2020-09-17 21:45:34'),
(217, 4, 5, 1, 1, 2, 'Granti Organic Mixed Juice 200ml', 'قرانتي عصير مشكل عضوي 200مل', 3, '100', '1', '', 1, 0, '0', 'Granti Organic Mixed Juice 200ml', 'قرانتي عصير مشكل عضوي 200مل', 'products/09-2020/1417.047995.jpg', '[]', '2020-09-17 21:46:12', '2020-09-17 21:46:12');
INSERT INTO `products` (`id`, `city_id`, `branch_id`, `user_id`, `category_id`, `subcategory_id`, `product_name`, `product_name_ar`, `product_price`, `total_quantity`, `product_number`, `barcode`, `product_unit`, `discount`, `views`, `product_details`, `product_details_ar`, `product_main_image`, `product_images`, `created_at`, `updated_at`) VALUES
(218, 4, 5, 1, 1, 2, 'OATS MINI BISCUIT DIGES 225GM', 'بسكويت شوفان ميني اكياس 225جرام', 6, '100', '1', '', 1, 0, '0', 'OATS MINI BISCUIT DIGES 225GM', 'بسكويت شوفان ميني اكياس 225جرام', 'products/09-2020/1869.24689.jpg', '[]', '2020-09-17 21:48:19', '2020-09-17 21:48:19'),
(219, 4, 5, 1, 1, 2, 'TWIN SANDWITCH CREAM 45GM', 'بسكويت كاكاو توين فانيلا بدون سكر محلى', 2, '100', '1', '', 1, 0, '0', 'TWIN SANDWITCH CREAM 45GM', 'بسكويت كاكاو توين فانيلا بدون سكر محلى', 'products/09-2020/1851.938352.jpg', '[]', '2020-09-17 21:49:18', '2020-09-17 21:49:18'),
(221, 4, 5, 1, 1, 2, 'TWIN SANDWITCH CREAM 147GM', 'بسكويت كاكاو فانيلاتوين بدون سكر محلى', 8, '100', '1', '', 1, 0, '0', 'TWIN SANDWITCH CREAM 147GM', 'بسكويت كاكاو فانيلاتوين بدون سكر محلى', 'products/09-2020/3129.270114.jpg', '[]', '2020-09-17 21:52:29', '2020-09-17 21:52:29'),
(222, 4, 5, 1, 1, 2, 'CHIP CHOCO 180GM', 'بسكويت بدون سكر كوكيز 180 جم', 8, '100', '1', '', 1, 0, '0', 'CHIP CHOCO 180GM', 'بسكويت بدون سكر كوكيز 180 جم', 'products/09-2020/3109.402464.jpg', '[]', '2020-09-17 21:53:06', '2020-09-17 21:53:06'),
(223, 4, 5, 1, 1, 2, 'DIGESTIVE CHIA BIO', 'بسكويت الشيا ديجيستيف عضوي', 13, '100', '1', '', 1, 0, '0', 'DIGESTIVE CHIA BIO', 'بسكويت الشيا ديجيستيف عضوي', 'products/09-2020/369.443153.jpg', '[]', '2020-09-17 21:53:43', '2020-09-17 21:53:43'),
(224, 4, 5, 1, 1, 2, 'SURTIDO DN 329 GM', 'بسكويت علبة مشكله بدون سكر', 16, '100', '1', '', 1, 0, '0', 'SURTIDO DN 329 GM', 'بسكويت علبة مشكله بدون سكر', 'products/09-2020/257.851264.jpg', '[]', '2020-09-17 21:54:27', '2020-09-17 21:54:27'),
(225, 4, 5, 1, 1, 2, 'COCONUT MILK SUGER FREE 1L', 'أيكوميل حليب جوز الهند خالي من السكر 1 لتر', 24, '100', '1', '', 1, 0, '0', 'COCONUT MILK SUGER FREE 1L', 'أيكوميل حليب جوز الهند خالي من السكر 1 لتر', 'products/09-2020/1086.996064.jpg', '[]', '2020-09-17 21:58:06', '2020-09-17 21:58:06'),
(226, 4, 5, 1, 1, 2, 'ALMOND PROTEIN DRINK SUGER FREE 1L', 'أيكوميل حليب اللوز بروتين بدون سكر 1 لتر', 24, '100', '1', '', 1, 0, '0', 'ALMOND PROTEIN DRINK SUGER FREE 1L', 'أيكوميل حليب اللوز بروتين بدون سكر 1 لتر', 'products/09-2020/367.45512.jpg', '[]', '2020-09-17 22:01:08', '2020-09-17 22:01:08'),
(227, 4, 5, 1, 1, 2, 'HONEY MANUKA +20 250GM', 'عسل بينز مانوكا تركيز 20 250 غرام', 306, '100', '1', '', 1, 0, '0', 'HONEY MANUKA +20 250GM', 'عسل بينز مانوكا تركيز 20 250 غرام', 'products/09-2020/28.6748.jpg', '[]', '2020-09-17 22:11:19', '2020-09-17 22:11:19'),
(228, 4, 5, 1, 1, 2, 'HONEY MANKA+10 250GM', 'عسل بينز مانوكا تركيز 10 250 غرام', 150, '100', '1', '', 1, 0, '0', 'HONEY MANKA+10 250GM', 'عسل بينز مانوكا تركيز 10 250 غرام', 'products/09-2020/247.945292.jpg', '[]', '2020-09-17 22:12:52', '2020-09-17 22:12:52'),
(229, 4, 5, 1, 1, 2, 'HONEY REWA REWA 250GM', 'عسل بينز زهرة ريوريو 250 غرام', 58, '100', '1', '', 1, 0, '0', 'HONEY REWA REWA 250GM', 'عسل بينز زهرة ريوريو 250 غرام', 'products/09-2020/497.2046.jpg', '[]', '2020-09-17 22:14:54', '2020-09-17 22:14:54'),
(230, 4, 5, 1, 1, 2, 'BEENZ PURE HONEY 250GM', 'عسل زهور النقي بينز 250 غرام', 58, '100', '1', '', 1, 0, '0', 'BEENZ PURE HONEY 250GM', 'عسل زهور النقي بينز 250 غرام', 'products/09-2020/547.682256.jpg', '[]', '2020-09-17 22:16:30', '2020-09-17 22:16:30'),
(231, 4, 5, 1, 1, 2, 'HONEY WILD FLOWER 250GM', 'عسل بينز الزهور البريه 250 غرام', 58, '100', '1', '', 1, 0, '0', 'HONEY WILD FLOWER 250GM', 'عسل بينز الزهور البريه 250 غرام', 'products/09-2020/628.375386.jpg', '[]', '2020-09-17 22:17:47', '2020-09-17 22:17:47'),
(232, 4, 5, 1, 1, 2, 'HONEY CLOVER 250GM', 'عسل بينز زهرة البرسيم 250 غرام', 58, '100', '1', '', 1, 0, '0', 'HONEY CLOVER 250GM', 'عسل بينز زهرة البرسيم 250 غرام', 'products/09-2020/197.635908.jpg', '[]', '2020-09-17 22:19:04', '2020-09-17 22:19:04'),
(233, 4, 5, 1, 1, 2, 'EGMOUNT MANUKA +10 250GM', 'عسل مانوكا نيوزلندي تركيز 10 250 غرام', 150, '100', '1', '', 1, 0, '0', 'EGMOUNT MANUKA +10 250GM', 'عسل مانوكا نيوزلندي تركيز 10 250 غرام', 'products/09-2020/3937.097594.jpg', '[]', '2020-09-18 01:58:01', '2020-09-18 01:58:01'),
(234, 4, 5, 1, 1, 2, 'EGMOUNT MANUKA +15 250GM', 'عسل مانوكا نيوزلندي تركيز 15 250 غرام', 244, '100', '1', '', 1, 0, '0', 'EGMOUNT MANUKA +15 250GM', 'عسل مانوكا نيوزلندي تركيز 15 250 غرام', 'products/09-2020/1037.477285.jpg', '[]', '2020-09-18 02:17:36', '2020-09-18 02:17:36'),
(235, 4, 5, 1, 1, 2, 'EGMOUNT MANUKA +20 250GM', 'عسل مانوكا نيوزلندي تركيز 20 250 غرام', 308, '100', '1', '', 1, 0, '0', 'EGMOUNT MANUKA +20 250GM', 'عسل مانوكا نيوزلندي تركيز 20 250 غرام', 'products/09-2020/106.646284.jpg', '[]', '2020-09-18 04:14:43', '2020-09-18 04:14:43'),
(236, 4, 5, 1, 1, 2, 'Nai Morrocan Mint Tea 250ml', 'شاي ناي المغربي  250 مل', 7, '100', '1', '', 1, 0, '0', 'Nai Morrocan Mint Tea 250ml', 'شاي ناي المغربي  250 مل', 'products/09-2020/21.827619.jpg', '[]', '2020-09-18 04:24:35', '2020-09-18 04:24:35'),
(237, 4, 5, 1, 1, 2, 'Nai Ginger Green Tea 250ml', 'شاي ناي الأخضر بالزنجبيل 250 مل', 7, '100', '1', '', 1, 0, '0', 'Nai Ginger Green Tea 250ml', 'شاي ناي الأخضر بالزنجبيل 250 مل', 'products/09-2020/2120.211114.jpg', '[]', '2020-09-18 04:25:46', '2020-09-18 04:25:46'),
(238, 4, 5, 1, 1, 2, 'Nai Hibiscus Flower Tea 250ml', 'شاي ناي بزهرة الكركديه والرمان 250 مل', 7, '100', '1', '', 1, 0, '0', 'Nai Hibiscus Flower Tea 250ml', 'شاي ناي بزهرة الكركديه والرمان 250 مل', 'products/09-2020/747.56451.jpg', '[]', '2020-09-18 04:27:29', '2020-09-18 04:27:29'),
(239, 4, 5, 1, 1, 2, 'Nai Jasmine White Tea 250ml', 'شاي ناي ياسمين الأبيض  250 مل', 7, '100', '1', '', 1, 0, '0', 'Nai Jasmine White Tea 250ml', 'شاي ناي ياسمين الأبيض  250 مل', 'products/09-2020/2204.691447.jpg', '[]', '2020-09-18 04:28:40', '2020-09-18 04:28:40'),
(240, 4, 5, 1, 1, 2, 'Granti Organic Mixed Juice 1L', 'قرانتي عصير مشكل عضوي 1لتر', 11, '100', '1', '', 1, 0, '0', 'Granti Organic Mixed Juice 1L', 'قرانتي عصير مشكل عضوي 1لتر', 'products/09-2020/1351.734886.png', '[]', '2020-09-21 21:12:12', '2020-09-21 21:12:12'),
(241, 4, 5, 1, 1, 2, 'Granti Organic Black Cherry Juice 200ml', 'قرانتي عصير كرز أسود عضوي 200مل', 3, '100', '1', '', 1, 0, '0', 'Granti Organic Black Cherry Juice 200ml', 'قرانتي عصير كرز أسود عضوي 200مل', 'products/09-2020/2221.131376.jpg', '[]', '2020-09-21 21:12:53', '2020-09-21 21:12:53'),
(242, 4, 5, 1, 1, 2, 'Granti Organic Orange Juice 1L', 'قرانتي عصير برتقال عضوي 1لتر', 11, '100', '1', '', 1, 0, '0', 'Granti Organic Orange Juice 1L', 'قرانتي عصير برتقال عضوي 1لتر', 'products/09-2020/807.311388.png', '[]', '2020-09-21 21:13:38', '2020-09-21 21:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_quantities`
--

CREATE TABLE `product_quantities` (
  `id` bigint(20) NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(27) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(27) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_quantities`
--

INSERT INTO `product_quantities` (`id`, `branch_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, '18', '96', '2020-11-20 21:10:51', '2020-11-24 18:23:18'),
(2, 5, '19', '96', '2020-11-20 21:10:51', '2020-11-24 18:23:18'),
(3, 5, '20', '95', '2020-11-20 21:10:51', '2020-11-24 18:23:18'),
(4, 5, '21', '96', '2020-11-20 21:10:51', '2020-11-24 06:07:29'),
(5, 5, '22', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(6, 5, '23', '100', '2020-11-20 21:10:51', '2020-11-22 13:18:15'),
(7, 5, '24', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(8, 5, '25', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(9, 5, '26', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(10, 5, '27', '99', '2020-11-20 21:10:51', '2020-11-24 18:23:18'),
(11, 5, '28', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(12, 5, '29', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(13, 5, '30', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(14, 5, '31', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(15, 5, '32', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(16, 5, '33', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(17, 5, '34', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(18, 5, '35', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(19, 5, '36', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(20, 5, '37', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(21, 5, '38', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(22, 5, '39', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(23, 5, '40', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(24, 5, '41', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(25, 5, '42', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(26, 5, '43', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(27, 5, '44', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(28, 5, '45', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(29, 5, '46', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(30, 5, '47', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(31, 5, '48', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(32, 5, '49', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(33, 5, '50', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(34, 5, '51', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(35, 5, '52', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(36, 5, '53', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(37, 5, '54', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(38, 5, '55', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(39, 5, '56', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(40, 5, '57', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(41, 5, '58', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(42, 5, '59', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(43, 5, '60', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(44, 5, '61', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(45, 5, '62', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(46, 5, '63', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(47, 5, '64', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(48, 5, '65', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(49, 5, '66', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(50, 5, '67', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(51, 5, '68', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(52, 5, '69', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(53, 5, '70', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(54, 5, '71', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(55, 5, '72', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(56, 5, '73', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(57, 5, '74', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(58, 5, '75', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(59, 5, '76', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(60, 5, '77', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(61, 5, '78', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(62, 5, '79', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(63, 5, '80', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(64, 5, '81', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(65, 5, '82', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(66, 5, '83', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(67, 5, '84', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(68, 5, '85', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(69, 5, '86', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(70, 5, '87', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(71, 5, '88', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(72, 5, '89', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(73, 5, '90', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(74, 5, '91', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(75, 5, '92', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(76, 5, '93', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(77, 5, '94', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(78, 5, '95', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(79, 5, '96', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(80, 5, '97', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(81, 5, '98', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(82, 5, '99', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(83, 5, '100', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(84, 5, '101', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(85, 5, '102', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(86, 5, '103', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(87, 5, '104', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(88, 5, '105', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(89, 5, '106', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(90, 5, '107', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(91, 5, '108', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(92, 5, '109', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(93, 5, '110', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(94, 5, '111', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(95, 5, '112', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(96, 5, '113', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(97, 5, '114', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(98, 5, '115', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(99, 5, '116', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(100, 5, '117', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(101, 5, '118', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(102, 5, '119', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(103, 5, '120', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(104, 5, '121', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(105, 5, '122', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(106, 5, '123', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(107, 5, '124', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(108, 5, '125', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(109, 5, '126', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(110, 5, '127', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(111, 5, '128', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(112, 5, '129', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(113, 5, '130', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(114, 5, '131', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(115, 5, '132', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(116, 5, '133', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(117, 5, '134', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(118, 5, '135', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(119, 5, '136', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(120, 5, '137', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(121, 5, '138', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(122, 5, '139', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(123, 5, '140', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(124, 5, '141', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(125, 5, '142', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(126, 5, '143', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(127, 5, '144', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(128, 5, '145', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(129, 5, '146', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(130, 5, '147', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(131, 5, '148', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(132, 5, '149', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(133, 5, '150', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(134, 5, '151', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(135, 5, '152', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(136, 5, '153', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(137, 5, '154', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(138, 5, '155', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(139, 5, '156', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(140, 5, '157', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(141, 5, '158', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(142, 5, '159', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(143, 5, '160', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(144, 5, '161', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(145, 5, '162', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(146, 5, '163', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(147, 5, '164', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(148, 5, '165', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(149, 5, '166', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(150, 5, '167', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(151, 5, '168', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(152, 5, '169', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(153, 5, '170', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(154, 5, '171', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(155, 5, '172', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(156, 5, '173', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(157, 5, '174', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(158, 5, '175', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(159, 5, '176', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(160, 5, '177', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(161, 5, '178', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(162, 5, '179', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(163, 5, '180', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(164, 5, '181', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(165, 5, '182', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(166, 5, '183', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(167, 5, '184', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(168, 5, '185', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(169, 5, '186', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(170, 5, '187', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(171, 5, '188', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(172, 5, '189', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(173, 5, '190', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(174, 5, '191', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(175, 5, '192', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(176, 5, '193', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(177, 5, '194', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(178, 5, '195', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(179, 5, '196', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(180, 5, '197', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(181, 5, '198', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(182, 5, '199', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(183, 5, '200', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(184, 5, '201', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(185, 5, '202', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(186, 5, '203', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(187, 5, '204', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(188, 5, '205', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(189, 5, '206', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(190, 5, '207', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(191, 5, '208', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(192, 5, '209', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(193, 5, '210', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(194, 5, '211', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(195, 5, '212', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(196, 5, '213', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(197, 5, '214', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(198, 5, '215', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(199, 5, '216', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(200, 5, '217', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(201, 5, '218', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(202, 5, '219', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(203, 5, '220', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(204, 5, '221', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(205, 5, '222', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(206, 5, '223', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(207, 5, '224', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(208, 5, '225', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(209, 5, '226', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(210, 5, '227', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(211, 5, '228', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(212, 5, '229', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(213, 5, '230', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(214, 5, '231', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(215, 5, '232', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(216, 5, '233', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(217, 5, '234', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(218, 5, '235', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(219, 5, '236', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(220, 5, '237', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(221, 5, '238', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(222, 5, '239', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(223, 5, '240', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(224, 5, '241', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(225, 5, '242', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(226, 6, '18', '98', '2020-11-20 21:10:51', '2020-11-24 06:33:46'),
(227, 6, '19', '99', '2020-11-20 21:10:51', '2020-11-24 06:37:10'),
(228, 6, '20', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(229, 6, '21', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(230, 6, '22', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(231, 6, '23', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(232, 6, '24', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(233, 6, '25', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(234, 6, '26', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(235, 6, '27', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(236, 6, '28', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(237, 6, '29', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(238, 6, '30', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(239, 6, '31', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(240, 6, '32', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(241, 6, '33', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(242, 6, '34', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(243, 6, '35', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(244, 6, '36', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(245, 6, '37', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(246, 6, '38', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(247, 6, '39', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(248, 6, '40', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(249, 6, '41', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(250, 6, '42', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(251, 6, '43', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(252, 6, '44', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(253, 6, '45', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(254, 6, '46', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(255, 6, '47', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(256, 6, '48', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(257, 6, '49', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(258, 6, '50', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(259, 6, '51', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(260, 6, '52', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(261, 6, '53', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(262, 6, '54', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(263, 6, '55', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(264, 6, '56', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(265, 6, '57', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(266, 6, '58', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(267, 6, '59', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(268, 6, '60', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(269, 6, '61', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(270, 6, '62', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(271, 6, '63', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(272, 6, '64', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(273, 6, '65', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(274, 6, '66', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(275, 6, '67', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(276, 6, '68', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(277, 6, '69', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(278, 6, '70', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(279, 6, '71', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(280, 6, '72', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(281, 6, '73', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(282, 6, '74', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(283, 6, '75', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(284, 6, '76', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(285, 6, '77', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(286, 6, '78', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(287, 6, '79', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(288, 6, '80', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(289, 6, '81', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(290, 6, '82', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(291, 6, '83', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(292, 6, '84', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(293, 6, '85', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(294, 6, '86', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(295, 6, '87', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(296, 6, '88', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(297, 6, '89', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(298, 6, '90', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(299, 6, '91', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(300, 6, '92', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(301, 6, '93', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(302, 6, '94', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(303, 6, '95', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(304, 6, '96', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(305, 6, '97', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(306, 6, '98', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(307, 6, '99', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(308, 6, '100', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(309, 6, '101', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(310, 6, '102', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(311, 6, '103', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(312, 6, '104', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(313, 6, '105', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(314, 6, '106', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(315, 6, '107', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(316, 6, '108', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(317, 6, '109', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(318, 6, '110', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(319, 6, '111', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(320, 6, '112', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(321, 6, '113', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(322, 6, '114', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(323, 6, '115', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(324, 6, '116', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(325, 6, '117', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(326, 6, '118', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(327, 6, '119', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(328, 6, '120', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(329, 6, '121', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(330, 6, '122', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(331, 6, '123', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(332, 6, '124', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(333, 6, '125', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(334, 6, '126', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(335, 6, '127', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(336, 6, '128', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(337, 6, '129', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(338, 6, '130', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(339, 6, '131', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(340, 6, '132', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(341, 6, '133', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(342, 6, '134', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(343, 6, '135', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(344, 6, '136', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(345, 6, '137', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(346, 6, '138', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(347, 6, '139', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(348, 6, '140', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(349, 6, '141', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(350, 6, '142', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(351, 6, '143', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(352, 6, '144', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(353, 6, '145', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(354, 6, '146', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(355, 6, '147', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(356, 6, '148', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(357, 6, '149', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(358, 6, '150', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(359, 6, '151', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(360, 6, '152', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(361, 6, '153', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(362, 6, '154', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(363, 6, '155', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(364, 6, '156', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(365, 6, '157', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(366, 6, '158', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(367, 6, '159', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(368, 6, '160', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(369, 6, '161', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(370, 6, '162', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(371, 6, '163', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(372, 6, '164', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(373, 6, '165', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(374, 6, '166', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(375, 6, '167', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(376, 6, '168', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(377, 6, '169', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(378, 6, '170', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(379, 6, '171', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(380, 6, '172', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(381, 6, '173', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(382, 6, '174', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(383, 6, '175', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(384, 6, '176', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(385, 6, '177', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(386, 6, '178', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(387, 6, '179', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(388, 6, '180', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(389, 6, '181', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(390, 6, '182', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(391, 6, '183', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(392, 6, '184', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(393, 6, '185', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(394, 6, '186', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(395, 6, '187', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(396, 6, '188', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(397, 6, '189', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(398, 6, '190', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(399, 6, '191', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(400, 6, '192', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(401, 6, '193', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(402, 6, '194', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(403, 6, '195', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(404, 6, '196', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(405, 6, '197', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(406, 6, '198', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(407, 6, '199', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(408, 6, '200', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(409, 6, '201', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(410, 6, '202', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(411, 6, '203', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(412, 6, '204', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(413, 6, '205', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(414, 6, '206', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(415, 6, '207', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(416, 6, '208', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(417, 6, '209', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(418, 6, '210', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(419, 6, '211', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(420, 6, '212', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(421, 6, '213', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(422, 6, '214', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(423, 6, '215', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(424, 6, '216', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(425, 6, '217', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(426, 6, '218', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(427, 6, '219', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(428, 6, '220', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(429, 6, '221', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(430, 6, '222', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(431, 6, '223', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(432, 6, '224', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(433, 6, '225', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(434, 6, '226', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(435, 6, '227', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(436, 6, '228', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(437, 6, '229', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(438, 6, '230', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(439, 6, '231', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(440, 6, '232', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(441, 6, '233', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(442, 6, '234', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(443, 6, '235', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(444, 6, '236', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(445, 6, '237', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(446, 6, '238', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(447, 6, '239', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(448, 6, '240', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(449, 6, '241', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(450, 6, '242', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(451, 7, '18', '100', '2020-11-20 21:10:51', '2020-11-20 21:10:51'),
(452, 7, '19', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(453, 7, '20', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(454, 7, '21', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(455, 7, '22', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(456, 7, '23', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(457, 7, '24', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(458, 7, '25', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(459, 7, '26', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(460, 7, '27', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(461, 7, '28', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(462, 7, '29', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(463, 7, '30', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(464, 7, '31', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(465, 7, '32', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(466, 7, '33', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(467, 7, '34', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(468, 7, '35', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(469, 7, '36', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(470, 7, '37', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(471, 7, '38', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(472, 7, '39', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(473, 7, '40', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(474, 7, '41', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(475, 7, '42', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(476, 7, '43', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(477, 7, '44', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(478, 7, '45', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(479, 7, '46', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(480, 7, '47', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(481, 7, '48', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(482, 7, '49', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(483, 7, '50', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(484, 7, '51', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(485, 7, '52', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(486, 7, '53', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(487, 7, '54', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(488, 7, '55', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(489, 7, '56', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(490, 7, '57', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(491, 7, '58', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(492, 7, '59', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(493, 7, '60', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(494, 7, '61', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(495, 7, '62', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(496, 7, '63', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(497, 7, '64', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(498, 7, '65', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(499, 7, '66', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(500, 7, '67', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(501, 7, '68', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(502, 7, '69', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(503, 7, '70', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(504, 7, '71', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(505, 7, '72', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(506, 7, '73', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(507, 7, '74', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(508, 7, '75', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(509, 7, '76', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(510, 7, '77', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(511, 7, '78', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(512, 7, '79', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(513, 7, '80', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(514, 7, '81', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(515, 7, '82', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(516, 7, '83', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(517, 7, '84', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(518, 7, '85', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(519, 7, '86', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(520, 7, '87', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(521, 7, '88', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(522, 7, '89', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(523, 7, '90', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(524, 7, '91', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(525, 7, '92', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(526, 7, '93', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(527, 7, '94', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(528, 7, '95', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(529, 7, '96', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(530, 7, '97', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(531, 7, '98', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(532, 7, '99', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(533, 7, '100', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(534, 7, '101', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(535, 7, '102', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(536, 7, '103', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(537, 7, '104', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(538, 7, '105', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(539, 7, '106', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(540, 7, '107', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(541, 7, '108', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(542, 7, '109', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(543, 7, '110', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(544, 7, '111', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(545, 7, '112', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(546, 7, '113', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(547, 7, '114', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(548, 7, '115', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(549, 7, '116', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(550, 7, '117', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(551, 7, '118', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(552, 7, '119', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(553, 7, '120', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(554, 7, '121', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(555, 7, '122', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(556, 7, '123', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(557, 7, '124', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(558, 7, '125', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(559, 7, '126', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(560, 7, '127', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(561, 7, '128', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(562, 7, '129', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(563, 7, '130', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(564, 7, '131', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(565, 7, '132', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(566, 7, '133', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(567, 7, '134', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(568, 7, '135', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(569, 7, '136', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(570, 7, '137', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(571, 7, '138', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(572, 7, '139', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(573, 7, '140', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(574, 7, '141', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(575, 7, '142', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(576, 7, '143', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(577, 7, '144', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(578, 7, '145', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(579, 7, '146', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(580, 7, '147', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(581, 7, '148', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(582, 7, '149', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(583, 7, '150', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(584, 7, '151', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(585, 7, '152', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(586, 7, '153', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(587, 7, '154', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(588, 7, '155', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(589, 7, '156', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(590, 7, '157', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(591, 7, '158', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(592, 7, '159', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(593, 7, '160', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(594, 7, '161', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(595, 7, '162', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(596, 7, '163', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(597, 7, '164', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(598, 7, '165', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(599, 7, '166', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(600, 7, '167', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(601, 7, '168', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(602, 7, '169', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(603, 7, '170', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(604, 7, '171', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(605, 7, '172', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(606, 7, '173', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(607, 7, '174', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(608, 7, '175', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(609, 7, '176', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(610, 7, '177', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(611, 7, '178', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(612, 7, '179', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(613, 7, '180', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(614, 7, '181', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(615, 7, '182', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(616, 7, '183', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(617, 7, '184', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(618, 7, '185', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(619, 7, '186', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(620, 7, '187', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(621, 7, '188', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(622, 7, '189', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(623, 7, '190', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(624, 7, '191', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(625, 7, '192', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(626, 7, '193', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(627, 7, '194', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(628, 7, '195', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(629, 7, '196', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(630, 7, '197', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(631, 7, '198', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(632, 7, '199', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(633, 7, '200', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(634, 7, '201', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(635, 7, '202', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(636, 7, '203', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(637, 7, '204', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(638, 7, '205', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(639, 7, '206', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(640, 7, '207', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(641, 7, '208', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(642, 7, '209', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(643, 7, '210', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(644, 7, '211', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(645, 7, '212', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(646, 7, '213', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(647, 7, '214', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(648, 7, '215', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(649, 7, '216', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(650, 7, '217', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(651, 7, '218', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(652, 7, '219', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(653, 7, '220', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(654, 7, '221', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(655, 7, '222', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(656, 7, '223', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(657, 7, '224', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(658, 7, '225', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(659, 7, '226', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(660, 7, '227', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(661, 7, '228', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(662, 7, '229', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(663, 7, '230', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(664, 7, '231', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(665, 7, '232', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(666, 7, '233', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(667, 7, '234', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(668, 7, '235', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(669, 7, '236', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(670, 7, '237', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(671, 7, '238', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(672, 7, '239', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(673, 7, '240', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(674, 7, '241', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(675, 7, '242', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(676, 8, '18', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(677, 8, '19', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(678, 8, '20', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(679, 8, '21', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(680, 8, '22', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(681, 8, '23', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(682, 8, '24', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(683, 8, '25', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(684, 8, '26', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(685, 8, '27', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(686, 8, '28', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(687, 8, '29', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(688, 8, '30', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(689, 8, '31', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(690, 8, '32', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(691, 8, '33', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(692, 8, '34', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(693, 8, '35', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(694, 8, '36', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(695, 8, '37', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(696, 8, '38', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(697, 8, '39', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(698, 8, '40', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(699, 8, '41', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(700, 8, '42', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(701, 8, '43', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(702, 8, '44', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(703, 8, '45', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(704, 8, '46', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(705, 8, '47', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(706, 8, '48', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(707, 8, '49', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(708, 8, '50', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(709, 8, '51', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(710, 8, '52', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(711, 8, '53', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(712, 8, '54', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(713, 8, '55', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(714, 8, '56', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(715, 8, '57', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(716, 8, '58', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(717, 8, '59', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(718, 8, '60', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(719, 8, '61', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(720, 8, '62', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(721, 8, '63', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(722, 8, '64', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(723, 8, '65', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(724, 8, '66', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(725, 8, '67', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(726, 8, '68', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(727, 8, '69', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(728, 8, '70', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(729, 8, '71', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(730, 8, '72', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(731, 8, '73', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(732, 8, '74', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(733, 8, '75', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(734, 8, '76', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(735, 8, '77', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(736, 8, '78', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(737, 8, '79', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(738, 8, '80', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(739, 8, '81', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52');
INSERT INTO `product_quantities` (`id`, `branch_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(740, 8, '82', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(741, 8, '83', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(742, 8, '84', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(743, 8, '85', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(744, 8, '86', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(745, 8, '87', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(746, 8, '88', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(747, 8, '89', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(748, 8, '90', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(749, 8, '91', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(750, 8, '92', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(751, 8, '93', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(752, 8, '94', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(753, 8, '95', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(754, 8, '96', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(755, 8, '97', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(756, 8, '98', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(757, 8, '99', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(758, 8, '100', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(759, 8, '101', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(760, 8, '102', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(761, 8, '103', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(762, 8, '104', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(763, 8, '105', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(764, 8, '106', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(765, 8, '107', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(766, 8, '108', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(767, 8, '109', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(768, 8, '110', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(769, 8, '111', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(770, 8, '112', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(771, 8, '113', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(772, 8, '114', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(773, 8, '115', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(774, 8, '116', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(775, 8, '117', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(776, 8, '118', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(777, 8, '119', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(778, 8, '120', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(779, 8, '121', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(780, 8, '122', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(781, 8, '123', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(782, 8, '124', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(783, 8, '125', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(784, 8, '126', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(785, 8, '127', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(786, 8, '128', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(787, 8, '129', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(788, 8, '130', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(789, 8, '131', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(790, 8, '132', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(791, 8, '133', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(792, 8, '134', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(793, 8, '135', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(794, 8, '136', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(795, 8, '137', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(796, 8, '138', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(797, 8, '139', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(798, 8, '140', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(799, 8, '141', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(800, 8, '142', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(801, 8, '143', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(802, 8, '144', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(803, 8, '145', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(804, 8, '146', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(805, 8, '147', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(806, 8, '148', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(807, 8, '149', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(808, 8, '150', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(809, 8, '151', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(810, 8, '152', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(811, 8, '153', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(812, 8, '154', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(813, 8, '155', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(814, 8, '156', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(815, 8, '157', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(816, 8, '158', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(817, 8, '159', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(818, 8, '160', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(819, 8, '161', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(820, 8, '162', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(821, 8, '163', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(822, 8, '164', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(823, 8, '165', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(824, 8, '166', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(825, 8, '167', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(826, 8, '168', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(827, 8, '169', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(828, 8, '170', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(829, 8, '171', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(830, 8, '172', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(831, 8, '173', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(832, 8, '174', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(833, 8, '175', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(834, 8, '176', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(835, 8, '177', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(836, 8, '178', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(837, 8, '179', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(838, 8, '180', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(839, 8, '181', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(840, 8, '182', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(841, 8, '183', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(842, 8, '184', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(843, 8, '185', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(844, 8, '186', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(845, 8, '187', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(846, 8, '188', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(847, 8, '189', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(848, 8, '190', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(849, 8, '191', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(850, 8, '192', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(851, 8, '193', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(852, 8, '194', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(853, 8, '195', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(854, 8, '196', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(855, 8, '197', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(856, 8, '198', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(857, 8, '199', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(858, 8, '200', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(859, 8, '201', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(860, 8, '202', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(861, 8, '203', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(862, 8, '204', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(863, 8, '205', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(864, 8, '206', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(865, 8, '207', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(866, 8, '208', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(867, 8, '209', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(868, 8, '210', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(869, 8, '211', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(870, 8, '212', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(871, 8, '213', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(872, 8, '214', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(873, 8, '215', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(874, 8, '216', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(875, 8, '217', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(876, 8, '218', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(877, 8, '219', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(878, 8, '220', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(879, 8, '221', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(880, 8, '222', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(881, 8, '223', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(882, 8, '224', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(883, 8, '225', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(884, 8, '226', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(885, 8, '227', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(886, 8, '228', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(887, 8, '229', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(888, 8, '230', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(889, 8, '231', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(890, 8, '232', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(891, 8, '233', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(892, 8, '234', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(893, 8, '235', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(894, 8, '236', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(895, 8, '237', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(896, 8, '238', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(897, 8, '239', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(898, 8, '240', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(899, 8, '241', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(900, 8, '242', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(901, 9, '18', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(902, 9, '19', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(903, 9, '20', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(904, 9, '21', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(905, 9, '22', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(906, 9, '23', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(907, 9, '24', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(908, 9, '25', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(909, 9, '26', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(910, 9, '27', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(911, 9, '28', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(912, 9, '29', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(913, 9, '30', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(914, 9, '31', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(915, 9, '32', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(916, 9, '33', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(917, 9, '34', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(918, 9, '35', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(919, 9, '36', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(920, 9, '37', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(921, 9, '38', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(922, 9, '39', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(923, 9, '40', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(924, 9, '41', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(925, 9, '42', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(926, 9, '43', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(927, 9, '44', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(928, 9, '45', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(929, 9, '46', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(930, 9, '47', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(931, 9, '48', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(932, 9, '49', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(933, 9, '50', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(934, 9, '51', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(935, 9, '52', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(936, 9, '53', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(937, 9, '54', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(938, 9, '55', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(939, 9, '56', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(940, 9, '57', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(941, 9, '58', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(942, 9, '59', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(943, 9, '60', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(944, 9, '61', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(945, 9, '62', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(946, 9, '63', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(947, 9, '64', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(948, 9, '65', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(949, 9, '66', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(950, 9, '67', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(951, 9, '68', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(952, 9, '69', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(953, 9, '70', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(954, 9, '71', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(955, 9, '72', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(956, 9, '73', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(957, 9, '74', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(958, 9, '75', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(959, 9, '76', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(960, 9, '77', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(961, 9, '78', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(962, 9, '79', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(963, 9, '80', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(964, 9, '81', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(965, 9, '82', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(966, 9, '83', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(967, 9, '84', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(968, 9, '85', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(969, 9, '86', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(970, 9, '87', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(971, 9, '88', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(972, 9, '89', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(973, 9, '90', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(974, 9, '91', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(975, 9, '92', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(976, 9, '93', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(977, 9, '94', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(978, 9, '95', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(979, 9, '96', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(980, 9, '97', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(981, 9, '98', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(982, 9, '99', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(983, 9, '100', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(984, 9, '101', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(985, 9, '102', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(986, 9, '103', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(987, 9, '104', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(988, 9, '105', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(989, 9, '106', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(990, 9, '107', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(991, 9, '108', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(992, 9, '109', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(993, 9, '110', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(994, 9, '111', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(995, 9, '112', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(996, 9, '113', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(997, 9, '114', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(998, 9, '115', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(999, 9, '116', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1000, 9, '117', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1001, 9, '118', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1002, 9, '119', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1003, 9, '120', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1004, 9, '121', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1005, 9, '122', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1006, 9, '123', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1007, 9, '124', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1008, 9, '125', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1009, 9, '126', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1010, 9, '127', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1011, 9, '128', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1012, 9, '129', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1013, 9, '130', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1014, 9, '131', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1015, 9, '132', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1016, 9, '133', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1017, 9, '134', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1018, 9, '135', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1019, 9, '136', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1020, 9, '137', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1021, 9, '138', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1022, 9, '139', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1023, 9, '140', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1024, 9, '141', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1025, 9, '142', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1026, 9, '143', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1027, 9, '144', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1028, 9, '145', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1029, 9, '146', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1030, 9, '147', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1031, 9, '148', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1032, 9, '149', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1033, 9, '150', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1034, 9, '151', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1035, 9, '152', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1036, 9, '153', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1037, 9, '154', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1038, 9, '155', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1039, 9, '156', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1040, 9, '157', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1041, 9, '158', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1042, 9, '159', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1043, 9, '160', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1044, 9, '161', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1045, 9, '162', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1046, 9, '163', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1047, 9, '164', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1048, 9, '165', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1049, 9, '166', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1050, 9, '167', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1051, 9, '168', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1052, 9, '169', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1053, 9, '170', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1054, 9, '171', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1055, 9, '172', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1056, 9, '173', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1057, 9, '174', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1058, 9, '175', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1059, 9, '176', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1060, 9, '177', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1061, 9, '178', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1062, 9, '179', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1063, 9, '180', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1064, 9, '181', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1065, 9, '182', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1066, 9, '183', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1067, 9, '184', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1068, 9, '185', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1069, 9, '186', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1070, 9, '187', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1071, 9, '188', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1072, 9, '189', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1073, 9, '190', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1074, 9, '191', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1075, 9, '192', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1076, 9, '193', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1077, 9, '194', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1078, 9, '195', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1079, 9, '196', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1080, 9, '197', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1081, 9, '198', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1082, 9, '199', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1083, 9, '200', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1084, 9, '201', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1085, 9, '202', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1086, 9, '203', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1087, 9, '204', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1088, 9, '205', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1089, 9, '206', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1090, 9, '207', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1091, 9, '208', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1092, 9, '209', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1093, 9, '210', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1094, 9, '211', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1095, 9, '212', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1096, 9, '213', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1097, 9, '214', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1098, 9, '215', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1099, 9, '216', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1100, 9, '217', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1101, 9, '218', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1102, 9, '219', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1103, 9, '220', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1104, 9, '221', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1105, 9, '222', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1106, 9, '223', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1107, 9, '224', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1108, 9, '225', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1109, 9, '226', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1110, 9, '227', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1111, 9, '228', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1112, 9, '229', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1113, 9, '230', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1114, 9, '231', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1115, 9, '232', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1116, 9, '233', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1117, 9, '234', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1118, 9, '235', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1119, 9, '236', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1120, 9, '237', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1121, 9, '238', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1122, 9, '239', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1123, 9, '240', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1124, 9, '241', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1125, 9, '242', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1126, 10, '18', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1127, 10, '19', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1128, 10, '20', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1129, 10, '21', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1130, 10, '22', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1131, 10, '23', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1132, 10, '24', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1133, 10, '25', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1134, 10, '26', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1135, 10, '27', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1136, 10, '28', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1137, 10, '29', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1138, 10, '30', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1139, 10, '31', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1140, 10, '32', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1141, 10, '33', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1142, 10, '34', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1143, 10, '35', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1144, 10, '36', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1145, 10, '37', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1146, 10, '38', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1147, 10, '39', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1148, 10, '40', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1149, 10, '41', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1150, 10, '42', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1151, 10, '43', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1152, 10, '44', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1153, 10, '45', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1154, 10, '46', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1155, 10, '47', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1156, 10, '48', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1157, 10, '49', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1158, 10, '50', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1159, 10, '51', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1160, 10, '52', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1161, 10, '53', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1162, 10, '54', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1163, 10, '55', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1164, 10, '56', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1165, 10, '57', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1166, 10, '58', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1167, 10, '59', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1168, 10, '60', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1169, 10, '61', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1170, 10, '62', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1171, 10, '63', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1172, 10, '64', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1173, 10, '65', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1174, 10, '66', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1175, 10, '67', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1176, 10, '68', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1177, 10, '69', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1178, 10, '70', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1179, 10, '71', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1180, 10, '72', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1181, 10, '73', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1182, 10, '74', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1183, 10, '75', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1184, 10, '76', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1185, 10, '77', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1186, 10, '78', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1187, 10, '79', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1188, 10, '80', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1189, 10, '81', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1190, 10, '82', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1191, 10, '83', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1192, 10, '84', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1193, 10, '85', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1194, 10, '86', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1195, 10, '87', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1196, 10, '88', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1197, 10, '89', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1198, 10, '90', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1199, 10, '91', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1200, 10, '92', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1201, 10, '93', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1202, 10, '94', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1203, 10, '95', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1204, 10, '96', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1205, 10, '97', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1206, 10, '98', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1207, 10, '99', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1208, 10, '100', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1209, 10, '101', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1210, 10, '102', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1211, 10, '103', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1212, 10, '104', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1213, 10, '105', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1214, 10, '106', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1215, 10, '107', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1216, 10, '108', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1217, 10, '109', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1218, 10, '110', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1219, 10, '111', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1220, 10, '112', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1221, 10, '113', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1222, 10, '114', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1223, 10, '115', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1224, 10, '116', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1225, 10, '117', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1226, 10, '118', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1227, 10, '119', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1228, 10, '120', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1229, 10, '121', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1230, 10, '122', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1231, 10, '123', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1232, 10, '124', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1233, 10, '125', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1234, 10, '126', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1235, 10, '127', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1236, 10, '128', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1237, 10, '129', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1238, 10, '130', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1239, 10, '131', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1240, 10, '132', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1241, 10, '133', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1242, 10, '134', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1243, 10, '135', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1244, 10, '136', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1245, 10, '137', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1246, 10, '138', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1247, 10, '139', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1248, 10, '140', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1249, 10, '141', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1250, 10, '142', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1251, 10, '143', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1252, 10, '144', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1253, 10, '145', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1254, 10, '146', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1255, 10, '147', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1256, 10, '148', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1257, 10, '149', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1258, 10, '150', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1259, 10, '151', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1260, 10, '152', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1261, 10, '153', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1262, 10, '154', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1263, 10, '155', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1264, 10, '156', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1265, 10, '157', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1266, 10, '158', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1267, 10, '159', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1268, 10, '160', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1269, 10, '161', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1270, 10, '162', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1271, 10, '163', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1272, 10, '164', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1273, 10, '165', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1274, 10, '166', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1275, 10, '167', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1276, 10, '168', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1277, 10, '169', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1278, 10, '170', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1279, 10, '171', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1280, 10, '172', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1281, 10, '173', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1282, 10, '174', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1283, 10, '175', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1284, 10, '176', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1285, 10, '177', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1286, 10, '178', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1287, 10, '179', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1288, 10, '180', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1289, 10, '181', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1290, 10, '182', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1291, 10, '183', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1292, 10, '184', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1293, 10, '185', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1294, 10, '186', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1295, 10, '187', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1296, 10, '188', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1297, 10, '189', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1298, 10, '190', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1299, 10, '191', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1300, 10, '192', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1301, 10, '193', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1302, 10, '194', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1303, 10, '195', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1304, 10, '196', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1305, 10, '197', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1306, 10, '198', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1307, 10, '199', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1308, 10, '200', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1309, 10, '201', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1310, 10, '202', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1311, 10, '203', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1312, 10, '204', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1313, 10, '205', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1314, 10, '206', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1315, 10, '207', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1316, 10, '208', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1317, 10, '209', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1318, 10, '210', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1319, 10, '211', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1320, 10, '212', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1321, 10, '213', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1322, 10, '214', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1323, 10, '215', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1324, 10, '216', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1325, 10, '217', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1326, 10, '218', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1327, 10, '219', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1328, 10, '220', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1329, 10, '221', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1330, 10, '222', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1331, 10, '223', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1332, 10, '224', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1333, 10, '225', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1334, 10, '226', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1335, 10, '227', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1336, 10, '228', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1337, 10, '229', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1338, 10, '230', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1339, 10, '231', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1340, 10, '232', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1341, 10, '233', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1342, 10, '234', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1343, 10, '235', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1344, 10, '236', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1345, 10, '237', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1346, 10, '238', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1347, 10, '239', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1348, 10, '240', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1349, 10, '241', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1350, 10, '242', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1351, 11, '18', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1352, 11, '19', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1353, 11, '20', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1354, 11, '21', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1355, 11, '22', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1356, 11, '23', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1357, 11, '24', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1358, 11, '25', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1359, 11, '26', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1360, 11, '27', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1361, 11, '28', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1362, 11, '29', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1363, 11, '30', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1364, 11, '31', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1365, 11, '32', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1366, 11, '33', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1367, 11, '34', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1368, 11, '35', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1369, 11, '36', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1370, 11, '37', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1371, 11, '38', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1372, 11, '39', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1373, 11, '40', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1374, 11, '41', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1375, 11, '42', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1376, 11, '43', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1377, 11, '44', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1378, 11, '45', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1379, 11, '46', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1380, 11, '47', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1381, 11, '48', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1382, 11, '49', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1383, 11, '50', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1384, 11, '51', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1385, 11, '52', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1386, 11, '53', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1387, 11, '54', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1388, 11, '55', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1389, 11, '56', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1390, 11, '57', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1391, 11, '58', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1392, 11, '59', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1393, 11, '60', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1394, 11, '61', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1395, 11, '62', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1396, 11, '63', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1397, 11, '64', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1398, 11, '65', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1399, 11, '66', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1400, 11, '67', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1401, 11, '68', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1402, 11, '69', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1403, 11, '70', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1404, 11, '71', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1405, 11, '72', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1406, 11, '73', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1407, 11, '74', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1408, 11, '75', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1409, 11, '76', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1410, 11, '77', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1411, 11, '78', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1412, 11, '79', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1413, 11, '80', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1414, 11, '81', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1415, 11, '82', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1416, 11, '83', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1417, 11, '84', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1418, 11, '85', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1419, 11, '86', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1420, 11, '87', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1421, 11, '88', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1422, 11, '89', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1423, 11, '90', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1424, 11, '91', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1425, 11, '92', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1426, 11, '93', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1427, 11, '94', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1428, 11, '95', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1429, 11, '96', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1430, 11, '97', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1431, 11, '98', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1432, 11, '99', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1433, 11, '100', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1434, 11, '101', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1435, 11, '102', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1436, 11, '103', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1437, 11, '104', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1438, 11, '105', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1439, 11, '106', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1440, 11, '107', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1441, 11, '108', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1442, 11, '109', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1443, 11, '110', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1444, 11, '111', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1445, 11, '112', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1446, 11, '113', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1447, 11, '114', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1448, 11, '115', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1449, 11, '116', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1450, 11, '117', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1451, 11, '118', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1452, 11, '119', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1453, 11, '120', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1454, 11, '121', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1455, 11, '122', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1456, 11, '123', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1457, 11, '124', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1458, 11, '125', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1459, 11, '126', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1460, 11, '127', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1461, 11, '128', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1462, 11, '129', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1463, 11, '130', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1464, 11, '131', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52');
INSERT INTO `product_quantities` (`id`, `branch_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1465, 11, '132', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1466, 11, '133', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1467, 11, '134', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1468, 11, '135', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1469, 11, '136', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1470, 11, '137', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1471, 11, '138', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1472, 11, '139', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1473, 11, '140', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1474, 11, '141', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1475, 11, '142', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1476, 11, '143', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1477, 11, '144', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1478, 11, '145', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1479, 11, '146', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1480, 11, '147', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1481, 11, '148', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1482, 11, '149', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1483, 11, '150', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1484, 11, '151', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1485, 11, '152', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1486, 11, '153', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1487, 11, '154', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1488, 11, '155', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1489, 11, '156', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1490, 11, '157', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1491, 11, '158', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1492, 11, '159', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1493, 11, '160', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1494, 11, '161', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1495, 11, '162', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1496, 11, '163', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1497, 11, '164', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1498, 11, '165', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1499, 11, '166', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1500, 11, '167', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1501, 11, '168', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1502, 11, '169', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1503, 11, '170', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1504, 11, '171', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1505, 11, '172', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1506, 11, '173', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1507, 11, '174', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1508, 11, '175', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1509, 11, '176', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1510, 11, '177', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1511, 11, '178', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1512, 11, '179', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1513, 11, '180', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1514, 11, '181', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1515, 11, '182', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1516, 11, '183', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1517, 11, '184', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1518, 11, '185', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1519, 11, '186', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1520, 11, '187', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1521, 11, '188', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1522, 11, '189', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1523, 11, '190', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1524, 11, '191', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1525, 11, '192', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1526, 11, '193', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1527, 11, '194', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1528, 11, '195', '100', '2020-11-20 21:10:52', '2020-11-20 21:10:52'),
(1529, 11, '196', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1530, 11, '197', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1531, 11, '198', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1532, 11, '199', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1533, 11, '200', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1534, 11, '201', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1535, 11, '202', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1536, 11, '203', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1537, 11, '204', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1538, 11, '205', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1539, 11, '206', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1540, 11, '207', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1541, 11, '208', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1542, 11, '209', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1543, 11, '210', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1544, 11, '211', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1545, 11, '212', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1546, 11, '213', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1547, 11, '214', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1548, 11, '215', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1549, 11, '216', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1550, 11, '217', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1551, 11, '218', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1552, 11, '219', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1553, 11, '220', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1554, 11, '221', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1555, 11, '222', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1556, 11, '223', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1557, 11, '224', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1558, 11, '225', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1559, 11, '226', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1560, 11, '227', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1561, 11, '228', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1562, 11, '229', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1563, 11, '230', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1564, 11, '231', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1565, 11, '232', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1566, 11, '233', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1567, 11, '234', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1568, 11, '235', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1569, 11, '236', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1570, 11, '237', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1571, 11, '238', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1572, 11, '239', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1573, 11, '240', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1574, 11, '241', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1575, 11, '242', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1576, 12, '18', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1577, 12, '19', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1578, 12, '20', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1579, 12, '21', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1580, 12, '22', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1581, 12, '23', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1582, 12, '24', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1583, 12, '25', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1584, 12, '26', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1585, 12, '27', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1586, 12, '28', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1587, 12, '29', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1588, 12, '30', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1589, 12, '31', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1590, 12, '32', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1591, 12, '33', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1592, 12, '34', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1593, 12, '35', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1594, 12, '36', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1595, 12, '37', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1596, 12, '38', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1597, 12, '39', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1598, 12, '40', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1599, 12, '41', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1600, 12, '42', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1601, 12, '43', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1602, 12, '44', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1603, 12, '45', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1604, 12, '46', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1605, 12, '47', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1606, 12, '48', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1607, 12, '49', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1608, 12, '50', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1609, 12, '51', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1610, 12, '52', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1611, 12, '53', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1612, 12, '54', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1613, 12, '55', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1614, 12, '56', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1615, 12, '57', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1616, 12, '58', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1617, 12, '59', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1618, 12, '60', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1619, 12, '61', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1620, 12, '62', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1621, 12, '63', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1622, 12, '64', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1623, 12, '65', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1624, 12, '66', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1625, 12, '67', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1626, 12, '68', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1627, 12, '69', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1628, 12, '70', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1629, 12, '71', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1630, 12, '72', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1631, 12, '73', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1632, 12, '74', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1633, 12, '75', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1634, 12, '76', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1635, 12, '77', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1636, 12, '78', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1637, 12, '79', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1638, 12, '80', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1639, 12, '81', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1640, 12, '82', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1641, 12, '83', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1642, 12, '84', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1643, 12, '85', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1644, 12, '86', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1645, 12, '87', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1646, 12, '88', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1647, 12, '89', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1648, 12, '90', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1649, 12, '91', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1650, 12, '92', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1651, 12, '93', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1652, 12, '94', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1653, 12, '95', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1654, 12, '96', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1655, 12, '97', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1656, 12, '98', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1657, 12, '99', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1658, 12, '100', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1659, 12, '101', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1660, 12, '102', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1661, 12, '103', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1662, 12, '104', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1663, 12, '105', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1664, 12, '106', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1665, 12, '107', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1666, 12, '108', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1667, 12, '109', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1668, 12, '110', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1669, 12, '111', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1670, 12, '112', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1671, 12, '113', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1672, 12, '114', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1673, 12, '115', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1674, 12, '116', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1675, 12, '117', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1676, 12, '118', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1677, 12, '119', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1678, 12, '120', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1679, 12, '121', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1680, 12, '122', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1681, 12, '123', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1682, 12, '124', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1683, 12, '125', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1684, 12, '126', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1685, 12, '127', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1686, 12, '128', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1687, 12, '129', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1688, 12, '130', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1689, 12, '131', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1690, 12, '132', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1691, 12, '133', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1692, 12, '134', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1693, 12, '135', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1694, 12, '136', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1695, 12, '137', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1696, 12, '138', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1697, 12, '139', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1698, 12, '140', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1699, 12, '141', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1700, 12, '142', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1701, 12, '143', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1702, 12, '144', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1703, 12, '145', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1704, 12, '146', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1705, 12, '147', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1706, 12, '148', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1707, 12, '149', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1708, 12, '150', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1709, 12, '151', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1710, 12, '152', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1711, 12, '153', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1712, 12, '154', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1713, 12, '155', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1714, 12, '156', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1715, 12, '157', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1716, 12, '158', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1717, 12, '159', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1718, 12, '160', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1719, 12, '161', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1720, 12, '162', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1721, 12, '163', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1722, 12, '164', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1723, 12, '165', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1724, 12, '166', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1725, 12, '167', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1726, 12, '168', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1727, 12, '169', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1728, 12, '170', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1729, 12, '171', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1730, 12, '172', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1731, 12, '173', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1732, 12, '174', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1733, 12, '175', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1734, 12, '176', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1735, 12, '177', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1736, 12, '178', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1737, 12, '179', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1738, 12, '180', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1739, 12, '181', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1740, 12, '182', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1741, 12, '183', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1742, 12, '184', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1743, 12, '185', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1744, 12, '186', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1745, 12, '187', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1746, 12, '188', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1747, 12, '189', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1748, 12, '190', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1749, 12, '191', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1750, 12, '192', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1751, 12, '193', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1752, 12, '194', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1753, 12, '195', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1754, 12, '196', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1755, 12, '197', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1756, 12, '198', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1757, 12, '199', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1758, 12, '200', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1759, 12, '201', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1760, 12, '202', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1761, 12, '203', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1762, 12, '204', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1763, 12, '205', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1764, 12, '206', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1765, 12, '207', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1766, 12, '208', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1767, 12, '209', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1768, 12, '210', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1769, 12, '211', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1770, 12, '212', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1771, 12, '213', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1772, 12, '214', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1773, 12, '215', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1774, 12, '216', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1775, 12, '217', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1776, 12, '218', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1777, 12, '219', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1778, 12, '220', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1779, 12, '221', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1780, 12, '222', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1781, 12, '223', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1782, 12, '224', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1783, 12, '225', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1784, 12, '226', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1785, 12, '227', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1786, 12, '228', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1787, 12, '229', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1788, 12, '230', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1789, 12, '231', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1790, 12, '232', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1791, 12, '233', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1792, 12, '234', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1793, 12, '235', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1794, 12, '236', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1795, 12, '237', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1796, 12, '238', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1797, 12, '239', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1798, 12, '240', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1799, 12, '241', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1800, 12, '242', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1801, 13, '18', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1802, 13, '19', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1803, 13, '20', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1804, 13, '21', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1805, 13, '22', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1806, 13, '23', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1807, 13, '24', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1808, 13, '25', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1809, 13, '26', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1810, 13, '27', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1811, 13, '28', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1812, 13, '29', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1813, 13, '30', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1814, 13, '31', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1815, 13, '32', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1816, 13, '33', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1817, 13, '34', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1818, 13, '35', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1819, 13, '36', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1820, 13, '37', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1821, 13, '38', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1822, 13, '39', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1823, 13, '40', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1824, 13, '41', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1825, 13, '42', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1826, 13, '43', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1827, 13, '44', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1828, 13, '45', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1829, 13, '46', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1830, 13, '47', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1831, 13, '48', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1832, 13, '49', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1833, 13, '50', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1834, 13, '51', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1835, 13, '52', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1836, 13, '53', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1837, 13, '54', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1838, 13, '55', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1839, 13, '56', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1840, 13, '57', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1841, 13, '58', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1842, 13, '59', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1843, 13, '60', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1844, 13, '61', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1845, 13, '62', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1846, 13, '63', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1847, 13, '64', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1848, 13, '65', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1849, 13, '66', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1850, 13, '67', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1851, 13, '68', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1852, 13, '69', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1853, 13, '70', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1854, 13, '71', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1855, 13, '72', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1856, 13, '73', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1857, 13, '74', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1858, 13, '75', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1859, 13, '76', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1860, 13, '77', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1861, 13, '78', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1862, 13, '79', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1863, 13, '80', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1864, 13, '81', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1865, 13, '82', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1866, 13, '83', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1867, 13, '84', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1868, 13, '85', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1869, 13, '86', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1870, 13, '87', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1871, 13, '88', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1872, 13, '89', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1873, 13, '90', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1874, 13, '91', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1875, 13, '92', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1876, 13, '93', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1877, 13, '94', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1878, 13, '95', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1879, 13, '96', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1880, 13, '97', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1881, 13, '98', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1882, 13, '99', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1883, 13, '100', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1884, 13, '101', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1885, 13, '102', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1886, 13, '103', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1887, 13, '104', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1888, 13, '105', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1889, 13, '106', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1890, 13, '107', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1891, 13, '108', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1892, 13, '109', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1893, 13, '110', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1894, 13, '111', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1895, 13, '112', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1896, 13, '113', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1897, 13, '114', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1898, 13, '115', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1899, 13, '116', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1900, 13, '117', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1901, 13, '118', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1902, 13, '119', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1903, 13, '120', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1904, 13, '121', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1905, 13, '122', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1906, 13, '123', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1907, 13, '124', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1908, 13, '125', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1909, 13, '126', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1910, 13, '127', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1911, 13, '128', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1912, 13, '129', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1913, 13, '130', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1914, 13, '131', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1915, 13, '132', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1916, 13, '133', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1917, 13, '134', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1918, 13, '135', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1919, 13, '136', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1920, 13, '137', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1921, 13, '138', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1922, 13, '139', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1923, 13, '140', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1924, 13, '141', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1925, 13, '142', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1926, 13, '143', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1927, 13, '144', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1928, 13, '145', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1929, 13, '146', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1930, 13, '147', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1931, 13, '148', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1932, 13, '149', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1933, 13, '150', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1934, 13, '151', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1935, 13, '152', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1936, 13, '153', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1937, 13, '154', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1938, 13, '155', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1939, 13, '156', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1940, 13, '157', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1941, 13, '158', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1942, 13, '159', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1943, 13, '160', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1944, 13, '161', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1945, 13, '162', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1946, 13, '163', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1947, 13, '164', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1948, 13, '165', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1949, 13, '166', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1950, 13, '167', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1951, 13, '168', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1952, 13, '169', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1953, 13, '170', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1954, 13, '171', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1955, 13, '172', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1956, 13, '173', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1957, 13, '174', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1958, 13, '175', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1959, 13, '176', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1960, 13, '177', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1961, 13, '178', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1962, 13, '179', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1963, 13, '180', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1964, 13, '181', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1965, 13, '182', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1966, 13, '183', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1967, 13, '184', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1968, 13, '185', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1969, 13, '186', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1970, 13, '187', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1971, 13, '188', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1972, 13, '189', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1973, 13, '190', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1974, 13, '191', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1975, 13, '192', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1976, 13, '193', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1977, 13, '194', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1978, 13, '195', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1979, 13, '196', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1980, 13, '197', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1981, 13, '198', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1982, 13, '199', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1983, 13, '200', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1984, 13, '201', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1985, 13, '202', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1986, 13, '203', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1987, 13, '204', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1988, 13, '205', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1989, 13, '206', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1990, 13, '207', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1991, 13, '208', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1992, 13, '209', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1993, 13, '210', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1994, 13, '211', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1995, 13, '212', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1996, 13, '213', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1997, 13, '214', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1998, 13, '215', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(1999, 13, '216', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2000, 13, '217', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2001, 13, '218', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2002, 13, '219', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2003, 13, '220', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2004, 13, '221', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2005, 13, '222', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2006, 13, '223', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2007, 13, '224', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2008, 13, '225', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2009, 13, '226', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2010, 13, '227', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2011, 13, '228', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2012, 13, '229', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2013, 13, '230', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2014, 13, '231', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2015, 13, '232', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2016, 13, '233', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2017, 13, '234', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2018, 13, '235', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2019, 13, '236', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2020, 13, '237', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2021, 13, '238', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2022, 13, '239', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2023, 13, '240', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2024, 13, '241', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53'),
(2025, 13, '242', '100', '2020-11-20 21:10:53', '2020-11-20 21:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Project Owner', 'can do anything', '2020-10-04 10:49:11', '2020-10-04 10:49:11'),
(2, 'super_admin', 'Super Admin', 'can do anything except remove owner & Super Admins', '2020-10-04 10:49:11', '2020-10-04 10:49:11'),
(3, 'user', 'User', 'can do specific tasks', '2020-10-04 10:49:11', '2020-10-04 10:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(3, 2, 'App\\User'),
(3, 3, 'App\\User'),
(3, 5, 'App\\User'),
(3, 7, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `data`, `data_ar`, `image`, `created_at`, `updated_at`) VALUES
(1, 'about', 'about us', 'عن التطبيق', 'about/564059900.png', '2020-11-23 00:01:26', '0000-00-00 00:00:00'),
(3, 'privacy', 'privacy', 'الخصوصية', 'about/793718990.png', '2020-11-23 13:31:56', '2020-11-23 18:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_name_ar`, `subcategory_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gargir', 'جرجير', 'subcategories/637729514.png', NULL, '2020-10-07 11:01:19'),
(2, 1, 'tomatom', 'طماطم', 'subcategories/637729514.png', '2020-10-07 11:15:31', '2020-10-07 11:15:31'),
(3, 2, 'mango', 'مانجو', 'subcategories/637729514.png', '2020-10-07 11:16:18', '2020-11-10 04:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'كيلو جرام', '2020-09-30 22:00:00', '2020-10-27 15:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encrypted_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `encrypted_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahmoud', 'owner@email.com', '2541541', NULL, '$2y$10$jBv9ybHbCKt5Eire1NGf9eto1sNykixyqh1G2XwYJO5LWKTtfdJu2', 'eyJpdiI6Ikc1OUdMNlBiS1hiVVpaSTNueHV3cmc9PSIsInZhbHVlIjoib3IzMFR3VmhPQ0hDZEY5aWw5Mlk5Zz09IiwibWFjIjoiNmVlMmQ5OGE4MGQ0YzNjMDkzYTY3MDg4YjZkYTAzZWY3ODQ0ZDVmMDdkNjVjMmFmZjQ2MDk4OWUxMTY4M2ViNSJ9', NULL, '2020-10-04 10:49:11', '2020-11-15 21:05:05'),
(2, 'Mahmoud', 'user@email.com', '451545', NULL, '$2y$10$N27Bm5A3pS3u7bSKtjtiZuN6WbvhOQ38lCKjJGzlNvrtbrK.9IIrq', 'eyJpdiI6InZiQUxEUUhwTFwvajB3VGtwT1d6c053PT0iLCJ2YWx1ZSI6IjZWVmc1VVRyN3djcFVjTGVYdlwvRUFRPT0iLCJtYWMiOiJlMDBhMTgzY2M3NzlkNTBmNjNhOTJlYmNkMmZkODQwYzNlNjAxNmNhOTAxNGRkZjQ2ZGJjMjI1MmUyNmJlNGYzIn0=', NULL, '2020-10-06 15:02:34', '2020-11-15 21:08:28'),
(3, 'mahmoud fathy', 'mfmha011@gmail.com', '01095028473', NULL, '$2y$10$q2wRGJ5r3pcSDC9srBnvW.eVVFm/KpNjyZlJ25R/EP3XTJTSpb8yC', 'eyJpdiI6IkJTeEk5b1U1MWJTNVE1WUczSFJ0TEE9PSIsInZhbHVlIjoibHFhYzVvNU9sZ2lCSWRlSEFhRmNxZz09IiwibWFjIjoiNGY2ZWMzYWFjNjNmNDFlZjhlZDQ3ZGZhNTAzZGIxZDkxZjM5ODJhMDNjN2I1ZWVmN2UxYjAxZDEyNWIwMjYzNSJ9', NULL, '2020-11-01 09:05:19', '2020-11-15 20:08:05'),
(5, 'mahmoud', 'chris@scotch.io', '2541541', NULL, '$2y$10$b4M8K0YuLi75yhkTpSVITOyLLD5qJj3ahLEkFO6mgA2KwkvG.Wrdq', 'eyJpdiI6Ikk3d0ozN0k1SExsanBwYkhSZzkwekE9PSIsInZhbHVlIjoiU1BJd04zcDNZVGVkeFlFc3pBYnFCZz09IiwibWFjIjoiYzkyNzAzNTEzOWI4OGQyYmQyNDBmY2EyZjRkNzc0MjZiNzQ1ZTkyZjBmMmIwMzQ3OWQyMGI5NmIzOTI5NmU5NiJ9', NULL, '2020-11-10 15:53:56', '2020-11-15 20:08:20'),
(7, 'tito', 'ma@gmail.com', '01095028473', NULL, '$2y$10$xMn24AEdKlHZrSMFPp42C.oTvwhg9JLExrRUzzqIGmvHYaqlETPUa', 'eyJpdiI6InBNVytJeE05ejNnWkp2T041ZXZpcUE9PSIsInZhbHVlIjoiU1d4a0hic3o3cDFcL3g2TWFuR0tUdUE9PSIsIm1hYyI6IjdjYWI0NjBmYTE4ZTllM2YzODE4MmRiMzJkODRmYTNjNTNlZGE4OWJjNGU0ZTY3ZWQ3ODRlM2M2MWJjYTgyODAifQ==', NULL, '2020-11-10 18:41:30', '2020-11-15 20:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_branches`
--

CREATE TABLE `user_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_branches`
--

INSERT INTO `user_branches` (`id`, `user_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(5, 5, 5, '2020-11-10 15:53:56', '2020-11-10 15:53:56'),
(6, 2, 5, NULL, NULL),
(7, 3, 5, NULL, NULL),
(8, 7, 5, '2020-11-10 18:41:30', '2020-11-10 18:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_city_id_foreign` (`city_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_api_token_unique` (`api_token`);

--
-- Indexes for table `client_addresses`
--
ALTER TABLE `client_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_addresses_client_id_foreign` (`client_id`),
  ADD KEY `client_addresses_city_id_foreign` (`city_id`),
  ADD KEY `client_addresses_zone_id_foreign` (`zone_id`),
  ADD KEY `client_addresses_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_product_id_foreign` (`product_id`);

--
-- Indexes for table `favorite_addresses`
--
ALTER TABLE `favorite_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myoffers`
--
ALTER TABLE `myoffers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `myoffers_user_id_foreign` (`user_id`),
  ADD KEY `myoffers_city_id_foreign` (`city_id`),
  ADD KEY `myoffers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `newproducts`
--
ALTER TABLE `newproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newproducts_user_id_foreign` (`user_id`),
  ADD KEY `newproducts_city_id_foreign` (`city_id`),
  ADD KEY `newproducts_branch_id_foreign` (`branch_id`),
  ADD KEY `newproducts_newproduct_id_foreign` (`product_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_product_id_foreign` (`product_id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`),
  ADD KEY `notifications_client_id_foreign` (`client_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_user_id_foreign` (`user_id`),
  ADD KEY `offers_city_id_foreign` (`city_id`),
  ADD KEY `offers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `offerssliders`
--
ALTER TABLE `offerssliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offerssliders_user_id_foreign` (`user_id`),
  ADD KEY `offerssliders_city_id_foreign` (`city_id`),
  ADD KEY `offerssliders_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderproducts_product_id_foreign` (`product_id`),
  ADD KEY `orderproducts_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_order_status_type_id_foreign` (`order_status_type_id`),
  ADD KEY `orders_order_status_id_foreign` (`order_status_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_histories_order_id_foreign` (`order_id`),
  ADD KEY `order_histories_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_statuses_order_status_type_id_foreign` (`order_status_type_id`);

--
-- Indexes for table `order_status_translations`
--
ALTER TABLE `order_status_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_translations_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `order_status_types`
--
ALTER TABLE `order_status_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status_type_translations`
--
ALTER TABLE `order_status_type_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_type_translations_order_status_type_id_foreign` (`order_status_type_id`);

--
-- Indexes for table `ouroffers`
--
ALTER TABLE `ouroffers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouroffers_user_id_foreign` (`user_id`),
  ADD KEY `ouroffers_city_id_foreign` (`city_id`),
  ADD KEY `ouroffers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_city_id_foreign` (`city_id`),
  ADD KEY `products_branch_id_foreign` (`branch_id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_product_unit_foreign` (`product_unit`);

--
-- Indexes for table `product_quantities`
--
ALTER TABLE `product_quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_branches`
--
ALTER TABLE `user_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_branches_branch_id_foreign` (`branch_id`),
  ADD KEY `user_branches_user_id_foreign` (`user_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_city_id_foreign` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client_addresses`
--
ALTER TABLE `client_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `favorite_addresses`
--
ALTER TABLE `favorite_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `myoffers`
--
ALTER TABLE `myoffers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newproducts`
--
ALTER TABLE `newproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offerssliders`
--
ALTER TABLE `offerssliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status_translations`
--
ALTER TABLE `order_status_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status_types`
--
ALTER TABLE `order_status_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_status_type_translations`
--
ALTER TABLE `order_status_type_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ouroffers`
--
ALTER TABLE `ouroffers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2159;

--
-- AUTO_INCREMENT for table `product_quantities`
--
ALTER TABLE `product_quantities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2026;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_branches`
--
ALTER TABLE `user_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_addresses`
--
ALTER TABLE `client_addresses`
  ADD CONSTRAINT `client_addresses_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `myoffers`
--
ALTER TABLE `myoffers`
  ADD CONSTRAINT `myoffers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `myoffers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `myoffers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `newproducts`
--
ALTER TABLE `newproducts`
  ADD CONSTRAINT `newproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `newproducts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `notifications_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offerssliders`
--
ALTER TABLE `offerssliders`
  ADD CONSTRAINT `offerssliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD CONSTRAINT `orderproducts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `client_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`),
  ADD CONSTRAINT `orders_order_status_type_id_foreign` FOREIGN KEY (`order_status_type_id`) REFERENCES `order_status_types` (`id`);

--
-- Constraints for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD CONSTRAINT `order_histories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_histories_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`);

--
-- Constraints for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD CONSTRAINT `order_statuses_order_status_type_id_foreign` FOREIGN KEY (`order_status_type_id`) REFERENCES `order_status_types` (`id`);

--
-- Constraints for table `order_status_translations`
--
ALTER TABLE `order_status_translations`
  ADD CONSTRAINT `order_status_translations_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status_type_translations`
--
ALTER TABLE `order_status_type_translations`
  ADD CONSTRAINT `order_status_type_translations_order_status_type_id_foreign` FOREIGN KEY (`order_status_type_id`) REFERENCES `order_status_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ouroffers`
--
ALTER TABLE `ouroffers`
  ADD CONSTRAINT `ouroffers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_unit_foreign` FOREIGN KEY (`product_unit`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_branches`
--
ALTER TABLE `user_branches`
  ADD CONSTRAINT `user_branches_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_branches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
