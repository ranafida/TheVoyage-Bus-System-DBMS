-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 21, 2020 at 06:33 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohid_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('Mohid', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Bus_type` varchar(50) NOT NULL,
  `Liscense_no` varchar(50) NOT NULL,
  `Assigned_driver` varchar(50) NOT NULL,
  `condition_or` varchar(50) NOT NULL,
  `recent_trips` varchar(50) NOT NULL,
  `Bus_capacity` int(11) NOT NULL,
  `Fuel_condition` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`ID`, `Bus_type`, `Liscense_no`, `Assigned_driver`, `condition_or`, `recent_trips`, `Bus_capacity`, `Fuel_condition`, `state`) VALUES
(15, 'Premium', '321-321-321', 'Basit_Shafiq', 'Normal', 'Os', 170, 'Good', 'Zoom');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `name`, `birthday`, `city`, `gender`, `phone_number`) VALUES
(18, 'kareem', '890', 'kareemDAd', '20-7-1999', 'karachi', 'male', '0320xxxxxxx'),
(17, 'shiffa', '789', 'shiffa UR rehman', '6-12-1999', 'lahore', 'male', '03364213881'),
(16, 'shiffa', '789', 'shiffa UR rehman', '6-12-1999', 'lahore', 'male', '03364213881'),
(15, 'fida', '456', 'fida hussain', '10-08-2000', 'Lahore', 'male', '03174105180'),
(14, 'mohid', '123', 'mohid', '16-11-1999', 'lahore', 'Male', '03203543535'),
(19, 'Roshi', 'Hentai', 'Roshan Gujjar', '12-12-1912', 'Gujrat', 'male', '0333333333');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
