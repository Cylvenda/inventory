-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 02:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) DEFAULT 1,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `status`, `date`) VALUES
(2, 'Samsung', 1, '2025-05-18 01:42:47'),
(3, 'iphone', 1, '2025-05-18 01:42:47'),
(5, 'Aqous', 1, '2025-05-20 21:56:44'),
(6, 'Tecno', 1, '2025-05-20 21:57:01'),
(7, 'Google', 1, '2025-05-21 18:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `brand_id`, `name`, `status`, `date`) VALUES
(3, 2, 'S', 1, '2025-05-18 01:44:44'),
(4, 2, 'NOTE', 1, '2025-05-18 01:44:44'),
(7, 3, '11 ', 1, '2025-05-20 21:59:10'),
(8, 3, '12', 1, '2025-05-20 22:01:55'),
(9, 3, '13', 1, '2025-05-20 22:04:00'),
(10, 3, '16', 1, '2025-05-20 22:04:08'),
(11, 2, 'Galaxy', 1, '2025-05-21 18:23:02'),
(12, 7, 'pixel', 1, '2025-05-21 23:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(150) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `email`, `phone`, `status`, `date`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '255780598902', 1, '2025-05-21 10:21:47', '$2y$10$kIFBmpN82s9Nzyxe9mWPdOzAH3kVDBl5TI86aW1LXTbmIBihPwAI6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(30) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`, `date`) VALUES
(1, 3, 3, '3', '60000', 180000, '2025-05-28 13:10:24'),
(2, 3, 6, '3', '60000', 180000, '2025-05-28 13:10:24'),
(3, 3, 13, '4', '60000', 240000, '2025-05-28 13:10:24'),
(4, 4, 3, '3', '60000', 180000, '2025-05-28 13:10:38'),
(5, 4, 6, '3', '60000', 180000, '2025-05-28 13:10:38'),
(6, 4, 13, '4', '60000', 240000, '2025-05-28 13:10:38'),
(7, 5, 3, '3', '60000', 180000, '2025-05-28 13:10:39'),
(8, 5, 6, '3', '60000', 180000, '2025-05-28 13:10:39'),
(9, 5, 13, '4', '60000', 240000, '2025-05-28 13:10:39'),
(10, 6, 4, '5', '60000', 300000, '2025-05-28 13:27:26'),
(11, 6, 5, '3', '60000', 180000, '2025-05-28 13:27:26'),
(12, 6, 10, '3', '60000', 180000, '2025-05-28 13:27:26'),
(13, 7, 4, '1', '60000', 60000, '2025-05-28 13:36:12'),
(14, 7, 8, '1', '60000', 60000, '2025-05-28 13:36:12'),
(15, 7, 16, '1', '20000', 20000, '2025-05-28 13:36:12'),
(16, 7, 18, '1', '20000', 20000, '2025-05-28 13:36:12'),
(17, 7, 23, '3', '20000', 60000, '2025-05-28 13:36:12'),
(18, 8, 4, '1', '60000', 60000, '2025-05-28 13:36:20'),
(19, 8, 8, '1', '60000', 60000, '2025-05-28 13:36:20'),
(20, 8, 16, '1', '20000', 20000, '2025-05-28 13:36:20'),
(21, 8, 18, '1', '20000', 20000, '2025-05-28 13:36:20'),
(22, 8, 23, '3', '20000', 60000, '2025-05-28 13:36:20'),
(39, 13, 5, '1', '60000', 60000, '2025-05-28 13:53:31'),
(40, 13, 3, '1', '60000', 60000, '2025-05-28 13:53:31'),
(41, 14, 20, '1', '20000', 20000, '2025-05-28 14:29:37'),
(43, 16, 5, '4', '60000', 240000, '2025-05-28 15:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE `placed_orders` (
  `order_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_phone` varchar(30) NOT NULL,
  `subtotal` varchar(30) NOT NULL,
  `total_price` varchar(50) DEFAULT NULL,
  `total_items` int(11) NOT NULL,
  `payed_amount` varchar(30) NOT NULL,
  `discount` varchar(30) NOT NULL,
  `payment_method` varchar(30) NOT NULL DEFAULT 'cash',
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placed_orders`
--

INSERT INTO `placed_orders` (`order_id`, `employee_id`, `client_name`, `client_email`, `client_phone`, `subtotal`, `total_price`, `total_items`, `payed_amount`, `discount`, `payment_method`, `status`, `payment_status`, `date`) VALUES
(3, 1, 'bewgshf rdsgvbrjd', 'brayanmlawa0917@gmail.com', '453895636948', '600000', '540000', 10, '480000', '10', 'cash', 0, 0, '2025-05-28 13:10:24'),
(4, 1, 'bewgshf rdsgvbrjd', 'brayanmlawa0917@gmail.com', '453895636948', '600000', '540000', 10, '480000', '10', 'cash', 0, 0, '2025-05-28 13:10:38'),
(5, 1, 'bewgshf rdsgvbrjd', 'brayanmlawa0917@gmail.com', '453895636948', '600000', '540000', 10, '480000', '10', 'cash', 0, 0, '2025-05-28 13:10:39'),
(6, 1, 'Elline Edecy', 'ellinejohn@gmail.com', '255654611651', '660000', '627000', 11, '600000', '5', 'cash', 0, 0, '2025-05-28 13:27:26'),
(7, 1, 'jhgdf uireh', 'b@gmail.com', '8573894538946', '220000', '220000', 7, '0', '0', 'cash', 0, 0, '2025-05-28 13:36:12'),
(8, 1, 'jhgdf uireh', 'b@gmail.com', '8573894538946', '220000', '220000', 7, '0', '0', 'cash', 1, 0, '2025-05-28 13:36:19'),
(13, 1, 'bdsyhf', 'rfjgvn@gmail.cjcvn', '748354563965', '120000', '108000', 2, '0', '10', 'cash', 0, 0, '2025-05-28 13:53:31'),
(14, 1, 'jyg', 'b@gmail.com', '68758', '20000', '20000', 1, '20000', '0', 'cash', 0, 0, '2025-05-28 14:29:37'),
(16, 1, 'test', 'test@gmail.com', '768', '240000', '120000', 4, '120000', '50', 'cash', 0, 0, '2025-05-28 15:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `price`, `quantity`, `image`, `status`, `date`) VALUES
(3, 7, '11', '1500000', '10', '682cd4ae68917.jpg', 1, '2025-05-20 22:14:54'),
(4, 7, 'pro', '2000000', '3', '682cd5934bcff.jpg', 1, '2025-05-20 22:18:43'),
(5, 7, 'pro max', '3000000', '0', '682cd5c9f3582.jpg', 1, '2025-05-20 22:19:37'),
(6, 8, 'plain', '1000000', '8', '682cd62e12a2c.jpg', 1, '2025-05-20 22:21:18'),
(7, 8, 'mini', '800000', '18', '682cd655683fe.jpg', 1, '2025-05-20 22:21:57'),
(8, 8, 'pro  max', '3500000', '32', '682cd7a077012.jpg', 1, '2025-05-20 22:27:28'),
(9, 10, 'plain', '3600000', '20', '682cd87da1c24.jpg', 1, '2025-05-20 22:31:09'),
(10, 10, 'plus', '2060000', '27', '682cd8a782f32.jpg', 1, '2025-05-20 22:31:51'),
(12, 10, 'pro', '1600000', '10', '682cdb5acf421.jpg', 1, '2025-05-20 22:43:22'),
(13, 10, 'pro max', '2600000', '8', '682cdba1bc4e3.jpg', 1, '2025-05-20 22:44:33'),
(14, 11, 'A13', '600000', '10', '682df1bf0b780.jpg', 1, '2025-05-21 18:31:11'),
(15, 11, 'A14', '590000', '16', '682df1f272a52.jpg', 1, '2025-05-21 18:32:02'),
(16, 11, 'A16', '350000', '1', '682df27e63fe6.jpg', 1, '2025-05-21 18:34:22'),
(17, 11, 'A22', '750000', '4', '682df2c6b0bbb.jpg', 1, '2025-05-21 18:35:34'),
(18, 11, 'A32', '640000', '0', '682df3ad47982.jpg', 1, '2025-05-21 18:39:25'),
(19, 11, 'S25', '5000000', '2', '682df3d45044b.jpg', 1, '2025-05-21 18:40:04'),
(20, 11, 'S25 ultra', '6000000', '39', '682df3f8abc04.jpg', 1, '2025-05-21 18:40:40'),
(21, 12, '9', '1000000', '10', '682e364f53c61.jpg', 1, '2025-05-21 23:23:43'),
(22, 12, '9a', '1500000', '20', '682e36838ae7c.jpg', 1, '2025-05-21 23:24:35'),
(23, 12, '9 pro', '2000000', '1', '682e36a273437.jpg', 1, '2025-05-21 23:25:06'),
(24, 12, '9 pro XI', '3000000', '1', '682e36d6739f2.jpg', 1, '2025-05-21 23:25:58'),
(25, 12, '9 pro fold', '4000000', '0', '682e37316642c.jpg', 1, '2025-05-21 23:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `email`, `phone`, `status`, `note`, `date`) VALUES
(1, 'Brayan Mlawa', 'brayanmlawa0917@gmail.com', '255655990092', 1, NULL, '2025-05-21 10:56:35'),
(2, 'Cylvenda', 'cylvenda@gmail.com', '255655990092', 1, NULL, '2025-05-21 10:56:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `placed_orders`
--
ALTER TABLE `placed_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `placed_orders` (`order_id`);

--
-- Constraints for table `placed_orders`
--
ALTER TABLE `placed_orders`
  ADD CONSTRAINT `placed_orders_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
