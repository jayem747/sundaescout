-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 01:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `striped`
--
CREATE DATABASE IF NOT EXISTS `striped` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `striped`;

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalZip` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `phone`, `email`, `address`, `postalZip`, `country`) VALUES
(1, 'Eleanor Hardin', '1-636-277-5877', 'laoreet.ipsum.curabitur@protonmail.org', '7877 Venenatis Avenue', '4573', 'China'),
(2, 'Elvis Cohen', '(824) 228-1123', 'et@aol.ca', '5521 Amet, Avenue', '21683', 'India'),
(3, 'Jin Rodriguez', '(888) 227-9413', 'aliquam.auctor@icloud.ca', 'P.O. Box 805, 5057 Ac Road', '7524', 'Sweden'),
(4, 'Ifeoma Shaffer', '1-730-353-8036', 'nam@icloud.com', 'Ap #382-5546 Enim Avenue', '5392', 'Pakistan'),
(5, 'James Tyler', '1-272-415-0098', 'tempor.est.ac@hotmail.couk', 'Ap #726-2792 Nunc Rd.', '30872', 'Norway'),
(6, 'Gary O\'Neill', '1-664-249-4717', 'cursus.non@outlook.net', 'P.O. Box 451, 2897 Et St.', '4822', 'Chile'),
(7, 'Jael Daugherty', '(106) 725-0652', 'justo.proin.non@hotmail.org', '5456 Non Ave', '65Z 7Y6', 'Sweden'),
(8, 'Stuart Bell', '1-155-564-8177', 'cursus.diam.at@icloud.com', 'Ap #190-2210 Ut Rd.', '93792', 'Turkey'),
(9, 'Ishmael Frye', '(325) 564-7277', 'non.lobortis@yahoo.com', 'Ap #967-6093 Vitae Rd.', '07-713', 'Sweden'),
(10, 'Quyn Mcguire', '1-978-273-3213', 'phasellus.elit@outlook.ca', 'Ap #635-6589 Eu, Avenue', '4746 XG', 'France'),
(11, 'Dorothy Hamilton', '(893) 511-1764', 'odio.semper.cursus@google.edu', '514-2633 Dolor St.', '746049', 'Germany'),
(12, 'Daniel Carlson', '1-246-612-3027', 'montes.nascetur@outlook.ca', '7982 Ut Av.', '30238', 'Singapore'),
(13, 'Armand Monroe', '(238) 780-6545', 'ipsum.phasellus@google.com', '385-364 Ac Av.', '68380-4373', 'United States'),
(14, 'Peter Henson', '1-166-763-8724', 'nullam.enim@protonmail.org', '910-3148 Faucibus St.', '86134', 'Canada'),
(15, 'Maxwell Hall', '(765) 656-4373', 'varius@outlook.org', 'P.O. Box 935, 5705 Faucibus St.', '79-56', 'Chile'),
(16, 'Laith Bradford', '(713) 813-6259', 'fusce.feugiat@outlook.couk', 'Ap #460-1207 Lectus St.', '5484', 'Australia'),
(17, 'Xenos Manning', '1-569-642-5773', 'varius.et.euismod@icloud.com', '5760 Aliquam Ave', '51046', 'Italy'),
(18, 'Abraham Shaffer', '1-721-511-5578', 'at.iaculis@hotmail.com', '606-1381 Mus. Rd.', 'XO4 1JN', 'Pakistan'),
(19, 'Pearl Leonard', '1-236-502-8253', 'dictum@yahoo.com', 'Ap #164-7647 Rutrum Road', '47227', 'Ukraine'),
(20, 'Donovan Wilkinson', '1-774-509-5961', 'ornare.placerat.orci@yahoo.edu', '7843 Sit Avenue', '35-72', 'New Zealand');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
