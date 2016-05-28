-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg26.eigbox.net
-- Generation Time: Jun 02, 2015 at 07:40 PM
-- Server version: 5.5.41
-- PHP Version: 4.4.9
-- 
-- Database: `drshddinventory`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_FUJITSU`
-- 

CREATE TABLE `DONOR_FUJITSU` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `DONOR_FUJITSU`
-- 

INSERT INTO `DONOR_FUJITSU` VALUES (1, 7, 'dfg');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_HDD_INVENTORY`
-- 

CREATE TABLE `DONOR_HDD_INVENTORY` (
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `DONOR_HDD_INVENTORY`
-- 

INSERT INTO `DONOR_HDD_INVENTORY` VALUES (1, 1, 'Western Digital', 'WD123', '2015-12-31', 'Afghanistan', 'test', 'test', '2015-06-02 18:06:30', '2015-06-02 18:46:30');
INSERT INTO `DONOR_HDD_INVENTORY` VALUES (2, 2, 'Seagate', 'SE123', '2015-12-31', 'Ã…land Islands', 'test', 'SE123', '2015-06-02 18:06:02', '2015-06-02 18:50:02');
INSERT INTO `DONOR_HDD_INVENTORY` VALUES (3, 3, 'Samsung', 'SA123', '2015-12-31', 'Ã…land Islands', 'test', 'test', '2015-06-02 18:06:36', '2015-06-02 18:52:36');
INSERT INTO `DONOR_HDD_INVENTORY` VALUES (4, 4, 'Hitachi/IBM', 'HI123', '2015-12-31', 'Albania', '123', 'HI123', '2015-06-02 19:06:23', '2015-06-02 19:06:23');
INSERT INTO `DONOR_HDD_INVENTORY` VALUES (6, 6, 'Hitachi/IBM', 'Testdfgfdg', '2015-12-31', 'Ã…land Islands', '123', 'Testdfgfdg', '2015-06-02 19:06:50', '2015-06-02 19:06:50');
INSERT INTO `DONOR_HDD_INVENTORY` VALUES (7, 7, 'Fujitsu', 'dfg', '2015-12-31', 'Ã…land Islands', 'dfg', 'dfg', '2015-06-02 19:06:18', '2015-06-02 19:03:18');
INSERT INTO `DONOR_HDD_INVENTORY` VALUES (8, 8, 'Toshiba', 'gdfgd', '2015-12-31', 'Afghanistan', '123', 'sdf', '2015-06-02 19:06:37', '2015-06-02 19:03:37');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_HITACHI_IBM`
-- 

CREATE TABLE `DONOR_HITACHI_IBM` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  `MLC` varchar(100) NOT NULL,
  `PCB_STICKER` varchar(100) NOT NULL,
  `MCU` varchar(100) NOT NULL,
  `SMOOTH` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `DONOR_HITACHI_IBM`
-- 

INSERT INTO `DONOR_HITACHI_IBM` VALUES (1, 4, 'test', 'test', 'test', 'test', 'test');
INSERT INTO `DONOR_HITACHI_IBM` VALUES (3, 6, 'dfd', 'dd', 'dd', 'ee', 'dd');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_PCB_HITACHI_IBM`
-- 

CREATE TABLE `DONOR_PCB_HITACHI_IBM` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `MCU` varchar(100) NOT NULL,
  `SMOOTH` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `DONOR_PCB_HITACHI_IBM`
-- 

INSERT INTO `DONOR_PCB_HITACHI_IBM` VALUES (1, 4, 'HI123', 'HI123');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_PCB_INVENTORY`
-- 

CREATE TABLE `DONOR_PCB_INVENTORY` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `DONOR_PCB_INVENTORY`
-- 

INSERT INTO `DONOR_PCB_INVENTORY` VALUES (2, 2, 'Seagate', 'SE123', 'test', '2015-06-02 18:06:49', '0000-00-00 00:00:00', '2015-06-02 18:43:49');
INSERT INTO `DONOR_PCB_INVENTORY` VALUES (3, 3, 'Samsung', 'SA123', 'test', '2015-06-02 18:06:05', '0000-00-00 00:00:00', '2015-06-02 18:44:05');
INSERT INTO `DONOR_PCB_INVENTORY` VALUES (4, 4, 'Hitachi/IBM', '', 'test', '2015-06-02 18:06:27', '0000-00-00 00:00:00', '2015-06-02 18:44:27');
INSERT INTO `DONOR_PCB_INVENTORY` VALUES (5, 5, 'Fujitsu', 'FU123', 'test', '2015-06-02 18:06:44', '0000-00-00 00:00:00', '2015-06-02 18:44:44');
INSERT INTO `DONOR_PCB_INVENTORY` VALUES (6, 6, 'Toshiba', 'TO123', '123', '2015-06-02 18:06:00', '0000-00-00 00:00:00', '2015-06-02 18:45:00');
INSERT INTO `DONOR_PCB_INVENTORY` VALUES (7, 7, 'Western Digital', 'WD123', 'test', '2015-06-02 18:06:51', '0000-00-00 00:00:00', '2015-06-02 18:45:51');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_SAMSUNG`
-- 

CREATE TABLE `DONOR_SAMSUNG` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  `FW` varchar(100) NOT NULL,
  `REV` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACH_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `DONOR_SAMSUNG`
-- 

INSERT INTO `DONOR_SAMSUNG` VALUES (1, 3, 'test', 'test', 'test');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_SEAGATE`
-- 

CREATE TABLE `DONOR_SEAGATE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `PN` varchar(100) NOT NULL,
  `FW` varchar(100) NOT NULL,
  `SITE_CODE` varchar(100) NOT NULL,
  `PCB_STICKER` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `DONOR_SEAGATE`
-- 

INSERT INTO `DONOR_SEAGATE` VALUES (1, 2, 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_TOSHIBA`
-- 

CREATE TABLE `DONOR_TOSHIBA` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `SN` varchar(100) NOT NULL,
  `HDD_CODE` varchar(100) NOT NULL,
  `FW` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `DONOR_TOSHIBA`
-- 

INSERT INTO `DONOR_TOSHIBA` VALUES (1, 8, 'sdfs', '4r34', '123');

-- --------------------------------------------------------

-- 
-- Table structure for table `DONOR_WESTERN_DIGITAL`
-- 

CREATE TABLE `DONOR_WESTERN_DIGITAL` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRACK_NO` int(11) NOT NULL,
  `SN` varchar(100) NOT NULL,
  `DCM` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `TRACK_NO` (`TRACK_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `DONOR_WESTERN_DIGITAL`
-- 

INSERT INTO `DONOR_WESTERN_DIGITAL` VALUES (3, 1, '12312', 'wer');

-- --------------------------------------------------------

-- 
-- Table structure for table `USER`
-- 

CREATE TABLE `USER` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `USER`
-- 

INSERT INTO `USER` VALUES (2, 'Md. Sabbir Ahamed', 'sabbiryan@gmail.com', 'sabbir', 'caf1a3dfb505ffed0d024130f58c5cfa', 'SUPER_ADMIN', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Md. Sabbir Ahamed', '2014-12-21 17:12:49', '2014-12-21 12:10:49', '::1');
INSERT INTO `USER` VALUES (7, 'Mahabub Hossian Shahi', 'shahi@drsbd.biz', 'shahi', '202cb962ac59075b964b07152d234b70', 'ADMIN', '202cb962ac59075b964b07152d234b70', 'sabbir', '2014-12-22 15:12:17', '2014-12-22 10:15:17', '::1');
INSERT INTO `USER` VALUES (10, 'DRS Manager', 'manager@drs.com', 'manager', '202cb962ac59075b964b07152d234b70', 'MANAGER', '202cb962ac59075b964b07152d234b70', 'manager', '2015-06-02 19:06:19', '2015-06-02 19:26:19', '103.250.71.195');
