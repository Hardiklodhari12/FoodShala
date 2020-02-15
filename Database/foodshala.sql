-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 10:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(10) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `preference` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `uname`, `email`, `pass`, `preference`) VALUES
(1, 'Hardik', 'lodharihardik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Veg'),
(2, 'Kamal', 'k@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Veg'),
(3, 'Vimal', 'vimal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Non - Veg'),
(4, 'Abhay', 'abhay@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Non - Veg');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `item_id` int(10) NOT NULL,
  `rest_id` int(10) NOT NULL,
  `item_name` varchar(40) NOT NULL,
  `item_img` varchar(300) NOT NULL,
  `item_price` int(150) NOT NULL,
  `item_desc` varchar(40) NOT NULL,
  `item_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`item_id`, `rest_id`, `item_name`, `item_img`, `item_price`, `item_desc`, `item_type`) VALUES
(1, 1, 'Chocolate', 'uploads/2020_02_08_22_42_20_chocolate-with-milted-chocolate-on-white-ceramic-plate-45202.jpg', 170, 'Chocolate Brownie', 'Veg'),
(2, 1, 'Pizza', 'uploads/2020_02_08_22_43_16_cheese-crust-delicious-dough-367915.jpg', 199, 'Cheesy-Pizza', 'Veg'),
(3, 1, 'Coffee', 'uploads/2020_02_08_23_26_05_top-view-photo-of-coffee-near-cookies-2074122.jpg', 140, 'Coffee-Cookie', 'Veg'),
(4, 1, 'Kiwi', 'uploads/2020_02_08_23_26_51_green-fruit-fresh-kiwi-51312.jpg', 70, 'Fruit', 'Veg'),
(5, 2, 'Gujarati Thali', 'uploads/2020_02_09_14_22_08_DP1.jpg', 299, 'Gujarati Full Thali', 'Veg'),
(6, 2, 'Thepla', 'uploads/2020_02_09_14_40_50_thepla.jpg', 50, 'Thepla (Gujarati Flat Bread)', 'Veg'),
(7, 2, 'Jalebi-Fafda', 'uploads/2020_02_09_14_43_04_Fafda.jpg', 70, 'Jalebi-Fafda Gathiya', 'Veg'),
(8, 3, 'Biryani', 'uploads/2020_02_09_14_46_19_878518_1482141347.jpeg', 250, 'Chicken Biryani', 'Non - Veg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `rest_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_type` varchar(40) NOT NULL,
  `item_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `rest_id`, `item_name`, `item_type`, `item_price`) VALUES
(1, 1, 1, 'Chocolate', 'Veg', 170),
(2, 1, 1, 'Coffee', 'Veg', 140),
(3, 2, 1, 'Kiwi', 'Veg', 70),
(4, 3, 1, 'Coffee', 'Veg', 140),
(5, 1, 2, 'Gujarati Thali', 'Veg', 299),
(6, 4, 2, 'Gujarati Thali', 'Veg', 299),
(7, 4, 1, 'Chocolate', 'Veg', 170),
(8, 3, 3, 'Biryani', 'Non - Veg', 250),
(9, 3, 1, 'Chocolate', 'Veg', 170),
(10, 1, 2, 'Thepla', 'Veg', 50),
(11, 5, 1, 'Pizza', 'Veg', 199),
(12, 5, 2, 'Jalebi-Fafda', 'Veg', 70),
(13, 1, 2, 'Jalebi-Fafda', 'Veg', 70),
(14, 1, 1, 'Chocolate', 'Veg', 170);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rest_id` int(10) NOT NULL,
  `r_nm` varchar(40) NOT NULL,
  `r_email` varchar(40) NOT NULL,
  `r_pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rest_id`, `r_nm`, `r_email`, `r_pass`) VALUES
(1, 'FoodWay', 'foodway@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'KathiyaWadi', 'kathiyawadi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Mughal-E', 'mughal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rest_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
