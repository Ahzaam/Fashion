-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 09:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nzfashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(3) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_id`, `name`, `password`) VALUES
(1, '62b30c6627907', 'ahzam', 'Ig9gbhbirGOgFWwcwz9eTw==');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments_feedback`
--

CREATE TABLE `comments_feedback` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `status` enum('read','unread','','') NOT NULL,
  `reply` varchar(300) NOT NULL,
  `rating` int(1) NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments_feedback`
--

INSERT INTO `comments_feedback` (`id`, `user_id`, `name`, `comment`, `status`, `reply`, `rating`, `product_id`) VALUES
(2, '62b30c6627907', 'Ahzam', 'unread', 'read', '', 0, ''),
(3, '62b30c6627907', 'Ahzam', 'Read Comment', 'read', '', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `price` int(5) NOT NULL,
  `size` varchar(20) NOT NULL,
  `colors` varchar(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `stock` int(3) NOT NULL,
  `status` enum('selling','stopped','','') NOT NULL,
  `display` enum('none','owl-carousel','grid','') NOT NULL DEFAULT 'none',
  `selled` int(5) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `description`, `price`, `size`, `colors`, `image`, `stock`, `status`, `display`, `selled`, `date`, `category`) VALUES
('62b35a0cb9a8a', 'Ahzam', 'Ahzam is a good boy', 18, 's, m, l', '#000000', 'media/IMG-62b35a0cb5b489.61739655.jpg', 11, '', 'none', 0, '2022-06-22', 'useless'),
('62b35ae8dad43', 'Sharfa', 'Super ', 1568468353, 'M', '#ffffff', 'media/IMG-62b35ae8d61486.73658882.jpg', 0, '', 'none', 0, '2022-06-22', 'useless'),
('62b35d3907810', 'Girl', 'Nice Girl', 2147483647, 'M', '#fff0f0', 'media/IMG-62b35d39014311.43720231.jpg', 17, '', 'grid', 0, '2022-06-22', 'useless'),
('62b373ea16773', 'Pink Girafe', 'Cute Girafe for Babies', 700, 'S', '#ff00c8', 'media/IMG-62b373ea102ca3.71457698.jpg', 16, '', 'grid', 0, '2022-06-23', 'kids'),
('62b374375b9d6', 'Grey Moon Pillow', 'Grey moon pillow for chidren. made with comfortable material', 1000, 'S', '#949494', 'media/IMG-62b3743756c658.88681594.jpg', 13, '', 'grid', 0, '2022-06-23', 'kids'),
('62b374ba9d4b5', 'Yellow Giraffe', 'Cute Yellow Giraffe for babies and kids', 1500, 'S', '#ffd500', 'media/IMG-62b374ba9c8b21.34418202.jpg', 13, '', 'grid', 0, '2022-06-23', 'kids'),
('62b37513e123a', 'Teddy', 'Teddy bear', 1500, 'S', '#efe1eb', 'media/IMG-62b37513e09b26.28602004.jpg', 22, '', 'grid', 0, '2022-06-23', 'kids'),
('62b37558f3084', 'Pink Deer', 'Cotton Teddy Bear for Babies', 1500, 'S', '#ffd6fc', 'media/IMG-62b37558f259f8.17102927.jpg', 11, '', 'grid', 0, '2022-06-23', 'kids'),
('62b3758379556', 'Teddy', 'Teddy', 999, 'S', '#ffb3f1', 'media/IMG-62b3758378d7d9.73077077.jpg', 11, '', 'grid', 0, '2022-06-23', 'kids'),
('62b375c65e8ba', 'Brown Teddy Bear', 'Medium Size Teddy Bear', 750, 'M', '#876464', 'media/IMG-62b375c6592772.69662135.jpg', 2, '', 'grid', 0, '2022-06-23', 'kids toy'),
('62b376084e9bd', 'Cat Pillow', 'Small size cat pillow for babies', 1500, 'S', '#ad9090', 'media/IMG-62b376084aea08.36466437.jpg', 8, '', 'grid', 0, '2022-06-23', 'kids'),
('62b3764a3383a', 'Rabbit Doll', 'Rabbit Doll for Kids', 1500, 'S', '#efdcdc', 'media/IMG-62b3764a32cce8.61456020.jpg', 18, '', 'grid', 0, '2022-06-23', 'kids'),
('62b42cfb64832', 'Girl Frock', 'Small Blue baby frock for kids, denim material', 700, 'S', '#4d6aff', 'media/IMG-62b42cfb364b99.89371677.jpg', 8, '', 'owl-carousel', 0, '2022-06-23', 'kids'),
('62b4366a4af1b', 'Baby Shirt', 'Cute little shirt for baby boy', 500, 'S', '#00bfff', 'media/IMG-62b4366a439ee8.58301687.jpg', 18, '', 'owl-carousel', 0, '2022-06-23', 'Kids Dress'),
('62b4b7733ba7d', 'Baby Shoe', 'Nice little pair of shoes for babies, light weight, comfortable material', 500, 'S', '#00d5ff', 'media/IMG-62b4b773193207.75986258.jpg', 14, '', 'owl-carousel', 0, '2022-06-24', 'Kids Dress'),
('62b5a7cb63e37', 'Baby Wedding Frock', 'wedding frock for babies, comfortable material', 2500, 'S', '#0044b3', 'media/62b5a7cb632c5-2022-06-24.png', 23, 'selling', 'owl-carousel', 0, '2022-06-24', 'Kids Dress');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_uuid` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('logedin','logedout','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_uuid`, `name`, `email`, `password`, `status`) VALUES
('62b30c6627907', 'ahzam', 'fawmeeahzam123@gmail.com', 'Ig9gbhbirGOgFWwcwz9eTw==', 'logedin');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `comments_feedback`
--
ALTER TABLE `comments_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_uuid`),
  ADD KEY `user_uuid` (`user_uuid`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments_feedback`
--
ALTER TABLE `comments_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user_table` (`user_uuid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_table` (`id`);

--
-- Constraints for table `comments_feedback`
--
ALTER TABLE `comments_feedback`
  ADD CONSTRAINT `comments_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_uuid`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user_table` (`user_uuid`),
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
