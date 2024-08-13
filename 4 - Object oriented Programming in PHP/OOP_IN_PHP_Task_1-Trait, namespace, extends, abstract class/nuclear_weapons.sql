-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 05, 2024 at 01:01 AM
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
-- Database: `nuclear_weapons`
--

-- --------------------------------------------------------

--
-- Table structure for table `nuclear_missiles`
--

DROP TABLE IF EXISTS `nuclear_missiles`;
CREATE TABLE IF NOT EXISTS `nuclear_missiles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(150) NOT NULL,
  `mass` double NOT NULL,
  `length` double NOT NULL,
  `diameter` double NOT NULL,
  `blast_yield` varchar(10) NOT NULL,
  `operational_range` varchar(100) NOT NULL,
  `in_service` varchar(100) NOT NULL,
  `used_by` varchar(150) NOT NULL,
  `designer` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `commander_in_chief` varchar(150) NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_change` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nuclear_missiles`
--

INSERT INTO `nuclear_missiles` (`id`, `name`, `type`, `mass`, `length`, `diameter`, `blast_yield`, `operational_range`, `in_service`, `used_by`, `designer`, `country`, `commander_in_chief`, `comment`, `time_create`, `time_change`, `deleted`) VALUES
(1, 'RS-28 Sarmat', 'Superheavy Intercontinental ballistic missile(ICBM)', 208.1, 35.5, 3, '~50 Mt', '~18,000 kilometres (11,000 mi)', '2023.', 'Strategic Rocket Forces', 'Makeyev Rocket Design Bureau', 'Russian Federation', 'Vladimir Vladimirovich Putin', 'It\'s the most powerful nuclear weapon in the world. One RS-28 Sarmat can destroy an area the size of France and Vojvodina and some more. It takes 106s, 200s and 202s during fly by speed of 20.7Ma(25000km/h) from Kaliningrad to Berlin, Paris and London, respective. It is named Satan 2 by NATO(media).', '2024-03-04 17:04:25', '0000-00-00 00:00:00', 0),
(2, 'R-36M2 Voevoda', 'Intercontinental ballistic missile(ICBM)', 209.6, 32.2, 3.05, '20Mt', '10.200–16.000 km', '1966–1979 (original variant R-36)\r\n1988–present (R-36M2 Voevoda variant)', 'Strategic Rocket Forces', 'Pivdenne Design Office', 'Russian Federation', 'Vladimir Vladimirovich Putin', 'It\'s predecessor of the RS-28 Sarmat. It\'s named Satan by NATO(media). Voevoda has nuclear warehead of MIRV(Multiple independently targetable reentry vehicle) type like RS-28 Sarmat, but it can takes maximum 10 MIRVs(for difference RS-28 Sarmat can take 15 MIRVs or 24 avangards(27Ma) or combination)', '2024-03-04 17:04:25', '0000-00-00 00:00:00', 0),
(3, 'RS-26 Rubezh', 'Intercontinental ballistic missile(ICBM)', 3.6, 12, 1.8, '1.2Mt', '5800 km', '2011-present', 'Strategic Rocket Forces', 'Moscow Institute of Thermal Technology', 'Russian Federation', 'Vladimir Vladimirovich Putin', 'Maximum speed is over Mach 20 (24,500 km/h; 15,200 mph; 6.81 km/s). It has nuclear warehead MIRV(Multiple independently targetable reentry vehicle) type. Warehead is constructed to take 4 MIRVs each 150/300 Kt. Each MIRV has its own guidance system. It is smaller than RS-28 but it is very dangerous.', '2024-03-04 17:46:29', '2024-03-05 01:00:52', 0),
(4, 'MGM-31 Pershing', 'Short-range ballistic missile(SRBM)', 4.661, 10.5, 1, '12Kt', '740km', '1962–1969', 'United States Army', 'The Martin Company', 'United States of America', 'Joseph Robinette Biden', 'USA paradigma is turned to development of gravity bombs more than missles. However, russians have big better nuclear technology. I tell you that Sarmat can\'t be recognized by satellite. It means that Putin can destroy USA whenever he want, and they can\'t answer, because they won\'t know for strike.', '2024-03-04 17:46:29', '0000-00-00 00:00:00', 0),
(5, 'LGM-30 Minuteman III', 'Intercontinental ballistic missile(ICBM)', 29, 18.3, 1.68, '1.425Mt', '14000km', '1970–present', 'United States Air Force', 'Boeing', 'United States of America', 'Joseph Robinette Biden', 'Maximum speed is 23Ma. The Mach number  is a dimensionless quantity in fluid dynamics representing the ratio of flow velocity past a boundary to the local speed of sound(M=V/c; v-the local flow velocity with respect to the boundaries, c-speed of sound in the medium). This is very dangerous(1.425Mt).', '2024-03-04 18:03:36', '0000-00-00 00:00:00', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
