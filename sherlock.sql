-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2020 at 12:52 PM
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `phone` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(75) NOT NULL,
  `password` varchar(25) NOT NULL,
  `answered` tinyint(4) NOT NULL DEFAULT 0,
  `last_answered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`phone`, `name`, `course`, `password`, `answered`, `last_answered`) VALUES
('9595959595', 'Siny', 'MCA', '1234567890', 4, '2020-02-23 02:12:13'),
('9745489348', 'sarath m', '9995031469', '1111', 0, '2020-05-05 10:45:42'),
('987654321', 'Jeny', 'M.Tech', '1234567890', 14, '2020-02-23 02:51:45'),
('9895123456', 'sarath m', 'ccc', '1234', 0, '2020-05-05 05:47:48'),
('9895845304', 'Sarath m', 'mca', '12123', 1, '2020-05-05 11:44:40'),
('9898989898', 'Sily', 'MCA', '1234567890', 19, '2020-02-23 01:50:42'),
('9995031469', 'sarath m', 'mma', '1111', 0, '2020-05-05 05:14:17'),
('9999999999', 'Danny', 'B.Tech', '1234567890', 19, '2020-02-23 02:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `no` int(11) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`no`, `questions`, `answer`) VALUES
(1, 'Who is the Actor of Iron Man ?', 'me'),
(2, 'Who is the founder of Avengers ?', 'ans'),
(3, 'Who is the Actor of Iron Man ?', 'ans'),
(4, 'Who is the Actor of Iron Man ?', 'ans'),
(5, 'Who is the Actor of Iron Man ?', 'ans'),
(6, 'Who is the Actor of Iron Man ?', 'ans'),
(7, 'Who is the Actor of Iron Man ?', 'ans'),
(8, 'Who is the Actor of Iron Man ?', 'ans'),
(9, 'Who is the Actor of Iron Man ?', 'ans'),
(10, 'Who is the Actor of Iron Man ?', 'ans'),
(11, 'Who is the Actor of Iron Man ?', 'ans'),
(12, 'Who is the Actor of Iron Man ?', 'ans'),
(13, 'Who is the Actor of Iron Man ?', 'ans'),
(14, 'Who is the Actor of Iron Man ?', 'ans'),
(15, 'Who is the Actor of Iron Man ?', 'ans'),
(16, 'Who is the Actor of Iron Man ?', 'ans'),
(17, 'Who is the Actor of Iron Man ?', 'ans'),
(18, 'Who is the Actor of Iron Man ?', 'ans'),
(19, 'Who is the Actor of Iron Man ?', 'ans'),
(20, 'Who is the Actor of Terminator ?', 'ans');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`phone`);

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
