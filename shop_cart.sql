-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2017 at 03:29 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'jacob', 'velasco', 'jacobvelasco91@gmail.com', '$2y$10$hLu7TcwOH4aa1CiqiyuQyeDjD67dk/DdMcOqDqAIXTiU1YORoUgzq', '2017-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_type` varchar(30) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`product_id`, `product_name`, `product_type`, `product_description`, `product_image`, `product_price`) VALUES
(1, 'baguette', 'french bread', 'A baguette is a long, thin loaf of French bread that is commonly made from basic lean dough. It is distinguishable by its length and crisp crust.', 'https://www.saveur.com/sites/saveur.com/files/styles/1000_1x_/public/custom-touts/2015/09/4hr_baguette_2000x1500.jpg?itok=4eIxTOxC&fc=50,50', 1.99),
(2, 'Pumpkin pie', 'dessert pie', 'Pumpkin pie is a dessert pie with a spiced, pumpkin-based custard filling.', 'http://food.fnr.sndimg.com/content/dam/images/food/fullset/2014/3/6/0/RF0104_From-Scratch-Pumpkin-Pie_s4x3.jpg.rend.hgtvcom.616.462.suffix/1433678596474.jpeg', 5.99),
(3, 'chocolate chip cookie', 'drop cookie', 'A chocolate chip cookie is a drop cookie that originated in the United States and features chocolate chips as its distinguishing ingredient.', 'https://images-gmi-pmc.edge-generalmills.com/e8198dd2-770b-4c7c-a748-ca7538cf48d0.jpg', 1.99),
(4, 'chocolate brownie', 'chocolate dessert', 'A chocolate brownie is a square, baked, chocolate dessert.', 'http://www.inspiredtaste.net/wp-content/uploads/2016/06/Brownies-Recipe-2-1200.jpg', 1.99),
(5, 'monkey muffin', 'muffin', 'These bite-sized mini muffins will be a favorite with your family and friendsâ€”or anyone who loves bananas, peanut butter and chocolate!', 'https://cdn2.tmbi.com/TOH/Images/Photos/37/300x300/exps45608_SD1785596D37C_WEB.jpg', 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `order_cart`
--

CREATE TABLE `order_cart` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
