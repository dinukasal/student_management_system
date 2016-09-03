-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2016 at 07:39 PM
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
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_title` varchar(5) NOT NULL,
  `st_fname` varchar(75) NOT NULL,
  `st_lname` varchar(225) NOT NULL,
  `photo` text NOT NULL,
  `st_password` text NOT NULL,
  `st_address1` varchar(45) DEFAULT NULL,
  `st_address2` varchar(45) DEFAULT NULL,
  `st_address3` varchar(45) DEFAULT NULL,
  `st_contact_no1` int(11) NOT NULL,
  `st_contact_no2` int(11) DEFAULT NULL,
  `st_email` varchar(45) DEFAULT NULL,
  `st_nic` text NOT NULL,
  `st_dob` date NOT NULL,
  `st_gender` varchar(45) NOT NULL,
  `st_city` varchar(45) NOT NULL,
  `district_id` int(45) NOT NULL,
  `st_status` varchar(45) DEFAULT NULL,
  `st_r_id` int(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_id`, `st_title`, `st_fname`, `st_lname`, `photo`, `st_password`, `st_address1`, `st_address2`, `st_address3`, `st_contact_no1`, `st_contact_no2`, `st_email`, `st_nic`, `st_dob`, `st_gender`, `st_city`, `district_id`, `st_status`, `st_r_id`) VALUES
(1, 'Ms', 'Sameera', 'Madushani', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'No 363/a', 'Main Street', 'Hanwella', 775365342, 362254058, 'sameera@gmail.com', '645583645v', '1990-01-31', 'Female', 'Hanwella', 1, 'Active', 1),
(2, 'Mrs', 'Stella', 'Marapana', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'No 141', 'School lane', 'Maharagama', 779824367, 112846678, 'stella@gmail.com', '765374987v', '1976-11-20', 'Female', 'Maharagama', 1, 'Active', 2),
(3, 'Mrs', 'Sandya', 'Jayarathne', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'No 85', 'Kirula road', 'Piliyandala', 775365342, 115746438, 'sandya@gmail.com', '715549836v', '1971-07-14', 'Female', 'Piliyadala', 0, 'Deactive', 3),
(4, 'Ms', 'Nelum', 'Wijesekara', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'No 293', 'Pannipitiya', 'Kottawa', 779824366, 112846623, 'nelum@gmail.com', '804635243v', '1980-05-18', 'Female', 'Kottawa', 0, 'Active', 4),
(5, 'Mr', 'Thushara', 'Trevin', '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'No 674', 'Cross Road', 'Malapalla', 112274542, 772637473, 'thushara@gmail.com', '805313754v', '1980-01-31', 'Male', 'Kottawa', 0, 'Active', 5),
(6, 'MS', 'Chamaleeeee', 'Herath', '_1234085_329762127161304_1743222126_n.jpg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nugegoda', 'Nugegoda', 'Nugegoda', 775365342, 112846678, 'chamalee@gmail.com', '698989898v', '1969-06-17', 'Female', 'Nugegoda', 1, 'Active', 4),
(7, 'MS', 'Adhithi', 'Bideesha', '_1.jpeg', '1234', 'No 183', 'Pothuarawa', 'Malabe', 11256767, 785678765, 'adhi@gmail.com', '901212121v', '1990-07-05', 'Female', 'dd', 5, 'Active', 5),
(8, 'MR', 'Avishka', 'ggggg', '_380196_4231740560211_964696245_n.jpg', '', 'Kaduwela', 'Kaduwela', 'Kaduwela', 776765456, 11245656, 'j@gmail.com', '801212121v', '1980-07-27', 'Male', 'Kaduwela', 1, 'Active', 5),
(9, 'MR', 'nkaaaa', 'jjhhhhh', '9_249108_562021663849646_37161764_n.jpg', '1234', 'kkk', 'kk', 'kk', 776765456, 1111111111, 'adhsi@gmail.com', '971212121v', '1997-07-05', 'Female', 'dd', 2, 'Active', 5),
(10, 'MS', 'Dilini', 'Fonseka', '10_109956.gif', '1234', 'No 183', 'ddddddddd', 'aaaaaaaaa', 1111111111, 1111111111, 'adhi@gmail.com', '901212199v', '1990-08-03', 'Female', 's', 3, 'Active', 0),
(11, 'MR', 'a', 'kk', '11_1798742_818321738185338_1295881173_n.jpg', '1234', 'www', 'aaaaaaaaa', 'aaaaaaaaa', 1111111111, 0, 'adhi@gmai', '901212121v', '1990-08-12', 'Female', 'dd', 2, 'Active', 5);
