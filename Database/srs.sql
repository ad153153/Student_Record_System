-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 10:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `Building_name` varchar(50) NOT NULL,
  `Building_size` int(10) NOT NULL,
  `Maj_Id` int(10) NOT NULL,
  `Building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`Building_name`, `Building_size`, `Maj_Id`, `Building_id`) VALUES
('B_15', 12, 4, 120),
('C', 33, 3, 312),
('A', 30, 1, 320),
('G', 50, 2, 520);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `Maj_name` varchar(50) NOT NULL,
  `Maj_id` int(10) NOT NULL,
  `Maj_cap` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`Maj_name`, `Maj_id`, `Maj_cap`) VALUES
('Engineering', 1, 500),
('Business', 2, 1000),
('Computer science', 3, 600),
('Renewable Energy ', 4, 100),
('Dentistry', 5, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `ID` int(10) NOT NULL,
  `Maj_id` int(10) NOT NULL,
  `Country` text NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin DEFAULT NULL,
  `gender` enum('M','F','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Fname`, `Lname`, `ID`, `Maj_id`, `Country`, `birthday`, `image`, `gender`) VALUES
('malek diaa', 'nader', 1, 1, 'ALG', '2000-01-01', '1stud.png', 'M'),
('adnan', 'hg', 3, 2, 'SY', '2000-12-12', '3stud.png', 'F'),
('seleem', 'hatenm', 16, 1, 'ALG', '2000-12-02', '16stud.jpg', 'F'),
('yousra', 'sayed', 3211, 4, 'ALG', '1990-12-22', '3211.png', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `allow` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `password`, `allow`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2, 'samer', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`Building_id`),
  ADD KEY `fk_building_majors` (`Maj_Id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`Maj_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_student_major` (`Maj_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings`
--
ALTER TABLE `buildings`
  ADD CONSTRAINT `fk_building_majors` FOREIGN KEY (`Maj_Id`) REFERENCES `majors` (`Maj_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_major` FOREIGN KEY (`Maj_id`) REFERENCES `majors` (`Maj_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
