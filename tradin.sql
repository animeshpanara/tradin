-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2018 at 01:02 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tradin`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `aid` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `startTime` varchar(100) NOT NULL,
  `basePrice` bigint(20) NOT NULL,
  `topPrice` bigint(20) NOT NULL,
  `topBidder` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) NOT NULL,
  `msgfrom` varchar(100) NOT NULL,
  `msgto` varchar(100) NOT NULL,
  `time` text NOT NULL,
  `msg` text NOT NULL,
  `msgread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `iid` bigint(20) NOT NULL,
  `likedBy` varchar(100) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify` text NOT NULL,
  `notifier` text NOT NULL,
  `notification` text NOT NULL,
  `readBy` tinyint(4) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT '1',
  `aid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(255) NOT NULL,
  `uname` text NOT NULL,
  `itype` text NOT NULL,
  `description` text NOT NULL,
  `price` bigint(50) NOT NULL,
  `address` text NOT NULL,
  `altmono` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `img4` text NOT NULL,
  `iname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `uname`, `itype`, `description`, `price`, `address`, `altmono`, `img1`, `img2`, `img3`, `img4`, `iname`) VALUES
(1, 'vjasun', 'Book', 'A basic beginner guide to learning c and+\r\n C++', 111, 'Swami bhavan', '', '10.jpg', '', '', '', 'Intro to c++');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobno` varchar(20) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `propic` varchar(100) NOT NULL,
  `verified` varchar(15) NOT NULL,
  `status` varchar(100) NOT NULL,
  `chatActive` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `mobno`, `uname`, `pass`, `propic`, `verified`, `status`, `chatActive`) VALUES
('Vatsal', 'Mehta', 'mehtavatsald02a@gmail.com', '', 'vdmehta', 'e10adc3949ba59abbe56e057f20f883e', 'client.png', 'verified', '1523194836', 0),
('jasu', 'nasit', 'jasujnasit@gmail.com', '', 'vjasun', '686e6718aceea026149e50b968f1efe9', 'client.png', 'verified', '1', 0),
('animesh', 'Pronara', 'aaa@aa.com', '', 'animee', '37501f40f165a722599eab3472380edc', 'client.png', 'verified', '1', 0),
('abhi', 'panara', 'animeshpanara30@gmail.com', '9825496845', 'abhipanara', 'b205eb7b650c8d0521ef33da4725e1e1', 'abhipanara.jpg', 'verified', '1523197457', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notid`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `aid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `iid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
