-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 05:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oms`
--
-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`user_id`, `contact_id`) VALUES
(9, 9),
(9, 12),
(9, 14),
(12, 9),
(12, 13),
(12, 15),
(13, 14),
(14, 9),
(14, 13),
(15, 12);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_id` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `file_format` varchar(5) DEFAULT NULL,
  `file_location` varchar(200) DEFAULT NULL,
  `text` mediumtext NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_id`, `Date`, `file_format`, `file_location`, `text`, `sender_id`, `receiver_id`) VALUES
(11, '2021-01-16 10:57:07', NULL, NULL, 'Hey!', 12, 9),
(12, '2021-01-16 10:57:17', NULL, NULL, 'How are you today', 12, 9),
(13, '2021-01-16 10:58:02', NULL, NULL, 'Morning!!', 9, 12),
(14, '2021-01-16 10:58:36', NULL, NULL, 'Was waiting for your text message', 9, 12),
(15, '2021-01-16 10:58:47', NULL, NULL, 'Hey there', 9, 15),
(16, '2021-01-16 10:59:18', NULL, NULL, 'Did you think about it?', 9, 15),
(17, '2021-01-16 10:59:59', NULL, NULL, 'I need more friends man', 14, 13),
(18, '2021-01-16 11:00:11', NULL, NULL, 'Hook me up!', 14, 13),
(19, '2021-01-16 11:00:46', NULL, NULL, 'What', 15, 9),
(20, '2021-01-16 11:01:18', NULL, NULL, 'Think about what ', 15, 9),
(21, '2021-01-16 11:01:27', NULL, NULL, 'LOL ', 15, 9),
(22, '2021-01-16 11:01:39', NULL, NULL, 'You know me :p ', 15, 9),
(23, '2021-01-16 12:07:11', NULL, NULL, 'Hello Again!', 9, 12),
(24, '2021-03-19 03:33:32', NULL, NULL, 'Hi', 15, 9),
(25, '2021-03-19 03:33:42', NULL, NULL, 'sup', 9, 15),
(26, '2021-03-19 03:40:22', NULL, NULL, 'Hi', 15, 9),
(27, '2021-03-19 03:40:36', NULL, NULL, 'how are you?', 9, 15),
(28, '2021-03-19 03:40:48', NULL, NULL, 'fine thank you!!', 15, 9),
(29, '2021-03-19 04:39:35', NULL, NULL, 'hi', 15, 12),
(30, '2021-03-19 04:40:09', NULL, NULL, 'what is up', 12, 15),
(31, '2021-03-19 04:40:28', NULL, NULL, 'nothing much', 15, 12),
(32, '2021-03-19 05:04:50', NULL, NULL, 'Hoy', 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `User_password` varchar(50) NOT NULL,
  `User_email` varchar(99) NOT NULL,
  `User_phone_number` varchar(15) DEFAULT NULL,
  `User_sex` enum('Male','Female','Other') DEFAULT NULL,
  `User_age` int(3) NOT NULL,
  `User_description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_password`, `User_email`, `User_phone_number`, `User_sex`, `User_age`, `User_description`) VALUES
(9, 'Brahim Benzarti', 'brahim', 'brahim.al.benzarti@gmail.com', '', 'Male', 20, 'Tired..'),
(12, 'Gerald Falco', 'gerald', 'shaun2014@hotmail.com', '501-765-6578', 'Male', 25, ''),
(13, 'Ollie Hall', 'hall', 'lillie_brek@yahoo.com', '717-776-7830', 'Male', 54, 'Travel nerd. Devoted tv guru. Music fanatic. Amateur bacon enthusiast. Unapologetic internet ninja.'),
(14, 'Valerie Leaf', 'leaf', 'whitney.hamm@yahoo.com', '989-534-1059', 'Male', 39, 'Internet lover. Zombie aficionado. Music scholar. Total organizer. Bacon nerd. Entrepreneur.'),
(15, 'Jennifer Rangel', 'jennifer', 'chandler.keebl@hotmail.com', '517-698-6816', 'Female', 50, 'Subtly charming tv scholar. Music trailblazer. Unapologetic creator. Incurable alcohol buff.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`user_id`,`contact_id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_email` (`User_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`User_id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
