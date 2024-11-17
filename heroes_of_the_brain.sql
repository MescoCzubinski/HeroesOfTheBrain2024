-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 17, 2024 at 02:46 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.1.25

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
-- Struktura tabeli dla tabeli `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `user1` varchar(7) NOT NULL,
  `1_ready` tinyint(1) NOT NULL,
  `1_meme_1` blob DEFAULT NULL,
  `1_meme_2` blob DEFAULT NULL,
  `1_meme_3` blob DEFAULT NULL,
  `1_meme_4` blob DEFAULT NULL,
  `1_meme_5` blob DEFAULT NULL,
  `user2` varchar(7) NOT NULL,
  `2_ready` tinyint(1) NOT NULL,
  `2_meme_1` int(11) DEFAULT NULL,
  `2_meme_2` int(11) DEFAULT NULL,
  `2_meme_3` int(11) DEFAULT NULL,
  `2_meme_4` int(11) DEFAULT NULL,
  `2_meme_5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `user1`, `1_ready`, `1_meme_1`, `1_meme_2`, `1_meme_3`, `1_meme_4`, `1_meme_5`, `user2`, `2_ready`, `2_meme_1`, `2_meme_2`, `2_meme_3`, `2_meme_4`, `2_meme_5`) VALUES
(2, 'ukasz3', 0, NULL, NULL, NULL, NULL, NULL, 'ukasz', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` varchar(7) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `games` int(11) NOT NULL DEFAULT 0,
  `finished` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `meme1` blob DEFAULT NULL,
  `meme2` blob DEFAULT NULL,
  `meme3` blob DEFAULT NULL,
  `meme4` blob DEFAULT NULL,
  `meme5` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `score`, `games`, `finished`, `is_active`, `meme1`, `meme2`, `meme3`, `meme4`, `meme5`) VALUES
('Apple', 17, 26, 0, 0, NULL, NULL, NULL, NULL, NULL),
('Czelex', 33, 54, 0, 0, NULL, NULL, NULL, NULL, NULL),
('Dradone', 12, 42, 0, 0, NULL, NULL, NULL, NULL, NULL),
('ElPrimo', 21, 43, 0, 1, NULL, NULL, NULL, NULL, NULL),
('Exer', 19, 26, 0, 0, NULL, NULL, NULL, NULL, NULL),
('FOXjust', 32, 42, 0, 0, NULL, NULL, NULL, NULL, NULL),
('Kejkej', 2, 25, 0, 0, NULL, NULL, NULL, NULL, NULL),
('Kejo', 21, 32, 0, 0, NULL, NULL, NULL, NULL, NULL),
('MDuzy', 42, 44, 0, 0, NULL, NULL, NULL, NULL, NULL),
('Olek', 39, 47, 0, 0, NULL, NULL, NULL, NULL, NULL),
('Oner', 21, 32, 0, 1, NULL, NULL, NULL, NULL, NULL),
('ukasz', 23, 34, 0, 1, NULL, NULL, NULL, NULL, NULL),
('ukasz3', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
('ukasz4', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
