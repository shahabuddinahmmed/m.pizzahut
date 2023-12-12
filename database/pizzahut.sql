-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2019 at 03:52 AM
-- Server version: 5.7.25
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzahut_test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_medium` double(10,2) DEFAULT NULL,
  `price_personal` double(10,2) DEFAULT NULL,
  `price_family` double(10,2) DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `description`, `price_medium`, `price_personal`, `price_family`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'BBQ sauce', NULL, 20.00, 10.00, 30.00, NULL, 0, '2018-12-27 00:45:00', '2018-12-27 00:45:00'),
(2, 'Cheddar cheese', NULL, 50.00, 30.00, 70.00, NULL, 0, '2018-12-27 00:45:54', '2018-12-27 00:45:54'),
(3, 'Pepperoni', NULL, 10.00, 20.00, 30.00, NULL, 0, '2018-12-27 08:13:06', '2018-12-27 08:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cash', 'Pending', '2018-12-26 06:15:07', '2018-12-26 06:15:07'),
(2, 4, 'Cash', 'Pending', '2018-12-26 06:56:24', '2018-12-26 06:56:24'),
(3, 5, 'Cash', 'Pending', '2018-12-27 04:24:55', '2018-12-27 04:24:55'),
(4, 6, 'Cash', 'Pending', '2018-12-27 07:55:08', '2018-12-27 07:55:08'),
(5, 7, 'Cash', 'Pending', '2019-01-09 06:42:52', '2019-01-09 06:42:52'),
(6, 8, 'Cash', 'Pending', '2019-01-12 07:26:52', '2019-01-12 07:26:52'),
(7, 9, 'Cash', 'Pending', '2019-01-13 05:28:09', '2019-01-13 05:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  `order` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `publication_status`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Deals', NULL, 'attached_images/categories/1/logo.png', 1, 0, 1, '2018-12-26 05:13:26', '2018-12-26 05:13:26'),
(2, 'PAN PIZZA', NULL, 'attached_images/categories/2/company-logo-2.png', 1, 0, 2, '2018-12-26 05:13:45', '2019-02-04 05:22:35'),
(3, 'Pasta', NULL, 'attached_images/categories/3/excel_icon.jpg', 1, 0, 10, '2019-02-04 05:36:01', '2019-02-04 05:36:01'),
(4, 'FAVORITES LINE', NULL, 'attached_images/categories/4/excel_icon.jpg', 1, 2, 10, '2019-02-04 05:36:32', '2019-02-04 05:36:32'),
(5, 'Beverage', NULL, 'attached_images/categories/5/download.jpg', 1, 0, 10, '2019-02-04 05:40:05', '2019-02-04 05:40:05'),
(6, 'VEG DELIGHTS LINE', NULL, 'attached_images/categories/6/download.jpg', 1, 2, 10, '2019-02-04 05:42:19', '2019-02-04 05:42:19'),
(7, 'VEGGIE SUPREME', NULL, 'attached_images/categories/7/download.jpg', 1, 2, 10, '2019-02-04 06:18:08', '2019-02-04 06:18:08'),
(8, 'SUPREMES LINE', NULL, 'attached_images/categories/8/download.jpg', 1, 2, 10, '2019-02-04 06:19:16', '2019-02-04 06:19:16'),
(9, 'SUPER SUPREMES LINE', NULL, 'attached_images/categories/9/download.jpg', 1, 2, 10, '2019-02-04 06:25:26', '2019-02-04 06:25:26'),
(10, 'CHEESY BITES', NULL, 'attached_images/categories/10/download.jpg', 1, 2, 10, '2019-02-04 06:31:52', '2019-02-04 06:31:52'),
(11, 'GOLDEN SURPRISE', NULL, 'attached_images/categories/11/download.jpg', 1, 0, 10, '2019-02-04 06:36:42', '2019-02-04 07:08:48'),
(12, 'HAND STRETCHED THIN', NULL, NULL, 1, 0, 10, '2019-02-04 07:11:17', '2019-02-04 07:11:17'),
(14, 'Appetisers', NULL, NULL, 1, 0, 10, '2019-02-04 07:27:45', '2019-02-04 07:27:45'),
(15, 'HC SFO Pizza', NULL, NULL, 1, 0, 10, '2019-02-04 07:44:50', '2019-02-04 07:56:19'),
(16, 'FAVORITES LINE', NULL, NULL, 1, 15, 10, '2019-02-04 07:57:42', '2019-02-04 07:57:42'),
(17, 'VEG DELIGHTS LINE', NULL, NULL, 1, 15, 10, '2019-02-04 08:06:42', '2019-02-04 08:06:42'),
(18, 'VEGGIE SUPREME', NULL, NULL, 1, 15, 10, '2019-02-04 08:08:33', '2019-02-04 08:08:33'),
(19, 'SUPREMES LINE', NULL, NULL, 1, 15, 10, '2019-02-04 08:09:33', '2019-02-04 08:09:33'),
(20, 'SUPER SUPREMES LINE', NULL, NULL, 1, 15, 10, '2019-02-05 03:54:22', '2019-02-05 03:54:22'),
(21, 'ADD ONS', NULL, NULL, 1, 0, 10, '2019-02-05 04:05:58', '2019-02-05 04:05:58'),
(22, 'Extra Non-Vegetarian', NULL, NULL, 1, 21, 10, '2019-02-05 04:06:25', '2019-02-05 04:06:25'),
(23, 'Extra Vegetarian', NULL, NULL, 1, 21, 10, '2019-02-05 04:12:12', '2019-02-05 04:12:12'),
(26, 'Extra Cheese', NULL, NULL, 1, 21, 10, '2019-02-05 04:26:48', '2019-02-05 04:26:48'),
(27, 'VALUE OFFERS', NULL, NULL, 1, 0, 10, '2019-02-05 04:30:02', '2019-02-05 04:30:02'),
(28, 'WEEKDAYS OFFERS', NULL, NULL, 1, 27, 10, '2019-02-05 04:30:15', '2019-02-05 04:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_detail_id` int(10) UNSIGNED NOT NULL,
  `delivering_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_information` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `shipping_detail_id`, `delivering_to`, `address_details`, `additional_information`, `created_at`, `updated_at`) VALUES
