-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 08:15 PM
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

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` int(11) DEFAULT 1,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `status`, `date`) VALUES
(1, 'Samsung', 1, '2025-05-18 01:42:47'),
(2, 'iphone', 1, '2025-05-18 01:42:47'),
(3, 'Aqous', 1, '2025-05-20 21:56:44'),
(4, 'Tecno', 1, '2025-05-20 21:57:01'),
(5, 'Google', 1, '2025-05-21 18:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`category_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `brand_id`, `name`, `status`, `date`) VALUES
(1, 2, 'S', 1, '2025-05-18 01:44:44'),
(2, 2, 'NOTE', 1, '2025-05-18 01:44:44'),
(3, 3, '11 ', 1, '2025-05-20 21:59:10'),
(4, 3, '12', 1, '2025-05-20 22:01:55'),
(5, 3, '13', 1, '2025-05-20 22:04:00'),
(6, 3, '16', 1, '2025-05-20 22:04:08'),
(7, 2, 'Galaxy', 1, '2025-05-21 18:23:02'),
(8, 7, 'pixel', 1, '2025-05-21 23:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(150) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `email`, `phone`, `status`, `date`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '255780598902', 1, '2025-05-21 10:21:47', '$2y$10$kIFBmpN82s9Nzyxe9mWPdOzAH3kVDBl5TI86aW1LXTbmIBihPwAI6', 1),
(2, 'saler', 'saler@gmail.com', '255780598902', 0, '2025-05-21 10:22:15', '$2y$10$157wONHnpNqfz8qaHQhicuKbevmEoymOxPqIja5.ByqXfXuKFeBSq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(30) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placed_orders`
--

CREATE TABLE IF NOT EXISTS `placed_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_phone` varchar(30) NOT NULL,
  `total_price` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `price`, `quantity`, `image`, `status`, `date`) VALUES
(1, 12, '9 pro XI', '20000', '1', '682e36d6739f2.jpg', 1, '2025-05-21 23:25:58'),
(2, 12, '9 pro fold', '20000', '0', '682e37316642c.jpg', 1, '2025-05-21 23:27:29');
(3, 7, '11', '60000', '20', '682cd4ae68917.jpg', 1, '2025-05-20 22:14:54'),
(4, 7, 'pro', '60000', '10', '682cd5934bcff.jpg', 1, '2025-05-20 22:18:43'),
(5, 7, 'pro max', '60000', '8', '682cd5c9f3582.jpg', 1, '2025-05-20 22:19:37'),
(6, 8, 'plain', '60000', '17', '682cd62e12a2c.jpg', 1, '2025-05-20 22:21:18'),
(7, 8, 'mini', '60000', '18', '682cd655683fe.jpg', 1, '2025-05-20 22:21:57'),
(8, 8, 'pro  max', '60000', '34', '682cd7a077012.jpg', 1, '2025-05-20 22:27:28'),
(9, 10, '', '60000', '20', '682cd87da1c24.jpg', 1, '2025-05-20 22:31:09'),
(10, 10, 'plus', '60000', '30', '682cd8a782f32.jpg', 1, '2025-05-20 22:31:51'),
(12, 10, 'pro', '60000', '10', '682cdb5acf421.jpg', 1, '2025-05-20 22:43:22'),
(13, 10, 'pro max', '60000', '20', '682cdba1bc4e3.jpg', 1, '2025-05-20 22:44:33'),
(14, 11, 'A13', '20000', '10', '682df1bf0b780.jpg', 1, '2025-05-21 18:31:11'),
(15, 11, 'A14', '20000', '16', '682df1f272a52.jpg', 1, '2025-05-21 18:32:02'),
(16, 11, 'A16', '20000', '3', '682df27e63fe6.jpg', 1, '2025-05-21 18:34:22'),
(17, 11, 'A22', '20000', '4', '682df2c6b0bbb.jpg', 1, '2025-05-21 18:35:34'),
(18, 11, 'A32', '20000', '2', '682df3ad47982.jpg', 1, '2025-05-21 18:39:25'),
(19, 11, 'S25', '20000', '2', '682df3d45044b.jpg', 1, '2025-05-21 18:40:04'),
(20, 11, 'S25 ultra', '20000', '40', '682df3f8abc04.jpg', 1, '2025-05-21 18:40:40'),
(21, 12, '9', '20000', '10', '682e364f53c61.jpg', 1, '2025-05-21 23:23:43'),
(22, 12, '9a', '20000', '20', '682e36838ae7c.jpg', 1, '2025-05-21 23:24:35'),
(23, 12, '9 pro', '20000', '7', '682e36a273437.jpg', 1, '2025-05-21 23:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `email`, `phone`, `status`, `note`, `date`) VALUES
(1, 'Brayan Mlawa', 'brayanmlawa0917@gmail.com', '255655990092', 1, NULL, '2025-05-21 10:56:35'),
(2, 'cylvenda', 'cylvenda@gmail.com', '255655990092', 1, NULL, '2025-05-21 10:56:58');

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
