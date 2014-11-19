-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 09:08 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `area` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `introducer_name` varchar(200) NOT NULL,
  `introducer_id` int(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `fatname` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `iproof` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`slno`, `area`, `address`, `introducer_name`, `introducer_id`, `phone`, `fatname`, `dob`, `age`, `year`, `sex`, `occupation`, `iproof`, `email`, `location`) VALUES
(1, 'bhadrak', 'bhadrak', 'somya', 10000, 1234567890, 'rakesh', '2009-11-11', '22', '2014', 'm', 'business', 'votercard', 's@gmail.com', 'charampa');

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE IF NOT EXISTS `barcode` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'chocolate'),
(2, 'bath soap'),
(3, 'mixmasala 100gm'),
(4, 'spices'),
(5, 'DAL');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `barcode` varchar(300) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`slno`, `product_id`, `price`, `barcode`, `review`) VALUES
(1, 1, '9.82', '1', 'Low Stock'),
(2, 3, '1.90', '3', 'Low Stock');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `comp_name`) VALUES
(1, 'nasle'),
(2, 'hindustan liver'),
(3, 'bhaijii'),
(4, 'bhabijee');

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE IF NOT EXISTS `final` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`id`, `product_id`, `quantity`, `price`, `date`) VALUES
(49, 3, '-1', '1.98', '2014-11-05'),
(60, 5, '0', '5.00', '2014-11-17'),
(62, 3, '0', '39.00', '2014-11-17'),
(63, 1, '0', '5.00', '2014-11-17'),
(70, 2, '16', '4.81', '2014-11-17'),
(79, 1, '7', '4.91', '2014-11-17'),
(80, 2, '8', '3.93', '2014-11-17'),
(81, 3, '50', '1.90', '2014-11-17'),
(83, 1, '5', '9.82', '2014-11-17'),
(87, 2, '4', '4.91', '2014-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `freestock`
--

CREATE TABLE IF NOT EXISTS `freestock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `slno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=368 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`slno`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 0),
(2, 'user', 'user', 1),
(3, 'somya', 'somya', 1),
(4, 'sam', 'sam', 1),
(5, 'SALAM', '933733', 1),
(6, 'azad', 'azad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `percent`
--

CREATE TABLE IF NOT EXISTS `percent` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `retailer` varchar(200) NOT NULL,
  `distributer` varchar(200) NOT NULL,
  `customer` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `percent`
--

INSERT INTO `percent` (`slno`, `retailer`, `distributer`, `customer`) VALUES
(1, '70', '80', '100');

-- --------------------------------------------------------

--
-- Table structure for table `printerdata`
--

CREATE TABLE IF NOT EXISTS `printerdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=647 ;

--
-- Dumping data for table `printerdata`
--

INSERT INTO `printerdata` (`id`, `data`, `datetime`) VALUES
(1, 'status-----connected<br>', '2014-11-16 17:31:56'),
(2, 'status-----accepted<br>restid-----29345<br>ordernumber-----123<br>', '2014-11-16 17:56:42'),
(3, 'status-----accepted<br>restid-----29345<br>ordernumber-----123<br>', '2014-11-16 17:57:12'),
(4, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:17:38'),
(5, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:18:14'),
(6, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:18:34'),
(7, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:19:02'),
(8, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:19:25'),
(9, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:19:55'),
(10, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:20:22'),
(11, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:20:46'),
(12, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:22:25'),
(13, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:22:38'),
(14, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:23:10'),
(15, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:24:17'),
(16, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:24:36'),
(17, 'status-----accepted<br>restid-----29345<br>ordernumber-----12<br>', '2014-11-17 08:26:02'),
(18, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:30:58'),
(19, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:32:25'),
(20, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:33:13'),
(21, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:33:40'),
(22, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:35:08'),
(23, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:35:39'),
(24, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:36:39'),
(25, 'status-----accepted<br>restid-----29345<br>ordernumber-----1231<br>', '2014-11-17 08:36:58'),
(26, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:37:39'),
(27, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:38:16'),
(28, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:38:33'),
(29, 'status-----rejected<br>restid-----29345<br>ordernumber-----1234<br>', '2014-11-17 08:39:50'),
(30, 'status-----rejected<br>restid-----29345<br>ordernumber-----1233<br>', '2014-11-17 08:40:27'),
(31, 'status-----rejected<br>restid-----29345<br>ordernumber-----1234<br>', '2014-11-17 08:40:50'),
(32, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:41:26'),
(33, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:41:47'),
(34, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:42:28'),
(35, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:42:52'),
(36, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:43:16'),
(37, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:43:50'),
(38, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:44:28'),
(39, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:44:42'),
(40, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:45:55'),
(41, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:46:34'),
(42, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:47:35'),
(43, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:48:00'),
(44, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:48:59'),
(45, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:49:16'),
(46, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:49:47'),
(47, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:50:16'),
(48, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:50:48'),
(49, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:51:13'),
(50, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:51:37'),
(51, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:52:07'),
(52, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:52:33'),
(53, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:53:03'),
(54, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:53:39'),
(55, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:54:06'),
(56, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:54:28'),
(57, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:55:07'),
(58, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:55:26'),
(59, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:56:32'),
(60, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:57:32'),
(61, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:57:53'),
(62, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:58:20'),
(63, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 08:59:59'),
(64, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:00:17'),
(65, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:00:41'),
(66, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:01:12'),
(67, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:02:20'),
(68, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:02:35'),
(69, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:03:06'),
(70, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:03:33'),
(71, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:04:05'),
(72, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:04:32'),
(73, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:05:32'),
(74, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:06:05'),
(75, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:06:26'),
(76, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:07:03'),
(77, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:07:28'),
(78, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:07:54'),
(79, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:08:27'),
(80, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:09:26'),
(81, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:12:49'),
(82, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:13:16'),
(83, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:14:20'),
(84, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:14:35'),
(85, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:15:06'),
(86, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:17:35'),
(87, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:17:55'),
(88, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:18:26'),
(89, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:18:56'),
(90, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:19:22'),
(91, 'status-----rejected<br>restid-----29345<br>ordernumber-----1232<br>', '2014-11-17 09:19:49'),
(92, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:22:41'),
(93, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:23:35'),
(94, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:24:02'),
(95, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:24:27'),
(96, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:24:58'),
(97, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:25:23'),
(98, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:25:54'),
(99, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:26:23'),
(100, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:26:48'),
(101, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:28:44'),
(102, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:29:10'),
(103, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:29:35'),
(104, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:30:06'),
(105, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:30:31'),
(106, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:32:22'),
(107, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:33:00'),
(108, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:33:57'),
(109, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:34:16'),
(110, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:34:45'),
(111, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:35:10'),
(112, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:36:13'),
(113, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:36:33'),
(114, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:38:56'),
(115, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:39:24'),
(116, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:40:26'),
(117, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:40:45'),
(118, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:41:14'),
(119, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:41:41'),
(120, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:42:06'),
(121, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:42:43'),
(122, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:43:10'),
(123, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:43:32'),
(124, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:43:57'),
(125, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:44:32'),
(126, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:44:54'),
(127, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:45:23'),
(128, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:45:54'),
(129, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:46:58'),
(130, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:49:10'),
(131, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:50:15'),
(132, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:50:47'),
(133, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:51:02'),
(134, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:52:29'),
(135, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:53:07'),
(136, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:53:22'),
(137, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:53:49'),
(138, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:54:17'),
(139, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:54:43'),
(140, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:55:16'),
(141, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:55:38'),
(142, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:56:09'),
(143, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:56:36'),
(144, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:56:59'),
(145, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:58:00'),
(146, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 09:58:55'),
(147, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:00:36'),
(148, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:01:15'),
(149, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:02:38'),
(150, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:03:48'),
(151, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:04:15'),
(152, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:05:05'),
(153, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:05:21'),
(154, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:05:51'),
(155, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:06:17'),
(156, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:06:47'),
(157, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:07:12'),
(158, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:07:43'),
(159, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:08:54'),
(160, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:09:09'),
(161, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:09:34'),
(162, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:10:08'),
(163, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:10:30'),
(164, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:11:07'),
(165, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:11:26'),
(166, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:13:07'),
(167, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:13:18'),
(168, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:14:20'),
(169, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:14:38'),
(170, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:15:09'),
(171, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:15:51'),
(172, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:16:10'),
(173, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:17:06'),
(174, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:17:31'),
(175, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:18:04'),
(176, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:18:27'),
(177, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:18:55'),
(178, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:19:22'),
(179, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:19:49'),
(180, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:20:16'),
(181, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:23:35'),
(182, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:24:02'),
(183, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:24:27'),
(184, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:24:58'),
(185, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:25:27'),
(186, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:25:50'),
(187, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:26:20'),
(188, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:26:45'),
(189, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:27:53'),
(190, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:28:11'),
(191, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:28:48'),
(192, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:29:07'),
(193, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:29:40'),
(194, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:30:39'),
(195, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:30:58'),
(196, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:31:29'),
(197, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:31:54'),
(198, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:32:23'),
(199, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:34:19'),
(200, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:34:42'),
(201, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:35:12'),
(202, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:35:37'),
(203, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:37:29'),
(204, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:38:37'),
(205, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:38:54'),
(206, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:39:20'),
(207, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:39:50'),
(208, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:40:16'),
(209, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:40:42'),
(210, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:41:11'),
(211, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:43:03'),
(212, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:43:33'),
(213, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:44:04'),
(214, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:44:30'),
(215, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:45:38'),
(216, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:46:20'),
(217, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:46:46'),
(218, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:47:13'),
(219, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:47:42'),
(220, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:48:11'),
(221, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:48:45'),
(222, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:49:13'),
(223, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:49:34'),
(224, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:50:15'),
(225, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:51:08'),
(226, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:51:59'),
(227, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:52:22'),
(228, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:53:27'),
(229, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:54:17'),
(230, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:55:16'),
(231, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:55:35'),
(232, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:56:18'),
(233, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:56:34'),
(234, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:57:02'),
(235, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:57:26'),
(236, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:57:56'),
(237, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:58:31'),
(238, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:58:55'),
(239, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 10:59:26'),
(240, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:01:13'),
(241, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:01:39'),
(242, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:02:05'),
(243, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:02:35'),
(244, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:03:34'),
(245, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:04:02'),
(246, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:04:27'),
(247, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:04:52'),
(248, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:05:24'),
(249, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:05:49'),
(250, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:06:25'),
(251, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:06:49'),
(252, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:07:19'),
(253, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:07:45'),
(254, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:08:54'),
(255, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:09:06'),
(256, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:10:10'),
(257, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:10:32'),
(258, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:11:04'),
(259, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:11:29'),
(260, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:12:00'),
(261, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:12:19'),
(262, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:12:50'),
(263, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:13:24'),
(264, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:13:45'),
(265, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:14:11'),
(266, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:14:41'),
(267, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:15:07'),
(268, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:16:11'),
(269, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:16:33'),
(270, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:17:58'),
(271, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:18:53'),
(272, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:19:26'),
(273, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:20:24'),
(274, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:20:46'),
(275, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:21:11'),
(276, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:21:41'),
(277, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:22:55'),
(278, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:23:29'),
(279, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:23:58'),
(280, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:24:29'),
(281, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:24:59'),
(282, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:25:25'),
(283, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:25:50'),
(284, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:26:17'),
(285, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:26:46'),
(286, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:28:14'),
(287, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:29:18'),
(288, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:29:35'),
(289, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:29:59'),
(290, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:30:37'),
(291, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:31:00'),
(292, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:31:26'),
(293, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:31:51'),
(294, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:32:21'),
(295, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:32:47'),
(296, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:33:17'),
(297, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:33:43'),
(298, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:34:20'),
(299, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:34:43'),
(300, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:35:12'),
(301, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:35:34'),
(302, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:36:06'),
(303, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:36:34'),
(304, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:37:01'),
(305, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:37:33'),
(306, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:37:55'),
(307, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:38:26'),
(308, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:38:51'),
(309, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:39:22'),
(310, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:39:53'),
(311, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:40:13'),
(312, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:40:43'),
(313, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:41:14'),
(314, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:41:38'),
(315, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:42:39'),
(316, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:43:35'),
(317, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:43:56'),
(318, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:45:48'),
(319, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:46:52'),
(320, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:47:42'),
(321, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:48:09'),
(322, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:48:39'),
(323, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:49:10'),
(324, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:49:30'),
(325, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:50:00'),
(326, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:50:33'),
(327, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:50:56'),
(328, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:51:23'),
(329, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:51:52'),
(330, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:52:57'),
(331, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:53:14'),
(332, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:53:44'),
(333, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:54:48'),
(334, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:55:40'),
(335, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:56:11'),
(336, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:56:30'),
(337, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:57:02'),
(338, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:58:04'),
(339, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:58:22'),
(340, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:58:48'),
(341, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 11:59:19'),
(342, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:00:19'),
(343, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:00:43'),
(344, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:01:10'),
(345, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:01:35'),
(346, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:02:44'),
(347, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:03:01'),
(348, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:03:33'),
(349, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:03:57'),
(350, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:04:23'),
(351, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:04:53'),
(352, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:05:24'),
(353, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:05:48'),
(354, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:06:15'),
(355, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:06:46'),
(356, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:08:06'),
(357, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:08:36'),
(358, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:09:02'),
(359, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:09:39'),
(360, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:10:08'),
(361, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:10:57'),
(362, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:11:23'),
(363, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:11:49'),
(364, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:12:19'),
(365, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:12:50'),
(366, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:13:15'),
(367, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:13:41'),
(368, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:14:10'),
(369, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:14:37'),
(370, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:15:06'),
(371, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:15:37'),
(372, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:16:03'),
(373, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:16:42'),
(374, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:17:36'),
(375, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:17:54'),
(376, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:18:20'),
(377, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:18:50'),
(378, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:19:15'),
(379, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:19:49'),
(380, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:20:11'),
(381, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:20:41'),
(382, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:21:07'),
(383, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:21:37'),
(384, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:24:00'),
(385, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:25:27'),
(386, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:25:48'),
(387, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:26:14'),
(388, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:27:13'),
(389, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:27:39'),
(390, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:28:10'),
(391, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:28:43'),
(392, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:29:08'),
(393, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:30:00'),
(394, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:30:28'),
(395, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:30:56'),
(396, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:31:23'),
(397, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:32:10'),
(398, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:32:58'),
(399, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:33:23'),
(400, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:33:52'),
(401, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:34:19'),
(402, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:34:36'),
(403, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:35:05'),
(404, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:35:38'),
(405, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:36:01'),
(406, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:36:33'),
(407, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:37:53'),
(408, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:38:19'),
(409, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:38:49'),
(410, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:39:20'),
(411, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:39:45'),
(412, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:40:10'),
(413, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:41:11'),
(414, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:41:36'),
(415, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:42:03'),
(416, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:42:32'),
(417, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:43:32'),
(418, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:44:49'),
(419, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:45:19'),
(420, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:45:53'),
(421, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:46:15'),
(422, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:46:49'),
(423, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:47:11'),
(424, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:47:37'),
(425, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:48:44'),
(426, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:49:02'),
(427, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:49:33'),
(428, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:50:53'),
(429, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:51:24'),
(430, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:51:49'),
(431, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:52:19'),
(432, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:52:46'),
(433, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:53:49'),
(434, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:54:06'),
(435, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:54:36'),
(436, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:55:06'),
(437, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:55:32'),
(438, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:56:03'),
(439, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:56:29'),
(440, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:56:54'),
(441, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:57:24'),
(442, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:57:50'),
(443, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:58:27'),
(444, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:58:48'),
(445, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:59:15'),
(446, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 12:59:42'),
(447, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:00:11'),
(448, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:00:37'),
(449, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:01:07'),
(450, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:02:18'),
(451, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:02:34'),
(452, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:02:59'),
(453, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:03:59'),
(454, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:04:24'),
(455, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:04:50'),
(456, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:05:16'),
(457, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:05:50'),
(458, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:06:19'),
(459, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:07:20'),
(460, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:08:39'),
(461, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:08:59'),
(462, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:09:35'),
(463, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:10:05'),
(464, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:10:25'),
(465, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:10:55'),
(466, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:11:20'),
(467, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:11:47'),
(468, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:12:16'),
(469, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:12:47'),
(470, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:13:12'),
(471, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:13:38'),
(472, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:14:10'),
(473, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:14:38'),
(474, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:15:03'),
(475, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:15:31'),
(476, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:15:59'),
(477, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:16:25'),
(478, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:16:56'),
(479, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:17:21'),
(480, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:17:51'),
(481, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:18:25'),
(482, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:18:46'),
(483, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:19:55'),
(484, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:20:09'),
(485, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:20:43'),
(486, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:21:05'),
(487, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:21:35'),
(488, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:22:05'),
(489, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:22:30'),
(490, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:23:06'),
(491, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:23:33'),
(492, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:24:33'),
(493, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:25:43'),
(494, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:26:19'),
(495, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:26:43'),
(496, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:27:10'),
(497, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:27:35'),
(498, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:28:08'),
(499, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:28:31'),
(500, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:29:07'),
(501, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:29:28'),
(502, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:29:59'),
(503, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:31:18'),
(504, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:31:48'),
(505, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:32:14'),
(506, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:32:45');
INSERT INTO `printerdata` (`id`, `data`, `datetime`) VALUES
(507, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:33:11'),
(508, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:33:40'),
(509, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:34:07'),
(510, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:34:35'),
(511, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:35:06'),
(512, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:35:32'),
(513, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:35:57'),
(514, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:36:28'),
(515, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:36:53'),
(516, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:37:23'),
(517, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:37:55'),
(518, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:38:57'),
(519, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:39:15'),
(520, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:40:24'),
(521, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:40:36'),
(522, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:41:06'),
(523, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:41:32'),
(524, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:42:02'),
(525, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:42:40'),
(526, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:43:31'),
(527, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:43:55'),
(528, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:44:19'),
(529, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:45:20'),
(530, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:45:45'),
(531, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:46:11'),
(532, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:47:43'),
(533, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:49:03'),
(534, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:49:28'),
(535, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:53:17'),
(536, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:53:38'),
(537, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:54:05'),
(538, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:54:34'),
(539, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:55:00'),
(540, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:55:30'),
(541, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:56:00'),
(542, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:56:26'),
(543, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:56:52'),
(544, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:57:22'),
(545, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:58:54'),
(546, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 13:59:13'),
(547, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:01:12'),
(548, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:01:31'),
(549, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:02:04'),
(550, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:02:31'),
(551, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:04:12'),
(552, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:04:48'),
(553, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:05:14'),
(554, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:05:56'),
(555, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:06:14'),
(556, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:06:43'),
(557, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:07:10'),
(558, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:08:21'),
(559, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:08:35'),
(560, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:08:57'),
(561, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:09:27'),
(562, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:09:57'),
(563, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:10:22'),
(564, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:10:49'),
(565, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:11:19'),
(566, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:12:24'),
(567, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:12:40'),
(568, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:13:51'),
(569, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:14:32'),
(570, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:15:02'),
(571, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:15:27'),
(572, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:16:03'),
(573, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:16:57'),
(574, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:17:52'),
(575, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:18:14'),
(576, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:18:44'),
(577, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:19:43'),
(578, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:21:19'),
(579, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:21:32'),
(580, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:23:28'),
(581, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:23:58'),
(582, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:24:21'),
(583, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:24:47'),
(584, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:26:02'),
(585, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:26:11'),
(586, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:26:38'),
(587, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:27:11'),
(588, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:27:50'),
(589, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:28:03'),
(590, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:28:29'),
(591, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:29:00'),
(592, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:29:25'),
(593, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:29:55'),
(594, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:30:28'),
(595, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:30:51'),
(596, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:31:17'),
(597, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:31:47'),
(598, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:32:18'),
(599, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:32:49'),
(600, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:33:10'),
(601, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:33:38'),
(602, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:34:05'),
(603, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:35:11'),
(604, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:35:30'),
(605, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:35:56'),
(606, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:36:27'),
(607, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:36:52'),
(608, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:37:22'),
(609, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:37:48'),
(610, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:41:08'),
(611, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:41:30'),
(612, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:42:01'),
(613, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:42:35'),
(614, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:42:57'),
(615, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:44:01'),
(616, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:44:22'),
(617, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:45:19'),
(618, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:45:43'),
(619, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:46:14'),
(620, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:46:40'),
(621, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:48:37'),
(622, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:48:57'),
(623, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:49:42'),
(624, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:50:31'),
(625, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:50:49'),
(626, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:51:20'),
(627, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:51:45'),
(628, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:52:15'),
(629, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:52:49'),
(630, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:53:11'),
(631, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:53:41'),
(632, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:54:08'),
(633, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:55:14'),
(634, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:55:29'),
(635, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:56:00'),
(636, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:56:28'),
(637, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:56:58'),
(638, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:57:36'),
(639, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:57:52'),
(640, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:58:22'),
(641, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:58:48'),
(642, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 14:59:59'),
(643, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 15:00:42'),
(644, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 15:01:09'),
(645, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 15:01:35'),
(646, 'status-----accepted<br>restid-----29345<br>ordernumber-----1236<br>', '2014-11-17 15:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(300) NOT NULL,
  `category` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `minimum` varchar(200) NOT NULL,
  `barcode` varchar(200) NOT NULL,
  `retailer` float(10,2) NOT NULL,
  `distributer` float(10,2) NOT NULL,
  `customer` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prod_name`, `category`, `company`, `minimum`, `barcode`, `retailer`, `distributer`, `customer`) VALUES
