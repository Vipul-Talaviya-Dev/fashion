-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2019 at 01:08 AM
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
(1, 1, 'Maulik', '8758965327', '11 B Shreyanshanth Society', 'Near Dharnidhar Derasar', '380007', 'ahmedabad', 'gujarat', 'India', 0, '2019-06-13 03:38:08', '2019-06-13 03:38:08', NULL),
(2, 2, 'Ishani Prajapati', '8758965326', '11 b Shreyanshnath society', 'near dharnidhar derasar', '380007', 'ahmedabad', 'guj', 'India', 0, '2019-06-14 21:52:18', '2019-06-14 21:52:18', NULL),
(3, 4, 'sharda', '8758965327', 'ganeshpura', 'kadi', '380007', 'ahmedabad', 'gujarat', 'India', 0, '2019-06-16 01:03:54', '2019-06-16 01:03:54', NULL),
(4, 7, 'Ishu Prajapati', '8758965326', '11 b shreyanshnath Society', 'Near Dharnidhar Derasar', '380007', 'ahmedabad', 'gujarat', 'India', 0, '2019-06-22 06:22:46', '2019-06-22 06:22:46', NULL),
(5, 8, 'Vitthalbhai Prajapati', '9825398521', '11 b Shreyanshanth Society', 'Near Dhrnidhar Derasar', '380007', 'ahmedabad', 'Gujarat', 'India', 0, '2019-06-22 10:04:56', '2019-06-22 10:04:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Master Admin, 2: Sub Admin',
  `modules_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `modules_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'support@shroud.in', '$2y$10$71ugCEi.tMMXTTIJAPLlGO03GuIfO/YmVPu2KdwotOSzLAsqD/lc6', 1, NULL, '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL);

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
(1, 'support@shroud.in', '8758965327', '1234k Avenue, 4th block,New York City', NULL, NULL, NULL, NULL, 'Purchase worth Rs. 2000/- & get 20% off on every purchase & be a member Of SHROUD.', 0, '2019-06-12 13:45:27', '2019-06-13 03:22:50', NULL);

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
(1, 'Banner 1', 'http://fashion.altsolution.in/products', 'wpayu9zfrnytwl6qxbyr', NULL, 1, '2019-06-13 03:18:57', '2019-06-16 09:31:27', NULL),
(2, 'Banner 2', 'http://fashion.altsolution.in/products', 'macrlelpxvsyyrc5pxob', NULL, 1, '2019-06-13 03:19:28', '2019-06-16 09:31:50', NULL),
(3, 'Banner 3', 'http://fashion.altsolution.in/products', 'owysadhekndvecpck3cx', NULL, 1, '2019-06-16 09:32:44', '2019-06-16 09:32:44', NULL);

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
(1, 'Men\'s Apperal', 'mens-apperal', NULL, 1, '2019-06-13 03:26:10', '2019-06-13 03:26:10', NULL),
(2, 'Top Wear', 'top-wear', 1, 1, '2019-06-13 03:26:52', '2019-06-13 03:26:52', NULL);

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
(1, 'Black', '#000000', 1, '2019-06-13 03:23:03', '2019-06-13 03:23:03', NULL),
(2, 'Anakiwa', '#b1e2ff', 1, '2019-06-13 03:23:14', '2019-06-13 03:24:19', NULL),
(3, 'Grenadier', '#e03100', 1, '2019-06-13 03:24:48', '2019-06-13 03:24:48', NULL),
(4, 'Goldenrod', '#fccf66', 1, '2019-06-20 03:29:27', '2019-06-20 03:29:27', NULL),
(5, 'Cedar Wood Finish', '#762502', 1, '2019-06-20 03:29:59', '2019-06-20 03:29:59', NULL),
(6, 'White', '#ffffff', 1, '2019-06-20 03:36:05', '2019-06-20 03:36:05', NULL),
(7, 'Silver Sand', '#c8c9c9', 1, '2019-06-20 03:36:19', '2019-06-20 03:36:19', NULL),
(8, 'Spray', '#86f2f2', 1, '2019-06-20 03:36:55', '2019-06-20 03:36:55', NULL),
(9, 'Midnight', '#001d41', 1, '2019-06-20 03:47:03', '2019-06-20 03:47:03', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `contact_datas`
--

CREATE TABLE `contact_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'About', 'About', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(2, 'FAQ', 'FAQ', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(3, 'Term & Condition', 'Term & Condition', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL);

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
(96, '2014_10_12_000000_create_users_table', 1),
(97, '2014_10_12_100000_create_password_resets_table', 1),
(98, '2018_09_15_095717_create_categories_table', 1),
(99, '2018_09_15_101207_create_admins_table', 1),
(100, '2018_09_20_164726_create_brands_table', 1),
(101, '2018_09_21_155020_create_offers_table', 1),
(102, '2018_09_21_171210_create_sizes_table', 1),
(103, '2018_09_21_175026_create_banners_table', 1),
(104, '2018_09_22_163329_create_product_types_table', 1),
(105, '2018_09_22_163330_create_colors_table', 1),
(106, '2018_09_22_163331_create_products_table', 1),
(107, '2018_09_23_183210_create_product_size_table', 1),
(108, '2018_09_23_183244_create_color_product_table', 1),
(109, '2018_09_29_183622_create_variations_table', 1),
(110, '2018_10_04_182121_create_window_images_table', 1),
(111, '2018_10_21_190838_create_addresses_table', 1),
(112, '2018_10_23_041047_create_vouchers_table', 1),
(113, '2018_10_23_041048_create_orders_table', 1),
(114, '2018_10_23_041117_create_order_products_table', 1),
(115, '2019_02_24_081043_create_contacts_table', 1),
(116, '2019_02_24_175447_create_app_contents_table', 1),
(117, '2019_03_07_162621_create_modules_table', 1),
(118, '2019_03_16_174157_create_contents_table', 1),
(119, '2019_05_19_091053_create_contact_datas_table', 1);

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
(1, 'Dashboard', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(2, 'App Content', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(3, 'Color', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(4, 'Size', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(5, 'Category', '2019-06-12 13:45:27', '2019-06-12 13:45:27', NULL),
(6, 'Product', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(7, 'Order', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(8, 'Assign Order', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(9, 'Banner', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(10, 'Home Images', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(11, 'User', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(12, 'Offers', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(13, 'Contacts', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(14, 'About', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(15, 'FAQ', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(16, 'Term & Condition', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(17, 'Product Types', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL),
(18, 'Contact Import', '2019-06-12 13:45:28', '2019-06-12 13:45:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In %',
  `amount` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In Paisa',
  `amount_limit` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `use_time` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1: Multiple, 2: Single Time',
  `use_member` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: No, 1: Yes',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 2: In-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `extra_discount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `discount_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
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

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `voucher_id`, `offer_id`, `payment_mode`, `payment_status`, `payment_reference`, `payment_response`, `cart_amount`, `discount`, `extra_discount`, `discount_amount`, `delivery_charge`, `total`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 399, 0, 0, 0, 0, 399, 3, '2019-06-13 03:38:28', '2019-06-13 03:38:28', NULL),
(2, 1, 1, NULL, NULL, 1, 2, NULL, NULL, 6065, 0, 0, 1516, 0, 7581, 6, '2019-06-13 03:43:37', '2019-06-13 03:44:49', NULL),
(3, 1, 1, NULL, NULL, 1, 2, NULL, NULL, 319, 0, 0, 80, 0, 399, 6, '2019-06-14 21:26:31', '2019-06-14 21:28:07', NULL),
(4, 2, 2, NULL, NULL, 1, 1, NULL, NULL, 399, 0, 0, 0, 0, 399, 3, '2019-06-14 21:52:34', '2019-06-14 21:52:34', NULL),
(5, 2, 2, NULL, NULL, 1, 2, NULL, NULL, 1915, 0, 0, 479, 0, 2394, 6, '2019-06-14 21:56:54', '2019-06-15 04:58:10', NULL),
(6, 4, 3, NULL, NULL, 1, 2, NULL, NULL, 399, 0, 0, 0, 0, 399, 6, '2019-06-16 01:04:14', '2019-06-16 01:05:20', NULL),
(7, 4, 3, NULL, NULL, 1, 1, NULL, NULL, 2394, 0, 0, 0, 0, 2394, 3, '2019-06-16 01:06:34', '2019-06-16 01:06:34', NULL),
(8, 7, 4, NULL, NULL, 1, 2, NULL, NULL, 399, 0, 0, 0, 0, 399, 6, '2019-06-22 06:22:55', '2019-06-22 06:24:01', NULL),
(9, 8, 5, NULL, NULL, 1, 1, NULL, NULL, 399, 0, 0, 0, 0, 399, 3, '2019-06-22 10:08:09', '2019-06-22 10:08:09', NULL);

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
  `purchase_price` int(11) NOT NULL DEFAULT '0',
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In Paisa',
  `max_price` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'In Paisa',
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `return_reason` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: Damage, 2: Other Reason',
  `message` text COLLATE utf8_unicode_ci COMMENT 'Return Order Comment',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Order Checkout, 2: Order Placed, 3: Order Success, 4: Delivery Boy Pickup Order, 5: Delivery Boy To Customer, 6: Delivered, 7: Return, 8: Canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `product_id`, `variation_id`, `purchase_price`, `price`, `max_price`, `qty`, `return_reason`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 6, 0, 399, 399, 1, 0, NULL, 3, '2019-06-13 03:38:28', '2019-06-13 03:38:28', NULL),
(2, 2, 1, 1, 5, 0, 399, 399, 5, 0, NULL, 6, '2019-06-13 03:43:37', '2019-06-13 03:44:49', NULL),
(3, 2, 1, 1, 6, 0, 399, 399, 4, 0, NULL, 6, '2019-06-13 03:43:37', '2019-06-13 03:44:49', NULL),
(4, 2, 1, 1, 7, 0, 399, 399, 5, 0, NULL, 6, '2019-06-13 03:43:37', '2019-06-13 03:44:49', NULL),
(5, 2, 1, 1, 8, 0, 399, 399, 5, 0, NULL, 6, '2019-06-13 03:43:37', '2019-06-13 03:44:49', NULL),
(6, 3, 1, 1, 4, 0, 399, 399, 1, 0, NULL, 6, '2019-06-14 21:26:31', '2019-06-14 21:28:07', NULL),
(7, 4, 2, 1, 4, 0, 399, 399, 1, 0, NULL, 3, '2019-06-14 21:52:34', '2019-06-14 21:52:34', NULL),
(8, 5, 2, 1, 4, 0, 399, 399, 3, 0, NULL, 6, '2019-06-14 21:56:54', '2019-06-15 04:58:10', NULL),
(9, 5, 2, 1, 3, 0, 399, 399, 3, 0, NULL, 6, '2019-06-14 21:56:54', '2019-06-15 04:58:10', NULL),
(10, 6, 4, 1, 1, 0, 399, 399, 1, 1, 'hi', 6, '2019-06-16 01:04:14', '2019-06-16 01:07:25', NULL),
(11, 7, 4, 1, 1, 0, 399, 399, 4, 0, NULL, 3, '2019-06-16 01:06:34', '2019-06-16 01:06:34', NULL),
(12, 7, 4, 1, 2, 0, 399, 399, 2, 0, NULL, 3, '2019-06-16 01:06:34', '2019-06-16 01:06:34', NULL),
(13, 8, 7, 6, 75, 0, 399, 399, 1, 0, NULL, 6, '2019-06-22 06:22:55', '2019-06-22 06:24:01', NULL),
(14, 9, 8, 6, 72, 0, 399, 399, 1, 0, NULL, 3, '2019-06-22 10:08:09', '2019-06-22 10:08:09', NULL);

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
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User side shown',
  `admin_side_name_show` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Admin Show Name',
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

INSERT INTO `products` (`id`, `category_id`, `name`, `admin_side_name_show`, `slug`, `weight`, `description`, `chart`, `meta_keyword`, `meta_description`, `cod`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Round neck Printed Tshirt', 'Pattern 1', 'round-neck-printed-tshirt201906130903411', 0.00000000, '<ul>\r\n	<li>Fit Type: Slim Fit</li>\r\n	<li>Fabric : 100% breathable cotton fabric</li>\r\n	<li>Type : half sleeves t shirt</li>\r\n	<li>Fit - slim fit</li>\r\n	<li>Style - t shirt for mens\r\n	<ul>\r\n		<li>Fabric care - light machine wash, wash dark colors separately</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '<ul>\r\n	<li>Fit Type: Slim Fit</li>\r\n	<li>Fabric : 100% breathable cotton fabric</li>\r\n	<li>Type : half sleeves t shirt</li>\r\n	<li>Fit - slim fit</li>\r\n	<li>Style - t shirt for mens</li>\r\n	<li>Fabric care - light machine wash, wash dark colors separately</li>\r\n</ul>', 'T-shirt, Jens', 'shroud', 2, 1, '2019-06-13 03:33:41', '2019-06-13 03:33:41', NULL),
(2, 1, 'Round Neck Plain', 'Pattern 2', 'round-neck-plain201906200857461', 0.00000000, 'Shroud', 'Shroud', 'T-shirt, Jens', 'Shroud', 2, 1, '2019-06-20 03:27:46', '2019-06-20 03:27:46', NULL),
(3, 1, 'Round Neck Pr', 'Pattern 3', 'round-neck-pr201906200908082', 0.00000000, 'shroud', 'shroud', 'T-shirt, Jens', 'shroud', 2, 1, '2019-06-20 03:38:08', '2019-06-20 03:38:08', NULL),
(4, 1, 'Shroud Printed Tshirt', 'Pattern 4', 'shroud-printed-tshirt201906200914203', 0.00000000, 'shroud', 'shroud', 'T-shirt, Jens', 'shroud', 2, 1, '2019-06-20 03:44:20', '2019-06-20 03:44:20', NULL),
(5, 1, 'Shroud Printed Tshirt', 'Pattern 4', 'shroud-printed-tshirt201906200918194', 0.00000000, 'shroud', 'sheoud', 'T-shirt, Jens', 'shroud', 2, 1, '2019-06-20 03:48:19', '2019-06-20 03:48:19', NULL),
(6, 1, 'Shroud Round Neck Printed', 'Pattern 5', 'shroud-round-neck-printed201906200922565', 0.00000000, 'Shroud', 'Shroud', 'T-shirt, Jens', 'Shroud', 2, 1, '2019-06-20 03:52:56', '2019-06-20 03:52:56', NULL),
(7, 2, 'shroud', 'shroud', 'shroud201906260930316', 0.00000000, '<p>shroud</p>', '<p>shroud</p>', 'T-shirt, Jens', 'shroud', 2, 1, '2019-06-26 04:00:31', '2019-06-26 04:00:31', NULL);

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
(1, 'Round Neck', 1, '2019-06-13 03:27:06', '2019-06-13 03:27:06', NULL),
(2, 'Printed', 1, '2019-06-13 03:27:16', '2019-06-13 03:27:16', NULL),
(3, 'Plain', 1, '2019-06-20 03:30:52', '2019-06-20 03:30:52', NULL);

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
(1, 'M', 1, '2019-06-13 03:25:07', '2019-06-13 03:25:07', NULL),
(2, 'L', 1, '2019-06-13 03:25:18', '2019-06-13 03:25:18', NULL),
(3, 'XL', 1, '2019-06-13 03:25:28', '2019-06-13 03:25:28', NULL),
(4, 'XXL', 1, '2019-06-13 03:25:38', '2019-06-13 03:25:38', NULL);

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
  `login_count` bigint(20) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'User login Count',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `birth_date`, `anniversary_date`, `password`, `member_ship_code`, `referral_code`, `status`, `social_login`, `login_type`, `login_count`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maulik Prajapati', 'mvp137890@gmail.com', '8758965327', '1990-08-07', '2014-01-14', '$2y$10$9ApKQcJlfq485NluVu6OhuTPCZxdGxDY902ZGLmHqNkR3x39RwEje', 'SHRDMAUL7890', 'SHRDRqVu', 1, 0, 1, 7, 'kr77ykRoFJdZtSxo8sSE2sOWLte6HFkDLzueBxS1M4qa0I1iWLEoYlm7USUV', '2019-06-13 03:37:24', '2019-07-01 10:19:02', NULL),
(2, 'Ishani Prajapati', 'ishani@gmail.com', '8758965327', '1991-08-02', '2014-01-17', '$2y$10$jiXbrcfWROCFXtHwDYSXF.8JglRKLuOzWfGg33JdMuhHlwHBl6L4.', 'SHRDISHA2891', 'SHRD3eZO', 1, 0, 1, 2, 'QKnvCTJLxxOS95N9dTNff2OO8bEjmAGdGF6XcsRYs9fdNwojk1HtYmgKllEA', '2019-06-14 21:38:38', '2019-06-15 04:57:29', NULL),
(3, 'vishnu prajapati', 'vishnu@gmail.com', '8758965337', '2019-06-01', '2019-06-01', '$2y$10$ZHjxwy8ooew/T9vKhWvHUeF0DDswN9ySPl.ejLiJJGqtGc6LdqKdy', NULL, 'SHRD9IbT', 1, 0, 1, 1, NULL, '2019-06-15 20:37:37', '2019-06-15 20:37:37', NULL),
(4, 'sharda prajapati', 'sharda@gmail.com', '8758965327', '2019-06-15', '2019-06-06', '$2y$10$sQMitWWPwAD90r3ihMhud.KknLwGI8eJuQbQyg6jSsbIEw8KaoMFa', 'SHRDSHAR15619', 'SHRDqKgr', 1, 0, 1, 1, NULL, '2019-06-16 01:01:55', '2019-06-16 01:06:22', NULL),
(5, 'Vipul Patel', 'vipul@gmail.com', '9998363518', '1994-01-01', '2019-06-01', '$2y$10$r8yN8yzQs0TWJtDJvJ3EfO7YjxAOLTEhZPAMt/ze/9GyQYRTVPtGG', NULL, 'SHRDm4NP', 1, 0, 1, 1, 'ilCDAuYuk0jKLAmdMKgyW6qvHsUOBL6nxgrxA66Ok3oWhn7BWrlRn047sOU1', '2019-06-21 13:05:08', '2019-06-21 13:05:08', NULL),
(6, 'Anil Patel', 'anil@gmail.com', '9998363518', '2019-01-01', '2019-06-06', '$2y$10$djtLPPgsebs3uyyEDvTYgeBFZ2deXDfExf63ut03JcXIUoGhPKhkq', NULL, 'SHRDZc1y', 1, 0, 1, 1, NULL, '2019-06-21 13:14:59', '2019-06-21 13:14:59', NULL),
(7, 'ishu prajapati', 'ishani137890@gmail.com', '8758965326', '1991-08-02', '2014-01-14', '$2y$10$MyMeGOp8nuTqbafElvG3setJz7Vx0FoYmnjFVnxK6FJl1bYDVZAbW', NULL, 'SHRDikEN', 1, 0, 1, 2, 'Wy6Ah6XCLAFW5QoXXdhfyQsXOjRfKNYfkV7hcao7qg3ntCMFibZNHFlz5JyS', '2019-06-22 06:21:28', '2019-06-22 06:27:23', NULL),
(8, 'Vitthalbhi Prajapati', 'vitthal@gmail.com', '9825398521', '1956-05-01', '1979-02-02', '$2y$10$f0GYc.gEmCUzSKFc6F0O9uD.LZU7CY.J7ET.3MGdzLNl2YaM9TpJS', NULL, 'SHRDW7gs', 1, 0, 1, 1, NULL, '2019-06-22 10:04:14', '2019-06-22 10:04:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_type_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `images` text COLLATE utf8_unicode_ci,
  `purchase_price` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `product_id`, `product_type_id`, `color_id`, `size_id`, `images`, `purchase_price`, `price`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1,2', 2, 1, 'teyn3o2r2ken2nemosbm,i91wrwaea1crqr2fvdlz,akkcsm8pumdmfmx1pggb,xsqo3pvarh35mmusyan5', 0, 399, 5, '2019-06-13 03:34:46', '2019-06-20 03:22:05', NULL),
(2, 1, '1,2', 2, 2, 'teyn3o2r2ken2nemosbm,i91wrwaea1crqr2fvdlz,akkcsm8pumdmfmx1pggb,xsqo3pvarh35mmusyan5', 0, 399, 5, '2019-06-13 03:34:46', '2019-06-20 03:22:23', NULL),
(3, 1, '1,2', 2, 3, 'teyn3o2r2ken2nemosbm,i91wrwaea1crqr2fvdlz,akkcsm8pumdmfmx1pggb,xsqo3pvarh35mmusyan5', 0, 399, 5, '2019-06-13 03:34:46', '2019-06-20 03:22:44', NULL),
(4, 1, '1,2', 2, 4, 'teyn3o2r2ken2nemosbm,i91wrwaea1crqr2fvdlz,akkcsm8pumdmfmx1pggb,xsqo3pvarh35mmusyan5', 0, 399, 5, '2019-06-13 03:34:46', '2019-06-20 03:23:01', NULL),
(5, 1, '1,2', 1, 1, 'q7jq4yo0xhilpunjkqg8,upjcw2dpdsz2mc7dalvi,mcouq4ewtij9cpn3whrf,nmewncwnsukazulhmk37', 0, 399, 5, '2019-06-13 03:35:19', '2019-06-20 03:23:10', NULL),
(6, 1, '1,2', 1, 2, 'q7jq4yo0xhilpunjkqg8,upjcw2dpdsz2mc7dalvi,mcouq4ewtij9cpn3whrf,nmewncwnsukazulhmk37', 0, 399, 5, '2019-06-13 03:35:19', '2019-06-20 03:23:22', NULL),
(7, 1, '1,2', 1, 3, 'q7jq4yo0xhilpunjkqg8,upjcw2dpdsz2mc7dalvi,mcouq4ewtij9cpn3whrf,nmewncwnsukazulhmk37', 0, 399, 5, '2019-06-13 03:35:19', '2019-06-20 03:23:56', NULL),
(8, 1, '1,2', 1, 4, 'q7jq4yo0xhilpunjkqg8,upjcw2dpdsz2mc7dalvi,mcouq4ewtij9cpn3whrf,nmewncwnsukazulhmk37', 0, 399, 5, '2019-06-13 03:35:19', '2019-06-20 03:23:41', NULL),
(9, 1, '1,2', 3, 1, 'juzktaqcc5vsn9jkpb2z,gi5zylk8ilgwlje8e2kk,bsxxpovvkfg4frxxuyw4,wsjxz2fbi0vseir2uvbn', 0, 399, 5, '2019-06-20 03:25:25', '2019-06-20 03:25:25', NULL),
(10, 1, '1,2', 3, 2, 'juzktaqcc5vsn9jkpb2z,gi5zylk8ilgwlje8e2kk,bsxxpovvkfg4frxxuyw4,wsjxz2fbi0vseir2uvbn', 0, 399, 5, '2019-06-20 03:25:25', '2019-06-20 03:25:25', NULL),
(11, 1, NULL, 3, 3, 'juzktaqcc5vsn9jkpb2z,gi5zylk8ilgwlje8e2kk,bsxxpovvkfg4frxxuyw4,wsjxz2fbi0vseir2uvbn', 0, 399, 5, '2019-06-20 03:25:25', '2019-06-20 03:25:25', NULL),
(12, 1, NULL, 3, 4, 'juzktaqcc5vsn9jkpb2z,gi5zylk8ilgwlje8e2kk,bsxxpovvkfg4frxxuyw4,wsjxz2fbi0vseir2uvbn', 0, 399, 5, '2019-06-20 03:25:25', '2019-06-20 03:25:25', NULL),
(13, 2, '1,3', 4, 1, 'sfh0qpzajlmug6mkp4of,fcifyeo7cs6zj1ymxyyu,akiyrmardq5efmiwrqje,diwjjbsm8nxnkccwfddo', 0, 399, 5, '2019-06-20 03:31:32', '2019-06-20 03:31:32', NULL),
(14, 2, '1,3', 4, 2, 'sfh0qpzajlmug6mkp4of,fcifyeo7cs6zj1ymxyyu,akiyrmardq5efmiwrqje,diwjjbsm8nxnkccwfddo', 0, 399, 5, '2019-06-20 03:31:32', '2019-06-20 03:31:32', NULL),
(15, 2, NULL, 4, 3, 'sfh0qpzajlmug6mkp4of,fcifyeo7cs6zj1ymxyyu,akiyrmardq5efmiwrqje,diwjjbsm8nxnkccwfddo', 0, 399, 5, '2019-06-20 03:31:32', '2019-06-20 03:31:32', NULL),
(16, 2, NULL, 4, 4, 'sfh0qpzajlmug6mkp4of,fcifyeo7cs6zj1ymxyyu,akiyrmardq5efmiwrqje,diwjjbsm8nxnkccwfddo', 0, 399, 5, '2019-06-20 03:31:32', '2019-06-20 03:31:32', NULL),
(17, 2, '1,3', 5, 1, 'kirdc9k485mf1cth3dyc,gdj8ltmyhttdug7z1un8,lgqxiaptgado1uz6f927,hk9knasdgcdzhlfzkv0w', 0, 399, 5, '2019-06-20 03:32:06', '2019-06-20 03:32:06', NULL),
(18, 2, '1,3', 5, 2, 'kirdc9k485mf1cth3dyc,gdj8ltmyhttdug7z1un8,lgqxiaptgado1uz6f927,hk9knasdgcdzhlfzkv0w', 0, 399, 5, '2019-06-20 03:32:06', '2019-06-20 03:32:06', NULL),
(19, 2, NULL, 5, 3, 'kirdc9k485mf1cth3dyc,gdj8ltmyhttdug7z1un8,lgqxiaptgado1uz6f927,hk9knasdgcdzhlfzkv0w', 0, 399, 5, '2019-06-20 03:32:06', '2019-06-20 03:32:06', NULL),
(20, 2, NULL, 5, 4, 'kirdc9k485mf1cth3dyc,gdj8ltmyhttdug7z1un8,lgqxiaptgado1uz6f927,hk9knasdgcdzhlfzkv0w', 0, 399, 5, '2019-06-20 03:32:06', '2019-06-20 03:32:06', NULL),
(21, 2, '1,3', 1, 1, 'mf8phb1f6mecqzklglk5,klntbd8f9tmtfyezauz6,xhq9awmlhosu57ngikca,cr6ghoeq0giqey0kjlgc', 0, 399, 5, '2019-06-20 03:32:40', '2019-06-20 03:32:40', NULL),
(22, 2, '1,3', 1, 2, 'mf8phb1f6mecqzklglk5,klntbd8f9tmtfyezauz6,xhq9awmlhosu57ngikca,cr6ghoeq0giqey0kjlgc', 0, 399, 5, '2019-06-20 03:32:40', '2019-06-20 03:32:40', NULL),
(23, 2, NULL, 1, 3, 'mf8phb1f6mecqzklglk5,klntbd8f9tmtfyezauz6,xhq9awmlhosu57ngikca,cr6ghoeq0giqey0kjlgc', 0, 399, 5, '2019-06-20 03:32:40', '2019-06-20 03:32:40', NULL),
(24, 2, NULL, 1, 4, 'mf8phb1f6mecqzklglk5,klntbd8f9tmtfyezauz6,xhq9awmlhosu57ngikca,cr6ghoeq0giqey0kjlgc', 0, 399, 5, '2019-06-20 03:32:40', '2019-06-20 03:32:40', NULL),
(25, 3, '1,2', 5, 1, 'wvav1jl5epa7c0it7arr,t18ru5kayft7ydu0smlv,jqwleedfo6ht5nstcpuq,thnrwbbtggf0daqw2j4q', 0, 399, 5, '2019-06-20 03:34:00', '2019-06-20 03:43:15', NULL),
(26, 3, '1,2', 5, 2, 'wvav1jl5epa7c0it7arr,t18ru5kayft7ydu0smlv,jqwleedfo6ht5nstcpuq,thnrwbbtggf0daqw2j4q', 0, 399, 5, '2019-06-20 03:34:00', '2019-06-20 03:42:59', NULL),
(27, 3, '1,2', 5, 3, 'wvav1jl5epa7c0it7arr,t18ru5kayft7ydu0smlv,jqwleedfo6ht5nstcpuq,thnrwbbtggf0daqw2j4q', 0, 399, 5, '2019-06-20 03:34:00', '2019-06-20 03:42:44', NULL),
(28, 3, '1,2', 5, 4, 'wvav1jl5epa7c0it7arr,t18ru5kayft7ydu0smlv,jqwleedfo6ht5nstcpuq,thnrwbbtggf0daqw2j4q', 0, 399, 5, '2019-06-20 03:34:00', '2019-06-20 03:42:14', NULL),
(29, 3, '1,2', 4, 1, 'lwdnukkbcbyqzgrkgbha,dgpvbk0geonzxeuehjwb,sli93qpukgxfj6z1tgld,zqmoe3frwgwbkpts2cwr', 0, 399, 5, '2019-06-20 03:34:50', '2019-06-20 03:41:48', NULL),
(30, 3, '1,2', 4, 2, 'lwdnukkbcbyqzgrkgbha,dgpvbk0geonzxeuehjwb,sli93qpukgxfj6z1tgld,zqmoe3frwgwbkpts2cwr', 0, 399, 5, '2019-06-20 03:34:50', '2019-06-20 03:41:23', NULL),
(31, 3, '1,2', 4, 3, 'lwdnukkbcbyqzgrkgbha,dgpvbk0geonzxeuehjwb,sli93qpukgxfj6z1tgld,zqmoe3frwgwbkpts2cwr', 0, 399, 5, '2019-06-20 03:34:50', '2019-06-20 03:40:51', NULL),
(32, 3, '1,2', 4, 4, 'lwdnukkbcbyqzgrkgbha,dgpvbk0geonzxeuehjwb,sli93qpukgxfj6z1tgld,zqmoe3frwgwbkpts2cwr', 0, 399, 5, '2019-06-20 03:34:50', '2019-06-20 03:40:22', NULL),
(33, 3, '1,2', 1, 1, 'uj8lvqpchsobokscckpg,leo80gbbarfbeovvhqtt,wb9ameashwcj3ywd149k,qcpb5cojwyux29begmpk', 0, 399, 5, '2019-06-20 03:35:37', '2019-06-20 03:39:55', NULL),
(34, 3, '1,2', 1, 2, 'uj8lvqpchsobokscckpg,leo80gbbarfbeovvhqtt,wb9ameashwcj3ywd149k,qcpb5cojwyux29begmpk', 0, 399, 5, '2019-06-20 03:35:37', '2019-06-20 03:39:32', NULL),
(35, 3, '1,2', 1, 3, 'uj8lvqpchsobokscckpg,leo80gbbarfbeovvhqtt,wb9ameashwcj3ywd149k,qcpb5cojwyux29begmpk', 0, 399, 5, '2019-06-20 03:35:37', '2019-06-20 03:39:17', NULL),
(36, 3, '1,2', 1, 4, 'uj8lvqpchsobokscckpg,leo80gbbarfbeovvhqtt,wb9ameashwcj3ywd149k,qcpb5cojwyux29begmpk', 0, 399, 5, '2019-06-20 03:35:37', '2019-06-20 03:38:36', NULL),
(37, 4, '1,2', 6, 1, 'w1fqybtgdapjkifgn2wn,vsmkradzs8f5fplmh0wm,p3y1rpi8grofppn9vylt,cld1vazdkwflmhp8xldi', 0, 399, 5, '2019-06-20 03:45:04', '2019-06-20 03:45:04', NULL),
(38, 4, '1,2', 6, 2, 'w1fqybtgdapjkifgn2wn,vsmkradzs8f5fplmh0wm,p3y1rpi8grofppn9vylt,cld1vazdkwflmhp8xldi', 0, 399, 5, '2019-06-20 03:45:04', '2019-06-20 03:45:04', NULL),
(39, 4, NULL, 6, 3, 'w1fqybtgdapjkifgn2wn,vsmkradzs8f5fplmh0wm,p3y1rpi8grofppn9vylt,cld1vazdkwflmhp8xldi', 0, 399, 5, '2019-06-20 03:45:04', '2019-06-20 03:45:04', NULL),
(40, 4, NULL, 6, 4, 'w1fqybtgdapjkifgn2wn,vsmkradzs8f5fplmh0wm,p3y1rpi8grofppn9vylt,cld1vazdkwflmhp8xldi', 0, 399, 5, '2019-06-20 03:45:04', '2019-06-20 03:45:04', NULL),
(41, 4, '1,2', 7, 1, 'jksaapbgkblso1gs61cl,adxykmpiltiawjyq8guz,clvnjqbukelk5hx7v00p,bixb2gklxso1can1p3iq', 0, 399, 5, '2019-06-20 03:45:43', '2019-06-20 03:45:43', NULL),
(42, 4, '1,2', 7, 2, 'jksaapbgkblso1gs61cl,adxykmpiltiawjyq8guz,clvnjqbukelk5hx7v00p,bixb2gklxso1can1p3iq', 0, 399, 5, '2019-06-20 03:45:43', '2019-06-20 03:45:43', NULL),
(43, 4, NULL, 7, 3, 'jksaapbgkblso1gs61cl,adxykmpiltiawjyq8guz,clvnjqbukelk5hx7v00p,bixb2gklxso1can1p3iq', 0, 399, 5, '2019-06-20 03:45:43', '2019-06-20 03:45:43', NULL),
(44, 4, NULL, 7, 4, 'jksaapbgkblso1gs61cl,adxykmpiltiawjyq8guz,clvnjqbukelk5hx7v00p,bixb2gklxso1can1p3iq', 0, 399, 5, '2019-06-20 03:45:43', '2019-06-20 03:45:43', NULL),
(45, 4, '1,2', 8, 1, 'p6bvqmgszwvgnpnctthh,zo1gbtvr7c6esvrghhwt,wrojxn9ov5lj0mfhlzmb,ounudazlwjojqpu6lb0i', 0, 399, 5, '2019-06-20 03:46:19', '2019-06-20 03:46:19', NULL),
(46, 4, '1,2', 8, 2, 'p6bvqmgszwvgnpnctthh,zo1gbtvr7c6esvrghhwt,wrojxn9ov5lj0mfhlzmb,ounudazlwjojqpu6lb0i', 0, 399, 5, '2019-06-20 03:46:19', '2019-06-20 03:46:19', NULL),
(47, 4, NULL, 8, 3, 'p6bvqmgszwvgnpnctthh,zo1gbtvr7c6esvrghhwt,wrojxn9ov5lj0mfhlzmb,ounudazlwjojqpu6lb0i', 0, 399, 5, '2019-06-20 03:46:19', '2019-06-20 03:46:19', NULL),
(48, 4, NULL, 8, 4, 'p6bvqmgszwvgnpnctthh,zo1gbtvr7c6esvrghhwt,wrojxn9ov5lj0mfhlzmb,ounudazlwjojqpu6lb0i', 0, 399, 5, '2019-06-20 03:46:19', '2019-06-20 03:46:19', NULL),
(49, 5, '1,2', 9, 1, 'jrujqsubax1q5jyalsow,nlpnbyckug3xxlwb8rew,srczhvpchlcwc5fo0q7g,skhrua55qp5qocsrsfav', 0, 399, 5, '2019-06-20 03:49:01', '2019-06-20 03:49:01', NULL),
(50, 5, '1,2', 9, 2, 'jrujqsubax1q5jyalsow,nlpnbyckug3xxlwb8rew,srczhvpchlcwc5fo0q7g,skhrua55qp5qocsrsfav', 0, 399, 5, '2019-06-20 03:49:01', '2019-06-20 03:49:01', NULL),
(51, 5, NULL, 9, 3, 'jrujqsubax1q5jyalsow,nlpnbyckug3xxlwb8rew,srczhvpchlcwc5fo0q7g,skhrua55qp5qocsrsfav', 0, 399, 5, '2019-06-20 03:49:01', '2019-06-20 03:49:01', NULL),
(52, 5, NULL, 9, 4, 'jrujqsubax1q5jyalsow,nlpnbyckug3xxlwb8rew,srczhvpchlcwc5fo0q7g,skhrua55qp5qocsrsfav', 0, 399, 5, '2019-06-20 03:49:01', '2019-06-20 03:49:01', NULL),
(53, 5, '1,2', 9, 1, 'qkao9qvilwpcecjw6xkr,nu3qpkbscxi0d59sg4jm,zus87kek7ei3exz5n0hw,kf6pifonzpway3jnqvhx', 0, 399, 0, '2019-06-20 03:49:02', '2019-06-20 03:51:21', NULL),
(54, 5, '1,2', 9, 2, 'qkao9qvilwpcecjw6xkr,nu3qpkbscxi0d59sg4jm,zus87kek7ei3exz5n0hw,kf6pifonzpway3jnqvhx', 0, 399, 0, '2019-06-20 03:49:02', '2019-06-20 03:51:34', NULL),
(55, 5, '1,2', 9, 3, 'qkao9qvilwpcecjw6xkr,nu3qpkbscxi0d59sg4jm,zus87kek7ei3exz5n0hw,kf6pifonzpway3jnqvhx', 0, 399, 0, '2019-06-20 03:49:02', '2019-06-20 03:51:58', NULL),
(56, 5, '1,2', 9, 4, 'qkao9qvilwpcecjw6xkr,nu3qpkbscxi0d59sg4jm,zus87kek7ei3exz5n0hw,kf6pifonzpway3jnqvhx', 0, 399, 0, '2019-06-20 03:49:02', '2019-06-20 03:52:17', NULL),
(57, 5, '1,2', 6, 1, 'ykqwapkejnqwzaeiucd8,rdyzqao0jm5fybe4zsv6,x97mlmx9kd7mphmkaial,lahmellrhubhbmkvec1d', 0, 399, 5, '2019-06-20 03:49:37', '2019-06-20 03:49:37', NULL),
(58, 5, '1,2', 6, 2, 'ykqwapkejnqwzaeiucd8,rdyzqao0jm5fybe4zsv6,x97mlmx9kd7mphmkaial,lahmellrhubhbmkvec1d', 0, 399, 5, '2019-06-20 03:49:37', '2019-06-20 03:49:37', NULL),
(59, 5, NULL, 6, 3, 'ykqwapkejnqwzaeiucd8,rdyzqao0jm5fybe4zsv6,x97mlmx9kd7mphmkaial,lahmellrhubhbmkvec1d', 0, 399, 5, '2019-06-20 03:49:37', '2019-06-20 03:49:37', NULL),
(60, 5, NULL, 6, 4, 'ykqwapkejnqwzaeiucd8,rdyzqao0jm5fybe4zsv6,x97mlmx9kd7mphmkaial,lahmellrhubhbmkvec1d', 0, 399, 5, '2019-06-20 03:49:37', '2019-06-20 03:49:37', NULL),
(61, 5, '1,2', 1, 1, 'meju6oxypqkmrnxosjgs,r0ubucy5ujtxybgsia1j,bna8xopjm1wodnoj1ebr,hmphtp0f73013w9ngq3h', 0, 399, 5, '2019-06-20 03:50:30', '2019-06-20 03:50:30', NULL),
(62, 5, '1,2', 1, 2, 'meju6oxypqkmrnxosjgs,r0ubucy5ujtxybgsia1j,bna8xopjm1wodnoj1ebr,hmphtp0f73013w9ngq3h', 0, 399, 5, '2019-06-20 03:50:30', '2019-06-20 03:50:30', NULL),
(63, 5, NULL, 1, 3, 'meju6oxypqkmrnxosjgs,r0ubucy5ujtxybgsia1j,bna8xopjm1wodnoj1ebr,hmphtp0f73013w9ngq3h', 0, 399, 5, '2019-06-20 03:50:30', '2019-06-20 03:50:30', NULL),
(64, 5, NULL, 1, 4, 'meju6oxypqkmrnxosjgs,r0ubucy5ujtxybgsia1j,bna8xopjm1wodnoj1ebr,hmphtp0f73013w9ngq3h', 0, 399, 5, '2019-06-20 03:50:30', '2019-06-20 03:50:30', NULL),
(65, 6, '1,2', 6, 1, 'hp2panj2m5ph4tnpdehz,g6q2ku43i8ofylijxv0s,harnkjig6dfojefzl6bt,r89f2bcs0a0mgjdfma7g', 0, 399, 5, '2019-06-20 03:53:54', '2019-06-20 03:53:54', NULL),
(66, 6, '1,2', 6, 2, 'hp2panj2m5ph4tnpdehz,g6q2ku43i8ofylijxv0s,harnkjig6dfojefzl6bt,r89f2bcs0a0mgjdfma7g', 0, 399, 5, '2019-06-20 03:53:54', '2019-06-20 03:53:54', NULL),
(67, 6, NULL, 6, 3, 'hp2panj2m5ph4tnpdehz,g6q2ku43i8ofylijxv0s,harnkjig6dfojefzl6bt,r89f2bcs0a0mgjdfma7g', 0, 399, 5, '2019-06-20 03:53:54', '2019-06-20 03:53:54', NULL),
(68, 6, NULL, 6, 4, 'hp2panj2m5ph4tnpdehz,g6q2ku43i8ofylijxv0s,harnkjig6dfojefzl6bt,r89f2bcs0a0mgjdfma7g', 0, 399, 5, '2019-06-20 03:53:54', '2019-06-20 03:53:54', NULL),
(69, 6, '1,2', 9, 1, 'kr7ekno9fvtdfgv2x0mq,jxerdy3zttwsyrjdthij,xxqdwxzclydzbrsutlfp,uizr4x7rnnav0c9gkigu', 0, 399, 5, '2019-06-20 03:54:42', '2019-06-20 03:54:42', NULL),
(70, 6, '1,2', 9, 2, 'kr7ekno9fvtdfgv2x0mq,jxerdy3zttwsyrjdthij,xxqdwxzclydzbrsutlfp,uizr4x7rnnav0c9gkigu', 0, 399, 5, '2019-06-20 03:54:42', '2019-06-20 03:54:42', NULL),
(71, 6, NULL, 9, 3, 'kr7ekno9fvtdfgv2x0mq,jxerdy3zttwsyrjdthij,xxqdwxzclydzbrsutlfp,uizr4x7rnnav0c9gkigu', 0, 399, 5, '2019-06-20 03:54:42', '2019-06-20 03:54:42', NULL),
(72, 6, NULL, 9, 4, 'kr7ekno9fvtdfgv2x0mq,jxerdy3zttwsyrjdthij,xxqdwxzclydzbrsutlfp,uizr4x7rnnav0c9gkigu', 0, 399, 4, '2019-06-20 03:54:42', '2019-06-22 10:08:09', NULL),
(73, 6, '1,2', 3, 1, 'fvwcnbdujilmghwlzwpr,tcbd113isdwydg62f0gm,l7xbroxy0q9hrgotudtv,nhxolrifwhqvtwksivmb', 0, 399, 5, '2019-06-20 03:55:22', '2019-06-20 03:55:22', NULL),
(74, 6, '1,2', 3, 2, 'fvwcnbdujilmghwlzwpr,tcbd113isdwydg62f0gm,l7xbroxy0q9hrgotudtv,nhxolrifwhqvtwksivmb', 0, 399, 5, '2019-06-20 03:55:22', '2019-06-20 03:55:22', NULL),
(75, 6, NULL, 3, 3, 'fvwcnbdujilmghwlzwpr,tcbd113isdwydg62f0gm,l7xbroxy0q9hrgotudtv,nhxolrifwhqvtwksivmb', 0, 399, 4, '2019-06-20 03:55:22', '2019-06-22 06:22:55', NULL),
(76, 6, NULL, 3, 4, 'fvwcnbdujilmghwlzwpr,tcbd113isdwydg62f0gm,l7xbroxy0q9hrgotudtv,nhxolrifwhqvtwksivmb', 0, 399, 5, '2019-06-20 03:55:22', '2019-06-20 03:55:22', NULL),
(77, 7, '1,2', 1, 1, 'euafhlbppym4gsoiu9j1,eb7p28x17igedslus1h9,drs81ndhpycbgpzvt3i2,gyfk0cxcokwyojej99ze', 12500, 59900, 5, '2019-06-26 04:01:35', '2019-06-26 04:01:35', NULL),
(78, 7, '1,2', 1, 2, 'euafhlbppym4gsoiu9j1,eb7p28x17igedslus1h9,drs81ndhpycbgpzvt3i2,gyfk0cxcokwyojej99ze', 12500, 59900, 5, '2019-06-26 04:01:35', '2019-06-26 04:01:35', NULL),
(79, 7, NULL, 1, 3, 'euafhlbppym4gsoiu9j1,eb7p28x17igedslus1h9,drs81ndhpycbgpzvt3i2,gyfk0cxcokwyojej99ze', 12500, 59900, 5, '2019-06-26 04:01:35', '2019-06-26 04:01:35', NULL),
(80, 7, NULL, 1, 4, 'euafhlbppym4gsoiu9j1,eb7p28x17igedslus1h9,drs81ndhpycbgpzvt3i2,gyfk0cxcokwyojej99ze', 12500, 59900, 5, '2019-06-26 04:01:36', '2019-06-26 04:01:36', NULL);

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
(1, 'pkjfuwc7vlpt7nzhpahl', NULL, 'http://fashion.altsolution.in/products', 0, NULL, 1, '2019-06-13 03:20:32', '2019-06-16 21:47:53', NULL),
(2, 'ugudovipa77ajmgte1as', NULL, 'http://fashion.altsolution.in/products', 0, NULL, 1, '2019-06-13 03:20:59', '2019-06-16 21:48:12', NULL),
(3, 'sdwptzjyp2chdmjpvlds', NULL, 'http://fashion.altsolution.in/products', 0, NULL, 1, '2019-06-13 03:21:25', '2019-06-16 21:48:41', NULL),
(4, 'glf3a88oqig5hf6osxw6', NULL, 'http://fashion.altsolution.in/products', 0, NULL, 1, '2019-06-13 03:21:53', '2019-06-16 21:48:59', NULL);

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
-- Indexes for table `contact_datas`
--
ALTER TABLE `contact_datas`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_contents`
--
ALTER TABLE `app_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_datas`
--
ALTER TABLE `contact_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
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
