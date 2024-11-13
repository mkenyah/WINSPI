-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 01:47 PM
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
-- Database: `projectlight`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(12) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock_price` decimal(10,2) NOT NULL,
  `price_per_bottle` decimal(10,2) NOT NULL,
  `expected_profit` decimal(10,2) DEFAULT NULL,
  `final_profit` decimal(10,2) DEFAULT NULL,
  `user_in_charge` varchar(8) DEFAULT NULL,
  `date_added` date DEFAULT curdate(),
  `time_added` time DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `quantity`, `stock_price`, `price_per_bottle`, `expected_profit`, `final_profit`, `user_in_charge`, `date_added`, `time_added`) VALUES
('S3229', 'chrome', 'spirit', 15, 17999.00, 500.00, 7500.00, 9999.00, 'A115107', '2024-11-11', '18:22:19'),
('S9936', 'chrome', 'spirit', 16, 14000.00, 700.00, 11200.00, 2100.00, 'A115107', '2024-11-11', '18:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `kshSold` decimal(10,2) NOT NULL,
  `userIncharge` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `price_per_bottle` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_id`, `quantity_sold`, `kshSold`, `userIncharge`, `category`, `product_name`, `sale_date`, `price_per_bottle`) VALUES
(15, 'W8866', 2, 2000.00, 'Mburu', 'whiskey', '4cousins', '2024-11-07 10:35:21', 1000.00),
(17, 'S9708', 2, 196.00, 'Mburu', 'soda', 'sprite', '2024-11-08 12:53:52', 98.00),
(18, 'V8022', 4, 2716.00, 'shawn', 'vodka', 'blackberry', '2024-11-08 14:06:40', 679.00),
(19, 'S9708', 2, 196.00, 'ALIFA', 'soda', 'sprite', '2024-11-08 18:45:48', 98.00),
(24, 'V8022', 10, 6790.00, 'kirika', 'vodka', 'blackberry', '2024-11-08 23:45:17', 679.00),
(25, 'S3722', 2, 1400.00, 'mama happy', 'spirit', 'chrome', '2024-11-11 11:58:46', 700.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` varchar(20) NOT NULL,
  `FULL_NAME` varchar(100) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTACT` varchar(15) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` enum('Admin','Employee') NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `FULL_NAME`, `USER_NAME`, `EMAIL`, `CONTACT`, `PASSWORD`, `ROLE`, `CREATED_AT`) VALUES
('A115107', 'Joseph kirika', 'kirika', 'kirikajoseph16@gmail.com', '0769200240', '$2y$10$BXSB1nyttBQ7snmtafB31uXzKyYqwJqQ7KKtmQAgeLqTkqCaygQYO', 'Admin', '2024-11-03 17:02:02'),
('A157260', 'Mama happi', 'mama happy', 'mamahappy@gmail.com', '0756134987', '$2y$10$ZJawSkmawplZa7PtD73QgeHy7zIyGFIPbI8YYwrQHBQzQEKb4joHK', 'Admin', '2024-11-11 11:56:16'),
('A398446', 'Eton mburu', 'Mburu', 'mburuelton@gmail.com', '0700861475', '$2y$10$zMxkbzj..jLhO3JoYRclh.lbOUrNaAONgT8YWmbceR0RHWa35L6ui', 'Employee', '2024-11-03 23:45:32'),
('A433916', 'mary wambui', 'MARY', 'marywambui57@gmail.com', '0717779280', '$2y$10$ZrsDI.dKAPubuM2C5YlvAumH.UrJ70nXBXfkWpN/Vpi/wfZtyCuha', 'Admin', '2024-11-08 16:33:15'),
('A497919', 'joseph muroki', 'muroki', 'murokijoseph@gmail.com', '0745678910', '$2y$10$RT0hi70vW0LuR1aIOHBMCuQqQ88Kw9E95Rz5dX7ThrscarW64jHZy', 'Admin', '2024-11-08 23:28:55'),
('E416582', 'Shawn juja', 'shawn', 'shawnk@gmail.com', '0767861470', '$2y$10$CcXSLx9s6Frx90LzgMajvOqSh6vejKkJtBqasfilLuRGAjGrC1yP6', 'Employee', '2024-11-03 23:28:48'),
('E432993', 'alifa opppo', 'ALIFA', 'oppoalifa@gmail.com', '07456851', '$2y$10$Vd1NJM9YVzKxkLxAdaLZaucSBSRg1cNbsoFMC3wHxkS2V3TmPbK3a', 'Employee', '2024-11-08 18:44:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
