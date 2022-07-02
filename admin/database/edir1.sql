-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 01:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(33) DEFAULT NULL,
  `last_name` varchar(33) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `password`, `date`, `is_active`) VALUES
(1, 'ሸዋፈራ', 'መንገሻ', '0911223344', 'mengesha@gmail.com', '21cb4e4be93c09542ffa73b2b5cb95ea', '2022-07-01', 1),
(3, 'Tito', 'sdfg', '0911223345', 'tito@gmal.com', 'c9511874a51c121c4171760c3930ca7e', '2022-07-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(33) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `code`, `description`, `unit_price`, `quantity`, `date_added`, `last_updated`, `status`) VALUES
(1, 'Car', 'car112', 'This is car assetsqwert', 1000, 16, '2022-07-10', '2022-07-19', 1),
(2, 'Darryl Blanchard', 'Voluptatem in expedi', 'Tempora proident mi', 145, 642, '1996-01-15', '2009-10-15', 1),
(5, 'Dinkuan', 'din1122', 'qwertyui', 100, 7, '2022-07-02', '2022-08-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `fill_name` int(33) NOT NULL,
  `phone_number` int(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `vote_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(33) DEFAULT NULL,
  `middle_name` varchar(33) DEFAULT NULL,
  `last_name` varchar(33) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `spouse_first_name` varchar(33) DEFAULT NULL,
  `spouse_middle_name` varchar(33) DEFAULT NULL,
  `spouse_last_name` varchar(33) DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(12) NOT NULL,
  `number_of_children` varchar(33) DEFAULT NULL,
  `emergency_contact` varchar(11) DEFAULT NULL,
  `data_joined` date NOT NULL DEFAULT current_timestamp(),
  `dod` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `middle_name`, `last_name`, `dob`, `spouse_first_name`, `spouse_middle_name`, `spouse_last_name`, `spouse_dob`, `address`, `phone_number`, `number_of_children`, `emergency_contact`, `data_joined`, `dod`, `is_active`, `password`, `photo`) VALUES
(5, 'Colt', 'Kelly Murray', 'Hamilton', '1970-10-23', 'Whoopi', 'Colette Parks', 'Fields', '1988-08-27', '01-Mar-2000', '0911223388', '9', 'Ab eum quae', '2022-07-02', NULL, 1, '3191fb1243ab0e956ecc746aaeb1126e', '0911223388.png'),
(6, 'Dana', 'Melissa Barton', 'Cohen', '2003-03-14', 'Amber', 'Boris Fuentes', 'Arnold', '2004-03-18', '04-Jan-2000', '1234567899', '7', '0987654566', '2022-07-02', NULL, 1, '21cb4e4be93c09542ffa73b2b5cb95ea', '1234567899.png'),
(7, 'Redu', 'Rashad James', 'Banks', '1999-02-24', 'Marvin', 'Ayanna Walsh', 'Bartlett', '1979-05-25', '29-Nov-1996', '395', '137', 'Fugiat prae', '2022-07-02', NULL, 1, '86aabc5fae80fc8ef98ac41c122a47a0', '395.png'),
(8, 'Flynn', 'Adele Summers', 'Whitney', '2017-07-15', 'Ainsley', 'Marsden Deleon', 'Cooke', '2019-09-03', '15-Jul-1992', '7888987888', '5', '09334456423', '2022-07-02', NULL, 1, '032f7f5f290b0b3825da294f45f51b20', '7888987888.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name_of_role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name_of_role`, `status`) VALUES
(2, 'Mariko Luna', 1),
(4, 'Accountant', 1),
(5, 'Accountant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE `system_setting` (
  `id` int(11) NOT NULL,
  `system_name` varchar(33) DEFAULT NULL,
  `mail_protocol` varchar(11) DEFAULT NULL,
  `mail_encryption` varchar(11) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(11) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `mail_reply_to` varchar(255) DEFAULT NULL,
  `vote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`id`, `system_name`, `mail_protocol`, `mail_encryption`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `mail_reply_to`, `vote`) VALUES
(1, 'እድር ማስተዳድሪያ ስርዐት', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_code` varchar(33) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `customer_full_name` varchar(33) DEFAULT NULL,
  `customer_phone_number` int(12) DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `cancelled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `voter_id` int(11) NOT NULL,
  `full_name` varchar(33) DEFAULT NULL,
  `phone_number` int(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hasvoted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `voter_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
