-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2023 at 06:17 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries_db`
--

CREATE TABLE `countries_db` (
  `country` varchar(75) NOT NULL,
  `country_abr` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries_db`
--

INSERT INTO `countries_db` (`country`, `country_abr`) VALUES
('Germany', 'DEU'),
('France', 'FRA'),
('United States', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`, `admin`) VALUES
(0, 'TestingV1', '$2y$10$ucQunwmF6SR5Q0KbML2yWeRxHbVEr3RdK.T2YsXA1Y4D7ITA5LBPS', 0),
(1, 'AdminET', '$2y$10$m9JwD0q/YfGwB87rxYL5XuzSHlSXc/XK.qEzHfstPpMwkupuWskmu', 1),
(2, 'AdminET35', '$2y$10$0XnWemBxfgKfTwne1EJeVe1FUmJ731Vux1jkQGtRqjJFHn4/Fpw4C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `track_db`
--

CREATE TABLE `track_db` (
  `id` int(11) NOT NULL,
  `country` varchar(3) NOT NULL,
  `circuit_name` varchar(75) NOT NULL,
  `length` float NOT NULL,
  `turns` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track_db`
--

INSERT INTO `track_db` (`id`, `country`, `circuit_name`, `length`, `turns`) VALUES
(1, 'USA', 'Road America', 4.048, 14),
(2, 'FRA', 'Circuit de la Sarthe', 8.467, 38),
(3, 'USA', 'Daytona Road Course', 3.56, 12),
(4, 'USA', 'World Wide Technology Raceway - Oval', 1.25, 4),
(5, 'DEU', 'Nurburgring GP', 3.199, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries_db`
--
ALTER TABLE `countries_db`
  ADD PRIMARY KEY (`country_abr`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_db`
--
ALTER TABLE `track_db`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country` (`country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `track_db`
--
ALTER TABLE `track_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `track_db`
--
ALTER TABLE `track_db`
  ADD CONSTRAINT `track_db_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries_db` (`country_abr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
