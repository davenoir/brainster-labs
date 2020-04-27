-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2019 at 02:10 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainster`
--

-- --------------------------------------------------------

--
-- Table structure for table `formdata`
--

CREATE TABLE `formdata` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `companyname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `student` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formdata`
--

INSERT INTO `formdata` (`id`, `username`, `companyname`, `email`, `phone`, `student`) VALUES
(1, 'David Nastevski', 'some company', 'davidnastevski@outlook.com', 76240056, 'coding'),
(3, 'Marina nastevska', 'nekoja kompanija', 'marinna.nastevska@gmail.com', 76405401, 'design'),
(4, 'Emilija Stamcevska', 'samsung', 'emilija.s@gmail.com', 72541236, 'design'),
(5, 'John Doe', 'GMX', 'johndoe@sth.com', 71000000, 'dataScience'),
(6, 'frosina nastevska', 'dunder mifflin', 'frosika.frost@gmail.com', 98456335, 'design'),
(8, 'Jane Doe', 'some company name', 'janedoe@sth.com', 75054857, 'dataScience'),
(9, 'Bojan Najdovski', 'X company', 'bojan@gmail.com', 1583645621, 'coding'),
(10, 'Nikola Nikolovski', 'XY company', 'nikola@gmail.com', 47562123, 'marketing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formdata`
--
ALTER TABLE `formdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formdata`
--
ALTER TABLE `formdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
