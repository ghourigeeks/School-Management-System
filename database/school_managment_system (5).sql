-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 06:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `active`, `created_at`) VALUES
(19, '4th', 1, '2022-02-23 00:00:00'),
(25, '1st', 1, '2022-02-24 00:00:00'),
(33, '2nd', 1, '2022-02-25 00:00:00'),
(36, '3rd', 1, '2022-02-25 00:00:00'),
(75, '5th', 1, '2022-03-02 00:00:00'),
(76, '6th', 1, '2022-03-02 00:00:00'),
(77, '7th', 1, '2022-03-02 00:00:00'),
(78, '8th', 1, '2022-03-02 00:00:00'),
(79, '9th', 1, '2022-03-02 00:00:00'),
(80, '10th', 1, '2022-03-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'Teachers', 1, '2022-02-20 00:00:00'),
(2, 'Peon', 1, '2022-02-20 00:00:00'),
(3, 'Lab boy', 1, '2022-02-20 00:00:00'),
(4, 'Student', 1, '2022-02-20 00:00:00'),
(5, 'Head principle', 1, '2022-02-20 00:00:00'),
(9, 'Vice principle', 1, '2022-02-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'Male', 1, '2022-02-20 00:00:00'),
(2, 'Female', 1, '2022-02-20 00:00:00'),
(9, 'Other', 1, '2022-02-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lanuages`
--

CREATE TABLE `lanuages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lanuages`
--

INSERT INTO `lanuages` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'Urdu', 1, '2022-02-20 00:00:00'),
(2, 'Sindhi', 1, '2022-02-20 00:00:00'),
(3, 'English', 1, '2022-02-20 00:00:00'),
(4, 'Pashto', 1, '2022-02-20 00:00:00'),
(5, 'Punjabi', 1, '2022-02-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `marital_statuses`
--

CREATE TABLE `marital_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_statuses`
--

INSERT INTO `marital_statuses` (`id`, `name`, `active`, `created_at`) VALUES
(6, 'Single', 1, '2022-02-25 00:00:00'),
(8, 'Widow', 1, '2022-02-25 00:00:00'),
(9, 'Seprated', 1, '2022-02-25 00:00:00'),
(11, 'Married', 1, '2022-02-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `active`, `created_at`) VALUES
(12, 'Pakistan', 1, '2022-02-25 00:00:00'),
(14, 'USA', 1, '2022-02-25 00:00:00'),
(16, 'Malasyia', 1, '2022-02-25 00:00:00'),
(20, 'India', 1, '2022-03-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `active`, `created_at`) VALUES
(4, 'Bsc', 1, '2022-02-20 00:00:00'),
(6, 'Inter', 1, '2022-02-20 00:00:00'),
(7, 'Matric', 1, '2022-02-20 00:00:00'),
(13, 'Bcom', 1, '2022-02-25 00:00:00'),
(14, 'Mbbs', 1, '2022-02-25 00:00:00'),
(17, 'sss', 1, '2022-03-07 13:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'Muslim', 1, '2022-02-20 00:00:00'),
(2, 'Hindu', 1, '2022-02-20 00:00:00'),
(6, 'Christian', 1, '2022-02-25 00:00:00'),
(8, 'Sikh', 1, '2022-03-02 00:00:00'),
(9, 'xzx1', 1, '2022-03-07 13:10:40'),
(10, 'test', 1, '2022-03-09 23:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'Super admin', 1, '2022-02-24 00:00:00'),
(2, 'Admin', 1, '2022-03-02 00:00:00'),
(3, 'Data operator', 1, '2022-03-07 13:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `std_fees`
--

CREATE TABLE `std_fees` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1,
  `paid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `std_fees`
--

INSERT INTO `std_fees` (`id`, `std_id`, `fees`, `created_at`, `active`, `paid`) VALUES
(1, 19, 3000, '2022-02-09 00:00:00', 0, 1),
(2, 20, 8000, '2022-02-10 00:00:00', 1, 0),
(3, 19, 3000, '2022-02-25 00:00:00', 1, 1),
(5, 10, 2044, '2022-02-25 00:00:00', 1, 0),
(7, 22, 9000, '2022-02-25 00:00:00', 1, 1),
(8, 19, 3000, '2022-02-25 00:00:00', 1, 1),
(9, 21, 1000, '2022-02-28 00:00:00', 1, 1),
(10, 21, 1000, '2022-02-28 00:00:00', 1, 1),
(11, 21, 1000, '2022-03-02 00:00:00', 1, 0),
(12, 24, 1000, '2022-03-02 00:00:00', 1, 0),
(13, 25, 1000, '2022-03-02 00:00:00', 1, 1),
(14, 27, 1000, '2022-03-02 00:00:00', 1, 1),
(15, 27, 1000, '2022-03-02 00:00:00', 1, 1),
(16, 34, 1000, '2022-03-03 00:00:00', 1, 1),
(17, 44, 1000, '2022-03-05 18:52:23', 1, 1),
(18, 44, 1000, '2022-03-06 02:34:31', 1, 1),
(19, 44, 1000, '2022-03-08 22:21:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `religion_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `tel_no` varchar(11) NOT NULL,
  `marital_status_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `std_pic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `active`, `created_at`) VALUES
(1, 'English', 1, '2022-02-20 00:00:00'),
(2, 'Urdu', 1, '2022-02-20 00:00:00'),
(3, 'Math', 1, '2022-02-20 00:00:00'),
(4, 'Science', 1, '2022-02-20 00:00:00'),
(5, 'History', 1, '2022-02-20 00:00:00'),
(7, 'Islamiyat', 1, '2022-02-20 00:00:00'),
(8, 'Physics', 1, '2022-02-20 00:00:00'),
(10, 'Social studies', 1, '2022-02-20 00:00:00'),
(12, 'Biology', 1, '2022-02-20 00:00:00'),
(15, 'Chemistry', 1, '2022-02-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tchr_salary`
--

CREATE TABLE `tchr_salary` (
  `id` int(11) NOT NULL,
  `tchr_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1,
  `paid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tchr_salary`
--

INSERT INTO `tchr_salary` (`id`, `tchr_id`, `salary`, `created_at`, `active`, `paid`) VALUES
(5, 16, 6000, '2022-02-25 00:00:00', 1, 1),
(7, 9, 1000, '2022-02-25 00:00:00', 1, 1),
(8, 9, 1000, '2022-02-25 00:00:00', 1, 1),
(9, 13, 40000, '2022-02-27 00:00:00', 1, 0),
(10, 17, 90000, '2022-02-27 00:00:00', 1, 1),
(11, 16, 6000, '2022-03-02 00:00:00', 1, 1),
(12, 20, 40000, '2022-03-02 00:00:00', 1, 1),
(13, 23, 40000, '2022-03-02 00:00:00', 1, 1),
(14, 24, 40000, '2022-03-02 00:00:00', 1, 1),
(15, 25, 40000, '2022-03-02 00:00:00', 1, 1),
(16, 22, 40000, '2022-03-02 00:00:00', 1, 1),
(17, 26, 40000, '2022-03-02 00:00:00', 1, 1),
(18, 50, 40000, '2022-03-03 00:00:00', 1, 1),
(19, 51, 40000, '2022-03-03 00:00:00', 1, 1),
(20, 52, 40000, '2022-03-03 00:00:00', 1, 1),
(22, 55, 222, '2022-03-09 18:31:49', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `nationaility_id` int(11) DEFAULT NULL,
  `cnic` varchar(13) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `tel_no` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `marital_status_id` int(11) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `no_of_children` int(10) DEFAULT NULL,
  `lanuages_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `tchr_pic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_account`
--

CREATE TABLE `teacher_account` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_code` int(11) NOT NULL,
  `account_title` varchar(255) DEFAULT NULL,
  `account_no` varchar(17) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_account`
--

INSERT INTO `teacher_account` (`id`, `teacher_id`, `bank_name`, `branch_code`, `account_title`, `account_no`, `active`, `created_at`) VALUES
(19, 27, 'meezan', 2222, '1123', '1234567890234567', 1, '2022-03-02 00:00:00'),
(20, 30, '123123', 2222, 'hello', '2222222222222222', 1, '2022-03-02 00:00:00'),
(21, 31, '123123', 2333, 'asdsdasdas', '4234234234003333', 1, '2022-03-03 00:00:00'),
(22, 32, '123123', 3333, '33333', '2222000044222222', 1, '2022-03-03 00:00:00'),
(23, 33, 'asdasd', 2222, 'asdsdasd', '2634325222222222', 1, '2022-03-03 00:00:00'),
(35, 46, 'sadasdas', 2232, 'asdadas', '2423423423122212', 1, '2022-03-03 00:00:00'),
(45, 56, '123123123', 2222, '312312312', '1231231231231233', 1, '2022-03-07 23:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classes`
--

CREATE TABLE `teacher_classes` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `time_slot_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_education`
--

CREATE TABLE `teacher_education` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `grade_div` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_education`
--

INSERT INTO `teacher_education` (`id`, `teacher_id`, `qualification_id`, `institution`, `subject_id`, `grade_div`, `active`, `created_at`) VALUES
(209, 27, 6, 'Mehran', 15, 'A+', 1, '2022-03-02 00:00:00'),
(210, 30, 6, 'Mehran', 15, 'A+', 1, '2022-03-02 00:00:00'),
(211, 31, 4, 'Mehran', 15, 'A+', 1, '2022-03-03 00:00:00'),
(212, 32, 6, 'Mehran', 15, 'A+', 1, '2022-03-03 00:00:00'),
(213, 33, 6, 'Mehran', 12, '123123', 1, '2022-03-03 00:00:00'),
(225, 46, 4, '12312', 15, '12312', 1, '2022-03-03 00:00:00'),
(257, 56, 4, '123123', 1, 'A+', 1, '2022-03-07 23:02:49'),
(258, 56, 4, 'qwewe', 1, 'wqeqw', 1, '2022-03-07 23:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_experience`
--

CREATE TABLE `teacher_experience` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `experience_title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `salary_drawn` int(11) NOT NULL,
  `prev_job` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_experience`
--

INSERT INTO `teacher_experience` (`id`, `teacher_id`, `experience_title`, `year`, `salary_drawn`, `prev_job`, `active`, `created_at`) VALUES
(141, 27, 'asdasd', 4, 1, 'asdasdas', 1, '2022-03-02 00:00:00'),
(142, 30, '2', 2, 2, '2', 1, '2022-03-02 00:00:00'),
(143, 31, '123123', 123, 123, '123123', 1, '2022-03-03 00:00:00'),
(144, 32, 'Php developer', 3, 3, 'Geeks root', 1, '2022-03-03 00:00:00'),
(145, 33, '23', 22, 22, '123123', 1, '2022-03-03 00:00:00'),
(157, 46, '12312', 12312, 12312, '12312', 1, '2022-03-03 00:00:00'),
(189, 56, 'qweqwe', 123213123, 123123, 'qweqwe', 1, '2022-03-07 23:02:50'),
(190, 56, 'qweqwe', 123123, 3123123, 'qweqwe', 1, '2022-03-07 23:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `start_time`, `end_time`, `active`, `created_at`) VALUES
(5, '10:00', '11:00', 1, '2022-02-28 00:00:00'),
(6, '11:00', '00:00', 1, '2022-02-28 00:00:00'),
(7, '00:00', '01:00', 1, '2022-02-28 00:00:00'),
(8, '09:00', '10:00', 1, '2022-02-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_pic` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `temp_code` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `user_pic`, `role_id`, `temp_code`, `active`, `created_at`) VALUES
(134, 'kamran', 'shaikh', 'kamran', 'khan.basin@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'team-3.jpg', 2, '316112', 1, '2022-03-03 00:00:00'),
(159, 'Muhammad ', 'Ghouri', 'admin', 'basimghouri@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'beaconhouse-school.png', 3, '341623', 1, '2022-03-09 18:04:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lanuages`
--
ALTER TABLE `lanuages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_fees`
--
ALTER TABLE `std_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `religion_id` (`religion_id`),
  ADD KEY `marital_status_id` (`marital_status_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `nationality_id` (`nationality_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tchr_salary`
--
ALTER TABLE `tchr_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `lanuages_id` (`lanuages_id`),
  ADD KEY `nationaility_id` (`nationaility_id`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `marital_status_id` (`marital_status_id`);

--
-- Indexes for table `teacher_account`
--
ALTER TABLE `teacher_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_slot_id` (`time_slot_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_education`
--
ALTER TABLE `teacher_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qualification_id` (`qualification_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher_experience`
--
ALTER TABLE `teacher_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lanuages`
--
ALTER TABLE `lanuages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `std_fees`
--
ALTER TABLE `std_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tchr_salary`
--
ALTER TABLE `tchr_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `teacher_account`
--
ALTER TABLE `teacher_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `teacher_education`
--
ALTER TABLE `teacher_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `teacher_experience`
--
ALTER TABLE `teacher_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_statuses` (`id`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `teachers_ibfk_4` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `teachers_ibfk_5` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `teachers_ibfk_6` FOREIGN KEY (`lanuages_id`) REFERENCES `lanuages` (`id`),
  ADD CONSTRAINT `teachers_ibfk_7` FOREIGN KEY (`nationaility_id`) REFERENCES `nationalities` (`id`),
  ADD CONSTRAINT `teachers_ibfk_8` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`),
  ADD CONSTRAINT `teachers_ibfk_9` FOREIGN KEY (`marital_status_id`) REFERENCES `marital_statuses` (`id`);

--
-- Constraints for table `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD CONSTRAINT `teacher_classes_ibfk_1` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot` (`id`),
  ADD CONSTRAINT `teacher_classes_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `teacher_classes_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `teacher_classes_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teacher_education`
--
ALTER TABLE `teacher_education`
  ADD CONSTRAINT `teacher_education_ibfk_1` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`),
  ADD CONSTRAINT `teacher_education_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
