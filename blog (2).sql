-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2017 at 04:07 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'santos', 'velasco@gmail.com', 'poplol11'),
(3, 'ClaudiaV', 'perez.claudiam29@gmail.com', 'brightwood1329'),
(4, 'joeshmoe', 'joe@gmail.com', 'test123456'),
(5, 'john', 'johndoe@gmail.com', 'johndoe1'),
(6, 'jane', 'janedoe@gmail.com', 'janesdoe'),
(7, 'testuser', 'user@gmail.com', 'poplol11'),
(8, 'david', 'david@gmail.com', 'david1234');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `content`, `date_created`) VALUES
(10, 'Cooking Chili', 'https://images.pexels.com/photos/8717/food-pot-kitchen-cooking.jpg?w=940&h=650&auto=compress&cs=tinysrgb', 'This blog post will be all about cooking!', '2017-12-04'),
(16, 'another blog', 'https://static.pexels.com/photos/97524/pexels-photo-97524.jpeg', 'this is just to test that there is another blog in the system', '2017-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`id_user`, `comment`, `date_posted`) VALUES
(3, 'hahah, thats funny.', '2017-12-05'),
(1, 'testing website through the laptop', '2017-12-06'),
(5, 'This is john doe here, I love me some chili!', '2017-12-06'),
(3, 'I found this website and blog to be very intriguing. Thank you Jacob for the enlightenment.', '2017-12-07'),
(1, 'checking part 2', '2017-12-07'),
(8, 'I\'m a new user, this website is great!', '2017-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
