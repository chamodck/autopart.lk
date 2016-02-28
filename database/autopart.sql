-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 at 07:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autopart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cardID` int(11) NOT NULL AUTO_INCREMENT,
  `partID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cardID`),
  KEY `partID` (`partID`,`username`),
  KEY `userID` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `subCategory` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`subCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`subCategory`, `category`) VALUES
('Air Filters', 'Performance'),
('Air Intake Systems', 'Performance'),
('Air Leveling Kit', 'Suspension'),
('Alternators', 'Replacement'),
('Ball Joints', 'Replacement'),
('Bed Liners & Mats', 'Exterior'),
('Bed Rails', 'Exterior'),
('Body Lift Kit', 'Suspension'),
('Brake Pads', 'Replacement'),
('Brake Rotors', 'Replacement'),
('Bug Deflectors', 'Exterior'),
('Bumper Covers', 'Exterior'),
('Bumpers', 'Replacement'),
('Car Covers', 'Exterior'),
('Carburetors', 'Performance'),
('Cargo Carriers', 'Exterior'),
('Catalytic Converters', 'Performance'),
('Clutches', 'Performance'),
('Coil Springs', 'Suspension'),
('Control Arms', 'Replacement'),
('Dash Covers', 'Interior'),
('Exhaust Systems', 'Performance'),
('Exhaust Tips', 'Performance'),
('Fender Flares', 'Exterior'),
('Fenders', 'Replacement'),
('Floor Liners/Mats', 'Interior'),
('Fuel Injection Kits', 'Performance'),
('Fuel Injection Pump', 'Performance'),
('Gas Tanks', 'Replacement'),
('Grille Assemblies', 'Replacement'),
('Grille Guards & Bull Bars', 'Exterior'),
('Header Panel', 'Replacement'),
('Headers', 'Performance'),
('Headlight Assemblies', 'Replacement'),
('Headlights', 'Exterior'),
('Hitches', 'Exterior'),
('Hood Scoops', 'Exterior'),
('Hoods', 'Replacement'),
('Hub Cap', 'Wheels and Tires'),
('Ignition Coil & Wire Sets', 'Performance'),
('Leaf Springs', 'Suspension'),
('Leveling Kits', 'Suspension'),
('Lowering Kits', 'Suspension'),
('Lowering Springs', 'Suspension'),
('Lug Nut', 'Wheels and Tires'),
('Mass Air Flow Sensors', 'Performance'),
('Mirrors', 'Exterior'),
('Mud Guards', 'Exterior'),
('Mufflers', 'Performance'),
('Nerf Bars', 'Exterior'),
('Oil Filters', 'Performance'),
('Oxygen Sensors', 'Replacement'),
('Power Programmers', 'Performance'),
('Radiators', 'Replacement'),
('Rocker Panel', 'Replacement'),
('Running Boards', 'Exterior'),
('Seat Covers', 'Interior'),
('Shocks', 'Suspension'),
('Spark Plugs', 'Replacement'),
('Starters', 'Replacement'),
('Suspension Lift Kit', 'Suspension'),
('Sway Bar', 'Suspension'),
('Sway Bar Bushing', 'Suspension'),
('Sway Bar Kit', 'Suspension'),
('Sway Bar Link Bushing', 'Suspension'),
('Taillight Assemblies', 'Replacement'),
('Taillights', 'Exterior'),
('Throttle Body', 'Performance'),
('Throttle Body Spacer', 'Performance'),
('Tonneau Covers', 'Exterior'),
('Wheel and Rims', 'Wheels and Tires'),
('Wheel Bearings and Hubs', 'Wheels and Tires'),
('Wheel Covers', 'Wheels and Tires'),
('Wheel Hub', 'Wheels and Tires'),
('Wheel Locks', 'Wheels and Tires');

-- --------------------------------------------------------

--
-- Table structure for table `fanswer`
--

CREATE TABLE IF NOT EXISTS `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `user` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  KEY `a_id` (`a_id`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fanswer`
--