(1, 'kitkat', '1', '1', '1', '1', 0.00, 0.00, 0.00),
(2, 'parle', '1', '1', '1', '2', 0.00, 0.00, 0.00),
(3, 'chickenmasala', '3', '3', '1', '3', 0.00, 0.00, 0.00),
(4, 'coco', '1', '1', '1', '12', 0.00, 0.00, 0.00),
(5, 'haldi', '4', '4', '1', '101', 0.00, 0.00, 0.00),
(6, 'moong dal 1kg', '4', '4', '1', '8901764092275', 0.00, 0.00, 0.00),
(7, 'dal 1kg', '4', '4', '1', '8901764042805', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `freequantity` varchar(200) NOT NULL,
  `totalquantity` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `totalprice` varchar(200) NOT NULL,
  `specialdiscount` varchar(200) NOT NULL,
  `dealerdiscount` varchar(200) NOT NULL,
  `schemediscount` varchar(200) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `totaltax` varchar(200) NOT NULL,
  `totalamount` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `bar` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `company` varchar(10) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `vendor_id`, `product_id`, `quantity`, `freequantity`, `totalquantity`, `mrp`, `price`, `totalprice`, `specialdiscount`, `dealerdiscount`, `schemediscount`, `tax`, `totaltax`, `totalamount`, `date`, `bar`, `category`, `company`, `uniqueid`, `order_no`) VALUES
