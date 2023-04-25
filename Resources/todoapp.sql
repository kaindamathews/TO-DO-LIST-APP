-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2023 at 07:06 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `category` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `body`, `category`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 'Tst', 'good', 'Personal', '2023-04-22', '11:24:00', 'Done', '2023-04-24 11:29:51', '2023-04-24 13:05:07'),
(4, 1, 'Cooking and Baking', 'Time sdddddddddddddddd', 'Personal', '2023-04-24', '17:20:00', 'Done', '2023-04-24 09:20:55', '2023-04-24 20:01:38'),
(5, 1, 'test', 'good', 'Personal', '2023-04-22', '11:24:00', 'Done', '2023-04-24 09:24:05', '2023-04-24 13:18:07'),
(8, 2, 'Cooking', 'Note that both function1() and function2() are declared as public, which means they can be accessed from outside the class as well as from within other methods of the class. If a method is declared a', 'Personal', '2023-04-29', '14:33:00', 'Pending', '2023-04-24 12:34:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'kainda', 'kaindamathews@gmail.com', '$2y$10$u3t2/m2vo9FaeMAhbANt1.24mUg4/sMkcknTSCrmbyPkk57KQpZGi', '2023-04-23 09:51:05'),
(2, 'MT Dealer', 'mathews@gmail.com', '$2y$10$8KakI8mO3N1ad0yXHubFTerhAsO5TjgTIR2H8xv5BqKvET49D49lm', '2023-04-24 12:33:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
