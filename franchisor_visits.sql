-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 05:43 AM
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
-- Database: `franchis_franchisnewcopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `franchisor_visits`
--

CREATE TABLE `franchisor_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `franchisor_id` varchar(255) NOT NULL,
  `record_date` text DEFAULT NULL,
  `total` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `franchisor_visits`
--

INSERT INTO `franchisor_visits` (`id`, `franchisor_id`, `record_date`, `total`, `created_at`, `updated_at`) VALUES
(1, 'FIHL137906', '', '1', '2024-08-13 06:51:39', '2024-08-13 06:51:39'),
(2, 'FIHL343626', '', '1', '2024-08-13 06:51:39', '2024-08-13 06:51:39'),
(3, 'FIHL393384', '', '1', '2024-08-13 06:51:39', '2024-08-13 06:51:39'),
(4, 'FIHL655740', '', '2', '2024-08-13 06:51:39', '2024-08-13 06:51:39'),
(5, 'FIHL946257', '', '1', '2024-08-13 06:51:39', '2024-08-13 06:51:39'),
(7, 'FIHL343626', '2024-08-16', '1', NULL, NULL),
(8, 'FIHL343626', '2024-08-16', '1', NULL, NULL),
(9, 'FIHL4308733', '2024-08-16', '1', NULL, NULL),
(10, 'FIHL584455', '2024-08-16', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `franchisor_visits`
--
ALTER TABLE `franchisor_visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `franchisor_visits`
--
ALTER TABLE `franchisor_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
