-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 02:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `event_name` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reg_fees` int(11) NOT NULL,
  `reg_last_date` date DEFAULT NULL,
  `prize_money` int(11) NOT NULL,
  `link` varchar(50) NOT NULL,
  `sport_details` text NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `username`, `event_name`, `start_date`, `end_date`, `reg_fees`, `reg_last_date`, `prize_money`, `link`, `sport_details`, `address`) VALUES
(1, 'Indira1234', 'Summit', '2019-09-14', '2019-09-18', 1500, '2019-09-10', 50000, 'summit.mitwpu.edu.in', 'Summit is a National level inter engineering sports event. Events include basketball, volleyball, cricket, football.', 'MITWPU - Pune 411038'),
(2, 'Indira1234', 'Summit', '2019-09-14', '2019-09-18', 1500, '2019-09-10', 50000, 'summit.mitwpu.edu.in', 'Summit is a National level inter engineering sports event. Events include basketball, volleyball, cricket, football.', 'MITWPU - Pune 411038');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  `college_city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pwd`, `college_name`, `college_city`) VALUES
('Indira', '$2y$10$xXMwqj5LFJM25f8gTQqtq.R00Sd5UZ1YWfrNYxmpdak42HF.Djop.', 'wpu', 'Ambejogai'),
('Indira1234', '$2y$10$SwqlSOLfr1UvhhxMWhwiuu45e5zA1F73Zs01dGBqPEXj.3qxj3oYW', 'wpu', 'Pune');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