INSERT INTO `fanswer` (`question_id`, `a_id`, `user`, `a_answer`, `a_datetime`) VALUES
(8, 1, 'chamod', 'you can go to search button and search\r\n', '21/11/15 10:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `fquestions`
--

CREATE TABLE IF NOT EXISTS `fquestions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user` varchar(65) NOT NULL DEFAULT '',
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `fquestions`
--

INSERT INTO `fquestions` (`id`, `user`, `topic`, `detail`, `datetime`, `view`, `reply`) VALUES
(10, 'chamod', 'ljkljk', 'ljklj', '21/11/15 10:39:01', 0, 0),
(12, 'miyuru', 'jlj', 'lj;kjlk', '24/11/15 10:45:32', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE IF NOT EXISTS `part` (
  `partID` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `username` varchar(60) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `year` varchar(4) NOT NULL,
  `madeby` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `submodel` varchar(50) NOT NULL,
  `engine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `numofphotos` int(2) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`partID`),
  KEY `userID` (`username`),
  KEY `subCategory` (`subcategory`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`partID`, `date`, `username`, `title`, `category`, `subcategory`, `year`, `madeby`, `model`, `submodel`, `engine`, `quantity`, `description`, `status`, `price`, `keyword`, `numofphotos`, `views`) VALUES
(1, '0000-00-00 00:00:00', 'chamod', '', 'Performance', 'Air Filters', '', '', '', '', '', 2, 'aaaaaaaaaaaaaaaaaddd', 'new', 5000, '', 0, 0),
(2, '0000-00-00 00:00:00', 'chamod', '', 'Replacement', 'Control Arms', '', '', '', '', '', 3, 'dexer ere re', 'Used', 6500, '', 0, 0),
(3, '0000-00-00 00:00:00', 'janith', '', 'Wheels and Tires', 'Wheel Hub', '', '', '', '', '', 5, 'Wheel hubs for Honda Civic', 'Brand New', 6000, '', 0, 0),
(4, '0000-00-00 00:00:00', 'chamod', '', 'Wheels and Tires', 'Wheel Hub', '', '', '', '', '', 1, 'Wheel hubs for Honda Civic', 'Used', 5000, '', 0, 0),
(5, '0000-00-00 00:00:00', 'miyuru', '', 'Wheels and Tires', 'Wheel Hub', '', '', '', '', '', 3, 'cvfvfd dfgfdg', 'Brand New', 5000, '', 0, 0),
(6, '0000-00-00 00:00:00', 'janith', '', 'Replacement', 'Spark Plugs', '', '', '', '', '', 10, 'spark plugs', 'Used', 5300, '', 0, 0),
(7, '0000-00-00 00:00:00', 'chamod', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, 'sfd dgfdgdf ', 'Brand New', 12000, '', 0, 0),
(9, '0000-00-00 00:00:00', 'janith', '', 'Wheels and Tires', 'Lug Nut', '', '', '', '', '', 14, 'fef dfdg updated2', 'Brand New', 9900, '', 0, 0),
(14, '0000-00-00 00:00:00', 'miyuru', '', 'Performance', 'Exhaust Tips', '', '', '', '', '', 1, 'dsvfgf hg ', 'Brand New', 1000, '', 0, 0),
(15, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(16, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Filters', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(17, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Filters', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(18, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Seat Covers', '', '', '', '', '', 1, '', 'Brand New', 500, '', 0, 0),
(19, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(20, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(21, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(22, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(23, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Rotors', '', '', '', '', '', 1, '', 'Brand New', 500, '', 0, 0),
(24, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 100, '', 0, 0),
(25, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Seat Covers', '', '', '', '', '', 1, '', 'Brand New', 100, '', 0, 0),
(26, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Catalytic Converters', '', '', '', '', '', 1, '', 'Brand New', 50, '', 0, 0),
(27, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 50, '', 0, 0),
(28, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Brand New', 5300, '', 0, 0),
(29, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bed Rails', '', '', '', '', '', 1, '', 'Brand New', 1000, '', 0, 0),
(30, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 0, 0),
(31, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Rotors', '', '', '', '', '', 1, '', 'Brand New', 1000, '', 0, 0),
(32, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Rotors', '', '', '', '', '', 1, '', 'Brand New', 1000, '', 0, 0),
(33, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Rotors', '', '', '', '', '', 1, '', 'Brand New', 1000, '', 0, 0),
(34, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5, '', 0, 0),
(35, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5, '', 0, 0),
(36, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5, '', 0, 0),
(37, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5, '', 0, 0),
(38, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5, '', 0, 0),
(39, '0000-00-00 00:00:00', 'akila', '', 'Suspension', 'Leveling Kits', '', '', '', '', '', 1, '', 'Brand New', 1020, '', 0, 0),
(40, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 8900, '', 0, 0),
(41, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 2000, '', 0, 0),
(42, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Bumpers', '', '', '', '', '', 1, '', 'Brand New', 1200, '', 0, 0),
(43, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Bumpers', '', '', '', '', '', 1, '', 'Brand New', 1200, '', 0, 0),
(44, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Clutches', '', '', '', '', '', 1, '', 'Brand New', 6200, '', 0, 0),
(45, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 0, 0),
(46, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 2500, '', 0, 0),
(47, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 4500, '', 0, 0),
(48, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bed Rails', '2010', 'Honda', '', 'LX', '4Cyl_1.8L', 1, '', 'Brand New', 9522, '', 0, 0),
(49, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Brand New', 9855, '', 0, 0),
(50, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Brand New', 4500, '', 0, 0),
(51, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Brand New', 4500, '', 0, 0),
(52, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bumper Covers', '', '', '', '', '', 1, '', 'Brand New', 8900, '', 0, 0),
(53, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Seat Covers', '', '', '', '', '', 1, '', 'Brand New', 5600, '', 0, 0),
(54, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 7800, '', 0, 0),
(55, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Control Arms', '', '', '', '', '', 1, '', 'Brand New', 8520, '', 0, 0),
(56, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Control Arms', '', '', '', '', '', 1, '', 'Brand New', 8520, '', 0, 0),
(57, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 7800, '', 0, 0),
(58, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Intake Systems', '', '', '', '', '', 1, '', 'Brand New', 8922, '', 0, 0),
(59, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Catalytic Converters', '', '', '', '', '', 1, '', 'Brand New', 89500, '', 0, 0),
(60, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Exhaust Tips', '', '', '', '', '', 1, '', 'Brand New', 2300, '', 0, 0),
(61, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 9800, '', 0, 0),
(62, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Intake Systems', '', '', '', '', '', 1, '', 'Brand New', 5200, '', 0, 0),
(63, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 1230, '', 0, 0),
(64, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 5600, '', 0, 0),
(65, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Intake Systems', '', '', '', '', '', 1, '', 'Brand New', 6200, '', 0, 0),
(66, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5200, '', 0, 0),
(67, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Exhaust Systems', '', '', '', '', '', 1, '', 'Brand New', 6300, '', 0, 0),
(68, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 6000, '', 0, 0),
(69, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bumper Covers', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 0, 0),
(70, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Seat Covers', '', '', '', '', '', 1, '', 'Brand New', 6200, '', 0, 0),
(71, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 3000, '', 0, 0),
(72, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 8900, '', 0, 0),
(73, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 9850, '', 0, 0),
(74, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 9820, '', 0, 0),
(75, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Seat Covers', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 0, 0),
(76, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 0, 0),
(77, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bug Deflectors', '', '', '', '', '', 1, '', 'Brand New', 9800, '', 0, 0),
(78, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Exhaust Systems', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 0, 0),
(79, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bug Deflectors', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 0, 0),
(80, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 0, 0),
(81, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 9500, '', 0, 0),
(82, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 0, 0),
(83, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 6203, '', 0, 0),
(84, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 9800, '', 0, 0),
(85, '0000-00-00 00:00:00', 'akila', '', 'Suspension', 'Coil Springs', '', '', '', '', '', 1, '', 'Brand New', 8900, '', 0, 0),
(86, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bug Deflectors', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 0, 0),
(87, '0000-00-00 00:00:00', 'akila', '', 'Suspension', 'Coil Springs', '', '', '', '', '', 1, '', 'Brand New', 2000, '', 0, 0),
(88, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 0, 0),
(89, '0000-00-00 00:00:00', 'akila', '', 'Suspension', 'Lowering Kits', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 0, 0),
(90, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 0, 0),
(91, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Alternators', '', '', '', '', '', 1, '', 'Brand New', 1200, '', 0, 0),
(92, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Pads', '', '', '', '', '', 1, '', 'Brand New', 8900, '', 2, 0),
(93, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Dash Covers', '', '', '', '', '', 1, '', 'Brand New', 5000, '', 1, 0),
(94, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 9820, '', 0, 0),
(95, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 9820, '', 1, 0),
(96, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Filters', '', '', '', '', '', 1, '', 'Brand New', 3200, '', 3, 0),
(97, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Intake Systems', '', '', '', '', '', 1, '', 'Brand New', 9800, '', 0, 0),
(98, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Air Intake Systems', '', '', '', '', '', 1, '', 'Brand New', 9800, '', 0, 0),
(99, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 6500, '', 4, 0),
(100, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Used', 1500, '', 1, 0),
(101, '0000-00-00 00:00:00', 'akila', '', 'Interior', 'Floor Liners/Mats', '2010', 'Honda', '', '', '', 4, '', 'Used', 6500, 'Interior#FloorLiners/Mats#oil pump#1995#town ace', 3, 0),
(102, '0000-00-00 00:00:00', 'akila', '', 'Suspension', 'Leveling Kits', '2010', 'Honda', '', '', '', 1, '', 'Brand New', 8900, 'Suspension#Leveling Kits####oilpump#town ace#1995', 1, 0),
(103, '0000-00-00 00:00:00', 'akila', '', 'Exterior', 'Bug Deflectors', '2010', 'Honda', '', 'EX-L', '4Cyl_1.8L', 1, '', 'Brand New', 7500, 'Exterior#Bug Deflectors#2010#Honda##EX-L#4Cyl_1.8L', 4, 0),
(104, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Rotors', '2010', 'Honda', '', 'GX', '4Cyl_1.8L', 1, '', 'Brand New', 2000, 'Replacement#Brake Rotors#2010#Honda##GX#4Cyl_1.8L', 0, 0),
(105, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Bumpers', '2010', 'Honda', 'Civic', 'EX', '4Cyl_1.8L', 1, '', 'Brand New', 3200, 'Replacement#Bumpers#2010#Honda#Civic#EX#4Cyl_1.8L', 0, 0),
(106, '0000-00-00 00:00:00', 'akila', '', 'Wheels and Tires', 'Wheel Bearings and Hubs', '2010', 'Honda', 'Civic', 'Hybrid', '4Cyl_1.8L', 1, '', 'Brand New', 3200, 'WheelsandTires#WheelBearingsandHubs#2010#Honda#Civic#Hybrid#4Cyl_1.8L', 0, 0),
(107, '2016-02-28 13:38:06', 'akila', '', 'Replacement', 'Brake Pads', '2010', 'Honda', 'Accord Crosstour', '', '', 1, '', 'Brand New', 3200, 'Replacement#BrakePads#2010#Honda#AccordCrosstour', 0, 0),
(108, '2016-02-28 09:09:44', 'akila', '', 'Replacement', 'Ball Joints', '', '', '', '', '', 1, '', 'Brand New', 3000, 'Replacement#BallJoints', 0, 0),
(109, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Clutches', '', '', '', '', '', 1, '', 'Brand New', 9800, 'Performance#Clutches', 0, 0),
(110, '0000-00-00 00:00:00', 'akila', '', 'Replacement', 'Brake Rotors', '', '', '', '', '', 1, '', 'Brand New', 2000, 'Replacement#BrakeRotors', 0, 0),
(111, '2016-02-28 05:10:52', 'akila', '', 'Suspension', 'Body Lift Kit', '', '', '', '', '', 1, '', 'Brand New', 3000, 'Suspension#BodyLiftKit', 0, 0),
(112, '2016-02-28 05:12:06', 'akila', '', 'Interior', 'Floor Liners/Mats', '', '', '', '', '', 1, '', 'Brand New', 2000, 'Interior#FloorLiners/Mats', 0, 0),
(113, '2016-02-28 17:13:02', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 3200, 'Performance#Carburetors', 0, 0),
(114, '0000-00-00 00:00:00', 'akila', '', 'Performance', 'Carburetors', '', '', '', '', '', 1, '', 'Brand New', 3200, 'Performance#Carburetors', 0, 0),
(115, '2016-02-28 11:20:44', 'akila', '', 'Wheels and Tires', 'Wheel Locks', '', '', '', '', '', 1, '', 'Brand New', 3200, 'WheelsandTires#WheelLocks', 0, 0),
(116, '2016-02-28 12:17:32', 'akila', '1998 doctor nissan side door', 'Exterior', 'Car Covers', '', '', '', '', '', 1, '', 'Brand New', 5500, 'Exterior#CarCovers', 1, 0),
(117, '2016-02-28 12:22:15', 'akila', '1998 doctor nissan side door', 'Exterior', 'Car Covers', '', '', '', '', '', 1, '1998 doctor nissan side door', 'Used', 3200, '1998#doctor#nissan#side#door#Exterior#CarCovers', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `usertype` varchar(10) DEFAULT NULL,
  `resetpasswordcode` varchar(100) NOT NULL DEFAULT 'init',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`,`email`,`mobilenumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `mobilenumber`, `usertype`, `resetpasswordcode`) VALUES
('abc', 'fcea920f7412b5da7be0cf42b8c93759', 'abc@gmail.com', '', NULL, 'init'),
('admin', 'fcea920f7412b5da7be0cf42b8c93759', 'admin@gmail.com', '0712223334', NULL, 'init'),
('akila', '4c2bd0cde4867496f07cf2a751c77b66', 'akila@gmail.com', '', NULL, 'init'),
('autopartadmin', 'fcea920f7412b5da7be0cf42b8c93759', 'autopartadmin@gmail.com', '0729577692', 'admin', 'init'),
('chamod', '827ccb0eea8a706c4c34a16891f84e7b', 'chamodck@gmail.com', '0729577692', NULL, 'edfac66dc231b06fca6ab60f509adfd4'),
('janith', 'fcea920f7412b5da7be0cf42b8c93759', 'jani@gmail.com', '0718558551', NULL, 'init'),
('ljklj', 'fcea920f7412b5da7be0cf42b8c93759', 'd@gmail.com', '1234567890', NULL, 'init'),
('miyuru', 'fcea920f7412b5da7be0cf42b8c93759', 'miyu@gmail.com', '0733333333', NULL, 'init'),
('nisal', 'fcea920f7412b5da7be0cf42b8c93759', 'nisal@gmail.com', '0777777777', NULL, 'init');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicleID` int(3) NOT NULL,
  `year` int(4) NOT NULL,
  `madeBy` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `submodel` varchar(20) NOT NULL,
  `engine` varchar(20) NOT NULL,
  PRIMARY KEY (`vehicleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleID`, `year`, `madeBy`, `model`, `submodel`, `engine`) VALUES
(1, 2010, 'Honda', 'Accord', '', ''),
(2, 2010, 'Honda', 'Accord Crosstour', '', ''),
(3, 2010, 'Honda', 'Civic', 'DX', '4Cyl_1.8L'),
(4, 2010, 'Honda', 'CR-V', '', ''),
(5, 2010, 'Honda', 'Element', '', ''),
(6, 2010, 'Honda', 'Fit', 'GT', '2Cyl_1.8L'),
(7, 2010, 'Honda', 'Insight', '', ''),
(8, 2010, 'Honda', 'Civic', 'DX-G', '4Cyl_1.8L'),
(9, 2010, 'Honda', 'Civic', 'EX', '4Cyl_1.8L'),
(10, 2010, 'Honda', 'Civic', 'EX-L', '4Cyl_1.8L'),
(11, 2010, 'Honda', 'Civic', 'GX', '4Cyl_1.8L'),
(12, 2010, 'Honda', 'Civic', 'Hybrid', '4Cyl_1.8L'),
(13, 2010, 'Honda', 'Civic', 'Hybrid-L', '4Cyl_1.8L'),
(14, 2010, 'Honda', 'Civic', 'LX', '4Cyl_1.8L'),
(15, 2010, 'Honda', 'Civic', 'LX-S', '4Cyl_1.8L'),
(16, 2010, 'Honda', 'Civic', 'Sport', '4Cyl_1.8L'),
(17, 2011, '', '', '', ''),
(18, 2012, '', '', '', ''),
(19, 2013, '', '', '', ''),
(20, 2014, '', '', '', ''),
(21, 2015, '', '', '', ''),
(22, 2010, 'Toyota', 'Corolla', '', ''),
(23, 2010, 'Nissan', 'Leaf', '', ''),
(24, 2010, 'Land Rover', 'Discovery', '', ''),
(25, 2010, 'Benz', '', '', ''),
(26, 2010, 'Benz', 'a', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`partID`) REFERENCES `part` (`partID`);

--
-- Constraints for table `fanswer`
--
ALTER TABLE `fanswer`
  ADD CONSTRAINT `fanswer_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`username`);

--
-- Constraints for table `fquestions`
--
ALTER TABLE `fquestions`
  ADD CONSTRAINT `fquestions_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`username`);

--
-- Constraints for table `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `part_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
