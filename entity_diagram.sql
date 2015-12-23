-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-23 14:34:25
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `entity_diagram`
--

-- --------------------------------------------------------

--
-- 表的结构 `customer_info`
--

CREATE TABLE IF NOT EXISTS `customer_info` (
  `cus_number` int(10) unsigned NOT NULL,
  `Customer_ID` varchar(6) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) NOT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `customer_info`
--

INSERT INTO `customer_info` (`cus_number`, `Customer_ID`, `FirstName`, `LastName`, `Tel`, `Birthdate`, `Address`) VALUES
(1, '150001', 'Marshal', 'Liu', '18200555860', '1996-06-18', '9C106'),
(2, '150002', 'Kevin', 'Westbrook', '18200567890', '1989-01-21', '9C106'),
(3, '150003', 'Carry', 'Tian', '14808034657', '1996-02-19', '9C106'),
(4, '150004', 'Leo', 'Li', '12934859403', '2015-11-11', '9C110'),
(5, '150005', 'Johnny', 'Dai', '1848576403', '0000-00-00', 'Songlin2 333'),
(6, '150006', 'Harry', 'Li', '1886929463', '1995-12-21', 'Songlin2 334'),
(7, '150007', 'Toby', 'Mao', '13946533234', '0000-00-00', 'Songlin2 334'),
(8, '150008', 'Young', 'Yang', '18463742812', '1995-02-02', 'Songlin2 333'),
(9, '150009', 'Noah', 'Yan', '122353423', '0000-00-00', '9c104'),
(10, '150010', 'John', 'Qing', '124323432', '0000-00-00', 'song 2 222'),
(11, '150011', 'Michal', 'Li', '', '0000-00-00', ''),
(12, '150012', '4', '???2', '3', '0002-03-03', '2'),
(13, '150013', '', '342', '3423', '0000-00-00', ''),
(14, '150014', '', '343342', 'fesfrwr32', '0000-00-00', '');

-- --------------------------------------------------------

--
-- 表的结构 `food_catalogue`
--