(1, 1, 1, '10', '', '10', '10', '8', '80', '', '', '', '2', '1.6', '81.60', '2014-11-03', '1', '1', '1', '54571dd8913ef', '54571e1cf2807'),
(2, 1, 2, '20', '', '20', '5', '4', '80', '', '', '', '2', '1.6', '81.60', '2014-11-03', '2', '1', '1', '54571dfb175e0', '54571e1cf2807'),
(3, 1, 3, '30', '', '30', '2', '1', '30', '', '', '', '2', '0.6', '30.60', '2014-11-03', '3', '3', '3', '54571e0a99d92', '54571e1cf2807'),
(4, 3, 4, '10', '', '10', '12', '10', '100', '', '', '2', '', '0', '98.00', '2014-11-03', '12', '1', '1', '54574565f1f1a', '5457457ab889c'),
(5, 3, 3, '1', '', '1', '11', '3', '3', '', '', '', '', '0', '3.00', '2014-11-04', '3', '3', '3', '5458b55457e9b', '5458b57581d50'),
(6, 3, 3, '20', '', '20', '40', '30', '600', '', '', '', '', '0', '600.00', '2014-11-04', '3', '3', '3', '545909df7acfc', '545909f3be111'),
(7, 3, 3, '10', '', '10', '45', '30', '300', '', '', '', '', '0', '300.00', '2014-11-05', '3', '3', '3', '545920fbe02b5', '5459210d5d729'),
(8, 3, 3, '20', '', '20', '3', '1.9', '38', '', '', '', '', '0', '38.00', '2014-11-05', '3', '3', '3', '545938aaa5733', '545938d9ab12c'),
(9, 3, 3, '10', '2', '12', '20', '18', '180', '', '', '', '', '0', '180.00', '2014-11-05', '3', '3', '3', '54593c7750e0c', '54593c8a21c4f'),
(10, 3, 3, '20', '2', '22', '4', '3', '60', '', '', '', '', '0', '60.00', '2014-11-05', '3', '3', '3', '5459491fa848b', '54594941f3f1f'),
(11, 3, 3, '10', '2', '12', '5', '4', '40', '', '', '', '', '0', '40.00', '2014-11-05', '3', '3', '3', '54594c5bdda74', '54594c83a7dd7'),
(12, 3, 5, '50', '', '50', '45', '40', '2000', '', '', '', '', '0', '2000.00', '2014-11-05', '101', '4', '4', '5459c1868312a', '5459c1ac22702'),
(13, 3, 3, '10', '', '10', '2', '1', '10', '', '', '', '', '0', '10.00', '2014-11-05', '3', '3', '3', '5459cc00ba726', '5459cc72b9041'),
(14, 3, 3, '9', '', '9', '31', '25', '225', '', '', '', '', '0', '225.00', '2014-11-05', '3', '3', '3', '545a365c7bb03', '545a367b7d80f'),
(15, 3, 3, '3', '', '3', '35', '25', '75', '', '', '', '', '0', '75.00', '2014-11-05', '3', '3', '3', '545a37493b65e', '545a376b43d18'),
(16, 3, 6, '10', '', '10', '100', '80', '800', '', '', '', '', '0', '800.00', '2014-11-06', '8901764092', '4', '4', '545b1073bb796', '545b1092c97d9'),
(17, 3, 6, '2', '', '2', '100', '80', '160', '', '', '', '', '0', '160.00', '2014-11-06', '8901764092', '4', '4', '545b11cfabfa5', '545b11e130b6d'),
(18, 3, 7, '10', '', '10', '200', '180', '1800', '', '', '', '', '0', '1800.00', '2014-11-06', '8901764042', '4', '4', '545b14801a862', '545b1498c0063'),
(19, 3, 1, '10', '2', '12', '5', '4', '40', '', '', '', '2', '0.8', '40.80', '2014-11-17', '1', '1', '1', '546981eb6e132', '546981fa322b9'),
(20, 3, 6, '10', '2', '12', '10', '2', '20', '', '', '', '2', '0.4', '20.40', '2014-11-17', '8901764092', '4', '4', '5469868c38c2c', '54698698261c9'),
(21, 3, 5, '1', '', '1', '5', '4', '4', '', '', '', '2', '0.08', '4.08', '2014-11-17', '101', '4', '4', '5469a8e4e6f43', '5469a8f99d64a');

