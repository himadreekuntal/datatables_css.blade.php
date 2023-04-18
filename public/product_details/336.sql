-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 06:49 AM
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
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procuring_entity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tender_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `etender_id`, `procuring_entity`, `item`, `tender_status`, `bg_status`, `pg_status`, `opening_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '637804', 'NATP-2, DOF', '<ul><li>pH-7 Bufffer Solution</li><li>pH-4 Buffer Solution</li><li>TDS Buffer Solution</li><li>Ammonia Test Kit</li><li>Hardness Test kit</li></ul>', '1', '2', '2', '2021-12-31', NULL, '2021-12-19 02:03:42', '2021-12-22 03:48:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenders_etender_id_unique` (`etender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
