-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 01:14 PM
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
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'MCH', 'mch786');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `title`, `description`, `link`, `img`, `category`) VALUES
(10, 'Basic CV Generator', 'This project is very simple and beginner friendly. It get data from User and then Put it into a specific CV layout...', 'https://youtu.be/IQa_eUQ_1RM', 'images/mch1688198153cv.png', 'Project'),
(11, 'Real Time Chat App', 'Basic Chat App for Beginner , first user will login through his unique mobile number and enter the chat room and can be able to communication with other members', 'https://youtu.be/xf7OKi9zZzc', 'images/mch1688198283Real Time Chat App (3).png', 'Project'),
(12, 'HTML Full Course', 'You will complete this course in 4 days. This course contains 4 videos only.', 'https://www.youtube.com/playlist?list=PLm_d1HzZbDKVte7iw1eG7BvcAydkvWndb', 'images/mch1688199138html.png', 'Course'),
(13, 'CSS Full Course', 'This is a 20 days Course but you can complete it in 10 days because in this playlist one video is lecture and next is project then lecture then project...', 'https://www.youtube.com/playlist?list=PLm_d1HzZbDKWBV8nIGQyLCWxPdOpIVRtq', 'images/mch1688199287css.png', 'Course'),
(14, 'JavaScript Full Course', 'This is 40 days Course , it is for beginners in which i had completed all important front-end concepts of javascript in this course with projects...', 'https://www.youtube.com/playlist?list=PLm_d1HzZbDKX9TPRnUodPQyOArYx4wTzG', 'images/mch1688199461javascript.png', 'Course'),
(15, 'CSS in one video', 'This video is very helpful for you if you are looking a complete tutorial about CSS.', 'https://www.youtube.com/watch?v=WBhF2wWKXhs', 'images/mch1688200266css in one.png', 'Video'),
(16, 'Weather App in JS', 'In this project , we will use a Weather api which contains all cities weather in the world and we just fetch data hiddenly and show it on our App.', 'https://youtu.be/Nqnz9gd7lGI', 'images/mch1688208632Weather App.png', 'Project');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
