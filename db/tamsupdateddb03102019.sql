-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 02:36 PM
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
(16, 'South Central', '200002'),
(17, 'South', '200003'),
(18, 'Central', '200004'),
(19, 'North', '200005'),
(20, 'North Central', '200006'),
(21, 'Head Office', '200001');

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
  `branchname` varchar(50) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `hwasset` varchar(50) NOT NULL,
  `hwctrlnum` varchar(10) NOT NULL,
  `serialnum` varchar(20) DEFAULT NULL,
  `assetclass` varchar(5) NOT NULL,
  `assetcode` varchar(12) NOT NULL,
  `os` varchar(50) DEFAULT NULL,
  `av` varchar(50) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `remarks` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assetassign`
--

INSERT INTO `tbl_assetassign` (`assignid`, `mrno`, `empnum`, `fname`, `lname`, `branchname`, `deptname`, `hwasset`, `hwctrlnum`, `serialnum`, `assetclass`, `assetcode`, `os`, `av`, `office`, `remarks`) VALUES
(142, '00001', 5000, 'Arshe', 'Anda', 'Head Office', 'Admin', 'Acer D271', '000001', '123456789cvbnm', 'CE', '0000000001', '', '0000000002', '0000000003', 'DELIVERED'),
(143, '00002', 4050, 'Chlarenze Arkizha', 'Anda', 'Head Office', 'Human Resource', 'Acer P166HQL', '000002', 'NKNIIiu998nkn', 'ME', '0000000002', '', '', '', 'DELIVERED'),
(144, '00003', 90101, 'Edward', 'Bailon', 'Ilocos', 'MITS', 'Epson XP-440', '000003', 'dhdgdfgdfg434324', 'ME', '0000000003', '', '', '', 'DEPLOYED'),
(145, '00004', 30870, 'Angelica', 'Dela Cruz', 'Zambales', 'Legal', 'Testing lang', '000004', '', 'OfE', '0000000004', '', '', '', 'DEPLOYED'),
(147, '00005', 4050, 'Chlarenze Arkizha', 'Anda', 'Head Office', 'Human Resource', 'Acer P166HQL', '000002', 'qqqq', 'CE', '0000000005', '', '', '', 'DELIVERED'),
(148, '00006', 4050, 'Chlarenze Arkizha', 'Anda', 'Head Office', 'Human Resource', 'Acer P166HQL', '000002', 'asljnsjn', 'CE', '0000000006', '', '', '', 'FOR DELIVERY'),
(149, '00007', 4050, 'Chlarenze Arkizha', 'Anda', 'Head Office', 'Human Resource', 'Acer P166HQL', '000002', 'jZXHcskN', 'CE', '0000000007', '', '', '', 'FOR DELIVERY');

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
(45, 'CE', 'Computer Equipment'),
(46, 'ME', 'Minor Equipment'),
(47, 'OfE', 'Office Equipment');

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
(9, 4050, 'Chlarenze Arkizha', 'Anda', 'caanda@tams.net', 'Human Resource', 'Head Office', 'HR Assistant'),
(10, 5000, 'Arshe', 'Anda', 'acanda@tams.net', 'Admin', 'Head Office', 'Manager'),
(11, 90101, 'Edward', 'Bailon', 'embailon@tams.net', 'MITS', 'Zambales', 'Technical Support'),
(12, 30870, 'Angelica', 'Dela Cruz', 'adelacruz@tams.net', 'Legal', 'Zambales', 'Legal Assistant'),
(13, 4053, 'Chester ', 'Andaq', 'chesteranda@tams.net', 'EDO', 'Head Office', 'Developer');

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
(12, 'Head Office', '700001', '200001'),
(13, 'Dasma', '700002', '200002'),
(14, 'Imus', '700003', '200002'),
(15, 'Bacoor', '700004', '200002'),
(16, 'Albay', '800001', '200003'),
(17, 'Naga', '800002', '200003'),
(18, 'Sorsogon', '800003', '200003'),
(20, 'Taguig', '600002', '200004'),
(21, 'Tondo', '600003', '200004'),
(22, 'Ilocos', '900001', '200005'),
(23, 'Baguio', '900002', '200005'),
(24, 'Isabela', '900003', '200005'),
(25, 'Pampanga', '500001', '200006'),
(26, 'Bataan', '500002', '200006'),
(27, 'Zambales', '500003', '200006'),
(29, 'Pasay', '600001', '200004');

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
(14, 'Admin', '1001'),
(15, 'Human Resource', '1002'),
(16, 'Legal', '1003'),
(17, 'MITS', '1004'),
(18, 'EDO', '1005');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hwinfo`
--

