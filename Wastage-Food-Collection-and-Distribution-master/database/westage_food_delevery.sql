-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 10:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westage_food_delevery`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_order`
--

CREATE TABLE `accept_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_place_By` varchar(100) NOT NULL,
  `order_accept_By` varchar(100) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accept_order`
--

INSERT INTO `accept_order` (`id`, `order_id`, `order_place_By`, `order_accept_By`, `status`) VALUES
(4, 'ODFOOD411662638488', 'demo@gmail.com', 'demo@gmail.com', 'cancel'),
(5, 'ODFOOD861663043113', 'demo@gmail.com', 'demo@gmail.com', 'Distributed'),
(6, 'ODFOOD451663040553', 'demo@gmail.com', 'demo@gmail.com', 'Packed'),
(7, 'ODFOOD651663043130', 'demo@gmail.com', 'demo@gmail.com', 'Delivery'),
(8, 'ODFOOD201663495937', 'demo@gmail.com', 'demo@gmail.com', 'Delivery'),
(9, 'ODFOOD931663934649', 'demo@gmail.com', 'demo@gmail.com', 'Delivery'),
(10, 'ODFOOD531663946530', 'demo@gmail.com', 'debasmita@gmail.com', 'Delivery'),
(11, 'ODFOOD411663516875', 'demo@gmail.com', 'debasmita@gmail.com', 'conform'),
(12, 'ODFOOD461663516893', 'demo@gmail.com', 'debasmita@gmail.com', 'conform');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `psw` varchar(500) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `user_name`, `psw`, `roll`, `otp`) VALUES
(41, 'debasmita.pal2020@gift.edu.in', 'DEBASMITA PAL', '$2y$10$kPnNdr96l9ad6cMCCXeLruNpFJ7Zc1gAvLqOyncVUrlrbiiwB1pVa', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `dateTime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `msg`, `dateTime`) VALUES
(1, 'Suryanarayan Biswal', 'cchiku@123', 'cjdnsdsdmdkdsdsdsds', '2022-09-24 01:21:00.541256'),
(2, 'cxcx', 'cxcxxcx', 'cxcxccxcx', '2022-09-24 01:23:50.502611');

-- --------------------------------------------------------

--
-- Table structure for table `doner`
--

