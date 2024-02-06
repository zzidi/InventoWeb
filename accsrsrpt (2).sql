-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 08:31 AM
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
-- Database: `accsrsrpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Id` int(50) NOT NULL,
  `Screen` decimal(50,0) NOT NULL,
  `SSD` decimal(50,0) NOT NULL,
  `RAM` decimal(50,0) NOT NULL,
  `Powercord` decimal(50,0) NOT NULL,
  `Battery` decimal(50,0) NOT NULL,
  `Others` decimal(50,0) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Id`, `Screen`, `SSD`, `RAM`, `Powercord`, `Battery`, `Others`, `Status`) VALUES
(22, 0, 0, 0, 1, 0, 0, 'In Progress'),
(23, 1, 1, 0, 0, 0, 0, 'In Progress'),
(24, 1, 1, 1, 0, 0, 0, 'Done'),
(25, 0, 0, 0, 0, 0, 1, 'Done'),
(26, 0, 0, 0, 0, 0, 1, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stckid` int(11) NOT NULL,
  `Accessories` varchar(50) NOT NULL,
  `Totalcurrent` decimal(50,0) NOT NULL,
  `stcktaken` decimal(50,0) NOT NULL,
  `stckin` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stckid`, `Accessories`, `Totalcurrent`, `stcktaken`, `stckin`) VALUES
(1, 'Screen', 2, 51, 49),
(2, 'SSD', 2, 39, 37),
(3, 'RAM', 1, 45, 44),
(4, 'Powercord', 1, 42, 41),
(5, 'Battery', 0, 31, 31),
(11, 'Others', 2, 52, 50);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idsupp` int(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `suppstck` varchar(50) NOT NULL,
  `warranty` decimal(50,0) NOT NULL,
  `MonthYear` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `accs` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `ICT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupp`, `Date`, `suppstck`, `warranty`, `MonthYear`, `brand`, `accs`, `total`, `ICT`) VALUES
(4, '2024-01-08', 'Yusuf Mega Sdn. Bhd', 3, 'Months', 'Voila', 'SSD', '35', 'En.Amir'),
(5, '2024-01-16', 'Haris Computer Hardware sdn. bhd.', 3, 'Months', 'HCH', 'Powercord', '50', 'En.Amir'),
(6, '2024-01-15', 'YTJT Computer Accessories', 5, 'Months', 'YTJT', 'RAM', '19', 'En.Azri'),
(7, '2024-01-29', 'Hazim enterprise', 6, 'Months', 'RZ1', 'Battery', '50', 'En.Amir');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`ID`, `email`, `password`) VALUES
(9, 'Abc56@gmail.com', '111'),
(10, 'Zidi123@gmail.com', '12345'),
(11, 'zidi234@gmail.com', '111');

-- --------------------------------------------------------

--
-- Table structure for table `userreport`
--

CREATE TABLE `userreport` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Accessories` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `PICICT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userreport`
--

INSERT INTO `userreport` (`id`, `username`, `Accessories`, `Section`, `PICICT`) VALUES
(22, 'Hazim', 'Powercord', 'It', 'Abu'),
(23, 'Kamil', 'Screen, SSD', 'Finance', 'Abu'),
(24, 'Farid Kamil bin Harid Iskandar', 'Screen, SSD, RAM', 'ACE', 'Cik.Farah'),
(25, 'Shingetsu', 'SSD', 'ACE', 'En.Masri'),
(26, 'Mangetsu', 'RAM', 'Academis', 'En.Amir'),
(27, 'Jay', 'Powercord', 'Finance', 'En.Azri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stckid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupp`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userreport`
--
ALTER TABLE `userreport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stckid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupp` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userreport`
--
ALTER TABLE `userreport`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
