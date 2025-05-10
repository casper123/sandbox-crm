-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2019 at 11:40 AM
-- Server version: 5.7.9
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandbox_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `category_type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `category_type`) VALUES
(1, 'Cash', NULL, 1),
(2, 'Maintnence', NULL, 1),
(3, 'Marketing', NULL, 1),
(4, 'Grocery', NULL, 1),
(5, 'Electricity', NULL, 1),
(6, 'Salary', NULL, 1),
(7, 'Fix My Phone', NULL, 1),
(8, 'Internet', NULL, 1),
(9, 'Misc', NULL, 1),
(10, 'Open Space', NULL, 2),
(11, 'Private Studio', NULL, 2),
(12, 'Meeting Room', NULL, 2),
(13, 'Tuc Shop', NULL, 2),
(14, 'Event', NULL, 2),
(15, 'Other', NULL, 2),
(16, 'Fix My Phone', NULL, 2),
(17, 'Tuc Shop', NULL, 1),
(18, 'Upgrades', NULL, 1),
(19, 'Virtual Office', 'Virtual Office package\r\n\r\nBusiness address\r\nLocal landline number\r\nAccess to board room\r\n5 hours a month co-working space usage', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `cnic` varchar(50) DEFAULT NULL,
  `address` text,
  `contact_no` varchar(50) DEFAULT NULL,
  `emergency_contact` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `cnic_front` varchar(250) DEFAULT NULL,
  `cnic_back` varchar(250) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `description` text,
  `status` enum('Active','Deactive') DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text,
  `amount` float DEFAULT NULL,
  `expense_date` date DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `gi_expenseId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(10) DEFAULT NULL,
  `team_id` int(11) NOT NULL DEFAULT '0',
  `gi_invoiceId` varchar(20) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_amount` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_room_booking`
--

CREATE TABLE `meeting_room_booking` (
  `id` int(11) UNSIGNED NOT NULL,
  `membership_type_id` int(11) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `client_contact` varchar(50) DEFAULT NULL,
  `client_address` text,
  `meeting_time_start` datetime DEFAULT NULL,
  `total_members` int(11) DEFAULT NULL,
  `meeting_purpose` varchar(300) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `membership_type`
--

CREATE TABLE `membership_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `description` text,
  `type` enum('sandbox_membership','meeting_membership') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_type`
--

INSERT INTO `membership_type` (`id`, `name`, `price`, `description`, `type`) VALUES
(1, 'Resident - Lite ', '5999', '20 hours in a week usage\r\nFree Meeting Room Facility\r\nBasic Features\r\nFree Printer / Scanner Usage', ''),
(2, 'Resident - Full ', '7999', '24 / 7 Access\r\nFree Meeting Room Facility\r\nBasic Features\r\nFree Printer / Scanner Usage', ''),
(3, 'Night Owl ', '3999', '6pm - Midnight 5 Days a week\r\nFree Meeting Room Facility\r\nBasic Features', ''),
(4, 'Full Day', '599', '12 Hours Access\r\nBasic Features\r\nFree Printer / Scanner Usage', ''),
(5, 'Weekly', '3999', '24 / 7 Access\r\nFree Meeting Room Facility\r\nBasic Features\r\nFree Printer / Scanner Usage', ''),
(6, 'Virtual Office', '2999', 'Prestigious Business Address\r\nLocal Landline Number\r\nMail and Parcel Management\r\nAccess To Meeting Room', ''),
(7, 'Private Studio', '39999', 'Personalized Room with Key Lock\r\nAir Conditioned\r\nCabinets\r\nErgonomic Furniture\r\nSecurity Camera\r\nConference Room Facility\r\nPrestigious Business Address\r\nLocal Landline Number\r\nMail and Parcel Management\r\nBasic Features', ''),
(12, 'Meeting Room', '4999', 'Air Conditioned\r\nMultimedia*\r\nErgonomic Furniture\r\nSecurity Camera\r\nReception Facility\r\nBasic Features', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `team_id` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gi_invoiceId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `full_name` varchar(50) NOT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `contact_number` varchar(30) NOT NULL,
  `location` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `problem` text NOT NULL,
  `comment` text,
  `promo_code` varchar(10) DEFAULT NULL,
  `how_hear` varchar(50) NOT NULL,
  `follow_up_one` text,
  `follow_up_two` text,
  `request_status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) UNSIGNED NOT NULL,
  `team_name` varchar(150) DEFAULT NULL,
  `bussiness` varchar(100) DEFAULT NULL,
  `team_owner` varchar(50) DEFAULT NULL,
  `owner_cnic` varchar(50) DEFAULT NULL,
  `owner_email` varchar(80) DEFAULT NULL,
  `owner_contact` varchar(50) DEFAULT NULL,
  `skype_id` varchar(50) DEFAULT NULL,
  `membership_type_id` int(11) DEFAULT NULL,
  `security_deposite` varchar(10) DEFAULT NULL,
  `memebership_start_date` date DEFAULT NULL,
  `membership_amount` float DEFAULT NULL,
  `is_locker_avail` tinyint(4) DEFAULT NULL,
  `ntn_front` varchar(250) DEFAULT NULL,
  `ntn_back` varchar(250) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT '1',
  `team_logo` varchar(350) DEFAULT NULL,
  `owner_cnic_front` varchar(350) DEFAULT NULL,
  `owner_cnic_back` varchar(350) DEFAULT NULL,
  `form_page_1` varchar(350) DEFAULT NULL,
  `form_page_2` varchar(350) DEFAULT NULL,
  `parking_avail` tinyint(4) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `total_members` varchar(10) NOT NULL DEFAULT '1',
  `gi_contactId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) UNSIGNED NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cnic_no` varchar(50) DEFAULT NULL,
  `cnic_front` varchar(250) DEFAULT NULL,
  `cnic_back` varchar(250) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text,
  `member_image` varchar(350) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(55) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `create_date`) VALUES
(1, 'sandbox_admin', '2b9714f5970569af4d89856f41837fb3', '2019-02-19 22:36:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `meeting_room_booking`
--
ALTER TABLE `meeting_room_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_type`
--
ALTER TABLE `membership_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meeting_room_booking`
--
ALTER TABLE `meeting_room_booking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership_type`
--
ALTER TABLE `membership_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
