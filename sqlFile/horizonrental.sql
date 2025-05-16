-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 06:48 AM
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
-- Database: `horizonrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin@horizonrentals.in', '473e22350b34d89bae7a24556ed51c10', '2025-05-14 15:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `drivingLicNo` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `phoneNum` int(10) NOT NULL,
  `fromDate` varchar(20) NOT NULL,
  `toDate` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `fullName`, `drivingLicNo`, `userEmail`, `phoneNum`, `fromDate`, `toDate`, `description`, `updationDate`) VALUES
(1, 'John Cena', 'DL0420230001234', 'Cena4438@bamsrad.com', 2147483647, '2025-05-30', '2025-06-03', 'HU LU lu LU', '2025-05-15 13:36:28'),
(2, 'Tanmay Bhatt', 'DL0420230001234', 'bhatt4438@bamsrad.co', 2147483647, '2025-05-23', '2025-05-27', 'TRAVelling !!!!', '2025-05-15 15:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `phoneNum` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `firstName`, `lastName`, `userEmail`, `phoneNum`, `description`, `updationDate`) VALUES
(1, 'Abc', 'XUZ', 'saroja4438@bamsrad.c', 2147483647, 'HELLo sabjiii !!!', '2025-05-15 15:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(10) NOT NULL,
  `vehicleName` varchar(100) NOT NULL,
  `vehicleCC` int(20) NOT NULL,
  `seatingCapacity` int(20) NOT NULL,
  `vehicleType` varchar(100) NOT NULL,
  `vehicleImg` varchar(120) NOT NULL,
  `pricePerDay` int(20) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `vehicleName`, `vehicleCC`, `seatingCapacity`, `vehicleType`, `vehicleImg`, `pricePerDay`, `updationDate`) VALUES
(1, 'Royal Enfield Classic 350', 350, 2, 'Manual', 'Royal Enifield Classic 350.jpg', 899, '2025-05-15 14:58:24'),
(2, 'Bajaj Pulsar NS200', 200, 2, 'Manual', 'Bajaj Pulsar NS200.jpg', 699, '2025-05-15 14:58:45'),
(3, 'Honda Activa 6G', 110, 2, 'Auto', 'Honda Activa 6g.jpg', 399, '2025-05-15 14:59:07'),
(4, 'TVS Jupiter', 110, 2, 'Auto', 'TVS Jupiter.jpg', 449, '2025-05-15 14:59:31'),
(5, 'KTM Duke 200', 200, 2, 'Manual', 'KTM Duke 200.jpg', 799, '2025-05-15 14:59:52'),
(6, 'Suzuki Access 125', 125, 2, 'Auto', 'Suzuki Access 125.jpg', 399, '2025-05-15 15:00:12'),
(7, 'Yamaha R15', 155, 2, 'Manual', 'Yamaha R15.jpg', 699, '2025-05-15 15:00:44'),
(8, 'Yamaha Aerox 155', 155, 2, 'Auto', 'Yamaha Aerox 155.jpg', 499, '2025-05-15 15:01:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
