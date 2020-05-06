-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 05:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tt`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(70) NOT NULL,
  `place` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `role`, `name`, `email`, `phone`, `password`, `address`, `place`) VALUES
(1, 3, 'Rim', 'rim@gmail.com', '9898989898', '123', '', 'Tirupati'),
(3, 3, 'Rimi', 'rimi@gmail.com', '7897897890', '123', '', 'Tirupati'),
(4, 3, 'kRim', 'rim@gmail.com', '9898989833', '123', '', 'Tirupati');

-- --------------------------------------------------------

--
-- Table structure for table `prods`
--

CREATE TABLE `prods` (
  `id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `product` varchar(60) NOT NULL,
  `crop_bags` int(11) NOT NULL,
  `market_val` int(11) NOT NULL,
  `stored_in` int(11) NOT NULL,
  `stored_bags` int(11) NOT NULL,
  `notify` int(11) NOT NULL,
  `notified_time` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prods`
--

INSERT INTO `prods` (`id`, `f_id`, `product`, `crop_bags`, `market_val`, `stored_in`, `stored_bags`, `notify`, `notified_time`) VALUES
(1, 3, 'Wheat', 100, 6876, 0, 0, 1, ''),
(2, 1, 'Rice', 300, 678, 0, 0, 1, ''),
(3, 3, 'Rice', 300, 678, 0, 0, 1, ''),
(4, 1, 'Corn', 21, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reqs`
--

CREATE TABLE `reqs` (
  `id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `bags` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `product` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reqs`
--

INSERT INTO `reqs` (`id`, `f_id`, `w_id`, `bags`, `status`, `product`) VALUES
(1, 1, 1, 100, 0, 'Rice'),
(2, 1, 1, 100, 0, 'Rice'),
(3, 1, 1, 10, 0, 'Rice');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` int(11) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `r_name`, `phone`, `region`) VALUES
(2, 'Yashaswini', '8765888888', 'Tirupati');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `fname` varchar(90) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `fname`, `phone`, `email`, `password`, `dept`) VALUES
(1, 1, 'Admin', '7575757575', 'admin@gmail.com', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `wid` varchar(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `rent_day` int(11) NOT NULL,
  `rent_bag` int(11) NOT NULL,
  `w_type` varchar(50) NOT NULL,
  `space_bags` int(11) NOT NULL,
  `stored_space` int(11) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `wid`, `role_id`, `owner`, `phone`, `email`, `password`, `rent_day`, `rent_bag`, `w_type`, `space_bags`, `stored_space`, `place`) VALUES
(1, 'whid1', 2, 'bimjj', '7118889789', 'bim@gmail.com', '1234', 1, 20, 'Normal', 504, 500, 'Tirupati'),
(2, 'whid2', 2, 'Kim', '7118889789', 'kimm@gmail.com', '123', 1, 20, 'Cold', 505, 400, 'Tirupati'),
(3, 'whid3', 2, 'bib', '9887754397', 'bib@gmail.com', '123', 0, 0, 'Normal', 0, 0, 'Tirupati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prods`
--
ALTER TABLE `prods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqs`
--
ALTER TABLE `reqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prods`
--
ALTER TABLE `prods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reqs`
--
ALTER TABLE `reqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
