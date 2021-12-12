-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 04:16 PM
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
-- Database: `webdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `coursePrice` varchar(255) NOT NULL,
  `enrolledSid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `instructorName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `coursePrice`, `enrolledSid`, `description`, `instructorName`, `image`) VALUES
(1, 'Swift', '14.55', '640000', 'Salah is in this course', 'Dalia', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(2, 'Web Development', '20', '12000', 'yasser and china and joex feeh', 'Mohamed Elgazaar', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(3, 'Android', '16.55', '10000', 'yonos feeh', 'jone', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(4, 'Machine Learning', '18.14', '56456', 'very hard ', 'Mr.Robot', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(5, 'Deep Learning', '56', '65465', 'very hard fsh5', 'Dolphine', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
