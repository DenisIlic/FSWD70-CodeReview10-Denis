-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 08:03 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_denis_ilic_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(11) NOT NULL,
  `fk_cdID` int(11) DEFAULT NULL,
  `Book_title` varchar(100) NOT NULL,
  `Book_image` blob NOT NULL,
  `Book_author` varchar(100) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Book_desc` varchar(100) NOT NULL,
  `Book_published` int(11) NOT NULL,
  `Book_publisher` varchar(100) NOT NULL,
  `Book_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `fk_cdID`, `Book_title`, `Book_image`, `Book_author`, `ISBN`, `Book_desc`, `Book_published`, `Book_publisher`, `Book_type`) VALUES
(7, NULL, '', '', 'Me', 0, 'Hi', 2019, 'Cinema Studios', 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `cd`
--

CREATE TABLE `cd` (
  `CdID` int(11) NOT NULL,
  `fk_dvdID` int(11) DEFAULT NULL,
  `Cd_title` varchar(100) NOT NULL,
  `Cd_image` blob NOT NULL,
  `Cd_artist` varchar(100) NOT NULL,
  `Cd_desc` varchar(100) NOT NULL,
  `Cd_published` int(11) NOT NULL,
  `Cd_publisher` varchar(100) NOT NULL,
  `Cd_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE `dvd` (
  `DvDID` int(11) NOT NULL,
  `DvD_title` varchar(100) NOT NULL,
  `DvD_image` blob NOT NULL,
  `DvD_author` varchar(100) NOT NULL,
  `DvD_desc` varchar(100) NOT NULL,
  `DvD_published` int(11) NOT NULL,
  `DvD_publisher` varchar(100) NOT NULL,
  `DvD_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `fk_cdID` (`fk_cdID`);

--
-- Indexes for table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`CdID`),
  ADD KEY `fk_dvdID` (`fk_dvdID`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`DvDID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cd`
--
ALTER TABLE `cd`
  MODIFY `CdID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `DvDID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`fk_cdID`) REFERENCES `cd` (`CdID`);

--
-- Constraints for table `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `cd_ibfk_1` FOREIGN KEY (`fk_dvdID`) REFERENCES `dvd` (`DvDID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
