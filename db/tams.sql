-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 06:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tams`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `areaid` int(5) NOT NULL,
  `areaname` varchar(50) NOT NULL,
  `areacode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`areaid`, `areaname`, `areacode`) VALUES
(3, 'South Central', '0001'),
(4, 'South', '0002'),
(5, 'Central', '0003'),
(6, 'North', '0004'),
(7, 'North Central', '0005'),
(8, 'Head Office', '0006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assetassign`
--

CREATE TABLE `tbl_assetassign` (
  `assignid` int(10) NOT NULL,
  `mrno` varchar(5) NOT NULL,
  `empnum` int(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `hwassetcode` varchar(15) NOT NULL,
  `swassetcode` varchar(15) NOT NULL,
  `swassetcode2` varchar(15) NOT NULL,
  `swassetcode3` varchar(15) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `deptname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assetassign`
--

INSERT INTO `tbl_assetassign` (`assignid`, `mrno`, `empnum`, `fname`, `lname`, `hwassetcode`, `swassetcode`, `swassetcode2`, `swassetcode3`, `branchname`, `deptname`) VALUES
(20, '00004', 555555, 'Chuchu', 'Eclabush', 'OfE0000000002', '', '', '', 'Head Office', 'Human Resource'),
(21, '00005', 88888, 'Manuel', 'Itopo', 'ME0000000004', '', '', '', 'Lucena', 'EDO'),
(22, '00006', 88888, 'Manuel', 'Itopo', 'CE0000001111', 'ME0000000001', 'ME0000000002', 'ME0000000003', 'Lucena', 'EDO'),
(23, '00007', 5656, 'Eric', 'Escalante', 'CE0000000999', '', '', '', 'Taguig', 'MITS'),
(24, '00008', 787878, 'Chuchay', 'Ecleveria', 'CE0000001112', '', '', '', 'Pampanga', 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assetclass`
--

CREATE TABLE `tbl_assetclass` (
  `a_classid` int(5) NOT NULL,
  `classcode` varchar(5) NOT NULL,
  `classdesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assetclass`
--

INSERT INTO `tbl_assetclass` (`a_classid`, `classcode`, `classdesc`) VALUES
(42, 'CE', 'Computer Equipment'),
(43, 'ME', 'Minor Equipment'),
(44, 'OfE', 'Office Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignuser`
--

CREATE TABLE `tbl_assignuser` (
  `asgnuserid` int(3) NOT NULL,
  `empnum` int(6) NOT NULL,
  `asgn_fname` varchar(50) NOT NULL,
  `asgn_lname` varchar(50) NOT NULL,
  `euemail` varchar(50) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `position` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assignuser`
--

INSERT INTO `tbl_assignuser` (`asgnuserid`, `empnum`, `asgn_fname`, `asgn_lname`, `euemail`, `deptname`, `branchname`, `position`) VALUES
(1, 5656, 'Eric', 'Escalante', 'eescalante@tams.net', 'MITS', 'Taguig', 'Programmer'),
(2, 998988, 'Manuel', 'Enverga', 'mseuf@tams.net', 'EDO', 'Head Office', 'CEO'),
(3, 88888, 'Manuel', 'Itopo', 'msdj@tams.net', 'EDO', 'Lucena', 'Founder'),
(4, 787878, 'Chuchay', 'Ecleveria', 'che@tams.net', 'Human Resource', 'Pampanga', 'Assistant HR'),
(8, 8855, 'Arjay', 'Manlangit', 'arjaym@tams.net', 'SEDS', 'Dasma', 'ILCO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branchid` int(5) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `branchcode` varchar(6) NOT NULL,
  `areacode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branchid`, `branchname`, `branchcode`, `areacode`) VALUES
(1, 'Dasma', '50101', '0001'),
(2, 'Imus', '50102', '0001'),
(3, 'Taguig', '50106', '0003'),
(4, 'Las PiÃ±as', '60105', '0003'),
(5, 'Lucena', '70101', '0002'),
(6, 'Atimonan', '70102', '0002'),
(7, 'Ilocos', '80101', '0004'),
(8, 'Pampanga', '80102', '0004'),
(9, 'Head Office', '848448', '0006'),
(10, 'Palawan', '7989', '0003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `deptid` int(5) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `deptcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`deptid`, `deptname`, `deptcode`) VALUES
(1, 'MITS', '1122'),
(2, 'Legal', '6666'),
(3, 'Human Resource', '2212'),
(4, 'SEDS', '8488'),
(5, 'EDO', '1123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hwinfo`
--

CREATE TABLE `tbl_hwinfo` (
  `assetid` int(10) NOT NULL,
  `assetcat` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `hwassetclass` varchar(5) NOT NULL,
  `assetcode` varchar(10) NOT NULL,
  `assetdesc` varchar(50) NOT NULL,
  `serialnum` varchar(50) DEFAULT NULL,
  `specs` varchar(10000) NOT NULL,
  `acqdate` date NOT NULL,
  `acqcost` varchar(10) NOT NULL,
  `depr` int(3) NOT NULL,
  `hwfinacode` varchar(15) NOT NULL,
  `assigned` int(1) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `prodimg` varchar(100) NOT NULL,
  `invnum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hwinfo`
--

INSERT INTO `tbl_hwinfo` (`assetid`, `assetcat`, `type`, `hwassetclass`, `assetcode`, `assetdesc`, `serialnum`, `specs`, `acqdate`, `acqcost`, `depr`, `hwfinacode`, `assigned`, `status`, `prodimg`, `invnum`) VALUES
(3, 'System Unit', 'Hardware', 'CE', '0000000001', 'Intel i5 Quad-Core', '', '<div>8GB Ram DDR4</div>\r\n<div>2GB Video Card</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<p>&nbsp;</p>', '2018-04-01', '20,000', 5, 'CE0000000001', 1, 'DELETED', '', ''),
(4, 'Chairs', 'Funitures', 'OfE', '0000000002', 'Monoblock', '', '<p>12 Pcs Color White</p>', '2018-05-01', '6,000', 0, 'OfE0000000002', 1, 'FOR DELIVERY', '', ''),
(5, 'System Unit', 'Hardware', 'CE', '0000000003', 'Intel I3 4.2Ghz', '15251121', '<p>2x 4GB DDR3 RAM</p>\r\n<p>2GB Video Card</p>\r\n<p>1TB Harddisk</p>\r\n<p>&nbsp;</p>', '2018-05-16', '20,000', 3, 'CE0000000003', 1, 'DELETED', '', ''),
(6, 'UPS', 'Peripherals', 'ME', '0000000004', 'PowerCom 1000AV', '0122131512', '<p>Color Black</p>', '2018-05-09', '7,000', 3, 'ME0000000004', 1, 'FOR DELIVERY', '', ''),
(7, 'UPS', 'Funitures', 'CE', '0000000010', 'Testt7yy', 'fgvhb', '<p>qwq</p>', '2018-05-09', '1,000', 15, 'CE0000000010', 1, 'DELETED', '', ''),
(8, 'Steel Cabinet', 'Funitures', 'ME', '0000000011', 'Asasasas', 'asasas', '', '2018-05-17', '10,000', 10, 'ME0000000011', 1, 'DELETED', '', ''),
(9, 'System Unit', 'Hardware', 'CE', '0000001111', 'Intel i3 4.20Ghz', '545545155', '<p>8GB RAM DDR4</p>\r\n<p>1TB Harddisk Drive Seagate S/N: 4554545454</p>\r\n<p>2GB HD Radeon Video Card</p>', '2018-05-14', '25,000', 5, 'CE0000001111', 1, 'FOR DELIVERY', '', ''),
(10, 'Monitor', 'Peripherals', 'CE', '0000000999', 'AOC LED 17 inch', 'vavsdsavdvsdv', '', '2018-05-03', '5,000', 3, 'CE0000000999', 1, 'DEPLOYED', '', ''),
(11, 'Chairs', 'Funitures', 'CE', '0000001112', 'asdj', '128y3u', '', '2018-05-03', '2,213.00', 3, 'CE0000001112', 1, 'FOR DELIVERY', '', ''),
(12, 'Monitor', 'Hardware', 'CE', '0000001113', 'LG 17\"', '13716237', '<p>Color Black</p>', '2018-05-09', '121.00', 0, 'CE0000001113', 0, 'FOR ASSIGNING', '', ''),
(13, 'Monitor', 'Peripherals', 'CE', '0000001114', 'UPS', '9982sdmaj99', '<p>2000AV</p>\r\n<p>Color Black</p>', '2018-05-09', '50,000.00', 0, 'CE0000001114', 0, 'FOR ASSIGNING', '', ''),
(14, 'Chairs', 'Funitures', 'CE', '0000001115', 'dfsfdf', 'df', '<p>dfds</p>', '2018-06-13', '121.00', 0, 'CE0000001115', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(15, 'Monitor', 'Hardware', 'CE', '0000001116', 'dfsdds', '2323', '<p>df</p>', '2018-06-13', '121.00', 3, 'CE0000001116', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(16, 'Chairs', 'Funitures', 'CE', '0000001117', 'dnj', 'dd', '<p>sdsd</p>', '2018-06-06', '121.00', 0, 'CE0000001117', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(17, 'Chairs', 'Hardware', 'CE', '0000001118', 'twery', 'sa', '<p>as</p>', '2018-06-06', '121.00', 3, 'CE0000001118', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(19, 'Monitor', 'Funitures', 'CE', '0000001119', 'sdasd', '2323', '<p>&nbsp;</p>\r\n<p>j</p>', '2018-05-30', '331.00', 0, 'CE0000001119', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(20, 'Monitor', 'Hardware', 'CE', '0000001120', 'hjgh', 'hj', '<p>hjgh</p>', '2018-06-19', '121.00', 3, 'CE0000001120', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(21, 'Steel Cabinet', 'Funitures', 'ME', '0000001121', 'SD', 'DSD', '<p>SD</p>', '2018-06-11', '331.00', 5, 'ME0000001121', 0, 'FOR ASSIGNING', 'prodimg/2x2.jpg', ''),
(23, 'Chairs', 'Hardware', 'CE', '0000001122', 'twery', '7147', '<p>ds</p>', '2018-06-21', '121.00', 0, 'CE0000001122', 0, 'FOR ASSIGNING', 'prodimg/', ''),
(24, 'Chairs', 'Funitures', 'CE', '0000001123', 'io', 'o', '<p>o</p>', '2018-06-08', '121.00', 0, 'CE0000001123', 0, 'FOR ASSIGNING', 'prodimg/', ''),
(25, 'Monitor', 'Hardware', 'CE', '0000001124', 'd', 'cv', '<p>vc</p>', '2018-06-14', '2,121.00', 3, 'CE0000001124', 0, 'FOR ASSIGNING', 'prodimg/sign-check-icon.png', ''),
(26, 'Steel Cabinet', 'Peripherals', 'ME', '0000001125', 'testig ulit', 'q', '<p>sq</p>', '2018-06-06', '2,121.00', 10, 'ME0000001125', 0, 'FOR ASSIGNING', 'prodimg/sign-check-icon.png', ''),
(27, 'Monitor', 'Funitures', 'CE', '0000001126', 'a', 'a', '<p>a</p>', '2018-06-21', '331.00', 3, 'CE0000001126', 0, 'FOR ASSIGNING', 'prodimg/6be20b9c68c12726c26209df58d43093.jpg', ''),
(28, 'Monitor', 'Funitures', 'CE', '0000001127', 'a', 'a', '<p>a</p>', '2018-06-21', '331.00', 3, 'CE0000001127', 0, 'FOR ASSIGNING', 'prodimg/6be20b9c68c12726c26209df58d43093.jpg', ''),
(29, 'Monitor', 'Funitures', 'CE', '0000001128', 'a', 'a', '<p>a</p>', '2018-06-21', '331.00', 3, 'CE0000001128', 0, 'FOR ASSIGNING', 'prodimg/6be20b9c68c12726c26209df58d43093.jpg', ''),
(31, 'Monitor', 'Funitures', 'CE', '0000001129', 'a', 'a', '<p>a</p>', '2018-06-21', '331.00', 3, 'CE0000001129', 0, 'FOR ASSIGNING', 'prodimg/6be20b9c68c12726c26209df58d43093.jpg', ''),
(33, 'Monitor', 'Funitures', 'CE', '0000001130', 'a', 'a', '<p>a</p>', '2018-06-21', '331.00', 3, 'CE0000001130', 0, 'FOR ASSIGNING', 'prodimg/6be20b9c68c12726c26209df58d43093.jpg', ''),
(34, 'Monitor', 'Peripherals', 'ME', '0000001131', 'testig ulit', '7147', '<p>;</p>', '2018-06-19', '331.00', 5, 'ME0000001131', 0, 'FOR ASSIGNING', 'prodimg/27781395_1776732265682425_1023488933_n.jpg', ''),
(35, 'Chairs', 'Hardware', 'ME', '0000001132', 'dnj', '7147', '<p>a</p>', '2018-06-14', '2,121.00', 5, 'ME0000001132', 0, 'FOR ASSIGNING', 'prodimg/mantenimiento-informatico2.png', ''),
(36, 'Monitor', 'Hardware', 'CE', '0000001133', 'dnj', 'fsad', '<p>da</p>', '2018-06-20', '331.00', 10, 'CE0000001133', 0, 'FOR ASSIGNING', 'prodimg/mantenimiento-informatico2.png', ''),
(37, 'Monitor', 'Hardware', 'ME', '0000001134', 'testig ulit', '7147', '<p>q</p>', '2018-06-06', '2,121.00', 5, 'ME0000001134', 0, 'FOR ASSIGNING', 'prodimg/user-management_3.jpg', ''),
(38, 'Steel Cabinet', 'Peripherals', 'CE', '0000001135', 'twery', '2323', '<p>S</p>', '2018-06-13', '2,121.00', 10, 'CE0000001135', 0, 'FOR ASSIGNING', 'prodimg/mantenimiento-informatico2.png', ''),
(39, 'Monitor', 'Peripherals', 'ME', '0000001136', 'dnj', '712783', '<p>tr</p>', '2018-06-16', '111.00', 10, 'ME0000001136', 0, 'FOR ASSIGNING', 'prodimg/', ''),
(40, 'Steel Cabinet', 'Peripherals', 'ME', '0000001137', 'nsajdn', '2323', '<p>sqs</p>', '2018-06-21', '2,121.00', 10, 'ME0000001137', 0, 'FOR ASSIGNING', 'prodimg/', ''),
(41, 'Monitor', 'Hardware', 'CE', '0000001138', 'final test', 'fsad', '<p>as</p>', '2018-06-15', '331.00', 5, 'CE0000001138', 0, 'FOR ASSIGNING', 'prodimg/mantenimiento-informatico2.png', ''),
(42, 'Steel Cabinet', 'Hardware', 'ME', '0000001139', 'nsajdn', '128y3u', '<p>asas</p>', '2018-06-30', '273,123.00', 15, 'ME0000001139', 0, 'FOR ASSIGNING', 'prodimg/user-management_3.jpg', ''),
(43, 'Monitor', 'Hardware', 'CE', '0000001140', 'dsfsfdsf', 'df', '<p>fdf</p>', '2018-06-16', '2,121.00', 3, 'CE0000001140', 0, 'FOR ASSIGNING', 'prodimg/1200px-HTML5_logo_and_wordmark.svg.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invcat`
--

CREATE TABLE `tbl_invcat` (
  `catid` int(5) NOT NULL,
  `assetcat` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `classcode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invcat`
--

INSERT INTO `tbl_invcat` (`catid`, `assetcat`, `type`, `classcode`) VALUES
(1, 'Antivirus', 'Software', 'ME'),
(4, 'Operating System', 'Software', 'ME'),
(5, 'MS Office', 'Software', 'ME'),
(7, 'Chairs', 'Funitures', 'OfE'),
(8, 'Steel Cabinet', 'Funitures', 'OfE'),
(9, 'Monitor', 'Hardware', 'CE'),
(10, 'UPS', 'Peripherals', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_swinfo`
--

CREATE TABLE `tbl_swinfo` (
  `swassetid` int(10) NOT NULL,
  `swassetclass` varchar(5) NOT NULL,
  `swassetcat` varchar(20) NOT NULL,
  `swassetcode` varchar(10) NOT NULL,
  `swassetdesc` varchar(50) NOT NULL,
  `swprodkey` varchar(50) NOT NULL,
  `swacqdate` date NOT NULL,
  `swexpdate` date NOT NULL,
  `swacqcost` varchar(10) NOT NULL,
  `assetcat` varchar(20) NOT NULL,
  `swfinacode` varchar(15) NOT NULL,
  `swassigned` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_swinfo`
--

INSERT INTO `tbl_swinfo` (`swassetid`, `swassetclass`, `swassetcat`, `swassetcode`, `swassetdesc`, `swprodkey`, `swacqdate`, `swexpdate`, `swacqcost`, `assetcat`, `swfinacode`, `swassigned`) VALUES
(1, 'ME', '', '0000000001', 'Sophos Antivirus', 'ABCDE-12345-98745-C2C3D3', '2018-05-16', '0000-00-00', '2,500.00', 'Software', 'ME0000000001', 0),
(2, 'ME', '', '0000000002', 'Windows 10 x64', 'ABCDE-12345-98745-C2C3D3-12345', '2018-05-09', '0000-00-00', '5,000.00', 'Software', 'ME0000000002', 0),
(3, 'ME', '', '0000000003', 'Office 365', 'aajgsjdja-asas-aasa-sasas', '2018-05-09', '2019-05-09', '2,520.00', 'Software', 'ME0000000003', 0),
(5, 'ME', 'Antivirus', '0000000004', 'Avast Free', '1234567890', '2018-05-06', '2018-05-31', '0.00', 'Software', 'ME0000000004', 0),
(6, 'ME', 'Antivirus', '0000000005', 'Jnasjxn', 'smdkM', '2018-05-15', '2018-05-15', '3,000.00', 'Software', 'ME0000000005', 0),
(7, 'ME', 'Antivirus', '0000000006', 'AVG', 'sdfghijkpl', '2018-05-15', '2019-01-15', '6,767.00', 'Software', 'ME0000000006', 0),
(8, 'ME', 'MS Office', '0000000007', 'AVG', 'k;dwml', '2018-06-14', '2018-06-12', '6,767.00', 'Software', 'ME0000000007', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `uid` int(5) NOT NULL,
  `empid` int(6) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `utype` varchar(5) NOT NULL,
  `deptcode` int(6) NOT NULL,
  `branchname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `empid`, `uname`, `pwd`, `email`, `fname`, `lname`, `utype`, `deptcode`, `branchname`) VALUES
(17, 4053, 'admin', 'password', 'chester_anda@tams.net', 'Chester', 'Anda', 'ADMIN', 1122, 'Lucena'),
(25, 15151, 'secuser', 'secuser', 'secuser@tams.net', 'Second', 'Usiner', 'USER', 1122, 'Dasma'),
(26, 121212, '', 'three', 'thirduser@tams.net', 'Thirdy', 'Usery', 'ADMIN', 1122, 'Dasma'),
(29, 66665, 'user1', 'user1', 'chezs@sdsd', 'Jsdj', 'Sdsjd', 'ADMIN', 1122, 'Dasma'),
(30, 6767, 'Test', 'test', 'testuser@tams.net', 'Testing', 'Testing', 'USER', 8488, 'Palawan'),
(31, 5656, '5656', 'ddere', 'ere@eff.fg', 'Fdfd', 'Sdsd', 'ADMIN', 1122, 'Dasma'),
(32, 769, 'fgfg', 'uhu', 'ygh@kjhj', 'Yg', 'Yguh', 'USER', 1123, 'Las PiÃ±as');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`areaid`),
  ADD UNIQUE KEY `areacode_2` (`areacode`),
  ADD KEY `areacode` (`areacode`);

--
-- Indexes for table `tbl_assetassign`
--
ALTER TABLE `tbl_assetassign`
  ADD PRIMARY KEY (`assignid`);

--
-- Indexes for table `tbl_assetclass`
--
ALTER TABLE `tbl_assetclass`
  ADD PRIMARY KEY (`a_classid`),
  ADD KEY `classcode` (`classcode`);

--
-- Indexes for table `tbl_assignuser`
--
ALTER TABLE `tbl_assignuser`
  ADD PRIMARY KEY (`asgnuserid`),
  ADD KEY `empnum` (`empnum`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branchid`),
  ADD KEY `branchname` (`branchname`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`deptid`),
  ADD KEY `deptcode` (`deptcode`);

--
-- Indexes for table `tbl_hwinfo`
--
ALTER TABLE `tbl_hwinfo`
  ADD PRIMARY KEY (`assetid`),
  ADD UNIQUE KEY `hwfinacode` (`hwfinacode`),
  ADD KEY `assetcode` (`assetcode`);

--
-- Indexes for table `tbl_invcat`
--
ALTER TABLE `tbl_invcat`
  ADD PRIMARY KEY (`catid`),
  ADD KEY `type` (`type`),
  ADD KEY `assetcat` (`assetcat`);

--
-- Indexes for table `tbl_swinfo`
--
ALTER TABLE `tbl_swinfo`
  ADD PRIMARY KEY (`swassetid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `areaid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_assetassign`
--
ALTER TABLE `tbl_assetassign`
  MODIFY `assignid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_assetclass`
--
ALTER TABLE `tbl_assetclass`
  MODIFY `a_classid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_assignuser`
--
ALTER TABLE `tbl_assignuser`
  MODIFY `asgnuserid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `deptid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hwinfo`
--
ALTER TABLE `tbl_hwinfo`
  MODIFY `assetid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_invcat`
--
ALTER TABLE `tbl_invcat`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_swinfo`
--
ALTER TABLE `tbl_swinfo`
  MODIFY `swassetid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
