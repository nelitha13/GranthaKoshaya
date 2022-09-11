-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 04:20 PM
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
(17, 'Martin Wickramasinghe', NULL, '1578705603-martin223.jpg'),
(22, 'Kumarathunga Munidasa', NULL, '402163991-kumarathunga_munidasakalai.jpg'),
(23, 'K. Jayathilake', NULL, '915759120-download-(1).jpeg'),
(24, 'Ediriweera Sarachchandra', NULL, '760181985-ediriweera-sarachchandra.webp'),
(25, 'T. B. ilangaratne', NULL, '2004517746-download.jpeg'),
(26, 'Chandana Mendis', NULL, '30968588-4325d090-ff40-478d-b282-5624098d646a.png'),
(27, 'Unknown Author', NULL, '778036189-3f037af6-87ce-4a37-bb37-55b48029727d.sized-1000x1000.jpg');

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
(1, 'Novels', '938215793-novels.webp'),
(2, 'Researches', '124387329-20-best-research-methodology-books-for-phd-students.webp'),
(3, 'Action and adventure', '924736529-best-action-advneture-books.webp'),
(4, 'Biography', '323050232-best-biography-books.jpg'),
(5, 'Business/economics', '1483379760-best-entrepreneur-books-1024x768.jpeg'),
(6, 'Crafts/hobbies', '1414201651-612xl78gkkl.jpg'),
(7, 'Cookbooks', '1949244056-img_20380-cropped.jpg'),
(8, 'Dictionaries', '1681842200-p7-morales-dictionary-a-20190416.jpg'),
(9, 'Diaries', '356160051-my2122_cda_elite_lifestyle_2_1350x1350.webp'),
(10, 'Health/fitness', '59492795-51l9mckpp+l._sy445_sx342_ql70_ml2_.jpg'),
(11, 'History', '1683227935-552884.jpg'),
(12, 'Home and garden', '9781579658076_3D-thumb.png'),
(13, 'Religion', '1443574777-faith-bible-religion-christianity-feature-470x248-1280x720.png'),
(14, 'Textbooks', '52312101-textbooks.jpg'),
(15, 'Science & Technology', '854550892-book-title-science-technology-book-title-science-technology-written-spine-111391516.jpg'),
(16, 'Sports and leisure', '1812982320-a1dpof01epl.jpg'),
(17, 'Travel', '341952925-2020_04_26_93814_1587874713._large.jpg'),
(18, 'Others', '518803634-1_s81o15rjkfg-bfdnnc6-gq.jpeg');

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
(1, 'Nelitha', 'nelithavindinu7@gmail.com', 'nelith2006', 'male', 'Keselwaththa'),
(2, 'customer', 'customer@gmail.com', 'abc', 'male', 'TEST'),
(3, 'customer 2', 'customer2@gmail.com', '789', 'male', 'net'),
(4, 'customer 3', 'customer3@gmail.com', '456', 'male', 'net'),
(5, 'customer 4', 'customer4@gmail.com', '852', 'male', 'net');

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
(2, 1, 3, '2022-08-21 20:57:51', 1, 0),
(2, 2, 4, '2022-08-21 20:57:51', 1, 0),
(2, 3, 1, '2022-08-21 20:57:51', 1, 0),
(2, 4, 2, '2022-08-21 20:57:51', 1, 0),
(2, 73, 2, '2022-08-22 15:23:45', 1, 0),
(2, 74, 1, '2022-08-22 15:23:45', 1, 0),
(2, 76, 1, '2022-08-22 15:46:15', 1, 0),
(2, 77, 1, '2022-08-22 15:52:11', 0, 0);

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
  `Author` varchar(100) DEFAULT NULL,
  `Author_ID` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `iqty` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `ebook` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category`, `cat_id`, `Author`, `Author_ID`, `stars`, `price`, `offer`, `iqty`, `company_id`, `img`, `ebook`) VALUES
(1, 'Gam Peraliya', 'A girl is forced into a loveless marriage by her family. Edit Report This. An adaptation of Martin Wickremasinghe\'s seminal Sinhala novel, the story revolves around Nanda (Punya Heendeniya) and Piyal (Henry Jayasena), whose affair is complicated due to their class differences.', 'Novel', 1, 'Martin Wickramasinghe', 17, 0, 490, 0, 10, 1, '../images/product/9757652.jpg', './ebooks/ගම්පෙරළිය-.pdf'),
(2, 'Madol Doowa', 'Mdol Doowa is a children\'s novel and coming-of-age story written by Sri Lankan writer Martin Wickramasinghe and first published in 1947. The book recounts the misadventures of Upali Giniwella and his friends on the Southern coast of Sri Lanka during the 1890s.', 'Novel', 1, 'Martin Wickramasinghe', 17, 0, 300, 0, 23, 1, '../images/product/download.jpeg', './ebooks/Madol Duwa.pdf'),
(3, 'Magul Kaama', 'මඟුල් කෑම - හෙළ ළමා සාහිත්‍යයට අනුපමේය සේවාවක් කළ හෙළයේ මහ ඉසි කුමාරතුංග මුනිදාස සූරීන් විසින් සම්පාදිත මෙම කෘතිය දිගු කලක් ළමා ලෝකයේ ආදරය දිනාගත් විශිෂ්ට කෘතියකි.', 'Novel', 1, 'Kumaratunga Munidasa', 22, NULL, 500, 0, 20, 1, '../images/product/LS645114OE-01-E.webp', './ebooks/මගුල්-කෑම.pdf'),
(4, 'Hath Pana', 'This is the English translation of \'Hath pana\' which is a wonderful story about Neraluwe village leader Kusal Hami\'s stupid son \'Kiri Hami\'. \'Hath pana\' is a masterpiece that delighted the childhood world of the creator Kumaratunga Munidasa who was awarded the title of \'Helaye Maha Isi\'.', 'Novels', 1, 'Kumaratunga Munidasa', 22, NULL, 300, 0, 25, 1, '../images/product/51-QpMt9-xL.jpg', './ebooks/හත්පන.pdf'),
(73, 'Malagiya Aththo', 'Ediriweera Sarachchandra\'s novel based on real life events in Japan', 'Novels', 1, 'Ediriweera Sarachchandra', 24, NULL, 300, NULL, 20, 1, '../images/product/1092206945-malagiya.jpg', '../ebooks/malagiya-aththo.pdf'),
(74, 'Aba Yaluwo', '', 'Novels', 1, 'T. B. ilangaratne', 25, NULL, 300, NULL, 10, 1, '../images/product/1821027617-4575781.jpg', '../ebooks/506098193-aba-yaluwo.jpg'),
(75, 'Kaliyugaya', '', 'Novels', 1, 'Martin Wickramasinghe', 17, NULL, 400, NULL, 20, 1, '../images/product/2044197223-10422852.jpg', '../ebooks/31371654-කලි_යුගය_මාර්ටින්_වික්_රමසිංහ_ශූරීණ්_kali_yugaya.pdf'),
(76, 'අභිරහස් දොස්තර සමඟ ෂර්ලොක් හෝම්ස් සහ අතුරුදහන් වූ නෞකාව', 'Accompanied by Dr. Watson, master sleuth Sherlock Holmes has already encountered the evil young hedonist Edward Hyde, and knew he was strangely connected with Henry Jekyll, the wealthy, respectable London doctor.', 'Action and adventure', 3, 'Chandana Mendis', 26, NULL, 500, NULL, 5, 1, '../images/product/1374561308-14716487.jpg', '../ebooks/981478654-14716487.jpg'),
(77, 'Sri Lanka', 'Details important for travelling in Sri Lanka', 'Travel', 17, 'Unknown Author', 27, NULL, 50, NULL, 30, 1, '../images/product/314972658-d3b6ce9f9806fbc7ff8890910974c93a.jpg', '../ebooks/1585696629-sri-lanka-13e-2015-(-pdfdrive-).pdf');

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
  MODIFY `Author_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `customer_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `customer_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
