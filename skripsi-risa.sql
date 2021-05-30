-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 12:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi-risa`
--

-- --------------------------------------------------------

--
-- Table structure for table `calonguru`
--

CREATE TABLE `calonguru` (
  `kd` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nipy` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tmplahir` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calonguru`
--

INSERT INTO `calonguru` (`kd`, `nama`, `nipy`, `gender`, `tmplahir`, `tgllahir`, `foto`) VALUES
(7, 'Yunus', '34645', 'Ikhwan', 'Pondok Kelapa', '2021-02-20', '607d2c2e1fab1.jpg'),
(8, 'Putra', '3464', 'Ikhwan', 'Pagar Dewa', '2021-03-12', '607d2c1bb6add.jpg'),
(9, 'Risa', '342', 'Akhwat', 'Bengkulu', '2021-02-25', '607d2c0b81088.jpg'),
(14, 'Chossy', '19990113', 'Ikhwan', 'Koto Berapak', '1999-01-13', '607c4bb2ac2b4.jpg'),
(16, 'Gorila', '67890', 'Ikhwan', 'Bengkulu', '2021-04-19', '607d0e8a17205.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `kd` int(11) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `c4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `kd`, `c1`, `c2`, `c3`, `c4`) VALUES
(4, 14, 80, 80, 80, 80),
(5, 16, 80, 60, 80, 77),
(6, 7, 70, 70, 70, 82),
(7, 8, 60, 90, 60, 97),
(16, 9, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'risa', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calonguru`
--
ALTER TABLE `calonguru`
  ADD PRIMARY KEY (`kd`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calonguru`
--
ALTER TABLE `calonguru`
  MODIFY `kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
