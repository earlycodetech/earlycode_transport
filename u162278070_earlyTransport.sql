-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2022 at 05:16 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u162278070_earlyTransport`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_routes`
--

CREATE TABLE `booked_routes` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `booked_route` varchar(30) NOT NULL,
  `no_of_seats` varchar(30) NOT NULL,
  `date_of_departure` varchar(30) NOT NULL,
  `booking_status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_routes`
--

INSERT INTO `booked_routes` (`id`, `userid`, `full_name`, `booked_route`, `no_of_seats`, `date_of_departure`, `booking_status`, `date_created`) VALUES
(5, '2', 'Mary Papi Chulo', 'Lagos', '6', '2022-05-12', '<i class=\"text-danger\">Trip Ended</i>', '2022-05-03 05:03:40'),
(6, '2', 'Mary Papi Chulo', 'Lagos', '5', '2022-05-13', 'pending...', '2022-05-03 05:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `transport_route`
--

CREATE TABLE `transport_route` (
  `id` int(11) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  `route_price` varchar(30) NOT NULL,
  `route_status` varchar(15) NOT NULL,
  `available_seats` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_route`
--

INSERT INTO `transport_route` (`id`, `route_name`, `route_price`, `route_status`, `available_seats`, `date_created`) VALUES
(1, 'Lagos', '10000', 'Available', '11', '2022-05-02 05:04:46'),
(2, 'Abuja', '20000', 'Available', '16', '2022-05-02 05:17:58'),
(3, 'Asaba', '5000', 'Available', '16', '2022-05-02 05:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `email` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_address` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `user_state` varchar(30) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `prof_pic` varchar(50) NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `password_trial` int(5) NOT NULL,
  `user_status` varchar(15) NOT NULL,
  `password_reset` varchar(30) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `email`, `user_password`, `user_address`, `city`, `user_state`, `zip_code`, `phone`, `prof_pic`, `user_role`, `password_trial`, `user_status`, `password_reset`, `date_created`) VALUES
(1, 'John', 'test', 'Wick', 'Male', '2022-04-14', 'admin@earlyTransport.com', '$2y$10$LSb8ObPmkB8RbA55aqF3oemDEXCNcLAhu5eHqu/wISmDr53PdCQye', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '+2348124423122', 'profile1.jpg', 'admin', 0, 'enabled', '', '2022-04-23'),
(2, 'Mary', 'Mad', 'Papi Chulo', 'Female', '2022-04-06', 'mary@gmail.com', '$2y$10$ScaId6lAsHzPLfYUFc.bEePFbLnn6Gr27UyuilUhU9KtBwhPtxJ7u', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '08124423122', 'profile2.jpg', 'driver', 0, '', '', '2022-04-25'),
(3, 'Chris', 'test', 'Graham', 'Male', '2022-04-27', 'chrisgraham2625@gmail.com', '$2y$10$twg2vBy2ilo8PCTqM8QWOeY24vAp4wdd/ajDXL1sTk2r5TZUudJfW', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '+2348124423122', '', 'user', 0, '', 'SET', '2022-04-30'),
(5, 'Michael', 'test', 'Graham', 'Male', '2022-04-27', 'michael@gmail.com', '$2y$10$/L4Ad6kdgxRv7oNynjmBr.SA4Wi6xLQaRfcWVA6KpKgphxjjpWXpq', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '+2348124423122', '', 'user', 0, '', '', '2022-04-30'),
(6, 'goodness ', 'jimmy ', 'me ', 'Male', '2022-05-10', 'good2006rocks@gmail.com', '$2y$10$0PQKKRB.WYDt20.nTHJ50.v9yQ0eqcEkcfsq.2MvcD9xyuMRpmG7.', '', '', '', '', '', '', 'user', 0, '', '', '2022-05-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_routes`
--
ALTER TABLE `booked_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_route`
--
ALTER TABLE `transport_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_routes`
--
ALTER TABLE `booked_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transport_route`
--
ALTER TABLE `transport_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
