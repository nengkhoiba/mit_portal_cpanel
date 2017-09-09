-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2017 at 03:19 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mit_db`
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

--
-- Dumping data for table `admission_std_relation`
--

INSERT INTO `admission_std_relation` (`USID`, `session_id`, `sem_id`, `date_of_admission`, `other`, `isActive`) VALUES
(1, 0, 1, '2017-09-12', '12636', 1),
(2, 0, 3, '0000-00-00', '', 1),
(3, 1, 1, '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

DROP TABLE IF EXISTS `college`;
CREATE TABLE IF NOT EXISTS `college` (
  `id` int(1) NOT NULL,
  `current_session_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `current_session_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `role_id` int(10) NOT NULL,
  UNIQUE KEY `UEID` (`UEID`)
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
  `UEID` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`UEID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
  `isFirst` int(1) NOT NULL,
  UNIQUE KEY `UEID` (`UEID`)
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
  `id` int(100) NOT NULL AUTO_INCREMENT,
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
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

DROP TABLE IF EXISTS `exam_type`;
CREATE TABLE IF NOT EXISTS `exam_type` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_by` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_manager`
--

DROP TABLE IF EXISTS `page_manager`;
CREATE TABLE IF NOT EXISTS `page_manager` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `site_map_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `isActive`) VALUES
(1, '2014-15', 1),
(2, '2015-16', 0),
(3, '2016-17', 0),
(4, '2017-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_map`
--

DROP TABLE IF EXISTS `site_map`;
CREATE TABLE IF NOT EXISTS `site_map` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `css` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
  `reg_year` varchar(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `trade_id` int(10) NOT NULL,
  `isActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_col_relation`
--

INSERT INTO `std_col_relation` (`USID`, `MU_roll`, `reg_no`, `reg_year`, `course_id`, `trade_id`, `isActive`) VALUES
(1, '', '14430073', '', 1, 1, 1),
(2, '', '15200129', '', 1, 1, 1),
(3, '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE IF NOT EXISTS `student_details` (
  `USID` int(100) NOT NULL AUTO_INCREMENT,
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
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`USID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`USID`, `title`, `firstname`, `middlename`, `lastname`, `mName`, `fName`, `pAddress`, `cAddress`, `phone`, `mobile`, `gender`, `dob`, `religion`, `nationality`, `category`, `reserve_cat`, `phy_han`, `eco_back`, `photo_url`, `added_by`, `added_on`, `isActive`) VALUES
(1, 'Mr', 'Ningthoujam', 'Borison', 'Singh', 'Ningthoujam Mema Devi', 'Ningthoujam Tompishak Singh', 'Moiranglampu Khewa Bazar,Tinseed Road,Imphal East', 'Moiranglampu Khewa Bazar,Tinseed Road,Imphal East', '9615865655', '9089779715', 'Male', '1996-07-08', 'Meitei', 'Indian', 'General', 0, 0, 0, '', 0, '2017-09-09 12:25:14', 1),
(2, 'Mr', 'Ningthoujam', 'Bibekson', 'Singh', 'Ningthoujam Mema Devi', 'Ningthoujam Tompishak Singh', 'Moiranglampu Khewa Bazar,Tinseed Road,Imphal East', 'Moiranglampu Khewa Bazar,Tinseed Road,Imphal East', '9615865655', '8794961391', 'Male', '2013-03-14', 'Meitei', 'Indian', 'General', 0, 0, 0, '', 0, '2017-09-09 12:27:35', 1),
(3, 'Mr', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg', 'Male', '2017-09-06', 'gg', 'gg', 'gg', 0, 0, 0, '', 0, '2017-09-09 15:06:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

DROP TABLE IF EXISTS `trade`;
CREATE TABLE IF NOT EXISTS `trade` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `name`, `abv`, `isActive`) VALUES
(1, 'Computer Science and Engineeri', 'CSE', 1),
(2, 'Civil Engineering', 'CE', 1),
(3, 'Electronics and Comuunication ', 'ECE', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
