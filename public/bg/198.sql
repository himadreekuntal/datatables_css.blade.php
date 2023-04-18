-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 06:54 AM
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
-- Table structure for table `performance_gurantees`
--

CREATE TABLE `performance_gurantees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tender_id` bigint(20) UNSIGNED NOT NULL,
  `pg_date` date NOT NULL,
  `pg_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pg_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_info` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_gurantees`
--

INSERT INTO `performance_gurantees` (`id`, `tender_id`, `pg_date`, `pg_no`, `pg_amount`, `bank_info`, `validity`, `status`, `noa`, `pg`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, '2022-02-01', '2323', '2000000', 'Mercentile bank Limited', '2022-09-03', '2', '339.pdf', '702.pdf', NULL, '2021-12-22 03:38:09', '2021-12-22 05:10:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance_gurantees`
--
ALTER TABLE `performance_gurantees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_gurantees_tender_id_foreign` (`tender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `performance_gurantees`
--
ALTER TABLE `performance_gurantees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `performance_gurantees`
--
ALTER TABLE `performance_gurantees`
  ADD CONSTRAINT `performance_gurantees_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
