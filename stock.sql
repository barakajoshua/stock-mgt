-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 11:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `unity_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `quantity`, `created_at`, `updated_at`, `unity_price`) VALUES
(075, 'banana', 'very nice', 50.00, 5, '2024-12-12 09:16:17', '2024-12-12 09:40:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`product_id`, `quantity`) VALUES
(NULL, 0),
(NULL, 0),
(12, 0),
(13, 0),
(13, 12),
(13, 56),
(13, 23),
(13, 89),
(13, 89),
(12, 34),
(13, 34),
(13, 23),
(13, 45),
(1, 20),
(1, 30),
(1, 20),
(1, 0),
(1, 50),
(1, 20),
(1, 10),
(1, 50),
(17, 200),
(0, 12),
(17, 23),
(17, 100),
(17, 200),
(17, 100),
(17, 300),
(17, 6000),
(17, 1000),
(17, 10000),
(17, 5500),
(17, 3),
(24, 100),
(23, 5),
(49, 200),
(56, 34),
(56, 25),
(56, 10),
(56, 9),
(56, 9),
(56, 20),
(56, 20),
(56, 100),
(56, 1000),
(56, 500),
(56, 1),
(56, 100),
(56, 50),
(56, 60),
(56, 90),
(59, 19),
(56, 30),
(56, 10),
(56, 20),
(56, 50),
(56, 456),
(56, 2147483647),
(60, 20),
(58, 40),
(57, 40),
(57, 28),
(57, 45),
(58, 60),
(57, 155),
(66, 20),
(66, -29);

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `quantity_out` int(11) NOT NULL,
  `stock_date` date NOT NULL DEFAULT current_timestamp(),
  `out_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `created_at`, `updated_at`, `role`, `email`) VALUES
(1, 'josh', '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 'bob', 'bos12', '2024-11-25 07:09:44', '2024-11-25 07:09:44', 'marley', 'bobmarley@gmail.com'),
(6, '.', 'v', '2024-11-25 07:17:04', '2024-11-25 07:17:04', 'e', 'r'),
(7, 'vfv', 'vfv', '2024-11-25 07:17:49', '2024-11-25 07:17:49', 'vfv', 'vfv'),
(8, 'jeje', '1234', '2024-12-02 06:43:07', '2024-12-02 06:43:07', 'admin', 'admin@gmail.com'),
(9, 'Enock', '12qw', '2024-12-12 06:24:05', '2024-12-12 06:24:05', 'CEO', 'enock'),
(10, 'baba', '12', '2024-12-12 07:17:57', '2024-12-12 07:17:57', 'jj', 'bsytu'),
(11, 'et', 'et', '2024-12-12 07:18:25', '2024-12-12 07:18:25', 'et', 'et');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD KEY `outproduct` (`out_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
