-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2019 at 07:19 AM
-- Server version: 5.7.20
-- PHP Version: 7.1.12

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
-- Table structure for table `assignation`
--

CREATE TABLE `assignation` (
  `assign_id` int(11) NOT NULL,
  `assign_name` varchar(40) NOT NULL,
  `assign_post` enum('MAYOR','BUDGET HEAD','DEPARTMENT HEAD') NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignation`
--

INSERT INTO `assignation` (`assign_id`, `assign_name`, `assign_post`, `assign_date`) VALUES
(1, 'try', 'MAYOR', '2019-07-17'),
(2, 'Mayor Bambi', 'MAYOR', '2019-07-17'),
(3, 'Ms. Marielyd A. Ferrer, CPA', 'BUDGET HEAD', '2019-07-17'),
(4, 'Ms. Marielyd A. Ferrer', 'BUDGET HEAD', '2019-07-17'),
(5, 'Ms. Marielyd A. Ferrer, CPA', '', '2019-07-17'),
(6, 'Mayor Bambi Emano', 'MAYOR', '2019-07-27'),
(7, 'Ms. Marielyd A. Ferrers', 'BUDGET HEAD', '2019-07-27'),
(8, 'Ms. Marielyd A. Ferrer', 'BUDGET HEAD', '2019-07-27'),
(9, 'Bambi sa Disney', 'MAYOR', '2019-11-20'),
(10, 'Mayor Bambi Emano', 'MAYOR', '2019-11-20'),
(11, 'Mayor Bambi Emano', 'MAYOR', '2019-11-20'),
(12, 'Mayor Bambi Emano', 'MAYOR', '2019-11-20'),
(13, 'I\'m a Bambi Girl', 'MAYOR', '2019-11-20'),
(14, 'Ferrer-o Roche', 'BUDGET HEAD', '2019-11-20'),
(15, 'HON. ANTONIO BACULIO', 'MAYOR', '2019-11-20'),
(16, 'MARIELYD A. FERRER, CPA', 'BUDGET HEAD', '2019-11-20'),
(17, 'HON. ANTONIO BACULIOS', 'MAYOR', '2019-11-20'),
(18, 'HON. ANTONIO BACULIO', 'MAYOR', '2019-11-20');

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
(1, 2019, 1011, NULL),
(2, 2019, 1021, NULL),
(3, 2019, 1041, NULL),
(4, 2019, 1051, NULL),
(5, 2019, 1071, NULL),
(6, 2019, 1081, NULL),
(7, 2019, 1091, NULL),
(8, 2019, 1101, NULL),
(9, 2019, 4411, NULL),
(10, 2019, 7611, NULL),
(11, 2019, 8711, NULL),
(12, 2019, 8751, NULL),
(13, 2019, 8811, NULL),
(14, 2019, 8812, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DPT_ID` int(11) NOT NULL,
  `DPT_NAME` varchar(30) NOT NULL,
  `deptHead` varchar(50) NOT NULL,
  `DPT_STATUS` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DPT_ID`, `DPT_NAME`, `deptHead`, `DPT_STATUS`) VALUES
(1001, 'Na edit na sad ni sya', '', 'ACTIVE'),
(1011, 'Mayor`s Office', 'Mayor`s Office', 'ACTIVE'),
(1021, 'Sangguniang Bayan', 'Sangguniang Bayan', 'ACTIVE'),
(1041, 'Municipal Planning Development', 'Municipal Planning Development', 'ACTIVE'),
(1051, 'Municipal Civil Registrar', 'Municipal Civil Registrar', 'ACTIVE'),
(1071, 'Municipal Budget Office', 'Municipal Budget Office', 'ACTIVE'),
(1081, 'Municipal Accounting', 'Municipal Accounting', 'ACTIVE'),
(1091, 'Municipal Treasurers Office', 'Municipal Treasurers Office', 'ACTIVE'),
(1101, 'Municipal Assesor', 'Municipal Assesor', 'ACTIVE'),
(1103, 'Dummy', 'Dummy', 'INACTIVE'),
(1112, 'Department of Mark', 'Department of Mark', 'INACTIVE'),
(1234, 'MPESO', 'MPESO', 'ACTIVE'),
(4411, 'Municipal Health Office', 'Municipal Health Office', 'ACTIVE'),
(7611, 'Municipal Social Welfare Devel', 'Municipal Social Welfare Devel', 'ACTIVE'),
(8711, 'Municipal Agricultural Office', 'Municipal Agricultural Office', 'ACTIVE'),
(8751, 'Municipal Engineering Office', 'Municipal Engineering Office', 'ACTIVE'),
(8811, 'Public Market', 'Public Market', 'ACTIVE'),
(8812, 'Economic Enterprise', 'Economic Enterprise', 'ACTIVE'),
(9999, 'Municipal Public Employment Se', 'Municipal Public Employment Se', 'ACTIVE'),
(11111, 'Department of Marck', 'Department of Marck', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `EXP_ACCT_CODE` varchar(11) NOT NULL,
  `EXP_NAME` varchar(60) NOT NULL,
  `EXPENDITURE_CLASS_EXPCLASS_ID` int(11) NOT NULL,
  `EXPENDITURE_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`EXP_ACCT_CODE`, `EXP_NAME`, `EXPENDITURE_CLASS_EXPCLASS_ID`, `EXPENDITURE_id`) VALUES
