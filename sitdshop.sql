-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 06:39 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitdshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_canceled`
--

CREATE TABLE `tbl_canceled` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `comment` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_canceled`
--

INSERT INTO `tbl_canceled` (`id`, `user_id`, `order_id`, `reason`, `comment`) VALUES
(1, '', 'TN1000003', 'Decide for alternative product', ''),
(2, '', 'TN1000002', 'Select Reason', 'haha wale ehh'),
(3, '', 'TN1000005', '', 'hey\nhaha'),
(4, '', 'TN1000002', 'Decide for alternative product', ''),
(5, '', 'TN1000003', 'Found cheaper elsewhere', 'anu kayo ngaun'),
(6, '', 'TN1000004', 'Change or combine order(s)', 'asd\nasduh'),
(7, '151351802747484300', 'TN1000003', 'Decide for alternative product', 'fuck off\nakud'),
(8, '151351802747484300', 'TN1000002', 'Decide for alternative product', ''),
(9, '151351802747484300', 'TN1000002', 'Change Mind', ''),
(10, '151387803277138800', 'TN1238792', 'Found cheaper elsewhere', 'Anu ka nama ngayon.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `product_id` varchar(2555) NOT NULL,
  `quantity` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user`, `product_id`, `quantity`) VALUES
(3, '::1', 'GTRS9106613,12,10,11,MNSWR8646904', '7,1,11,4,11'),
(5, 'buenagrctlntn@gmail.com', 'MNSWR8646904', '3'),
(6, 'mjvitales@gmail.com', '10,GTRS9106613', '1,1'),
(7, 'user@gmail.com', '', ''),
(8, 'shylako@gmail.com', 'CLTHNG0250488,10', '1,1'),
(9, 'wyloranido@gmail.com', '10,11,12,CLTHNG1370777', '1,1,1,1'),
(10, 'respicio@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category`) VALUES
(3, 'accessories'),
(4, 'bags'),
(5, 'eyewear'),
(6, 'caps and hats'),
(7, 'clothing'),
(8, 'footwear'),
(9, 'swimwear');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `notification_id` int(11) NOT NULL,
  `reciever_id` varchar(250) NOT NULL,
  `message` varchar(2555) NOT NULL,
  `type` varchar(2555) NOT NULL,
  `status` varchar(2555) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`notification_id`, `reciever_id`, `message`, `type`, `status`, `date`) VALUES
(3, 'UR1297395', 'Due to lack of payment, we will hold your order until you pay your bills!', 'order', 'unread', '2017-12-21 01:43:26'),
(4, 'UR1297395', 'Due to lack of payment, we will hold your order until you pay your bills!', 'order', 'unread', '2017-12-21 23:34:08'),
(5, 'UR1297395', 'Due to lack of payment, we will hold your order until you pay your bills!', 'order', 'unread', '2017-12-21 23:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` varchar(250) NOT NULL,
  `user_id` varchar(2555) NOT NULL,
  `employee_id` varchar(2555) NOT NULL,
  `product_id` varchar(2555) NOT NULL,
  `quantity` varchar(2555) NOT NULL,
  `status` varchar(2555) NOT NULL,
  `total` varchar(2555) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `employee_id`, `product_id`, `quantity`, `status`, `total`, `date`) VALUES
