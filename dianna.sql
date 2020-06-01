-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 01:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ver1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `tno` int(11) NOT NULL,
  `aoi` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `creator` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tno`, `aoi`, `status`, `title`, `description`, `start`, `end`, `creator`) VALUES
(19, 'CLO', 0, 'Uniform tender', 'Lorem Ipsum \r\nDolor Sit Amet', '2020-06-01', '2020-06-04', 'gunjan'),
(20, 'FUR', 0, 'Furniture tender', 'gamma alpha beta\r\n', '2020-06-13', '2020-06-23', 'gunjan'),
(21, 'FUR', 0, 'abc', 'asssff', '2020-06-06', '2020-06-19', 'gunjan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`tno`),
  ADD KEY `fk` (`creator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tender`
--
ALTER TABLE `tender`
  ADD CONSTRAINT `fk` FOREIGN KEY (`creator`) REFERENCES `requester` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