-- --------------------------------------------------------

--
-- Table structure for table `readystock`
--

CREATE TABLE IF NOT EXISTS `readystock` (
  `bar` varchar(20) NOT NULL,
  `category` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `product` varchar(200) NOT NULL,
  `product_name` varchar(11) NOT NULL,
  `costprice` float(10,2) NOT NULL,
  `distributer` float(10,2) NOT NULL,
  `retailer` float(10,2) NOT NULL,
  `mrp` float(10,2) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rest`
--

CREATE TABLE IF NOT EXISTS `rest` (
  `slno` int(20) NOT NULL AUTO_INCREMENT,
  `custid` int(20) NOT NULL,
  `rest` float(10,2) NOT NULL,
  PRIMARY KEY (`slno`),
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `freequantity` varchar(200) NOT NULL,
  `totalquantity` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `totalprice` varchar(200) NOT NULL,
  `specialdiscount` varchar(200) NOT NULL,
  `dealerdiscount` varchar(200) NOT NULL,
  `schemediscount` varchar(200) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `totaltax` varchar(200) NOT NULL,
  `totalamount` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `bar` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `company` varchar(10) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE IF NOT EXISTS `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billid` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` float(10,2) NOT NULL,
  `totprice` float(10,2) NOT NULL,
  `barcode` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `uniqueid` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `checked` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `billid`, `name`, `productid`, `quantity`, `price`, `totprice`, `barcode`, `address`, `uniqueid`, `date`, `checked`) VALUES
