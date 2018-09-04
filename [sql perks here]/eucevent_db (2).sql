-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 07:15 PM
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
-- Database: `eucevent_db`
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

--
-- Dumping data for table `tbl_r_config`
--

INSERT INTO `tbl_r_config` (`User_ID`, `Username`, `Password`, `User_Status`) VALUES
(1, 'admin', 'admin', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_event`
--

CREATE TABLE `tbl_t_event` (
  `Event_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Event_Title` varchar(200) NOT NULL,
  `Event_Date` date DEFAULT NULL,
  `Event_Time` varchar(10) DEFAULT NULL,
  `Event_Location` varchar(300) DEFAULT NULL,
  `Event_OrganizerDetail` varchar(500) NOT NULL,
  `Event_Desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_t_event`
--

INSERT INTO `tbl_t_event` (`Event_ID`, `User_ID`, `Event_Title`, `Event_Date`, `Event_Time`, `Event_Location`, `Event_OrganizerDetail`, `Event_Desc`) VALUES
(1, 1, 'Barangay IT Deployment', '2018-08-29', '08:30 AM', 'Quezon City', 'Peter John Teneza', 'Deployment of the Barangay IT System'),
(2, 1, 'EUC Party', '2018-08-23', '10:00 PM', 'Manila', 'Lowell Dave Agnir3', 'Organizing a party 2'),
(3, 1, 'EUC Party Part 2', '2018-08-25', '01:23 AM', 'Manila', 'asdfasdfasdf', 'asdfasdfasdf'),
(4, 1, 'EUC Party Part 3', '2018-08-19', '05:45 PM', 'Manila', 'Julie Ann Resnera', 'Organizing a party'),
(5, 1, 'EUC Party Part 4', '2018-09-04', '10:00 PM', 'Manila', 'Lowell Dave Agnir', 'Lowell Dave Agnir'),
(6, 1, 'EUC Party Part 5', '2018-09-15', '09:15 AM', 'San Mateo', 'EUC', 'Pa party ni Mayor'),
(7, 1, 'EUC Party Part 6', '2018-09-05', '07:00 PM', 'San Mateo', 'EUC', 'Pa Party ni mayor Ulet');

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
  `Contact` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_t_registrant`
--

INSERT INTO `tbl_t_registrant` (`Registrant_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Ext_Name`, `Contact`, `Email`) VALUES
(1, 'Lowell Dave', 'Elba', 'Agnir', 'III', '©`>å÷U€G\ZÖŽVÖ§Í', 'kéqò8›­ÐÊ[æ\0yÎacdF3çØçëçÚÖ'),
(2, 'Lowell Dave', 'Elba', 'Agnir', 'V', '¾TÛg^,ŸÄÌÌ·-ËBb', 'DÈÉX¼KEg*Ù96éô75ü°½øòªÖñ\\¸'),
(3, 'Peter John', '', 'Teneza', '', '¾TÛg^,ŸÄÌÌ·-ËBb', '7KÎŸc¡BL\"ä„Z–H\ZC´ãèŸhµH»A\'Ž'),
(5, 'Lawrence', 'Elba', 'Agnir', '', '.ž&DË/#èÓêQ', 'èÑÀ¾\\¯9àA)úI’‰@'),
(6, 'Julie Ann', 'Apiag', 'Resnera', '', '(7û‘=Õ¸´/Ç…À~Š', 'P“Ü¾^S u}óÀì[KÊZ–H\ZC´ãèŸhµH»A\'Ž'),
(7, 'Lara Erika', 'Elba', 'Agnir', 'VIII', '„‹Ów¿Žã¸GŠö<*', '\\æª¥úÀœãÈ6ù´');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_registration`
--

CREATE TABLE `tbl_t_registration` (
  `Event_ID` int(11) NOT NULL,
  `Registrant_ID` int(11) NOT NULL,
  `Date_Registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_t_registration`
--

INSERT INTO `tbl_t_registration` (`Event_ID`, `Registrant_ID`, `Date_Registered`) VALUES
(1, 1, '0000-00-00'),
(1, 2, '2018-09-19'),
(1, 3, '2018-09-12'),
(2, 1, '0000-00-00'),
(3, 1, '2018-09-03'),
(5, 2, '2018-09-13'),
(6, 3, '0000-00-00'),
(6, 5, '0000-00-00'),
(6, 7, '0000-00-00'),
(7, 6, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_r_config`
--
ALTER TABLE `tbl_r_config`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `tbl_t_event`
--
ALTER TABLE `tbl_t_event`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `FK_Event_User_ID` (`User_ID`);

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
  ADD PRIMARY KEY (`Event_ID`,`Registrant_ID`),
  ADD KEY `FK_Register_Registrant` (`Registrant_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_r_config`
--
ALTER TABLE `tbl_r_config`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_t_event`
--
ALTER TABLE `tbl_t_event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_t_registrant`
--
ALTER TABLE `tbl_t_registrant`
  MODIFY `Registrant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_t_event`
--
ALTER TABLE `tbl_t_event`
  ADD CONSTRAINT `FK_Event_User_ID` FOREIGN KEY (`User_ID`) REFERENCES `tbl_r_config` (`User_ID`);

--
-- Constraints for table `tbl_t_registration`
--
ALTER TABLE `tbl_t_registration`
  ADD CONSTRAINT `FK_Register_Event` FOREIGN KEY (`Event_ID`) REFERENCES `tbl_t_event` (`Event_ID`),
  ADD CONSTRAINT `FK_Register_Registrant` FOREIGN KEY (`Registrant_ID`) REFERENCES `tbl_t_registrant` (`Registrant_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
