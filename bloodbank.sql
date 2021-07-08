-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 05:25 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

CREATE TABLE `blood_request` (
  `request_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`request_id`, `receiver_id`, `bloodgroup`, `hospital_id`) VALUES
(18, 4, 'O+', 2),
(19, 1, 'A-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_address` varchar(350) NOT NULL,
  `hospital_city` varchar(150) NOT NULL,
  `hospital_email` varchar(150) NOT NULL,
  `hospital_phone` varchar(13) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `hospital_name`, `hospital_address`, `hospital_city`, `hospital_email`, `hospital_phone`, `created`, `updated`) VALUES
(1, 'Appollo', 'Acharjya vihar', 'Bhubaneswar', 'appollo@gmail.com', '1234567890', NULL, '2021-07-07 11:17:03'),
(2, 'Aiims', 'Aiims campus', 'Bhubaneswar', 'aiims@gmail.com', '9437250948', '2021-07-07 11:24:23', '2021-07-08 04:38:23'),
(4, 'SUM', 'khandagiri', 'bhubneswar', 'sum@gmail.com', '07849073455', '2021-07-08 12:18:02', '2021-07-08 12:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_bloodbank`
--

CREATE TABLE `hospital_bloodbank` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `units` int(11) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_bloodbank`
--

INSERT INTO `hospital_bloodbank` (`id`, `hospital_id`, `bloodgroup`, `units`, `add_on`) VALUES
(1, 1, 'B+', 500, '2021-07-08 07:45:25'),
(4, 2, 'A-', 43, '2021-07-08 14:48:50'),
(5, 4, 'AB+', 499, '2021-07-08 12:20:18'),
(6, 1, 'AB-', 15, '2021-07-08 14:31:54'),
(7, 2, 'O+', 24, '2021-07-08 14:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `phone`, `password`, `role`) VALUES
(1, 'divyam@gmail.com', '9658012616', '$2y$10$pOpHyPRNPRme.pqBmK7hdujqwGXBC45XKBXzx0aZyaxJcfw.tCJ4C', 'Receiver'),
(2, 'appollo@gmail.com', '1234567890', '$2y$10$4B5TVJFt0.6MetHXhTdw.uDkFs4ag7w1JgjM3vCCizAozA3GeZZ7m', 'Hospital'),
(4, 'aiims@gmail.com', '9437250948', '$2y$10$EcFZ2t3GF1o5j19dJVSDee6ggTypTVxlEkXNr0OP3SGcBnTFBgahu', 'Hospital'),
(6, 'sum@gmail.com', '07849073455', '$2y$10$JXCHk6F5.EGq.bLebh3IoOr7t0WQlmwLElBWUH2KXcpfPC45BG.sG', 'Hospital'),
(7, 'internshalla@gmail.com', '9632587410', '$2y$10$KyAgWUuJhdfktlt38uJbKeuiIiY.VZbkjpyIECKbsi08xJ3446RQK', 'Receiver');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `receiver_name` varchar(250) NOT NULL,
  `receiver_email` varchar(250) NOT NULL,
  `receiver_phone` varchar(13) NOT NULL,
  `receiver_aadhar` varchar(12) NOT NULL,
  `receiver_bloodgroup` varchar(3) NOT NULL,
  `request_status` int(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `receiver_name`, `receiver_email`, `receiver_phone`, `receiver_aadhar`, `receiver_bloodgroup`, `request_status`, `created`) VALUES
(1, 'Divyam', 'divyam@gmail.com', '9658012616', '123456789012', 'A-', 1, '2021-07-08 14:48:50'),
(4, 'Internshalla', 'internshalla@gmail.com', '9632587410', '963258741014', 'O+', 1, '2021-07-08 14:48:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_bloodbank`
--
ALTER TABLE `hospital_bloodbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_request`
--
ALTER TABLE `blood_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hospital_bloodbank`
--
ALTER TABLE `hospital_bloodbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
