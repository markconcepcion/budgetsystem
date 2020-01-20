-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 06:36 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `augmentation`
--

CREATE TABLE `augmentation` (
  `augment_id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `amount` decimal(38,2) NOT NULL,
  `augmented_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `augmentation`
--

INSERT INTO `augmentation` (`augment_id`, `exp_id`, `dept_id`, `amount`, `augmented_date`) VALUES
(1, 9, 1021, '123.00', '2019-12-12'),
(2, 39, 1081, '100.00', '2019-12-12'),
(3, 37, 1021, '15.00', '2019-12-13'),
(4, 41, 1081, '15.00', '2019-12-13'),
(5, 37, 1071, '1000.00', '2019-12-13'),
(6, 19, 1081, '15000.00', '2019-12-13'),
(7, 5, 1011, '1682130.00', '2019-12-16'),
(8, 9, 1041, '39135.00', '2019-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `control_notebook`
--

CREATE TABLE `control_notebook` (
  `CTRL_NTB_ID` int(11) NOT NULL,
  `CTRL_NTB_YEAR` year(4) NOT NULL,
  `DEPARTMENT_DPT_ID` int(11) NOT NULL,
  `point` point DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `control_notebook`
--

INSERT INTO `control_notebook` (`CTRL_NTB_ID`, `CTRL_NTB_YEAR`, `DEPARTMENT_DPT_ID`, `point`) VALUES
(17, 2019, 1011, NULL),
(18, 2019, 1021, NULL),
(19, 2019, 1071, NULL),
(20, 2019, 1081, NULL),
(26, 2020, 1011, NULL),
(27, 2020, 1021, NULL),
(28, 2020, 1041, NULL),
(29, 2020, 1071, NULL),
(30, 2020, 1081, NULL),
(32, 2019, 1091, NULL),
(33, 2019, 1041, NULL),
(35, 2020, 1091, NULL),
(37, 2019, 1101, NULL),
(38, 2019, 4411, NULL),
(39, 2019, 7611, NULL),
(40, 2020, 1101, NULL),
(41, 2020, 4411, NULL),
(42, 2020, 7611, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DPT_ID` int(11) NOT NULL,
  `DPT_NAME` varchar(30) NOT NULL,
  `DPT_STATUS` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DPT_ID`, `DPT_NAME`, `DPT_STATUS`) VALUES
(1011, 'Mayor\'s Office', 'ACTIVE'),
(1021, 'Sangguniang Bayan', 'ACTIVE'),
(1041, 'Municipal Planning Development', 'ACTIVE'),
(1071, 'Municipal Budget Office', 'ACTIVE'),
(1081, 'Municipal Accounting', 'ACTIVE'),
(1091, 'Municipal Treasurers Office', 'ACTIVE'),
(1101, 'Municipal Assesor', 'ACTIVE'),
(4411, 'Municipal Health Office', 'ACTIVE'),
(7611, 'Municipal Social Welfare Devel', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `dept_user`
--

CREATE TABLE `dept_user` (
  `id` int(11) NOT NULL,
  `DPT_ID` int(11) NOT NULL,
  `USR_ID` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dept_user`
--

INSERT INTO `dept_user` (`id`, `DPT_ID`, `USR_ID`, `role_id`, `user_name`, `user_pass`, `status`) VALUES
(1, 1071, 1, 1, 'admin', 'admin', 'ACTIVE'),
(2, 1071, 2, 3, 'mark', 'mark', 'INACTIVE'),
(3, 1011, 3, 2, 'antonio', 'antonio', 'ACTIVE'),
(4, 1021, 4, 2, 'apple', 'apple', 'ACTIVE'),
(5, 1081, 5, 2, 'angel', 'angel', 'ACTIVE'),
(6, 1071, 6, 4, 'jasmin', 'jas', 'ACTIVE'),
(7, 1071, 7, 5, 'Marielyd', 'marielyd', 'ACTIVE'),
(8, 1041, 10, 5, 'jessa', 'jessa', 'ACTIVE'),
(9, 1091, 16, 2, 'jorgio', 'jorgio', 'ACTIVE'),
(10, 1071, 17, 3, 'jana', 'jana', 'ACTIVE'),
(11, 1101, 18, 2, 'jaydee', 'jaydee', 'ACTIVE'),
(12, 4411, 19, 2, 'carla', 'carla', 'ACTIVE'),
(13, 7611, 20, 2, 'luj', 'luj', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `EXPENDITURE_id` int(11) NOT NULL,
  `EXP_ACCT_CODE` varchar(11) NOT NULL,
  `EXP_NAME` varchar(60) NOT NULL,
  `EXPENDITURE_CLASS_EXPCLASS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`EXPENDITURE_id`, `EXP_ACCT_CODE`, `EXP_NAME`, `EXPENDITURE_CLASS_EXPCLASS_ID`) VALUES
(1, '5-01-01-010', 'Salaries & Wages - Regular', 1),
(2, '5-01-02-120', 'Step Increment/Longetivity Pay', 1),
(3, '5-01-01-020', 'Salaries & Wages - Casual/Contractual', 1),
(4, '5-01-02-010', 'PERA', 1),
(5, '5-01-02-020', 'Representation Allowance (RA)', 1),
(6, '5-01-02-030', 'Transportation Allowance (TA)', 1),
(7, '5-01-02-040', 'Clothing/Uniform Allowance', 1),
(8, '5-01-02-990', 'Productivity Enhancement Incentive', 1),
(9, '5-01-02-150', 'Cash Gift', 1),
(10, '5-01-02-990', 'Mid-Year Bonus', 1),
(11, '5-01-02-140', 'Year End Bonus', 1),
(12, '5-01-03-010', 'Retirement & Life Insurance Premium', 1),
(13, '5-01-03-020', 'PAG-IBIG Contribution', 1),
(14, '5-01-03-030', 'Philippine Health Contribution', 1),
(15, '5-01-03-040', 'Employees Compensation Insurance Premium', 1),
(16, '5-01-04-030', 'Terminal Leave Benefits', 1),
(17, '5-01-04-030', 'Reserved for Salary Increase & Creation New Positions', 1),
(18, '5-01-02-110', 'Extra Hazard', 1),
(19, '5-02-01-010', 'Traveling Expenses - Local ', 2),
(20, '5-02-02-010', 'Trainings and Seminars Expenses', 2),
(21, '5-02-03-990', 'Other Supplies & Material Expenses', 2),
(22, '5-02-03-090', 'Gasoline, Oil and Lubricants Expenses', 2),
(23, '5-02-04-020', 'Electricity Expenses', 2),
(24, '5-02-05-000', 'Communication Expenses', 2),
(25, '5-02-05-030', 'Internet Expenses', 2),
(26, '5-02-99-030', 'Representation Expense', 2),
(27, '5-02-99-040', 'Transportation Expenses', 2),
(28, '5-02-99-070', 'Subscription Expenses', 2),
(29, '5-02-13-050', 'Repair & Maint.-Other PPE', 2),
(30, '5-02-13-060', 'Repair & Maint.-Transportation Expenses', 2),
(31, '5-02-10-010', 'Confidential Fund', 2),
(32, '5-02-10-030', 'Extraordinary & Misc. Exp.', 2),
(33, '5-02-16-020', 'Fidelity Bond Premium', 2),
(34, '5-02-11-020', 'Auditing Services', 2),
(35, '5-02-99-060', 'Membership Due & Contribution to Organization', 2),
(36, '5-02-99-990', 'Other MOOE', 2),
(37, '1-07-99-990', 'Other Property, Plant & Equipment', 3),
(38, '1-07-04-010', 'Municipal Hall Building', 3),
(39, '5-02-04-080', 'Subsidy to Economic Enterprise Operation', 4),
(40, '5-02-12-990', 'Market-Other General Services', 4),
(41, '5-02-12-990', 'Watersystem', 4),
(42, '0-00-00-000', 'Test 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_class`
--

CREATE TABLE `expenditure_class` (
  `EXPCLASS_ID` int(11) NOT NULL,
  `EXPCLASS_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditure_class`
--

INSERT INTO `expenditure_class` (`EXPCLASS_ID`, `EXPCLASS_NAME`) VALUES
(1, 'PERSONAL SERVICES'),
(2, 'MAINTENANCE AND OTHER OPERATING EXPENSES'),
(3, 'CAPITAL OUTLAY'),
(4, 'SPECIAL PURPOSE APPROPRIATIONS');

-- --------------------------------------------------------

--
-- Table structure for table `lbp_expenditure`
--

CREATE TABLE `lbp_expenditure` (
  `EXPENDITURE_EXPENDITURE_id` int(11) NOT NULL,
  `LBP_FORM_FRM_ID` int(11) NOT NULL,
  `LBP_EXP_ID` int(11) NOT NULL,
  `LBP_EXP_AMOUNT` decimal(38,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lbp_expenditure`
--

INSERT INTO `lbp_expenditure` (`EXPENDITURE_EXPENDITURE_id`, `LBP_FORM_FRM_ID`, `LBP_EXP_ID`, `LBP_EXP_AMOUNT`) VALUES
(2, 1, 561, '1123000.00'),
(6, 1, 562, '1000000.00'),
(12, 1, 563, '1000000.00'),
(16, 1, 564, '1000000.00'),
(23, 1, 565, '1000000.00'),
(30, 1, 566, '1000000.00'),
(37, 1, 567, '1000000.00'),
(38, 1, 568, '540305.00'),
(39, 1, 569, '1000000.00'),
(40, 1, 570, '1000000.00'),
(2, 2, 571, '11290000.00'),
(5, 2, 572, '1000000.00'),
(10, 2, 573, '392130.00'),
(20, 2, 574, '1000000.00'),
(22, 2, 575, '1000000.00'),
(27, 2, 576, '1000000.00'),
(1, 3, 577, '1000000.00'),
(2, 3, 578, '1000000.00'),
(3, 3, 579, '1000000.00'),
(4, 3, 580, '1000000.00'),
(5, 3, 581, '154324.00'),
(7, 3, 582, '432432.00'),
(8, 3, 583, '1000000.00'),
(9, 3, 584, '1000000.00'),
(10, 3, 585, '1000000.00'),
(20, 3, 586, '1000000.00'),
(21, 3, 587, '1000000.00'),
(24, 3, 588, '1000000.00'),
(25, 3, 589, '1000000.00'),
(26, 3, 590, '1000000.00'),
(28, 3, 591, '1000000.00'),
(37, 3, 592, '321312.00'),
(39, 3, 593, '1000000.00'),
(40, 3, 594, '1000000.00'),
(1, 5, 619, '25000000.00'),
(2, 5, 620, '1000000.00'),
(3, 5, 621, '300000.00'),
(4, 5, 622, '40000.00'),
(5, 5, 623, '500000.00'),
(6, 5, 624, '200000.00'),
(7, 5, 625, '400002.00'),
(8, 5, 626, '20204420.00'),
(9, 5, 627, '4329423.00'),
(10, 5, 628, '4324.00'),
(11, 5, 629, '43242.00'),
(12, 5, 630, '4324324.00'),
(13, 5, 631, '432423.00'),
(14, 5, 632, '432423.00'),
(15, 5, 633, '4324324.00'),
(16, 5, 634, '432432.00'),
(17, 5, 635, '4324234.00'),
(18, 5, 636, '4322.00'),
(42, 5, 637, '43242.00'),
(19, 5, 638, '43243.00'),
(20, 5, 639, '1567.00'),
(21, 5, 640, '5675.00'),
(22, 5, 641, '1675.00'),
(23, 5, 642, '1675.00'),
(24, 5, 643, '1765.00'),
(25, 5, 644, '1765.02'),
(26, 5, 645, '1765.00'),
(27, 5, 646, '1675.00'),
(28, 5, 647, '1765.00'),
(29, 5, 648, '6756.00'),
(30, 5, 649, '1156.00'),
(31, 5, 650, '565.00'),
(32, 5, 651, '1165.00'),
(33, 5, 652, '655.00'),
(34, 5, 653, '1165.00'),
(35, 5, 654, '1165.00'),
(36, 5, 655, '1165.00'),
(37, 5, 656, '1165.00'),
(38, 5, 657, '56500.00'),
(39, 5, 658, '12300.00'),
(40, 5, 659, '23400.00'),
(41, 5, 660, '45600.00'),
(1, 6, 697, '10000000.00'),
(2, 6, 698, '5000000.00'),
(3, 6, 699, '3000000.00'),
(19, 6, 700, '9000000.00'),
(20, 6, 701, '6000000.00'),
(21, 6, 702, '2000000.00'),
(37, 6, 703, '9000000.00'),
(38, 6, 704, '6000000.00'),
(39, 6, 705, '7000000.00'),
(40, 6, 706, '3033333.00'),
(41, 6, 707, '1111111.00'),
(1, 7, 727, '10000000.00'),
(2, 7, 728, '5550000.00'),
(3, 7, 729, '2500000.00'),
(19, 7, 730, '9000000.00'),
(20, 7, 731, '6000000.00'),
(21, 7, 732, '2222222.00'),
(37, 7, 733, '9999999.00'),
(38, 7, 734, '8888888.00'),
(39, 7, 735, '11111111.00'),
(40, 7, 736, '250000.00'),
(41, 7, 737, '4000000.00'),
(1, 8, 808, '2050000.00'),
(2, 8, 809, '2450000.00'),
(3, 8, 810, '3500000.00'),
(4, 8, 811, '2000000.00'),
(5, 8, 812, '2222222.00'),
(19, 8, 813, '1500000.00'),
(20, 8, 814, '6200000.00'),
(21, 8, 815, '6666666.00'),
(22, 8, 816, '1000000.00'),
(37, 8, 817, '16000000.00'),
(38, 8, 818, '2000000.00'),
(39, 8, 819, '6122222.00'),
(40, 8, 820, '666666.00'),
(41, 8, 821, '6615233.00'),
(1, 9, 871, '10111111.00'),
(2, 9, 872, '5555555.00'),
(3, 9, 873, '0.00'),
(19, 9, 874, '0.00'),
(20, 9, 875, '0.00'),
(21, 9, 876, '0.00'),
(4, 9, 877, '0.00'),
(5, 9, 880, '0.00'),
(17, 9, 881, '0.00'),
(22, 9, 882, '0.00'),
(41, 9, 883, '0.00'),
(1, 10, 884, '1230.00'),
(2, 10, 885, '123032.00'),
(3, 10, 886, '2130.00'),
(5, 10, 887, '0.00'),
(7, 10, 888, '0.00'),
(8, 10, 889, '0.00'),
(38, 10, 890, '0.00'),
(1, 11, 891, '1150000.00'),
(2, 11, 892, '5555555.00'),
(3, 11, 893, '3000000.00'),
(4, 11, 894, '2000000.00'),
(19, 11, 895, '3500000.00'),
(20, 11, 896, '6000000.00'),
(21, 11, 897, '5555555.00'),
(37, 11, 898, '8000000.00'),
(38, 11, 899, '7999999.00'),
(39, 11, 900, '4000000.00'),
(40, 11, 901, '3999999.00'),
(41, 11, 902, '4000001.00'),
(1, 12, 903, '150000.00'),
(2, 12, 905, '0.00'),
(3, 12, 906, '0.00'),
(4, 12, 907, '0.00'),
(5, 12, 908, '0.00'),
(19, 12, 909, '0.00'),
(20, 12, 910, '0.00'),
(21, 12, 911, '0.00'),
(37, 12, 912, '0.00'),
(39, 12, 913, '0.00'),
(40, 12, 914, '0.00'),
(41, 12, 915, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `lbp_form`
--

CREATE TABLE `lbp_form` (
  `FRM_ID` int(11) NOT NULL,
  `FRM_NO` int(11) NOT NULL,
  `FRM_YEAR` year(4) NOT NULL,
  `FRM_STATUS` enum('PROPOSED','FINALIZED') NOT NULL,
  `USER_USR_ID` int(11) NOT NULL,
  `signID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lbp_form`
--

INSERT INTO `lbp_form` (`FRM_ID`, `FRM_NO`, `FRM_YEAR`, `FRM_STATUS`, `USER_USR_ID`, `signID`) VALUES
(1, 1, 2020, 'FINALIZED', 3, 11),
(2, 1, 2019, 'FINALIZED', 3, 11),
(3, 1, 2019, 'FINALIZED', 7, 12),
(5, 1, 2019, 'FINALIZED', 10, 15),
(6, 1, 2019, 'FINALIZED', 4, 14),
(7, 1, 2019, 'FINALIZED', 5, 15),
(8, 1, 2020, 'FINALIZED', 7, 17),
(9, 1, 2020, 'PROPOSED', 4, 14),
(10, 1, 2020, 'PROPOSED', 5, 19),
(11, 1, 2020, 'FINALIZED', 16, 21),
(12, 1, 2020, 'PROPOSED', 19, 23);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_transaction` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dept_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_transaction`, `timestamp`, `dept_user_id`) VALUES
(30, 'LOGGED IN', '2019-12-18 16:05:27', 1),
(31, 'LOGGED OUT', '2019-12-18 16:09:22', 7),
(32, 'LOGGED IN', '2019-12-18 16:10:00', 1),
(33, 'LOGGED OUT', '2019-12-18 16:14:58', 1),
(34, 'LOGGED IN', '2019-12-18 16:15:04', 7),
(35, 'LOGGED OUT', '2019-12-18 16:15:19', 7),
(36, 'LOGGED IN', '2019-12-18 16:15:43', 7),
(37, 'LOGGED OUT', '2019-12-18 16:18:59', 7),
(38, 'LOGGED IN', '2019-12-18 16:19:11', 7),
(39, 'LOGGED OUT', '2019-12-18 16:21:48', 7),
(40, 'LOGGED IN', '2019-12-18 16:21:54', 7),
(41, 'LOGGED OUT', '2019-12-18 16:22:23', 7),
(42, 'LOGGED IN', '2019-12-18 16:22:33', 7),
(43, 'LOGGED OUT', '2019-12-18 16:22:33', 7),
(44, 'LOGGED IN', '2019-12-18 16:22:38', 7),
(45, 'LOGGED OUT', '2019-12-18 16:22:39', 7),
(46, 'LOGGED IN', '2019-12-18 16:23:13', 7),
(47, 'LOGGED OUT', '2019-12-18 16:23:40', 7),
(48, 'LOGGED IN', '2019-12-18 16:23:44', 7),
(49, 'LOGGED OUT', '2019-12-18 17:02:53', 7),
(50, 'LOGGED IN', '2019-12-18 17:03:01', 1),
(51, 'LOGGED OUT', '2019-12-18 17:03:16', 7),
(52, 'LOGGED IN', '2019-12-18 17:03:46', 1),
(53, 'LOGGED IN', '2019-12-18 17:09:49', 1),
(54, 'LOGGED IN', '2019-12-18 17:10:37', 1),
(55, 'LOGGED IN', '2019-12-18 17:11:11', 1),
(56, 'LOGGED OUT', '2019-12-18 18:36:11', 7),
(57, 'LOGGED IN', '2019-12-18 18:36:21', 1),
(58, 'LOGGED OUT', '2019-12-18 18:37:39', 7),
(59, 'LOGGED IN', '2019-12-18 18:39:42', 1),
(60, 'LOGGED OUT', '2019-12-18 18:40:59', 7),
(61, 'LOGGED IN', '2019-12-18 18:43:47', 7),
(62, 'LOGGED OUT', '2019-12-18 18:43:50', 7),
(63, 'LOGGED IN', '2019-12-18 18:44:52', 1),
(64, 'LOGGED OUT', '2019-12-18 18:45:00', 7),
(65, 'LOGGED IN', '2019-12-18 18:47:25', 1),
(66, 'LOGGED OUT', '2019-12-18 18:47:57', 7),
(67, 'LOGGED IN', '2019-12-18 18:48:07', 7),
(68, 'LOGGED OUT', '2019-12-18 18:48:49', 7),
(69, 'LOGGED IN', '2019-12-18 18:49:01', 7),
(70, 'LOGGED OUT', '2019-12-18 18:49:04', 7),
(71, 'LOGGED IN', '2019-12-18 18:49:09', 7),
(72, 'LOGGED IN', '2019-12-18 19:21:29', 4),
(73, 'LOGGED OUT', '2019-12-18 19:21:54', 4),
(74, 'LOGGED IN', '2019-12-18 19:21:59', 5),
(75, 'LOGGED OUT', '2019-12-18 19:22:10', 5),
(76, 'LOGGED IN', '2019-12-18 19:22:16', 9),
(77, 'LOGGED OUT', '2019-12-18 19:37:11', 7),
(78, 'LOGGED IN', '2019-12-18 19:37:28', 6),
(79, 'LOGGED OUT', '2019-12-18 19:45:06', 6),
(80, 'LOGGED IN', '2019-12-18 19:45:28', 6),
(81, 'LOGGED OUT', '2019-12-18 19:51:32', 6),
(82, 'LOGGED IN', '2019-12-18 19:51:50', 6),
(83, 'LOGGED IN', '2019-12-19 01:58:34', 7),
(84, 'LOGGED IN', '2019-12-19 02:03:26', 1),
(85, 'SUBMIT OBR', '2019-12-19 02:04:03', 7),
(86, 'LOGGED OUT', '2019-12-19 02:09:29', 7),
(87, 'LOGGED IN', '2019-12-19 02:09:38', 5),
(88, 'LOGGED OUT', '2019-12-19 02:13:19', 5),
(89, 'LOGGED IN', '2019-12-19 02:13:26', 9),
(90, 'SUBMIT LBP2', '2019-12-19 02:20:44', 9),
(91, 'Added Expenditure in lbp2', '2019-12-19 02:24:09', 9),
(92, 'Edited Expenditure Amount in lbp2', '2019-12-19 02:25:29', 9),
(93, 'Accepted an ObR', '2019-12-19 03:23:47', 7),
(94, 'LOGGED OUT', '2019-12-19 03:24:08', 9),
(95, 'LOGGED IN', '2019-12-19 03:24:11', 1),
(96, 'LOGGED OUT', '2019-12-19 03:55:36', 7),
(97, 'LOGGED IN', '2019-12-19 03:56:33', 6),
(98, 'LOGGED OUT', '2019-12-19 06:25:36', 6),
(99, 'LOGGED IN', '2019-12-19 06:25:41', 7),
(100, 'LOGGED IN', '2019-12-20 01:47:35', 5),
(101, 'LOGGED OUT', '2019-12-20 01:49:59', 5),
(102, 'LOGGED IN', '2019-12-20 01:50:15', 5),
(103, 'LOGGED OUT', '2019-12-20 01:51:38', 5),
(104, 'LOGGED IN', '2019-12-20 01:51:57', 9),
(105, 'LOGGED OUT', '2019-12-20 01:52:06', 9),
(106, 'LOGGED IN', '2019-12-20 01:52:11', 12),
(107, 'SUBMIT OBR', '2019-12-20 02:02:55', 12),
(108, 'LOGGED IN', '2019-12-20 02:03:39', 6),
(109, 'LOGGED OUT', '2019-12-20 02:25:02', 12),
(110, 'LOGGED IN', '2019-12-20 02:25:14', 6),
(111, 'LOGGED OUT', '2019-12-20 02:28:25', 6),
(112, 'LOGGED IN', '2019-12-20 02:28:30', 12),
(113, 'LOGGED OUT', '2019-12-20 03:01:44', 12),
(114, 'LOGGED IN', '2019-12-20 03:28:05', 1),
(115, 'LOGGED IN', '2019-12-20 03:28:13', 12),
(116, 'SUBMIT LBP2', '2019-12-20 03:29:40', 12),
(117, 'Added Expenditure in lbp2', '2019-12-20 03:30:24', 12),
(118, 'Accepted an ObR', '2019-12-20 03:38:04', 7);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `LB_ID` int(11) NOT NULL,
  `LB_YEAR` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`LB_ID`, `LB_YEAR`) VALUES
(5, 2019),
(6, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `mbo_control`
--

CREATE TABLE `mbo_control` (
  `MBO_ID` int(11) NOT NULL,
  `MBO_NO` int(11) NOT NULL,
  `mboIDYear` int(11) NOT NULL,
  `OBLIGATION_REQUEST_OBR_ID` int(11) NOT NULL,
  `MBO_REMARKS` varchar(100) DEFAULT NULL,
  `MBO_INITIAL` varchar(45) DEFAULT NULL,
  `MBO_TMP` decimal(38,2) DEFAULT NULL,
  `USER_USR_ID` int(11) NOT NULL,
  `CONTROL_NOTEBOOK_CTRL_NTB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mbo_control`
--

INSERT INTO `mbo_control` (`MBO_ID`, `MBO_NO`, `mboIDYear`, `OBLIGATION_REQUEST_OBR_ID`, `MBO_REMARKS`, `MBO_INITIAL`, `MBO_TMP`, `USER_USR_ID`, `CONTROL_NOTEBOOK_CTRL_NTB_ID`) VALUES
(20, 1, 2019, 1, 'awawaw', 'DSA', '0.00', 7, 19),
(21, 2, 2019, 2, '1st-sem 2019', '1s19', '0.00', 7, 19),
(22, 3, 2019, 3, '2ndsem-2019', '2s19', '0.00', 7, 19),
(23, 4, 2019, 6, ' DEC82019-1', ' DEC82019-1', '0.00', 7, 17),
(24, 5, 2019, 7, 'FEB82019-1', 'FEB82019-1', '0.00', 7, 17),
(25, 1501, 2019, 10, 'For testing', ' DEC82019-1', '0.00', 6, 19),
(26, 1503, 2019, 14, 'TRY SA SUPP', 'TSS', '9000.00', 7, 19),
(28, 1502, 2019, 8, 'REJECT-TESTING2', 'RT2', '19000.00', 7, 19),
(34, 6, 2019, 15, '', '', '10000.00', 7, 19),
(37, 1501, 2020, 19, '', '', '800000.00', 6, 26),
(39, 1502, 2020, 18, '', '', '800000.52', 6, 26),
(41, 7, 2019, 11, 'dec16-19-1', 'init', '0.00', 7, 19),
(42, 8, 2019, 9, 'dec16-19-2', 'onit2', '0.00', 7, 18),
(43, 1, 2020, 17, 'JAN12020-1', 'J12-1', '0.00', 7, 29),
(44, 1504, 2019, 13, 'unnecessary', 'TSS', '0.00', 6, 19),
(45, 1504, 2019, 13, 'unnecessary', 'TSS', '0.00', 6, 19),
(47, 1506, 2019, 22, 'testing', '', '0.00', 6, 18),
(48, 1507, 2019, 23, 'test', 'test', '0.00', 6, 18),
(49, 9, 2019, 25, 'log test', 'lt', '0.00', 7, 19),
(50, 10, 2019, 24, 'test', 'test', '0.00', 7, 18);

-- --------------------------------------------------------

--
-- Table structure for table `obligation_request`
--

CREATE TABLE `obligation_request` (
  `OBR_ID` int(11) NOT NULL,
  `OBR_NO` int(11) DEFAULT NULL,
  `obrNoYear` int(11) NOT NULL,
  `OBR_DATE` date NOT NULL,
  `OBR_APPROVED_DATE` date DEFAULT NULL,
  `LOGBOOK_LB_ID` int(11) NOT NULL,
  `USER_USR_ID` int(11) NOT NULL,
  `OBR_STATUS` enum('PENDING','CHECKED','APPROVED','DECLINED') NOT NULL,
  `OBR_PAYEE` varchar(45) NOT NULL,
  `OBR_RESPONSIBILITY_CENTER` varchar(45) DEFAULT NULL,
  `OBR_HANDLER` int(11) DEFAULT NULL,
  `obr_tempRemark` text,
  `obrViewStatus` int(11) NOT NULL,
  `signID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obligation_request`
--

INSERT INTO `obligation_request` (`OBR_ID`, `OBR_NO`, `obrNoYear`, `OBR_DATE`, `OBR_APPROVED_DATE`, `LOGBOOK_LB_ID`, `USER_USR_ID`, `OBR_STATUS`, `OBR_PAYEE`, `OBR_RESPONSIBILITY_CENTER`, `OBR_HANDLER`, `obr_tempRemark`, `obrViewStatus`, `signID`) VALUES
(1, 1, 2019, '2019-12-06', '2019-12-06', 5, 7, 'APPROVED', 'marielyd', NULL, NULL, NULL, 2, 12),
(2, 2, 2019, '2019-01-07', '2019-01-14', 5, 7, 'APPROVED', 'marielyd', NULL, NULL, NULL, 2, 12),
(3, 3, 2019, '2019-12-07', '2019-12-07', 5, 7, 'APPROVED', 'marielyd', NULL, NULL, NULL, 2, 12),
(4, 4, 2019, '2019-12-07', '2019-12-07', 5, 3, 'DECLINED', 'antonio', NULL, NULL, NULL, 2, 11),
(5, 1504, 2019, '2019-12-08', '2019-12-15', 5, 7, 'DECLINED', 'Mark', NULL, NULL, 'TEST-REJ2', 0, 12),
(6, 5, 2019, '2019-12-08', '2019-12-08', 5, 3, 'APPROVED', 'antonio', NULL, NULL, NULL, 2, 11),
(7, 6, 2019, '2019-02-08', '2019-02-08', 5, 3, 'APPROVED', 'ANOTONIO', NULL, NULL, NULL, 2, 11),
(8, 1502, 2019, '2019-12-08', '2019-12-13', 5, 7, 'APPROVED', 'Mark', NULL, NULL, NULL, 0, 12),
(9, 10, 2019, '2019-12-08', '2019-12-16', 5, 4, 'APPROVED', 'Apple', NULL, NULL, NULL, 0, 14),
(10, 1501, 2019, '2019-12-09', '2019-12-15', 5, 7, 'APPROVED', 'marielyd', NULL, NULL, NULL, 2, 12),
(11, 9, 2019, '2019-12-11', '2019-12-16', 5, 7, 'APPROVED', 'marie', NULL, NULL, NULL, 0, 12),
(12, 7, 2019, '2019-12-11', '2019-12-15', 5, 4, 'DECLINED', 'popo', NULL, NULL, NULL, 0, 14),
(13, 1505, 2019, '2019-12-13', '2019-12-16', 5, 7, 'APPROVED', 'dec132019-1', NULL, NULL, 'unnecessary', 0, 12),
(14, 1503, 2019, '2019-12-13', '2019-12-13', 5, 7, 'APPROVED', 'popo', NULL, NULL, NULL, 0, 12),
(15, 8, 2019, '2019-12-15', '2019-12-16', 5, 7, 'APPROVED', 'Test', NULL, NULL, NULL, 0, 12),
(16, NULL, 2019, '2019-12-15', NULL, 5, 7, 'PENDING', 'testing', NULL, NULL, 'remarks ako ibalik', 0, 12),
(17, 1, 2020, '2020-01-01', '2020-01-02', 6, 7, 'APPROVED', 'test', NULL, NULL, NULL, 0, 12),
(18, 1502, 2020, '2020-01-01', '2020-01-02', 6, 3, 'APPROVED', 'antonio', NULL, NULL, NULL, 0, 11),
(19, 1501, 2020, '2020-01-01', '2020-01-01', 6, 3, 'APPROVED', 'antonio', NULL, NULL, NULL, 0, 11),
(20, NULL, 0, '2020-01-02', NULL, 6, 7, 'PENDING', 'MARIE', NULL, NULL, NULL, 0, 17),
(21, NULL, 0, '2020-01-02', NULL, 6, 7, 'PENDING', 'TEST', NULL, NULL, NULL, 0, 17),
(22, 1507, 2019, '2019-12-16', '2019-12-16', 5, 4, 'APPROVED', 'apple', NULL, NULL, NULL, 0, 18),
(23, 1508, 2019, '2019-01-16', '2019-01-16', 5, 4, 'APPROVED', 'test', NULL, NULL, NULL, 0, 14),
(24, 12, 2019, '2019-01-16', '2019-12-20', 5, 4, 'CHECKED', 'popo', NULL, NULL, NULL, 0, 14),
(25, 11, 2019, '2019-12-19', '2019-12-20', 5, 7, 'APPROVED', 'mari', NULL, NULL, NULL, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `particular`
--

CREATE TABLE `particular` (
  `PART_ID` int(11) NOT NULL,
  `PART_AMOUNT` decimal(38,2) DEFAULT NULL,
  `PART_PARTICULARS` varchar(60) DEFAULT NULL,
  `EXPENDITURE_EXPENDITURE_id` int(11) DEFAULT NULL,
  `OBLIGATION_REQUEST_OBR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `particular`
--

INSERT INTO `particular` (`PART_ID`, `PART_AMOUNT`, `PART_PARTICULARS`, `EXPENDITURE_EXPENDITURE_id`, `OBLIGATION_REQUEST_OBR_ID`) VALUES
(38, '3000.00', 'BH-DEC062019-1', 1, 1),
(39, '1000.00', '1st sem - 2019', 1, 2),
(40, '5000.00', '2nd sem - 2019', 1, 3),
(41, '10000000.00', 'try-to-reject dec72019', 10, 4),
(42, '10000.00', 'For travel', 1, 5),
(43, '5000.00', 'DEC82019-1', 22, 6),
(44, '12000.00', 'FEB8-19-1', 22, 7),
(45, '10000.00', 'For travel', 1, 8),
(46, '100000.00', 'for travel', 1, 9),
(47, '10000.00', 'For travel', 20, 10),
(48, '120200.66', 'dec112019-1', 2, 11),
(49, '11111011.00', 'For travel', 1, 12),
(50, '15000.00', 'dec132019-1', 2, 13),
(51, '1000000.00', 'SALARY', 1, 14),
(52, '1000000.00', 'travel', 20, 15),
(53, '1000000.00', 'travel 1', 9, 16),
(54, '99999.00', 'trsvel', 1, 17),
(55, '1000000.00', 'travel', 2, 18),
(56, '1000000.00', 'SALARY', 40, 19),
(57, '1900.00', 'JAN22020-1', NULL, 20),
(58, '3232.00', 'For travel', NULL, 21),
(59, '150000.00', 'fruits and vegetables', 1, 22),
(60, '10000.00', 'test', 1, 23),
(61, '10000.00', 'popo', 1, 24),
(62, '50000.00', 'log test', 37, 25);

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `signID` int(11) NOT NULL,
  `signPrepared` text NOT NULL,
  `signReviewed` text NOT NULL,
  `signApproved` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`signID`, `signPrepared`, `signReviewed`, `signApproved`) VALUES
(1, 'Department Head', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIOs'),
(11, 'HON. Antonio H. Baculio', 'Marielyd A. Ferrer, CPA', 'HON. Antonio H. Baculio'),
(12, 'Marielyd A. Ferrer, CPA', 'Marielyd A. Ferrer, CPA', 'HON. Antonio H. Baculio'),
(13, 'Angel Grace C. Samiley', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIO'),
(14, 'Apple Sarah Concepcion', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIO'),
(15, 'Angel Grace C. Samiley', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIO'),
(16, 'antonio', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIOs'),
(17, 'Marielyd A. Ferrer, CPA', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIOs'),
(18, 'Apple Sarah Concepcion', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIOs'),
(19, 'Angel C. Samiley', 'MARIELYD A. FERRER, CPA', 'HON. ANTONIO H. BACULIOs'),
(20, 'Marielyd A. Ferrer', 'Antonio H Baculio', 'Marielyd A. Ferrer'),
(21, 'Jessa Mae J. Jorgio', 'Marielyd A. Ferrer', 'Antonio H Baculio'),
(22, 'Carla Mae Y. Raman', 'Antonio H Baculio', 'Marielyd A. Ferrer'),
(23, 'Carla Mae Yano Raman', 'Marielyd A. Ferrer', 'Antonio H Baculio');

-- --------------------------------------------------------

--
-- Table structure for table `spa_program`
--

CREATE TABLE `spa_program` (
  `PROG_ID` int(11) NOT NULL,
  `PROG_NAME` varchar(45) NOT NULL,
  `EXPCLASS_EXPCLASS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USR_ID` int(11) NOT NULL,
  `USR_FNAME` varchar(15) NOT NULL,
  `USR_MNAME` varchar(15) NOT NULL,
  `USR_LNAME` varchar(15) NOT NULL,
  `DEPARTMENT_DPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USR_ID`, `USR_FNAME`, `USR_MNAME`, `USR_LNAME`, `DEPARTMENT_DPT_ID`) VALUES
(1, 'Marielyd', 'A.', 'Ferrer', 1071),
(2, 'Mark Christian', 'Concepcion', 'Lambino', 1071),
(3, 'Antonio', 'H', 'Baculio', 1011),
(4, 'Apple Sarah ', 'S.', 'Concepcion', 1021),
(5, 'Angel Grace', 'C.', 'Samiley', 1081),
(6, 'Jasmin', 'Aladin', 'Generalao', 1071),
(7, 'Marielyd', 'A.', 'Ferrer', 1071),
(10, 'Jessa Mae', 'M.', 'Dalida', 1041),
(16, 'Jessa Mae', 'J.', 'Jorgio', 1091),
(17, 'Jana', 'D.', 'Sybil', 1071),
(18, 'Jaydee', 'O.', 'Lambino', 1101),
(19, 'Carla Mae', 'Yano', 'Raman', 4411),
(20, 'Lujemin ', 'M.', 'Fabricante', 7611);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_code` int(11) NOT NULL,
  `role_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_code`, `role_desc`) VALUES
(1, 0, 'ADMIN'),
(2, 1, 'DEPARTMENT HEAD'),
(3, 2, 'BUDGET OFFICER'),
(4, 2, 'BUDGET OFFICER 2'),
(5, 3, 'BUDGET HEAD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `augmentation`
--
ALTER TABLE `augmentation`
  ADD PRIMARY KEY (`augment_id`);

--
-- Indexes for table `control_notebook`
--
ALTER TABLE `control_notebook`
  ADD PRIMARY KEY (`CTRL_NTB_ID`),
  ADD KEY `fk_CONTROL NOTEBOOK_DEPARTMENT1_idx` (`DEPARTMENT_DPT_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DPT_ID`);

--
-- Indexes for table `dept_user`
--
ALTER TABLE `dept_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dept_user_department1_idx` (`DPT_ID`),
  ADD KEY `fk_dept_user_user1_idx` (`USR_ID`),
  ADD KEY `fk_dept_user_user_role1_idx` (`role_id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`EXPENDITURE_id`),
  ADD KEY `fk_EXPENDITURE_EXPENDITURE_CLASS1_idx` (`EXPENDITURE_CLASS_EXPCLASS_ID`);

--
-- Indexes for table `expenditure_class`
--
ALTER TABLE `expenditure_class`
  ADD PRIMARY KEY (`EXPCLASS_ID`);

--
-- Indexes for table `lbp_expenditure`
--
ALTER TABLE `lbp_expenditure`
  ADD PRIMARY KEY (`LBP_EXP_ID`),
  ADD KEY `fk_LBP_EXPENDITURE_EXPENDITURE1_idx` (`EXPENDITURE_EXPENDITURE_id`),
  ADD KEY `fk_LBP_EXPENDITURE_LBP_FORM1_idx` (`LBP_FORM_FRM_ID`);

--
-- Indexes for table `lbp_form`
--
ALTER TABLE `lbp_form`
  ADD PRIMARY KEY (`FRM_ID`),
  ADD KEY `fk_LBP_FORM_USER_idx` (`USER_USR_ID`),
  ADD KEY `fk_lbp_form_signtaure1_idx` (`signID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_log_dept_user1_idx` (`dept_user_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`LB_ID`);

--
-- Indexes for table `mbo_control`
--
ALTER TABLE `mbo_control`
  ADD PRIMARY KEY (`MBO_ID`),
  ADD KEY `fk_MBO_CONTROL_OBLIGATION_REQUEST1_idx` (`OBLIGATION_REQUEST_OBR_ID`),
  ADD KEY `fk_MBO_CONTROL_USER1_idx` (`USER_USR_ID`),
  ADD KEY `fk_MBO_CONTROL_CONTROL_NOTEBOOK1_idx` (`CONTROL_NOTEBOOK_CTRL_NTB_ID`);

--
-- Indexes for table `obligation_request`
--
ALTER TABLE `obligation_request`
  ADD PRIMARY KEY (`OBR_ID`),
  ADD KEY `fk_OBLIGATION_REQUEST_LOGBOOK1_idx` (`LOGBOOK_LB_ID`),
  ADD KEY `fk_OBLIGATION_REQUEST_USER1_idx` (`USER_USR_ID`),
  ADD KEY `fk_obligation_request_signtaure1_idx` (`signID`);

--
-- Indexes for table `particular`
--
ALTER TABLE `particular`
  ADD PRIMARY KEY (`PART_ID`),
  ADD KEY `fk_Particulars_EXPENDITURE1_idx` (`EXPENDITURE_EXPENDITURE_id`),
  ADD KEY `fk_PARTICULAR_OBLIGATION_REQUEST1_idx` (`OBLIGATION_REQUEST_OBR_ID`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`signID`);

--
-- Indexes for table `spa_program`
--
ALTER TABLE `spa_program`
  ADD PRIMARY KEY (`PROG_ID`),
  ADD KEY `EXPCLASS_ID_idx` (`EXPCLASS_EXPCLASS_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USR_ID`),
  ADD KEY `fk_USER_DEPARTMENT1_idx` (`DEPARTMENT_DPT_ID`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `augmentation`
--
ALTER TABLE `augmentation`
  MODIFY `augment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `control_notebook`
--
ALTER TABLE `control_notebook`
  MODIFY `CTRL_NTB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7612;
--
-- AUTO_INCREMENT for table `dept_user`
--
ALTER TABLE `dept_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `EXPENDITURE_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `expenditure_class`
--
ALTER TABLE `expenditure_class`
  MODIFY `EXPCLASS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lbp_expenditure`
--
ALTER TABLE `lbp_expenditure`
  MODIFY `LBP_EXP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=916;
--
-- AUTO_INCREMENT for table `lbp_form`
--
ALTER TABLE `lbp_form`
  MODIFY `FRM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `LB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mbo_control`
--
ALTER TABLE `mbo_control`
  MODIFY `MBO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `particular`
--
ALTER TABLE `particular`
  MODIFY `PART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `signID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `control_notebook`
--
ALTER TABLE `control_notebook`
  ADD CONSTRAINT `fk_CONTROL NOTEBOOK_DEPARTMENT1` FOREIGN KEY (`DEPARTMENT_DPT_ID`) REFERENCES `department` (`DPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dept_user`
--
ALTER TABLE `dept_user`
  ADD CONSTRAINT `fk_dept_user_department1` FOREIGN KEY (`DPT_ID`) REFERENCES `department` (`DPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dept_user_user1` FOREIGN KEY (`USR_ID`) REFERENCES `user` (`USR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dept_user_user_role1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD CONSTRAINT `fk_EXPENDITURE_EXPENDITURE_CLASS1` FOREIGN KEY (`EXPENDITURE_CLASS_EXPCLASS_ID`) REFERENCES `expenditure_class` (`EXPCLASS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lbp_expenditure`
--
ALTER TABLE `lbp_expenditure`
  ADD CONSTRAINT `fk_LBP_EXPENDITURE_EXPENDITURE1` FOREIGN KEY (`EXPENDITURE_EXPENDITURE_id`) REFERENCES `expenditure` (`EXPENDITURE_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LBP_EXPENDITURE_LBP_FORM1` FOREIGN KEY (`LBP_FORM_FRM_ID`) REFERENCES `lbp_form` (`FRM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lbp_form`
--
ALTER TABLE `lbp_form`
  ADD CONSTRAINT `fk_LBP_FORM_USER` FOREIGN KEY (`USER_USR_ID`) REFERENCES `user` (`USR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lbp_form_signtaure1` FOREIGN KEY (`signID`) REFERENCES `signature` (`signID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_dept_user1` FOREIGN KEY (`dept_user_id`) REFERENCES `dept_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mbo_control`
--
ALTER TABLE `mbo_control`
  ADD CONSTRAINT `fk_MBO_CONTROL_CONTROL_NOTEBOOK1` FOREIGN KEY (`CONTROL_NOTEBOOK_CTRL_NTB_ID`) REFERENCES `control_notebook` (`CTRL_NTB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MBO_CONTROL_OBLIGATION_REQUEST1` FOREIGN KEY (`OBLIGATION_REQUEST_OBR_ID`) REFERENCES `obligation_request` (`OBR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MBO_CONTROL_USER1` FOREIGN KEY (`USER_USR_ID`) REFERENCES `user` (`USR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `obligation_request`
--
ALTER TABLE `obligation_request`
  ADD CONSTRAINT `fk_OBLIGATION_REQUEST_LOGBOOK1` FOREIGN KEY (`LOGBOOK_LB_ID`) REFERENCES `logbook` (`LB_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OBLIGATION_REQUEST_USER1` FOREIGN KEY (`USER_USR_ID`) REFERENCES `user` (`USR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_obligation_request_signtaure1` FOREIGN KEY (`signID`) REFERENCES `signature` (`signID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `particular`
--
ALTER TABLE `particular`
  ADD CONSTRAINT `fk_PARTICULAR_OBLIGATION_REQUEST1` FOREIGN KEY (`OBLIGATION_REQUEST_OBR_ID`) REFERENCES `obligation_request` (`OBR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Particulars_EXPENDITURE1` FOREIGN KEY (`EXPENDITURE_EXPENDITURE_id`) REFERENCES `expenditure` (`EXPENDITURE_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spa_program`
--
ALTER TABLE `spa_program`
  ADD CONSTRAINT `EXPCLASS_ID` FOREIGN KEY (`EXPCLASS_EXPCLASS_ID`) REFERENCES `expenditure_class` (`EXPCLASS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_USER_DEPARTMENT1` FOREIGN KEY (`DEPARTMENT_DPT_ID`) REFERENCES `department` (`DPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
