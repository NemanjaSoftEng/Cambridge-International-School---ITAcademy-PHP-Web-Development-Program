-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 04, 2024 at 12:26 AM
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
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_datas`
--

DROP TABLE IF EXISTS `users_datas`;
CREATE TABLE IF NOT EXISTS `users_datas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `status` int NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_change` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_datas`
--

INSERT INTO `users_datas` (`id`, `first_name`, `last_name`, `email`, `password`, `birthday`, `status`, `time_create`, `time_change`) VALUES
(1, 'Marko', 'Marković', 'markomarkovic@gmail.com', '123456789', '2024-03-01', 3, '2024-03-04 00:14:58', NULL),
(2, 'Pavle', 'Pavlovic', 'pavlepavlovic@gmail.com', '987654321', '2024-03-02', 3, '2024-03-04 00:14:58', NULL),
(3, 'Petar', 'Petrovic', 'petarpetrovic@yahoo.com', 'abc123', '2024-03-03', 3, '2024-03-04 00:17:39', NULL),
(4, 'Janko', 'Jankovic', 'jankojankovic@yahoo.com', '123*abc', '2024-03-04', 3, '2024-03-04 00:17:39', NULL),
(5, 'Nenad', 'Nenadić', 'nenadnenadic@gmail.com', '123-aBc-456', '2024-03-31', 3, '2024-03-04 00:21:21', NULL),
(6, 'Filip', 'Filipović', 'filipfilipovic@yahoo.com', 'oprst-333-aMn', '2024-03-20', 3, '2024-03-04 00:21:21', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
