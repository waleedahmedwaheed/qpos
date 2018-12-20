-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2018 at 12:45 PM
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
-- Table structure for table `assign_perm_to_roles`
--

DROP TABLE IF EXISTS `assign_perm_to_roles`;
CREATE TABLE IF NOT EXISTS `assign_perm_to_roles` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pr_id`),
  KEY `permission` (`perm_id`),
  KEY `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_perm_to_roles`
--

INSERT INTO `assign_perm_to_roles` (`pr_id`, `perm_id`, `role_id`, `isactive`, `datetime`) VALUES
(1, 1, 4, 1, '2018-12-18 15:02:51'),
(2, 2, 4, 0, '2018-12-18 15:07:02'),
(3, 1, 3, 1, '2018-12-18 15:14:07'),
(4, 2, 3, 0, '2018-12-18 15:15:06'),
(5, 2, 3, 1, '2018-12-18 15:15:20');

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
  `cat_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`cat_id`, `category_name`, `category_description`, `isactive`, `datetime`, `cat_order`) VALUES
(20, 'Main Products', 'Chickens and Burgers', 1, '2018-12-14 17:53:18', 1),
(21, 'Side Products', 'Salad', 1, '2018-12-14 17:53:18', 2),
(22, 'Optional', 'Naan', 1, '2018-12-14 17:53:18', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `subtotal` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_name` varchar(100) DEFAULT NULL,
  `cust_contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `isactive`, `subtotal`, `total`, `datetime`, `cust_name`, `cust_contact`) VALUES
(11, '2018-12-20 10:51:35', 2, 1350, 1350, '2018-12-20 15:51:35', 'Waleed', '03435551441'),
(12, '2018-12-20 11:36:13', 1, NULL, NULL, '2018-12-20 16:36:13', NULL, NULL),
(13, '2018-12-20 11:36:15', 1, NULL, NULL, '2018-12-20 16:36:15', NULL, NULL),
(14, '2018-12-20 11:36:17', 1, NULL, NULL, '2018-12-20 16:36:17', NULL, NULL),
(15, '2018-12-20 11:36:18', 1, NULL, NULL, '2018-12-20 16:36:18', NULL, NULL),
(16, '2018-12-20 11:36:19', 1, NULL, NULL, '2018-12-20 16:36:19', NULL, NULL),
(17, '2018-12-20 11:36:20', 1, NULL, NULL, '2018-12-20 16:36:20', NULL, NULL),
(18, '2018-12-20 11:36:22', 1, NULL, NULL, '2018-12-20 16:36:22', NULL, NULL),
(19, '2018-12-20 11:36:29', 1, NULL, NULL, '2018-12-20 16:36:29', NULL, NULL),
(20, '2018-12-20 11:37:28', 2, 1250, 1250, '2018-12-20 16:37:28', 'Waleed', '03435551441'),
(21, '2018-12-20 11:41:29', 2, 1250, 1250, '2018-12-20 16:41:29', '', ''),
(22, '2018-12-20 12:31:29', 2, 1250, 1250, '2018-12-20 17:31:29', 'Waleed', '03435551441'),
(23, '2018-12-20 12:35:59', 2, 1350, 1350, '2018-12-20 17:35:59', 'Waleed', '03435551441'),
(24, '2018-12-20 12:37:59', 2, 1250, 1250, '2018-12-20 17:37:59', 'Waleed', '03435551441'),
(25, '2018-12-20 12:38:32', 2, 1350, 1350, '2018-12-20 17:38:32', 'Waleed', '03435551441'),
(26, '2018-12-20 12:41:46', 2, 1350, 1350, '2018-12-20 17:41:46', 'Waleed', '03435551441'),
(27, '2018-12-20 12:42:25', 2, 1250, 1250, '2018-12-20 17:42:25', 'Waleed', '03435551441'),
(28, '2018-12-20 12:44:23', 2, 1350, 1350, '2018-12-20 17:44:23', 'Waleed', '03435551441');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `order_id` int(11) NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`od_id`),
  KEY `product` (`product_id`),
  KEY `order` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `product_id`, `qty`, `order_id`, `isactive`, `datetime`) VALUES
