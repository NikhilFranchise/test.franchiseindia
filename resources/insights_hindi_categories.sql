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
-- Table structure for table `insights_hindi_categories`
--

CREATE TABLE `insights_hindi_categories` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insights_hindi_categories`
--

INSERT INTO `insights_hindi_categories` (`id`, `catname`, `status`, `slug`) VALUES
(1, 'फैशन और रिटेल', 1, 'fashion-retail'),
(2, 'खाद्य और पेय', 1, 'food-beverage'),
(3, 'सौंदर्य एवं स्वास्थ्य', 1, 'beauty-wellness'),
(4, 'अस्पताल-क्लिनिक', 1, 'hospitals-clinics'),
(5, 'रिटेल', 1, 'retail'),
(6, 'ऑटोमोबाइल', 1, 'automobile'),
(7, 'ईंधन और ऊर्जा', 1, 'fuel-energy'),
(8, 'किराये की सेवाएं', 1, 'rental-services'),
(9, 'शिक्षा और प्रशिक्षण', 1, 'education-training'),
(10, 'बच्चों एवं बुजुर्गों की देखभाल', 1, 'child-elderly-care'),
(11, 'फुरसत और मनोरंजन', 1, 'leisure-entertainment'),
(12, 'पालतू जानवरों की देखभाल और आपूर्ति', 1, 'pet-grooming-supplies'),
(13, 'वित्तीय सेवाएँ और बैंक', 1, 'financial-services-banks'),
(14, 'विभाग-किराना', 1, 'department-grocery'),
(15, 'जीवनशैली घर और साज-सज्जा', 1, 'lifestyle-home-furnishing'),
(16, 'विलासितापूर्ण खुदरा', 1, 'luxury-retail'),
(17, 'मास्टर फ्रेंचाइजी', 1, 'master-franchise'),
(18, 'विलय व अधिग्रहण', 1, 'mergers-acquisitions'),
(19, 'अंतर्राष्ट्रीय अवसर', 1, 'international-brand'),
(20, 'विशेष खुदरा इलेक्ट्रॉनिक्स', 1, 'specialty-retail-electronics'),
(21, 'निदान', 1, 'diagnostics'),
(22, 'रसद', 1, 'logistics'),
(23, 'ई-कॉमर्स', 1, 'e-commerce'),
(24, 'डिजिटल', 1, 'digital'),
(25, 'प्रवृत्तियों', 1, 'trends'),
(26, 'तकनीक', 1, 'tech'),
(27, 'निवेश और वित्तपोषण', 1, 'investment-funding'),
(29, 'सेवाएं', 1, 'services'),
(30, 'अधिक\r\n', 1, 'more\r\n'),
(31, 'व्यवसाय विचार', 1, 'business-ideas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insights_hindi_categories`
--
ALTER TABLE `insights_hindi_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insights_hindi_categories`
--
ALTER TABLE `insights_hindi_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
