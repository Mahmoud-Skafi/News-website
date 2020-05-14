-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 09:21 PM
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
-- Table structure for table `tblbrackingnews`
--

CREATE TABLE `tblbrackingnews` (
  `id` int(255) NOT NULL,
  `brackingText` varchar(255) NOT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrackingnews`
--

INSERT INTO `tblbrackingnews` (`id`, `brackingText`, `Is_Active`) VALUES
(1, 'hahadada', 1),
(2, 'wwwwwwwwwww', 1),
(3, 'adadadadadad', 1),
(4, 'dadadfafef', 1),
(5, 'adadawdfwdwad', 1),
(6, 'adfafawwffqfwdas', 1),
(7, 'dadffegrtghgefefew', 1),
(8, 'aghdahgdahhdgahdgashdgygwhdbwhgd bwdqwdbqdbqdqdqwdqwdqwdfqrfergjywertuyiqw5rtqwerer', 1);

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
(43, '', '', '2020-05-02 13:01:13', '2020-05-02', 1),
(44, '', '', '2020-05-13 20:12:41', '2020-05-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `comment`, `postingDate`, `status`) VALUES
(53, '7', 'dadatgag', '2020-05-04 14:47:37', 1),
(54, '10', 'adadafafqaf', '2020-05-04 14:52:55', 1),
(55, '10', 'afafwdada', '2020-05-04 14:53:02', 1),
(56, '10', 'dadfwdasdawd wdada', '2020-05-04 14:53:09', 1),
(57, '10', 'dadawfadadad', '2020-05-04 14:53:16', 1),
(58, '21', 'adadadad', '2020-05-04 15:07:12', 1),
(59, '21', 'adaefqefq', '2020-05-04 15:07:18', 1),
(60, '7', 'sdasda', '2020-05-14 14:18:17', 1),
(61, '32', 'adada', '2020-05-14 18:10:25', 1);

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
  `Approved` varchar(255) NOT NULL DEFAULT 'no',
  `CommentsCout` int(255) DEFAULT NULL,
  `Rank` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `Approved`, `CommentsCout`, `Rank`) VALUES
(30, 'mad', 17, NULL, 'adasdadad', '2020-05-14 19:06:16', '2020-05-14 19:18:52', 1, '', '7dc4e8d887e43d9c84f110b63801858d.png', 'yes', NULL, 3),
(31, 'sakfi', 16, NULL, 'asdadada', '2020-05-14 19:08:40', NULL, 1, '', '5b6427399998db51f69e41dd03a5af7f.png', 'yes', NULL, 0),
(32, 'adada', 25, NULL, 'dadadad', '2020-05-14 19:08:51', '2020-05-14 19:11:11', 1, '', '4b0ee394a6c98849d978ee4dab4ebaa9.png', 'yes', 1, 1),
(33, 'dadasdwrfw', 33, NULL, 'dadad', '2020-05-14 19:09:40', NULL, 1, '', '252e05e5b3363017c54ae4b9438013a6.jpg', 'yes', NULL, 0);

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
(1, 'admin', 'skafi@gmail.com', '$2y$10$QTER6.mxcwhO5RAumPEhWe3LHzNgTPYVeU0AjbYcDklXZ/TZqrbOq', 1, '2020-05-04 00:32:47', '0000-00-00 00:00:00', 1),
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
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `tblbrackingnews`
--
ALTER TABLE `tblbrackingnews`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `AuthorID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbrackingnews`
--
ALTER TABLE `tblbrackingnews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
