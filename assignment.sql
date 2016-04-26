-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2016 at 06:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_tbl`
--

CREATE TABLE IF NOT EXISTS `article_tbl` (
  `a_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loca_id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` char(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `title` (`title`),
  KEY `article_tbl_ibfk_1` (`loca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `article_tbl`
--

INSERT INTO `article_tbl` (`a_id`, `loca_id`, `title`, `content`, `status`, `note`) VALUES
(4, 1, 'Civil Lines, Allahabad', 'Civil Lines (formerly Cannington also Canning Town) is a Civil Lines neighborhood of Allahabad, Uttar Pradesh, India. It is the central business district of the city and is famous for its urban setting, gridiron plan roads and high rise buildings. Built in 1857, under the supervision of Cuthbert Bensley Thornhill, it was the largest town-planning project carried out in India before the establishment of New Delhi.\r\n\r\n', 'Public', 'About Civil Lines.');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE IF NOT EXISTS `department_tbl` (
  `Department_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Department_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`Department_id`),
  UNIQUE KEY `Department_name` (`Department_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`Department_id`, `Department_name`, `note`) VALUES
(1, 'Information Technology', 'Information technology (IT) is the application of computers to store'),
(8, 'ECE', 'This department deals with the electronics.');

-- --------------------------------------------------------

--
-- Table structure for table `location_tb`
--

CREATE TABLE IF NOT EXISTS `location_tb` (
  `loca_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `note` varchar(150) NOT NULL,
  PRIMARY KEY (`loca_id`),
  UNIQUE KEY `l_name` (`l_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location_tb`
--

INSERT INTO `location_tb` (`loca_id`, `l_name`, `description`, `note`) VALUES
(1, 'Civil Lines', 'Allahabad only visiting destination', 'Highly modern place'),
(2, 'Peepal Gaon', 'Near IIIT, Allahabad Campus', 'Rural Area');

-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

CREATE TABLE IF NOT EXISTS `stu_score_tbl` (
  `ss_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stu_id` int(10) unsigned NOT NULL,
  `Department_id` int(10) unsigned NOT NULL,
  `sub_id` int(10) unsigned NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`ss_id`),
  KEY `stu_score_tbl_ibfk_3` (`sub_id`),
  KEY `stu_score_tbl_ibfk_1` (`stu_id`),
  KEY `stu_score_tbl_ibfk_2` (`Department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `stu_score_tbl`
--

INSERT INTO `stu_score_tbl` (`ss_id`, `stu_id`, `Department_id`, `sub_id`, `miderm`, `final`, `note`) VALUES
(29, 1, 1, 8, 50, 100, 'Outstanding'),
(33, 3, 8, 12, 20, 60, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

CREATE TABLE IF NOT EXISTS `stu_tbl` (
  `stu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`stu_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`stu_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(1, 'Ankit', 'Gupta', 'Male', '1991-03-01', 'Alwar         ', '   B-109 Budh Vihar', '088 9 666 120', 'aggupta@gmail.com          ', 'Student'),
(2, 'Aishwary', 'Raj', 'Male', '1990-05-04', 'Shaktinagar ', ' shakti mill', '015 66 77 33', 'ashraj@yahoo.com    ', 'Student'),
(3, 'Akanshu', 'Gupta', 'Male', '1988-05-05', 'Kanpur ', 'Room No. 1109   BH-4 Boys Hostel IIITA Campus', '097 69 90 123', 'angelgupta@gmail.com     ', 'Student'),
(5, 'Abhishek', 'Jaiswal ', 'Male', '1995-11-01', 'Chandigarh    ', '   BH-4 Boys Hostel IIITA Campus', '07054558126', 'iit2014118@iiita.ac.in   ', 'Student'),
(6, 'Irene ', 'Argon', 'Female', '1994-08-14', 'Amsterdam   ', '   221B Baker Street ', '07812045089', 'argonirene@hotmail.com   ', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tbl`
--

CREATE TABLE IF NOT EXISTS `sub_tbl` (
  `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Department_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `sub_name` (`sub_name`),
  KEY `sub_tbl_ibfk_2` (`teacher_id`),
  KEY `sub_tbl_ibfk_1` (`Department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sub_tbl`
--

INSERT INTO `sub_tbl` (`sub_id`, `Department_id`, `teacher_id`, `semester`, `sub_name`, `note`) VALUES
(7, 1, 3, '1st', 'ITC', 'The subject have 2 lab credit.'),
(8, 1, 2, '1st', 'CAS', 'The subject have 3 theory credits'),
(11, 8, 3, '3rd', 'Microelectronic', 'This subject have 3 credits.'),
(12, 8, 2, '3rd', 'POC', 'This subject have 5 credits.');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE IF NOT EXISTS `teacher_tbl` (
  `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `married` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `degree`, `salary`, `married`, `phone`, `email`, `note`) VALUES
(2, 'Pooja ', 'Pooja ', 'Female', '1986-03-08', '          Kashmir', 'IIITA Faculty Apartment', 'Master', 15000, 'Yes', '016 572 393', 'tolapheng@gmail.com', 'Teacher and Staff'),
(3, 'Kirti', 'Srivastava', 'Female', '1985-07-03', 'Chandigarh ', 'Civil Lines', 'Master', 10000, 'Yes', '087 666 55 ', 'vannthoeunsann@gmail.com', 'English'),
(4, 'Ajay', 'Ajay', 'Male', '1987-03-05', '                                                                            Allahabad', 'Sangam Bazaar', 'P.HD', 5, 'Yes', '015 871 787', 'sovannhang@gmail.com', 'Teacher and Staff');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(1, 'admin', 'admin', 'creator', 'creator'),
(2, 'everyone', 'viewonly', 'visitor', 'visitor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_tbl`
--
ALTER TABLE `article_tbl`
  ADD CONSTRAINT `article_tbl_ibfk_1` FOREIGN KEY (`loca_id`) REFERENCES `location_tb` (`loca_id`) ON DELETE CASCADE;

--
-- Constraints for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  ADD CONSTRAINT `stu_score_tbl_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `sub_tbl` (`sub_id`),
  ADD CONSTRAINT `stu_score_tbl_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `stu_tbl` (`stu_id`),
  ADD CONSTRAINT `stu_score_tbl_ibfk_2` FOREIGN KEY (`Department_id`) REFERENCES `department_tbl` (`Department_id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  ADD CONSTRAINT `sub_tbl_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`),
  ADD CONSTRAINT `sub_tbl_ibfk_1` FOREIGN KEY (`Department_id`) REFERENCES `department_tbl` (`Department_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
