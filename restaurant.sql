-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2017 at 12:51 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_admin`
--

CREATE TABLE `app_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_admin`
--

INSERT INTO `app_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `app_city`
--

CREATE TABLE `app_city` (
  `id` int(11) NOT NULL,
  `city` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_city`
--

INSERT INTO `app_city` (`id`, `city`) VALUES
(1, 'cairo '),
(2, 'giza'),
(3, 'El-monofeya');

-- --------------------------------------------------------

--
-- Table structure for table `app_restaurant_category`
--

CREATE TABLE `app_restaurant_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_restaurant_category`
--

INSERT INTO `app_restaurant_category` (`id`, `category_name`) VALUES
(1, 'fast food '),
(2, 'foul & tam&#39;ya'),
(3, 'fetter ');

-- --------------------------------------------------------

--
-- Table structure for table `app_restaurant_discount_card`
--

CREATE TABLE `app_restaurant_discount_card` (
  `id` int(11) NOT NULL,
  `card_name` varchar(45) NOT NULL,
  `card_value` float NOT NULL,
  `restaurant_dis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_restaurant_discount_card`
--

INSERT INTO `app_restaurant_discount_card` (`id`, `card_name`, `card_value`, `restaurant_dis`) VALUES
(1, 'happy day ', 30, 3),
(2, 'happy day ', 30, 3),
(3, 'good day ', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `app_restaurant_info`
--

CREATE TABLE `app_restaurant_info` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `restaurant_city` int(11) NOT NULL,
  `restaurant_describtion` text NOT NULL,
  `restaurant_category` int(11) NOT NULL,
  `restaurant_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_restaurant_info`
--

INSERT INTO `app_restaurant_info` (`restaurant_id`, `restaurant_name`, `restaurant_city`, `restaurant_describtion`, `restaurant_category`, `restaurant_time`) VALUES
(1, 'Al ASSil ', 1, 'fast food restaurant ', 1, 3),
(2, 'kfc ', 2, 'fast food restaurant ', 1, 5),
(3, 'filfila ', 2, 'foll restaurant ', 2, 9),
(4, 'abo ammar  el-sory ', 2, 'mohndceen ', 3, 6),
(5, 'test ', 1, 'this test restaurant ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_time`
--

CREATE TABLE `app_time` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_time`
--

INSERT INTO `app_time` (`id`, `time`) VALUES
(1, '01:00:00'),
(2, '02:00:00'),
(3, '03:00:00'),
(4, '04:00:00'),
(5, '05:00:00'),
(6, '06:00:00'),
(7, '07:00:00'),
(8, '08:00:00'),
(9, '09:00:00'),
(10, '10:00:00'),
(11, '11:00:00'),
(12, '12:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_admin`
--
ALTER TABLE `app_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_city`
--
ALTER TABLE `app_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_restaurant_category`
--
ALTER TABLE `app_restaurant_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_restaurant_discount_card`
--
ALTER TABLE `app_restaurant_discount_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_app_restaurant_discount_card_1_idx` (`restaurant_dis`);

--
-- Indexes for table `app_restaurant_info`
--
ALTER TABLE `app_restaurant_info`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `fk_app_restaurant_info_1_idx` (`restaurant_category`),
  ADD KEY `fk_app_restaurant_info_2_idx` (`restaurant_city`),
  ADD KEY `fk_app_restaurant_info_3_idx` (`restaurant_time`);

--
-- Indexes for table `app_time`
--
ALTER TABLE `app_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_admin`
--
ALTER TABLE `app_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app_city`
--
ALTER TABLE `app_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_restaurant_category`
--
ALTER TABLE `app_restaurant_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_restaurant_discount_card`
--
ALTER TABLE `app_restaurant_discount_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `app_restaurant_info`
--
ALTER TABLE `app_restaurant_info`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `app_time`
--
ALTER TABLE `app_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_restaurant_discount_card`
--
ALTER TABLE `app_restaurant_discount_card`
  ADD CONSTRAINT `fk_app_restaurant_discount_card_1` FOREIGN KEY (`restaurant_dis`) REFERENCES `app_restaurant_info` (`restaurant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `app_restaurant_info`
--
ALTER TABLE `app_restaurant_info`
  ADD CONSTRAINT `fk_app_restaurant_info_1` FOREIGN KEY (`restaurant_category`) REFERENCES `app_restaurant_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_app_restaurant_info_2` FOREIGN KEY (`restaurant_city`) REFERENCES `app_city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_app_restaurant_info_3` FOREIGN KEY (`restaurant_time`) REFERENCES `app_time` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
