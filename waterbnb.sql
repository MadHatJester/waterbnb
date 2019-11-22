-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 06:45 PM
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
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `GuestNumber` int(5) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ResidenceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationID`, `StartDate`, `EndDate`, `GuestNumber`, `UserID`, `ResidenceID`) VALUES
(47, '2019-11-22', '2019-11-23', 4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE `residence` (
  `ResidenceID` int(11) NOT NULL,
  `ResidenceName` tinytext NOT NULL,
  `ResidenceType` tinytext NOT NULL,
  `GuestNumber` int(5) NOT NULL,
  `StreetNumber` int(5) NOT NULL,
  `StreetName` tinytext NOT NULL,
  `Barangay` tinytext NOT NULL,
  `ZIPCode` int(5) NOT NULL,
  `City` tinytext NOT NULL,
  `RentalFee` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`ResidenceID`, `ResidenceName`, `ResidenceType`, `GuestNumber`, `StreetNumber`, `StreetName`, `Barangay`, `ZIPCode`, `City`, `RentalFee`, `UserID`) VALUES
(1, 'Tree House', 'loft', 4, 120, 'Sampaguita', 'Tanyag', 4210, 'Taguig', 300, 1),
(2, 'Water Bowl', 'cottage', 3, 420, 'Marine', 'Pearl', 8795, 'Atlantis', 699, 1),
(3, 'Fire House', 'bungalow', 6, 6969, 'Inferno', 'Corner', 1111, 'Hilden', 996, 2),
(4, 'Air Tent', 'cottage', 3, 456, 'Noctus', 'Bicutan', 7686, 'Pasay', 800, 1),
(7, 'Earth Cabin', 'bungalow', 7, 133, 'Hearth', 'Muntinlupa', 5812, 'Batangas', 678, 2),
(24, 'Metal House', 'cottage', 6, 6969, 'AC/DC', 'Sandman', 1111, 'Rock', 678, 2),
(26, 'Normal House', 'cabin', 5, 201, 'Normal', 'Static', 4567, 'Bland', 555, 1);

-- --------------------------------------------------------

--
-- Table structure for table `residenceimg`
--

CREATE TABLE `residenceimg` (
  `ImageID` int(11) NOT NULL,
  `ResidenceID` int(11) NOT NULL,
  `ImageNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residenceimg`
--

INSERT INTO `residenceimg` (`ImageID`, `ResidenceID`, `ImageNumber`) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 4, 4),
(4, 3, 3),
(5, 7, 3),
(27, 24, 2),
(29, 26, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `TransactionNumber` longtext NOT NULL,
  `FirstName` tinytext NOT NULL,
  `LastName` tinytext NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `CardDate` tinytext NOT NULL,
  `CardCode` int(5) NOT NULL,
  `ReservationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `TransactionNumber`, `FirstName`, `LastName`, `CardNumber`, `CardDate`, `CardCode`, `ReservationID`) VALUES
(52, 'cCuzieX', 'Sir Lance', 'A Lot', 2147483647, '23-99', 321, 47);

-- --------------------------------------------------------

--
-- Table structure for table `userimg`
--

CREATE TABLE `userimg` (
  `ImageID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userimg`
--

INSERT INTO `userimg` (`ImageID`, `UserID`) VALUES
(20, 1),
(18, 3),
(19, 3),
(21, 4),
(22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` tinytext NOT NULL,
  `Email` tinytext NOT NULL,
  `FirstName` tinytext NOT NULL,
  `LastName` tinytext NOT NULL,
  `UserType` tinytext NOT NULL,
  `Password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `FirstName`, `LastName`, `UserType`, `Password`) VALUES
(1, 'host1', 'host@mail.com', 'Jibba', 'Libba', 'host', '$2y$10$HziqU6rDexthNtk3fMZkLe67doEFhSN.CEK4UooVQJdJQtAR7YnQu'),
(2, 'host2', 'nothost@email.com', 'Esteban', 'Beban', 'host', '$2y$10$V5p2C8uUB/3KhJpNcEGvgOeUriHe.uUk37Bmrb0iy9QqXnbPGMrBG'),
(3, 'occupant1', 'occupant@mail.com', 'Chop', 'Chop', 'occupant', '$2y$10$JeHFwly42mneD0MW.cEG6Oet2E45UTMtWSUywxukDduGapfr03LvG'),
(4, 'occupant2', 'occupantme@mail.com', 'Sir Lance', 'A Lot', 'occupant', '$2y$10$mhayBzlVViP8lBQO14zZO.dPf7J5hHdXTJpFsrWU0sScGlX8.xRR6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ResidenceID` (`ResidenceID`);

--
-- Indexes for table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`ResidenceID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `residenceimg`
--
ALTER TABLE `residenceimg`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `ResidenceID` (`ResidenceID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `userimg`
--
ALTER TABLE `userimg`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `residence`
--
ALTER TABLE `residence`
  MODIFY `ResidenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `residenceimg`
--
ALTER TABLE `residenceimg`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `userimg`
--
ALTER TABLE `userimg`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ResidenceID`) REFERENCES `residence` (`ResidenceID`);

--
-- Constraints for table `residence`
--
ALTER TABLE `residence`
  ADD CONSTRAINT `residence_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `residenceimg`
--
ALTER TABLE `residenceimg`
  ADD CONSTRAINT `residenceimg_ibfk_1` FOREIGN KEY (`ResidenceID`) REFERENCES `residence` (`ResidenceID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`ReservationID`) REFERENCES `reservation` (`ReservationID`);

--
-- Constraints for table `userimg`
--
ALTER TABLE `userimg`
  ADD CONSTRAINT `userimg_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
