-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franchiseindia`
--

-- --------------------------------------------------------

--
-- Table structure for table `insights_category`
--

CREATE TABLE `insights_category` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insights_category`
--

INSERT INTO `insights_category` (`id`, `catname`, `status`, `slug`) VALUES
(1, 'Fashion & Retail', 1, 'fashion-retail'),
(2, 'Food & Beverage', 1, 'food-beverage'),
(3, 'Beauty & Wellness', 1, 'beauty-wellness'),
(4, 'Hospitals & Clinics', 1, 'hospitals-clinics'),
(5, 'Retail', 1, 'retail'),
(6, 'Automobile', 1, 'automobile'),
(7, 'Fuel & Energy', 1, 'fuel-energy'),
(8, 'Rental Services', 1, 'rental-services'),
(9, 'Education & Training', 1, 'education-training'),
(10, 'Child & Elderly care', 1, 'child-elderly-care'),
(11, 'Leisure & Entertainment', 1, 'leisure-entertainment'),
(12, 'Pet Grooming & Supplies', 1, 'pet-grooming-supplies'),
(13, 'Financial Services & Banks', 1, 'financial-services-banks'),
(14, 'Department & Grocery', 1, 'department-grocery'),
(15, 'Lifestyle Home & Furnishing', 1, 'lifestyle-home-furnishing'),
(16, 'Luxury Retail', 1, 'luxury-retail'),
(17, 'Master Franchise', 1, 'master-franchise'),
(18, 'Mergers & Acquisitions', 1, 'mergers-acquisitions'),
(19, 'International Brand', 1, 'international-brand'),
(20, 'Specialty Retail Electronics', 1, 'specialty-retail-electronics'),
(21, 'Diagnostics', 1, 'diagnostics'),
(22, 'Logistics', 1, 'logistics'),
(23, 'E-commerce', 1, 'e-commerce'),
(24, 'Digital', 1, 'digital'),
(25, 'Trends', 1, 'trends'),
(26, 'Tech', 1, 'tech'),
(27, 'Investment & Funding', 1, 'investment-funding'),
(29, 'Services', 1, 'services'),
(30, 'More', 1, 'more'),
(31, 'Business Ideas', 1, 'business-ideas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insights_category`
--
ALTER TABLE `insights_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insights_category`
--
ALTER TABLE `insights_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
