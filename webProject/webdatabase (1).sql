-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 11:31 AM
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
(2, 'Web Development', '20.00', '12000', 'yasser and china and joex feeh', 'Mohamed Elgazaar', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(3, 'Android', '16.55', '10000', 'yonos feeh', 'jone', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(4, 'Machine Learning', '18.14', '56456', 'very hard ', 'Mr.Robot', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(5, 'Deep Learning', '56.00', '65465', 'very hard fsh5', 'Dolphine', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(6, 'Algoritm and Data Structure', '20.10', '12500', 'me only', 'Mark', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(7, 'Math2', '1.00', '50', 'yonus and chian are being fucked there', '3mad', 'uploads/mariam-soliman-Ht5XmeuLyDg-unsplash.jpg'),
(8, 'Computer Graphics', '555', '55555', 'it was bad for speed team', 'Youmna', 'uploads/Image6.jpg'),
(9, 'Simpana', '1.00', '3', 'Yaasser', 'Yasser', 'uploads/Image4.jpg\"');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `type` varchar(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`type`, `userid`, `email`, `password`, `username`, `gender`, `image`) VALUES
('Adminstrator', 1, 'Salah@gmail.com', 'Salah', 'Salah', 'male', ''),
('', 6, 'Joex@gmail.com', 'Joex', 'Joex', '', ''),
('', 7, 'hady@gmail.com', 'hady', 'hady', '', ''),
('Student', 8, 'Bassem@gmail.com', 'Bassem', 'Bassem', 'male', ''),
('', 9, 'Sora@gmail.com', 'Sora', 'Sora', '', 'discord-png-logo-blue-discord-logo-11562952349iwzz2zzubv.png'),
('', 10, 'Sara@gmail.com', 'Sara', 'Sara', '', 'creepy-logo-remix-by-icon-discord-11563000077mwmzxrdv8b.png'),
('', 11, 'Mariem@gmail.comn', 'Mariem', 'Mariem', '', '1.png'),
('', 12, 'Yasmin@gmail.com', 'Yasmin', 'Yasmin', '', 'animesher.com_anime-boy-broken-cute-762097.jpg'),
('', 13, 'Youssef@gmail.com', 'Youssef', 'Youssef', '', 'wallpaperflare.com_wallpaper.jpg'),
('', 14, 'Moussa@gmail.com', 'Moussa', 'Moussa', '', 'desktop.png'),
('', 15, 'Bahrawy@gmail.com', 'Bahrawy', 'Bahrawy', '', 'Screenshot (58).png'),
('', 16, 'Tarek@gmail.com', 'Tarek', 'Tarek', '', 'Screenshot (3).png'),
('', 17, 'bassma@gmail.com', 'bassma', 'bassma', '', 'Screenshot (9).png'),
('', 18, '3aaaaaaa@gmail.com', '3aaaaaaa', '3aaaaaaa', '', 'Screenshot (11).png'),
('', 19, 'dina@gmail.com', 'dina', 'dina', '', 'Screenshot (2).png'),
('', 20, 'Skico', 'Skico', 'Skico', '', 'Screenshot (16).png'),
('Student', 21, 'Gika@gmail.com', 'Gika', 'Gika', '', 'Screenshot (16).png'),
('Student', 22, 'Speed@gmail.com', 'Speed', 'Speed', '', 'animesher.com_anime-boy-broken-cute-762097.jpg'),
('Student', 24, 'Mohaned@gmail.com', 'Mohaned', 'Mohaned', '', 'Screenshot (3).png'),
('Student', 25, 'honda@gmail.com', 'honda', 'honda', 'male', 'Screenshot (3).png'),
('Student', 26, 'Yasser', 'Yasser', 'Yasser', 'male', 'Image4.jpg'),
('Student', 27, 'Speedoo@gmail.com', 'Speedoo', 'Speedoo', 'male', 'Image6.jpg'),
('Student', 28, 'Nezoko@gmail.com', 'Nezoko', 'Nezoko', 'male', 'Image2.jpg'),
('Student', 29, 'BlackClover@gmail.com', 'Black', 'Black Clover', '', 'Image3.jpg'),
('Student', 31, 'Samira@gmail.com', 'Samira', 'Samira', 'female', ''),
('Student', 36, 'Lara@gmail.com', 'Lara', 'Lara', 'female', ''),
('Student', 40, 'Zeina@gmail.com', 'Zeina', 'Zeina', 'female', ''),
('Student', 42, 'Farah@gmail.com', 'Farah', 'Farah', 'female', 'Image1.jfif'),
('Student', 44, 'Mostafa@gmail.com', 'Mostafa', 'Mostafa', 'male', ''),
('Student', 45, 'Reem@gmail.com', 'Reem', 'Reem', 'female', ''),
('Student', 47, 'YoussefAlaa@gmail.com', 'YoussefAlaa', 'YoussefAlaa', 'male', 'Image5.jpg'),
('Student', 49, 'Lara', 'Lara', 'Lara', 'female', 'WhatsApp Image 2021-11-26 at 1.01.05 PM.jpeg'),
('Student', 50, 'Salah', 'Salah', 'Salah', 'male', 'Screenshot 2021-11-28 144052.png'),
('Student', 51, 'Kareem@gmail.com', 'Kareem', 'Kareem', 'male', 'background5.jpg'),
('Student', 52, 'hhhhh@gmail.com', 'hhhhh', 'hhhhh', 'male', 'background5.jpg'),
('Student', 53, 'hhhhh@gmail.com', 'hhhhh', 'hhhh', 'male', 'league-of-legends-arcane.jpg'),
('Student', 54, 'gggggggggggggggggggg@gmail.com', 'gggggggggggggggggggg', 'gggggggggggggggggggg', 'male', ''),
('Student', 55, 'Salah11@gmail.com', 'fghfghfghfghfghfghfg', 'fghfghhfghfghfg', 'male', ''),
('Student', 91, 'newnewnew1@gmail.com', 'newnewnew1', 'newnewnew1', 'male', 'uploads/wallpaperflare.com_wallpaper.jpg'),
('Student', 92, 'rrrrrrrrrrrrrrrr@gmail.com', 'rrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrr', 'female', 'uploads/'),
('Student', 93, 'rrrrrrrrrrrrrrrr1@gmail.com', 'rrrrrrrrrrrrrrrr1', 'rrrrrrrrrrrrrrrr1', 'male', 'uploads/'),
('Student', 94, 'rrrrrrrrrrrrrrrr2@gmail.com', 'rrrrrrrrrrrrrrrr2', 'rrrrrrrrrrrrrrrr2', 'male', 'uploads/desktop.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
