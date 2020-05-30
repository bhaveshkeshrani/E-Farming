-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 07:55 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `topid` int(11) NOT NULL,
  `topname` varchar(200) NOT NULL,
  `topdesc` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(15) NOT NULL,
  `name` char(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'bhavesh', 'bhaveshkeshrani10@gmail.com', 'bhavesh', 'nkt'),
(2, 'hemant', 'hemant@gmail.com', 'hemant', 'nkt'),
(3, 'vijay', 'vijay@gmail.com', 'vijay', 'bhuj'),
(4, 'bansi', 'bansi@gmail.com', 'bansi', 'pune'),
(6, 'Dipak', 'dipakdude777@gmail.com', '111', '47,changleswhar soiety,pramukhswami nagar'),
(9, 'vijay', 'vijay@gmail.com', 'vijay', 'tiger nagar junavas');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
`did` int(15) NOT NULL,
  `ddesc` varchar(25) NOT NULL,
  `dstatus` bit(1) NOT NULL,
  `fid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE IF NOT EXISTS `farm` (
`fid` int(10) NOT NULL,
  `device_loc` text NOT NULL,
  `longi` float NOT NULL,
  `lati` float NOT NULL,
  `valves` int(3) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`fid`, `device_loc`, `longi`, `lati`, `valves`, `address`) VALUES
(1, '192.168.0.2', 73.8567, 18.5204, 7, 'nakhatarana'),
(10, '192.168.0.2', 69.35, 22.83, 2, 'nkt');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`mid` int(11) NOT NULL,
  `header` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `header`, `msg`, `time`, `status`) VALUES
(25, 'monsoon', 'rainy season', '2016-10-14 15:54:27', 0),
(26, 'sunlight', 'humidity is low', '2016-10-14 14:12:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`pid` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `paddress` varchar(35) NOT NULL,
  `contact` text NOT NULL,
  `fid` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pid`, `email`, `password`, `pname`, `paddress`, `contact`, `fid`) VALUES
(11, 'bhavesh@gmail.com', 'bhavesh', 'bhavesh', 'nkt', '9850503343', 10),
(13, 'vijay@gmail.com', 'vijay', 'vijay', 'bhuj', '9879282238', 11),
(14, 'mehul@gmai.com', 'mehul', 'mehul', 'bhuj', '8460203320', 12);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
`tid` int(11) NOT NULL,
  `header` varchar(100) NOT NULL,
  `desc` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`tid`, `header`, `desc`) VALUES
(1, 'Introduction', 'This following sets out the terms and conditions on which you may use the content on efarming,om website efarming website helps you in carrying out the communication with the valve present at farm also you can control it from this website also allows you to see the status of the farms in terms of temperature,humidity etc.all the services herein will be referred to as Business Standard Content Services.');

-- --------------------------------------------------------

--
-- Table structure for table `valve`
--

CREATE TABLE IF NOT EXISTS `valve` (
`vid` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `last_chng` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autoon` time NOT NULL DEFAULT '00:00:00',
  `autooff` time NOT NULL DEFAULT '00:00:00',
  `status` tinyint(1) NOT NULL,
  `fid` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `valve`
--

INSERT INTO `valve` (`vid`, `desc`, `last_chng`, `autoon`, `autooff`, `status`, `fid`) VALUES
(68, '03', '2016-10-11 13:56:33', '18:52:00', '18:52:00', 1, 1),
(70, '05', '2016-10-11 13:55:29', '16:45:00', '18:52:00', 1, 1),
(71, '06', '2016-10-11 13:55:00', '16:45:00', '16:06:00', 1, 1),
(72, '07', '2016-10-11 13:55:07', '16:45:00', '16:06:00', 1, 1),
(73, '08', '2016-10-11 13:55:12', '16:45:00', '16:06:00', 1, 1),
(94, '02', '2016-10-11 14:05:30', '00:00:00', '00:00:00', 1, 11),
(95, '02', '2016-10-14 10:27:10', '15:57:00', '15:58:00', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
 ADD PRIMARY KEY (`did`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
 ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `valve`
--
ALTER TABLE `valve`
 ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
MODIFY `did` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `pid` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `valve`
--
ALTER TABLE `valve`
MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
