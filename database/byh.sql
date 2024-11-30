-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 02:45 PM
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
-- Database: `byh`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `firebase_uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image_url`) VALUES
(1, 'French Butter Croissant', 'pastries', 135.00, 'images/pastry1.jpg'),
(2, 'Chocolate Croissant', 'pastries', 145.00, 'images/pastry2.jpg'),
(3, 'Breton Roll', 'pastries', 230.00, 'images/pastry3.jpg'),
(4, 'Cheese Danish', 'pastries', 100.00, 'images/pastry4.jpg'),
(5, 'Dark Chocolate Twist', 'pastries', 130.00, 'images/pastry5.jpg'),
(6, 'Tomato & Mushroom Twist', 'pastries', 120.00, 'images/pastry6.jpg'),
(7, 'French Onion Twist', 'pastries', 120.00, 'images/pastry7.jpg'),
(8, 'Hazelnut Vanilla Crown', 'pastries', 150.00, 'images/pastry8.jpg'),
(9, 'New York Cheesecake', 'cake', 245.00, 'images/cake1.jpg'),
(10, 'Blueberry Cheesecake Slice', 'cake', 260.00, 'images/cake2.jpg'),
(11, 'Classic Chocolate Cake Slice', 'cake', 230.00, 'images/cake3.jpg'),
(12, 'Red Velvet Cake Slice', 'cake', 240.00, 'images/cake4.jpg'),
(13, 'Vanilla Bean Cake Slice', 'cake', 230.00, 'images/cake5.jpg'),
(14, 'Mango Passion Cake Slice', 'cake', 250.00, 'images/cake6.jpg'),
(15, 'Banoffee Pie', 'dessert', 180.00, 'images/dessert1.jpg'),
(16, 'Custard Tart', 'dessert', 120.00, 'images/dessert2.jpg'),
(17, 'Strawberry Tart', 'dessert', 170.00, 'images/dessert3.jpg'),
(18, 'Chocolate Tart', 'dessert', 190.00, 'images/dessert4.jpg'),
(19, 'Raspberry Meringue Tartlet', 'dessert', 200.00, 'images/dessert5.jpg'),
(20, 'Tiramisu', 'dessert', 160.00, 'images/dessert6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firebase_uid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firebase_uid`, `email`, `name`, `photo_url`) VALUES
(1, 'pU9F52RyXWaMrVFU4PLigDNlL4l2', 'methethrower@gmail.com', 'Throw Me', 'https://lh3.googleusercontent.com/a/ACg8ocLjvRCfJa-CHixLNidv9z_iDGZexsuRrZEmfqVKKVNFxqJc3Q=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `firebase_uid` (`firebase_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
