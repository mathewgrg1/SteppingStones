-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 07:25 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stepping_stones`
--

-- --------------------------------------------------------

--
-- Table structure for table `celebs`
--

CREATE TABLE IF NOT EXISTS `celebs` (
  `c_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `occassion` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebs`
--

INSERT INTO `celebs` (`c_id`, `o_id`, `u_id`, `occassion`, `date`, `time`, `comment`) VALUES
(11, 3, 3, 'bday', '2016-10-26', '13:59', 'ufu'),
(12, 6, 3, 'bday', '2016-10-20', '14:22', '3333'),
(13, 3, 3, 'bday', '2016-10-21', '11:11', '222'),
(14, 3, 3, 'bday', '2016-10-08', '11:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactdet`
--

CREATE TABLE IF NOT EXISTS `contactdet` (
  `id` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactdet`
--

INSERT INTO `contactdet` (`id`, `cname`, `email`, `msg`) VALUES
(1, 'mathew', 'math@gmail.com', 'help'),
(2, 'mathew', 'matehw@gmail.com', 'qwewqe');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE IF NOT EXISTS `counter` (
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`count`) VALUES
(336);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
  `d_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `amount` int(8) NOT NULL,
  `purpose` varchar(20) NOT NULL,
  `don_type` varchar(20) NOT NULL,
  `pay_method` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`d_id`, `u_id`, `amount`, `purpose`, `don_type`, `pay_method`) VALUES
