-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 07:02 PM
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
-- Database: `heroes_of_the_brain`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(7) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `games` int(11) NOT NULL DEFAULT 0,
  `finished` tinyint(1) NOT NULL DEFAULT 0,
  `meme1` blob DEFAULT NULL,
  `meme2` blob DEFAULT NULL,
  `meme3` blob DEFAULT NULL,
  `meme4` blob DEFAULT NULL,
  `meme5` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `score`, `games`, `finished`, `meme1`, `meme2`, `meme3`, `meme4`, `meme5`) VALUES
('Apple', 17, 26, 0, NULL, NULL, NULL, NULL, NULL),
('Czelex', 33, 54, 0, NULL, NULL, NULL, NULL, NULL),
('Dradone', 12, 42, 0, NULL, NULL, NULL, NULL, NULL),
('ElPrimo', 21, 43, 0, NULL, NULL, NULL, NULL, NULL),
('Exer', 19, 26, 0, NULL, NULL, NULL, NULL, NULL),
('FOXjust', 32, 42, 0, NULL, NULL, NULL, NULL, NULL),
('Kejkej', 2, 25, 0, NULL, NULL, NULL, NULL, NULL),
('Kejo', 21, 32, 0, NULL, NULL, NULL, NULL, NULL),
('MDuzy', 42, 44, 0, NULL, NULL, NULL, NULL, NULL),
('Olek', 39, 47, 0, NULL, NULL, NULL, NULL, NULL),
('Oner', 21, 32, 0, NULL, NULL, NULL, NULL, NULL),
('ukasz', 23, 34, 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
