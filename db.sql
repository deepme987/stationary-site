-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2018 at 08:51 PM
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
(10010, 1, 1),
(10011, 1, 1),
(10012, 1, 1),
(10012, 2, 1),
(10013, 2, 1),
(10013, 3, 1),
(10014, 2, 1),
(10014, 3, 1),
(10015, 2, 1),
(10015, 3, 1),
(10016, 2, 1),
(10016, 3, 1),
(10017, 2, 1),
(10017, 3, 1),
(10018, 3, 1),
(10018, 4, 1),
(10019, 3, 1),
(10019, 2, 1),
(10020, 3, 1),
(10020, 2, 1),
(10020, 5, 2),
(10022, 2, 1),
(10022, 3, 1),
(10023, 3, 1),
(10023, 2, 1),
(10024, 3, 1),
(10024, 2, 1),
(10025, 3, 1),
(10025, 4, 1),
(10026, 2, 2),
(10026, 3, 1),
(10027, 3, 5),
(10027, 1, 1),
(10028, 3, 1),
(10029, 1, 8),
(10029, 2, 13),
(10029, 3, 8),
(10029, 4, 9),
(10029, 5, 1),
(10030, 3, 1),
(10030, 4, 1),
(10031, 1, 1),
(10031, 2, 1),
(10032, 1, 10),
(10032, 2, 5),
(10033, 1, 10),
(10033, 2, 5),
(10034, 2, 1),
(10034, 3, 1),
(10035, 1, 1),
(10035, 2, 1),
(10036, 1, 10),
(10036, 2, 1),
(10037, 2, 1),
(10037, 3, 1);

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
(10008, 'M2016CM1071', '2018-09-30', '01:08:01', 0, 'Collected'),
(10009, 'M2016CM1071', '2018-09-30', '01:08:47', 0, 'Collected'),
(10010, 'M2016CM1071', '2018-09-30', '01:10:42', 1, 'Collected'),
(10011, 'M2016CM1071', '2018-09-30', '14:26:06', 1, 'Collected'),
(10012, 'M2016CM1071', '2018-09-30', '14:37:15', 6, 'Collected'),
(10013, 'M2016CM1071', '2018-09-30', '14:37:55', 8, 'Collected'),
(10014, 'M2016CM1071', '2018-09-30', '14:40:47', 8, 'Collected'),
(10015, 'M2016CM1071', '2018-09-30', '14:47:26', 8, 'Collected'),
(10016, 'M2016CM1071', '2018-09-30', '14:47:46', 8, 'Collected'),
(10017, 'M2016CM1071', '2018-09-30', '14:51:00', 8, 'Collected'),
(10018, 'M2016CM1071', '2018-09-30', '14:51:48', 3, 'Collected'),
(10019, 'M2016CM1071', '2018-09-30', '14:52:57', 8, 'Collected'),
(10020, 'M2016CM1071', '2018-09-30', '14:58:26', 38, 'Collected'),
(10021, 'M2016CM1071', '2018-09-30', '15:00:46', 0, 'Collected'),
(10022, 'M2016CM1071', '2018-09-30', '15:02:06', 8, 'Collected'),
(10023, 'M2016CM1071', '2018-09-30', '15:04:53', 8, 'Collected'),
(10024, 'M2016CM1071', '2018-09-30', '15:06:09', 8, 'Collected'),
(10025, 'M2016CM1071', '2018-09-30', '15:07:40', 3, 'Collected'),
(10026, 'M2016CM1071', '2018-09-30', '15:18:25', 13, 'Collected'),
(10027, 'M2016CM1071', '2018-09-30', '15:27:25', 16, 'Collected'),
(10028, 'M2016CM1072', '2018-09-30', '16:38:09', 3, 'Collected'),
(10029, 'M2016CM1071', '2018-09-30', '18:20:16', 112, 'Collected'),
(10030, 'M2016CM1071', '2018-09-30', '18:25:33', 3, 'Collected'),
(10031, 'M2016CM1071', '2018-09-30', '19:21:55', 6, 'Collected'),
(10032, 'M2016CM1071', '2018-09-30', '19:22:32', 35, 'Collected'),
(10033, 'M2016CM1071', '2018-09-30', '19:24:27', 35, 'Collected'),
(10034, 'M2016CM1071', '2018-09-30', '19:32:28', 8, 'Collected'),
(10035, 'M2016CM1071', '2018-10-01', '11:28:23', 6, 'Ready'),
(10036, 'M2016CM1071', '2018-10-01', '11:55:18', 15, 'Processing'),
(10037, 'M2016CM1071', '2018-10-05', '00:17:06', 8, 'Processing');

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
  `Class` varchar(6) NOT NULL,
  `RollNo` int(2) NOT NULL,
  `Pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Uid`, `Name`, `MobNo`, `Email`, `Class`, `RollNo`, `Pass`) VALUES
('0', '', 0, '', '', 0, 'root'),
('M2016CM1071', 'Deep Mehta', 9870000393, 'deepme987@gmail.com', 'TE - 4', 60, 'sakec'),
('M2016CM1072', 'Deep', 9870000393, 'deepme987@gmail.com', 'TE - 4', 12, 'sakec');

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
(1, 'M2016CM1071', '10.40-10.55');

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
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10038;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `TokenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
