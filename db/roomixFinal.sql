-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 05:17 PM
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
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `living_room` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `parking` int(11) DEFAULT NULL,
  `area` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `property_id`, `kitchen`, `bedroom`, `living_room`, `floor`, `parking`, `area`) VALUES
(11, 139, 0, 0, 0, 1, 0, 12.00),
(12, 140, 1, 2, 1, 2, 1, 40.00),
(13, 141, 0, 0, 0, 0, 0, 13.00),
(14, 142, 1, 2, 1, 2, 5, 46.00),
(16, 144, 1, 2, 1, 1, 3, 43.00),
(18, 146, 0, 0, 0, 0, 0, 15.00),
(19, 147, 1, 3, 1, 3, 4, 35.00),
(20, 148, 1, 1, 1, 2, 5, 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `property_title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `property_type` enum('Room','Flat') NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sold_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(50) NOT NULL,
  `media` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_title`, `description`, `property_type`, `total_price`, `location`, `added_date`, `sold_status`, `user_id`, `media`) VALUES
(139, 'Cozy Bedroom Retreat', 'A comfortable and quiet bedroom perfect for relaxation and rest, featuring a queen-sized bed and ample natural light.', 'Room', 60000.00, 'Chabahil', '2024-06-28 14:28:27', 1, 107, '../uploads/384160945_919226916544644_3859226611884163409_n-750x750-200x200.jpg'),
(140, 'Coastal Getaway Flat', 'A stylish and modern apartment right in the heart of the city, with an open living area, fully equipped kitchen, and amazing city views.', 'Flat', 15000.00, 'Balaju', '2024-06-28 14:34:38', 1, 107, '../uploads/17113629656.jpg,../uploads/168447743396.jpg,../uploads/171136296515 (1).jpg'),
(141, 'Cozy Room for Students', 'A bright and comfortable room perfect for students. Includes a study desk, Wi-Fi, and all utilities.', 'Room', 4600.00, 'Maitidevi', '2024-06-28 14:41:31', 1, 107, '../uploads/iamge2b.jpg'),
(142, 'Affordable Flat for Rent', 'A spacious and affordable flat available for rent. Ideal for small families or roommates. Close to public transport and shops.', 'Flat', 18000.00, 'Boudha', '2024-06-28 14:43:13', 1, 107, '../uploads/384496060_341306718286696_2604815063895452589_n-750x750-200x200.jpg,../uploads/385533468_689134773264699_3095181994975914244_n-750x750-200x200.jpg,../uploads/17113629656.jpg,../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743390.jpg'),
(144, 'Modern Studio Flat', 'A stylish and modern studio flat, perfect for single tenants. Fully furnished with all amenities included.', 'Flat', 13000.00, 'Dhobighat', '2024-06-28 15:24:54', 0, 117, '../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743396.jpg'),
(146, 'Furnished Room for Rent', 'Move in hassle-free with this fully furnished room. Everything you need to feel at home.', 'Room', 6400.00, 'Kalanki', '2024-06-29 10:45:39', 1, 117, '../uploads/iamge2b.jpg'),
(147, 'Modern Flat Close to Public Transport', 'Stay connected with this modern flat near bus and train stations. Easy access to the city and beyond.', 'Flat', 4000.00, 'Sundhara', '2024-06-29 10:48:57', 1, 117, '../uploads/iamge2a.jpg'),
(148, 'Affordable Flat for Rent', 'Looking for a budget-friendly place? This flat has everything you need, in a great location.', 'Flat', 32443.00, 'Pokhara', '2024-06-29 10:52:35', 0, 117, '../uploads/171136296515 (1).jpg,../uploads/iamge2b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rent_requests`
--

CREATE TABLE `rent_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `landlord_id` int(14) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sold_status` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent_requests`
--

INSERT INTO `rent_requests` (`id`, `user_id`, `property_id`, `landlord_id`, `request_date`, `sold_status`) VALUES
(1, 109, 148, 117, '2024-06-29 10:55:43', 0),
(2, 118, 144, 117, '2024-06-29 11:12:48', 0);

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
  `password` varchar(255) NOT NULL,
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `userType`) VALUES
(102, 'Admin', 'Admin', 'admin1@gmail.com', '9845154518', '$2y$10$BGYVS.myW8Xhx7RAdFXEbOPZQpaNm/JpkyILFl47fC21CVmCgu07K', 'admin'),
(103, 'Kamala', 'Tamang', 'bimalsahi33@gmail.com', '9846781978', '$2y$10$Jui1eAjR1de0pnMlBfdmfOOaQ0nNFN0dH5WzKIoWzknlD7drkJNkS', 'admin'),
(106, 'Laxman', 'Rumba', 'laxman12@gmail.com', '9875412465', '$2y$10$du1XKKaIp1LYXyZ6b2cPVOxDP7zHc30DmZAib0cJSeEOd9gkzV5He', 'Tenant'),
(107, 'Nandan', 'Wakle', 'nandan11@gmail.com', '9875464545', '$2y$10$nfa0upVv1oSqEuQliW6IXuC92VTkZFk8EdaMNms6T3elEkI8o74qy', 'Landlord'),
(109, 'Bimala', 'Newar', 'bimala12@gmail.com', '9845154861', '$2y$10$DVjjP0TrbE0AlcDIF1g4su59cfyBDu2sEBThM1cXDqN03EU0VSCPe', 'Tenant'),
(110, 'Landlord ', 'land', 'landlord@gmail.com', '0493535454', '$2y$10$7cAiREySR7BvW/VDlW5HsO.lwv5V6o2g7fke7hDWDBWN9Li2OT/Ra', 'Landlord'),
(114, 'Ronak', 'Magar', 'ronakmagar2@gmail.com', '982354545', '$2y$10$U.FSZJTNDnmYMU9PNpuxE.rGsSbWONob60NWu62.P0nQE0wPhYsZK', 'Tenant'),
(117, 'Yujan', 'Rai', 'yujanrai02@gmail.com', '9854345662', '$2y$10$ruPCc3jUsOqtlA5tcrbkcuKo1sL/A7zrpCx.q0z9qtExqeuImRC6i', 'Landlord'),
(118, 'Ronak', 'Magar', 'ronakmagar3@gmail.com', '9845667878', '$2y$10$qJ5ZzKODqp9EdkB/vLbsAOiK5gWAJ9a7FaW8HmhP/uABwvaXa9Xv6', 'Tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_requests`
--
ALTER TABLE `rent_requests`
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
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `rent_requests`
--
ALTER TABLE `rent_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facility`
--
ALTER TABLE `facility`
  ADD CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
