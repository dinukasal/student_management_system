-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2016 at 04:04 PM
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
  `cl_location` varchar(225) NOT NULL,
  `cl_teacher` varchar(225) NOT NULL,
  `no_of_students` int(11) NOT NULL,
  `cl_description` varchar(225) DEFAULT NULL,
  `cl_status` varchar(45) DEFAULT NULL,
  `gr_id` int(11) NOT NULL,
  `gc_id` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl_id`, `cl_name`, `cl_location`, `cl_teacher`, `no_of_students`, `cl_description`, `cl_status`, `gr_id`, `gc_id`) VALUES
(1, 'Class 1NA', 'Block O-A-1', 'Ms.Jayani Samarakoon', 20, 'Age limit is 5-6 years old.', 'Active', 1, 1),
(2, 'Class 1LA', 'Block B-A-1', 'Ms.Champika Suraweera', 15, ' Age limit is 6-7 years old.', 'Active', 1, 14),
(3, 'Class 2N', 'Block O-A-4', 'Ms.Nirosha Abepitiya', 20, ' Age limit is 6-7 years old.', 'Active', 2, 2),
(4, 'Class 2L', 'B-A-4', 'Ms.Farha Nuzrath', 20, ' Age limit is 7-8 years old.', 'Active', 2, 15),
(5, 'Class 3N', 'Block O-A-7', 'Ms.Tharanga Perera', 25, ' Age limit is 7-8 years old.', 'Active', 3, 3),
(6, 'Class 3L', 'B-A-7', 'Ms.Nishadi  Nanayakkara', 25, ' Age limit is 8-9 years old.', 'Active', 3, 16),
(7, 'Class 4N', 'Block O-B-1', 'Ms.Chamalee Wasala', 25, ' Age limit is 8-9 years old.', 'Active', 4, 4),
(8, 'Class 4L', 'B-B-1', 'Ms.Amila Perera', 25, ' Age limit is 9-10 years old.', 'Active', 4, 17),
(9, 'Class 5N', 'Block O-B-4', 'NMs.Lakmini Subasighe', 25, ' Age limit is 9-10years old.', 'Deactive', 5, 5),
(10, 'Class 5L', 'B-B-4', 'Ms.Chamalee Herath', 25, ' Age limit is 10-11 years old.', 'Active', 5, 18),
(11, 'Class 6N', 'Block O-B-7', 'Ms.Tania Blackett', 25, ' Age limit is 10-11 years old.', 'Active', 6, 6),
(12, 'Class 6L', 'B-B-7', 'Ms.Suharda Peris', 25, ' Age limit is 11-12 years old.', 'Active', 6, 19),
(13, 'Class 7N', 'Block O-C-1', 'Ms.Dilshara Athapattu', 25, ' Age limit is 11-12 years old.', 'Active', 7, 7),
(14, ' Class 7L', 'B-C-1', 'Ms.Subha Senevirathna', 25, ' Age limit is 12-13 years old.', 'Active', 7, 20),
(15, 'Class 8N', 'Block O-C-4', 'Ms.Lakshika Siriwardahna', 25, ' Age limit is 12-13 years old.', 'Active', 8, 8),
(16, 'Class 8L', 'B-C-4', 'Mr.Rislan shanon', 25, ' Age limit is 13-14 years old.', 'Active', 8, 21),
(17, 'Class 9N', 'Block O-C-7', 'Ms.Kethaki De Silva', 25, ' Age limit is 13-14 years old.', 'Active', 9, 9),
(18, 'Class 9L', 'B-C-7', 'Ms.Rasanjalee Perera', 25, ' Age limit is 14-15 years old.', 'Active', 9, 22),
(19, 'Class 10N', 'Block O-D-1', 'Ms.Achini Marasigha', 25, ' Age limit is 14-15 years old.', 'Active', 10, 10),
(20, 'Class 10L', 'B-C-10', 'Ms.Samudika Weththasighe', 25, ' Age limit is 15-16 years old.', 'Active', 10, 23),
(21, 'Class 11N', 'Block O-D-4', 'Mr.Thushara Trevin', 25, ' Age limit is 15-16 years old.', 'Active', 11, 11),
(22, 'Class 12NA', 'Block O-D-7', 'Ms.Nelum Wijesekara', 25, ' Age limit is 16-17 years old.', 'Active', 12, 12),
(23, 'Class 12NS', 'Block O-D-8', 'Ms.Sureka Galapaththi', 25, ' Age limit is 16-17 years old.', 'Active', 12, 12),
(24, 'Class 12NC', 'Block O-D-9', 'Mr.Prasad Munasigha', 25, ' Age limit is 16-17 years old.', 'Active', 12, 12),
(25, 'Class 13NA', 'Block O-D-10', 'Ms.Oshadi Managoda', 25, ' Age limit is 17-18 years old.', 'Active', 13, 13),
(26, 'Class 13NS', 'Block O-D-11', 'Mr.Bandusena', 25, ' Age limit is 17-18 years old.', 'Active', 13, 13),
(27, 'Class 13NC', 'Block O-D-12', 'Ms.Thilini Jayaweera', 25, ' Age limit is 17-18 years old.', 'Active', 13, 13);
