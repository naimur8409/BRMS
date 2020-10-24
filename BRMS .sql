-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2020 at 04:00 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BRMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `backlog`
--

CREATE TABLE `backlog` (
  `id` int(11) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `c_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE `final_result` (
  `id` int(11) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `c_code` varchar(20) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3','4') NOT NULL,
  `term` enum('I','II') NOT NULL,
  `credit` int(11) NOT NULL,
  `gpa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_result`
--

INSERT INTO `final_result` (`id`, `s_id`, `c_code`, `c_name`, `level`, `term`, `credit`, `gpa`) VALUES
(8, '1104038', 'CSE-101', 'Computer Fundamental and Basic Programming', '1', 'I', 3, '3.50'),
(9, '1104038', 'CSE-102', 'Computer Fundamental and Basic Programming sessional', '1', 'I', 3, '3.5'),
(10, '1104038', 'CSE-301', 'Data Structure', '3', 'I', 3, '3.75'),
(11, '1104001', 'CSE-101', 'Computer Fundamental and Basic Programming', '1', 'I', 3, '3.75'),
(12, '1104001', 'CSE-102', 'Computer Fundamental and Basic Programming sessional', '1', 'I', 3, '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `batch` enum('Spring''15','Fall''15','Spring''16','Fall''16','Spring''17','Fall''17','Spring''18','Fall''18','Spring''19','Fall''19','Spring''20','Fall''20') NOT NULL,
  `dept` enum('CSE','EEE','CE','DBA','ENG','LAW') DEFAULT NULL,
  `level` enum('1','2','3','4','Graduated') DEFAULT NULL,
  `term` enum('I','II','Graduated') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('Graduated','Undergraduate') NOT NULL,
  `CGPA` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `s_id`, `name`, `email`, `batch`, `dept`, `level`, `term`, `password`, `mobile`, `address`, `status`, `CGPA`) VALUES
(7, '1104038', 'Naimur Rahman Alif', 'alif@gmail.com', 'Fall\'16', 'CSE', '4', 'II', 'f5f091a697cd91c4170cda38e81f4b1a', '01794668409', 'Race Course', 'Undergraduate', '3.21'),
(8, '1105003', 'Mahbubur Rahamn', 'mahbub@gmail.com', 'Spring\'17', 'CSE', '4', 'I', '25d55ad283aa400af464c76d713c07ad', '0165871255', 'Kaz', 'Undergraduate', '3.50'),
(9, '1103001', 'Tonia Afzal', 'tonia@gmail.com', 'Spring\'16', 'CSE', 'Graduated', 'Graduated', 'd41d8cd98f00b204e9800998ecf8427e', '015478521456', 'Race Course', 'Graduated', '3.12'),
(10, '1105051', 'Zinia Jahan', 'zinia96@gmail.com', 'Spring\'16', 'CSE', 'Graduated', 'Graduated', '25d55ad283aa400af464c76d713c07ad', '015748965325', 'Noakhali', 'Graduated', '3.21'),
(12, '1104001', 'Muntakimur Rahman', 'muntakim@gmail.com', 'Fall\'16', 'CSE', '4', 'II', '25d55ad283aa400af464c76d713c07ad', '01784515846', 'Race Course', 'Undergraduate', '3.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backlog`
--
ALTER TABLE `backlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_result`
--
ALTER TABLE `final_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `backlog`
--
ALTER TABLE `backlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_result`
--
ALTER TABLE `final_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
