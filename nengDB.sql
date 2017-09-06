x-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 01:38 PM
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
-- Table structure for table `admission_std_relation`
--

DROP TABLE IF EXISTS `admission_std_relation`;
CREATE TABLE IF NOT EXISTS `admission_std_relation` (
  `USID` int(100) NOT NULL,
  `session_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `date_of_admission` date NOT NULL,
  `other` varchar(100) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `abv`, `isActive`) VALUES
(1, 'Bachelor of engineering', 'B.E', 1),
(2, 'Master of Technology', 'M.Tech', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
(1, 1, 1, 1),
(9, 1, 1, 1);

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
(1, 'adam121', 'welcome', 1),
(4, 'Sachin', '', 1),
(5, 'Sachin', '', 1),
(6, 'Bill', '', 1),
(8, 'Pages', 'Page', 1),
(9, 'Steve', '', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

DROP TABLE IF EXISTS `exam_type`;
CREATE TABLE IF NOT EXISTS `exam_type` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `name`, `isActive`) VALUES
(1, 'Regular', 1),
(2, 'Back 1', 1),
(3, 'Back 2', 1),
(4, 'Back 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

DROP TABLE IF EXISTS `login_history`;
CREATE TABLE IF NOT EXISTS `login_history` (
  `id` int(11) NOT NULL,
  `login_by` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_manager`
--

DROP TABLE IF EXISTS `page_manager`;
CREATE TABLE IF NOT EXISTS `page_manager` (
  `id` int(10) NOT NULL,
  `site_map_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_manager`
--

INSERT INTO `page_manager` (`id`, `site_map_id`, `role_id`, `isActive`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `isActive`) VALUES
(1, 'ADMIN', 1),
(2, 'CLERK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`, `isActive`) VALUES
(1, '1st Semester', 1),
(2, '2nd Semester', 1),
(3, '3rd Semester', 1),
(4, '4th Semester', 1),
(5, '5th Semester', 1),
(6, '6th Semester', 1),
(7, '7th Semester', 1),
(8, '8th Semester', 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `isActive`) VALUES
(1, '2014-15', 1),
(2, '2015-16', 1),
(3, '2016-17', 1),
(4, '2017-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_map`
--

DROP TABLE IF EXISTS `site_map`;
CREATE TABLE IF NOT EXISTS `site_map` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `css` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_map`
--

INSERT INTO `site_map` (`id`, `name`, `css`, `url`, `isActive`) VALUES
(1, 'Student Registration', 'fa fa-user', 'student/registration', 1),
(2, 'Employee Registration', 'fa fa-group', 'employee/registration', 1),
(3, 'Department Master', 'fa fa-briefcase', 'utility/department', 1),
(4, 'Designation Master', 'fa fa-address-card', 'utility/designation', 1),
(5, 'User Master', 'fa fa-user-circle-o', 'utility/user', 1),
(6, 'Role Master', 'fa fa-id-badge', 'utility/role', 1),
(7, 'Semester Master', 'fa fa-list-ol', 'utility/semester', 1),
(8, 'Trade Master', 'fa fa-sitemap', 'utility/trade', 1),
(9, 'Course Master', 'fa fa-mortar-board', 'utility/course', 1),
(10, 'Exam Master', 'fa fa-pencil-square', 'utility/exam', 1),
(11, 'Session Master', 'fa fa-calendar', 'utility/session', 1),
(12, 'Page Master', 'fa fa-sticky-note', 'utility/page', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_col_relation`
--

DROP TABLE IF EXISTS `std_col_relation`;
CREATE TABLE IF NOT EXISTS `std_col_relation` (
  `USID` int(100) NOT NULL,
  `MU_roll` varchar(20) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `course_id` int(10) NOT NULL,
  `trade_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE IF NOT EXISTS `student_details` (
  `USID` int(100) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mName` varchar(100) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `pAddress` varchar(300) NOT NULL,
  `cAddress` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `reserve_cat` int(1) NOT NULL,
  `phy_han` int(1) NOT NULL,
  `eco_back` int(1) NOT NULL,
  `photo_url` varchar(300) NOT NULL,
  `added_by` int(1) NOT NULL,
  `added_on` timestamp NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

DROP TABLE IF EXISTS `trade`;
CREATE TABLE IF NOT EXISTS `trade` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `name`, `abv`, `isActive`) VALUES
(1, 'Computer Science and Engineeri', 'CSE', 1),
(2, 'Civil Engineering', 'CE', 1),
(3, 'Electronics and Comuunication ', 'ECE', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `emp_col_relation`
--
ALTER TABLE `emp_col_relation`
  ADD UNIQUE KEY `UEID` (`UEID`);

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
-- Indexes for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_manager`
--
ALTER TABLE `page_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_map`
--
ALTER TABLE `site_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`USID`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `UEID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `exam_details`
--
ALTER TABLE `exam_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_manager`
--
ALTER TABLE `page_manager`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_map`
--
ALTER TABLE `site_map`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `USID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