('007249e0d6', 'user@gmail.com', '', '10', '1', '', '', '2017-12-27 13:26:25'),
('123', '151387803277138800', '', 'CLTHNG1370777', '', '', '', '0000-00-00 00:00:00'),
('6sad464', '', '', 'CLTHNG1370777', '', '', '', '0000-00-00 00:00:00'),
('8271e37aea', 'user@gmail.com', '', '10', '1', '', '', '2017-12-27 13:25:26'),
('ahdhg', '151387803277138800', '', 'SWMWR6618271', '', '', '', '0000-00-00 00:00:00'),
('asd', '151387803277138800', '', 'SWMWR8264680', '', '', '', '0000-00-00 00:00:00'),
('asd191', '', '', 'CLTHNG1370777', '', '', '', '0000-00-00 00:00:00'),
('asdadlajsd', '', '', 'CLTHNG1370777', '', '', '', '0000-00-00 00:00:00'),
('asdlaksd', '151387803277138800', '', 'SWMWR6618271', '', '', '', '0000-00-00 00:00:00'),
('asdsalkdln', '151387803277138800', '', 'SWMWR8264680', '', '', '', '0000-00-00 00:00:00'),
('kjabd', '', '', 'CLTHNG1370777', '', '', '', '0000-00-00 00:00:00'),
('oooo', '151387803277138800', '', 'CLTHNG1370777', '', '', '', '0000-00-00 00:00:00'),
('TN1238791', '151387803277138800', 'EE4783923', 'SWMWR8264680,CLTHNG0250488', '3,2', 'processing', '124998', '2017-12-14 00:00:00'),
('TN1238792', '151387803277138800', 'EE4783923', 'CCSSRS5222108', '2', 'canceled', '20000', '2017-12-21 14:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal`
--

CREATE TABLE `tbl_personal` (
  `user_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personal`
--

INSERT INTO `tbl_personal` (`user_id`, `firstname`, `lastname`, `contact`, `email`, `address`, `image`) VALUES
('151388560999008900', 'mark jukay', 'vitales', '09974313978', '', 'Malibu, Tuy, Batangas', ''),
('151388633283883400', '099974313978', 'vitales', '09974313978', '', 'malibu', ''),
('151388691576749500', '####,./', '#####,.,/', '09974313978', '', 'malibu', ''),
('151388716046707100', 'mark julius', 'mapagmahal', '09974313978', '', 'malibu', ''),
('151388759826220300', 'mark julius', 'mapagmahal', '09974313978', '', 'malibu', ''),
('151388765689707000', 'mark julius', 'mapagmahal', '09974313978', '', 'malibu', ''),
('151388782585299300', 'mark julius', 'mapagmahal', '09974313978', '', 'malibu', ''),
('151388798025822000', 'mark julius', 'mapagmahal', '09974313978', '', 'Brgy. Malibu 2218 Tuy Batangas', ''),
('151388799439859200', 'mark julius', 'mapagmahal', '09974313978', '', 'Brgy. Malibu 2218 Tuy Batangas', ''),
('151388831073897200', 'mark julius', 'mapagmahal', '09974313978', '', 'bahala na', ''),
('151388834742020100', 'mark julius', 'mapagmahal', '09974313978', '', '98754535', ''),
('151388849066297200', 'mark julius', 'mapagmahal', '09974313978', '', '@#$%^', ''),
('151388874956612000', 'mark julius', 'mapagmahal', '09974313978', '', 'malibu', ''),
('151388892972503400', 'superfunjukay', 'dulce', '09974313978', '', 'palicaro', ''),
('151388926768747500', 'shyaaaa', 'aksldasd', '09974313978', '', 'lian', ''),
('151392019561525100', 'jan', 'sport', '666', 'jan@gmail.com', 'sporty house street', ''),
('151428585570677400', 'xmas', 'light', '09351313834', 'xmas@gmail.com', 'taga dito street', ''),
('151428604874947400', 'account', 'information', '0935313834', 'user@gmail.com', 'kung saan saan street', ''),
('151429514837371100', 'Jose Wilfredo', 'Panganiban', '09366583691', 'wyloranido@gmail.com', 'Malaruhatan, Lian Batangas', ''),
('feae9dc6b7', 'anti', 'bio', '099966969', 'bio@gmail.com', 'taga bio', ''),
('UR1085102', 'Keevin Phil.', 'Pacia', '0909090909', 'phil.kevin@gmail.com', 'Brgy. 3 Nasugbu', '../../assets/images/profile/24672Screenshot (7).png'),
('UR1289379', 'Jezer Dave', 'Bacquian', '09778125430', 'ion.nightowl@gmail.com', 'Brgy. Malaruhatan, lian, batangas', '../../assets/images/profile/6635geass_symbol_minimalist_wallpaper_by_greenmapple17-d8f5duz.png'),
('UR1297395', 'Mark Joseph', 'Dolormente', '09192389922', 'markjosephandinidoliretne@gmail.com', 'Brgy. Tanagan, Calatagan, Batangas', '../../assets/images/profile/12588c19f84fcd203d04eedc5ae44466af940.jpg'),
('UR2850369', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '../../assets/images/user.png'),
('UR5641583', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '../../assets/images/user.png'),
('USR6ce016e01f', 'adrian', 'respicio', '09999999999', 'respicio@gmail.com', 'banilad', ''),
('USRe3109309a3', 'dolan', 'lodi', '099095445', 'dolan@gmail.com', 'tali beach baby', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` varchar(255) NOT NULL,
  `product name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `gross cost` int(11) NOT NULL,
  `net cost` int(11) NOT NULL,
  `initial quantity` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(9000) NOT NULL,
  `sale count` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product name`, `description`, `category`, `gross cost`, `net cost`, `initial quantity`, `quantity`, `image`, `sale count`, `date`, `status`) VALUES
('10', 'Epiphone Les Paul Standard', 'Sample Description', 'guitars', 24999, 27999, '20', '20', 'assets/images/products/3249EB_Splash.jpg', '', '2017-12-08 12:24:03', ''),
('11', 'Epiphone Les Paul Standard (White)', 'Sample Description', 'guitars', 28999, 30999, '13', '13', 'assets/images/products/1430epiphone-les-paul-custom-pro-alpine-white-257530.jpg', '', '2017-12-08 12:24:22', ''),
('12', 'Epiphone SG special', 'Sample Description', 'guitars', 20400, 23000, '12', '12', 'assets/images/products/17687CH_Splash.jpg', '', '2017-12-08 12:27:02', ''),
('CCSSRS0358911', 'google API', '<b><span style="color:rgb(255,0,0);">Google API</span></b>', 'accessories', 90077, 99985, '49', '49', 'assets/images/products/11642Screenshot (1).png', '', '2017-12-21 21:22:51', ''),
('CCSSRS3277669', 'SAMPLEEEE', 'EXAMPLE', 'accessories', 10001, 10009, '25', '25', 'assets/images/products/31001Screenshot (4).png', '', '2017-12-21 21:25:23', ''),
('CCSSRS5222108', 'ARCA Weather', 'GOGOGOGOGO', 'accessories', 9009, 10009, '49', '49', 'assets/images/products/15708Screenshot (1).png', '', '2017-12-21 21:34:49', ''),
('CLTHNG0250488', 'tshirt', 'pantago', 'clothing', 50, 60, '50', '50', 'assets/images/products/6212014-Mens-Plus-Size-5XL-6XL-Vertical-Stripe-Cotton-Short-Sleeve-Polo-shirt-Men-Designer-Brand.jpg', '', '2017-12-20 21:57:40', ''),
('CLTHNG1370777', 'polo', 'pantago', 'clothing', 69, 96, '80', '80', 'assets/images/products/25470KM06T.jpg', '', '2017-12-20 21:58:48', ''),
('CPSNDHTS0319324', 'cap1', 'caps to pang ulo', 'caps and hats', 1777, 1999, '10', '10', 'assets/images/products/19487logo.jpg', '', '2017-12-20 21:15:17', ''),
('FTWR3546476', 'niki', 'sapatos pampogi', 'footwear', 240, 300, '5', '5', 'assets/images/products/2924electricblack.jpg', '', '2017-12-20 21:47:07', ''),
('FTWR8249344', 'adiadas', 'pampa bilis ng takbo', 'footwear', 245, 280, '8', '8', 'assets/images/products/940shooes111.jpg', '', '2017-12-20 21:53:58', ''),
('GTRS9106613', 'Sampleee', 'Example', 'guitars', 49, 59, '5', '5', 'assets/images/products/295232145310238_a0e24b13d0.jpg', '', '2017-12-20 07:32:55', 'pullout'),
('MNSWR8646904', 'Sample', 'Examplee', 'clothing', 49, 59, '5', '5', 'assets/images/products/176812145310238_a0e24b13d0.jpg', '', '2017-12-20 07:31:32', 'pullout'),
('SWMWR6618271', 'trunks', 'panlangoy', 'swimwear', 300, 455, '8', '8', 'assets/images/products/28360th.jpg', '', '2017-12-20 21:56:28', ''),
('SWMWR8264680', 'two piece', 'panAKIP', 'swimwear', 700, 800, '8', '8', 'assets/images/products/295472015-New-RETRO-Swimsuit-Swimwear-Vintage-Push-Up-Bandeau-HIGH-WAISTED-Bikini-Set-Brand-Biquini-Bathing.jpg', '', '2017-12-20 21:55:14', ''),
('YWR0061604', 'neo glass', 'pang mata', 'eyewear', 1234, 1235, '15', '15', 'assets/images/products/26810Best-Gift-Brand-Full-Frame-Eyeglasses-with-Vintage-Rosewood-Frames-for-Men-Women-Designer-Eyewear-Optical.jpg', '', '2017-12-20 21:18:46', ''),
('YWR8950391', 'rayban', 'pang mata', 'eyewear', 1234, 1235, '14', '14', 'assets/images/products/137972015-Brand-Designer-Eye-Glasses-Frames-for-Men-Black-Color-CN0005-BLACK-Prescription-Eyewear-Optical-Glasses.jpg', '', '2017-12-20 21:17:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `access` varchar(1024) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `access`, `status`) VALUES
('151388560999008900', 'markjuliusvitales@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388633283883400', 'mjvitales@gmail.com', 'md5(mahalakonilord)', 'customer', 'active'),
('151388691576749500', 'mjvitales@gmail', 'md5(acegaffer29)', 'customer', 'active'),
('151388716046707100', 'mjvitale@gmail', 'md5(acegaffer29)', 'customer', 'active'),
('151388759826220300', 'mj143@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388765689707000', '143@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388782585299300', 'markjulius@gmailcom', 'md5(acegaffer29)', 'customer', 'active'),
('151388798025822000', 'markjulius@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388799439859200', 'malibu@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388831073897200', 'malibus@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388834742020100', 'malibuss@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388849066297200', 'malibusss@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388874956612000', 'malibussss@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388892972503400', 'superfun@gmail.com', 'md5(acegaffer29)', 'customer', 'active'),
('151388926768747500', 'shylako@gmail.com', 'md5(lovejukay)', 'customer', 'active'),
('151392019561525100', 'jan@gmail.com', 'md5(sport666)', 'customer', 'active'),
('151428585570677400', 'xmas@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'customer', 'active'),
('151428604874947400', 'user@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'customer', 'active'),
('151429514837371100', 'wyloranido@gmail.com', '253452019303b5a3fc5788b248013a0c', 'customer', 'active'),
('feae9dc6b7', 'bio@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'customer', 'active'),
('UR1085102', '1692369', '4e80769f94b179c21629945a73ede494', 'Employee', 'active'),
('UR1289379', '0301323', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'active'),
('UR1297395', '6349866', '21232f297a57a5a743894a0e4a801fc3', 'Employee', 'active'),
('UR2850369', '1041633', '6c96ebc93a7f0a4e3ebeb19f281ed2b5', 'Employee', 'active'),
('UR5641583', '0932711', '74870671b3685486f4cef02a50545183', 'Employee', 'active'),
('USR6ce016e01f', 'respicio@gmail.com', '0bd50a64ecfa9d0af5af667f853a221c', 'customer', 'active'),
('USRe3109309a3', 'dolan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'customer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_log`
--

CREATE TABLE `tbl_user_log` (
  `log_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `activity` varchar(1024) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_log`
--

INSERT INTO `tbl_user_log` (`log_id`, `user_id`, `activity`, `date`) VALUES
('a2a9a87d35', 'USR6ce016e01f', 'Logged out', '2017-12-27 01:27:24'),
('55e9caee1f', 'USR6ce016e01f', 'Logged on', '2017-12-27 01:29:07'),
('353f4ba0af', 'USR6ce016e01f', 'Logged out', '2017-12-27 01:57:28'),
('9a07eefe56', '151428604874947400', 'Logged on', '2017-12-27 02:10:04'),
('45b16a5294', '151428604874947400', 'Logged out', '2017-12-27 10:48:54'),
('c8a2d041e0', '151428604874947400', 'Logged on', '2017-12-27 10:51:30'),
('08f9100678', '151428604874947400', 'Logged out', '2017-12-27 11:55:28'),
('2d19df6798', '151428604874947400', 'Logged on', '2017-12-27 11:55:46'),
('1bb810b929', '151428604874947400', 'Logged out', '2017-12-27 11:58:54'),
('f18c3d9e99', '151428604874947400', 'Logged on', '2017-12-27 11:59:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_canceled`
--
ALTER TABLE `tbl_canceled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_personal`
--
ALTER TABLE `tbl_personal`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_canceled`
--
ALTER TABLE `tbl_canceled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
