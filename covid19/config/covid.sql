-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2020 at 04:04 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_log`
--

CREATE TABLE `auth_log` (
  `id` int(11) NOT NULL,
  `log` varchar(1000) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_log`
--

INSERT INTO `auth_log` (`id`, `log`, `created_time`) VALUES
(1, 'Logged in at 2020-04-12 12:31:27am', '2020-04-11 18:01:27'),
(2, 'Logged in at 2020-04-12 12:36:23am', '2020-04-11 18:06:23'),
(3, 'Record for Myanmar is updated at 2020-04-12 02:14:07am', '2020-04-11 19:44:07'),
(4, 'Logged in at 2020-04-12 02:57:43pm', '2020-04-12 08:27:43'),
(5, 'Logged in at 2020-04-12 08:57:54pm', '2020-04-12 14:27:54'),
(6, 'Record for Myanmar is updated at 2020-04-12 08:58:39pm', '2020-04-12 14:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `country_myanmar`
--

CREATE TABLE `country_myanmar` (
  `id` int(11) NOT NULL,
  `new_case` varchar(50) NOT NULL,
  `active_case` varchar(50) NOT NULL,
  `serious_case` varchar(50) NOT NULL,
  `total_case` varchar(50) NOT NULL,
  `total_death` varchar(50) NOT NULL,
  `total_recovered` varchar(50) NOT NULL,
  `recorded_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `am_pm` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_myanmar`
--

INSERT INTO `country_myanmar` (`id`, `new_case`, `active_case`, `serious_case`, `total_case`, `total_death`, `total_recovered`, `recorded_time`, `am_pm`) VALUES
(1, '0', '27', '0', '31', '3', '1', '2020-04-11 19:33:14', 'am'),
(2, '0', '27', '0', '31', '3', '1', '2020-04-11 19:36:09', 'am'),
(3, '0', '27', '0', '31', '3', '1', '2020-04-11 19:40:33', 'am'),
(4, '0', '26', '0', '31', '3', '2', '2020-04-11 19:45:07', 'am'),
(5, '7', '11', '0', '38', '3', '1', '2020-04-12 14:28:39', 'pm');

-- --------------------------------------------------------

--
-- Table structure for table `site_traffic`
--

CREATE TABLE `site_traffic` (
  `id` int(11) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `active_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `am_pm` varchar(5) NOT NULL,
  `active_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_traffic`
--

INSERT INTO `site_traffic` (`id`, `user_ip`, `active_time`, `am_pm`, `active_date`) VALUES
(1, '1.1.1.1', '2020-04-10 02:52:34', 'pm', '2020-04-10'),
(2, '1.1.1.10', '2020-04-10 03:01:56', 'pm', '2020-04-10'),
(3, '2.2.2.2', '2020-04-10 03:01:50', 'pm', '2020-04-10'),
(4, '1.1.1.1', '2020-04-10 19:30:39', 'am', '2020-04-11'),
(5, '1.1.0.0', '2020-04-10 19:32:19', 'am', '2020-04-11'),
(6, '1.1.0.20', '2020-04-10 19:35:21', 'am', '2020-04-11'),
(17, '2.2.2.2', '2020-04-10 19:43:14', 'am', '2020-04-11'),
(18, '1.1.0.0', '2020-04-11 18:47:53', 'am', '2020-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_log`
--
ALTER TABLE `auth_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_myanmar`
--
ALTER TABLE `country_myanmar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_traffic`
--
ALTER TABLE `site_traffic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_log`
--
ALTER TABLE `auth_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `country_myanmar`
--
ALTER TABLE `country_myanmar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_traffic`
--
ALTER TABLE `site_traffic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
