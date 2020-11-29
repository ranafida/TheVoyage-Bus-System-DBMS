-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 28, 2020 at 09:28 AM
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
  `petrol` int(11) NOT NULL,
  `maintenance` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`ID`, `Bus_type`, `Liscense_no`, `Assigned_driver`, `condition_or`, `recent_trips`, `Bus_capacity`, `Fuel_condition`, `state`, `petrol`, `maintenance`, `cost`) VALUES
(15, 'Premium', '321-321-321', 'Basit_Shafiq', 'Normal', 'Os', 170, 'Good', 'Zoom', 0, 0, 0),
(1, 'Premium', 'lex', 'Rosh', 'new', '5', 50, 'full', 'new', 5000, 5000, 10000),
(2, 'business', 'lof', 'Fida', 'new', '5', 90, 'excellent', 'new', 6000, 5000, 11000);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `driverID` int(11) NOT NULL AUTO_INCREMENT,
  `busID` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `drivingType` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`driverID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverID`, `busID`, `salary`, `drivingType`, `username`, `password`, `email`) VALUES
(1, 15, 10, 'Premium', 'Roshan', '12345', 'roshujontra@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `name` varchar(50) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL,
  `ticket_holder_name` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `departure` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `busID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_holder_name`, `time`, `destination`, `departure`, `price`, `date`, `busID`) VALUES
(110, 'Fida', '10.00', 'Lahore', 'Karachi', 3000, '26-11-2020', 1),
(111, 'Alina', '11.00', 'Lahore', 'Karachi', 3000, '26-11-2020', 1),
(110, 'Fida', '12.00', 'Faisalabad', 'Lahore', 1600, '25-11-2020', 1),
(110, 'Fida', '10.00', 'Lahore', 'Karachi', 1600, '26-11-2020', 2),
(110, 'Fida', '10.00', 'Lahore', 'Karachi', 1600, '26-11-2020', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `trip_id` int(11) NOT NULL,
  `pickup_location` varchar(50) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `dropoff_location` varchar(50) NOT NULL,
  `no_passengers` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `pickup_location`, `driver_id`, `dropoff_location`, `no_passengers`, `bus_id`, `time`, `date`, `status`) VALUES
(11, 'Lahore', 15, 'Karachi', 20, 1, '11', '07-11-2020', 'Upcoming'),
(1, 'Lahore', 15, 'Karachi', 20, 1, '10', '06-11-2018', 'current'),
(5, 'Lahore', 5, 'karachi', 20, 1, '12', '6-11-2000', 'completed');

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
