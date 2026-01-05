-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2025 at 10:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'admin', 'admin@ysango.org', '$2y$10$Tw/cpIV0NZKcGG914.R8VOwIoUrPyrhxZwo.N18WFhwTOVU8Ya5t2', NULL, NULL),
(3, 'admin1', 'admin1@gmail.com', '$2y$10$JGR5QSbFPEFFq32zNFEbS.zeVytSF8PPIEByOifHLOMfFvnjlb8Um', 'f36a4a9685d52c82d254a193b7e87a82d242e2fbb16ef09589bb4a315516f5fc', '2025-10-04 07:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `dn_no` int(11) NOT NULL,
  `dn_txn_id` varchar(255) NOT NULL,
  `mem_id` varchar(50) DEFAULT NULL,
  `donor_name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `dn_tndt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`dn_no`, `dn_txn_id`, `mem_id`, `donor_name`, `amount`, `dn_tndt`) VALUES
(1, 'asd212', 'abc123', '', 122.00, '2025-09-17 12:21:45'),
(2, 'asd21223', 'abc123', '', 120.00, '2025-09-19 07:47:57'),
(3, 'asd2121234', 'abc123', 'mustafa', 900.00, '2025-09-22 19:29:49'),
(4, 'asdfgh12345', 'yash123', 'yash123', 50.00, '2025-09-23 04:40:48'),
(5, 'qwerty1234', 'om123', 'om', 340.00, '2025-09-23 04:41:30'),
(6, 'qwertyu1234567', 'dushyant123', 'dushyant', 12.00, '2025-09-23 04:42:34'),
(8, 'wert234', 'abc123', 'mustafa', 3456.00, '2025-09-25 19:12:27'),
(9, 'asdsa323', 'mm12', 'mustafa', 1000.00, '2025-09-25 19:28:39'),
(13, 'ert456', 'abc123', 'mustafa', 45.00, '2025-09-25 19:37:09'),
(16, 'sdfg23456', NULL, 'shiv', 678.00, '2025-09-25 20:02:16'),
(17, 'sdf2345', 'abc123', 'mustafa', 1234.00, '2025-09-25 20:10:47'),
(18, '2344dfg', 'om123', 'dushyant', 124354.00, '2025-09-25 20:13:46'),
(19, 'nnn111', 'abc123', 'mustad', 1000.00, '2025-09-25 20:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` varchar(50) NOT NULL,
  `mem_nm` varchar(100) NOT NULL,
  `mem_email` varchar(100) NOT NULL,
  `mem_pass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_nm`, `mem_email`, `mem_pass`, `created_at`, `reset_token_hash`, `reset_token_expires_at`) VALUES
('abc123', 'mustafa', 'mustafa@gmail.com', '$2y$10$8DmAVBk4T/kHX7Fin5tNuOSCoazeluiyjMOsm6xo1J1VLGO46Zh1C', '2025-09-25 12:33:07', '5f5a7d48270b1294a36d34285278e0d8c6511abd234561a9952455694065a394', '2025-10-04 07:39:20'),
('abg12', 'abbas ', 'abg@gmail.com', '$2y$10$ZP5blwcNruk7TZCjbHMOjOm3bLyGm.xYxov1VbQUf84OJscOKKBPS', '2025-09-25 12:33:07', NULL, NULL),
('dushyant123', 'dushyant', 'dushyant@gmail.com', '$2y$10$dgxPbX3lP9TkmEoIxmyLq.PELHlod0mNlxk4GePcBGMrQvKQ0xHDu', '2025-09-25 12:33:07', NULL, NULL),
('m123', 'mustafa', 'M@G.C', '$2y$10$j7lphwmP8p4AnNainwnP9OxXBJZGdDCJAuPG88AVpo9W0bIVu0dyG', '2025-09-25 12:33:07', NULL, NULL),
('mm12', 'mm', 'mus@g.c', '$2y$10$V6jc5eJAiNSDD0jZlq8zjela7JLFTcZy4sjDy5XH3BMwR.RC0Kwfu', '2025-09-25 12:33:07', '157353f671e11a6131f3adf96ab7ddd0954c1fd909bda54022d5c4ded858a178', '2025-09-20 18:09:44'),
('om123', 'om', 'om@gmail.com', '$2y$10$NGag57R9H7mShCfxeuH0PuO12FMDlldeNv.8rprrxzMKASRlnnki6', '2025-09-25 12:33:07', NULL, NULL),
('yash123', 'yash123', 'yash@gmail.com', '$2y$10$pueQ1/o2oDOMT6acWiHPDOhfvPiEF8hTDGWqqUar2K.tjY4R8mrtG', '2025-09-25 12:33:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(150) NOT NULL,
  `prog_desc` text NOT NULL,
  `prog_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`prog_id`, `prog_name`, `prog_desc`, `prog_image`) VALUES
(2, 'Education for All', 'A drive to enroll children in schools and provide them with necessary learning materials.', '68d198b053aa3-edu.jpg'),
(3, 'Environmental Cleanup Drive', 'Organizing weekly cleanup activities in local parks and rivers to promote a cleaner environment.', '68d19943ce3cb-env.jpg'),
(4, 'Skill Development Workshop', 'Conducting workshops to teach vocational skills like tailoring, computer basics, and carpentry to empower individuals.', '68d19a5cb0e1a-skill.jpg'),
(5, 'Community Health ', 'organizing weekly health camps in the slums and rural areas ', '68d197d89eb05-commu.jpg'),
(7, 'blood donation', 'blood donation camp for the world blood bank', '68d196cebf21e-blood.jpg'),
(30, 'marathon', 'marathon for collection of money for blood cancer', '68d199c8a4d22-marathon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `reg_id` int(11) NOT NULL,
  `mem_id` varchar(50) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`reg_id`, `mem_id`, `prog_id`, `reg_date`) VALUES
(2, 'abc123', 3, '2025-09-17 11:36:03'),
(3, 'abc123', 4, '2025-09-18 17:55:46'),
(4, 'mm12', 2, '2025-09-20 07:34:25'),
(6, 'mm12', 4, '2025-09-20 07:34:45'),
(7, 'abc123', 7, '2025-09-22 19:31:31'),
(8, 'yash123', 30, '2025-09-23 04:40:33'),
(9, 'om123', 3, '2025-09-23 04:41:14'),
(10, 'dushyant123', 2, '2025-09-23 04:42:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`dn_no`),
  ADD UNIQUE KEY `dn_txn_id` (`dn_txn_id`),
  ADD KEY `mem_id` (`mem_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `mem_email` (`mem_email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`prog_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `prog_id` (`prog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `dn_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `members` (`mem_id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`mem_id`) REFERENCES `members` (`mem_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`prog_id`) REFERENCES `programs` (`prog_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
