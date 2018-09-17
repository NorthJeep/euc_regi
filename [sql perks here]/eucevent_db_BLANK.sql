-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 01:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiredonw_eucevent_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_r_config`
--

CREATE TABLE `tbl_r_config` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `User_Status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_attendance`
--

CREATE TABLE `tbl_t_attendance` (
  `Attendance_ID` int(11) NOT NULL,
  `Registration_No` int(11) NOT NULL,
  `Date_Recorded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_event`
--

CREATE TABLE `tbl_t_event` (
  `Event_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Event_Title` varchar(200) NOT NULL,
  `Event_Date` date DEFAULT NULL,
  `Event_Phases` int(11) NOT NULL DEFAULT '1',
  `Event_Time` varchar(10) DEFAULT NULL,
  `Event_Location` varchar(300) DEFAULT NULL,
  `Event_OrganizerDetail` varchar(500) NOT NULL,
  `Event_Desc` varchar(500) NOT NULL,
  `Event_Price` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_payment`
--

CREATE TABLE `tbl_t_payment` (
  `Payment_ID` int(11) NOT NULL,
  `Payment_Amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Payment_Date` date NOT NULL,
  `Registration_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_registrant`
--

CREATE TABLE `tbl_t_registrant` (
  `Registrant_ID` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Ext_Name` varchar(10) NOT NULL,
  `Company` varchar(500) NOT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_registration`
--

CREATE TABLE `tbl_t_registration` (
  `Registration_No` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `Registrant_ID` int(11) NOT NULL,
  `Date_Registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_r_config`
--
ALTER TABLE `tbl_r_config`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `tbl_t_attendance`
--
ALTER TABLE `tbl_t_attendance`
  ADD PRIMARY KEY (`Attendance_ID`),
  ADD KEY `FK_Attendance_Registration` (`Registration_No`);

--
-- Indexes for table `tbl_t_event`
--
ALTER TABLE `tbl_t_event`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `FK_Event_User_ID` (`User_ID`);

--
-- Indexes for table `tbl_t_payment`
--
ALTER TABLE `tbl_t_payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `FK_Registration_No` (`Registration_No`);

--
-- Indexes for table `tbl_t_registrant`
--
ALTER TABLE `tbl_t_registrant`
  ADD PRIMARY KEY (`Registrant_ID`),
  ADD UNIQUE KEY `UQ_Email` (`Email`);

--
-- Indexes for table `tbl_t_registration`
--
ALTER TABLE `tbl_t_registration`
  ADD PRIMARY KEY (`Registration_No`),
  ADD KEY `FK_Registration_Event` (`Event_ID`),
  ADD KEY `FK_Registration_Registrant` (`Registrant_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_r_config`
--
ALTER TABLE `tbl_r_config`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_t_attendance`
--
ALTER TABLE `tbl_t_attendance`
  MODIFY `Attendance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_t_event`
--
ALTER TABLE `tbl_t_event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_t_payment`
--
ALTER TABLE `tbl_t_payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_t_registrant`
--
ALTER TABLE `tbl_t_registrant`
  MODIFY `Registrant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_t_registration`
--
ALTER TABLE `tbl_t_registration`
  MODIFY `Registration_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_t_attendance`
--
ALTER TABLE `tbl_t_attendance`
  ADD CONSTRAINT `FK_Attendance_Registration` FOREIGN KEY (`Registration_No`) REFERENCES `tbl_t_registration` (`Registration_No`);

--
-- Constraints for table `tbl_t_event`
--
ALTER TABLE `tbl_t_event`
  ADD CONSTRAINT `FK_Event_User_ID` FOREIGN KEY (`User_ID`) REFERENCES `tbl_r_config` (`User_ID`);

--
-- Constraints for table `tbl_t_payment`
--
ALTER TABLE `tbl_t_payment`
  ADD CONSTRAINT `FK_Registration_No` FOREIGN KEY (`Registration_No`) REFERENCES `tbl_t_registration` (`Registration_No`);

--
-- Constraints for table `tbl_t_registration`
--
ALTER TABLE `tbl_t_registration`
  ADD CONSTRAINT `FK_Registration_Event` FOREIGN KEY (`Event_ID`) REFERENCES `tbl_t_event` (`Event_ID`),
  ADD CONSTRAINT `FK_Registration_Registrant` FOREIGN KEY (`Registrant_ID`) REFERENCES `tbl_t_registrant` (`Registrant_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
