-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2023 at 04:58 AM
-- Server version: 10.3.38-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sassolut_qgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_titile` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_titile`, `features`) VALUES
(1, 'create free account', '[{\"features\":\"max 5 users\"}]'),
(2, 'create premuim account', '[{\"features\":\"unlimited users\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `user_id`) VALUES
(69, 'Ayaan', 17),
(76, 'AYAAN', 26),
(80, 'Akram', 15),
(83, 'XYZ', 15),
(84, 'ABC', 15),
(85, 'Cat 1', 31),
(86, 'Fridge', 31),
(87, 'Test', 22),
(91, 'Gfgf', 38),
(92, 'this pc', 41),
(93, 'text', 31),
(94, 'laraib', 42);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `email`, `contact`, `category_id`, `address`, `added_by`, `status`, `created_at`) VALUES
(74, 'sasa xzxzzx', 'xzxzxz', 'ccccc', '[]', 'ssss', 15, 'active', '2022-10-03 14:59:21'),
(75, 'qwwetyuyt', 'xzxzxzsrdfsfsfasf', 'ccccc', '[\"50\"]', 'ssss', 15, 'suspended', '2022-10-03 15:23:23'),
(86, 'Hannan Khan', 'Ustaaaaadddd@gmail.com', '0987654321', '[\"68\",\"70\",\"71\",\"66\"]', 'A-47 , sector moen jo daro', 15, 'active', '2022-10-05 16:05:02'),
(87, 'Dinu James', 'Dinu@abc.com', '234567890321', '[\"86\"]', 'Qwertyuiopasdfghjkl', 31, 'active', '2022-10-14 14:42:57'),
(88, 'Test2 Scarfaceâ€™scf', 'Asff@abc.com', '4353454435454', '[\"85\"]', 'Dfdsdfeffcdscdscdsvdv', 31, 'active', '2022-10-14 15:28:09'),
(89, 'Axdadad Dadcacadc', 'Aaa@abc.com', '2342342343', '[\"87\"]', 'Scascsacsacsa', 22, 'active', '2022-11-07 14:23:18'),
(90, 'Hfjg Yfhg', 'gsyuf@gmail.com', '03182354362', '[\"91\"]', 'Topall', 38, 'active', '2022-12-30 15:12:05'),
(91, 'Jjgf Tfdh', 'Fdvg', '98855', '[]', 'Gffhgff\n', 38, 'active', '2022-12-30 15:13:01'),
(92, 'Hgfjhf Jggh', 'Hfggt', '55855', '[]', 'Gfchg', 38, 'active', '2022-12-30 15:13:39'),
(93, 'Hgfjhf Jggh', 'Hfggt', '55855', '[]', 'Gfchg', 38, 'active', '2022-12-30 15:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `user_id`, `vendor_id`, `category_id`) VALUES
(19, 74, 15, 70);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `title`, `description`) VALUES
(1, 'Terms and Conditions', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL COMMENT '0 for admin 1 for user 2 for vendor',
  `first_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `notification_token` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `phone`, `email`, `address`, `password`, `notification_token`, `Status`, `created_at`) VALUES
(1, 0, 'sodais', '03112222220', 'sodais@gmail.com', 'karachi', 'admin', 'yes', 'active', '2022-09-20 12:49:03'),
(2, 1, 'sumair', '03333333', 'suamdddri@gmail.com', 'karachi', 'ddsd', NULL, 'active', '2022-09-20 12:49:46'),
(3, 1, 'samad ', '1111111111', 'samad@gmail.com', 'lahore', 'asddsd', 'yes', 'active', '2022-09-20 13:23:44'),
(4, 1, 'saleem', '0000000000', 'saleem@gmail.com', 'karachi', 'qwqwq', 'yes', 'active', '2022-09-20 13:25:07'),
(5, 1, 'sumair ', '03333333', 'ayan@gmail.com', 'karachi', '11111111', 'yes', 'active', '2022-09-20 14:05:57'),
(6, 1, 'hannan ', '03333333', 'hannan@gmail.com', 'karachi', '11111111', '', 'active', '2022-09-20 14:11:26'),
(7, 1, 'hannan ', '03333333', 'hannan@gmail.pk', 'karachi', '11111111', 'yes', 'active', '2022-09-20 14:45:36'),
(8, 1, 'karachi', '03333333', 'qwety', 'karachi', '11111111', '', 'suspended', '2022-09-20 14:45:45'),
(9, 1, 'ayan ', '032323232333', 'ayan@gmail.pk', 'karachi', '11111111', 'avbcddas', 'active', '2022-09-20 14:52:50'),
(10, 1, 'Moiz', '1231231231', 'moiz@abc.com', 'karachi', '11111111', '', 'suspended', '2022-09-26 09:59:12'),
(11, 1, 'atif', '99999', 'sASASAsuamdddri@gmail.com', NULL, 'ddsdatif123123', 'YES', 'active', '2022-09-26 14:09:20'),
(12, 1, 'hannan', '222222222222', 'khan@gmail.com', NULL, '11111111', '', 'active', '2022-09-26 14:10:54'),
(13, 1, 'hannan', '1111111111', 'khan1@gmail.com', NULL, '22222222', '', 'active', '2022-09-27 09:36:21'),
(14, 1, 'hello', '12345678900', 'ayanking@gmail.com', NULL, '33333333', '', 'active', '2022-09-27 10:00:03'),
(15, 1, 'hannan', '08888888888', 'salim@gmail.com', NULL, '11111111', '', 'active', '2022-09-28 11:56:13'),
(16, 1, 'killer', '12345678910', 'shapatar@gmail.com', NULL, '11111111', '', 'active', '2022-09-28 16:17:22'),
(17, 1, 'sumair', '03333333', 'suamdddri@gmail.pk', NULL, 'ddsd', 'yes', 'active', '2022-09-28 16:27:47'),
(18, 1, 'hamza', '555555555555', 'salimbhai@gmail.com', NULL, '11111111', '', 'active', '2022-09-28 16:38:55'),
(19, 1, 'sumair', '03333333', 'sallleeem@gmail.com', NULL, '11111111', 'yes', 'active', '2022-09-29 09:11:10'),
(20, 1, 'jaskh', '03333333', 'sdjkghs@gmail.com', NULL, 'dsfsdfs', 'yes', 'active', '2022-10-05 13:22:00'),
(21, 1, 'sumair', '03333333', 'hammzakbarebare@gmail.com', NULL, 'ddsd', 'yes', 'active', '2022-10-05 13:22:06'),
(22, 1, 'moeez', '1111111111', 'john@gmail.com', NULL, '11111111', '', 'active', '2022-10-05 13:23:26'),
(23, 1, 'a rha hn', '03333333', 'arhahon@gmail.com', NULL, 'hamzaah', 'yes', 'active', '2022-10-05 13:24:52'),
(24, 1, 'hello', '2222222222', 'hello@gmail.com', NULL, '22222222', '', 'active', '2022-10-05 13:36:58'),
(25, 1, 'hello', '2222222222', 'hello@gmail.pk', NULL, '22222222', '', 'active', '2022-10-05 13:40:37'),
(26, 1, 'hannan', '12345678910', 'ustaad@gmail.com', NULL, '11111111', '', 'active', '2022-10-05 13:43:47'),
(27, 0, 'Sodais', '0312225884', 'sodais@gmail.com', 'karachi', 'admin', 'yes', 'active', '2022-10-06 08:06:08'),
(28, 0, 'sodais', '0311122258', 'sodais@gmail.com', 'karachi', 'admin', 'yes', 'active', '2022-10-06 08:08:37'),
(29, 1, 'ljgh', '031561651', 'dasdas@gmail.com', 'fsdfsdfwerwerwedf', 'fefds654', 'yes', 'active', '2022-10-06 12:25:20'),
(30, 1, 'fdsfdsvfsdf', '343534543545', 'dfdfdfdf', NULL, 'dfdsfdsfdf', 'dsfdsfdsfdsfdfd', 'active', '2022-10-14 13:27:30'),
(31, 1, 'Jeff Bezos', '03162691308', 'Jeff321@gmail.com', NULL, 'qwerty123', '', 'active', '2022-10-14 13:27:48'),
(32, 1, 'Hannan', '1234567890', 'developer@gmail.com', NULL, '11111111', '', 'active', '2022-10-15 10:36:08'),
(33, 1, 'Ayaan', '0987654321', 'ayaan@hotmail.com', NULL, '11111111', '', 'active', '2022-10-15 11:00:56'),
(34, 1, 'QQQ', '344324343343', 'Cdfdfdsf@aaa.xxx', NULL, '11111111', '', 'active', '2022-11-23 14:29:49'),
(35, 1, 'Dsvsdvdsvdsv', '3423432434', 'Qqq@aaa.com', NULL, '11111111', '', 'active', '2022-11-23 14:35:52'),
(36, 1, 'Farzam', '094646464646', 'Gsgsgdhd@gmail.com', NULL, '12345678', '', 'active', '2022-12-30 13:56:12'),
(37, 1, 'Farzam', '03182354362', 'frzamn64ml@gmail.com', NULL, '123456789', '', 'active', '2022-12-30 14:09:20'),
(38, 1, 'Ffggf', '03182354362', 'fafsfw@gmail.com', NULL, '1234567890', '', 'active', '2022-12-30 15:05:01'),
(39, 1, 'Farzam', '03152685483', 'Frbc@gmail.com', NULL, '123456987', '', 'active', '2022-12-30 16:18:00'),
(40, 1, 'farzamnoor', '03123456789', 'faer@asdfg.com', NULL, '123456789', '', 'active', '2022-12-31 08:34:06'),
(41, 1, 'Moiz', '0312365498', 'far@gmail.com', NULL, '123654987', '', 'active', '2022-12-31 12:23:22'),
(42, 1, 'moiz ullah', '0312365487', 'noemail@gmail.com', NULL, '123456789', '', 'active', '2023-01-02 12:20:10'),
(43, 1, 'laraib', '0312456987', 'laraib@gmail.com', NULL, '123456789', '', 'active', '2023-01-04 12:35:10'),
(44, 1, 'test', '444444', 'test@gmail.com', NULL, '4444', '', 'active', '2023-01-07 08:26:24'),
(45, 1, 'Laraib', '0311585585', 'Hhhy@gmail.com', NULL, '11111111', '', 'active', '2023-01-07 08:27:55'),
(46, 1, 'undefined', 'undefined', 'undefined', NULL, 'undefined', '', 'active', '2023-01-07 13:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_logs`
--

CREATE TABLE `vendor_logs` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `subscription_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_logs`
--
ALTER TABLE `vendor_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `vendor_logs`
--
ALTER TABLE `vendor_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
