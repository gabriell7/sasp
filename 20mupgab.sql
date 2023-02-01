-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2022 at 11:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20mupgab`
--

-- --------------------------------------------------------

--
-- Table structure for table `computergames`
--

CREATE TABLE `computergames` (
  `gameid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `company` varchar(60) NOT NULL,
  `release` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computergames`
--

INSERT INTO `computergames` (`gameid`, `name`, `company`, `release`) VALUES
(1, 'Grand Theft Auto IV', 'Rockstar Games', 2008),
(2, 'Fallout 3', 'Bethesda Game Studios', 2008),
(3, 'The Elder Scrolls III: Morrowind', 'Bethesda Game Studios', 2002),
(4, 'Fallout 76', 'Bethesda Game Studios', 2018),
(5, 'The Elder Scrolls IV: Oblivion', 'Bethesda Game Studios', 2006),
(6, 'The Elder Scrolls V: Skyrim', 'Bethesda Game Studios', 2011),
(7, 'Assassin\'s Creed', 'Ubisoft', 2007),
(8, 'Assassin\'s Creed II', 'Ubisoft', 2009),
(9, 'Assassin\'s Creed: Brotherhood', 'Ubisoft', 2010),
(10, 'Assassin\'s Creed: Revelations', 'Ubisoft', 2011),
(11, 'Assassin\'s Creed III', 'Ubisoft', 2012),
(12, 'Assassin\'s Creed IV: Black Flag', 'Ubisoft', 2013),
(13, 'Grand Theft Auto III', 'Rockstar Games', 2001),
(14, 'Max Payne', 'Remedy Entertainment', 2002),
(15, 'Grand Theft Auto: Vice City', 'Rockstar Games', 2002),
(16, 'Grand Theft Auto: San Andreas', 'Rockstar Games', 2004),
(18, 'testi', 'fgsf', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `esiintyjät`
--

CREATE TABLE `esiintyjät` (
  `EsiintyjäID` int(11) NOT NULL,
  `Sukunimi` varchar(30) NOT NULL,
  `Etunimi` varchar(30) NOT NULL,
  `Taitelijanimi` varchar(30) NOT NULL,
  `ManageriID` int(11) NOT NULL,
  `MusikkityyliID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `esiintyjät`
--

