-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2017 at 12:21 PM
-- Server version: 5.6.25
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MIT_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `isActive`) VALUES
(1, 'CSE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`, `isActive`) VALUES
(1, 'Teaching', 1),
(2, 'Non-Teaching', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_col_relation`
--

DROP TABLE IF EXISTS `emp_col_relation`;
CREATE TABLE IF NOT EXISTS `emp_col_relation` (
  `UEID` int(100) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `deg_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_col_relation`
--

INSERT INTO `emp_col_relation` (`UEID`, `dept_id`, `deg_id`, `role_id`) VALUES
(9, 1, 1, 1),
(10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

DROP TABLE IF EXISTS `emp_details`;
CREATE TABLE IF NOT EXISTS `emp_details` (
  `UEID` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`UEID`, `name`, `address`, `mobile`, `qualification`, `email`, `gender`, `isActive`) VALUES
(1, 'Adam', 'Thangapat', '7005614625', 'MTech', 'a@gmail.com', 'Male', 1),
(2, 'Tomba', 'Kakwa', '7005614625', 'BA', 'tomba@gmail.com', 'Male', 1),
(3, 'Rohit', 'Thangmeiband', '9098765431', 'MTech', 'rohit@hotmail.com', 'Male', 1),
(4, 'Sachin', 'Mumbai', '9908978654', '10+2', 'sachin@gmail.com', 'Male', 1),
(5, 'Sachin', 'Mumbai', '9908978654', '10+2', 'sachin@gmail.com', 'Male', 1),
(6, 'Bill Gates', 'Mountain View', '1234567890', 'MS', 'bill@live.com', 'Male', 1),
(7, 'Bill Gates', 'Mountain View', '1234567890', 'MS', 'bill@live.com', 'Male', 1),
(8, 'Lary Pages', 'Mountain View', '1234567890', 'MS', 'lary@gmail.com', 'Male', 1),
(9, 'Steve Jobs', 'Mountain View LA', '1234567890', 'BTech', 'Steve@icloud.com', 'Male', 1),
(10, 'd', 'e', 'f', 'fq', 'f@gmai.com', 'Female', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

DROP TABLE IF EXISTS `emp_login`;
CREATE TABLE IF NOT EXISTS `emp_login` (
  `UEID` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isFirst` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_login`
--

INSERT INTO `emp_login` (`UEID`, `user`, `password`, `isFirst`) VALUES
(0, 'adam', 'adam123', 1),
(4, 'Sachin', '', 1),
(5, 'Sachin', '', 1),
(6, 'Bill', '', 1),
(8, 'Pages', 'Page', 1),
(9, 'Steve', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`UEID`);

--
-- Indexes for table `emp_login`
--
ALTER TABLE `emp_login`
  ADD UNIQUE KEY `UEID` (`UEID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `UEID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
