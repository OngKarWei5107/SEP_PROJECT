-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 03:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dercs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accID` int(11) NOT NULL,
  `accType` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accID`, `accType`, `email`, `password`) VALUES
(1, 'staff', 'staff1@gmail.com', '11111111'),
(2, 'staff', 'staff2@gmail.com', '22222211'),
(3, 'rider ', 'rider1@gmail.com', 'password1'),
(4, 'rider ', 'rider2@gmail.com', 'password2'),
(5, 'rider ', 'rider3@gmail.com', '12121212'),
(6, 'rider ', 'rider4@gmail.com', '121212121'),
(7, 'rider ', 'rider5@gmail.com', '24234242'),
(8, 'customer', 'issac@gmail.com', 'hahahaha'),
(14, 'customer', 'adam101.lky@gmail.com', '111');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `phone`, `address`) VALUES
(8, 'Issac L', '0123456987', 'UMP'),
(14, 'Lim Kar Yaw', '111', '15-01 lorong perai utama 8,');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_ID` int(11) NOT NULL,
  `rider_name` varchar(100) NOT NULL,
  `rider_contact` varchar(20) NOT NULL,
  `rider_photo` varchar(50) NOT NULL,
  `rider_platNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_ID`, `rider_name`, `rider_contact`, `rider_photo`, `rider_platNo`) VALUES
(3, 'Ali', '0128374921', 'Ali.png', 'NCH1029'),
(4, 'Muthu', '0168124965', 'Muthu.png', 'MCQ2049'),
(5, 'Ah Hock', '0198371039', 'Hock.png', 'GHR2019'),
(6, 'Mari', '0173648224', 'Mari.png', 'DHS2039'),
(7, 'Beli', '0121029456', 'Beli.png', 'DST5639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD KEY `cus_ID` (`custID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_ID`),
  ADD KEY `rider_ID` (`rider_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `account` (`accID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rider`
--
ALTER TABLE `rider`
  ADD CONSTRAINT `rider_ibfk_1` FOREIGN KEY (`rider_ID`) REFERENCES `account` (`accID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
