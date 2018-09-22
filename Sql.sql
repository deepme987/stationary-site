-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 11:25 AM
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
CREATE DATABASE IF NOT EXISTS `stationary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stationary`;

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `Oid` varchar(10) NOT NULL,
  `Pid` int(3) NOT NULL,
  `Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` varchar(10) NOT NULL,
  `Uid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `Cost` int(4) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Pid` int(3) NOT NULL,
  `Pname` varchar(20) NOT NULL,
  `Stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Uid` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Class` varchar(4) NOT NULL,
  `RollNo` int(2) NOT NULL,
  `Pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Uid`, `Name`, `Email`, `Class`, `RollNo`, `Pass`) VALUES
('0', '', '', '', 0, 'root'),
('M2016CM1071', 'Deep Mehta', 'deepme987@gmail.com', 'TE -', 60, 'hello'),
('M2016CM1072', 'Deep', 'deepme987@gmail.com', 'TE -', 12, 'sakec');

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
-- Indexes for table `xerox`
--
ALTER TABLE `xerox`
  ADD PRIMARY KEY (`Xid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