(1, 4, 'Ataturk Tower, 20 Bir Uttam Aminul Haque Sarak, Dhaka 1212, Bangladesh', 'H # 63, Demra, Dhaka', 'Baitul Mukaddas Jame Mosjid Road - 1.', '2018-12-26 06:56:24', '2018-12-26 06:56:24'),
(2, 6, 'Ataturk Tower, 20 Bir Uttam Aminul Haque Sarak, Dhaka 1212, Bangladesh', 'wwww', 'wwww', '2018-12-27 07:55:08', '2018-12-27 07:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `description`, `price`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Thin Crust Pizza', NULL, '100', NULL, 0, '2018-12-26 05:21:08', '2018-12-27 02:04:50'),
(2, 'Thick Crust Pizza', NULL, '50', NULL, 0, '2018-12-26 05:21:16', '2018-12-27 02:04:56');

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
(3, '2018_11_06_110725_create_categories_table', 1),
(6, '2018_11_12_062806_create_ingredients_table', 1),
(7, '2018_11_13_055514_create_product_elements_table', 1),
(9, '2018_11_26_125302_create_orders_table', 1),
(12, '2018_11_26_131308_create_take_aways_table', 1),
(13, '2018_11_26_131310_create_shipping_details_table', 1),
(14, '2018_11_26_131317_create_deliveries_table', 1),
(15, '2018_11_26_131353_create_customers_table', 1),
(16, '2018_11_26_131508_create_billing_details_table', 1),
(18, '2018_11_26_131114_create_stores_table', 1),
(19, '2018_11_11_100357_create_products_table', 1),
(20, '2018_11_13_060048_create_products_categories_table', 1),
(21, '2018_11_12_062741_create_addons_table', 1),
(22, '2018_11_26_125325_create_order_details_table', 2),
(23, '2018_12_27_094829_order_addons', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `order_total` double(10,2) NOT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Delivery',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `status_description` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `store_id`, `order_total`, `order_type`, `order_status`, `is_deleted`, `status_description`, `created_at`, `updated_at`) VALUES
(1, NULL, 9, 200.00, 'Take-Away', 'Pending', 0, NULL, '2018-12-26 06:15:07', '2018-12-26 06:15:07'),
(2, NULL, 9, 200.00, 'Delivery', 'Pending', 1, 'Not Complete', '2018-12-26 06:43:10', '2018-12-26 07:06:26'),
(3, NULL, 9, 200.00, 'Delivery', 'Pending', 1, 'Not Complete', '2018-12-26 06:50:59', '2018-12-26 07:06:16'),
(4, NULL, 9, 200.00, 'Delivery', 'Pending', 0, NULL, '2018-12-26 06:56:24', '2018-12-26 06:56:24'),
(5, NULL, 8, 700.00, 'Take-Away', 'Pending', 0, NULL, '2018-12-27 04:24:55', '2018-12-27 04:24:55'),
(6, NULL, 9, 1570.00, 'Delivery', 'Pending', 0, NULL, '2018-12-27 07:55:07', '2018-12-27 07:55:07'),
(7, NULL, 9, 700.00, 'Take-Away', 'Pending', 0, NULL, '2019-01-09 06:42:52', '2019-01-09 06:42:52'),
(8, NULL, 9, 600.00, 'Take-Away', 'Delivered', 0, NULL, '2019-01-12 07:26:52', '2019-01-28 08:09:53'),
(9, NULL, 4, 300.00, 'Take-Away', 'Pending', 0, NULL, '2019-01-13 05:28:09', '2019-01-13 05:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_addons`
--

CREATE TABLE `order_addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_detail_id` smallint(6) NOT NULL,
  `addon_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` mediumint(9) NOT NULL,
  `product_id` smallint(6) NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Family\n                                <br/>Thick Crust Pizza\n                                <br/>', 350.00, 2, '2018-12-27 04:24:55', '2018-12-27 04:24:55'),
(2, 6, 1, 'Family\n                                <br/>Thick Crust Pizza\n                                <br/>BBQ sauce\n                                \n                                <br/>', 370.00, 1, '2018-12-27 07:55:07', '2018-12-27 07:55:07'),
(3, 6, 2, 'Family\n                                <br/>Thin Crust Pizza\n                                <br/>Cheddar cheese\n                                \n                                <br/>Cheddar cheese\n                                \n                                <br/>', 1200.00, 1, '2018-12-27 07:55:08', '2018-12-27 07:55:08'),
(4, 7, 1, 'Added: Size - Family<br/>', 300.00, 1, '2019-01-09 06:42:52', '2019-01-09 06:42:52'),
(5, 7, 1, 'Pizza Margherita', 200.00, 2, '2019-01-09 06:42:52', '2019-01-09 06:42:52'),
(6, 8, 1, 'Pizza Margherita', 200.00, 1, '2019-01-12 07:26:52', '2019-01-12 07:26:52'),
(7, 8, 1, 'Added: Size - Family<br/>BBQ sauce\n                                \n                                <br/>Cheddar cheese\n                                \n                                <br/>', 400.00, 1, '2019-01-12 07:26:52', '2019-01-12 07:26:52'),
(8, 9, 1, 'Added: Size - Family<br/>', 300.00, 1, '2019-01-13 05:28:09', '2019-01-13 05:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_medium` double(10,2) DEFAULT NULL,
  `price_personal` double(10,2) DEFAULT NULL,
  `price_family` double(10,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price_medium`, `price_personal`, `price_family`, `image`, `short_description`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 'Pizza Margherita', 200.00, 100.00, 300.00, 'attached_images/products/1/SFO001.jpg', 'The meat is all cooked or cured prior to placing on the pizza.', NULL, '2018-12-27 00:06:09', '2019-01-28 08:19:45'),
(2, 'Pizza quattro stagioni pizza', 900.00, 800.00, 1000.00, 'attached_images/products/2/Pizza quattro stagioni.jpg', NULL, NULL, '2018-12-27 07:40:20', '2019-01-13 05:54:41'),
(3, 'Lebanese Chicken', 694.00, 366.00, 1226.00, NULL, NULL, NULL, '2019-02-04 05:26:55', '2019-02-04 05:26:55'),
(4, 'Farmhouse', 694.00, 366.00, 1226.00, NULL, NULL, NULL, '2019-02-04 05:29:49', '2019-02-04 05:29:49'),
(5, 'Smoked Chicken', 694.00, 366.00, 1226.00, NULL, NULL, NULL, '2019-02-04 05:37:21', '2019-02-04 05:37:21'),
(6, 'Pepsi 500 ml', NULL, NULL, 30.00, NULL, NULL, NULL, '2019-02-04 05:41:14', '2019-02-04 05:41:14'),
(7, 'Cheese Lovers', 555.00, 290.00, 973.00, 'attached_images/products/7/download.jpg', NULL, NULL, '2019-02-04 05:43:41', '2019-02-04 05:43:41'),
(8, 'Spicy Chicken', 649.00, 366.00, 1126.00, 'attached_images/products/8/download.jpg', NULL, NULL, '2019-02-04 05:48:08', '2019-02-04 05:48:08'),
(9, 'Smokey Buzz', 694.00, 366.00, 1266.00, 'attached_images/products/9/download.jpg', NULL, NULL, '2019-02-04 06:08:13', '2019-02-04 06:08:13'),
(10, 'Bbq Temptation', 694.00, 366.00, 1266.00, 'attached_images/products/10/download.jpg', NULL, NULL, '2019-02-04 06:09:16', '2019-02-04 06:09:16'),
(11, 'Beef Lovers', 694.00, 366.00, 1126.00, NULL, NULL, NULL, '2019-02-04 06:12:23', '2019-02-04 06:12:23'),
(12, 'Cheese Lovers', 555.00, 290.00, 973.00, NULL, NULL, NULL, '2019-02-04 06:14:43', '2019-02-04 06:14:43'),
(13, 'Classic Margherita', 555.00, 290.00, 973.00, NULL, NULL, NULL, '2019-02-04 06:16:22', '2019-02-04 06:16:22'),
(14, 'Veggie Lovers', 555.00, 290.00, 973.00, NULL, NULL, NULL, '2019-02-04 06:16:59', '2019-02-04 06:16:59'),
(15, 'Veggie Supreme', 808.00, 416.00, 1266.00, NULL, NULL, NULL, '2019-02-04 06:18:44', '2019-02-04 06:18:44'),
(16, 'Chicken Delight', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:20:35', '2019-02-04 06:20:35'),
(17, 'Red N Hot', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:21:17', '2019-02-04 06:21:17'),
(18, 'Supreme', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:21:56', '2019-02-04 06:21:56'),
(19, 'Chicken Supreme', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:22:28', '2019-02-04 06:22:28'),
(20, 'Beef Pepperoni', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:23:01', '2019-02-04 06:23:01'),
(21, 'Chicken Royale', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:23:40', '2019-02-04 06:23:40'),
(22, 'Chicken Classic', 808.00, 416.00, 1340.00, NULL, NULL, NULL, '2019-02-04 06:24:50', '2019-02-04 06:24:50'),
(24, 'Triple Chicken Feast', 884.00, 467.00, 1517.00, NULL, NULL, NULL, '2019-02-04 06:26:21', '2019-02-04 06:26:21'),
(25, 'Bbq Blast', 884.00, 467.00, 1517.00, NULL, NULL, NULL, '2019-02-04 06:27:01', '2019-02-04 06:27:01'),
(26, 'Meat Lovers', 884.00, 467.00, 1517.00, NULL, NULL, NULL, '2019-02-04 06:29:49', '2019-02-04 06:29:49'),
(27, 'Beef Supremo', 884.00, 467.00, 1517.00, NULL, NULL, NULL, '2019-02-04 06:30:21', '2019-02-04 06:30:21'),
(28, 'The Works', 884.00, 467.00, 1517.00, NULL, NULL, NULL, '2019-02-04 06:30:51', '2019-02-04 06:30:51'),
(29, 'Beef Lovers', 1034.00, NULL, 1528.00, NULL, NULL, NULL, '2019-02-04 06:33:24', '2019-02-04 06:33:24'),
(30, 'Bbq Temptation', 1034.00, NULL, 1528.00, NULL, NULL, NULL, '2019-02-04 06:34:00', '2019-02-04 06:34:00'),
(31, 'Tropical Chicken', 1034.00, NULL, 1528.00, NULL, NULL, NULL, '2019-02-04 06:34:58', '2019-02-04 06:34:58'),
(32, 'Smoked Chicken', 1034.00, NULL, 1528.00, NULL, NULL, NULL, '2019-02-04 06:35:28', '2019-02-04 06:35:28'),
(33, 'Spicy Chicken', 1034.00, NULL, 1528.00, NULL, NULL, NULL, '2019-02-04 06:35:55', '2019-02-04 06:35:55'),
(34, 'Beef Lovers', 1229.00, NULL, 1632.00, NULL, NULL, NULL, '2019-02-04 06:37:18', '2019-02-04 06:37:18'),
(35, 'Bbq Temptation', 1229.00, NULL, 1632.00, NULL, NULL, NULL, '2019-02-04 06:37:47', '2019-02-04 06:37:47'),
(36, 'Tropical Chicken', 1229.00, NULL, 1632.00, NULL, NULL, NULL, '2019-02-04 06:38:20', '2019-02-04 06:38:20'),
(37, 'Smoked Chicken', 1229.00, NULL, 1632.00, NULL, NULL, NULL, '2019-02-04 06:38:47', '2019-02-04 06:38:47'),
(38, 'Spicy Chicken', 1229.00, NULL, 1632.00, NULL, NULL, NULL, '2019-02-04 06:39:14', '2019-02-04 06:39:14'),
(39, 'Bbq Temptation', NULL, NULL, 620.00, NULL, NULL, NULL, '2019-02-04 07:13:02', '2019-02-04 07:13:02'),
(40, 'Beef Lovers', NULL, NULL, 620.00, NULL, NULL, NULL, '2019-02-04 07:13:47', '2019-02-04 07:13:47'),
(41, 'Red N Hot', NULL, NULL, 712.00, NULL, NULL, NULL, '2019-02-04 07:14:04', '2019-02-04 07:14:04'),
(42, 'Chicken Classic', NULL, NULL, 712.00, NULL, NULL, NULL, '2019-02-04 07:14:24', '2019-02-04 07:14:24'),
(43, 'The Works', NULL, NULL, 769.00, NULL, NULL, NULL, '2019-02-04 07:14:41', '2019-02-04 07:14:41'),
(44, 'Beef Supremo', NULL, NULL, 769.00, NULL, NULL, NULL, '2019-02-04 07:14:58', '2019-02-04 07:14:58'),
(45, '7up 500 ml', NULL, NULL, 35.00, NULL, NULL, NULL, '2019-02-04 07:21:39', '2019-02-04 07:21:39'),
(46, 'Mountain Dew 400 ml', NULL, NULL, 25.00, NULL, NULL, NULL, '2019-02-04 07:22:09', '2019-02-04 07:26:28'),
(47, 'Diet Pepsi 500 ml', NULL, NULL, 35.00, NULL, NULL, NULL, '2019-02-04 07:22:31', '2019-02-04 07:25:44'),
(48, '7up Light 500 ml', NULL, NULL, 35.00, NULL, NULL, NULL, '2019-02-04 07:23:02', '2019-02-04 07:23:02'),
(49, 'Mirinda 500ml', NULL, NULL, 35.00, NULL, NULL, NULL, '2019-02-04 07:23:17', '2019-02-04 07:23:17'),
(50, 'Garlic Bread Sticks', NULL, NULL, 137.00, NULL, NULL, NULL, '2019-02-04 07:28:11', '2019-02-04 07:28:11'),
(51, 'Garlic Bread', NULL, NULL, 171.00, NULL, NULL, NULL, '2019-02-04 07:30:19', '2019-02-04 07:30:19'),
(52, 'Garlic Bread With Cheese', NULL, NULL, 275.00, NULL, NULL, NULL, '2019-02-04 07:30:41', '2019-02-04 07:30:41'),
(53, 'Garlic Bread Spicy Supreme', NULL, NULL, 286.00, NULL, NULL, NULL, '2019-02-04 07:31:11', '2019-02-04 07:31:11'),
(54, 'Garlic Bread Exotica', NULL, NULL, 321.00, NULL, NULL, NULL, '2019-02-04 07:31:33', '2019-02-04 07:31:33'),
(55, 'Baked Potato Wedges', NULL, NULL, 240.00, NULL, NULL, NULL, '2019-02-04 07:32:40', '2019-02-04 07:32:40'),
(56, 'Spicy Garlic Mushrooms', NULL, NULL, 470.00, NULL, NULL, NULL, '2019-02-04 07:33:01', '2019-02-04 07:33:01'),
(57, 'Bbq Chicken Wings', NULL, NULL, 390.00, NULL, NULL, NULL, '2019-02-04 07:33:42', '2019-02-04 07:33:42'),
(58, 'Beef Stuffed Italian Rolls', NULL, NULL, 344.00, NULL, NULL, NULL, '2019-02-04 07:34:07', '2019-02-04 07:34:07'),
(59, 'Chicken Stuffed Italian Rolls', NULL, NULL, 344.00, NULL, NULL, NULL, '2019-02-04 07:34:35', '2019-02-04 07:34:35'),
(60, 'Fusilli Arabiatta', NULL, NULL, 429.00, NULL, NULL, NULL, '2019-02-04 07:42:40', '2019-02-04 07:42:40'),
(61, 'Fusilli Chicken Arabiatta', NULL, NULL, 479.00, NULL, NULL, NULL, '2019-02-04 07:43:05', '2019-02-04 07:43:05'),
(62, 'Fusilli Beef Arabiatta', NULL, NULL, 479.00, NULL, NULL, NULL, '2019-02-04 07:43:24', '2019-02-04 07:43:24'),
(63, 'Fusilli Mushroom', NULL, NULL, 543.00, NULL, NULL, NULL, '2019-02-04 07:43:42', '2019-02-04 07:43:42'),
(64, 'Fusilli Chicken Mushroom', NULL, NULL, 581.00, NULL, NULL, NULL, '2019-02-04 07:44:02', '2019-02-04 07:44:02'),
(65, 'Lebanese Chicken', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 07:58:36', '2019-02-04 08:02:02'),
(66, 'Farmhouse MP', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 07:59:27', '2019-02-04 08:02:22'),
(67, 'Smoked Chicken MP', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 07:59:53', '2019-02-04 08:02:42'),
(68, 'Spicy Chicken MP', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:00:24', '2019-02-04 08:03:00'),
(69, 'Smokey Buzz MP', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:00:45', '2019-02-04 08:03:19'),
(70, 'Beef Lovers', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:03:52', '2019-02-04 08:03:52'),
(71, 'Chicken Exotica', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:04:17', '2019-02-04 08:04:17'),
(72, 'Chicken Hawaiian', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:04:42', '2019-02-04 08:04:42'),
(73, 'Spicy Beef', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:05:01', '2019-02-04 08:05:01'),
(74, 'Cheese Lovers', 555.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:07:15', '2019-02-04 08:07:15'),
(75, 'Classic Margherita', 555.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:07:43', '2019-02-04 08:07:43'),
(76, 'Veggie Lovers', 555.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:08:01', '2019-02-04 08:11:55'),
(77, 'Veggie Supreme', 694.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:09:12', '2019-02-04 08:09:12'),
(78, 'Chicken Delight', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:10:15', '2019-02-04 08:11:39'),
(79, 'Red N Hot', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:11:12', '2019-02-04 08:11:12'),
(80, 'Supreme', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:12:22', '2019-02-04 08:12:22'),
(81, 'Chicken Supreme', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:12:44', '2019-02-04 08:12:44'),
(82, 'Beef Pepperoni', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:13:15', '2019-02-04 08:13:15'),
(83, 'Chicken Royale', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:13:37', '2019-02-04 08:13:37'),
(84, 'Chicken Classic', 808.00, NULL, NULL, NULL, NULL, NULL, '2019-02-04 08:14:19', '2019-02-04 08:14:19'),
(85, 'Triple Chicken Feast', 884.00, NULL, NULL, NULL, NULL, NULL, '2019-02-05 03:56:19', '2019-02-05 03:56:19'),
(86, 'Bbq Blast', 884.00, NULL, NULL, NULL, NULL, NULL, '2019-02-05 03:56:47', '2019-02-05 03:56:47'),
(87, 'Meat Lovers', 884.00, NULL, NULL, NULL, NULL, NULL, '2019-02-05 03:57:23', '2019-02-05 03:57:23'),
(88, 'Beef Supremo', 884.00, NULL, NULL, NULL, NULL, NULL, '2019-02-05 03:57:45', '2019-02-05 03:57:45'),
(89, 'The Works', 884.00, NULL, NULL, NULL, NULL, NULL, '2019-02-05 03:58:35', '2019-02-05 03:58:35'),
(90, 'Beef', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:07:16', '2019-02-05 04:07:16'),
(91, 'Beef Pepperoni', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:08:08', '2019-02-05 04:08:08'),
(92, 'Chicken Sausage', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:08:41', '2019-02-05 04:08:41'),
(93, 'Chicken', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:09:21', '2019-02-05 04:09:21'),
(94, 'Spicy Chicken', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:09:56', '2019-02-05 04:09:56'),
(95, 'Lebanese Chicken', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:10:27', '2019-02-05 04:10:27'),
(96, 'Smoked Chicken', 148.00, 125.00, 171.00, NULL, NULL, NULL, '2019-02-05 04:11:04', '2019-02-05 04:11:04'),
(97, 'Jalapeno', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:12:56', '2019-02-05 04:12:56'),
(98, 'Black Olives', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:13:30', '2019-02-05 04:13:30'),
(99, 'Pineapple Can', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:14:01', '2019-02-05 04:14:01'),
(100, 'Capsicum', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:14:35', '2019-02-05 04:14:35'),
(101, 'Mushrooms', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:15:07', '2019-02-05 04:15:07'),
(102, 'Sweet Corn', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:15:52', '2019-02-05 04:15:52'),
(103, 'Red Paprika', 91.00, 79.00, 114.00, NULL, NULL, NULL, '2019-02-05 04:16:21', '2019-02-05 04:16:21'),
(104, 'Mozzarella Cheese', 183.00, 125.00, 309.00, NULL, NULL, NULL, '2019-02-05 04:18:28', '2019-02-05 04:18:28'),
(105, 'Mozzarella Cheese', 183.00, 125.00, 309.00, NULL, NULL, NULL, '2019-02-05 04:27:17', '2019-02-05 04:27:17'),
(106, 'Onions', 56.00, 45.00, 68.00, NULL, NULL, NULL, '2019-02-05 04:28:06', '2019-02-05 04:28:06'),
(107, 'Tomatoes', 56.00, 45.00, 68.00, NULL, NULL, NULL, '2019-02-05 04:28:53', '2019-02-05 04:28:53'),
(108, 'Green Chilies', 56.00, 45.00, 68.00, NULL, NULL, NULL, '2019-02-05 04:29:34', '2019-02-05 04:29:34'),
(109, '2 PP @ 249', NULL, NULL, 498.00, NULL, NULL, NULL, '2019-02-05 04:30:56', '2019-02-05 04:30:56'),
(110, 'Triple Treat Box', NULL, NULL, 1264.00, NULL, NULL, NULL, '2019-02-05 04:31:18', '2019-02-05 04:31:18'),
(111, 'Don’t Cook Sundays', NULL, NULL, 1299.00, NULL, NULL, NULL, '2019-02-05 04:31:43', '2019-02-05 04:31:43'),
(112, 'Pan4All', NULL, NULL, 899.00, NULL, NULL, NULL, '2019-02-05 04:32:06', '2019-02-05 04:32:06'),
(113, '2 MP @ 999', NULL, NULL, 999.00, NULL, NULL, NULL, '2019-02-05 04:32:23', '2019-02-05 04:32:23'),
(114, 'Meal For 2', NULL, NULL, 804.00, NULL, NULL, NULL, '2019-02-05 04:32:49', '2019-02-05 04:32:49'),
(115, 'Chicken Exotica', 694.00, 366.00, 1226.00, NULL, NULL, NULL, '2019-02-05 04:39:01', '2019-02-05 04:39:01'),
(116, 'Chicken Hawaiian', 694.00, 366.00, 1226.00, NULL, NULL, NULL, '2019-02-05 04:39:36', '2019-02-05 04:39:36'),
(117, 'Spicy Beef', 694.00, 366.00, 1226.00, NULL, NULL, NULL, '2019-02-05 04:40:06', '2019-02-05 04:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `category_id`, `product_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(6, 4, 5),
(7, 5, 6),
(8, 6, 7),
(13, 4, 8),
(14, 4, 9),
(15, 4, 10),
(17, 4, 11),
(19, 6, 12),
(21, 6, 13),
(23, 6, 14),
(25, 7, 15),
(27, 8, 16),
(29, 8, 17),
(31, 8, 18),
(33, 8, 19),
(35, 8, 20),
(37, 8, 21),
(39, 8, 22),
(43, 9, 24),
(45, 9, 25),
(47, 9, 26),
(49, 9, 27),
(51, 9, 28),
(53, 10, 29),
(55, 10, 30),
(57, 10, 31),
(59, 10, 32),
(61, 10, 33),
(63, 11, 34),
(65, 11, 35),
(67, 11, 36),
(69, 11, 37),
(71, 11, 38),
(72, 4, 3),
(73, 2, 8),
(74, 2, 9),
(75, 2, 10),
(76, 2, 11),
(77, 2, 5),
(78, 12, 39),
(79, 12, 40),
(80, 12, 41),
(81, 12, 42),
(82, 12, 43),
(83, 12, 44),
(84, 5, 45),
(85, 5, 46),
(86, 5, 47),
(87, 5, 48),
(88, 5, 49),
(89, 14, 50),
(90, 14, 51),
(91, 14, 52),
(92, 14, 53),
(93, 14, 54),
(94, 14, 55),
(95, 14, 56),
(96, 14, 57),
(97, 14, 58),
(98, 14, 59),
(99, 3, 60),
(100, 3, 61),
(101, 3, 62),
(102, 3, 63),
(103, 3, 64),
(104, 15, 65),
(105, 16, 65),
(106, 15, 66),
(107, 16, 66),
(108, 15, 67),
(109, 16, 67),
(110, 15, 68),
(111, 16, 68),
(112, 15, 69),
(113, 16, 69),
(114, 15, 70),
(115, 16, 70),
(116, 15, 71),
(117, 16, 71),
(118, 15, 72),
(119, 16, 72),
(120, 15, 73),
(121, 16, 73),
(122, 15, 74),
(123, 17, 74),
(124, 15, 75),
(125, 17, 75),
(126, 15, 76),
(127, 17, 76),
(128, 15, 77),
(129, 18, 77),
(130, 15, 78),
(131, 19, 78),
(132, 15, 79),
(133, 19, 79),
(134, 15, 80),
(135, 19, 80),
(136, 15, 81),
(137, 19, 81),
(138, 15, 82),
(139, 19, 82),
(140, 15, 83),
(141, 19, 83),
(142, 15, 84),
(143, 19, 84),
(144, 15, 85),
(145, 20, 85),
(146, 15, 86),
(147, 20, 86),
(148, 15, 87),
(149, 20, 87),
(150, 15, 88),
(151, 20, 88),
(152, 15, 89),
(153, 20, 89),
(154, 21, 90),
(155, 22, 90),
(156, 21, 91),
(157, 22, 91),
(158, 21, 92),
(159, 22, 92),
(160, 21, 93),
(161, 22, 93),
(162, 21, 94),
(163, 22, 94),
(164, 21, 95),
(165, 22, 95),
(166, 21, 96),
(167, 22, 96),
(168, 21, 97),
(169, 23, 97),
(170, 21, 98),
(171, 23, 98),
(172, 21, 99),
(173, 23, 99),
(174, 21, 100),
(175, 23, 100),
(176, 21, 101),
(177, 23, 101),
(178, 21, 102),
(179, 23, 102),
(180, 21, 103),
(181, 23, 103),
(184, 21, 105),
(185, 26, 105),
(186, 21, 106),
(187, 26, 106),
(188, 21, 107),
(189, 26, 107),
(190, 21, 108),
(191, 26, 108),
(192, 27, 109),
(193, 28, 109),
(194, 27, 110),
(195, 28, 110),
(196, 27, 111),
(197, 28, 111),
(198, 27, 112),
(199, 28, 112),
(200, 27, 113),
(201, 28, 113),
(202, 27, 114),
(203, 28, 114),
(204, 4, 4),
(205, 2, 115),
(206, 4, 115),
(207, 2, 116),
(208, 4, 116),
(209, 2, 117),
(210, 4, 117);

-- --------------------------------------------------------

--
-- Table structure for table `product_elements`
--

CREATE TABLE `product_elements` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_element_id` int(11) NOT NULL,
  `product_element_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_elements`
--

INSERT INTO `product_elements` (`id`, `product_id`, `product_element_id`, `product_element_type`) VALUES
(2, 1, 1, 'App\\Ingredient'),
(3, 1, 1, 'App\\Addon'),
(5, 1, 2, 'App\\Ingredient'),
(6, 2, 2, 'App\\Addon'),
(7, 2, 1, 'App\\Ingredient'),
(8, 2, 1, 'App\\Addon'),
(9, 2, 3, 'App\\Addon'),
(10, 2, 2, 'App\\Ingredient'),
(11, 1, 2, 'App\\Addon'),
(12, 1, 3, 'App\\Addon');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `name`, `mobile`, `email`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'q4444444444444', '1', 'a@a.a', 1, '2018-12-26 06:15:07', '2018-12-26 06:15:07'),
(2, 'Sanaulla Parvez', '01916278567', 'admin@example.com', 2, '2018-12-26 06:43:10', '2018-12-26 06:43:10'),
(3, 'Sanaulla Parvez', '01916278567', 'admin@example.com', 3, '2018-12-26 06:50:59', '2018-12-26 06:50:59'),
(4, 'Sanaulla Parvez', '01916278567', 'admin@example.com', 4, '2018-12-26 06:56:24', '2018-12-26 06:56:24'),
(5, 'w', '7', 'w@a.q', 5, '2018-12-27 04:24:55', '2018-12-27 04:24:55'),
(6, 'Test', '111', 'w@a.q', 6, '2018-12-27 07:55:08', '2018-12-27 07:55:08'),
(7, 'Zia', '+8801714103945', 'ziaul.1976@gmail.com', 7, '2019-01-09 06:42:52', '2019-01-09 06:42:52'),
(8, 'Zia', '+8801714103945', 'ziaul.1976@gmail.com', 8, '2019-01-12 07:26:52', '2019-01-12 07:26:52'),
(9, 'Zia', '01714103945', 'ziaul.1976@gmail.com', 9, '2019-01-13 05:28:09', '2019-01-13 05:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `tag`, `name`, `location`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'gulshanTriangle', 'Pizza Hut Gulshan', 'Road # 140, SE(F)- 1, Bir Uttam Mir Shawkat Ali Sarak, (South Avenue), Gulshan - 1, Dhaka- 1212.', '11:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(2, 'gulshan2Triangle', 'Pizza Hut RM Center', 'House- 101( 2nd Floor), Gulshan Avenue, Gulshan - 2, Dhaka-1212', '11:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(3, 'dhanmondiTriangle', 'Pizza Hut Dhanmondi', 'Plot # 754, Satmasjid Road, Dhanmondi, Dhaka- 1205', '11:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(4, 'dhanmondi2Triangle', 'Pizza Hut Delivery Dhanmondi', 'Dr. Refat Ullahs Happy Arcade, House-03, Road-03, Dhanmondi, Dhaka', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(5, 'bailyTriangle', 'Pizza Hut Baily Road', '3, New Baily Road, 10, Natok Sarani, Gold Hunt Shopping Complex, Dhaka.', '11:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(6, 'uttaraTriangle', 'Pizza Hut Uttara', 'Plot # 13, Sec # 13, Sonargaon, Janapath, Uttara, Dhaka-1230', '11:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(7, 'uttara2Triangle', 'Pizza Hut Delivery Uttara', 'H#06, Road#02, Ahmed Plaza (Gr. Flr), Sector-03, Uttara, Dhaka-1230', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(8, 'bhataraTriangle', 'Pizza Hut Delivery Bhatara', 'Adept N. R. Complex, Plot- Ka 5/2, Bashundhara Link Road, Jagannathpur, Badda, Dhaka-1229', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(9, 'bananiTriangle', 'Pizza Hut Delivery Banani', 'Plot- 50, Road- 11, Block- C, Banani Police Station, Banani, Dhaka-1213.', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(10, 'mirpurTriangle', 'Pizza Hut Delivery Mirpur', 'Spring Rahmat E Tuba, Plot-132, Road-2, Block- A, Section- 12,  Mirpur, Dhaka', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(11, 'uttara2Triangle', 'Pizza Hut Delivery Sony', 'Sony Cinema Bhaban, Ist Floor, Plot-1, Block-D,Sector-02, Mirpur, Dhaka-1216', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20'),
(12, 'wariTriangle', 'Pizza Hut Delivery Wari', 'A.K. Famous Tower, 41 Rankin Street, Wari, Dhaka', '10:00:00', '23:00:00', '2018-12-31 02:17:20', '2018-12-31 02:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `take_aways`
--

CREATE TABLE `take_aways` (
  `id` int(10) UNSIGNED NOT NULL,
  `pickup_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$10$v3EBG.ilv3KctKLg8thCZemRpGOF55hF3MysRl501sF/t9rQDsRlm', 'FxqSEk2SMgFuMPS29RDl6yzcd3VuLM5xkD1kDHW1AfueE17Lu2ZdDDlcnBRA', '2018-12-26 05:12:06', '2018-12-26 05:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_stores`
--

CREATE TABLE `user_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_shipping_detail_id_foreign` (`shipping_detail_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_addons`
--
ALTER TABLE `order_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_category_id_foreign` (`category_id`),
  ADD KEY `products_categories_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_elements`
--
ALTER TABLE `product_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_aways`
--
ALTER TABLE `take_aways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_stores`
--
ALTER TABLE `user_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_stores_user_id_foreign` (`user_id`),
  ADD KEY `user_stores_store_id_foreign` (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_addons`
--
ALTER TABLE `order_addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `product_elements`
--
ALTER TABLE `product_elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `take_aways`
--
ALTER TABLE `take_aways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_stores`
--
ALTER TABLE `user_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_shipping_detail_id_foreign` FOREIGN KEY (`shipping_detail_id`) REFERENCES `shipping_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_stores`
--
ALTER TABLE `user_stores`
  ADD CONSTRAINT `user_stores_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
