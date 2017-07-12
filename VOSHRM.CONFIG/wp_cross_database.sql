-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 05:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_cross_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `person_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `person_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `person_contact` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `product_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Basic',
  `message` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `application_route` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `application_database` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `application_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `company_name`, `person_name`, `person_email`, `person_contact`, `product_type`, `message`, `application_route`, `application_database`, `application_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'makaroni ngehe', 'Reza Luthfiansyah', 'reza.luthfiansyah@gmail.com', '62 85811144669', 'Enterprise', '<p>bla bla bla</p>\n', 'http://#', 'makaroni-ngehe', 'Published', NULL, NULL, NULL),
(3, 'AVIP Interior', 'AVIP Interior', 'info@avip.com', '021 353535', 'Basic', '<p>bla bla bla</p>\n', 'http://#', 'AVIP-Interior', 'Published', NULL, NULL, NULL),
(4, 'Telkom', 'Reza Luthfiansyah', 'reza.luthfiansyah@gmail.com', '858 11144669', 'Mid-Size', '<p>test telkom</p>\n', 'http://#', 'Telkom', 'Published', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auto_reply_contact`
--

CREATE TABLE `auto_reply_contact` (
  `ID` int(11) NOT NULL,
  `person_name` varchar(50) DEFAULT NULL,
  `person_email` varchar(50) DEFAULT NULL,
  `person_contact` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `message` longtext,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto_reply_contact`
--

INSERT INTO `auto_reply_contact` (`ID`, `person_name`, `person_email`, `person_contact`, `company_name`, `product_type`, `message`, `status`) VALUES
(1, 'Joshua', 'joshua.hutasoit@ikonsultan.com', '088888881111', 'PT IKON', 'Coba', 'Apa ajaa', 0),
(2, 'Tami', 'ahmad.utami', '081122223333', 'PT Telkom', 'Basic', 'Coba', 1),
(3, 'bayu yakti', 'bayuyakti@gmail.com', '123 123123', 'ikon', NULL, NULL, 1),
(4, 'Test', 'gerald85joshua@gmail.com', NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_reply_contact`
--
ALTER TABLE `auto_reply_contact`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `auto_reply_contact`
--
ALTER TABLE `auto_reply_contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