CREATE TABLE IF NOT EXISTS `food_catalogue` (
  `food_id` int(10) unsigned NOT NULL,
  `cata_name` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `catalog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `food_catalogue`
--

INSERT INTO `food_catalogue` (`food_id`, `cata_name`, `Price`, `catalog_id`) VALUES
(1, 'Sandwiches', NULL, 1),
(2, 'Salads', NULL, 2),
(3, 'Eggs', NULL, 3),
(4, 'BREAKFAST', NULL, 4),
(5, 'Patisserie', NULL, 5),
(6, 'COFFEE', NULL, 6),
(7, 'HotChocolate', NULL, 7),
(8, 'Tea', NULL, 8),
(9, 'Beverage', NULL, 9),
(10, 'Milkshakes', NULL, 10),
(11, 'The Veggie Power', 18, 1),
(12, 'The Parisian', 25, 1),
(13, 'The Ultimate', 26, 1),
(14, 'Croque-Monsieur', 30, 1),
(15, 'Croque-Madame', 32, 1),
(16, 'Bikini Sandwich', 25, 1),
(17, 'Salade Nicoise', 16, 2),
(18, 'Salade Paysanne', 22, 2),
(19, 'Salmon salad', 30, 2),
(20, 'Carrot salad', 8, 2),
(21, 'Scrambled/Fried eggs', 8, 3),
(22, 'Red & Rouge Omelette', 14, 3),
(23, 'The Biggy Omelette', 22, 3),
(24, 'English breakfast', 30, 4),
(25, '2 Pancakes', 15, 4),
(26, 'Bacon & Egg cupcake', 8, 4),
(27, 'Mini croissant', 4, 5),
(28, 'Cookie', 1, 5),
(29, 'Homemade cake', 8, 5),
(30, 'Americano', 9, 6),
(31, 'Espresso', 10, 6),
(32, 'Macchiato', 11, 6),
(33, 'Cappuccino', 15, 6),
(34, 'Latte', 16, 6),
(35, 'Mocha latte', 17, 6),
(36, 'Ciobar hot chocolate', 16, 7),
(37, 'Dark chocolate', 10, 7),
(38, 'Milk chocolate', 10, 7),
(39, 'Orange/cinnamon', 6, 8),
(40, 'Wild berry', 6, 8),
(41, 'Peppermint', 6, 8),
(42, 'Earl grey', 6, 8),
(43, 'Lady grey', 6, 8),
(44, 'Lavender', 6, 8),
(45, 'English breakfast', 6, 8),
(46, 'Harbin', 10, 9),
(47, 'Soft drinks', 3, 9),
(48, 'Vanilla Milkshake', 14, 10),
(49, 'Banana Milkshake', 14, 10),
(50, 'Discount', -1, 51),
(51, 'Special', NULL, 51);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL,
  `customer_id` varchar(6) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `Date`, `Time`) VALUES
(1, '150001', '2015-11-14', '05:00:00'),
(2, '150002', '2015-11-14', '06:00:00'),
(4, '150001', '2015-11-26', '20:20:46'),
(8, '150003', '2015-11-26', '20:24:54'),
(12, '150003', '2015-11-26', '20:46:19'),
(17, '150009', '2015-11-27', '12:14:51'),
(18, '150001', '2015-11-27', '12:15:51'),
(19, '150010', '2015-11-27', '18:30:53'),
(20, '150008', '2015-11-27', '18:34:08'),
(22, '150003', '2015-11-30', '12:14:38'),
(24, '150011', '2015-12-03', '13:23:23'),
(25, '150005', '2015-12-03', '13:47:21'),
(28, '150003', '2015-12-21', '22:24:35'),
(29, '150004', '2015-12-21', '22:25:07'),
(31, '150002', '2015-12-21', '22:50:14'),
(35, '150010', '2015-12-23', '18:48:54'),
(36, '150014', '2015-12-23', '18:50:24'),
(37, '150014', '2015-12-23', '19:01:52'),
(38, '150006', '2015-12-23', '21:27:50');

-- --------------------------------------------------------

--
-- 表的结构 `order_food`
--

CREATE TABLE IF NOT EXISTS `order_food` (
  `item_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `food_id` int(10) unsigned DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `order_food`
--

INSERT INTO `order_food` (`item_id`, `order_id`, `food_id`, `Quantity`) VALUES
(1, 1, 11, 1),
(2, 1, 13, 4),
(3, 1, 18, 4),
(4, 1, 30, 3),
(5, 2, 48, 1),
(7, 4, 11, 1),
(8, 4, 13, 1),
(9, 4, 48, 2),
(10, 4, 50, 1),
(19, 8, 12, 1),
(20, 8, 49, 2),
(25, 12, 12, 1),
(32, 17, 47, 1),
(33, 17, 49, 1),
(34, 18, 16, 1),
(35, 18, 26, 1),
(36, 19, 11, 1),
(37, 19, 27, 1),
(38, 20, 37, 1),
(39, 20, 38, 1),
(40, 20, 45, 1),
(41, 20, 50, 1),
(43, 22, 11, 1),
(45, 24, 12, 1),
(46, 25, 12, 4),
(47, 25, 27, 1),
(50, 28, 11, 1),
(51, 29, 11, 1),
(52, 29, 29, 1),
(54, 31, 11, 1),
(57, 35, 11, 1),
(58, 35, 12, 1),
(59, 36, 11, 1),
(60, 37, 11, 1),
(62, 38, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`cus_number`), ADD UNIQUE KEY `customer_ID` (`Customer_ID`), ADD UNIQUE KEY `Customer_ID_2` (`Customer_ID`);

--
-- Indexes for table `food_catalogue`
--
ALTER TABLE `food_catalogue`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`item_id`), ADD KEY `food_id` (`food_id`), ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `cus_number` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `food_catalogue`
--
ALTER TABLE `food_catalogue`
  MODIFY `food_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `order_food`
--
ALTER TABLE `order_food`
  MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- 限制导出的表
--

--
-- 限制表 `order_food`
--
ALTER TABLE `order_food`
ADD CONSTRAINT `order_food_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
