-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 11:42 AM
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
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `property_title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `property_type` enum('Room','Flat') NOT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `living_room` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `parking` int(11) DEFAULT NULL,
  `area` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `expiry_date` date DEFAULT NULL,
  `sold_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(50) NOT NULL,
  `media` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_title`, `description`, `property_type`, `kitchen`, `bedroom`, `living_room`, `floor`, `parking`, `area`, `total_price`, `location`, `added_date`, `expiry_date`, `sold_status`, `user_id`, `media`) VALUES
(37, 'New Property', 'Perfect flat for Family', 'Flat', 1, 2, 0, 3, 2, 1222.00, 18000.00, 'Pokhara', '2024-03-30 16:52:44', '2024-04-20', 1, 0, '../uploads/17113629656.jpg,../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743390.jpg,../uploads/168447743396.jpg'),
(38, 'Room For student', '1 room available for student', 'Room', 0, 1, 0, 2, 2, 1200.00, 5000.00, 'Bidyabasini', '2024-03-30 16:55:31', '2024-04-17', 1, 0, '../uploads/iamge2a.jpg,../uploads/iamge2b.jpg'),
(40, 'Flat available for rent', 'This flat is available for all. ', 'Flat', 1, 3, 1, 4, 4, 18.00, 30000.00, 'Nagarkot', '2024-03-31 01:37:25', '2024-04-18', 0, 0, '../uploads/171136296515 (1).jpg,../uploads/171136296515.jpg,../uploads/171136296526.jpg,../uploads/171136296563.jpg'),
(56, 'asfd', '', '', 0, 0, 0, 0, 0, 123.00, 32432.00, 'fasf', '2024-03-31 13:01:53', '2024-04-25', 0, 0, '../uploads/171136296526.jpg'),
(57, 'New room available near hospital', 'New room available with many  facility. Near Kirtipur Hospital.', 'Room', 1, 1, 0, 4, 5, 14.00, 4500.00, 'Kirtipur', '2024-03-31 13:42:53', '2024-05-11', 1, 0, '../uploads/kitchen-1.jpg,../uploads/nproom-4-scaled-2.jpg'),
(59, 'Fresh Rental Opportunity by Swayambhunath Stupa in Kathmandu', 'Serene waterfront retreat offering breathtaking sunset views from every room.', 'Room', 0, 0, 0, 1, 3, 12.00, 18000.00, 'Bhaktapur', '2024-03-31 16:38:44', '2024-05-04', 0, 0, '../uploads/image2.jpg'),
(65, 'Your Sanctuary Near Gosaikunda: Discover New Rentals in Rasuwa', 'Family-friendly townhouse with multiple bedrooms, a backyard, and a play area.', 'Room', 1, 0, 0, 0, 0, 11.00, 12.00, 'Dhankuta', '2024-04-01 02:49:51', '2024-04-25', 0, 0, '../uploads/171136296515.jpg'),
(75, 'Newly Listed Rentals Close to Khumbu Icefall in Everest Region', 'Explore our newly listed rentals conveniently located near the Khumbu Icefall in the Everest region. Enjoy unparalleled access to one of the most iconic and breathtaking landscapes on Earth, with comfortable accommodations to enhance your adventure experience.', 'Flat', 2, 8, 2, 3, 14, 1200.00, 80000.00, 'Solukhumbu', '2024-04-01 12:54:37', '2024-04-26', 1, 0, '../uploads/171136296515.jpg'),
(76, 'Rentals Now Open Near the Tranquil Seti River in Pokhara', 'Sunny corner unit in a historic building, boasting vintage charm and character.', 'Room', 1, 4, 1, 3, 3, 1232.00, 6000.00, 'Dhankuta', '2024-04-01 12:55:48', '2024-04-16', 1, 0, '../uploads/171136296563.jpg'),
(77, 'New available in Bisnudevi near the temple', 'We are located near the near bisnudevi temple and kathmandu shiksha campus. We are located near the near bisnudevi temple and kathmandu shiksha campus. We are located near the near bisnudevi temple and kathmandu shiksha campus. ', 'Flat', 1, 2, 1, 5, 5, 344.00, 30000.00, 'Bisnudevi', '2024-04-02 11:27:47', '2024-04-25', 2, 0, '../uploads/17113629656.jpg,../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743390.jpg,../uploads/168447743396.jpg'),
(78, 'Rentals by the Revered Muktinath Temple: Explore Now in Mustang', 'Rentals by the Revered Muktinath Temple: Explore Now in Mustang', 'Room', 0, 1, 0, 2, 2, 24.00, 45000.00, 'Mustang', '2024-04-02 14:47:47', '2024-04-26', 1, 0, '../uploads/nproom-4-scaled-2.jpg'),
(79, 'Landlord property', 'ndkjfahkhewiufhkjsdbf', 'Room', 1, 1, 1, 1, 1, 3.00, 3243.00, 'Kalanki', '2024-04-04 02:43:52', '2024-04-18', 2, 0, '../uploads/171136296515 (1).jpg'),
(80, 'This is the new property with id', 'afdsd', 'Room', 1, 2, 1, 3, 3, 32.00, 3232.00, 'Tari', '2024-04-04 12:13:43', '2024-04-18', 2, 107, '../uploads/image2.jpg'),
(81, 'fdsa', 'afds', 'Room', 3, 3, 23, 4, 4, 12.00, 3232.00, 'Setopul', '2024-04-04 12:15:11', '2024-04-18', 2, 107, '../uploads/iamge2a.jpg'),
(82, 'New room in market.', 'Room is available near the dhulikhel hostpital.', 'Room', 0, 1, 0, 3, 2, 23.00, 2323.00, 'Dhulikel', '2024-04-04 12:42:45', '2024-04-24', 0, 107, '../uploads/nproom-4-scaled-2.jpg');

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
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `userType`) VALUES
(102, 'Admin', 'Admin', 'admin1@gmail.com', '9845154518', '$2y$10$BGYVS.myW8Xhx7RAdFXEbOPZQpaNm/JpkyILFl47fC21CVmCgu07K', 'admin'),
(103, 'Kamala', 'Tamang', 'bimalsahi33@gmail.com', '9846781978', '$2y$10$Jui1eAjR1de0pnMlBfdmfOOaQ0nNFN0dH5WzKIoWzknlD7drkJNkS', 'admin'),
(104, 'Bimala', 'Newar', 'bimala12@gmail.com', '0493535454', '$2y$10$RXy/dyUu1EbNsqkmU6srH.OoXKTTgNw.0GVvlfTs78W39I060r5x2', 'user'),
(105, 'Nepal', 'Basnet', 'yuajnrai07@gmail.com', '9845154861', '$2y$10$8HgXuaFvKTqqJZERUomosOatgqF700Aj/jYuuqd0XO7YdbIVUKqLi', 'admin'),
(106, 'Laxman', 'Rumba', 'laxman12@gmail.com', '9875412465', '$2y$10$du1XKKaIp1LYXyZ6b2cPVOxDP7zHc30DmZAib0cJSeEOd9gkzV5He', 'Tenant'),
(107, 'Nandan', 'Wakle', 'nandan11@gmail.com', '9875464545', '$2y$10$nfa0upVv1oSqEuQliW6IXuC92VTkZFk8EdaMNms6T3elEkI8o74qy', 'Landlord'),
(108, 'Sunil ', 'Dumre', 'sunil34@gmail.com', '984164515', '$2y$10$ocBrWpZyzd7POES7.K9hBeq1ZYQCjv/u/UjOS4tgQMGFH3PqFjEFq', 'Tenant'),
(109, 'Bimala', 'Newar', 'bimala12@gmail.com', '9845154861', '$2y$10$DVjjP0TrbE0AlcDIF1g4su59cfyBDu2sEBThM1cXDqN03EU0VSCPe', 'Tenant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
