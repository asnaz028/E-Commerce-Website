-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2021 at 05:42 PM
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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'Asna', 'asna123'),
(2, 'safa', 'safa123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Kitchen', 1),
(2, 'Home', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `phone`, `email`, `address`, `country`, `city`, `zip`, `date_time`, `products`, `pmode`, `amount_paid`) VALUES
(30, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-09-01 16:00:00', 'Torch Light(1), Iron(1), Kettel(1)', 'credit/debit cards', '6100'),
(32, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-16 09:26:00', 'Iron(1), Kettel(1), Torch Light(1)', 'Card Payment', '6100'),
(33, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 21:22:00', 'Iron(2), Torch Light(1), Kettel(1)', 'Card Payment', '8600'),
(34, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 21:25:00', 'Torch Light(1)', 'Cash On Delivary', '1100'),
(35, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 22:41:00', 'Torch Light(1)', 'Card Payment', '1100'),
(36, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 22:41:00', 'Torch Light(1)', 'Card Payment', '1100'),
(37, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 22:51:00', 'Torch Light(1)', 'Cash On Delivary', '1100'),
(38, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 22:55:00', '', 'Cash On Delivary', '0'),
(39, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 22:55:00', '', 'Cash On Delivary', '0'),
(40, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 22:59:00', '', 'Cash On Delivary', '0'),
(41, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 23:00:00', 'Iron(1)', 'Cash On Delivary', '2500'),
(42, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 23:03:00', 'Torch Light(1)', 'Cash On Delivary', '1100'),
(43, 'Asna', 'azwar', '0770075385', 'asnaz028@gmail.com', '198,old tangalle road matara', 'Sri Lanka', 'matara', '81000', '2021-10-30 23:04:00', 'Torch Light(1)', 'Cash On Delivary', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `price`, `image`, `brand`, `code`, `warranty`, `quantity`, `meta_keyword`, `status`) VALUES
(20, 2, 'JBLs', 3000, '570553689_p7.jpg', 'sanford', 'P10007', '2 years', 9, 'jbl', 1);

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
  `categories_id` int(11) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `brand`, `product_code`, `warranty`, `category`, `quantity`, `categories_id`, `meta_keyword`, `status`) VALUES
(1, 'Torch Light', 1100, 'p1.jpg', 'Sanford', 'P10000', 'No warranty', 'Home', 1, 2, 'torch', 1),
(2, 'Iron', 2500, 'p2.jpg', 'Innovex', 'P10001', 'No warranty', 'Home', 1, 2, 'iron', 1),
(3, 'Kettel', 2500, 'p3.jpg', 'Prestige', 'P10002', '6 Months', 'Kitchen', 1, 1, 'kettel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

DROP TABLE IF EXISTS `review_table`;
CREATE TABLE IF NOT EXISTS `review_table` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `pid`) VALUES
(17, 'asna', 5, 'good product....', 1632032206, 3),
(18, 'tania', 4, 'excellent product...', 1632070108, 1),
(19, 'lily', 4, 'good product...', 1632070523, 1),
(20, 'ziny', 3, 'great product...', 1632070550, 1),
(21, 'martin', 5, 'perfect....', 1632070878, 1),
(22, 'michal', 0, 'bad product.....', 1632071429, 1),
(23, 'salma', 3, 'good', 1632071537, 1),
(24, 'salma', 3, 'good', 1632071537, 1),
(25, 'michal', 3, 'perfect', 1632071665, 1),
(26, 'ziny', 4, 'good', 1632071752, 1),
(27, 'ziny', 3, 'good', 1632072086, 1),
(28, 'tania', 3, 'nice', 1632072541, 1),
(29, 'ziny', 4, 'great', 1632072607, 1),
(30, 'asna', 4, 'good product', 1634280850, 2),
(31, 'ziny', 3, 'great product....', 1634784217, 1),
(32, 'amy', 4, 'excellent', 1635614134, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slide_id` int(10) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'slide number 1', 's1.jpg'),
(2, 'slide number 2', 's2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(10, 'safa', 'sandy', 'safaisthikar@gmail.com', 'undefined', '2021-10-14 04:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(42, 2, 10, '2021-10-30 19:23:01'),
(43, 1, 10, '2021-10-30 19:51:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
