-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 12:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fourtechbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `ftb_task_manager`
--

CREATE TABLE `ftb_task_manager` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('open','in_progress','cancel','complete') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ftb_task_manager`
--

INSERT INTO `ftb_task_manager` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'task 2', 'desc 2', 'in_progress', '2025-07-12 23:31:04', '0000-00-00 00:00:00'),
(6, 'task 1', 'desc 1', 'open', '2025-07-12 23:31:22', '0000-00-00 00:00:00'),
(7, 'task 3', 'desc 3', 'cancel', '2025-07-12 23:32:27', '2025-07-13 00:56:14'),
(8, 'pak task', 'pak desc', 'open', '2025-07-12 23:52:12', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ftb_task_manager`
--
ALTER TABLE `ftb_task_manager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ftb_task_manager`
--
ALTER TABLE `ftb_task_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
