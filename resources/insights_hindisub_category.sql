-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 09:41 AM
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
-- Table structure for table `insights_hindisub_category`
--

CREATE TABLE `insights_hindisub_category` (
  `id` int(11) NOT NULL,
  `mcat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insights_hindisub_category`
--

INSERT INTO `insights_hindisub_category` (`id`, `mcat_id`, `subcat_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'परिधान', 'apparel', '2024-12-11 14:36:37', '2024-12-12 14:07:37'),
(2, 1, 'जूते', 'footwear', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(3, 1, 'खेल परिधान', 'sportswear', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(4, 1, 'अवकाश परिधान', 'leisure-wear', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(5, 1, 'अंतर्वस्त्र', 'innerwear', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(6, 2, 'क्यूएसआर (त्वरित सेवा रेस्तरां)', 'qsr', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(7, 2, 'फाइन डाइन', 'fine-dine', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(8, 2, 'कैफे', 'cafe', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(9, 2, 'क्लाउड किचन', 'cloud-kitchen', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(10, 2, 'टेकअवे', 'takeaway', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(11, 2, 'विशेष रेस्तरां', 'specialty-restaurant', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(12, 2, 'शेक्स', 'shakes', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(13, 2, 'रोल्स', 'rolls', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(14, 3, 'सैलून', 'salon', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(15, 3, 'स्पा', 'spas', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(16, 3, 'नेल सैलून', 'nail-salon', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(17, 3, 'सौंदर्य रिटेल', 'beauty-retail', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(18, 4, 'विशेष क्लीनिक', 'specialty-clinics', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(19, 4, 'दंत चिकित्सक', 'dentist', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(20, 4, 'आयुर्वेद', 'ayurveda', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(21, 4, 'होम्योपैथी', 'homeopathy', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(22, 5, 'फूल रिटेल', 'flower-retail', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(23, 5, 'स्टेशनरी', 'stationery', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(24, 5, 'पुस्तकालय', 'bookstore', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(25, 5, 'स्टोर लॉन्च', 'store-launch', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(26, 6, 'कार सेवाएं', 'car-services', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(27, 6, 'ऑटोमोबाइल रिटेल', 'automobile-retail', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(28, 6, 'प्री-ओन्ड (पुरानी कार एजेंसी)', 'pre-owned', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(29, 6, 'एजेंसी', 'car-agency', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(30, 6, 'इलेक्ट्रिक वाहन', 'ev', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(31, 6, 'ईवी स्टेशन', 'ev-stations', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(32, 7, 'बायोगैस', 'biogas', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(33, 7, 'पेट्रोल पंप', 'petrol-pump', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(34, 8, 'कार रेंटल', 'car-rental', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(35, 8, 'फैशन रेंटल', 'fashion-rental', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(36, 9, 'के-12 (विद्यालय शिक्षा)', 'k-12', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(37, 9, 'प्री-स्कूल', 'pre-school', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(38, 9, 'आफ्टर स्कूल', 'after-school', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(39, 9, 'व्यावसायिक प्रशिक्षण', 'vocational', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(40, 9, 'कौशल प्रशिक्षण', 'skill-training', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(41, 10, 'रोगी देखभाल', 'patient-care', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(42, 11, 'एजुटेनमेंट', 'edutainment', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(43, 11, 'ट्रैम्पोलिन पार्क्स', 'trampoline-parks', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(44, 11, 'थिएटर', 'theatres', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(45, 12, 'पालतू सैलून', 'pet-salons', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(46, 12, 'पालतू रिटेल', 'pet-retail', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(47, 12, 'पशु चिकित्सक', 'veterinary-doctors', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(48, 21, 'डायग्नोस्टिक लैब्स', 'diagnostics-labs', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(49, 21, 'कलेक्शन सेंटर', 'collection-centres', '2024-12-11 14:36:37', '2024-12-12 14:10:14'),
(50, 16, 'फूल रिटेल', 'flower-retail', '2024-12-11 14:36:37', '2024-12-12 14:10:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insights_hindisub_category`
--
ALTER TABLE `insights_hindisub_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insights_hindisub_category`
--
ALTER TABLE `insights_hindisub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
