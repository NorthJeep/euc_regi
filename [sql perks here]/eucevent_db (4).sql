-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 11:08 AM
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
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `User_Status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_r_config`
--

INSERT INTO `tbl_r_config` (`User_ID`, `Username`, `Password`, `User_Status`) VALUES
(1, 'H»i0]I¿e/ú¿º¹4', 'H»i0]I¿e/ú¿º¹4', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_attendance`
--

CREATE TABLE `tbl_t_attendance` (
  `Attendance_ID` int(11) NOT NULL,
  `Registration_No` int(11) NOT NULL,
  `Date_Recorded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_t_attendance`
--

INSERT INTO `tbl_t_attendance` (`Attendance_ID`, `Registration_No`, `Date_Recorded`) VALUES
(1, 6, '2018-09-07'),
(2, 23, '2018-09-10'),
(3, 27, '2018-09-10'),
(4, 24, '2018-09-10'),
(5, 23, '2018-09-11'),
(6, 24, '2018-09-11'),
(9, 27, '2018-09-11');

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
  `Event_CPD` int(11) NOT NULL DEFAULT '0',
  `Event_Price` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_t_event`
--

INSERT INTO `tbl_t_event` (`Event_ID`, `User_ID`, `Event_Title`, `Event_Date`, `Event_Phases`, `Event_Time`, `Event_Location`, `Event_OrganizerDetail`, `Event_Desc`, `Event_CPD`, `Event_Price`) VALUES
(1, 1, 'Barangay IT Deployment', '2018-08-29', 1, '08:30 AM', 'Quezon City', 'Peter John Teneza', 'Deployment of the Barangay IT System', 0, '2000.00'),
(2, 1, 'EUC Party', '2018-08-23', 1, '10:00 PM', 'Manila', 'Lowell Dave Agnir3', 'Organizing a party 2', 0, '5000.00'),
(3, 1, 'EUC Party Part 2', '2018-08-25', 1, '01:23 AM', 'Manila', 'asdfasdfasdf', 'asdfasdfasdf', 0, '0.00'),
(4, 1, 'EUC Party Part 3', '2018-08-19', 1, '05:45 PM', 'Manila', 'Julie Ann Resnera', 'Organizing a party', 0, '5000.00'),
(5, 1, 'EUC Party Part 4', '2018-09-06', 2, '10:00 PM', 'Manila', 'Lowell Dave Agnir', 'Lowell Dave Agnir', 0, '5300.00'),
(6, 1, 'EUC Party Part 5', '2018-09-15', 1, '09:15 AM', 'San Mateo', 'EUC', 'Pa party ni Mayor', 0, '3000.00'),
(7, 1, 'EUC Party Part 6', '2018-09-21', 4, '07:00 PM', 'San Mateo', 'EUC', 'Pa Party ni mayor Ulet', 0, '2000.00'),
(8, 1, 'Barangay IT Deployment Part 2', '2018-09-22', 2, '02:15 PM', 'San Mateo', 'EUC', 'adsadfasd', 0, '2500.00'),
(9, 1, 'EUC Party Part 7', '2018-09-08', 1, '05:00 PM', 'Manila', 'EUC', 'qwertyuio', 0, '0.00'),
(10, 1, 'BIT Seminar', '2018-09-10', 2, '01:00 PM', 'Quezon City', 'EUC', 'Sample Description', 5, '5000.00'),
(11, 1, 'EUC Party Part 8', '2018-09-27', 1, '05:00 PM', 'Quezon City', 'EUC', 'asdasdasd', 0, '10000.00'),
(12, 1, 'EUC Party Part 9', '2018-09-24', 2, '05:00 PM', 'Quezon City', 'EUC', 'asdfasdfasdf', 5, '20000.00');

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

--
-- Dumping data for table `tbl_t_payment`
--

INSERT INTO `tbl_t_payment` (`Payment_ID`, `Payment_Amount`, `Payment_Date`, `Registration_No`) VALUES
(1, '300.00', '2018-09-07', 1),
(2, '500.00', '2018-09-08', 1),
(3, '1000.00', '2018-09-19', 1),
(4, '100.00', '2018-09-07', 1),
(5, '200.00', '2018-09-07', 2),
(6, '5000.00', '2018-09-07', 4),
(7, '5222.00', '2018-09-07', 6),
(8, '3000.00', '2018-09-07', 7),
(9, '300.00', '2018-09-07', 2),
(10, '1000.00', '2018-09-07', 19),
(11, '1000.00', '2018-09-07', 19),
(12, '1400.00', '2018-09-07', 2),
(13, '78.00', '2018-09-07', 6),
(14, '1000.00', '2018-09-07', 3),
(15, '2000.00', '2018-09-07', 23),
(16, '5000.00', '2018-09-07', 24),
(17, '5000.00', '2018-09-10', 27),
(18, '3000.00', '2018-09-11', 23),
(19, '100.00', '2018-09-13', 2),
(20, '100.00', '2018-09-13', 1),
(21, '900.00', '2018-09-13', 3),
(22, '100.00', '2018-09-13', 3),
(23, '5300.00', '2018-09-13', 20),
(24, '5000.00', '2018-09-20', 28);

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

--
-- Dumping data for table `tbl_t_registrant`
--

INSERT INTO `tbl_t_registrant` (`Registrant_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Ext_Name`, `Company`, `Contact`, `Email`) VALUES
(1, 'Lowell Dave', 'Elba', 'Agnir', 'III', 'Company01', '©`>å÷U€G\ZÖŽVÖ§Í', 'kéqò8›­ÐÊ[æ\0yÎacdF3çØçëçÚÖ'),
(2, 'Lowell Dave', 'Elba', 'Agnir', 'V', 'Company02', '¾TÛg^,ŸÄÌÌ·-ËBb', 'DÈÉX¼KEg*Ù96éô75ü°½øòªÖñ\\¸'),
(3, 'Peter John', '', 'Teneza', '', 'Company03', '¾TÛg^,ŸÄÌÌ·-ËBb', '7KÎŸc¡BL\"ä„Z–H\ZC´ãèŸhµH»A\'Ž'),
(5, 'Lawrence', 'Elba', 'Agnir', '', '04', '.ž&DË/#èÓêQ', 'èÑÀ¾\\¯9àA)úI’‰@'),
(6, 'Julie Ann', 'Apiag', 'Resnera', '', '05', '(7û‘=Õ¸´/Ç…À~Š', 'P“Ü¾^S u}óÀì[KÊZ–H\ZC´ãèŸhµH»A\'Ž'),
(7, 'Lara Erika', 'Elba', 'Agnir', 'VIII', '06', '„‹Ów¿Žã¸GŠö<*', '\\æª¥úÀœãÈ6ù´'),
(8, 'asdfasdf', 'adfasdf', 'asdfasdf', 'adsfasdf', 'afsdfasdfadf', 'r\\Üc­e´I¬’%½eÜ.', 'Ÿmð<Ð\0ûSUýÀM(Ð:'),
(9, 'Peter John', 'Apiag', 'asdfasdf', 'a', 'adljfasdfhbhj', '×è¦8kE\\¦ðhMCû¹', 'ªÇ‰É>ž^ü@Ý%£1¶Ô/³¸Ö:DHð„òž\r4³%©'),
(10, 'asdfasdf', 'asdfasdfa', 'sdfasdfasd', 'cvxc', 'asdfasdf', 'ïv¼P}Ð«Y÷ÑÒÃBfÛ', 'Ò@D7;§O’ñ:ê‹®\0'),
(11, 'asdvasdfasd', 'vzfgsdf', 'sdfgsdvsdf', 'gsdfgs', 'Comasdfasdfa', 'ôr;4ž¶q©W¥è\n', 'IìðŠ€­ãî8§ÁË+Ý'),
(12, 'Lawrence', 'adfasdf', 'Agnir', 'VIIIad', 'oahsidufyasih', '–“­;bögŒjÇ¦štE•', '˜ÝYœe“ï¤¯·Uï¬³¸Ö:DHð„òž\r4³%©'),
(13, 'asdfadsf', 'Apiag', 'asdfasdf', 'ersdfasd', 'companasdfasdfasdf', 'ÀË<9”A|IÊ›“ù', '¦VCªWÐÞ¯4º\nÕ| '),
(14, 'Lawrence', 'adfasdf', 'asewfadsf', 'fasdfwef', 'iahsdifhadihbjn', 'åD/ö“IdÂ‡Ú ýÑ!', 'âù˜Ä„c	t·ÑÙ\\ö'),
(15, 'adsfasdf', 'Apiag', 'erasdfa', 'dasdfead', 'asdkofja', '$]¸Aï½0y#4ý%³dÌ0', 'oâ;‰^×+P;‘ŒSrŒè'),
(16, 'Lara Erika', 'asdfasdf', 'asdfa', 'easdasd', 'dfjghlskjdfbisu', 'îôöÕ‘4€ÿ“°Ý¹*‹', '\rïço8Fz«ÁK›Lš|¸¡\rÛuÒ÷ÜèÐ^4ö$'),
(17, 'jlkljklhjk', 'ufgu', 'fufghj', 'kghjkg', 'khkghkhjkghj', '._&4:ïG†Œ¾ÄÇèR«}', 'ìˆtç#.ò\nj·¹\nÜTQõã1hØÖ¢Wº2\\Âùí˜´'),
(18, 'John Patrick', '', 'Loyola', '', 'PUPQC', '?wÒ>´mñ\\rñZ$Ï^', '\rzÐ­Ý¹Uúz»•Ô›ÂÆ³¸Ö:DHð„òž\r4³%©'),
(19, 'Michaela', '', 'Alejandria', '', 'SRG01', '1-%ˆ\'´5Ë†ë`9', 'Vš¤Ÿ=Nî„7‹Ú3hÐ[P3Šgá±Wÿ†î)`C'),
(20, 'Keith', '', 'Alvior', '', 'Keith Place', '¥r/Íxì/ÿañ]”­>', 'Æ)íH­¹¥²4UD£d0'),
(21, 'Lowell Dave', 'acv', 'xvsg', 'adsfasdf', 'slkjdhbsijdnl', 'm×¹áñ}â.–>Køvfg', 'ÅÚf·›AÀßhb¨1[Ã³¸Ö:DHð„òž\r4³%©'),
(22, 'Mika', '', 'Alejandria', '', 'SRG', '_ïÀMD_¡”B¡BÒj', '´ \\t-¸,Hã\r³‘¿G‡.œ³/FÇæ¸a3‹'),
(23, 'Lara', 'Elba', 'Agnir', 'V', 'AgnirWorks', ' o\\ßV;YC‡+¦Ü·ÜåU', '«Ô‰JH®2Þn›`Bì…Z–H\ZC´ãèŸhµH»A\'Ž'),
(24, 'asdfasdf', 'asasdf', 'Agnir', 'as', 'AgnirWorks', '9+D·Ë3£ÂÒÙS¨+v', 'S½[¶¨ùÇnðêûï»HeZCêd|~¥cwC(Ø_Àñ'),
(25, 'cvxcvsd', 'ertwert', 'asdfasdf', 'bv', 'AgnirWorks', 'h|·£áNzè5ü\0ƒfàº', 'ÈêQm|ò7Fš@Uƒw¹Õ»Qý|Ãû®„OQ+ÛŒæ'),
(26, 'cvxasdfcvsd', 'ertwasdfaert', 'asdfasdfas', 'bv', 'AgnirWorks', 'xëyŠŽÙýk›®ÆBLE', 'jtÄÏÇwôO¬‚.,Ìƒ'),
(27, 'Lowell', 'Dave', 'Agnir', '', 'Asdfsdfsdf', 'w•‚|û±f>œ•Ì8', 'p\r,›*S¹¡kÀdâe“¤³¸Ö:DHð„òž\r4³%©');

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
-- Dumping data for table `tbl_t_registration`
--

INSERT INTO `tbl_t_registration` (`Registration_No`, `Event_ID`, `Registrant_ID`, `Date_Registered`) VALUES
(1, 1, 1, '0000-00-00'),
(2, 1, 2, '2018-09-19'),
(3, 1, 3, '2018-09-12'),
(4, 2, 1, '0000-00-00'),
(5, 3, 1, '2018-09-03'),
(6, 5, 2, '2018-09-13'),
(7, 6, 3, '0000-00-00'),
(8, 6, 5, '0000-00-00'),
(9, 6, 7, '0000-00-00'),
(10, 6, 8, '2018-09-06'),
(11, 6, 9, '2018-09-06'),
(12, 6, 10, '2018-09-06'),
(13, 6, 11, '2018-09-06'),
(14, 6, 12, '2018-09-06'),
(15, 6, 13, '2018-09-06'),
(16, 6, 14, '2018-09-06'),
(17, 6, 15, '2018-09-06'),
(18, 6, 16, '2018-09-06'),
(19, 7, 6, '0000-00-00'),
(20, 5, 6, '2018-09-06'),
(21, 7, 17, '2018-09-07'),
(22, 9, 18, '2018-09-07'),
(23, 10, 19, '2018-09-07'),
(24, 10, 20, '2018-09-07'),
(25, 11, 21, '2018-09-10'),
(26, 11, 21, '2018-09-10'),
(27, 10, 22, '2018-09-10'),
(28, 10, 23, '2018-11-18'),
(29, 10, 24, '2018-09-16'),
(30, 10, 25, '2018-09-16'),
(31, 10, 26, '2018-09-12'),
(32, 11, 27, '2018-09-20');

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
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_t_payment`
--
ALTER TABLE `tbl_t_payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_t_registrant`
--
ALTER TABLE `tbl_t_registrant`
  MODIFY `Registrant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_t_registration`
--
ALTER TABLE `tbl_t_registration`
  MODIFY `Registration_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
