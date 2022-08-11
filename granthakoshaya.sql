-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 05:44 PM
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

CREATE TABLE `author` (
  `Author_ID` int(25) NOT NULL,
  `Author` longtext DEFAULT NULL,
  `About` longtext DEFAULT NULL,
  `author_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author_ID`, `Author`, `About`, `author_img`) VALUES
(1, 'Test Author 1', 'aaaa', NULL),
(2, 'Test Author 2', '44444444444', NULL),
(3, 'Test Author 3', 'bbbbbbbbbb', NULL),
(4, 'Test Author 4', NULL, NULL),
(5, 'Test Author 5', NULL, NULL),
(6, 'Test Author 6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Novels', NULL),
(2, 'Researches', NULL),
(9, 'Test Cat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `password`, `address`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `gender`, `address`) VALUES
(4, 'Sachini', 'sach@gmail.com', 'abc', 'female', 'Piliyandala'),
(5, 'customer', 'customer@gmail.com', 'abc', 'male', 'TEST'),
(6, 'Mekala', 'Mekala@gmail.com', '789', 'female', 'Horana'),
(7, 'Methu', 'Methu@gmail.com', '456', 'female', 'Kiribathgoda'),
(8, 'Suvi', 'Suvi@gmail.com', '852', 'female', 'Gampaha'),
(9, 'Nisansala', 'nisa@gmail.com', '963', 'female', 'Kaduwela');

-- --------------------------------------------------------

--
-- Table structure for table `customer_product`
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
-- Dumping data for table `customer_product`
--

INSERT INTO `customer_product` (`customer_id`, `product_id`, `qty`, `bill_date`, `is_shipped`, `is_received`) VALUES
(5, 10, 1, '2021-06-19 12:43:05', 1, 0),
(5, 15, 1, '2022-07-27 10:48:38', 1, 0),
(5, 15, 1, '2022-07-28 14:22:17', 1, 0),
(5, 15, 1, '2022-08-02 16:35:58', 1, 0),
(5, 21, 2, '2022-07-31 19:41:40', 1, 0),
(6, 15, 4, '2021-06-20 05:51:58', 1, 0),
(6, 17, 2, '2021-06-20 05:26:03', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `name`, `feedback`, `rating`) VALUES
(1, 'Nelitha Vindinu Priyawansha', 'test', '4'),
(2, 'Nelitha Priyawansha', 'test', '5'),
(3, 'Freedom Library', 'test 2', '3'),
(4, 'Indraka Priyawansha', 'test 3', '2'),
(5, 'name', 'test 4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `Author` varchar(11) DEFAULT NULL,
  `Author_ID` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `iqty` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `ebook` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category`, `cat_id`, `Author`, `Author_ID`, `stars`, `price`, `offer`, `iqty`, `company_id`, `img`, `ebook`) VALUES
(10, 'Jar Decos', 'A good friend is like a four leaf clover, hard to find and lucky to have. Surprise your bestie with a unique jar decos', 'crafts ', 1, '1', 3, 0, 1000, 0, 8, 1, '../images/product/17201c15.jpeg', NULL),
(12, 'Love light box', 'Valentine special. Unique gift for your loved ones .portable and light weight. USB powered. Bright full lights. Text can be customized. Automatic RGB colours (7 colours)', 'innovation', 2, '2', 3, 0, 600, 0, 12, 1, '../images/product/188775i4.jpeg', NULL),
(13, 'Tassel Chandelier', 'Major part of luxury decorations that use to light and hang for the top of the beds. ', NULL, 9, '1', 5, 0, 2000, 0, 5, 1, '../images/product/243915c17.jpeg', NULL),
(14, 'Greeting Cards', 'The simplest but the most cherished way to show your love for your loved ones. With the love and blessings of the nature .Made from 100% eco-friendly materials', NULL, 1, '2', 4, 0, 350, 0, 15, 1, '../images/product/960311c2.jpg', NULL),
(15, 'Beach Jar', 'Decorated with various seashells', NULL, 2, NULL, 6, 0, 1500, 0, 11, 1, '../images/product/679324c5.png', NULL),
(16, 'Dreams Catchers', 'Those who believe in dreamcatchers say that they act as a filter for dreams. They send good dreams for the sleeper and the bad dreams away. More special for lovely once and persons who care you.', NULL, 9, NULL, 2, 0, 1850, 0, 7, 1, '../images/product/828752c11.jpg', NULL),
(17, 'Photo Collage', 'We will make a photo collage as you wish. Show your love to your homies with lovely memory collection and the beauty of the nature.', NULL, 1, NULL, 6, 0, 2500, 0, 4, 1, '../images/product/5006c1.jpeg', NULL),
(19, 'Crystalights Panel ', 'Dimension of one Crystalights :-  🔘Length - 13cm 🔘Height - 1.5cm  Features :-  🔘Ultra bright colors 🔘Made by polystrene materials  🔘Remote controllable 🔘16 various colors 🔘04 color patterns (Strobe,shade,blink,smooth) 🔘Can work by 12V power supply 🔘Portable and lightweight  🔘 can control the light speed', NULL, 1, NULL, 2, 0, 4400, 0, 3, 1, '../images/product/456278i6.png', NULL),
(20, 'PIXELS', 'Pixels are the most wonderful and mind relaxing smart product with millions of pixels with hundred of colors.', NULL, 1, NULL, 4, 0, 3500, 0, 5, 1, '../images/product/671313i2.jpeg', NULL),
(21, ' Crystalights panel ', 'Dimension of one Crystalights :-  🔘Length - 13cm 🔘Height - 1.5cm  Features :-  🔘Ultra bright colors 🔘Made by polystrene materials  🔘Remote controllable 🔘16 various colors 🔘04 color patterns (Strobe,shade,blink,smooth) 🔘Can work by 12V power supply 🔘Portable and lightweight  🔘 can controll the light speed', NULL, 1, NULL, 5, 0, 3500, 0, 5, 1, '../images/product/352858i7.jpeg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

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
  MODIFY `Author_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `author` (`Author_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
