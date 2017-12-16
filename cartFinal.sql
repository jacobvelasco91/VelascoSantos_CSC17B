-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2017 at 06:57 AM
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
  `id_user` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(40) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_user`, `first_name`, `last_name`, `password`, `email`, `reg_date`) VALUES
(1, 'jacob', 'velasco', '', 'jacobvelasco91@gmail.com', '2017-12-12'),
(2, 'santos', 'velasco', '$2y$10$vpBdbnHy.EkWLx5scScnfeEiPzbr7xPXt78z6ecCEX7/OzoNLjr56', 'svelasco5@student.rccd.edu', '2017-12-14'),
(3, 'Claudia', 'Velasco', '$2y$10$EzBjP3dphpFe3qpvToJ2uuF/dAPJvMEqbGKYjA7KcEkcPq42SZ8qS', 'jacobclaudiav@gmail.com', '2017-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_order`
--

CREATE TABLE `c_order` (
  `c_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_image` varchar(225) NOT NULL,
  `product_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`product_id`, `product_name`, `product_type`, `product_description`, `product_image`, `product_price`) VALUES
(1, 'baguette', 'french bread', 'A baguette is a long, thin loaf of French bread that is commonly made from basic lean dough. It is distinguishable by its length and crisp crust', 'https://d2gk7xgygi98cy.cloudfront.net/8-3-large.jpg', 1.99),
(2, 'Tres leches cake', 'sponge cake', 'A tres leches cake, also known as pan tres leches, is a sponge cakeâ€”in some recipes, a butter cakeâ€”soaked in three kinds of milk: evaporated milk, condensed milk, and heavy cream.', 'https://www.cookingclassy.com/wp-content/uploads/2017/05/tres-leches-cake-11.jpg', 10.99),
(3, 'Chocolate Brownie', 'chocolate dessert', 'Brownies come in a variety of forms and may be either fudgy or cakey, depending on their density.', 'https://www.chelsea.co.nz/files/cache/c7eb8909bcbfb9ff878c499feb1dcbd5_f1433.jpg', 3.99),
(4, 'Harvest pumpkin pie', 'baked dish', 'Perfectly spiced pumpkin pie topped with velvety pumpkin chiffon and finished with fresh whipped cream.', 'https://lh6.googleusercontent.com/-DUECUv8WgdY/TpfsLdp1vhI/AAAAAAAAYrE/5BIr3ZTDLp8/s800/IMG_5331-2.jpg', 15.99),
(5, 'Chocolate chip cookie', 'cookie', 'A chocolate chip cookie is a drop cookie that originated in the United States and features chocolate chips as its distinguishing ingredient.', 'https://sugarspunrun.com/wp-content/uploads/2017/05/Chocolate-Chip-Cookie-Recipe-1-of-1.jpg', 0.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `c_order`
--
ALTER TABLE `c_order`
  ADD PRIMARY KEY (`c_order`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_order`
--
ALTER TABLE `c_order`
  MODIFY `c_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
