-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2019 at 09:14 PM
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
(8, 'Ms. Marielyd A. Ferrer', 'BUDGET HEAD', '2019-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `control_notebook`
--

CREATE TABLE `control_notebook` (
  `CTRL_NTB_ID` int(11) NOT NULL,
  `CTRL_NTB_YEAR` year(4) NOT NULL,
  `DEPARTMENT_DPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `control_notebook`
--

INSERT INTO `control_notebook` (`CTRL_NTB_ID`, `CTRL_NTB_YEAR`, `DEPARTMENT_DPT_ID`) VALUES
(1, 2019, 1011),
(2, 2019, 1021),
(3, 2019, 1041),
(4, 2019, 1051),
(5, 2019, 1071),
(6, 2019, 1081),
(7, 2019, 1091),
(8, 2019, 1101),
(9, 2019, 4411),
(10, 2019, 7611),
(11, 2019, 8711),
(12, 2019, 8751),
(13, 2019, 8811),
(14, 2019, 8812);

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
(1011, 'Mayor`s Office', 'ACTIVE'),
(1021, 'Sangguniang Bayan', 'ACTIVE'),
(1041, 'Municipal Planning Development', 'ACTIVE'),
(1051, 'Municipal Civil Registrar', 'ACTIVE'),
(1071, 'Municipal Budget Office', 'ACTIVE'),
(1081, 'Municipal Accounting', 'ACTIVE'),
(1091, 'Municipal Treasurers Office', 'ACTIVE'),
(1101, 'Municipal Assesor', 'ACTIVE'),
(1103, 'Dummy', 'ACTIVE'),
(1112, 'Department of Mark', 'INACTIVE'),
(4411, 'Municipal Health Office', 'ACTIVE'),
(7611, 'Municipal Social Welfare Devel', 'ACTIVE'),
(8711, 'Municipal Agricultural Office', 'ACTIVE'),
(8751, 'Municipal Engineering Office', 'ACTIVE'),
(8811, 'Public Market', 'ACTIVE'),
(8812, 'Economic Enterprise', 'ACTIVE'),
(11111, 'Department of Marck', 'INACTIVE');

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
('5-02-03-090', 'Gasoline, Oil and Lubricants Expenses', 2, 22),
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
('5-02-12-990', 'Watersystem', 4, 41);

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
(1, 'PERSONAL SERVICES', NULL),
(2, 'MAINTENANCE AND OTHER OPERATING EXPENSES', NULL),
(3, 'CAPITAL OUTLAY', NULL),
(4, 'SPECIAL PURPOSE APPROPRIATIONS', 1),
(5, 'bLEH', NULL);

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
(3, 6, 371, '900000.00'),
(4, 6, 372, '123000.25'),
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
(41, 6, 383, '35500.52');

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
(6, 0x31, 2020, 'FINALIZED', 20);

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
  `MBO_ID` varchar(11) NOT NULL,
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

INSERT INTO `mbo_control` (`MBO_ID`, `OBLIGATION_REQUEST_OBR_ID`, `USER_USR_ID`, `CONTROL_NOTEBOOK_CTRL_NTB_ID`, `MBO_REMARKS`, `MBO_INITIAL`, `MBO_TMP`) VALUES
('1-2019', 1, 19, 5, 'remark', 'initial', 0),
('2-2019', 3, 19, 5, '', '', 0),
('3-2019', 4, 19, 5, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obligation_request`
--

CREATE TABLE `obligation_request` (
  `OBR_ID` int(11) NOT NULL,
  `OBR_NO` varchar(11) DEFAULT NULL,
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

INSERT INTO `obligation_request` (`OBR_ID`, `OBR_NO`, `OBR_DATE`, `OBR_APPROVED_DATE`, `LOGBOOK_LB_ID`, `USER_USR_ID`, `OBR_STATUS`, `OBR_PAYEE`, `OBR_RESPONSIBILITY_CENTER`, `OBR_HANDLER`) VALUES
(1, '1-2019', '2019-08-14', '2019-08-20', 1, 20, 'APPROVED', 'Mark Christian Lambino', NULL, NULL),
(2, '2-2019', '2019-08-16', NULL, 1, 20, 'DECLINED', 'Silvestre', NULL, NULL),
(3, '3-2019', '2019-08-17', NULL, 1, 20, 'CHECKED', 'sybil', NULL, NULL),
(4, '4-2019', '2019-08-20', NULL, 1, 20, 'CHECKED', 'kate', NULL, NULL),
(5, '5-2019', '2019-08-20', NULL, 1, 20, 'DECLINED', 'derek', NULL, NULL),
(6, NULL, '2019-08-20', NULL, 1, 20, 'PENDING', 'naeto', NULL, NULL);

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
(8, '30000.00', 'singil utang', NULL, 6);

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
(1, 'Marielyd', 'A', 'Ferrer', 'mari', 'marie', 'BUDGET HEAD', 'INACTIVE', 1071),
(2, 'Bambi', 'Disney', 'Emano', 'bambi', 'bambi', 'DEPARTMENT HEAD', 'ACTIVE', 1011),
(3, 'Sangguniang', '', 'Bayan', 'sanggunian', 'sanggunian', 'DEPARTMENT HEAD', 'ACTIVE', 1021),
(4, 'Municipal', '', 'Planning', 'planning', 'planning', 'DEPARTMENT HEAD', 'ACTIVE', 1041),
(5, 'Civil', '', 'Registrar', 'civil', 'civil', 'DEPARTMENT HEAD', 'ACTIVE', 1051),
(6, 'Municipal', '', 'Accounting', 'accounting', 'accounting', 'DEPARTMENT HEAD', 'ACTIVE', 1081),
(7, 'Treasurer\'s', '', 'Office', 'treasurer', 'treasurer', 'DEPARTMENT HEAD', 'ACTIVE', 1091),
(8, 'Municipal', '', 'Assesor', 'assesor', 'assesor', 'DEPARTMENT HEAD', 'ACTIVE', 1101),
(9, 'Health', '', 'Office', 'health', 'health', 'DEPARTMENT HEAD', 'ACTIVE', 4411),
(10, 'Social', '', 'Welfare', 'social', 'social', 'DEPARTMENT HEAD', 'ACTIVE', 7611),
(11, 'Engineering', '', 'Office', 'engineering', 'engineering', 'DEPARTMENT HEAD', 'ACTIVE', 8751),
(12, 'Agricultural', '', 'Office', 'agri', 'agri', 'DEPARTMENT HEAD', 'ACTIVE', 8711),
(13, 'Public', '', 'Market', 'market', 'market', 'DEPARTMENT HEAD', 'ACTIVE', 8811),
(14, 'Economic', '', 'Enterprise', 'econ', 'econ', 'DEPARTMENT HEAD', 'ACTIVE', 8812),
(15, 'Marc Khristian', 'Concepcion', 'Lambino', 'admin', 'ADMIN', 'SUPERUSER', 'ACTIVE', 1071),
(16, 'kroatoan', 'kaboom', 'supranatura', 'dummy', 'dummy', 'DEPARTMENT HEAD', 'ACTIVE', 11111),
(17, 'Marielyd', 'A', 'Ferrer', 'mari', 'marie', 'BUDGET HEAD', 'INACTIVE', 1071),
(18, 'Marielyd', 'A', 'Ferrer', 'mari', 'mari', 'DEPARTMENT HEAD', 'INACTIVE', 1071),
(19, 'Marielyd', 'A', 'Ferrer', 'marielyd', 'mari', 'BUDGET HEAD', 'ACTIVE', 1071),
(20, 'Marielyd', 'A', 'Ferrer', 'marie', 'mari', 'DEPARTMENT HEAD', 'ACTIVE', 1071),
(21, 'dsadsadas', 'admindsadas', 'Lambinodsadas', 'ddsada', 'dsadsadas', 'DEPARTMENT HEAD', 'ACTIVE', 1112),
(22, 'dummy', 'dum', 'my', 'dum', 'dum', 'DEPARTMENT HEAD', 'ACTIVE', 1103),
(15023, 'Jasmin', 'JG', 'Generalao', 'jas', 'jas', 'BUDGET OFFICER 1', 'ACTIVE', 1071);

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
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `control_notebook`
--
ALTER TABLE `control_notebook`
  MODIFY `CTRL_NTB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `EXPENDITURE_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `expenditure_class`
--
ALTER TABLE `expenditure_class`
  MODIFY `EXPCLASS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lbp_expenditure`
--
ALTER TABLE `lbp_expenditure`
  MODIFY `LBP_EXP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT for table `lbp_form`
--
ALTER TABLE `lbp_form`
  MODIFY `FRM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `LB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `particular`
--
ALTER TABLE `particular`
  MODIFY `PART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15024;

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
