-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2026 at 03:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `argo_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `game` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `server` varchar(50) DEFAULT NULL,
  `diamond` int NOT NULL,
  `payment` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `game`, `user_id`, `server`, `diamond`, `payment`, `created_at`) VALUES
(10, 'PUBG', '12133221', '22112', 60, 'DANA', '2026-03-14 13:49:31'),
(11, 'FF', '0921902', '222222', 86, 'DANA', '2026-03-14 14:07:10'),
(12, 'PUBG', '12133221', '222222', 60, 'DANA', '2026-03-14 14:38:03'),
(13, 'ML', '12133221', '222222', 86, 'DANA', '2026-03-14 14:42:04'),
(14, 'PUBG', '12133221', '22112', 60, 'DANA', '2026-03-14 15:12:45'),
(15, 'ML', 'o', 'm', 86, 'DANA', '2026-03-14 15:13:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
