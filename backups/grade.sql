-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2016 at 07:37 AM
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
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `gr_id` int(10) NOT NULL AUTO_INCREMENT,
  `gr_name` int(75) NOT NULL,
  `gr_description` varchar(225) NOT NULL,
  `gr_status` varchar(225) NOT NULL,
  `sec_id` int(11) NOT NULL,
  PRIMARY KEY (`gr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gr_id`, `gr_name`, `gr_description`, `gr_status`, `sec_id`) VALUES
(1, 1, 'Age limit is 5-6 years old.', 'Active', 1),
(2, 2, 'Age limit is 6-7 years old.', 'Active', 1),
(3, 3, 'Age limit is 7-8 years old.', 'Active', 1),
(4, 4, 'Age limit is 8-9 years old.', 'Active', 1),
(5, 5, 'Age limit is 9-10 years old.	', 'Active', 1),
(6, 6, 'Age limit is 10-11 years old.', 'Active', 2),
(7, 7, 'Age limit is 11-12 years old.', 'Active', 2),
(8, 8, 'Age limit is 12-13 years old.', 'Active', 2),
(9, 9, 'Age limit is 13-14 years old.	', 'Active', 2),
(10, 10, 'Age limit is 14-15 years old.', 'Active', 3),
(11, 11, 'Age limit is 15-16 years old.	', 'Active', 3),
(12, 12, 'Age limit is 16-17 years old.', 'Active', 4),
(13, 13, 'Age limit is 17-18 years old.', 'Active', 4);