('5-01-01-010', 'Salaries & Wages - Regular', 1, 1),
('5-01-02-120', 'Step Increment/Longetivity Pay', 1, 2),
('5-01-01-020', 'Salaries & Wages - Casual/Contractual', 1, 3),
('5-01-02-010', 'PERA', 1, 4),
('5-01-02-020', 'Representation Allowance (RA)', 1, 5),
('5-01-02-030', 'Transportation Allowance (TA)', 1, 6),
('5-01-02-040', 'Clothing/Uniform Allowance', 1, 7),
('5-01-02-990', 'Productivity Enhancement Incentive', 1, 8),
('5-01-02-150', 'Cash Gift', 1, 9),
('5-01-02-990', 'Mid-Year Bonus', 1, 10),
('5-01-02-140', 'Year End Bonus', 1, 11),
('5-01-03-010', 'Retirement & Life Insurance Premium', 1, 12),
('5-01-03-020', 'PAG-IBIG Contribution', 1, 13),
('5-01-03-030', 'Philippine Health Contribution', 1, 14),
('5-01-03-040', 'Employees Compensation Insurance Premium', 1, 15),
('5-01-04-030', 'Terminal Leave Benefits', 1, 16),
('5-01-04-030', 'Reserved for Salary Increase & Creation New Positions', 1, 17),
('5-01-02-110', 'Extra Hazard', 1, 18),
('5-02-01-010', 'Traveling Expenses - Local ', 2, 19),
('5-02-02-010', 'Trainings and Seminars Expenses', 2, 20),
('5-02-03-990', 'Other Supplies & Material Expenses', 2, 21),
('5-02-03-090', 'Fuel, Oil and Lubricants Expenses', 2, 22),
('5-02-04-020', 'Electricity Expenses', 2, 23),
('5-02-05-000', 'Communication Expenses', 2, 24),
('5-02-05-030', 'Internet Expenses', 2, 25),
('5-02-99-030', 'Representation Expense', 2, 26),
('5-02-99-040', 'Transportation Expenses', 2, 27),
('5-02-99-070', 'Subscription Expenses', 2, 28),
('5-02-13-050', 'Repair & Maint.-Other PPE', 2, 29),
('5-02-13-060', 'Repair & Maint.-Transportation Expenses', 2, 30),
('5-02-10-010', 'Confidential Fund', 2, 31),
('5-02-10-030', 'Extraordinary & Misc. Exp.', 2, 32),
('5-02-16-020', 'Fidelity Bond Premium', 2, 33),
('5-02-11-020', 'Auditing Services', 2, 34),
('5-02-99-060', 'Membership Due & Contribution to Organization', 2, 35),
('5-02-99-990', 'Other MOOE', 2, 36),
('1-07-99-990', 'Other Property, Plant & Equipment', 3, 37),
('1-07-04-010', 'Municipal Hall Building', 3, 38),
('5-02-04-080', 'Subsidy to Economic Enterprise Operation', 4, 39),
('5-02-12-990', 'Market-Other General Services', 4, 40),
('5-02-12-990', 'Watersystem', 4, 41),
('1-22-18-432', 'instruments and hardware', 4, 42),
('1-11-11-111', 'Naeditna sya', 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_class`
--

CREATE TABLE `expenditure_class` (
  `EXPCLASS_ID` int(11) NOT NULL,
  `EXPCLASS_NAME` varchar(50) NOT NULL,
  `SPA_PROGRAM_PROG_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditure_class`
--

INSERT INTO `expenditure_class` (`EXPCLASS_ID`, `EXPCLASS_NAME`, `SPA_PROGRAM_PROG_ID`) VALUES
(1, 'Personal Services', NULL),
(2, 'MAINTENANCE AND OTHER OPERATING EXPENSES', NULL),
(3, 'CAPITAL OUTLAY', NULL),
(4, 'SPECIAL PURPOSE APPROPRIATIONS', 1);

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
(1, 1, 292, '2200.00'),
(2, 1, 293, '333333.00'),
(3, 1, 294, '444444.00'),
(4, 1, 295, '500.75'),
(37, 1, 296, '300.00'),
(38, 1, 297, '306.00'),
(1, 2, 298, '3332.00'),
(2, 2, 299, '4444.00'),
(3, 2, 300, '55555.00'),
(4, 2, 301, '100.00'),
(7, 2, 302, '300.00'),
(1, 3, 303, '121200.25'),
(2, 3, 304, '125000.00'),
(3, 3, 305, '90000.00'),
(19, 3, 306, '100300.00'),
(20, 3, 307, '20000.00'),
(21, 3, 308, '300000.25'),
(37, 3, 309, '400000.00'),
(38, 3, 310, '50000.00'),
(39, 3, 311, '6000000.00'),
(40, 3, 312, '150300.25'),
(1, 4, 313, '120000.00'),
(2, 4, 314, '130000.00'),
(3, 4, 315, '140000.00'),
(4, 4, 316, '150000.00'),
(5, 4, 317, '160000.00'),
(6, 4, 318, '170000.00'),
(7, 4, 319, '180000.00'),
(8, 4, 320, '190000.00'),
(9, 4, 321, '20000.00'),
(10, 4, 322, '30000.00'),
(11, 4, 323, '40000.00'),
(12, 4, 324, '50000.00'),
(13, 4, 325, '123000.00'),
(14, 4, 326, '250000.00'),
(15, 4, 327, '450000.55'),
(16, 4, 328, '120000.00'),
(17, 4, 329, '100000000.00'),
(18, 4, 330, '20000000.00'),
(19, 4, 331, '30000000.00'),
(20, 4, 332, '4000000.00'),
(21, 4, 333, '5000000.00'),
(22, 4, 334, '66000000.00'),
(23, 4, 335, '7000000.00'),
(24, 4, 336, '8000000.00'),
(25, 4, 337, '9000000.00'),
(26, 4, 338, '1000000.00'),
(27, 4, 339, '111000000.00'),
(28, 4, 340, '1230000.00'),
(29, 4, 341, '10000.00'),
(30, 4, 342, '1000000.00'),
(31, 4, 343, '1200000.00'),
(32, 4, 344, '3000000.00'),
(33, 4, 345, '400000.00'),
(34, 4, 346, '500000.00'),
(35, 4, 347, '900000.00'),
(36, 4, 348, '1900000.00'),
(37, 4, 349, '100001.00'),
(38, 4, 350, '230000.25'),
(39, 4, 351, '15000.25'),
(40, 4, 352, '250000.50'),
(41, 4, 353, '230000.75'),
(1, 5, 354, '11000000.25'),
(2, 5, 355, '3000000.50'),
(3, 5, 356, '9900002.00'),
(4, 5, 357, '123000.25'),
(5, 5, 358, '25000.65'),
(19, 5, 359, '9500000.00'),
(20, 5, 360, '1520000.00'),
(21, 5, 361, '30000.00'),
(22, 5, 362, '61111111.00'),
(23, 5, 363, '52854000.00'),
(37, 5, 364, '2416000.00'),
(38, 5, 365, '985644.66'),
(39, 5, 366, '450000.00'),
(40, 5, 367, '65203.00'),
(41, 5, 368, '300500.52'),
(1, 6, 369, '12000000.24'),
(2, 6, 370, '300000.00'),
(3, 6, 371, '899999.99'),
(4, 6, 372, '1123000.25'),
(5, 6, 373, '25000.65'),
(19, 6, 374, '500000.00'),
(20, 6, 375, '520000.00'),
(21, 6, 376, '30000.00'),
(22, 6, 377, '11111100.00'),
(23, 6, 378, '554000.00'),
(37, 6, 379, '2416000.00'),
(38, 6, 380, '985644.66'),
(39, 6, 381, '450000.00'),
(40, 6, 382, '65200.00'),
(41, 6, 383, '35500.52'),
(1, 7, 384, '12300000.00'),
(2, 7, 385, '2300000.00'),
(3, 7, 386, '10000000.00'),
(4, 7, 387, '2000000.00'),
(5, 7, 388, '3000000.00'),
(6, 7, 389, '4000000.00'),
(7, 7, 390, '5000000.00'),
(8, 7, 391, '6000000.00'),
(9, 7, 392, '7000000.00'),
(10, 7, 393, '8888888.00'),
(11, 7, 394, '9900000.00'),
(12, 7, 395, '11000000.00'),
(13, 7, 396, '22000000.00'),
(14, 7, 397, '33000000.00'),
(15, 7, 398, '44000000.00'),
(16, 7, 399, '123000.00'),
(17, 7, 400, '3440000.00'),
(18, 7, 401, '2000000.00'),
(19, 7, 402, '300000.00'),
(20, 7, 403, '1000000.00'),
(21, 7, 404, '200000.00'),
(22, 7, 405, '3000000.00'),
(23, 7, 406, '4000000.00'),
(37, 7, 407, '5000000.00'),
(38, 7, 408, '600000.00'),
(39, 7, 409, '700000.00'),
(40, 7, 410, '8000000.00'),
(41, 7, 411, '9000000.00'),
(1, 8, 412, '3213222.00'),
(2, 8, 413, '333333333.00'),
(3, 8, 414, '333333333.00'),
(4, 8, 415, '4444444444.00'),
(5, 8, 416, '99999999999.00'),
(6, 8, 417, '55555555.00'),
(7, 8, 418, '888888888.00'),
(8, 8, 419, '8888888888.00'),
(9, 8, 420, '444444.00'),
(10, 8, 421, '555555555.00'),
(11, 8, 422, '1111111111.00'),
(12, 8, 423, '22222222222.00'),
(13, 8, 424, '333333333333.00'),
(14, 8, 425, '4444444444.13'),
(15, 8, 426, '555555555.00'),
(16, 8, 427, '666666666666666.00'),
(17, 8, 428, '321321313.00'),
(18, 8, 429, '4324324324.00'),
(19, 8, 430, '432423423423.00'),
(20, 8, 431, '4324.00'),
(21, 8, 432, '76.00'),
(22, 8, 433, '76.00'),
(23, 8, 434, '767.00'),
(24, 8, 435, '6.00'),
(25, 8, 436, '767.00'),
(26, 8, 437, '67.00'),
(27, 8, 438, '675675.00'),
(28, 8, 439, '765.00'),
(29, 8, 440, '765658.00'),
(30, 8, 441, '7687.00'),
(31, 8, 442, '687.00'),
(32, 8, 443, '687.00'),
(33, 8, 444, '687.00'),
(34, 8, 445, '6.00'),
(35, 8, 446, '876.00'),
(36, 8, 447, '7858.00'),
(37, 8, 448, '56.00'),
(38, 8, 449, '587.00'),
(39, 8, 450, '5687.00'),
(40, 8, 451, '687.00'),
(41, 8, 452, '687.00'),
(42, 8, 453, '687.00'),
(1, 9, 454, '12000000.00'),
(2, 9, 455, '3200000.00'),
(3, 9, 456, '4400000.00'),
(4, 9, 457, '70000000.00'),
(5, 9, 458, '2000000.00'),
(6, 9, 459, '3000000.00'),
(7, 9, 460, '40000000.00'),
(8, 9, 461, '2300000.00'),
(9, 9, 462, '2300000.00'),
(10, 9, 463, '1200000.00'),
(11, 9, 464, '4444400.00'),
(12, 9, 465, '44405060.00'),
(13, 9, 466, '40000502.00'),
(14, 9, 467, '4240000.00'),
(15, 9, 468, '1000000.00'),
(16, 9, 469, '1000000.00'),
(17, 9, 470, '2000000.00'),
(18, 9, 471, '3000000.00'),
(19, 9, 472, '4000000.00'),
(20, 9, 473, '5000000.00'),
(21, 9, 474, '6000000.00'),
(25, 9, 475, '700000.00'),
(28, 9, 476, '800000.00'),
(30, 9, 477, '900000.00'),
(31, 9, 478, '101001000.00'),
(34, 9, 479, '11000000.00'),
(36, 9, 480, '12000000.00'),
(38, 9, 481, '140000.00'),
(39, 9, 482, '150000.00'),
(41, 9, 483, '100000.00'),
(1, 10, 484, '1230000.00'),
(2, 10, 485, '2340000.00'),
(3, 10, 486, '345000.00'),
(4, 10, 487, '4560000.00'),
(5, 10, 488, '678000.00'),
(8, 10, 489, '789000.00'),
(9, 10, 490, '890000.00'),
(10, 10, 491, '100000.00'),
(11, 10, 492, '200000.00'),
(14, 10, 493, '300000.00'),
(15, 10, 494, '400000.00'),
(16, 10, 495, '50000.00'),
(17, 10, 496, '60000.00'),
(19, 10, 497, '700000.00'),
(20, 10, 498, '800000.00'),
(21, 10, 499, '900000.00'),
(22, 10, 500, '101000.00'),
(23, 10, 501, '110000.00'),
(24, 10, 502, '120000.00'),
(30, 10, 503, '130000.00'),
(34, 10, 504, '140000.00'),
(36, 10, 505, '150000.00'),
(37, 10, 506, '16000.00'),
(38, 10, 507, '170000.00'),
(39, 10, 508, '180000.00'),
(41, 10, 509, '190000.00'),
(42, 10, 510, '202000.00'),
(1, 11, 511, '23324242.00'),
(2, 11, 512, '43243242.00'),
(3, 11, 513, '3200000.00'),
(19, 11, 514, '32.00'),
(21, 11, 515, '232.00'),
(37, 11, 516, '32323.00'),
(39, 11, 517, '323232.00');

-- --------------------------------------------------------

--
-- Table structure for table `lbp_form`
--

CREATE TABLE `lbp_form` (
  `FRM_ID` int(11) NOT NULL,
  `FRM_NO` binary(1) NOT NULL,
  `FRM_YEAR` year(4) NOT NULL,
  `FRM_STATUS` enum('PROPOSED','FINALIZED') NOT NULL,
  `USER_USR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lbp_form`
--

INSERT INTO `lbp_form` (`FRM_ID`, `FRM_NO`, `FRM_YEAR`, `FRM_STATUS`, `USER_USR_ID`) VALUES
(1, 0x31, 2018, 'FINALIZED', 20),
(2, 0x31, 2018, 'FINALIZED', 2),
(3, 0x31, 2018, 'FINALIZED', 22),
(4, 0x31, 2019, 'FINALIZED', 22),
(5, 0x31, 2019, 'FINALIZED', 20),
(6, 0x31, 2020, 'PROPOSED', 20),
(7, 0x31, 2019, 'FINALIZED', 2),
(8, 0x31, 2019, 'FINALIZED', 4),
(9, 0x31, 2019, 'FINALIZED', 3),
(10, 0x31, 2019, 'FINALIZED', 5),
(11, 0x31, 2020, 'PROPOSED', 4);

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
(1, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `mbo_control`
--

CREATE TABLE `mbo_control` (
  `MBO_ID` int(11) NOT NULL,
  `mboIDYear` int(11) NOT NULL,
  `OBLIGATION_REQUEST_OBR_ID` int(11) NOT NULL,
  `USER_USR_ID` int(11) NOT NULL,
  `CONTROL_NOTEBOOK_CTRL_NTB_ID` int(11) NOT NULL,
  `MBO_REMARKS` varchar(100) DEFAULT NULL,
  `MBO_INITIAL` varchar(45) DEFAULT NULL,
  `MBO_TMP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mbo_control`
--

INSERT INTO `mbo_control` (`MBO_ID`, `mboIDYear`, `OBLIGATION_REQUEST_OBR_ID`, `USER_USR_ID`, `CONTROL_NOTEBOOK_CTRL_NTB_ID`, `MBO_REMARKS`, `MBO_INITIAL`, `MBO_TMP`) VALUES
(1, 2019, 1, 19, 5, 'remark', 'initial', 0),
(2, 2019, 3, 19, 5, '', '', 0),
(3, 2019, 4, 19, 5, '', '', 0),
(4, 2019, 6, 19, 5, 'check date test', 'cdt', 0),
(5, 2019, 7, 19, 5, 'supp/add 0.1', '', 5000),
(6, 2019, 8, 19, 5, 'naa ni add approp/supplemental', 'nnaas', 750000),
(7, 2019, 9, 15023, 1, 'dsadsa', 'dsa', 0),
(8, 2019, 10, 19, 5, '', '', 0),
(9, 2019, 11, 19, 5, '', '', 0),
(10, 2019, 12, 19, 5, '', '', 0),
(11, 2019, 15, 19, 5, 'nov6-1', 'nov6-1', 0),
(12, 2019, 13, 15023, 3, 'nov19-1', 'nov19-1', 0),
(13, 2019, 17, 15023, 4, '', '', 0),
(14, 2019, 18, 15023, 3, 'nov20-1', 'nov20-1', 0),
(15, 2019, 19, 15023, 5, 'nov-20-2', 'nov-20-2', 0),
(16, 2019, 20, 15023, 3, 'Nov-20-3', 'Nov-20-3', 0);

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
  `OBR_HANDLER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obligation_request`
--

INSERT INTO `obligation_request` (`OBR_ID`, `OBR_NO`, `obrNoYear`, `OBR_DATE`, `OBR_APPROVED_DATE`, `LOGBOOK_LB_ID`, `USER_USR_ID`, `OBR_STATUS`, `OBR_PAYEE`, `OBR_RESPONSIBILITY_CENTER`, `OBR_HANDLER`) VALUES
(1, 1, 2019, '2019-08-14', '2019-08-20', 1, 20, 'APPROVED', 'Mark Christian Lambino', NULL, NULL),
(2, 2, 2019, '2019-08-16', '2019-08-17', 1, 20, 'DECLINED', 'Silvestre', NULL, NULL),
(3, 3, 2019, '2019-08-17', '2019-11-20', 1, 20, 'APPROVED', 'sybil', NULL, NULL),
(4, 4, 2019, '2019-08-20', '2019-11-20', 1, 20, 'APPROVED', 'kate', NULL, NULL),
(5, 5, 2019, '2019-08-20', '2019-08-21', 1, 20, 'DECLINED', 'derek', NULL, NULL),
(6, 6, 2019, '2019-08-20', '2019-11-13', 1, 20, 'APPROVED', 'naeto', NULL, NULL),
(7, 7, 2019, '2019-08-24', '2019-11-13', 1, 20, 'APPROVED', 'mark', NULL, NULL),
(8, 8, 2019, '2019-08-26', '2019-11-19', 1, 20, 'APPROVED', 'CHRISTINE MAE C. PANORIL', NULL, NULL),
(9, 9, 2019, '2019-08-27', '2019-10-15', 1, 2, 'APPROVED', 'Mark Christian Lambino', NULL, NULL),
(10, 10, 2019, '2019-08-27', '2019-11-08', 1, 20, 'APPROVED', 'lambino', NULL, NULL),
(11, 11, 2019, '2019-10-29', '2019-11-26', 1, 20, 'APPROVED', 'dumyhsdhf', NULL, NULL),
(12, 12, 2019, '2019-10-29', '2019-11-08', 1, 20, 'APPROVED', 'vcvvb n', NULL, NULL),
(13, 15, 2019, '2019-10-29', '2019-11-19', 1, 4, 'CHECKED', 'mak', NULL, NULL),
(14, 13, 2019, '2019-10-29', '2019-10-29', 1, 20, 'CHECKED', 'makmak', NULL, NULL),
(15, 14, 2019, '2019-11-06', '2019-11-08', 1, 20, 'APPROVED', 'nov6-1', NULL, NULL),
(16, 16, 2019, '2019-11-07', '2019-11-19', 1, 2, 'DECLINED', 'nov07-1', NULL, NULL),
(17, 17, 2019, '2019-11-19', '2019-11-20', 1, 5, 'APPROVED', 'Carla Mae Raman', NULL, NULL),
(18, 18, 2019, '2019-11-20', '2019-11-20', 1, 4, 'CHECKED', 'nov20-1', NULL, NULL),
(19, 19, 2019, '2019-11-20', '2019-11-20', 1, 20, 'CHECKED', 'nov20-2', NULL, NULL),
(20, 20, 2019, '2019-11-20', '2019-11-20', 1, 4, 'CHECKED', 'Nov-20-3', NULL, NULL),
(21, NULL, 0, '2019-11-20', NULL, 1, 4, 'PENDING', 'Nov-20-4', NULL, NULL);

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
(1, '300000.00', 'Municipal Payroll', 1, 1),
(2, '400.50', 'Foods', 4, 2),
(5, '1000.13', 'bili ng sy', 19, 3),
(6, '1500.00', 'urgent need', 1, 4),
(7, '500000.00', 'water', 41, 5),
(8, '30000.00', 'singil utang', 1, 6),
(9, '50000.00', 'add approp test', 19, 7),
(11, '3000000.00', 'travel', 2, 8),
(12, '500000.00', 'Municipal Payroll', 1, 9),
(13, '123000.00', 'Municipal Payroll', 1, 10),
(14, '123333.00', 'fsdkhfjkdsh', 1, 11),
(15, '345777.00', 'ghjghjgh', 1, 12),
(16, '12399.00', 'pabili ko ', 3, 13),
(17, '10000.00', 'palit ko', 3, 14),
(18, '100000.00', 'nov6-1', 1, 15),
(19, '120000.00', 'nov07-1', 37, 16),
(20, '100000.00', 'Travelling Expense', 8, 17),
(21, '100000.00', 'nov20-1', 3, 18),
(22, '90000.00', 'nov20-2', 39, 19),
(23, '80000.00', 'Nov-20-3', 2, 20),
(24, '70000.00', 'Nov-20-4', NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `spa_program`
--

CREATE TABLE `spa_program` (
  `PROG_ID` int(11) NOT NULL,
  `PROG_NAME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa_program`
--

INSERT INTO `spa_program` (`PROG_ID`, `PROG_NAME`) VALUES
(1, 'Economic Enterprise');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USR_ID` int(11) NOT NULL,
  `USR_FNAME` varchar(15) NOT NULL,
  `USR_MNAME` varchar(15) NOT NULL,
  `USR_LNAME` varchar(15) NOT NULL,
  `USR_USERNAME` varchar(15) NOT NULL,
  `USR_PASSWORD` varchar(15) NOT NULL,
  `USR_POST` enum('BUDGET HEAD','BUDGET OFFICER 1','BUDGET OFFICER 2','SUPERUSER','DEPARTMENT HEAD') NOT NULL,
  `USR_STATUS` enum('ACTIVE','INACTIVE') NOT NULL,
  `DEPARTMENT_DPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USR_ID`, `USR_FNAME`, `USR_MNAME`, `USR_LNAME`, `USR_USERNAME`, `USR_PASSWORD`, `USR_POST`, `USR_STATUS`, `DEPARTMENT_DPT_ID`) VALUES
