-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2017 at 05:00 PM
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
-- Table structure for table `site_map`
--

CREATE TABLE IF NOT EXISTS `site_map` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `css` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `isActive` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `site_map`
--

INSERT INTO `site_map` (`id`, `name`, `css`, `url`, `isActive`) VALUES
(1, 'Student Registration', 'fa fa-user', 'student/registration', 1),
(2, 'Employee Registration', 'fa fa-group', 'employee/registration', 1),
(3, 'Department Master', 'fa fa-briefcase', 'utility/department', 1),
(4, 'Designation Master', 'fa fa-user', 'utility/designation', 1),
(5, 'User Master', 'fa fa-user', 'utility/user', 1),
(6, 'Role Master', 'fa fa-user', 'utility/role', 1),
(7, 'Semester Master', 'fa fa-list-ol', 'utility/semester', 1),
(8, 'Trade Master', 'fa fa-sitemap', 'utility/trade', 1),
(9, 'Course Master', 'fa fa-mortar-board', 'utility/course', 1),
(10, 'Exam Master', 'fa fa-pencil-square', 'utility/exam', 1),
(11, 'Session Master', 'fa fa-calendar', 'utility/session', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
