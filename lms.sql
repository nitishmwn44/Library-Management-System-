-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 10:53 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `ques` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `name`, `password`, `email`, `roll`, `ques`) VALUES
(1, 'Naruto', 'Uzumaki', 'Hokage', 'dattebayo', 'hinata@123.co.in', 'cp3', '2'),
(2, 'Okabe', 'Rintaro', 'Mad Scientist', 'stiensgate', 'kirusu@mayur.ri', 'cp3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `edition`, `quantity`, `available`) VALUES
(1, 'Compititive Programming 3', 'Stevin and Felix Helim', '2nd', 5, 5),
(2, 'Compititive Programming 3', 'Stevin and Felix Helim', '3rd', 12, 11),
(3, 'Let Us C', 'Yashwant Kanetkar', '5th', 45, 44),
(4, 'Higher Engineering Mathematics', 'B.S.Grewal', '8th', 9, 8),
(5, 'Romeo and Juliet', 'William Shakespeare', '1st', 3, 2),
(6, 'Loyalties', 'John Galsworthy', '4th', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `libops`
--

CREATE TABLE `libops` (
  `id` int(11) NOT NULL,
  `studname` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `bookedi` varchar(255) NOT NULL,
  `issued` varchar(255) NOT NULL,
  `returnd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libops`
--

INSERT INTO `libops` (`id`, `studname`, `bookname`, `bookedi`, `issued`, `returnd`) VALUES
(3, 'Hardcore777ag', 'Compititive Programming 3', '3rd', '05-07-2019', ''),
(4, 'Hardcore777ag', 'Compititive Programming 3', '2nd', '05-07-2019', '05-07-2019'),
(5, 'God of Time', 'Let Us C', '5th', '05-07-2019', ''),
(6, 'God of Time', 'Romeo and Juliet', '1st', '05-07-2019', ''),
(7, 'Hardcore777ag', 'Higher Engineering Mathematics', '8th', '06-07-2019', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderun` varchar(255) NOT NULL,
  `receiverun` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `isread` varchar(255) NOT NULL,
  `senton` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderun`, `receiverun`, `subject`, `message`, `isread`, `senton`) VALUES
(1, 'Hokage', 'Hardcore777ag', 'Testing', 'Testing1234', 'yes', '07-07-2019'),
(2, 'Hokage', 'Hardcore777ag', 'TestingAgain', 'Hello hardcore', 'no', '07-07-2019'),
(3, 'Hokage', 'God of Time', 'Your Kawainess', 'Love you Yuno.....loll', 'no', '06-07-2019'),
(4, 'Hardcore777ag', 'Dragon Slayer', 'I love Erza', 'Can you do something about it', 'no', '06-07-2019');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `name`, `password`, `email`, `roll`, `status`) VALUES
(1, 'Anmol', 'Gupta', 'Hardcore777ag', '1234567890', 'guptaanmol92@gmail.com', '18JE0139', 'yes'),
(2, 'Natsu', 'Dragneal', 'Dragon Slayer', 'lucyyyyy', 'fairytail@123.com', '99JE0777', 'yes'),
(3, 'Test', 'Subject', 'LABRAT', 'testtest', 'abc@gmail.com', '18JE9138', 'no'),
(4, 'Yuno', 'Gasai', 'God of Time', 'killkill', 'yuno@gasai.in', '18JE1139', 'yes'),
(5, 'Sawako', 'Kuronoma', 'Sadako', '87654321', 'ghost@kawai.com', '18JE2139', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libops`
--
ALTER TABLE `libops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `libops`
--
ALTER TABLE `libops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
