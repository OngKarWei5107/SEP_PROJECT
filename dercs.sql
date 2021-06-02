-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2021 at 07:34 AM
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
-- Database: `DCRSMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `accID` int(11) NOT NULL,
  `accType` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`accID`, `accType`, `email`, `password`) VALUES
(1, 'staff', 'staff1@gmail.com', '11111111'),
(2, 'staff', 'staff2@gmail.com', '22222211'),
(3, 'rider ', 'rider1@gmail.com', 'password1'),
(4, 'rider ', 'rider2@gmail.com', 'password2'),
(5, 'rider ', 'rider3@gmail.com', '12121212'),
(6, 'rider ', 'rider4@gmail.com', '121212121'),
(7, 'rider ', 'rider5@gmail.com', '24234242'),
(8, 'customer', 'issac@gmail.com', 'hahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `cus_ID` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_contact` varchar(20) NOT NULL,
  `cus_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`cus_ID`, `cus_name`, `cus_contact`, `cus_address`) VALUES
(8, 'Issac L', '0123456987', 'UMP');

-- --------------------------------------------------------

--
-- Table structure for table `Delivery`
--

CREATE TABLE `Delivery` (
  `deli_ID` int(11) NOT NULL,
  `deli_type` varchar(20) NOT NULL,
  `deli_address` varchar(100) NOT NULL,
  `deli_date` date NOT NULL,
  `deli_daterange1` date NOT NULL,
  `deli_daterange2` date NOT NULL,
  `deli_COD` float NOT NULL,
  `deli_status` varchar(20) NOT NULL,
  `deli_note` varchar(100) NOT NULL,
  `rider_ID` int(11) NOT NULL,
  `cus_ID` int(11) NOT NULL,
  `staff_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Diagnose`
--

CREATE TABLE `Diagnose` (
  `rep_ID` int(11) NOT NULL,
  `item_ID` int(11) NOT NULL,
  `item_pay` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Quotation`
--

CREATE TABLE `Quotation` (
  `quo_ID` int(11) NOT NULL,
  `cus_ID` int(11) NOT NULL,
  `quo_date` date NOT NULL,
  `quo_device` varchar(100) NOT NULL,
  `quo_symptom` varchar(200) NOT NULL,
  `quo_damage` varchar(100) NOT NULL,
  `quo_additional` varchar(200) NOT NULL,
  `quo_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Repair`
--

CREATE TABLE `Repair` (
  `rep_ID` int(11) NOT NULL,
  `cus_ID` int(11) NOT NULL,
  `rep_date` date NOT NULL,
  `rep_device` varchar(100) NOT NULL,
  `rep_symptom` varchar(200) NOT NULL,
  `rep_damage` varchar(100) NOT NULL,
  `rep_additional` varchar(200) NOT NULL,
  `rep_cost` float NOT NULL,
  `current_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `RepairItem`
--

CREATE TABLE `RepairItem` (
  `item_ID` int(11) NOT NULL,
  `item` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Rider`
--

CREATE TABLE `Rider` (
  `rider_ID` int(11) NOT NULL,
  `rider_name` varchar(100) NOT NULL,
  `rider_contact` varchar(20) NOT NULL,
  `rider_photo` varchar(50) NOT NULL,
  `rider_platNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Rider`
--

INSERT INTO `Rider` (`rider_ID`, `rider_name`, `rider_contact`, `rider_photo`, `rider_platNo`) VALUES
(3, 'Ali', '0128374921', 'Ali.png', 'NCH1029'),
(4, 'Muthu', '0168124965', 'Muthu.png', 'MCQ2049'),
(5, 'Ah Hock', '0198371039', 'Hock.png', 'GHR2019'),
(6, 'Mari', '0173648224', 'Mari.png', 'DHS2039'),
(7, 'Beli', '0121029456', 'Beli.png', 'DST5639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`cus_ID`),
  ADD KEY `cus_ID` (`cus_ID`);

--
-- Indexes for table `Delivery`
--
ALTER TABLE `Delivery`
  ADD PRIMARY KEY (`deli_ID`),
  ADD KEY `cus_ID` (`cus_ID`),
  ADD KEY `rider_ID` (`rider_ID`),
  ADD KEY `staff_ID` (`staff_ID`);

--
-- Indexes for table `Diagnose`
--
ALTER TABLE `Diagnose`
  ADD PRIMARY KEY (`rep_ID`,`item_ID`),
  ADD KEY `item_ID` (`item_ID`),
  ADD KEY `rep_ID` (`rep_ID`);

--
-- Indexes for table `Quotation`
--
ALTER TABLE `Quotation`
  ADD PRIMARY KEY (`quo_ID`),
  ADD KEY `cus_ID` (`cus_ID`);

--
-- Indexes for table `Repair`
--
ALTER TABLE `Repair`
  ADD PRIMARY KEY (`rep_ID`),
  ADD KEY `cus_ID` (`cus_ID`);

--
-- Indexes for table `RepairItem`
--
ALTER TABLE `RepairItem`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `Rider`
--
ALTER TABLE `Rider`
  ADD PRIMARY KEY (`rider_ID`),
  ADD KEY `rider_ID` (`rider_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Delivery`
--
ALTER TABLE `Delivery`
  MODIFY `deli_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Quotation`
--
ALTER TABLE `Quotation`
  MODIFY `quo_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Repair`
--
ALTER TABLE `Repair`
  MODIFY `rep_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RepairItem`
--
ALTER TABLE `RepairItem`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cus_ID`) REFERENCES `Account` (`accID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Delivery`
--
ALTER TABLE `Delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`cus_ID`) REFERENCES `Customer` (`cus_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`rider_ID`) REFERENCES `Rider` (`rider_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`staff_ID`) REFERENCES `Account` (`accID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Diagnose`
--
ALTER TABLE `Diagnose`
  ADD CONSTRAINT `diagnose_ibfk_1` FOREIGN KEY (`rep_ID`) REFERENCES `Repair` (`rep_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `diagnose_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `RepairItem` (`item_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Quotation`
--
ALTER TABLE `Quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`cus_ID`) REFERENCES `Customer` (`cus_ID`);

--
-- Constraints for table `Repair`
--
ALTER TABLE `Repair`
  ADD CONSTRAINT `repair_ibfk_1` FOREIGN KEY (`cus_ID`) REFERENCES `Customer` (`cus_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Rider`
--
ALTER TABLE `Rider`
  ADD CONSTRAINT `rider_ibfk_1` FOREIGN KEY (`rider_ID`) REFERENCES `Account` (`accID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
