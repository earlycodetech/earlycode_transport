-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 07:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earlycode_transports`
--

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
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `dob`, `email`, `user_password`, `user_address`, `city`, `user_state`, `zip_code`, `phone`, `prof_pic`, `user_role`, `password_trial`, `user_status`, `date_created`) VALUES
(1, 'John', 'test', 'Wick', 'Male', '2022-04-14', 'tester@gmail.com', '$2y$10$LSb8ObPmkB8RbA55aqF3oemDEXCNcLAhu5eHqu/wISmDr53PdCQye', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '+2348124423122', 'profile1.jpg', 'admin', 0, 'enabled', '2022-04-23'),
(2, 'Mary', 'Mad', 'Papi Chulo', 'Female', '2022-04-06', 'mary@gmail.com', '$2y$10$ScaId6lAsHzPLfYUFc.bEePFbLnn6Gr27UyuilUhU9KtBwhPtxJ7u', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '08124423122', 'profile2.jpg', 'user', 0, '', '2022-04-25'),
(3, 'Chris', 'test', 'Graham', 'Male', '2022-04-27', 'chrisgraham2625@gmail.com', '$2y$10$/L4Ad6kdgxRv7oNynjmBr.SA4Wi6xLQaRfcWVA6KpKgphxjjpWXpq', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '+2348124423122', '', 'user', 0, '', '2022-04-30'),
(5, 'Michael', 'test', 'Graham', 'Male', '2022-04-27', 'michael@gmail.com', '$2y$10$/L4Ad6kdgxRv7oNynjmBr.SA4Wi6xLQaRfcWVA6KpKgphxjjpWXpq', '4 Kado Estates Abuja', 'FCT', 'ABUJA', '900108', '+2348124423122', '', 'user', 0, '', '2022-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
