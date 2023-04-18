-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 10:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `origin`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'GonDO Electronics', 'Taiwan', 1, NULL, '2020-06-15 18:22:36', '2020-06-15 20:38:02'),
(2, 'Heron Instruments', 'Canada', 1, NULL, '2020-06-15 20:37:32', '2020-06-15 20:37:32'),
(3, 'AZ Instruments', 'Taiwan', 1, NULL, '2020-06-15 20:37:56', '2020-06-15 20:37:59'),
(4, 'Kett Laboratory', 'Japan', 1, '2020-06-15 20:56:59', '2020-06-15 20:39:37', '2020-06-15 20:56:59'),
(5, 'Kett Electronics lab.', 'Japan', 1, NULL, '2020-12-27 23:37:30', '2020-12-27 23:37:30'),
(6, 'Vanessen', 'Netherlands', 1, NULL, '2020-12-28 23:48:29', '2020-12-28 23:48:29'),
(7, 'Heron Instruments', 'Canada', 1, NULL, '2020-12-28 23:49:22', '2020-12-28 23:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Water Testing Meter', 1, NULL, '2020-06-15 17:57:33', '2020-12-31 00:28:34'),
(2, 'Moisture Meter', 1, '2020-06-15 21:13:36', '2020-06-15 21:12:00', '2020-06-15 21:13:36'),
(3, 'Grain Moisture Meter', 1, NULL, '2020-08-06 22:27:20', '2020-12-31 00:28:40'),
(4, 'Water Level Meter', 1, NULL, '2020-08-06 22:27:32', '2020-12-28 23:52:13'),
(5, 'Water Level Logger', 1, NULL, '2020-12-28 23:52:24', '2020-12-28 23:52:24'),
(6, 'Jute Moisture Meter', 1, NULL, '2020-12-28 23:52:54', '2020-12-28 23:52:54'),
(7, 'Geo Technical Equipment', 1, NULL, '2020-12-28 23:53:14', '2020-12-28 23:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mahir scientific', 'mahir@gmail.com', '012312312', 'Hatkhola, Dhaka', 0, '2020-06-18 18:53:23', '2020-06-18 18:12:27', '2020-06-18 18:53:23'),
(3, 'Mahir scientific', 'mahir1@gmail.com', '123123123', 'Hatkhola, Dhaka', 1, NULL, '2020-06-18 18:57:04', '2020-06-18 18:57:04'),
(4, 'Hatkhola Scientific', 'asdas@adsa.vo', '123123123', 'Hatkhola, Dhaka', 1, NULL, '2020-06-29 17:37:54', '2020-06-29 17:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_06_16_051647_create_brands_table', 1),
(6, '2020_06_16_051715_create_categories_table', 1),
(7, '2020_06_16_052112_create_products_table', 1),
(8, '2020_12_22_083058_create_permission_tables', 1),
(9, '2020_06_19_052912_create_customers_table', 2),
(21, '2020_06_21_050505_create_sales_table', 3),
(22, '2020_07_29_055353_create_product_sale_table', 3),
(23, '2020_08_07_104353_create_quotations_table', 3),
(24, '2020_08_07_105119_create_product_quotation_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(2, 'role-create', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(3, 'role-edit', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(4, 'role-delete', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(5, 'product-list', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(6, 'product-create', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(7, 'product-edit', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(8, 'product-delete', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(9, 'category-list', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(10, 'category-create', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(11, 'category-edit', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(12, 'category-delete', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(13, 'brand-list', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(14, 'brand-create', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(15, 'brand-edit', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(16, 'brand-delete', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(17, 'sale-list', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(18, 'sale-create', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(19, 'sale-edit', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29'),
(20, 'sale-delete', 'web', '2020-12-24 00:46:29', '2020-12-24 00:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `catalog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.pdf',
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `category_id`, `brand_id`, `image`, `catalog`, `qty`, `warranty`, `buying_price`, `selling_price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'EZDO 6011 Waterproof pH Meter', 1, 1, '117.jpg', '388.jpg', '100', '6 Months', '2400', '3500', 1, '2020-06-16 18:38:44', '2020-06-16 17:14:47', '2020-06-16 18:38:44'),
(2, 'EZDO 6011 Waterproof pH Meter', 1, 1, '312.jpg', '324.jpg', '98', '1 year', '2000', '4000', 1, NULL, '2020-06-17 16:49:26', '2020-06-17 18:08:54'),
(3, 'EZDO 6011 Waterproof pH Meter', 1, 1, '312.jpg', '324.jpg', '100', '1 year', '2000', '4000', 1, '2020-06-17 18:06:37', '2020-06-17 18:04:54', '2020-06-17 18:06:37'),
(4, 'EZDO 6011 Waterproof pH Meter', 1, 1, '312.jpg', '324.jpg', '100', '1 year', '2000', '4000', 1, '2020-06-17 18:08:47', '2020-06-17 18:06:46', '2020-06-17 18:08:47'),
(5, 'EZDO 5011 pH Meter', 1, 1, '916.jpg', '777.pdf', '498', '6 Months', '1500', '2600', 1, NULL, '2020-07-01 18:31:04', '2020-07-01 18:31:04'),
(6, 'Kett Grain Moisture Meter F-523', 3, 5, '603.png', '543.pdf', '100', '1 year', '23000', '35000', 1, NULL, '2020-12-28 00:16:44', '2020-12-28 00:18:25'),
(7, 'Kett Grain Moisture Meter FG-523', 3, 5, '597.png', '963.pdf', '100', '1 year', '23000', '36000', 1, NULL, '2020-12-28 00:19:21', '2020-12-28 00:19:21'),
(8, 'Kett Grain Moisture Meter FG-523', 3, 5, '858.png', '327.pdf', '100', '1 year', '23000', '35000', 1, NULL, '2020-12-28 00:19:52', '2020-12-28 00:19:52'),
(9, 'Kett Grain Moisture Meter FG-523', 3, 5, '462.png', '912.pdf', '100', '1 year', '23000', '35000', 1, NULL, '2020-12-28 00:20:17', '2020-12-28 00:20:17'),
(10, 'Kett Grain Moisture Meter FG-523', 1, 5, '679.png', '364.pdf', '100', '1 year', '23000', '35000', 1, NULL, '2020-12-28 00:20:52', '2020-12-28 00:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation`
--

CREATE TABLE `product_quotation` (
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`sale_id`, `product_id`, `quantity`, `serial`, `rate`, `discount`, `total`) VALUES
(5, 2, 2, '123123,2312', '4000', '1000', '6000'),
(6, 2, 2, '123123,2312', '4000', '1000', '6000'),
(6, 7, 2, '123123,2312', '36000', '1000', '70000'),
(7, 2, 23, '123123,2312', '4000', '1000', '69000'),
(7, 8, 2, '123123,2312', '35000', '1000', '68000'),
(7, 10, 2, '123123,2312', '35000', '1000', '68000'),
(8, 5, 12, '123123,2312', '2600', '1000', '19200'),
(8, 7, 2, '123123,2312', '36000', '1000', '70000'),
(8, 8, 2, '123123,2312', '35000', '1000', '68000'),
(8, 8, 4, '123123,2312', '35000', '1000', '136000'),
(9, 2, 2, '123123,2312', '4000', '1000', '6000'),
(9, 9, 2, '123123,2312', '35000', '1000', '68000'),
(9, 10, 2, '123123,2312', '35000', '1000', '68000'),
(9, 6, 1, '123123,2312', '35000', '1000', '34000'),
(9, 6, 3, '123123,2312', '35000', '1000', '102000'),
(10, 2, 2, '123123,2312', '4000', '1000', '6000'),
(10, 6, 2, '123123,2312', '35000', '1000', '68000'),
(10, 9, 2, '123123,2312', '35000', '1000', '68000'),
(10, 2, 2, '123123,2312', '4000', '1000', '6000'),
(10, 8, 2, '123123,2312', '35000', '1000', '68000'),
(11, 2, 2, '123123,2312', '4000', '1000', '6000'),
(11, 7, 2, '123123,2312', '36000', '1000', '70000'),
(11, 5, 2, '123123,2312', '2600', '1000', '3200'),
(11, 8, 2, '123123,2312', '35000', '1000', '68000'),
(11, 5, 2, '123123,123,123,123,123,123,123,123,123,123,123,12,312,31,231,231,23,123123', '2600', '1000', '3200'),
(11, 5, 2, '123', '2600', '1000', '3200'),
(12, 5, 2, '123123,2312', '2600', '1000', '3200'),
(12, 10, 1, '123123,2312', '35000', '1000', '34000'),
(12, 8, 1, '123123,2312', '35000', '1000', '34000'),
(12, 9, 2, '123123,2312', '35000', '1000', '68000'),
(12, 7, 3, '123123,2312', '36000', '1000', '105000'),
(12, 7, 4, '123123,2312', '36000', '1000', '140000'),
(12, 8, 2, '123123,2312', '35000', '1000', '68000'),
(13, 2, 2, '123123,2312', '4000', '1000', '6000'),
(13, 5, 2, '123123,2312', '2600', '1000', '3200'),
(13, 8, 2, '123123,2312', '35000', '1000', '68000'),
(13, 5, 2, '123123,2312', '2600', '1000', '3200'),
(13, 10, 2, '123123,2312', '35000', '1000', '68000'),
(13, 6, 2, '123123,2312', '35000', '1000', '68000'),
(13, 8, 3, '123123,2312', '35000', '1000', '102000'),
(13, 7, 3, '123123,2312', '36000', '1000', '105000'),
(14, 2, 2, '123123,2312', '4000', '1000', '6000'),
(14, 5, 2, '123123,2312', '2600', '1000', '3200'),
(14, 7, 2, '123123,2312', '36000', '1000', '70000'),
(14, 8, 2, '123123,2312', '35000', '1000', '68000'),
(14, 7, 2, '123123,2312', '36000', '1000', '70000'),
(14, 8, 2, '123123,2312', '35000', '1000', '68000'),
(14, 7, 2, '123123,2312', '36000', '1000', '70000'),
(14, 7, 2, '123123,2312', '36000', '1000', '70000'),
(14, 8, 2, '123123,2312', '35000', '1000', '68000'),
(15, 5, 23, '123123,2312', '2600', '1000', '36800'),
(15, 9, 23, '123123,2312', '35000', '1000', '782000'),
(15, 9, 23, '123123,2312', '35000', '1000', '782000'),
(15, 8, 23, '123123,2312', '35000', '1000', '782000'),
(15, 8, 12, '123123,2312', '35000', '1000', '408000'),
(15, 9, 12, '123123,2312', '35000', '1000', '408000'),
(15, 9, 23, '123123,2312', '35000', '1000', '782000'),
(15, 5, 23, '123123,2312', '2600', '1000', '36800'),
(15, 8, 2, '123123,2312', '35000', '1000', '68000'),
(15, 8, 2, '123123,2312', '35000', '1000', '68000'),
(15, 6, 2, '123123,2312', '35000', '1000', '68000'),
(16, 2, 2, '123123,2312', '4000', '1000', '6000'),
(16, 8, 2, '123123,2312', '35000', '1000', '68000'),
(16, 7, 2, '123123,2312', '36000', '1000', '70000'),
(16, 8, 12, '12', '35000', '1000', '408000'),
(16, 7, 12, '123123,2312,7868,8787,8878,6565,89798,89798,8998', '36000', '1000', '420000'),
(16, 7, 4, '123123,2312', '36000', '1000', '140000'),
(16, 7, 4, '123123,2312', '36000', '1000', '140000'),
(16, 6, 23, '123123,2312', '35000', '1000', '782000'),
(16, 7, 2, '123123,2312', '36000', '1000', '70000'),
(16, 8, 2, '123123,2312', '35000', '1000', '68000'),
(16, 5, 12, '123123,1231,2312,312,312,31231,23,123123,123,123,123,123,123,123123', '2600', '1000', '19200'),
(16, 8, 3, '123123,2312', '35000', '1000', '102000'),
(17, 2, 2, '123123,2312', '4000', '1000', '6000'),
(17, 9, 1, '123123,2312', '35000', '1000', '34000'),
(17, 8, 12, '123,123,123,,13,123,132,123,123,123,12,312,312,31,231,231,231,231,231,231,231,23,123,123,123,123,123,123,123,13', '35000', '1000', '408000'),
(17, 9, 4, '123123,2312', '35000', '1000', '136000'),
(17, 7, 3, '123123,2312', '36000', '1000', '105000'),
(17, 6, 4, '123123,2312', '35000', '1000', '136000'),
(17, 6, 23, '123123,2312', '35000', '1000', '782000'),
(17, 6, 2, '123123,2312', '35000', '1000', '68000'),
(17, 10, 23, '123123,2312', '35000', '1000', '782000'),
(17, 8, 23, '123123,2312', '35000', '1000', '782000'),
(17, 8, 3, '123123,2312', '35000', '1000', '102000'),
(17, 9, 12, '123123,2312', '35000', '1000', '408000'),
(17, 8, 3, '123123,2312', '35000', '1000', '102000'),
(17, 7, 23, '123123,2312', '36000', '1000', '805000'),
(17, 8, 23, '123123,2312', '35000', '1000', '782000'),
(18, 6, 2, '123123,2312', '35000', '1000', '68000'),
(18, 9, 2, '123123,2312', '35000', '1000', '68000'),
(18, 9, 2, '123123,2312', '35000', '1000', '68000'),
(18, 10, 3, '123123,2312', '35000', '1000', '102000'),
(18, 8, 12, '123123,2312', '35000', '1000', '408000'),
(18, 6, 2, '12', '35000', '1000', '68000'),
(18, 6, 23, '123123,2312', '35000', '1000', '782000'),
(18, 7, 12, '123123,2312', '36000', '1000', '420000'),
(18, 8, 2, '123123,2312', '35000', '1000', '68000'),
(18, 8, 2, '123123,2312', '35000', '1000', '68000'),
(18, 9, 4, '123123,2312', '35000', '1000', '136000'),
(18, 8, 4, '123123,2312', '35000', '1000', '136000'),
(18, 7, 4, '123123,2312', '36000', '1000', '140000'),
(19, 2, 10, '123123,2312', '4000', '1000', '30000'),
(19, 6, 10, '123123,2312', '35000', '1000', '340000'),
(20, 5, 10, '123123,2312', '2600', '1000', '16000'),
(20, 2, 2, '123123,2312', '4000', '1000', '6000'),
(20, 6, 23, '123123,2312', '35000', '1000', '782000'),
(21, 5, 10, '123123,2312', '2600', '1000', '16000'),
(21, 2, 2, '123123,2312', '4000', '1000', '6000'),
(21, 6, 23, '123123,2312', '35000', '1000', '782000'),
(22, 5, 10, '123123,2312', '2600', '1000', '16000'),
(22, 2, 2, '123123,2312', '4000', '1000', '6000'),
(22, 6, 23, '123123,2312', '35000', '1000', '782000'),
(23, 5, 10, '123123,2312', '2600', '1000', '16000'),
(23, 2, 2, '123123,2312', '4000', '1000', '6000'),
(23, 6, 23, '123123,2312', '35000', '1000', '782000'),
(24, 2, 2, '123123,2312', '4000', '1000', '6000'),
(24, 5, 2, '123123,2312', '2600', '1000', '3200'),
(25, 2, 2, '123123,2312', '4000', '1000', '6000'),
(25, 5, 2, '123123,2312', '2600', '1000', '3200'),
(26, 2, 2, '123123,2312', '4000', '1000', '6000'),
(27, 2, 2, '123123,2312', '4000', '1000', '6000'),
(27, 5, 2, '123123,2312', '2600', '1000', '3200');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qut_date` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ait` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ait_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qut_status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-12-24 00:46:33', '2020-12-24 00:46:33'),
(2, 'User', 'web', '2020-12-28 00:22:03', '2020-12-28 00:22:03'),
(3, 'Sales', 'web', '2020-12-28 00:22:15', '2020-12-28 00:22:15'),
(4, 'Semi User', 'web', '2020-12-28 00:22:34', '2020-12-28 00:22:34'),
(5, 'Semi Admin', 'web', '2020-12-28 00:22:49', '2020-12-28 00:22:49'),
(6, 'Visitor', 'web', '2020-12-28 00:23:07', '2020-12-28 00:23:07');

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
(1, 4),
(1, 6),
(2, 1),
(2, 5),
(3, 1),
(4, 1),
(5, 1),
(5, 4),
(5, 6),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(10, 5),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 4),
(14, 1),
(14, 5),
(15, 1),
(16, 1),
(17, 1),
(17, 3),
(17, 4),
(18, 1),
(18, 3),
(18, 5),
(19, 1),
(19, 3),
(20, 1),
(20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) NOT NULL,
  `sales_date` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0,
  `bill_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sales_id`, `sales_date`, `customer_id`, `sub_total`, `vat`, `vat_amount`, `total_amount`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`, `bill_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 100, '2020-12-29', 3, '6000', '0', '0.00', '6000.00', '6000', '0.00', 'Courier', 'Full Payment', 1, '2020-100', '2020-12-31 00:39:24', '2020-12-29 02:02:22', '2020-12-31 00:39:24'),
