-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jul 2013 um 20:46
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `pegasus`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_ID` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_bin NOT NULL,
  `describtion` text COLLATE utf8_bin NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `location` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`event_ID`, `subject`, `describtion`, `owner_ID`, `date`, `end_date`, `location`) VALUES
(1, 'Sex', 0x486965722077657264656e20776972205365782c2050617274792c20506f6d6d65732066656965726e2121, 1, '2013-06-26 07:21:23', '2013-06-27 03:03:00', 0x4d756e69632045617374203a44),
(2, 'Abiturfeier!!', 0x48696572207769726420616269696969696969696974757220676566656965727421, 1, '2013-06-28 04:23:44', '2013-06-29 15:00:00', 0x59686969696861616161203a44205765206c6f76652043616b6573);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(10) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `counter` int(1) NOT NULL,
  `reg_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_ID`, `last_name`, `first_name`, `title`, `email`, `password`, `birthday`, `status`, `counter`, `reg_date`, `last_login`) VALUES
(1, 'Steidl', 'Maxi', 1, 'maxi.steidl@t-online.de', '10b43971a8295f3720f38fbcdd9d6ac6', '1994-02-15', 1, 0, '2013-06-05', '2013-07-07 20:35:49'),
(2, 'Schmidt', 'André', 1, 'email.andre@gmx.net', 'ecfcb09d14771e375f4a7ed2aa6b25c5', '1994-05-23', 1, 0, '2013-06-05', '2013-06-14 02:50:21'),
(4, 'Mustermann', 'Max', 1, 'max.mustermann@muster.web', '3a81de5f99818842e71bbcb2c420ae49', '2000-02-19', 1, 0, '2013-06-05', '2013-06-14 02:53:05');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_events_lookup`
--

CREATE TABLE IF NOT EXISTS `user_events_lookup` (
  `user_ID` int(11) NOT NULL,
  `event_ID` int(11) NOT NULL,
  `attendance_state` int(11) NOT NULL,
  PRIMARY KEY (`user_ID`,`event_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `user_events_lookup`
--

INSERT INTO `user_events_lookup` (`user_ID`, `event_ID`, `attendance_state`) VALUES
(1, 1, 0),
(1, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
