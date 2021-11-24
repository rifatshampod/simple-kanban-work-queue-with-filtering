-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 08:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue`
--

-- --------------------------------------------------------

--
-- Table structure for table `livetech`
--

CREATE TABLE `livetech` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `person` text NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livetech`
--

INSERT INTO `livetech` (`id`, `task`, `person`, `position`, `status`) VALUES
(20, 'Book Ecommerce', 'Rifat Shampod', 2, 1),
(21, 'Uran Product 2 Boost', 'Rifat Shampod', 2, 1),
(22, 'Livetech Article post Edit', 'Rifat Shampod', 2, 1),
(23, 'Narayani Website event add 2021', 'Rifat Shampod', 2, 1),
(24, 'Uran product 2 facebook post 6 album', 'Rifat Shampod', 3, 1),
(25, 'Poralekha web course demo content ', 'Shawon Islam', 3, 1),
(26, 'Poralekha new module planning', 'Rifat Shampod', 3, 1),
(27, 'Uran Cover photo', 'Tonmoy Mandal', 4, 1),
(28, 'uran product phase 2 frame design add', 'Tonu Tahmid', 4, 1),
(29, 'Poralekha Logout page', 'Antu Shamitra', 4, 0),
(30, 'https://www.sbktechventures.com/', 'Privel Paul Titu', 1, 1),
(31, 'https://www.sbktechventures.com/', 'Privel Paul Titu', 1, 1),
(32, 'https://mop.gov.bd/', 'Privel Paul Titu', 1, 1),
(33, 'https://mowca.gov.bd/', 'Privel Paul Titu', 1, 1),
(34, 'http://www.moedu.gov.bd/', 'Privel Paul Titu', 1, 1),
(35, 'https://mof.gov.bd/', 'Privel Paul Titu', 1, 1),
(36, 'https://minland.gov.bd/', 'Privel Paul Titu', 1, 1),
(37, 'https://ictd.gov.bd/', 'Privel Paul Titu', 1, 1),
(38, 'https://register.payoneer.com/', 'Privel Paul Titu', 1, 1),
(39, 'Lovely Deb site finalizing (Shampod)', 'Rifat Shampod', 1, 1),
(40, 'Mowla Brothers, Sunday morning Meeting', 'Privel Paul Titu', 1, 1),
(41, 'We Do Care Layout', 'Rifat Shampod', 1, 1),
(42, 'Mustafa Salim Site', 'Rifat Shampod', 1, 1),
(43, 'Poralekha web course demo content', 'Samiul Islam Midon', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livetech`
--
ALTER TABLE `livetech`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livetech`
--
ALTER TABLE `livetech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
