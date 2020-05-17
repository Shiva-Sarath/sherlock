-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2020 at 07:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sherlock`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `no` int(11) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`no`, `questions`, `answer`, `img`) VALUES
(1, 'Who is the Actor of Iron Man ?', '1729', 3),
(2, 'Who is the founder of Avengers ?', 'good going hunter', 3),
(3, 'Who is the Actor of Iron Man ?', 'kepler-452b', 4),
(4, 'Who is the Actor of Iron Man ?', 'rafael nadal', 3),
(5, 'Who is the Actor of Iron Man ?', 'michelle payne', 5),
(6, 'Who is the Actor of Iron Man ?', 'cold play', 6),
(7, 'Who is the Actor of Iron Man ?', 'horcruxes', 3),
(8, 'Who is the Actor of Iron Man ?', 'eroica', 0),
(9, 'Who is the Actor of Iron Man ?', 'mariana trench', 0),
(10, 'Who is the Actor of Iron Man ?', '221b baker street', 0),
(11, 'Who is the Actor of Iron Man ?', 'ans', 0),
(12, 'Who is the Actor of Iron Man ?', 'ans', 0),
(13, 'Who is the Actor of Iron Man ?', 'ans', 0),
(14, 'Who is the Actor of Iron Man ?', 'ans', 0),
(15, 'Who is the Actor of Iron Man ?', 'ans', 0),
(16, 'Who is the Actor of Iron Man ?', 'ans', 0),
(17, 'Who is the Actor of Iron Man ?', 'ans', 0),
(18, 'Who is the Actor of Iron Man ?', 'ans', 0),
(19, 'Who is the Actor of Iron Man ?', 'ans', 0),
(20, 'Who is the Actor of Terminator ?', 'ans', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
