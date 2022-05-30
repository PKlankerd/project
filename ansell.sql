-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 02:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ansell`
--

-- --------------------------------------------------------

--
-- Table structure for table `afterprocess`
--

CREATE TABLE `afterprocess` (
  `Productionlot` varchar(11) NOT NULL,
  `StartAfter` datetime NOT NULL,
  `StartShift` varchar(4) NOT NULL,
  `FinishedAfter` datetime NOT NULL,
  `FinishedShift` varchar(4) NOT NULL,
  `Operator` varchar(25) NOT NULL,
  `afterprocess` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afterprocess`
--

INSERT INTO `afterprocess` (`Productionlot`, `StartAfter`, `StartShift`, `FinishedAfter`, `FinishedShift`, `Operator`, `afterprocess`) VALUES
('S131421001', '2021-12-10 10:01:00', 'AM', '2021-12-16 10:01:00', 'AM', 'kokp', ''),
('S131521001', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', ''),
('S132721001', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bincard`
--

CREATE TABLE `bincard` (
  `Productionlot` varchar(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `startShift` varchar(15) NOT NULL,
  `finishedDate` datetime NOT NULL,
  `finishedShift` varchar(25) NOT NULL,
  `afterprocess` varchar(25) NOT NULL,
  `operator` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bincard`
--

INSERT INTO `bincard` (`Productionlot`, `startDate`, `startShift`, `finishedDate`, `finishedShift`, `afterprocess`, `operator`) VALUES
('S130721121', '2021-11-12 11:40:00', 'NS', '0000-00-00 00:00:00', '', '', ''),
('S131421001', '2021-11-10 16:14:00', 'NS', '2021-11-10 16:14:00', 'AM', 'CHLORINATED', ''),
('S131421993', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', ''),
('S131521001', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'NON-AFTER PROCESS', ''),
('S132721001', '2021-11-18 08:48:00', 'PM', '2021-11-12 08:48:00', 'PM', 'NON-AFTER PROCESS', ''),
('S133621001', '2021-12-02 09:00:00', 'AM', '2021-12-02 12:00:00', 'NS', 'NON-AFTER PROCESS', ''),
('S134321001', '2021-12-10 09:14:00', 'AM', '2021-12-10 09:15:00', 'NS', 'CHLORINATED', ''),
('S134921001', '2021-12-12 12:35:00', 'NS', '0000-00-00 00:00:00', '', 'CHLORINATED', ''),
('S232622001', '2021-11-23 15:21:00', 'PM', '2021-11-23 15:22:00', 'AM', 'CHLORINATED', ''),
('S233621002', '2021-12-03 12:58:00', 'PM', '2021-12-03 11:57:00', 'NS', 'CHLORINATED', '');

-- --------------------------------------------------------

--
-- Table structure for table `bonding`
--

CREATE TABLE `bonding` (
  `bondingLotNo` int(11) NOT NULL,
  `productcode` varchar(8) NOT NULL,
  `size` varchar(5) NOT NULL,
  `shell` varchar(9) NOT NULL,
  `Liner` varchar(9) NOT NULL,
  `Quantity` varchar(15) NOT NULL,
  `ProductionDate` datetime NOT NULL,
  `RecordedBy` varchar(15) NOT NULL,
  `Quality` varchar(15) NOT NULL,
  `InspectionDate` datetime NOT NULL,
  `InspectionBy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonding`
--

INSERT INTO `bonding` (`bondingLotNo`, `productcode`, `size`, `shell`, `Liner`, `Quantity`, `ProductionDate`, `RecordedBy`, `Quality`, `InspectionDate`, `InspectionBy`) VALUES
(21070001, '58-430', '7R', 'BKK', 'White', 'eeee', '2021-08-01 14:00:00', 'eee', 'Pass', '2021-08-01 14:10:00', 'eee'),
(21070002, '58-270', '22', 'Kedah', 'White', '33', '2021-08-01 14:00:00', 'ee', 'Fail', '2021-07-29 14:02:00', 'rrr'),
(21070001, '58-270', '22', 'BKK', 'Black', 'ee', '2021-08-02 14:03:00', 'ee', 'FAILED', '2021-08-12 14:01:00', 'rrr'),
(21070001, '58-240', '6', 'Kedah', 'White', 'wwww', '2021-09-06 09:57:00', 'rtt', 'PASSED', '2021-09-02 09:57:00', 'rtrt'),
(21070003, '58-430', '6L', 'Kedah', 'White', 'su', '2021-09-24 09:56:00', 'supakit', 'Pass', '2021-09-09 09:56:00', 'supa'),
(21070001, '58-270', '7L', 'other', 'White', '1222', '2021-12-10 08:58:00', 'sdfs', 'Pass', '2021-12-11 08:56:00', 'suuu');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'QC'),
(2, 'QA'),
(3, 'Bonding'),
(4, 'Manager'),
(5, 'AfterProcess');

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot`
--

CREATE TABLE `dipping_lot` (
  `Binno` int(11) NOT NULL,
  `Productcode` varchar(8) NOT NULL,
  `Productionlot` varchar(11) NOT NULL,
  `SizeHand` varchar(4) NOT NULL,
  `Glovecolor` varchar(10) NOT NULL,
  `MachineRunNo` varchar(15) NOT NULL,
  `TotalGlove` int(5) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Operator` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipping_lot`
--

INSERT INTO `dipping_lot` (`Binno`, `Productcode`, `Productionlot`, `SizeHand`, `Glovecolor`, `MachineRunNo`, `TotalGlove`, `Date`, `Operator`) VALUES
(2, '29-845', 'S109622001', '6R', 'Blue', 'opo', 560, '0000-00-00 00:00:00', 'earth'),
(2, '34-333', 'S109722', '6R', 'Black', 'test', 0, '0000-00-00 00:00:00', 'kopuio'),
(2, '37-165', 'S109722789', '7R', 'White', 'p', 569, '0000-00-00 00:00:00', 'zcxv'),
(2, '37-155', 'S111122003', '7R', 'Black', 'op', 36, '2022-04-21 07:22:54', 'nmv'),
(2, '29-845', 'S111122005', '6R', 'Black', 'op', 30, '2022-04-21 07:14:01', 'mkl'),
(2, '', 'S111122006', '6R', 'Black', 'kop', 30, '2022-04-21 07:12:43', 'op'),
(2, '29-865', 'S111122008', '7L', 'Black', 'zxc', 66, '2022-04-21 07:17:10', 'bhk'),
(1, '37-155', 'S130621001', '6L', 'Green', 'AS-1', 1100, '2021-11-17 17:00:00', 'not'),
(2, '37-900', 'S130721001', '7L', 'Black', 'AS-1', 1212, '2021-11-13 17:00:00', 'supkit'),
(2, '37-155', 'S130721121', '7L', 'White', 'as', 2112, '2021-11-25 17:00:00', 'ssss'),
(1, '37-155', 'S131421001', '6L', 'Blue', 'AS-1', 1232, '2021-11-20 17:00:00', 'not'),
(3, '37-185', 'S131421993', '7L', 'White', 'As', 1213, '2021-11-20 17:00:00', 'dsadad'),
(1, '29-865', 'S131521001', '6L', 'Black', 'As-1', 1129, '2021-11-19 17:00:00', 'suapkit'),
(2, '37-155', 'S132721001', '6R', 'White', 'As', 121, '2021-11-19 17:00:00', 'fefwe'),
(2, '37-155', 'S132721002', '6R', 'Black', 'As-1', 1212, '2021-11-17 17:00:00', 'dsadas'),
(2, '37-155', 'S132721232', '6R', 'White', 'As', 232, '2021-11-12 17:00:00', 'ee'),
(4, '37-155', 'S132722222', '6R', 'Black', 'as', 1234, '2021-11-19 17:00:00', 'supakit'),
(1, '23-345', 'S133621001', '7L', 'White', 'As-1', 1111, '2021-12-01 17:00:00', 'supakit'),
(1, '58-430', 'S134321001', '8L', 'Black', 'As-1/21/21', 1567, '2021-12-09 17:00:00', 'testst'),
(1, '29-845', 'S134921001', '6L', 'White', 'As-1', 1515, '2021-12-10 17:00:00', 'supakit'),
(2, '29-865', 'S209622789', '7L', 'Black', 'opop', 789, '0000-00-00 00:00:00', 'oiuy'),
(3, '37-155', 'S211122006', '7L', 'Black', 'asd', 30, '2022-04-21 07:34:41', 'opp'),
(3, '29-865', 'S232622001', '6R', 'Blue', 'AS', 12312, '2021-11-24 17:00:00', 'sdsd'),
(23, '37-155', 'S232722343', '7L', 'red', 'AS1', 12121, '2021-11-08 17:00:00', 'fdsfs'),
(2, '37-165', 'S233621002', '6R', 'Blue', 'As-1', 2222, '2021-12-01 17:00:00', 'supakit');

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_batch_l`
--

CREATE TABLE `dipping_lot_batch_l` (
  `DippingLot_L` varchar(11) NOT NULL,
  `Batch1` varchar(8) NOT NULL,
  `amt1` varchar(4) NOT NULL,
  `Batch2` varchar(8) NOT NULL,
  `amt2` varchar(4) NOT NULL,
  `Batch3` varchar(8) NOT NULL,
  `amt3` varchar(4) NOT NULL,
  `Batch4` varchar(8) NOT NULL,
  `amt4` varchar(4) NOT NULL,
  `Batch5` varchar(8) NOT NULL,
  `amt5` varchar(4) NOT NULL,
  `Batch6` varchar(8) NOT NULL,
  `amt6` varchar(4) NOT NULL,
  `TotalPcs` int(8) NOT NULL,
  `ProductionLot` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipping_lot_batch_l`
--

INSERT INTO `dipping_lot_batch_l` (`DippingLot_L`, `Batch1`, `amt1`, `Batch2`, `amt2`, `Batch3`, `amt3`, `Batch4`, `amt4`, `Batch5`, `amt5`, `Batch6`, `amt6`, `TotalPcs`, `ProductionLot`) VALUES
('0962211001', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S109622001'),
('0962211003', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S109622001'),
('0962211005', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S109722008'),
('0962211007', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S109722008'),
('0962211009', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S111122006'),
('0962211011', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211013', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 36, 'S109722789'),
('0962211015', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', 42, 'S109722489'),
('0962211017', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S109722489'),
('0962211019', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211021', '6', '6', '6', '6', '6', '6', '6', '7', '6', '6', '6', '6', 37, 'S109722op'),
('0962211023', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S109722'),
('0962211025', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 36, 'S109722'),
('0962211027', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', '8', 48, 'S109722op'),
('0962211029', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 24, 'S109722789'),
('0962211031', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211033', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211035', '5q5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S111122008'),
('0962211037', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 36, 'S111122008'),
('0962211039', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211041', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S111122005'),
('0962211043', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S211122006'),
('0962211045', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', '6', 36, 'S111122003'),
('0962211047', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211049', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211001', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211003', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211005', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211007', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211009', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211011', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211013', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211015', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211017', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211019', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211021', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211023', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211025', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211027', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211029', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211031', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211033', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211035', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211037', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211039', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211041', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211043', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211045', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211047', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211049', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211051', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211053', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211055', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211057', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211059', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222001', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222003', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222005', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222007', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222009', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222011', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222013', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222015', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222017', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222019', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('306211121', 'xsad', '444', '', '', '', '', '', '', '', '', '', '', 0, 'S130621001'),
('3072111001', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'S130721001'),
('3152111001', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'S131521001'),
('3362111001', 'AE47', '20', 'AE47', '20', 'AE47', '20', 'AE47', '20', 'AE47', '20', 'AE47', '20', 120, 'S133621001'),
('3362111003', 'AC47', '20', 'AC47', '20', 'AC47', '20', '', '', '', '', '', '', 60, 'S133621001'),
('3432132111', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'S134321222'),
('3492111001', 'ATR-55', '20', '', '', '', '', '', '', '', '', '', '', 20, 'S134921001');

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_batch_r`
--

CREATE TABLE `dipping_lot_batch_r` (
  `DippingLot_R` varchar(15) NOT NULL,
  `Batch1` varchar(8) NOT NULL,
  `amt1` varchar(4) NOT NULL,
  `Batch2` varchar(8) NOT NULL,
  `amt2` varchar(4) NOT NULL,
  `Batch3` varchar(8) NOT NULL,
  `amt3` varchar(4) NOT NULL,
  `Batch4` varchar(8) NOT NULL,
  `amt4` varchar(4) NOT NULL,
  `Batch5` varchar(8) NOT NULL,
  `amt5` varchar(4) NOT NULL,
  `Batch6` varchar(8) NOT NULL,
  `amt6` varchar(4) NOT NULL,
  `TotalPcs` int(8) NOT NULL,
  `ProductionLot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipping_lot_batch_r`
--

INSERT INTO `dipping_lot_batch_r` (`DippingLot_R`, `Batch1`, `amt1`, `Batch2`, `amt2`, `Batch3`, `amt3`, `Batch4`, `amt4`, `Batch5`, `amt5`, `Batch6`, `amt6`, `TotalPcs`, `ProductionLot`) VALUES
('0962211002', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S209622789'),
('0962211004', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 30, 'S209622789'),
('0962211006', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211008', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211010', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211012', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211014', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211016', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211018', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211020', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211022', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211024', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211026', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211028', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211030', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211032', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211034', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211036', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211038', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211040', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211042', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211044', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211046', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211048', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('0962211050', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211002', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211004', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211006', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211008', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211010', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211012', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211014', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211016', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211018', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211020', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211022', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211024', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211026', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211028', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211030', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211032', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211034', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211036', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211038', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211040', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211042', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211044', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211046', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211048', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211050', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211052', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211054', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211056', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211058', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112211060', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222002', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222004', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222006', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222008', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222010', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222012', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222014', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222016', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222018', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('1112222020', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
('3062111002', 'AS', '34', 'AC', '12', 'AX', '12', '', '', '', '', '', '', 100, 'S130621002'),
('3072111002', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'S130721001'),
('3152111002', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'S131521002'),
('3362111002', 'AD47', '40', 'AD47', '40', 'AD47', '40', '', '', '', '', '', '', 120, 'S133621002'),
('3362111004', 'Ar47', '10', 'Ar47', '10', 'Ar47', '10', 'Ar47', '10', 'Ar47', '10', 'Ar47', '10', 60, 'S133621002');

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_hand_l`
--

CREATE TABLE `dipping_lot_hand_l` (
  `id` int(11) NOT NULL,
  `DippingLot_L` varchar(15) NOT NULL,
  `ProductionLot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipping_lot_hand_l`
--

INSERT INTO `dipping_lot_hand_l` (`id`, `DippingLot_L`, `ProductionLot`) VALUES
(124, '306211121', 'S130621001'),
(125, '3072111001', 'S130721001'),
(126, '3152111001', 'S131521001'),
(127, '3362111001', 'S133621001'),
(128, '3362111003', 'S133621001'),
(129, '3432132111', 'S134321222'),
(130, '3492111001', 'S134921001'),
(131, '0962211001', ''),
(132, '0962211003', ''),
(133, '0962211005', ''),
(134, '0962211007', ''),
(135, '0962211009', ''),
(136, '0962211011', ''),
(137, '0962211013', ''),
(138, '0962211015', ''),
(139, '0962211017', ''),
(140, '0962211019', ''),
(141, '0962211021', ''),
(142, '0962211023', ''),
(143, '0962211025', ''),
(144, '0962211027', ''),
(145, '0962211029', ''),
(146, '0962211031', ''),
(147, '0962211033', ''),
(148, '0962211035', ''),
(149, '0962211037', ''),
(150, '0962211039', ''),
(151, '0962211041', ''),
(152, '0962211043', ''),
(153, '0962211045', ''),
(154, '0962211047', ''),
(155, '0962211049', ''),
(156, '1112211001', ''),
(157, '1112211003', ''),
(158, '1112211005', ''),
(159, '1112211007', ''),
(160, '1112211009', ''),
(161, '1112211011', ''),
(162, '1112211013', ''),
(163, '1112211015', ''),
(164, '1112211017', ''),
(165, '1112211019', ''),
(166, '1112211001', ''),
(167, '1112211003', ''),
(168, '1112211005', ''),
(169, '1112211007', ''),
(170, '1112211009', ''),
(171, '1112211011', ''),
(172, '1112211013', ''),
(173, '1112211015', ''),
(174, '1112211017', ''),
(175, '1112211019', ''),
(176, '1112211021', ''),
(177, '1112211023', ''),
(178, '1112211025', ''),
(179, '1112211027', ''),
(180, '1112211029', ''),
(181, '1112211031', ''),
(182, '1112211033', ''),
(183, '1112211035', ''),
(184, '1112211037', ''),
(185, '1112211039', ''),
(186, '1112211041', ''),
(187, '1112211043', ''),
(188, '1112211045', ''),
(189, '1112211047', ''),
(190, '1112211049', ''),
(191, '1112211051', ''),
(192, '1112211053', ''),
(193, '1112211055', ''),
(194, '1112211057', ''),
(195, '1112211059', ''),
(196, '1112222001', ''),
(197, '1112222003', ''),
(198, '1112222005', ''),
(199, '1112222007', ''),
(200, '1112222009', ''),
(201, '1112222011', ''),
(202, '1112222013', ''),
(203, '1112222015', ''),
(204, '1112222017', ''),
(205, '1112222019', '');

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_hand_r`
--

CREATE TABLE `dipping_lot_hand_r` (
  `id` int(11) NOT NULL,
  `DippingLot_R` varchar(15) NOT NULL,
  `ProductionLot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dipping_lot_hand_r`
--

INSERT INTO `dipping_lot_hand_r` (`id`, `DippingLot_R`, `ProductionLot`) VALUES
(86, '3062111002', 'S130621002'),
(87, '3072111002', 'S130721001'),
(88, '3152111002', 'S131521002'),
(89, '3362111002', 'S133621002'),
(90, '3362111004', 'S133621002'),
(91, '0962211002', ''),
(92, '0962211004', ''),
(93, '0962211006', ''),
(94, '0962211008', ''),
(95, '0962211010', ''),
(96, '0962211012', ''),
(97, '0962211014', ''),
(98, '0962211016', ''),
(99, '0962211018', ''),
(100, '0962211020', ''),
(101, '0962211022', ''),
(102, '0962211024', ''),
(103, '0962211026', ''),
(104, '0962211028', ''),
(105, '0962211030', ''),
(106, '0962211032', ''),
(107, '0962211034', ''),
(108, '0962211036', ''),
(109, '0962211038', ''),
(110, '0962211040', ''),
(111, '0962211042', ''),
(112, '0962211044', ''),
(113, '0962211046', ''),
(114, '0962211048', ''),
(115, '0962211050', ''),
(116, '1112211002', ''),
(117, '1112211004', ''),
(118, '1112211006', ''),
(119, '1112211008', ''),
(120, '1112211010', ''),
(121, '1112211012', ''),
(122, '1112211014', ''),
(123, '1112211016', ''),
(124, '1112211018', ''),
(125, '1112211020', ''),
(126, '1112211002', ''),
(127, '1112211004', ''),
(128, '1112211006', ''),
(129, '1112211008', ''),
(130, '1112211010', ''),
(131, '1112211012', ''),
(132, '1112211014', ''),
(133, '1112211016', ''),
(134, '1112211018', ''),
(135, '1112211020', ''),
(136, '1112211022', ''),
(137, '1112211024', ''),
(138, '1112211026', ''),
(139, '1112211028', ''),
(140, '1112211030', ''),
(141, '1112211032', ''),
(142, '1112211034', ''),
(143, '1112211036', ''),
(144, '1112211038', ''),
(145, '1112211040', ''),
(146, '1112211042', ''),
(147, '1112211044', ''),
(148, '1112211046', ''),
(149, '1112211048', ''),
(150, '1112211050', ''),
(151, '1112211052', ''),
(152, '1112211054', ''),
(153, '1112211056', ''),
(154, '1112211058', ''),
(155, '1112211060', ''),
(156, '1112222002', ''),
(157, '1112222004', ''),
(158, '1112222006', ''),
(159, '1112222008', ''),
(160, '1112222010', ''),
(161, '1112222012', ''),
(162, '1112222014', ''),
(163, '1112222016', ''),
(164, '1112222018', ''),
(165, '1112222020', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeno` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phonenumber` char(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `department` varchar(27) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeno`, `firstname`, `lastname`, `email`, `phonenumber`, `address`, `department`, `postingdate`) VALUES
('1000', 'supakit', 'sanjiw', 'ongno422hotmail.com', '0987774744', 'eakmai 30 ', 'Manager', '2021-08-30 03:17:14'),
('1001', 'earth', 'Klankerd', 'paramet543@gmail.com', '0957604310', 'ann', 'QC', '2021-08-30 02:33:31'),
('1002', 'songpon', 'ssss', 'ssss@hotmail.com', '342445435', 'dfdvdv', 'QA', '2021-08-30 03:28:37'),
('1003', 'arm', 'SASAS', 'SAA@hotmail.com', '3432424234', 'fdfdsf', 'Bonding', '2021-08-30 03:29:44'),
('1004', 'not', 'sss', 'sdewf', '343243242', ' dfdvdffd', 'AfterProcess', '2021-12-02 02:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `glovecolor`
--

CREATE TABLE `glovecolor` (
  `id` int(8) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `glovecolor`
--

INSERT INTO `glovecolor` (`id`, `color`) VALUES
(2, 'Black'),
(4, 'White'),
(6, 'Blue'),
(33, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL,
  `machine` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`id`, `machine`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, '1'),
(4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `processrework`
--

CREATE TABLE `processrework` (
  `id` int(8) NOT NULL,
  `process` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processrework`
--

INSERT INTO `processrework` (`id`, `process`) VALUES
(1, 'REWORK PROCESS'),
(2, 'PRE-INSPECTION'),
(3, '100%SORTING'),
(4, 'ตัดขอบถุงมือ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productcode` varchar(20) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productcode`, `productname`, `postingdate`) VALUES
('23-345', 'solvex', '2021-12-02 02:30:49'),
('29-845', 'Solvex', '2021-08-26 04:30:31'),
('29-865', 'Solvex', '2021-08-26 04:30:47'),
('34-333', 'Solvex', '2021-11-29 06:22:43'),
('37-155', 'Solvex', '2021-08-26 04:30:55'),
('37-165', 'Solvex', '2021-08-26 04:31:02'),
('45-234', 'AlphaTec', '2021-09-06 02:43:30'),
('58-128', 'Alphatec', '2021-08-26 04:29:32'),
('58-240', 'Alphatec', '2021-08-26 04:28:46'),
('58-270', 'Alphatec', '2021-08-26 04:29:04'),
('58-430', 'Alphatec', '2021-08-26 04:29:25'),
('58-435', 'Alphatec', '2021-08-26 04:27:35'),
('58-530', 'Alphatec', '2021-08-26 04:28:30'),
('58-535', 'Alphatec', '2021-08-26 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `qi`
--

CREATE TABLE `qi` (
  `Productionlot` varchar(11) NOT NULL,
  `status1st` varchar(25) NOT NULL,
  `reject1st` varchar(25) NOT NULL,
  `good1st` varchar(25) NOT NULL,
  `status2nd` varchar(25) NOT NULL,
  `reject2nd` varchar(25) NOT NULL,
  `good2nd` varchar(25) NOT NULL,
  `Total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qi`
--

INSERT INTO `qi` (`Productionlot`, `status1st`, `reject1st`, `good1st`, `status2nd`, `reject2nd`, `good2nd`, `Total`) VALUES
('S130621001', '', '', '', '', '', '', 0),
('S131421001', 'Fail', '343', '23232', '', '', '', 21121),
('S131421993', 'Pass', '-4848', '100', '', '', '', 900),
('S133621001', 'Pass', '2', '1109', '', '', '', 1109),
('S233621002', 'Fail', '10', '2212', 'Pass', '2', '2210', 2210);

-- --------------------------------------------------------

--
-- Table structure for table `rework`
--

CREATE TABLE `rework` (
  `Productionlot` varchar(11) NOT NULL,
  `Process` varchar(25) NOT NULL,
  `StartRework` datetime NOT NULL,
  `FinishedRework` datetime NOT NULL,
  `OperatorRework` varchar(25) NOT NULL,
  `Reason` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rework`
--

INSERT INTO `rework` (`Productionlot`, `Process`, `StartRework`, `FinishedRework`, `OperatorRework`, `Reason`) VALUES
('S130621001', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
('S131421001', '100%SORTING', '2021-11-11 16:22:00', '2021-11-10 15:23:00', 'supakit', '-'),
('S131421993', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
('S133621001', '100%SORTING', '2021-12-11 10:10:00', '2021-12-19 10:11:00', 'ssss', 'sfwef'),
('S233621002', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shell`
--

CREATE TABLE `shell` (
  `id` int(11) NOT NULL,
  `shell` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shell`
--

INSERT INTO `shell` (`id`, `shell`) VALUES
(1, 'BKK'),
(2, 'Kedah'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, '6L'),
(2, '6R'),
(3, '7L'),
(4, '7R'),
(5, '8L'),
(6, '8R'),
(7, '9L'),
(8, '9R'),
(9, '10L'),
(10, '10R'),
(11, '11L'),
(12, '11R');

-- --------------------------------------------------------

--
-- Table structure for table `statistical1st`
--

CREATE TABLE `statistical1st` (
  `Productionlot` varchar(11) NOT NULL,
  `Date1st` datetime NOT NULL,
  `Shift1st` varchar(4) NOT NULL,
  `CriticalPcs1st` varchar(15) NOT NULL,
  `CriticalDefect1st` varchar(15) NOT NULL,
  `MajorPcs1st` varchar(15) NOT NULL,
  `MajorDefect1st` varchar(15) NOT NULL,
  `MinorPcs1st` varchar(15) NOT NULL,
  `MinorDefect1st` varchar(15) NOT NULL,
  `operator1st` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistical1st`
--

INSERT INTO `statistical1st` (`Productionlot`, `Date1st`, `Shift1st`, `CriticalPcs1st`, `CriticalDefect1st`, `MajorPcs1st`, `MajorDefect1st`, `MinorPcs1st`, `MinorDefect1st`, `operator1st`) VALUES
('S130621001', '0000-00-00 00:00:00', '', '', '', '', '', '', '', ''),
('S131421001', '2021-11-19 13:17:00', 'AM', '100', 'simple', '100', 'simple', '100', 'simple', 'supakit'),
('S131421993', '0000-00-00 00:00:00', 'PM', '', '', '', '', '', '', ''),
('S133621001', '2021-12-24 10:08:00', 'NS', '12', 'sim', '23', 'sim', '12', 'sim', 'supakit'),
('S233621002', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `statisticalafter`
--

CREATE TABLE `statisticalafter` (
  `Productionlot` varchar(11) NOT NULL,
  `DateAfter` datetime NOT NULL,
  `ShiftAfter` varchar(15) NOT NULL,
  `CriticalPcsAfter` varchar(15) NOT NULL,
  `CriticalDefectAfter` varchar(15) NOT NULL,
  `MajorPcsAfter` varchar(15) NOT NULL,
  `MajorDefectAfter` varchar(15) NOT NULL,
  `MinorPcsAfter` varchar(15) NOT NULL,
  `MinorDefectAfter` varchar(15) NOT NULL,
  `statusAfter` varchar(15) NOT NULL,
  `operatorAfter` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statisticalafter`
--

INSERT INTO `statisticalafter` (`Productionlot`, `DateAfter`, `ShiftAfter`, `CriticalPcsAfter`, `CriticalDefectAfter`, `MajorPcsAfter`, `MajorDefectAfter`, `MinorPcsAfter`, `MinorDefectAfter`, `statusAfter`, `operatorAfter`) VALUES
('S130621001', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
('S131421001', '2021-11-06 13:23:00', 'PM', '100', 'simple', '100', 'simple', '100', 'simple', 'Pass', 'supakit'),
('S131421993', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
('S133621001', '2021-12-02 10:13:00', 'PM', '12', 'sds', '21', 'sdd', '34', 'ssd', 'Pass', 'sds'),
('S233621002', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(0, 'CHLORINATED'),
(1, 'NON-AFTER PROCESS'),
(3, 'UN-CHLORINATED'),
(4, 'Pass'),
(5, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `timeshift` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `timeshift`) VALUES
(1, 'AM'),
(2, 'PM'),
(3, 'NS'),
(4, '1'),
(5, '2'),
(6, '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afterprocess`
--
ALTER TABLE `afterprocess`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `bincard`
--
ALTER TABLE `bincard`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `bonding`
--
ALTER TABLE `bonding`
  ADD PRIMARY KEY (`ProductionDate`,`bondingLotNo`) USING BTREE;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dipping_lot`
--
ALTER TABLE `dipping_lot`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `dipping_lot_batch_l`
--
ALTER TABLE `dipping_lot_batch_l`
  ADD PRIMARY KEY (`DippingLot_L`);

--
-- Indexes for table `dipping_lot_batch_r`
--
ALTER TABLE `dipping_lot_batch_r`
  ADD PRIMARY KEY (`DippingLot_R`);

--
-- Indexes for table `dipping_lot_hand_l`
--
ALTER TABLE `dipping_lot_hand_l`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dipping_lot_hand_r`
--
ALTER TABLE `dipping_lot_hand_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeno`);

--
-- Indexes for table `glovecolor`
--
ALTER TABLE `glovecolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processrework`
--
ALTER TABLE `processrework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productcode`);

--
-- Indexes for table `qi`
--
ALTER TABLE `qi`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `rework`
--
ALTER TABLE `rework`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `shell`
--
ALTER TABLE `shell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistical1st`
--
ALTER TABLE `statistical1st`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `statisticalafter`
--
ALTER TABLE `statisticalafter`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dipping_lot_hand_l`
--
ALTER TABLE `dipping_lot_hand_l`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `dipping_lot_hand_r`
--
ALTER TABLE `dipping_lot_hand_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `glovecolor`
--
ALTER TABLE `glovecolor`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `processrework`
--
ALTER TABLE `processrework`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shell`
--
ALTER TABLE `shell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afterprocess`
--
ALTER TABLE `afterprocess`
  ADD CONSTRAINT `FK_Afterprocess` FOREIGN KEY (`Productionlot`) REFERENCES `dipping_lot` (`Productionlot`);

--
-- Constraints for table `bincard`
--
ALTER TABLE `bincard`
  ADD CONSTRAINT `FK_Productionlot` FOREIGN KEY (`Productionlot`) REFERENCES `dipping_lot` (`Productionlot`);

--
-- Constraints for table `qi`
--
ALTER TABLE `qi`
  ADD CONSTRAINT `FK_Qi` FOREIGN KEY (`Productionlot`) REFERENCES `dipping_lot` (`Productionlot`);

--
-- Constraints for table `rework`
--
ALTER TABLE `rework`
  ADD CONSTRAINT `FK_Rework` FOREIGN KEY (`Productionlot`) REFERENCES `dipping_lot` (`Productionlot`);

--
-- Constraints for table `statistical1st`
--
ALTER TABLE `statistical1st`
  ADD CONSTRAINT `FK_Statistical` FOREIGN KEY (`Productionlot`) REFERENCES `dipping_lot` (`Productionlot`);

--
-- Constraints for table `statisticalafter`
--
ALTER TABLE `statisticalafter`
  ADD CONSTRAINT `FK_Statisticalafters` FOREIGN KEY (`Productionlot`) REFERENCES `dipping_lot` (`Productionlot`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
