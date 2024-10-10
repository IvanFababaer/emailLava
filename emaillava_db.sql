-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2024 at 02:19 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emaillava_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `fullname`, `status`) VALUES
(0, 'ivanfababaer018@gmail.com', '$2y$10$g2RYVhWznClPHiOplPvee.13oF0qOoMX0t4mJyxZAvcYR4/5gp8w.', 'user', NULL, 'verified'),
(0, 'juluiscastillo17@gmail.com', '$2y$10$prASVKOY.XnvqZDQ.BVcwuiazbGGsTnZg5xmlr6u0lazxsuZPeGCC', 'user', NULL, 'unverified'),
(0, 'fesalboncloyd09@gmail.com', '$2y$10$of7wJgGufeeqqcJS5wNzEuTHqAoZE7Yh56/dh18Fg60.puMkzczFm', 'user', NULL, 'unverified'),
(0, 'aash100227@gmail.com', '$2y$10$qC46NaXy9bxGlrQJgFFoye84adZci1S4RNGxNfrBGJVcRaDNk69Ly', 'user', NULL, 'unverified'),
(0, 'ivanfababaer018@gmail.com', '$2y$10$XbzsH6hrnZlsl26jQDgXZ.UjDq/aE4u.IsgMsgjh/XTcT3EKQg4rO', 'user', NULL, 'unverified');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
