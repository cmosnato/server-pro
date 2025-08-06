-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 12:37 PM
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
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE Form (
  `id` int(11) NOT NULL,
  `fname` VARCHAR(255) DEFAULT NULL,
  `lname` VARCHAR(255) DEFAULT NULL,
  `Nameeng` VARCHAR(255) DEFAULT NULL,
  `gender` ENUM('male', 'female') DEFAULT NULL,
  `job` VARCHAR(255) DEFAULT NULL,
  `salary` DECIMAL(10, 2) DEFAULT NULL,
  `salary_period` ENUM('month', 'one') DEFAULT NULL,
  `address_no` INT DEFAULT NULL,
  `address_group` INT DEFAULT NULL,
  `address_road` VARCHAR(255) DEFAULT NULL,
  `address_district` VARCHAR(255) DEFAULT NULL,
  `address_county` VARCHAR(255) DEFAULT NULL,
  `address_province` VARCHAR(255) DEFAULT NULL,
  `address_postalcode` INT DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `current_address_no` INT DEFAULT NULL,
  `current_address_group` INT DEFAULT NULL,
  `current_address_road` VARCHAR(255) DEFAULT NULL,
  `current_address_district` VARCHAR(255) DEFAULT NULL,
  `current_address_county` VARCHAR(255) DEFAULT NULL,
  `current_address_province` VARCHAR(255) DEFAULT NULL,
  `current_address_postalcode` INT DEFAULT NULL,
  `phone_home` VARCHAR(15) DEFAULT NULL,
  `phone_mobile` VARCHAR(15) DEFAULT NULL,
  `who_at_home` ENUM('atfamily', 'myhome', 'renthouse', 'dorm', 'others') DEFAULT NULL,
  `who_at_home_others` VARCHAR(255) DEFAULT NULL,
  `birthday` DATE DEFAULT NULL,
  `age` INT DEFAULT NULL,
  `height` DECIMAL(5, 2) DEFAULT NULL,
  `weight` DECIMAL(5, 2) DEFAULT NULL,
  `nationality` VARCHAR(255) DEFAULT NULL,
  `ethnicity` VARCHAR(255) DEFAULT NULL,
  `religion` VARCHAR(255) DEFAULT NULL,
  `id_card_no` VARCHAR(20) DEFAULT NULL,
  `id_card_place` VARCHAR(255) DEFAULT NULL,
  `id_card_expiry` DATE DEFAULT NULL,
  `taxpayer_id` VARCHAR(20) DEFAULT NULL,
  `social_security_id` VARCHAR(20) DEFAULT NULL,
  `military_condition` ENUM('except', 'release', 'qualifiedmilitary') DEFAULT NULL,
  `qualified_military_year` INT DEFAULT NULL,
  `marital_status` ENUM('single', 'marry', 'widowed', 'divorce') DEFAULT NULL,
  `marital_registration` ENUM('enroll', 'notenroll') DEFAULT NULL,
  `spouse_name` VARCHAR(255) DEFAULT NULL,
  `spouse_job` VARCHAR(255) DEFAULT NULL,
  `spouse_position` VARCHAR(255) DEFAULT NULL,
  `children_count` INT DEFAULT NULL,
  `studying_children_count` INT DEFAULT NULL,
  `not_studying_children_count` INT DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO Form (
    `id`, `fname`, `lname`, `Nameeng`, `gender`, `job`, `salary`, `salary_period`, 
    `address_no`, `address_group`, `address_road`, `address_district`, 
    `address_county`, `address_province`, `address_postalcode`, `email`, 
    `current_address_no`, `current_address_group`, `current_address_road`, 
    `current_address_district`, `current_address_county`, `current_address_province`, 
    `current_address_postalcode`, `phone_home`, `phone_mobile`, 
    `who_at_home`, `who_at_home_others`, `birthday`, `age`, `height`, 
    `weight`, `nationality`, `ethnicity`, `religion`, `id_card_no`, 
    `id_card_place`, `id_card_expiry`, `taxpayer_id`, `social_security_id`, 
    `military_condition`, `qualified_military_year`, `marital_status`, 
    `marital_registration`, `spouse_name`, `spouse_job`, `spouse_position`, 
    `children_count`, `studying_children_count`, `not_studying_children_count`
) VALUES (
    1, 'สมชาย', 'ใจดี', 'Somchai', 'male', 'วิศวกร', 30000, 'month',
    123, 1, 'ถนนพหลโยธิน', 'ห้วยขวาง', 'ห้วยขวาง', 'กรุงเทพมหานคร', 10310, 
    'somchai@example.com', 123, 1, 'ถนนสุขุมวิท', 'คลองตัน', 
    'คลองเตย', 'กรุงเทพมหานคร', 10110, '02-123-4567', '080-123-4567', 
    'atfamily', NULL, '1990-01-01', 34, 175.5, 
    70.0, 'ไทย', 'ไทย', 'พุทธ', '1234567890123', 
    'กรุงเทพมหานคร', '2030-01-01', '1234567890', '1234567890', 
    'except', NULL, 'marry', 'enroll', 'นางสาวสมหญิง', 
    'พยาบาล', 'หัวหน้าพยาบาล', 2, 1, 1
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `Form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `Form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
