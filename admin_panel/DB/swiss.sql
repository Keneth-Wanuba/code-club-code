-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 02:51 PM
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
-- Database: `swiss`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(150) NOT NULL,
  `location` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`school_id`, `school_name`, `location`) VALUES
(1, 'WICS', 'Ntinda'),
(2, 'Mbogo High', ' Tula near Ebenezer'),
(6, 'Kampala parents school', 'Naguru lower, near kamwokya'),
(7, 'Victorious education centre', 'Bakuli'),
(11, 'MACOS', 'Makerere\r\n'),
(13, 'Twinbrook Schools', ' Gayaza'),
(14, 'Hillside Naalya', ' Naalya near the by-pass round');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `assessment_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `scratch_project` varchar(2000) NOT NULL,
  `quiz_score` int(150) NOT NULL,
  `project_score` int(10) NOT NULL,
  `attendence` int(255) NOT NULL,
  `creativity` int(50) NOT NULL,
  `retention` int(11) NOT NULL,
  `applicability` int(11) NOT NULL DEFAULT 0,
  `concentration` int(11) NOT NULL,
  `Interest` int(11) NOT NULL,
  `Speed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`assessment_id`, `student_id`, `scratch_project`, `quiz_score`, `project_score`, `attendence`, `creativity`, `retention`, `applicability`, `concentration`, `Interest`, `Speed`) VALUES
