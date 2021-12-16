-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 07:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdatabase1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `courseid` int(11) NOT NULL,
  `star1` int(200) NOT NULL,
  `star2` int(200) NOT NULL,
  `star3` int(200) NOT NULL,
  `star4` int(200) NOT NULL,
  `star5` int(200) NOT NULL,
  `Total` varchar(16) GENERATED ALWAYS AS ((`star1` * 1 + `star2` * 2 + `star3` * 3 + `star4` * 4 + `star5` * 5) / (`star1` + `star2` + `star3` + `star4` + `star5`)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`courseid`, `star1`, `star2`, `star3`, `star4`, `star5`) VALUES
(1, 100, 300, 400, 600, 700),
(2, 217, 301, 403, 603, 728),
(3, 5, 0, 0, 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`courseid`,`star1`,`star2`,`star3`,`star4`,`star5`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
