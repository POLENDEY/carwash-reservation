-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 04:16 PM
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
-- Database: `carwash_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `given_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `surname`, `given_name`, `user_name`, `password`, `date`) VALUES
(1, 767291557489284677, 'Polendey ', 'John Paul', 'admin', '54321', '2023-09-27 12:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `arrival_date` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_name`, `brand`, `contact_number`, `arrival_date`, `date_created`) VALUES
(1, 'ewqeq', 'ewqewq', 123, '2023-10-06 17:54:00', '2023-10-06'),
(2, 'JASPER MACAREAG', 'TOYOTA', 21, '2023-10-06 18:02:00', '2023-10-06'),
(3, 'ira', 'mitsubishi', 2147483647, '2023-10-06 18:03:00', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `given_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `surname`, `given_name`, `user_name`, `password`, `date`) VALUES
(1, 580365, 'Dey Polen', 'Pao Pao', 'johnpaul', '54321', '2023-09-27 04:50:44'),
(10, 98074359331849136, '', '', 'admin', '54321', '2023-09-27 12:16:54'),
(11, 80352, 'senpai', 'kazu', 'shesh', 'ywgagssgssgsg', '2023-09-27 12:20:29'),
(3, 729411327962404486, 'Peter', 'Parker', 'peterparker', '54321', '2023-09-27 05:33:04'),
(8, 3099735909003, 'Polendey ', 'John Paul', 'admin1', '54321', '2023-09-27 11:51:20'),
(12, 5692947519188693877, 'Leoligao ', 'warren', 'warren', '54321', '2023-09-30 05:39:01'),
(13, 3213179, 'macaraeg', 'jasper', 'mjasper30', '123', '2023-10-06 09:18:34'),
(14, 23137198321, 'magbanua', 'ira', 'ira', '123', '2023-10-06 09:18:30'),
(15, 754054459, 'test', 'test', 'test', '123', '2023-10-06 09:10:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`),
  ADD KEY `surname` (`surname`),
  ADD KEY `given_name` (`given_name`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `surname` (`surname`),
  ADD KEY `given_name` (`given_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
