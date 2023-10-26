-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2018 at 09:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joysell_ir_link`
--

-- --------------------------------------------------------

--
-- Table structure for table `link_admin`
--

CREATE TABLE `link_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_family` varchar(255) NOT NULL,
  `admin_ident` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_admin`
--

INSERT INTO `link_admin` (`admin_id`, `admin_name`, `admin_family`, `admin_ident`, `admin_pass`, `admin_image`) VALUES
(1, 'زهرا', 'داودی', '0310904633', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `link_category`
--

CREATE TABLE `link_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_category`
--

INSERT INTO `link_category` (`cat_id`, `cat_name`, `user_id`) VALUES
(3, 'لوازم بهداشتی', 1),
(7, 'لوازم برقی', 2),
(10, 'لوازم بهداشتی', 2),
(11, 'لوازم خانگی', 2),
(12, 'لوازم دیجیتالی', 2),
(13, 'لوازم آرایشی', 1),
(14, 'لوازم برقی', 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_comments`
--

CREATE TABLE `link_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_fullName` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_subject` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_comments`
--

INSERT INTO `link_comments` (`comment_id`, `comment_fullName`, `comment_email`, `comment_subject`, `comment_text`, `comment_date`) VALUES
(6, 'زهرا', 'hoseinnaghash@yahoo.com', 'ساب دامین', 'fgfgd', '1397-07-29'),
(7, 'زهرا', 'hoseinnaghash@yahoo.com', 'ساب دامین', 'fgfgd', '1397-07-29'),
(8, '', '', '', '', '1397-08-02'),
(9, '', '', '', '', '1397-08-02'),
(10, '', '', '', '', '1397-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `link_complaints`
--

CREATE TABLE `link_complaints` (
  `com_id` int(11) NOT NULL,
  `com_fullName` varchar(255) NOT NULL,
  `com_subject` varchar(255) NOT NULL,
  `com_email` varchar(255) NOT NULL,
  `com_phone` varchar(255) NOT NULL,
  `com_text` text NOT NULL,
  `com_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_complaints`
--

INSERT INTO `link_complaints` (`com_id`, `com_fullName`, `com_subject`, `com_email`, `com_phone`, `com_text`, `com_date`) VALUES
(1, 'زهرا', 'ساب دامین', 'hoseinnaghash@yahoo.com', '0219-9999999', '', '1397-07-29'),
(2, '', '', '', '', '', '1397-08-02'),
(3, '', '', '', '', '', '1397-08-02'),
(4, '', '', '', '', '', '1397-08-02'),
(5, '', '', '', '', '', '1397-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `link_customers`
--

CREATE TABLE `link_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_mobile` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_recovery` varchar(255) NOT NULL,
  `customer_signUpDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_customers`
--

INSERT INTO `link_customers` (`customer_id`, `customer_fname`, `customer_password`, `customer_email`, `customer_mobile`, `user_id`, `customer_address`, `customer_recovery`, `customer_signUpDate`) VALUES
(26, 'ttttt', 'c4ca4238a0b923820dcc509a6f75849b', 'it.davoodi@gmail.com', '09302188808', 1, 'ثقثفقثفثق', 'ff863dffcecd409c5068afd67338592c', '1397-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `link_orderplan`
--

CREATE TABLE `link_orderplan` (
  `order_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_state` smallint(6) NOT NULL,
  `order_timeId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_orderplan`
--

INSERT INTO `link_orderplan` (`order_id`, `plan_id`, `order_date`, `user_id`, `order_state`, `order_timeId`) VALUES
(59, 1, '1397-08-29', 1, 1, '260041EB646AFFA5');

-- --------------------------------------------------------

--
-- Table structure for table `link_orders`
--

CREATE TABLE `link_orders` (
  `order_id` int(11) NOT NULL,
  `order_state` varchar(255) NOT NULL,
  `order_mobile` varchar(255) NOT NULL,
  `order_address` text NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_product` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_timeId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_orders`
--

INSERT INTO `link_orders` (`order_id`, `order_state`, `order_mobile`, `order_address`, `order_amount`, `order_date`, `order_product`, `customer_id`, `user_id`, `order_timeId`) VALUES
(85, '0', '', '', 100, '1397-08-30', '84', 1, 1, '61832710F8ABBC13'),
(86, '1', '', '', 1000, '1397-08-30', '84', 1, 1, 'B37FD6F10E0FE980'),
(87, '1', '', '', 1000, '1397-08-30', '84', 1, 1, 'CD0222F0D956E556'),
(88, '1', '', '', 1000, '1397-08-30', '84', 1, 1, '7197B160D4FD8251'),
(89, '1', '', '', 1000, '1397-08-30', '84', 1, 1, 'FB2E82192F5029FB'),
(90, '1', '', '', 1000, '1397-08-30', '84', 1, 1, 'A95D470BDE9B6019'),
(91, '1', '', '', 1000, '1397-08-30', '84', 1, 1, 'FDCFB63D54B8BC0F'),
(92, '0', '', '', 1000, '1397-09-06', '84', 0, 1, '89626A771ADD9F11');

-- --------------------------------------------------------

--
-- Table structure for table `link_payment`
--

CREATE TABLE `link_payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_sendDate` date NOT NULL,
  `payment_description` text NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_sheba` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_payment`
--

INSERT INTO `link_payment` (`payment_id`, `user_id`, `payment_amount`, `payment_date`, `payment_sendDate`, `payment_description`, `payment_status`, `payment_sheba`) VALUES
(28, 1, 100, '1397-07-18', '0000-00-00', 'درخواست در تاریخ  1397-مه‍-18', ' در حال بررسی', ''),
(29, 1, 100, '1397-07-18', '0000-00-00', 'درخواست در تاریخ  1397-مه‍-18', ' در حال بررسی', ''),
(30, 1, 100, '1397-07-18', '0000-00-00', 'درخواست در تاریخ  1397-مه‍-18', ' در حال بررسی', '');

-- --------------------------------------------------------

--
-- Table structure for table `link_plans`
--

CREATE TABLE `link_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` int(11) NOT NULL,
  `plan_pnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_plans`
--

INSERT INTO `link_plans` (`plan_id`, `plan_name`, `plan_price`, `plan_pnumber`) VALUES
(1, 'برنزی', 100, 50),
(2, 'نقره ای', 10000, 100),
(3, 'طلایی', 20000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `link_products`
--

CREATE TABLE `link_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_inputDate` date NOT NULL,
  `product_number` int(11) NOT NULL,
  `product_link` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_products`
--

INSERT INTO `link_products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_inputDate`, `product_number`, `product_link`, `user_id`, `product_keywords`, `product_cat`) VALUES
(81, 'سی دی اموزشیلاا', 'iiyu', 852222, '1397-08-13', 10, 'http://joysell.ir/user/sell_product.php?link=L1L81', 1, 'uiy', 'a:2:{i:0;s:25:\"لوازم بهداشتی\";i:1;s:23:\"لوازم آرایشی\";}'),
(83, 'یخچال', 'ندارد', 1000000000, '1397-08-13', 40, 'http://joysell.ir/user/sell_product.php?link=L1L83', 1, 'ندارد', 'a:1:{i:0;s:19:\"لوازم برقی\";}'),
(84, 'همینجوری', 'ون', 100, '1397-08-23', 10, 'http://joysell.ir/user/sell_product.php?link=L1L84', 1, 'نن', 'a:2:{i:0;s:25:\"لوازم بهداشتی\";i:1;s:23:\"لوازم آرایشی\";}');

-- --------------------------------------------------------

--
-- Table structure for table `link_storeinfo`
--

CREATE TABLE `link_storeinfo` (
  `store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_storeinfo`
--

INSERT INTO `link_storeinfo` (`store_id`, `user_id`, `store_name`, `store_description`) VALUES
(1, 1, 'کیفدونی', 'فروشگاه کیف و کفش'),
(2, 14, 'ooo', 'ooooooooo'),
(3, 15, 'ooo', 'ooooooooo'),
(4, 16, 'ooo', '11111111111'),
(5, 17, 'bvcb', '1111111111111'),
(6, 18, 'bvcb', '1111111111111'),
(7, 19, 'ooo', '777777777'),
(8, 20, 'ooo', '7777'),
(9, 21, 'ooo', '4444'),
(10, 22, 'ooo', '22222222'),
(11, 2, 'fa3le', 'esrfdsf'),
(12, 3, 'رز', 'لوازم بهداشتی'),
(13, 4, 'ندارم', 'ندارن');

-- --------------------------------------------------------

--
-- Table structure for table `link_trans`
--

CREATE TABLE `link_trans` (
  `trans_id` int(11) NOT NULL,
  `trans_amount` int(11) NOT NULL,
  `trans_status` int(11) NOT NULL,
  `trans_time` varchar(255) NOT NULL,
  `trans_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trans_description` text NOT NULL,
  `order_timeId` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_trans`
--

INSERT INTO `link_trans` (`trans_id`, `trans_amount`, `trans_status`, `trans_time`, `trans_date`, `product_id`, `user_id`, `trans_description`, `order_timeId`, `order_type`) VALUES
(85, 1000, 1, '103604', '2018-11-20', 79, 1, '', '89C84B6959E277D9', 'product'),
(86, 1000, 1, '104143', '2018-11-20', 79, 1, '', 'C0A4F10FAA78E581', 'product'),
(87, 1000, 1, '142235', '2018-11-20', 79, 1, '', '055CE6FE1D085CDD', 'product'),
(88, 1000, 0, '142915', '2018-11-20', 1, 1, '', '30E8A6B075F7385D', 'plan'),
(89, 1000, 0, '143512', '2018-11-20', 1, 1, '', '67F83E72FB4555D7', 'plan'),
(90, 1000, 1, '143857', '2018-11-20', 1, 1, '', 'B6D0F6E16E7F8600', 'plan'),
(91, 1000, 1, '144108', '2018-11-20', 1, 1, '', 'EFC12934025E4E2C', 'plan'),
(92, 1000, 1, '144350', '2018-11-20', 1, 1, '', '3F0F774C895A2399', 'plan'),
(93, 100000, 1, '150449', '2018-11-20', 2, 2, '', 'A43FD94809990B78', 'plan'),
(94, 1000, 1, '155357', '2018-11-20', 1, 1, '', '260041EB646AFFA5', 'plan'),
(95, 1000, 0, '172551', '2018-11-20', 79, 1, '', '631E938550B51FFC', 'product'),
(96, 500000, 0, '83735', '2018-11-21', 84, 1, '', '960B58BC6B1D0FBC', 'product'),
(97, 500000, 0, '111153', '2018-11-21', 84, 1, '', 'C62E95B6120466A2', 'product'),
(98, 500000, 0, '112453', '2018-11-21', 84, 1, '', '5E76A3596458EF98', 'product'),
(99, 1000, 0, '142127', '2018-11-21', 79, 1, '', '6D2F2B1140E6B676', 'product'),
(100, 1000, 0, '142405', '2018-11-21', 79, 1, '', '9F11B8F9CEABB0DF', 'product'),
(101, 1000, 0, '142922', '2018-11-21', 79, 1, '', '756D459ED3682482', 'product'),
(102, 1000, 0, '143209', '2018-11-21', 79, 1, '', 'CF8D839A91FD66B2', 'product'),
(103, 1000, 0, '143608', '2018-11-21', 79, 1, '', '675E34F46B279A7A', 'product'),
(104, 1000, 0, '144417', '2018-11-21', 79, 1, '', 'C029B252C3B5685D', 'product'),
(105, 1000, 0, '144553', '2018-11-21', 79, 1, '', '3735E4DDBB3B876E', 'product'),
(106, 1000, 0, '153020', '2018-11-21', 79, 1, '', 'DDDFFCF81E18F1B8', 'product'),
(107, 1000, 0, '153119', '2018-11-21', 79, 1, '', '3DF331751325B760', 'product'),
(108, 800000, 0, '155700', '2018-11-21', 80, 1, '', '27389C75E9D39884', 'product'),
(109, 8522220, 0, '160226', '2018-11-21', 81, 1, '', 'CEFCADE0CDB7BC4D', 'product'),
(110, 8522220, 0, '160238', '2018-11-21', 81, 1, '', '11567A37F7840FC9', 'product'),
(111, 1000, 0, '161052', '2018-11-21', 79, 1, '', '9FFD40C015DBDB72', 'product'),
(112, 100, 0, '164401', '2018-11-21', 84, 1, '', '61832710F8ABBC13', 'product'),
(113, 1000, 1, '164437', '2018-11-21', 84, 1, '', 'B37FD6F10E0FE980', 'product'),
(114, 1000, 1, '164905', '2018-11-21', 84, 1, '', 'CD0222F0D956E556', 'product'),
(115, 1000, 1, '165058', '2018-11-21', 84, 1, '', '7197B160D4FD8251', 'product'),
(116, 1000, 1, '165819', '2018-11-21', 84, 1, '', 'FB2E82192F5029FB', 'product'),
(117, 1000, 1, '170138', '2018-11-21', 84, 1, '', 'A95D470BDE9B6019', 'product'),
(118, 1000, 1, '170459', '2018-11-21', 84, 1, '', 'FDCFB63D54B8BC0F', 'product'),
(119, 1000, 0, '121938', '2018-11-27', 84, 1, '', '89626A771ADD9F11', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `link_users`
--

CREATE TABLE `link_users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_sheba` varchar(255) NOT NULL,
  `user_accNum` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_bankName` varchar(255) NOT NULL,
  `user_bankCode` int(11) NOT NULL,
  `user_companyName` varchar(255) NOT NULL,
  `user_ident` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_signUpDate` date NOT NULL,
  `user_credit` int(11) NOT NULL,
  `user_recovery` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_state` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_users`
--

INSERT INTO `link_users` (`user_id`, `user_fname`, `user_lname`, `user_sheba`, `user_accNum`, `user_email`, `user_phone`, `user_mobile`, `user_bankName`, `user_bankCode`, `user_companyName`, `user_ident`, `user_pass`, `user_image`, `user_signUpDate`, `user_credit`, `user_recovery`, `active`, `user_state`) VALUES
(1, 'زهرا ', 'داودی', 'ir9875641258', '215366854', 'it.davoodi@gmail.com', '02632214901', '09359088106', 'ملت', 123, 'بهرو', '0310904633', 'c4ca4238a0b923820dcc509a6f75849b', '', '0000-00-00', 147000, 'dd4d761e3abfa815529a32f5ca42a426', 0, 1),
(2, 'حسین', 'حسین', '123456', '', 'hoseinnaghash@yahoo.com', '', '0919-7404598', 'گردشگری', 0, '', '0082540519', 'afb9b0c40a67eb5ddc3dbfef42dc91d4', '', '1397-07-22', 0, 'fb431c583e4ce9e1a4107d93f75e17f9', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `link_admin`
--
ALTER TABLE `link_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `link_category`
--
ALTER TABLE `link_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `link_comments`
--
ALTER TABLE `link_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `link_complaints`
--
ALTER TABLE `link_complaints`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `link_customers`
--
ALTER TABLE `link_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `link_orderplan`
--
ALTER TABLE `link_orderplan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `link_orders`
--
ALTER TABLE `link_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `link_payment`
--
ALTER TABLE `link_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `link_plans`
--
ALTER TABLE `link_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `link_products`
--
ALTER TABLE `link_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `link_storeinfo`
--
ALTER TABLE `link_storeinfo`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `link_trans`
--
ALTER TABLE `link_trans`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `link_users`
--
ALTER TABLE `link_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `link_admin`
--
ALTER TABLE `link_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `link_category`
--
ALTER TABLE `link_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `link_comments`
--
ALTER TABLE `link_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `link_complaints`
--
ALTER TABLE `link_complaints`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `link_customers`
--
ALTER TABLE `link_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `link_orderplan`
--
ALTER TABLE `link_orderplan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `link_orders`
--
ALTER TABLE `link_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `link_payment`
--
ALTER TABLE `link_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `link_plans`
--
ALTER TABLE `link_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `link_products`
--
ALTER TABLE `link_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `link_storeinfo`
--
ALTER TABLE `link_storeinfo`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `link_trans`
--
ALTER TABLE `link_trans`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `link_users`
--
ALTER TABLE `link_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
