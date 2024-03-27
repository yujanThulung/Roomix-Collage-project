-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 04:50 PM
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
-- Database: `roomix`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(6) UNSIGNED NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `role_as`) VALUES
(65, 'Yujan', 'Rai', 'yujanrai03@gmail.com', '9815715977', '$2y$10$FqkrkupEOsWfGjZJUECEuOn9bFogiEqqEOoZa6ti8BUkU1L5o8MNS', 0),
(75, 'Yujan', 'Rai', 'yujanrai07@gmail.com', '9815715977', '$2y$10$ikG40kBpkv9KvF.fm.1N/uqg6EbQA8LkRvUznLdjh6MzbK0Tiw9U2', 0),
(76, 'Bimal', 'Rana', 'bimalsahi33@gmail.com', '98438743434', '$2y$10$gpcNSrdZOlunJQufsDH57eq1FKRPFJbUxsh9Y.7LYwb04hbMBLrx6', 0),
(78, 'Yugal', 'asdf', 'mi.rad.e.la.cci@gmail.com', '2342344332', '$2y$10$azFsGaXbpKkQcp7xOh.p5eBk7WOvb03zefypv5VPvCSx4ZkODyRme', 0),
(79, 'Admin', 'Admin', 'admin1@gmail.com', '999999999', '$2y$10$TJNMmBNQ7DehROEZQDWHbOLreM8qIwUgTSR9LNmSATdSNZHXJBzdK', 0),
(80, 'Nabin', 'Kaji', 'Nabin1@gmail.com', '999999999', '$2y$10$iLiALuCGih1v/a7O47yjReBZbm/V.ulLnJ9j1w1OKe8K07iO0Kh0C', 0),
(81, 'New', 'New', 'new2@gmial.com', '999999999', '$2y$10$XF3NdnGT6f7z88Sx4Ews4.GU6BJ8UuwxfVjxh2XZXI1SUJ8ol01eK', 0),
(82, 'Nepal', 'Name', 'yujanrai07@gmail.com', '9834434535', '$2y$10$C441GCyJ7N5MtJFeWENx9e6P2Yu1tgDFB4J7FRU3Sci6s3OW2I7sO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) UNSIGNED NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
