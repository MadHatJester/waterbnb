-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 05:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `idHomes` int(11) NOT NULL,
  `titleHomes` tinytext NOT NULL,
  `typeHomes` tinytext NOT NULL,
  `guestHomes` int(5) NOT NULL,
  `noHomes` tinytext NOT NULL,
  `streetHomes` tinytext NOT NULL,
  `bgyHomes` tinytext DEFAULT NULL,
  `zipHomes` int(5) NOT NULL,
  `cityHomes` tinytext NOT NULL,
  `feeHomes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`idHomes`, `titleHomes`, `typeHomes`, `guestHomes`, `noHomes`, `streetHomes`, `bgyHomes`, `zipHomes`, `cityHomes`, `feeHomes`) VALUES
(1, 'Tree House', 'apartment', 3, '120', 'Sampaguita', 'Tanyag', 1230, 'Taguig', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `transac`
--

CREATE TABLE `transac` (
  `transacId` int(11) NOT NULL,
  `transacNo` longtext NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `guestNo` int(5) NOT NULL,
  `cardNo` int(11) NOT NULL,
  `cardDate` date NOT NULL,
  `codeCard` int(3) NOT NULL,
  `reservationId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transac`
--

INSERT INTO `transac` (`transacId`, `transacNo`, `startDate`, `endDate`, `guestNo`, `cardNo`, `cardDate`, `codeCard`, `reservationId`) VALUES
(1, 'ufld2', '2019-10-01', '2019-10-02', 3, 2147483647, '0000-00-00', 321, NULL),
(2, '79hsp', '2019-10-08', '2019-10-08', 3, 2147483647, '0000-00-00', 321, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `firstName` tinytext NOT NULL,
  `lastName` tinytext NOT NULL,
  `typeUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `username`, `emailUsers`, `firstName`, `lastName`, `typeUsers`, `pwdUsers`) VALUES
(1, 'host1', 'host@mail.com', 'Host', 'Teban', 'host', '$2y$10$X9jzh2thX5mYE8hUDVDs/Oy4V1HcRVgy0qEpcZAk1AyA2pglG6rcy'),
(2, 'host2', 'host2@mail.com', 'Jibba', 'Libba', 'host', '$2y$10$KcypPjRKe0G93Hl0ww.GM.ZEpHcAh.COUNtg1Go9q5HtB3Drm1JF2'),
(3, 'occupant1', 'occupant@mail.com', 'Occu', 'Plant', 'occupant', '$2y$10$cj0ZRTTd5sHXRaHDyvag/OOhv1KhHb6EOKFhw2PrH5Xl87k619vAG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`idHomes`);

--
-- Indexes for table `transac`
--
ALTER TABLE `transac`
  ADD PRIMARY KEY (`transacId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `idHomes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transac`
--
ALTER TABLE `transac`
  MODIFY `transacId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transac`
--
ALTER TABLE `transac`
  ADD CONSTRAINT `transac_ibfk_1` FOREIGN KEY (`reservationId`) REFERENCES `reservation` (`reservationId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
