-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 08:09 AM
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
-- Database: `sports_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `requirements_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('approve','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `requirements_id`, `name`, `status`) VALUES
(9, 5, 'leif nazario', 'approve'),
(10, 6, 'Albert Alias', 'approve'),
(14, 4, 'Justin randolf Arroyo', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `sport_category` varchar(255) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `bmi` decimal(5,2) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `health_protocol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `first_name`, `last_name`, `student_id`, `gender`, `sport_category`, `height`, `weight`, `bmi`, `phone_number`, `health_protocol`) VALUES
(4, 'Justin randolf', 'Arroyo', '1-234567', 'male', 'Basketball', 167.00, 55.00, 19.72, '097264872622', 'None'),
(5, 'leif', 'nazario', '1-222222', 'male', 'volleyball', 167.00, 57.00, 20.44, '0988888888', 'none'),
(6, 'Albert', 'Alias', '1-2333443', 'male', 'Basketball', 167.00, 59.00, 21.16, '0923726482', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(11) NOT NULL,
  `sport_name` varchar(255) NOT NULL,
  `positions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_name`, `positions`) VALUES
(9, 'volleyball', ''),
(16, 'Basketball', 'Point Guard, Shooting Guard, Small Forward, Power Forward, Center');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `student_no` varchar(50) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `bmi` decimal(4,2) DEFAULT NULL,
  `bloodtype` enum('A','B','AB','O') DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','coordinator','student','coach') NOT NULL DEFAULT 'student',
  `gender` enum('male','female','other') DEFAULT NULL,
  `civil_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `sports_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `middle_initial`, `student_no`, `weight`, `height`, `bmi`, `bloodtype`, `phone_no`, `email`, `password`, `user_type`, `gender`, `civil_status`, `profile_photo`, `sports_id`) VALUES
(1, 'Lleve', 'Shelalin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@edu.ph', '$2y$10$2ey6fmYSA4xnxIPVp2qRG.Gqt1k1BdGNF7fvBR1835GpQfSSABtVq', 'admin', 'female', 'married', NULL, NULL),
(7, 'Perez', 'Jerome', '', NULL, NULL, NULL, NULL, NULL, '', 'coor@edu.ph', '$2y$10$zpyfExl.dISoTv65SkzIzOgQsxw/ON3YgLwjnwRB3osJcuhe3yE6u', 'coordinator', 'male', 'single', NULL, NULL),
(19, 'Pablo', 'Lucas', 'g', NULL, NULL, NULL, NULL, NULL, '09068377106', 'admin@edu.ph', '$2y$10$oTCH5JsNxJ3rsTuaz8nYpeiuio/.vAmCz3aCbwLC3Gh8uWrf46.6K', 'coach', 'male', NULL, NULL, NULL),
(20, 'hernandez', 'tania', 'g', NULL, NULL, NULL, NULL, NULL, '09369007677', 'admin@edu.ph', '$2y$10$nmusI3hoZX7s8Y9.YhGKZOLVovcKwZ4KhQzlllSQJ0LRHK0dYRcUG', 'coach', 'male', NULL, NULL, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_id` (`requirements_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sports_id` (`sports_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`requirements_id`) REFERENCES `requirements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_sports` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sports_id` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
