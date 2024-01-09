-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 10:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domain_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `pk` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`pk`, `answer`, `question_id`, `status`) VALUES
(1, 'Answer-1', 16, 0),
(2, 'Answer-2', 16, 0),
(3, 'Answer-3', 16, 0),
(4, 'Answer-4', 16, 1),
(5, 'Answer-1', 17, 1),
(6, 'Answer-2', 17, 0),
(7, 'Answer-3', 17, 0),
(8, 'Answer-4', 17, 0),
(9, 'Answer-10', 18, 0),
(10, 'Answer-20', 18, 0),
(11, 'Answer-30', 18, 0),
(12, 'Answer-40', 18, 1),
(13, 'Answer-1', 1, 0),
(14, 'Answer-2', 1, 0),
(15, 'Answer-3', 1, 0),
(16, 'Answer-4', 1, 1),
(17, 'Answer-1', 2, 1),
(18, 'Answer-2', 2, 0),
(19, 'Answer-3', 2, 0),
(20, 'Answer-4', 2, 0),
(21, 'Answer-1', 3, 1),
(22, 'Answer-2', 3, 0),
(23, 'Answer-3', 3, 0),
(24, 'Answer-4', 3, 0),
(25, 'Answer-1', 4, 0),
(26, 'Answer-2', 4, 0),
(27, 'Answer-3', 4, 0),
(28, 'Answer-4', 4, 1),
(29, 'Answer-1', 5, 1),
(30, 'Answer-2', 5, 0),
(31, 'Answer-3', 5, 0),
(32, 'Answer-4', 5, 0),
(33, 'Answer-1', 6, 1),
(34, 'Answer-2', 6, 0),
(35, 'Answer-3', 6, 0),
(36, 'Answer-4', 6, 0),
(37, 'Answer-1', 7, 0),
(38, 'Answer-2', 7, 0),
(39, 'Answer-3', 7, 0),
(40, 'Answer-4', 7, 1),
(49, 'Answer-1', 10, 0),
(50, 'Answer-2', 10, 0),
(51, 'Answer-3', 10, 0),
(52, 'Answer-4', 10, 1),
(53, 'Answer-1112', 19, 0),
(54, 'Answer-2223', 19, 0),
(55, 'Answer-3334', 19, 0),
(56, 'Answer-4445', 19, 1),
(57, 'dsasad', 20, 1),
(58, 'sdaads', 20, 0),
(59, 'dasasd', 20, 0),
(60, 'dasdas', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `pk` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`pk`, `name`, `visible`) VALUES
(2, 'searchberg', 1),
(3, 'Jumpto1', 0),
(5, 'bookwritingcube', 1),
(8, 'sa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_question`
--

CREATE TABLE `category_question` (
  `pk` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `visible` int(11) NOT NULL,
  `true_child_question` int(11) DEFAULT NULL,
  `false_child_question` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_question`
--

INSERT INTO `category_question` (`pk`, `question`, `category_id`, `description`, `visible`, `true_child_question`, `false_child_question`) VALUES
(1, 'What is Your Name?', 5, NULL, 0, 0, 0),
(2, 'What is Your Height?', 5, NULL, 0, 0, 0),
(3, 'What is Your Age?', 5, NULL, 0, 0, 0),
(4, 'Question500?', 5, NULL, 0, 0, 0),
(5, 'Question501?', 5, NULL, 0, 0, 0),
(6, 'Question502?', 5, NULL, 0, 0, 0),
(7, 'Question503?', 5, NULL, 0, 0, 0),
(10, 'What is Your Weight?', 5, NULL, 0, 0, 0),
(16, 'This is the Question #1', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae fuga quam aliquam consequuntur ipsa ab quaerat ut, assumenda non atque. Sunt nesciunt dignissimos amet est, ut eos dolorem vitae placeat.', 0, 5, 4),
(17, 'This is the Question #2', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam obcaecati quis assumenda placeat soluta, enim possimus eligendi? Debitis similique harum, temporibus dignissimos autem quidem ut eos amet sapiente delectus suscipit.', 1, 5, 4),
(18, 'This is the Question #3', 5, '1Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi accusantium iusto eveniet voluptas, ab quas labore delectus, molestiae deleniti laborum temporibus nobis repudiandae obcaecati cum iure, maxime quasi aut ex!', 1, 3, 10),
(19, 'This is the Question #4', 5, 'LOEAIKJAIJADIOJADOIJADO00', 1, 0, 0),
(20, 'dsa', 9, 'ads', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pk` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pk`, `full_name`, `email`, `password`, `role`) VALUES
(1, 'Alpha Admin', 'admin@gmail.com', '$2y$10$OtjAG9M1yuVbVXUJsKdZu.aYZI/XsMqtuoJu3XzRdLT2HYsjz74va', 'admin'),
(2, 'User', 'user@gmail.com', '$2y$10$acEl0h5vwLDcFDRtp.t7e.QPhmhPc5jCo/gWNu/PPIavKIi9dR9wa', 'admin'),
(3, 'Beta Admin', 'admin2@gmail.com', '$2y$10$OtjAG9M1yuVbVXUJsKdZu.aYZI/XsMqtuoJu3XzRdLT2HYsjz74va', 'admin'),
(5, 'asad', 'sxadsa@gmail.net', '$2y$10$wBbb.RSBVsgMsYdWEcthTOpp59KszIQn2w02j3jZLPQ1.XsuoXM22', 'admin'),
(7, 'asad', 'ninec15192@pursip.com', '$2y$10$BqgH/UWTtBzuuv.cmVlOKOUmMnHvelhuVKY1uARAf/5lPTnWNjlCq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `category_question`
--
ALTER TABLE `category_question`
  ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_question`
--
ALTER TABLE `category_question`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
