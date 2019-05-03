-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2019 at 01:39 AM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vipult_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `address_1` text COLLATE utf8_unicode_ci,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `mobile`, `address`, `address_1`, `pincode`, `city`, `state`, `country`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Maulik', '8758965327', '11 - B shreyanshnath Society, Near Dharnidhar Derasar, Vasna', '11 - B shreyanshnath Society', '380007', 'ahmedabad', 'Gujarat', 'India', 0, '2019-04-18 05:48:22', '2019-04-18 05:48:22', NULL),
(2, 3, 'Nikunj', '9825398521', 'Ganeshpura', 'Mehsana', '380007', 'ahmedabad', 'gujarat', 'India', 0, '2019-04-18 21:51:54', '2019-04-18 21:51:54', NULL),
(3, 5, 'Gaurang', '9586607287', 'ganeshpura', 'mehsana', '380007', 'ahmedabad', 'gujarat', 'India', 0, '2019-04-18 22:09:35', '2019-04-18 22:09:35', NULL),
(4, 7, 'Samrat', '8469968120', 'Gandhinagar', 'sector 5', '555555', 'gandhinagar', 'GUJARAT', 'India', 0, '2019-04-19 01:53:06', '2019-04-19 01:53:06', NULL),
(5, 1, 'jaya', '9998540008', '13 anuraadha Appartment Near LIC Building Vasna Ahmedabad', '13 anuraadha Appartment Near LIC Building Vasna Ahmedabad', '380007', 'ahmedabad', 'gujaraat', 'India', 0, '2019-04-19 03:52:53', '2019-04-19 03:52:53', NULL),
(6, 8, 'amit', '9898989898', 'Riddhi App', 'vasna', '380008', 'ahmedabad', 'gujarat', 'India', 0, '2019-04-21 02:40:46', '2019-04-21 02:40:46', NULL),
(7, 9, 'dffds', '1234567890', 'dsf', 'sdg', '123654', 'dsf', 'dsg', 'India', 0, '2019-04-26 13:54:17', '2019-04-26 13:54:17', NULL),
(8, 10, 'Samrat Gajjar', '9825398521', 'Gandhinagar', 'Mehsana', '380007', 'Gandhinagar', 'Gujarat', 'India', 0, '2019-04-28 04:06:09', '2019-04-28 04:06:09', NULL),
(9, 12, 'Nilu Gajjar', '8758965327', '11 - B shreyanshnath Society, Near Dharnidhar Derasar, Vasna', '11 - B shreyanshnath Society', '380007', 'ahmedabad', 'Gujarat', 'India', 0, '2019-05-02 05:35:16', '2019-05-02 05:35:16', NULL),
(10, 14, 'srushti patel', '8758965327', '11 b Shreyanshnath Society', 'Near Dharnidhar Derasar', '380007', 'ahmedabad', 'Gujarat', 'India', 0, '2019-05-02 05:43:33', '2019-05-02 05:43:33', NULL),
(11, 15, 'avni prajapati', '8758965327', 'surgoving society', 'near paragi appartment', '380007', 'ahmedabad', 'Gujarat', 'India', 0, '2019-05-02 05:57:38', '2019-05-02 05:57:38', NULL),
(12, 16, 'bhavesh sanghani', '8758965327', 'vejalpur', 'vejalpur', '380007', 'ahmedabad', 'Gujarat', 'India', 0, '2019-05-02 10:53:59', '2019-05-02 10:53:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `modules_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `modules_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$T8IJLirAxU/tcGq4R6bzHeqz4uzBX1W.DmLJRhUn6vhZNAdKA.GPC', 1, NULL, '2019-04-09 10:57:18', '2019-04-20 22:27:38', NULL),
(2, 'Ishani Maulik Prajapati', 'support@shroud.in', '$2y$10$pa1VQ5YuLb0IV0NRD6ALT.GncNxWMj2LNgJKxW9Mr9/KpA9qABdJS', 2, '10', '2019-04-17 22:24:54', '2019-04-29 10:30:53', '2019-04-29 10:30:53'),
(3, 'Maulik', 'mvp137890@gmail.com', '$2y$10$0QISge5wNEVHkBIpwyuvaevxgpyBtr2HTegQVln8UV7HFTcAYjkvG', 2, '9, 10', '2019-04-18 05:22:37', '2019-04-29 10:30:47', '2019-04-29 10:30:47'),
(4, 'Amit', 'mvp_137890@yahoo.com', '$2y$10$KzSNC6izqjDbAvGk5XE3CeDWTnlPSnaXGfLuRNg5D5DnoQFgQeJFK', 2, '7, 8', '2019-04-18 21:01:51', '2019-04-29 10:30:40', '2019-04-29 10:30:40'),
(5, 'ishani prajapati', 'ishani@gmail.com', '$2y$10$eUYsT6TRjnfvjQG1Cf4m2u9W5FDYSBH7byvL5dOlj16byddzYfSg.', 2, '3', '2019-04-29 10:31:27', '2019-04-29 10:31:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_contents`
--

CREATE TABLE `app_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `support_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `support_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offer_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_charge` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_contents`
--

INSERT INTO `app_contents` (`id`, `support_email`, `support_mobile`, `address`, `fb_link`, `instagram_link`, `twitter_link`, `google_link`, `offer_text`, `delivery_charge`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'support@shroud.in', '8758965327', 'Ahmedabad, Gujarat, India', 'https://www.facebook.com/Shroud-2236465976567540/?modal=admin_todo_tour', 'https://www.instagram.com/shroud_fashion/', NULL, NULL, 'Purchase worth Rs. 2000/- & get SHROUD membership.', 50, '2019-04-09 10:57:18', '2019-04-29 11:38:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `url`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banner 1', 'http://fashion.altsolution.in/products', 'p2onkrgwq8bnsov6rifg', 'New Brand is here', 1, '2019-04-18 04:52:59', '2019-04-29 10:28:20', NULL),
(2, 'Banner 2', 'http://fashion.altsolution.in/products', 'axtflbrkte63dtzklmiy', 'Lets Do Shopping', 1, '2019-04-18 04:53:54', '2019-04-29 10:28:28', NULL),
(3, 'Banner 3', 'http://fashion.altsolution.in/products', 'nmn2me8ycgu6bvmindh0', 'Wow..!!', 1, '2019-04-18 04:55:22', '2019-04-29 10:28:37', NULL),
(4, 'Banner 4', 'http://fashion.altsolution.in/products', 'cpna4rb1vf1h1hpaym87', 'Keep. Calm. Shopping.', 1, '2019-04-18 04:56:17', '2019-04-29 10:28:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men\'s', 'mens', NULL, 2, '2019-04-17 22:49:02', '2019-05-02 10:31:05', NULL),
(2, 'T-shirt', 't-shirt', NULL, 1, '2019-04-17 22:49:22', '2019-04-17 22:49:22', NULL),
(3, 'Shirt', 'shirt', NULL, 1, '2019-04-17 22:49:30', '2019-04-17 22:49:30', NULL),
(4, 'Bottom Wear', 'bottom-wear', NULL, 1, '2019-04-17 22:53:04', '2019-04-17 22:53:04', NULL),
(5, 'Denim', 'denim', 4, 1, '2019-04-17 22:53:13', '2019-04-17 22:53:13', NULL),
(6, 'Shorts', 'shorts', 4, 1, '2019-04-17 22:53:28', '2019-04-17 22:53:28', NULL),
(7, 'Chinos', 'chinos', 4, 1, '2019-04-17 22:53:50', '2019-04-17 22:53:50', NULL),
(8, 'Accessories', 'accessories', NULL, 1, '2019-04-19 02:17:02', '2019-04-19 02:17:02', NULL),
(9, 'Belt', 'belt', 8, 1, '2019-04-19 02:17:12', '2019-04-19 02:17:12', NULL),
(10, 'Wallet', 'wallet', 8, 1, '2019-04-19 02:17:32', '2019-04-19 02:17:32', NULL),
(11, 'Top Wear', 'top-wear', NULL, 1, '2019-04-28 03:44:53', '2019-04-29 10:07:38', NULL),
(12, 'Tshirt', 'tshirt', 11, 1, '2019-04-28 03:45:07', '2019-04-28 03:45:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Spray', '#85dff2', 1, '2019-04-17 22:43:19', '2019-04-29 10:34:47', NULL),
(2, 'Christine', '#ef730d', 1, '2019-04-17 22:43:34', '2019-04-17 22:43:34', NULL),
(3, 'Black', '#000000', 1, '2019-04-17 22:43:50', '2019-04-18 04:48:23', NULL),
(4, 'Corn', '#f5b905', 1, '2019-04-17 22:44:24', '2019-04-17 22:44:24', NULL),
(5, 'Scarlet', '#fc180c', 1, '2019-04-17 22:44:51', '2019-04-17 22:44:51', NULL),
(6, 'White', '#ffffff', 1, '2019-04-17 22:45:23', '2019-04-17 22:45:23', NULL),
(7, 'Silver Sand', '#c7caca', 1, '2019-04-17 22:45:36', '2019-04-17 22:45:36', NULL),
(8, 'Tory Blue', '#0f6197', 1, '2019-04-17 22:47:05', '2019-04-17 22:47:05', NULL),
(9, 'Orient', '#03647c', 1, '2019-04-18 04:29:12', '2019-04-18 04:29:12', NULL),
(10, 'Aquamarine', '#46fab2', 1, '2019-04-18 04:33:37', '2019-04-18 04:33:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maulik', 'mvp137890@gmail.com', '8758965327', 'Problem in Tshirt', '2019-04-18 05:44:14', '2019-04-18 05:44:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About', '<p>The Quicker Picker Upper</p>', '2019-04-09 10:57:18', '2019-04-18 05:43:14', NULL),
(2, 'FAQ', 'FAQ', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(3, 'Term & Condition', 'Term & Condition', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2018_09_15_095717_create_categories_table', 1),
(46, '2018_09_15_101207_create_admins_table', 1),
(47, '2018_09_20_164726_create_brands_table', 1),
(48, '2018_09_21_155020_create_offers_table', 1),
(49, '2018_09_21_171210_create_sizes_table', 1),
(50, '2018_09_21_175026_create_banners_table', 1),
(51, '2018_09_22_163330_create_colors_table', 1),
(52, '2018_09_22_163331_create_products_table', 1),
(53, '2018_09_23_183210_create_product_size_table', 1),
(54, '2018_09_23_183244_create_color_product_table', 1),
(55, '2018_09_29_183622_create_variations_table', 1),
(56, '2018_10_04_182121_create_window_images_table', 1),
(57, '2018_10_21_190838_create_addresses_table', 1),
(58, '2018_10_23_041047_create_vouchers_table', 1),
(59, '2018_10_23_041048_create_orders_table', 1),
(60, '2018_10_23_041117_create_order_products_table', 1),
(61, '2019_02_24_081043_create_contacts_table', 1),
(62, '2019_02_24_175447_create_app_contents_table', 1),
(63, '2019_03_07_162621_create_modules_table', 1),
(64, '2019_03_16_174157_create_contents_table', 1),
(65, '2019_04_27_183700_create_product_types_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dashboard', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(2, 'App Content', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(3, 'Color', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(4, 'Size', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(5, 'Category', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(6, 'Product', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(7, 'Order', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(8, 'Assign Order', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(9, 'Banner', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(10, 'Home Images', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(11, 'User', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(12, 'Offers', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(13, 'Contacts', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(14, 'About', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(15, 'FAQ', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(16, 'Term & Condition', '2019-04-09 10:57:18', '2019-04-09 10:57:18', NULL),
(17, 'Product Types', '2019-04-27 23:42:00', '2019-04-27 23:42:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT 'In Paisa',
  `amount_limit` int(11) NOT NULL DEFAULT '0',
  `use_time` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Multiple, 2: Single Time',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `offer_code`, `discount`, `amount`, `amount_limit`, `use_time`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Summer Offer', 'SUM1', 20, 0, 0, 1, '2019-04-18', '2019-04-30', 1, '2019-04-18 05:15:33', '2019-04-18 05:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `voucher_id` int(10) UNSIGNED DEFAULT NULL,
  `offer_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_mode` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: COD, 2: DebitCard, 3: Net Banking',
  `payment_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: No, 2: Yes',
  `payment_reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_response` longtext COLLATE utf8_unicode_ci,
  `cart_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `discount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `discount_amount` int(11) DEFAULT '0',
  `extra_discount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delivery_charge` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `total` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In Paisa, Payamount',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Order Checkout, 2: Order Placed, 3: Order Success, 4: Delivery Boy Pickup Order, 5: Delivery Boy To Customer, 6: Delivered, 7: Return, 8: Canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `voucher_id`, `offer_id`, `payment_mode`, `payment_status`, `payment_reference`, `payment_response`, `cart_amount`, `discount`, `discount_amount`, `extra_discount`, `delivery_charge`, `total`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 798, 0, 0, 0, 0, 798, 1, '2019-04-18 05:48:50', '2019-04-18 05:48:50', NULL),
(2, 1, 1, NULL, NULL, 2, 1, NULL, '{"isConsentPayment":"0","mihpayid":"595373","mode":null,"status":"failure","unmappedstatus":"userCancelled","key":"uc113iiK","txnid":"FHN201904192","amount":"2564.00","addedon":"2019-04-19 08:48:14","productinfo":"Round Neck Tshirt,Round Neck Tshirt,Round Neck Tshirt`,Round Neck Tshirt,Roud Neck Tshirt,Round Neck Tshirt,Round Neck Tshirt","firstname":"Maulik Prajapati","lastname":null,"address1":null,"address2":null,"city":null,"state":null,"country":null,"zipcode":null,"email":"mvp137890@gmail.com","phone":"8758965327","udf1":null,"udf2":null,"udf3":null,"udf4":null,"udf5":null,"udf6":null,"udf7":null,"udf8":null,"udf9":null,"udf10":null,"hash":"99b69c734a73f17eaa1dc6cc1ceef07b6751e24631c7e255b4c35af00f9fa1384ab4143ef8ce4bbb8c4daf9ec0cad9480985aeb162f7d0cf5826a2adcd50d202","field1":null,"field2":null,"field3":null,"field4":null,"field5":null,"field6":null,"field7":null,"field8":null,"field9":"Cancelled by user","PG_TYPE":"PAISA","bank_ref_num":"595373","bankcode":"PAYUW","error":"E000","error_Message":"No Error","payuMoneyId":"595373"}', 2564, 279, 0, 0, 50, 2564, 8, '2019-04-18 21:47:45', '2019-04-18 21:48:16', NULL),
(3, 3, 2, NULL, NULL, 2, 1, NULL, '{"isConsentPayment":"0","mihpayid":"595376","mode":null,"status":"failure","unmappedstatus":"userCancelled","key":"uc113iiK","txnid":"FHN201904193","amount":"449.00","addedon":"2019-04-19 08:54:16","productinfo":"Round Neck Tshirt","firstname":"nikunj  Prajapati","lastname":null,"address1":null,"address2":null,"city":null,"state":null,"country":null,"zipcode":null,"email":"nikunj@gmail.com","phone":"9825398521","udf1":null,"udf2":null,"udf3":null,"udf4":null,"udf5":null,"udf6":null,"udf7":null,"udf8":null,"udf9":null,"udf10":null,"hash":"08e56d0c861d1e65471296d104c52d957d672f1801663a8fd545588c659b4fdc67d3e8e42c639f61737db78ce627b7a3cc69da3030df87906592bea0bc96eccc","field1":null,"field2":null,"field3":null,"field4":null,"field5":null,"field6":null,"field7":null,"field8":null,"field9":"Cancelled by user","PG_TYPE":"PAISA","bank_ref_num":"595376","bankcode":"PAYUW","error":"E000","error_Message":"No Error","payuMoneyId":"595376"}', 449, 0, 0, 0, 50, 449, 8, '2019-04-18 21:54:01', '2019-04-18 21:54:17', NULL),
(4, 3, 2, NULL, NULL, 1, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 2, '2019-04-18 21:55:26', '2019-04-18 21:57:29', NULL),
(5, 5, 3, NULL, NULL, 2, 1, NULL, NULL, 1247, 0, 0, 0, 50, 1247, 1, '2019-04-18 22:15:01', '2019-04-18 22:15:01', NULL),
(6, 7, 4, NULL, NULL, 101, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-04-19 01:53:48', '2019-04-19 01:53:48', NULL),
(7, 7, 4, NULL, NULL, 1, 1, NULL, NULL, 848, 0, 0, 0, 50, 848, 1, '2019-04-19 02:01:12', '2019-04-19 02:01:12', NULL),
(8, 1, 1, NULL, NULL, 101, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-04-19 06:45:39', '2019-04-19 06:45:39', NULL),
(9, 1, 5, NULL, NULL, 101, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-04-19 06:51:40', '2019-04-19 06:51:40', NULL),
(10, 1, 1, NULL, NULL, 101, 1, NULL, '{"isConsentPayment":"0","mihpayid":"325741","mode":"CC","status":"failure","unmappedstatus":"failed","key":"uc113iiK","txnid":"FHN2019042110","amount":"848.00","addedon":"2019-04-21 09:23:05","productinfo":"Round Neck Tshirt","firstname":"Maulik Prajapati","lastname":null,"address1":null,"address2":null,"city":null,"state":null,"country":null,"zipcode":null,"email":"mvp137890@gmail.com","phone":"8758965327","udf1":null,"udf2":null,"udf3":null,"udf4":null,"udf5":null,"udf6":null,"udf7":null,"udf8":null,"udf9":null,"udf10":null,"hash":"acef88df323d104b48017f44a9d3de9f1ab2b943647ceae6efe5722bb552436ffc2d5d73273445196d16de63e50c8d66603ffa595f284c7c176ab885e6bd7871","field1":"395817","field2":"860806","field3":"20190421","field4":"MC","field5":"625816579839","field6":"45","field7":"1","field8":"3DS","field9":"Verification of Secure Hash Failed: E700 -- Unspecified Failure -- Unknown Error -- Unable to be determined--E500","PG_TYPE":"AXISPG","bank_ref_num":"395817","bankcode":"VISA","error":"E500","error_Message":"Bank failed to authenticate the customer","name_on_card":"Maulikbhai P","cardnum":"416645XXXXXX3419","cardhash":"This field is no longer supported in postback params.","amount_split":"{\\"PAYU\\":\\"848.00\\"}","payuMoneyId":"597865","discount":"0.00","net_amount_debit":"0.00"}', 848, 0, 0, 0, 50, 848, 8, '2019-04-20 22:21:46', '2019-04-20 22:23:33', NULL),
(11, 8, 6, NULL, NULL, 1, 1, NULL, NULL, 2444, 0, 0, 0, 50, 2444, 1, '2019-04-21 02:49:25', '2019-04-21 02:49:25', NULL),
(12, 8, 6, NULL, NULL, 1, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-04-21 03:05:15', '2019-04-21 03:05:15', NULL),
(13, 1, 1, NULL, NULL, 101, 1, NULL, '{"isConsentPayment":"0","mihpayid":"598064","mode":null,"status":"failure","unmappedstatus":"userCancelled","key":"uc113iiK","txnid":"FHN2019042113","amount":"1247.00","addedon":"2019-04-21 14:30:22","productinfo":"Pattern 2,Pattern 2,Pattern 2","firstname":"Maulik Prajapati","lastname":null,"address1":null,"address2":null,"city":null,"state":null,"country":null,"zipcode":null,"email":"mvp137890@gmail.com","phone":"8758965327","udf1":null,"udf2":null,"udf3":null,"udf4":null,"udf5":null,"udf6":null,"udf7":null,"udf8":null,"udf9":null,"udf10":null,"hash":"fa98ae4340285d3b6a513e761ae7243c4bb05a38909138a44003db713a6a17bcc882f15d62a8b0e3938ee970552067449c0f591e8802971984cedcb859af03e7","field1":null,"field2":null,"field3":null,"field4":null,"field5":null,"field6":null,"field7":null,"field8":null,"field9":"Cancelled by user","PG_TYPE":"PAISA","bank_ref_num":"598064","bankcode":"PAYUW","error":"E000","error_Message":"No Error","payuMoneyId":"598064"}', 1247, 0, 0, 0, 50, 1247, 8, '2019-04-21 03:30:03', '2019-04-21 03:30:23', NULL),
(14, 1, 5, NULL, NULL, 1, 1, NULL, NULL, 1646, 0, 0, 0, 50, 1646, 1, '2019-04-26 06:53:34', '2019-04-26 06:53:34', NULL),
(15, 1, 5, NULL, NULL, 101, 1, NULL, '{"isConsentPayment":"0","mihpayid":"607597","mode":null,"status":"failure","unmappedstatus":"userCancelled","key":"uc113iiK","txnid":"SHRD2019042615","amount":"449.00","addedon":"2019-04-26 17:57:30","productinfo":"Pattern 4","firstname":"Maulik Prajapati","lastname":null,"address1":null,"address2":null,"city":null,"state":null,"country":null,"zipcode":null,"email":"mvp137890@gmail.com","phone":"8758965327","udf1":null,"udf2":null,"udf3":null,"udf4":null,"udf5":null,"udf6":null,"udf7":null,"udf8":null,"udf9":null,"udf10":null,"hash":"416f38bcb6e3039c3aa000d05b0ba9b1a738cfb1518b64fbdd3bc636f7dd9a4eb6f2dfe696bebcbb5edc7a0fe0d4df7d7272d39b6c773f35bd5694df6ebbd050","field1":null,"field2":null,"field3":null,"field4":null,"field5":null,"field6":null,"field7":null,"field8":null,"field9":"Cancelled by user","PG_TYPE":"PAISA","bank_ref_num":"607597","bankcode":"PAYUW","error":"E000","error_Message":"No Error","payuMoneyId":"607597"}', 449, 0, 0, 0, 50, 449, 8, '2019-04-26 06:57:16', '2019-04-26 06:57:32', NULL),
(16, 10, 8, NULL, NULL, 1, 1, NULL, NULL, 349, 0, 0, 0, 50, 349, 2, '2019-04-28 04:08:16', '2019-04-28 04:10:06', NULL),
(17, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-04-29 11:34:46', '2019-04-29 11:34:46', NULL),
(18, 12, 9, NULL, NULL, 2, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-05-02 05:35:47', '2019-05-02 05:35:47', NULL),
(19, 14, 10, NULL, NULL, 101, 1, NULL, '{"isConsentPayment":"0","mihpayid":"611928","mode":null,"status":"failure","unmappedstatus":"failed","key":"uc113iiK","txnid":"SHRD2019050219","amount":"449.00","addedon":"2019-05-02 16:49:29","productinfo":"New Printed Round Neck","firstname":"Srushti Prajapati","lastname":null,"address1":null,"address2":null,"city":null,"state":null,"country":null,"zipcode":null,"email":"srushti@gmail.com","phone":"8758965327","udf1":null,"udf2":null,"udf3":null,"udf4":null,"udf5":null,"udf6":null,"udf7":null,"udf8":null,"udf9":null,"udf10":null,"hash":"d001f52ddc5007657a906e22c15cbc289d60f2f7f87854e624ce166a5735ba118a308f99692256e6adf4becd2c4a76bbc3f2619b1c4cf3c070322e3bf982783c","field1":null,"field2":null,"field3":null,"field4":null,"field5":null,"field6":null,"field7":null,"field8":null,"field9":"Cancelled by user","PG_TYPE":"PAISA","bank_ref_num":"611928","bankcode":"PAYUW","error":"E000","error_Message":"Payment Expired","amount_split":"{\\"PAYU\\":\\"449.0\\"}","payuMoneyId":"611928"}', 449, 0, 0, 0, 50, 449, 8, '2019-05-02 05:43:53', '2019-05-02 05:49:35', NULL),
(20, 15, 11, NULL, NULL, 1, 1, NULL, NULL, 2444, 0, 0, 0, 50, 2444, 1, '2019-05-02 05:58:29', '2019-05-02 05:58:29', NULL),
(21, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 6, '2019-05-02 10:19:36', '2019-05-02 10:20:43', NULL),
(22, 16, 12, NULL, NULL, 1, 1, NULL, NULL, 2444, 0, 0, 0, 50, 2444, 1, '2019-05-02 10:55:29', '2019-05-02 10:55:29', NULL),
(23, 16, 12, NULL, NULL, 1, 1, NULL, NULL, 3242, 0, 0, 0, 50, 3242, 1, '2019-05-02 10:59:24', '2019-05-02 10:59:24', NULL),
(24, 16, 12, NULL, NULL, 1, 1, NULL, NULL, 449, 0, 0, 0, 50, 449, 1, '2019-05-02 11:06:49', '2019-05-02 11:06:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `variation_id` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In Paisa',
  `max_price` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In Paisa',
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `return_reason` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: Damage, 2: Other Reason',
  `message` text COLLATE utf8_unicode_ci COMMENT 'Return Order Comment',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: In Process, 2: Order Place, 3: Success, 4: Cancel, 5: Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `product_id`, `variation_id`, `price`, `max_price`, `qty`, `return_reason`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 30, 399, 399, 1, 0, NULL, 3, '2019-04-18 05:48:50', '2019-04-18 05:48:50', NULL),
(2, 1, 1, 6, 90, 399, 399, 1, 0, NULL, 3, '2019-04-18 05:48:50', '2019-04-18 05:48:50', NULL),
(3, 2, 1, 6, 81, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:45', '2019-04-18 21:47:45', NULL),
(4, 2, 1, 5, 66, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:45', '2019-04-18 21:47:45', NULL),
(5, 2, 1, 4, 54, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:45', '2019-04-18 21:47:45', NULL),
(6, 2, 1, 5, 67, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:45', '2019-04-18 21:47:45', NULL),
(7, 2, 1, 3, 44, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:46', '2019-04-18 21:47:46', NULL),
(8, 2, 1, 5, 68, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:46', '2019-04-18 21:47:46', NULL),
(9, 2, 1, 1, 4, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:47:46', '2019-04-18 21:47:46', NULL),
(10, 3, 3, 6, 82, 399, 399, 1, 0, NULL, 1, '2019-04-18 21:54:02', '2019-04-18 21:54:02', NULL),
(11, 4, 3, 6, 84, 399, 399, 1, 0, NULL, 3, '2019-04-18 21:55:26', '2019-04-18 21:55:26', NULL),
(12, 5, 5, 6, 92, 399, 399, 1, 0, NULL, 1, '2019-04-18 22:15:01', '2019-04-18 22:15:01', NULL),
(13, 5, 5, 6, 88, 399, 399, 1, 0, NULL, 1, '2019-04-18 22:15:01', '2019-04-18 22:15:01', NULL),
(14, 5, 5, 6, 84, 399, 399, 1, 0, NULL, 1, '2019-04-18 22:15:01', '2019-04-18 22:15:01', NULL),
(15, 6, 7, 6, 82, 399, 399, 1, 0, NULL, 1, '2019-04-19 01:53:48', '2019-04-19 01:53:48', NULL),
(16, 7, 7, 6, 84, 399, 399, 1, 0, NULL, 3, '2019-04-19 02:01:12', '2019-04-19 02:01:12', NULL),
(17, 7, 7, 5, 68, 399, 399, 1, 0, NULL, 3, '2019-04-19 02:01:12', '2019-04-19 02:01:12', NULL),
(18, 8, 1, 6, 83, 399, 399, 1, 0, NULL, 1, '2019-04-19 06:45:39', '2019-04-19 06:45:39', NULL),
(19, 9, 1, 6, 82, 399, 399, 1, 0, NULL, 1, '2019-04-19 06:51:40', '2019-04-19 06:51:40', NULL),
(20, 10, 1, 6, 91, 399, 399, 2, 0, NULL, 1, '2019-04-20 22:21:46', '2019-04-20 22:21:46', NULL),
(21, 11, 8, 5, 67, 399, 399, 6, 0, NULL, 3, '2019-04-21 02:49:25', '2019-04-21 02:49:25', NULL),
(22, 12, 8, 4, 54, 399, 399, 1, 0, NULL, 3, '2019-04-21 03:05:15', '2019-04-21 03:05:15', NULL),
(23, 13, 1, 5, 72, 399, 399, 1, 0, NULL, 1, '2019-04-21 03:30:03', '2019-04-21 03:30:03', NULL),
(24, 13, 1, 5, 65, 399, 399, 1, 0, NULL, 1, '2019-04-21 03:30:03', '2019-04-21 03:30:03', NULL),
(25, 13, 1, 5, 66, 399, 399, 1, 0, NULL, 1, '2019-04-21 03:30:03', '2019-04-21 03:30:03', NULL),
(26, 14, 1, 6, 82, 399, 399, 1, 0, NULL, 3, '2019-04-26 06:53:34', '2019-04-26 06:53:34', NULL),
(27, 14, 1, 9, 95, 399, 399, 1, 0, NULL, 3, '2019-04-26 06:53:34', '2019-04-26 06:53:34', NULL),
(28, 14, 1, 4, 58, 399, 399, 1, 0, NULL, 3, '2019-04-26 06:53:34', '2019-04-26 06:53:34', NULL),
(29, 14, 1, 4, 54, 399, 399, 1, 0, NULL, 3, '2019-04-26 06:53:34', '2019-04-26 06:53:34', NULL),
(30, 15, 1, 3, 34, 399, 399, 1, 0, NULL, 8, '2019-04-26 06:57:16', '2019-04-26 06:57:32', NULL),
(31, 16, 10, 11, 103, 299, 299, 1, 0, NULL, 2, '2019-04-28 04:08:16', '2019-04-28 04:10:06', NULL),
(32, 17, 1, 12, 108, 399, 399, 1, 0, NULL, 3, '2019-04-29 11:34:46', '2019-04-29 11:34:46', NULL),
(33, 18, 12, 12, 111, 399, 399, 1, 0, NULL, 1, '2019-05-02 05:35:47', '2019-05-02 05:35:47', NULL),
(34, 19, 14, 12, 107, 399, 399, 1, 0, NULL, 8, '2019-05-02 05:43:53', '2019-05-02 05:49:35', NULL),
(35, 20, 15, 12, 108, 399, 399, 6, 0, NULL, 3, '2019-05-02 05:58:29', '2019-05-02 05:58:29', NULL),
(36, 21, 1, 12, 108, 399, 399, 1, 1, 'hi', 7, '2019-05-02 10:19:36', '2019-05-02 10:26:48', NULL),
(37, 22, 16, 12, 109, 399, 399, 6, 0, NULL, 3, '2019-05-02 10:55:29', '2019-05-02 10:55:29', NULL),
(38, 23, 16, 12, 109, 399, 399, 8, 0, NULL, 3, '2019-05-02 10:59:24', '2019-05-02 10:59:24', NULL),
(39, 24, 16, 12, 108, 399, 399, 1, 0, NULL, 3, '2019-05-02 11:06:49', '2019-05-02 11:06:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_side_name_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` double(15,8) NOT NULL DEFAULT '0.00000000',
  `description` longtext COLLATE utf8_unicode_ci,
  `chart` longtext COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `cod` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1: Yes, 2: No',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_type_id`, `name`, `admin_side_name_show`, `slug`, `weight`, `description`, `chart`, `meta_keyword`, `meta_description`, `cod`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 'Pattern 6', NULL, 'round-neck-tshirt201904180430221', 0.00000000, '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placket</li>\r\n	<li>Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placket</li>\r\n	<li>Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', '100 % Cotton Tshirt', 2, 1, '2019-04-17 23:00:22', '2019-04-21 02:10:50', NULL),
(2, 2, NULL, 'Pattern 5', NULL, 'roud-neck-tshirt201904180444021', 0.00000000, '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placket</li>\r\n	<li>Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placket</li>\r\n	<li>Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', '100 % Cotton', 2, 1, '2019-04-17 23:14:02', '2019-04-21 02:10:37', NULL),
(3, 2, NULL, 'Pattern 4', NULL, 'roud-neck-tshirt201904180449082', 0.00000000, '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placket</li>\r\n	<li>Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placket</li>\r\n	<li>Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', '100 % Cotton', 2, 1, '2019-04-17 23:19:08', '2019-04-21 02:10:12', NULL),
(4, 2, NULL, 'Patter 3', NULL, 'round-neck-tshirt201904180453433', 0.00000000, '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', '100 % Cotton', 2, 1, '2019-04-17 23:23:43', '2019-04-21 02:09:57', NULL),
(5, 2, NULL, 'Pattern 2', NULL, 'round-neck-tshirt201904180957174', 0.00000000, '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', '100% Cotton', 2, 1, '2019-04-18 04:27:17', '2019-04-21 02:09:45', NULL),
(6, 2, NULL, 'Pattern 1', NULL, 'round-neck-tshirt201904181005485', 0.00000000, '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>100% Cotton</li>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', '100 % Cotton', 2, 1, '2019-04-18 04:35:48', '2019-04-21 02:09:33', NULL),
(7, 10, NULL, 'Wallet', NULL, 'wallet201904191010116', 0.00000000, '<p>We Noticed a New Login,&nbsp;</p>', '<p>We Noticed a New Login,&nbsp;</p>', 'T-shirt, Jens', 'We Noticed a New Login,', 2, 1, '2019-04-19 04:40:11', '2019-04-19 04:40:11', NULL),
(8, 10, NULL, 'Wallet', NULL, 'wallet201904191014457', 0.00000000, '<p>We Noticed a New Login,&nbsp;</p>', '<p>We Noticed a New Login,&nbsp;</p>', 'T-shirt, Jens', 'We Noticed a New Login,', 2, 1, '2019-04-19 04:44:45', '2019-04-19 04:44:45', NULL),
(9, 10, NULL, 'wallet', NULL, 'wallet201904191016038', 0.00000000, '<p>We Noticed a New Login,&nbsp;</p>', '<p>We Noticed a New Login,&nbsp;</p>', 'T-shirt, Jens', 'We Noticed a New Login,', 2, 1, '2019-04-19 04:46:03', '2019-04-19 04:46:03', NULL),
(10, 2, 3, 'patter 6', 'Item 2', 'patter-6201904210747479', 0.00000000, '<p>a</p>', '<p>1</p>', 'T-shirt, Jens', '1', 2, 1, '2019-04-21 02:17:47', '2019-04-29 10:21:03', NULL),
(11, 12, 3, 'Roud Nack Tshirt', 'Item 1', 'roud-nack-tshirt2019042809173210', 0.00000000, '<ul>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', '<ul>\r\n	<li>Regular fit</li>\r\n	<li>Machine wash</li>\r\n	<li>Live the collegiate spirit in our number appliqu&eacute; polo with H&amp;S signature logo embroidery at chest</li>\r\n	<li>Collared neck with 2 button placke Iconic H&amp;S logo embroidery at left chest</li>\r\n</ul>', 'T-shirt, Jens', 'Regular Fit', 2, 1, '2019-04-28 03:47:32', '2019-04-29 10:20:28', NULL),
(12, 2, 8, 'New Printed Round Neck', 'Item 3', 'new-printed-round-neck2019042916070011', 0.00000000, '<p>1</p>', '<p>1</p>', 'T-shirt, Jens', 'hi this is test of met descrption', 2, 1, '2019-04-29 10:37:00', '2019-05-02 10:36:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tshirt', 2, '2019-04-28 03:45:45', '2019-04-29 10:16:51', NULL),
(2, 'Shirt', 2, '2019-04-29 10:13:26', '2019-04-29 10:16:58', NULL),
(3, 'Roud Nack', 1, '2019-04-29 10:17:12', '2019-04-29 10:17:12', NULL),
(4, 'Polo Neck', 1, '2019-04-29 10:17:30', '2019-04-29 10:17:30', NULL),
(5, 'V Nack', 1, '2019-04-29 10:17:47', '2019-04-29 10:17:47', NULL),
(6, 'Half Sleeve', 1, '2019-04-29 10:17:59', '2019-04-29 10:17:59', NULL),
(7, 'Full Sleeve', 1, '2019-04-29 10:18:11', '2019-04-29 10:18:11', NULL),
(8, 'Printed', 1, '2019-04-29 10:18:21', '2019-04-29 10:18:21', NULL),
(9, 'Plain', 1, '2019-04-29 10:18:32', '2019-04-29 10:18:32', NULL),
(10, 'Chex', 1, '2019-04-29 10:18:43', '2019-04-29 10:18:43', NULL),
(11, 'Linen', 1, '2019-04-29 10:18:53', '2019-04-29 10:18:53', NULL),
(12, 'Fedded', 1, '2019-04-29 10:19:03', '2019-04-29 10:19:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'M', 1, '2019-04-17 22:47:36', '2019-04-29 10:35:03', NULL),
(2, 'L', 1, '2019-04-17 22:47:43', '2019-04-17 22:47:43', NULL),
(3, 'XL', 1, '2019-04-17 22:47:55', '2019-04-17 22:47:55', NULL),
(4, 'XXL', 1, '2019-04-17 22:48:06', '2019-04-17 22:48:06', NULL),
(5, '2XL', 1, '2019-04-17 22:48:18', '2019-04-17 22:48:18', NULL),
(6, '3XL', 1, '2019-04-17 22:48:27', '2019-04-17 22:48:27', NULL),
(7, '4XL', 1, '2019-04-17 22:48:36', '2019-04-17 22:48:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `anniversary_date` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_ship_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referral_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `social_login` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: default, 1: Google, 2: Facebook, 3: Twitter',
  `login_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Web, 2: Android, 3: IOS',
  `login_count` bigint(20) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `birth_date`, `anniversary_date`, `password`, `member_ship_code`, `referral_code`, `status`, `social_login`, `login_type`, `login_count`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maulik Prajapati', 'mvp137890@gmail.com', '8758965327', '1990-08-07', '2015-01-17', '$2y$10$KfoTzjHL1PKZDA/zr.UMn.Fy73pT3VS.2nBZ1Q5jjKt92xNahnsM.', 'FHNMiKdj', 'FHNsZpq', 1, 0, 1, 1, 'iFWvXQAmYFi9ka2XoynyJ00Olk5JSq7xGg0kGuIvrpQgkpSoRTBpWRi1su4a', '2019-04-18 05:47:44', '2019-05-02 05:53:05', NULL),
(2, 'Ishani Prajapati', 'mvp_137890@yahoo.com', '8758965326', NULL, NULL, '$2y$10$jxw1TBaOQU0WJwqPBZc2PeLL/UKpEUsMYEiWWPDHTHHkR2yBANucC', NULL, 'FHN94lw', 1, 0, 1, 1, '8IKVH17Tzfxarw28CeUirWAeoxkTn20B4vWTQA0KwOg5S3AhiYHY5vFoVNeT', '2019-04-18 21:22:17', '2019-04-18 21:22:17', NULL),
(3, 'gaurang prajapati', 'nikunj@gmail.com', '9825398521', NULL, NULL, '$2y$10$clnxSR403RdM.7nPcATFuegdK2MQWhuKw4p1IyGb4gOehc6DcXhbu', 'FHNMswQM', 'FHN7Rcp', 1, 0, 1, 1, '1DsBbMYNx2GuDPW7SHaW9J8y6dL9KtenaZWJSnPQJsgXdJ4JnwUIqTCo87KX', '2019-04-18 21:51:17', '2019-04-18 22:00:25', NULL),
(5, 'Gaurang Prajapati', 'gaurang@gmail.com', '9825013256', NULL, NULL, '$2y$10$yW0j13yMM/94eS9QshEFkOevQlfj8L0NUeqJEO0aMMmW1nqH5uwBu', 'FHNhTq6R', 'FHNTXo6', 1, 0, 1, 1, 'diEHc6s3waCBUSyExNQoMc4x8jofplMSNkrquIFFtD6wZYW7l6KZNXhBwBPk', '2019-04-18 22:03:12', '2019-04-18 22:14:54', NULL),
(7, 'samrat  gajjar', 'sam@gmail.com', '8469968120', NULL, NULL, '$2y$10$9pfue.gZkyJlGn4LLJEmX.6R/nz0EK31QEsP8N9ysNzaxfkR1OtU6', 'FHNF3z6j', 'FHNhG0h', 1, 0, 1, 1, 'mKGYGeIwIg2EWEAOAoa6DSHKx7ad3N68N8eJApnhg3B198brBjeN9K7Q0M9T', '2019-04-19 01:43:56', '2019-04-19 01:54:41', NULL),
(8, 'amit prajapati', 'ami@gmail.com', '9898989898', NULL, NULL, '$2y$10$QkU43dCApwjmcfN3VMSOxej2U4cHCzrbAm8zHRvMt4z1s3ttXSN/6', 'FHNQH1tW', 'FHNWVJI', 1, 0, 1, 1, 'rhUZ1b0YubONaY4YBVXpCNHeJsrxtv5QPaZr9rY5sNJS4SqHc4vZ1wwZ7uHQ', '2019-04-21 02:39:47', '2019-04-21 02:49:17', NULL),
(9, 'demo demo', 'demo@gmail.com', '9874563210', '2019-04-26', '2019-04-25', '$2y$10$6IjVwCY/0MdKEetgjKxXi.zyuJrO5rXcNG/pXipXEfzaUNRShvrGa', NULL, 'SHRDwqZH', 1, 0, 1, 1, NULL, '2019-04-26 12:38:15', '2019-04-26 12:38:15', NULL),
(10, 'Samrat Gajjar', 'gajjar@gmail.com', '9825398521', '1991-06-01', '2001-06-01', '$2y$10$PxivdpDwDa78yxanFeFoKeXhi0mPgul0s/350sHMVpmvrIA7iQ10q', NULL, 'SHRD0aUK', 1, 0, 1, 1, 'aQVC8p0nfsiu7BA5SjjXOhIoMVJNUwBMxtxslMVtJtJ7IRSMzobuu2cYj0Nk', '2019-04-28 04:02:04', '2019-04-28 04:02:04', NULL),
(11, 'Daksha Prajapati', 'daksha@gmail.com', '9687129641', '2004-04-04', '2019-04-04', '$2y$10$nhjxBBmPe6dH.qNTJ0Mdseuoq98HQYaEqm7LT0kmWegfvgb7LQ/ka', NULL, 'SHRDE86l', 1, 0, 1, 1, NULL, '2019-05-01 07:55:42', '2019-05-01 07:55:42', NULL),
(12, 'Devansh Prajapati', 'devansh@gmail.com', '8758965327', '2011-01-11', '2011-01-11', '$2y$10$4EOXl.OwC0F.op20QyXkiOIXen/8pznXbpzIQnnp1iWdscpNbgSDm', 'SHRDDevan11', 'SHRDcorQ', 1, 0, 1, 1, 'iKTAnvQfVbSYgupkve4LW8zCtVGn4AjExTwVPUmyrnyxSblqEKZzddCTXPEd', '2019-05-02 05:28:42', '2019-05-02 05:35:27', NULL),
(13, 'Shiv Prajapati', 'shiv@gmail.com', '8758965327', '2017-01-11', '2017-01-11', '$2y$10$lhCMaZKt/lZ83zSS4DolyuUznQvZ5XcLzpM8t4Xh9Ukt4dNbo.XVO', NULL, 'SHRDCrFw', 1, 0, 1, 1, 'HQgFdqLCHBbABT7gnA5G5SaHKAQLCVJLH011T7SgswFpAOXFrVxbk5Nv8eML', '2019-05-02 05:39:08', '2019-05-02 05:40:05', NULL),
(14, 'Srushti Prajapati', 'srushti@gmail.com', '8758965327', '2019-01-11', '2019-01-11', '$2y$10$9Lg8SECM9gVGFDsfUwE5reO0SuTv.u7ezk2CV7S5qrRCeRe1zavRK', NULL, 'SHRDyrqX', 1, 0, 1, 1, 'mWsRnYoTLhMubVJGuOSypKWI4B0JTnFfm5psJg7HAfyHcQgbRTne2BCRGUIr', '2019-05-02 05:42:32', '2019-05-02 05:42:32', NULL),
(15, 'avni prajapati', 'avni@gmail.com', '8758965327', '2019-01-11', '2019-01-11', '$2y$10$oQfIcNP4fR0XPccrU/.UQu38YlAcFor24BThK5eCWZzOsa0G0CuuG', 'SHRDavni919', 'SHRDmjQq', 1, 0, 1, 1, NULL, '2019-05-02 05:56:32', '2019-05-02 05:57:53', NULL),
(16, 'bhavesh sanghani', 'bhavesh@gmail.com', '8758965327', '2018-06-04', '2019-05-01', '$2y$10$A094VM8HOwpIJXhsMTwjqef.XdLpzSiL0OjiZ.UxbkUkokrNMKP1u', 'SHRDbhav318', 'SHRDQOxg', 1, 0, 1, 1, 'T5Sa4n7vgGHInu9jSI2rjACAhzJgyNxxhVgY4iiIWSANnzptAOqzphJO9pM2', '2019-05-02 10:53:13', '2019-05-02 10:54:06', NULL),
(17, 'vipul talaviya', 'vpultalaviya@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SHRDBTiI', 1, 0, 1, 1, 'DgovO72DzJ94npO2kCBxRxydM2PzwuUSFdGVBKOflB31LCNKY25pqC7Yw5mC', '2019-05-03 13:22:36', '2019-05-03 13:22:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `images` text COLLATE utf8_unicode_ci,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `product_id`, `color_id`, `size_id`, `images`, `price`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 1, 'otokqyah5xfazwbgyohy,guczj3nkka2tcpldgq6m,lzjzwjztkydxjtweoefp,rn0cg1ycrqw0flwjaq6e', 399, 32, '2019-04-17 23:02:41', '2019-04-17 23:02:41', NULL),
(2, 1, 2, 2, 'otokqyah5xfazwbgyohy,guczj3nkka2tcpldgq6m,lzjzwjztkydxjtweoefp,rn0cg1ycrqw0flwjaq6e', 399, 32, '2019-04-17 23:02:41', '2019-04-17 23:02:41', NULL),
(3, 1, 2, 3, 'otokqyah5xfazwbgyohy,guczj3nkka2tcpldgq6m,lzjzwjztkydxjtweoefp,rn0cg1ycrqw0flwjaq6e', 399, 32, '2019-04-17 23:02:41', '2019-04-17 23:02:41', NULL),
(4, 1, 2, 4, 'otokqyah5xfazwbgyohy,guczj3nkka2tcpldgq6m,lzjzwjztkydxjtweoefp,rn0cg1ycrqw0flwjaq6e', 399, 31, '2019-04-17 23:02:41', '2019-04-18 21:47:46', NULL),
(5, 1, 8, 1, 'i7ib5m6jivvoampop1d9,d6dozwtsfips29iatz7b,pc89cr2q8dk0t6gkycmz,ijhucieqkcpkkfktnvvu', 399, 32, '2019-04-17 23:06:20', '2019-04-17 23:06:20', NULL),
(6, 1, 8, 2, 'i7ib5m6jivvoampop1d9,d6dozwtsfips29iatz7b,pc89cr2q8dk0t6gkycmz,ijhucieqkcpkkfktnvvu', 399, 32, '2019-04-17 23:06:20', '2019-04-17 23:06:20', NULL),
(7, 1, 8, 3, 'i7ib5m6jivvoampop1d9,d6dozwtsfips29iatz7b,pc89cr2q8dk0t6gkycmz,ijhucieqkcpkkfktnvvu', 399, 32, '2019-04-17 23:06:20', '2019-04-17 23:06:20', NULL),
(8, 1, 8, 4, 'i7ib5m6jivvoampop1d9,d6dozwtsfips29iatz7b,pc89cr2q8dk0t6gkycmz,ijhucieqkcpkkfktnvvu', 399, 32, '2019-04-17 23:06:20', '2019-04-17 23:06:20', NULL),
(9, 1, 3, 1, 'nuo1d6k2wcgbs9tp5wrb,dyh04db5e6q6p0acqwto,x14jpqdwon4ay81vx3od,jekoxqmpcr4c54myewyu', 399, 32, '2019-04-17 23:09:23', '2019-04-17 23:09:23', NULL),
(10, 1, 3, 2, 'nuo1d6k2wcgbs9tp5wrb,dyh04db5e6q6p0acqwto,x14jpqdwon4ay81vx3od,jekoxqmpcr4c54myewyu', 399, 32, '2019-04-17 23:09:23', '2019-04-17 23:09:23', NULL),
(11, 1, 3, 3, 'nuo1d6k2wcgbs9tp5wrb,dyh04db5e6q6p0acqwto,x14jpqdwon4ay81vx3od,jekoxqmpcr4c54myewyu', 399, 32, '2019-04-17 23:09:23', '2019-04-17 23:09:23', NULL),
(12, 1, 3, 4, 'nuo1d6k2wcgbs9tp5wrb,dyh04db5e6q6p0acqwto,x14jpqdwon4ay81vx3od,jekoxqmpcr4c54myewyu', 399, 32, '2019-04-17 23:09:23', '2019-04-17 23:09:23', NULL),
(13, 1, 4, 1, 'gjcb17pzuxlv0l01ldvd,dga1aaavyxghtqsplzzq,pxkpskw9dgxhexr9fnkn,mifoamwsmrwso7hujkvj', 399, 32, '2019-04-17 23:10:32', '2019-04-17 23:10:32', NULL),
(14, 1, 4, 2, 'gjcb17pzuxlv0l01ldvd,dga1aaavyxghtqsplzzq,pxkpskw9dgxhexr9fnkn,mifoamwsmrwso7hujkvj', 399, 32, '2019-04-17 23:10:32', '2019-04-17 23:10:32', NULL),
(15, 1, 4, 3, 'gjcb17pzuxlv0l01ldvd,dga1aaavyxghtqsplzzq,pxkpskw9dgxhexr9fnkn,mifoamwsmrwso7hujkvj', 399, 32, '2019-04-17 23:10:32', '2019-04-17 23:10:32', NULL),
(16, 1, 4, 4, 'gjcb17pzuxlv0l01ldvd,dga1aaavyxghtqsplzzq,pxkpskw9dgxhexr9fnkn,mifoamwsmrwso7hujkvj', 399, 32, '2019-04-17 23:10:32', '2019-04-17 23:10:32', NULL),
(17, 1, 5, 1, 'pqc8pxgm3tcwpxf9h2we,gfzmzdhkae4mgnafmeok,ehawbq0qcehhvxbtfs0n,xgaayxw950yxdxodi1vu', 399, 32, '2019-04-17 23:11:14', '2019-04-17 23:11:14', NULL),
(18, 1, 5, 2, 'pqc8pxgm3tcwpxf9h2we,gfzmzdhkae4mgnafmeok,ehawbq0qcehhvxbtfs0n,xgaayxw950yxdxodi1vu', 399, 32, '2019-04-17 23:11:14', '2019-04-17 23:11:14', NULL),
(19, 1, 5, 3, 'pqc8pxgm3tcwpxf9h2we,gfzmzdhkae4mgnafmeok,ehawbq0qcehhvxbtfs0n,xgaayxw950yxdxodi1vu', 399, 32, '2019-04-17 23:11:14', '2019-04-17 23:11:14', NULL),
(20, 1, 5, 4, 'pqc8pxgm3tcwpxf9h2we,gfzmzdhkae4mgnafmeok,ehawbq0qcehhvxbtfs0n,xgaayxw950yxdxodi1vu', 399, 32, '2019-04-17 23:11:14', '2019-04-17 23:11:14', NULL),
(21, 2, 2, 1, 'rxufjngz1u2zvz77q991,wbpp3hti56kakjayfk1y,qruhw9uuumolowxxod6i,gwvtangruki3f9ajkfjh', 399, 32, '2019-04-17 23:15:00', '2019-04-17 23:15:00', NULL),
(22, 2, 2, 2, 'rxufjngz1u2zvz77q991,wbpp3hti56kakjayfk1y,qruhw9uuumolowxxod6i,gwvtangruki3f9ajkfjh', 399, 32, '2019-04-17 23:15:00', '2019-04-17 23:15:00', NULL),
(23, 2, 2, 3, 'rxufjngz1u2zvz77q991,wbpp3hti56kakjayfk1y,qruhw9uuumolowxxod6i,gwvtangruki3f9ajkfjh', 399, 32, '2019-04-17 23:15:00', '2019-04-17 23:15:00', NULL),
(24, 2, 2, 4, 'rxufjngz1u2zvz77q991,wbpp3hti56kakjayfk1y,qruhw9uuumolowxxod6i,gwvtangruki3f9ajkfjh', 399, 32, '2019-04-17 23:15:00', '2019-04-17 23:15:00', NULL),
(25, 2, 5, 1, 'sdieauhizwyfvt6tzwe5,brqngwqrybwzhh2mmmqg,o0jbiwjjfiywlislxeto,jpuocm5zpqqfh9usxdwr', 399, 32, '2019-04-17 23:15:32', '2019-04-17 23:15:32', NULL),
(26, 2, 5, 2, 'sdieauhizwyfvt6tzwe5,brqngwqrybwzhh2mmmqg,o0jbiwjjfiywlislxeto,jpuocm5zpqqfh9usxdwr', 399, 32, '2019-04-17 23:15:32', '2019-04-17 23:15:32', NULL),
(27, 2, 5, 3, 'sdieauhizwyfvt6tzwe5,brqngwqrybwzhh2mmmqg,o0jbiwjjfiywlislxeto,jpuocm5zpqqfh9usxdwr', 399, 32, '2019-04-17 23:15:32', '2019-04-17 23:15:32', NULL),
(28, 2, 5, 4, 'sdieauhizwyfvt6tzwe5,brqngwqrybwzhh2mmmqg,o0jbiwjjfiywlislxeto,jpuocm5zpqqfh9usxdwr', 399, 32, '2019-04-17 23:15:32', '2019-04-17 23:15:32', NULL),
(29, 2, 3, 1, 'jnokw73yofhwrog9nwbq,fhnotebujzxtx08avnj9,nssualqw3tkak4s2jooq,yd1c1ubvn01y2kpsdbvs', 399, 32, '2019-04-17 23:16:08', '2019-04-17 23:16:08', NULL),
(30, 2, 3, 2, 'jnokw73yofhwrog9nwbq,fhnotebujzxtx08avnj9,nssualqw3tkak4s2jooq,yd1c1ubvn01y2kpsdbvs', 399, 31, '2019-04-17 23:16:08', '2019-04-18 05:48:50', NULL),
(31, 2, 3, 3, 'jnokw73yofhwrog9nwbq,fhnotebujzxtx08avnj9,nssualqw3tkak4s2jooq,yd1c1ubvn01y2kpsdbvs', 399, 32, '2019-04-17 23:16:08', '2019-04-17 23:16:08', NULL),
(32, 2, 3, 4, 'jnokw73yofhwrog9nwbq,fhnotebujzxtx08avnj9,nssualqw3tkak4s2jooq,yd1c1ubvn01y2kpsdbvs', 399, 32, '2019-04-17 23:16:08', '2019-04-17 23:16:08', NULL),
(33, 3, 4, 3, 'pfgnp2vwtox1xjxfju2z,c6hkhjkw5lmj8lg2hjgn,mdyjvf41jgkqizvssljl,ets0agtdxnzdv5nizp1p', 399, 32, '2019-04-17 23:17:23', '2019-04-21 02:14:21', NULL),
(34, 3, 4, 2, 'pfgnp2vwtox1xjxfju2z,c6hkhjkw5lmj8lg2hjgn,mdyjvf41jgkqizvssljl,ets0agtdxnzdv5nizp1p', 399, 31, '2019-04-17 23:17:23', '2019-04-26 06:57:16', NULL),
(35, 2, 4, 3, 'pfgnp2vwtox1xjxfju2z,c6hkhjkw5lmj8lg2hjgn,mdyjvf41jgkqizvssljl,ets0agtdxnzdv5nizp1p', 399, 32, '2019-04-17 23:17:23', '2019-04-17 23:17:23', NULL),
(36, 2, 4, 4, 'pfgnp2vwtox1xjxfju2z,c6hkhjkw5lmj8lg2hjgn,mdyjvf41jgkqizvssljl,ets0agtdxnzdv5nizp1p', 399, 32, '2019-04-17 23:17:23', '2019-04-17 23:17:23', NULL),
(37, 2, 5, 1, 'gqbzuck11vvq495akr20,teitw3pxonem42ozwt3y,ds3t3nskoxzq0yvpscbc,vnexrw45rpscpbe2gzui', 399, 32, '2019-04-17 23:17:59', '2019-04-17 23:17:59', NULL),
(38, 2, 5, 2, 'gqbzuck11vvq495akr20,teitw3pxonem42ozwt3y,ds3t3nskoxzq0yvpscbc,vnexrw45rpscpbe2gzui', 399, 32, '2019-04-17 23:17:59', '2019-04-17 23:17:59', NULL),
(39, 2, 5, 3, 'gqbzuck11vvq495akr20,teitw3pxonem42ozwt3y,ds3t3nskoxzq0yvpscbc,vnexrw45rpscpbe2gzui', 399, 32, '2019-04-17 23:17:59', '2019-04-17 23:17:59', NULL),
(40, 2, 5, 4, 'gqbzuck11vvq495akr20,teitw3pxonem42ozwt3y,ds3t3nskoxzq0yvpscbc,vnexrw45rpscpbe2gzui', 399, 32, '2019-04-17 23:17:59', '2019-04-17 23:17:59', NULL),
(41, 3, 2, 1, 'vzosu1sxnyfhhg4emecm,hqcflrwfequfqq1ibzvy,jngcnbtvi0mdjlouvxyi,on07b4ciqwy9szmmpxtv', 399, 32, '2019-04-17 23:19:54', '2019-04-17 23:19:54', NULL),
(42, 3, 2, 2, 'vzosu1sxnyfhhg4emecm,hqcflrwfequfqq1ibzvy,jngcnbtvi0mdjlouvxyi,on07b4ciqwy9szmmpxtv', 399, 32, '2019-04-17 23:19:54', '2019-04-17 23:19:54', NULL),
(43, 3, 2, 3, 'vzosu1sxnyfhhg4emecm,hqcflrwfequfqq1ibzvy,jngcnbtvi0mdjlouvxyi,on07b4ciqwy9szmmpxtv', 399, 32, '2019-04-17 23:19:54', '2019-04-17 23:19:54', NULL),
(44, 3, 2, 4, 'vzosu1sxnyfhhg4emecm,hqcflrwfequfqq1ibzvy,jngcnbtvi0mdjlouvxyi,on07b4ciqwy9szmmpxtv', 399, 31, '2019-04-17 23:19:54', '2019-04-18 21:47:46', NULL),
(45, 3, 5, 1, 'xcwmmadywnflezu0n1uy,rasxla7yksr1ftwmudmc,zn91qwmvqvs7s7bbpsyj,bchoxnwa4lmkw02zmrb0', 399, 32, '2019-04-17 23:20:35', '2019-04-17 23:20:35', NULL),
(46, 3, 5, 2, 'xcwmmadywnflezu0n1uy,rasxla7yksr1ftwmudmc,zn91qwmvqvs7s7bbpsyj,bchoxnwa4lmkw02zmrb0', 399, 32, '2019-04-17 23:20:35', '2019-04-17 23:20:35', NULL),
(47, 3, 5, 3, 'xcwmmadywnflezu0n1uy,rasxla7yksr1ftwmudmc,zn91qwmvqvs7s7bbpsyj,bchoxnwa4lmkw02zmrb0', 399, 32, '2019-04-17 23:20:35', '2019-04-17 23:20:35', NULL),
(48, 3, 5, 4, 'xcwmmadywnflezu0n1uy,rasxla7yksr1ftwmudmc,zn91qwmvqvs7s7bbpsyj,bchoxnwa4lmkw02zmrb0', 399, 32, '2019-04-17 23:20:35', '2019-04-17 23:20:35', NULL),
(49, 3, 3, 1, 'gfc7j4sx1fvxezls2ste,fzxeorocfrrswdvn5h9s,n9ir8sxpfvpd9xxagvlv,etctdv6oarecv3prlxpk', 399, 32, '2019-04-17 23:21:14', '2019-04-17 23:21:14', NULL),
(50, 3, 3, 2, 'gfc7j4sx1fvxezls2ste,fzxeorocfrrswdvn5h9s,n9ir8sxpfvpd9xxagvlv,etctdv6oarecv3prlxpk', 399, 32, '2019-04-17 23:21:14', '2019-04-17 23:21:14', NULL),
(51, 3, 3, 3, 'gfc7j4sx1fvxezls2ste,fzxeorocfrrswdvn5h9s,n9ir8sxpfvpd9xxagvlv,etctdv6oarecv3prlxpk', 399, 32, '2019-04-17 23:21:14', '2019-04-17 23:21:14', NULL),
(52, 3, 3, 4, 'gfc7j4sx1fvxezls2ste,fzxeorocfrrswdvn5h9s,n9ir8sxpfvpd9xxagvlv,etctdv6oarecv3prlxpk', 399, 32, '2019-04-17 23:21:14', '2019-04-17 23:21:14', NULL),
(53, 4, 6, 1, 'rgyqgrmmqpqytl2ukn4o,ahit8t179g047oe5k1gw,mwfphtvpcp17gexpurl5,kn9ld2gb2prvwycgshes', 399, 32, '2019-04-17 23:25:46', '2019-04-17 23:25:46', NULL),
(54, 4, 6, 2, 'rgyqgrmmqpqytl2ukn4o,ahit8t179g047oe5k1gw,mwfphtvpcp17gexpurl5,kn9ld2gb2prvwycgshes', 399, 29, '2019-04-17 23:25:46', '2019-04-26 06:53:34', NULL),
(55, 4, 6, 3, 'rgyqgrmmqpqytl2ukn4o,ahit8t179g047oe5k1gw,mwfphtvpcp17gexpurl5,kn9ld2gb2prvwycgshes', 399, 32, '2019-04-17 23:25:46', '2019-04-17 23:25:46', NULL),
(56, 4, 6, 4, 'rgyqgrmmqpqytl2ukn4o,ahit8t179g047oe5k1gw,mwfphtvpcp17gexpurl5,kn9ld2gb2prvwycgshes', 399, 32, '2019-04-17 23:25:46', '2019-04-17 23:25:46', NULL),
(57, 4, 7, 1, 'pgymfhvnox4thntakeik,zizpk45jqzguw7tvgykd,xxhovcfn2z1l9x2k3pdv,ijuh1ftgbp4um2qrgsub', 399, 32, '2019-04-17 23:26:22', '2019-04-17 23:26:22', NULL),
(58, 4, 7, 2, 'pgymfhvnox4thntakeik,zizpk45jqzguw7tvgykd,xxhovcfn2z1l9x2k3pdv,ijuh1ftgbp4um2qrgsub', 399, 31, '2019-04-17 23:26:22', '2019-04-26 06:53:34', NULL),
(59, 4, 7, 3, 'pgymfhvnox4thntakeik,zizpk45jqzguw7tvgykd,xxhovcfn2z1l9x2k3pdv,ijuh1ftgbp4um2qrgsub', 399, 32, '2019-04-17 23:26:22', '2019-04-17 23:26:22', NULL),
(60, 4, 7, 4, 'pgymfhvnox4thntakeik,zizpk45jqzguw7tvgykd,xxhovcfn2z1l9x2k3pdv,ijuh1ftgbp4um2qrgsub', 399, 32, '2019-04-17 23:26:22', '2019-04-17 23:26:22', NULL),
(61, 4, 8, 1, 'c9jok6vlcburdaxc1n5x,bpj038g1gepzbhw864ez,dare8v4kmbtafu1h2a6e,xuk5kq6vlagnawhzsj8f', 399, 32, '2019-04-17 23:27:02', '2019-04-17 23:27:02', NULL),
(62, 4, 8, 2, 'c9jok6vlcburdaxc1n5x,bpj038g1gepzbhw864ez,dare8v4kmbtafu1h2a6e,xuk5kq6vlagnawhzsj8f', 399, 32, '2019-04-17 23:27:02', '2019-04-17 23:27:02', NULL),
(63, 4, 8, 3, 'c9jok6vlcburdaxc1n5x,bpj038g1gepzbhw864ez,dare8v4kmbtafu1h2a6e,xuk5kq6vlagnawhzsj8f', 399, 32, '2019-04-17 23:27:02', '2019-04-17 23:27:02', NULL),
(64, 4, 8, 4, 'c9jok6vlcburdaxc1n5x,bpj038g1gepzbhw864ez,dare8v4kmbtafu1h2a6e,xuk5kq6vlagnawhzsj8f', 399, 32, '2019-04-17 23:27:02', '2019-04-17 23:27:02', NULL),
(65, 5, 6, 1, 'dnuhtobog1zkpngovyzs,drbw8chnerlv8inbk2h5,mcb0odi0vhvg6hmdwuzl,onhqtjxuws34wp9x4whu', 399, 31, '2019-04-18 04:28:34', '2019-04-21 03:30:03', NULL),
(66, 5, 6, 2, 'dnuhtobog1zkpngovyzs,drbw8chnerlv8inbk2h5,mcb0odi0vhvg6hmdwuzl,onhqtjxuws34wp9x4whu', 399, 30, '2019-04-18 04:28:34', '2019-04-21 03:30:03', NULL),
(67, 5, 6, 3, 'dnuhtobog1zkpngovyzs,drbw8chnerlv8inbk2h5,mcb0odi0vhvg6hmdwuzl,onhqtjxuws34wp9x4whu', 399, 25, '2019-04-18 04:28:34', '2019-04-21 02:49:25', NULL),
(68, 5, 6, 4, 'dnuhtobog1zkpngovyzs,drbw8chnerlv8inbk2h5,mcb0odi0vhvg6hmdwuzl,onhqtjxuws34wp9x4whu', 399, 30, '2019-04-18 04:28:34', '2019-04-19 02:01:12', NULL),
(69, 5, 8, 1, 'csevseipvzxcu5hhpkmm,eqveljkni6vydb793pnr,fyy0za8n0ke7udqjvcjp,oactobmobaq5adnj4s0r', 399, 32, '2019-04-18 04:31:18', '2019-04-18 04:31:18', NULL),
(70, 5, 8, 2, 'csevseipvzxcu5hhpkmm,eqveljkni6vydb793pnr,fyy0za8n0ke7udqjvcjp,oactobmobaq5adnj4s0r', 399, 32, '2019-04-18 04:31:18', '2019-04-18 04:31:18', NULL),
(71, 5, 8, 3, 'csevseipvzxcu5hhpkmm,eqveljkni6vydb793pnr,fyy0za8n0ke7udqjvcjp,oactobmobaq5adnj4s0r', 399, 32, '2019-04-18 04:31:18', '2019-04-18 04:31:18', NULL),
(72, 5, 8, 4, 'csevseipvzxcu5hhpkmm,eqveljkni6vydb793pnr,fyy0za8n0ke7udqjvcjp,oactobmobaq5adnj4s0r', 399, 31, '2019-04-18 04:31:18', '2019-04-21 03:30:03', NULL),
(73, 5, 3, 1, 'r0nsrtfv258za0eky8da,pcmfwp3a3bkn0mew9hs6,hj3l8twus6v4y9uqzfqc,umc9oxsnh4jrrki5fvgu', 399, 32, '2019-04-18 04:31:56', '2019-04-18 04:31:56', NULL),
(74, 5, 3, 2, 'r0nsrtfv258za0eky8da,pcmfwp3a3bkn0mew9hs6,hj3l8twus6v4y9uqzfqc,umc9oxsnh4jrrki5fvgu', 399, 32, '2019-04-18 04:31:56', '2019-04-18 04:31:56', NULL),
(75, 5, 3, 3, 'r0nsrtfv258za0eky8da,pcmfwp3a3bkn0mew9hs6,hj3l8twus6v4y9uqzfqc,umc9oxsnh4jrrki5fvgu', 399, 32, '2019-04-18 04:31:56', '2019-04-18 04:31:56', NULL),
(76, 5, 3, 4, 'r0nsrtfv258za0eky8da,pcmfwp3a3bkn0mew9hs6,hj3l8twus6v4y9uqzfqc,umc9oxsnh4jrrki5fvgu', 399, 32, '2019-04-18 04:31:56', '2019-04-18 04:31:56', NULL),
(77, 4, 10, 1, 'ajr56cbtlvp2wlkieyr6,zexx2ad5wpg93a67ohzh,g2vfyk7lvqsecoacojqd,vcqsguasakqyuqalmfpc', 399, 32, '2019-04-18 04:34:30', '2019-04-18 04:34:30', NULL),
(78, 4, 10, 2, 'ajr56cbtlvp2wlkieyr6,zexx2ad5wpg93a67ohzh,g2vfyk7lvqsecoacojqd,vcqsguasakqyuqalmfpc', 399, 32, '2019-04-18 04:34:30', '2019-04-18 04:34:30', NULL),
(79, 4, 10, 3, 'ajr56cbtlvp2wlkieyr6,zexx2ad5wpg93a67ohzh,g2vfyk7lvqsecoacojqd,vcqsguasakqyuqalmfpc', 399, 32, '2019-04-18 04:34:30', '2019-04-18 04:34:30', NULL),
(80, 4, 10, 4, 'ajr56cbtlvp2wlkieyr6,zexx2ad5wpg93a67ohzh,g2vfyk7lvqsecoacojqd,vcqsguasakqyuqalmfpc', 399, 32, '2019-04-18 04:34:30', '2019-04-18 04:34:30', NULL),
(81, 6, 2, 1, 'cww0zpxwz1fruf8zebig,mv4gilkk6aojrnydoaov,a7zg2zedqszfhlqy7mb9,xzhealks51issxd99wjl', 399, 31, '2019-04-18 04:36:40', '2019-04-18 21:47:45', NULL),
(82, 6, 2, 2, 'cww0zpxwz1fruf8zebig,mv4gilkk6aojrnydoaov,a7zg2zedqszfhlqy7mb9,xzhealks51issxd99wjl', 399, 28, '2019-04-18 04:36:40', '2019-04-26 06:53:34', NULL),
(83, 6, 2, 3, 'cww0zpxwz1fruf8zebig,mv4gilkk6aojrnydoaov,a7zg2zedqszfhlqy7mb9,xzhealks51issxd99wjl', 399, 31, '2019-04-18 04:36:40', '2019-04-19 06:45:39', NULL),
(84, 6, 2, 4, 'cww0zpxwz1fruf8zebig,mv4gilkk6aojrnydoaov,a7zg2zedqszfhlqy7mb9,xzhealks51issxd99wjl', 399, 29, '2019-04-18 04:36:40', '2019-04-19 02:01:12', NULL),
(85, 6, 6, 1, 'gkywmqadfb3bcci6i1yb,qb45qvtzwj4bkn74n6nr,sm5n9oi9qoyzoxg9lrlz,oqoljftnaynog5xhugut', 399, 32, '2019-04-18 04:37:31', '2019-04-18 04:37:31', NULL),
(86, 6, 6, 2, 'gkywmqadfb3bcci6i1yb,qb45qvtzwj4bkn74n6nr,sm5n9oi9qoyzoxg9lrlz,oqoljftnaynog5xhugut', 399, 32, '2019-04-18 04:37:31', '2019-04-18 04:37:31', NULL),
(87, 6, 6, 3, 'gkywmqadfb3bcci6i1yb,qb45qvtzwj4bkn74n6nr,sm5n9oi9qoyzoxg9lrlz,oqoljftnaynog5xhugut', 399, 32, '2019-04-18 04:37:31', '2019-04-18 04:37:31', NULL),
(88, 6, 6, 4, 'gkywmqadfb3bcci6i1yb,qb45qvtzwj4bkn74n6nr,sm5n9oi9qoyzoxg9lrlz,oqoljftnaynog5xhugut', 399, 31, '2019-04-18 04:37:31', '2019-04-18 22:15:01', NULL),
(89, 6, 8, 1, 'yzcqsl1l114c5tttwe6k,e9sj7qaolsxbnvqiuiy9,ph9qdl76ocn8ivzbotlc,kimfnnjjk3wzdzg4vouk', 399, 32, '2019-04-18 04:38:43', '2019-04-18 04:38:43', NULL),
(90, 6, 8, 2, 'yzcqsl1l114c5tttwe6k,e9sj7qaolsxbnvqiuiy9,ph9qdl76ocn8ivzbotlc,kimfnnjjk3wzdzg4vouk', 399, 31, '2019-04-18 04:38:43', '2019-04-18 05:48:50', NULL),
(91, 6, 8, 3, 'yzcqsl1l114c5tttwe6k,e9sj7qaolsxbnvqiuiy9,ph9qdl76ocn8ivzbotlc,kimfnnjjk3wzdzg4vouk', 399, 30, '2019-04-18 04:38:43', '2019-04-20 22:21:46', NULL),
(92, 6, 8, 4, 'yzcqsl1l114c5tttwe6k,e9sj7qaolsxbnvqiuiy9,ph9qdl76ocn8ivzbotlc,kimfnnjjk3wzdzg4vouk', 399, 31, '2019-04-18 04:38:43', '2019-04-18 22:15:01', NULL),
(93, 7, 3, 1, 'dhiartcdjo0xb2hyffor,detvt8cl6yklsbg5krbh,qcvignvvwonyh7pjctfx,dvyvz8felbnstlqoshac', 399, 4, '2019-04-19 04:44:09', '2019-04-19 04:44:09', NULL),
(94, 8, 3, 1, 'fmrwoeeuvtyvno7jrfwh,iifdnyktrnbtv4p5t9v6', 399, 4, '2019-04-19 04:45:17', '2019-04-19 04:45:17', NULL),
(95, 9, 3, 1, 'nlg1p8ssdcu0i2dsdhdm,rtjhy8nbwhfdt4xlmoqs,pvsmyx4mgpaxvcaymtwk,jv5t3eomna9b0isocs0u', 399, 3, '2019-04-19 04:46:39', '2019-04-26 06:53:34', NULL),
(96, 7, 2, 1, 'ccyqgtqdwq8qiyntgell,aolt0ybm2j7gcx2yz3ph,behsdjjjseyxdq22akws,tuxeb6a3kfivkn01cni3', 399, 2, '2019-04-21 02:18:40', '2019-04-21 02:24:49', NULL),
(97, 2, 4, 2, 'gc6inedp3eenfydcynua,ikf1rcwzlmvwqxvp71m1,r72y73nu0fyy7uhgofgm,beg702sl1n3sso1thm5g', 399, 2, '2019-04-21 02:20:01', '2019-04-21 02:23:46', NULL),
(98, 5, 2, 1, 'wtrmne8fd5bod01lz1jm,zha6ioxpajpcmox4eqdu,pxpzd1rr9xjrjgekhx7p,jxjc6flvot1cgm76hmtn', 299, 32, '2019-04-28 03:49:24', '2019-04-29 10:09:38', NULL),
(99, 11, 2, 2, 'wtrmne8fd5bod01lz1jm,zha6ioxpajpcmox4eqdu,pxpzd1rr9xjrjgekhx7p,jxjc6flvot1cgm76hmtn', 299, 32, '2019-04-28 03:49:24', '2019-04-28 03:49:24', NULL),
(100, 11, 2, 3, 'wtrmne8fd5bod01lz1jm,zha6ioxpajpcmox4eqdu,pxpzd1rr9xjrjgekhx7p,jxjc6flvot1cgm76hmtn', 299, 32, '2019-04-28 03:49:24', '2019-04-28 03:49:24', NULL),
(101, 11, 2, 4, 'wtrmne8fd5bod01lz1jm,zha6ioxpajpcmox4eqdu,pxpzd1rr9xjrjgekhx7p,jxjc6flvot1cgm76hmtn', 299, 32, '2019-04-28 03:49:24', '2019-04-28 03:49:24', NULL),
(102, 11, 3, 1, 'ri5iy8vaib0ruq52rvkm,qyifafkpvw5nzgl20wzv,wziyf2k0alquwdxhdr47,glqgytphvbpr8s3ac1dq', 299, 32, '2019-04-28 03:51:04', '2019-04-28 03:51:04', NULL),
(103, 11, 3, 2, 'ri5iy8vaib0ruq52rvkm,qyifafkpvw5nzgl20wzv,wziyf2k0alquwdxhdr47,glqgytphvbpr8s3ac1dq', 299, 31, '2019-04-28 03:51:04', '2019-04-28 04:08:16', NULL),
(104, 11, 3, 3, 'ri5iy8vaib0ruq52rvkm,qyifafkpvw5nzgl20wzv,wziyf2k0alquwdxhdr47,glqgytphvbpr8s3ac1dq', 299, 32, '2019-04-28 03:51:04', '2019-04-28 03:51:04', NULL),
(105, 11, 3, 4, 'ri5iy8vaib0ruq52rvkm,qyifafkpvw5nzgl20wzv,wziyf2k0alquwdxhdr47,glqgytphvbpr8s3ac1dq', 299, 32, '2019-04-28 03:51:04', '2019-04-28 03:51:04', NULL),
(106, 10, 4, 1, 'o65dqhofy6rqshuoycnk,vqmbhf78oswnhxcqbg9m,kkh0qhhjvp86rlrakfkv,g5qulscxghdd6aqr9xyo', 399, 32, '2019-04-29 10:22:13', '2019-04-29 10:22:13', NULL),
(107, 12, 1, 1, 'aetunhihf8k2hcmyk38f,jdftwsgjxxvnwhwq1eus,ealcnvdj4c1esixmne20,splr9ml7innx1ixfgq5q', 399, 31, '2019-04-29 10:37:44', '2019-05-02 05:43:53', NULL),
(108, 12, 1, 2, 'aetunhihf8k2hcmyk38f,jdftwsgjxxvnwhwq1eus,ealcnvdj4c1esixmne20,splr9ml7innx1ixfgq5q', 399, 23, '2019-04-29 10:37:44', '2019-05-02 11:06:49', NULL),
(109, 12, 1, 3, 'aetunhihf8k2hcmyk38f,jdftwsgjxxvnwhwq1eus,ealcnvdj4c1esixmne20,splr9ml7innx1ixfgq5q', 399, 18, '2019-04-29 10:37:44', '2019-05-02 10:59:24', NULL),
(110, 12, 1, 4, 'aetunhihf8k2hcmyk38f,jdftwsgjxxvnwhwq1eus,ealcnvdj4c1esixmne20,splr9ml7innx1ixfgq5q', 399, 32, '2019-04-29 10:37:44', '2019-04-29 10:37:44', NULL),
(111, 12, 2, 1, 'ntxhxwdeib1xorigm4ry', 399, 31, '2019-05-02 05:30:30', '2019-05-02 05:35:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `window_images`
--

CREATE TABLE `window_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `window_images`
--

INSERT INTO `window_images` (`id`, `image`, `title`, `link`, `order`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gm0wzjxakswehm2qnbgv', 'Window 1', 'http://fashion.altsolution.in/products', 1, 'Woow..!!', 2, '2019-04-18 04:59:39', '2019-04-29 10:25:34', NULL),
(2, 'q99nigqhhtpoxnva4ish', 'Window 2', 'http://fashion.altsolution.in/products', 2, 'Yeahhh...!!!', 2, '2019-04-18 05:03:02', '2019-04-29 10:25:53', NULL),
(3, 'nyuz1kqxzveeihtocxki', 'Window 3', 'http://fashion.altsolution.in/products', 3, 'Mind Blowing..!!', 2, '2019-04-18 05:06:07', '2019-04-29 10:26:10', NULL),
(4, 'k7houoald3c8hmk7qsek', 'Window 4', 'http://fashion.altsolution.in/products', 4, 'Amazing', 2, '2019-04-18 05:09:31', '2019-05-02 10:47:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `app_contents`
--
ALTER TABLE `app_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`),
  ADD UNIQUE KEY `colors_code_unique` (`code`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD KEY `color_product_product_id_foreign` (`product_id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offers_offer_code_unique` (`offer_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_voucher_id_foreign` (`voucher_id`),
  ADD KEY `orders_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_user_id_foreign` (`user_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`),
  ADD KEY `order_products_variation_id_foreign` (`variation_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD KEY `product_size_product_id_foreign` (`product_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_referral_code_unique` (`referral_code`),
  ADD UNIQUE KEY `users_member_ship_code_unique` (`member_ship_code`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_product_id_foreign` (`product_id`),
  ADD KEY `variations_color_id_foreign` (`color_id`),
  ADD KEY `variations_size_id_foreign` (`size_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`);

--
-- Indexes for table `window_images`
--
ALTER TABLE `window_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `app_contents`
--
ALTER TABLE `app_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `window_images`
--
ALTER TABLE `window_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_products_variation_id_foreign` FOREIGN KEY (`variation_id`) REFERENCES `variations` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `variations`
--
ALTER TABLE `variations`
  ADD CONSTRAINT `variations_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `variations_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
