-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2016 at 11:19 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electronix`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_product`
--

CREATE TABLE IF NOT EXISTS `add_to_product` (
  `kart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) NOT NULL,
  `pid` varchar(22) NOT NULL,
  `p_name` varchar(123) NOT NULL,
  `p_price` varchar(123) NOT NULL,
  `p_discount` varchar(123) NOT NULL,
  `quantity` varchar(123) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`kart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `add_to_product`
--

INSERT INTO `add_to_product` (`kart_id`, `user_id`, `pid`, `p_name`, `p_price`, `p_discount`, `quantity`, `description`) VALUES
(2, '37', '29', 'fhfghfghfgh', '10000.00', '10', '3', 'wdwq'),
(12, '58', '56', 'Samsung Galaxy node 2', '20000.00', '2', '1', 'fced derds  evdrv c erfc erfc.'),
(13, '58', '50', 'S/refrigerator', '13200.00', '15 ', '2', 'Good quality . wihtin one hours water make ice.'),
(16, '61', '29', 'fhfghfghfgh', '10000.00', '10', '1', 'wdwq'),
(17, '61', '29', 'fhfghfghfgh', '10000.00', '10', '1', 'wdwq'),
(18, '61', '36', 'Night bulb', '1000', '5', '1', 'This light is butifull.'),
(21, '65', '29', 'fhfghfghfgh', '10000.00', '10', '1', 'wdwq'),
(22, '65', '37', 'HD camara', '12000', '20', '1', 'High quality image .');

-- --------------------------------------------------------

--
-- Table structure for table `brand_name`
--

CREATE TABLE IF NOT EXISTS `brand_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `brand_name`
--

INSERT INTO `brand_name` (`id`, `brand_name`, `brand_logo`) VALUES
(1, 'Nokia', 'camera-icon.png'),
(3, 'Samsung', 'imhages.jpg'),
(4, 'Sony Ericsson', 'indexv.jpg'),
(5, 'Motorola', 'gallery5.jpg'),
(6, 'LG', 'gallery2.jpg'),
(7, 'Philips', 'colors_of_nature_197715.jpg'),
(9, 'lenovo', 'canoe_water_nature_221611.jpg'),
(10, 'Havels', 'flower_yellow_nature_220444.jpg'),
(11, 'Barsha', 'indbex.jpg'),
(12, 'Linens', 'gallery3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cetegory`
--

CREATE TABLE IF NOT EXISTS `cetegory` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(200) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `cetegory`
--

INSERT INTO `cetegory` (`cat_id`, `cat_name`, `cat_image`) VALUES
(1, 'Mobile', ''),
(2, 'Computer', ''),
(3, 'Laptop', ''),
(4, 'Camera', ''),
(5, 'Audio', ''),
(6, 'Sound/printing device', ''),
(9, 'line/ware', ''),
(10, 'light', ''),
(11, 'AC', ''),
(12, 'cd and dvd drive', ''),
(13, 'Motar and pamp', ''),
(14, 'Microoven', ''),
(15, 'intel 5', ''),
(16, 'Watch', ''),
(17, 'Tv', ''),
(18, 'Fan', ''),
(19, 'Refrigerator', ''),
(20, 'Hadephone', ''),
(21, 'test', 'im2ages.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` int(18) NOT NULL,
  `company` varchar(30) NOT NULL,
  `massage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile_no`, `company`, `massage`) VALUES
(1, 'amba', 'amba@gmail.php', 2147483647, 'asddsgfd', 'sdgfdsg'),
(2, 'amba', 'amba@gmail.php', 0, 'asddsgfd', 'sdgfdsg'),
(3, 'ambika', 'amraboti@gmail.com', 2147483647, 'express weather', 'express weather  express weather'),
(4, 'sad', 'sadas', 959362450, 'sadfad', 'aDASDa'),
(5, 'tanu', 'tanu@gmail.com', 2147483647, 'sdcfsdac', 'sdaffsd');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'dealall', '7c463d05150f92ba195250cac43537b1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `detail`, `pic`) VALUES
(2, 'nakiya-565', '', 'camera-icon.png'),
(9, 'asd', '', 'gallery1.jpg'),
(12, 'ss', '', 'gallery7.jpg'),
(13, '11', '11', 'flower_yellow_nature_220444.jpg'),
(14, 'aaa', 'aaa', 'colors_of_nature_197715.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_details` varchar(255) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `p_price` double NOT NULL,
  `p_sale` double NOT NULL,
  `p_war` varchar(255) NOT NULL,
  `p_color` varchar(30) NOT NULL,
  `p_dims` varchar(40) NOT NULL,
  `features` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_name` (`p_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `s_id`, `brand_name`, `p_name`, `p_details`, `quantity`, `p_price`, `p_sale`, `p_war`, `p_color`, `p_dims`, `features`, `discount`, `offer`, `bar_code`) VALUES
(29, 3, 10, '3', 'fhfghfghfgh', 'wdwq', '10', 10000, 9999, 'qdw', 'qwsd', 'wqd', 'wqd', '10', '', ''),
(32, 2, 24, '3', '30'' Dextop', 'wetr4eg', '5', 22222, 76586, '3years', 'p_color', '3rt', 'etgw', 'no discount', 'ewtw', ''),
(35, 1, 19, '4', 'Sony mobile', 'wdwd', '5', 10000, 10000, '6 mounths', 'p_color', 'qqq', 'qqq', 'no discount', 'qqq', ''),
(36, 10, 25, '7', 'Night bulb', 'This light is butifull.', '10', 1000, 1000, '1 year', 'p_color', 'Bright light', 'aaaaa', '5', 'aaaaa', ''),
(37, 4, 10, '4', 'HD camara', 'High quality image .', '55', 12000, 8000, '3 mounths', 'p_color', 'qwwq', 'wedqedc  edfefc efdqedf', '20', 'Sale', ''),
(38, 4, 10, '4', ' Camera', 'High quality image .', '55', 12000, 8000, '3 mounths', 'p_color', 'qwwq', 'wedqedc  edfefc efdqedf', '20', 'Sale', ''),
(39, 3, 23, '4', ' sony-vaio', 'High quality laptop. .', '55', 22000, 20000, '3 years', 'p_color', 'qwwq', 'wedqedc  edfefc efdqedf', '20', 'Sale', ''),
(40, 3, 23, '4', ' Sony/i7', 'High quality laptop. .', '55', 32000, 31000, '3 years', 'p_color', 'qwwq', 'wedqedc  edfefc efdqedf', '20', 'Sale', ''),
(41, 3, 24, '9', ' Lenovo/i7', 'High quality laptop. .', '55', 32000, 31000, '3 years', 'p_color', 'qwwq', 'wedqedc  edfefc efdqedf', '20%', 'Sale', ''),
(42, 14, 10, '1', 'Microwave', 'Auto time set and power of no servicess.', '10', 2700, 25000, '1 years', 'Select Colour', 'hsddome', 'Home servicess.', 'No discount', '', '19580'),
(43, 14, 10, '1', 'Micro-wave', 'Auto time set and power of no servicess.', '10', 2700, 25000, '1 years', 'p_color', 'hsddome ', ' Home servicess.', '12', 'No offers', '2309'),
(45, 14, 10, '1', 'Micro - wave', 'Auto time set and power of no servicess.', '10', 2700, 25000, '1 years', 'p_color', 'hsddome ', ' Home servicess.', '25', 'No offers', '19339'),
(46, 18, 30, '10', 'seling fan', 'Faster speed', '3', 3000, 2800, '2 mounths', 'p_color', 'asadadad sdfsdf dfads ewdf .', 'No 1 fan. feling cool all time sammer and winter.', '10', 'No offers.', '2617'),
(48, 18, 30, '11', 'Seling - fan', 'Faster speed', '30', 3000, 2900, '3 mounths', 'p_color', 'asadadad sdfsdf dfads ewdf .', 'No 1 fan. feling cool all time sammer and winter.', '5', 'No offers.', '4575'),
(49, 18, 30, '11', 'PANKHA', 'Faster speed', '13', 3200, 2900, '3 mounths', 'p_color', 'asadadad sdfsdf dfads ewdf .', 'No 1 fan. feling cool all time sammer and winter.', '15 ', 'SALE offers.', '15916'),
(50, 19, 30, '3', 'S/refrigerator', 'Good quality . wihtin one hours water make ice.', '10', 13200, 12900, '3 years', 'p_color', 'asadadad sdfsdf dfads ewdf .', 'Number one carburetor.', '15 ', 'SALE offers.', '4341'),
(51, 19, 30, '4', 'S/refrigerators', 'Good quality . wihtin one hours water make ice.', '11', 15200, 12900, '3 years', 'p_color', 'asadadad sdfsdf dfads ewdf .', 'Number one carburetor. dfdsf dsfevg rfgew fedwvd.', '15 ', 'SALE offers.', '3722'),
(52, 20, 32, '1', 'ahdfsngsdc saj', 'safd dgfd gfsdbv 4rt4r dcvfd.', '12', 1000, 700, 'No', 'p_color', 'dfdsv fdsvfdb sgfvd b fvgfdv.', 'fdvgsdv d dsfvg dfaev vev fervfg.', '30', 'dsvfd.sdfdsg.fsdg', '27899'),
(53, 20, 32, '3', 'ahdfsngsdc saj scas', 'safd dgfd gfsdbv 4rt4r dcvfd.', '10', 1000, 800, 'No', 'p_color', 'dfdsv fdsvfdb sgfvd b fvgfdv.', 'fdvgsdv d dsfvg dfaev vev fervfg.', '30', 'dsvfd.sdfdsg.fsdg', '4376'),
(54, 17, 28, '4', 'asds agdvg dfa c tv', 'dvdsv rfgvsrv revgf', '53', 50000, 45612, '3 years', 'p_color', 'ddsavgfd erbv e ervgeb ', 'dvfgadv ervgaes rgfvawerd', '10', 'ddsfg egrbh.', '18289'),
(55, 17, 27, '3', 'asds agdvg  TV', 'dvdsv rfgvsrv revgf', '10', 5000, 4612, '3 years', 'p_color', 'ddsavgfd erbv e ervgeb ', 'dvfgadv ervgaes rgfvawerd', '10', 'ddsfg egrbh.', '2390'),
(56, 1, 19, '3', 'Samsung Galaxy node 2', 'fced derds  evdrv c erfc erfc.', '45', 20000, 18, '1 years', 'p_color', 'dsfcs egfvdsv esgrvfservf ergferw refger', 'wdeqwf cfcf ewfwe efw ewdfcw efc.', '2', 'dsadcs.', '24023'),
(57, 1, 21, '4', 'asdsdcfs', 'dfsavfgwa', '0', 25613, 20000, 'rfrwgftrw', 'p_color', 'werqfq', 'ewrf', 'wec', 'ewfw', '27124'),
(58, 16, 38, '3', 'Rist-watch', 'asdfghhjjkkll', '12', 1200, 1100, '3-years', '2', 'adgjlv', 'dghjlgkgh', 'adghhjh', 'nohfhf', '24005');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(235) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `pid`, `p_image`) VALUES
(1, '29', 'i4mages.jpg'),
(2, '29', 'imagfes.jpg'),
(3, '29', 'gallery8.jpg'),
(4, '30', 'imagets.jpg'),
(5, '30', 'imanges.jpg'),
(6, '30', 'ff.jpg'),
(7, '30', 'i4mages.jpg'),
(8, '30', 'im2ages.jpg'),
(9, '30', '1index.jpg'),
(10, '32', 'ima2ges.jpg'),
(11, '32', 'image2s.jpg'),
(12, '32', 'ima2ges.jpg'),
(13, '35', 'imagesm.jpg'),
(14, '35', 'imagesm.jpg'),
(15, '35', 'imagesm.jpg'),
(16, '34', 'ima2ges.jpg'),
(17, '34', 'ima2ges.jpg'),
(18, '34', 'ima2ges.jpg'),
(19, '36', 'flower_yellow_nature_220444.jpg'),
(20, '36', 'flower_yellow_nature_220444.jpg'),
(21, '36', 'flower_yellow_nature_220444.jpg'),
(22, '0', 'imagets.jpg'),
(23, '0', 'imagets.jpg'),
(24, '0', 'imagets.jpg'),
(25, '0', 'ff.jpg'),
(26, '0', 'ff.jpg'),
(27, '0', 'ff.jpg'),
(28, '0', 'imhages.jpg'),
(29, '0', 'imhages.jpg'),
(30, '0', 'imhages.jpg'),
(31, '0', 'imhages.jpg'),
(32, '0', 'imhages.jpg'),
(33, '0', 'imhages.jpg'),
(34, '37', 'camera-icon.png'),
(35, '37', 'camera-icon.png'),
(36, '37', 'camera-icon.png'),
(37, '38', 'camera-icon.png'),
(38, '38', 'camera-icon.png'),
(39, '38', 'camera-icon.png'),
(40, '39', 'ima3ges.jpg'),
(41, '39', 'ima3ges.jpg'),
(42, '39', 'ima3ges.jpg'),
(43, '40', '1index.jpg'),
(44, '40', '1index.jpg'),
(45, '40', '1index.jpg'),
(46, '41', 'image9s.jpg'),
(47, '41', 'image9s.jpg'),
(48, '41', 'image9s.jpg'),
(49, '0', 'image9s.jpg'),
(50, '0', 'image9s.jpg'),
(51, '0', 'image9s.jpg'),
(52, '43', 'watch.jpg'),
(53, '43', 'watch.jpg'),
(54, '43', 'watch.jpg'),
(55, '42', '271759-1433254988.gif'),
(56, '42', '271759-1433254988.gif'),
(57, '42', '271759-1433254988.gif'),
(58, '43', 'animals_nature_life_221468.jpg'),
(59, '43', 'animals_nature_life_221468.jpg'),
(60, '43', '271759-1433254988.gif'),
(61, '0', 'canoe_water_nature_221611.jpg'),
(62, '0', 'canoe_water_nature_221611.jpg'),
(63, '0', 'canoe_water_nature_221611.jpg'),
(64, '45', 'canoe_water_nature_221611.jpg'),
(65, '45', 'canoe_water_nature_221611.jpg'),
(66, '45', 'canoe_water_nature_221611.jpg'),
(67, '46', 'ittndex.jpg'),
(68, '46', 'ittndex.jpg'),
(69, '46', 'ittndex.jpg'),
(70, '0', 'inrrdex.jpg'),
(71, '0', 'inrrdex.jpg'),
(72, '0', 'inrrdex.jpg'),
(73, '48', 'inrrdex.jpg'),
(74, '48', 'inrrdex.jpg'),
(75, '48', 'inrrdex.jpg'),
(76, '49', 'rrrr.png'),
(77, '49', 'rrrr.png'),
(78, '49', 'rrrr.png'),
(79, '50', 'indxex.jpg'),
(80, '50', 'indxex.jpg'),
(81, '50', 'indxex.jpg'),
(82, '51', 'sindex.jpg'),
(83, '51', 'sindex.jpg'),
(84, '51', 'sindex.jpg'),
(85, '52', 'indexy.jpg'),
(86, '52', 'injdex.jpg'),
(87, '52', 'indexy.jpg'),
(88, '53', 'injdex.jpg'),
(89, '53', 'injdex.jpg'),
(90, '53', 'injdex.jpg'),
(91, '54', 'indedex.jpg'),
(92, '54', 'indexv.jpg'),
(93, '54', 'invdex.jpg'),
(94, '55', 'incdex.jpg'),
(95, '55', 'incdex.jpg'),
(96, '55', 'incdex.jpg'),
(97, '56', 'imhages.jpg'),
(98, '56', 'imanges.jpg'),
(99, '56', 'ff.jpg'),
(100, '57', 'imanges.jpg'),
(101, '57', 'imagfes.jpg'),
(102, '57', 'ff.jpg'),
(106, '0', 'imagesm.jpg'),
(107, '0', 'imhages.jpg'),
(108, '0', 'imagets.jpg'),
(109, '0', 'imagesm.jpg'),
(110, '0', 'imhages.jpg'),
(111, '0', 'imagets.jpg'),
(112, '0', 'imagesm.jpg'),
(113, '0', 'imhages.jpg'),
(114, '0', 'imagets.jpg'),
(115, '0', 'imagesm.jpg'),
(116, '0', 'imhages.jpg'),
(117, '0', 'imagets.jpg'),
(118, '0', 'imagesm.jpg'),
(119, '0', 'imhages.jpg'),
(120, '0', 'imagets.jpg'),
(121, '0', 'imagesm.jpg'),
(122, '0', 'imhages.jpg'),
(123, '0', 'imagets.jpg'),
(124, '0', 'imagesm.jpg'),
(125, '0', 'imhages.jpg'),
(126, '0', 'imagets.jpg'),
(130, '0', 'gallery2.jpg'),
(131, '0', 'gallery3.jpg'),
(132, '0', 'gallery4.jpg'),
(134, '133', 'image9s.jpg'),
(135, '134', 'imagfes.jpg'),
(137, '136', 'imhages.jpg'),
(138, '137', 'imagets.jpg'),
(139, '58', 'watch.jpg'),
(140, '139', 'watch1.jpg'),
(141, '140', 'watch2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`ord_id`),
  UNIQUE KEY `UNIQUE` (`ord_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`ord_id`, `uid`, `pid`, `qty`, `price`) VALUES
(1, 61, 29, 1, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sl_no` varchar(55) NOT NULL,
  `sl_date` date NOT NULL,
  `pr_code` varchar(55) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `sl_quantity` int(11) NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `sl_reference` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `sess_cart`
--

CREATE TABLE IF NOT EXISTS `sess_cart` (
  `sess_cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`sess_cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cetegory`
--

CREATE TABLE IF NOT EXISTS `sub_cetegory` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `sub_cetegory`
--

INSERT INTO `sub_cetegory` (`s_id`, `cat_id`, `sub_name`) VALUES
(10, 3, 'Skin touch'),
(11, 9, 'Havale Stand fan'),
(14, 13, 'Big motor'),
(16, 5, 'Home theater'),
(17, 1, 'Genarel mobile'),
(18, 1, 'windoes mobile'),
(19, 1, 'Androate mobile'),
(20, 1, 'Lumia'),
(21, 3, 'windoes'),
(22, 3, 'xp'),
(23, 1, 'windows -8'),
(24, 3, 'windows-7'),
(25, 10, 'CFL'),
(26, 10, 'led'),
(27, 17, 'General TV'),
(28, 17, 'Falt TV or Led'),
(29, 18, 'Tabile fan'),
(30, 18, 'Seling fan'),
(31, 20, 'Simple headphone'),
(32, 20, 'Air-tide headphone'),
(33, 5, 'Home theater'),
(34, 20, 'Air-tide'),
(38, 5, 'fgdgd'),
(39, 2, 'ghdf');

-- --------------------------------------------------------

--
-- Table structure for table `tabletes&ipads`
--

CREATE TABLE IF NOT EXISTS `tabletes&ipads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `opretaing_system` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `username`, `password`, `address`, `city`, `country`, `pin_code`) VALUES
(37, 'santukhamari', 'santukhamari@gmail.com', '7278833968', 'admin', 'admin', '', 0, 0, ''),
(38, 'shibu', 'sourav.rb@gmail.com', '7278833965', 'santu', '123456', '', 0, 0, ''),
(39, 'shibsankar jana ', 'shibsankar@expressgrp.com', '9593624508', 'shibsankar', '1fb0e157ee59c3a67a71691f5090a4af', '', 0, 0, ''),
(40, 'shibu', 'shibsankar.j@gmail.com', '959362701', 'shibu', '4f4b3d5a704d603ca88b2aaac3a3d73f', '', 0, 0, ''),
(48, 'fdgdf', 'fdh@gmail.com', '97000000', 'qqqq', '3bad6af0fa4b8b330d162e19938ee981', 'rfeyhgndfh ydnjyt', 0, 0, 'rfeyhgndfh ydnjyt'),
(65, 'lalu', 'lalu@gmail.com', '8798435435', 'lallu', '0aa8c88657c1942600e1dd57791c9829', 'dcqecwqe', 0, 0, '46512'),
(63, 'shibu', 'shibu@gmail.com', '1234567890', 'shibu', '4f4b3d5a704d603ca88b2aaac3a3d73f', 'sadd', 0, 0, '45'),
(64, 'shibu', 'shibu@gmail.com', '1234567890', 'shibu', '4f4b3d5a704d603ca88b2aaac3a3d73f', 'sadd', 0, 0, '45'),
(62, 'shibu', 'shibu@gmail.com', '9593624508', 'shibu', '4f4b3d5a704d603ca88b2aaac3a3d73f', 'kolkata', 0, 0, '700059'),
(59, 'aaaaa', 'aaaa@gmail.com', '987654235', 'aaaaa', '594f803b380a41396ed63dca39503542', 'aaaaa', 0, 0, '456123'),
(60, 'aaaaa', 'aaaa@gmail.com', '987654235', 'aaaaa', '594f803b380a41396ed63dca39503542', 'aaaaa', 0, 0, '456123'),
(61, 'shankar jana', 'shibsankar@gmail.com', '9593624508', 'shankar', 'e36746428c0084e5444890f46c97b6b8', 'assasda', 0, 0, '465132');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wid`, `uid`, `pid`) VALUES
(2, 61, 32),
(3, 61, 29);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
