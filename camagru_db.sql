-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2019 at 12:02 PM
-- Server version: 5.7.22
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `imageName` varchar(256) COLLATE utf8_bin NOT NULL,
  `imagePath` varchar(256) COLLATE utf8_bin NOT NULL,
  `caption` varchar(256) COLLATE utf8_bin NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `imageName`, `imagePath`, `caption`, `userID`) VALUES
(1, '\"581e401bf0faa6af50ceb1647a7ab4fc35757aee080d255f180ff0a4dbd35c01730afd05bcd30f6bb4163232ae5a948d2d2f53a0dbb0a6125577652fcc56ca14.png\"', '/files/userFiles/26/userPhotos/', '', 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(21) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `access_level` tinyint(4) NOT NULL DEFAULT '0',
  `confirm_hash` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `access_level`, `confirm_hash`, `creation_date`, `last_login`) VALUES
(26, 'szverhov', 'szverhov@gmail.com', '98ce74fe4eacbb70cf16920714135c61a838912663dbe0f3e3b60268253a8da870c1f8d8b36ddd557029688729b93a59945fb635c515e4a66986d434bca0cb6b', 1, '86983f596f5bbb668024080324cb42cf', '2019-07-14 21:25:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
