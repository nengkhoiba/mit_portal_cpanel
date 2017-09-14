-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2017 at 02:28 PM
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
-- Table structure for table `exam_details`
--

DROP TABLE IF EXISTS `exam_details`;
CREATE TABLE IF NOT EXISTS `exam_details` (
  `id` int(100) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `exam_type_id` int(10) NOT NULL,
  `USID` int(100) NOT NULL,
  `session_id` int(10) NOT NULL,
  `status` int(3) NOT NULL,
  `mark_scored` varchar(10) NOT NULL,
  `Grand_total` varchar(10) NOT NULL,
  `marksheet_no` varchar(50) NOT NULL,
  `DOE` date NOT NULL,
  `DOR` date NOT NULL,
  `DOP` date NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`id`, `sem_id`, `exam_type_id`, `USID`, `session_id`, `status`, `mark_scored`, `Grand_total`, `marksheet_no`, `DOE`, `DOR`, `DOP`, `isActive`) VALUES
(1, 1, 1, 1, 4, 0, '123', '321', '123', '0000-00-00', '0000-00-00', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
