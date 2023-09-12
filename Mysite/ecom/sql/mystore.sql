-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2023 at 11:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Do an cho tre nho'),
(2, 'Trai cay');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_image1` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `product_title`, `product_image1`, `fullname`, `phone_number`, `email`, `address`, `order_date`, `quantity`, `price`) VALUES
(5, 42, '0', '', 'uz', '025712512', 'uznubshjt@gmail.com', '205 Huynh Tan Phat', '2023-09-08 09:20:00', 1, 0),
(8, 42, '0', '', 'Nguyen Van A', '092412512', 'nguyenvana@gmail.com', '205 Huynh Tan Phat', '2023-09-08 11:47:00', 1, 0),
(10, 41, '0', '', 'Le Van B', '091251261', 'levanb@gmail.com', '205 Huynh Tan Phat', '2023-09-08 14:20:00', 1, 0),
(11, 41, '0', '', 'Nguyen Van A', '0912481208', 'pnhau@gmail.com', '205 Huynh Tan Phat', '2023-09-08 14:27:00', 1, 0),
(12, 41, '0', '', 'Nguyen Van C', '0912481208', 'pnhau@gmail.com', '205 Huynh Tan Phat', '2023-09-08 14:27:00', 1, 0),
(13, 41, '0', '', 'tung nui ', '0902570199', 'tungnui@gmail.com', '205 Huynh Tan Phat', '2023-09-08 14:34:00', 1, 0),
(14, 41, '0', '', 'tung nui ', '0902570199', 'tungnui@gmail.com', '205 Huynh Tan Phat', '2023-09-08 14:34:00', 17, 0),
(16, 37, '0', '', 'tung nui ', '0912481208', 'tungnui@gmail.com', '205 Huynh Tan Phat', '2023-09-08 16:37:00', 1, 23.99),
(21, 41, '', '', 'tung nui ', NULL, 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', '2023-09-11 17:34:55', 3, 38.97),
(22, 41, '', '', 'tung nui ', NULL, 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', '2023-09-11 17:37:11', 3, 38.97),
(24, 41, '', '', 'tung nui ', NULL, 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', '2023-09-11 17:39:29', 3, 38.97),
(26, 41, 'thit de', 'grilled-goat-meat.jpg', 'huy la ga', NULL, 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', '2023-09-11 17:42:21', 6, 77.94);

-- --------------------------------------------------------

--
-- Table structure for table `order_finish`
--

CREATE TABLE `order_finish` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_title` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `orderdate` datetime NOT NULL,
  `finishdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_finish`
--