(0, 'CC013bianca', 'https://scratch.mit.edu/projects/921801419', 60, 75, 88, 80, 70, 68, 75, 100, 88),
(1, 'CC001claver', 'https://scratch.mit.edu/projects/929326606', 60, 78, 88, 60, 80, 75, 85, 100, 50),
(2, 'CC002elcaris', 'https://scratch.mit.edu/projects/929328477', 60, 75, 88, 90, 78, 78, 80, 100, 80),
(3, 'CC003chloe', 'https://scratch.mit.edu/projects/918019429', 50, 74, 88, 85, 90, 80, 80, 100, 80),
(4, 'CC004ariel', 'https://scratch.mit.edu/projects/921801419', 90, 65, 75, 80, 95, 85, 60, 100, 80),
(5, 'CC005mendel', 'https://scratch.mit.edu/projects/929319447', 50, 72, 100, 80, 90, 80, 60, 100, 80),
(6, 'CC006brayden', 'https://scratch.mit.edu/projects/929326916', 60, 70, 100, 65, 70, 70, 76, 100, 70),
(7, 'CC007adams', 'https://scratch.mit.edu/projects/921801419', 50, 65, 100, 50, 70, 60, 80, 100, 60),
(8, 'CC008phillip', 'https://scratch.mit.edu/projects/910445853', 50, 65, 75, 50, 60, 60, 50, 100, 70),
(9, 'CC009gabriella', 'https://scratch.mit.edu/projects/929342897', 90, 80, 75, 85, 90, 88, 98, 100, 60),
(10, 'CC010raya', 'https://scratch.mit.edu/projects/918017211', 70, 78, 75, 76, 75, 70, 84, 100, 75),
(11, 'CC011lyza', 'https://scratch.mit.edu/projects/920429968', 90, 80, 88, 80, 80, 75, 80, 100, 75),
(14, 'CC014emma', 'https://scratch.mit.edu/projects/924334212', 50, 70, 100, 70, 60, 75, 80, 100, 80),
(15, 'CC015hank', 'https://scratch.mit.edu/projects/924319550', 50, 70, 100, 65, 75, 74, 60, 100, 80),
(16, 'CC016hansel', 'https://scratch.mit.edu/projects/928051341', 85, 70, 63, 90, 40, 70, 72, 100, 80),
(17, 'CC012hayil', '', 85, 0, 88, 95, 90, 80, 100, 100, 100),
(18, 'CC017isabel', '', 50, 0, 50, 50, 40, 65, 90, 75, 90),
(19, 'CC018jasmine', 'https://scratch.mit.edu/projects/927569899', 65, 98, 100, 95, 90, 90, 95, 100, 100),
(20, 'CC019joseph', '', 65, 0, 88, 70, 70, 68, 50, 100, 80),
(21, 'CC020levi', '', 65, 0, 88, 95, 85, 90, 95, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `student_desc` text NOT NULL,
  `school_id` int(11) NOT NULL,
  `std_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`student_id`, `student_name`, `student_desc`, `school_id`, `std_level`) VALUES
('CC001claver', 'Claver Kayonde', 'Username: Claver_256\r\nPassword: Claver@Code', 1, 1),
('CC002elcaris', 'Eclaris Baraka Olet', 'Username: ELCARIS_OLET\r\nPasssword: Olet@code', 1, 1),
('CC003chloe', 'Chloe Heavenz  Atukula', 'Username: Chloe_256\r\nPassword: Chloe@Code', 1, 1),
('CC004ariel', 'Ariel  Doron  Ewalu  ', 'Username: Ariel_256\r\nPassword: Ariel@Code', 1, 1),
('CC005mendel', 'Mendel Nigel Ijuka Jessei Junior', 'Username: Mendel_256\r\nPassword: Mendel@Code', 1, 1),
('CC006brayden', 'Brayden  Adoa', 'Username: Brayden_256\r\nPassword: Brayden@Code', 1, 1),
('CC007adams', 'Adams James Kbenge', 'Username: adamsjames\r\nPassword: Adams@code', 1, 1),
('CC008phillip', ' Phillip  Malaagla', 'Username: Phillip_256\r\nPassword: Phillip@Code', 1, 1),
('CC009gabriella', 'Gabriella ', 'Username: Gabriella_Neema\r\nPassword: Neema@code', 1, 1),
('CC010raya', 'Alitza Raya Esaete Odomel', 'Username: Raya_256\r\nPassword: Raya@Code', 1, 1),
('CC011lyza', 'Lyza', 'Username: Lyza_256\r\nPassword: Lyza@Code', 1, 1),
('CC012hayil', 'Hayil Rukundo Rwotlonyo', 'Username:\r\nPassword:', 1, 2),
('CC013bianca', 'Bianca Mulondo', 'Username: Biancamulondo \r\nPassword: Bianca89', 1, 2),
('CC014emma', 'Emmanuel Promise Ogenrwot\r\n\r\n', 'Username: Emmanuel_256\r\nPassword: Emma@Code', 1, 2),
('CC015hank', 'Hank Manzi Rwotlonyo', 'Username: HMR201203\r\nPassword: 246ABC', 1, 2),
('CC016hansel', 'Hansel Elijah ', 'Username: Hansel_256\r\nPassword: Hansel@Code', 1, 2),
('CC017isabel', 'Isabel Nambale    ', 'Username:\r\nPassword:', 1, 2),
('CC018jasmine', 'Jasmine Kemigisa', 'Username: CandyJemma\r\nPassword: JKM1711', 1, 2),
('CC019joseph', 'Joseph Tendo Muluya', '', 1, 2),
('CC020levi', 'Levi Mbaaro', 'Username:\r\nPassword:', 1, 2),
('CC021lucas', 'Lucas Clement Luyuyo', 'Username:\r\nPassword:', 1, 2),
('CC022gary', 'Gary', 'Username: Gary_256\r\nPassword: Gary@code', 1, 2),
('CC023eleanor', 'Eleanor', 'Username: Eleanor_256\r\nPassword: Eleanor@Code', 1, 1),
('CC024keron', 'Keron Wakari Waboma', 'Username: Keron_Wakari_Waboma\r\nPassword: Keron@code', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact_no`, `registered_at`, `isAdmin`, `user_address`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$j9OXXIYS0CG5AYuks62YMeDvuIpo2hZEN4CqfJfujt1yPMnoUq5C6', '9810283472', '2022-04-10', 1, 'newroad'),
(2, 'Test ', 'Firstuser', 'test@gmail.com', '$2y$10$DJOdhZy1InHTKQO6whfyJexVTZCDTlmIYGCXQiPTv7l82AdC9bWHO', '980098322', '2022-04-10', 0, 'matepani-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `user_id` (`student_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `category_id` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `product` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
