-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 12:51 PM
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
(15, 'Utility', 'fa fa-gear\n', '#', 0, 1),
(16, 'Examination Data', 'fa fa-upload', 'student/exam-result', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site_map`
--
ALTER TABLE `site_map`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site_map`
--
ALTER TABLE `site_map`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
