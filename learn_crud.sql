-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 04:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `crudtable`
--

CREATE TABLE `crudtable` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `mobilenumber` bigint(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crudtable`
--

INSERT INTO `crudtable` (`id`, `firstname`, `lastname`, `mobilenumber`, `email`, `address`, `creationdate`) VALUES
(1, 'Verna ', 'Cailo Lobrino', 11119887867233, 'vernL@vern.com', 'Sta. Margarita Samar Magsuhong', '2023-08-17 08:12:21'),
(4, 'example-2', 'sample-2', 1235, 'example-2@example.com', 'calbayog', '2023-06-07 09:58:10'),
(5, 'example-3', 'sample-3', 1345667, 'example-3@example.com', 'calbayog', '2023-06-07 09:58:45'),
(12, 'Michael jeff', 'caber', 344554556, 'cel@cel.com', 'brgy. aguit itan', '2023-06-16 02:58:42'),
(13, 'student-1', 'student', 324343, 'student-1@student-1.com', 'calbayog', '2023-06-16 02:59:21'),
(14, 'student-2', 'student', 9223372036854775807, 'student-2@student-2.com', 'magsuhong', '2023-06-16 02:59:52'),
(15, 'student-3', 'student', 4554545, 'student-3@student-3.com', 'brgy. aguit itan', '2023-06-16 03:00:30'),
(16, 'student-', 'student-4', 35546556, 'student-4@student-4.com', 'calbayog', '2023-06-16 03:07:28'),
(20, 'example_001', 'sample', 90887798, 'sample@sample.com', 'brgyaddress', '2023-08-21 11:17:19'),
(21, 'example_002', 'sample', 566576, 'sample@sample.com', 'brgy', '2023-08-21 11:59:45'),
(22, 'example_003', 'sample', 44545443, 'sample@sample.com', 'brgy', '2023-08-21 12:00:43'),
(23, 'example_04', 'sample', 872374, 'sample@sample.com', 'brgyaddress', '2023-08-21 12:01:27'),
(24, 'example_05', 'sample', 344534, 'sample@sample.com', 'brgy', '2023-08-21 12:01:53'),
(25, 'jeffy', 'michael', 9638388, 'jeff@jeff.com', 'napalisan', '2023-08-27 05:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '123123'),
(2, 'michael', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crudtable`
--
ALTER TABLE `crudtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crudtable`
--
ALTER TABLE `crudtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