CREATE TABLE `doner` (
  `doner_id` int(11) NOT NULL,
  `doner_email` varchar(250) NOT NULL,
  `doner_user_name` varchar(250) NOT NULL,
  `doner_psw` varchar(500) NOT NULL,
  `doner_roll` varchar(100) NOT NULL,
  `doner_state` varchar(250) NOT NULL,
  `doner_city` varchar(250) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_img`
--

CREATE TABLE `order_img` (
  `id` int(10) NOT NULL,
  `orderID` varchar(100) NOT NULL,
  `time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_img`
--

INSERT INTO `order_img` (`id`, `orderID`, `time`, `image`) VALUES
(1, 'ODFOOD861663043113 ', '0000-00-00 00:00:00.000000', '7131663957973.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_psw` varchar(500) NOT NULL,
  `user_roll` varchar(100) NOT NULL,
  `user_state` varchar(250) NOT NULL,
  `user_city` varchar(250) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_psw`, `user_roll`, `user_state`, `user_city`, `otp`) VALUES
(1, 'ds@gmail.com', 'dds', '$2y$10$7ZzmBrgQE7I8R4f4Fden4.GDhGNaHJGgZt5d6jd7D2TuRUnlJFZMS', 'user', 'odisha', 'bhubaneswar', '0'),
(2, 'demo@gmail.com', 'SURYANARAYAN BISWAL', '$2y$10$RE.8YUFgruq2WknWRAnHCeCVnwKOKZdWA1WYwubgzz5f1m4dNsFbW', 'user', 'odisha', 'bhubaneswar', '0'),
(3, 'cchiku1ss999@gmail.com', 'cchiku', '$2y$10$jthdAAD5dPrchJTSN11ZM.8ugkGY1m3GdNKKjfnbahXdaKrWipfui', 'user', 'odisha', 'bhubaneswar', '870393'),
(4, 'chikuchiku3942@gmail.com', 'Suryanarayan Biswal', '$2y$10$./EPXqUlTvEoDU1MIaBwneZ6d5Gt6qbpXQne1abN074jGKG64Y97e', 'user', 'odisha', 'bhubaneswar', '0'),
(5, 'debasmita.pal2020@gift.edu.in', 'Debasmita Pal', '$2y$10$kPnNdr96l9ad6cMCCXeLruNpFJ7Zc1gAvLqOyncVUrlrbiiwB1pVa', 'user', 'odisha', 'bhubaneswar', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `no` int(100) NOT NULL,
  `orderID` varchar(250) NOT NULL,
  `useremail` varchar(250) NOT NULL,
  `username` varchar(500) NOT NULL,
  `userContact` varchar(250) NOT NULL,
  `userAddress1` varchar(500) NOT NULL,
  `userAddress2` varchar(500) NOT NULL,
  `userState` varchar(250) NOT NULL,
  `userCity` varchar(250) NOT NULL,
  `userPin` varchar(100) NOT NULL,
  `noOfPeople` varchar(50) NOT NULL,
  `orderdatetime` varchar(250) NOT NULL,
  `accept` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`no`, `orderID`, `useremail`, `username`, `userContact`, `userAddress1`, `userAddress2`, `userState`, `userCity`, `userPin`, `noOfPeople`, `orderdatetime`, `accept`) VALUES
(61, 'ODFOOD411662638488', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '4343434', '1244', '23434', 'odisha', '3444', '455454', '2', '2022-09-08 02:01:28pm', 1),
(62, 'ODFOOD451663040553', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', 'chikuchiku3942@gmail.com ', 'kdddm', 'odisha', 'puri', '1234', '2', '2022-09-13 05:42:33am', 1),
(63, 'ODFOOD861663043113', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', 'chikuchiku3942@gmail.com ', 'kdddm', 'odisha', 'puri', '1234', '2', '2022-09-13 06:25:13am', 1),
(64, 'ODFOOD651663043130', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', 'dsdfdggg', 'kdddm', 'odisha', 'puri', '1234', '7', '2022-09-13 06:25:30am', 1),
(65, 'ODFOOD201663495937', 'demo@gmail.com', 'SURYANARAYAN BISWAL', 'xxnnxz', 'xzx xnzxj', 'xzjknxzk', 'odisha', 'xxxzxz', '1234', '3', '2022-09-18 12:12:17pm', 1),
(66, 'ODFOOD411663516875', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', 'bhubaneswae', 'dmkdmkmfk', 'odisha', 'bhubaneswar', '123455', '3', '2022-09-18 06:01:15pm', 1),
(67, 'ODFOOD461663516893', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', 'bhubaneswae', 'dmkdmkmfk', 'odisha', 'bhubaneswar', '123455', '3', '2022-09-18 06:01:33pm', 1),
(68, 'ODFOOD931663934649', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', 'Bhubaneswar ', 'bubane', 'odisha', 'bhubaneswar ', '752060', '3', '2022-09-23 02:04:09pm', 1),
(69, 'ODFOOD531663946530', 'demo@gmail.com', 'SURYANARAYAN BISWAL', '8327783629', ' xcncx mcx', 'xcxcxccxccx', 'odisha', 'bhubaneswar ', '12345', '6', '2022-09-23 05:22:10pm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_order`
--
ALTER TABLE `accept_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doner`
--
ALTER TABLE `doner`
  ADD PRIMARY KEY (`doner_id`);

--
-- Indexes for table `order_img`
--
ALTER TABLE `order_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_order`
--
ALTER TABLE `accept_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doner`
--
ALTER TABLE `doner`
  MODIFY `doner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_img`
--
ALTER TABLE `order_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
