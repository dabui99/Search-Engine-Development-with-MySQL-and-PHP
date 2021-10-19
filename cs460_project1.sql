-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2021 at 10:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs460_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Award`
--

CREATE TABLE `Award` (
  `mpid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `award_name` varchar(255) DEFAULT NULL,
  `award_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Award`
--

INSERT INTO `Award` (`mpid`, `pid`, `award_name`, `award_year`) VALUES
(1, 1, 'best actor', NULL),
(2, 2, 'best voice', NULL),
(1, 1, 'best actor', 2020),
(2, 2, 'best voice ', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `mpid` int(11) NOT NULL,
  `genre_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`mpid`, `genre_name`) VALUES
(1, 'cartoon'),
(3, 'game'),
(2, 'cartoon');

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `uemail` varchar(255) NOT NULL,
  `mpid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`uemail`, `mpid`) VALUES
('dabui@bu.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `mpid` int(11) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`mpid`, `zip`, `city`, `country`) VALUES
(1, '02215', 'Boston', 'usa'),
(2, '20852', 'North bethesda', 'USA'),
(3, '02148', 'VA', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `MotionPicture`
--

CREATE TABLE `MotionPicture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `production` varchar(255) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MotionPicture`
--

INSERT INTO `MotionPicture` (`id`, `name`, `rating`, `production`, `budget`) VALUES
(1, 'adventure time', 'B+', 'cartoon network', 70),
(2, 'spongebob', 'A-', 'amazon', 80),
(3, 'bob the builder', 'D', 'whatever', 90);

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE `Movie` (
  `mpid` int(11) NOT NULL,
  `boxoffice_collection` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Movie`
--

INSERT INTO `Movie` (`mpid`, `boxoffice_collection`) VALUES
(1, 'bos'),
(2, 'va');

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE `People` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `People`
--

INSERT INTO `People` (`id`, `pname`, `nationality`, `dob`, `gender`) VALUES
(1, 'tyler', 'vietnam', '11/24/1999', 'male'),
(2, 'Hang', 'vietnam', '09/04/1994', 'female'),
(3, 'bob', 'usa', '8/9/1990', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `mpid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`mpid`, `pid`, `role_name`) VALUES
(1, 1, 'actor'),
(2, 2, 'voice'),
(3, 1, 'producer'),
(1, 2, 'lead '),
(1, 3, 'voice');

-- --------------------------------------------------------

--
-- Table structure for table `Series`
--

CREATE TABLE `Series` (
  `mpid` int(11) NOT NULL,
  `season_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Series`
--

INSERT INTO `Series` (`mpid`, `season_count`) VALUES
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`email`, `name`, `age`) VALUES
('dabui@bu.edu', 'tyler', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD KEY `mpid` (`mpid`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`uemail`),
  ADD KEY `mpid` (`mpid`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`mpid`,`zip`);

--
-- Indexes for table `MotionPicture`
--
ALTER TABLE `MotionPicture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD KEY `mpid` (`mpid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `Series`
--
ALTER TABLE `Series`
  ADD PRIMARY KEY (`mpid`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Award`
--
ALTER TABLE `Award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `motionpicture` (`id`),
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `people` (`id`);

--
-- Constraints for table `Genre`
--
ALTER TABLE `Genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `motionpicture` (`id`);

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`uemail`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`mpid`) REFERENCES `motionpicture` (`id`);

--
-- Constraints for table `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `MotionPicture` (`id`);

--
-- Constraints for table `Movie`
--
ALTER TABLE `Movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `motionpicture` (`id`);

--
-- Constraints for table `Role`
--
ALTER TABLE `Role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `motionpicture` (`id`),
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `people` (`id`);

--
-- Constraints for table `Series`
--
ALTER TABLE `Series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`mpid`) REFERENCES `motionpicture` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
