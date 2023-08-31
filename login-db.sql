-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 08:32 PM
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
-- Database: `login-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Alex', 'email@example.com', '$2y$10$XfVS966/40FmncMmTUAHp.Vn1BytPmp6YiUSE65PRyyLCGPbD/q5G', 'ae3825c8b6c1b21651338853e93ff7d50c94f5533ec6ebc563ba6ef27cbf2f18', '2023-08-31 20:57:15'),
(9, 'Alex', 'newemail@mail.com', '$2y$10$lC0GOEtNj03CKZj5AJknleHTAddxBiS0QH8TXa0kJrGtPR52ZpZEW', NULL, NULL),
(11, 'Alex', 'ne2wemail@mail.com', '$2y$10$3uBOTFsK761GkYxDmr5cp.f/zQPgBVtlh1tPs7wUoVjDQ6F9xGVFy', NULL, NULL),
(12, 'Alex', 'newuser@mail.com', '$2y$10$plbdhP0moY7q3PXl/lr8deWjDPw9vl/klgAo8d0khDjZZ.OC5yqLG', NULL, NULL),
(13, 'Alex', 'em2ail@example.com', '$2y$10$CrVdnusYkJud4gULne4ZPuANGxD85ajkEN7i5R6LacK2JLPYshCr6', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
