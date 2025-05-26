-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 09:46 AM
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
-- Database: `db_porto_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Salsabila Suci Gustiani', 'sabilmoon23@gmail.com', 'adea', '235', '2025-05-26 05:17:38', NULL),
(2, 'Salsabila Suci Gustiani', 'sabilmoon23@gmail.com', 'adea', '235', '2025-05-26 05:22:51', NULL),
(3, 'Salsabila Suci Gustiani', 'sabilmoon23@gmail.com', 'adea', '235', '2025-05-26 05:24:10', NULL),
(4, 'Salsabila Suci Gustiani', 'sabilmoon23@gmail.com', 'adea', '235', '2025-05-26 05:26:12', NULL),
(5, 'Salsabila Suci Gustiani', 'sabilmoon23@gmail.com', 'adea', '235', '2025-05-26 05:42:04', NULL),
(6, 'Salsabila Suci Gustiani', 'sabilmoon23@gmail.com', 'adea', '235', '2025-05-26 05:46:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nm_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nm_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `nm_profile` varchar(100) DEFAULT NULL,
  `profession` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tipe` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `nm_profile`, `profession`, `email`, `phone`, `photo`, `description`, `status`, `tipe`, `created_at`, `update_at`) VALUES
(64, 'Salsabila Suci Gustiani', 'guru', 'sabilmoon23@gmail.com', '082114816010', '6834001dd083f_ERgpN8wWkAEKSOz.jpg', '<p>12345</p>', 1, '', '2025-05-26 05:46:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nm_service` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `nm_service`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Web Content', 'bikin website dengan konten sesuai kebutuhan', '2025-05-26 06:32:44', NULL),
(2, 'Debugging', 'Memeriksa serangga yang membuat fungsi sistem tidak berjalan dengan optimal.', '2025-05-26 06:32:44', NULL),
(3, 'Quality Automation', 'mengotomatiskan proses pengujian perangkat lunak untuk memastikan kualitas aplikasi atau sistem yang dikembangkan.', '2025-05-26 06:35:24', NULL),
(4, 'Product Manager Website', 'Merencanakan, mengembangkan, dan mengelola produk website, mulai dari konsep hingga peluncuran dan setelahnya. Bertanggung jawab atas strategi produk, kebutuhan pengguna, dan keberhasilan produk secara keseluruhan.', '2025-05-26 06:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Suci', 'admin@hotmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2025-05-21 01:37:22', '2025-05-23 00:53:26'),
(2, 2, 'Gustiani', 'admin23@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2025-05-21 07:30:45', '2025-05-23 00:53:35'),
(5, NULL, 'Hola', 'hola@mail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2025-05-21 07:37:42', NULL),
(7, NULL, 'Gusti', 'gustiani23@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2025-05-26 00:02:56', '2025-05-26 00:10:04'),
(8, NULL, 'DEF234', 'def234@ymail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2025-05-26 00:04:22', '2025-05-26 00:09:37'),
(9, NULL, 'test123', 'test123@mail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2025-05-26 00:07:29', NULL),
(10, NULL, 'test456', 'test456@mail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2025-05-26 00:07:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level_to_level_id` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_level_to_level_id` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
