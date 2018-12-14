-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2018 at 01:39 PM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

DROP TABLE IF EXISTS `category_details`;
CREATE TABLE IF NOT EXISTS `category_details` (
  `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`cat_id`, `category_name`, `category_description`, `isactive`, `datetime`) VALUES
(20, 'pen', 'Boll Pen', 1, '2018-12-14 17:53:18'),
(21, 'Clock', 'CricleClock', 1, '2018-12-14 17:53:18'),
(22, 'Bookss', 'Note Book', 1, '2018-12-14 17:53:18'),
(23, 'Pencil', 'HB Pencil', 0, '2018-12-14 17:53:18'),
(24, 'BOX', 'Instrument Box', 0, '2018-12-14 17:53:18'),
(25, 'BOLL', 'Rubber Ball', 0, '2018-12-14 17:53:18'),
(26, 'Key Chain', 'Key chain', 0, '2018-12-14 17:53:18'),
(27, 'Pen drive', 'Sandisk Pendrive', 0, '2018-12-14 17:53:18'),
(28, 'Nokia 6300', 'Nokia 6300', 0, '2018-12-14 17:53:18'),
(29, 'Bat', 'cricket Bat', 0, '2018-12-14 17:53:18'),
(30, 'Lap Top', 'computer', 0, '2018-12-14 17:53:18'),
(31, 'Tab', 'Samsung Tab', 0, '2018-12-14 17:53:18'),
(32, 'Fan', 'Ceiling Fan', 0, '2018-12-14 17:53:18'),
(33, 'Bag', 'School bag', 0, '2018-12-14 17:53:18'),
(34, 'Sweet Corn', 'Vegitable', 0, '2018-12-14 17:53:18'),
(35, 'Bananas', 'Vegitable', 0, '2018-12-14 17:53:18'),
(36, 'Bulk Rolls', 'Vegitable', 0, '2018-12-14 17:53:18'),
(37, 'waasasdasd', 'wawawaasdsadasd', 0, '2018-12-14 17:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `o_price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `cat_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `Category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `o_price`, `price`, `profit`, `supplier`, `datetime`, `isactive`, `cat_id`) VALUES
(58, 'TEST', '123', '156', NULL, NULL, '2018-12-14 12:48:00', 1, 21),
(59, 'TEST', '1234', '1561', NULL, NULL, '2018-12-14 12:48:28', 0, 21),
(60, 'TEST', '11', '15001', NULL, NULL, '2018-12-14 15:22:45', 0, 22),
(61, 'abc', '11', '12', NULL, NULL, '2018-12-14 15:22:48', 0, 23),
(62, 'abc', '11', '12', NULL, NULL, '2018-12-14 15:24:27', 0, 23),
(63, 'TESTS', '123', '156', NULL, NULL, '2018-12-14 15:50:19', 0, 21),
(64, 'New', '22', '231', NULL, NULL, '2018-12-14 15:58:49', 0, 22),
(65, 'eee', '11', '111', NULL, NULL, '2018-12-14 16:06:51', 1, 22),
(66, 'frfr', '112', '123', NULL, NULL, '2018-12-14 16:07:59', 1, 24),
(67, 'esessssss', '1234', '123', NULL, NULL, '2018-12-14 16:08:48', 1, 22),
(68, 'Chicken', '11122', '12211', NULL, NULL, '2018-12-14 16:10:01', 0, 24),
(69, 'TEST', '111', '1500', NULL, NULL, '2018-12-14 16:11:22', 0, 26),
(70, 'My', '123', '12312', NULL, NULL, '2018-12-14 16:11:48', 0, 25),
(71, 'TEST', '11', '1500', NULL, NULL, '2018-12-14 16:20:47', 0, 23),
(72, 'Rolls', '123', '2444', NULL, NULL, '2018-12-14 16:35:30', 0, 21),
(73, 'TEST', '11', '1500', NULL, NULL, '2018-12-14 16:47:36', 0, 25),
(74, 'testest', '123', '1234', NULL, NULL, '2018-12-14 16:50:07', 0, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `isactive`, `datetime`) VALUES
(1, 'Waleeds', '123412', 0, '2018-12-14 18:00:11'),
(2, 'Test', '12345', 0, '2018-12-14 18:00:21'),
(3, 'waleed', '12345', 1, '2018-12-14 18:01:21'),
(4, 'waleed', '12345', 0, '2018-12-14 18:01:26'),
(5, 'waleed', '12345', 0, '2018-12-14 18:02:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Category` FOREIGN KEY (`cat_id`) REFERENCES `category_details` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
