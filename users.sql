-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 06:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `dkey` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `email`, `password`, `avatar`, `profession`, `dkey`) VALUES
(13, 'Ruslanas', 'Gailiušas', 'ruslan.gas@gmail.com', '52db7d1846c0cc90c09e1a144cfce606', 'images/naujas.jpg', '', NULL),
(14, 'Rafal', 'Kadvevic', 'Rafal@gmail.com', '52db7d1846c0cc90c09e1a144cfce606', 'images/grazus.jpg', 'Chirurgas', NULL),
(15, 'Gustas', 'Zolba', 'zolba@gmail.com', '52db7d1846c0cc90c09e1a144cfce606', 'images/naujas.jpg', 'Odontologija', 'raktas'),
(16, 'Rafal', 'Kadzevic', 'kadzewiczrafal@gmail.com', 'd18d0079b437c941a4bb35c336350952', 'images/32815899_1527644997362438_2539246066247663616_n.jpg', 'Chirurgas', 'raktas'),
(17, 'Raf', 'kadz', 'raf@gmail.com', 'd18d0079b437c941a4bb35c336350952', 'images/32815899_1527644997362438_2539246066247663616_n.jpg', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