(26, 82, 1, 11, 1, '2018-12-20 15:51:35'),
(27, 58, 1, 11, 1, '2018-12-20 15:51:35'),
(28, 90, 1, 11, 1, '2018-12-20 15:51:35'),
(29, 78, 1, 12, 1, '2018-12-20 16:36:13'),
(30, 66, 1, 12, 1, '2018-12-20 16:36:13'),
(31, 89, 1, 12, 1, '2018-12-20 16:36:13'),
(32, 78, 1, 13, 1, '2018-12-20 16:36:15'),
(33, 66, 1, 13, 1, '2018-12-20 16:36:15'),
(34, 89, 1, 13, 1, '2018-12-20 16:36:15'),
(35, 78, 1, 14, 1, '2018-12-20 16:36:17'),
(36, 66, 1, 14, 1, '2018-12-20 16:36:17'),
(37, 89, 1, 14, 1, '2018-12-20 16:36:17'),
(38, 78, 1, 15, 1, '2018-12-20 16:36:18'),
(39, 66, 1, 15, 1, '2018-12-20 16:36:18'),
(40, 89, 1, 15, 1, '2018-12-20 16:36:18'),
(41, 78, 1, 16, 1, '2018-12-20 16:36:19'),
(42, 66, 1, 16, 1, '2018-12-20 16:36:19'),
(43, 89, 1, 16, 1, '2018-12-20 16:36:19'),
(44, 78, 1, 17, 1, '2018-12-20 16:36:21'),
(45, 66, 1, 17, 1, '2018-12-20 16:36:21'),
(46, 89, 1, 17, 1, '2018-12-20 16:36:21'),
(47, 78, 1, 18, 1, '2018-12-20 16:36:22'),
(48, 66, 1, 18, 1, '2018-12-20 16:36:22'),
(49, 89, 1, 18, 1, '2018-12-20 16:36:22'),
(50, 78, 1, 19, 1, '2018-12-20 16:36:30'),
(51, 66, 1, 19, 1, '2018-12-20 16:36:30'),
(52, 89, 1, 19, 1, '2018-12-20 16:36:30'),
(53, 78, 1, 20, 1, '2018-12-20 16:37:28'),
(54, 66, 1, 20, 1, '2018-12-20 16:37:28'),
(55, 89, 1, 20, 1, '2018-12-20 16:37:28'),
(56, 78, 1, 21, 1, '2018-12-20 16:41:29'),
(57, 66, 1, 21, 1, '2018-12-20 16:41:29'),
(58, 92, 1, 21, 1, '2018-12-20 16:41:29'),
(59, 78, 1, 22, 1, '2018-12-20 17:31:29'),
(60, 58, 1, 22, 1, '2018-12-20 17:31:29'),
(61, 90, 1, 22, 1, '2018-12-20 17:31:29'),
(62, 81, 1, 23, 1, '2018-12-20 17:35:59'),
(63, 87, 1, 23, 1, '2018-12-20 17:35:59'),
(64, 92, 1, 23, 1, '2018-12-20 17:35:59'),
(65, 78, 1, 24, 1, '2018-12-20 17:37:59'),
(66, 66, 1, 24, 1, '2018-12-20 17:37:59'),
(67, 93, 1, 24, 1, '2018-12-20 17:37:59'),
(68, 81, 1, 25, 1, '2018-12-20 17:38:32'),
(69, 66, 1, 25, 1, '2018-12-20 17:38:32'),
(70, 93, 1, 25, 1, '2018-12-20 17:38:32'),
(71, 81, 1, 26, 1, '2018-12-20 17:41:46'),
(72, 66, 1, 26, 1, '2018-12-20 17:41:46'),
(73, 93, 1, 26, 1, '2018-12-20 17:41:46'),
(74, 78, 1, 27, 1, '2018-12-20 17:42:26'),
(75, 87, 1, 27, 1, '2018-12-20 17:42:26'),
(76, 93, 1, 27, 1, '2018-12-20 17:42:26'),
(77, 81, 1, 28, 1, '2018-12-20 17:44:23'),
(78, 66, 1, 28, 1, '2018-12-20 17:44:23'),
(79, 92, 1, 28, 1, '2018-12-20 17:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_name` varchar(50) NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `perm_url` varchar(50) NOT NULL,
  `perm_icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`perm_id`, `perm_name`, `isactive`, `datetime`, `perm_url`, `perm_icon`) VALUES
(1, 'Dashboard', 1, '2018-12-18 14:39:25', 'index.php', '<i class=\"fa fa-dashboard \"></i>'),
(2, 'Products', 1, '2018-12-18 14:40:30', 'products.php', '<i class=\"fa fa-square-o\"></i>');

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
  `image` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`product_id`),
  KEY `Category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `o_price`, `price`, `profit`, `supplier`, `datetime`, `isactive`, `cat_id`, `image`) VALUES
