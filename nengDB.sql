-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 01:55 PM
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

CREATE TABLE IF NOT EXISTS `admission_std_relation` (
  `USID` int(100) NOT NULL,
  `session_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `date_of_admission` date NOT NULL,
  `other` varchar(100) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_std_relation`
--

INSERT INTO `admission_std_relation` (`USID`, `session_id`, `sem_id`, `date_of_admission`, `other`, `isActive`) VALUES
(1, 4, 1, '2017-09-13', '131313', 1),
(2, 4, 3, '0000-00-00', '', 0),
(3, 4, 1, '0000-00-00', '', 0),
(4, 4, 1, '0000-00-00', '', 0),
(5, 4, 8, '2017-09-28', 'kjhhkhh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `id` int(1) NOT NULL,
  `current_session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `current_session_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `abv`, `isActive`) VALUES
(1, 'Bachelor of Engineering', 'B.E', 1),
(2, 'Master of Technology', 'M.Tech', 1),
(3, 'mnmn', 'mnmnmnm', 0),
(4, 'sada', 'asa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `isActive`) VALUES
(1, 'CSE', 1),
(2, 'Library', 1),
(3, 'Examination', 1),
(4, 'Account Section', 1),
(5, 'Science And Humanities', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

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
(11, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `UEID` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(10, 'd', 'e', 'f', 'fq', 'f@gmai.com', 'Female', 1),
(11, 'Sapam jitu', 'Khurai', '1234567890', 'MTech', 's.jitu@gmail.com', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_login`
--

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
(11, 'jitu', 'welcome', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

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

CREATE TABLE IF NOT EXISTS `login_history` (
  `id` int(11) NOT NULL,
  `login_by` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_manager`
--

CREATE TABLE IF NOT EXISTS `page_manager` (
  `id` int(10) NOT NULL,
  `site_map_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(12, 12, 1, 1),
(13, 13, 1, 1),
(14, 14, 1, 1),
(15, 15, 1, 1),
(16, 13, 0, 0),
(17, 14, 0, 0),
(18, 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

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

CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(8, '8th Semester', 1),
(9, '9th Semesters', 0),
(10, 'sdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `isActive`) VALUES
(1, '2014-15', 0),
(2, '2015-16', 0),
(3, '2016-17', 0),
(4, '2017-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_map`
--

CREATE TABLE IF NOT EXISTS `site_map` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `css` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `site_map_id` int(10) NOT NULL DEFAULT '0',
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_map`
--

INSERT INTO `site_map` (`id`, `name`, `css`, `url`, `site_map_id`, `isActive`) VALUES
(1, 'Student Registration', 'fa fa-user-plus', 'student/registration', 0, 1),
(2, 'Employee Registration', 'fa fa-group', 'employee/registration', 0, 1),
(3, 'Department Master', 'fa fa-briefcase', 'utility/department', 15, 1),
(4, 'Designation Master', 'fa fa-address-card', 'utility/designation', 15, 1),
(5, 'User Master', 'fa fa-user-circle-o', 'utility/user', 15, 1),
(6, 'Role Master', 'fa fa-id-badge', 'utility/role', 15, 1),
(7, 'Semester Master', 'fa fa-list-ol', 'utility/semester', 15, 1),
(8, 'Trade Master', 'fa fa-sitemap', 'utility/trade', 15, 1),
(9, 'Course Master', 'fa fa-mortar-board', 'utility/course', 15, 1),
(10, 'Exam Master', 'fa fa-pencil-square', 'utility/exam', 15, 1),
(11, 'Session Master', 'fa fa-calendar', 'utility/session', 15, 1),
(12, 'Page Master', 'fa fa-sticky-note', 'utility/page', 15, 1),
(13, 'Admission', 'fa fa-link', 'student/admission', 0, 1),
(14, 'Student List', 'fa fa-id-card', 'student/list', 0, 1),
(15, 'Utility', 'fa fa-wrench\n', '#', 0, 1),
(16, 'Examination Data', 'fa fa-upload', 'student/exam-result', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_col_relation`
--

CREATE TABLE IF NOT EXISTS `std_col_relation` (
  `USID` int(100) NOT NULL,
  `MU_roll` varchar(20) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `reg_year` varchar(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `trade_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_col_relation`
--

INSERT INTO `std_col_relation` (`USID`, `MU_roll`, `reg_no`, `reg_year`, `course_id`, `trade_id`, `isActive`) VALUES
(1, '142026', '1430073', '2014', 1, 1, 1),
(2, '182026', '1830073', '2018', 2, 1, 1),
(3, '141026', '1410073', '2014', 1, 2, 1),
(4, '143026', '1410083', '2018', 2, 2, 1),
(5, '142001', '1020100123', '2011', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

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
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`USID`, `title`, `firstname`, `middlename`, `lastname`, `mName`, `fName`, `pAddress`, `cAddress`, `phone`, `mobile`, `gender`, `dob`, `religion`, `nationality`, `category`, `reserve_cat`, `phy_han`, `eco_back`, `photo_url`, `added_by`, `added_on`, `isActive`) VALUES
(1, 'Mr', 'Ningthoujam', 'Borison', 'Singh', 'Ningthoujam Mema Devi', 'Ningthoujam Tompishak Singh', 'Moirangkampu', 'Moirangkampu', '9615865655', '9089779715', 'Male', '1996-07-08', 'Meitei', 'Indian', 'General', 0, 0, 0, '', 0, '2017-09-13 11:28:12', 1),
(2, 'Mr', 'Ningthoujam', 'Borison', 'Singh', 'Ningthoujam Mema Devi', 'Ningthoujam Tompishak Singh', 'Moirangkampu', 'Moirangkampu', '9615865655', '9089779715', 'Male', '1996-07-08', 'Meitei', 'Indian', 'General', 0, 0, 0, '', 0, '2017-09-13 11:34:57', 1),
(3, 'Mr', 'Naruto', '', 'Uzumaki', 'Kushina', 'Minato', 'Hidden Leaf village', 'Hidden Lea Village', '9615865655', '9089779715', 'Male', '2010-07-08', 'Meitei', 'Japaneese', 'General', 0, 0, 0, '', 0, '2017-09-13 11:38:00', 1),
(4, 'Mr', 'Naruto', '', 'Uzumaki', 'Kushina', 'Minato', 'Hidden Leaf village', 'Hidden Lea Village', '9615865655', '9089779715', 'Male', '2017-09-15', 'Meitei', 'Japaneese', 'General', 0, 0, 0, '', 0, '2017-09-13 11:43:06', 1),
(5, 'Mr', 'Nengkhoiba', '', 'Chungkham', 'Ch Sunanda', 'Ch Ranabir', 'Brahmapur chungkham leikai', 'Brahmapur chungkham leikai', '9774180184', '9774180184', 'Male', '1990-12-15', 'Hindu', 'India', 'General', 0, 0, 0, '', 0, '2017-09-28 12:34:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `id` int(2) NOT NULL,
  `name` varchar(45) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `name`, `abv`, `isActive`) VALUES
(1, 'Computer Science and Engineering', 'CSE', 1),
(2, 'Civil Engineering', 'CE', 1),
(3, 'Electronics and Communication Engineering', 'ECE', 1),
(4, 'kjnk', 'mnmm m ', 0);

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
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `UEID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_map`
--
ALTER TABLE `site_map`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `USID` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
