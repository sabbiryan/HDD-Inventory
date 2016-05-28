-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2015 at 07:46 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drsbd_hdd_inventory`
--
CREATE DATABASE IF NOT EXISTS `drsbd_hdd_inventory` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `drsbd_hdd_inventory`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `AUTHENTICATION` int(11) NOT NULL,
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
(2, 'Md. Sabbir Ahamed', 'sabbiryan@gmail.com', 'sabbir', '123', 'SUPER_ADMIN', 123, 'Md. Sabbir Ahamed', '2014-12-21 17:12:49', '2014-12-21 17:10:49', '::1'),
(7, 'Mahabub Hossian Shahi', 'shahi@drsbd.biz', 'shahi', '123', 'ADMIN', 123, 'sabbir', '2014-12-22 15:12:17', '2014-12-22 15:15:17', '::1'),
(8, 'Drsbd Manager', 'manager@drsbd.vom', 'manager', '123', 'MANAGER', 123, 'shahi', '2014-12-22 17:12:53', '2014-12-22 17:19:53', '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