(1, '1416211157', '2', 5, '1', 5.00, 5.00, '101', 'bhubaneswar', '5469a8e4e6f43', '2014-11-17', ''),
(2, '1416211157', '2', 1, '2', 9.82, 19.64, '1', 'bhubaneswar', '54571dd8913ef', '2014-11-17', ''),
(3, '1416211157', '2', 3, '1', 39.00, 39.00, '3', 'bhubaneswar', '545909df7acfc', '2014-11-17', ''),
(4, '1416211321', '2', 1, '1', 5.00, 5.00, '1', 'bhubaneswar', '546981eb6e132', '2014-11-17', ''),
(5, '1416231861', '4', 1, '1', 9.82, 9.82, '1', 'gjhgjh', '54571dd8913ef', '2014-11-17', ''),
(6, '1416231861', '4', 2, '1', 4.91, 4.91, '2', 'gjhgjh', '54571dfb175e0', '2014-11-17', ''),
(7, '1416231861', '4', 3, '1', 1.90, 1.90, '3', 'gjhgjh', '54571e0a99d92', '2014-11-17', ''),
(8, '1416235347', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(9, '1416235347', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(10, '1416235473', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(11, '1416235473', '2', 2, '1', 4.81, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(12, '1416236017', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(13, '1416236017', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(14, '1416236096', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(15, '1416236629', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(16, '1416236711', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(17, '1416236732', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(18, '1416236830', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(19, '1416236830', '6', 2, '1', 4.91, 4.91, '2', '', '54571dfb175e0', '2014-11-17', ''),
(20, '1416237679', '4', 1, '1', 4.91, 9.82, '1', 'gjhgjh', '54571dd8913ef', '2014-11-17', ''),
(21, '1416237679', '4', 2, '1', 3.93, 4.91, '2', 'gjhgjh', '54571dfb175e0', '2014-11-17', ''),
(22, '1416237679', '4', 3, '1', 1.90, 1.90, '3', 'gjhgjh', '54571e0a99d92', '2014-11-17', ''),
(23, '1416238019', '4', 1, '1', 9.82, 9.82, '1', 'gjhgjh', '54571dd8913ef', '2014-11-17', ''),
(24, '1416238123', '4', 1, '1', 9.82, 9.82, '1', 'gjhgjh', '54571dd8913ef', '2014-11-17', ''),
(25, '1416238274', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(26, '1416238274', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(27, '1416238274', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', ''),
(28, '1416238274', '2', 2, '1', 4.91, 4.91, '2', 'bhubaneswar', '54571dfb175e0', '2014-11-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(300) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` float(10,2) NOT NULL,
  `retailer_price` float(10,2) NOT NULL,
  `distributer_price` float(10,2) NOT NULL,
  `totprice` varchar(200) NOT NULL,
  `barcode` varchar(300) NOT NULL,
  `uniqueid` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `cat` varchar(200) NOT NULL,
  `comp` varchar(200) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `quantity`, `price`, `retailer_price`, `distributer_price`, `totprice`, `barcode`, `uniqueid`, `date`, `cat`, `comp`, `order_no`) VALUES
(1, '1', '10', 9.82, 9.45, 9.63, '', '1', '54571dd8913ef', '2014-11-03', '1', '1', '54571e1cf2807'),
(2, '2', '20', 4.91, 4.72, 4.82, '', '2', '54571dfb175e0', '2014-11-03', '1', '1', '54571e1cf2807'),
(3, '3', '30', 1.90, 1.70, 1.80, '57', '3', '54571e0a99d92', '2014-11-03', '3', '3', '54571e1cf2807'),
(4, '4', '10', 11.78, 11.34, 11.56, '', '12', '54574565f1f1a', '2014-11-03', '1', '1', '5457457ab889c'),
(5, '3', '20', 39.00, 37.00, 38.00, '', '3', '545909df7acfc', '2014-11-04', '3', '3', '545909f3be111'),
(6, '3', '10', 2.00, 10.40, 7.60, '20', '3', '545920fbe02b5', '2014-11-05', '3', '3', '5459210d5d729'),
(7, '3', '20', 2.89, 2.67, 2.78, '', '3', '545938aaa5733', '2014-11-05', '3', '3', '545938d9ab12c'),
(8, '3', '12', 19.80, 19.40, 19.60, '', '3', '54593c7750e0c', '2014-11-05', '3', '3', '54593c8a21c4f'),
(9, '3', '22', 1.90, 1.70, 1.80, '', '3', '5459491fa848b', '2014-11-05', '3', '3', '54594941f3f1f'),
(10, '3', '12', 4.90, 4.70, 4.80, '', '3', '54594c5bdda74', '2014-11-05', '3', '3', '54594c83a7dd7'),
(11, '5', '10', 45.00, 43.50, 44.00, '450', '101', '5459c1868312a', '2014-11-05', '4', '4', '5459c1ac22702'),
(12, '3', '10', 2.00, 1.70, 1.80, '', '3', '5459cc00ba726', '2014-11-05', '3', '3', '5459cc72b9041'),
(13, '3', '9', 27.00, 29.20, 29.80, '', '3', '545a365c7bb03', '2014-11-05', '3', '3', '545a367b7d80f'),
(14, '3', '3', 27.00, 32.00, 33.00, '', '3', '545a37493b65e', '2014-11-05', '3', '3', '545a376b43d18'),
(15, '6', '10', 100.00, 94.00, 96.00, '500', '8901764092', '545b1073bb796', '2014-11-06', '4', '4', '545b1092c97d9'),
(16, '7', '10', 200.00, 194.00, 196.00, '1000', '8901764042', '545b14801a862', '2014-11-06', '4', '4', '545b1498c0063'),
(17, '1', '12', 5.00, 4.10, 4.82, '', '1', '546981eb6e132', '2014-11-17', '1', '1', '546981fa322b9'),
(18, '6', '12', 10.00, 5.00, 9.00, '', '8901764092', '5469868c38c2c', '2014-11-17', '4', '4', '54698698261c9'),
(19, '5', '1', 5.00, 4.72, 4.82, '', '101', '5469a8e4e6f43', '2014-11-17', '4', '4', '5469a8f99d64a');

-- --------------------------------------------------------

--
-- Table structure for table `tempuid`
--

CREATE TABLE IF NOT EXISTS `tempuid` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`),
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tempuid`
--

INSERT INTO `tempuid` (`slno`, `uid`) VALUES
(3, '5469a8e4e6f43');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `billid` varchar(300) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`slno`, `vendor_id`, `amount`, `billid`, `uniqueid`, `date`) VALUES
(1, '1', '193.8', '', '', '2014-11-03'),
(2, '', '9.82', '1414996827', '54571dd8913ef', '2014-11-03'),
(3, '', '4.91', '1414996827', '54571dfb175e0', '2014-11-03'),
(4, '', '9.82', '1414996827', '54571dd8913ef', '2014-11-03'),
(5, '', '1.90', '1414997100', '54571e0a99d92', '2014-11-03'),
(6, '', '3.80', '1414997100', '54571e0a99d92', '2014-11-03'),
(7, '', '9.82', '1414997100', '54571dfb175e0', '2014-11-03'),
(8, '3', '98', '', '', '2014-11-03'),
(9, '', '3.80', '1415040713', '54571e0a99d92', '2014-11-04'),
(10, '3', '-', '', '', '2014-11-04'),
(11, '', '9.82', '1415079464', '54571dd8913ef', '2014-11-04'),
(12, '', '9.82', '1415081809', '54571dd8913ef', '2014-11-04'),
(13, '', '4.91', '1415081809', '54571dfb175e0', '2014-11-04'),
(14, '', '9.82', '1415081991', '54571dd8913ef', '2014-11-04'),
(15, '', '4.91', '1415081991', '54571dfb175e0', '2014-11-04'),
(16, '', '9.82', '1415082344', '54571dd8913ef', '2014-11-04'),
(17, '', '4.91', '1415082344', '54571dfb175e0', '2014-11-04'),
(18, '', '9.82', '1415082485', '54571dd8913ef', '2014-11-04'),
(19, '', '9.82', '1415082485', '54571dfb175e0', '2014-11-04'),
(20, '', '9.82', '1415082917', '54571dd8913ef', '2014-11-04'),
(21, '', '9.82', '1415083105', '54571dd8913ef', '2014-11-04'),
(22, '', '9.82', '1415087422', '54571dd8913ef', '2014-11-04'),
(23, '', '9.82', '1415087422', '54571dfb175e0', '2014-11-04'),
(24, '', '29.46', '1415087422', '54571dd8913ef', '2014-11-04'),
(25, '', '9.82', '1415087573', '54571dd8913ef', '2014-11-04'),
(26, '', '4.91', '1415087573', '54571dfb175e0', '2014-11-04'),
(27, '', '9.82', '1415087987', '54571dd8913ef', '2014-11-04'),
(28, '', '4.91', '1415087987', '54571dfb175e0', '2014-11-04'),
(29, '', '9.82', '1415088035', '54571dd8913ef', '2014-11-04'),
(30, '', '5.70', '1415092228', '54571e0a99d92', '2014-11-04'),
(31, '', '5.70', '1415092228', '54571e0a99d92', '2014-11-04'),
(32, '', '7.60', '1415092228', '54571e0a99d92', '2014-11-04'),
(33, '', '3.80', '1415092459', '54571e0a99d92', '2014-11-04'),
(34, '', '5.70', '1415092459', '54571e0a99d92', '2014-11-04'),
(35, '', '3.80', '1415092459', '54571e0a99d92', '2014-11-04'),
(36, '3', '3', '', '', '2014-11-04'),
(37, '', '0', '', '', '2014-11-04'),
(38, '', '1.90', '1415100055', '54571e0a99d92', '2014-11-04'),
(39, '', '5.70', '1415100055', '54571e0a99d92', '2014-11-04'),
(40, '', '9.50', '1415100055', '54571e0a99d92', '2014-11-04'),
(41, '', '98.20', '1415103200', '54571dd8913ef', '2014-11-04'),
(42, '3', '-101', '', '', '2014-11-04'),
(43, '', '5.70', '1415110383', '54571e0a99d92', '2014-11-04'),
(44, '', '4.91', '1415111897', '54571dfb175e0', '2014-11-04'),
(45, '', '4.91', '1415111897', '54571dfb175e0', '2014-11-04'),
(46, '', '9.82', '1415117243', '54571dfb175e0', '2014-11-04'),
(47, '', '3.80', '1415119344', '54571e0a99d92', '2014-11-04'),
(48, '', '19.00', '1415119407', '54571e0a99d92', '2014-11-04'),
(49, '', '5.70', '1415119524', '54571e0a99d92', '2014-11-04'),
(50, '', '3.80', '1415119636', '54571e0a99d92', '2014-11-04'),
(51, '3', '600', '', '', '2014-11-04'),
(52, '', '1.90', '1415121650', '54571e0a99d92', '2014-11-04'),
(53, '', '78.00', '1415125513', '54571e0a99d92', '2014-11-04'),
(54, '3', '300', '', '', '2014-11-05'),
(55, '', '39.00', '1415127574', '54571e0a99d92', '2014-11-05'),
(56, '', '39.00', '1415127574', '545909df7acfc', '2014-11-05'),
(57, '3', '38', '', '', '2014-11-05'),
(58, '3', '180', '', '', '2014-11-05'),
(59, '3', '60', '', '', '2014-11-05'),
(60, '3', '40', '', '', '2014-11-05'),
(61, '3', '2000', '', '', '2014-11-05'),
(62, '', '1.98', '1415170794', '54571e0a99d92', '2014-11-05'),
(63, '3', '10', '', '', '2014-11-05'),
(64, '', '5.70', '1415197336', '54571e0a99d92', '2014-11-05'),
(65, '3', '225', '', '', '2014-11-05'),
(66, '3', '75', '', '', '2014-11-05'),
(67, '', '3.80', '1415214598', '54571e0a99d92', '2014-11-06'),
(68, '', '5.70', '1415214778', '54571e0a99d92', '2014-11-06'),
(69, '', '1.90', '1415214887', '54571e0a99d92', '2014-11-06'),
(70, '', '1.90', '1415216031', '54571e0a99d92', '2014-11-06'),
(71, '', '1.90', '1415217860', '54571e0a99d92', '2014-11-06'),
(72, '', '1.90', '1415218585', '54571e0a99d92', '2014-11-06'),
(73, '', '1.90', '1415218618', '54571e0a99d92', '2014-11-06'),
(74, '', '1.90', '1415218672', '54571e0a99d92', '2014-11-06'),
(75, '', '3.80', '1415218737', '54571e0a99d92', '2014-11-06'),
(76, '3', '800', '', '', '2014-11-06'),
(77, '3', '160', '', '', '2014-11-06'),
(78, '3', '1800', '', '', '2014-11-06'),
(79, '3', '40.8', '', '', '2014-11-17'),
(80, '3', '20.4', '', '', '2014-11-17'),
(81, '3', '4.08', '', '', '2014-11-17'),
(82, '', '5', '1416211157', '5469a8e4e6f43', '2014-11-17'),
(83, '', '19.64', '1416211157', '54571dd8913ef', '2014-11-17'),
(84, '', '39', '1416211157', '545909df7acfc', '2014-11-17'),
(85, '', '5', '1416211321', '546981eb6e132', '2014-11-17'),
(86, '', '9.82', '1416231861', '54571dd8913ef', '2014-11-17'),
(87, '', '4.91', '1416231861', '54571dfb175e0', '2014-11-17'),
(88, '', '1.90', '1416231861', '54571e0a99d92', '2014-11-17'),
(89, '', '4.91', '1416235347', '54571dfb175e0', '2014-11-17'),
(90, '', '4.91', '1416235347', '54571dfb175e0', '2014-11-17'),
(91, '', '4.91', '1416235473', '54571dfb175e0', '2014-11-17'),
(92, '', '4.91', '1416235473', '54571dfb175e0', '2014-11-17'),
(93, '', '4.91', '1416236017', '54571dfb175e0', '2014-11-17'),
(94, '', '4.91', '1416236017', '54571dfb175e0', '2014-11-17'),
(95, '', '4.91', '1416236096', '54571dfb175e0', '2014-11-17'),
(96, '', '4.91', '1416236629', '54571dfb175e0', '2014-11-17'),
(97, '', '4.91', '1416236711', '54571dfb175e0', '2014-11-17'),
(98, '', '4.91', '1416236732', '54571dfb175e0', '2014-11-17'),
(99, '', '4.91', '1416236830', '54571dfb175e0', '2014-11-17'),
(100, '', '4.91', '1416236830', '54571dfb175e0', '2014-11-17'),
(101, '', '9.82', '1416237679', '54571dd8913ef', '2014-11-17'),
(102, '', '4.91', '1416237679', '54571dfb175e0', '2014-11-17'),
(103, '', '1.90', '1416237679', '54571e0a99d92', '2014-11-17'),
(104, '', '9.82', '1416238019', '54571dd8913ef', '2014-11-17'),
(105, '', '9.82', '1416238123', '54571dd8913ef', '2014-11-17'),
(106, '', '4.91', '1416238274', '54571dfb175e0', '2014-11-17'),
(107, '', '4.91', '1416238274', '54571dfb175e0', '2014-11-17'),
(108, '', '4.91', '1416238274', '54571dfb175e0', '2014-11-17'),
(109, '', '4.91', '1416238274', '54571dfb175e0', '2014-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `slno` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` int(10) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `location` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `father` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `introducer` varchar(200) NOT NULL,
  `introid` varchar(200) NOT NULL,
  `identity` varchar(200) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`slno`, `name`, `phone`, `address`, `email`, `type`, `balance`, `location`, `date`, `father`, `dob`, `age`, `year`, `sex`, `occupation`, `introducer`, `introid`, `identity`) VALUES
(2, 'daya', 1234567890, 'bhubaneswar', 'd@gmail.com', 1, 2.64, 'khandagiri', '2014-11-03', 'deb', '2007-11-07', '20', '2014', 'm', 'student', '10000(somya)', 'somya', 'votercard'),
(3, 'xyz', 3444566788, 'gvhvhj', '', 0, -20.84, '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', ''),
(4, 'Ricky', 3444566788, 'gjhgjh', '', 1, -37.85, 'location', '2014-11-03', '', '0000-00-00', '21', '', 'm', 'service', '10000(somya)', 'somya', 'addharcard'),
(5, 'sasa', 9438441111, '', '', 1, 0.00, '', '2014-11-17', '', '0000-00-00', '', '', '', '', '10000', 'somya', ''),
(6, 'sasasasa', 9438441112, '', '', 1, 0.00, '', '2014-11-17', '', '0000-00-00', '', '', '', '', '10000', 'somya', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
