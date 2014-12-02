-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2014 at 02:20 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `OPTION`
--

CREATE TABLE `OPTION` (
  `idOPTION` int(11) NOT NULL,
  `QUESTION_idQUESTION` int(11) NOT NULL,
  `bCorrectAnswer` tinyint(1) NOT NULL,
  `sDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `QUESTION`
--

CREATE TABLE `QUESTION` (
  `idQUESTION` int(11) NOT NULL,
  `sQuestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ROLE`
--

CREATE TABLE `ROLE` (
`idROLE` int(11) NOT NULL,
  `sName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ROLE`
--

INSERT INTO `ROLE` (`idROLE`, `sName`) VALUES
(1, 'Test Taker'),
(2, 'Test Taker');

-- --------------------------------------------------------

--
-- Table structure for table `SUBJECT`
--

CREATE TABLE `SUBJECT` (
  `idSUBJECT` int(11) NOT NULL,
  `sName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SUBJECT`
--

INSERT INTO `SUBJECT` (`idSUBJECT`, `sName`) VALUES
(1, 'Mathematics'),
(2, 'Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `TEST`
--

CREATE TABLE `TEST` (
  `idTEST` int(11) NOT NULL,
  `sTestName` varchar(100) NOT NULL,
  `iTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `iQuestions` int(11) NOT NULL,
  `iPassmark` decimal(2,0) NOT NULL,
  `iRetake` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TEST_has_QUESTION`
--

CREATE TABLE `TEST_has_QUESTION` (
  `TEST_idTEST` int(11) NOT NULL,
  `QUESTION_idQUESTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TEST_has_SUBJECT`
--

CREATE TABLE `TEST_has_SUBJECT` (
  `TEST_idTEST` int(11) NOT NULL,
  `SUBJECT_idSUBJECT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TEST_has_USER`
--

CREATE TABLE `TEST_has_USER` (
  `TEST_idTEST` int(11) NOT NULL,
  `USER_idUSER` int(11) NOT NULL,
  `iGrade` decimal(2,0) NOT NULL,
  `iCorrect` int(11) NOT NULL,
  `iIncorrect` int(11) NOT NULL,
  `dTestDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
`idUSER` int(11) NOT NULL,
  `sEmail` varchar(45) NOT NULL,
  `ROLE_idROLE` int(11) NOT NULL,
  `sSurname` varchar(45) NOT NULL,
  `sFirstName` varchar(45) NOT NULL,
  `sPassword` varchar(45) NOT NULL,
  `dRegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bEnabled` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`idUSER`, `sEmail`, `ROLE_idROLE`, `sSurname`, `sFirstName`, `sPassword`, `dRegDate`, `bEnabled`) VALUES