INSERT INTO `esiintyjät` (`EsiintyjäID`, `Sukunimi`, `Etunimi`, `Taitelijanimi`, `ManageriID`, `MusikkityyliID`) VALUES
(2, 'saarinen', 'joona', '', 1, 4),
(3, 'virtanen', 'timo', '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gameID` int(10) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `singlePlayer` tinyint(1) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gameID`, `gameName`, `singlePlayer`, `time`) VALUES
(1, 'CS GO', 0, '2020-01-20 15:15:00'),
(2, 'Fortnite', 0, '2020-01-09 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `h10_osallistujat`
--

CREATE TABLE `h10_osallistujat` (
  `osallistujaID` int(11) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `paikkakunta` varchar(50) NOT NULL,
  `tapahtumaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h10_osallistujat`
--

INSERT INTO `h10_osallistujat` (`osallistujaID`, `etunimi`, `sukunimi`, `paikkakunta`, `tapahtumaID`) VALUES
(1, 'Aku', 'Ankka', 'Tampere', 2),
(8, 'Samu', 'Sirkka', 'Helsinki', 2),
(9, 'Jaska', 'Jokunen', 'Janakkala', 2),
(10, 'Roope', 'Ankka', 'Akaa', 2),
(11, 'Garri', 'Gasparov', 'Moskova', 3),
(12, 'Magnus', 'Carlsen', 'Oslo', 3),
(13, 'Nybäck', 'Tomi', 'Helsinki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `h10_tapahtumat`
--

CREATE TABLE `h10_tapahtumat` (
  `tapahtumaID` int(11) NOT NULL,
  `nimi` varchar(50) NOT NULL,
  `paivays` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h10_tapahtumat`
--

INSERT INTO `h10_tapahtumat` (`tapahtumaID`, `nimi`, `paivays`) VALUES
(1, 'Kevätjuhla', '2021-05-30'),
(2, 'Lan-tapahtuma 2021', '2021-03-21'),
(3, 'Vappu', '2021-05-01'),
(7, 'Ystävänpäivä', '2020-02-14'),
(8, 'Mennyt jo', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `h11_characcter`
--

CREATE TABLE `h11_characcter` (
  `characterID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `strength` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `wisdom` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `hitpoints` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `raceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h11_characcter`
--

INSERT INTO `h11_characcter` (`characterID`, `name`, `strength`, `dexterity`, `wisdom`, `intelligence`, `hitpoints`, `classID`, `raceID`) VALUES
(5, 'soturi', 8, 6, 6, 6, 70, 1, 1),
(6, 'velho', 9, 5, 7, 8, 90, 1, 2),
(19, 'titan', 8, 8, 8, 8, 8, 1, 1),
(20, 'Talha', 3, 3, 3, 3, 3, 1, 1),
(21, 'ayham', 2, 2, 2, 2, 2, 1, 1),
(25, 'titan 66', 4, 6, 4, 6, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `h11_class`
--

CREATE TABLE `h11_class` (
  `classID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h11_class`
--

INSERT INTO `h11_class` (`classID`, `name`) VALUES
(1, 'soturi'),
(2, 'velho');

-- --------------------------------------------------------

--
-- Table structure for table `h11_race`
--

CREATE TABLE `h11_race` (
  `raceID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h11_race`
--

INSERT INTO `h11_race` (`raceID`, `name`) VALUES
(1, 'ihminen'),
(2, 'titan');

-- --------------------------------------------------------

--
-- Table structure for table `ht2_kayttaja`
--

CREATE TABLE `ht2_kayttaja` (
  `kayttajaID` int(11) NOT NULL,
  `nimi` varchar(100) NOT NULL,
  `salasana` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht2_kayttaja`
--

INSERT INTO `ht2_kayttaja` (`kayttajaID`, `nimi`, `salasana`, `email`) VALUES
(1, 'g', '$2y$10$mMNAhLM8PxK8RB5Bejo61OcM89muezIvlHtk06YeHgnlXhY65cuou', 'g@dddc.com'),
(2, 'gg', '$2y$10$0vnj8dFLcyJ6w8T1WK21COn/6x3h1PadhlOBJ0HJ/Sk4EL1KcCm.m', 'g@dddc.com'),
(5, 'k', '$2y$10$iTqaliw2HujnzVhzA24Nl.g9b5674p0V5Dp8Q3wKPZFd5M6LnYN2m', 'k@gmail.com'),
(6, 'ggg', '$2y$10$XBduvo/wt3pDEmcHdP7RW.b45q6mzQeJ2B66iC5ediHOFPruxbdiS', 'ggg@ggg.com'),
(7, 'ggg', '$2y$10$dXpKmWY5FmcTp1oJXlHYpuSvHgE74sb.DHr0cjBaaCmTBuUrGZ02K', 'ggg@ggg.com'),
(8, 'ggg', '$2y$10$qiLoFMVAZ5Li9rxOgjr5puttycRj6hge.tqGgk7VrN9UDH5F89vGe', 'ggg@ggg.com'),
(9, 'ggg', '$2y$10$eAbKDVq0VfIpF3nyEZcfue55RXyPYCsNNY8H4j16d6pi6Qp.dheeC', 'ggg@ggg.com'),
(10, 'eerikki', '$2y$10$ofx.55H8Ay4YJHoK6zc6WuTwC5SUqaBg5yz.csSz2kyW8sJGargI6', 'eerikki@gmail.com'),
(11, 'ggg', '$2y$10$IGCp.4dU6a6YiQ6KQbhfCuOcXMSgXlYL8/uCMUh7Z4bHZku6HUFvW', 'ggg@ggg.com'),
(12, 'ggg', '$2y$10$k7JEE9jFVwuGI9T4Ny9q8uv2TZgHawO6hMH5IMMvZc9GBzGge6vPu', 'ggg@ggg.com'),
(13, 'ggg', '$2y$10$DIZBwhCdYP9H6gRrGCB6duk7/8b52Nc/9BkxwaTbAG03.oX.rPhUq', 'ggg@ggg.com'),
(14, 'ggg', '$2y$10$4yEJBIdV.GlMDSW3a9KtqOkIoCVkLDCqNjcfq6VmtteqtK98dMPRG', 'ggg@ggg.com'),
(15, 'ggg', '$2y$10$rSGnmBPuDhys13GHbd.wFuGgw3M.G82ziyeYCLTUnFvgmqQsNY26y', 'ggg@ggg.com'),
(16, 'ggg', '$2y$10$L50bTvQUBb40KTK6xYQqAed/eYBEfylYeAZvctZk7iqbXEiaEpYsm', 'ggg@ggg.com'),
(17, 'ggg', '$2y$10$DHMrvlrSZIFGkRsEHDVMmuvAQjp80X/nfXdZOOyB33ImBBq6qNAcu', 'ggg@ggg.com'),
(18, 'ggg', '$2y$10$jCjpJvk.NTtrDUP8bDYvjOiyWvL5sVNiMeoLzG7XOFO2cTvE1UN62', 'ggg@ggg.com'),
(19, 'ggg', '$2y$10$njLgRkMOUsNBVIIeN4LgDeaXQ1b/ZEtayP2ZkC9MlOHw1toc32OtG', 'ggg@ggg'),
(20, 'ggg', '$2y$10$wQhlpHCWYKo1Y2OSZXypYeofjr8443Gb.OH57Sl5gjjzOxbXh68/G', 'ggg@ggg.com'),
(21, 'gg', '$2y$10$uMLXNGBT3/J9qt/pa0ZUtuLzOQLheaOflO6/hidhLFMBuip86y48.', 'gg@gg.com');

-- --------------------------------------------------------

--
-- Table structure for table `ht2_laji`
--

CREATE TABLE `ht2_laji` (
  `lajiID` int(11) NOT NULL,
  `nimi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht2_laji`
--

INSERT INTO `ht2_laji` (`lajiID`, `nimi`) VALUES
(1, 'juoksu'),
(2, 'uinti'),
(3, 'pyöräily'),
(4, 'suunistus'),
(5, 'kävely');

-- --------------------------------------------------------

--
-- Table structure for table `ht2_merkinta`
--

CREATE TABLE `ht2_merkinta` (
  `merkintaID` int(11) NOT NULL,
  `kayttajaID` int(11) NOT NULL,
  `lajiID` int(11) NOT NULL,
  `päiväys` date NOT NULL,
  `intentsiteeti` varchar(100) NOT NULL,
  `kommentti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht2_merkinta`
--

INSERT INTO `ht2_merkinta` (`merkintaID`, `kayttajaID`, `lajiID`, `päiväys`, `intentsiteeti`, `kommentti`) VALUES
(1, 1, 4, '2021-05-06', 'Menin 80% ', ''),
(2, 5, 1, '2021-05-02', 'intervalli juoksu', ''),
(3, 2, 3, '2021-04-21', '22 km 35 min', ''),
(7, 1, 1, '2021-05-03', '', ''),
(12, 5, 5, '2021-05-30', 'hhhhh', 'hhhh'),
(13, 5, 2, '2021-05-31', 'gggggggggggg', 'gggggggg'),
(14, 5, 2, '2021-05-31', 'gggggggggggg', 'gggggggg'),
(15, 10, 3, '2021-12-16', '1', 'teest');

-- --------------------------------------------------------

--
-- Table structure for table `juttu`
--

CREATE TABLE `juttu` (
  `jid` int(6) NOT NULL,
  `otsikko` varchar(100) DEFAULT NULL,
  `kpl` text DEFAULT NULL,
  `poistamispvm` date NOT NULL,
  `lisayspvm` date DEFAULT NULL,
  `kid` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kayttaja`
--

CREATE TABLE `kayttaja` (
  `kid` int(6) NOT NULL,
  `sukunimi` varchar(30) DEFAULT NULL,
  `etunimi` varchar(30) DEFAULT NULL,
  `ktunnus` varchar(30) DEFAULT NULL,
  `salasana` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kayttaja`
--

INSERT INTO `kayttaja` (`kid`, `sukunimi`, `etunimi`, `ktunnus`, `salasana`) VALUES
(1, 'sdfdsf', 'fdfdf', 'guf', '0c6192fa0a187eac2e1a150897cfffa8'),
(2, 'g', 'g', 'g', '71748b4b87f95046924afbe44089751a');

-- --------------------------------------------------------

--
-- Table structure for table `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttajaID` int(10) NOT NULL,
  `kayttajatunnus` varchar(50) NOT NULL,
  `salasana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kayttajat`
--

INSERT INTO `kayttajat` (`kayttajaID`, `kayttajatunnus`, `salasana`) VALUES
(1, 'gabu', '$2y$10$m4hsCBWAjd0Lg7XEUtgGw.KCbbN/CElsLt.bFrE5JrUUF1xeHXKzC'),
(2, 'g', '$2y$10$GyZxJMnagwOVKOWUUH/57OIJlEQgDXQVlbzVLgw9O3lHsK9akYQyi'),
(3, 'g', '$2y$10$B6fglFlTxxW5NRmunnS2Eu3gQVMfXtCPTfJ.5bMwD3SPemstjau6O'),
(4, 'g', '$2y$10$72xOzlSR9HtYPnoA.Rn4eefilrkU9OIrHy4DUw0EmUikScwi6S5KO');

-- --------------------------------------------------------

--
-- Table structure for table `keikkapaikat`
--

CREATE TABLE `keikkapaikat` (
  `KeikapaikkaID` int(11) NOT NULL,
  `Postiosoite` int(11) NOT NULL,
  `Postitoimipaikka` varchar(11) NOT NULL,
  `Puhelin` int(11) NOT NULL,
  `Lähiosoite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keikkapaikat`
--

INSERT INTO `keikkapaikat` (`KeikapaikkaID`, `Postiosoite`, `Postitoimipaikka`, `Puhelin`, `Lähiosoite`) VALUES
(1, 33200, 'tampere', 43454653, 'vallerinkatu 1'),
(2, 33200, 'tampere', 324342352, 'vallerinkatu 10'),
(3, 0, 'dfdf', 0, 'sdfd'),
(4, 0, 'erwer', 0, 'er');

-- --------------------------------------------------------

--
-- Table structure for table `keikkat`
--

CREATE TABLE `keikkat` (
  `KeikkaID` int(11) NOT NULL,
  `Päivämäärä` int(11) NOT NULL,
  `Alkamisaika` int(11) NOT NULL,
  `EsiintyjäID` int(11) NOT NULL,
  `KeikkapaikkaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lajit`
--

CREATE TABLE `lajit` (
  `juoksu` int(11) NOT NULL,
  `uinti` int(11) NOT NULL,
  `suunistus` int(11) NOT NULL,
  `pyöräily` int(11) NOT NULL,
  `kävely` int(11) NOT NULL,
  `lajit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `managerit`
--

CREATE TABLE `managerit` (
  `Managerit.ID` int(11) NOT NULL,
  `Sukunimi` varchar(50) NOT NULL,
  `Etunimi` varchar(50) NOT NULL,
  `Pakkauspvm` date NOT NULL,
  `Puhelin` varchar(50) NOT NULL,
  `Sähköposti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managerit`
--

INSERT INTO `managerit` (`Managerit.ID`, `Sukunimi`, `Etunimi`, `Pakkauspvm`, `Puhelin`, `Sähköposti`) VALUES
(0, 'salonen', 'saku', '0000-00-00', '', ''),
(1, 'salonen', 'saku', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `musikkityylit`
--

CREATE TABLE `musikkityylit` (
  `MusikkityylitID` int(11) NOT NULL,
  `Tyyli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musikkityylit`
--

INSERT INTO `musikkityylit` (`MusikkityylitID`, `Tyyli`) VALUES
(2, 'rap'),
(3, 'rock'),
(4, 'pop');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playerID` int(10) NOT NULL,
  `nickname` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `current_character` varchar(15) NOT NULL,
  `money` decimal(10,0) NOT NULL,
  `lastLogin` date NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `teamID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `nickname`, `password`, `email`, `current_character`, `money`, `lastLogin`, `banned`, `teamID`) VALUES
(2, 'Armas', 'armain', 'armas@gmail.com', 'olio', '500', '2020-01-22', 0, NULL),
(4, 'Pelle', 'peloton', 'ilari@gmail.com', 'keiju', '500', '2020-01-22', 0, NULL),
(5, 'Eriel', 'eriel', 'erile@gmail.com', 'keiju', '500', '2020-01-28', 0, NULL),
(6, 'gabu', '$2y$10$CRNyO5ZrmtF1iEJ1GVZ.BuyfDJzWdmDID4ugp3Ea/BvUZqbd.ugDS', 'hii@gmail.com', 'hirviö', '0', '2021-04-09', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `playersgames`
--

CREATE TABLE `playersgames` (
  `playerGamesID` int(10) NOT NULL,
  `playerID` int(10) NOT NULL,
  `gameID` int(10) NOT NULL,
  `points` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamID` int(10) NOT NULL,
  `teamName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamID`, `teamName`) VALUES
(1, 'Tappara'),
(2, 'PassiAlmat');

-- --------------------------------------------------------

--
-- Table structure for table `teamsgames`
--

CREATE TABLE `teamsgames` (
  `teamGamesID` int(10) NOT NULL,
  `teamID` int(10) NOT NULL,
  `gameID` int(10) NOT NULL,
  `placement` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamsgames`
--

INSERT INTO `teamsgames` (`teamGamesID`, `teamID`, `gameID`, `placement`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uutinen`
--

CREATE TABLE `uutinen` (
  `uutinenID` int(10) NOT NULL,
  `otsikko` varchar(50) NOT NULL,
  `sisalto` text NOT NULL,
  `kirjotuspvm` date NOT NULL,
  `poistamispvm` date NOT NULL,
  `kirjoittaja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uutinen`
--

INSERT INTO `uutinen` (`uutinenID`, `otsikko`, `sisalto`, `kirjotuspvm`, `poistamispvm`, `kirjoittaja`) VALUES
(3, 'Monet työpaikat katoaa koneistumisen takia', 'Vuonna 2024 asiantutkia sanoo, että hän ei ylläty', '2021-04-13', '2021-10-28', 'Gabu4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computergames`
--
ALTER TABLE `computergames`
  ADD PRIMARY KEY (`gameid`);

--
-- Indexes for table `esiintyjät`
--
ALTER TABLE `esiintyjät`
  ADD PRIMARY KEY (`EsiintyjäID`),
  ADD KEY `ManageriID` (`ManageriID`),
  ADD KEY `MusikkityyliID` (`MusikkityyliID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameID`);

--
-- Indexes for table `h10_osallistujat`
--
ALTER TABLE `h10_osallistujat`
  ADD PRIMARY KEY (`osallistujaID`),
  ADD KEY `tapahtumaID` (`tapahtumaID`);

--
-- Indexes for table `h10_tapahtumat`
--
ALTER TABLE `h10_tapahtumat`
  ADD PRIMARY KEY (`tapahtumaID`);

--
-- Indexes for table `h11_characcter`
--
ALTER TABLE `h11_characcter`
  ADD PRIMARY KEY (`characterID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `raceID` (`raceID`);

--
-- Indexes for table `h11_class`
--
ALTER TABLE `h11_class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `h11_race`
--
ALTER TABLE `h11_race`
  ADD PRIMARY KEY (`raceID`);

--
-- Indexes for table `ht2_kayttaja`
--
ALTER TABLE `ht2_kayttaja`
  ADD PRIMARY KEY (`kayttajaID`);

--
-- Indexes for table `ht2_laji`
--
ALTER TABLE `ht2_laji`
  ADD PRIMARY KEY (`lajiID`);

--
-- Indexes for table `ht2_merkinta`
--
ALTER TABLE `ht2_merkinta`
  ADD PRIMARY KEY (`merkintaID`),
  ADD KEY `kayttajaID` (`kayttajaID`),
  ADD KEY `lajiID` (`lajiID`);

--
-- Indexes for table `juttu`
--
ALTER TABLE `juttu`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `vieras` (`kid`);

--
-- Indexes for table `kayttaja`
--
ALTER TABLE `kayttaja`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD PRIMARY KEY (`kayttajaID`);

--
-- Indexes for table `keikkapaikat`
--
ALTER TABLE `keikkapaikat`
  ADD PRIMARY KEY (`KeikapaikkaID`);

--
-- Indexes for table `keikkat`
--
ALTER TABLE `keikkat`
  ADD PRIMARY KEY (`KeikkaID`),
  ADD KEY `EsiintyjäID` (`EsiintyjäID`),
  ADD KEY `KeikkapaikkaID` (`KeikkapaikkaID`);

--
-- Indexes for table `lajit`
--
ALTER TABLE `lajit`
  ADD PRIMARY KEY (`lajit`);

--
-- Indexes for table `managerit`
--
ALTER TABLE `managerit`
  ADD PRIMARY KEY (`Managerit.ID`);

--
-- Indexes for table `musikkityylit`
--
ALTER TABLE `musikkityylit`
  ADD PRIMARY KEY (`MusikkityylitID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `teamID` (`teamID`);

--
-- Indexes for table `playersgames`
--
ALTER TABLE `playersgames`
  ADD PRIMARY KEY (`playerGamesID`),
  ADD KEY `playerID` (`playerID`,`gameID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamID`);

--
-- Indexes for table `teamsgames`
--
ALTER TABLE `teamsgames`
  ADD PRIMARY KEY (`teamGamesID`),
  ADD KEY `teamID` (`teamID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `uutinen`
--
ALTER TABLE `uutinen`
  ADD PRIMARY KEY (`uutinenID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computergames`
--
ALTER TABLE `computergames`
  MODIFY `gameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `esiintyjät`
--
ALTER TABLE `esiintyjät`
  MODIFY `EsiintyjäID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `gameID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `h10_osallistujat`
--
ALTER TABLE `h10_osallistujat`
  MODIFY `osallistujaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `h10_tapahtumat`
--
ALTER TABLE `h10_tapahtumat`
  MODIFY `tapahtumaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `h11_characcter`
--
ALTER TABLE `h11_characcter`
  MODIFY `characterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `h11_class`
--
ALTER TABLE `h11_class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `h11_race`
--
ALTER TABLE `h11_race`
  MODIFY `raceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ht2_kayttaja`
--
ALTER TABLE `ht2_kayttaja`
  MODIFY `kayttajaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ht2_laji`
--
ALTER TABLE `ht2_laji`
  MODIFY `lajiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ht2_merkinta`
--
ALTER TABLE `ht2_merkinta`
  MODIFY `merkintaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `juttu`
--
ALTER TABLE `juttu`
  MODIFY `jid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kayttaja`
--
ALTER TABLE `kayttaja`
  MODIFY `kid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttajaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keikkapaikat`
--
ALTER TABLE `keikkapaikat`
  MODIFY `KeikapaikkaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `musikkityylit`
--
ALTER TABLE `musikkityylit`
  MODIFY `MusikkityylitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `playerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `playersgames`
--
ALTER TABLE `playersgames`
  MODIFY `playerGamesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teamsgames`
--
ALTER TABLE `teamsgames`
  MODIFY `teamGamesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uutinen`
--
ALTER TABLE `uutinen`
  MODIFY `uutinenID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `esiintyjät`
--
ALTER TABLE `esiintyjät`
  ADD CONSTRAINT `esiintyjät_ibfk_1` FOREIGN KEY (`ManageriID`) REFERENCES `managerit` (`Managerit.ID`),
  ADD CONSTRAINT `esiintyjät_ibfk_2` FOREIGN KEY (`MusikkityyliID`) REFERENCES `musikkityylit` (`MusikkityylitID`);

--
-- Constraints for table `h10_osallistujat`
--
ALTER TABLE `h10_osallistujat`
  ADD CONSTRAINT `h10_osallistujat_ibfk_1` FOREIGN KEY (`tapahtumaID`) REFERENCES `h10_tapahtumat` (`tapahtumaID`);

--
-- Constraints for table `h11_characcter`
--
ALTER TABLE `h11_characcter`
  ADD CONSTRAINT `h11_characcter_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `h11_class` (`classID`),
  ADD CONSTRAINT `h11_characcter_ibfk_2` FOREIGN KEY (`raceID`) REFERENCES `h11_race` (`raceID`);

--
-- Constraints for table `ht2_merkinta`
--
ALTER TABLE `ht2_merkinta`
  ADD CONSTRAINT `ht2_merkinta_ibfk_1` FOREIGN KEY (`lajiID`) REFERENCES `ht2_laji` (`lajiID`),
  ADD CONSTRAINT `ht2_merkinta_ibfk_2` FOREIGN KEY (`kayttajaID`) REFERENCES `ht2_kayttaja` (`kayttajaID`);

--
-- Constraints for table `juttu`
--
ALTER TABLE `juttu`
  ADD CONSTRAINT `vieras` FOREIGN KEY (`kid`) REFERENCES `kayttaja` (`kid`);

--
-- Constraints for table `keikkat`
--
ALTER TABLE `keikkat`
  ADD CONSTRAINT `keikkat_ibfk_1` FOREIGN KEY (`KeikkapaikkaID`) REFERENCES `keikkapaikat` (`KeikapaikkaID`),
  ADD CONSTRAINT `keikkat_ibfk_2` FOREIGN KEY (`EsiintyjäID`) REFERENCES `esiintyjät` (`EsiintyjäID`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `teams` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `playersgames`
--
ALTER TABLE `playersgames`
  ADD CONSTRAINT `playersgames_ibfk_1` FOREIGN KEY (`playerID`) REFERENCES `players` (`playerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `playersgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `games` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teamsgames`
--
ALTER TABLE `teamsgames`
  ADD CONSTRAINT `teamsgames_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `teams` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `teamsgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `games` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
