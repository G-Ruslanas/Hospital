-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 m. Sau 02 d. 23:59
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

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
-- Sukurta duomenų struktūra lentelei `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `registrations`
--

INSERT INTO `registrations` (`registration_id`, `user_id`, `doctor_id`, `username`, `lastname`, `profession`, `date`, `time`) VALUES
(1096, 15, 13, 'Ruslanas', 'Gailiusas', 'Chirurgas', '2020-12-15', '11:44'),
(1104, 15, 18, 'Ruslanas', 'Gailiusas', 'Odontologija', '2020-12-26', '12:58');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `dkey` varchar(50) DEFAULT NULL,
  `card_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `email`, `password`, `avatar`, `profession`, `dkey`, `card_id`) VALUES
(13, 'Ruslanas', 'Gailiusas', 'ruslan.gas@gmail.com', '52db7d1846c0cc90c09e1a144cfce606', 'images/naujas.jpg', 'Chirurgas', 'raktas', 0),
(15, 'Gustas', 'Zolba', 'zolba@gmail.com', '52db7d1846c0cc90c09e1a144cfce606', 'images/naujas.jpg', '', '', 159085),
(16, 'Rafal', 'Kadzevic', 'kadzewiczrafal@gmail.com', 'd18d0079b437c941a4bb35c336350952', 'images/32815899_1527644997362438_2539246066247663616_n.jpg', 'Chirurgas', 'raktas', 0),
(17, 'Raf', 'kadz', 'raf@gmail.com', 'd18d0079b437c941a4bb35c336350952', 'images/32815899_1527644997362438_2539246066247663616_n.jpg', '', NULL, 0),
(18, 'Ruslanas', 'Gailiusas', 'Neziniukas369@gmail.com', '92e3c5a30164653fd79ee45c1d92d244', 'images/IMG_20200925_124800cp.jpg', 'Odontologija', 'raktas', 189950),
(22, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'images/download.png', '', NULL, 229693);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
