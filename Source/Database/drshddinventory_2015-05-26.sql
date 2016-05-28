-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2015 at 09:04 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drsbd_hdd_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_fujitsu`
--

CREATE TABLE IF NOT EXISTS `donor_fujitsu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donor_fujitsu`
--

INSERT INTO `donor_fujitsu` (`ID`, `TRACK_NO`, `PN`) VALUES
(1, 3, '123');

-- --------------------------------------------------------

--
-- Table structure for table `donor_hdd_inventory`
--

CREATE TABLE IF NOT EXISTS `donor_hdd_inventory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `MODEL_NAME` varchar(100) NOT NULL,
  `MODEL_NO` varchar(50) NOT NULL,
  `DATE` date NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `PCB` varchar(100) NOT NULL,
  `NOTE` text NOT NULL,
  `DTTM` datetime NOT NULL,
  `SYSTEM_DTTM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`),
  KEY `MODEL_NAME` (`MODEL_NAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `donor_hdd_inventory`
--

INSERT INTO `donor_hdd_inventory` (`ID`, `TRACK_NO`, `MODEL_NAME`, `MODEL_NO`, `DATE`, `COUNTRY`, `PCB`, `NOTE`, `DTTM`, `SYSTEM_DTTM`) VALUES
(1, 1, 'Hitachi/IBM', 'HI123', '2015-12-31', 'Bangladesh', '', 'Tets', '2015-05-20 16:05:26', '2015-05-20 14:21:26'),
(2, 2, 'Western Digital', 'WD123', '2015-05-20', 'Bangladesh', '123', 'Test', '2015-05-20 16:05:53', '2015-05-20 14:23:53'),
(10, 3, 'Fujitsu', 'F123', '2015-05-13', 'Bangladesh', '123', 'F123', '2015-05-20 16:05:32', '2015-05-20 14:35:32'),
(11, 4, 'Hitachi/IBM', 'HI098', '2015-05-13', 'Bangladesh', '', 'Test', '2015-05-20 16:05:40', '2015-05-20 14:33:40'),
(12, 5, 'Seagate', 'SE123', '2015-05-20', 'Bangladesh', '123', '123', '2015-05-20 16:05:03', '2015-05-20 14:36:03'),
(13, 6, 'Toshiba', 'T123', '2015-12-31', 'Bahamas', '123', 'Test', '2015-05-20 16:05:37', '2015-05-20 14:40:37'),
(14, 7, 'Samsung', 'SM123', '2015-12-23', 'Bahamas', '123', 'Test', '2015-05-20 16:05:22', '2015-05-20 14:41:22'),
(15, 8, 'Western Digital', 'WD456', '2015-12-31', 'Bangladesh', '456', 'Test', '2015-05-20 16:05:09', '2015-05-20 14:42:09'),
(16, 9, 'Seagate', 'SE3434', '2015-01-31', 'American Samoa', '2343', 'dsf', '2015-05-20 16:05:11', '2015-05-20 14:52:11'),
(17, 10, 'Seagate', 'SE56765', '2015-12-31', 'Ã…land Islands', 'fdg', 'fdg', '2015-05-20 16:05:05', '2015-05-20 14:59:05'),
(18, 11, 'Hitachi/IBM', 'h7756', '2015-01-31', 'Ã…land Islands', '', 'gfhq', '2015-05-20 16:05:33', '2015-05-20 14:59:33'),
(24, 12, 'Hitachi/IBM', 'h7756', '2015-01-31', 'Ã…land Islands', '', 'gfhq', '2015-05-20 17:05:14', '2015-05-20 15:03:14'),
(25, 13, 'Hitachi/IBM', 'H456456', '2015-12-31', 'Bangladesh', '', 'fdgfdg', '2015-05-20 17:05:25', '2015-05-20 15:07:25'),
(29, 14, 'Hitachi/IBM', 'H456456', '2015-12-31', 'Bangladesh', '', 'fdgfdg', '2015-05-20 17:05:08', '2015-05-20 15:09:08'),
(30, 15, 'Seagate', 'gffghfg', '2015-12-31', 'Saint Helena', 'dsf', 'sdf', '2015-05-20 17:05:34', '2015-05-20 15:09:34'),
(31, 16, 'Seagate', 'dsff', '2014-12-31', 'Ã…land Islands', '6756', 'dsf', '2015-05-20 17:05:37', '2015-05-20 15:22:37'),
(32, 17, 'Western Digital', 'dfg', '2015-12-31', 'Afghanistan', 'fdg', 'dfg', '2015-05-20 17:05:30', '2015-05-20 15:25:30'),
(33, 18, 'Hitachi/IBM', 'dfgdfg', '2015-12-31', 'Albania', '', 'dfgfdg', '2015-05-20 17:05:14', '2015-05-20 15:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `donor_hitachi_ibm`
--

CREATE TABLE IF NOT EXISTS `donor_hitachi_ibm` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  `MLC` varchar(100) NOT NULL,
  `PCB_STICKER` varchar(100) NOT NULL,
  `MCU` varchar(100) NOT NULL,
  `SMOOTH` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donor_pcb_hitachi_ibm`
--

CREATE TABLE IF NOT EXISTS `donor_pcb_hitachi_ibm` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `MCU` varchar(100) NOT NULL,
  `SMOOTH` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donor_pcb_hitachi_ibm`
--

INSERT INTO `donor_pcb_hitachi_ibm` (`ID`, `TRACK_NO`, `MCU`, `SMOOTH`) VALUES
(1, 4, 'fdsf', 'sdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `donor_pcb_inventory`
--

CREATE TABLE IF NOT EXISTS `donor_pcb_inventory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `MODEL_NAME` varchar(100) NOT NULL,
  `PCB_NO` varchar(100) NOT NULL,
  `NOTE` text NOT NULL,
  `DTTM` datetime NOT NULL,
  `UPDATE_DTTM` datetime NOT NULL,
  `SYSTEM_DTTM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donor_pcb_inventory`
--

INSERT INTO `donor_pcb_inventory` (`ID`, `TRACK_NO`, `MODEL_NAME`, `PCB_NO`, `NOTE`, `DTTM`, `UPDATE_DTTM`, `SYSTEM_DTTM`) VALUES
(1, 1, 'Western Digital', 'sdfsdf', 'sdfd', '2015-05-20 17:05:11', '0000-00-00 00:00:00', '2015-05-20 15:31:11'),
(2, 2, 'Seagate', 'sdfds', 'sdfsd', '2015-05-20 17:05:41', '0000-00-00 00:00:00', '2015-05-20 15:31:41'),
(3, 3, 'Samsung', 'fdgf', 'dfsf', '2015-05-20 17:05:21', '0000-00-00 00:00:00', '2015-05-20 15:33:21'),
(4, 4, 'Hitachi/IBM', '', 'sdfds', '2015-05-20 17:05:38', '0000-00-00 00:00:00', '2015-05-20 15:33:38'),
(5, 5, 'Fujitsu', 'sdfdsf', 'dsfdsf', '2015-05-20 17:05:52', '0000-00-00 00:00:00', '2015-05-20 15:33:52'),
(6, 6, 'Toshiba', 'sdfdsf', 'sdfds', '2015-05-20 17:05:01', '0000-00-00 00:00:00', '2015-05-20 15:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `donor_samsung`
--

CREATE TABLE IF NOT EXISTS `donor_samsung` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  `FW` varchar(100) NOT NULL,
  `REV` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACH_NO` (`TRACK_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donor_samsung`
--

INSERT INTO `donor_samsung` (`ID`, `TRACK_NO`, `PN`, `FW`, `REV`) VALUES
(1, 7, '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `donor_seagate`
--

CREATE TABLE IF NOT EXISTS `donor_seagate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `P/N` varchar(100) NOT NULL,
  `FW` varchar(100) NOT NULL,
  `SITE_CODE` varchar(100) NOT NULL,
  `PCB_STICKER` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `donor_toshiba`
--

CREATE TABLE IF NOT EXISTS `donor_toshiba` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `SN` varchar(100) NOT NULL,
  `HDD_CODE` varchar(100) NOT NULL,
  `FW` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `donor_toshiba`
--

INSERT INTO `donor_toshiba` (`ID`, `TRACK_NO`, `SN`, `HDD_CODE`, `FW`) VALUES
(1, 6, '123', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `donor_western_digital`
--

CREATE TABLE IF NOT EXISTS `donor_western_digital` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `SN` varchar(100) NOT NULL,
  `DCM` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `donor_western_digital`
--

INSERT INTO `donor_western_digital` (`ID`, `TRACK_NO`, `SN`, `DCM`) VALUES
(1, 8, '456', '456'),
(2, 17, 'dfg', 'dfgd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FULL_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `USER_TYPE` enum('SUPER_ADMIN','ADMIN','MANAGER') NOT NULL,
  `AUTHENTICATION` varchar(200) NOT NULL,
  `ENTRY_BY` varchar(50) NOT NULL,
  `ENTRY_DTTM` datetime NOT NULL,
  `SYSTEM_DTTM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `HOST_IP` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USERNAME` (`USERNAME`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FULL_NAME`, `EMAIL`, `USERNAME`, `PASSWORD`, `USER_TYPE`, `AUTHENTICATION`, `ENTRY_BY`, `ENTRY_DTTM`, `SYSTEM_DTTM`, `HOST_IP`) VALUES
(2, 'Md. Sabbir Ahamed', 'sabbiryan@gmail.com', 'sabbir', 'caf1a3dfb505ffed0d024130f58c5cfa', 'SUPER_ADMIN', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Md. Sabbir Ahamed', '2014-12-21 17:12:49', '2014-12-21 17:10:49', '::1'),
(7, 'Mahabub Hossian Shahi', 'shahi@drsbd.biz', 'shahi', '202cb962ac59075b964b07152d234b70', 'ADMIN', '202cb962ac59075b964b07152d234b70', 'sabbir', '2014-12-22 15:12:17', '2014-12-22 15:15:17', '::1'),
(8, 'Drsbd Manager', 'manager@drsbd.vom', 'manager', '202cb962ac59075b964b07152d234b70', 'MANAGER', '202cb962ac59075b964b07152d234b70', 'shahi', '2014-12-22 17:12:53', '2014-12-22 17:19:53', '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