(13, 4, 10000, 'General', 'Donation', 'Net Banking'),
(14, 4, 3000, 'Food', 'Donation', 'DD/Cheque'),
(18, 4, 213213, 'Food', 'Donation', 'Net Banking'),
(23, 4, 10000, '104', 'Educate', 'DD/Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `imgPath_home` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `imgPath_home`) VALUES
(21, 'img1', '', '3459g2.jpg'),
(22, 'img2', '', '23296g7.jpg'),
(23, 'img3', '', '28473g6.jpg'),
(24, 'img4', '', '27006g9.jpg'),
(33, 'Best moments', 'Hello, Description', '67358_817074848334575_6955479882865767938_n.jpg'),
(37, 'kids', 'Help them', '239537.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inmates_details`
--

CREATE TABLE IF NOT EXISTS `inmates_details` (
  `s_id` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `stud_type` varchar(10) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `approx_fees` int(7) NOT NULL,
  `isapproved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmates_details`
--

INSERT INTO `inmates_details` (`s_id`, `id`, `name`, `age`, `gender`, `stud_type`, `grade`, `institution`, `approx_fees`, `isapproved`) VALUES
(101, 2, 'Krish', 15, 'Male', 'School', '10th', 'Christ School', 200003, 1),
(102, 2, 'Maitri Aeron', 22, 'Female', 'PG', '23', 'christ college', 2333333, 1),
(103, 2, 'Mathew', 22, 'Male', 'PG', 'MCA', 'Christ', 120000, 1),
(104, 3, 'manu', 17, 'Male', 'School', '12th', 'Christ', 10000, 1),
(105, 2, 'Pric', 23, 'Female', 'PG', 'MCA', 'christ college', 120000, 0),
(106, 5, 'RAJ', 5, 'Male', 'UG', 'A', 'CMRV', 50000, 0),
(107, 5, 'SULEKHA', 15, 'Female', 'PG', 'A', 'CHRIST COLLEGE', 120000, 0),
(108, 5, 'PREEMA', 3, 'Male', 'School', 'B', 'SHFGC', 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE IF NOT EXISTS `logbook` (
  `date` date NOT NULL,
  `userid` int(5) NOT NULL,
  `category` varchar(10) NOT NULL,
  `task` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`date`, `userid`, `category`, `task`) VALUES
('2016-09-15', 101, 'login', 'Maitri Aeron login '),
('2016-09-15', 101, 'logout', 'Maitri Aeron logout'),
('2016-09-15', 101, 'login', 'Maitri Aeron login '),
('2016-09-15', 101, 'logout', 'Maitri Aeron'),
('2016-09-15', 101, 'login', 'Maitri Aeron'),
('2016-09-15', 101, 'logout', 'Maitri Aeron'),
('2016-09-15', 102, 'login', 'Mathew George'),
('2016-09-16', 101, 'login', 'Maitri Aeron'),
('2016-09-16', 101, 'login', 'Maitri Aeron login '),
('2016-09-16', 101, 'login', 'Maitri Aeron'),
('2016-09-16', 101, 'login', 'Maitri Aeron login '),
('2016-09-18', 0, 'login', ' login '),
('2016-09-18', 101, 'login', 'Maitri Aeron'),
('2016-09-18', 0, 'logout', 'navgivan@gmail.com l'),
('2016-09-18', 0, 'login', ' login '),
('2016-09-18', 101, 'login', 'Maitri Aeron'),
('2016-09-18', 101, 'login', 'Maitri Aeron'),
('2016-09-18', 101, 'login', 'Maitri Aeron login '),
('2016-09-18', 2, 'logout', 'nav jivan ngo logout'),
('2016-09-18', 0, 'login', ' login '),
('2016-09-18', 101, 'login', 'Maitri Aeron'),
('2016-09-18', 2, 'logout', 'nav jivan ngo logout'),
('2016-09-18', 0, 'login', ' login '),
('2016-09-18', 2, 'logout', 'nav jivan ngo logout'),
('2016-09-18', 0, 'login', ' login '),
('2016-09-18', 0, 'logout', ''),
('2016-09-18', 0, 'login', ' login '),
('2016-09-18', 101, 'login', 'Maitri Aeron'),
('2016-09-18', 101, 'login', 'Maitri Aeron'),
('2016-09-19', 0, 'login', ' login '),
('2016-09-19', 2, 'logout', 'NavJivan logout'),
('2016-09-19', 0, 'login', ' login '),
('2016-09-19', 0, 'login', ' login '),
('2016-09-19', 102, 'login', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('0000-00-00', 3, 'login', 'Mathew login '),
('0000-00-00', 3, 'login', 'Mathew login '),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-09-19', 102, 'login', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('0000-00-00', 3, 'login', 'Mathew login '),
('0000-00-00', 4, 'login', 'Maitri login '),
('2016-09-20', 102, 'login', 'Mathew George'),
('2016-09-20', 102, 'login', 'Mathew George login '),
('2016-09-20', 0, 'login', ' login '),
('2016-09-20', 101, 'login', 'Maitri Aeron'),
('2016-09-20', 101, 'logout', 'Maitri Aeron'),
('0000-00-00', 4, 'login', 'Maitri login '),
('2016-09-20', 4, 'logout', 'Maitri logout'),
('0000-00-00', 4, 'login', 'Maitri login '),
('2016-09-20', 4, 'logout', 'Maitri logout'),
('0000-00-00', 4, 'login', 'Maitri login '),
('2016-09-20', 4, 'logout', 'Maitri logout'),
('2016-09-20', 102, 'login', 'Mathew George'),
('2016-09-20', 102, 'logout', 'Mathew George'),
('2016-09-20', 0, 'login', ' login '),
('2016-09-20', 2, 'logout', 'NavJivan logout'),
('0000-00-00', 4, 'login', 'Maitri login '),
('2016-09-21', 102, 'login', 'Mathew George'),
('2016-09-21', 102, 'logout', 'Mathew George'),
('2016-09-21', 0, 'login', ' login '),
('0000-00-00', 4, 'login', 'Maitri login '),
('2016-09-21', 4, 'logout', 'Maitri logout'),
('2016-09-21', 102, 'login', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-09-21', 102, 'login', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-09-21', 102, 'logout', 'Mathew George'),
('2016-09-21', 0, 'login', ' login '),
('2016-09-22', 0, 'login', ' login '),
('2016-09-22', 2, 'logout', 'NavJivan logout'),
('2016-09-23', 102, 'login', 'Mathew George'),
('2016-09-30', 102, 'login', 'Mathew George'),
('2016-09-30', 102, 'logout', 'Mathew George'),
('2016-09-30', 0, 'login', ' login '),
('2016-09-30', 2, 'logout', 'NavJivan logout'),
('2016-09-30', 102, 'login', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-09-30', 102, 'logout', 'Mathew George'),
('2016-09-30', 0, 'login', ' login '),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-10-06', 102, 'login', 'Mathew George'),
('2016-10-07', 102, 'login', 'Mathew George'),
('2016-10-07', 102, 'login', 'Mathew George login '),
('2016-10-07', 0, 'login', ' login '),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-10-07', 0, 'login', ' login '),
('2016-10-07', 3, 'logout', 'Mathew logout'),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-10-07', 102, 'login', 'Mathew George'),
('2016-10-07', 102, 'logout', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-10-08', 3, 'logout', 'Mathew logout'),
('2016-10-08', 102, 'login', 'Mathew George'),
('2016-10-08', 0, 'login', ' login '),
('2016-10-08', 102, 'logout', 'Mathew George'),
('0000-00-00', 3, 'login', 'Mathew login '),
('2016-10-08', 102, 'login', 'Mathew George'),
('2016-10-08', 3, 'logout', 'SnehaSadan logout'),
('2016-10-08', 0, 'login', ' login ');

-- --------------------------------------------------------

--
-- Table structure for table `manage_donation`
--

CREATE TABLE IF NOT EXISTS `manage_donation` (
  `md_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `adm_id` int(5) NOT NULL,
  `amount` int(7) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_donation`
--

INSERT INTO `manage_donation` (`md_id`, `o_id`, `adm_id`, `amount`, `date`) VALUES
(1, 2, 101, 4000, '2016-09-21 01:50:10'),
(2, 2, 102, 5000, '2016-09-21 01:50:10'),
(3, 3, 103, 34000, '2016-09-21 01:50:34'),
(4, 3, 102, 50000, '2016-09-21 01:50:34'),
(5, 3, 103, 34000, '2016-09-21 01:50:39'),
(6, 3, 101, 50000, '2016-09-21 01:50:39'),
(7, 3, 103, 5000, '2016-09-21 10:20:42'),
(8, 3, 101, 5000, '2016-09-21 10:21:59'),
(9, 2, 102, 4000, '2016-09-21 10:26:34'),
(10, 2, 102, 4444, '2016-09-21 10:28:21'),
(11, 3, 102, 12000, '2016-09-21 21:53:06'),
(12, 3, 102, 8000, '2016-10-07 23:25:28'),
(13, 5, 102, 5000, '2016-10-08 09:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `orpupdate`
--

CREATE TABLE IF NOT EXISTS `orpupdate` (
  `upd_id` int(3) NOT NULL,
  `o_id` int(5) NOT NULL,
  `urgent` varchar(50) DEFAULT NULL,
  `events` varchar(50) DEFAULT NULL,
  `venue` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `post_req` tinyint(1) NOT NULL DEFAULT '0',
  `post_event` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orpupdate`
--

INSERT INTO `orpupdate` (`upd_id`, `o_id`, `urgent`, `events`, `venue`, `date`, `time`, `post_req`, `post_event`) VALUES
(9, 3, 'Helloo', NULL, '', '0000-00-00', '', 1, 0),
(11, 2, NULL, 'music', '', '0000-00-00', '9:30 AM', 0, 1),
(12, 3, NULL, 'music comp', '', '2016-12-12', '10:00 AM', 0, 0),
(13, 2, NULL, 'music', '', '2016-09-20', '9:30', 0, 0),
(14, 2, NULL, 'dance', '', '2016-09-22', '03:44', 0, 0),
(16, 3, NULL, 'dance', '', '2016-09-12', '18:00', 0, 1),
(17, 3, NULL, 'dance', 'sg p', '2016-09-22', '16:44', 0, 1),
(18, 3, '200 rs', NULL, '', '0000-00-00', '', 0, 0),
(19, 3, NULL, 'dance event', 'hall', '2016-11-07', '06:16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `o_details`
--

CREATE TABLE IF NOT EXISTS `o_details` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `est_year` int(4) NOT NULL,
  `init_details` varchar(250) NOT NULL,
  `imgPath` varchar(30) NOT NULL DEFAULT 'logo.jpg',
  `comment` varchar(250) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `orpPass` varchar(15) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `o_details`
--

INSERT INTO `o_details` (`id`, `name`, `email`, `address`, `city`, `phone`, `est_year`, `init_details`, `imgPath`, `comment`, `approved`, `orpPass`) VALUES
(2, 'NavJivan', 'navgivan@gmail.com', 'T nagar', 'Chennai', '9876543210', 1995, 'abc_ngo.xlsx', '1.PNG', 'Commented', 1, '123'),
(3, 'SnehaSadan', 'snehasadan@gmail.com', 'Jalahalli', 'Bengaluru', '9898989898', 1950, 'timetable_3_sem.xlsx', '', '', 1, '123456'),
(5, 'CSA', 'csa@cu.in', '', '', '9898989898', 2000, 'timetable_3_sem.xlsx', 'logo.jpg', '', 1, 'HDTbKCmP'),
(6, 'AshaKendra', 'ashakendra@gmail.com', 'Pallom', 'Kottayam', '9879879870', 1980, 'timetable_3_sem.xlsx', 'logo.jpg', '', 1, 'HbZxgepV');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE IF NOT EXISTS `team_member` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `imgPath_home` varchar(250) NOT NULL,
  `adminPass` varchar(15) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`id`, `name`, `designation`, `imgPath_home`, `adminPass`) VALUES
(101, 'Maitri Aeron', 'Admin', 'maitri.jpg', '123'),
(102, 'Mathew George', 'Admin', '4052mathew.jpg', '123'),
(103, 'Manukumar', 'Admin', 'manu.jpg', '123');

-- --------------------------------------------------------

--
-- Table structure for table `uregister`
--

CREATE TABLE IF NOT EXISTS `uregister` (
  `u_id` int(11) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `u_email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `u_address` varchar(35) NOT NULL,
  `u_city` varchar(20) NOT NULL,
  `u_phone` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uregister`
--

INSERT INTO `uregister` (`u_id`, `f_name`, `l_name`, `u_email`, `password`, `u_address`, `u_city`, `u_phone`) VALUES
(3, 'Mathew', 'George', 'mathew@gmail.com', '123456', 'KE hall, CU', 'Bengaluru', 9898989898),
(4, 'Maitri', 'Aeron', 'maitri@gmail.com', '123', 'SG palya', 'Bangalore', 9876543210);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `celebs`
--
ALTER TABLE `celebs`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `contactdet`
--
ALTER TABLE `contactdet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inmates_details`
--
ALTER TABLE `inmates_details`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `manage_donation`
--
ALTER TABLE `manage_donation`
  ADD PRIMARY KEY (`md_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `adm_id` (`adm_id`);

--
-- Indexes for table `orpupdate`
--
ALTER TABLE `orpupdate`
  ADD PRIMARY KEY (`upd_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `o_details`
--
ALTER TABLE `o_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uregister`
--
ALTER TABLE `uregister`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `celebs`
--
ALTER TABLE `celebs`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `contactdet`
--
ALTER TABLE `contactdet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `d_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `inmates_details`
--
ALTER TABLE `inmates_details`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `manage_donation`
--
ALTER TABLE `manage_donation`
  MODIFY `md_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orpupdate`
--
ALTER TABLE `orpupdate`
  MODIFY `upd_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `o_details`
--
ALTER TABLE `o_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `uregister`
--
ALTER TABLE `uregister`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`u_id`) REFERENCES `uregister` (`u_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inmates_details`
--
ALTER TABLE `inmates_details`
  ADD CONSTRAINT `o_id` FOREIGN KEY (`id`) REFERENCES `o_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `manage_donation`
--
ALTER TABLE `manage_donation`
  ADD CONSTRAINT `orp_id` FOREIGN KEY (`o_id`) REFERENCES `o_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
