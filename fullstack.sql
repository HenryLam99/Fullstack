-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 05:11 PM
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
-- Database: `fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_new`
--

CREATE TABLE `post_new` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `image_post` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_new`
--

INSERT INTO `post_new` (`id`, `status`, `time`, `description`, `user_id`, `image_post`) VALUES
(4, 1, '2022-05-17', 'aothatday', 5, 'http://localhost/fullstack/image/post/1652775488.jpg'),
(6, 1, '2022-05-17', 'ao that day ', 5, 'http://localhost/fullstack/image/post/1652776805.jpg'),
(8, 3, '2022-05-17', 'dichoi', 7, 'http://localhost/fullstack/image/post/1652780443.jpg'),
(9, 1, '2022-05-17', 'anime', 8, 'http://localhost/fullstack/image/post/1652780921.jpg'),
(10, 1, '2022-05-17', '123', 4, 'http://localhost/fullstack/image/post/1652781360.jpg'),
(11, 2, '2022-05-17', 'tommy', 9, 'http://localhost/fullstack/image/post/1652781889.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 NOT NULL,
  `image_profile` varchar(250) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `image_profile`, `first_name`, `last_name`, `permission`) VALUES
(1, 'admin@admim.com', '$2y$10$1tPltWa8jSrD/63gYz7HweUXlcpf8GyE2YzZ9pjhJruc3RNHliMr.', '', 'aadsss', 'adminaad', 1),
(3, 'admin2@gmail.com', '$2y$10$V6HZfwaoCkI1QTfpEz9H5Of53b.Z9qGwVMoS0ozPuKyG1/jPxOVLW', ' ', 'admina987', 'a', 2),
(4, 'lyquocphuc@gmail.com', '$2y$10$2siFw1s7zDxAafTMr/BGHOHy9URCv17rXVJQ1c/qmDB7/c3mEbEta', 'http://localhost/fullstack/image/user/1652776546.jpg', 'abcd', 'edfh', 2),
(5, 'lqp@gmail.com', '$2y$10$PN2wavNTEV5s2Lg0q..rw.hzHcm5lyaGdTWUvMoFqCHNzLX37VN1K', 'http://localhost/fullstack/image/user/1652775368.jpg', 'p', 'l', 2),
(6, 'tommyshelby@gmail.com', '$2y$10$12EHZZIUUf1MCzaEh77pxeCv18Oj.wTUYKqd4lV.IxEqccqGS8Y1e', 'http://localhost/fullstack/image/user/1652779606.jpg', 'Tommy', 'Shelby', 2),
(7, 'khabanh@gmail.com', '$2y$10$Z8h6VV7GWU6TfLR7fi2LcOLjHyTRHV1G8VoJoFh/0.V0DPwJsq7Ea', 'http://localhost/fullstack/image/user/1652780356.jpg', 'kha', 'banh', 2),
(8, 'anime@gmail.com', '$2y$10$8RZkNRDJVtsy53QKTfOrmeaNSAWBzEHvXYuoZMI2qLDBRoaoTM8aa', 'http://localhost/fullstack/image/user/1652780835.jpg', 'ly', 'quoc phuc', 2),
(9, 'tommyshelby123@gmail.com', '$2y$10$YTRVxaQ3.rkopz4SuKbQGuM4uLO0D.6gupaYFbBVmeLcDFuEBYrpC', 'http://localhost/fullstack/image/user/1652781806.jpg', 'Tommy ', 'shelby123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_new`
--
ALTER TABLE `post_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_new`
--
ALTER TABLE `post_new`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
