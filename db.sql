-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 01:03 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stationary`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `Oid` int(11) NOT NULL,
  `Pid` int(3) NOT NULL,
  `Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`Oid`, `Pid`, `Quantity`) VALUES
(10000, 1, 5),
(10000, 2, 5),
(10001, 2, 1),
(10002, 1, 5),
(10003, 1, 5),
(10003, 2, 10),
(10004, 3, 10),
(10005, 1, 10),
(10005, 4, 5),
(10006, 1, 1),
(10006, 2, 1),
(10007, 1, 1),
(10007, 3, 1),
(10010, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL,
  `Uid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `Cost` int(4) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Oid`, `Uid`, `date`, `time`, `Cost`, `Status`) VALUES
(10000, 'M2016CM1071', '2018-09-28', '22:11:27', 30, 'Collected'),
(10001, 'M2016CM1071', '2018-09-28', '22:14:18', 5, 'Collected'),
(10002, 'M2016CM1071', '2018-09-28', '22:16:14', 5, 'Collected'),
(10003, 'M2016CM1071', '2018-09-29', '14:49:28', 55, 'Collected'),
(10004, 'M2016CM1071', '2018-09-29', '14:51:35', 30, 'Collected'),
(10005, 'M2016CM1071', '2018-09-29', '15:06:37', 10, 'Collected'),
(10006, 'M2016CM1071', '2018-09-29', '15:17:29', 6, 'Collected'),
(10007, 'M2016CM1071', '2018-09-29', '15:45:32', 4, 'Collected'),
(10008, 'M2016CM1071', '2018-09-30', '01:08:01', 0, 'Processing'),
(10009, 'M2016CM1071', '2018-09-30', '01:08:47', 0, 'Processing'),
(10010, 'M2016CM1071', '2018-09-30', '01:10:42', 1, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Pid` int(3) NOT NULL,
  `Pname` varchar(20) NOT NULL,
  `Stock` int(5) NOT NULL,
  `Cost` int(3) NOT NULL,
  `Link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Pid`, `Pname`, `Stock`, `Cost`, `Link`) VALUES
(1, 'Assignment Sheets', 1000, 1, 'assignment_sheets.jpg'),
(2, 'Eraser', 0, 5, 'eraser.jpg'),
(3, 'Pencil', 0, 3, 'pencil.jpg'),
(4, 'Fake', 0, 0, 'fake.png'),
(5, 'Blue_file', 0, 15, 'blue_file.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Uid` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `MobNo` bigint(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Class` varchar(4) NOT NULL,
  `RollNo` int(2) NOT NULL,
  `Pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Uid`, `Name`, `MobNo`, `Email`, `Class`, `RollNo`, `Pass`) VALUES
('0', '', 0, '', '', 0, 'root'),
('M2016CM1071', 'Deep Mehta', 9870000393, 'deepme987@gmail.com', 'TE -', 60, 'sakec'),
('M2016CM1072', 'Deep', 9870000393, 'deepme987@gmail.com', 'TE -', 12, 'sakec');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `TokenId` int(11) NOT NULL,
  `CustomerId` varchar(15) NOT NULL,
  `Time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`TokenId`, `CustomerId`, `Time`) VALUES
(1018, 'M2016CM1071', '12.40-12.55'),
(1019, 'M2016CM1071', '9.00-9.15'),
(1020, 'M2016CM1071', '10.20-10.35'),
(1021, 'M2016CM1071', '10.20-10.35'),
(1022, 'M2016CM1071', '12.00-12.15'),
(1023, 'M2016CM1071', '2.40-2.55');

-- --------------------------------------------------------

--
-- Table structure for table `xerox`
--

CREATE TABLE `xerox` (
  `Xid` varchar(10) NOT NULL,
  `Uid` varchar(15) NOT NULL,
  `time` time NOT NULL,
  `XStatus` varchar(10) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`TokenId`);

--
-- Indexes for table `xerox`
--
ALTER TABLE `xerox`
  ADD PRIMARY KEY (`Xid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `TokenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