(6, 101, '2020-12-30', 4, '76000', '0', '0.00', '76000.00', '12800', '63200.00', 'Cheque', 'Partial Payment', 0, '2020-101', NULL, '2020-12-29 02:04:02', '2020-12-31 00:42:08'),
(7, 102, '2020-12-29', 4, '205000', '0', '0.00', '205000.00', '12800', '192200.00', 'Bank Transfer', 'Partial Payment', 1, '2020-102', NULL, '2020-12-29 02:09:13', '2020-12-29 02:09:13'),
(8, 103, '2020-12-29', 4, '293200', '0', '0.00', '293200.00', '12800', '280400.00', 'Bkash', 'Partial Payment', 1, '2020-103', NULL, '2020-12-29 02:11:48', '2020-12-29 02:11:48'),
(9, 104, '2020-12-29', 4, '278000', '0', '0.00', '278000.00', '278000', '0.00', 'Bank Transfer', 'Full Payment', 1, '2020-104', NULL, '2020-12-29 02:13:23', '2020-12-29 02:13:23'),
(10, 105, '2020-12-30', 4, '286000', '0', '0.00', '286000.00', '12800', '273200.00', 'Cash', 'Partial Payment', 1, '2020-105', NULL, '2020-12-29 23:12:44', '2020-12-29 23:12:44'),
(11, 106, '2020-12-30', 3, '153600', '1', '3072.00', '156672.00', '140000', '16672.00', 'Cash', 'Partial Payment', 1, '2020-106', NULL, '2020-12-29 23:14:37', '2020-12-29 23:14:37'),
(12, 107, '2020-12-30', 3, '452200', '0', '0.00', '452200.00', '452200', '0.00', 'Cheque', 'Full Payment', 1, '2020-107', NULL, '2020-12-29 23:16:55', '2020-12-29 23:16:55'),
(13, 108, '2020-12-30', 4, '423400', '0', '0.00', '423400.00', '423400', '0.00', 'Bank Transfer', 'Full Payment', 1, '2020-108', NULL, '2020-12-29 23:23:37', '2020-12-29 23:23:37'),
(14, 109, '2020-12-30', 4, '493200', '0', '0.00', '493200.00', '300000', '193200.00', 'Cheque', 'Partial Payment', 1, '2020-109', NULL, '2020-12-29 23:25:44', '2020-12-29 23:25:44'),
(15, 110, '2020-12-30', 4, '4221600', '0', '0.00', '4221600.00', '3400000', '821600.00', 'Bank Transfer', 'Partial Payment', 1, '2020-110', NULL, '2020-12-29 23:30:43', '2020-12-29 23:30:43'),
(16, 111, '2020-12-30', 4, '2293200', '0', '0.00', '2293200.00', '2293200', '0.00', 'Cheque,Bank Transfer', 'Full Payment', 1, '2020-111', NULL, '2020-12-29 23:35:46', '2020-12-29 23:35:46'),
(17, 112, '2020-12-30', 4, '5438000', '0', '0.00', '5438000.00', '690000', '4748000.00', 'Courier', 'Partial Payment', 1, '2020-112', NULL, '2020-12-29 23:50:21', '2020-12-29 23:50:21'),
(18, 113, '2020-12-30', 3, '2532000', '0', '0.00', '2532000.00', '1231233', '1300767.00', 'Cheque', 'Partial Payment', 1, '2020-113', NULL, '2020-12-29 23:59:26', '2020-12-29 23:59:26'),
(19, 114, '2020-12-30', 3, '370000', '0', '0.00', '370000.00', '12800', '357200.00', 'Bank Transfer', 'Partial Payment', 1, '2020-114', NULL, '2020-12-30 01:29:42', '2020-12-30 01:29:42'),
(20, 115, '2020-12-30', 3, '804000', '0', '0.00', '804000.00', '12800', '791200.00', 'Bank Transfer', 'Partial Payment', 1, '2020-115', NULL, '2020-12-30 01:39:22', '2020-12-30 01:39:22'),
(21, 116, '2020-12-30', 3, '804000', '0', '0.00', '804000.00', '12800', '791200.00', 'Bank Transfer', 'Partial Payment', 1, '2020-116', NULL, '2020-12-30 01:40:04', '2020-12-30 01:40:04'),
(22, 117, '2020-12-30', 3, '804000', '0', '0.00', '804000.00', '12800', '791200.00', 'Bank Transfer', 'Partial Payment', 1, '2020-117', NULL, '2020-12-30 01:40:19', '2020-12-30 01:40:19'),
(23, 118, '2020-12-30', 3, '804000', '0', '0.00', '804000.00', '12800', '791200.00', 'Bank Transfer', 'Partial Payment', 1, '2020-118', NULL, '2020-12-30 01:40:49', '2020-12-30 01:40:49'),
(24, 119, '2020-12-30', 4, '9200', '0', '0.00', '9200.00', '9200', '0.00', 'Courier', 'Full Payment', 1, '2020-119', NULL, '2020-12-30 01:42:26', '2020-12-30 01:42:26'),
(25, 120, '2020-12-30', 3, '9200', '0', '0.00', '9200.00', '9200', '0.00', 'None', 'Full Payment', 1, '2020-120', NULL, '2020-12-30 01:45:00', '2020-12-30 01:45:00'),
(26, 121, '2020-12-30', 3, '9200', '0', '0.00', '9200.00', '9200', '0.00', 'None', 'Full Payment', 1, '2020-121', NULL, '2020-12-30 01:45:23', '2020-12-30 01:45:23'),
(27, 122, '2020-12-30', 4, '9200', '0', '0.00', '9200.00', '9200', '0.00', 'Cash', 'Full Payment', 0, '2020-122', NULL, '2020-12-30 01:53:01', '2020-12-31 00:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Himadree Barua', 'symbex_erb@dhaka.net', NULL, '$2y$10$2MNT215AQU72k854ZxmGqeLhkQnNllGqNgjKWRbrkVCAeRNDQ8EHK', NULL, NULL, NULL, '2020-12-24 00:46:33', '2020-12-24 00:46:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD KEY `product_quotation_quotation_id_foreign` (`quotation_id`),
  ADD KEY `product_quotation_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD KEY `product_sale_sale_id_foreign` (`sale_id`),
  ADD KEY `product_sale_product_id_foreign` (`product_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotations_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_quotation`
--
ALTER TABLE `product_quotation`
  ADD CONSTRAINT `product_quotation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_quotation_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD CONSTRAINT `product_sale_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sale_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
