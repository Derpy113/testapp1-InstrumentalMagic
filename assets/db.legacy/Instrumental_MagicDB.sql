-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 23 feb 2024 kl 12:12
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `instrumental_magicdb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `appreviews`
--

CREATE TABLE `appreviews` (
  `Review_ID` int(11) NOT NULL,
  `UserProfile_ID` int(11) NOT NULL,
  `TextContent` varchar(3000) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `musicplayer`
--

CREATE TABLE `musicplayer` (
  `UserProfile_ID` int(11) NOT NULL,
  `Song_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `songs`
--

CREATE TABLE `songs` (
  `Song_ID` int(11) NOT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `Artist` varchar(30) DEFAULT NULL,
  `Genre` varchar(15) DEFAULT NULL,
  `TimesPlayed` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `songs`
--

INSERT INTO `songs` (`Song_ID`, `Note`, `Artist`, `Genre`, `TimesPlayed`, `Rating`) VALUES
(1, 'c\'\\2,c\'\\2,g\'\\1,g\'\\1,a\'\\1,a\'\\1,g\'\\1,f\'\\1,f\'\\1,e\'\\1,e\'\\1,d\'\\2,d\'\\2,c\'\\2\r\n', 'Okänd', 'Barn', 99, 5),
(2, 'a\\3,b\\2,c\'\\2,d\'\\2,e\'\\1,c\'\\2,e\'\\1,dis\'\\1,b\\2,dis\'\\1,d\'\\2,bes\\3,d\'\\2\r\n', 'Edvard Grieg', 'Klassisk', 1, 1),
(15, 'c\'\\2,c\'\\2,g\'\\1,g\'\\1,a\'\\1,a\'\\1,g\'\\1,f\'\\1,f\'\\1,e\'\\1,e\'\\1,d\'\\2,d\'\\2,c\'\\2\r\n', 'Judas Priest', 'Rock', 3, 5),
(20, 'd\\4 g\\3,f\\4 bes\\3,g\\4 c\'\\3,d\\4 g\\3,f\\4 bes\\3,aes\\4 des\'\\3,g\\4 c\'\\3\r\n', 'Deep Purple', 'Rock', 5, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `userprofile`
--

CREATE TABLE `userprofile` (
  `UserProfile_ID` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `UserPassword` varchar(15) NOT NULL,
  `ProfilePic` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `userprofile`
--

INSERT INTO `userprofile` (`UserProfile_ID`, `Username`, `UserPassword`, `ProfilePic`) VALUES
(1, 'Miphus', 'Backstreetboys8', NULL),
(2, 'G1ll1s', 'Ilikeboys', NULL),
(3, 'Bluelegend76', 'Guitarhero911', NULL),
(4, 'JonasP', 'HonkaHonka91', NULL),
(5, 'Josef', 'Jangmo-O', NULL),
(6, 'testsson', 'PHPHEJ123#1!a', NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `appreviews`
--
ALTER TABLE `appreviews`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `UserProfile_ID` (`UserProfile_ID`);

--
-- Index för tabell `musicplayer`
--
ALTER TABLE `musicplayer`
  ADD KEY `UserProfile_ID` (`UserProfile_ID`),
  ADD KEY `Song_ID` (`Song_ID`);

--
-- Index för tabell `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`Song_ID`);

--
-- Index för tabell `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`UserProfile_ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `appreviews`
--
ALTER TABLE `appreviews`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `songs`
--
ALTER TABLE `songs`
  MODIFY `Song_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT för tabell `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `UserProfile_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `appreviews`
--
ALTER TABLE `appreviews`
  ADD CONSTRAINT `appreviews_ibfk_1` FOREIGN KEY (`UserProfile_ID`) REFERENCES `userprofile` (`UserProfile_ID`);

--
-- Restriktioner för tabell `musicplayer`
--
ALTER TABLE `musicplayer`
  ADD CONSTRAINT `musicplayer_ibfk_1` FOREIGN KEY (`UserProfile_ID`) REFERENCES `userprofile` (`UserProfile_ID`),
  ADD CONSTRAINT `musicplayer_ibfk_2` FOREIGN KEY (`Song_ID`) REFERENCES `songs` (`Song_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
