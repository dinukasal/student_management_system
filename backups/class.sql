-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2016 at 05:03 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(45) NOT NULL,
  `cl_description` varchar(225) DEFAULT NULL,
  `cl_status` varchar(45) DEFAULT NULL,
  `cur_id` int(11) NOT NULL,
  `sec_id` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`,`cur_id`),
  KEY `fk_class_curriculum1` (`cur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl_id`, `cl_name`, `cl_description`, `cl_status`, `cur_id`, `sec_id`) VALUES
(1, 'Class 1N', 'Age limit is 5-6 years old.', 'Active', 1, 1),
(2, 'Class 1L', ' Age limit is 6-7 years old.', 'Active', 2, 1),
(3, 'Class 2N', ' Age limit is 6-7 years old.', 'Active', 1, 1),
(4, 'Class 2L', ' Age limit is 7-8 years old.', 'Active', 2, 1),
(5, 'Class 3N', ' Age limit is 7-8 years old.', 'Active', 1, 1),
(6, 'Class 3L', ' Age limit is 8-9 years old.', 'Active', 2, 1),
(7, 'Class 4N', ' Age limit is 8-9 years old.', 'Active', 1, 1),
(8, 'Class 4L', ' Age limit is 9-10 years old.', 'Active', 2, 1),
(9, 'Class 5N', ' Age limit is 9-10years old.', 'Active', 1, 1),
(10, 'Class 5L', ' Age limit is 10-11 years old.', 'Active', 2, 1),
(11, 'Class 6N', ' Age limit is 10-11 years old.', 'Active', 1, 2),
(12, 'Class 6L', ' Age limit is 11-12 years old.', 'Active', 2, 2),
(13, 'Class 7N', ' Age limit is 11-12 years old.', 'Active', 1, 2),
(14, ' Class 7L', ' Age limit is 12-13 years old.', 'Active', 2, 2),
(15, 'Class 8N', ' Age limit is 12-13 years old.', 'Active', 1, 2),
(16, 'Class 8L', ' Age limit is 13-14 years old.', 'Active', 2, 2),
(17, 'Class 9N', ' Age limit is 13-14 years old.', 'Active', 1, 2),
(18, 'Class 9L', ' Age limit is 14-15 years old.', 'Active', 2, 3),
(19, 'Class 10N', ' Age limit is 14-15 years old.', 'Active', 1, 3),
(20, 'Class 10L', ' Age limit is 15-16 years old.', 'Active', 2, 3),
(21, 'Class 11N', ' Age limit is 15-16 years old.', 'Active', 1, 3),
(22, 'Class 12NA', ' Age limit is 16-17 years old.', 'Active', 1, 4),
(23, 'Class 12NS', ' Age limit is 16-17 years old.', 'Active', 1, 4),
(24, 'Class 12NC', ' Age limit is 16-17 years old.', 'Active', 1, 4),
(25, 'Class 13NA', ' Age limit is 17-18 years old.', 'Active', 1, 4),
(26, 'Class 13NS', ' Age limit is 17-18 years old.', 'Active', 1, 4),
(27, 'Class 13NC', ' Age limit is 17-18 years old.', 'Active', 1, 4);
