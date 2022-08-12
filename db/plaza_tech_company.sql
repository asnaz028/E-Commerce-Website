-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2021 at 10:32 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plaza_tech_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `products` varchar(500) NOT NULL,
  `pmode` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `phone`, `email`, `address`, `country`, `city`, `zip`, `date_time`, `products`, `pmode`, `amount_paid`) VALUES
(1, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 15:46:00', '', 'cod', '0'),
(2, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 15:54:00', '', 'cards', '0'),
(3, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:01:00', '', 'cod', '0'),
(4, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:10:00', '', 'cod', '0'),
(5, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:23:00', '', 'cod', '0'),
(6, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:25:00', '', 'cod', '0'),
(7, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:30:00', '', 'cash on delivary', '0'),
(8, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:40:00', '', 'credit/debit cards', '0'),
(9, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-26 16:41:00', '', 'credit/debit cards', '0'),
(10, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-26 16:41:00', '', 'credit/debit cards', '0'),
(11, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:42:00', '', 'credit/debit cards', '0'),
(12, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:48:00', '', 'credit/debit cards', '0'),
(13, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:49:00', '', 'credit/debit cards', '0'),
(14, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:50:00', '', 'credit/debit cards', '0'),
(15, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 16:50:00', '', 'credit/debit cards', '0'),
(16, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 20:20:00', '', 'cod', '0'),
(17, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 20:54:00', 'Kettel(1)', 'cod', '2500'),
(18, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 20:54:00', 'Kettel(1)', 'cod', '2500'),
(19, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:13:00', '', 'credit/debit cards', '0'),
(20, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:15:00', '', 'credit/debit cards', '0'),
(21, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:18:00', '', 'credit/debit cards', '0'),
(22, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:18:00', '', 'credit/debit cards', '0'),
(23, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:23:00', '', 'credit/debit cards', '0'),
(24, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:32:00', '', 'credit/debit cards', '0'),
(25, 'amal', 'peter', '0770075385', 'amal028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:36:00', '', 'credit/debit cards', '0'),
(26, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:38:00', '', 'credit/debit cards', '0'),
(27, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:38:00', '', 'cod', '0'),
(28, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-08-31 23:39:00', '', 'cod', '0'),
(29, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-09-01 16:00:00', 'Torch Light(1), Iron(1), Kettel(1)', 'credit/debit cards', '6100'),
(30, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-09-01 16:00:00', 'Torch Light(1), Iron(1), Kettel(1)', 'credit/debit cards', '6100'),
(31, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-09-01 16:01:00', '', 'credit/debit cards', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `brand`, `product_code`, `warranty`, `category`, `quantity`) VALUES
(1, 'Torch Light', 1100, './products/p1.jpg', 'Sanford', 'P10000', 'No warranty', 'Home', 1),
(2, 'Iron', 2500, './products/p2.jpg', 'Innovex', 'P10001', 'No warranty', 'Home', 1),
(3, 'Kettel', 2500, './products/p3.jpg', 'Prestige', 'P10002', '6 Months', 'Kitchen', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