(16, 'ashahmali@yahoo.com', 1, 'Ali', 'Ashiru', 'intel@1982', '2014-11-27 21:18:22', 0),
(26, 'aaa9g14@soton.ac.uk', 1, 'Ali', 'Ashiru', 'inteleytywd', '2014-11-27 21:56:40', 0),
(28, 'wa9g14@soto.acc', 1, 'Anniebet', 'Willie', 'haggerston', '2014-11-27 22:13:38', 0),
(29, 'ma9g14@email.com', 1, 'Okoloba', 'Michael', 'password', '2014-11-27 22:16:56', 0),
(30, 'ao9g14@soton.ac.uk', 1, 'Obadun', 'Ahmed', 'agilemethod', '2014-11-27 22:27:25', 0),
(31, 'ea9g14@soton.ac.uk', 1, 'Amonike', 'Emmanuel', 'emmanuel', '2014-11-27 22:30:56', 0),
(32, 'tm9g14@soton.ac.uk', 1, 'Maitankari', 'Tani', '11111111', '2014-11-27 22:33:39', 0),
(33, 'ashahkd@huh.com', 1, 'Ali', 'Ashiru', 'excellent', '2014-11-28 10:30:08', 0),
(34, 'email@example.com', 1, 'Ali', 'Ashiru', 'excellent', '2014-11-28 10:34:16', 0),
(35, 'loco@english.com', 1, 'English', 'Locootion', 'intelligent', '2014-11-28 10:35:48', 0),
(36, 'tfvttv@vtft.ciru', 1, 'tftyfvtf', 'eyfyv', 'password', '2014-11-28 10:50:02', 0),
(37, 'intel@1982.com', 1, 'rwfui', 'edw', 'intel1982', '2014-11-28 10:51:18', 0),
(38, 'cange@yah.com', 1, 'to', 'ikely', 'yahoomail', '2014-11-28 10:53:37', 0),
(39, 'admin@mail.com', 2, 'Garcia', 'Edwaardo', '065e43c050d8ad2eba50302e5d26dcbbcd83d649', '2014-11-28 11:18:03', 0),
(40, 'ju9g14@soton.ac.uk', 1, 'Wu', 'Jet', '065e43c050d8ad2eba50302e5d26dcbbcd83d649', '2014-11-28 12:43:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `USER_has_SUBJECT`
--

CREATE TABLE `USER_has_SUBJECT` (
  `USER_idUSER` int(11) NOT NULL,
  `SUBJECT_idSUBJECT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USER_has_SUBJECT`
--

INSERT INTO `USER_has_SUBJECT` (`USER_idUSER`, `SUBJECT_idSUBJECT`) VALUES
(26, 1),
(16, 2),
(32, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `OPTION`
--
ALTER TABLE `OPTION`
 ADD PRIMARY KEY (`idOPTION`,`QUESTION_idQUESTION`), ADD KEY `fk_OPTION_QUESTION1_idx` (`QUESTION_idQUESTION`);

--
-- Indexes for table `QUESTION`
--
ALTER TABLE `QUESTION`
 ADD PRIMARY KEY (`idQUESTION`);

--
-- Indexes for table `ROLE`
--
ALTER TABLE `ROLE`
 ADD PRIMARY KEY (`idROLE`);

--
-- Indexes for table `SUBJECT`
--
ALTER TABLE `SUBJECT`
 ADD PRIMARY KEY (`idSUBJECT`);

--
-- Indexes for table `TEST`
--
ALTER TABLE `TEST`
 ADD PRIMARY KEY (`idTEST`);

--
-- Indexes for table `TEST_has_QUESTION`
--
ALTER TABLE `TEST_has_QUESTION`
 ADD PRIMARY KEY (`TEST_idTEST`,`QUESTION_idQUESTION`), ADD KEY `fk_TEST_has_QUESTION_QUESTION1_idx` (`QUESTION_idQUESTION`), ADD KEY `fk_TEST_has_QUESTION_TEST1_idx` (`TEST_idTEST`);

--
-- Indexes for table `TEST_has_SUBJECT`
--
ALTER TABLE `TEST_has_SUBJECT`
 ADD PRIMARY KEY (`TEST_idTEST`,`SUBJECT_idSUBJECT`), ADD KEY `fk_TEST_has_SUBJECT_SUBJECT1_idx` (`SUBJECT_idSUBJECT`), ADD KEY `fk_TEST_has_SUBJECT_TEST1_idx` (`TEST_idTEST`);

--
-- Indexes for table `TEST_has_USER`
--
ALTER TABLE `TEST_has_USER`
 ADD PRIMARY KEY (`TEST_idTEST`,`USER_idUSER`,`dTestDate`), ADD KEY `fk_TEST_has_USER_USER1_idx` (`USER_idUSER`), ADD KEY `fk_TEST_has_USER_TEST_idx` (`TEST_idTEST`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
 ADD PRIMARY KEY (`idUSER`), ADD UNIQUE KEY `sEmail_UNIQUE` (`sEmail`), ADD KEY `fk_USER_ROLE1_idx` (`ROLE_idROLE`);

--
-- Indexes for table `USER_has_SUBJECT`
--
ALTER TABLE `USER_has_SUBJECT`
 ADD PRIMARY KEY (`USER_idUSER`,`SUBJECT_idSUBJECT`), ADD KEY `fk_USER_has_SUBJECT_SUBJECT1_idx` (`SUBJECT_idSUBJECT`), ADD KEY `fk_USER_has_SUBJECT_USER1_idx` (`USER_idUSER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ROLE`
--
ALTER TABLE `ROLE`
MODIFY `idROLE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
MODIFY `idUSER` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `OPTION`
--
ALTER TABLE `OPTION`
ADD CONSTRAINT `fk_OPTION_QUESTION1` FOREIGN KEY (`QUESTION_idQUESTION`) REFERENCES `QUESTION` (`idQUESTION`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TEST_has_QUESTION`
--
ALTER TABLE `TEST_has_QUESTION`
ADD CONSTRAINT `fk_TEST_has_QUESTION_QUESTION1` FOREIGN KEY (`QUESTION_idQUESTION`) REFERENCES `QUESTION` (`idQUESTION`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_TEST_has_QUESTION_TEST1` FOREIGN KEY (`TEST_idTEST`) REFERENCES `TEST` (`idTEST`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TEST_has_SUBJECT`
--
ALTER TABLE `TEST_has_SUBJECT`
ADD CONSTRAINT `fk_TEST_has_SUBJECT_SUBJECT1` FOREIGN KEY (`SUBJECT_idSUBJECT`) REFERENCES `SUBJECT` (`idSUBJECT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_TEST_has_SUBJECT_TEST1` FOREIGN KEY (`TEST_idTEST`) REFERENCES `TEST` (`idTEST`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TEST_has_USER`
--
ALTER TABLE `TEST_has_USER`
ADD CONSTRAINT `fk_TEST_has_USER_TEST` FOREIGN KEY (`TEST_idTEST`) REFERENCES `TEST` (`idTEST`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_TEST_has_USER_USER1` FOREIGN KEY (`USER_idUSER`) REFERENCES `USER` (`idUSER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `USER`
--
ALTER TABLE `USER`
ADD CONSTRAINT `fk_USER_ROLE1` FOREIGN KEY (`ROLE_idROLE`) REFERENCES `ROLE` (`idROLE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `USER_has_SUBJECT`
--
ALTER TABLE `USER_has_SUBJECT`
ADD CONSTRAINT `fk_USER_has_SUBJECT_SUBJECT1` FOREIGN KEY (`SUBJECT_idSUBJECT`) REFERENCES `SUBJECT` (`idSUBJECT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_USER_has_SUBJECT_USER1` FOREIGN KEY (`USER_idUSER`) REFERENCES `USER` (`idUSER`) ON DELETE NO ACTION ON UPDATE NO ACTION;