INSERT INTO `order_finish` (`id`, `order_id`, `product_id`, `product_title`, `phone_number`, `email`, `address`, `quantity`, `price`, `orderdate`, `finishdate`) VALUES
(1, 2, 42, '0', '0912481208', 'emchoechelsea@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-07 00:00:00', '2023-09-12 00:00:00'),
(2, 2, 42, '0', '0912481208', 'emchoechelsea@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-07 00:00:00', '2023-09-12 00:00:00'),
(3, 2, 42, '0', '0912481208', 'emchoechelsea@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-07 00:00:00', '2023-09-12 00:00:00'),
(4, 26, 41, 'thit de', '', 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', 6, 77.94, '2023-09-11 17:42:21', '2023-09-12 05:53:37'),
(5, 2, 42, '0', '0912481208', 'emchoechelsea@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-07 00:00:00', '2023-09-12 06:01:41'),
(6, 2, 42, '0', '0912481208', 'emchoechelsea@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-07 00:00:00', '2023-09-12 06:01:56'),
(7, 2, 42, '0', '0912481208', 'emchoechelsea@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-07 00:00:00', '2023-09-12 06:09:46'),
(8, 3, 1, '0', '0510520121', 'tungnui@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-08 00:00:00', '2023-09-12 06:10:29'),
(9, 15, 41, '0', '025128612', 'wuanga@gmail.com', '205 Huynh Tan Phat', 12, 0.00, '2023-09-08 16:10:00', '2023-09-12 06:16:41'),
(10, 4, 42, '0', '028521858', 'huyquaga@gmail.com', '205 Huynh Tan Phat', 1, 0.00, '2023-09-08 00:00:00', '2023-09-12 06:21:10'),
(11, 23, 41, '', '', 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', 3, 38.97, '2023-09-11 17:37:15', '2023-09-12 06:22:30'),
(12, 25, 41, '', '', 'phamnguyenhau1412@gmail.com', '205 Huynh Tan Phat', 5, 64.95, '2023-09-11 17:39:39', '2023-09-12 06:23:08'),
(13, 20, 7, '0', '', '', '', 6, 179.94, '2023-09-11 16:08:39', '2023-09-12 06:23:48'),
(14, 17, 37, '0', '0912481208', 'tungnui@gmail.com', '205 Huynh Tan Phat', 1, 23.99, '2023-09-08 16:37:00', '2023-09-12 06:24:02'),
(15, 18, 29, '0', '', '', '', 1, 11.00, '2023-09-11 15:45:27', '2023-09-12 06:28:15'),
(16, 19, 29, '0', '', '', '', 1, 11.00, '2023-09-11 15:56:34', '2023-09-12 06:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` decimal(5,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`, `quantity`) VALUES
(3, 'thit heo quay sua', 'foakgsosakowakowqkoqwkgoqwkgowqgkwqo', 'thit, thit heo', 1, 'maxresdefault.jpg', 'heo-sua-quay-nguyen-con.jpg', 'images.jpeg', 29.99, '2023-09-08 03:07:21', 'true', 99),
(5, 'thit heo quay sua', 'foakgsosakowakowqkoqwkgoqwkgowqgkwqo', 'thit, thit heo', 1, 'maxresdefault.jpg', 'heo-sua-quay-nguyen-con.jpg', 'images.jpeg', 29.99, '2023-09-08 03:07:21', 'true', 99),
(6, 'thit heo quay sua', 'foakgsosakowakowqkoqwkgoqwkgowqgkwqo', 'thit, thit heo', 1, 'maxresdefault.jpg', 'heo-sua-quay-nguyen-con.jpg', 'images.jpeg', 29.99, '2023-09-08 03:07:21', 'true', 99),
(7, 'thit heo quay sua', 'foakgsosakowakowqkoqwkgoqwkgowqgkwqo', 'thit, thit heo', 1, 'maxresdefault.jpg', 'heo-sua-quay-nguyen-con.jpg', 'images.jpeg', 29.99, '2023-09-08 03:07:21', 'true', 99),
(8, 'abaksok', 'oakdgoksaofkoaskfok', 'thit', 1, 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'images.jpeg', 'maxresdefault.jpg', 11.99, '2023-09-08 03:07:21', 'true', 99),
(9, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(11, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(14, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(15, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(16, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(17, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(18, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(19, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(20, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(21, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(22, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(23, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(24, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(25, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(26, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(27, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(28, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(29, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(30, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(31, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(32, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(33, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(34, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(35, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(36, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(37, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(38, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(39, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(40, 'baasdas', 'asdasgaas', 'thit', 1, 'images.jpeg', 'cach-an-thit-trau-gac-bep-dung-chuan-ngon-tuyet-voi-3-760x367.jpg', 'thit-lon-gac-bep.jpg', 11.00, '2023-09-08 03:07:21', 'true', 99),
(41, 'thit de', 'aofskoagkaokgasok', 'thit', 1, 'grilled-goat-meat.jpg', 'maxresdefault.jpg', 'images.jpeg', 12.99, '2023-09-08 03:07:21', 'true', 99),
(42, 'sashimi', 'sogkaogkaokgaogkaosfsafasfasasgasgsagowqkoqwkgoqwkgokwqgoqkwgowqkorqiwtoqutoqutqwotuwqotuqowtuwqqw', 'ca', 1, 'ca-ngu-dai-duong-an-song-nhu-the-nao.jpg', '100g-ca-ngu-co-chua-bao-nhieu-calo-1.jpg', 'sashimi-c123df7.jpg', 129.99, '2023-09-08 04:05:41', 'true', 99),
(43, 'thit heo hop', 'gkasogkasogaksogkasgoaksgosakgokgsaokas', 'thit hop, spam, dong hop', 2, 'download (2).jpeg', 'download (1).jpeg', 'download.jpeg', 12.44, '2023-09-12 04:30:57', 'true', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_finish`
--
ALTER TABLE `order_finish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_finish`
--
ALTER TABLE `order_finish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
