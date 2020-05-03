-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 03:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `Roles` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`, `Roles`) VALUES
(1, 'admin', '$2y$10$U6SaxJ8oYOfVbWFpvT.htuxQU0/CByXvrzXZNOY9Wzgd2ri31DSMC', 'phpgurukulofficial@gmail.com', 1, '2018-05-27 17:51:00', '2020-04-14 15:13:36', 'Admin'),
(3, 'mad', '0000', 'phpgurukulofficial@gmail.com', 1, '2018-05-27 17:51:00', '2020-04-14 15:13:36', 'Authors');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthor`
--

CREATE TABLE `tblauthor` (
  `AuthorID` int(255) NOT NULL,
  `PostID` int(255) NOT NULL,
  `Is_Approved` int(1) NOT NULL,
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` date DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(2, 'wwadadasadd', 'skafiiiiiiiiiiiiiiiii', '2018-06-06 10:28:09', '2020-04-19', 0),
(3, 'd', 'd', '2018-06-06 10:35:09', '2020-04-18', 0),
(5, 'd', 'd', '2018-06-14 05:32:58', '2020-04-18', 0),
(6, 'd', 'd', '2018-06-22 15:46:09', '2020-04-18', 0),
(7, 'd', 'd', '2018-06-22 15:46:22', '2020-04-18', 0),
(11, 'dfdf', 'dada', '2020-04-18 21:00:00', '2020-04-19', 0),
(12, 'dfdf', 'dada', '2020-04-18 21:00:00', '2020-04-19', 0),
(13, '', '', '2020-04-18 21:00:00', '2020-04-19', 0),
(14, '', '', '2020-04-18 21:00:00', '2020-04-19', 0),
(15, '', '', '2020-04-18 21:00:00', '2020-04-19', 1),
(16, 'adad', 'adad', '2020-04-18 21:00:00', '2020-04-19', 1),
(17, 'dad', 'ada', '2020-04-19 21:00:00', '2020-04-20', 1),
(18, 'dad', 'ada', '2020-04-19 21:00:00', '2020-04-20', 1),
(19, 'dad', 'ada', '2020-04-19 21:00:00', '2020-04-20', 1),
(20, 'dad', 'ada', '2020-04-19 21:00:00', '2020-04-20', 1),
(21, 'dada', 'dada', '2020-04-19 21:00:00', '2020-04-20', 1),
(22, 'dada', 'dad', '2020-04-19 21:00:00', '2020-04-20', 1),
(23, 'dada', 'dad', '2020-04-19 21:00:00', '2020-04-20', 1),
(24, 'da', 'ada', '2020-04-19 21:00:00', '2020-04-20', 1),
(25, 'ada', 'dada', '2020-04-19 21:00:00', '2020-04-20', 1),
(26, 'dadad', 'adad', '2020-04-19 21:00:00', '2020-04-20', 1),
(27, '', '', '2020-04-29 21:00:00', '2020-04-30', 1),
(28, '', '', '2020-04-29 21:00:00', '2020-04-30', 1),
(29, '', '', '2020-04-29 21:00:00', '2020-04-30', 1),
(30, '', '', '2020-04-30 21:00:00', '2020-05-01', 0),
(31, 'skafi', 'ps', '2020-04-30 21:00:00', '2020-05-01', 1),
(32, 'skafi', 'ps', '2020-04-30 21:00:00', '2020-05-01', 1),
(33, 'ps', 'skafi', '2020-04-30 21:00:00', '2020-05-01', 1),
(34, 'dadad', 'ada', '2020-04-30 21:00:00', '2020-05-01', 1),
(35, 'dadad', 'adadad', '2020-04-30 21:00:00', '2020-05-01', 1),
(36, 'psps', 'psps', '2020-04-30 21:00:00', '2020-05-01', 1),
(37, 'da', 'dada', '2020-04-30 21:00:00', '2020-05-01', 1),
(38, 'da', 'dada', '0000-00-00 00:00:00', '0000-00-00', 1),
(39, 'pspspspp', 'pspsp', '0000-00-00 00:00:00', '0000-00-00', 1),
(40, 'wwwwwww', 'wwwwwwwww', '2020-05-01 18:41:01', '2020-05-01', 0),
(41, 'qqqqqqq', 'qqqqqqqq', '2020-05-01 18:41:18', '2020-05-01', 0),
(42, '', '', '2020-05-01 21:16:22', '2020-05-02', 1),
(43, '', '', '2020-05-02 13:01:13', '2020-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(1, '12', 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2018-11-21 11:06:22', 0),
(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 1),
(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br>', '2018-06-30 18:01:03', '2018-06-30 19:19:51'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>phpgurukulofficial@gmail.com</p>', '2018-06-30 18:01:36', '2018-06-30 19:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `Approved` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `Approved`) VALUES
(7, 'sakfi', 26, 4, 'bitch', '2018-06-30 18:49:23', '2020-05-01 15:37:04', 1, 'sakfi', '0a9e10a0df8dcfc175727a2404729867.png', 'yes'),
(10, 'Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal', 7, 9, 'adad', '2018-06-30 19:08:56', '2020-05-02 19:59:58', 0, '', '505e59c459d38ce4e740e3c9f5c6caf7.jpg', 'yes'),
(11, 'UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping', 6, 8, '111', '2018-06-30 19:10:36', '2020-04-29 14:10:32', 1, 'UNs-Jean-Pierre-Lacroix-thanks-India-for-contribution-to-peacekeeping', '27095ab35ac9b89abb8f32ad3adef56a.jpg', 'no'),
(12, 'Shah holds meeting with NE states leaders in Manipur', 6, 7, 'll', '2018-06-30 19:11:44', '2020-04-29 14:10:25', 1, 'Shah-holds-meeting-with-NE-states-leaders-in-Manipur', 'fb5c81ed3a220004b71069645f112867.png', 'no'),
(13, 'skafipsd', 2, NULL, 'add', '2020-04-14 13:32:53', '2020-04-29 14:09:25', 1, 'skafipsd', 'fb5c81ed3a220004b71069645f112867.png', 'no'),
(14, 'adada', 2, NULL, 'aada', '2020-04-14 13:33:42', '2020-05-01 12:43:23', 0, '', 'e720a1c34fe9b0b5978150c671891d76.jpg', 'yes'),
(15, 'da', 3, NULL, NULL, '2020-04-14 13:34:08', '2020-05-01 12:43:35', 0, 'da', 'f95f91a48177eb5d0555c09b47bb1ca5.jpg', 'yes'),
(16, 'dadada', 3, NULL, 'ada', '2020-04-14 13:34:34', '2020-05-01 12:44:01', 0, '', 'e720a1c34fe9b0b5978150c671891d76.jpg', 'yes'),
(17, 'adada', 3, NULL, 'ad', '2020-04-14 13:34:58', '2020-05-01 12:44:40', 0, '', '6f7939e1199487c0b09cd7d749534d5a.gif', 'yes'),
(18, 'adada', 3, NULL, 'ad', '2020-04-14 13:35:17', '2020-04-29 14:09:18', 1, '', '2726539970bf019c6dc6bde903add652.png', 'no'),
(19, 'mad', 3, NULL, 's', '2020-04-14 15:22:04', '2020-05-01 12:45:36', 0, '', 'a79fd9a25ece0843aaa348a5c8e29c37.png', 'yes'),
(20, 'dadadaada', 20, NULL, 'ada', '2020-04-16 21:34:38', '2020-05-01 14:38:10', 1, 'dadadaada', 'f95f91a48177eb5d0555c09b47bb1ca5.jpg', 'yes'),
(21, 'adada', 5, NULL, 'يشيشي', '2020-04-19 13:01:05', NULL, 1, '', 'fb5c81ed3a220004b71069645f112867.png', 'no'),
(23, 'skafi bitch', 18, NULL, 'adadada', '2020-04-20 12:18:32', '2020-04-29 14:09:22', 1, '', '6f7939e1199487c0b09cd7d749534d5a.gif', 'no'),
(24, 'skafi bitch', 18, NULL, 'adadada', '2020-04-20 12:18:32', NULL, 1, '', '6f7939e1199487c0b09cd7d749534d5a.gif', 'no'),
(25, 'adad', 16, NULL, 'dadaad', '2020-05-01 14:01:06', NULL, 1, '', '0a9e10a0df8dcfc175727a2404729867.png', 'yes'),
(26, 'skfi', 17, NULL, 'wwwwwww', '2020-05-01 14:01:41', '2020-05-01 19:50:08', 1, 'skfi', '5b6427399998db51f69e41dd03a5af7f.png', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `Is_Active` int(1) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `UpdationDate` datetime NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `user_name`, `user_email`, `user_password`, `Is_Active`, `CreationDate`, `UpdationDate`, `role_id`) VALUES
(1, 'admin', 'mahmoud@gmail.com', '$2y$10$U6SaxJ8oYOfVbWFpvT.htuxQU0/CByXvrzXZNOY9Wzgd2ri31DSMC', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'mad', 'skafi@gmail.com', '$2y$10$U6SaxJ8oYOfVbWFpvT.htuxQU0/CByXvrzXZNOY9Wzgd2ri31DSMC', 0, '2020-04-23 13:25:29', '0000-00-00 00:00:00', 2),
(22, 'mads', 'skafi@gmail.com', '$2y$10$HoVB/.aYUx2Z6XHMa6frk.qobee85BQiWGYusjqeE6qFf8YDkDYRS', 1, '2020-05-02 20:56:53', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpermisstions`
--

CREATE TABLE `tbpermisstions` (
  `role_id` int(255) NOT NULL,
  `type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpermisstions`
--

INSERT INTO `tbpermisstions` (`role_id`, `type`) VALUES
(1, 'admin'),
(2, 'author');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbpermisstions`
--
ALTER TABLE `tbpermisstions`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `AuthorID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
