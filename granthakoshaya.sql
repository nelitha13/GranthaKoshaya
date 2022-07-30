-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 06:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `granthakoshaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--
-- Creation: Jul 28, 2022 at 11:04 AM
--

CREATE TABLE `author` (
  `Author_ID` int(25) NOT NULL,
  `Author` longtext DEFAULT NULL,
  `About` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `author`:
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--
-- Creation: Jul 27, 2022 at 03:19 AM
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `company`:
--

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
-- Creation: Jul 27, 2022 at 03:19 AM
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `gender`, `address`) VALUES
(4, 'Sachini', 'sach@gmail.com', 'abc', 'female', 'Piliyandala'),
(5, 'TEST', 'TEST@gmail.com', 'abc', 'male', 'TEST'),
(6, 'Mekala', 'Mekala@gmail.com', '789', 'female', 'Horana'),
(7, 'Methu', 'Methu@gmail.com', '456', 'female', 'Kiribathgoda'),
(8, 'Suvi', 'Suvi@gmail.com', '852', 'female', 'Gampaha'),
(9, 'Nisansala', 'nisa@gmail.com', '963', 'female', 'Kaduwela');

-- --------------------------------------------------------

--
-- Table structure for table `customer_product`
--
-- Creation: Jul 27, 2022 at 03:19 AM
-- Last update: Jul 28, 2022 at 12:22 PM
--

CREATE TABLE `customer_product` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `bill_date` datetime NOT NULL,
  `is_shipped` int(11) DEFAULT NULL,
  `is_received` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `customer_product`:
--   `customer_id`
--       `customer` -> `id`
--   `product_id`
--       `product` -> `id`
--

--
-- Dumping data for table `customer_product`
--

INSERT INTO `customer_product` (`customer_id`, `product_id`, `qty`, `bill_date`, `is_shipped`, `is_received`) VALUES
(5, 10, 1, '2021-06-19 12:43:05', 1, 0),
(5, 15, 1, '2022-07-27 10:48:38', 1, 0),
(5, 15, 1, '2022-07-28 14:22:17', 1, 0),
(6, 15, 4, '2021-06-20 05:51:58', 1, 0),
(6, 17, 2, '2021-06-20 05:26:03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Jul 28, 2022 at 11:13 AM
-- Last update: Jul 28, 2022 at 12:23 PM
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `Author` text DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `iqty` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `product`:
--   `company_id`
--       `company` -> `id`
--

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category`, `Author`, `stars`, `price`, `offer`, `iqty`, `company_id`, `img`) VALUES
(10, 'Jar Decos', 'A good friend is like a four leaf clover, hard to find and lucky to have. Surprise your bestie with a unique jar decos', 'Crafts', NULL, 0, 1000, 0, 8, 1, '../images/product/17201c15.jpeg'),
(12, 'Love light box', 'Valentine special. Unique gift for your loved ones .portable and light weight. USB powered. Bright full lights. Text can be customized. Automatic RGB colours (7 colours)', 'Crafts', NULL, 0, 600, 0, 12, 1, '../images/product/188775i4.jpeg'),
(13, 'Tassel Chandelier', 'Major part of luxury decorations that use to light and hang for the top of the beds. ', 'Crafts', NULL, 0, 2000, 0, 5, 1, '../images/product/243915c17.jpeg'),
(14, 'Greeting Cards', 'The simplest but the most cherished way to show your love for your loved ones. With the love and blessings of the nature .Made from 100% eco-friendly materials', 'Crafts', NULL, 0, 350, 0, 15, 1, '../images/product/960311c2.jpg'),
(15, 'Beach Jar', 'Decorated with various seashells', 'Crafts', NULL, 0, 1500, 0, 11, 1, '../images/product/679324c5.png'),
(16, 'Dreams Catchers', 'Those who believe in dreamcatchers say that they act as a filter for dreams. They send good dreams for the sleeper and the bad dreams away. More special for lovely once and persons who care you.', 'Crafts', NULL, 0, 1850, 0, 7, 1, '../images/product/828752c11.jpg'),
(17, 'Photo Collage', 'We will make a photo collage as you wish. Show your love to your homies with lovely memory collection and the beauty of the nature.', 'Crafts', NULL, 0, 2500, 0, 4, 1, '../images/product/5006c1.jpeg'),
(19, 'Crystalights Panel ', 'Dimension of one Crystalights :-  🔘Length - 13cm 🔘Height - 1.5cm  Features :-  🔘Ultra bright colors 🔘Made by polystrene materials  🔘Remote controllable 🔘16 various colors 🔘04 color patterns (Strobe,shade,blink,smooth) 🔘Can work by 12V power supply 🔘Portable and lightweight  🔘 can control the light speed', 'Innovation', NULL, 0, 4400, 0, 3, 1, '../images/product/456278i6.png'),
(20, 'PIXELS', 'Pixels are the most wonderful and mind relaxing smart product with millions of pixels with hundred of colors.', 'Innovation', NULL, 0, 3500, 0, 5, 1, '../images/product/671313i2.jpeg'),
(21, ' Crystalights panel ', 'Dimension of one Crystalights :-  🔘Length - 13cm 🔘Height - 1.5cm  Features :-  🔘Ultra bright colors 🔘Made by polystrene materials  🔘Remote controllable 🔘16 various colors 🔘04 color patterns (Strobe,shade,blink,smooth) 🔘Can work by 12V power supply 🔘Portable and lightweight  🔘 can controll the light speed', 'Innovation', NULL, 0, 3500, 0, 5, 1, '../images/product/352858i7.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author_ID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD PRIMARY KEY (`customer_id`,`product_id`,`bill_date`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Author_ID` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `customer_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `customer_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table author
--

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`, `input_transformation`, `input_transformation_options`) VALUES
('granthakoshaya', 'author', 'Author_ID', '', '', '', 'AUTO_INCREMENT', '', '');

--
-- Metadata for table company
--

--
-- Metadata for table customer
--

--
-- Metadata for table customer_product
--

--
-- Metadata for table product
--

--
-- Metadata for database granthakoshaya
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
