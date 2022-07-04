-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 10:46 AM
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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `userid` varchar(20) NOT NULL,
  `address_line1` varchar(50) NOT NULL,
  `address_line2` varchar(50) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `id` int(5) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`userid`, `address_line1`, `address_line2`, `postalcode`, `state`, `id`, `phone`) VALUES
('62bb0f1cb597c', 'D72 Hapugastalawa', 'Nawalapitiya', '20668', 'Central', 3, '0778822883'),
('62bc7baa192ed', 'Nawalapitiya', '', '20600', 'Central', 4, '0760550454');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(3) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL DEFAULT 'notset',
  `admin_type` varchar(20) NOT NULL DEFAULT 'staff',
  `email` varchar(50) NOT NULL DEFAULT 'kjhfaweugfjwygfj@kuwahfawugfj.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_id`, `name`, `password`, `admin_type`, `email`) VALUES
(1, '62b30c6627907', 'ahzam', 'Ig9gbhbirGOgFWwcwz9eTw==', 'super', 'fawmeeahzam123@gmail.com'),
(68, '62b84462325f0', 'Ahzam', 'VY4DDquQMVm4mJEoRvoLBA==', 'staff', 'ahzaamr@gmail.com'),
(85, '62b85ad8aa1c0', 'Sharfa', 'OaoW9B+CEoJU/ZMaM1y9Og==', 'staff', 'sharfa@gmail.com'),
(86, '62b86f2cb9ac0', 'Arshaad', 'notset', 'staff', 'arshad.adkn@gmail.com'),
(87, '62b88466ae57b', 'Anha', '2/6s/+s13pyrE/zQ5u20Pw==', 'staff', 'fawmeeanha@gmail.com'),
(88, '62bc8b21c650f', 'Mushrifa', '2/6s/+s13pyrE/zQ5u20Pw==', 'staff', 'mushrifaa380@gmail.com'),
(90, '62bdcdb0a2bfa', 'admin', 'khvU8s6Z+MsvABNEUY/bfg==', 'super', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `count` int(2) NOT NULL DEFAULT 1
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
  `status` enum('read','unread','','') DEFAULT 'unread',
  `reply` varchar(300) NOT NULL,
  `rating` int(1) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `viewreply` enum('pending','unread','read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments_feedback`
--

INSERT INTO `comments_feedback` (`id`, `user_id`, `name`, `comment`, `status`, `reply`, `rating`, `product_id`, `viewreply`) VALUES
(14, '62bb0f1cb597c', 'Ahzam', 'Hello', 'read', 'how are you', 0, '62b9afe13dc85', 'unread'),
(15, '62bb0f1cb597c', 'Ahzam', 'how about this product', 'read', 'what product', 0, '62b9afe13dc85', 'unread'),
(16, '62bb0f1cb597c', 'Ahzam', 'Nice know', 'read', '', 0, '62b374ba9d4b5', 'unread'),
(17, '62bb0f1cb597c', 'Ahzam', 'suprise', 'read', '', 0, '', 'unread'),
(18, '62bb0f1cb597c', 'Ahzam', 'hello', 'read', '', 0, '', 'unread'),
(19, '62bb0f1cb597c', 'Ahzam', 'rakugarkygakrygkyW', 'read', '', 0, '', 'unread'),
(20, '62bb0f1cb597c', 'Ahzam', 'halamathi habibi halamathi habibo', 'read', '', 0, '62b374ba9d4b5', 'unread'),
(21, '62bc7baa192ed', 'Sharfa', 'my first comment', 'read', 'Now what', 0, '', 'unread'),
(22, '62bc7baa192ed', 'Sharfa', 'tdehnetdh', 'read', '', 0, '', 'unread'),
(23, '62bc7baa192ed', 'Sharfa', 'gwrzegesg', 'read', '', 0, '', 'unread'),
(24, '62bc7baa192ed', 'Sharfa', 'ahaha', 'read', '', 0, '', 'unread'),
(25, '62bc7baa192ed', 'Sharfa', 'ahahah', 'read', '', 0, '', 'unread'),
(26, '62bc7baa192ed', 'Sharfa', 'ahahaha', 'read', '', 0, '', 'unread'),
(27, '62bc7baa192ed', 'Sharfa', 'ahahahaha', 'read', '', 0, '', 'unread'),
(28, '62bc7baa192ed', 'Sharfa', 'ahahah', 'read', '', 0, '', 'unread'),
(29, '62bc7baa192ed', 'Sharfa', 'aahahahah', 'read', '', 0, '', 'unread'),
(30, '62bc7baa192ed', 'Sharfa', 'ahzam is a null avoid loo[', 'read', 'k', 0, '62b97e70eaffc', 'unread'),
(31, '62bc7baa192ed', 'Sharfa', '2022 7:08 Now', 'read', 'kkk', 0, '62b9b37da8a9b', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_product_table`
--

CREATE TABLE `deleted_product_table` (
  `rowid` int(11) NOT NULL,
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
  `category` varchar(20) NOT NULL,
  `addedby` varchar(20) NOT NULL,
  `moreimg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted_product_table`
--

INSERT INTO `deleted_product_table` (`rowid`, `id`, `name`, `description`, `price`, `size`, `colors`, `image`, `stock`, `status`, `display`, `selled`, `date`, `category`, `addedby`, `moreimg`) VALUES
(3, '62b374ba9d4b5', 'Yellow Giraffe', 'Cute Yellow Giraffe for babies and kids', 1500, 'S', '#ffd500', 'media/IMG-62b374ba9c8b21.34418202.jpg', 13, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(4, '62b37513e123a', 'Teddy', 'Teddy bear', 1500, 'S', '#efe1eb', 'media/IMG-62b37513e09b26.28602004.jpg', 22, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(5, '62b37558f3084', 'Pink Deer', 'Cotton Teddy Bear for Babies', 1500, 'S', '#ffd6fc', 'media/IMG-62b37558f259f8.17102927.jpg', 11, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(6, '62b3758379556', 'Teddy', 'Teddy', 999, 'S', '#ffb3f1', 'media/IMG-62b3758378d7d9.73077077.jpg', 11, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(7, '62b375c65e8ba', 'Brown Teddy Bear', 'Medium Size Teddy Bear', 750, 'M', '#876464', 'media/IMG-62b375c6592772.69662135.jpg', 2, 'selling', 'grid', 0, '2022-06-23', 'kids toy', '', ''),
(8, '62b376084e9bd', 'Cat Pillow', 'Small size cat pillow for babies', 1500, 'S', '#ad9090', 'media/IMG-62b376084aea08.36466437.jpg', 8, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(9, '62b3764a3383a', 'Rabbit Doll', 'Rabbit Doll for Kids', 1500, 'S', '#efdcdc', 'media/IMG-62b3764a32cce8.61456020.jpg', 18, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(2, '62b42cfb64832', 'Girl Frock', 'Small Blue baby frock for kids, denim material', 700, 'S', '#4d6aff', 'media/IMG-62b42cfb364b99.89371677.jpg', 8, 'selling', 'owl-carousel', 0, '2022-06-23', 'kids', '', ''),
(3, '62b4366a4af1b', 'Baby Shirt', 'Cute little shirt for baby boy', 500, 'S', '#00bfff', 'media/IMG-62b4366a439ee8.58301687.jpg', 18, 'selling', 'owl-carousel', 0, '2022-06-23', 'Kids Dress', '', ''),
(4, '62b4b7733ba7d', 'Baby Shoe', 'Nice little pair of shoes for babies, light weight, comfortable material', 500, 'S', '#00d5ff', 'media/62b702f5602dc-2022-06-25.png', 14, 'selling', 'owl-carousel', 0, '2022-06-24', 'Kids Dress', '', ''),
(5, '62b5a7cb63e37', 'Baby Wedding Frock', 'wedding frock for babies, comfortable material', 2500, 'S', '#0044b3', 'media/62b5a7cb632c5-2022-06-24.png', 23, 'selling', 'owl-carousel', 0, '2022-06-24', 'Kids Dress', '', ''),
(6, '62b70c2f1b90b', 'wfeaweg', 'wefgqegwrg', 558, 'M', '#ffffff', 'media/62b70c2f1ad06-2022-06-25.png', 9, 'selling', 'none', 0, '2022-06-25', 'Womens Dress', '', ''),
(11, '62b732eed3736', 'Frock', 'frock for kids', 700, 'S', '#feffad', 'media/62b732eecb86e-2022-06-25.png', 1, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(12, '62b73338a1500', 'Frock', 'frock for kids', 1000, 'S', '#000000', 'media/62b73338941af-2022-06-25.png', 50, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(13, '62b7338154166', 'Frock', 'frock for kids', 700, 'M', '#000000', 'media/62b73381515d5-2022-06-25.png', 15, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(14, '62b733b2e49dd', 'Frock', 'frock for kids', 700, 'S', '#000000', 'media/62b733b2da710-2022-06-25.png', 150, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(15, '62b7350ecc292', 'Frock', 'frock for kids', 2410, 'S', '#ea1a1a', 'media/62b7350ecad76-2022-06-25.png', 352, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(16, '62b735c81206a', 'Frock', 'cup cake frock', 2000, 'S', '#000000', 'media/62b735c80ed9a-2022-06-25.png', 901, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(17, '62b7375905685', 'Frock', 'frock', 2099, 'S', '#4a3bba', 'media/62b73758f2544-2022-06-25.png', 1000, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(18, '62b737ed47f0b', 'Frock', 'fashion', 1099, 'S', '#000000', 'media/62b737ed3d9b2-2022-06-25.png', 1840, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(19, '62b738e66f680', 'Frock', 'short sleave ', 999, 'M', '#26a1c0', 'media/62b738e66985a-2022-06-25.png', 257, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(20, '62b73980dbc3d', 'Frock', 'shorts sleave', 1199, 'S', '#0dc981', 'media/62b73980db0a5-2022-06-25.png', 846, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(21, '62b73aa1960e6', 'Frock', 'ventage', 5000, 'S', '#83b0d2', 'media/62b73aa1905cc-2022-06-25.png', 136, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(22, '62b73b0fd8195', 'Frock', 'frock light blue', 999, 'S', '#688321', 'media/62b73b0fd592b-2022-06-25.png', 0, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(23, '62b73c0baf77a', 'Frock', 'clastic ', 1110, 's, m, l', '#000000', 'media/62b73c0ba9ed2-2022-06-25.png', 465, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(24, '62b73cc1e7562', 'Frock', 'frock', 1000, 'S', '#000000', 'media/62b73cc1dbda6-2022-06-25.png', 879, 'selling', 'owl-carousel', 0, '2022-06-25', 'Kids Dress', '', ''),
(7, '62b762788a411', 'Shalwar', 'Black and Perl white shalwar', 2500, 'M', '#00178a', 'media/62b762788a411-2022-06-25.png', 9, 'selling', 'none', 0, '2022-06-26', 'Islamic Girls Dress', '', ''),
(25, '62b763943042d', 'Shalwar', 'Black and Perl white Shalwar with hand bag', 7500, 'S', '#000547', 'media/62b763943042d-2022-06-25.png', 8, 'selling', 'none', 0, '2022-06-26', 'Islamic Girls Dress', '', ''),
(8, '62b86c321a3a7', 'Ahzam', 'fae4gh3wrgrw', 244, 'M', '#000000', 'media/62b86c321a3a7-2022-06-26.png', 2, 'selling', 'none', 0, '2022-06-26', 'Womens Dress', '', ''),
(9, '62b86d828df26', 'Manjal Meham', 'bwstebwetgb', 651, 'S', '#fbff00', 'media/62b86d828df26-2022-06-26.png', 4, 'selling', 'none', 0, '2022-06-26', 'Womens Dress', '', ''),
(10, '62b86de0d1e09', 'Mushrifa', 'asgfserwebwh4et', 90000, 'S', '#ffffff', 'media/62b86de0d1e09-2022-06-26.png', 4, 'selling', 'none', 0, '2022-06-26', 'Womens Dress', '', ''),
(27, '62b97d6b045bf', 'Mens Blazer', 'Grey Oficial Mens Blazer', 750000, 'M', '#9e9e9e', 'media/62b97d6b045bf-2022-06-27.png', 9, 'selling', 'owl-carousel', 0, '2022-06-27', 'Blazer', '62b30c6627907 ', ''),
(11, '62b97dfe9d655', 'Mens Blazer', 'Black Mens Blazer', 750000, 'S', '#000000', 'media/62b97dfe9d655-2022-06-27.png', 8, 'selling', 'owl-carousel', 0, '2022-06-27', 'Blazer', '62b30c6627907 ', ''),
(13, '62b9afe13dc85', 'Blazer', 'Official Mens Blazer. Grey Color ', 2500, 'S, M, L', '#000000', 'media/2022-06-27-62b9afe13dc85.png', 13, 'selling', 'grid', 0, '2022-06-27', 'Blazer', '62b30c6627907 ', 'media/2022-06-27-62b9afe13dc85-(0).jpg##media/2022-06-27-62b9afe13dc85-(1).jpg##media/2022-06-27-62b9afe13dc85-(2).jpg##media/2022-06-27-62b9afe13dc85-(3).jpg '),
(14, '62b9b37dd404c', 'Mens Blazer', 'Mens Wedding Blazer pale blue', 150000, 'S, M, L', '#000000', 'media/2022-06-27-62b9b37dd404c.png', 8, 'selling', 'owl-carousel', 0, '2022-06-27', 'Blazer', '62b30c6627907 ', 'media/2022-06-27-62b9b37dd404c-(0).jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `orderuid` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `payment` int(10) NOT NULL,
  `status` enum('pending','confirmed','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `orderuid`, `userid`, `product_id`, `payment`, `status`, `date`) VALUES
(43, '62c16e9346303', '62bb0f1cb597c', '62b9b37da8a9b', 0, 'cancelled', '2022-07-03'),
(44, '62c16e9346303', '62bb0f1cb597c', '62b373ea16773', 0, 'shipped', '2022-07-03'),
(45, '62c16e9346303', '62bb0f1cb597c', '62b374375b9d6', 0, 'shipped', '2022-07-03'),
(46, '62c16e9346303', '62bb0f1cb597c', '62b764cf4335c', 0, 'cancelled', '2022-07-03'),
(47, '62c16e9346303', '62bb0f1cb597c', '62b97e70eaffc', 0, 'shipped', '2022-07-03'),
(48, '62c1b09faf986', '62bb0f1cb597c', '62b9b37da8a9b', 0, 'shipped', '2022-07-03'),
(49, '62c1b4352f703', '62bc7baa192ed', '62b764cf4335c', 0, 'cancelled', '2022-07-03'),
(50, '62c1b761cdf58', '62bc7baa192ed', '62b97e70eaffc', 0, 'cancelled', '2022-07-03'),
(51, '62c1bbfdd6ffd', '62bc7baa192ed', '62b97e70eaffc', 0, 'confirmed', '2022-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `product_table`
--

CREATE TABLE `product_table` (
  `rowid` int(11) NOT NULL,
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
  `category` varchar(20) NOT NULL,
  `addedby` varchar(20) NOT NULL,
  `moreimg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_table`
--

INSERT INTO `product_table` (`rowid`, `id`, `name`, `description`, `price`, `size`, `colors`, `image`, `stock`, `status`, `display`, `selled`, `date`, `category`, `addedby`, `moreimg`) VALUES
(1, '62b35ae8dad43', 'auhfywfw', 'Super girl', 1568468353, 'M', '#fa0000', 'media/IMG-62b35ae8d61486.73658882.jpg', 1, 'selling', 'owl-carousel', 0, '2022-06-22', 'Womens Dress', '', ''),
(1, '62b373ea16773', 'Pink Girafe', 'Cute Girafe for Babies', 700, 'S', '#ff00c8', 'media/IMG-62b373ea102ca3.71457698.jpg', 0, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(2, '62b374375b9d6', 'Grey Moon Pillow', 'Grey moon pillow for chidren. made with comfortable material', 1000, 'S', '#949494', 'media/IMG-62b3743756c658.88681594.jpg', 0, 'selling', 'grid', 0, '2022-06-23', 'kids', '', ''),
(10, '62b69f364ff3f', 'Watch', 'Slim wrist watch for men women', 2000, 'M', '#ffdab8', 'media/62bc977f2cb7e-2022-06-29.png', 0, 'selling', 'grid', 0, '2022-06-25', 'Womens Accesorie', '', ''),
(26, '62b764cf4335c', 'Rollex', 'Golden interface and black leather strap.', 15000, 'S', '#e0e0e0', 'media/62bc97602af3b-2022-06-29.png', 2, 'selling', 'grid', 0, '2022-06-26', 'Mens Accesorie', '', ''),
(12, '62b97e70eaffc', 'Mens Blazer', 'Grey Mens Blazer', 1000000, 'S', '#000000', 'media/62b97e70eaffc-2022-06-27.png', 2, 'selling', 'grid', 0, '2022-06-27', 'Blazer', '62b30c6627907 ', ''),
(28, '62b9b37da8a9b', 'Mens Blazer', 'Mens Wedding Blazer pale blue', 150000, 'S, M, L', '#000000', 'media/2022-06-27-62b9b37da8a9b.png', 7, 'selling', 'grid', 0, '2022-06-27', 'Blazer', '62b30c6627907 ', 'media/2022-06-27-62b9b37da8a9b-(0).jpg '),
(29, '62bc04a7e594e', 'Mens Blazer', 'mens wedding blazer', 1500000, 'S, M, L', '#f2f0e8', 'media/2022-06-29-62bc04a7e594e.png', 0, 'selling', 'grid', 0, '2022-06-29', 'Blazer', '62b30c6627907 ', 'media/2022-06-29-62bc04a7e594e-(0).jpg##media/2022-06-29-62bc04a7e594e-(1).jpg##media/2022-06-29-62bc04a7e594e-(2).jpg ');

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
('62bb0f1cb597c', 'Ahzam', 'fawmeeahzam123@gmail.com', 'ERi5kbe+HqL2jS9USzC/ig==', 'logedin'),
('62bc7baa192ed', 'Sharfa', 'sharfa@gmail.com', 'ERi5kbe+HqL2jS9USzC/ig==', 'logedin');

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
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `customer_id`, `product_id`) VALUES
(16, '62bb0f1cb597c', '62bc04a7e594e'),
(20, '62bc7baa192ed', '62b9b37da8a9b'),
(21, '62bc7baa192ed', '62bc04a7e594e'),
(22, '62bc7baa192ed', '62b97e70eaffc'),
(23, '62bc7baa192ed', '62b373ea16773'),
(24, '62bc7baa192ed', '62b374375b9d6'),
(25, '62bb0f1cb597c', '62b9b37da8a9b'),
(26, '62bb0f1cb597c', '62b764cf4335c'),
(27, '62bb0f1cb597c', '62b97e70eaffc'),
(28, '62bb0f1cb597c', '62b374375b9d6'),
(29, '62bb0f1cb597c', '62b373ea16773');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `deleted_product_table`
--
ALTER TABLE `deleted_product_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `rowid` (`rowid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `rowid` (`rowid`);

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
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `comments_feedback`
--
ALTER TABLE `comments_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deleted_product_table`
--
ALTER TABLE `deleted_product_table`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_table`
--
ALTER TABLE `product_table`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_table` (`user_uuid`);

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
