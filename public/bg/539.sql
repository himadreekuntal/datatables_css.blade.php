-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 06:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_new_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_gurantees`
--

CREATE TABLE `bank_gurantees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `bg_date` date NOT NULL,
  `bg_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_info` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_gurantees`
--

INSERT INTO `bank_gurantees` (`id`, `tender_id`, `bg_date`, `bg_no`, `bg_amount`, `bank_info`, `validity`, `status`, `bg`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 1, '2021-12-22', '23423434', '1200000', 'Mercentile bank Limited', '2022-01-01', '2', 'Other Experience-637', NULL, '2021-12-22 03:37:38', '2021-12-22 04:37:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_gurantees`
--
ALTER TABLE `bank_gurantees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_gurantees_tender_id_foreign` (`tender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_gurantees`
--
ALTER TABLE `bank_gurantees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_gurantees`
--
ALTER TABLE `bank_gurantees`
  ADD CONSTRAINT `bank_gurantees_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
