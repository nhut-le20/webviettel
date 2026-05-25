-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2026 at 04:51 AM
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
-- Database: `webviettel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `service` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `company`, `message`, `created_at`, `service`) VALUES
(1, 'Tran Minh', '', '0398361004', NULL, 'đă đăng ký', '2026-05-23 04:12:50', 'VBHXH điện tử'),
(2, 'Tran Minh', '', '21314124', NULL, 'alo', '2026-05-23 08:37:54', 'Quản lý nhà thuốc'),
(3, 'hellp', '', '0398361004', NULL, 'chào ban', '2026-05-23 08:41:59', 'Chữ ký số CA'),
(4, 'Tran Minh', '', '21314124', NULL, 'alo', '2026-05-23 08:45:18', 'Quản lý nhà thuốc'),
(5, 'Tran Minh', '', '21314124', NULL, 'chào admin', '2026-05-23 08:45:29', 'Quản lý nhà thuốc'),
(6, 'Lễ của ngày hôm qua', '', '1234567', NULL, 'chào admin', '2026-05-23 08:51:49', 'Kế toán Viettel'),
(7, 'Lễ của ngày hôm nay', '', '123456789', NULL, 'chào các admin', '2026-05-23 08:52:41', 'Mysign'),
(8, 'dấd12', '', '123123414', NULL, 'đawd', '2026-05-25 01:53:39', 'Mysign'),
(9, 'Tran Minh', '', '21312', NULL, 'hello admin', '2026-05-25 01:55:48', 'Quản lý nhà thuốc'),
(10, 'Tran Minh', '', '21312', NULL, 'hello admin', '2026-05-25 02:00:12', 'Quản lý nhà thuốc'),
(11, 'Tran Minh', '', '21312', NULL, 'hello admin', '2026-05-25 02:11:48', 'Quản lý nhà thuốc'),
(12, 'Tran Minh', '', '21312', NULL, 'hello admin', '2026-05-25 02:12:13', 'Quản lý nhà thuốc'),
(13, 'Tran Minh', '', '21312', NULL, 'hello admin', '2026-05-25 02:16:29', 'Quản lý nhà thuốc'),
(14, 'lưkdnưka', '', '01i2398y13871', NULL, 'ladada', '2026-05-25 02:18:04', 'Kế toán Viettel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
