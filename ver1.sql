-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 03:58 PM
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
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bno` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `tno` int(11) DEFAULT NULL,
  `bidder` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bno`, `amount`, `description`, `subject`, `tno`, `bidder`) VALUES
(52, 5000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec enim diam vulputate ut pharetra sit amet aliquam. Est velit egestas dui id ornare arcu odio ut sem. Varius duis at consectetur lorem donec massa. Pellentesque elit eget gravida cum sociis natoque penatibus et magnis. Nulla facilisi cras fermentum odio eu feugiat pretium nibh. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Donec massa sapien faucibus et molestie ac feugiat sed. Euismod in pellentesque massa placerat duis ultricies. Ultrices dui sapien eget mi proin sed libero enim sed. Sit amet luctus venenatis lectus magna.', 'Subject 001:- IDK what to type here', 32, 'DB_Shirts'),
(67, 5750, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitant morbi tristique senectus et netus et. Lobortis elementum nibh tellus molestie nunc non blandit massa. Aenean et tortor at risus viverra adipiscing at. Mauris rhoncus aenean vel elit scelerisque mauris. Dolor sit amet consectetur adipiscing. At quis risus sed vulputate. Sit amet massa vitae tortor condimentum. At erat pellentesque adipiscing commodo. Justo nec ultrices dui sapien eget mi proin sed. Donec ultrices tincidunt arcu non sodales neque sodales ut etiam. Dui faucibus in ornare quam viverra orci. Mauris nunc congue nisi vitae. A diam sollicitudin tempor id. Pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada. Aliquet enim tortor at auctor urna nunc. Mollis aliquam ut porttitor leo a diam sollicitudin tempor id. Bibendum arcu vitae elementum curabitur. Mauris ultrices eros in cursus turpis. Odio tempor orci dapibus ultrices in.', 'BOND... JAMES BOND... BOOM... bang!!', 32, 'DB_Shirts');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `aoi` varchar(200) DEFAULT '',
  `bio` varchar(200) DEFAULT 'Service provider'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`username`, `password`, `mobile`, `email`, `aoi`, `bio`) VALUES
('DB_Shirts', 'db_shirts', '8340393393', 'gkr5432155@gmail.com', 'CLO,FUR', 'Service provider');

-- --------------------------------------------------------

--
-- Table structure for table `requester`
--

CREATE TABLE `requester` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requester`
--

INSERT INTO `requester` (`username`, `password`, `mobile`, `email`) VALUES
('gunjan', 'gunjan', '8340393391', 'gkr5432145@gmail.com');

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
  `creator` varchar(20) DEFAULT NULL,
  `tandc` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tno`, `aoi`, `status`, `title`, `description`, `start`, `end`, `creator`, `tandc`) VALUES
(29, 'CLO', 0, 'School uniform tender', 'Lorem ipsum', '2020-05-29', '2020-06-01', 'gunjan', 'Dolor sit amet'),
(30, 'CLO', 1, 'Second Uniform Tender', 'aaa', '2020-06-01', '2020-06-04', 'gunjan', 'vvvv'),
(31, 'FUR', 1, 'Test03 another tender', 'anndn', '2020-06-04', '2020-06-12', 'gunjan', 'ssmdvm'),
(32, 'FUR', 1, 'Guest House furniture', 'snnfnv', '2020-06-01', '2020-06-16', 'gunjan', 'fbbfmkm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bno`),
  ADD KEY `bidder` (`bidder`),
  ADD KEY `tno` (`tno`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `requester`
--
ALTER TABLE `requester`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`bidder`) REFERENCES `provider` (`username`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`tno`) REFERENCES `tender` (`tno`);

--
-- Constraints for table `tender`
--
ALTER TABLE `tender`
  ADD CONSTRAINT `fk` FOREIGN KEY (`creator`) REFERENCES `requester` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
