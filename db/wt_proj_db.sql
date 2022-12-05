-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2022 at 01:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_proj_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Python'),
(3, 'C++'),
(4, 'Java'),
(5, 'JavaScript'),
(6, 'HTML'),
(7, 'JSON'),
(8, 'Ruby'),
(9, 'Perl'),
(10, 'ADBMS');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `answer` int(4) NOT NULL,
  `categories_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `categories_id`) VALUES
(1, 'What does PHP stand for?', 'Hypertext Preprocessor', 'Pretext Hypertext Preprocessor', 'Personal Home Processor', 'None', 1, 1),
(2, 'Variable name in PHP starts with?', '! (Exclamation)', '& (Ampersand)', '# (Hash)', '$ (Dollar)', 4, 1),
(6, 'Which one of the following is the correct extension of the Python file?', '.py', '.python', '.p', '.php', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `not_attempt` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `total_questions`, `attempt`, `not_attempt`, `right_answer`, `wrong_answer`, `user_id`, `categories_id`) VALUES
(1, 1, 1, 0, 1, 0, 1, 2),
(2, 2, 2, 0, 2, 0, 10, 1),
(3, 1, 1, 0, 0, 1, 10, 2),
(4, 2, 2, 0, 1, 1, 10, 1),
(5, 2, 2, 0, 1, 1, 15, 1),
(6, 3, 2, 1, 2, 0, 15, 1),
(7, 2, 2, 0, 0, 2, 15, 1),
(8, 2, 2, 0, 1, 1, 17, 1),
(9, 3, 3, 0, 2, 1, 17, 1),
(10, 1, 1, 0, 1, 0, 18, 2),
(11, 3, 3, 0, 1, 2, 18, 1),
(12, 3, 2, 1, 2, 0, 3, 1),
(13, 3, 3, 0, 1, 2, 3, 1),
(14, 3, 1, 2, 0, 1, 18, 1),
(15, 3, 3, 0, 1, 2, 19, 1),
(16, 3, 0, 3, 0, 0, 19, 1),
(17, 3, 0, 3, 0, 0, 19, 1),
(18, 3, 0, 3, 0, 0, 19, 1),
(19, 3, 0, 3, 0, 0, 19, 1),
(20, 3, 0, 3, 0, 0, 19, 1),
(21, 3, 0, 3, 0, 0, 19, 1),
(22, 1, 1, 0, 0, 1, 2, 2),
(23, 3, 3, 0, 2, 1, 20, 1),
(24, 2, 2, 0, 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_superuser` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `is_superuser`) VALUES
(1, 'user1', 'user1@gmail.com', 'asdf@123', 'mandsaur_university_logo.png', NULL),
(2, 'user2', 'user2@gmail.com', 'asdf@123', 'mandsaur_university_logo.png', NULL),
(3, 'user3', 'user3@gmail.com', 'asdf@123', '', NULL),
(4, 'user4', 'user4@gmail.com', 'asdf@123', '', NULL),
(5, 'user5', 'user5@gmail.com', 'asdf@123', 'mandsaur_university_logo.png', NULL),
(6, 'user6', 'user6@gmail.com', 'asdf@123', 'Vaibhav Bhawsar.jpg', NULL),
(7, 'user7', 'user7@gmail.com', 'asdf@123', 'DP.png', NULL),
(8, 'user8', 'user8@gmail.com', 'asdf@!23', 'DP girl.jpg', NULL),
(10, 'user9', 'user9@gmail.com', 'asdf@123', 'basic.jpeg', NULL),
(11, 'user10', 'user10@gmail.com', 'asdf@123', 'Nutritionoffer1.jpeg', NULL),
(13, 'user11', 'user11@gmail.com', 'asdf@123', 'testing3.jpg', NULL),
(14, 'admin', 'admin@gmail.com', 'asdf@123', 'yogaoffer2.jpg', 1),
(15, 'pushpa', 'pushpa@gmail.com', 'asdf@123', 'DP girl.jpg', NULL),
(17, 'user15', 'user15@gmail.com', 'asdf@123', 'Nutritionoffer3.jpg', NULL),
(18, 'user6', 'user16@gmail.com', 'asdf@123', 'Nutritionoffer3.jpg', NULL),
(19, 'user17', 'user17@gmail.com', 'asdf@123', 'DP.png', NULL),
(20, 'sakshi', 'sakshi@gmail.com', 'asdf@123', 'DP girl.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `Fk_categories_questions` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `Fk_categories_results` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `Fk_user_results` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