(1, 'Marielyd Jasmin', 'A', 'Ferrer', 'mari', 'marie', 'BUDGET HEAD', 'INACTIVE', 1071),
(2, 'Antonio', 'Hojas', 'Baculio', 'mayor', 'mayor', 'DEPARTMENT HEAD', 'ACTIVE', 1011),
(3, 'Sangguniang', '', 'Bayan', 'sanggunian', 'sanggunian', 'DEPARTMENT HEAD', 'ACTIVE', 1021),
(4, 'Municipal', '', 'Planning', 'planning', 'planning', 'DEPARTMENT HEAD', 'ACTIVE', 1041),
(5, 'Civil', '', 'Registrar', 'civil', 'civil', 'DEPARTMENT HEAD', 'ACTIVE', 1051),
(6, 'Municipal', '', 'Accounting', 'Municipal', '1081', 'DEPARTMENT HEAD', 'ACTIVE', 1081),
(7, 'Treasurer\'s', '', 'Office', 'treasurer', 'treasurer', 'DEPARTMENT HEAD', 'ACTIVE', 1091),
(8, 'Municipal', '', 'Assesor', 'assesor', 'assesor', 'DEPARTMENT HEAD', 'ACTIVE', 1101),
(9, 'Health', '', 'Office', 'health', 'health', 'DEPARTMENT HEAD', 'ACTIVE', 4411),
(10, 'Social', '', 'Welfare', 'social', 'social', 'DEPARTMENT HEAD', 'ACTIVE', 7611),
(11, 'Engineering', '', 'Office', 'engineering', 'engineering', 'DEPARTMENT HEAD', 'ACTIVE', 8751),
(12, 'Agricultural', '', 'Office', 'agri', 'agri', 'DEPARTMENT HEAD', 'ACTIVE', 8711),
(13, 'Public', '', 'Market', 'market', 'market', 'DEPARTMENT HEAD', 'ACTIVE', 8811),
(14, 'Economic', '', 'Enterprise', 'econ', 'econ', 'DEPARTMENT HEAD', 'ACTIVE', 8812),
(15, 'Marc Khristian', 'Concepcion', 'Lambino', 'admin', 'admin', 'SUPERUSER', 'ACTIVE', 1071),
(17, 'Marielyd NO', 'A', 'Ferrer', 'mari', 'marie', 'BUDGET HEAD', 'INACTIVE', 1071),
(18, 'Marielyd', 'A', 'Ferrer', 'mari', 'mari', 'DEPARTMENT HEAD', 'INACTIVE', 1071),
(19, 'Marielyd', 'A', 'Ferrer', 'marielyd', 'marielyd', 'BUDGET HEAD', 'ACTIVE', 1071),
(20, 'Marielyd', 'A', 'Ferrer', 'marielyd', 'mari', 'DEPARTMENT HEAD', 'ACTIVE', 1071),
(22, 'Angel', 'Concepcion', 'Samiley', 'angel', 'angel', 'DEPARTMENT HEAD', 'INACTIVE', 1103),
(15023, 'Jasmin', 'tunga', 'Generalao', 'Jasmin', '1071', 'BUDGET OFFICER 1', 'ACTIVE', 1071),
(15024, 'Budget', 'two', 'Officer', 'budget', 'officer', 'BUDGET OFFICER 2', 'ACTIVE', 1071),
(15025, 'fsafaf', 'fsf', 'fds', 'ffd', '231232fds', 'DEPARTMENT HEAD', 'ACTIVE', 1234),
(15026, 'Margarita', 'Alaba', 'Ranas', 'mar', 'mar', 'DEPARTMENT HEAD', 'ACTIVE', 9999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignation`
--
ALTER TABLE `assignation`
  ADD PRIMARY KEY (`assign_id`);

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
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`EXPENDITURE_id`),
  ADD KEY `fk_EXPENDITURE_EXPENDITURE_CLASS1_idx` (`EXPENDITURE_CLASS_EXPCLASS_ID`);

--
-- Indexes for table `expenditure_class`
--
ALTER TABLE `expenditure_class`
  ADD PRIMARY KEY (`EXPCLASS_ID`),
  ADD KEY `fk_EXPENDITURE_CLASS_SPA_PROGRAM1_idx` (`SPA_PROGRAM_PROG_ID`);

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
  ADD KEY `fk_LBP_FORM_USER_idx` (`USER_USR_ID`);

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
  ADD KEY `fk_OBLIGATION_REQUEST_USER1_idx` (`USER_USR_ID`);

--
-- Indexes for table `particular`
--
ALTER TABLE `particular`
  ADD PRIMARY KEY (`PART_ID`),
  ADD KEY `fk_Particulars_EXPENDITURE1_idx` (`EXPENDITURE_EXPENDITURE_id`),
  ADD KEY `fk_PARTICULAR_OBLIGATION_REQUEST1_idx` (`OBLIGATION_REQUEST_OBR_ID`);

--
-- Indexes for table `spa_program`
--
ALTER TABLE `spa_program`
  ADD PRIMARY KEY (`PROG_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USR_ID`),
  ADD KEY `fk_USER_DEPARTMENT1_idx` (`DEPARTMENT_DPT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignation`
--
ALTER TABLE `assignation`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `control_notebook`
--
ALTER TABLE `control_notebook`
  MODIFY `CTRL_NTB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `EXPENDITURE_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `expenditure_class`
--
ALTER TABLE `expenditure_class`
  MODIFY `EXPCLASS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lbp_expenditure`
--
ALTER TABLE `lbp_expenditure`
  MODIFY `LBP_EXP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `lbp_form`
--
ALTER TABLE `lbp_form`
  MODIFY `FRM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `LB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `particular`
--
ALTER TABLE `particular`
  MODIFY `PART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15027;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `control_notebook`
--
ALTER TABLE `control_notebook`
  ADD CONSTRAINT `fk_CONTROL NOTEBOOK_DEPARTMENT1` FOREIGN KEY (`DEPARTMENT_DPT_ID`) REFERENCES `department` (`DPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD CONSTRAINT `fk_EXPENDITURE_EXPENDITURE_CLASS1` FOREIGN KEY (`EXPENDITURE_CLASS_EXPCLASS_ID`) REFERENCES `expenditure_class` (`EXPCLASS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expenditure_class`
--
ALTER TABLE `expenditure_class`
  ADD CONSTRAINT `fk_EXPENDITURE_CLASS_SPA_PROGRAM1` FOREIGN KEY (`SPA_PROGRAM_PROG_ID`) REFERENCES `spa_program` (`PROG_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_LBP_FORM_USER` FOREIGN KEY (`USER_USR_ID`) REFERENCES `user` (`USR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_OBLIGATION_REQUEST_USER1` FOREIGN KEY (`USER_USR_ID`) REFERENCES `user` (`USR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `particular`
--
ALTER TABLE `particular`
  ADD CONSTRAINT `fk_PARTICULAR_OBLIGATION_REQUEST1` FOREIGN KEY (`OBLIGATION_REQUEST_OBR_ID`) REFERENCES `obligation_request` (`OBR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Particulars_EXPENDITURE1` FOREIGN KEY (`EXPENDITURE_EXPENDITURE_id`) REFERENCES `expenditure` (`EXPENDITURE_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_USER_DEPARTMENT1` FOREIGN KEY (`DEPARTMENT_DPT_ID`) REFERENCES `department` (`DPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
