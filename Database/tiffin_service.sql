-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 12:39 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiffin_service`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancel_tiffins` (IN `options` INT, IN `provider_id1` INT)  MODIFIES SQL DATA
UPDATE `notifications` SET `provider_cancel`=options WHERE `provider_id`=provider_id1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `kothrud` tinyint(1) NOT NULL,
  `karvenagar` tinyint(1) NOT NULL,
  `swargate` tinyint(1) NOT NULL,
  `deccan` tinyint(1) NOT NULL,
  `jmroad` tinyint(1) NOT NULL,
  `bavdhan` tinyint(1) NOT NULL,
  `lawcollegeroad` tinyint(1) NOT NULL,
  `warje` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `kothrud`, `karvenagar`, `swargate`, `deccan`, `jmroad`, `bavdhan`, `lawcollegeroad`, `warje`) VALUES
(32, 1, 1, 1, 1, 1, 0, 0, 0),
(33, 1, 0, 1, 1, 0, 1, 0, 1),
(34, 1, 1, 1, 1, 1, 1, 0, 1),
(35, 1, 0, 0, 0, 0, 0, 1, 1),
(37, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 1, 1, 0, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `full_meal`
--

CREATE TABLE `full_meal` (
  `id` int(11) NOT NULL,
  `full_price` int(11) NOT NULL,
  `half_price` int(11) NOT NULL,
  `no_roti` int(11) NOT NULL,
  `no_sabji` int(11) NOT NULL,
  `rice` tinyint(1) NOT NULL,
  `salad` tinyint(1) NOT NULL,
  `sweet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `full_meal`
--

INSERT INTO `full_meal` (`id`, `full_price`, `half_price`, `no_roti`, `no_sabji`, `rice`, `salad`, `sweet`) VALUES
(32, 2100, 1200, 3, 2, 1, 0, 1),
(33, 2000, 1000, 5, 2, 0, 1, 1),
(34, 2400, 1400, 4, 2, 1, 1, 0),
(35, 3000, 2500, 3, 1, 1, 0, 0),
(37, 75, 50, 2, 2, 1, 1, 1),
(38, 2400, 1200, 5, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `half_meal`
--

CREATE TABLE `half_meal` (
  `id` int(11) NOT NULL,
  `full_price` int(11) NOT NULL,
  `half_price` int(11) NOT NULL,
  `no_roti` int(11) NOT NULL,
  `no_sabji` int(11) NOT NULL,
  `rice` tinyint(1) NOT NULL,
  `salad` tinyint(1) NOT NULL,
  `sweet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `half_meal`
--

INSERT INTO `half_meal` (`id`, `full_price`, `half_price`, `no_roti`, `no_sabji`, `rice`, `salad`, `sweet`) VALUES
(32, 1900, 800, 2, 1, 0, 0, 0),
(33, 1500, 800, 2, 1, 1, 1, 0),
(34, 1900, 900, 3, 1, 0, 1, 0),
(35, 2800, 2400, 1, 2, 1, 0, 0),
(37, 50, 25, 2, 2, 1, 1, 0),
(38, 2000, 1000, 3, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `user_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `user_cancel` tinyint(1) NOT NULL,
  `provider_cancel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`user_id`, `provider_id`, `user_cancel`, `provider_cancel`) VALUES
(2, 32, 0, 0),
(3, 35, 0, 0),
(4, 35, 0, 0),
(5, 35, 0, 0),
(6, 33, 0, 1),
(7, 33, 1, 1),
(8, 32, 0, 0),
(9, 33, 0, 1),
(10, 33, 0, 0),
(11, 33, 1, 0),
(12, 33, 1, 0),
(13, 38, 0, 0),
(14, 38, 0, 0),
(15, 33, 1, 0),
(16, 34, 1, 0),
(17, 32, 0, 0),
(19, 34, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provider_data`
--

CREATE TABLE `provider_data` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `tiffin_name` varchar(40) NOT NULL,
  `non-veg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider_data`
--

INSERT INTO `provider_data` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `mobile`, `tiffin_name`, `non-veg`) VALUES
(32, 'Ketki', 'Kokate', 'ketkikokate199@gmail.com', 'b6ccb4ece5454dcae51778b3e239ebc2', 'Kothrud', 7798398892, 'Meow Meow Tiffin', 1),
(33, 'Ashish', 'Gaurav', 'ashish.g308@gmail.com', '4428c6c474502e61151877825bb41961', 'Kothrud', 7549743738, 'Gaurav Tiffin', 1),
(34, 'Rishabh', 'Gandhewar', 'rishabhgandhewar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Kothrud', 8805056213, 'YO YO Tiffin', 1),
(35, 'Shreyash', 'waghmare', 'shreyashwaghmare22@gmail.com', '61b6578216a6a2f5f40adffe278a0229', 'plot no 9,savedi,anagr', 9766212427, 'Lokseva', 1),
(36, 'Rashmi', 'Bhangale', 'rashmibhangale@gmail.com', 'b6ccb4ece5454dcae51778b3e239ebc2', 'muktangan,Pune', 9422630297, 'tiffin', 0),
(37, 'dev', 'tehare', 'dev@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'pune', 2345678901, 'Dev Tiffin', 1),
(38, 'Garima', 'Mishra', 'garimamishra@gmail.com', 'e9d3813a9bb136fb4e0a0f35f086b579', 'Pune', 9422094220, 'Yummyzzz Tiffin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_join`
--

CREATE TABLE `tiffin_join` (
  `user_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `radio_1` tinyint(1) NOT NULL,
  `radio_2` int(1) NOT NULL,
  `full_half` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiffin_join`
--

INSERT INTO `tiffin_join` (`user_id`, `provider_id`, `radio_1`, `radio_2`, `full_half`) VALUES
(2, 32, 0, 0, 0),
(3, 35, 1, 2, 0),
(4, 35, 0, 1, 0),
(5, 35, 1, 2, 0),
(6, 33, 1, 2, 1),
(7, 34, 1, 2, 1),
(8, 32, 1, 2, 1),
(9, 33, 0, 1, 1),
(10, 33, 0, 0, 0),
(11, 33, 1, 2, 1),
(12, 33, 1, 2, 1),
(13, 38, 0, 1, 0),
(14, 38, 1, 2, 0),
(15, 33, 0, 1, 0),
(16, 34, 1, 2, 1),
(19, 34, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `todays_menu`
--

CREATE TABLE `todays_menu` (
  `id` int(11) NOT NULL,
  `l_roti` varchar(20) NOT NULL,
  `d_roti` varchar(20) NOT NULL,
  `l_sabji1` varchar(20) NOT NULL,
  `d_sabji1` varchar(20) NOT NULL,
  `l_sabji2` varchar(20) NOT NULL,
  `d_sabji2` varchar(20) NOT NULL,
  `l_rice` varchar(20) NOT NULL,
  `d_rice` varchar(20) NOT NULL,
  `l_salad` varchar(20) NOT NULL,
  `d_salad` varchar(20) NOT NULL,
  `l_sweet` varchar(20) NOT NULL,
  `d_sweet` varchar(20) NOT NULL,
  `dayoff` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todays_menu`
--

INSERT INTO `todays_menu` (`id`, `l_roti`, `d_roti`, `l_sabji1`, `d_sabji1`, `l_sabji2`, `d_sabji2`, `l_rice`, `d_rice`, `l_salad`, `d_salad`, `l_sweet`, `d_sweet`, `dayoff`) VALUES
(32, 'naan', 'butter roti', 'masur', 'chicken curry', 'crab curry', 'bhindi', 'prawns biryani', 'jeera rice', 'Yes', 'Yes', 'Gulab jamun', 'None', 0),
(34, 'Chapati', 'Paratha', 'Aloo Matar', 'Paneer Masala', 'Cauliflower', 'Bhindi do pyaaja', 'Jeera Rice', 'Dal Khichadi', 'Yes', 'Yes', 'Gulab jamun', 'None', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(200) NOT NULL,
  `locality` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `locality`, `mobile`) VALUES
(2, 'ketki', 'kokate', 'ketki@gmail.com', '62933e14ea0c9c9df66fcf86ce564374', 'kothrud', 'pune', 7798398892),
(3, 'Rishabh', 'Gandhewar', 'rishabhgandhewar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Pune', 'Kothrud', 8805056213),
(4, 'Nikita', 'Kirad', '2nov.nk@gmail.com', 'b0d2370755482c22811d9d7637b8237e', 'House no 107, Bhavani peth, Camp, Pune', 'J M road', 8888865497),
(5, 'shreyash', 'wagh', 'shreyashwaghmare22@gmail.com', '61b6578216a6a2f5f40adffe278a0229', 'flat no 9,savedi,anagar', 'kothrud', 8180868143),
(6, 'Shivani', 'Dandir', 'shivani.dandir1@gmail.com', 'dbb3a6394527c7e26ffc510282fe9b23', 'vanraji', 'kothrud', 9403235601),
(7, 'nikita', 'kirad', 'nikita@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'bhawani peth', 'bhawani peth', 1234567890),
(8, 'Harsh', 'Jadhav', 'harsh@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Parvati', 'Law College road', 1122334455),
(9, 'Anurag', 'Athwale', 'anu14298@gmail.com', 'b75b4be182b9ac89f503dbf7c1eb430d', 'pune', 'pune', 7758802416),
(10, 'shweta', 'kolhatkar', 'shweta@gmail.com', 'c44a471bd78cc6c2fea32b9fe028d30a', 'pune', 'kothrud', 9819999999),
(11, 'Abhishek', 'Bhise', 'bhiseabhishek5@gmail.com', 'b68e38b562811e408ef0862ab39f9da6', 'Pune', 'RHE', 9158818682),
(12, 'kaustubh', 'limaye', 'lim.kau5555@gmail.com', 'c95724ffa1921fad98e755382dd1277d', 'pune', 'sangavi', 9049140642),
(13, 'shree', 'Ghuge', 'ghugeshreyas2@gmail.com', '6cc341c60da0cbb08090d487057eb53d', 'Vishrantwadi', 'Vishrantwadi', 9623565118),
(14, 'vyakhya', 'rao', 'vyakhyarao@gmail.com', '091a26b0283209064d7f645dcb88226a', 'nasusidhnsaj', 'jasndhi', 8308566498),
(15, 'monika', 'dhakate', 'monikadhakate222@gmail.com', '7ca13238d0bfa5ca069ad5f6c37e31f4', 'kothrud', 'kothrud', 8657038528),
(16, 'ANUSHREE', 'GANDHEWAR', 'anugandhewar@gmail.com', 'b8a7ab990a3c8b9646768fcf26225814', 'UTCL', 'KHOR', 9977573463),
(17, 'Mahi', 'Dhoni', 'mahi@dhoni.com', 'b730fd794beeb4bacaa9d7f97f5cb73c', 'Kothrud', 'Kothrud', 7777777777),
(19, 'Virat', 'Kohli', 'vk18@gmail.com', 'c861e535c5c9cabaff9ced0b712e6410', 'Building No B-4 ,Flat no 1,Aaykar Society', '', 1818181819);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_meal`
--
ALTER TABLE `full_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `half_meal`
--
ALTER TABLE `half_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `provider_data`
--
ALTER TABLE `provider_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiffin_join`
--
ALTER TABLE `tiffin_join`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todays_menu`
--
ALTER TABLE `todays_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provider_data`
--
ALTER TABLE `provider_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