CREATE TABLE `tbl_hwinfo` (
  `assetid` int(10) NOT NULL,
  `ctrlnum` varchar(10) NOT NULL,
  `assetcat` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `assetdesc` varchar(50) NOT NULL,
  `specs` varchar(10000) NOT NULL,
  `swprodkey` varchar(50) NOT NULL,
  `acqdate` date NOT NULL,
  `swexpdate` date NOT NULL,
  `acqcost` varchar(50) NOT NULL,
  `depr` int(3) NOT NULL,
  `assigned` int(1) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `prodimg` varchar(100) NOT NULL,
  `invnum` varchar(50) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hwinfo`
--

INSERT INTO `tbl_hwinfo` (`assetid`, `ctrlnum`, `assetcat`, `type`, `assetdesc`, `specs`, `swprodkey`, `acqdate`, `swexpdate`, `acqcost`, `depr`, `assigned`, `status`, `prodimg`, `invnum`, `qty`) VALUES
(134, '000001', 'Chairs', 'Furnitures', 'chairs', '', '', '2019-02-06', '0000-00-00', '100.00', 3, 0, 'FOR ASSIGNING', 'prodimg/noimg.jpeg', '1', '1'),
(135, '000001', 'Peripherals', 'Accessories', 'peripheral', '', '', '2019-02-20', '0000-00-00', '2,000.00', 10, 0, 'FOR ASSIGNING', 'prodimg/noimg.jpeg', '1', '1'),
(136, '000002', '', '', '', '', '', '2019-03-13', '0000-00-00', '', 0, 0, 'FOR ASSIGNING', 'prodimg/noimg.jpeg', '1200', ''),
(137, '000003', 'Chairs', 'Furnitures', 'testing post', 'Testing Post', '', '0000-00-00', '0000-00-00', '11.00', 5, 0, 'FOR ASSIGNING', 'prodimg/noimg.jpeg', 'ters', '1'),
(138, '000004', 'Chairs', 'Furnitures', 'qw', 'Sas', '', '2019-03-11', '0000-00-00', '12.00', 3, 0, 'FOR ASSIGNING', 'prodimg/noimg.jpeg', '1', '1'),
(139, '000005', 'Laptop', 'Hardware', '12121212', '', '', '0000-00-00', '0000-00-00', '12,121,212.00', 15, 0, 'FOR ASSIGNING', 'prodimg/6be20b9c68c12726c26209df58d43093.jpg', '2', '12'),
(140, '000006', 'Cabinet', 'Furnitures', 'testing new', 'Testing New', '', '2019-03-04', '0000-00-00', '1.00', 0, 0, 'FOR ASSIGNING', 'prodimg/WIN_20180222_150119.JPG', '122', '1');

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
(12, 'Printer Ink', 'Hardware Accelaration', 'CE'),
(13, 'System Unit', 'Hardware', 'CE'),
(14, 'Monitor', 'Hardware', 'CE'),
(18, 'Cabinet', 'Furnitures', 'OfE'),
(19, 'Tables', 'Furnitures', 'OfE'),
(20, 'Chairs', 'Furnitures', 'OfE'),
(21, 'Netbook', 'Hardware', 'CE'),
(22, 'Laptop', 'Hardware', 'CE'),
(47, 'Peripherals', 'Accessories', 'ME'),
(48, 'Software', 'Antivirus', 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` varchar(5) NOT NULL,
  `invnum` varchar(10) NOT NULL,
  `ctrlnum` varchar(10) NOT NULL,
  `invdate` date NOT NULL,
  `description` varchar(20) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `created_by` varchar(20) NOT NULL,
  `date_modified` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `modified_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_swinfo`
--

CREATE TABLE `tbl_swinfo` (
  `swassetid` int(10) NOT NULL,
  `swassettype` varchar(20) NOT NULL,
  `swclass` varchar(2) NOT NULL,
  `swassetcode` varchar(12) NOT NULL,
  `swassetdesc` varchar(50) NOT NULL,
  `swprodkey` varchar(50) NOT NULL,
  `swacqdate` date NOT NULL,
  `swexpdate` date NOT NULL,
  `swacqcost` varchar(10) NOT NULL,
  `assetcat` varchar(20) NOT NULL,
  `swqty` varchar(5) NOT NULL,
  `swassigned` int(1) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_swinfo`
--

INSERT INTO `tbl_swinfo` (`swassetid`, `swassettype`, `swclass`, `swassetcode`, `swassetdesc`, `swprodkey`, `swacqdate`, `swexpdate`, `swacqcost`, `assetcat`, `swqty`, `swassigned`, `status`) VALUES
(21, 'Operating System', 'ME', '0000000001', 'Windows 10 x64', 'ABCDE-FGHIJ-KLMNO-PQRST-UVWXY', '2018-07-02', '0000-00-00', '4,560.00', 'Software', '29', 0, ''),
(22, 'Antivirus', 'ME', '0000000002', 'Sophos', '1234567890abcdeghkl', '2018-07-11', '2020-07-12', '3,540.00', 'Software', '23', 0, ''),
(23, 'Office', 'ME', '0000000003', 'Windows Office 365', 'POIUU-12YTG-HGY67-QWERT-NNHI', '2018-07-02', '0000-00-00', '2,460.00', 'Software', '8', 0, ''),
(24, 'Operating System', 'ME', '0000000004', 'A', '767-89809898', '2018-10-10', '2018-10-09', '1.00', 'Software', '1', 0, '');

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
(1, 1234, 'admin', 'password', 'cbanda@tams.net', 'Chester', 'Anda', 'ADMIN', 1, '1'),
(33, 4053, 'cbanda', 'chezter', 'chester_anda@yahoo.com', 'Chester', 'Anda', 'USER', 1001, 'Dasma'),
(34, 7777, 'newuser', 'newuser', 'newuser@tams.net', 'New ', 'User', 'USER', 1001, 'Baguio');

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
  ADD KEY `ctrlnum` (`ctrlnum`);

--
-- Indexes for table `tbl_invcat`
--
ALTER TABLE `tbl_invcat`
  ADD PRIMARY KEY (`catid`),
  ADD KEY `type` (`type`),
  ADD KEY `assetcat` (`assetcat`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_swinfo`
--
ALTER TABLE `tbl_swinfo`
  ADD PRIMARY KEY (`swassetid`),
  ADD KEY `swassetcode` (`swassetcode`);

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
  MODIFY `areaid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_assetassign`
--
ALTER TABLE `tbl_assetassign`
  MODIFY `assignid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tbl_assetclass`
--
ALTER TABLE `tbl_assetclass`
  MODIFY `a_classid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_assignuser`
--
ALTER TABLE `tbl_assignuser`
  MODIFY `asgnuserid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branchid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `deptid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_hwinfo`
--
ALTER TABLE `tbl_hwinfo`
  MODIFY `assetid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tbl_invcat`
--
ALTER TABLE `tbl_invcat`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_swinfo`
--
ALTER TABLE `tbl_swinfo`
  MODIFY `swassetid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