(58, 'BLIZZARD', '400', '500', NULL, NULL, '2018-12-14 12:48:00', 1, 21, '7.jpg'),
(66, 'FILET-O-FISH', '400', '500', NULL, NULL, '2018-12-14 16:07:59', 1, 21, '44.jpg'),
(76, 'CHERRY LIMEADE', '400', '500', NULL, NULL, '2018-12-18 11:50:40', 1, 21, '38.jpg'),
(77, 'CHICKEN QUESADILLA', '400', '500', NULL, NULL, '2018-12-18 11:51:24', 1, 21, '36.jpg'),
(78, 'SPICY CHICKEN SANDWICH', '560', '700', NULL, NULL, '2018-12-18 11:53:44', 1, 20, '12.jpg'),
(79, 'QUARTER POUNDER', '800', '900', NULL, NULL, '2018-12-18 12:03:47', 1, 20, '49.jpg'),
(80, 'WHOPPER', '700', '900', NULL, NULL, '2018-12-18 12:04:31', 1, 20, '46.jpg'),
(81, 'CHEESEBURGER', '600', '800', NULL, NULL, '2018-12-18 12:05:27', 1, 20, '50.jpg'),
(82, 'STEAKBURGER', '700', '800', NULL, NULL, '2018-12-18 12:06:25', 1, 20, '31.jpg'),
(83, 'DOUBLE SHACKBURGER', '800', '900', NULL, NULL, '2018-12-18 12:17:19', 1, 20, '27.jpg'),
(84, 'SHACK BURGER', '558', '700', NULL, NULL, '2018-12-18 12:18:16', 1, 20, '18.jpg'),
(85, 'ANIMAL STYLE BURGER', '400', '500', NULL, NULL, '2018-12-18 12:18:46', 1, 20, '11.jpg'),
(86, 'BACON CHEESEBURGER', '450', '550', NULL, NULL, '2018-12-18 12:19:17', 1, 20, '10.jpg'),
(87, 'CHEESY GORDITA CRUNCH', '400', '500', NULL, NULL, '2018-12-20 10:49:14', 1, 21, '15.jpg'),
(88, 'SOFT TACOS', '400', '500', NULL, NULL, '2018-12-20 10:49:30', 1, 21, '23.jpg'),
(89, 'WAFFLE FRIES', '40', '50', NULL, NULL, '2018-12-20 10:50:00', 1, 22, '1.jpg'),
(90, 'CURLY FRIES', '40', '50', NULL, NULL, '2018-12-20 10:50:17', 1, 22, '6.jpg'),
(91, 'ANIMAL STYLE FRIES', '40', '50', NULL, NULL, '2018-12-20 10:50:29', 1, 22, '24.jpg'),
(92, 'CAJUN FRIES', '40', '50', NULL, NULL, '2018-12-20 10:50:58', 1, 22, '26.jpg'),
(93, 'EGG MCMUFFIN', '40', '50', NULL, NULL, '2018-12-20 10:51:32', 1, 22, '32.jpg'),
(94, 'CHERRY LIMEADE', '40', '50', NULL, NULL, '2018-12-20 10:52:03', 1, 22, '38.jpg'),
(96, 'TEST', '11', '50', NULL, NULL, '2018-12-20 17:04:40', 0, 20, '18.jpg'),
(97, 'TEST', '11', '50', NULL, NULL, '2018-12-20 17:08:11', 0, 20, '16.jpg'),
(98, 'TEST', '11', '1500', NULL, NULL, '2018-12-20 17:19:13', 0, 20, ''),
(99, 'TEST', '11', '1500', NULL, NULL, '2018-12-20 17:19:57', 0, 20, ''),
(100, 'TEST', '11', '1500', NULL, NULL, '2018-12-20 17:21:08', 0, 21, '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `isactive` smallint(6) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `isactive`, `datetime`) VALUES
(0, 'Super Admin', 0, '2018-12-18 11:13:51'),
(2, 'Admin', 0, '2018-12-18 11:14:53'),
(3, 'Admin', 1, '2018-12-18 11:15:09'),
(4, 'User', 1, '2018-12-18 11:15:17');

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
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `isactive`, `datetime`, `role_id`) VALUES
(1, 'Waleeds', '777', 1, '2018-12-14 18:00:11', 0),
(2, 'Test', '12345', 0, '2018-12-14 18:00:21', 0),
(3, 'waleed', '12345', 1, '2018-12-14 18:01:21', 3),
(4, 'waleed', '12345', 0, '2018-12-14 18:01:26', 0),
(5, 'waleed', '12345', 0, '2018-12-14 18:02:18', 0),
(6, 'waleed', '1234', 1, '2018-12-19 14:42:05', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_perm_to_roles`
--
ALTER TABLE `assign_perm_to_roles`
  ADD CONSTRAINT `permission` FOREIGN KEY (`perm_id`) REFERENCES `permission` (`perm_id`),
  ADD CONSTRAINT `roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Category` FOREIGN KEY (`cat_id`) REFERENCES `category_details` (`cat_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
