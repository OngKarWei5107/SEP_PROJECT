-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 11:50 AM
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
  `username` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accID`, `accType`, `username`, `email`, `password`) VALUES
(1, 'staff', 'staff1', 'staff1@gmail.com', '11111111'),
(2, 'staff', 'staff2', 'staff2@gmail.com', '22222211'),
(3, 'rider', 'rider1', 'rider1@gmail.com', 'password1'),
(4, 'rider', 'rider2', 'rider2@gmail.com', 'password2'),
(5, 'rider', 'rider3', 'rider3@gmail.com', '12121212'),
(6, 'rider', 'rider4', 'rider4@gmail.com', '121212121'),
(7, 'rider', 'rider5', 'rider5@gmail.com', '24234242'),
(8, 'customer', 'issac', 'issac@gmail.com', 'hahahaha'),
(21, 'customer', 'ONG123', 'ongkarwei05107@gmail.com', '123123'),
(23, 'customer', 'KARWEI', 'ongkarwei0510@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `ban` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `username`, `email`, `password`, `phone`, `address`, `ban`) VALUES
(21, 'Karwei', 'ONG123', 'ongkarwei05107@gmail.com', '123123', '', '', 0),
(23, 'Ong', 'KARWEI', 'ongkarwei0510@gmail.com', '123123', '02748471', '123123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryandpickup`
--

CREATE TABLE `deliveryandpickup` (
  `serv_ID` int(11) NOT NULL,
  `cust_ID` int(11) NOT NULL,
  `serv_name` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryandpickup`
--

INSERT INTO `deliveryandpickup` (`serv_ID`, `cust_ID`, `serv_name`, `date`, `time`, `status`) VALUES
(4, 21, 'pickup', '2021-06-30', '28:52:36', ' Success'),
(19, 21, 'delivery', '2021-06-17', '11:48:03', ' Preparing'),
(23, 23, 'delivery', '2021-06-17', '11:48:03', 'pending'),
(24, 21, 'delivery', '2021-06-16', '28:52:36', 'delivered'),
(25, 21, 'pickup', '2021-06-17', '28:52:36', 'pending'),
(26, 23, 'pickup', '2021-06-16', '28:52:36', 'delivered'),
(27, 23, 'pickup', '2021-06-02', '28:52:36', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `type` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `symptom` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `ReqID` int(11) NOT NULL,
  `ReqStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rider_contact` varchar(20) NOT NULL,
  `rider_photo` varchar(50) NOT NULL,
  `rider_platNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_ID`, `username`, `email`, `password`, `rider_contact`, `rider_photo`, `rider_platNo`) VALUES
(3, 'rider1', 'rider1@gmail.com', 'password1', '0128374921', 'Ali.png', 'NCH1029'),
(4, 'rider2', 'rider2@gmail.com', 'password2', '0168124965', 'Muthu.png', 'MCQ2049'),
(5, 'rider3', 'rider3@gmail.com', '12121212', '0198371039', 'Hock.png', 'GHR2019'),
(6, 'rider4', 'rider4@gmail.com', '121212121', '0173648224', 'Mari.png', 'DHS2039'),
(7, 'rider5', 'rider5@gmail.com', '24234242', '0121029456', 'Beli.png', 'DST5639');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `username`, `email`, `password`) VALUES
(1, 'staff1', 'staff1@gmail.com', '11111111'),
(2, 'staff2', 'staff2@gmail.com', '22222211');

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
-- Indexes for table `deliveryandpickup`
--
ALTER TABLE `deliveryandpickup`
  ADD PRIMARY KEY (`serv_ID`),
  ADD KEY `Test` (`cust_ID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_ID`),
  ADD KEY `rider_ID` (`rider_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `deliveryandpickup`
--
ALTER TABLE `deliveryandpickup`
  MODIFY `serv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `account` (`accID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliveryandpickup`
--
ALTER TABLE `deliveryandpickup`
  ADD CONSTRAINT `Test` FOREIGN KEY (`cust_ID`) REFERENCES `customer` (`custID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rider`
--
ALTER TABLE `rider`
  ADD CONSTRAINT `rider_ibfk_1` FOREIGN KEY (`rider_ID`) REFERENCES `account` (`accID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
