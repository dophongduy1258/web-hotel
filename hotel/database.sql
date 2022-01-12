-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 10:45 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citipos_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `varname` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `defaultvalue` text NOT NULL,
  `datatype` varchar(50) NOT NULL,
  `group` varchar(50) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`varname`, `title`, `value`, `defaultvalue`, `datatype`, `group`, `priority`) VALUES
('begin_time', 'Thời gian hệ thống bắt đâu hoạt động', '1515734977', 'Sử dụng cho chức năng union nhiều table theo tháng - 1427821200 -  01042015 : 1433091600 - 01062015:  truoc khi sửa:1427821200 01/04/2015 - Sau khi sưa: 1406826000: 01/08/2014', 'text', 'setting', 0),
('currency', 'Định dạng tiền tệ', 'VNĐ', 'VNĐ or USD or AUD', '', '', 0),
('decimal', 'Định dạng tiền tệ', '0', '0 or 2', '', '', 0),
('lang', 'Language', '', 'vi|en', 'text', 'setting', 0),
('license_type', 'Loại license', 'Gold', 'Silver||Glod', 'input', 'site', 1),
('logo_url', 'Url logo website', 'https://xuananh.mb360.vn/pos/poscafe/uploads/xuananh/2017-03-09/42.112.226.173-MB360.vn-1489068821.jpg', 'http://duocnamviet.mb360.vn/css/theme1/images/logo_shop.png', '1', '1', 0),
('perpage', 'Phân trang', '20', '20', 'text', 'setting', 0),
('version', 'Version of webzite', '1.1428', '1.00', 'input', 'version', 1),
('webtitle', 'rc', 'CitiPOS', 'rc', 'input', 'site', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`varname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
