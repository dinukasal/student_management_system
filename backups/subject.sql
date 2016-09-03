-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2016 at 05:02 AM
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
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_title` varchar(45) NOT NULL,
  `sub_description` varchar(45) DEFAULT NULL,
  `sub_status` varchar(45) NOT NULL,
  `cl_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`,`cl_id`),
  KEY `fk_subject_class1` (`cl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_title`, `sub_description`, `sub_status`, `cl_id`) VALUES
(11, 'Mathematics', 'Designed for age limit 5-6', 'Active', 1),
(12, 'Science', 'Designed for age limit 5-6', 'Active', 1),
(13, 'Computing', 'Designed for age limit 5-6', 'Deactive', 1),
(21, 'Mathematics', 'Designed for age limit 6-7', 'Active', 3),
(22, 'English', 'Designed for age limit 5-6', 'Active', 3),
(23, 'Art', 'Designed for age limit 5-6', 'Active', 2),
(24, 'Music', 'Designed for age limit 5-6', 'Active', 2),
(25, 'ENV', 'Designed for age limit 5-6', 'Active ', 2);
