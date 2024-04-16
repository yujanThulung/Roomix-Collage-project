-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 03:51 AM
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
  `sold_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(50) NOT NULL,
  `media` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `property_title`, `description`, `property_type`, `kitchen`, `bedroom`, `living_room`, `floor`, `parking`, `area`, `total_price`, `location`, `added_date`, `sold_status`, `user_id`, `media`) VALUES
(37, 'New Property', 'Perfect flat for Family', 'Flat', 1, 2, 0, 3, 2, 1222.00, 18000.00, 'Pokhara', '2024-03-30 16:52:44', 1, 0, '../uploads/17113629656.jpg,../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743390.jpg,../uploads/168447743396.jpg'),
(38, 'Room For student', '1 room available for student', 'Room', 0, 1, 0, 2, 2, 1200.00, 5000.00, 'Bidyabasini', '2024-03-30 16:55:31', 1, 0, '../uploads/iamge2a.jpg,../uploads/iamge2b.jpg'),
(40, 'Flat available for rent', 'This flat is available for all. ', 'Flat', 1, 3, 1, 4, 4, 18.00, 30000.00, 'Nagarkot', '2024-03-31 01:37:25', 0, 0, '../uploads/171136296515 (1).jpg,../uploads/171136296515.jpg,../uploads/171136296526.jpg,../uploads/171136296563.jpg'),
(57, 'New room available near hospital', 'New room available with many  facility. Near Kirtipur Hospital.', 'Room', 1, 1, 0, 4, 5, 14.00, 4500.00, 'Kirtipur', '2024-03-31 13:42:53', 1, 0, '../uploads/kitchen-1.jpg,../uploads/nproom-4-scaled-2.jpg'),
(59, 'Fresh Rental Opportunity by Swayambhunath Stupa in Kathmandu', 'Serene waterfront retreat offering breathtaking sunset views from every room.', 'Room', 0, 0, 0, 1, 3, 12.00, 18000.00, 'Bhaktapur', '2024-03-31 16:38:44', 0, 0, '../uploads/image2.jpg'),
(65, 'Your Sanctuary Near Gosaikunda: Discover New Rentals in Rasuwa', 'Family-friendly townhouse with multiple bedrooms, a backyard, and a play area.', 'Room', 1, 0, 0, 0, 0, 11.00, 12.00, 'Dhankuta', '2024-04-01 02:49:51', 0, 0, '../uploads/171136296515.jpg'),
(75, 'Newly Listed Rentals Close to Khumbu Icefall in Everest Region', 'Explore our newly listed rentals conveniently located near the Khumbu Icefall in the Everest region. Enjoy unparalleled access to one of the most iconic and breathtaking landscapes on Earth, with comfortable accommodations to enhance your adventure experience.', 'Flat', 2, 8, 2, 3, 14, 1200.00, 80000.00, 'Solukhumbu', '2024-04-01 12:54:37', 1, 0, '../uploads/171136296515.jpg'),
(76, 'Rentals Now Open Near the Tranquil Seti River in Pokhara', 'Sunny corner unit in a historic building, boasting vintage charm and character.', 'Room', 1, 4, 1, 3, 3, 1232.00, 6000.00, 'Dhankuta', '2024-04-01 12:55:48', 1, 0, '../uploads/171136296563.jpg'),
(77, 'New available in Bisnudevi near the temple', 'We are located near the near bisnudevi temple and kathmandu shiksha campus. We are located near the near bisnudevi temple and kathmandu shiksha campus. We are located near the near bisnudevi temple and kathmandu shiksha campus. ', 'Flat', 1, 2, 1, 5, 5, 344.00, 30000.00, 'Bisnudevi', '2024-04-02 11:27:47', 2, 0, '../uploads/17113629656.jpg,../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743390.jpg,../uploads/168447743396.jpg'),
(78, 'Rentals by the Revered Muktinath Temple: Explore Now in Mustang', 'Rentals by the Revered Muktinath Temple: Explore Now in Mustang', 'Room', 0, 1, 0, 2, 2, 24.00, 45000.00, 'Mustang', '2024-04-02 14:47:47', 2, 0, '../uploads/nproom-4-scaled-2.jpg'),
(80, 'This is the new property with id', 'afdsd', 'Room', 1, 2, 1, 3, 3, 32.00, 3232.00, 'Tari', '2024-04-04 12:13:43', 2, 107, '../uploads/image2.jpg'),
(82, 'New room in market.', 'Room is available near the dhulikhel hostpital.', 'Room', 0, 1, 0, 3, 2, 23.00, 2323.00, 'Dhulikel', '2024-04-04 12:42:45', 0, 107, '../uploads/nproom-4-scaled-2.jpg'),
(83, 'Flat is available at Sundhara', 'Flat is available near sundhara. Perfect choice for family.  Water and parking is available.', 'Flat', 1, 3, 1, 3, 2, 13.00, 4600.00, 'Sundhara', '2024-04-06 12:50:01', 1, 110, '../uploads/17113629656.jpg,../uploads/168447743349.jpg,../uploads/168447743354.jpg,../uploads/168447743390.jpg'),
(84, 'New room in market.', 'New room in market.New room in market.New room in market.New room in market.', 'Room', 1, 2, 1, 2, 2, 21.00, 2323.00, 'Setopul', '2024-04-06 13:22:57', 0, 107, '../uploads/171136296526.jpg,../uploads/171136296563.jpg,../uploads/iamge2a.jpg'),
(85, 'This is the new property with id', 'adfsafasfa', 'Room', 0, 0, 0, 4, 0, 12.00, 4334.00, 'Gorkha', '2024-04-06 13:37:22', 0, 107, '../uploads/iamge2a.jpg'),
(90, 'Room is available in Dang.', 'Chic one-bedroom apartment in the city center, close to cafes and shops.', 'Room', 0, 1, 0, 3, 3, 23.00, 4343.00, 'Dang', '2024-04-06 14:30:12', 0, 107, '../uploads/171136296515 (1).jpg'),
(91, 'New Property', 'fjslkjasd', 'Room', 0, 0, 0, 5, 12, 15.00, 4000.00, 'Bhaktapur', '2024-04-07 02:33:43', 1, 111, '../uploads/flat3.jpg'),
(93, 'landlord', '', 'Flat', 1, 2, 2, 3, 43, 3244.00, 30000.00, 'Kalanki', '2024-04-11 01:13:42', 1, 109, '../uploads/385533468_689134773264699_3095181994975914244_n-750x750-200x200.jpg'),
(94, 'Testing', 'adsflkjasasdads', 'Room', 0, 0, 0, 3, 2, 1200.00, 4000.00, 'Balambu', '2024-04-14 11:47:26', 1, 110, '../uploads/168447743396.jpg');

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
(26, 109, 92, 110, '2024-04-11 01:02:14', 0),
(27, 109, 90, 107, '2024-04-11 01:23:56', 0),
(29, 109, 93, 109, '2024-04-11 06:56:16', 2),
(31, 109, 91, 111, '2024-04-14 14:41:32', 2),
(32, 109, 84, 107, '2024-04-16 00:05:38', 0),
(34, 109, 85, 107, '2024-04-16 00:10:59', 0);

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
(108, 'Sunil ', 'Dumre', 'sunil34@gmail.com', '984164515', '$2y$10$ocBrWpZyzd7POES7.K9hBeq1ZYQCjv/u/UjOS4tgQMGFH3PqFjEFq', 'Tenant'),
(109, 'Bimala', 'Newar', 'bimala12@gmail.com', '9845154861', '$2y$10$DVjjP0TrbE0AlcDIF1g4su59cfyBDu2sEBThM1cXDqN03EU0VSCPe', 'Tenant'),
(110, 'Landlord ', 'land', 'landlord@gmail.com', '0493535454', '$2y$10$7cAiREySR7BvW/VDlW5HsO.lwv5V6o2g7fke7hDWDBWN9Li2OT/Ra', 'Landlord'),
(111, 'Yujan', 'Rai', 'yujanrai05@gmail.com', '9815715977', '$2y$10$pqSdcrNL5CBUChhE.401Eer6EfVa0zs6MZlxeu/PsWlJ06UKqV3Se', 'Landlord');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `rent_requests`
--
ALTER TABLE `rent_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
