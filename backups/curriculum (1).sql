-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2016 at 10:16 AM
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
-- Table structure for table `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `cur_id` int(11) NOT NULL AUTO_INCREMENT,
  `cur_name` varchar(45) NOT NULL,
  `gr_start` int(2) NOT NULL,
  `gr_end` int(2) NOT NULL,
  `cur_description` varchar(2000) DEFAULT NULL,
  `cur_status` varchar(45) NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`cur_id`, `cur_name`, `gr_start`, `gr_end`, `cur_description`, `cur_status`) VALUES
(1, 'National ', 1, 13, 'The National curriculum is based on Sri Lankan national curriculum.It is divided into five parts as Primary, Junior Secondary, Senior Secondary, Collegiate and Tertiary.  Primary education lasts for 5 to 6 years (Grade 1-5), Junior/Secondary lasts for 4 years (Grade 6-9), Senior Secondary lasts for 2 years (Grade 10-11) in preparation for the GCE O/Levels. Students must pass GCE O/Levels to enter the collegiate level and study for another 2 years (Grades 12-13) to sit for GCE A/Levels which is the university entrance examination. It is optional for students to sit the scholarship examination during the final year of the Primary School (Grade 5) and based on the marks of this extremely competitive examination the students may get an opportunity to get transferred to a prominent national school.', 'Active'),
(2, 'Cambridge', 1, 10, 'Cambridge curriculum offers routes learners can follow from post Primary Stage through to University entrance.Cambridge Primary gives schools a curriculum framework to develop English, Mathematics and Science skills, knowledge and understanding in younger learners and provides guidance for curriculum development and classroom teaching and learning enabling teachers to assess children''s learning. Cambridge Secondary 1 provides a seamless progression from Cambridge Primary to develop learners'' skills and confidence in English, Mathematics and Science and offers a curriculum framework for educational success for learners, typically 11-14 year olds.Cambridge Secondary 2 is a popular curriculum for 14-16 year olds leading to globally recognised Cambridge IGCSE and O/Level qualifications which provide excellent preparation for Cambridge Advanced Stage including Cambridge International AS and A/Levels and incorporate the best in international education for learners at this level. Cambridge IGCSE encourages learner-centred and inquiry-based approaches to learning. Cambridge International AS and A/Levels are internationally benchmarked qualifications providing excellent preparation for University education. They are part of the Cambridge Advanced Stage. ', 'Active'),
(3, 'Edexcel', 1, 10, 'Presently we are not conducting the  Edexcel Curriculum.', 'Deactive'),
(17, 'BIT', 2, 10, 'aaa', 'Active');
