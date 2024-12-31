-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 06:58 AM
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
-- Database: `players`
--

-- --------------------------------------------------------

--
-- Table structure for table `mens`
--

CREATE TABLE `mens` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `goals` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `titles` int(11) NOT NULL,
  `biography` text NOT NULL,
  `position` varchar(30) NOT NULL,
  `image_main` varchar(255) NOT NULL,
  `image_details` varchar(255) NOT NULL,
  `mini_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mens`
--

INSERT INTO `mens` (`id`, `name`, `birth_date`, `nationality`, `goals`, `assists`, `titles`, `biography`, `position`, `image_main`, `image_details`, `mini_bio`) VALUES
(36, 'Pelé', '1940-10-23', 'Brazillian', 767, 369, 0, 'teste', '37', 'peleCard.jpg', '', 'A Brazilian forward known for his skill, vision, and goals.'),
(37, 'Diego Maradona', '1960-10-30', 'Argentinian', 346, 240, 0, '', '12', 'maradonaCard.webp', '', 'An Argentine legend known for his skill, vision, and creativity.'),
(38, 'Cristiano Ronaldo', '1985-02-05', 'Portuguese', 900, 282, 0, '', '33', 'crisCard.jpg', '', 'A Portuguese forward known for his skill, speed, and goal-scoring ability.'),
(39, 'Lionel Messi', '1987-06-24', 'Argentinian', 850, 400, 0, '', '46', 'messiCard.jpg', '', 'An Argentine forward known for his brilliance, vision, and scoring ability.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `womens`
--

CREATE TABLE `womens` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `goals` int(11) NOT NULL,
  `assists` int(11) NOT NULL,
  `titles` int(11) NOT NULL,
  `biography` text NOT NULL,
  `position` varchar(30) NOT NULL,
  `image_main` varchar(255) NOT NULL,
  `image_details` varchar(255) NOT NULL,
  `mini_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mens`
--
ALTER TABLE `mens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `womens`
--
ALTER TABLE `womens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mens`
--
ALTER TABLE `mens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `womens`
--
ALTER TABLE `womens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
