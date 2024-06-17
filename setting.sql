-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 02:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handymanservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `copyright` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `fax` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alternate_email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `fabout` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `flogo` text NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `fb_link` longtext NOT NULL,
  `tw_link` longtext NOT NULL,
  `lnkd_link` longtext NOT NULL,
  `ptrs_link` longtext NOT NULL,
  `baha_link` longtext NOT NULL,
  `required_subscription` int(11) NOT NULL COMMENT 'required_subscription value  =  0 (Subscription Not Required)\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n required_subscription value  =  1 (Subscription Required)',
  `created_date` datetime DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `website_name`, `copyright`, `phone`, `fax`, `email`, `alternate_email`, `address`, `fabout`, `logo`, `flogo`, `favicon`, `fb_link`, `tw_link`, `lnkd_link`, `ptrs_link`, `baha_link`, `required_subscription`, `created_date`, `update_date`) VALUES
(1, 'Handyman Services', '', 9517779919, 0, 'info@handymanservices.com', '', '<p><strong>Corporate HQ:</strong> 231 E. Alessandro Blvd, Ste A-438, Riverside, CA 92508 USA.</p>\r\n\r\n<p><strong>Branch Office:</strong> No.826, Abeokuta Expressway Alakuko, Lagos</p>\r\n', 'Reach the source - handymanservices.com', '557_handyman-services-logo.png', '4461_handyman-services-logo.jpg', '9464_handyman-services-fabicon.png', 'https://www.facebook.com/handymanservices', 'https://twitter.com/handymanservices', 'https://www.linkedin.com/company/handymanservices/about/', 'https://www.pinterest.com/afrebay', '', 0, '2021-11-03 18:14:59', '2024-06-14 11:14:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
