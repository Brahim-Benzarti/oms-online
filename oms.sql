-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 04:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
(9, 12),
(9, 14),
(9, 15),
(9, 16),
(9, 18),
(9, 19),
(12, 9),
(12, 13),
(12, 15),
(13, 14),
(14, 9),
(14, 13),
(15, 9),
(15, 12),
(17, 9),
(18, 9),
(18, 15),
(19, 9);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `Message_id` int(11) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `text` mediumtext NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`Message_id`, `Date`, `file`, `text`, `seen`, `sender_id`, `receiver_id`) VALUES
(11, '2021-01-16 10:57:07', NULL, 'Hey!', 1, 12, 9),
(12, '2021-01-16 10:57:17', NULL, 'How are you today', 1, 12, 9),
(13, '2021-01-16 10:58:02', NULL, 'Morning!!', 0, 9, 12),
(14, '2021-01-16 10:58:36', NULL, 'Was waiting for your text', 0, 9, 12),
(15, '2021-01-16 10:58:47', NULL, 'Hey there', 0, 9, 15),
(16, '2021-01-16 10:59:18', NULL, 'Did you think about it?', 0, 9, 15),
(17, '2021-01-16 10:59:59', NULL, 'Suuuuup', 0, 14, 13),
(18, '2021-01-16 11:00:11', NULL, 'Hook me up!', 0, 14, 13),
(19, '2021-01-16 11:00:46', NULL, 'What', 1, 15, 9),
(20, '2021-01-16 11:01:18', NULL, 'Think about what ', 1, 15, 9),
(21, '2021-01-16 11:01:27', NULL, 'LOL ', 1, 15, 9),
(22, '2021-01-16 11:01:39', NULL, 'You know me :p ', 1, 15, 9),
(23, '2021-01-16 12:07:11', NULL, 'Hello Again!', 0, 9, 12),
(24, '2021-03-19 03:33:32', NULL, 'Hi', 1, 15, 9),
(25, '2021-03-19 03:33:42', NULL, 'sup', 0, 9, 15),
(26, '2021-03-19 03:40:22', NULL, 'Hi', 1, 15, 9),
(27, '2021-03-19 03:40:36', NULL, 'how are you?', 0, 9, 15),
(28, '2021-03-19 03:40:48', NULL, 'fine thank you!!', 1, 15, 9),
(29, '2021-03-19 04:39:35', NULL, 'hi', 0, 15, 12),
(30, '2021-03-19 04:40:09', NULL, 'what is up', 1, 12, 15),
(31, '2021-03-19 04:40:28', NULL, 'nothing much', 0, 15, 12),
(32, '2021-03-19 05:04:50', '2021113213906@9.jpg', 'Hoy', 1, 12, 9),
(33, '2021-05-10 07:24:53', '202112972453@9.jpg', 'test', 0, 9, 12),
(34, '2021-06-20 03:45:05', '', 'yow', 1, 18, 9),
(35, '2021-06-20 03:45:46', '', 'suup dude', 1, 9, 18),
(36, '2021-06-20 03:47:19', '', 'u good?', 1, 9, 18),
(37, '2021-06-20 03:49:00', '', 'what is that ', 1, 9, 18),
(38, '2021-06-20 03:52:18', '', 'am fixing a bug', 1, 9, 18),
(39, '2021-06-20 03:54:48', '', 'wbN!', 1, 9, 18),
(40, '2021-06-20 04:04:40', '', 'gj bro', 1, 18, 9),
(41, '2021-06-20 04:38:43', '202117043843@9.jpg', '', 1, 9, 18),
(42, '2021-06-20 04:41:32', '202117044132@9.jfif', '', 1, 9, 18),
(43, '2021-06-23 19:20:57', '2021173192057@9.jpg', '', 1, 9, 18),
(44, '2021-06-23 19:21:08', '', 'set that as profile picture ', 1, 9, 18),
(45, '2021-06-27 18:17:58', '', 'okay done', 1, 18, 9),
(46, '2021-07-14 01:15:53', '', 'ahla', 0, 9, 12),
(47, '2021-07-14 02:13:59', '', 'ahal bb', 1, 19, 9),
(48, '2021-07-14 02:14:16', '', 'wink', 1, 19, 9),
(49, '2021-07-14 02:14:28', '', 'ani', 1, 9, 19);

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
  `User_birthday` date NOT NULL,
  `User_description` varchar(200) DEFAULT NULL,
  `User_picture` varchar(30) NOT NULL,
  `User_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_password`, `User_email`, `User_phone_number`, `User_sex`, `User_birthday`, `User_description`, `User_picture`, `User_status`) VALUES
(9, 'Brahim Benzarti', 'brahim', 'brahim.al.benzarti@gmail.com', '21061865', 'Male', '0000-00-00', 'Tired..', '2021173191832@9.jpg', 1),
(12, 'Gerald Falco', 'gerald', 'shaun2014@hotmail.com', '501-765-6578', 'Male', '0000-00-00', '', '', 0),
(13, 'Ollie Hall', 'hall', 'lillie_brek@yahoo.com', '717-776-7830', 'Male', '0000-00-00', 'Travel nerd. Devoted tv guru. Music fanatic. Amateur bacon enthusiast. Unapologetic internet ninja.', '', 0),
(14, 'Valerie Leaf', 'leaf', 'whitney.hamm@yahoo.com', '989-534-1059', 'Male', '0000-00-00', 'Internet lover. Zombie aficionado. Music scholar. Total organizer. Bacon nerd. Entrepreneur.', '', 0),
(15, 'Jennifer Rangel', 'jennifer', 'chandler.keebl@hotmail.com', '517-698-6816', 'Female', '0000-00-00', 'Subtly charming tv scholar. Music trailblazer. Unapologetic creator. Incurable alcohol buff.', '', 0),
(16, 'okk', 'okk', 'okk@okk', '11222333', 'Other', '2021-05-25', NULL, '', 0),
(17, 'Sheryl R Douglas', 'Sheryl R Douglas', 'marc1993@hotmail.com', '87516285', 'Female', '1993-12-18', NULL, '', 1),
(18, 'tes@ting', 'testing', 'tes@ting', '00000000', 'Male', '2021-06-02', NULL, '2021173192028@18.jpg', 0),
(19, 'Becky ', 'becky', 'becky@becky', '22333555', 'Female', '2021-07-14', NULL, '', 0);

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
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
