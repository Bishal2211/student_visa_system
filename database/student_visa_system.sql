-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 10:47 AM
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
-- Database: `student_visa_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `min_gpa` decimal(3,2) DEFAULT NULL,
  `min_ielts` decimal(3,1) DEFAULT NULL,
  `estimated_cost` decimal(10,2) DEFAULT NULL,
  `visa_success_rate` int(11) DEFAULT NULL,
  `part_time_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `min_gpa`, `min_ielts`, `estimated_cost`, `visa_success_rate`, `part_time_hours`) VALUES
(1, 'Canada', 3.00, 6.5, 2000000.00, 85, 20),
(2, 'UK', 2.80, 6.0, 1800000.00, 80, 20),
(3, 'Australia', 3.20, 6.5, 2200000.00, 75, 24),
(4, 'USA', 3.00, 6.5, 2500000.00, 70, 20),
(5, 'Germany', 2.50, 6.0, 1200000.00, 90, 20),
(6, 'Netherlands', 2.80, 6.5, 2000000.00, 78, 16),
(7, 'Sweden', 2.80, 6.5, 2100000.00, 75, 20);

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gpa` decimal(3,2) DEFAULT NULL,
  `ielts_score` decimal(3,1) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `preferred_country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`profile_id`, `user_id`, `gpa`, `ielts_score`, `budget`, `preferred_country`) VALUES
(1, 1, 3.80, 7.0, 15000000.00, 'Australia'),
(2, 2, 2.00, 6.0, 15000.00, 'usa');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `university_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `university_name` varchar(100) DEFAULT NULL,
  `required_gpa` decimal(3,2) DEFAULT NULL,
  `required_ielts` decimal(3,1) DEFAULT NULL,
  `tuition_fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`university_id`, `country_id`, `university_name`, `required_gpa`, `required_ielts`, `tuition_fee`) VALUES
(1, 1, 'University of Toronto', 3.50, 7.0, 2500000.00),
(2, 1, 'York University', 3.00, 6.5, 2000000.00),
(3, 2, 'University of London', 3.00, 6.5, 1800000.00),
(4, 2, 'University of Manchester', 3.20, 6.5, 2000000.00),
(5, 3, 'University of Melbourne', 3.30, 6.5, 2300000.00),
(6, 4, 'University of Texas', 3.00, 6.5, 2400000.00),
(7, 5, 'Technical University Munich', 2.80, 6.0, 1000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`) VALUES
(1, 'Ismam Ahmed', '0432220005101116@uits.edu.bd', '$2y$10$F0bJOOu9jn4KUbzMv0PnWefCmGijr.ehEGWBrgsKqCLYhs24K5zfG'),
(2, 'bishal ahmed', 'ismama653@gmail.com', '$2y$10$.pOsriNwrGvnUc82.Gv8g.gLEWQnt576RojRq1eVvDohn9gNz.PMW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`university_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
