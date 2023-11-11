-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2023 at 05:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneyapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Продукты', '2023-10-13'),
(2, 'Транспорт', '2023-10-13'),
(3, 'Покупки', '2023-10-13'),
(4, 'Подарки', '2023-10-13'),
(5, 'Кафе', '2023-10-13'),
(6, 'Другое', '2023-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `category_summaries`
--

CREATE TABLE `category_summaries` (
  `Id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_summaries`
--

INSERT INTO `category_summaries` (`Id`, `category_id`, `amount`, `description`, `date`) VALUES
(1, 1, 250.00, NULL, '2023-10-14'),
(2, 2, 160.00, NULL, '2023-10-14'),
(3, 3, 100.00, NULL, '2023-10-14'),
(4, 4, 500.00, NULL, '2023-10-14'),
(5, 5, 1290.00, NULL, '2023-10-14'),
(6, 6, 100.00, NULL, '2023-10-14'),
(7, 2, 80.00, 'ехал домой', '2023-10-14'),
(8, 4, 1000.00, 'Купил подарок', '2023-10-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_summaries`
--
ALTER TABLE `category_summaries`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_summaries`
--
ALTER TABLE `category_summaries`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_summaries`
--
ALTER TABLE `category_summaries`
  ADD CONSTRAINT `category_summaries_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
